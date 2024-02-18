<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package RealEstate
 */

?>

<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?= bloginfo('charset'); ?>">

	<meta name="description" content="GARO is a real-estate template">
	<meta name="author" content="Kimarotec">
	<meta name="keyword" content="html5, css, bootstrap, property, real-estate theme , bootstrap template">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta charset="<?php bloginfo('charset'); ?>">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="preloader">
		<div id="status">&nbsp;</div>
	</div>
	<!-- Body content -->
	<div class="header-connect">
		<div class="container">
			<div class="row">
				<div class="col-md-5 col-sm-8  col-xs-12">
					<div class="header-half header-call">
						<p>
							<span><i class="pe-7s-call"></i> +1 234 567 7890</span>
							<span><i class="pe-7s-mail"></i> your@company.com</span>
						</p>
					</div>
				</div>
				<div class="col-md-2 col-md-offset-5  col-sm-3 col-sm-offset-1  col-xs-12">
					<div class="header-half header-social">
						<ul class="list-inline">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-vine"></i></a></li>
							<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
							<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
							<li><a href="#"><i class="fa fa-instagram"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--End top header -->
	<nav class="navbar navbar-default ">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?= get_site_url() ?>"><img src="<?= get_template_directory_uri() ?>/assets/img/logo.png" alt=""></a>
			</div>
			<div class="collapse navbar-collapse yamm" id="navigation">
				<div class="button navbar-right">
					<?php if (is_user_logged_in()) : ?>
						<button class="navbar-btn nav-button wow fadeInRight" onclick=" window.location.replace('submit-property.html')" data-wow-delay="0.48s">Submit</button>
						<button class="navbar-btn nav-button wow bounceInRight login" onclick=" window.location.replace('<?= wp_logout_url() ?>')" data-wow-delay="0.45s">Logout</button>
					<?php else : ?>
						<button class="navbar-btn nav-button wow bounceInRight login" onclick=" window.location.replace('<?= wp_login_url() ?>')" data-wow-delay="0.45s">Login</button>
					<?php endif; ?>
				</div>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer_nav',
						'container' => false,
						'menu_class' => 'main-nav nav navbar-nav navbar-right',
					)
				);
				?>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>