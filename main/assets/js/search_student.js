$(document).ready(function () {

    $('#all-class-form').on('submit', function (e) {
        e.preventDefault();
        
        $.ajax({
            type: 'post',
            url: '../classes/fetch_all_student_class.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {

                $(".ui.form").addClass('loading');
            },
            complete: function (data) {

            },
            error: function (e) {
                console.log(e.status);
                console.log(e.statusText);

            },
            success: function (data) {
                $(".ui.form").removeClass('loading');
               // $(".ui.form").fadeOut();
                $(".message").show();
                $(".message").fadeIn(900000).show(function ()
                {
                    $(".message").html(data);

                });
            }
        });
    });
});
