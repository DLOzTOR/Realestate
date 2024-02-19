<?php

/**
 * @package RealEstate
 */

get_header();
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

            <div class="col-md-3 p0 padding-top-40">
                <div class="blog-asside-right pr0">
                    <div class="panel panel-default sidebar-menu wow fadeInRight animated">
                        <div class="panel-heading">
                            <h3 class="panel-title">Smart search</h3>
                        </div>
                        <div class="panel-body search-widget">
                            <form action="#" method="get" class=" form-inline">
                                <fieldset>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <input type="text" class="form-control" placeholder="Key word">
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <div class="row">
                                        <div class="col-xs-6">

                                            <select id="lunchBegins" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Select Your City">

                                                <option>New york, CA</option>
                                                <option>Paris</option>
                                                <option>Casablanca</option>
                                                <option>Tokyo</option>
                                                <option>Marraekch</option>
                                                <option>kyoto , shibua</option>
                                            </select>
                                        </div>
                                        <div class="col-xs-6">

                                            <select id="basic" class="selectpicker show-tick form-control">
                                                <option> -Status- </option>
                                                <option>Rent </option>
                                                <option>Boy</option>
                                                <option>used</option>

                                            </select>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset class="padding-5">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label for="price-range">Price range ($):</label>
                                            <input class="span2" value="" data-slider-min="2000" data-slider-max="1000000" data-slider-step="500" data-slider-value="[2000,1000000]" id="price-range"><br />
                                            <b class="pull-left color">2000$</b>
                                            <b class="pull-right color">1000000$</b>
                                        </div>
                                        <div class="col-xs-6">
                                            <label for="property-geo">Property geo (m2) :</label>
                                            <input type="text" class="span2" value="" data-slider-min="40" data-slider-max="1200" data-slider-step="10" data-slider-value="[40,1200]" id="property-geo"><br />
                                            <b class="pull-left color">40m</b>
                                            <b class="pull-right color">1200m</b>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset class="padding-5">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label for="price-range">Bathrooms :</label>
                                            <input type="text" class="span2" value="" data-slider-min="1" data-slider-max="20" data-slider-step="1" data-slider-value="[1,20]" id="min-baths"><br />
                                            <b class="pull-left color">1</b>
                                            <b class="pull-right color">20</b>
                                        </div>

                                        <div class="col-xs-6">
                                            <label for="property-geo">Bedrooms :</label>
                                            <input type="text" class="span2" value="" data-slider-min="1" data-slider-max="20" data-slider-step="1" data-slider-value="[1,20]" id="min-bed"><br />
                                            <b class="pull-left color">1</b>
                                            <b class="pull-right color">20</b>

                                        </div>
                                    </div>
                                </fieldset>
                                <?php
                                $property_features =  get_terms(array(
                                    'taxonomy' => 'features',
                                    'hide_empty' => false,
                                ));
                                foreach ($property_features as $feature) {
                                ?>
                                    <fieldset class="padding-5">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="checkbox">
                                                    <label> <input type="checkbox" name="feature_<?= $feature->term_id ?>"> <?= $feature->name ?> </label>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                <?php
                                }
                                ?>
                                <fieldset>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <input class="button btn largesearch-btn" value="Search" type="submit">
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>

                    <div class="panel panel-default sidebar-menu wow fadeInRight animated">
                        <div class="panel-heading">
                            <h3 class="panel-title">Recommended</h3>
                        </div>
                        <div class="panel-body recent-property-widget">
                            <ul>
                                <li>
                                    <div class="col-md-3 col-sm-3 col-xs-3 blg-thumb p0">
                                        <a href="single.html"><img src="<?= get_template_directory_uri() ?>/assets/img/demo/small-property-2.jpg"></a>
                                        <span class="property-seeker">
                                            <b class="b-1">A</b>
                                            <b class="b-2">S</b>
                                        </span>
                                    </div>
                                    <div class="col-md-8 col-sm-8 col-xs-8 blg-entry">
                                        <h6> <a href="single.html">Super nice villa </a></h6>
                                        <span class="property-price">3000000$</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="col-md-3 col-sm-3  col-xs-3 blg-thumb p0">
                                        <a href="single.html"><img src="<?= get_template_directory_uri() ?>/assets/img/demo/small-property-1.jpg"></a>
                                        <span class="property-seeker">
                                            <b class="b-1">A</b>
                                            <b class="b-2">S</b>
                                        </span>
                                    </div>
                                    <div class="col-md-8 col-sm-8 col-xs-8 blg-entry">
                                        <h6> <a href="single.html">Super nice villa </a></h6>
                                        <span class="property-price">3000000$</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="col-md-3 col-sm-3 col-xs-3 blg-thumb p0">
                                        <a href="single.html"><img src="<?= get_template_directory_uri() ?>/assets/img/demo/small-property-3.jpg"></a>
                                        <span class="property-seeker">
                                            <b class="b-1">A</b>
                                            <b class="b-2">S</b>
                                        </span>
                                    </div>
                                    <div class="col-md-8 col-sm-8 col-xs-8 blg-entry">
                                        <h6> <a href="single.html">Super nice villa </a></h6>
                                        <span class="property-price">3000000$</span>
                                    </div>
                                </li>

                                <li>
                                    <div class="col-md-3 col-sm-3 col-xs-3 blg-thumb p0">
                                        <a href="single.html"><img src="<?= get_template_directory_uri() ?>/assets/img/demo/small-property-2.jpg"></a>
                                        <span class="property-seeker">
                                            <b class="b-1">A</b>
                                            <b class="b-2">S</b>
                                        </span>
                                    </div>
                                    <div class="col-md-8 col-sm-8 col-xs-8 blg-entry">
                                        <h6> <a href="single.html">Super nice villa </a></h6>
                                        <span class="property-price">3000000$</span>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-9  pr0 padding-top-40 properties-page">
                <div class="col-md-12 clear">
                    <div class="col-xs-10 page-subheader sorting pl0">
                        <ul class="sort-by-list">
                            <li class="active">
                                <a href="javascript:void(0);" class="order_by_date" data-orderby="property_date" data-order="ASC">
                                    Property Date <i class="fa fa-sort-amount-asc"></i>
                                </a>
                            </li>
                            <li class="">
                                <a href="javascript:void(0);" class="order_by_price" data-orderby="property_price" data-order="DESC">
                                    Property Price <i class="fa fa-sort-numeric-desc"></i>
                                </a>
                            </li>
                        </ul><!--/ .sort-by-list-->
                        <form id="items-per-page" action="#" method="GET" class="items-per-page">
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
                        </form><!--/ .items-per-page-->
                    </div>
                    <div class="col-xs-2 layout-switcher">
                        <a class="layout-list" href="javascript:void(0);"> <i class="fa fa-th-list"></i> </a>
                        <a class="layout-grid active" href="javascript:void(0);"> <i class="fa fa-th"></i> </a>
                    </div><!--/ .layout-switcher-->
                </div>
                <?php

                if (have_posts()) : ?>
                    <div class="col-md-12 clear">
                        <div id="list-type" class="proerty-th">
                            <?php
                            /* Start the Loop */
                            while (have_posts()) :
                                the_post();
                                get_template_part('template-parts/property', 'card');
                            endwhile;
                            ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="pull-right">
                            <div class="pagination">
                                <?php
                                the_posts_pagination(
                                    array(
                                        'prev_text' => 'Prev',
                                        'next_text' => 'Next',
                                        'type' => 'list',
                                    )
                                )
                                ?>
                            </div>
                        </div>
                    </div>
                <?php
                else :

                    get_template_part('template-parts/content', 'none');

                endif; ?>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
