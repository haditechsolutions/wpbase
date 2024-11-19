<?php
/**
 * Recent Post options.
 *
 * @package Classic BlogBell
 */

$default = classic_blogbell_get_default_theme_options();
$homepage_design_layout     = classic_blogbell_get_option( 'homepage_design_layout_options' );

// Blog & News Section
$wp_customize->add_section( 'section_home_recent',
	array(
		'title'      => __( 'Recent Posts', 'classic-blogbell' ),
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);

$wp_customize->add_setting( 'theme_options[disable_recent_section]',
	array(
		'default'           => $default['disable_recent_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'classic_blogbell_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Classic_BlogBell_Switch_Control( $wp_customize, 'theme_options[disable_recent_section]',
    array(
		'label' 			=> __('Enable/Disable Recent Posts Section', 'classic-blogbell'),
		'section'    		=> 'section_home_recent',
		 'settings'  		=> 'theme_options[disable_recent_section]',
		'on_off_label' 		=> classic_blogbell_switch_options(),
    )
) );

// Add arrow enable setting and control.
$wp_customize->add_setting( 'theme_options[recent_content_align]', array(
	'default'           => $default['recent_content_align'],
	'sanitize_callback' => 'classic_blogbell_sanitize_select',
) );

$wp_customize->add_control( 'theme_options[recent_content_align]', array(
	'label'             => esc_html__( 'Choose Content Align', 'classic-blogbell' ),
	'section'           => 'section_home_recent',
	'type'              => 'radio',
	'active_callback' => 'classic_blogbell_recent_active',
	'choices'				=> array( 
		'content-right'     => esc_html__( 'Right Side', 'classic-blogbell' ), 
		'content-center'     => esc_html__( 'Center Side', 'classic-blogbell' ), 
		'content-left'     => esc_html__( 'Left Side', 'classic-blogbell' ), 
		'content-justify'     => esc_html__( 'Justify', 'classic-blogbell' )
		)
) );


//Blog & News Section title
$wp_customize->add_setting('theme_options[recent_title]', 
	array(
	'default'           => $default['recent_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[recent_title]', 
	array(
	'label'       => __('Section Title', 'classic-blogbell'),
	'section'     => 'section_home_recent',   
	'settings'    => 'theme_options[recent_title]',
	'active_callback' => 'classic_blogbell_recent_active',		
	'type'        => 'text'
	)
);
if ($homepage_design_layout=='home-main') {

	//Recent Section title
	$wp_customize->add_setting('theme_options[recent_see_all_txt]', 
		array(
		'default'           => $default['recent_see_all_txt'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control('theme_options[recent_see_all_txt]', 
		array(
		'label'       => __('See All Text', 'classic-blogbell'),
		'section'     => 'section_home_recent',   
		'settings'    => 'theme_options[recent_see_all_txt]',
		'active_callback' => 'classic_blogbell_recent_active',		
		'type'        => 'text'
		)
	);

	//Recent Section title
	$wp_customize->add_setting('theme_options[recent_see_all_url]', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'esc_url_raw'
		)
	);

	$wp_customize->add_control('theme_options[recent_see_all_url]', 
		array(
		'label'       => __('See All Link', 'classic-blogbell'),
		'section'     => 'section_home_recent',   
		'settings'    => 'theme_options[recent_see_all_url]',
		'active_callback' => 'classic_blogbell_recent_active',		
		'type'        => 'url'
		)
	);
}

// Add category enable setting and control.
$wp_customize->add_setting( 'theme_options[recent_category_enable]', array(
	'default'           => $default['recent_category_enable'],
	'sanitize_callback' => 'classic_blogbell_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[recent_category_enable]', array(
	'label'             => esc_html__( 'Enable Category', 'classic-blogbell' ),
	'section'           => 'section_home_recent',
	'type'              => 'checkbox',
	'active_callback' => 'classic_blogbell_recent_active',
) );	
// Add content enable setting and control.
$wp_customize->add_setting( 'theme_options[recent_content_enable]', array(
	'default'           => $default['recent_content_enable'],
	'sanitize_callback' => 'classic_blogbell_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[recent_content_enable]', array(
	'label'             => esc_html__( 'Enable Content', 'classic-blogbell' ),
	'section'           => 'section_home_recent',
	'type'              => 'checkbox',
	'active_callback' => 'classic_blogbell_recent_active',
) );

// Add posted on enable setting and control.
$wp_customize->add_setting( 'theme_options[recent_posted_on_enable]', array(
	'default'           => $default['recent_posted_on_enable'],
	'sanitize_callback' => 'classic_blogbell_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[recent_posted_on_enable]', array(
	'label'             => esc_html__( 'Enable Date', 'classic-blogbell' ),
	'section'           => 'section_home_recent',
	'type'              => 'checkbox',
	'active_callback' => 'classic_blogbell_recent_active',
) );

// Add posted on enable setting and control.
$wp_customize->add_setting( 'theme_options[recent_author_enable]', array(
	'default'           => $default['recent_author_enable'],
	'sanitize_callback' => 'classic_blogbell_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[recent_author_enable]', array(
	'label'             => esc_html__( 'Enable Author', 'classic-blogbell' ),
	'section'           => 'section_home_recent',
	'type'              => 'checkbox',
	'active_callback' => 'classic_blogbell_recent_active',
) );


// Number of items
$wp_customize->add_setting('theme_options[recent_excerpt_length]', 
	array(
	'default' 			=> $default['recent_excerpt_length'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'classic_blogbell_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[recent_excerpt_length]', 
	array(
	'label'       => __('Excerpt Length', 'classic-blogbell'),
	'description' => __('Save & Refresh the customizer to see its effect. Maximum is 1000.', 'classic-blogbell'),
	'section'     => 'section_home_recent',   
	'settings'    => 'theme_options[recent_excerpt_length]',		
	'type'        => 'number',
	'active_callback' => 'classic_blogbell_recent_active',
	'input_attrs' => array(
			'min'	=> 0,
			'max'	=> 1000,
			'step'	=> 1,
		),
	)
);

$number_of_recent_items = classic_blogbell_get_option( 'number_of_recent_items' );

for( $i=1; $i<=$number_of_recent_items; $i++ ){

	// Posts
	$wp_customize->add_setting('theme_options[recent_post_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'classic_blogbell_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[recent_post_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Post #%1$s', 'classic-blogbell'), $i),
		'section'     => 'section_home_recent',   
		'settings'    => 'theme_options[recent_post_'.$i.']',		
		'type'        => 'select',
		'choices'	  => classic_blogbell_post_choices(),
		'active_callback' => 'classic_blogbell_recent_active',
		)
	);
}

//Advertisment Section

// Advertisment hr setting and control
$wp_customize->add_setting( 'theme_options[recent_ads_hr]', array(
	'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control( new Classic_BlogBell_Customize_Horizontal_Line( $wp_customize, 'theme_options[recent_ads_hr]',
	array(
		'section'         => 'section_home_recent',
		'active_callback' => 'classic_blogbell_recent_active',
		'type'			  => 'hr',
) ) );
$wp_customize->add_setting( 'theme_options[disable_recent_ads_section]',
	array(
		'default'           => $default['disable_recent_ads_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'classic_blogbell_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Classic_BlogBell_Switch_Control( $wp_customize, 'theme_options[disable_recent_ads_section]',
    array(
		'label' 			=> __('Enable/Disable Category News Ads', 'classic-blogbell'),
		'section'    		=> 'section_home_recent',
		'settings'  		=> 'theme_options[disable_recent_ads_section]',
		'active_callback' => 'classic_blogbell_recent_active',
		'on_off_label' 		=> classic_blogbell_switch_options(),
    )
) );

// Add arrow enable setting and control.
$wp_customize->add_setting( 'theme_options[recent_column_option]', array(
	'default'           => $default['recent_column_option'],
	'sanitize_callback' => 'classic_blogbell_sanitize_select',
) );

$wp_customize->add_control( 'theme_options[recent_column_option]', array(
	'label'             => esc_html__( 'Choose ADS Column', 'classic-blogbell' ),
	'section'           => 'section_home_recent',
	'type'              => 'radio',
	'active_callback' => 'classic_blogbell_recent_active',
	'choices'				=> array( 
		'col-1'     => esc_html__( 'Column One', 'classic-blogbell' ), 
		'col-2'     => esc_html__( 'Column Two', 'classic-blogbell' ),
		)
) );

// Number of items
$wp_customize->add_setting('theme_options[number_of_recent_ads]', 
	array(
	'default' 			=> $default['number_of_recent_ads'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'classic_blogbell_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[number_of_recent_ads]', 
	array(
	'label'       => __('Number of Items', 'classic-blogbell'),
	'description' => __('Save & Refresh the customizer to see its effect. Maximum is 4.', 'classic-blogbell'),
	'section'     => 'section_home_recent',   
	'settings'    => 'theme_options[number_of_recent_ads]',		
	'type'        => 'number',
	'active_callback' => 'classic_blogbell_recent_active',
	'input_attrs' => array(
			'min'	=> 1,
			'max'	=> 4,
			'step'	=> 1,
		),
	)
);
$number_of_recent_ads = classic_blogbell_get_option( 'number_of_recent_ads' );

for( $i=1; $i<=$number_of_recent_ads; $i++ ){

// recent title setting and control
	$wp_customize->add_setting( 'theme_options[recent_ads_img_' . $i . ']', array(
		'type'              => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'theme_options[recent_ads_img_' . $i . ']', array(
		'label'       =>sprintf( esc_html__( 'Select ADS Image %d', 'classic-blogbell' ), $i ),
		'section'        	=> 'section_home_recent',
		'settings'    		=> 'theme_options[recent_ads_img_'.$i.']',	
		'active_callback' 	=> 'classic_blogbell_recent_active',
	) ) );

	// recent title setting and control
	$wp_customize->add_setting( 'theme_options[recent_ads_url_' . $i . ']', array(
		'type'              => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'theme_options[recent_ads_url_' . $i . ']', array(
		'label'           	=> sprintf( __( 'ADS Url %d', 'classic-blogbell' ), $i ),
		'section'        	=> 'section_home_recent',
		'settings'    		=> 'theme_options[recent_ads_url_'.$i.']',	
		'active_callback' 	=> 'classic_blogbell_recent_active',
		'type'				=> 'url',
	) );
}