$(document).ready(function () {

    $('.reset-store-form').click(function () {
        $("#store_form")[0].reset();
        $(".clear-error").html('');
    });

    $('#save_store').click(function () {
        var formData = document.getElementById("store_form");
        $.ajax({
            url: '/store/save',
            type: 'POST',
            contentType: false,
            cache: false,
            processData: false,
            data: new FormData(formData),
            success: function (response) {
                if (response.status == 200) {
                    $('#storeModal').modal('hide');
                    $('#error_name').html('');
                    $('#store_form')[0].reset();
                    window.location.reload()
                }
            },
            error: function (reject) {
                var response = $.parseJSON(reject.responseText);
                $.each(response.errors, function (key, val) {
                    console.log(val[0])
                    $("#" + key + "_error").text(val[0]);
                });
            }
        });
    })

    var table = $('.store_datatable').DataTable();

    $(document).on('click','.edit-store', function (){
        let id=$(this).attr('store-id');
        let storeName=$(this).attr('store-name');
        $('#store_id').val(id);
        $('#name').val(storeName);

        $('#storeModal').modal('show');

    });
});
