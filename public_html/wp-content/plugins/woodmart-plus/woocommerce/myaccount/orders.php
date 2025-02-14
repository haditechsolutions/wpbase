<?php
/**
 * Orders
 *
 * Shows orders on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/orders.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.8.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_account_orders', $has_orders ); 



?>

<?php if ( $has_orders ) :

$order_status = wplus_helper::get_user_order_status( $customer_orders );
	?>
	<div class="white_card">
		<div class="card_header">
		<div class="title">
			<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none"> <path d="M2.90527 6.82L10.9994 11.5042L19.0386 6.84747" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M10.999 19.8092V11.495" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M9.10208 2.27333L4.20708 4.99586C3.09791 5.61003 2.19043 7.15001 2.19043 8.41501V13.5942C2.19043 14.8592 3.09791 16.3992 4.20708 17.0133L9.10208 19.7359C10.1471 20.3134 11.8612 20.3134 12.9062 19.7359L17.8013 17.0133C18.9104 16.3992 19.8179 14.8592 19.8179 13.5942V8.41501C19.8179 7.15001 18.9104 5.61003 17.8013 4.99586L12.9062 2.27333C11.8521 1.68667 10.1471 1.68667 9.10208 2.27333Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M15.5829 12.1367V8.78168L6.88379 3.75831" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </svg>
			<p>لیست سفارش های شما</p>
		</div>
		<hr>
		</div>

		<div class="tabbar_container--2">
			
			<div class="tabbar_container__buttons">
			
			<?php $i = 0; foreach(wc_get_order_statuses() as $key => $status): 
				$count_status =  array_count_values($order_status);
				$status_id = str_replace( 'wc-','',$key );

				if( isset( $disable_order_status ) && is_array( $disable_order_status ) &&  in_array( $key,$disable_order_status ) )
					continue;

				if( 'wc-checkout-draft' === $key )
					continue;

				?>
				
				<div class="tabbar_container__button <?php echo $i !==0 ? '' : 'show'  ?>">
				<?php echo $status;  ?>
						
						<div class="badge"><?php echo isset( $count_status[$status_id] ) ? esc_html( $count_status[$status_id] ) : 0;  ?></div>
				</div>
			<?php $i++ ;endforeach; ?>
				
			</div>
		
		<div class="tabbar_container__contents">
				<?php $i=0; $added = false; foreach(wc_get_order_statuses() as $key_status => $status2):   ?>
					<?php 
					
						if( isset( $disable_order_status ) && is_array( $disable_order_status ) &&  in_array( $key_status,$disable_order_status ) )
							continue;

						if( 'wc-checkout-draft' === $key_status )
							continue;
					?>
					<div class="tabbar_container__content outline_card <?php echo $i !==0 ? '' : 'show'  ?>">

						<?php if( in_array(  str_replace('wc-','',$key_status) ,$order_status  ) ):  ?>

							<?php   foreach ( $customer_orders->orders as $customer_order ):
								$order = wc_get_order( $customer_order ); 
								
								$order_items  = $order->get_items(apply_filters('woocommerce_purchase_order_item_types', 'line_item'));
								$actions = wc_get_account_orders_actions( $order );
								// $status2 === wc_get_order_status_name($order->get_status())

								if(  str_replace('wc-','',$key_status) === $order->get_status()  ):

								?>
									<div class="outline_card--border_row">
										<div class="item space_between">
										<div class="gap-y">
											<div class="text_with__icon">
											<svg class="text_green" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
												<path d="M10.0003 18.3333C14.5837 18.3333 18.3337 14.5833 18.3337 10C18.3337 5.41666 14.5837 1.66666 10.0003 1.66666C5.41699 1.66666 1.66699 5.41666 1.66699 10C1.66699 14.5833 5.41699 18.3333 10.0003 18.3333Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
												<path d="M6.45801 10L8.81634 12.3583L13.5413 7.64167" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
											</svg>
											<p>سفارش <?php echo $order->get_order_number() ?></p>
											</div>
											<p class="text_gray">
											<?php esc_html_e('Amount ','woodmartplus')?><span class="font_semibold"><?php echo $order->get_formatted_order_total() ?></span>
											</p>
										</div>
										<div class="badge_gray--oneline">
											<svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none"> <path d="M6.66699 2.16663V4.66663" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M13.333 2.16663V4.66663" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M2.91699 8.07495H17.0837" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M17.5 7.58329V14.6666C17.5 17.1666 16.25 18.8333 13.3333 18.8333H6.66667C3.75 18.8333 2.5 17.1666 2.5 14.6666V7.58329C2.5 5.08329 3.75 3.41663 6.66667 3.41663H13.3333C16.25 3.41663 17.5 5.08329 17.5 7.58329Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M13.0791 11.9167H13.0866" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M13.0791 14.4167H13.0866" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M9.99607 11.9167H10.0036" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M9.99607 14.4167H10.0036" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M6.91209 11.9167H6.91957" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M6.91209 14.4167H6.91957" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </svg>
											<p>
											تاریخ <span class="font_semibold"><?php echo esc_html( wplus_helper::date_to_garegorian( strtotime($order->get_date_created()) ) ); ?></span>
											</p>
										</div>
										</div>
										<div class="item">
										<div class="box_with__loadmore__container">
											<?php $loop = []; foreach($order_items as $key => $item):
												
												
												$product = $item->get_product();
												
												if( !$product )
												{
													continue;
												}

												$loop [] = $product->get_id();

											?>
												<div class="box_item">
													<div class="product_cover__card">
														<img src="<?php echo wp_get_attachment_image_url($product->get_image_id(),'full'); ?>" alt="product">
													</div>
												</div>
											<?php endforeach; ?>
											<?php if( count( $loop ) >= 8 ): ?>
												<button type="button" class="btn_loadmore">
												نمایش بیشتر 
												</button>
											<?php endif; ?>
										</div>
										</div>
										<div class="item gap-x-2-wrap justify_end">
										<?php if(  wplus_helper::get_setting( 'setting_factor_enable' ) ): ?>
										<a href="<?php echo add_query_arg(['wplus_factory' => $order->get_id() ]); ?>" target="_blank" class="btn link">
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17" fill="none">
											<path d="M14.667 4.49998V6.11331C14.667 7.16665 14.0003 7.83331 12.947 7.83331H10.667V3.17331C10.667 2.43331 11.2737 1.83331 12.0137 1.83331C12.7403 1.83998 13.407 2.13331 13.887 2.61331C14.367 3.09998 14.667 3.76665 14.667 4.49998Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
											<path d="M1.33301 5.16665V14.5C1.33301 15.0533 1.95966 15.3666 2.39966 15.0333L3.53967 14.18C3.80634 13.98 4.17968 14.0066 4.41968 14.2466L5.52633 15.36C5.78633 15.62 6.21302 15.62 6.47302 15.36L7.59302 14.24C7.82635 14.0066 8.19968 13.98 8.45968 14.18L9.59969 15.0333C10.0397 15.36 10.6663 15.0466 10.6663 14.5V3.16665C10.6663 2.43331 11.2663 1.83331 11.9997 1.83331H4.66634H3.99967C1.99967 1.83331 1.33301 3.02665 1.33301 4.49998V5.16665Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
											<path d="M4 6.5H8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
											<path d="M4.5 9.16669H7.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
											</svg>
											<p>مشاهده فاکتور</p>
										</a>
										<?php endif; ?>

										<?php foreach($actions as $action): ?>
											<a href="<?php echo $action['url']; ?>" class="btn solid small">
												<?php echo esc_html( $action['name'] )  ?>
											</a>
										<?php endforeach; ?>
										</div>
									</div>

								<?php endif; ?>	

								<?php  endforeach; ?>
						<?php else: ?>

							<div class="outline_card">
								<div class="nocontent_section">
									<div class="nocontent_section__image">
									<img src="<?php echo WOODPLUS_ASSET . 'img/' ?>order-none.png">
									</div>
									<h5 class="nocontent_section__title">
										<?php printf( __( 'No product found in %s','woodmartplus' ),$status2 ); ?>
									</h5>
									<p class="nocontent_section__desc">
										<?php
											$html_1 = __('Definitely in <a href="%s" class="link_primary bold">shop</a> find product you want.','woodmartplus'); 
											printf( $html_1,
												esc_url( wc_get_page_permalink( 'shop' ) )
											)
										?>
									</p>
								</div>
							</div>
						<?php endif; ?>

					</div>
					
				<?php $i++; endforeach;?>
				
		</div>
		</div>
	</div>

	<?php do_action( 'woocommerce_before_account_orders_pagination' ); ?>

	<?php if ( 1 < $customer_orders->max_num_pages ) : ?>
		<div class="woocommerce-pagination woocommerce-pagination--without-numbers woocommerce-Pagination">
			<?php if ( 1 !== $current_page ) : ?>
				<a class="woocommerce-button woocommerce-button--previous woocommerce-Button woocommerce-Button--previous button<?php echo esc_attr( $wp_button_class ); ?>" href="<?php echo esc_url( wc_get_endpoint_url( 'orders', $current_page - 1 ) ); ?>"><?php esc_html_e( 'Previous', 'woocommerce' ); ?></a>
			<?php endif; ?>

			<?php if ( intval( $customer_orders->max_num_pages ) !== $current_page ) : ?>
				<a class="woocommerce-button woocommerce-button--next woocommerce-Button woocommerce-Button--next button<?php echo esc_attr( $wp_button_class ); ?>" href="<?php echo esc_url( wc_get_endpoint_url( 'orders', $current_page + 1 ) ); ?>"><?php esc_html_e( 'Next', 'woocommerce' ); ?></a>
			<?php endif; ?>
		</div>
	<?php endif; ?>

<?php else : ?>
	<div class="white_card">
		<div class="nocontent_section">
		<div class="nocontent_section__image">
			<img src="<?php echo WOODPLUS_ASSET . 'img/' ?>order-none.png">
		</div>
		<h5 class="nocontent_section__title">
			<?php esc_html_e('هیچ سفارشی یافت نشد','woodmartplus'); ?>
		</h5>
			<p class="nocontent_section__desc"><?php esc_html_e('مشاهده' , 'woodmartplus') ?> <a href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ) ?>" class="link_primary bold"><?php esc_html_e('shop','woodmartplus') ?> </a><?php esc_html_e('and add more product','woodmartplus') ?></p>
		</div>
	</div>

<?php endif; ?>

<?php do_action( 'woocommerce_after_account_orders', $has_orders ); ?>
