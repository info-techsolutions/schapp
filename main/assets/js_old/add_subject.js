$(document).ready(function () {

    $('#subject-form').on('submit', function (e) {
        e.preventDefault();

        if (($('#name').val()) === '') {
            alert('You did not enter a subject name');
            $('#name').focus()
            return false;
        }
       
        $.ajax({
            type: 'post',
            url: '../classes/add_subject_processing.php',
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
