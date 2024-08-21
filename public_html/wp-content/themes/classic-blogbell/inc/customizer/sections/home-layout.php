<?php
/**
 * Category options.
 *
 * @package Classic BlogBell
 */

$default = classic_blogbell_get_default_theme_options();

// Category Author Section
$wp_customize->add_section( 'section_home_layout',
	array(
		'title'      => __( 'Homepage Layout', 'classic-blogbell' ),
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);


$wp_customize->add_setting('theme_options[homepage_design_layout_options]', 
	array(
	'default' 			=> $default['homepage_design_layout_options'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'classic_blogbell_sanitize_select'
	)
);

$wp_customize->add_control('theme_options[homepage_design_layout_options]', 
	array(
	'label'             => esc_html__( 'Choose HomePage Layout', 'classic-blogbell' ),
	'description' => __('Save & Refresh the customizer to see its effect.', 'classic-blogbell'),
	'section'     => 'section_home_layout',   
	'settings'    => 'theme_options[homepage_design_layout_options]',		
	'type'        => 'select',
	'choices'	  => array(  
		'home-four'     => esc_html__( 'HomePage Four (Magazine)', 'classic-blogbell' ), 
		'home-five'     => esc_html__( 'HomePage Five (Blog)', 'classic-blogbell' ), 
		),
	)
);


