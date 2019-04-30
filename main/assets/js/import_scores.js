$(document).ready(function () {

    $('#import-grades').on('submit', function (e) {
        e.preventDefault();

        
        $.ajax({
            type: 'post',
            url: '../classes/import_scores.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {

                $(".form.grades").addClass('loading');
                $('.submit').attr('disabled', true);
            },
            complete: function (data) {

            },
            error: function (e) {
                console.log(e.status);
                console.log(e.statusText);

            },
            success: function (data) {
                $(".form.grades").removeClass('loading');
                $(".form.grades").fadeOut();
                $(".response1").show();
                $(".response1").fadeIn(900000).show(function ()
                {
                    $(".response1").html(data);

                });
            }
        });
    });
});
