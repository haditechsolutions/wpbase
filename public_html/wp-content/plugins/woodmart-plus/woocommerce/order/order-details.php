<?php
/**
 * Order details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.8.0
 */

defined( 'ABSPATH' ) || exit;

$order = wc_get_order( $order_id ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited

if ( ! $order ) {
	return;
}

$order_items           = $order->get_items( apply_filters( 'woocommerce_purchase_order_item_types', 'line_item' ) );
$show_purchase_note    = $order->has_status( apply_filters( 'woocommerce_purchase_note_order_statuses', array( 'completed', 'processing' ) ) );
$show_customer_details = is_user_logged_in() && $order->get_user_id() === get_current_user_id();
$downloads             = $order->get_downloadable_items();
$show_downloads        = $order->has_downloadable_item() && $order->is_download_permitted();

if ( $show_downloads ) {
	wc_get_template(
		'order/order-downloads.php',
		array(
			'downloads'  => $downloads,
			'show_title' => true,
		)
	);
}
?>

<?php
if ( $show_customer_details ) {
	wc_get_template( 'order/order-details-customer.php', array( 'order' => $order ) );
}

?>




<div class="white_card">
   <div class="section_head">
   	   <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none"> <path d="M2.90527 6.82001L10.9994 11.5042L19.0386 6.84748" stroke="#4D4D4D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M10.999 19.8092V11.495" stroke="#4D4D4D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M9.10208 2.27334L4.20708 4.99587C3.09791 5.61004 2.19043 7.15002 2.19043 8.41502V13.5942C2.19043 14.8592 3.09791 16.3992 4.20708 17.0134L9.10208 19.7359C10.1471 20.3134 11.8612 20.3134 12.9062 19.7359L17.8013 17.0134C18.9104 16.3992 19.8179 14.8592 19.8179 13.5942V8.41502C19.8179 7.15002 18.9104 5.61004 17.8013 4.99587L12.9062 2.27334C11.8521 1.68668 10.1471 1.68668 9.10208 2.27334Z" stroke="#4D4D4D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M15.5829 12.1366V8.78167L6.88379 3.7583" stroke="#4D4D4D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </svg>
      <p>جزئیات سفارش</p>
      <hr>
   </div>
   <div class="table_container">
      <div class="table_container__sub">
         <table class="shoppingcard_table">
            <thead>
               <tr>
                  <td>محصولات</td>
                  <td>جمع جز</td>
               </tr>
            </thead>
            <tbody>
				<?php foreach($order_items as $item):
					$product = $item->get_product();	
               if( !$product )
                  continue;
					$attributes = wplus_helper::render_product_attr($product);
				?>
               <tr>
                  <td>
                     <div class="shoppingcard_item">
                        <div class="shoppingcard_item__image">
                           <img src="<?php echo wp_get_attachment_url($product->get_image_id(),'full') ?>" alt="product image">
                        </div>
                        <div class="shoppingcard_item__desc">
                           <h4 class="text_xlarge black">
                              <?php echo $product->get_title(); ?>
                           </h4>
                           <div class="gap-y">
						   <?php foreach($attributes as $key => $attribute): 
							?>

                              <div class="gap-x">
                                 <p class="text_gray"><?php echo $key ?>:</p>
								 <?php foreach($attribute as $attr): ?>
                                 <p class="text_black"><?php echo $attr;  ?></p>
								 <?php endforeach; ?>
                              </div>
							<?php endforeach; ?>
                           </div>
                        </div>
                     </div>
                  </td>
                  <td>
                     <div class="gap-y-2 items_start">
                        <div class="gap-x">
							<?php echo $order->get_formatted_line_subtotal( $item );  ?>
                           
                        </div>
						<?php if(wplus_helper::get_total_discount_order($order_items)): ?>
                        <div class="offer_box">
                           <?php echo wc_price(wplus_helper::get_total_discount_order($order_items)) ?> تخفیف
                        </div>
						<?php endif ?>
                     </div>
                  </td>
               </tr>
				<?php endforeach; ?>
               <tr>
                  <td>مبلغ سفارش</td>
                  <td class="text_gray"><span class="text_black"><?php echo wc_price($order->get_subtotal()) ?></td>
               </tr>
               <tr>
                  <td>حمل و نقل</td>
                  <td class="text_gray"><span class="text_black"><?php echo $order->get_shipping_to_display(); ?></span></td>
               </tr>
			   <?php if(wplus_helper::get_total_discount_order($order_items)): ?>
               <tr>
                  <td>کد تخفیف ها</td>
                  <td class="text_gray"><span class="font_semibold text_danger"><?php echo wc_price(wplus_helper::get_total_discount_order($order_items)) ?></span> (code1)</td>
               </tr>
			   <?php endif; ?>
               <tr>
                  <td>روش پرداخت</td>
                  <td><?php echo $order->get_payment_method_title(); ?></td>
               </tr>
               <tr>
                  <td>مبلغ قابل پرداخت</td>
                  <td class="text_gray"><span class="text_black"><?php echo $order->get_formatted_order_total() ?></span> تومان</td>
               </tr>
            </tbody>
         </table>
      </div>
   </div>
</div>

<?php

/**
 * Action hook fired after the order details.
 *
 * @since 4.4.0
 * @param WC_Order $order Order data.
 */
do_action( 'woocommerce_after_order_details', $order );
