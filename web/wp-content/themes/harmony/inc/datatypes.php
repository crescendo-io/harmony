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
