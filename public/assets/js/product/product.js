$(document).ready(function () {

    $("#product_form").validate({
        rules: {
            product_name: {
                required: true,
                maxlength: 250
            },
            sku: {
                required: true,
                maxlength: 250
            },
            price: {
                required: false,
                number: true
            },
            retail_price: {
                required: false,
                number: true
            },
            refurbished_price: {
                required: false,
                number: true
            },
            sale_refurbished_price: {
                required: false,
                number: true
            },
            quantity: {
                required: false,
                number: true
            },
            category_id: {
                required: true,
            },
            brand: {
                required: true,
            },
            weight: {
                required: true,
            },
            dimensions: {
                required: true,
            },
            product_section: {
                required: true,
            },
            feature_image: {
                required: true,
                accept: "jpg|jpeg|png|ico|bmp"
            },
            image_thumbnail: {
                required: true,
                accept: "jpg|jpeg|png|ico|bmp"
            },


        },
        messages: {
            // product_name: {
            //     required: "The product name field is required.",
            // }
        },
        highlight: function (element, errorClass) {
            $(element).removeClass(errorClass); //prevent class to be added to selects
        },
        errorPlacement: function (error, element) {
            error.insertAfter(element);
        },
        submitHandler: function (form, event) {
            // form.submit();
            let checkPrice = true;
            // if($('#product_price').val() != '' && $('#refurbished_price').val() == '')
            // {
            //     checkPrice = true;
            // }
            // if($('#product_price').val() == '' && $('#refurbished_price').val() != '')
            // {
            //     checkPrice = true;
            // }
            if(checkPrice) {
                $('.priceValidate').html('');
                let formData = document.getElementById("product_form");
                var long_description = CKEDITOR.instances.editor1.getData();
                let form_data = new FormData(formData);
                form_data.append('specification', long_description);

                $.ajax({
                    url: '/product/store',
                    type: 'POST',
                    contentType: false,
                    cache: false,
                    processData: false,
                    data: form_data,
                    success: function (data) {
                        // Successful POST
                        // do whatever you want

                        if (data.status == '200') {

                            // $('#product_id').val(data.product);
                            $('.error_product_name').html('');
                            $('.error_sku').html('');
                            $('.error_category_id').html('');
                            $('.error_price').html('');
                            $('.error_refurbished_price').html('');
                            $('.error_retail_price').html('');

                            toastr.success(data.message)
                            setInterval( redirectPage(data.product_section), 4000);

                        }
                    },
                    error: function (data) {
                        // Something went wrong
                        // HERE you can handle asynchronously the response
                        var errors = data.responseJSON;
                        let err = $('.upload-error');
                        showErrors(errors);
                    }
                });
            }else{
                $('.priceValidate').html('Please enter correct price. you can enter product price or refurbished price.')
            }
        }
    })

});

