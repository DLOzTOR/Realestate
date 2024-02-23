<?php

namespace realestate;

function get_post_custom_field($field)
{
    return get_post_meta(get_the_ID(), $field, true);
}
function update_user_avatar($user_id)
{
    $attachment_id = media_handle_upload('avatar', 0);
    if (!is_wp_error($attachment_id)) {
        update_user_meta($user_id, 'avatar', $attachment_id);
    } else {
        error_log('wp_error' . "\n" . var_export($attachment_id));
    }
}
