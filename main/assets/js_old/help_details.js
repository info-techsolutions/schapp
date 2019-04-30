$(document).on('submit', '#help-form', function ()
{


    if (($('#amount').val()) === '') {
        alert('Please supply your Bank name.');
        $('#amount').focus()
        return false;
    }


    var data = $(this).serialize();
    $.ajax({
        type: 'POST',
        url: '../classes/provide_help_processing.php',
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
            //window.location = "index.php";

            
        }
    });
    return false;
});
