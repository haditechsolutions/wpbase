<html <?php language_attributes(); ?> >

<?php wp_head(); ?>
<style>

  <?php 
        $width = 0;
        if( wplus_helper::get_setting('full_width') )
        {
          $width = wplus_helper::get_setting('full_width') . '%';

        }else{

          $width = wplus_helper::get_setting('width_dashboard') . 'px';
        }
    ?>
  :root{
    --width-width3 : <?php echo $width; ?>;
    --main-color : <?php echo wplus_helper::get_setting('color_dashboard'); ?>;
    --red-1 : <?php echo wplus_helper::get_setting('color_dashboard'); ?>;
    --red-5 : <?php echo wplus_helper::get_setting('color_dashboard_hover'); ?>;
    --blue-3 : <?php echo wplus_helper::get_setting('color_dashboard'); ?>;
  }
  body{
			font-family: <?php echo wplus_helper::get_setting('font_dashboard','IRANSansX');  ?>;
		}
</style>
<body <?php body_class() ?> >
  <div class="alfashop_container">
      <?php
          // Start the Loop.
          if ( have_posts() ) {

          // the_post();

          ?>
          <!-- <div class="dashboard_container"> -->
          <?php
            the_content();
          ?>
          <!-- </div> -->
          <?php

          wp_reset_postdata();
          }

      ?>
  </div>
</body>
<?php  wp_footer(); ?>
</html>


