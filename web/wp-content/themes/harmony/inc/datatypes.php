<?php
// Enregistrement du type de publication personnalisé "tickets"
function create_tickets_post_type() {
    $labels = array(
        'name'               => __( 'Tickets' ),
        'singular_name'      => __( 'Ticket' ),
        'add_new'            => __( 'Add New Ticket' ),
        'add_new_item'       => __( 'Add New Ticket' ),
        'edit_item'          => __( 'Edit Ticket' ),
        'new_item'           => __( 'New Ticket' ),
        'all_items'          => __( 'All Tickets' ),
        'view_item'          => __( 'View Ticket' ),
        'search_items'       => __( 'Search Tickets' ),
        'not_found'          => __( 'No tickets found' ),
        'not_found_in_trash' => __( 'No tickets found in the Trash' ),
        'parent_item_colon'  => __( 'Parent Ticket:' ),
        'menu_name'          => __( 'Tickets' ),
    );

    $args = array(
        'labels'              => $labels,
        'description'         => __( 'Manage tickets' ),
        'public'              => true,
        'menu_position'       => 5,
        'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'revisions', 'custom-fields' ),
        'has_archive'         => true,
        'hierarchical'        => true, // Permet d'avoir des tickets enfants
        'rewrite'             => array( 'slug' => 'tickets' ),
    );

    register_post_type( 'tickets', $args );
}
add_action( 'init', 'create_tickets_post_type' );

// Fonction pour enregistrer la taxonomie
function custom_taxonomy() {
    $labels = array(
        'name'                       => _x( 'Projets', 'taxonomy general name' ),
        'singular_name'              => _x( 'Projet', 'taxonomy singular name' ),
        'search_items'               => __( 'Rechercher un projet' ),
        'all_items'                  => __( 'Tous les projets' ),
        'parent_item'                => __( 'Projet parent' ),
        'parent_item_colon'          => __( 'Projet parent :' ),
        'edit_item'                  => __( 'Modifier le projet' ),
        'update_item'                => __( 'Mettre à jour le projet' ),
        'add_new_item'               => __( 'Ajouter un nouveau projet' ),
        'new_item_name'              => __( 'Nouveau nom de projet' ),
        'menu_name'                  => __( 'Projets' ),
    );

    $args = array(
        'hierarchical'          => true, // La taxonomie est hiérarchique, comme les catégories par défaut
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'query_var'             => true,
        'rewrite'               => array( 'slug' => 'projets' ), // Slug pour l'URL
    );

    // Enregistrement de la taxonomie pour le type de publication "tache"
    register_taxonomy( 'projets', 'tickets', $args );
}
add_action( 'init', 'custom_taxonomy' );