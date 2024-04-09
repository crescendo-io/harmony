<?php
add_action('wp_ajax_example', 'example_callback');
add_action('wp_ajax_nopriv_example', 'example_callback');
function example_callback() {
    // Security
    checkNonce('exampleNonce');

    $var = isset($_POST['var']) ? filter_var($_POST['var'], FILTER_SANITIZE_STRING) : '';

    if (!empty($var)) {
        $response['status'] = 200;
        ob_start();
        ?>

        <!-- HTML -->
        
        <?php
        $response['content'] = ob_get_clean();
        $message = '';
    } else {
        $response['status'] = 300;
        $message = '';
    }

    $response['message'] = $message;
    wp_send_json($response);
}

add_action('wp_ajax_rgpd', 'rgpd_callback');
add_action('wp_ajax_nopriv_rgpd', 'rgpd_callback');
function rgpd_callback() {
    // Security
    checkNonce('securite_nonce_rgpd');

    /**
     * Si inexistante, on créée la table SQL "commissions" après l'activation du thème
     */
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();

    $rgpd_table_name = $wpdb->prefix . 'rgpd';

    $create_table_rgpd_sql = "CREATE TABLE IF NOT EXISTS $rgpd_table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        ip varchar(45) DEFAULT NULL,
        time timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL,
        PRIMARY KEY  (id)
   ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($create_table_rgpd_sql);

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    $wpdb->get_results("INSERT INTO $rgpd_table_name (ip, time) VALUES ('$ip', (SELECT TIMESTAMP(\"YYYY-MM-DD\", \"HH:MM\")));");

    $response['status'] = 200;
    $response['message'] = "OK";

    wp_send_json($response);
}



function custom_login() {
    // Initialiser la réponse JSON
    $response = array();

    // Vérifie si les données du formulaire sont envoyées
    if (isset($_POST['action']) && $_POST['action'] == 'custom_login') {
        // Récupère les données du formulaire
        parse_str($_POST['formData'], $formData); // Convertit les données du formulaire en tableau associatif
        $username = sanitize_text_field($formData['username']);
        $password = $formData['password'];

        // Tente de connecter l'utilisateur
        $user = wp_signon(array(
            'user_login'    => $username,
            'user_password' => $password,
            'remember'      => true,
        ), false);

        // Vérifie si la connexion a réussi
        if (is_wp_error($user)) {
            // Erreur de connexion
            $response['success'] = false;
            $response['message'] = 'Identifiant ou mot de passe incorrect.';
        } else {
            // Connexion réussie
            $response['success'] = true;
            $response['redirect'] = home_url();
        }
    } else {
        // Si l'action n'est pas valide
        $response['success'] = false;
        $response['message'] = 'Action invalide.';
    }

    // Renvoyer la réponse JSON
    wp_send_json($response);
}

// Ajoute la fonction à l'action "wp_ajax" pour les utilisateurs connectés et non connectés
add_action('wp_ajax_custom_login', 'custom_login');
add_action('wp_ajax_nopriv_custom_login', 'custom_login');

function custom_reset_password() {
    // Initialiser la réponse JSON
    $response = array();

    // Vérifie si les données du formulaire sont envoyées
    if (isset($_POST['action']) && $_POST['action'] == 'custom_reset_password') {
        // Récupère les données du formulaire
        parse_str($_POST['formData'], $formData);
        $user_login = sanitize_text_field($formData['user_login']);


        // Récupère l'ID utilisateur en fonction du nom d'utilisateur ou de l'email
        $user = get_user_by('login', $user_login);
        if (!$user) {
            $user = get_user_by('email', $user_login);
        }


        if (!$user) {
            // L'utilisateur n'existe pas
            $response['success'] = false;
            $response['message'] = 'Utilisateur introuvable.';
        } else {
            // Génère un jeton de réinitialisation de mot de passe
            $reset_key = get_password_reset_key($user);

            // Envoie l'email de réinitialisation de mot de passe
            $reset_link = '<a href="' . esc_url(network_site_url("wp-login.php?action=rp&key=$reset_key&login=" . rawurlencode($user_login), 'login')) . '">Cliquez ici</a>';
            $message = sprintf('Bonjour %s, pour réinitialiser votre mot de passe, veuillez %s.', $user->display_name, $reset_link);
            $mailed = wp_mail($user->user_email, 'Réinitialisation de mot de passe', $message);

            if ($mailed) {
                // Email envoyé avec succès
                $response['success'] = true;
                $response['message'] = 'Un lien de réinitialisation de mot de passe a été envoyé à votre adresse email.';
            } else {
                // Erreur lors de l'envoi de l'email
                $response['success'] = false;
                $response['message'] = 'Une erreur s\'est produite lors de l\'envoi de l\'email. Veuillez réessayer.';
            }
        }
    } else {
        // Si l'action n'est pas valide
        $response['success'] = false;
        $response['message'] = 'Action invalide.';
    }

    // Renvoyer la réponse JSON
    wp_send_json($response);
}

// Ajouter la fonction à l'action "wp_ajax" pour les utilisateurs connectés et non connectés
add_action('wp_ajax_custom_reset_password', 'custom_reset_password');
add_action('wp_ajax_nopriv_custom_reset_password', 'custom_reset_password');
