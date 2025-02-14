<?php

/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined('ABSPATH') || exit;
remove_action('woocommerce_account_navigation', 'woodmart_before_my_account_navigation', 5);
remove_action('woocommerce_account_navigation', 'woodmart_after_my_account_navigation', 30);

remove_action('woocommerce_account_navigation', 'woodmart_my_account_wrapp_start', 1);
remove_action('woocommerce_account_content', 'woodmart_my_account_wrapp_end', 10000);
remove_action('woocommerce_account_dashboard', 'woodmart_my_account_links', 10);


?>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php esc_html_e('my account', 'woodmartplus'); ?></title>
	<link rel="icon" href="<?php echo get_site_icon_url() ? get_site_icon_url()  : ''  ?>" />
	<link rel="stylesheet" href="<?php echo WOODPLUS_ASSET ?>css/all.css">
	<link rel="stylesheet" href="<?php echo WOODPLUS_ASSET ?>css/global-fonts.css">
	<link rel="stylesheet" href="<?php echo WOODPLUS_ASSET ?>css/icon-style.css">
	<link rel="stylesheet" href="<?php echo WOODPLUS_ASSET ?>css/hint.min.css">
	<link rel="stylesheet" href="<?php echo WOODPLUS_ASSET ?>css/global.css">
	<link rel="stylesheet" href="<?php echo WOODPLUS_ASSET ?>css/swiper.min.css">

	<script src="<?php echo WOODPLUS_ASSET ?>js/jquery.min.js"></script>

	<style>
		<?php
		$width = 0;
		if (wplus_helper::get_setting('full_width')) {
			$width = wplus_helper::get_setting('full_width') . '%';
		} else {

			$width = wplus_helper::get_setting('width_dashboard') . 'px';
		}

		?>:root {

			--width-width3: <?php echo $width; ?>;
			--main-color: <?php echo wplus_helper::get_setting('color_dashboard'); ?>;
			--red-1: <?php echo wplus_helper::get_setting('color_dashboard'); ?>;
			--red-5: <?php echo wplus_helper::get_setting('color_dashboard_hover'); ?>;
			--blue-3: <?php echo wplus_helper::get_setting('color_dashboard'); ?>;
		}

		body {

			font-family: <?php echo wplus_helper::get_setting('font_dashboard', 'IRANSansX');  ?>;

		}
	</style>
</head>

<body <?php body_class(); ?>>

	<main>
		<div class="dashboard_sidebar__container">
			<div class="sidebar_container">
				<div class="btn_toggle__sidebar">
					<!--<i class="fa-regular fa-ellipsis-vertical"></i>-->
					<i class="fa-regular fa-ellipsis-vertical-advanced">
						<span class="blob"></span>
					</i>
				</div>
				<div class="dashboard_side__main">
					<?php do_action('custom_woocommerce_account_navigation'); ?>
				</div>
			</div>
		</div>

		<div class="white_card" style="
    margin: 26px 16px 30px 16px;
    background-color: #787878;
    /* border-bottom: 2px solid rgba(0, 0, 0, 0.5); */
    color: white;
    border-radius: 0px;
    margin: 0;
    padding: 9px;
    margin-bottom: 20px;
">
			<div class="main_dashboard__head">
				<ul>
					<li onclick="  window.open('<?php echo home_url();  ?>');" style="cursor: pointer;float:right;padding-left:10px" class="iconlysitehome">

					</li>
					<li onclick="  window.open('<?php echo wc_get_endpoint_url('notifications') ? wc_get_endpoint_url('notifications') : "#";   ?>', '_blank');" style="cursor: pointer;float:right;border-left:1px solid white;padding-left:10px" class="iconlysite">

					</li>
					<li style="cursor: pointer;float:right;padding-right:10px;" class="icondate">
						امروز : <?php echo wplus_helper::date_to_garegorian(time()); ?>
					</li>
				</ul>


				<p style="
    border-bottom: 1px solid white;
    padding-bottom: 5px;
"><?php echo wplus_helper::get_setting('title_page_dashboard'); ?></p>
				<?php
				$first_name = get_user_meta(get_current_user_id(), 'first_name', true);
				$last_name = get_user_meta(get_current_user_id(), 'last_name', true);

				?>
				<div class="dropdown">
					<button onclick="myFunction()" class="dropbtn" style="
	background: var(--main-color);
	font-size: 13px;
	/* background-color: transparent; */
	border-radius: 35px;
	color: white;
"><i class="fa-regular fa-info-circle" style="
	font-family: 'iconly';
"></i>سلام : <?php echo $first_name ? $first_name . ' ' . $last_name : '' ?>
					</button>
					<style>
						@media (max-width:881px) {
							.dropdown-content {
								right: 0px;
								left: auto !important;
							}
						}
					</style>
					<div id="myDropdown" class="dropdown-content" style="
    z-index: 100000;
    margin-top: 1px;
    left: 0;
    transition: 1s;
    border-radius: 8px;
    border: 3px solid #e6e6e6;
    -webkit-box-shadow: 3px 0px 15px 4px rgba(38,52,45,0.31);
    box-shadow: 3px 0px 15px 4px rgba(38,52,45,0.31);
">

						<a href="<?php echo wc_get_endpoint_url('my-account'); ?>">داشبورد</a>
						<a href="<?php echo wc_get_endpoint_url('orders'); ?>">سفارشات</a>
						<a href="<?php echo wc_logout_url(); ?>">خروج</a>
					</div>
				</div>
			</div>
		</div>
		<section class="dashboard_container">

			<?php do_action('woocommerce_account_navigation'); ?>
			<div class="dashboard_main">
				<?php
				/**
				 * My Account content.
				 *
				 * @since 2.6.0
				 */
				do_action('woocommerce_account_content');
				?>
			</div>

		</section>
	</main>
	<?php wp_print_footer_scripts() ?>
	<script src="<?php echo WOODPLUS_ASSET ?>js/w-plus.js"></script>
	<script src="<?php echo WOODPLUS_ASSET ?>js/swiper.min.js"></script>
	<?php wplus_helper::script_needed_other_plugin(); ?>
</body>

</html>