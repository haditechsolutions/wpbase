<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

?>
<?php if( get_class( $product ) === 'WC_Product_Variable' ): ?>
<?php $check =  $product->get_variation_sale_price( 'min' ) !== $product->get_variation_sale_price( 'max' ) || $product->get_variation_regular_price( 'min' ) !== $product->get_variation_regular_price( 'max' ); ?>
<div class="product_price">
<?php if( $check ): ?>
    <div class="product_price__box">
        <p class="price_text"><?php echo wc_price($product->get_variation_price()); ?></p>
            <div class="offer_percent"><?php esc_html_e('از','woodmartplus'); ?></div>
        <p class="price_text"><?php echo wc_price($product->get_variation_price('max')); ?></p>
    </div>
<?php else: ?>
    <?php if( $product->is_on_sale() ): ?>
        <p class="product_offer__price"><?php echo wc_price($product->get_variation_price()); ?></p>
        <div class="product_price__box">
            <div class="offer_percent"><?php echo esc_html( wplus_helper::_price_discount($product) ); ?>%</div>
            <p class="price_text"><?php echo wc_price($product->get_variation_regular_price()); ?></p>
        </div>
    <?php else: ?>
        <div class="product_price__box">
            <p class="price_text"><?php echo wc_price($product->get_variation_price()); ?></p>
        </div>
    <?php endif; ?>
<?php endif; ?>
    
</div>

<?php else: ?>

<div class="product_price">
    <?php if( $product->is_on_sale() ): ?>
        <p class="product_offer__price"><?php echo wc_price($product->get_regular_price()); ?></p>
        <div class="product_price__box">
            <div class="offer_percent"><?php echo esc_html(wplus_helper::_price_discount($product)); ?>%</div>
            <p class="price_text"><?php echo wc_price( $product->get_price() ); ?></p>
        </div>
    <?php else: ?>
        <div class="product_price__box">
            <p class="price_text"><?php echo wc_price( $product->get_price() ); ?></p>
        </div>
    <?php endif; ?>
</div>

<?php endif; ?>