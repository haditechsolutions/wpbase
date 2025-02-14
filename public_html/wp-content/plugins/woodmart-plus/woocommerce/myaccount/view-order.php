<?php
/**
 * View Order
 *
 * Shows the details of a particular order on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/view-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.0.0
 */

defined( 'ABSPATH' ) || exit;

$notes = $order->get_customer_order_notes();
?>


<div class="white_card--border_row">
	<div class="item gap-x">
	<a href="<?php echo esc_url( wc_get_endpoint_url( 'orders' ) );  ?>" class="btn link">
		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17" fill="none">
		<path d="M5.93945 13.78L10.2861 9.43333C10.7995 8.92 10.7995 8.08 10.2861 7.56667L5.93945 3.22" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
		</svg>
		<p>بازگشت</p>
	</a>
	</div>
	<div class="item">
	<div class="space_between--wrap_gap">
		<div class="gap-x">
		<svg class="text_danger" xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
			<path d="M8.33268 3L6.66602 18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
			<path d="M13.3327 3L11.666 18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
			<path d="M2.91602 8H17.916" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
			<path d="M2.08398 13H17.084" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
		</svg>
		<p class="text_darkgray">
			<?php esc_html_e('Order Number','woodmartplus'); ?>: <span class="text_black"><?php echo $order->get_order_number(); ?></span>
		</p>
		</div>
		<div class="gap-x">
		<svg class="text_danger" xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
			<path d="M8.33268 3L6.66602 18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
			<path d="M13.3327 3L11.666 18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
			<path d="M2.91602 8H17.916" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
			<path d="M2.08398 13H17.084" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
		</svg>
		<p class="text_darkgray">
			<?php esc_html_e('Order Date','woodmartplus') ?>: <span class="text_black"><?php echo wc_format_datetime( $order->get_date_created() ) ?></span>
		</p>
		</div>
		<div class="gap-x">
		<svg class="text_danger" xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
			<path d="M8.33268 3L6.66602 18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
			<path d="M13.3327 3L11.666 18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
			<path d="M2.91602 8H17.916" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
			<path d="M2.08398 13H17.084" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
		</svg>
		<p class="text_darkgray">
			<?php esc_html_e('Order Status','woodmartplus') ?>: <span class="text_black"><?php echo wc_get_order_status_name( $order->get_status() ) ?></span>
		</p>
		</div>
	</div>
	</div>
</div>

<?php if ( $notes ) : ?>
	<h2><?php esc_html_e( 'Order updates', 'woocommerce' ); ?></h2>
	<ol class="woocommerce-OrderUpdates commentlist notes">
		<?php foreach ( $notes as $note ) : ?>
		<li class="woocommerce-OrderUpdate comment note">
			<div class="woocommerce-OrderUpdate-inner comment_container">
				<div class="woocommerce-OrderUpdate-text comment-text">
					<p class="woocommerce-OrderUpdate-meta meta"><?php echo date_i18n( esc_html__( 'l jS \o\f F Y, h:ia', 'woocommerce' ), strtotime( $note->comment_date ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
					<div class="woocommerce-OrderUpdate-description description">
						<?php echo wpautop( wptexturize( $note->comment_content ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</div>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
		</li>
		<?php endforeach; ?>
	</ol>
<?php endif; ?>

<?php do_action( 'woocommerce_view_order', $order_id ); ?>
