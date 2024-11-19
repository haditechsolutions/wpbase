<?php
/**
 * Home Page Options.
 *
 * @package Classic BlogBell
 */

$default = classic_blogbell_get_default_theme_options();

// Latest Latest Posts Section
$wp_customize->add_section( 'section_home_latest_posts',
	array(
		'title'      => __( 'Blog And Archive', 'classic-blogbell' ),
		'priority'   => 110,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_option_panel',
		)
);
$wp_customize->add_setting('theme_options[blog_layout_content_type]', 
	array(
	'default' 			=> $default['blog_layout_content_type'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'classic_blogbell_sanitize_select'
	)
);

$wp_customize->add_control('theme_options[blog_layout_content_type]', 
	array(
	'label'       => __('Blog And Archive page layout Content Type', 'classic-blogbell'),
	'section'     => 'section_home_latest_posts',   
	'settings'    => 'theme_options[blog_layout_content_type]',		
	'type'        => 'select',
	'choices'	  => array(
			'blog-one'	  => __('Design One','classic-blogbell'),
			'blog-two'	  => __('Design Two','classic-blogbell'),
		),
	)
);
// Latest Posts title
$wp_customize->add_setting('theme_options[latest_posts_title]', 
	array(
	'default'           => $default['latest_posts_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[latest_posts_title]', 
	array(
	'label'       => __('Static Blog Page Header Title', 'classic-blogbell'),
	'section'     => 'section_home_latest_posts',   
	'settings'    => 'theme_options[latest_posts_title]',		
	'type'        => 'text'
	)
);

// Latest Posts title
$wp_customize->add_setting('theme_options[latest_section_posts_title]', 
	array(
	'default'           => $default['latest_section_posts_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[latest_section_posts_title]', 
	array(
	'label'       => __('Blog Page Header Title', 'classic-blogbell'),
	'description' => __('This Setting works on the Latest posts option chosen as the Homepage Setting.', 'classic-blogbell'),
	'section'     => 'section_home_latest_posts',   
	'settings'    => 'theme_options[latest_section_posts_title]',		
	'type'        => 'text'
	)
);

// Setting excerpt_length.
$wp_customize->add_setting( 'theme_options[excerpt_length]', array(
	'default'           => $default['excerpt_length'],
	'sanitize_callback' => 'classic_blogbell_sanitize_positive_integer',
) );
$wp_customize->add_control( 'theme_options[excerpt_length]', array(
	'label'       => esc_html__( 'Excerpt Length', 'classic-blogbell' ),
	'description' => esc_html__( 'in words', 'classic-blogbell' ),
	'section'     => 'section_home_latest_posts',
	'type'        => 'number',
	'input_attrs' => array( 'min' => 1, 'max' => 200, 'style' => 'width: 55px;' ),
) );

// Add arrow enable setting and control.
$wp_customize->add_setting( 'theme_options[archive_content_align]', array(
	'default'           => $default['archive_content_align'],
	'sanitize_callback' => 'classic_blogbell_sanitize_select',
) );

$wp_customize->add_control( 'theme_options[archive_content_align]', array(
	'label'             => esc_html__( 'Choose Content Align', 'classic-blogbell' ),
	'section'           => 'section_home_latest_posts',
	'type'              => 'radio',
	'choices'				=> array( 
		'content-right'     => esc_html__( 'Right Side', 'classic-blogbell' ), 
		'content-center'     => esc_html__( 'Center Side', 'classic-blogbell' ), 
		'content-left'     => esc_html__( 'Left Side', 'classic-blogbell' ), 
		'content-justify'     => esc_html__( 'Justify', 'classic-blogbell' ),
		)
) );

// Add Single Header Image enable setting and control.
$wp_customize->add_setting( 'theme_options[archive_post_header_title_enable]', array(
	'default'           => $default['archive_post_header_title_enable'],
	'sanitize_callback' => 'classic_blogbell_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[archive_post_header_title_enable]', array(
	'label'             => esc_html__( 'Enable Archive Header Title', 'classic-blogbell' ),
	'section'           => 'section_home_latest_posts',
	'type'              => 'checkbox',

) );

// Add Single Header Image enable setting and control.
$wp_customize->add_setting( 'theme_options[blog_post_header_image_enable]', array(
	'default'           => $default['blog_post_header_image_enable'],
	'sanitize_callback' => 'classic_blogbell_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[blog_post_header_image_enable]', array(
	'label'             => esc_html__( 'Enable Blog Page Header Image', 'classic-blogbell' ),
	'section'           => 'section_home_latest_posts',
	'type'              => 'checkbox',

) );


// Add Single Header Image enable setting and control.
$wp_customize->add_setting( 'theme_options[archive_post_header_image_enable]', array(
	'default'           => $default['archive_post_header_image_enable'],
	'sanitize_callback' => 'classic_blogbell_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[archive_post_header_image_enable]', array(
	'label'             => esc_html__( 'Enable Archive Header Image', 'classic-blogbell' ),
	'section'           => 'section_home_latest_posts',
	'type'              => 'checkbox',

) );

// Add Single Header Image enable setting and control.
$wp_customize->add_setting( 'theme_options[blog_post_header_title_enable]', array(
	'default'           => $default['blog_post_header_title_enable'],
	'sanitize_callback' => 'classic_blogbell_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[blog_post_header_title_enable]', array(
	'label'             => esc_html__( 'Enable Blog Header Title', 'classic-blogbell' ),
	'section'           => 'section_home_latest_posts',
	'type'              => 'checkbox',

) );
// Add Single Header Image enable setting and control.
$wp_customize->add_setting( 'theme_options[remove_category_text_archive_page]', array(
	'default'           => $default['remove_category_text_archive_page'],
	'sanitize_callback' => 'classic_blogbell_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[remove_category_text_archive_page]', array(
	'label'             => esc_html__( 'Remove Catrgory text from Category header', 'classic-blogbell' ),
	'section'           => 'section_home_latest_posts',
	'type'              => 'checkbox',

) );

// Add category enable setting and control.
$wp_customize->add_setting( 'theme_options[background_image_enable]', array(
	'default'           => $default['background_image_enable'],
	'sanitize_callback' => 'classic_blogbell_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[background_image_enable]', array(
	'label'             => esc_html__( 'Enable background Image', 'classic-blogbell' ),
	'section'           => 'section_home_latest_posts',
	'active_callback' => 'classic_blogbell_blog_four_design_enable',
	'type'              => 'checkbox',

) );

// Add category enable setting and control.
$wp_customize->add_setting( 'theme_options[latest_content_enable]', array(
	'default'           => $default['latest_content_enable'],
	'sanitize_callback' => 'classic_blogbell_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[latest_content_enable]', array(
	'label'             => esc_html__( 'Enable Content', 'classic-blogbell' ),
	'section'           => 'section_home_latest_posts',
	'type'              => 'checkbox',

) );
// Add category enable setting and control.
$wp_customize->add_setting( 'theme_options[latest_category_enable]', array(
	'default'           => $default['latest_category_enable'],
	'sanitize_callback' => 'classic_blogbell_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[latest_category_enable]', array(
	'label'             => esc_html__( 'Enable Category', 'classic-blogbell' ),
	'section'           => 'section_home_latest_posts',
	'type'              => 'checkbox',

) );
// Add category enable setting and control.
$wp_customize->add_setting( 'theme_options[latest_author_enable]', array(
	'default'           => $default['latest_author_enable'],
	'sanitize_callback' => 'classic_blogbell_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[latest_author_enable]', array(
	'label'             => esc_html__( 'Enable Author', 'classic-blogbell' ),
	'section'           => 'section_home_latest_posts',
	'type'              => 'checkbox',

) );
// Add category enable setting and control.
$wp_customize->add_setting( 'theme_options[latest_comment_enable]', array(
	'default'           => $default['latest_comment_enable'],
	'sanitize_callback' => 'classic_blogbell_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[latest_comment_enable]', array(
	'label'             => esc_html__( 'Enable Comment', 'classic-blogbell' ),
	'section'           => 'section_home_latest_posts',
	'type'              => 'checkbox',

) );
// Add category enable setting and control.
$wp_customize->add_setting( 'theme_options[latest_read_more_text_enable]', array(
	'default'           => $default['latest_read_more_text_enable'],
	'sanitize_callback' => 'classic_blogbell_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[latest_read_more_text_enable]', array(
	'label'             => esc_html__( 'Enable Read More Text', 'classic-blogbell' ),
	'description' => __('Enable read more text inside content and disable read more button.', 'classic-blogbell'),
	'section'           => 'section_home_latest_posts',
	'type'              => 'checkbox',

) );

// Add posted on enable setting and control.
$wp_customize->add_setting( 'theme_options[latest_posted_on_enable]', array(
	'default'           => $default['latest_posted_on_enable'],
	'sanitize_callback' => 'classic_blogbell_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[latest_posted_on_enable]', array(
	'label'             => esc_html__( 'Enable Date', 'classic-blogbell' ),
	'section'           => 'section_home_latest_posts',
	'type'              => 'checkbox',

) );

// Add category enable setting and control.
$wp_customize->add_setting( 'theme_options[latest_video_enable]', array(
	'default'           => $default['latest_video_enable'],
	'sanitize_callback' => 'classic_blogbell_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[latest_video_enable]', array(
	'label'             => esc_html__( 'Enable Featured Video', 'classic-blogbell' ),
	'section'           => 'section_home_latest_posts',
	'type'              => 'checkbox',

) );

$wp_customize->add_setting('theme_options[latest_readmore_text]', 
	array(
	'default'           => $default['latest_readmore_text'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[latest_readmore_text]', 
	array(
	'label'       => __('Button Label', 'classic-blogbell'),
	'section'     => 'section_home_latest_posts',   
	'settings'    => 'theme_options[latest_readmore_text]',	
	'type'        => 'text'
	)
);
