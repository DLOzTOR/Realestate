<?php
/*
* Template name: Submit property
*/
realestate\redirect_if_not_logged_in();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = sanitize_text_field($_POST["property_name"]);
    $content = wp_kses_post($_POST["description"]);
    $thumbnail = $_FILES["thumbnail"];
    $meta = [];
    $meta['price'] = sanitize_text_field($_POST["price"]);
    $meta['bedrooms'] = sanitize_text_field($_POST["bedrooms"]);
    $meta['bathrooms'] = sanitize_text_field($_POST["bathrooms"]);
    $meta['area'] = sanitize_text_field($_POST["area"]);
    $meta['video'] = sanitize_text_field($_POST["video"]);
    if (isset($_POST["phone"])) {
        $meta['telephone'] = sanitize_text_field($_POST["phone"]);
    }
    if (empty($title) || empty($content)) {
    } else {
        $post_args = array(
            'post_title'    => $title,
            'post_content'  => $content,
            'post_status'   => 'publish',
            'post_type'     => 'property',
            'meta_input'    => $meta
        );

        $post_id = wp_insert_post($post_args);

        if ($post_id && isset($_POST['features']) && is_array($_POST['features'])) {
            $features = array_map('intval', array_map('sanitize_text_field', $_POST['features']));
            wp_set_object_terms($post_id, $features, 'features');
        }

        if ($post_id && !empty($_POST['cities'])) {
            $cities = intval(sanitize_text_field($_POST['cities']));
            wp_set_object_terms($post_id, $cities, 'cities');
        }
        if ($post_id && !empty($_POST['status'])) {
            $status = intval(sanitize_text_field($_POST['status']));
            wp_set_object_terms($post_id, $status, 'status');
        }
        if ($post_id) {
            if (!empty($thumbnail['name'])) {
                require_once(ABSPATH . 'wp-admin/includes/image.php');
                require_once(ABSPATH . 'wp-admin/includes/file.php');
                require_once(ABSPATH . 'wp-admin/includes/media.php');

                $attachment_id = media_handle_upload('thumbnail', $post_id);

                if (is_wp_error($attachment_id)) {
                    error_log("Image upload error: " . $attachment_id->get_error_message());
                } else {
                    set_post_thumbnail($post_id, $attachment_id);
                }
            }
            realestate_property_save_images($post_id);
            header('Location: ' . get_permalink($post_id));
            die;
        }
    }
}

get_header();
?>
<div class="page-head">
    <div class="container">
        <div class="row">
            <div class="page-head-content">
                <h1 class="page-title">Submit new property</h1>
            </div>
        </div>
    </div>
</div>
<!-- End page header -->

<!-- property area -->
<div class="content-area submit-property" style="background-color: #FCFCFC;">&nbsp;
    <div class="container">
        <div class="clearfix">
            <div class="wizard-container">

                <div class="wizard-card ct-wizard-orange" id="wizardProperty">
                    <form action="<?= get_site_url() . '/submit-property' ?>" method="post" enctype="multipart/form-data">
                        <div class="wizard-header">
                            <h3>
                                <b>Submit</b> YOUR PROPERTY <br>
                                <small>Lorem ipsum dolor sit amet, consectetur adipisicing.</small>
                            </h3>
                        </div>
                        <ul>
                            <li><a href="#step1" data-toggle="tab">Step 1 </a></li>
                            <li><a href="#step2" data-toggle="tab">Step 2 </a></li>
                            <li><a href="#step3" data-toggle="tab">Step 3 </a></li>
                            <li><a href="#step4" data-toggle="tab">Finished </a></li>
                        </ul>

                        <div class="tab-content">

                            <div class="tab-pane" id="step1">
                                <div class="row p-b-15  ">
                                    <h4 class="info-text"> Let's start with the basic information (with validation)</h4>
                                    <div class="col-sm-4 col-sm-offset-1">
                                        <div class="picture-container">
                                            <div class="picture">
                                                <img src="assets/img/default-property.jpg" class="picture-src" id="wizardPicturePreview" title="" />
                                                <input type="file" id="wizard-picture" name="thumbnail" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Property name <small>(required)</small></label>
                                            <input name="property_name" type="text" class="form-control" placeholder="Super villa ..." required>
                                        </div>

                                        <div class="form-group">
                                            <label>Property price <small>(required)</small></label>
                                            <input name="price" type="number" class="form-control" min="0" placeholder="3330000" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Telephone <small>(optional)</small></label>
                                            <input name="phone" type="tel" class="form-control" placeholder="+1 473 843 7436">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--  End step 1 -->

                            <div class="tab-pane" id="step2">
                                <h4 class="info-text"> How much your Property is Beautiful ? </h4>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Property Description :</label>
                                                <textarea name="description" class="form-control" required></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Property City :</label>
                                                <select id="lunchBegins" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Select city" name="cities" required>
                                                    <?php realestate\foreach_taxonomy_terms('cities', 'realestate\term_as_option') ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Property Status :</label>
                                                <select id="basic" class="selectpicker show-tick form-control" name="status" title="Select status" name="status" required>
                                                    <?php realestate\foreach_taxonomy_terms('status', 'realestate\term_as_option') ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 padding-top-15">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="property-geo">Bedrooms :</label>
                                                <input type="number" name="bedrooms" min="0" value="0" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="price-range">Bathrooms :</label>
                                                <input type="number" name="bathrooms" min="0" value="0" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="property-geo">Property area (m2) :</label>
                                                <input type="number" name="area" min="0" value="0" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 padding-top-15 padding-bottom-15">

                                        <?php realestate\foreach_taxonomy_terms('features', function ($term) {
                                        ?>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <div class="checkbox">
                                                        <label> <input type="checkbox" name="features[]" value="<?= $term->term_id ?>"> <?= $term->name ?> </label>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }) ?>
                                    </div>
                                </div>
                            </div>
                            <!-- End step 2 -->

                            <div class=" tab-pane" id="step3">
                                <h4 class="info-text">Give us somme images and videos ? </h4>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="property-images">Chose Images :</label>
                                            <input class="form-control" type="file" id="property-images" name="images[]" accept="image/*" multiple required>
                                            <p class="help-block">Select multipel images for your property .</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="property-video">Property video :</label>
                                            <input class="form-control" value="" placeholder="http://www.youtube.com, http://vimeo.com" name="video" type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--  End step 3 -->
                            <div class="tab-pane" id="step4">
                                <h4 class="info-text"> Finished and submit </h4>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="">
                                            <p>
                                                <label><strong>Terms and Conditions</strong></label>
                                                By accessing or using GARO ESTATE services, such as
                                                posting your property advertisement with your personal
                                                information on our website you agree to the
                                                collection, use and disclosure of your personal information
                                                in the legal proper manner
                                            </p>

                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" /> <strong>Accept termes and conditions.</strong>
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--  End step 4 -->

                        </div>

                        <div class="wizard-footer">
                            <div class="pull-right">
                                <input type='button' class='btn btn-next btn-primary' value='Next' />
                                <input type='submit' class='btn btn-finish btn-primary ' value='Finish' />
                            </div>

                            <div class="pull-left">
                                <input type='button' class='btn btn-previous btn-default' value='Previous' />
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
                <!-- End submit form -->
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
