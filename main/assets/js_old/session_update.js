$(document).ready(function () {

    $('#session-form').on('submit', function (e) {
        e.preventDefault();

        if (($('#time_opened').val()) === '') {
            alert('Select something');
            $('#time_opened').focus()
            return false;
        }
    
    	
    	
        $.ajax({
            type: 'post',
            url: '../classes/session_update_processing.php',
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
