<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Classic BlogBell
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses classic_blogbell_header_style()
 */
function classic_blogbell_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'classic_blogbell_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '59b290',
		'width'                  => 1920,
		'height'                 => 1080,
		'flex-height'            => true,
		'wp-head-callback'       => 'classic_blogbell_header_style',
	) ) );

	// Register default headers.
	register_default_headers( array(
		'default-banner' => array(
			'url'           => '%s/assets/images/default-header.jpg',
			'thumbnail_url' => '%s/assets/images/default-header.jpg',
			'description'   => esc_html_x( 'Default Banner', 'header image description', 'classic-blogbell' ),
		),

	) );
}
add_action( 'after_setup_theme', 'classic_blogbell_custom_header_setup' );

function classic_blogbell_header_style() {
	$header_text_color = get_header_textcolor();

		$header_title_color = classic_blogbell_get_option('header_title_color');
		$header_tagline_color = classic_blogbell_get_option('header_tagline_color'); 

	/*
	 * If no custom options for text are set, let's bail.
	 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: HEADER_TEXTCOLOR.
	 */
	if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
		return;
	}

	// If we get this far, we have custom styles. Let's do this.
	// Has the text been hidden?
	if ( ! display_header_text() ) :
		$custom_css = ".site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}";
	// If the user has set a custom color for the text use that. 
	else :
		$custom_css = "#site-identity .site-title a,
		#site-identity p.site-description {
			color: #" . esc_attr( $header_text_color ) . "}";
	endif;

	wp_add_inline_style( 'classic-blogbell-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'classic_blogbell_header_style' );