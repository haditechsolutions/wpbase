<?php 
/**
 * Template part for displaying Highlights Section
 *
 *@package Classic BlogBell
 */
$slider_title       = classic_blogbell_get_option( 'slider_title' );
$slider_subtitle       = classic_blogbell_get_option( 'slider_subtitle' );
$slider_content_type   = classic_blogbell_get_option( 'slider_content_type' );
$number_of_slider_items = classic_blogbell_get_option( 'number_of_slider_items' );
$slider_layout = classic_blogbell_get_option( 'slider_layout_option' );
$slider_category = classic_blogbell_get_option( 'slider_category' );
$enable_content     = classic_blogbell_get_option( 'slider_content_enable' );
$enable_title     = classic_blogbell_get_option( 'slider_title_enable' );
$enable_category     = classic_blogbell_get_option( 'slider_category_enable' );
$enable_posted_on     = classic_blogbell_get_option( 'slider_posted_on_enable' );
$enable_author     = classic_blogbell_get_option( 'slider_author_enable' );
$slider_speed   = classic_blogbell_get_option( 'slider_speed' );
$slider_dot   = classic_blogbell_get_option( 'slider_dot' );
$slider_arrow   = classic_blogbell_get_option( 'slider_arrow_enable' );
$slider_autoplay  = classic_blogbell_get_option( 'slider_autoplay_enable' );
$slider_infinite  = classic_blogbell_get_option( 'slider_infinite_enable' );
$slider_fade  = classic_blogbell_get_option( 'slider_fade_enable' );
$header_section_font_size = classic_blogbell_get_option( 'slider_section_font_size');
$header_font_size = classic_blogbell_get_option( 'slider_font_size');
$slider_background_color = classic_blogbell_get_option( 'slider_background_color');
$slider_post_count =classic_blogbell_get_option( 'slider_post_count_enable');
$excerpt_length =classic_blogbell_get_option( 'slider_excerpt_length');
$slider_video_text =classic_blogbell_get_option( 'slider_video_text');
$home_layout_options = classic_blogbell_get_option( 'homepage_design_layout_options');
$class ='';
if (true == $slider_dot) {
   $class = 'true';
} else{
    $class = 'false';
}
$slider_column = '';
if ($home_layout_options=='home-main') {
    $slider_column = '1';
} else{
    $slider_column = '3';
}

for( $i=1; $i<=$number_of_slider_items; $i++ ) :
    $slider_page_posts[] = classic_blogbell_get_option( 'slider_page_'.$i );
    $slider_posts[] = classic_blogbell_get_option( 'slider_post_'.$i );
endfor;
?>
<style>
    <?php if ($header_section_font_size != 0): ?>
        #slider .section-title{
            font-size:<?php echo esc_attr($header_section_font_size); ?>px;
        }
    <?php endif ?>
    <?php if ($header_font_size != 0): ?>
        #slider .entry-title{
            font-size:<?php echo esc_attr($header_font_size); ?>px;
        }
    <?php endif ?>
</style>
<?php if( !empty($slider_title) ):?>
    <div class="section-header">
        <?php if (!empty($slider_title)): ?>
            <h2 class="section-title"><?php echo esc_html($slider_title);?></h2>
        <?php endif; ?>
    </div>       
<?php endif;?> 
<div class="slider-wrapper" 
    data-slick='{"slidesToShow": <?php echo esc_attr( $slider_column) ?>,
     "slidesToScroll": 1, 
     "infinite": <?php if( true== $slider_infinite ){ echo 'true'; } else{ echo 'false'; } ?>, 
     "speed": <?php echo esc_attr( $slider_speed) ?>, 
     "dots": <?php echo esc_html($class) ?>, 
     "arrows":<?php if( true== $slider_arrow ){ echo 'true'; } else{ echo 'false'; } ?>, 
     "autoplay": <?php if( true== $slider_autoplay ){ echo 'true'; } else{ echo 'false'; } ?>, 
     "fade": false }'>
        <?php
            $args = array (
            
            'post_type'     => 'post',
            'post_per_page' => count( $slider_posts ),
            'post__in'      => $slider_posts,
            'orderby'       =>'post__in',
        ); 
        $loop = new WP_Query($args);                        
        if ( $loop->have_posts() ) :
        $i=0;  
            while ($loop->have_posts()) : $loop->the_post(); $i++;?>
                <article class="slick-item <?php echo has_post_thumbnail() ? 'has-post-thumbnail' : 'no-post-thumbnail' ; ?>" >
                    <?php if ($slider_post_count==true && !has_post_thumbnail()): ?>
                        <span class="post-num"><?php echo $i; ?></span>
                    <?php endif ?>
                    <div class="slider-items-wrapper">
                        <?php if (has_post_thumbnail()){ ?>
                            <div class="featured-image" style="background-image: url('<?php the_post_thumbnail_url( 'full');?>');">
                                <div class="mobile-entry-container">
                                    <header class="entry-header">
                                        <div class="header-part">
                                            <h2 class="entry-title" ><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                                        </div>
                                        <?php if ((($enable_category==true) || ($enable_posted_on==true))) { ?>
                                            <div class="entry-meta">
                                                <?php if (($enable_category==true)) {
                                                    classic_blogbell_entry_meta(); 
                                                } ?>
                                                <?php if (($enable_posted_on==true)) {              
                                                    classic_blogbell_posted_on();
                                                } ?>
                                            </div><!-- .entry-meta -->
                                        <?php } ?>
                                    </header>
                                </div><!-- .entry-container --> 
                                <?php $video_link  = classic_blogbell_get_option( 'slider_video_link_'.$i ); ?>
                                <?php if ( ! empty( $video_link ) ) { ?>
                                    <div class="play-icon">
                                        <a class="video-popup" href="<?php echo esc_url( $video_link ); ?>"><i class="fa fa-play"></i></a>
                                        <span class="slider-video-text"><?php echo esc_html($slider_video_text); ?></span>
                                    </div><!-- .icon-play -->
                                <?php } ?>   
                            </div><!-- .featured-image -->
                        <?php } ?>
                        <div class="entry-container">
                            
                            <header class="entry-header">
                                <div class="header-part">
                                    <h2 class="entry-title" ><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                                </div>
                                <?php if ((($enable_category==true) || ($enable_posted_on==true))) { ?>
                                    <div class="entry-meta">
                                        <?php if (($enable_category==true)) {
                                            classic_blogbell_entry_meta(); 
                                        } ?>
                                        <?php if (($enable_posted_on==true)) {              
                                            classic_blogbell_posted_on();
                                        } ?>
                                    </div><!-- .entry-meta -->
                                <?php } ?>
                            </header>
                            <?php if ( ($enable_content==true)): ?>
                                <div class="entry-content">
                                    <?php
                                        $excerpt = classic_blogbell_the_excerpt( $excerpt_length );
                                        echo wp_kses_post( wpautop( $excerpt ) );
                                    ?>
                                </div><!-- .entry-content -->
                            <?php endif; ?>

                        </div><!-- .entry-container --> 
                    </div>    
                </article><!-- .slick-item -->
            <?php endwhile;?>
        <?php endif;?>
        <?php wp_reset_postdata(); ?>
</div><!-- .slider-wrapper -->
