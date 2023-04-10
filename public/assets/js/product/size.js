$(document).ready(function () {

    $('.reset-size-form').click(function () {
        $("#size_form")[0].reset();
        $(".clear-error").html('');
    });

    $('#save_size').click(function () {
        var formData = document.getElementById("size_form");
        $.ajax({
            url: '/size/save',
            type: 'POST',
            contentType: false,
            cache: false,
            processData: false,
            data: new FormData(formData),
            success: function (response) {
                if (response.status == 200) {
                    $('#sizeModal').modal('hide');
                    $('#error_name').html('');
                    $('#size_form')[0].reset();
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

    var table = $('.size_datatable').DataTable();
    $(document).on('click','.edit-size', function (){
        let id=$(this).attr('size-id');
        let size=$(this).attr('size-name');
        $('#size_id').val(id);
        $('#size').val(size);

        $('#sizeModal').modal('show');

    });
});
