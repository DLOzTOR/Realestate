<?php
/*
* Template name: User profile
*/
realestate\redirect_if_not_logged_in();
$user = get_userdata(get_current_user_id());
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['first-name'])) {
        $user->first_name = sanitize_text_field($_POST['first-name']);
    }
    if (isset($_POST['last-name'])) {
        $user->last_name = sanitize_text_field($_POST['last-name']);
    }
    if (isset($_POST['email'])) {
        $user->user_email = sanitize_email($_POST['email']);
    }
    if (isset($_FILES['avatar'])) {
        $image_id = get_user_meta($user->ID, 'avatar', true);
        if (!empty($image_id)) {
            wp_delete_attachment($image_id, true);
        }
        realestate\update_user_avatar($user->ID);
    }
    if (isset($_POST['delete'])) {
        $author_id = get_post_field('post_author', $_POST['delete_post_id']);
        if ($author_id == $user->ID) {
            wp_delete_post($_POST['delete_post_id']);
        }
    }
}
if (!is_user_logged_in()) {
    wp_redirect(home_url());
    exit();
}
get_header();
?>
<div class="page-head">
    <div class="container">
        <div class="row">
            <div class="page-head-content">
                <h1 class="page-title">Hello :
                    <span class="orange strong">
                        <?php
                        echo $user->first_name . ' ' . $user->last_name;
                        ?>
                    </span>
                </h1>
            </div>
        </div>
    </div>
</div>
<!-- End page header -->

<!-- property area -->
<div class="content-area user-profiel" style="background-color: #FCFCFC;">&nbsp;
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1 profiel-container">

                <form action="#" method="post" enctype="multipart/form-data">
                    <div class="profiel-header">
                        <h3>
                            <b>BUILD</b> YOUR PROFILE <br>
                            <small>This information will let us know more about you.</small>
                        </h3>
                        <hr>
                    </div>

                    <div class="clear">
                        <div class="col-sm-3 col-sm-offset-1">
                            <div class="picture-container">
                                <div class="picture" style="display: flex; align-items: center;">
                                    <img src="<?php if (isset(get_user_meta($user->ID)['avatar'])) echo wp_get_attachment_url(get_user_meta($user->ID)['avatar'][0]) ?>" width="100%" height="100%" class="picture-src" id="wizardPicturePreview" title="" />
                                    <input name="avatar" type="file" id="wizard-picture">
                                </div>
                                <h6>Choose Picture</h6>
                            </div>
                        </div>
                        <br>
                        <div class="col-sm-3 padding-top-25">

                            <div class="form-group">
                                <label>First Name</label>
                                <input name="first-name" type="text" class="form-control" value="<?= $user->first_name ?>">
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input name="email" type="email" class="form-control" value="<?= $user->user_email ?>">
                            </div>
                        </div>
                        <div class="col-sm-3 padding-top-25">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input name="last-name" type="text" class="form-control" value="<?= $user->last_name ?>">
                            </div>
                        </div>
                    </div>

                    <div class=" col-sm-5 col-sm-offset-1">
                        <br>
                        <input type='submit' class='btn btn-finish btn-primary' name='submit' value='Update' />
                    </div>
                    <br>
                </form>

            </div>
        </div><!-- end row -->

    </div>
</div>
<?php
$paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
$args = array(
    'post_type' => 'property',
    'author' => get_current_user_id(),
    'posts_per_page' => 10,
    'paged' => $paged,
);
$query = new WP_Query($args);
if ($query->have_posts()) { ?>
    <div class="content-area recent-property" style="background-color: #FFF;">

        <div class="container">
            <br>
            <h3 style="text-align: center;">
                <strong>Your properties</strong>
            </h3>
            <div class="row" style="display: flex; flex-direction: colum; justify-content: center;">

                <div class="col-md-9 pr-30  properties-page user-properties">
                    <div class="section">
                        <div id="list-type" class="proerty-th-list">
                            <?php


                            while ($query->have_posts()) {
                                $query->the_post();
                                get_template_part('template-parts/property', 'card');
                            }
                            wp_reset_postdata();

                            ?>
                        </div>
                    </div>
                    <div class="section">
                        <div class="pull-right">
                            <div class="pagination">
                                <ul><?php
                                    $big = 999999999;
                                    echo paginate_links(array(
                                        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                                        'format' => '?paged=%#%',
                                        'current' => max(1, get_query_var('paged')),
                                        'total' => $query->max_num_pages,
                                        'type' => 'list',
                                        'prev_text' => 'Prev',
                                        'next_text' => 'Next'
                                    )); ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
<?php } ?>

<?php
get_footer();
?>