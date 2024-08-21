<?php
/**
 * Header options.
 *
 * @package Classic BlogBell
 */

$default = classic_blogbell_get_default_theme_options();

// Header Author Section
$wp_customize->add_section( 'section_home_header', 
	array(
		'title'      => __( 'Header Options', 'classic-blogbell' ),
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);
// Add arrow enable setting and control.
$wp_customize->add_setting( 'theme_options[header_layout_options]', array(
	'default'           => $default['header_layout_options'],
	'sanitize_callback' => 'classic_blogbell_sanitize_select',
	'type'				=> 'theme_mod',
) );

$wp_customize->add_control( 'theme_options[header_layout_options]', array(
	'label'             => esc_html__( 'Choose Header Layout', 'classic-blogbell' ),
	'section'           => 'section_home_header',
	'type'              => 'radio',
	'choices'				=> array( 
		'header-one'     => esc_html__( 'Header One(Normal)', 'classic-blogbell' ), 
		'header-two'     => esc_html__( 'Header Two(Blog Style)', 'classic-blogbell' ),
		)
) );

$wp_customize->add_setting( 'theme_options[disable_header_background_section]',
	array(
		'default'           => $default['disable_header_background_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'classic_blogbell_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Classic_BlogBell_Switch_Control( $wp_customize, 'theme_options[disable_header_background_section]',
    array(
		'label' 			=> __('Enable/Disable Header Background Image', 'classic-blogbell'),
		'section'    		=> 'section_home_header',
		 'settings'  		=> 'theme_options[disable_header_background_section]',
		'on_off_label' 		=> classic_blogbell_switch_options(),
    )
) );

// header title setting and control
$wp_customize->add_setting( 'theme_options[header_background_image]', array(
	'type'              => 'theme_mod',
	'sanitize_callback' => 'esc_url_raw',
) );

