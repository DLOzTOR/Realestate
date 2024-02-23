<?php
get_header();
$user = get_userdata(get_post_field('post_author', get_the_ID()));
?>
<div class="page-head">
    <div class="container">
        <div class="row">
            <div class="page-head-content">
                <h1 class="page-title"><?= the_title() ?> </h1>
            </div>
        </div>
    </div>
</div>
<!-- End page header -->

<!-- property area -->
<div class="content-area single-property" style="background-color: #FCFCFC;">
    <div class="container">

        <div class="clearfix padding-top-40">
            <div class="col-md-8 single-property-content ">
                <div class="row">
                    <div class="light-slide-item">
                        <div class="clearfix">
                            <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                                <?php
                                $images =  get_attached_media('image', $post);
                                foreach ($images as $image) {
                                    $image_url = wp_get_attachment_url($image->ID);
                                ?>
                                    <li data-thumb="<?= $image_url ?>">
                                        <img src="<?= $image_url ?>" width="800px" height="800px" />
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="single-property-wrapper">
                    <div class="single-property-header">
                        <h1 class="property-title pull-left"><?= the_title() ?></h1>
                        <span class="property-price pull-right">$<?= get_post_meta(get_the_ID(), 'price', true) ?></span>
                    </div>

                    <div class="property-meta entry-meta clearfix ">

                        <div class="col-xs-3 col-sm-3 col-md-3 p-b-15">
                            <span class="property-info-icon icon-tag">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 48 48">
                                    <path class="meta-icon" fill-rule="evenodd" clip-rule="evenodd" fill="#FFA500" d="M47.199 24.176l-23.552-23.392c-.504-.502-1.174-.778-1.897-.778l-19.087.09c-.236.003-.469.038-.696.1l-.251.1-.166.069c-.319.152-.564.321-.766.529-.497.502-.781 1.196-.778 1.907l.092 19.124c.003.711.283 1.385.795 1.901l23.549 23.389c.221.218.482.393.779.523l.224.092c.26.092.519.145.78.155l.121.009h.012c.239-.003.476-.037.693-.098l.195-.076.2-.084c.315-.145.573-.319.791-.539l18.976-19.214c.507-.511.785-1.188.781-1.908-.003-.72-.287-1.394-.795-1.899zm-35.198-9.17c-1.657 0-3-1.345-3-3 0-1.657 1.343-3 3-3 1.656 0 2.999 1.343 2.999 3 0 1.656-1.343 3-2.999 3z"></path>
                                </svg>
                            </span>
                            <span class="property-info-entry">
                                <span class="property-info-label">Status</span>
                                <span class="property-info-value"><?= get_the_terms(get_the_ID(), 'status')[0]->name ?></span>
                            </span>
                        </div>

                        <div class="col-xs-3 col-sm-3 col-md-3 p-b-15">
                            <span class="property-info icon-area">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 48 48">
                                    <path class="meta-icon" fill="#FFA500" d="M46 16v-12c0-1.104-.896-2.001-2-2.001h-12c0-1.103-.896-1.999-2.002-1.999h-11.997c-1.105 0-2.001.896-2.001 1.999h-12c-1.104 0-2 .897-2 2.001v12c-1.104 0-2 .896-2 2v11.999c0 1.104.896 2 2 2v12.001c0 1.104.896 2 2 2h12c0 1.104.896 2 2.001 2h11.997c1.106 0 2.002-.896 2.002-2h12c1.104 0 2-.896 2-2v-12.001c1.104 0 2-.896 2-2v-11.999c0-1.104-.896-2-2-2zm-4.002 23.998c0 1.105-.895 2.002-2 2.002h-31.998c-1.105 0-2-.896-2-2.002v-31.999c0-1.104.895-1.999 2-1.999h31.998c1.105 0 2 .895 2 1.999v31.999zm-5.623-28.908c-.123-.051-.256-.078-.387-.078h-11.39c-.563 0-1.019.453-1.019 1.016 0 .562.456 1.017 1.019 1.017h8.935l-20.5 20.473v-8.926c0-.562-.455-1.017-1.018-1.017-.564 0-1.02.455-1.02 1.017v11.381c0 .562.455 1.016 1.02 1.016h11.39c.562 0 1.017-.454 1.017-1.016 0-.563-.455-1.019-1.017-1.019h-8.933l20.499-20.471v8.924c0 .563.452 1.018 1.018 1.018.561 0 1.016-.455 1.016-1.018v-11.379c0-.132-.025-.264-.076-.387-.107-.249-.304-.448-.554-.551z"></path>
                                </svg>
                            </span>
                            <span class="property-info-entry">
                                <span class="property-info-label">Area</span>
                                <span class="property-info-value"><?= get_post_meta(get_the_ID(), 'area', true) ?><b class="property-info-unit">m2</b></span>
                            </span>
                        </div>

                        <div class="col-xs-3 col-sm-3 col-md-3 p-b-15">
                            <span class="property-info-icon icon-bed">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 48 48">
                                    <path class="meta-icon" fill="#FFA500" d="M21 48.001h-19c-1.104 0-2-.896-2-2v-31c0-1.104.896-2 2-2h19c1.106 0 2 .896 2 2v31c0 1.104-.895 2-2 2zm0-37.001h-19c-1.104 0-2-.895-2-1.999v-7.001c0-1.104.896-2 2-2h19c1.106 0 2 .896 2 2v7.001c0 1.104-.895 1.999-2 1.999zm25 37.001h-19c-1.104 0-2-.896-2-2v-31c0-1.104.896-2 2-2h19c1.104 0 2 .896 2 2v31c0 1.104-.896 2-2 2zm0-37.001h-19c-1.104 0-2-.895-2-1.999v-7.001c0-1.104.896-2 2-2h19c1.104 0 2 .896 2 2v7.001c0 1.104-.896 1.999-2 1.999z"></path>
                                </svg>
                            </span>
                            <span class="property-info-entry">
                                <span class="property-info-label">Bedrooms</span>
                                <span class="property-info-value"><?= get_post_meta(get_the_ID(), 'bedrooms', true) ?></span>
                            </span>
                        </div>

                        <div class="col-xs-3 col-sm-3 col-md-3 p-b-15">
                            <span class="property-info-icon icon-bath">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 48 48">
                                    <path class="meta-icon" fill="#FFA500" d="M37.003 48.016h-4v-3.002h-18v3.002h-4.001v-3.699c-4.66-1.65-8.002-6.083-8.002-11.305v-4.003h-3v-3h48.006v3h-3.001v4.003c0 5.223-3.343 9.655-8.002 11.305v3.699zm-30.002-24.008h-4.001v-17.005s0-7.003 8.001-7.003h1.004c.236 0 7.995.061 7.995 8.003l5.001 4h-14l5-4-.001.01.001-.009s.938-4.001-3.999-4.001h-1s-4 0-4 3v17.005000000000003h-.001z"></path>
                                </svg>
                            </span>
                            <span class="property-info-entry">
                                <span class="property-info-label">Bathrooms</span>
                                <span class="property-info-value"><?= get_post_meta(get_the_ID(), 'bathrooms', true) ?></span>
                            </span>
                        </div>
                    </div>
                    <!-- .property-meta -->

                    <div class="section">
                        <h4 class="s-property-title">Description</h4>
                        <div class="s-property-content">
                            <?php the_content() ?>
                        </div>
                    </div>
                    <!-- End additional-details area  -->

                    <div class="section property-features">

                        <h4 class="s-property-title">Features</h4>
                        <ul>
                            <?php
                            $features_list = get_the_terms(get_the_ID(), 'features');
                            foreach ($features_list as $feature) {
                            ?>
                                <li><a><?= $feature->name ?></a></li>
                            <?php
                            }
                            ?>
                        </ul>

                    </div>
                    <!-- End features area  -->

                    <?php if (!empty(get_post_meta(get_the_ID(), 'video', true))) : ?>
                        <div class="section property-video">
                            <h4 class="s-property-title">Property Video</h4>
                            <div class="video-thumb">
                                <a class="video-popup" href="<?= get_post_meta(get_the_ID(), 'video', true) ?>" title="Virtual Tour">
                                    Link
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                    <!-- End video area  -->
                </div>
            </div>

            <div class="col-md-4 p0">
                <aside class="sidebar sidebar-property blog-asside-right">
                    <div class="dealer-widget">
                        <div class="dealer-content">
                            <div class="inner-wrapper">

                                <div class="clear">
                                    <div class="col-xs-4 col-sm-4 dealer-face">
                                        <a href="">
                                            <img src="<?= wp_get_attachment_url(get_user_meta($user->ID, 'avatar')[0]); ?>" class="img-circle" style="width: 90px; height: 90px;">
                                        </a>
                                    </div>
                                    <div class="col-xs-8 col-sm-8 ">
                                        <h3 class="dealer-name">
                                            <a href=""><?= $user->first_name . ' ' . $user->last_name ?></a>
                                        </h3>
                                    </div>
                                </div>

                                <div class="clear">
                                    <ul class="dealer-contacts">
                                        <li><i class="pe-7s-mail strong"> </i> <?php if (isset($user) && !is_bool($user)) echo $user->user_email ?></li>
                                        <?php if (!empty(get_post_meta(get_the_ID(), 'telephone', true))) : ?>
                                            <li><i class="pe-7s-call strong"> </i> +1 908 967 5906</li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>

    </div>
</div>
<?php
get_footer();
?>