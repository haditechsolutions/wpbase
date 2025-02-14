<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;



?>
<div class="product_card big_preview align_center product_carousel_layout_6">
    <a href="<?php echo get_the_permalink(); ?>">
        <?php echo $product->get_image( isset( $args['settings']['product_size'] ) ? $args['settings']['product_size'] : 'woocommerce_thumbnail' ); ?>
    </a>
    <div class="product_text">
    <?php wplus_helper::title_in_product_cart_carousel(); ?>
    <?php core_load_template('custom-price.carousel-slider-layout-2'); ?>
    </div>
</div>