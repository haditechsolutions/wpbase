<?php
/**
 * Author options.
 *
 * @package Classic BlogBell
 */

$default = classic_blogbell_get_default_theme_options();
$homepage_design_layout     = classic_blogbell_get_option( 'homepage_design_layout_options' );

// Author section
$wp_customize->add_section( 'section_home_message',
	array(
		'title'      => __( 'Author Section', 'classic-blogbell' ),
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);


$wp_customize->add_setting( 'theme_options[disable_message_section]',
	array(
		'default'           => $default['disable_message_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'classic_blogbell_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Classic_BlogBell_Switch_Control( $wp_customize, 'theme_options[disable_message_section]',
    array(
		'label' 			=> __('Disable Author section', 'classic-blogbell'),
		'section'    		=> 'section_home_message',
		'on_off_label' 		=> classic_blogbell_switch_options(),
    )
) );
// Add posted on enable setting and control.
$wp_customize->add_setting( 'theme_options[message_content_enable]', array(
	'default'           => $default['message_content_enable'],
	'sanitize_callback' => 'classic_blogbell_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[message_content_enable]', array(
	'label'             => esc_html__( 'Enable Author Content Area', 'classic-blogbell' ),
	'section'           => 'section_home_message',
	'type'              => 'checkbox',
	'active_callback' => 'classic_blogbell_message_active',
) );

// Number of items
$wp_customize->add_setting('theme_options[message_excerpt_length]', 
	array(
	'default' 			=> $default['message_excerpt_length'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'classic_blogbell_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[message_excerpt_length]', 
	array(
	'label'       => __('Content Excerpt Length', 'classic-blogbell'),
	'description' => __('Save & Refresh the customizer to see its effect. Maximum is 1000.', 'classic-blogbell'),
	'section'     => 'section_home_message',   
	'settings'    => 'theme_options[message_excerpt_length]',		
	'type'        => 'number',
	'active_callback' => 'classic_blogbell_message_active',
	'input_attrs' => array(
			'min'	=> 0,
			'max'	=> 1000,
			'step'	=> 1,
		),
	)
);

// Author Highlight Title
$wp_customize->add_setting('theme_options[message_highlight_title]', 
	array(
	'default' 			=> $default['message_highlight_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[message_highlight_title]', 
	array(
	'label'       => __('Author Highlight Title', 'classic-blogbell'),
	'section'     => 'section_home_message',   
	'settings'    => 'theme_options[message_highlight_title]',
	'active_callback' => 'classic_blogbell_message_active',		
	'type'        => 'text'
	)
);

// Additional Information First Post
$wp_customize->add_setting('theme_options[message_post]', 
	array(
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'classic_blogbell_dropdown_posts'
	)
);
$wp_customize->add_control( new Classic_BlogBell_Dropdown_Chooser( $wp_customize,'theme_options[message_post]', 
	array(
	'label'       => __('Select Post', 'classic-blogbell'),
	'section'     => 'section_home_message',  
	'settings'    => 'theme_options[message_post]',	
	'choices'			=> classic_blogbell_post_choices(),	
	'type'        => 'dropdown-posts',
	'active_callback' => 'classic_blogbell_message_active',
	)
));

// Author Button Text
$wp_customize->add_setting('theme_options[message_btn_text]', 
	array(
	'default' 			=> $default['message_btn_text'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[message_btn_text]', 
	array(
	'label'       => __('Author Button Text', 'classic-blogbell'),
	'section'     => 'section_home_message',   
	'settings'    => 'theme_options[message_btn_text]',
	'active_callback' => 'classic_blogbell_message_active',		
	'type'        => 'text'
	)
);