function redirectPage(product_section)
{
    if(product_section == 'generalProduct'){
        window.location.href ='/general-products'
    }else{
        window.location.href ='/products'
    }
}

    // $('.store_product').click(function () {
    //
    //     let formData = document.getElementById("product_form");
    //     var long_description = CKEDITOR.instances.editor1.getData();
    //     let form_data = new FormData(formData);
    //     form_data.append('long_description', long_description);
    //
    //     $.ajax({
    //         url: '/product/store',
    //         type: 'POST',
    //         contentType: false,
    //         cache: false,
    //         processData: false,
    //         data: form_data,
    //         success: function (data) {
    //             // Successful POST
    //             // do whatever you want
    //
    //             if (data.status == '200') {
    //
    //                 // $('#product_id').val(data.product);
    //                 $('.error_product_name').html('');
    //                 $('.error_sku').html('');
    //                 $('.error_category_id').html('');
    //                 $('.error_price').html('');
    //                 $('.error_refurbished_price').html('');
    //                 $('.error_retail_price').html('');
    //
    //                 toastr.success(data.message)
    //                 window.location.href = '/products';
    //
    //             }else{
    //
    //             }
    //         },
    //         error: function (data) {
    //             // Something went wrong
    //             // HERE you can handle asynchronously the response
    //             var errors = data.responseJSON;
    //              let err= $('.upload-error');
    //             showErrors(errors);
    //         }
    //     });
    // })


    $('#parent_category').change(function (){
        getCategoryNodes($(this).val(),'sub_category_l-1')
    })
    $('#sub_category_l-1').change(function (){
        getCategoryNodes($(this).val(),'sub_category_l-2')
    })
    $('#sub_category_l-2').change(function (){
        getCategoryNodes($(this).val(),'sub_category_l-3')
    })

    function getCategoryNodes(id,target)
    {
        $.ajax({
            url: '/product/category/get-nodes',
            type: 'get',
            data:{parent_id:id},
            success: function (data) {
                $('#' + target).html('');
                if(data.length > 0) {
                    let html = ' <option value="">--Select--</option>';
                    $.each(data, function (index, value) {
                        html += ' <option value="' + value.id + '">' + value.category_name + '</option>';
                    });
                    $('.' + target).removeClass('d-none');
                    $('#' + target).html(html);
                }else{
                    $('.' + target).addClass('d-none');
                    $('.' + target).find('select').val('');
                    if(target == 'sub_category_l-1'){
                        $('.sub_category_l-2').addClass('d-none');
                        $('.sub_category_l-3').addClass('d-none');
                        $('.sub_category_l-2').find('select').val('');
                        $('.sub_category_l-3').find('select').val('');
                    }
                    if(target == 'sub_category_l-2'){
                        $('.sub_category_l-3').addClass('d-none');
                        $('.' + target).find('select').val('');
                    }
                }
            }
        })
    }
// multiple product images upload init


    $(function () {
        var table = $('.product_datatable').DataTable(
            {
            processing: true,
            serverSide: true,
                order:[],
            ajax: "/product-list",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'product', name: 'product'},
                {data: 'product_name', name: 'product_name'},
                {data: 'category', name: 'category'},
                {data: 'quantity', name: 'quantity'},
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                },
            ]
        }
        );

    });
$(document).on('click', 'a.relative.inline-flex.items-center.px-4.py-2.-ml-px.text-sm.font-medium.text-gray-700.bg-white.border.border-gray-300.leading-5.hover\\:text-gray-500.focus\\:z-10.focus\\:outline-none.focus\\:ring.ring-gray-300.focus\\:border-blue-300.active\\:bg-gray-100.active\\:text-gray-700.transition.ease-in-out.duration-150', function(event){
    event.preventDefault();
    var page = $(this).attr('href').split('page=')[1];
    $('#load').css('opacity', '0.1');
    $('.loader').removeClass('d-none');
    // window.history.pushState("", "", url);
    fetch_data(page);
});
// fetch_data();
function fetch_data(page)
{
    $.ajax({
        url:"?page="+page,
        success:function(data)
        {
            $('.load_general_products_table').html(data);
            window.history.pushState("", "", "/general-products?page="+page);
            $('.loader').addClass('d-none');
        }
    });
}

$('#searchGeneralProduct').keyup(function (){
   let search = $(this).val();
    let tm;
    $('#load').css('opacity', '0.1');
    $('.loader').removeClass('d-none');
    clearTimeout( tm );
    tm = setTimeout( function(){  searchProduct(search) }, 1000 );

});

function searchProduct(search)
{
    $.ajax({
        url:'/general-products',
        data:{search:search},
        success:function(data)
        {
            $('.load_general_products_table').html(data);
            $('.loader').addClass('d-none');
        }
    });
}

