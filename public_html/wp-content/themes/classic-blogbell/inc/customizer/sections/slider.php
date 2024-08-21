<?php
/**
 * Slider options.
 *
 * @package Classic BlogBell
 */

$default = classic_blogbell_get_default_theme_options();
$homepage_design_layout     = classic_blogbell_get_option( 'homepage_design_layout_options' );
// Slider Section
$wp_customize->add_section( 'section_home_slider',
	array(
		'title'      => __( 'Slider News', 'classic-blogbell' ),
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);

$wp_customize->add_setting( 'theme_options[disable_slider_section]',
	array(
		'default'           => $default['disable_slider_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'classic_blogbell_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Classic_BlogBell_Switch_Control( $wp_customize, 'theme_options[disable_slider_section]',
    array(
		'label' 	=> __('Disable Slider Section', 'classic-blogbell'),
		'section'    			=> 'section_home_slider',
		'on_off_label' 		=> classic_blogbell_switch_options(),
    )
) );
//Slider Section title
$wp_customize->add_setting('theme_options[slider_title]', 
	array(
	'default'           => $default['slider_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[slider_title]', 
	array(
	'label'       => __('Section Title', 'classic-blogbell'),
	'section'     => 'section_home_slider',   
	'settings'    => 'theme_options[slider_title]',
	'active_callback' => 'classic_blogbell_slider_active',		
	'type'        => 'text'
	)
);

// Excerpt Length
$wp_customize->add_setting('theme_options[slider_excerpt_length]', 
	array(
	'default' 			=> $default['slider_excerpt_length'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'classic_blogbell_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[slider_excerpt_length]', 
	array(
	'label'       => __('Excerpt Length', 'classic-blogbell'),
	'description' => __('Save & Refresh the customizer to see its effect. Maximum is 1000.', 'classic-blogbell'),
	'section'     => 'section_home_slider',   
	'settings'    => 'theme_options[slider_excerpt_length]',		
	'type'        => 'number',
	'active_callback' => 'classic_blogbell_slider_active',
	'input_attrs' => array(
			'min'	=> 0,
			'max'	=> 1000,
			'step'	=> 1,
		),
	)
);

// Add arrow enable setting and control.
$wp_customize->add_setting( 'theme_options[slider_arrow_enable]', array(
	'default'           => $default['slider_arrow_enable'],
	'sanitize_callback' => 'classic_blogbell_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[slider_arrow_enable]', array(
	'label'             => esc_html__( 'Enable Slider Arrow', 'classic-blogbell' ),
	'section'           => 'section_home_slider',
	'type'              => 'checkbox',
	'active_callback' => 'classic_blogbell_slider_active',
) );

// Add autoplay enable setting and control.
$wp_customize->add_setting( 'theme_options[slider_autoplay_enable]', array(
	'default'           => $default['slider_autoplay_enable'],
	'sanitize_callback' => 'classic_blogbell_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[slider_autoplay_enable]', array(
	'label'             => esc_html__( 'Enable Slider Autoplay', 'classic-blogbell' ),
	'section'           => 'section_home_slider',
	'type'              => 'checkbox',
	'active_callback' => 'classic_blogbell_slider_active',
) );

// Add infinite enable setting and control.
$wp_customize->add_setting( 'theme_options[slider_infinite_enable]', array(
	'default'           => $default['slider_infinite_enable'],
	'sanitize_callback' => 'classic_blogbell_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[slider_infinite_enable]', array(
	'label'             => esc_html__( 'Enable Slider Slide Infinite', 'classic-blogbell' ),
	'section'           => 'section_home_slider',
	'type'              => 'checkbox',
	'active_callback' => 'classic_blogbell_slider_active',
) );

// Add category enable setting and control.
$wp_customize->add_setting( 'theme_options[slider_category_enable]', array(
	'default'           => $default['slider_category_enable'],
	'sanitize_callback' => 'classic_blogbell_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[slider_category_enable]', array(
	'label'             => esc_html__( 'Enable Category', 'classic-blogbell' ),
	'section'           => 'section_home_slider',
	'type'              => 'checkbox',
	'active_callback' => 'classic_blogbell_slider_active',
) );

// Add content enable setting and control.
$wp_customize->add_setting( 'theme_options[slider_content_enable]', array(
	'default'           => $default['slider_content_enable'],
	'sanitize_callback' => 'classic_blogbell_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[slider_content_enable]', array(
	'label'             => esc_html__( 'Enable Content', 'classic-blogbell' ),
	'section'           => 'section_home_slider',
	'type'              => 'checkbox',
	'active_callback' => 'classic_blogbell_slider_active',
) );

// Add posted on enable setting and control.
$wp_customize->add_setting( 'theme_options[slider_posted_on_enable]', array(
	'default'           => $default['slider_posted_on_enable'],
	'sanitize_callback' => 'classic_blogbell_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[slider_posted_on_enable]', array(
	'label'             => esc_html__( 'Enable Date', 'classic-blogbell' ),
	'section'           => 'section_home_slider',
	'type'              => 'checkbox',
	'active_callback' => 'classic_blogbell_slider_active',
) );
// Add posted on enable setting and control.
$wp_customize->add_setting( 'theme_options[slider_author_enable]', array(
	'default'           => $default['slider_author_enable'],
	'sanitize_callback' => 'classic_blogbell_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[slider_author_enable]', array(
	'label'             => esc_html__( 'Enable Author', 'classic-blogbell' ),
	'section'           => 'section_featured_slider',
	'type'              => 'checkbox',
	'active_callback' => 'classic_blogbell_slider_active',
) );

//Slider Section title
$wp_customize->add_setting('theme_options[slider_video_text]', 
	array(
	'default'           => $default['slider_video_text'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[slider_video_text]', 
	array(
	'label'       => __('Text After Video Icon', 'classic-blogbell'),
	'section'     => 'section_home_slider',   
	'settings'    => 'theme_options[slider_video_text]',
	'active_callback' => 'classic_blogbell_slider_active',		
	'type'        => 'text'
	)
);


// Speed of slider
$wp_customize->add_setting('theme_options[slider_speed]', 
	array(
	'default' 			=> $default['slider_speed'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'classic_blogbell_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[slider_speed]', 
	array(
	'label'       => __('Slider Speed', 'classic-blogbell'),
	'description' => __('Slider Speed Default speed 800', 'classic-blogbell'),
	'section'     => 'section_home_slider',   
	'settings'    => 'theme_options[slider_speed]',		
	'type'        => 'number',
	'active_callback' => 'classic_blogbell_slider_active',
	)
);

$number_of_slider_items = classic_blogbell_get_option( 'number_of_slider_items' );
for( $i=1; $i<=$number_of_slider_items; $i++ ){

	// Additional Information First Post
	$wp_customize->add_setting('theme_options[slider_post_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'classic_blogbell_dropdown_posts'
		)
	);
	$wp_customize->add_control( new Classic_BlogBell_Dropdown_Chooser( $wp_customize,'theme_options[slider_post_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Post #%1$s', 'classic-blogbell'), $i),
		'section'     => 'section_home_slider',  
		'settings'    => 'theme_options[slider_post_'.$i.']',	
		'choices'	=> classic_blogbell_post_choices(),	
		'type'        => 'dropdown-posts',
		'active_callback' => 'classic_blogbell_slider_active',
		)
	));
	// Video Url 
	$wp_customize->add_setting('theme_options[slider_video_link_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control('theme_options[slider_video_link_'.$i.']', 
		array(
		'label'       => sprintf( __('Video Link #%1$s', 'classic-blogbell'), $i),
		'section'     => 'section_home_slider',   
		'settings'    => 'theme_options[slider_video_link_'.$i.']',	
		'active_callback' => 'classic_blogbell_slider_active',	
		'type'        => 'url',
		)
	);
}
