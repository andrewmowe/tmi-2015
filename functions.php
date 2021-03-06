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
define( 'TMI_VERSION',      '0.1.27' );
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

add_image_size( 'family-thumb', 546, 748, true );

// Remove square brackets from excerpt ellipsis
function new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

// Reduce excerpt length
function custom_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// Button Shortcode
function tmi_button($atts, $content = null ) {
	extract( shortcode_atts( array( 'link' => '#', 'class' => '' ), $atts ) );
	$btn_base_class = 'btn';
	if (strpos($class,'basic') !== false) {
		$btn_base_class = 'btn2';
	}
	return '<a href='.$link.' class="'. $btn_base_class .' '. $class .'"><span>'.do_shortcode( $content ).'</span><span class="corner"></span></a>';
}
add_shortcode('button', 'tmi_button');

// Family Archive menu order
function tmi_family_order( $query ) {
	if ( is_post_type_archive( 'family' ) ) {
		$query->set( 'orderby', 'menu_order' );
		return;
	}
}
add_action( 'pre_get_posts', 'tmi_family_order' );

if ( is_admin() ) { // check to make sure we aren't on the front end
	add_filter('wpseo_pre_analysis_post_content', 'add_custom_to_yoast');

	function add_custom_to_yoast( $content ) {
		global $post;
		$pid = $post->ID;
		
		$custom = get_post_custom($pid);
		unset($custom['_yoast_wpseo_focuskw']); // Don't count the keyword in the Yoast field!

		foreach( $custom as $key => $value ) {
			if( substr( $key, 0, 1 ) != '_' && substr( $value[0], -1) != '}' && !is_array($value[0]) && !empty($value[0])) {
			  $custom_content .= $value[0] . ' ';
			}

		}

		$content = $content . ' ' . $custom_content;
		return $content;

		remove_filter('wpseo_pre_analysis_post_content', 'add_custom_to_yoast'); // don't let WP execute this twice
	}
}

function remove_menus () {
    if(is_user_logged_in() && current_user_can('editor'))
    {
        global $menu;
        $restricted = array( __('Links'), __('Comments'));
        end ($menu);
        while (prev($menu)){
            $value = explode(' ',$menu[key($menu)][0]);
            if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
        }
    }
}
add_action('admin_menu', 'remove_menus');