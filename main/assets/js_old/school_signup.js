$(document).ready(function () {

    $('#sch-form').on('submit', function (e) {
        e.preventDefault();

        if (($('#name').val()) === '') {
            alert('You did not enter a school name');
            $('#name').focus()
            return false;
        }
        
        if (($('#email').val()) === '') {
            alert('You did not type an email');
            $('#email').focus()
            return false;
        }

        if ($('#user').val() === '') {
            alert('Please enter a username');
            $('#user').focus()
            return false;
        }
        
        if ($('#pass').val() === '') {
            alert('Please enter a password');
            $('#pass').focus()
            return false;
        }


        if (($('#address').val()) === '') {
            alert('Please provide an address.');
            $('#address').focus()
            return false;
        }



        $.ajax({
            type: 'post',
            url: '../classes/school_processing.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {

                $(".schoolForm").addClass('loading');
                $('.submit').attr('disabled', false);
            },
            complete: function (data) {

            },
            error: function (e) {
                console.log(e.status);
                console.log(e.statusText);

            },
            success: function (data) {
                $(".schoolForm").removeClass('loading');
                $(".schoolForm").fadeOut();
                $(".message").show();
                $(".message").fadeIn(900000).show(function ()
                {
                    $(".message").html(data);

                });
            }
        });
    });
});
