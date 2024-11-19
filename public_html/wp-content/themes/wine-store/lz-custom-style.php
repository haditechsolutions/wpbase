<?php 

	$luzuk_wine_store_custom_style = '';

	// Logo Size
	$luzuk_wine_store_logo_top_padding = get_theme_mod('luzuk_wine_store_logo_top_padding');
	$luzuk_wine_store_logo_bottom_padding = get_theme_mod('luzuk_wine_store_logo_bottom_padding');
	$luzuk_wine_store_logo_left_padding = get_theme_mod('luzuk_wine_store_logo_left_padding');
	$luzuk_wine_store_logo_right_padding = get_theme_mod('luzuk_wine_store_logo_right_padding');

	if( $luzuk_wine_store_logo_top_padding != '' || $luzuk_wine_store_logo_bottom_padding != '' || $luzuk_wine_store_logo_left_padding != '' || $luzuk_wine_store_logo_right_padding != ''){
		$luzuk_wine_store_custom_style .=' .logo {';
			$luzuk_wine_store_custom_style .=' padding-top: '.esc_attr($luzuk_wine_store_logo_top_padding).'px; padding-bottom: '.esc_attr($luzuk_wine_store_logo_bottom_padding).'px; padding-left: '.esc_attr($luzuk_wine_store_logo_left_padding).'px; padding-right: '.esc_attr($luzuk_wine_store_logo_right_padding).'px;';
		$luzuk_wine_store_custom_style .=' }';
	}

	// Header Image
	$header_image_url = luzuk_wine_store_banner_image( $image_url = '' );
	if( $header_image_url != ''){
		$luzuk_wine_store_custom_style .=' #inner-pages-header {';
			$luzuk_wine_store_custom_style .=' background-image: url('. esc_url( $header_image_url ).') !important; background-size: cover; background-repeat: no-repeat; background-attachment: fixed;';
		$luzuk_wine_store_custom_style .=' }';

		$luzuk_wine_store_custom_style .='  #header .top-head {';
			$luzuk_wine_store_custom_style .=' background: none ';
		$luzuk_wine_store_custom_style .=' }';
	} else {
		$luzuk_wine_store_custom_style .=' #inner-pages-header {';
			$luzuk_wine_store_custom_style .=' background: radial-gradient(circle at center, rgba(0,0,0,0) 0%, #000000 100%); ';
		$luzuk_wine_store_custom_style .=' }';
	}

	$luzuk_wine_store_slider_hide_show = get_theme_mod('luzuk_wine_store_slider_hide_show',false);
	if( $luzuk_wine_store_slider_hide_show == true){
		$luzuk_wine_store_custom_style .=' .page-template-custom-home-page #inner-pages-header {';
			$luzuk_wine_store_custom_style .=' display:none;';
		$luzuk_wine_store_custom_style .=' }';
	}


	$luzuk_wine_store_headertopmailphonicon_col = get_theme_mod('luzuk_wine_store_headertopmailphonicon_col');
	if ( $luzuk_wine_store_headertopmailphonicon_col != '') {
		$luzuk_wine_store_custom_style .=' #header .mail i,#header .phn i {';
			$luzuk_wine_store_custom_style .=' color:'.esc_attr($luzuk_wine_store_headertopmailphonicon_col).';';
		$luzuk_wine_store_custom_style .=' }';
	}

	$luzuk_wine_store_headertopmailphone_col = get_theme_mod('luzuk_wine_store_headertopmailphone_col');
	if ( $luzuk_wine_store_headertopmailphone_col != '') {
		$luzuk_wine_store_custom_style .=' #header .num.tooltiptext {';
			$luzuk_wine_store_custom_style .=' color:'.esc_attr($luzuk_wine_store_headertopmailphone_col).';';
		$luzuk_wine_store_custom_style .=' }';
	}

	$luzuk_wine_store_headertopmailphonehovr_col = get_theme_mod('luzuk_wine_store_headertopmailphonehovr_col');
	if ( $luzuk_wine_store_headertopmailphonehovr_col != '') {
		$luzuk_wine_store_custom_style .=' #header .num.tooltiptext:hover {';
			$luzuk_wine_store_custom_style .=' color:'.esc_attr($luzuk_wine_store_headertopmailphonehovr_col).';';
		$luzuk_wine_store_custom_style .=' }';
	}

	$luzuk_wine_store_headertopsoiclaicon_col = get_theme_mod('luzuk_wine_store_headertopsoiclaicon_col');
	if ( $luzuk_wine_store_headertopsoiclaicon_col != '') {
		$luzuk_wine_store_custom_style .=' #header .social-icon a i {';
			$luzuk_wine_store_custom_style .=' color:'.esc_attr($luzuk_wine_store_headertopsoiclaicon_col).';';
		$luzuk_wine_store_custom_style .=' }';
	}

	$luzuk_wine_store_headertopsocialiconhrv_col = get_theme_mod('luzuk_wine_store_headertopsocialiconhrv_col');
	if ( $luzuk_wine_store_headertopsocialiconhrv_col != '') {
		$luzuk_wine_store_custom_style .=' #header .social-icon a:hover i {';
			$luzuk_wine_store_custom_style .=' color:'.esc_attr($luzuk_wine_store_headertopsocialiconhrv_col).';';
		$luzuk_wine_store_custom_style .=' }';
	}

	$luzuk_wine_store_headerbg_col = get_theme_mod('luzuk_wine_store_headerbg_col');
	if ( $luzuk_wine_store_headerbg_col != '') {
		$luzuk_wine_store_custom_style .=' #header,.page-template-custom-home-page #header {';
			$luzuk_wine_store_custom_style .=' background:'.esc_attr($luzuk_wine_store_headerbg_col).';';
		$luzuk_wine_store_custom_style .=' }';
	}


	$luzuk_wine_store_headeracccarticon_col = get_theme_mod('luzuk_wine_store_headeracccarticon_col');
	if ( $luzuk_wine_store_headeracccarticon_col != '') {
		$luzuk_wine_store_custom_style .=' #header .signinregisterinnbx i,#header .cart i {';
			$luzuk_wine_store_custom_style .=' color:'.esc_attr($luzuk_wine_store_headeracccarticon_col).';';
		$luzuk_wine_store_custom_style .=' }';
	}

	$luzuk_wine_store_headeracccarticonhrv_col = get_theme_mod('luzuk_wine_store_headeracccarticonhrv_col');
	if ( $luzuk_wine_store_headeracccarticonhrv_col != '') {
		$luzuk_wine_store_custom_style .=' #header .cart i:hover,#header .signinregisterinnbx i:hover {';
			$luzuk_wine_store_custom_style .=' color:'.esc_attr($luzuk_wine_store_headeracccarticonhrv_col).';';
		$luzuk_wine_store_custom_style .=' }';
	}
	
	$luzuk_wine_store_menu_color = get_theme_mod('luzuk_wine_store_menu_color');
	if ( $luzuk_wine_store_menu_color != '') {
		$luzuk_wine_store_custom_style .=' .primary-menu a, .primary-menu li .icon, 
		.primary-menu-class a, .primary-menu-class li .icon {';
			$luzuk_wine_store_custom_style .=' color:'.esc_attr($luzuk_wine_store_menu_color).';';
		$luzuk_wine_store_custom_style .=' }';
	}


	$luzuk_wine_store_menubrdhover_color = get_theme_mod('luzuk_wine_store_menubrdhover_color');
	if ( $luzuk_wine_store_menubrdhover_color != '') {
		$luzuk_wine_store_custom_style .='.primary-menu li:hover .icon, .primary-menu li a:hover,
		.primary-menu-class li:hover .icon, .primary-menu-class li a:hover{';
			$luzuk_wine_store_custom_style .=' color:'.esc_attr($luzuk_wine_store_menubrdhover_color).';';
		$luzuk_wine_store_custom_style .=' }';
	}

	$luzuk_wine_store_submenu_color = get_theme_mod('luzuk_wine_store_submenu_color');
	if ( $luzuk_wine_store_submenu_color != '') {
		$luzuk_wine_store_custom_style .='.primary-menu ul a,.primary-menu-class ul a{';
			$luzuk_wine_store_custom_style .=' color:'.esc_attr($luzuk_wine_store_submenu_color).';';
		$luzuk_wine_store_custom_style .=' }';
	}

	$luzuk_wine_store_submenubg_color = get_theme_mod('luzuk_wine_store_submenubg_color');
	if ( $luzuk_wine_store_submenubg_color != '') {
		$luzuk_wine_store_custom_style .='.primary-menu ul,.primary-menu-class ul{';
			$luzuk_wine_store_custom_style .=' background:'.esc_attr($luzuk_wine_store_submenubg_color).';';
		$luzuk_wine_store_custom_style .=' }';
	}


	

	//site title tagline
	$luzuk_wine_store_site_title_color = get_theme_mod('luzuk_wine_store_site_title_color');
	if ( $luzuk_wine_store_site_title_color != '') {
		$luzuk_wine_store_custom_style .=' h1.site-title a, p.site-title a{';
			$luzuk_wine_store_custom_style .=' color:'.esc_attr($luzuk_wine_store_site_title_color).';';
		$luzuk_wine_store_custom_style .=' }';
	}

	$luzuk_wine_store_site_tagline_color = get_theme_mod('luzuk_wine_store_site_tagline_color');
	if ( $luzuk_wine_store_site_tagline_color != '') {
		$luzuk_wine_store_custom_style .=' p.site-description{';
			$luzuk_wine_store_custom_style .=' color:'.esc_attr($luzuk_wine_store_site_tagline_color).';';
		$luzuk_wine_store_custom_style .=' }';
	}

	

	//slider colors

	
	$luzuk_wine_store_slider_title_color = get_theme_mod('luzuk_wine_store_slider_title_color');
	if ( $luzuk_wine_store_slider_title_color != '') {
		$luzuk_wine_store_custom_style .=' #slider .content h2{';
			$luzuk_wine_store_custom_style .=' color:'.esc_attr($luzuk_wine_store_slider_title_color).';';
		$luzuk_wine_store_custom_style .=' }';
	}

	$luzuk_wine_store_slider_description_color = get_theme_mod('luzuk_wine_store_slider_description_color');
	if ( $luzuk_wine_store_slider_description_color != '') {
		$luzuk_wine_store_custom_style .=' #slider .content p{';
			$luzuk_wine_store_custom_style .=' color:'.esc_attr($luzuk_wine_store_slider_description_color).';';
		$luzuk_wine_store_custom_style .=' }';
	}

	$luzuk_wine_store_slider_btntext_color = get_theme_mod('luzuk_wine_store_slider_btntext_color');
	if ( $luzuk_wine_store_slider_btntext_color != '') {
		$luzuk_wine_store_custom_style .=' #slider .read-btn a{';
			$luzuk_wine_store_custom_style .=' color:'.esc_attr($luzuk_wine_store_slider_btntext_color).';';
		$luzuk_wine_store_custom_style .=' }';
	}

	$luzuk_wine_store_slider_btnbg_color = get_theme_mod('luzuk_wine_store_slider_btnbg_color');
	if ( $luzuk_wine_store_slider_btnbg_color != '') {
		$luzuk_wine_store_custom_style .=' #slider .read-btn a{';
			$luzuk_wine_store_custom_style .=' background:'.esc_attr($luzuk_wine_store_slider_btnbg_color).';';
		$luzuk_wine_store_custom_style .=' }';
	}

	$luzuk_wine_store_slider_btntexthrv_color = get_theme_mod('luzuk_wine_store_slider_btntexthrv_color');
	if ( $luzuk_wine_store_slider_btntexthrv_color != '') {
		$luzuk_wine_store_custom_style .=' #slider .read-btn a:hover{';
			$luzuk_wine_store_custom_style .=' color:'.esc_attr($luzuk_wine_store_slider_btntexthrv_color).';';
		$luzuk_wine_store_custom_style .=' }';
	}

	$luzuk_wine_store_slider_contentbg_color = get_theme_mod('luzuk_wine_store_slider_contentbg_color');
	if ( $luzuk_wine_store_slider_contentbg_color != '') {
		$luzuk_wine_store_custom_style .=' #slider{';
			$luzuk_wine_store_custom_style .=' background:'.esc_attr($luzuk_wine_store_slider_contentbg_color).';';
		$luzuk_wine_store_custom_style .=' }';
	}

	

	//categories colors

	$luzuk_wine_store_categoriestitle_color = get_theme_mod('luzuk_wine_store_categoriestitle_color');
	if ( $luzuk_wine_store_categoriestitle_color != '') {
		$luzuk_wine_store_custom_style .=' #productcategory-section .pro-cat-content h5 a{';
			$luzuk_wine_store_custom_style .=' color:'.esc_attr($luzuk_wine_store_categoriestitle_color).';';
		$luzuk_wine_store_custom_style .=' }';
	}



	//newarrivalproduct colors
	$luzuk_wine_store_newarrivalproductsubheading_color = get_theme_mod('luzuk_wine_store_newarrivalproductsubheading_color');
	if ( $luzuk_wine_store_newarrivalproductsubheading_color != '') {
		$luzuk_wine_store_custom_style .=' #newarrivalproducts-section .productcategory-head h2 {';
			$luzuk_wine_store_custom_style .=' color:'.esc_attr($luzuk_wine_store_newarrivalproductsubheading_color).';';
		$luzuk_wine_store_custom_style .=' }';
	}

	$luzuk_wine_store_newarrivalproductheading_color = get_theme_mod('luzuk_wine_store_newarrivalproductheading_color');
	if ( $luzuk_wine_store_newarrivalproductheading_color != '') {
		$luzuk_wine_store_custom_style .=' #newarrivalproducts-section .productcategory-head h3{';
			$luzuk_wine_store_custom_style .=' color:'.esc_attr($luzuk_wine_store_newarrivalproductheading_color).';';
		$luzuk_wine_store_custom_style .=' }';
	}

	$luzuk_wine_store_newarrivalbanneroffertext_color = get_theme_mod('luzuk_wine_store_newarrivalbanneroffertext_color');
	if ( $luzuk_wine_store_newarrivalbanneroffertext_color != '') {
		$luzuk_wine_store_custom_style .=' #newarrivalproducts-section .disbx{';
			$luzuk_wine_store_custom_style .=' color:'.esc_attr($luzuk_wine_store_newarrivalbanneroffertext_color).';';
		$luzuk_wine_store_custom_style .=' }';
	}

	$luzuk_wine_store_newarrivalbanneroffertextbg_color = get_theme_mod('luzuk_wine_store_newarrivalbanneroffertextbg_color');
	if ( $luzuk_wine_store_newarrivalbanneroffertextbg_color != '') {
		$luzuk_wine_store_custom_style .=' #newarrivalproducts-section .disbx{';
			$luzuk_wine_store_custom_style .=' background:'.esc_attr($luzuk_wine_store_newarrivalbanneroffertextbg_color).';';
		$luzuk_wine_store_custom_style .=' }';
	}

	$luzuk_wine_store_newarrivalbannertitle_color = get_theme_mod('luzuk_wine_store_newarrivalbannertitle_color');
	if ( $luzuk_wine_store_newarrivalbannertitle_color != '') {
		$luzuk_wine_store_custom_style .=' #newarrivalproducts-section .imgbx_con .title{';
			$luzuk_wine_store_custom_style .=' color:'.esc_attr($luzuk_wine_store_newarrivalbannertitle_color).';';
		$luzuk_wine_store_custom_style .=' }';
	}

	$luzuk_wine_store_newarrivalbannershoprnowtext_color = get_theme_mod('luzuk_wine_store_newarrivalbannershoprnowtext_color');
	if ( $luzuk_wine_store_newarrivalbannershoprnowtext_color != '') {
		$luzuk_wine_store_custom_style .=' #newarrivalproducts-section .imgbx_con .btn a {';
			$luzuk_wine_store_custom_style .=' color:'.esc_attr($luzuk_wine_store_newarrivalbannershoprnowtext_color).';';
		$luzuk_wine_store_custom_style .=' }';
	}

	$luzuk_wine_store_newarrivalbannershoprnowtexthrv_color = get_theme_mod('luzuk_wine_store_newarrivalbannershoprnowtexthrv_color');
	if ( $luzuk_wine_store_newarrivalbannershoprnowtexthrv_color != '') {
		$luzuk_wine_store_custom_style .=' #newarrivalproducts-section .imgbx_con .btn a:hover {';
			$luzuk_wine_store_custom_style .=' color:'.esc_attr($luzuk_wine_store_newarrivalbannershoprnowtexthrv_color).';';
		$luzuk_wine_store_custom_style .=' }';
	}

	$luzuk_wine_store_newarrivalbannercontentbg_color = get_theme_mod('luzuk_wine_store_newarrivalbannercontentbg_color');
	if ( $luzuk_wine_store_newarrivalbannercontentbg_color != '') {
		$luzuk_wine_store_custom_style .=' #newarrivalproducts-section .imgbx_con {';
			$luzuk_wine_store_custom_style .=' background:'.esc_attr($luzuk_wine_store_newarrivalbannercontentbg_color).';';
		$luzuk_wine_store_custom_style .=' }';
	}

	$luzuk_wine_store_newarrivalproducttitle_color = get_theme_mod('luzuk_wine_store_newarrivalproducttitle_color');
	if ( $luzuk_wine_store_newarrivalproducttitle_color != '') {
		$luzuk_wine_store_custom_style .=' #newarrivalproducts-section .pcontent h3 {';
			$luzuk_wine_store_custom_style .=' color:'.esc_attr($luzuk_wine_store_newarrivalproducttitle_color).';';
		$luzuk_wine_store_custom_style .=' }';
	}

	$luzuk_wine_store_newarrivalproductprice_color = get_theme_mod('luzuk_wine_store_newarrivalproductprice_color');
	if ( $luzuk_wine_store_newarrivalproductprice_color != '') {
		$luzuk_wine_store_custom_style .='#newarrivalproducts-section .pcontent .price ins, #newarrivalproducts-section .pcontent .price .amount {';
			$luzuk_wine_store_custom_style .=' color:'.esc_attr($luzuk_wine_store_newarrivalproductprice_color).';';
		$luzuk_wine_store_custom_style .=' }';
	}

	$luzuk_wine_store_newarrivalproducttitlepricebg_color = get_theme_mod('luzuk_wine_store_newarrivalproducttitlepricebg_color');
	if ( $luzuk_wine_store_newarrivalproducttitlepricebg_color != '') {
		$luzuk_wine_store_custom_style .='#newarrivalproducts-section .pcontent {';
			$luzuk_wine_store_custom_style .=' background:'.esc_attr($luzuk_wine_store_newarrivalproducttitlepricebg_color).';';
		$luzuk_wine_store_custom_style .=' }';
	}

		

	//footer colors
	$luzuk_wine_store_footertext_color = get_theme_mod('luzuk_wine_store_footertext_color');
	if ( $luzuk_wine_store_footertext_color != '') {
		$luzuk_wine_store_custom_style .=' #colophon h1, #colophon h2, #colophon h3, #colophon h4, #colophon h5,
		 #colophon h6,#colophon,#colophon p,.site-footer a, .site-footer p, #colophon caption, .site-footer .widget_rss .rss-date,
		  .site-footer .widget_rss li cite {';
			$luzuk_wine_store_custom_style .=' color: '.esc_attr($luzuk_wine_store_footertext_color).';';
		$luzuk_wine_store_custom_style .=' }';
	}	

	$luzuk_wine_store_footericons_color = get_theme_mod('luzuk_wine_store_footericons_color');
	if ( $luzuk_wine_store_footericons_color != '') {
		$luzuk_wine_store_custom_style .=' #colophon li:before, .site-footer i {';
			$luzuk_wine_store_custom_style .=' color: '.esc_attr($luzuk_wine_store_footericons_color).';';
		$luzuk_wine_store_custom_style .=' }';
	}	

	$luzuk_wine_store_footerbg_color = get_theme_mod('luzuk_wine_store_footerbg_color');
	if ( $luzuk_wine_store_footerbg_color != '') {
		$luzuk_wine_store_custom_style .=' .footer-overlay {';
			$luzuk_wine_store_custom_style .=' background: '.esc_attr($luzuk_wine_store_footerbg_color).';';
		$luzuk_wine_store_custom_style .=' }';
	}


	$luzuk_wine_store_footercopyright_color = get_theme_mod('luzuk_wine_store_footercopyright_color');
	if ( $luzuk_wine_store_footercopyright_color != '') {
		$luzuk_wine_store_custom_style .=' #colophon .site-info p {';
			$luzuk_wine_store_custom_style .=' color: '.esc_attr($luzuk_wine_store_footercopyright_color).' !important;';
		$luzuk_wine_store_custom_style .=' }';
	}

	$luzuk_wine_store_footercopyrightbg_color = get_theme_mod('luzuk_wine_store_footercopyrightbg_color');
	if ( $luzuk_wine_store_footercopyrightbg_color != '') {
		$luzuk_wine_store_custom_style .=' .site-info {';
			$luzuk_wine_store_custom_style .=' background: '.esc_attr($luzuk_wine_store_footercopyrightbg_color).' !important;';
		$luzuk_wine_store_custom_style .=' }';
	}

	$luzuk_wine_store_footerscrolltotoptext_color = get_theme_mod('luzuk_wine_store_footerscrolltotoptext_color');
	if ( $luzuk_wine_store_footerscrolltotoptext_color != '') {
		$luzuk_wine_store_custom_style .=' .back-to-top {';
			$luzuk_wine_store_custom_style .=' color: '.esc_attr($luzuk_wine_store_footerscrolltotoptext_color).';';
		$luzuk_wine_store_custom_style .=' }';
	}

	$luzuk_wine_store_footerscrolltotopbg_color = get_theme_mod('luzuk_wine_store_footerscrolltotopbg_color');
	if ( $luzuk_wine_store_footerscrolltotopbg_color != '') {
		$luzuk_wine_store_custom_style .=' .back-to-top {';
			$luzuk_wine_store_custom_style .=' background: '.esc_attr($luzuk_wine_store_footerscrolltotopbg_color).';';
		$luzuk_wine_store_custom_style .=' }';
	}

	$luzuk_wine_store_footerscrolltotoptexthover_color = get_theme_mod('luzuk_wine_store_footerscrolltotoptexthover_color');
	if ( $luzuk_wine_store_footerscrolltotoptexthover_color != '') {
		$luzuk_wine_store_custom_style .=' .back-to-top:hover .back-to-top-text {';
			$luzuk_wine_store_custom_style .=' color: '.esc_attr($luzuk_wine_store_footerscrolltotoptexthover_color).';';
		$luzuk_wine_store_custom_style .=' }';
	}

	$luzuk_wine_store_footerscrolltotophover_color = get_theme_mod('luzuk_wine_store_footerscrolltotophover_color');
	if ( $luzuk_wine_store_footerscrolltotophover_color != '') {
		$luzuk_wine_store_custom_style .=' .back-to-top:hover::after {';
			$luzuk_wine_store_custom_style .=' background: '.esc_attr($luzuk_wine_store_footerscrolltotophover_color).';';
		$luzuk_wine_store_custom_style .=' }';
	}