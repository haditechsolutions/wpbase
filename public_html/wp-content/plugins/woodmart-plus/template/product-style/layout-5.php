<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;


?>

<div class="product_card inline_box align_right product_carousel_layout_5">
    <div class="product_cover">
        <div class="product_cover__image">
        <a href="<?php echo get_the_permalink(); ?>">
                <?php echo $product->get_image( isset( $args['settings']['product_size'] ) ? $args['settings']['product_size'] : 'woocommerce_thumbnail' ); ?>
            </a>
        </div>
    </div>
    <div class="product_body">
        <div class="product_text">
        <?php wplus_helper::title_in_product_cart_carousel(); ?>
            <?php if( !$product->is_in_stock() ): ?>
                <p class="unavailable_text"><?php echo wplus_helper::get_setting('outofstock_carousel',__('ناموجود','woodmartplus')); ?></p>
            <?php else: ?>
            <?php core_load_template('custom-price.carousel-slider-4'); ?>
            <?php endif; ?>
        </div>
        <?php wplus_helper::load_custom_add_to_cart_template($product,'loop.carousel-layout-4'); ?>
    </div>
</div>
