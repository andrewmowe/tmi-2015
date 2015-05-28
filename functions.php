<?php

/**
 * TMI-2015 functions and definitions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * @package TMI-2015
 * @since 0.1.0
 */

// Useful global constants
define( 'TMI_VERSION',      '0.1.0' );
define( 'TMI_URL',          get_stylesheet_directory_uri() );
define( 'TMI_TEMPLATE_URL', get_template_directory_uri() );
define( 'TMI_PATH',         get_template_directory() . '/' );
define( 'TMI_INC',          TMI_PATH . 'includes/' );

// Include compartmentalized functions
require_once TMI_INC . 'functions/core.php';

// Include lib classes

// Run the setup functions
TenUp\TMI_2015\Core\setup();

function tmi_menus() {
	register_nav_menus(
		array(
			'main'		=> __( 'Main Nav'),
			'footer'	=> __( 'Footer Nav' )
		)
	);
}
add_action( 'init', 'tmi_menus' );

// This theme uses post thumbnails
add_theme_support( 'post-thumbnails', array( 'post', 'page', 'case-study', 'family', 'service' ) );

add_image_size( 'family-thumb', 273, 364, true );

// Remove wpautop from ACF fields
remove_filter ('acf_the_content', 'wpautop');
