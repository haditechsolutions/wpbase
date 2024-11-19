<?php 
/**
 * The template for displaying Home Page Five(Blog Five).
 * @package Classic BlogBell
 */
$enabled_sections = classic_blogbell_get_sections();
$homepage_design_layout     = classic_blogbell_get_option( 'homepage_design_layout_options' );

if ($homepage_design_layout == 'home-five'): ?>
    <?php
        if( is_array( $enabled_sections ) ) { 
            foreach( $enabled_sections as $section ) { ?>

                <?php if( $section['id'] == 'flash' ) { ?>
                    <?php $disable_flash_section = classic_blogbell_get_option( 'disable_flash_section' );
                    $flash_lite_dark_bg = classic_blogbell_get_option( 'flash_lite_dark_background' );
                    if( true ==$disable_flash_section): ?>
                        <section id="<?php echo esc_attr( $section['id'] ); ?>" class="relative page-section <?php echo esc_attr($flash_lite_dark_bg) ?>">
                            <div class="wrapper">
                                <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                            </div>
                        </section> 
                <?php endif; ?>
                <?php } elseif( $section['id'] == 'slider' ) { ?>
                    <?php $disable_slider_section = classic_blogbell_get_option( 'disable_slider_section' );
                    $slider_lite_dark_bg = classic_blogbell_get_option( 'slider_lite_dark_background' );
                    if( true ==$disable_slider_section): ?>
                        <section id="<?php echo esc_attr( $section['id'] ); ?>" class="relative page-section <?php echo esc_attr($slider_lite_dark_bg) ?>">
                            <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                        </section> 
                <?php endif; ?>
                <?php } elseif( $section['id'] == 'highlights' ) { ?>
                    <?php $disable_highlights_section = classic_blogbell_get_option( 'disable_highlights_section' );
                    $highlights_lite_dark_bg = classic_blogbell_get_option( 'highlights_lite_dark_background' );
                    if( true ==$disable_highlights_section): ?>
                        <section id="<?php echo esc_attr( $section['id'] ); ?>" class="relative page-section <?php echo esc_attr($highlights_lite_dark_bg) ?>">
                            <div class="wrapper">
                                <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                            </div>
                        </section> 
                <?php endif; ?>
                <?php } elseif( $section['id'] == 'recent' ) { ?>
                    <?php $disable_recent_section = classic_blogbell_get_option( 'disable_recent_section' ); 
                    $recent_lite_dark_background = classic_blogbell_get_option( 'recent_lite_dark_background' );
                    if( true ==$disable_recent_section): ?>
                        <section id="<?php echo esc_attr( $section['id'] ); ?>" class="relative page-section <?php echo esc_attr($recent_lite_dark_background) ?>">
                            <div class="wrapper">
                                <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                            </div>
                        </section> 
                <?php endif; ?>
                <?php } elseif( $section['id'] == 'message' ) { ?>
                    <?php $disable_message_section = classic_blogbell_get_option( 'disable_message_section' );
                    if( true ==$disable_message_section): ?>
                        <section id="<?php echo esc_attr( $section['id'] ); ?>" class="relative page-section">
                            <div class="wrapper">
                                <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                            </div>
                        </section> 
                <?php endif; ?>
                <?php } elseif( $section['id'] == 'editorpick' ) { ?>
                    <?php $disable_editorpick_section = classic_blogbell_get_option( 'disable_editorpick_section' );
                    if( true ==$disable_editorpick_section): ?>
                        <section id="<?php echo esc_attr( $section['id'] ); ?>" class="relative page-section">
                            <div class="wrapper">
                                <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                            </div>
                        </section> 
                <?php endif; ?>
                <?php } elseif( $section['id'] == 'trending' ) { ?>
                    <?php $disable_trending_section = classic_blogbell_get_option( 'disable_trending_section' );
                    if( true ==$disable_trending_section): ?>
                        <section id="<?php echo esc_attr( $section['id'] ); ?>" class="relative page-section">
                            <div class="wrapper">
                                <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                            </div>
                        </section> 
                <?php endif; ?>
                <?php } elseif( $section['id'] == 'fixheight' ) { ?>
                    <?php $disable_fixheight_section = classic_blogbell_get_option( 'disable_fixheight_section' );
                    $fixheight_lite_dark_background = classic_blogbell_get_option( 'fixheight_lite_dark_background' );
                    if( true ==$disable_fixheight_section): ?>
                        <section id="<?php echo esc_attr( $section['id'] ); ?>" class="relative page-section">
                            <div class="wrapper">
                                <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                            </div>
                        </section> 
                <?php endif; ?> 
                <?php } elseif( $section['id'] == 'fixheight' ) { ?>
                    <?php $disable_fixheight_section = classic_blogbell_get_option( 'disable_fixheight_section' );
                    if( true ==$disable_fixheight_section): 
                         $background_fixheight_section = classic_blogbell_get_option( 'background_fixheight_section' );?>
                        <section id="<?php echo esc_attr( $section['id'] );  ?>" class="relative page-section">
                            <div class="wrapper">
                                <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                            </div>
                        </section>
                <?php endif; ?>   
                <?php } elseif( $section['id'] == 'mustread' ) { ?>
                    <?php $disable_mustread_section = classic_blogbell_get_option( 'disable_mustread_section' );
                    if( true ==$disable_mustread_section): 
                         $background_contact_section = classic_blogbell_get_option( 'background_contact_section' );?>
                        <section id="<?php echo esc_attr( $section['id'] );  ?>" class="relative page-section">
                            <div class="wrapper">
                                <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                            </div>
                        </section>
                <?php endif; ?> 
                <?php } ?>
            <?php } ?>
        <?php } ?>
<?php endif ?>