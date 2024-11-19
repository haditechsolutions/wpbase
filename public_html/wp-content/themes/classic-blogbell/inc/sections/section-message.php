<?php 
/**
 * Template part for displaying Author Section
 *
 *@package Classic BlogBell
 */
    $message_content_type     = classic_blogbell_get_option( 'message_content_type' );
    $message_content_enable       = classic_blogbell_get_option( 'message_content_enable' );
    $message_excerpt_enable       = classic_blogbell_get_option( 'message_excerpt_enable' );
    $message_header_font_size = classic_blogbell_get_option( 'message_font_size');
    $message_content_font_size = classic_blogbell_get_option( 'message_content_font_size');
    $message_highlight_font_size = classic_blogbell_get_option( 'message_highlight_title_font_size');
    $excerpt_length =classic_blogbell_get_option( 'message_excerpt_length');
    $author_show_social =classic_blogbell_get_option( 'author_social_link');
    $homepage_design_layout     = classic_blogbell_get_option( 'homepage_design_layout_options' );
    $message_highlight_title     = classic_blogbell_get_option( 'message_highlight_title' );
    $btn_text = classic_blogbell_get_option( 'message_btn_text');
?>
<?php 
    $msg_title_class= '';
    if (!empty($message_highlight_title)) {
        $msg_title_class= 'enable-msg-highlight';
    }
?>
    <style>
        <?php if ($message_header_font_size != 0): ?>
            #message .entry-title{
                font-size:<?php echo esc_html($message_header_font_size); ?>px;
            }
        <?php endif ?>
        <?php if ($message_content_font_size != 0): ?>
            #message .entry-content{
                font-size:<?php echo esc_html($message_content_font_size); ?>px;
            }
        <?php endif ?>
        <?php if ($message_highlight_font_size != 0): ?>
            @media screen and (min-width: 1260px)
                #message .featured-image,
                #message .upper-title{
                    font-size:<?php echo esc_html($message_highlight_font_size); ?>px;
                }
            }
        <?php endif ?>
    </style>
    <?php 
        $message_id = classic_blogbell_get_option( 'message_post' );
        $args = array (
            'post_type'     => 'post',
            'posts_per_page' => 1,
            'p' => $message_id,
            'ignore_sticky_posts' => true, 
        ); 
        $the_query = new WP_Query( $args );

        // The Loop
        while ( $the_query->have_posts() ) : $the_query->the_post();
        ?>  
            <div class="section-content">
               <?php if(has_post_thumbnail()) : ?>
                    
                    <?php if ($homepage_design_layout=='home-five'){ ?>
                        <div class="featured-image <?php echo $msg_title_class; ?>" style="background-image: url('<?php the_post_thumbnail_url('full'); ?>');" >
                            <?php if ($homepage_design_layout=='home-five' && !empty($message_highlight_title)): ?>
                                <span><?php echo esc_html($message_highlight_title); ?></span>
                            <?php endif; ?>
                        </div><!-- .author-thumbnail -->
                    
                    <?php } else{ ?>
                        <div class="author-thumbnail" >
                            <img src="<?php the_post_thumbnail_url( 'full' ); ?>">
                        </div><!-- .author-thumbnail -->
                    <?php } ?>
                <?php endif ?>
                <div class="entry-container">
                    <?php if ($homepage_design_layout=='home-seven' && !empty($message_highlight_title)): ?>
                        <div class="entry-highlight-title">
                            <span class="upper-title"><?php echo esc_html($message_highlight_title); ?></span>
                        </div>
                    <?php endif ?>
                    <div class="entry-header">
                        <h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                    </div><!-- .section-header -->

                    <div class="entry-content">
                        <?php  
                            $excerpt = classic_blogbell_the_excerpt( $excerpt_length );
                            echo wp_kses_post( wpautop( $excerpt ) ); 
                         ?>
                    </div><!-- .entry-content -->
                    <?php if ( !empty( $btn_text ) ) : ?>
                        <div class="read-more">
                            <a href="<?php the_permalink();?>" class="btn btn-primary"> <?php echo esc_html($btn_text);?></a>
                        </div>
                    <?php endif; ?>
                    
                </div>
            </div><!-- .section-content --> 
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>