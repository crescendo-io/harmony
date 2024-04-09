jQuery(document).ready(function ($) {
    // Login
    $('#login-form').on('submit', function (e) {
        e.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: ParamsData.wp_ajax_url,
            data: {
                action: 'custom_login', // Action personnalisée
                formData: formData // Données du formulaire
            },
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    window.location.href = response.redirect;
                } else {
                    $('#login-message').html('<p class="error">' + response.message + '</p>');
                }
            },
            error: function () {
                $('#login-message').html('<p class="error">Une erreur s\'est produite. Veuillez réessayer.</p>');
            }
        });
    });


    // Reset password
    $('#reset-password-form').on('submit', function (e) {
        e.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: ParamsData.wp_ajax_url,
            data: {
                action: 'custom_reset_password', // Action personnalisée
                formData: formData // Données du formulaire
            },
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    $('#reset-password-message').html('<p class="success">' + response.message + '</p>');
                } else {
                    $('#reset-password-message').html('<p class="error">' + response.message + '</p>');
                }
            },
            error: function () {
                $('#reset-password-message').html('<p class="error">Une erreur s\'est produite. Veuillez réessayer.</p>');
            }
        });
    });


    // Fake Select

    $('.fake-select').click(function(){
        $(this).toggleClass('open');
    });

    $(document).mouseup(function(e)
    {
        var container = $(".fake-select");

        // if the target of the click isn't the container nor a descendant of the container
        if (!container.is(e.target) && container.has(e.target).length === 0)
        {
            $(".fake-select").removeClass('open');
        }
    });



});