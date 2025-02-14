
<!DOCTYPE html>
<html  <?php language_attributes(); ?> >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php esc_html_e('Confirim password','woodmartplus'); ?></title>
    <link rel="stylesheet" href="<?php echo WOODPLUS_ASSET ?>css/all.css" >
	<link rel="stylesheet" href="<?php echo WOODPLUS_ASSET ?>css/fontawesome.css" >
	<link rel="stylesheet" href="<?php echo WOODPLUS_ASSET ?>css/global-fonts.css" >
	<link rel="stylesheet" href="<?php echo WOODPLUS_ASSET ?>css/hint.min.css" >
	<link rel="stylesheet" href="<?php echo WOODPLUS_ASSET ?>css/global.css" >
  <link rel="icon" href="<?php echo get_site_icon_url() ? get_site_icon_url()  : ''  ?>" />
  <style>
    body{
	
				font-family: <?php echo wplus_helper::get_general_option('font_dashboard');  ?>;
		
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
 * Lost password confirmation text.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/lost-password-confirmation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.9.0
 */

defined( 'ABSPATH' ) || exit;

?>



<?php do_action( 'woocommerce_before_lost_password_confirmation_message' ); ?>

<main class="all_center">
    <div class="login_container">
      <div class="space_between">
        <button class="text_white">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17" fill="none">
            <path d="M5.94 13.78L10.2867 9.4333C10.8 8.91997 10.8 8.07997 10.2867 7.56664L5.94 3.21997" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
          </svg>
          <p><a href="<?php echo esc_url( wc_get_endpoint_url('my-account') ); ?>"><?php esc_html_e('Back','woodmartplus'); ?></a></p>
        </button>
        <a class="btn_close__circle--white" href="<?php echo esc_url( home_url() ); ?>">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
          </svg>          
        </a>
      </div>
      <div class="white_card">
        <div class="text_center">
            <img src="<?php echo wplus_helper::get_logo_login_register(); ?>" alt="logo" />
        </div>
          
            <?php wc_print_notice( esc_html__( 'Password reset email has been sent.', 'woocommerce' ) ); ?>
      </div>
    </div>
</main>
<?php do_action( 'woocommerce_after_lost_password_confirmation_message' ); ?>

</body>
</html>

