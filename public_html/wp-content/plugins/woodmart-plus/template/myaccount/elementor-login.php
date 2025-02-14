<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

   <link rel="stylesheet" href="<?php echo WOODPLUS_ASSET ?>css/all.css">
   <link rel="stylesheet" href="<?php echo WOODPLUS_ASSET ?>css/fontawesome.css">
   <link rel="stylesheet" href="<?php echo WOODPLUS_ASSET ?>css/global-fonts.css">
   <link rel="stylesheet" href="<?php echo WOODPLUS_ASSET ?>css/hint.min.css">
   <link rel="stylesheet" href="<?php echo WOODPLUS_ASSET ?>css/global.css">
   <link rel="icon" href="<?php echo get_site_icon_url() ? get_site_icon_url()  : ''  ?>" />
   <style>
      :root {
         --width-width3: <?php echo wplus_helper::get_setting('width_dashboard') . 'px'; ?>;
         --main-color: <?php echo wplus_helper::get_setting('color_dashboard'); ?>;
         --red-1: <?php echo wplus_helper::get_setting('color_dashboard'); ?>;
         --red-5: <?php echo wplus_helper::get_setting('color_dashboard_hover'); ?>;
         --blue-3: <?php echo wplus_helper::get_setting('color_dashboard'); ?>;
      }

      html body {

         font-family: <?php echo wplus_helper::get_setting('font_dashboard', 'IRANSansX');  ?>;
      }

      .text_darkgray {
         line-height: 2.7;
         margin-top: 17px;
         text-align: center;
      }

      .login_container img {
         width: 100px;
      }
   </style>
   <script>
      <?php

      $pages = [
         'cart' => wc_get_page_permalink('cart'),
         'myacc' => wc_get_page_permalink('myaccount'),
         'cart_hash_key' => WC()->ajax_url() . '-wc_cart_hash',
      ];
      ?>
      var optionarray = <?php
                        echo  json_encode([
                           'woodplus_url' => admin_url('admin-ajax.php'),
                           'nonce' => wp_create_nonce('aramis_script_nonce'),
                           'WcPage'  => $pages,
                           'wating_time_resend_otp' => wplus_helper::get_setting('wating_resend', 30),
                           'add_tocart' => __('Product added to cart', 'woodmartplus'),
                           'captcha_is_enable' =>  wplus_helper::get_setting('setting_recaptcha_enable') ? true : false,

                        ]); ?>
   </script>
   <?php wp_head(); ?>
   <title><?php esc_html_e('login', 'woodmartplus'); ?></title>
</head>
<?php do_action('woodplus_dashboard_head'); ?>

<body <?php body_class(); ?>>


   <?php do_action('elementor_login_register'); ?>

   <?php wp_footer(); ?>
   <!-- <script src="<?php #echo WOODPLUS_ASSET 
                     ?>js/jquery.min.js" ></script> -->
   <?php if (wplus_helper::get_setting('setting_recaptcha_enable')): ?>
      <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallbackCaptcha&render=explicit"></script>
   <?php endif; ?>
   <!-- <script src="<?php #echo WOODPLUS_ASSET 
                     ?>js/w-plus.js" ></script> -->
</body>

</html>