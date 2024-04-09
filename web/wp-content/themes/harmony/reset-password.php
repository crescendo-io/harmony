<?php
/*
Template Name: Reset password
*/
get_header();

?>

    <div class="container-form-login">
        <div class="container-form">
            <img src="<?= get_template_directory_uri(); ?>/assets/img/logo-intro.svg" alt="">
            <form id="reset-password-form">
                <div id="reset-password-message"></div>
                <input type="text" name="user_login" placeholder="Nom d'utilisateur ou adresse email" required>
                <button type="submit">Réinitialiser le mot de passe</button>
            </form>
        </div>

        <a href="<?= get_site_url(); ?>" class="forget-link">Me connecter</a>
    </div>


<?php
get_footer();
