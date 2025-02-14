<html <?php language_attributes(); ?>>

<head>
   <link rel="icon" href="<?php echo get_site_icon_url() ? get_site_icon_url()  : ''  ?>" />
   <link rel="stylesheet" href="<?php echo WOODPLUS_ASSET ?>css/all.css">
   <link rel="stylesheet" href="<?php echo WOODPLUS_ASSET ?>css/global-fonts.css">
   <link rel="stylesheet" href="<?php echo WOODPLUS_ASSET ?>css/icon-style.css">
   <link rel="stylesheet" href="<?php echo WOODPLUS_ASSET ?>css/hint.min.css">
   <link rel="stylesheet" href="<?php echo WOODPLUS_ASSET ?>css/global.css">
   <link rel="stylesheet" href="<?php echo WOODPLUS_ASSET ?>css/swiper.min.css">
</head>
<?php wp_head(); ?>

<body <?php body_class() ?>>
   <style>
      <?php
      $width = 0;
      if (wplus_helper::get_setting('full_width')) {
         $width = wplus_helper::get_setting('full_width') . '%';
      } else {

         $width = wplus_helper::get_setting('width_dashboard') . 'px';
      }

      ?> :root {
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

      <div class="alfashop_container">
         <?php do_action('elementor_header_woocommerce_account'); ?>
      </div>

      <?php if ('side-right' === wplus_helper::get_setting('sidebar_myaccount') || !wplus_helper::get_setting('sidebar_myaccount')) : ?>
         <section class="dashboard_container">
            <div class="dashboard_side_elementor">
               <?php do_action('elementor_woocommerce_account_navigation'); ?>
            </div>
            <div class="dashboard_main">
               <?php
               /**
                * My Account content.
                *
                * @since 2.6.0
                */
               do_action('elementor_woocommerce_account_content');
               ?>
            </div>
         </section>
      <?php elseif ('side-left' === wplus_helper::get_setting('sidebar_myaccount')): ?>
         <section class="dashboard_container">
            <div class="dashboard_main">
               <?php
               /**
                * My Account content.
                *
                * @since 2.6.0
                */
               do_action('elementor_woocommerce_account_content');
               ?>
            </div>
            <div class="dashboard_side_elementor">
               <?php do_action('elementor_woocommerce_account_navigation'); ?>
            </div>
         </section>
      <?php elseif ('side-up' === wplus_helper::get_setting('sidebar_myaccount')): ?>
         <div class="dashboard_container">
            <?php do_action('elementor_woocommerce_account_navigation'); ?>
            <?php do_action('elementor_woocommerce_account_content'); ?>
         </div>
      <?php endif; ?>
   </main>

   <div class="alfashop_container">
      <?php do_action('elementor_footer_woocommerce_account'); ?>
   </div>
</body>
<?php wp_footer() ?>

</html>