<?php

namespace realestate;

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
