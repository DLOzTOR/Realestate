<?php

namespace realestate;

use WP_Term;

/**
 * Displays terms of a specified taxonomy using a custom callback function.
 *
 * This function retrieves all terms of the specified taxonomy and invokes the custom
 * callback function for each term.
 *
 * @param string $taxonomy  The name of the taxonomy.
 * @param callable $callback  The callback function to be invoked for each term.
 *                            The callback function should accept one argument - the term object (WP_Term).
 *                            For example: function my_callback(WP_Term $term) { /* your code * / }.
 * @return void
 */
function foreach_taxonomy_terms($taxonomy, $callback)
{
    $taxonomy_terms =  get_terms(array(
        'taxonomy' => $taxonomy,
        'hide_empty' => false,
    ));
    foreach ($taxonomy_terms as $term) {
        $callback($term);
    }
}

function set_select_droplist($value)
{
    if (isset($_GET['per_page']) && $_GET['per_page'] == $value)
        echo 'selected';
    elseif (!isset($_GET['per_page']) && $value == 6) {
        echo 'selected';
    }
}

function term_as_option(WP_Term $term)
{
?>
    <option value="<?= $term->term_id ?>"> <?= $term->name ?> </option>
    <?php
}
function header_buttons()
{
    if (is_user_logged_in()) : ?>
        <?php if (!is_page('submit-property')) { ?><button class="navbar-btn nav-button wow fadeInRight login" onclick=" window.location.replace('<?= get_site_url() . '/submit-property' ?>')" data-wow-delay="0.48s">Submit your property</button><?php } ?>
        <?php if (!is_page('profile')) { ?><button class="navbar-btn nav-button wow bounceInRight login" onclick=" window.location.replace('<?= get_site_url() . '/profile' ?>')" data-wow-delay="0.45s">Profile</button><?php } ?>
        <button class="navbar-btn nav-button wow bounceInRight" onclick=" window.location.replace('<?= wp_logout_url() ?>')" data-wow-delay="0.45s">Logout</button>
    <?php else : ?>
        <button class="navbar-btn nav-button wow bounceInRight login" onclick=" window.location.replace('<?= wp_login_url() ?>')" data-wow-delay="0.45s">Login</button>
<?php endif;
}
