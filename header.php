<?php
/**
 * The template for displaying the header.
 *
 * @package TMI-2015
 * @since 0.1.0
 */
 ?>
<!DOCTYPE html <?php language_attributes(); ?>>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<script src="//use.typekit.net/nuh3ria.js"></script>
		<script>try{Typekit.load();}catch(e){}</script>

		<style type="text/css">

		.acf-map {
			width: 100%;
			height: 100%;
		}

		</style>
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/1.0.2/flickity.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/1.0.2/flickity.pkgd.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class( 'tisa' ); ?>>
		<!-- Begin .header -->
		<header class="header cf" role="banner">
			<div class="container">
				<a class="logo" href="<?php echo home_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/src/tmi-logo-light.svg" onerror="this.src='<?php echo get_stylesheet_directory_uri(); ?>/images/src/tmi-logo-light.png'; this.onerror=null;" alt="Logo Alt Text" /></a>
				<nav id="nav" class="nav">
					<i class="icon-menu mobile-toggle"></i>
					<?php wp_nav_menu( array( 'theme_location' => 'main', 'container' => '' ) ); ?>
				</nav><!--end .nav-->
			</div>
		</header>
		<!-- End .header -->