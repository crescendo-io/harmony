<?php
function is_login_page() {
    return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
}

function checkNonce($nonceContext) {
    $nonce = isset($_POST['nonce']) ? sanitize_text_field($_POST['nonce']) : 0;
    if (!wp_verify_nonce($nonce, $nonceContext)) {
        exit(__('not authorized', 'domain'));
    }
}

function dateMonthInFr($date) {
    $english_months = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec');
    $french_months = array('Janv', 'Févr', 'Mars', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sept', 'Oct', 'Nov', 'Déc');
    return str_replace($english_months, $french_months,  $date);
}



function lsdGetTemplatePart($folder = '', $slug='', $name='', $args = '') {

    if (!empty($args)) {
        set_query_var('args', $args);
    }

    get_template_part('template-parts/'. $folder . '/' .  $slug .'', $name, $args);


}


// Attacher la fonction à l'initialisation de WordPress
add_action('init', 'redirect_if_logged_in');

// Fonction pour vérifier si l'utilisateur est connecté et effectuer une redirection
function redirect_if_logged_in() {
    // Vérifie si l'utilisateur est connecté

    $post_id = url_to_postid($_SERVER['REQUEST_URI']);


    if (!is_admin() && !is_login()) {
        if (!is_user_logged_in() && $post_id != 28 && $post_id != 25) {
            // Redirection vers une URL spécifique
            wp_redirect(home_url('/login/')); // Remplacez '/dashboard' par l'URL vers laquelle vous souhaitez rediriger
            exit;
        }
        if (is_user_logged_in() && $post_id == 28 || is_user_logged_in() && $post_id == 25) {
            wp_redirect(home_url('/')); // Remplacez '/dashboard' par l'URL vers laquelle vous souhaitez rediriger
            exit;
        }
    }

}

