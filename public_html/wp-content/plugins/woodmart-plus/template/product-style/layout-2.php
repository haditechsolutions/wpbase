<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
$colors = wplus_helper::generate_colors_on_cart($product);
$category = isset( $settings['category'] ) ? $settings['category'] : [];
$new_args = [
    'include' => $category
];

?>
<div class="layout-2 product_card full_button align_center product_carousel_layout_2">
    <div class="product_cover">
    <div class="product_cover__image">
            <a href="<?php echo get_the_permalink(); ?>">
                <?php echo $product->get_image( isset( $settings['product_size'] ) ? $settings['product_size'] : 'woocommerce_thumbnail' ); ?>
            </a>
        <?php if( 'yes' === $settings['show_sale'] ): ?>
            <?php if($product->is_on_sale()): ?>
                <div class="product_offer__box"><?php echo esc_html(wplus_helper::_price_discount($product)); ?>%</div>
            <?php endif; ?>
        <?php endif; ?>

        <?php if( 'yes' === $settings['show_colors'] && !empty( $colors ) ): ?>
              <div class="product_colors">
                <?php foreach( $colors as $color ): if( empty( $color ) ) continue; ?>
                    <div class="product_color" style="<?php echo "background-color:$color"; ?>" ></div>
                <?php endforeach; ?>
              </div>
        <?php endif; ?>

        <!-- <?php #if('yes' === $settings['show_action_btn'] ): ?>
        <div class="product_menu__items">
            <?php #if( isset( $settings['choose_btn_card'] ) ):  ?>
                <?php #foreach( $settings['choose_btn_card'] as $type ):  ?>
                    <?php #echo aramis_generate_action_btn_cards( $type,$product ) ?>
                <?php #endforeach; ?>
            <?php #endif ?>
        </div>
        <?php #endif; ?> -->
    </div>
    </div>
    <div class="product_body woocommerce">
    <?php if( 'yes' === $settings['show_category'] ): ?>
        <?php wplus_helper::load_custom_template_category_carousel_slider( $product, 'custom-categories.category-layout-1',$new_args ); ?>
    <?php endif; ?>

        <?php wplus_helper::title_in_product_cart_carousel(); ?>
        
        <?php if( 'yes' === $settings['show_rating'] ): ?>

            <?php  core_load_template('loop.rating'); ?>

        <?php endif; ?>

        <div class="product_middle">
            <?php if( !$product->is_in_stock() ): ?>
                <div class="product_upbutton">
                    <p class="unavailable_text"><?php echo wplus_helper::get_setting('outofstock_carousel',__('ناموجود','woodmartplus')); ?></p>
                </div>
            <?php else: ?>
            <?php core_load_template('custom-price.carousel-slider-layout-2'); ?>
            <?php endif; ?>
            <?php wplus_helper::load_custom_add_to_cart_template($product,'loop.carousel-layout-2'); ?>
        </div>
        <?php if( 'yes' === $settings['show_timer'] && ( wplus_helper::progress_bar_carts( $product,true ) || wplus_helper::woodplus_count_down($product, '',true) ) ): ?>
        <div class="product_timing">
            <?php echo wplus_helper::woodplus_count_down($product, 'carousel-slider product_timer'); ?>
            <?php wplus_helper::progress_bar_carts( $product ) ; ?>
        </div>
        <?php endif; ?>
    </div>
</div>