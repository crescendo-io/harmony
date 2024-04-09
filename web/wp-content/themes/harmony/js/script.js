jQuery(document).ready(function ($) {
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
});