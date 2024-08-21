<?php
/**
 * This file adds functions to the Flexit WordPress theme.
 *
 * @package Flexit
 * @author  sakshi24
 * @license GNU General Public License v2 or later
 */

if ( ! function_exists( 'flexit_setup' ) ) {

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	function flexit_setup() {

		// Make theme available for translation.
		load_theme_textdomain( 'flexit', get_template_directory() . '/languages' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Add support for menu.
		register_nav_menus( array( 'primary' => esc_html__( 'Primary Menu', 'flexit' ) ) );

		// Enqueue editor styles and fonts.
		add_editor_style( array( './style.css', flexit_fonts_url() ) );

		// Remove core block patterns.
		remove_theme_support( 'core-block-patterns' );

	}
}
add_action( 'after_setup_theme', 'flexit_setup' );

// Enqueue style sheet.
add_action( 'wp_enqueue_scripts', 'flexit_enqueue_style_sheet' );
function flexit_enqueue_style_sheet() {

	wp_enqueue_style( 'flexit', get_template_directory_uri() . '/assets/css/style.css', array(), wp_get_theme()->get( 'Version' ) );

}

// Enqueue fonts.
add_action( 'wp_enqueue_scripts', 'flexit_enqueue_fonts' );
function flexit_enqueue_fonts() {

	wp_enqueue_style( 'flexit-fonts', flexit_fonts_url(), array(), null );

}

// Define fonts.
function flexit_fonts_url() {

	// Allow child themes to disable to the default Flexit fonts.
	$dequeue_fonts = apply_filters( 'flexit_dequeue_fonts', false );

	if ( $dequeue_fonts ) {
		return '';
	}

	$fonts = array(
		'family=Playwrite+AR:wght@100..400',
	);

	// Make a single request for all Google Fonts.
	return esc_url_raw( 'https://fonts.googleapis.com/css2?' . implode( '&', array_unique( $fonts ) ) . '&display=swap' );

}

// Add block styles.
require get_template_directory() . '/inc/block-styles.php';
