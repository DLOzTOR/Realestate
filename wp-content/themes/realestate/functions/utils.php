<?php

namespace realestate;

function get_post_custom_field($field)
{
    return get_post_meta(get_the_ID(), $field, true);
}
