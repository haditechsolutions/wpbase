<?php
/**
 * Wine Store: Customizer
 *
 * @subpackage Wine Store
 * @since 1.0
 */

use WPTRT\Customize\Section\Luzuk_Wine_Store_Button;

add_action( 'customize_register', function( $manager ) {

	$manager->register_section_type( Luzuk_Wine_Store_Button::class );

	$manager->add_section(
		new Luzuk_Wine_Store_Button( $manager, 'luzuk_wine_store_pro', [
			'title' => __( 'Wine Store Pro', 'wine-store' ),
			'priority' => 0,
			'button_text' => __( 'Go Pro', 'wine-store' ),
			'button_url'  => esc_url( 'https://www.luzuk.com/product/wine-store-wordpress-theme/', 'wine-store')
		] )
	);

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

	$version = wp_get_theme()->get( 'Version' );

	wp_enqueue_script(
		'wine-store-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
		[ 'customize-controls' ],
		$version,
		true
	);

	wp_enqueue_style(
		'wine-store-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
		[ 'customize-controls' ],
 		$version
	);

} );

function luzuk_wine_store_customize_register( $wp_customize ) {

	$wp_customize->add_setting('luzuk_wine_store_logo_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('luzuk_wine_store_logo_padding',array(
		'label' => __('Logo Margin','wine-store'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting('luzuk_wine_store_logo_top_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'luzuk_wine_store_sanitize_float'
	));
	$wp_customize->add_control('luzuk_wine_store_logo_top_padding',array(
		'type' => 'number',
		'description' => __('Top','wine-store'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('luzuk_wine_store_logo_bottom_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'luzuk_wine_store_sanitize_float'
	));
	$wp_customize->add_control('luzuk_wine_store_logo_bottom_padding',array(
		'type' => 'number',
		'description' => __('Bottom','wine-store'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('luzuk_wine_store_logo_left_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'luzuk_wine_store_sanitize_float'
	));
	$wp_customize->add_control('luzuk_wine_store_logo_left_padding',array(
		'type' => 'number',
		'description' => __('Left','wine-store'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('luzuk_wine_store_logo_right_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'luzuk_wine_store_sanitize_float'
 	));
 	$wp_customize->add_control('luzuk_wine_store_logo_right_padding',array(
		'type' => 'number',
		'description' => __('Right','wine-store'),
		'section' => 'title_tagline',
    ));

	$wp_customize->add_setting('luzuk_wine_store_show_site_title',array(
		'default' => true,
		'sanitize_callback'	=> 'luzuk_wine_store_sanitize_checkbox'
	));
	$wp_customize->add_control('luzuk_wine_store_show_site_title',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Site Title','wine-store'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting( 'luzuk_wine_store_site_title_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_wine_store_site_title_color', array(
		'label' => 'Title Color',
		'section' => 'title_tagline',
	)));

	$wp_customize->add_setting('luzuk_wine_store_show_tagline',array(
		'default' => true,
		'sanitize_callback'	=> 'luzuk_wine_store_sanitize_checkbox'
	));
	$wp_customize->add_control('luzuk_wine_store_show_tagline',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Site Tagline','wine-store'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting( 'luzuk_wine_store_site_tagline_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_wine_store_site_tagline_color', array(
		'label' => 'Tagline Color',
		'section' => 'title_tagline',
	)));

	$wp_customize->add_panel( 'luzuk_wine_store_panel_id', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Settings', 'wine-store' ),
		'description' => __( 'Description of what this panel does.', 'wine-store' ),
	) );

	$wp_customize->add_section( 'luzuk_wine_store_theme_options_section', array(
    	'title'      => __( 'General Settings', 'wine-store' ),
		'priority'   => 30,
		'panel' => 'luzuk_wine_store_panel_id'
	) );

	$wp_customize->add_setting('luzuk_wine_store_theme_options',array(
		'default' => 'One Column',
		'sanitize_callback' => 'luzuk_wine_store_sanitize_choices'
	));
	$wp_customize->add_control('luzuk_wine_store_theme_options',array(
		'type' => 'select',
		'label' => __('Blog Page Sidebar Layout','wine-store'),
		'section' => 'luzuk_wine_store_theme_options_section',
		'choices' => array(
		   'Left Sidebar' => __('Left Sidebar','wine-store'),
		   'Right Sidebar' => __('Right Sidebar','wine-store'),
		   'One Column' => __('One Column','wine-store')
		),
	));

	$wp_customize->add_setting('luzuk_wine_store_single_post_sidebar',array(
		'default' => 'Right Sidebar',
		'sanitize_callback' => 'luzuk_wine_store_sanitize_choices'
	));
	$wp_customize->add_control('luzuk_wine_store_single_post_sidebar',array(
        'type' => 'select',
        'label' => __('Single Post Sidebar Layout','wine-store'),
        'section' => 'luzuk_wine_store_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','wine-store'),
            'Right Sidebar' => __('Right Sidebar','wine-store'),
            'One Column' => __('One Column','wine-store')
        ),
	));

	$wp_customize->add_setting('luzuk_wine_store_page_sidebar',array(
		'default' => 'One Column',
		'sanitize_callback' => 'luzuk_wine_store_sanitize_choices'
	));
	$wp_customize->add_control('luzuk_wine_store_page_sidebar',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','wine-store'),
        'section' => 'luzuk_wine_store_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','wine-store'),
            'Right Sidebar' => __('Right Sidebar','wine-store'),
            'One Column' => __('One Column','wine-store')
        ),
	));

	$wp_customize->add_setting('luzuk_wine_store_archive_page_sidebar',array(
		'default' => 'One Column',
		'sanitize_callback' => 'luzuk_wine_store_sanitize_choices'
	));
	$wp_customize->add_control('luzuk_wine_store_archive_page_sidebar',array(
        'type' => 'select',
        'label' => __('Archive & Search Page Sidebar Layout','wine-store'),
        'section' => 'luzuk_wine_store_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','wine-store'),
            'Right Sidebar' => __('Right Sidebar','wine-store'),
            'One Column' => __('One Column','wine-store')
        ),
	));
 
	//Header
	$wp_customize->add_section( 'luzuk_wine_store_header' , array(
    	'title'    => __( 'Header Settings', 'wine-store' ),
		'priority' => null,
		'panel' => 'luzuk_wine_store_panel_id'
	) );

	$wp_customize->add_setting('luzuk_wine_store_header_mailtext',array(
		'default' => 'Email:',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('luzuk_wine_store_header_mailtext',array(
	   	'type' => 'text',
	   	'label' => __('Email Text','wine-store'),
	   	'section' => 'luzuk_wine_store_header',
	));

	$wp_customize->add_setting('luzuk_wine_store_header_mail',array(
		'default' => 'demo@example.com',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('luzuk_wine_store_header_mail',array(
	   	'type' => 'text',
	   	'label' => __('Email','wine-store'),
	   	'section' => 'luzuk_wine_store_header',
	));

	$wp_customize->add_setting('luzuk_wine_store_header_phntext',array(
		'default' => 'Phone:',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('luzuk_wine_store_header_phntext',array(
	   	'type' => 'text',
	   	'label' => __('Phone Text','wine-store'),
	   	'section' => 'luzuk_wine_store_header',
	));

	$wp_customize->add_setting('luzuk_wine_store_header_phn',array(
		'default' => '(00) 123-456-789',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('luzuk_wine_store_header_phn',array(
	   	'type' => 'text',
	   	'label' => __('Phone Number','wine-store'),
	   	'section' => 'luzuk_wine_store_header',
	));
	
	$wp_customize->add_setting('luzuk_wine_store_header_twittericonlink',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('luzuk_wine_store_header_twittericonlink',array(
	   	'type' => 'text',
	   	'label' => __('Twitter Icon Link','wine-store'),
	   	'section' => 'luzuk_wine_store_header',
	));

	
	$wp_customize->add_setting('luzuk_wine_store_header_instagramiconlink',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('luzuk_wine_store_header_instagramiconlink',array(
	   	'type' => 'text',
	   	'label' => __('Instagram Icon Link','wine-store'),
	   	'section' => 'luzuk_wine_store_header',
	));

	$wp_customize->add_setting('luzuk_wine_store_header_facebookiconlink',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('luzuk_wine_store_header_facebookiconlink',array(
	   	'type' => 'text',
	   	'label' => __('Facebook Icon Link','wine-store'),
	   	'section' => 'luzuk_wine_store_header',
	));

	$wp_customize->add_setting( 'luzuk_wine_store_headertopmailphonicon_col', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_wine_store_headertopmailphonicon_col', array(
		'label' => 'Email & Phone Icon Color',
		'section' => 'luzuk_wine_store_header',
	)));

	$wp_customize->add_setting( 'luzuk_wine_store_headertopmailphone_col', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_wine_store_headertopmailphone_col', array(
		'label' => 'Email & Phone Color',
		'section' => 'luzuk_wine_store_header',
	)));

	$wp_customize->add_setting( 'luzuk_wine_store_headertopmailphonehovr_col', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_wine_store_headertopmailphonehovr_col', array(
		'label' => 'Email & Phone Hover Color',
		'section' => 'luzuk_wine_store_header',
	)));

	$wp_customize->add_setting( 'luzuk_wine_store_headertopsoiclaicon_col', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_wine_store_headertopsoiclaicon_col', array(
		'label' => 'Social Icons Color',
		'section' => 'luzuk_wine_store_header',
	)));

	$wp_customize->add_setting( 'luzuk_wine_store_headertopsocialiconhrv_col', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_wine_store_headertopsocialiconhrv_col', array(
		'label' => 'Social Icons Hover Color',
		'section' => 'luzuk_wine_store_header',
	)));

	$wp_customize->add_setting( 'luzuk_wine_store_headerbg_col', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_wine_store_headerbg_col', array(
		'label' => 'BG Color',
		'section' => 'luzuk_wine_store_header',
	)));

	$wp_customize->add_setting( 'luzuk_wine_store_headeracccarticon_col', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_wine_store_headeracccarticon_col', array(
		'label' => 'Accounts & Cart Icon Color',
		'section' => 'luzuk_wine_store_header',
	)));

	$wp_customize->add_setting( 'luzuk_wine_store_headeracccarticonhrv_col', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_wine_store_headeracccarticonhrv_col', array(
		'label' => 'Accounts & Cart Icon Hover Color',
		'section' => 'luzuk_wine_store_header',
	)));

	$wp_customize->add_setting( 'luzuk_wine_store_menu_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_wine_store_menu_color', array(
		'label' => 'Menu Color',
		'section' => 'luzuk_wine_store_header',
	)));

	$wp_customize->add_setting( 'luzuk_wine_store_menubrdhover_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_wine_store_menubrdhover_color', array(
		'label' => 'Menu Hover Color',
		'section' => 'luzuk_wine_store_header',
	)));


	$wp_customize->add_setting( 'luzuk_wine_store_submenu_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_wine_store_submenu_color', array(
		'label' => 'Submenu Text Color',
		'section' => 'luzuk_wine_store_header',
	)));

	$wp_customize->add_setting( 'luzuk_wine_store_submenubg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_wine_store_submenubg_color', array(
		'label' => 'Submenu BG Color',
		'section' => 'luzuk_wine_store_header',
	)));



	//home page slider
	$wp_customize->add_section( 'luzuk_wine_store_slider_section' , array(
    	'title'    => __( 'Slider Settings', 'wine-store' ),
		'description'=> __('<b>Note :</b> Please Add Image in 750*700 Ratio.','wine-store'),
		'priority' => null,
		'panel' => 'luzuk_wine_store_panel_id'
	) );

	$wp_customize->add_setting('luzuk_wine_store_slider_hide_show',array(
    	'default' => false,
    	'sanitize_callback'	=> 'luzuk_wine_store_sanitize_checkbox'
	));
	$wp_customize->add_control('luzuk_wine_store_slider_hide_show',array(
	   	'type' => 'checkbox',
	   	'label' => __('Show / Hide Slider','wine-store'),
	   	'section' => 'luzuk_wine_store_slider_section',
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'luzuk_wine_store_slider' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'luzuk_wine_store_sanitize_dropdown_pages'
		));
		$wp_customize->add_control( 'luzuk_wine_store_slider' . $count, array(
			'label' => __('Select Slider Image Page', 'wine-store' ),
			'section' => 'luzuk_wine_store_slider_section',
			'type' => 'dropdown-pages'
		));
	}

	$wp_customize->add_setting('luzuk_wine_store_slider_excerpt_length',array(
		'default' => '15',
		'sanitize_callback'	=> 'luzuk_wine_store_sanitize_float'
	));
	$wp_customize->add_control('luzuk_wine_store_slider_excerpt_length',array(
		'type' => 'number',
		'label' => __('Description Excerpt Length','wine-store'),
		'section' => 'luzuk_wine_store_slider_section',
	));

	$wp_customize->add_setting('luzuk_wine_store_sliderbtnlink',array(
    	'default' => '#',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('luzuk_wine_store_sliderbtnlink',array(
	   	'type' => 'url',
	   	'label' => __('Button Link','wine-store'),
	   	'section' => 'luzuk_wine_store_slider_section',
	));

	$wp_customize->add_setting( 'luzuk_wine_store_slider_title_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_wine_store_slider_title_color', array(
		'label' => 'Title Color',
		'section' => 'luzuk_wine_store_slider_section',
	)));

	$wp_customize->add_setting( 'luzuk_wine_store_slider_description_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_wine_store_slider_description_color', array(
		'label' => 'Description Color',
		'section' => 'luzuk_wine_store_slider_section',
	)));

	$wp_customize->add_setting( 'luzuk_wine_store_slider_btntext_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_wine_store_slider_btntext_color', array(
		'label' => 'Button Text Color',
		'section' => 'luzuk_wine_store_slider_section',
	)));

	$wp_customize->add_setting( 'luzuk_wine_store_slider_btnbg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_wine_store_slider_btnbg_color', array(
		'label' => 'Button BG Color',
		'section' => 'luzuk_wine_store_slider_section',
	)));

	$wp_customize->add_setting( 'luzuk_wine_store_slider_btntexthrv_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_wine_store_slider_btntexthrv_color', array(
		'label' => 'Button Text Hover Color',
		'section' => 'luzuk_wine_store_slider_section',
	)));

	$wp_customize->add_setting( 'luzuk_wine_store_slider_contentbg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_wine_store_slider_contentbg_color', array(
		'label' => 'Content BG Color',
		'section' => 'luzuk_wine_store_slider_section',
	)));




	// categories Section
	$wp_customize->add_section('luzuk_wine_store_categories_section',array(
		'title'	=> __('Categories Settings','wine-store'),
		'description'=> __('<b>Note :</b> This section will appear below the Slider.','wine-store'),
		'panel' => 'luzuk_wine_store_panel_id',
	));

	
	$wp_customize->add_setting( 'luzuk_wine_store_categoriestitle_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_wine_store_categoriestitle_color', array(
		'label' => 'Title Color',
		'section' => 'luzuk_wine_store_categories_section',
	)));



	// newarrivalproduct Section
	$wp_customize->add_section('luzuk_wine_store_newarrivalproduct_section',array(
		'title'	=> __('New Releases Products Settings','wine-store'),
		'description'=> __('<b>Note :</b> This section will appear below the Categories.','wine-store'),
		'panel' => 'luzuk_wine_store_panel_id',
	));

	$wp_customize->add_setting('luzuk_wine_store_newarrivalproducts_subheading',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('luzuk_wine_store_newarrivalproducts_subheading',array(
	   	'type' => 'text',
	   	'label' => __('SubHeading','wine-store'),
	   	'section' => 'luzuk_wine_store_newarrivalproduct_section',
	));

	$wp_customize->add_setting('luzuk_wine_store_newarrivalproducts_heading',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('luzuk_wine_store_newarrivalproducts_heading',array(
	   	'type' => 'text',
	   	'label' => __('Heading','wine-store'),
	   	'section' => 'luzuk_wine_store_newarrivalproduct_section',
	));

	$wp_customize->add_setting('luzuk_wine_store_newarrivalproducts_banneroffertext',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('luzuk_wine_store_newarrivalproducts_banneroffertext',array(
	   	'type' => 'text',
	   	'label' => __('Banner Offer Text','wine-store'),
	   	'section' => 'luzuk_wine_store_newarrivalproduct_section',
	));

	$wp_customize->add_setting(
    	'luzuk_wine_store_bannerimg',
	    array(
	        'sanitize_callback' => 'esc_url_raw'
	    )
	);
	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'luzuk_wine_store_bannerimg',
	        array(
			    'label'   		=> __('Banner Image','wine-store'),
				'description'   		=> __('Image size 413*554','wine-store'),
	            'section' => 'luzuk_wine_store_newarrivalproduct_section',
	            'settings' => 'luzuk_wine_store_bannerimg',
	        )
	    )
	);

	$wp_customize->add_setting('luzuk_wine_store_newarrivalproducts_bannertitle',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('luzuk_wine_store_newarrivalproducts_bannertitle',array(
	   	'type' => 'text',
	   	'label' => __('Banner Title','wine-store'),
	   	'section' => 'luzuk_wine_store_newarrivalproduct_section',
	));

	$wp_customize->add_setting('luzuk_wine_store_newarrivalproducts_btnlink',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('luzuk_wine_store_newarrivalproducts_btnlink',array(
	   	'type' => 'text',
	   	'label' => __('Banner Shop Now Button Link','wine-store'),
	   	'section' => 'luzuk_wine_store_newarrivalproduct_section',
	));

	$wp_customize->add_setting( 'luzuk_wine_store_newarrivalproductsubheading_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_wine_store_newarrivalproductsubheading_color', array(
		'label' => 'Sub Heading Color',
		'section' => 'luzuk_wine_store_newarrivalproduct_section',
	)));

	$wp_customize->add_setting( 'luzuk_wine_store_newarrivalproductheading_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_wine_store_newarrivalproductheading_color', array(
		'label' => 'Heading Color',
		'section' => 'luzuk_wine_store_newarrivalproduct_section',
	)));

	$wp_customize->add_setting( 'luzuk_wine_store_newarrivalbanneroffertext_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_wine_store_newarrivalbanneroffertext_color', array(
		'label' => 'Banner Offer Text Color',
		'section' => 'luzuk_wine_store_newarrivalproduct_section',
	)));

	$wp_customize->add_setting( 'luzuk_wine_store_newarrivalbanneroffertextbg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_wine_store_newarrivalbanneroffertextbg_color', array(
		'label' => 'Banner Offer Text BG Color',
		'section' => 'luzuk_wine_store_newarrivalproduct_section',
	)));

	$wp_customize->add_setting( 'luzuk_wine_store_newarrivalbannertitle_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_wine_store_newarrivalbannertitle_color', array(
		'label' => 'Banner Offer Title Color',
		'section' => 'luzuk_wine_store_newarrivalproduct_section',
	)));

	$wp_customize->add_setting( 'luzuk_wine_store_newarrivalbannershoprnowtext_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_wine_store_newarrivalbannershoprnowtext_color', array(
		'label' => 'Banner Shop Now Text Color',
		'section' => 'luzuk_wine_store_newarrivalproduct_section',
	)));

	$wp_customize->add_setting( 'luzuk_wine_store_newarrivalbannershoprnowtexthrv_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_wine_store_newarrivalbannershoprnowtexthrv_color', array(
		'label' => 'Banner Shop Now Text Hover Color',
		'section' => 'luzuk_wine_store_newarrivalproduct_section',
	)));

	$wp_customize->add_setting( 'luzuk_wine_store_newarrivalbannercontentbg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_wine_store_newarrivalbannercontentbg_color', array(
		'label' => 'Banner Content BG Color',
		'section' => 'luzuk_wine_store_newarrivalproduct_section',
	)));


	$wp_customize->add_setting( 'luzuk_wine_store_newarrivalproducttitle_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_wine_store_newarrivalproducttitle_color', array(
		'label' => 'Title Color',
		'section' => 'luzuk_wine_store_newarrivalproduct_section',
	)));

	$wp_customize->add_setting( 'luzuk_wine_store_newarrivalproductprice_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_wine_store_newarrivalproductprice_color', array(
		'label' => 'Price Color',
		'section' => 'luzuk_wine_store_newarrivalproduct_section',
	)));

	$wp_customize->add_setting( 'luzuk_wine_store_newarrivalproducttitlepricebg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_wine_store_newarrivalproducttitlepricebg_color', array(
		'label' => 'Title Price BG Color',
		'section' => 'luzuk_wine_store_newarrivalproduct_section',
	)));


	//Footer
    $wp_customize->add_section( 'luzuk_wine_store_footer', array(
    	'title'  => __( 'Footer Settings', 'wine-store' ),
		'priority' => null,
		'panel' => 'luzuk_wine_store_panel_id'
	) );

	$wp_customize->add_setting('luzuk_wine_store_show_back_totop',array(
       'default' => true,
       'sanitize_callback'	=> 'luzuk_wine_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('luzuk_wine_store_show_back_totop',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Back to Top','wine-store'),
       'section' => 'luzuk_wine_store_footer'
    ));

    $wp_customize->add_setting('luzuk_wine_store_footer_copy',array(
		'default' => 'Wine Store WordPress Theme By Luzuk',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('luzuk_wine_store_footer_copy',array(
		'label'	=> __('Copyright Text','wine-store'),
		'section' => 'luzuk_wine_store_footer',
		'setting' => 'luzuk_wine_store_footer_copy',
		'type' => 'text'
	));

	$wp_customize->add_setting( 'luzuk_wine_store_footertext_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_wine_store_footertext_color', array(
		'label' => 'Text Color',
		'section' => 'luzuk_wine_store_footer',
	)));

	$wp_customize->add_setting( 'luzuk_wine_store_footericons_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_wine_store_footericons_color', array(
		'label' => 'Icons Color',
		'section' => 'luzuk_wine_store_footer',
	)));

	$wp_customize->add_setting( 'luzuk_wine_store_footerbg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_wine_store_footerbg_color', array(
		'label' => 'BG Color',
		'section' => 'luzuk_wine_store_footer',
	)));

	$wp_customize->add_setting( 'luzuk_wine_store_footercopyright_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_wine_store_footercopyright_color', array(
		'label' => 'Copyright Color',
		'section' => 'luzuk_wine_store_footer',
	)));

	$wp_customize->add_setting( 'luzuk_wine_store_footercopyrightbg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_wine_store_footercopyrightbg_color', array(
		'label' => 'Copyright BG Color',
		'section' => 'luzuk_wine_store_footer',
	)));

	$wp_customize->add_setting( 'luzuk_wine_store_footerscrolltotoptext_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_wine_store_footerscrolltotoptext_color', array(
		'label' => 'Scroll To Top Text Color',
		'section' => 'luzuk_wine_store_footer',
	)));

	$wp_customize->add_setting( 'luzuk_wine_store_footerscrolltotopbg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_wine_store_footerscrolltotopbg_color', array(
		'label' => 'Scroll To Top BG Color',
		'section' => 'luzuk_wine_store_footer',
	)));

	$wp_customize->add_setting( 'luzuk_wine_store_footerscrolltotoptexthover_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_wine_store_footerscrolltotoptexthover_color', array(
		'label' => 'Scroll To Top Text Hover Color',
		'section' => 'luzuk_wine_store_footer',
	)));

	$wp_customize->add_setting( 'luzuk_wine_store_footerscrolltotophover_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_wine_store_footerscrolltotophover_color', array(
		'label' => 'Scroll To Top Hover Color',
		'section' => 'luzuk_wine_store_footer',
	)));




	

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'luzuk_wine_store_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'luzuk_wine_store_customize_partial_blogdescription',
	) );
}
add_action( 'customize_register', 'luzuk_wine_store_customize_register' );