// $('.general_product_datatable').DataTable();
    // $(function () {
    //
    //     var table = $('.general_product_datatable').DataTable(
    //         {
    //         processing: true,
    //         serverSide: true,
    //             order:[],
    //         ajax: "/general-product-list",
    //         columns: [
    //             {data: 'id', name: 'id'},
    //             {data: 'product', name: 'product'},
    //             {data: 'product_name', name: 'product_name'},
    //             {data: 'category', name: 'category'},
    //             {data: 'quantity', name: 'quantity'},
    //             {
    //                 data: 'action',
    //                 name: 'action',
    //                 orderable: true,
    //                 searchable: true
    //             },
    //         ]
    //     }
    //     );
    //
    // });

var loop_count = 1;
var conut = 0;
$(document).on('click', '.add_more_attr', function () {
    loop_count++;
    conut++;
    var html = '<div class="product_attr_list" id="product_attr_' + loop_count + '">\n' +
        '<div class="list">\n' +
        '<div class="row">';
    html += '  <div class="col-lg-2 col-md-2 col-sm-3 mb-3">\n' +
        '<label class="col-form-label" for="recipient-name">SKU: <span class="text-danger ml-2">*</span></label>\n' +
        '<input class="form-control form_product" type="text" id="form_sku" name="sku[]" >\n' +
        ' <span class="text-danger" id="error_sku_' + conut + '"></span>\n' +
        ' </div>';

    html += '<div class="col-lg-2 col-md-2 col-sm-3 mb-3">\n' +
        ' <label class="col-form-label" for="recipient-name">PRICE: <span class="text-danger ml-2">*</span></label>\n' +
        '<input class="form-control form_product" type="text" id="form_s_price" name="price[]" >\n' +
        ' <span class="text-danger" id="error_price_' + conut + '"></span>\n' +
        '</div>';
    html += ' <div class="col-lg-2 col-md-2 col-sm-3 mb-3">\n' +
        '<label class="col-form-label" for="recipient-name">QTY: <span class="text-danger ml-2">*</span></label>\n' +
        '<input class="form-control form_product" type="text" id="form_quantity" name="quantity[]" >\n' +
        '<span class="text-danger" id="error_quantity_' + conut + '"></span>\n' +
        '</div>';

    var color_name = $('#color_name').html();
    html += '  <div class="col-lg-3 col-md-3 col-sm-3 mb-3">\n' +
        '<label class="col-form-label" for="recipient-name">COLOR:</label>\n' +
        ' <select class="form-control form-select" name="color_name[]" id="color_name">  \n' + color_name +
        ' </select>\n' +
        '   <span class="text-danger" id="error_color_name_' + conut + '"></span>\n' +
        '   </div>';
    var size_name = $('#size_name').html();
    html += '  <div class="col-lg-3 col-md-3 col-sm-3 mb-3">\n' +
        '<label class="col-form-label" for="recipient-name">SIZE:</label>\n' +
        ' <select class="form-control form-select" name="size_name[]" id="size_name">  \n' + size_name +
        ' </select>\n' +
        '   <span class="text-danger" id="error_size_name_' + conut + '"></span>\n' +
        ' </div>';
    html += ' <div class="mb-3 col-lg-3 col-md-3 col-sm-3">\n' +
        '  <label class="col-form-label" for="recipient-name">Image:</label>\n' +
        ' <input class="form-control form_product" type="file" id="form_image_attr" name="image_attr[]">\n' +
        '  <span class="text-danger" id="error_image_attr_' + conut + '"></span>\n' +
        '  </div>';
    html += '<div class="mb-3 col-lg-2 col-md-2 col-sm-3">\n' +
        '<button class="btn btn-danger active remove_more_attr" id="' + loop_count + '" type="button" ><i class="fa fa-minus"></i> Remove</button>\n' +
        '  </div>';

    html += '</div></div></div>';

    $('.product_attr_main').append(html);
});

$(document).on('click', '.remove_more_attr', function () {
    var ele = $(this).attr('id');
    $('#product_attr_' + ele).remove();
});

