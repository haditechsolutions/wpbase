<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

?>
<?php if( get_class( $product ) === 'WC_Product_Variable' ): ?>
    <div class="product_prices">
        <?php if( $product->is_on_sale() ): ?>
            <div class="product_offer">
                <span class="price"><?php echo wc_price($product->get_variation_price()); ?></span>
                <div class="offer_box"><?php echo esc_html( wplus_helper::_price_discount($product)); ?>%</div>
            </div>
        <?php else: ?>
        <p class="price">
            <?php echo wc_price($product->get_variation_price()); ?>
        </p>
        <?php endif; ?>
        <p class="price">
            <?php echo wc_price($product->get_variation_regular_price('max')); ?>
        </p>
    </div>
<?php else: ?>

    <div class="product_prices">
        <?php if( $product->is_on_sale() ): ?>
            <div class="product_offer">
                <p><?php echo wc_price($product->get_regular_price()); ?></p>
                <div class="offer_box"><?php echo esc_html( wplus_helper::_price_discount($product) ); ?>%</div>
            </div>
            <p class="price"><?php echo wc_price( $product->get_price() ); ?></p>
        <?php else: ?>
            <p class="price"><?php echo wc_price( $product->get_price() ); ?></p>
        <?php endif; ?>
    </div>
<?php endif; ?>
