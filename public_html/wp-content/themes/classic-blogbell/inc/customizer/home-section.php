<?php
/**
 * Home Page Options.
 *
 * @package Classic BlogBell
 */

$default = classic_blogbell_get_default_theme_options();
$homepage_design_layout     = classic_blogbell_get_option( 'homepage_design_layout_options' );

// Add Panel.
$wp_customize->add_panel( 'home_page_panel',
	array(
	'title'      => __( 'Front Page Sections', 'classic-blogbell' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	)
);

/**
* Section Customizer Options.
*/
if ($homepage_design_layout=='home-five') {
	require get_template_directory() . '/inc/customizer/sections/header.php';
	require get_template_directory() . '/inc/customizer/sections/slider.php';
	require get_template_directory() . '/inc/customizer/sections/message.php';
	require get_template_directory() . '/inc/customizer/sections/recent.php';
}