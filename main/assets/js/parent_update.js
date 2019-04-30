$(document).ready(function () {

    $('#parent-form').on('submit', function (e) {
        e.preventDefault();

        if (($('#name').val()) === '') {
            alert('You did not choose a subject');
            $('#name').focus()
            return false;
        }
    
        var updateParent = $.ajax({
            type: 'post',
            url: '../classes/parent_update_processing.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false
            });
            
            updateParent.done(function(data, textStatus, jqXHR) {
                $("form").addClass('loading');
                $('.submit').attr('disabled', true);
                $("form").removeClass('loading');
                $("form").fadeOut();
                $(".message").show();
                $(".message").fadeIn(900000).show(function ()
                {
                    $(".message").html(data);

                });
            });
            
            updateParent.fail(function(jqXHR, textStatus, errorThrown){
		alert( "We could not subscribe you please try again or contact us if the problem persists (" + textStatus +  ")." + jqXHR.responseText);
		console.log(textStatus);
		});
		
		updateParent.always(function(data, textStatus, jqXHR){
			
		});
            
            
    });
});
