$(document).ready(function () {

    const currencyFormat = 'Rs:';
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
    window.cart = function () {
        $.ajax({
            url: '/get-cart',
            type: 'get',
            success: function (response) {
                $('#cartView').html(response);
            }
        });
    }

    $(document).on('click', '.deleteCartItem', function () {
        let product_id = $(this).attr('data-id')
        Swal.fire({
            title: "Are you sure?",
            text: 'Do you want to remove.',
            icon: 'warning',
            confirmButtonText: 'Yes',
            showCancelButton: true,
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/delete-to-cart',
                    data: {product_id: product_id},
                    type: 'post',
                    success: function (response) {
                        loadCart()
                        cart()
                        Toast.fire({
                            icon: 'success',
                            title: response.status
                        })
                    }
                });

            }
        })
    })
    window.addToCart = function (id, productType, qty = null,price = null,refurbished_price = null) {

console.log(productType)
        let check = false;
        if (productType == 'bothType') {
            Swal.fire({
                title: 'Please select price',
                html: `<div class="main_price_section">
                        <div class="price-section">
                          <input class="form-check-input"  type="radio" name="price" value="new" id="price" checked>
                          <label class="form-check-label" for="price">
                           New price <span>${currencyFormat} ${price}</span>
                          </label>
                        </div>
                        <div class="price-section">
                          <input class="form-check-input" type="radio" name="price" value="refurbished" id="refurbished_price" >
                          <label class="form-check-label" for="refurbished_price">
                           Refurbished price <span>${currencyFormat} ${refurbished_price}</span>
                          </label>
                        </div>
                    </div>`,
                confirmButtonText: 'Add to cart',
                showCancelButton: true,
                focusConfirm: false,
                preConfirm: () => {
                    const price = Swal.getPopup().querySelector('input[name="price"]:checked').value
                    return {price: price}
                }
            }).then((result) => {
                let selectedProductType = result.value.price;
                cartJaxa(id,productType,selectedProductType,qty)
            })
        }else{
            cartJaxa(id, productType,null, qty)
        }

    }

   function cartJaxa(id,productType, selectedProductType= null, qty)
    {
        $.ajax({
            url: '/add-to-cart',
            data: {product_id: id,productType:productType,selectedProductType:selectedProductType,qty:qty},
            type: 'post',
            success: function (response) {
                loadCart()
                cart()
                if(response.status == 200){
                    Toast.fire({
                        icon: 'success',
                        title: response.message
                    })
                }else{
                    Toast.fire({
                        icon: 'error',
                        title: response.message
                    })
                }

            }
        });
    }

    window.loadCart = function () {
        $.ajax({
            url: '/loadCart',
            method: "GET",
            success: function (response) {
                let cart = $.parseJSON(response)
                let cartItems = $.parseJSON(cart.cart_items)
                $('.item-count-contain').html(cart.total_cart_items);
                $('#subTotal').html( cart.sub_total);
                $('#grandTotal').html( cart.sub_total);
                html = '';

                var len = $.map(cartItems, function (n, i) {
                    return i;
                }).length;

                if (len > 0) {
                    $(".check-out-btn").removeClass('d-none')
                    $.each(cartItems, function (index, item) {
                        html += `
                     <li>
                    <div class="media">
                        <a href="#">
                            <img alt="megastore1" class="me-3" src="${item.item_image}">
                        </a>
                        <div class="media-body">
                            <a href="#">
                                <h4>${item.item_name}</h4>
                            </a>
                            <h6>
                               ${currencyFormat} ${item.item_price} <span>${item.item_retail_price}</span>
                            </h6>
                            <div class="addit-box">
                                <div class="qty-box">
                                    <div class="input-group">
                                        <button class="qty-minus" data-id="${item.item_id}"></button>
                                        <input class="qty-adj form-control" data-id="${item.item_id}" type="number" value="${item.item_quantity}"/>
                                        <button class="qty-plus" data-id="${item.item_id}"></button>

                                    </div>
                                      <span class="qty_error text-success"></span>
                                </div>
                                <div class="pro-add">
                                 <a class="deleteCartItem" href="javascript:void(0)" data-id="${item.item_id}">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                   </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                    `;
                    });
                } else {
                    $(".check-out-btn").addClass('d-none')
                    html += '<li style="border: none !important;"> <h3>Cart empty</h3></li>';
                }


                $('#cart_product').html(html)
            }
        })
    }
    window.updateCart = function (product_id, qty) {
        $.ajax({
            url: '/update-to-cart',
            type: 'POST',
            data: {'product_id': product_id, 'quantity': qty},
            success: function (response) {
                loadCart()
                cart()
            }
        });
    }
    window.showErrors = function (res) {
        $.each(res.errors, function (index, value) {
            var indx = index.replace(".", "_");
            $('.error_' + indx).html(value);
        });
    }
    window.showFormValues = function (res) {
        $.each(res, function (index, value) {
            $('#form_' + index).val(value);
        });
    }

    window.deleteFromCart = function () {

    }

    window.notify = function (message) {
        $.notify({
            icon: 'fa fa-check',
            title: 'Success!',
            message: message
        }, {
            element: 'body',
            position: null,
            type: "success",
            allow_dismiss: true,
            newest_on_top: false,
            showProgressbar: true,
            placement: {
                from: "top",
                align: "right"
            },
            offset: 20,
            spacing: 10,
            z_index: 1031,
            delay: 5000,
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp'
            },
            icon_type: 'class',
            template: '<div class="notifyClass" data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                '<button type="button" aria-hidden="true" class="btn-close" data-notify="dismiss"></button>' +
                '<span data-notify="icon"></span> ' +
                '<span data-notify="title">{1}</span> ' +
                '<span data-notify="message">{2}</span>' +
                '<div class="progress" data-notify="progressbar">' +
                '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                '</div>' +
                '<a href="{3}" target="{4}" data-notify="url"></a>' +
                '</div>'
        });
    }

    function checkProductQty(product_id, qty) {
        return $.ajax({
            url: '/check-product-qty',
            type: 'get',
            data: {'product_id': product_id, 'qty': qty},
        });
    }

    $(document).on('click', '.qty-plus', function () {

        let qty = parseInt($(this).prev().val());
        let product_id = $(this).attr('data-id');
        var current = $(this);
        $(this).prev().val(qty + 1);
        checkProductQty(product_id, qty).done(function (data) {
            if (data.status == 200) {
                $('.check-out-btn').removeClass('not-click')
                updateCart(product_id, qty + 1);
                cart()
            } else {
                $('.check-out-btn').addClass('not-click')
                current.parent().parent().find('.qty_error').html(data.message);
            }
        });
    });
    $(document).on('click', '.qty-minus', function () {
        let qty = parseInt($(this).next().val());
        var current = $(this);
        let product_id = $(this).attr('data-id');
        if (qty > 0) {
            $(this).next().val(qty - 1);
            checkProductQty(product_id, qty).done(function (data) {
                if (data.status == 200) {
                    $('.check-out-btn').removeClass('not-click')
                    updateCart(product_id, qty - 1);
                    cart()
                } else {
                    $('.check-out-btn').addClass('not-click')
                    current.parent().parent().find('.qty_error').html(data.message);
                }
            });

        }
    });


    $(document).on('change', '.qty-adj', function () {
        let qty = parseInt($(this).val());
        var current = $(this);
        let product_id = $(this).attr('data-id');
        if (qty > 0) {
            checkProductQty(product_id, qty).done(function (data) {
                if (data.status == 200) {
                    $('.check-out-btn').removeClass('not-click')
                    updateCart(product_id, qty);
                    cart()
                } else {
                    $('.check-out-btn').addClass('not-click')
                    current.parent().parent().find('.qty_error').html(data.message);
                }
            });

        }

    });

    window.openCart = function () {
        document.getElementById("cart_side").classList.add('open-side');
        loadCart()
    }
    window.closeCart = function () {
        document.getElementById("cart_side").classList.remove('open-side');
        loadCart()
    }
    cart();
    loadCart()
});
