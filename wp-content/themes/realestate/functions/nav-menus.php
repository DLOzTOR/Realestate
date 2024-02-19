<?php
function realestate_register_nav_menus()
{
    register_nav_menus(array(
        'header_nav' => 'Header Menu',
        'footer_nav' => 'Footer Menu',
    ));
}
add_action('after_setup_theme', 'realestate_register_nav_menus');
