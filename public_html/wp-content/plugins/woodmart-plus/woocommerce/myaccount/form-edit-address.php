<?php
/**
 * Edit address form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-address.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined( 'ABSPATH' ) || exit;


$page_title = ( 'billing' === $load_address ) ? esc_html__( 'Billing address', 'woocommerce' ) : esc_html__( 'Shipping address', 'woocommerce' );

do_action( 'woocommerce_before_edit_account_address_form' ); ?>

<?php if ( ! $load_address ) : ?>
	<?php wc_get_template( 'myaccount/my-address.php' ); ?>
<?php else : ?>
<div class="white_card">
	<div class="card_header">
		<div class="title">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
			<path d="M6.73 19.7C7.55 18.82 8.8 18.89 9.52 19.85L10.53 21.2C11.34 22.27 12.65 22.27 13.46 21.2L14.47 19.85C15.19 18.89 16.44 18.82 17.26 19.7C19.04 21.6 20.49 20.97 20.49 18.31V7.04C20.5 3.01 19.56 2 15.78 2H8.22C4.44 2 3.5 3.01 3.5 7.04V18.3C3.5 20.97 4.96 21.59 6.73 19.7Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
			<path d="M8.09607 11H8.10505" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
			<path d="M10.8984 11H16.3984" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
			<path d="M8.09607 7H8.10505" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
			<path d="M10.8984 7H16.3984" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
			</svg>
			<p><?php echo apply_filters( 'woocommerce_my_account_edit_address_title', $page_title, $load_address ); ?></p>
		</div>
		<hr>
	</div>
	<form method="post" class="gap-y-3">

			<?php do_action( "woocommerce_before_edit_address_form_{$load_address}" ); ?>

				<?php
					$first_and_last_name = '';
					$full_address = '';
					$postcode_phone = '';
					$count_state = '';
					$others = '';
					foreach ( $address as $key => $field ) {
						$field['return'] = true;
						$field['class']= '';
						$filed_genreted = wplus_helper::_woocommerce_form_field( $key, $field, wc_get_post_data_by_key( $key, $field['value'] ) );
						if( $key === 'billing_first_name' || $key === 'billing_last_name' || $key === 'shipping_first_name' || $key === 'shipping_last_name' )
						{
							$first_and_last_name .= $filed_genreted ;
						}
						elseif( $key === 'billing_company' || $key === 'billing_country' || $key === 'billing_state' || $key === 'billing_city' || $key === 'shipping_company' || $key === 'shipping_country' || $key === 'shipping_state' || $key === 'shipping_city' )
						{
							$count_state .= $filed_genreted;
						}
						elseif($key === 'billing_address_1' || $key === 'billing_address_2' || $key === 'shipping_address_1' || $key === 'shipping_address_2' ){

							$full_address .= $filed_genreted;
						}
						elseif($key === 'billing_postcode' || $key === 'billing_phone')
						{
							$postcode_phone .= $filed_genreted;
						}
						else
						{
							$others .= $filed_genreted;
						}

					}
				?>
				<div class="items_container--2">
					<?php echo $first_and_last_name; ?>
				</div>
				<div class="items_container--2">
					<?php echo $count_state; ?>
				</div>
				<div class="solid_input">
					<?php echo $full_address; ?>
				</div>
				<div class="items_container--2">
					<?php echo $postcode_phone; ?>
				</div>
				<div class="items_container--2">
					<?php echo $others; ?>
				</div>
			<?php do_action( "woocommerce_after_edit_address_form_{$load_address}" ); ?>

			<div class="justify_end">
				<button type="submit" class="btn solid medium<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="save_address" value="<?php esc_attr_e( 'Save address', 'woocommerce' ); ?>"><?php esc_html_e( 'Save address', 'woocommerce' ); ?></button>
				<?php wp_nonce_field( 'woocommerce-edit_address', 'woocommerce-edit-address-nonce' ); ?>
				<input type="hidden" name="action" value="edit_address" />
			</div>

	</form>
</div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_edit_account_address_form' ); ?>
