$(document).ready(function () {

    $('#store_category').click(function () {
        var formData = document.getElementById("category_form");
        $.ajax({
            url: '/category/store',
            type: 'POST',
            contentType: false,
            cache: false,
            processData: false,
            data: new FormData(formData),
            success: function (data) {
                // Successful POST
                // do whatever you want
                console.log(data)
                if (data.status == '200') {
                    $('#categoryModal').modal('hide');
                    $('#error_category_name').html('');
                    $('#error_category_image').html('');
                    $('#category_form')[0].reset();
                    window.location.reload()
                }
            },
            error: function (data) {
                // Something went wrong
                // HERE you can handle asynchronously the response
                var errors = data.responseJSON;

                showErrors(errors);
            }
        });
    })

    var table = $('.category_datatable').DataTable();

    $(document).on('click','.edit-category', function (){
        let id=$(this).attr('cat-id');
        let category_name=$(this).attr('cat');
        let status=$(this).attr('status');
        $('#category_id').val(id);
        $('#category_name').val(category_name);

        if(status == '1')
        {
            $('#category-status-active').prop('checked', true);
        }else{

            $('#category-status-inactive').prop('checked', true);
        }

        $('#categoryModal').modal('show');

    })

})
