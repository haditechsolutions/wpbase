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
    
</head>
<?php do_action('woodplus_dashboard_head'); ?>

<body  <?php body_class(); ?> >
	
<?php
/**
 * Lost password reset form.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-reset-password.php.
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

do_action( 'woocommerce_before_reset_password_form' );

$args = wplus_helper::rest_password_items();
$notice = wc_print_notices(true);
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

				<p><?php echo apply_filters( 'woocommerce_reset_password_message', esc_html__( 'Enter a new password below.', 'woocommerce' ) ); ?></p><?php // @codingStandardsIgnoreLine ?>

				<div class="solid_input">
					<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
						<label for="password_1"><?php esc_html_e( 'New password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
						<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password_1" id="password_1" autocomplete="new-password" />
					</p>
				</div>

				<div class="solid_input">
					<p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
						<label for="password_2"><?php esc_html_e( 'Re-enter new password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
						<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password_2" id="password_2" autocomplete="new-password" />
					</p>
				</div>
				<input type="hidden" name="reset_key" value="<?php echo esc_attr( $args['key'] ); ?>" />
				<input type="hidden" name="reset_login" value="<?php echo esc_attr( $args['login'] ); ?>" />

				<div class="clear"></div>

				<?php do_action( 'woocommerce_resetpassword_form' ); ?>

				
				<input type="hidden" name="wc_reset_password" value="true" />
				<button type="submit" class="btn solid medium font_semibold woocommerce-Button button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" value="<?php esc_attr_e( 'Save', 'woocommerce' ); ?>"><?php esc_html_e( 'Save', 'woocommerce' ); ?></button>

				<?php wp_nonce_field( 'reset_password', 'woocommerce-reset-password-nonce' ); ?>

			</form>
		</div>
	</div>
</main>

<?php
do_action( 'woocommerce_after_reset_password_form' );

?>
</body>
</html>
