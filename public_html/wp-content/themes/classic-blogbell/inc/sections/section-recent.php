<?php
    $recent_title       = classic_blogbell_get_option( 'recent_title' );
    $recent_subtitle       = classic_blogbell_get_option( 'recent_subtitle' );
    $recent_content_type     = classic_blogbell_get_option( 'recent_content_type' );
    $enable_category     = classic_blogbell_get_option( 'recent_category_enable' );
    $enable_content     = classic_blogbell_get_option( 'recent_content_enable' );
    $enable_author     = classic_blogbell_get_option( 'recent_author_enable' );
    $enable_posted_on     = classic_blogbell_get_option( 'recent_posted_on_enable' );
    $number_of_recent_items  = classic_blogbell_get_option( 'number_of_recent_items' );
    $recent_category = classic_blogbell_get_option( 'recent_category' );
    $header_font_size = classic_blogbell_get_option( 'recent_font_size');
    $no_of_recent_column = classic_blogbell_get_option('number_of_recent_column');
    $content_align = classic_blogbell_get_option('recent_content_align');
    $excerpt_length =classic_blogbell_get_option( 'recent_excerpt_length');
    $recent_post_count =classic_blogbell_get_option( 'recent_post_count_enable');
    $home_layout_options = classic_blogbell_get_option( 'homepage_design_layout_options');

    $see_more_txt     = classic_blogbell_get_option( 'recent_see_all_txt' );
    $see_more_url     = classic_blogbell_get_option( 'recent_see_all_url' );

    for( $i=1; $i<=$number_of_recent_items; $i++ ) :
        $recent_page_posts[] = absint(classic_blogbell_get_option( 'recent_page_'.$i ) );
        $recent_post_posts[] = absint(classic_blogbell_get_option( 'recent_post_'.$i ) );
    endfor;
    $recent_class = '';
    $recent_column= '';
    if ( $home_layout_options =='home-three') {
        $recent_class = 'content-overlap';
    } else{
        $recent_class = 'under-content';
    }
   if ( $home_layout_options =='home-main' || $home_layout_options =='home-four' || $home_layout_options =='home-six' || $home_layout_options =='home-three') {
        $recent_column = '2';
    } elseif( $home_layout_options =='home-two' || $home_layout_options =='home-five' || $home_layout_options =='home-seven'){
        $recent_column = '4';
    } else{
        $recent_column = '3';
    }
   
?>  
<style>
    <?php if ($header_font_size != 0): ?>
        #recent .section-title{
            font-size:<?php echo esc_attr($header_font_size); ?>px;
        }
    <?php endif ?>
</style>
<?php if(!empty($recent_title) ):?>
    <div class="section-header">
        <?php if (!empty($recent_title)): ?>
            <h2 class="section-title"><?php echo esc_html($recent_title);?></h2>
             <?php if ($home_layout_options=='home-main' && !empty($see_more_txt) && !empty($see_more_url)): ?>
                <a class="see-all" href="<?php echo esc_url($see_more_url) ?>"><?php echo esc_html($see_more_txt); ?></a>
            <?php endif ?>
        <?php endif; ?>
    </div>       
<?php endif;?> 
<div class="recent-wrapper inner <?php echo $recent_class; ?> col-<?php echo esc_attr($recent_column) ?>">
    <?php 
        $args = array (
            'post_type'     => 'post',
            'post_per_page' => count( $recent_post_posts ),
            'post__in'      => $recent_post_posts,
            'orderby'       =>'post__in', 
            'ignore_sticky_posts' => true, 
        ); 
        $loop = new WP_Query($args);                        
        if ( $loop->have_posts() ) :
            $i=0;  
            while ($loop->have_posts()) : $loop->the_post(); $i++;?>      
            <?php $col_class='';
            if ($i==1) {
                 $col_class='full-width';
             } else{
                $col_class='half-width';
             } ?>  
                <article class="<?php echo has_post_thumbnail() ? 'has-post-thumbnail' : 'no-post-thumbnail' ; ?>">
                    <?php if ($recent_post_count==true && !has_post_thumbnail()): ?>
                        <span class="post-num"><?php echo $i; ?></span>
                    <?php endif ?>
                    <div class="recent-item-wrapper">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-featured-image">
                                <div class="featured-image" style="background-image: url('<?php the_post_thumbnail_url();?>');">
                                    <a href="<?php the_permalink();?>" class="post-thumbnail-link"></a>
                                    <?php $homepage_video_url = get_post_meta( get_the_ID(), 'classic-blogbell-video-url', true ); ?>
                                    <?php if (!empty($homepage_video_url)): ?>
                                       <a href="<?php the_permalink();?>"> <div class="homepage-video-icon"><i class="fa fa-play"></i></div></a>
                                    <?php endif ?>
                                    <div class="overlay"></div>
                                    <?php if ($recent_post_count==true): ?>
                                        <span class="post-num"><?php echo $i; ?></span>
                                    <?php endif ?>
                                </div><!-- .featured-image -->
                            </div>
                        <?php endif; ?>
                        <div class="entry-container <?php echo esc_attr($content_align); ?>">
                            <?php if ( ($enable_category==true) ) : ?>
                                <div class="entry-meta entry-cat">
                                    <?php classic_blogbell_entry_meta(); ?>
                                </div><!-- .entry-meta -->
                            <?php endif; ?>
                            <header class="entry-header">
                                <h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                            </header>
                            <?php if ((($enable_posted_on==true) || ($enable_author==true))) : ?>
                                <div class="entry-meta">
                                    <?php 
                                        if (($enable_posted_on==true)) {
                                            classic_blogbell_posted_on();
                                        } 
                                        if (($enable_author==true)) {
                                            classic_blogbell_author();
                                        }
                                     ?>
                                </div><!-- .entry-meta -->
                            <?php endif; ?>
                            <?php if (($enable_content==true)) : ?>
                                <div class="entry-content">
                                    <?php
                                        $excerpt = classic_blogbell_the_excerpt( $excerpt_length );
                                        echo wp_kses_post( wpautop( $excerpt ) );
                                    ?>
                                </div><!-- .entry-content -->
                            <?php endif; ?>  
                        </div><!-- .entry-container -->
                    </div>
                </article>

            <?php endwhile;?>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
</div>
<?php 
    //ads
    $number_of_recent_ads = classic_blogbell_get_option( 'number_of_recent_ads' );
    $recent_col = classic_blogbell_get_option( 'recent_column_option' ); 
    $recent_ads_enable = classic_blogbell_get_option( 'disable_recent_ads_section' ); 
?>
<?php if ($recent_ads_enable==true): ?>
    <div class="site-advertisement <?php echo esc_attr($recent_col); ?>">
        <?php for ($i=1; $i <= $number_of_recent_ads ; $i++) { 
            $recent_ads_img = classic_blogbell_get_option( 'recent_ads_img_'.$i ); 
            $recent_ads_url = classic_blogbell_get_option( 'recent_ads_url_'.$i );
            ?>
            <span class="ads-info">
                <a target="_blank" href="<?php echo esc_url($recent_ads_url) ?>"><img  src="<?php echo esc_url($recent_ads_img) ?>"></a>
            </span>
        <?php } ?>
    </div>
<?php endif; ?>