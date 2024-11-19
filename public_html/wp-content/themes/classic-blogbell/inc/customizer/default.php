<?php
/**
 * Default theme options.
 *
 * @package Classic BlogBell
 */


if ( ! function_exists( 'classic_blogbell_get_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
	
	function classic_blogbell_get_default_theme_options() {

		$theme_data = wp_get_theme();
		$defaults = array();

		$defaults['show_header_contact_info'] 	= true;
		$defaults['disable_homepage_content_section'] 			= false;
		$defaults['show_topbar'] 			= true;
		$defaults['topbar_layout_option'] 			= 'contact-info-option';
	    $defaults['header_email']             	= __( 'info@sensationaltheme.com','classic-blogbell' );
	    $defaults['header_phone' ]            	= __( '+1-541-754-3010','classic-blogbell' );
	    $defaults['header_location' ]           = __( 'London, UK','classic-blogbell' );
	    $defaults['enable_header_contact_info'] 	= true;
	    $defaults['header_email_text']             	= __( 'Email ID','classic-blogbell' );
	    $defaults['header_phone_text' ]            	= __( 'Free Call','classic-blogbell' );
	    $defaults['header_location_text' ]           = __( 'Visit Us','classic-blogbell' );
	    $defaults['header_email_address']             	= __( 'info@sensationaltheme.com','classic-blogbell' );
	    $defaults['header_phone_contact' ]            	= __( '+1-541-754-3010','classic-blogbell' );
	    $defaults['header_location_address' ]           = __( 'London, UK','classic-blogbell' );
	    $defaults['show_header_social_links'] 	= true;
	    $defaults['show_menu_social_links'] 	= true;
	    $defaults['header_social_links']		= array();
	    $defaults['disable_header_background_section'] = false;
	    $defaults['show_header_search'] 	= true;
	    $defaults['show_current_date'] 	= true;
	    $defaults['top_login_text'] 	= __( 'Login','classic-blogbell' );
	    $defaults['top_login_url'] 	='#';
	    $defaults['top_register_text'] 	= __( 'Register','classic-blogbell' );
	    $defaults['top_register_url'] 	= '#';
	    $defaults['search_login_layout'] 	= 'login-option';
	    $defaults['colorscheme_hue'] 	= '#c20017';
	    $defaults['medi_text_color'] 	= '#191B1D';
	    $defaults['medi_secondary_color'] 	= '#14457B';
	    $defaults['topbar_background_color'] 	= '#000';
	    $defaults['topbar_color'] 	= '#ffffff';
	    $defaults['enable_center_logo'] 	= true;


	    $defaults['menu_background_color'] 	= '#fff';
	    $defaults['menu_text_hover'] 	= 'menu-hover-none';
	    $defaults['header_text_hover'] 	= 'title-hover-none';
	    $defaults['number_of_menu_items'] 	= 6;
	    $defaults['preloader_loader_enable'] 	= false;
	    $defaults['preloader_loader_options'] 	= 'loader-1';
	    $defaults['header_text_transform_options'] 	= 'none';
	    $defaults['header_text_decoration_options'] 	= 'none';
	    $defaults['header_font_style_options'] 	= 'none';
	    $defaults['header_text_design'] 	= false;
	    $defaults['homepage_color_layout_options']			= 'dark-layout';
	    $defaults['header_layout_options']			= 'header-two';
	    $defaults['homepage_design_layout_options']			= 'home-five';
	    $defaults['homepage_sidebar_position']			= 'home-right-sidebar';
	    $defaults['header_top_buttom_padding']			= 10;

		// Featured Slider Section
		$defaults['disable_featured-slider_section']	= true;
		$defaults['number_of_sr_items']			= 4;
		$defaults['number_of_sr_column']		= 1;
		$defaults['featured_slider_layout_option']			= 'fullwidth-slider';
		$defaults['featured_slider_content_position_option']			= 'default-position';
		$defaults['sr_content_type']			= 'sr_category';
		$defaults['featured_slider_speed']				= 800;
		$defaults['featured_slider_excerpt_length']			= 30;
		$defaults['disable_white_overlay']		= false;
		$defaults['featured_slider_arrow_enable']		= true;
		$defaults['featured_slider_fade_enable']		 	= true;
		$defaults['featured_slider_autoplay_enable']		= true;
		$defaults['featured_slider_infinite_enable']		= true;
		$defaults['featured_slider_title_enable']		= true;
		$defaults['featured_slider_category_enable']		= true;
		$defaults['featured_slider_content_enable']		= true;
		$defaults['featured_slider_author_enable']		= true;
		$defaults['featured_slider_posted_on_enable']		= true;
		$defaults['disable_blog_banner_section']		= false;
		$defaults['featured_slider_social_title_text']	   		= esc_html__( 'Follow Me:', 'classic-blogbell' );

		// Headlines Section
		$defaults['disable_flash_section']	= true;
		$defaults['flash_title']	   	 	= esc_html__( 'Flash News', 'classic-blogbell' );
		$defaults['number_of_flash_items']			= 6;
		$defaults['flash_content_type']			= 'flash_category';

		// Highlights Section
		$defaults['disable_slider_section']	= false;
		$defaults['slider_title']	   	 		= esc_html__( 'Featured Post', 'classic-blogbell' );
		$defaults['slider_subtitle']	   	 	= esc_html__( 'Every sunrise brings a new opportunity to rewrite your story, to chase your dreams, and to embrace the magic of possibilities.', 'classic-blogbell' );
		$defaults['slider_video_text']	   	 	= esc_html__( 'Watch this video', 'classic-blogbell' );
		$defaults['number_of_slider_items']			= 5;
		$defaults['number_of_slider_column']		= 1;
		$defaults['slider_content_type']			= 'slider_category';
		$defaults['slider_speed']				= 500;
		$defaults['slider_excerpt_length']			= 5;
		$defaults['slider_arrow_enable']		= true;
		$defaults['slider_fade_enable']		 	= false;
		$defaults['slider_dot']					= false;
		$defaults['slider_autoplay_enable']		= true;
		$defaults['slider_infinite_enable']		= true;
		$defaults['slider_category_enable']		= true;
		$defaults['slider_content_enable']		= false;
		$defaults['slider_posted_on_enable']		= true;
		$defaults['slider_author_enable']		= true;
		$defaults['slider_post_count_enable']		= false;
		$defaults['slider_lite_dark_background']	= 'lite-bg';
		$defaults['slider_content_align']		= 'content-left';
		$defaults['number_of_slider_ads']			= 2;
		$defaults['slider_column_option']			= 'col-2';
		$defaults['disable_slider_ads_section']	= false;

		//Cta Section	
		$defaults['disable_message_section']	   	= true;
		$defaults['message_highlight_title']	   	= esc_html__( 'Hi.', 'classic-blogbell' );
		$defaults['message_title']	   	= esc_html__( 'I am Fiona Harvey', 'classic-blogbell' );
		$defaults['message_description']	   	= esc_html__( 'I’ve been working with a company this month doing blogger outreach for a project. Part of my job is to vet blogs and determine their audience, their traffic, and whether they’re a good fit for this particular project. Having spent several hours reviewing blogs in several markets, I’ve come to a conclusion: We all need to work on our About pages.', 'classic-blogbell' );
		$defaults['message_btn_text']	   	 	= esc_html__( 'Know More', 'classic-blogbell' );
		$defaults['message_btn_url']	   	 		= '#';
		$defaults['message_content_type']			= 'message_custom';
		$defaults['message_content_enable']			= true;
		$defaults['message_excerpt_enable']			= true;
		$defaults['message_excerpt_length']			= 50;

		//Must Read Section
		$defaults['disable_video_section']	= true;
		$defaults['video_title']	   	 		= esc_html__( 'Explore latest video articles', 'classic-blogbell' );
		$defaults['video_subtitle']	   	 	= esc_html__( 'Every sunrise brings a new opportunity to rewrite your story, to chase your dreams, and to embrace the magic of possibilities.', 'classic-blogbell' );
		$defaults['video_see_all_txt']			= esc_html__( 'See All Posts', 'classic-blogbell' );
		$defaults['number_of_video_items']			= 6;
		$defaults['number_of_video_column']			= 3;
		$defaults['video_excerpt_length']			= 10;
		$defaults['video_content_type']			= 'video_category';
		$defaults['video_content_align']			= 'content-left';
		$defaults['video_background_color']			= '#fff';
		$defaults['video_category_enable']		= false;
		$defaults['video_posted_on_enable']		= true;
		$defaults['video_author_enable']		= false;
		$defaults['video_content_enable']		= false;
		$defaults['number_of_video_ads']			= 2;
		$defaults['video_column_option']			= 'col-2';
		$defaults['disable_video_ads_section']	= false;

		// Catlist Category Section
		$defaults['disable_catlist_section']	= true;
		$defaults['number_of_catlist_column']			= 6;
		$defaults['number_of_catlist_items']			= 10;
		$defaults['catlist_content_type']			= 'post-category';
		$defaults['catlist_title']	   	 		= esc_html__( 'My Major Category', 'classic-blogbell' );
		$defaults['catlist_subtitle']	   	 		= esc_html__( 'I love natural beauty, and I think it’s your best look, but I think makeup as an artist is so transformative.', 'classic-blogbell' );

		// Highlights Section
		$defaults['disable_highlights_section']	= true;
		$defaults['highlights_title']	   	 		= esc_html__( 'Highlights News', 'classic-blogbell' );
		$defaults['highlights_subtitle']	   	 	= esc_html__( 'Every sunrise brings a new opportunity to rewrite your story, to chase your dreams, and to embrace the magic of possibilities.', 'classic-blogbell' );
		$defaults['number_of_highlights_items']			= 5;
		$defaults['number_of_highlights_column']		= 2;
		$defaults['highlights_content_type']			= 'highlights_category';
		$defaults['highlights_speed']				= 500;
		$defaults['highlights_excerpt_length']			= 20;
		$defaults['highlights_arrow_enable']		= true;
		$defaults['highlights_fade_enable']		 	= false;
		$defaults['highlights_dot']					= false;
		$defaults['highlights_autoplay_enable']		= true;
		$defaults['highlights_infinite_enable']		= true;
		$defaults['highlights_category_enable']		= true;
		$defaults['highlights_content_enable']		= false;
		$defaults['highlights_posted_on_enable']		= true;
		$defaults['highlights_author_enable']		= true;
		$defaults['highlights_post_count_enable']		= false;
		$defaults['highlights_lite_dark_background']	= 'lite-bg';
		$defaults['highlights_content_align']		= 'content-left';
		$defaults['number_of_highlights_ads']			= 2;
		$defaults['highlights_column_option']			= 'col-2';
		$defaults['disable_highlights_ads_section']	= false;

		// Featured Post Section
		$defaults['disable_featuredpost_section']	= true;
		$defaults['featuredpost_title']	   	 	= esc_html__( 'Featured of the Week', 'classic-blogbell' );
		$defaults['featuredpost_subtitle']	   	 	= esc_html__( 'Every sunrise brings a new opportunity to rewrite your story, to chase your dreams, and to embrace the magic of possibilities.', 'classic-blogbell' );
		$defaults['featuredpost_right_title']	   	 	= esc_html__( 'Featured News', 'classic-blogbell' );
		$defaults['number_of_featuredpost_items']			= 5;
		$defaults['number_of_featuredpost_right_items']			= 5;
		$defaults['featuredpost_layout_option']			= 'default-featuredpost';
		$defaults['featuredpost_content_type']			= 'featuredpost_category';
		$defaults['featuredpost_lite_dark_background']	= 'lite-bg';
		$defaults['featuredpost_category_enable']		= true;
		$defaults['featuredpost_posted_on_enable']		= true;
		$defaults['featuredpost_content_enable']		= true;
		$defaults['featuredpost_author_enable']		= true;
		$defaults['featuredpost_post_count_enable']		= false;
		$defaults['featuredpost_see_all_txt']			= esc_html__( 'See All Posts', 'classic-blogbell' );
		$defaults['number_of_featuredpost_ads']			= 2;
		$defaults['featuredpost_column_option']			= 'col-2';
		$defaults['disable_featuredpost_ads_section']	= false;

		//Must Read Section
		$defaults['disable_mustread_section']	= false;
		$defaults['mustread_title']	   	 		= esc_html__( 'Must Read Posts', 'classic-blogbell' );
		$defaults['mustread_subtitle']	   	 	= esc_html__( 'Every sunrise brings a new opportunity to rewrite your story, to chase your dreams, and to embrace the magic of possibilities.', 'classic-blogbell' );
		$defaults['mustread_see_all_txt']			= esc_html__( 'See All Posts', 'classic-blogbell' );
		$defaults['number_of_mustread_items']			= 3;
		$defaults['number_of_mustread_column']			= 3;
		$defaults['mustread_excerpt_length']			= 10;
		$defaults['mustread_content_type']			= 'mustread_category';
		$defaults['mustread_content_align']			= 'content-left';
		$defaults['mustread_background_color']			= '#fff';
		$defaults['mustread_category_enable']		= false;
		$defaults['mustread_posted_on_enable']		= true;
		$defaults['mustread_author_enable']		= false;
		$defaults['mustread_content_enable']		= false;
		$defaults['mustread_see_all_txt']			= esc_html__( 'See All Posts', 'classic-blogbell' );
		$defaults['number_of_mustread_ads']			= 2;
		$defaults['mustread_column_option']			= 'col-2';
		$defaults['disable_mustread_ads_section']	= false;


		//Popular Section
		$defaults['disable_popular_section']	= true;
		$defaults['popular_title']	   	 		= esc_html__( 'Popular Posts', 'classic-blogbell' );
		$defaults['popular_subtitle']	   	 	= esc_html__( 'Every sunrise brings a new opportunity to rewrite your story, to chase your dreams, and to embrace the magic of possibilities.', 'classic-blogbell' );
		$defaults['popular_see_all_txt']			= esc_html__( 'See All Posts', 'classic-blogbell' );
		$defaults['number_of_popular_items']			= 5;
		$defaults['number_of_popular_column']			= 3;
		$defaults['popular_excerpt_length']			= 20;
		$defaults['popular_content_type']			= 'popular_category';
		$defaults['popular_content_align']			= 'content-left';
		$defaults['popular_background_color']			= '#fff';
		$defaults['popular_category_enable']		= true;
		$defaults['popular_posted_on_enable']		= true;
		$defaults['popular_author_enable']		= true;
		$defaults['popular_content_enable']		= true;
		$defaults['popular_post_count_enable']		= false;
		$defaults['number_of_popular_ads']			= 1;
		$defaults['popular_column_option']			= 'col-1';
		$defaults['disable_popular_ads_section']	= false;

		//Popular Section
		$defaults['disable_editorpick_section']	= true;
		$defaults['editorpick_title']	   	 		= esc_html__( 'Featured Posts', 'classic-blogbell' );
		$defaults['editorpick_subtitle']	   	 	= esc_html__( 'Every sunrise brings a new opportunity to rewrite your story, to chase your dreams, and to embrace the magic of possibilities.', 'classic-blogbell' );
		$defaults['editorpick_see_all_txt']			= esc_html__( 'See All Posts', 'classic-blogbell' );
		$defaults['number_of_editorpick_items']			= 6;
		$defaults['number_of_editorpick_column']			= 3;
		$defaults['editorpick_excerpt_length']			= 10;
		$defaults['editorpick_top_content_type']			= 'editorpick_top_post';
		$defaults['editorpick_top_excerpt_length']			= 20;
		$defaults['editorpick_content_type']			= 'editorpick_category';
		$defaults['editorpick_content_align']			= 'content-left';
		$defaults['editorpick_background_color']			= '#fff';
		$defaults['editorpick_see_all_txt']			= esc_html__( 'See All Posts', 'classic-blogbell' );
		$defaults['editorpick_top_category_enable']		= true;
		$defaults['editorpick_top_posted_on_enable']		= true;
		$defaults['editorpick_top_author_enable']		= true;
		$defaults['editorpick_top_content_enable']		= false;
		$defaults['editorpick_category_enable']		= false;
		$defaults['editorpick_posted_on_enable']		= true;
		$defaults['editorpick_author_enable']		= false;
		$defaults['editorpick_content_enable']		= false;
		$defaults['editorpick_post_count_enable']		= false;
		$defaults['number_of_editorpick_ads']			= 1;
		$defaults['editorpick_column_option']			= 'col-1';
		$defaults['disable_editorpick_ads_section']	= false;


		//Popular Section
		$defaults['disable_fixheight_section']	= false;
		$defaults['fixheight_title']	   	 		= esc_html__( 'Trending Posts', 'classic-blogbell' );
		$defaults['fixheight_subtitle']	   	 	= esc_html__( 'Every sunrise brings a new opportunity to rewrite your story, to chase your dreams, and to embrace the magic of possibilities.', 'classic-blogbell' );
		$defaults['number_of_fixheight_items']			= 10;
		$defaults['number_of_fixheight_column']			= 3;
		$defaults['fixheight_excerpt_length']			= 20;
		$defaults['fixheight_right_content_type']			= 'fixheight_right_post';
		$defaults['fixheight_right_excerpt_length']			= 20;
		$defaults['fixheight_content_type']			= 'fixheight_category';
		$defaults['fixheight_content_align']			= 'content-left';
		$defaults['fixheight_background_color']			= '#fff';
		$defaults['fixheight_see_all_txt']			= esc_html__( 'See All Posts', 'classic-blogbell' );
		$defaults['fixheight_right_category_enable']		= true;
		$defaults['fixheight_right_posted_on_enable']		= true;
		$defaults['fixheight_right_author_enable']		= true;
		$defaults['fixheight_right_content_enable']		= false;
		$defaults['fixheight_category_enable']		= false;
		$defaults['fixheight_posted_on_enable']		= true;
		$defaults['fixheight_author_enable']		= false;
		$defaults['fixheight_content_enable']		= true;
		$defaults['fixheight_post_count_enable']		= false;
		$defaults['number_of_fixheight_ads']			= 1;
		$defaults['fixheight_column_option']			= 'col-1';
		$defaults['disable_fixheight_ads_section']	= false;

		//List Section
		$defaults['disable_list_section']	= true;
		$defaults['list_title']	   	 		= esc_html__( 'List News', 'classic-blogbell' );
		$defaults['list_subtitle']	   	 	= esc_html__( 'Every sunrise brings a new opportunity to rewrite your story, to chase your dreams, and to embrace the magic of possibilities.', 'classic-blogbell' );
		$defaults['number_of_list_items']			= 8;
		$defaults['number_of_list_column']			= 2;
		$defaults['list_excerpt_length']			=5;
		$defaults['list_content_type']			= 'list_category';
		$defaults['list_content_align']			= 'content-left';
		$defaults['list_background_color']			= '#fff';
		$defaults['list_category_enable']		= true;
		$defaults['list_posted_on_enable']		= true;
		$defaults['list_author_enable']		= false;
		$defaults['list_content_enable']		= false;
		$defaults['list_post_count_enable']		= false;
		$defaults['number_of_list_ads']			= 1;
		$defaults['list_column_option']			= 'col-1';
		$defaults['disable_list_ads_section']	= false;

		//Recent Section
		$defaults['disable_recent_section']	= false;
		$defaults['recent_title']	   	 		= esc_html__( 'Recent News', 'classic-blogbell' );
		$defaults['recent_subtitle']	   	 	= esc_html__( 'Every sunrise brings a new opportunity to rewrite your story, to chase your dreams, and to embrace the magic of possibilities.', 'classic-blogbell' );
		$defaults['recent_see_all_txt']			= esc_html__( 'See All Posts', 'classic-blogbell' );
		$defaults['number_of_recent_items']			= 4;
		$defaults['number_of_recent_column']			= 2;
		$defaults['recent_excerpt_length']			= 20;
		$defaults['recent_content_type']			= 'recent_category';
		$defaults['recent_background_color']	   	= '#fff';
		$defaults['recent_content_align']			= 'content-left';
		$defaults['recent_category_enable']		= true;
		$defaults['recent_lite_dark_background']		= 'lite-bg';
		$defaults['recent_posted_on_enable']		= true;
		$defaults['recent_author_enable']		= true;
		$defaults['recent_content_enable']		= true;
		$defaults['recent_post_count_enable']		= false;
		$defaults['number_of_recent_ads']			= 1;
		$defaults['recent_column_option']			= 'col-1';
		$defaults['disable_recent_ads_section']	= false;


		//Trending Section
		$defaults['disable_trending_section']	= true;
		$defaults['trending_title']	   	 		= esc_html__( 'Trending News', 'classic-blogbell' );
		$defaults['trending_subtitle']	   	 	= esc_html__( 'Every sunrise brings a new opportunity to rewrite your story, to chase your dreams, and to embrace the magic of possibilities.', 'classic-blogbell' );
		$defaults['number_of_trending_items']			= 3;
		$defaults['number_of_trending_column']			= 3;
		$defaults['trending_excerpt_length']			= 20;
		$defaults['trending_content_type']			= 'trending_category';
		$defaults['trending_content_align']			= 'content-left';
		$defaults['trending_background_color']			= '#fff';
		$defaults['trending_category_enable']		= true;
		$defaults['trending_posted_on_enable']		= true;
		$defaults['trending_author_enable']		= true;
		$defaults['trending_content_enable']		= false;
		$defaults['trending_post_count_enable']		= false;
		$defaults['trending_see_all_txt']			= esc_html__( 'See All Posts', 'classic-blogbell' );

		// Category News Section
		$defaults['disable_categorynews_section']	= true;
		$defaults['number_of_categorynews_items']			= 5;
		$defaults['number_of_categorynews_column']			= 2;
		$defaults['categorynews_see_all_txt']	   	 		= esc_html__( 'See All', 'classic-blogbell' );
		$defaults['categorynews_category_enable']		= true;
		$defaults['categorynews_posted_on_enable']		= true;
		$defaults['categorynews_content_enable']		= true;
		$defaults['categorynews_author_enable']		= true;
		$defaults['number_of_categorynews_ads']			= 1;
		$defaults['categorynews_column_option']			= 'col-1';
		$defaults['disable_categorynews_ads_section']	= false;



		// Shop product Section
		$defaults['disable_shopproduct_section']	= true;
		$defaults['shopproduct_title']	   	 		= esc_html__( 'Product', 'classic-blogbell' );
		$defaults['shopproduct_readmore']	   	 		= esc_html__( 'Boy Now', 'classic-blogbell' );
		$defaults['shopproduct_subtitle']	   	 	= esc_html__( 'Every sunrise brings a new opportunity to rewrite your story, to chase your dreams, and to embrace the magic of possibilities.', 'classic-blogbell' );
		$defaults['number_of_shopproduct_items']	= 2;
		$defaults['shopproduct_content_type']		= 'product';
		$defaults['shopproduct_background_color']	   	= '#fff';

		// Gallery Section
		$defaults['disable_gallery_section']	= true;
		$defaults['number_of_gallery_items']			= 4;
		;$defaults['gallery_title']	   				= esc_html__( 'Video News', 'classic-blogbell' );
		$defaults['gallery_subtitle']	   	 		= esc_html__( 'Every sunrise brings a new opportunity to rewrite your story, to chase your dreams, and to embrace the magic of possibilities.', 'classic-blogbell' );
		$defaults['gallery_lite_dark_background']		= 'lite-bg';
		$defaults['gallery_content_type']		= 'gallery_category';

		// Gallery Section
		$defaults['disable_subscription_section']	= true;
		;$defaults['subscription_title']	   				= esc_html__( 'Subscribe To Our Newsletter', 'classic-blogbell' );
		$defaults['subscription_description']	   	 		= esc_html__( 'Every sunrise brings a new opportunity to rewrite your story, to chase your dreams, and to embrace the magic of possibilities.', 'classic-blogbell' );
		$defaults['subscription_bnt_text']	   	 		= esc_html__( 'Subscribe', 'classic-blogbell' );


		// Latest News Section
		$defaults['latest_posts_title']	   	 	= esc_html__( 'Latest News', 'classic-blogbell' );
		$defaults['latest_section_posts_title']	   	 	= esc_html__( 'I love natural beauty, and I think it’s your best look, but I think makeup as an artist is so transformative.', 'classic-blogbell' );
		$defaults['number_of_latest_posts_column']	= 2;
		$defaults['pagination_type']		= 'numeric';
		$defaults['latest_category_enable']		= true;
		$defaults['latest_author_enable']		= true;
		$defaults['latest_comment_enable']		= true;
		$defaults['latest_content_enable']		= true;
		$defaults['latest_read_more_text_enable']		= true;
		$defaults['latest_posted_on_enable']		= true;
		$defaults['latest_video_enable']		= false;
		$defaults['blog_layout_content_type']		= 'blog-one';
		$defaults['archive_content_align']		= 'content-left';
		$defaults['archive_post_header_title_enable']		= true;
		$defaults['archive_post_header_image_enable']		= true;
		$defaults['remove_category_text_archive_page']		= true;
		$defaults['blog_post_header_image_enable']		= true;
		$defaults['blog_post_header_title_enable']		= true;
		$defaults['background_image_enable']		= true;
		
		// Decoration Option
		$defaults['decoration_side_enable']		= true;
		

		// Category Design Option
		$defaults['category_design_content_type']		= 'category-two';
		$defaults['enable_category_icon']		= false;

		// Single Post Option
		$defaults['single_post_category_enable']		= true;
		$defaults['single_post_posted_on_enable']		= true;
		$defaults['single_post_video_enable']		= true;
		$defaults['single_post_comment_enable']		= true;
		$defaults['single_post_author_enable']		= true;
		$defaults['single_post_pagination_enable']		= true;
		$defaults['single_post_image_enable']		= true;
		$defaults['single_post_header_image_enable']		= true;
		$defaults['single_post_header_title_enable']		= true;
		$defaults['single_post_header_image_as_header_image_enable']		= true;
		$defaults['single_post_content_align']		= 'content-left';


		// Single Post Option
		$defaults['single_page_video_enable']		= true;
		$defaults['single_page_image_enable']		= true;
		$defaults['single_page_header_image_enable']		= true;
		$defaults['single_page_header_title_enable']		= true;
		$defaults['single_page_header_image_as_header_image_enable']		= true;
		$defaults['single_page_content_align']		= 'content-left';
		
		$defaults['theme_typography']			=  'default';
		$defaults['body_theme_typography']		=  'default';		
		$defaults['archive_typography']			=  'default';
		$defaults['body_archive_typography']		=  'default';		
		$defaults['page_typography']			=  'default';
		$defaults['body_page_typography']		=  'default';		
		$defaults['post_typography']			=  'default';
		$defaults['body_post_typography']		=  'default';		
		$defaults['site_title_typography']			=  'default';
		$defaults['site_tagline_typography']		=  'default';

		// animation
		$defaults['animation_slide_type']		= 'animation-b-t';
		$defaults['enable_animation']		= true;

		//General Section
		$defaults['latest_readmore_text']			= esc_html__('Read More','classic-blogbell');
		$defaults['excerpt_length']					= 30;
		$defaults['layout_options_blog']			= 'right-sidebar';
		$defaults['layout_options_archive']			= 'right-sidebar';
		$defaults['layout_options_page']			= 'right-sidebar';	
		$defaults['layout_options_single']			= 'right-sidebar';	

		//Footer section 
		$defaults['scroll_top_visible']		= true;		
		$defaults['copyright_text']				= esc_html__( 'Copyright &copy; All rights reserved.', 'classic-blogbell' );
		$defaults['powered_by_text']			= esc_html__( 'Classic BlogBell by Sensational Theme', 'classic-blogbell' );
		$defaults['enable_footer_background_image'] 	= true;
		$defaults['footer_copyright_font_color'] 	= '#fff';
		$defaults['footer_copyright_background_color'] 	= '#000';

		// Pass through filter.
		$defaults = apply_filters( 'classic_blogbell_filter_default_theme_options', $defaults );
		return $defaults;
	}

endif;


/**
*  Get theme options
*/
if ( ! function_exists( 'classic_blogbell_get_option' ) ) :

	/**
	 * Get theme option
	 *
	 * @since 1.0.0
	 *
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function classic_blogbell_get_option( $key ) {

			$default_options = classic_blogbell_get_default_theme_options();
		
		if ( empty( $key ) ) {
			return;
		}

		$theme_options = (array)get_theme_mod( 'theme_options' );
		$theme_options = wp_parse_args( $theme_options, $default_options );

		$value = null;

		if ( isset( $theme_options[ $key ] ) ) {
			$value = $theme_options[ $key ];
		}

		return $value;

	}

endif;