<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $product;

?>
<style>
	.added_to_cart.wc-forward
	{
		display: none !important;
	}
</style>
<?php
echo apply_filters(
	'woocommerce_loop_add_to_cart_link', // WPCS: XSS ok.
	sprintf(
		'<a href="%s" data-quantity="%s" class="%s btn solid medium arams-btn-add-to-cart" %s><i class="fa-light fa-cart-shopping"></i></a>',
		esc_url( $product->add_to_cart_url() ),
		esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
		esc_attr( isset( $args['class'] ) ? $args['class'] : 'button' ),
		isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
	),
	$product,
	$args
);


