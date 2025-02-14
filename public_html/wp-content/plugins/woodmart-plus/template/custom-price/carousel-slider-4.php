<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

?>

<div class="product_price">
	<?php if( get_class( $product ) === 'WC_Product_Variable' ): ?>
	<?php $check =  $product->get_variation_sale_price( 'min' ) !== $product->get_variation_sale_price( 'max' ) || $product->get_variation_regular_price( 'min' ) !== $product->get_variation_regular_price( 'max' ); ?>
	
	<?php if( $check ): ?>
		<div class="product_price__text">
			<p class="price_last"><?php echo wc_price($product->get_variation_price()); ?></p>
		</div>
		<div class="product_price__text">
			<p class="price_last"><?php echo wc_price($product->get_variation_price('max')); ?></p>
		</div>
	<?php else:  ?>
		<?php if( $product->is_on_sale() ): ?>
		<div class="product_offer">
			<p class="offer_price">
				<?php echo wc_price($product->get_variation_regular_price()); ?>
			</p>
			<div class="offer_box"><?php echo esc_html(wplus_helper::_price_discount($product)); ?>%</div>
		</div>
		<p class="product_price__text"><?php echo wc_price( $product->get_variation_price() ); ?></p>
		<?php else: ?>
		<div class="product_price__text">
			<p class="price_last"><?php echo wc_price($product->get_variation_price()); ?></p>
		</div>	
		<?php endif; ?>
	<?php endif; ?>
	<?php else:  ?>
		<?php if($product->is_on_sale()): ?>
			<div class="product_offer">
				<p class="offer_price">
					<?php echo wc_price($product->get_regular_price()); ?>
				</p>
				<div class="offer_box"><?php echo esc_html(wplus_helper::_price_discount($product)); ?>%</div>
			</div>
			<p class="product_price__text"><?php echo wc_price( $product->get_price() ); ?></p>		
		<?php else: ?>
			<p class="product_price__text"><?php echo wc_price( $product->get_price() ); ?></p>
		<?php endif ?>
	<?php endif; ?>
</div>
