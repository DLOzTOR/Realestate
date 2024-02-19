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
//Change wordpress media_handle_upload for my purposes
function realestate_media_handle_upload_array($fileInfo, $post_id, $post_data = array(), $overrides = array('test_form' => false))
{
    $time = current_time('mysql');
    $post = get_post($post_id);

    if ($post) {
        // The post date doesn't usually matter for pages, so don't backdate this upload.
        if ('page' !== $post->post_type && substr($post->post_date, 0, 4) > 0) {
            $time = $post->post_date;
        }
    }

    $file = wp_handle_upload($fileInfo, $overrides, $time);

    if (isset($file['error'])) {
        return new WP_Error('upload_error', $file['error']);
    }

    $name = $fileInfo['name'];
    $ext  = pathinfo($name, PATHINFO_EXTENSION);
    $name = wp_basename($name, ".$ext");

    $url     = $file['url'];
    $type    = $file['type'];
    $file    = $file['file'];
    $title   = sanitize_text_field($name);
    $content = '';
    $excerpt = '';

    if (str_starts_with($type, 'image/')) {
        $image_meta = wp_read_image_metadata($file);

        if ($image_meta) {
            if (trim($image_meta['title']) && !is_numeric(sanitize_title($image_meta['title']))) {
                $title = $image_meta['title'];
            }

            if (trim($image_meta['caption'])) {
                $excerpt = $image_meta['caption'];
            }
        }
    }

    // Construct the attachment array.
    $attachment = array_merge(
        array(
            'post_mime_type' => $type,
            'guid'           => $url,
            'post_parent'    => $post_id,
            'post_title'     => $title,
            'post_content'   => $content,
            'post_excerpt'   => $excerpt,
        ),
        $post_data
    );

    // This should never be set as it would then overwrite an existing attachment.
    unset($attachment['ID']);

    // Save the data.
    $attachment_id = wp_insert_attachment($attachment, $file, $post_id, true);

    if (!is_wp_error($attachment_id)) {
        /*
		 * Set a custom header with the attachment_id.
		 * Used by the browser/client to resume creating image sub-sizes after a PHP fatal error.
		 */
        if (!headers_sent()) {
            header('X-WP-Upload-Attachment-ID: ' . $attachment_id);
        }

        /*
		 * The image sub-sizes are created during wp_generate_attachment_metadata().
		 * This is generally slow and may cause timeouts or out of memory errors.
		 */
        wp_update_attachment_metadata($attachment_id, wp_generate_attachment_metadata($attachment_id, $file));
    }

    return $attachment_id;
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
        foreach ($files['name'] as $key => $value) {
            $file = array(
                'name'     => $files['name'][$key],
                'type'     => $files['type'][$key],
                'tmp_name' => $files['tmp_name'][$key],
                'error'    => $files['error'][$key],
                'size'     => $files['size'][$key],
            );
            $attachment_id = realestate_media_handle_upload_array($file, $post_id);
            if (!is_wp_error($attachment_id)) {
                add_post_meta($post_id, 'images', $attachment_id);
            }
        }
    }
}
add_action('save_post', 'realestate_property_save_images');
