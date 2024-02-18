<div class="col-sm-6 col-md-<?= is_post_type_archive('property') ? '4' : '3' ?> p0">
    <div class="box-two proerty-item">
        <div class="item-thumb">
            <a href="<?= get_post_permalink() ?>"><img src="<?= get_the_post_thumbnail_url() ?>"></a>
        </div>

        <div class="item-entry overflow">
            <h5><a href="<?= get_post_permalink() ?>"> <?php the_title() ?> </a></h5>
            <div class="dot-hr"></div>
            <span class="pull-left"><b> Area :</b> <?= realestate_get_post_custom_field('area') ?>m </span>
            <span class="proerty-price pull-right"> $ <?= realestate_get_post_custom_field('price') ?></span>
            <p style="display: none;">
                <?= wp_strip_all_tags(get_the_content_feed()) ?>
            </p>
            <?php if (is_post_type_archive('property')) : ?>
                <div class="property-icon">
                    <img src="<?= get_template_directory_uri() ?>/assets/img/icon/bed.png">(6)|
                    <img src="<?= get_template_directory_uri() ?>/assets/img/icon/shawer.png">(2)|
                    <img src="<?= get_template_directory_uri() ?>/assets/img/icon/cars.png">(1)
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>