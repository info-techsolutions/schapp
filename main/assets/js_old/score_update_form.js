$(document).ready(function () {

    $('#score-update-form').on('submit', function (e) {
        e.preventDefault();

        if (($('#score').val()) === '') {
            alert('You did not choose a subject');
            $('#score').focus()
            return false;
        }
    
        $.ajax({
            type: 'post',
            url: '../classes/score_update_processing.php',
//                    data: $('#product-form').serialize(),
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {

                $("form").addClass('loading');
                $('#submit').attr('disabled', false);
            },
            complete: function (data) {

            },
            error: function (e) {
                console.log(e.status);
                console.log(e.statusText);

            },
            success: function (data) {
                $("form").removeClass('loading');
                $("form").fadeOut();
                $(".message").show();
                $(".message").fadeIn(900000).show(function ()
                {
                    $(".message").html(data);

                });
            }
        });
    });
});