function luzuk_wine_store_customize_partial_blogname() {
	bloginfo( 'name' );
}

function luzuk_wine_store_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

if (class_exists('WP_Customize_Control')) {

   	class Luzuk_Wine_Store_Fontawesome_Icon_Chooser extends WP_Customize_Control {

      	public $type = 'icon';

      	public function render_content() { ?>
	     	<label>
	            <span class="customize-control-title">
	               <?php echo esc_html($this->label); ?>
	            </span>

	            <?php if ($this->description) { ?>
	                <span class="description customize-control-description">
	                   <?php echo wp_kses_post($this->description); ?>
	                </span>
	            <?php } ?>

	            <div class="wine-store-selected-icon">
	                <i class="fa <?php echo esc_attr($this->value()); ?>"></i>
	                <span><i class="fa fa-angle-down"></i></span>
	            </div>

	            <ul class="wine-store-icon-list clearfix">
	                <?php
	                $luzuk_wine_store_font_awesome_icon_array = luzuk_wine_store_font_awesome_icon_array();
	                foreach ($luzuk_wine_store_font_awesome_icon_array as $luzuk_wine_store_font_awesome_icon) {
	                   $icon_class = $this->value() == $luzuk_wine_store_font_awesome_icon ? 'icon-active' : '';
	                   echo '<li class=' . esc_attr($icon_class) . '><i class="' . esc_attr($luzuk_wine_store_font_awesome_icon) . '"></i></li>';
	                }
	                ?>
	            </ul>
	            <input type="hidden" value="<?php $this->value(); ?>" <?php $this->link(); ?> />
	        </label>
	        <?php
      	}
  	}
}
function luzuk_wine_store_customizer_script() {
   wp_enqueue_style( 'font-awesome-1', esc_url(get_template_directory_uri()).'/assets/css/fontawesome-all.css');
}
add_action( 'customize_controls_enqueue_scripts', 'luzuk_wine_store_customizer_script' );