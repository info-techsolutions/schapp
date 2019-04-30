$(document).ready(function () {

    $('#import-students').on('submit', function (e) {
        e.preventDefault();

        
        $.ajax({
            type: 'post',
            url: '../classes/import_students.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {

                $(".form.students").addClass('loading');
                $('.submit').attr('disabled', true);
            },
            complete: function (data) {

            },
            error: function (e) {
                console.log(e.status);
                console.log(e.statusText);

            },
            success: function (data) {
                $(".form.students").removeClass('loading');
                $(".form.students").fadeOut();
                $(".response").show();
                $(".response").fadeIn(900000).show(function ()
                {
                    $(".response").html(data);

                });
            }
        });
    });
});
