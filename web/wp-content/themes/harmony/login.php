<?php
/*
Template Name: Login
*/
get_header();

?>
    <div class="container-form-login">
        <div class="container-form">
            <img src="<?= get_template_directory_uri(); ?>/assets/img/logo-intro.svg" alt="">
            <form id="login-form" action="<?php echo esc_url(admin_url('admin-ajax.php')); ?>" method="post">
                <div id="login-message"></div>
                <input type="hidden" name="action" value="login">
                <input type="text" name="username" placeholder="Nom d'utilisateur" required>
                <input type="password" name="password" placeholder="Mot de passe" required>
                <button type="submit">Connexion</button>
            </form>
        </div>

        <a href="/reset-password/" class="forget-link">Mot de passe oublié ?</a>
    </div>
<?php
get_footer();

