<?php
function remove_admin_bar()
{
    if (!current_user_can('administrator') && !is_admin()) {
        show_admin_bar(false);
    }
}
add_action('after_setup_theme', 'remove_admin_bar');

function restrict_admin_access()
{
    if (is_admin() && current_user_can('subscriber') && !wp_doing_ajax()) {
        wp_redirect(home_url());
        exit;
    }
}
add_action('init', 'restrict_admin_access');
