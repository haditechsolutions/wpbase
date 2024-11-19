<?php
/**
 * The template for displaying home page.
 * @package Classic BlogBell
 */

if ( 'posts' == get_option( 'show_on_front' )  || 'posts' != get_option( 'show_on_front' )){ 
    get_header(); ?>
    <?php 
    $enabled_sections = classic_blogbell_get_sections();
    $homepage_design_layout     = classic_blogbell_get_option( 'homepage_design_layout_options' );
    $decoration_image     = classic_blogbell_get_option( 'decoration_side_enable' ); 
    ?>
    <?php if ($homepage_design_layout == 'home-main'){ ?>
       <?php include get_template_directory() . '/inc/homepage/home-main.php'; ?>
    <?php } elseif ($homepage_design_layout == 'home-two'){ ?>
        <?php include get_template_directory() . '/inc/homepage/home-two.php'; ?>
    <?php } elseif ($homepage_design_layout == 'home-three'){ ?>
        <?php include get_template_directory() . '/inc/homepage/home-three.php'; ?>
    <?php } elseif ($homepage_design_layout == 'home-four'){ ?>
        <?php include get_template_directory() . '/inc/homepage/home-four.php'; ?>
    <?php } elseif ($homepage_design_layout == 'home-five'){ ?>
        <?php include get_template_directory() . '/inc/homepage/home-five.php'; ?>
    <?php } elseif ($homepage_design_layout == 'home-six'){ ?>
        <?php include get_template_directory() . '/inc/homepage/home-six.php'; ?>
    <?php } elseif ($homepage_design_layout == 'home-seven'){ ?>
        <?php include get_template_directory() . '/inc/homepage/home-seven.php'; ?>
    <?php } ?>
    <?php $disable_homepage_content_section = classic_blogbell_get_option( 'disable_homepage_content_section' );
    if('posts' == get_option( 'show_on_front' )){ ?>
       <?php include( get_home_template() ); ?>
    <?php } elseif(($disable_homepage_content_section == true ) && ('posts' != get_option( 'show_on_front' ))) { ?>
        <div class="wrapper">
           <?php include( get_page_template() ); ?>
        </div>
     <?php  }
    get_footer();
} ?>