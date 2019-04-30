$(document).ready(function () {

    $('#login-form').on('submit', function (e) {
        e.preventDefault();

       /*
        if ($('#username').val() === '') {
            alert('No username');
            $('#username').focus()
            return false;
        }


        if (($('#password').val()) === '') {
            alert('No password.');
            $('#password').focus()
            return false;
        }
        
        */


	var loginRequest = $.ajax({
		type: 'POST',
		url: '../inc/check_login1.php',
		data: { username: $('#username').val(), password:$('#password').val()},
		cache: false
	});
	
	// The jQuery object returned by $.ajax() is XMLHttpRequest (jqXHR) as of jQuery 1.5 is a superset of the browser's native XMLHttpRequest object. 
	// For example, it contains responseText and responseXML properties, as well as a getResponseHeader() method.
	
	loginRequest.done(function(data, textStatus, jqXHR){
		$(".message1").show();
                $(".message1").fadeIn(900000).show(function ()
                {
                    $(".message1").html(data);

                });
		
	});
	
	loginRequest.fail(function(jqXHR, textStatus, errorThrown){
		// alert( "We could not subscribe you please try again or contact us if the problem persists (" + textStatus +  ")." + jqXHR.responseText);
		console.log(textStatus);
		
	});

	
	loginRequest.always(function(data, textStatus, jqXHR){
		// alert( "You have successfully subscribed to our mailing list." );
		console.log(data);
	});
	
    });
});
