$(document).ready(function () {

    $('#admin-form').on('submit', function (e) {
        e.preventDefault();

        if (($('#firstname').val()) === '') {
            alert('You did not choose a firstname');
            $('#firstname').focus()
            return false;
        }
        
        

        if (($('#phone').val()) === '') {
            alert('Please provide a username.');
            $('#phone').focus()
            return false;
        }

        if ($('#lastname').val() === '') {
            alert('Please enter a username');
            $('#lastname').focus()
            return false;
        }


        if (($('#address').val()) === '') {
            alert('Please provide an address.');
            $('#address').focus()
            return false;
        }



        $.ajax({
            type: 'post',
            url: '../classes/admin_processing.php',
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
