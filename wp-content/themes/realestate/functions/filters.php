<?php

namespace realestate;

function get_property_values()
{
    global $wpdb;
    $values = [
        'price' => [
            'min' => $wpdb->get_var("SELECT MIN(meta_value+0) FROM {$wpdb->postmeta} WHERE meta_key = 'price' AND post_id IN (SELECT ID FROM {$wpdb->posts} WHERE post_type = 'property' AND post_status = 'publish')"),
            'max' => $wpdb->get_var("SELECT MAX(meta_value+0) FROM {$wpdb->postmeta} WHERE meta_key = 'price' AND post_id IN (SELECT ID FROM {$wpdb->posts} WHERE post_type = 'property' AND post_status = 'publish')")
        ],
        'area' => [
            'min' => $wpdb->get_var("SELECT MIN(meta_value+0) FROM {$wpdb->postmeta} WHERE meta_key = 'area' AND post_id IN (SELECT ID FROM {$wpdb->posts} WHERE post_type = 'property' AND post_status = 'publish')"),
            'max' => $wpdb->get_var("SELECT MAX(meta_value+0) FROM {$wpdb->postmeta} WHERE meta_key = 'area' AND post_id IN (SELECT ID FROM {$wpdb->posts} WHERE post_type = 'property' AND post_status = 'publish')")
        ],
        'bedrooms' => [
            'min' => $wpdb->get_var("SELECT MIN(meta_value+0) FROM {$wpdb->postmeta} WHERE meta_key = 'bedrooms' AND post_id IN (SELECT ID FROM {$wpdb->posts} WHERE post_type = 'property' AND post_status = 'publish')"),
            'max' => $wpdb->get_var("SELECT MAX(meta_value+0) FROM {$wpdb->postmeta} WHERE meta_key = 'bedrooms' AND post_id IN (SELECT ID FROM {$wpdb->posts} WHERE post_type = 'property' AND post_status = 'publish')")
        ],
        'bathrooms' => [
            'min' => $wpdb->get_var("SELECT MIN(meta_value+0) FROM {$wpdb->postmeta} WHERE meta_key = 'bathrooms' AND post_id IN (SELECT ID FROM {$wpdb->posts} WHERE post_type = 'property' AND post_status = 'publish')"),
            'max' => $wpdb->get_var("SELECT MAX(meta_value+0) FROM {$wpdb->postmeta} WHERE meta_key = 'bathrooms' AND post_id IN (SELECT ID FROM {$wpdb->posts} WHERE post_type = 'property' AND post_status = 'publish')")
        ],
    ];
    return $values;
}
