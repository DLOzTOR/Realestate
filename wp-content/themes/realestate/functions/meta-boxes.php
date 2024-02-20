<?php
function custom_post_edit_form_tag()
{
    echo ' enctype="multipart/form-data"';
}
add_action('post_edit_form_tag', 'custom_post_edit_form_tag');

function realestate_property_meta_boxes()
{
    add_meta_box(
        'images',
        'Images',
        'realestate_property_images',
        'property',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'realestate_property_meta_boxes');
function realestate_property_images($post)
{
    if (count($media_attachments = get_attached_media('image', $post)) > 0) {
        echo '<div><form method="post">';
        echo '<input type="hidden" name="post_id" value="' . $post->ID . '">';
        echo '<input type="submit" name="delete_all_attachment" value="Delete all images" style="background: red;">';
        echo '</form></div>';
        $media_attachments = get_attached_media('image', $post);
    }
    foreach ($media_attachments as $media_attachment) {
        $image_url = wp_get_attachment_url($media_attachment->ID);
        echo '<div>';
        echo '<img src="' . esc_url($image_url) . '" alt="image" style="width:300px; max-height:300px">';
        echo '<div><form method="post">';
        echo '<input type="hidden" name="delete_attachment_id" value="' . $media_attachment->ID . '">';
        echo '<input type="submit" name="delete_attachment" value="Delete image">';
        echo '</form></div>';
        echo '</div>';
    }

    echo '<label for"images[]">Add images</label>';
    echo '<input type="file" name="images[]" accept="image/*" multiple>';
}

if (isset($_POST['delete_attachment']) && isset($_POST['delete_attachment_id'])) {
    $delete_attachment_id = $_POST['delete_attachment_id'];

    $deleted = wp_delete_attachment($delete_attachment_id, true);

    if ($deleted) {
        echo 'Изображение успешно удалено!';
    } else {
        echo 'Ошибка при удалении изображения.';
    }
}
if (isset($_POST['delete_all_attachment']) && isset($_POST['post_id'])) {
    $attachments = get_attached_media('', $_POST['post_id']);
    foreach ($attachments as $attachment) {
        $attachment_id = $attachment->ID;
        wp_delete_attachment($attachment_id, true);
    }
}
function realestate_property_save_images($post_id)
{
    if (isset($_FILES['images'])) {
        $files = $_FILES['images'];
        $length = count($files['name']);
        foreach ($files['name'] as $key => $value) {
            $file = array(
                'name'      => $files['name'][$key],
                'type'      => $files['type'][$key],
                'full_path' => $files['full_path'][$key],
                'tmp_name'  => $files['tmp_name'][$key],
                'error'     => $files['error'][$key],
                'size'      => $files['size'][$key],
            );
            $_FILES['images' . $key] = $file;
            $attachment_id = media_handle_upload("images" . $key, $post_id);
            if (!is_wp_error($attachment_id)) {
                add_post_meta($post_id, 'images', $attachment_id);
            }
        }
    }
}
add_action('save_post', 'realestate_property_save_images');
