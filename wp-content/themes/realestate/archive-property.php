<?php

/**
 * @package RealEstate
 */

get_header();
function realestate_set_filter($key, &$query)
{
    if (isset($_GET[$key]) && !empty($_GET[$key])) {
        $vals = preg_split('/,/', sanitize_text_field($_GET[$key]), -1, PREG_SPLIT_NO_EMPTY);
        $query[] = [
            'key' => $key,
            'value' => [
                $vals[0],
                $vals[1],
            ],
            'compare' => 'BETWEEN',
            'type' => 'DECIMAL(10,3)'
        ];
    }
}
function realestate_set_tax($key, $name, &$query)
{
    if (isset($_GET[$key]) && !empty($_GET[$key])) {
        $query[] = [
            'taxonomy' => $name,
            'field' => 'term_id',
            'terms' => is_array($_GET[$key]) ? array_map('sanitize_text_field', $_GET[$key]) : sanitize_text_field($_GET[$key]),
            'operator' => 'IN',
        ];
    }
}
$meta_query = ['relation' => 'AND'];
realestate_set_filter('price', $meta_query);
realestate_set_filter('area', $meta_query);
realestate_set_filter('bedrooms', $meta_query);
realestate_set_filter('bathrooms', $meta_query);
$tax_querty = ['relation' => 'AND'];
realestate_set_tax('feature', 'features', $tax_querty);
realestate_set_tax('property_cities', 'cities', $tax_querty);
realestate_set_tax('property_status', 'status', $tax_querty);
$post_get_page = isset($_GET['per_page']) ? intval($_GET['per_page']) : 6;
$property_values = realestate\get_property_values();

?>
<div class="page-head">
    <div class="container">
        <div class="row">
            <div class="page-head-content">
                <h1 class="page-title">List Layout With Sidebar</h1>
            </div>
        </div>
    </div>
</div>
<div class="properties-area recent-property" style="background-color: #FFF;">
    <div class="container">
        <div class="row">
            <form action="<?= get_site_url() . '/properties' ?>" method="get" class=" form-inline">

                <div class="col-md-3 p0 padding-top-40">
                    <div class="blog-asside-right pr0">
                        <div class="panel panel-default sidebar-menu wow fadeInRight animated">
                            <div class="panel-heading">
                                <h3 class="panel-title">Smart search</h3>
                            </div>
                            <div class="panel-body search-widget">
                                <fieldset>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <input name="key_word_search" value="<?php if (isset($_GET['key_word_search']) && !empty($_GET['key_word_search'])) echo sanitize_text_field($_GET['key_word_search']) ?>" type="text" class="form-control" placeholder="Key word">
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <select id="lunchBegins" name="property_cities" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Select City">
                                                <?php realestate\foreach_taxonomy_terms('cities', 'realestate\term_as_option') ?>
                                            </select>
                                        </div>
                                        <div class="col-xs-6">
                                            <select id="basic" name="property_status" class="selectpicker show-tick form-control" title="Status">
                                                <?php realestate\foreach_taxonomy_terms('status', 'realestate\term_as_option') ?>
                                            </select>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset class="padding-5">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <?php realestate\input_range('price', 500, 'price-range', 'Price range ($):', $property_values) ?>
                                        </div>
                                        <div class="col-xs-6">
                                            <?php realestate\input_range('area', 10, 'property-geo', 'Property geo (m2) :', $property_values) ?>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset class="padding-5">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <?php realestate\input_range('bathrooms', 1, 'min-baths', 'Bathrooms :', $property_values) ?>
                                        </div>

                                        <div class="col-xs-6">
                                            <?php realestate\input_range('bedrooms', 1, 'min-bed', 'Bedrooms :', $property_values) ?>
                                        </div>
                                    </div>
                                </fieldset>
                                <?php
                                realestate\foreach_taxonomy_terms('features', function ($term) {
                                ?>
                                    <fieldset class="padding-5">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="checkbox">
                                                    <label> <input type="checkbox" name="feature[]" value="<?= $term->term_id ?>" <?php if (isset($_GET['feature']) && in_array($term->term_id, $_GET['feature'])) echo 'checked'; ?>> <?= $term->name ?> </label>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                <?php
                                });
                                ?>
                                <fieldset>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <input class="button btn largesearch-btn" value="Search" type="submit" id="search-submit">
                                            <a href="<?= get_site_url() . '/properties' ?>"><input class="button btn largesearch-btn" value="Reset" type="button" id="search-submit"></a>
                                        </div>
                                    </div>
                                </fieldset>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-9  pr0 padding-top-40 properties-page">
                    <div class="col-md-12 clear">
                        <div class="col-xs-10 page-subheader sorting pl0">
                            <div id="items-per-page" action="#" method="GET" class="items-per-page">
                                <label for="items_per_page"><b>Property per page :</b></label>
                                <div class="sel">
                                    <select id="items_per_page" name="per_page" onchange="this.form.submit()">
                                        <option <?php realestate\set_select_droplist(3) ?> value="3">3</option>
                                        <option <?php realestate\set_select_droplist(6) ?> value="6">6</option>
                                        <option <?php realestate\set_select_droplist(9) ?> value="9">9</option>
                                        <option <?php realestate\set_select_droplist(12) ?> value="12">12</option>
                                        <option <?php realestate\set_select_droplist(15) ?> value="15">15</option>
                                        <option <?php realestate\set_select_droplist(30) ?> value="30">30</option>
                                        <option <?php realestate\set_select_droplist(45) ?> value="45">45</option>
                                        <option <?php realestate\set_select_droplist(60) ?> value="60">60</option>
                                    </select>
                                </div><!--/ .sel-->
                            </div><!--/ .items-per-page-->
                        </div>
                        <div class="col-xs-2 layout-switcher">
                            <a class="layout-list" href="javascript:void(0);"> <i class="fa fa-th-list"></i> </a>
                            <a class="layout-grid active" href="javascript:void(0);"> <i class="fa fa-th"></i> </a>
                        </div><!--/ .layout-switcher-->
                    </div>
                    <?php
                    $paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;

                    $q_args = [
                        'post_type' => 'property',
                        'post_per_page' => $post_get_page,
                        'paged' => $paged,
                        'meta_query' => $meta_query,
                        'tax_query' => $tax_querty,
                    ];
                    if (isset($_GET['key_word_search']) && !empty($_GET['key_word_search'])) {
                        $q_args['s'] = sanitize_text_field($_GET['key_word_search']);
                    }
                    $query = new WP_Query(
                        $q_args
                    );
                    if ($query->have_posts()) : ?>
                        <div class="col-md-12 clear">
                            <div id="list-type" class="proerty-th">
                                <?php
                                /* Start the Loop */
                                while ($query->have_posts()) :
                                    $query->the_post();
                                    get_template_part('template-parts/property', 'card');
                                endwhile;
                                ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="pull-right">
                                <div class="pagination">
                                    <?php
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
                                </div>
                            </div>
                        </div>

                    <?php
                    else :
                        echo '<h2>No property founded</h2>';
                    endif; ?>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
get_footer();
?>