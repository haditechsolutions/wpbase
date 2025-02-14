
<!DOCTYPE html>
<html  <?php language_attributes(); ?> >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo WOODPLUS_ASSET ?>css/all.css" >
	<link rel="stylesheet" href="<?php echo WOODPLUS_ASSET ?>css/fontawesome.css" >
	<link rel="stylesheet" href="<?php echo WOODPLUS_ASSET ?>css/global-fonts.css" >
	<link rel="stylesheet" href="<?php echo WOODPLUS_ASSET ?>css/hint.min.css" >
	<link rel="stylesheet" href="<?php echo WOODPLUS_ASSET ?>css/global.css" >
   <link rel="icon" href="<?php echo get_site_icon_url() ? get_site_icon_url()  : ''  ?>" />
   <style>
		:root{
			--width-width3 : <?php echo wplus_helper::get_setting('width_dashboard').'px'; ?>;
			--main-color : <?php echo wplus_helper::get_setting('color_dashboard'); ?>;
			--red-1 : <?php echo wplus_helper::get_setting('color_dashboard'); ?>;
         --red-5 : <?php echo wplus_helper::get_setting('color_dashboard_hover'); ?>;
			--blue-3 : <?php echo wplus_helper::get_setting('color_dashboard'); ?>;
		}
      body{
		
				font-family: <?php echo wplus_helper::get_setting('font_dashboard','IRANSansX');  ?>;
		

         background-image: url(<?php echo wplus_helper::get_background_img_color_login('img_background_login_register') ? wplus_helper::get_background_img_color_login('img_background_login_register') : ( wplus_helper::get_background_img_color_login('color_bg_login_register') ? '#' : WOODPLUS_ASSET . '/img/default-login.jpg') ?>);
         background-color: <?php echo wplus_helper::get_background_img_color_login('color_bg_login_register') ? wplus_helper::get_background_img_color_login('color_bg_login_register') . '!important' : 'black' ?>;
         background-repeat: no-repeat;
         background-size: 100% auto;
         background-position: center top;
         background-attachment: fixed;
		}
      .text_darkgray
      {
         line-height: 2.7;
    margin-top: 17px;
    text-align: center;
      }
      .login_container img{
         width: 100px;
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
               'captcha_is_enable' =>  wplus_helper::get_setting('setting_recaptcha_enable') ? true : false,

            ]); ?>
    </script>
    
    <title><?php esc_html_e('login','woodmartplus'); ?></title>
</head>
<?php do_action('woodplus_dashboard_head'); ?>

<body  <?php body_class(); ?> >


<?php




$number_digits = wplus_helper::get_setting( 'number_otp',4 );
$how_register = wplus_helper::get_setting('register_login_type','layout-4');

if( 'lr_woocommerce' === $how_register ) 
{
   $how_register = 'layout-4';
}

do_action( 'woocommerce_before_customer_login_form' ); ?>

<?php include "layout/$how_register.php"; ?>


<script src="<?php echo WOODPLUS_ASSET ?>js/jquery.min.js" ></script>
<?php if( wplus_helper::get_setting('setting_recaptcha_enable') ): ?>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallbackCaptcha&render=explicit" ></script>
<?php endif; ?>
<script src="<?php echo WOODPLUS_ASSET ?>js/w-plus.js" ></script>
</body>

</html>