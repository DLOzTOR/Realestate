<?php
/*
* Template name: Submit property
*/
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
<pre>
    <?php
    var_dump($_POST);
    ?>
</pre>
<!-- property area -->
<div class="content-area submit-property" style="background-color: #FCFCFC;">&nbsp;
    <div class="container">
        <div class="clearfix">
            <div class="wizard-container">

                <div class="wizard-card ct-wizard-orange" id="wizardProperty">
                    <form action="#" method="post">
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
                                                <input type="file" id="wizard-picture">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Property name <small>(required)</small></label>
                                            <input name="propertyname" type="text" class="form-control" placeholder="Super villa ...">
                                        </div>

                                        <div class="form-group">
                                            <label>Property price <small>(required)</small></label>
                                            <input name="propertyprice" type="text" class="form-control" placeholder="3330000">
                                        </div>
                                        <div class="form-group">
                                            <label>Telephone <small>(empty if you wanna use default phone number)</small></label>
                                            <input name="phone" type="text" class="form-control" placeholder="+1 473 843 7436">
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
                                                <textarea name="discrition" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Property City :</label>
                                                <select id="lunchBegins" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Select your city">
                                                    <?php realestate\foreach_taxonomy_terms('cities', function (WP_Term $term) {
                                                    ?>
                                                        <option value="<?= $term->term_id ?>"> <?= $term->name ?> </option>
                                                    <?php
                                                    }) ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Property Status :</label>
                                                <select id="basic" class="selectpicker show-tick form-control" name="state">
                                                    <?php realestate\foreach_taxonomy_terms('status', function (WP_Term $term) {
                                                    ?>
                                                        <option value="<?= $term->term_id ?>"> <?= $term->name ?> </option>
                                                    <?php
                                                    }) ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 padding-top-15">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="property-geo">Bedrooms :</label>
                                                <input type="number" name="bedrooms" min="0" value="0" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="price-range">Bathrooms :</label>
                                                <input type="number" name="bathrooms" min="0" value="0" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="property-geo">Property area (m2) :</label>
                                                <input type="number" name="area" min="0" value="0" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 padding-top-15">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> Swimming Pool
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> 2 Stories
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> Emergency Exit
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> Fire Place
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 padding-bottom-15">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> Laundry Room
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> Jog Path
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> Ceilings
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> Dual Sinks
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <!-- End step 2 -->

                            <div class="tab-pane" id="step3">
                                <h4 class="info-text">Give us somme images and videos ? </h4>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="property-images">Chose Images :</label>
                                            <input class="form-control" type="file" id="property-images" multiple="multiple">
                                            <p class="help-block">Select multipel images for your property .</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="property-video">Property video :</label>
                                            <input class="form-control" value="" placeholder="http://www.youtube.com, http://vimeo.com" name="property_video" type="text">
                                        </div>

                                        <div class="form-group">
                                            <input class="form-control" value="" placeholder="http://www.youtube.com, http://vimeo.com" name="property_video" type="text">
                                        </div>

                                        <div class="form-group">
                                            <input class="form-control" value="" placeholder="http://www.youtube.com, http://vimeo.com" name="property_video" type="text">
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
                                <input type='button' class='btn btn-next btn-primary' name='next' value='Next' />
                                <input type='button' class='btn btn-finish btn-primary ' name='finish' value='Finish' />
                            </div>

                            <div class="pull-left">
                                <input type='button' class='btn btn-previous btn-default' name='previous' value='Previous' />
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
