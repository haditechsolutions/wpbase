<!DOCTYPE html>
<html  <?php language_attributes(); ?> >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php esc_html_e('Lost password','woodmartplus'); ?></title>
	<link rel="icon" href="<?php echo get_site_icon_url() ? get_site_icon_url()  : ''  ?>" />
    <link rel="stylesheet" href="<?php echo WOODPLUS_ASSET ?>css/all.css" >
	<link rel="stylesheet" href="<?php echo WOODPLUS_ASSET ?>css/fontawesome.css" >
	<link rel="stylesheet" href="<?php echo WOODPLUS_ASSET ?>css/global-fonts.css" >
	<link rel="stylesheet" href="<?php echo WOODPLUS_ASSET ?>css/hint.min.css" >
	<link rel="stylesheet" href="<?php echo WOODPLUS_ASSET ?>css/global.css" >
	<style>
		:root{
			--width-width3 : <?php echo wplus_helper::get_setting('width_dashboard',1200).'px'; ?>;
			--main-color : <?php echo wplus_helper::get_setting('color_dashboard'); ?>;
			--red-1 : <?php echo wplus_helper::get_setting('color_dashboard'); ?>;
         --red-5 : <?php echo wplus_helper::get_setting('color_dashboard_hover'); ?>;
			--blue-3 : <?php echo wplus_helper::get_setting('color_dashboard'); ?>;
		}
		body{
	
	font-family: <?php echo wplus_helper::get_setting('font_dashboard','IRANSansX');  ?>;

}
	</style>
    <script>
         <?php 
            $pages = [
               'cart' => wc_get_page_permalink( 'cart' ),
               'myacc' => wc_get_page_permalink( 'myaccount'),
               'cart_hash_key' => WC()->ajax_url() . '-wc_cart_hash',
            ];
         ?>
            var optionarray = <?php
            echo  json_encode([
               'woodplus_url' => admin_url('admin-ajax.php'),
               'nonce' => wp_create_nonce('aramis_script_nonce'),
               'WcPage'  => $pages,
               'wating_time_resend_otp' => wplus_helper::get_setting( 'wating_resend',30 ),
               'add_tocart' => __('Product added to cart','woodmartplus'),

            ]); ?>
    </script>
</head>
<?php do_action('woodplus_dashboard_head'); ?>

<body  <?php body_class(); ?> >
	

<?php
/**
 * Lost password form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-lost-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined( 'ABSPATH' ) || exit;
$notice = wc_print_notices(true);
// var_dump($notice);

do_action( 'woocommerce_before_lost_password_form' );
?>
<main class="all_center">
	<div class="login_container">
		<div class="space_between">
			<button class="text_white">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17" fill="none"> <path d="M5.94 13.78L10.2867 9.4333C10.8 8.91997 10.8 8.07997 10.2867 7.56664L5.94 3.21997" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> </svg>
				<p><a href="<?php echo esc_url( wc_get_endpoint_url('my-account') ); ?>"><?php esc_html_e('Back','woodmartplus'); ?></a></p>
			</button>
			<a class="btn_close__circle--white" href="<?php echo esc_url( home_url() ); ?>">
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"> <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path> </svg>
			</a>
		</div>
		<div class="white_card">
			<div class="text_center">
				<img src="<?php echo wplus_helper::get_logo_login_register(); ?>" alt="logo" />
			</div>
			<h2 class="text_center"> <?php esc_html_e('password recovery','woodmartplus'); ?> </h2>
			<?php echo $notice; ?>
			<form method="post" class="gap-y-2 woocommerce-ResetPassword lost_reset_password">

				<p><?php echo apply_filters( 'woocommerce_lost_password_message', esc_html__( 'Lost your password? Please enter your username or email address. You will receive a link to create a new password via email.', 'woocommerce' ) ); ?></p><?php // @codingStandardsIgnoreLine ?>

				<div class="solid_input">
				<label for="txtPassword" class="gap-x">
					<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none"> <path d="M4.5 7.5V6C4.5 3.5175 5.25 1.5 9 1.5C12.75 1.5 13.5 3.5175 13.5 6V7.5" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M12.75 16.5H5.25C2.25 16.5 1.5 15.75 1.5 12.75V11.25C1.5 8.25 2.25 7.5 5.25 7.5H12.75C15.75 7.5 16.5 8.25 16.5 11.25V12.75C16.5 15.75 15.75 16.5 12.75 16.5Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M11.9973 12H12.0041" stroke="#292D32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M8.99661 12H9.00335" stroke="#292D32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M5.99588 12H6.00262" stroke="#292D32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </svg>
   					<p><?php esc_html_e( 'Username or email', 'woocommerce' ); ?></p>
				</label>
					<!-- <label for="user_login"></label> -->
					<div class="input_container">
						<input class="woocommerce-Input woocommerce-Input--text input-text" type="text" name="user_login" id="user_login" autocomplete="username" />
						<span class="btn_clear">
						<svg fill="#5e5e5b" width="18px" height="18px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
<circle cx="12" cy="6" r="4" stroke="#1C274C" stroke-width="1.5"></circle>
<path d="M20 17.5C20 19.9853 20 22 12 22C4 22 4 19.9853 4 17.5C4 15.0147 7.58172 13 12 13C16.4183 13 20 15.0147 20 17.5Z" stroke="#1C274C" stroke-width="1.5"></path>
</svg>
						</span>
					</div>
				</div>

				<div class="clear"></div>

				<?php do_action( 'woocommerce_lostpassword_form' ); ?>

					<input type="hidden" name="wc_reset_password" value="true" />
					<button type="submit" class="btn solid medium font_semibold <?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" value="<?php esc_attr_e( 'Reset password', 'woocommerce' ); ?>"><?php esc_html_e( 'Reset password', 'woocommerce' ); ?></button>

				<?php wp_nonce_field( 'lost_password', 'woocommerce-lost-password-nonce' ); ?>

			</form>
		</div>
	</div>

</main>
<?php
do_action( 'woocommerce_after_lost_password_form' );
?>


</body>
</html>

