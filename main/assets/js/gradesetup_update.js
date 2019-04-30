$(document).ready(function () {

    $('#gradesetup-form').on('submit', function (e) {
        e.preventDefault();

        if (($('#tos').val()) === '') {
            alert('No tos');
            $('#tos').focus()
            return false;
        }
         if (($('#froms').val()) === '') {
            alert('No froms');
            $('#froms').focus()
            return false;
        }
         if (($('#grade').val()) === '') {
            alert('No grade');
            $('#grade').focus()
            return false;
        }
         if (($('#remark').val()) === '') {
            alert('No remark');
            $('#remark').focus()
            return false;
        }
    
        $.ajax({
            type: 'post',
            url: '../classes/gradesetup_update_processing.php',
//                    data: $('#product-form').serialize(),
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {

                $(".ui.form").addClass('loading');
                $('.submit').attr('disabled', true);
            },
            complete: function (data) {

            },
            error: function (e) {
                console.log(e.status);
                console.log(e.statusText);

            },
            success: function (data) {
                $(".ui.form").removeClass('loading');
                $(".ui.form").fadeOut();
                $(".message").show();
                $(".message").fadeIn(900000).show(function ()
                {
                    $(".message").html(data);

                });
            }
        });
    });
});
