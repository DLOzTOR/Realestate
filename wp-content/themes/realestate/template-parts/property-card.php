<div class="<?= is_page('login') ? 'col-md-4' : 'col-sm-6' ?> col-md-<?= is_post_type_archive('property') || is_page('login') ? '4' : '3' ?> p0">
    <div class="box-two proerty-item">
        <div class="item-thumb">
            <a href="<?= get_post_permalink() ?>"><img src="<?= get_the_post_thumbnail_url() ?>"></a>
        </div>

        <div class="item-entry overflow">
            <div>
                <h5><a href="<?= get_post_permalink() ?>"> <?php the_title() ?> </a></h5>
                <div class="dot-hr"></div>
                <span class="pull-left"><b> Area :</b> <?= realestate\get_post_custom_field('area') ?>m </span>
                <span class="proerty-price pull-right"> $ <?= realestate\get_post_custom_field('price') ?></span>

            </div>
            <?php if (is_post_type_archive('property') || is_page('profile')) : ?>
                <div class="property-icon">
                    <div class="property-icon" style="display: flex; justify-content:space-between;">
                        <div style="margin-left: 10px;">
                            <img src="<?= get_template_directory_uri() ?>/assets/img/icon/bed.png">(<?= realestate\get_post_custom_field('bedrooms') ?>)|
                            <img src="<?= get_template_directory_uri() ?>/assets/img/icon/shawer.png">(<?= realestate\get_post_custom_field('bathrooms') ?>)
                        </div>
                        <?php if (is_page('profile')) { ?>
                            <form action="<?= get_site_url() . '/profile' ?>" method="post" style="margin-right: 10px">
                                <input type="text" name="delete_post_id" value="<?= the_ID() ?>" hidden>
                                <input type="submit" name="delete" value="Delete" style="background-color: white; ">
                            </form>
                        <?php } ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>

    </div>
</div>