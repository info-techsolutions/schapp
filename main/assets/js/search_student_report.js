$(document).ready(function () {

    $('#search-student-report').on('submit', function (e) {
        e.preventDefault();
        
        $.ajax({
            type: 'post',
            url: '../classes/search_student_result.php',
//                    data: $('#product-form').serialize(),
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {

                $(".form").addClass('loading');
                $('.submit').attr('disabled', false);
            },
            complete: function (data) {
               // history.go(1);

            },
            error: function (e) {
                console.log(e.status);
                console.log(e.statusText);

            },
            success: function (data) {
                $(".form").removeClass('loading');
//                $("form").fadeOut();
                $(".message").show();
                $(".message").fadeIn(9000000).show(function ()
                {
                    $(".message").html(data);

                });
            }
        });
    });
});
