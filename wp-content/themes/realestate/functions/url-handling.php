<?php
function custom_login_url($login_url, $redirect)
{
    $custom_login_url = get_site_url() . '/login';

    return esc_url_raw(add_query_arg('', urlencode($redirect), $custom_login_url));
}
add_filter('login_url', 'custom_login_url', 10, 2);
