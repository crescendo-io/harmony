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
            echo json_encode(array('success' => false, 'message' => 'Identifiant ou mot de passe incorrect.'));
        } else {
            // Connexion réussie
            echo json_encode(array('success' => true, 'redirect' => home_url()));
        }

        // Arrête l'exécution du script
        die();
    }
}

// Ajoute la fonction à l'action "wp_ajax" pour les utilisateurs connectés et non connectés
add_action('wp_ajax_custom_login', 'custom_login');
add_action('wp_ajax_nopriv_custom_login', 'custom_login');
