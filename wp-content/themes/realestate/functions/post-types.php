<?php
require_once ABSPATH . 'wp-admin/includes/image.php';
require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/media.php';
function realestate_register_post_type_property()
{
    $cities_labels = array(
        'name'              => esc_html_x('Cities', 'taxonomy general name', 'textdomain'),
        'singular_name'     => esc_html_x('City', 'taxonomy singular name', 'textdomain'),
        'search_items'      => esc_html__('Search Cities', 'textdomain'),
        'all_items'         => esc_html__('All Cities', 'textdomain'),
        'view_item'         => esc_html__('View City', 'textdomain'),
        'parent_item'       => esc_html__('Parent City', 'textdomain'),
        'parent_item_colon' => esc_html__('Parent City:', 'textdomain'),
        'edit_item'         => esc_html__('Edit City', 'textdomain'),
        'update_item'       => esc_html__('Update City', 'textdomain'),
        'add_new_item'      => esc_html__('Add New City', 'textdomain'),
        'new_item_name'     => esc_html__('New City Name', 'textdomain'),
        'not_found'         => esc_html__('No Cities Found', 'textdomain'),
        'back_to_items'     => esc_html__('Back to Cities', 'textdomain'),
        'menu_name'         => esc_html__('Cities', 'textdomain'),
    );

    $cities_args = array(
        'labels'            => $cities_labels,
        'hierarchical'      => true,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'city'),
        'show_in_rest'      => true,
    );

    register_taxonomy('cities', array('property'),  $cities_args);

    $features_labels = array(
        'name'              => esc_html_x('Features', 'taxonomy general name', 'textdomain'),
        'singular_name'     => esc_html_x('Feature', 'taxonomy singular name', 'textdomain'),
        'search_items'      => esc_html__('Search Features', 'textdomain'),
        'all_items'         => esc_html__('All Features', 'textdomain'),
        'view_item'         => esc_html__('View Feature', 'textdomain'),
        'parent_item'       => esc_html__('Parent Feature', 'textdomain'),
        'parent_item_colon' => esc_html__('Parent Feature:', 'textdomain'),
        'edit_item'         => esc_html__('Edit Feature', 'textdomain'),
        'update_item'       => esc_html__('Update Feature', 'textdomain'),
        'add_new_item'      => esc_html__('Add New Feature', 'textdomain'),
        'new_item_name'     => esc_html__('New Feature Name', 'textdomain'),
        'not_found'         => esc_html__('No Features Found', 'textdomain'),
        'back_to_items'     => esc_html__('Back to Features', 'textdomain'),
        'menu_name'         => esc_html__('Features', 'textdomain'),
    );

    $features_args = array(
        'labels'            => $features_labels,
        'hierarchical'      => true,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'feature'),
        'show_in_rest'      => true,
    );

    register_taxonomy('features', array('property'), $features_args);

    $status_labels = array(
        'name'              => esc_html_x('Status', 'taxonomy general name', 'textdomain'),
        'singular_name'     => esc_html_x('Status', 'taxonomy singular name', 'textdomain'),
        'search_items'      => esc_html__('Search Status', 'textdomain'),
        'all_items'         => esc_html__('All Statuses', 'textdomain'),
        'view_item'         => esc_html__('View Status', 'textdomain'),
        'parent_item'       => esc_html__('Parent Status', 'textdomain'),
        'parent_item_colon' => esc_html__('Parent Status:', 'textdomain'),
        'edit_item'         => esc_html__('Edit Status', 'textdomain'),
        'update_item'       => esc_html__('Update Status', 'textdomain'),
        'add_new_item'      => esc_html__('Add New Status', 'textdomain'),
        'new_item_name'     => esc_html__('New Status Name', 'textdomain'),
        'not_found'         => esc_html__('No Statuses Found', 'textdomain'),
        'back_to_items'     => esc_html__('Back to Statuses', 'textdomain'),
        'menu_name'         => esc_html__('Statuses', 'textdomain'),
    );

    $status_args = array(
        'labels'            => $status_labels,
        'hierarchical'      => true,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'status'),
        'show_in_rest'      => true,
    );

    register_taxonomy('status', array('property'), $status_args);

    register_post_type(
        'property',
        array(
            'label' => esc_html__('Property', 'realestate'),
            'public' => true,
            'show_in_menu' => true,
            'has_archive' => true,
            'supports' => array(
                'title',
                'editor',
                'thumbnail',
                'custom-fields',
                'excerpt',
                'author'
            ),
            'rewrite' => array('slug' => 'properties'),
        )
    );
}
add_action('init', 'realestate_register_post_type_property');

//pagination
add_action('pre_get_posts', function ($query) {
    if (is_post_type_archive('property')) $query->set('posts_per_page', isset($_GET['per_page']) ? intval($_GET['per_page']) : 6);
});
