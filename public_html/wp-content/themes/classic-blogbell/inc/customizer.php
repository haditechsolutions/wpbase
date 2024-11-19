<?php
/**
 * Classic BlogBell Theme Customizer
 *
 * @package Classic BlogBell
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function classic_blogbell_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$default = classic_blogbell_get_default_theme_options();

	// Register custom section types.
	$wp_customize->register_section_type( 'Classic_BlogBell_Customize_Section_Upsell' );
	$wp_customize->add_section(
		new Classic_BlogBell_Customize_Section_Upsell(
			$wp_customize,
			'theme_upsell',
			array(
				'title'    => esc_html__( 'Classic BlogBell Pro', 'classic-blogbell' ),
				'pro_text' => esc_html__( 'Buy Pro', 'classic-blogbell' ),
				'pro_url'  => 'http://www.sensationaltheme.com/downloads/classic-blogbell-pro/',
				'priority'  => 1,
			)
		)
	);

	//For Menu Option
	$wp_customize->add_section('menu_logo_center_optons', array(    
	'title'       => __('Menu Logo Center', 'classic-blogbell'),
	'panel'       => 'nav_menus',
	'active_callback' => 'classic_blogbell_header_nine',   
	));

	// Add Single Header Image enable setting and control.
	$wp_customize->add_setting( 'theme_options[enable_center_logo]', array(
		'default'           => $default['enable_center_logo'],
		'sanitize_callback' => 'classic_blogbell_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'theme_options[enable_center_logo]', array(
		'label'             => esc_html__( 'Enable Logo Placed in Center', 'classic-blogbell' ),
		'section'           => 'menu_logo_center_optons',
		'type'              => 'checkbox',

	) );
	// Add Panel.
	$wp_customize->add_panel( 'theme_option_panel',
		array(
		'title'      => __( 'Theme Options', 'classic-blogbell' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		)
	);	
	$homepage_layout_options     = classic_blogbell_get_option( 'homepage_design_layout_options' );

	// Load customize sanitize.
	include get_template_directory() . '/inc/customizer/sanitize.php';

	// Load customize options.
	include get_template_directory() . '/inc/customizer/options.php';

	// Load customize control.
	include get_template_directory() . '/inc/customizer/control.php';

	// Load customize sanitize.
	include get_template_directory() . '/inc/customizer/active-callback.php';

	// Load header sections option.
	include get_template_directory() . '/inc/customizer/theme-option/footer.php';

	// Load header sections option.
	include get_template_directory() . '/inc/customizer/theme-option/general.php';

	// Load header sections option.
	include get_template_directory() . '/inc/customizer/theme-option/header-image.php';

	// Load header sections option.
	include get_template_directory() . '/inc/customizer/theme-option/archives.php';

	// Load Single Post sections option.
	include get_template_directory() . '/inc/customizer/theme-option/single-post.php';

	// Load Single Page sections option.
	include get_template_directory() . '/inc/customizer/theme-option/single-page.php';

	// Load home page sections option.
	include get_template_directory() . '/inc/customizer/home-section.php';


	
}
add_action( 'customize_register', 'classic_blogbell_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function classic_blogbell_customize_preview_js() {
	wp_enqueue_script( 'classic_blogbell_customizer', get_template_directory_uri() . '/inc/customizer/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'classic_blogbell_customize_preview_js' );
/**
 *
 */
function classic_blogbell_customize_backend_scripts() {

	wp_enqueue_style( 'classic-blogbell-admin-customizer-style', get_template_directory_uri() . '/inc/customizer/css/customizer-style.css' );
	wp_enqueue_script( 'classic-blogbell-admin-customizer', get_template_directory_uri() . '/inc/customizer/js/customizer-scipt.js', array( 'jquery', 'customize-controls' ), '20151215', true );
}
add_action( 'customize_controls_enqueue_scripts', 'classic_blogbell_customize_backend_scripts', 10 );
