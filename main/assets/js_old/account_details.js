$(document).on('submit', '#acct-form', function ()
{


    if (($('#bank').val()) === '') {
        alert('Please supply your Bank name.');
        $('#bank').focus()
        return false;
    }

   
    if ($('#number').val() === '') {
        alert('Account Number is required');
        $('#number').focus()
        return false;
    }

    if (($('#name').val()) === '') {
        alert('Account name is required.');
        $('#name').focus()
        return false;
    }


    var data = $(this).serialize();
    $.ajax({
        type: 'POST',
        url: '../classes/acct_processing.php',
        data: data,
        beforeSend: function () {
            console.log("Sending ...");
//             $("#foto-form").fadeOut(500).hide();

            $('.uploading').show();

        },
        success: function (data)
        {
            //$("#holla-form").fadeOut(500).hide(function()
            //{
            $(".message").fadeIn(500).show(function ()
            {
                //alert(data);
                $(".message").html(data);
            });
            //});
        },
        error: function (e) {
            console.log(e.status);
            console.log(e.statusText);
        },
        complete: function () {
            console.log("Completed");
            $('.uploading').hide();
            window.location = "index.php";

            
        }
    });
    return false;
});
