$(document).ready(function () {

    $('.reset-color-form').click(function () {
        $("#color_form")[0].reset();
        $(".clear-error").html('');
    });

    $('#save_color').click(function () {
        var formData = document.getElementById("color_form");
        $.ajax({
            url: '/color/save',
            type: 'POST',
            contentType: false,
            cache: false,
            processData: false,
            data: new FormData(formData),
            success: function (response) {
                if (response.status == 200) {
                    $('#colorModal').modal('hide');
                    $('#error_name').html('');
                    $('#color_form')[0].reset();
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

    var table = $('.color_datatable').DataTable();

    $(document).on('click','.edit-color', function (){
        let id=$(this).attr('color-id');
        let colorName=$(this).attr('color-name');
        $('#color_id').val(id);
        $('#name').val(colorName);

        $('#colorModal').modal('show');

    });
});
