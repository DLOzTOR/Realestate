<?php
function realestate_enqueue_style()
{
    wp_enqueue_style('google-fonts', 'http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800', array(), '1.0', false);
    wp_enqueue_style('realestate-normalize', get_template_directory_uri() . '/assets/css/normalize.css', array(), '1.0', false);
    wp_enqueue_style('realestate-font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array('realestate-normalize'), '1.0', false);
    wp_enqueue_style('realestate-fontello', get_template_directory_uri() . '/assets/css/fontello.css', array('realestate-normalize', 'realestate-font-awesome'), '1.0', false);
    wp_enqueue_style('realestate-pe-icon-7-stroke', get_template_directory_uri() . '/assets/fonts/icon-7-stroke/css/pe-icon-7-stroke.css', array('realestate-normalize', 'realestate-font-awesome', 'realestate-fontello'), '1.0', false);
    wp_enqueue_style('realestate-helper', get_template_directory_uri() . '/assets/fonts/icon-7-stroke/css/helper.css', array('realestate-normalize', 'realestate-font-awesome', 'realestate-fontello', 'realestate-pe-icon-7-stroke'), '1.0', false);
    wp_enqueue_style('realestate-animate', get_template_directory_uri() . '/assets/css/animate.css', array('realestate-normalize', 'realestate-font-awesome', 'realestate-fontello', 'realestate-pe-icon-7-stroke', 'realestate-helper'), '1.0', false);
    wp_enqueue_style('bootstrap-select', get_template_directory_uri() . '/assets/css/bootstrap-select.min.css', array('realestate-normalize', 'realestate-font-awesome', 'realestate-fontello', 'realestate-pe-icon-7-stroke', 'realestate-helper', 'realestate-animate'), '1.0', false);
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css', array(), '1.0', false);
    wp_enqueue_style('realestate-icheck', get_template_directory_uri() . '/assets/css/icheck.min_all.css', array(), '1.0', false);
    wp_enqueue_style('realestate-price-range', get_template_directory_uri() . '/assets/css/price-range.css', array(), '1.0', false);
    wp_enqueue_style('realestate-owl-carouse', get_template_directory_uri() . '/assets/css/owl.carousel.css', array(), '1.0', false);
    wp_enqueue_style('realestate-owl-theme', get_template_directory_uri() . '/assets/css/owl.theme.css', array(), '1.0', false);
    wp_enqueue_style('realestate-owl-transitions', get_template_directory_uri() . '/assets/css/owl.transitions.css', array(), '1.0', false);
    wp_enqueue_style('realestate-wizard', get_template_directory_uri() . '/assets/css/wizard.css', array(), '1.0', false);
    wp_enqueue_style('realestate-style', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0', false);
    wp_enqueue_style('realestate-responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(), '1.0', false);
    wp_enqueue_style('lightslider', get_template_directory_uri() . '/assets/css/lightslider.min.css', array(), '1.0', false);

    wp_enqueue_style('realestate-style', get_stylesheet_uri(), array(), _S_VERSION);
    wp_style_add_data('realestate-style', 'rtl', 'replace');
}
add_action('wp_enqueue_scripts', 'realestate_enqueue_style');

function realestate_enqueue_script()
{
    wp_enqueue_script('modernizr-2.6.2', get_template_directory_uri() . '/assets/js/modernizr-2.6.2.min.js', array());
    wp_enqueue_script('jquery-1.10.2', get_template_directory_uri() . '/assets/js/jquery-1.10.2.min.js', array('modernizr-2.6.2'));
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('modernizr-2.6.2', 'jquery-1.10.2'));
    wp_enqueue_script('bootstrap-select', get_template_directory_uri() . '/assets/js/bootstrap-select.min.js', array('modernizr-2.6.2', 'jquery-1.10.2', 'bootstrap'));
    wp_enqueue_script('bootstrap-hover-dropdown', get_template_directory_uri() . '/assets/js/bootstrap-hover-dropdown.js', array('modernizr-2.6.2', 'jquery-1.10.2', 'bootstrap', 'bootstrap-select'));
    wp_enqueue_script('easypiechart', get_template_directory_uri() . '/assets/js/easypiechart.min.js', array('modernizr-2.6.2', 'jquery-1.10.2', 'bootstrap', 'bootstrap-select', 'bootstrap-hover-dropdown'));
    wp_enqueue_script('jquery.easypiechart', get_template_directory_uri() . '/assets/js/jquery.easypiechart.min.js', array('modernizr-2.6.2', 'jquery-1.10.2', 'bootstrap', 'bootstrap-select', 'bootstrap-hover-dropdown', 'easypiechart'));
    wp_enqueue_script('owl.carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('modernizr-2.6.2', 'jquery-1.10.2', 'bootstrap', 'bootstrap-select', 'bootstrap-hover-dropdown', 'easypiechart', 'jquery.easypiechart'));
    wp_enqueue_script('wow', get_template_directory_uri() . '/assets/js/wow.js', array('modernizr-2.6.2', 'jquery-1.10.2', 'bootstrap', 'bootstrap-select', 'bootstrap-hover-dropdown', 'easypiechart', 'jquery.easypiechart', 'owl.carousel'));
    wp_enqueue_script('icheck', get_template_directory_uri() . '/assets/js/icheck.min.js', array('modernizr-2.6.2', 'jquery-1.10.2', 'bootstrap', 'bootstrap-select', 'bootstrap-hover-dropdown', 'easypiechart', 'jquery.easypiechart', 'owl.carousel', 'wow'));
    wp_enqueue_script('price-range', get_template_directory_uri() . '/assets/js/price-range.js', array('modernizr-2.6.2', 'jquery-1.10.2', 'bootstrap', 'bootstrap-select', 'bootstrap-hover-dropdown', 'easypiechart', 'jquery.easypiechart', 'owl.carousel', 'wow', 'icheck'));
    wp_enqueue_script('jquery-bootstrap-wizard', get_template_directory_uri() . '/assets/js/jquery.bootstrap.wizard.js', array('modernizr-2.6.2', 'jquery-1.10.2', 'bootstrap', 'bootstrap-select', 'bootstrap-hover-dropdown', 'easypiechart', 'jquery.easypiechart', 'owl.carousel', 'wow', 'icheck'));
    wp_enqueue_script('jquery-validate', get_template_directory_uri() . '/assets/js/jquery.validate.min.js', array('modernizr-2.6.2', 'jquery-1.10.2', 'bootstrap', 'bootstrap-select', 'bootstrap-hover-dropdown', 'easypiechart', 'jquery.easypiechart', 'owl.carousel', 'wow', 'icheck', 'jquery-bootstrap-wizard'));
    wp_enqueue_script('realestate-wizard', get_template_directory_uri() . '/assets/js/wizard.js', array('modernizr-2.6.2', 'jquery-1.10.2', 'bootstrap', 'bootstrap-select', 'bootstrap-hover-dropdown', 'easypiechart', 'jquery.easypiechart', 'owl.carousel', 'wow', 'icheck', 'jquery-bootstrap-wizard', 'jquery-validate'));
    wp_enqueue_script('lightslider', get_template_directory_uri() . '/assets/js/lightslider.min.js', array('modernizr-2.6.2', 'jquery-1.10.2', 'bootstrap', 'bootstrap-select', 'bootstrap-hover-dropdown', 'easypiechart', 'jquery.easypiechart', 'owl.carousel', 'wow', 'icheck', 'jquery-bootstrap-wizard', 'jquery-validate'));
    wp_enqueue_script('realestate-main', get_template_directory_uri() . '/assets/js/main.js', array('modernizr-2.6.2', 'jquery-1.10.2', 'bootstrap', 'bootstrap-select', 'bootstrap-hover-dropdown', 'easypiechart', 'jquery.easypiechart', 'owl.carousel', 'wow', 'icheck', 'price-range'));
}
add_action('wp_footer', 'realestate_enqueue_script');

function realestate_enqueue_links()
{
    echo '<meta http-equiv="X-UA-Compatible" content="IE=edge">';
    echo '<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">';
    echo '<link rel="icon" href="favicon.ico" type="image/x-icon">';
}
add_action('wp_head', 'realestate_enqueue_links');
