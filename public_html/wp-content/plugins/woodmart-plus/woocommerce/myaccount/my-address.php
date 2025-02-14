<?php
/**
 * My Addresses
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-address.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.6.0
 */

defined( 'ABSPATH' ) || exit;

$customer_id = get_current_user_id();

if ( ! wc_ship_to_billing_address_only() && wc_shipping_enabled() ) {
	$get_addresses = apply_filters(
		'woocommerce_my_account_get_addresses',
		array(
			'billing'  => __( 'Billing address', 'woocommerce' ),
			'shipping' => __( 'Shipping address', 'woocommerce' ),
		),
		$customer_id
	);
} else {
	$get_addresses = apply_filters(
		'woocommerce_my_account_get_addresses',
		array(
			'billing' => __( 'Billing address', 'woocommerce' ),
		),
		$customer_id
	);
}

$address = wc_get_account_formatted_address( 'billing' );
$address_shipping = wc_get_account_formatted_address( 'shipping' );

$customer = new WC_Customer( $customer_id );


$oldcol = 1;
$col    = 1;
?>
<p>
	<?php echo apply_filters( 'woocommerce_my_account_my_address_description', esc_html__( 'The following addresses will be used on the checkout page by default.', 'woocommerce' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
</p>
<div class="items_container--2">

	<div class="white_card">
		<div class="card_header">
			<div class="title">
			<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
				<path d="M10.9997 20.1667C16.0413 20.1667 20.1663 16.0417 20.1663 11C20.1663 5.95837 16.0413 1.83337 10.9997 1.83337C5.95801 1.83337 1.83301 5.95837 1.83301 11C1.83301 16.0417 5.95801 20.1667 10.9997 20.1667Z" stroke="#4D4D4D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
				<path d="M11 7.33337V11.9167" stroke="#4D4D4D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
				<path d="M10.9951 14.6666H11.0034" stroke="#4D4D4D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
			</svg>
			<p><?php esc_html_e('Billing Information','woodmartplus'); ?></p>
			</div>
			<hr>
			<a href="<?php echo esc_url( wc_get_endpoint_url( 'edit-address', 'billing' ) ); ?>" class="btn link_primary">
			<p><?php echo $address ? esc_html__('Edit','woocommerce') : esc_html__('Add','woocommerce'); ?></p>
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
				<path d="M7.33301 1.33325H5.99967C2.66634 1.33325 1.33301 2.66659 1.33301 5.99992V9.99992C1.33301 13.3333 2.66634 14.6666 5.99967 14.6666H9.99967C13.333 14.6666 14.6663 13.3333 14.6663 9.99992V8.66659" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
				<path d="M10.6933 2.01326L5.43992 7.26659C5.23992 7.46659 5.03992 7.85992 4.99992 8.14659L4.71325 10.1533C4.60659 10.8799 5.11992 11.3866 5.84659 11.2866L7.85325 10.9999C8.13325 10.9599 8.52659 10.7599 8.73325 10.5599L13.9866 5.30659C14.8933 4.39992 15.3199 3.34659 13.9866 2.01326C12.6533 0.679924 11.5999 1.10659 10.6933 2.01326Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
				<path d="M9.94043 2.7666C10.3871 4.35993 11.6338 5.6066 13.2338 6.05993" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
			</svg>
			</a>
		</div>

		<ul class="list_separate__vertical line">
			<li class="item">
			<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
				<path d="M13.6045 16.2151C12.9445 16.4101 12.1645 16.5001 11.2495 16.5001H6.74953C5.83453 16.5001 5.05453 16.4101 4.39453 16.2151C4.55953 14.2651 6.56203 12.7275 8.99953 12.7275C11.437 12.7275 13.4395 14.2651 13.6045 16.2151Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
				<path d="M11.25 1.5H6.75C3 1.5 1.5 3 1.5 6.75V11.25C1.5 14.085 2.355 15.6375 4.395 16.215C4.56 14.265 6.5625 12.7275 9 12.7275C11.4375 12.7275 13.44 14.265 13.605 16.215C15.645 15.6375 16.5 14.085 16.5 11.25V6.75C16.5 3 15 1.5 11.25 1.5ZM9 10.6275C7.515 10.6275 6.315 9.42001 6.315 7.93501C6.315 6.45001 7.515 5.25 9 5.25C10.485 5.25 11.685 6.45001 11.685 7.93501C11.685 9.42001 10.485 10.6275 9 10.6275Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
				<path d="M11.6854 7.93501C11.6854 9.42001 10.4854 10.6275 9.00043 10.6275C7.51543 10.6275 6.31543 9.42001 6.31543 7.93501C6.31543 6.45001 7.51543 5.25 9.00043 5.25C10.4854 5.25 11.6854 6.45001 11.6854 7.93501Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
			</svg>
			<p class="dark"><?php echo $customer->get_billing_first_name() . ' '. $customer->get_billing_last_name(); ?></p>
			</li>
			<li class="item">
			<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
				<path d="M9.00016 10.0725C10.2925 10.0725 11.3402 9.0248 11.3402 7.73246C11.3402 6.44011 10.2925 5.39246 9.00016 5.39246C7.70781 5.39246 6.66016 6.44011 6.66016 7.73246C6.66016 9.0248 7.70781 10.0725 9.00016 10.0725Z" stroke="currentColor"></path>
				<path d="M2.71527 6.3675C4.19277 -0.127498 13.8153 -0.119998 15.2853 6.375C16.1478 10.185 13.7778 13.41 11.7003 15.405C10.1928 16.86 7.80777 16.86 6.29277 15.405C4.22277 13.41 1.85277 10.1775 2.71527 6.3675Z" stroke="currentColor"></path>
			</svg>
			<p>
				آدرس: <span class="dark"><?php echo $customer->get_billing_address() !== null ? $customer->get_billing_address() : ''; ?></span>
			</p>
			</li>
			<li class="item">
			<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
				<path d="M16.4775 13.7476C16.4775 14.0176 16.4175 14.2951 16.29 14.5651C16.1625 14.8351 15.9975 15.0901 15.78 15.3301C15.4125 15.7351 15.0075 16.0276 14.55 16.2151C14.1 16.4026 13.6125 16.5001 13.0875 16.5001C12.3225 16.5001 11.505 16.3201 10.6425 15.9526C9.78 15.5851 8.9175 15.0901 8.0625 14.4676C7.2 13.8376 6.3825 13.1401 5.6025 12.3676C4.83 11.5876 4.1325 10.7701 3.51 9.91512C2.895 9.06012 2.4 8.20512 2.04 7.35762C1.68 6.50262 1.5 5.68512 1.5 4.90512C1.5 4.39512 1.59 3.90762 1.77 3.45762C1.95 3.00012 2.235 2.58012 2.6325 2.20512C3.1125 1.73262 3.6375 1.50012 4.1925 1.50012C4.4025 1.50012 4.6125 1.54512 4.8 1.63512C4.995 1.72512 5.1675 1.86012 5.3025 2.05512L7.0425 4.50762C7.1775 4.69512 7.275 4.86762 7.3425 5.03262C7.41 5.19012 7.4475 5.34762 7.4475 5.49012C7.4475 5.67012 7.395 5.85012 7.29 6.02262C7.1925 6.19512 7.05 6.37512 6.87 6.55512L6.3 7.14762C6.2175 7.23012 6.18 7.32762 6.18 7.44762C6.18 7.50762 6.1875 7.56012 6.2025 7.62012C6.225 7.68012 6.2475 7.72512 6.2625 7.77012C6.3975 8.01762 6.63 8.34012 6.96 8.73012C7.2975 9.12012 7.6575 9.51762 8.0475 9.91512C8.4525 10.3126 8.8425 10.6801 9.24 11.0176C9.63 11.3476 9.9525 11.5726 10.2075 11.7076C10.245 11.7226 10.29 11.7451 10.3425 11.7676C10.4025 11.7901 10.4625 11.7976 10.53 11.7976C10.6575 11.7976 10.755 11.7526 10.8375 11.6701L11.4075 11.1076C11.595 10.9201 11.775 10.7776 11.9475 10.6876C12.12 10.5826 12.2925 10.5301 12.48 10.5301C12.6225 10.5301 12.7725 10.5601 12.9375 10.6276C13.1025 10.6951 13.275 10.7926 13.4625 10.9201L15.945 12.6826C16.14 12.8176 16.275 12.9751 16.3575 13.1626C16.4325 13.3501 16.4775 13.5376 16.4775 13.7476Z" stroke="currentColor" stroke-miterlimit="10"></path>
				<path d="M13.875 6.75012C13.875 6.30012 13.5225 5.61012 12.9975 5.04762C12.5175 4.53012 11.88 4.12512 11.25 4.12512" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
				<path d="M16.5 6.75012C16.5 3.84762 14.1525 1.50012 11.25 1.50012" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
			</svg>
			<p>
				<?php esc_html_e('Phone Number','woodmartplus') ?>: <span class="dark"><?php echo $customer->get_billing_phone() !== null ? $customer->get_billing_phone() : esc_html('Phone Not Set' ,'woodmartplus'); ?></span>
			</p>
			</li>
			<li class="item">
			<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
				<path d="M12.75 15.3751H5.25C3 15.3751 1.5 14.2501 1.5 11.6251V6.37512C1.5 3.75012 3 2.62512 5.25 2.62512H12.75C15 2.62512 16.5 3.75012 16.5 6.37512V11.6251C16.5 14.2501 15 15.3751 12.75 15.3751Z" stroke="currentColor" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
				<path d="M12.75 6.75012L10.4025 8.62512C9.63 9.24012 8.3625 9.24012 7.59 8.62512L5.25 6.75012" stroke="currentColor" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
			</svg>
			<?php  ?>
			<p>
				<?php esc_html_e('Email','woodmartplus'); ?>: <span class="dark"><?php echo $customer->get_billing_email() !== null ? $customer->get_billing_email() : esc_html('Email Not Set','woodmartplus'); ?></span>
			</p>
			</li>
		</ul>
	</div>

	<div class="white_card">
		<div class="card_header">
			<div class="title">
			<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
				<path d="M10.9997 20.1667C16.0413 20.1667 20.1663 16.0417 20.1663 11C20.1663 5.95837 16.0413 1.83337 10.9997 1.83337C5.95801 1.83337 1.83301 5.95837 1.83301 11C1.83301 16.0417 5.95801 20.1667 10.9997 20.1667Z" stroke="#4D4D4D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
				<path d="M11 7.33337V11.9167" stroke="#4D4D4D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
				<path d="M10.9951 14.6666H11.0034" stroke="#4D4D4D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
			</svg>
			<p><?php esc_html_e('Billing Information','woodmartplus'); ?></p>
			</div>
			<hr>
			<a href="<?php echo esc_url( wc_get_endpoint_url( 'edit-address', 'shipping' ) ); ?>" class="btn link_primary">
			<p><?php echo $address_shipping ? esc_html__('Edit','woocommerce') : esc_html__('Add','woocommerce'); ?></p>
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
				<path d="M7.33301 1.33325H5.99967C2.66634 1.33325 1.33301 2.66659 1.33301 5.99992V9.99992C1.33301 13.3333 2.66634 14.6666 5.99967 14.6666H9.99967C13.333 14.6666 14.6663 13.3333 14.6663 9.99992V8.66659" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
				<path d="M10.6933 2.01326L5.43992 7.26659C5.23992 7.46659 5.03992 7.85992 4.99992 8.14659L4.71325 10.1533C4.60659 10.8799 5.11992 11.3866 5.84659 11.2866L7.85325 10.9999C8.13325 10.9599 8.52659 10.7599 8.73325 10.5599L13.9866 5.30659C14.8933 4.39992 15.3199 3.34659 13.9866 2.01326C12.6533 0.679924 11.5999 1.10659 10.6933 2.01326Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
				<path d="M9.94043 2.7666C10.3871 4.35993 11.6338 5.6066 13.2338 6.05993" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
			</svg>
			</a>
		</div>

		<ul class="list_separate__vertical line">
			<li class="item">
			<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
				<path d="M13.6045 16.2151C12.9445 16.4101 12.1645 16.5001 11.2495 16.5001H6.74953C5.83453 16.5001 5.05453 16.4101 4.39453 16.2151C4.55953 14.2651 6.56203 12.7275 8.99953 12.7275C11.437 12.7275 13.4395 14.2651 13.6045 16.2151Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
				<path d="M11.25 1.5H6.75C3 1.5 1.5 3 1.5 6.75V11.25C1.5 14.085 2.355 15.6375 4.395 16.215C4.56 14.265 6.5625 12.7275 9 12.7275C11.4375 12.7275 13.44 14.265 13.605 16.215C15.645 15.6375 16.5 14.085 16.5 11.25V6.75C16.5 3 15 1.5 11.25 1.5ZM9 10.6275C7.515 10.6275 6.315 9.42001 6.315 7.93501C6.315 6.45001 7.515 5.25 9 5.25C10.485 5.25 11.685 6.45001 11.685 7.93501C11.685 9.42001 10.485 10.6275 9 10.6275Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
				<path d="M11.6854 7.93501C11.6854 9.42001 10.4854 10.6275 9.00043 10.6275C7.51543 10.6275 6.31543 9.42001 6.31543 7.93501C6.31543 6.45001 7.51543 5.25 9.00043 5.25C10.4854 5.25 11.6854 6.45001 11.6854 7.93501Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
			</svg>
			<p class="dark"><?php echo $customer->get_shipping_first_name() . ' '. $customer->get_shipping_last_name(); ?></p>
			</li>
			<li class="item">
			<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
				<path d="M9.00016 10.0725C10.2925 10.0725 11.3402 9.0248 11.3402 7.73246C11.3402 6.44011 10.2925 5.39246 9.00016 5.39246C7.70781 5.39246 6.66016 6.44011 6.66016 7.73246C6.66016 9.0248 7.70781 10.0725 9.00016 10.0725Z" stroke="currentColor"></path>
				<path d="M2.71527 6.3675C4.19277 -0.127498 13.8153 -0.119998 15.2853 6.375C16.1478 10.185 13.7778 13.41 11.7003 15.405C10.1928 16.86 7.80777 16.86 6.29277 15.405C4.22277 13.41 1.85277 10.1775 2.71527 6.3675Z" stroke="currentColor"></path>
			</svg>
			<p>
				آدرس: <span class="dark"><?php echo $customer->get_shipping_address() !== null ? $customer->get_shipping_address() : ''; ?></span>
			</p>
			</li>
			<li class="item">
			<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
				<path d="M16.4775 13.7476C16.4775 14.0176 16.4175 14.2951 16.29 14.5651C16.1625 14.8351 15.9975 15.0901 15.78 15.3301C15.4125 15.7351 15.0075 16.0276 14.55 16.2151C14.1 16.4026 13.6125 16.5001 13.0875 16.5001C12.3225 16.5001 11.505 16.3201 10.6425 15.9526C9.78 15.5851 8.9175 15.0901 8.0625 14.4676C7.2 13.8376 6.3825 13.1401 5.6025 12.3676C4.83 11.5876 4.1325 10.7701 3.51 9.91512C2.895 9.06012 2.4 8.20512 2.04 7.35762C1.68 6.50262 1.5 5.68512 1.5 4.90512C1.5 4.39512 1.59 3.90762 1.77 3.45762C1.95 3.00012 2.235 2.58012 2.6325 2.20512C3.1125 1.73262 3.6375 1.50012 4.1925 1.50012C4.4025 1.50012 4.6125 1.54512 4.8 1.63512C4.995 1.72512 5.1675 1.86012 5.3025 2.05512L7.0425 4.50762C7.1775 4.69512 7.275 4.86762 7.3425 5.03262C7.41 5.19012 7.4475 5.34762 7.4475 5.49012C7.4475 5.67012 7.395 5.85012 7.29 6.02262C7.1925 6.19512 7.05 6.37512 6.87 6.55512L6.3 7.14762C6.2175 7.23012 6.18 7.32762 6.18 7.44762C6.18 7.50762 6.1875 7.56012 6.2025 7.62012C6.225 7.68012 6.2475 7.72512 6.2625 7.77012C6.3975 8.01762 6.63 8.34012 6.96 8.73012C7.2975 9.12012 7.6575 9.51762 8.0475 9.91512C8.4525 10.3126 8.8425 10.6801 9.24 11.0176C9.63 11.3476 9.9525 11.5726 10.2075 11.7076C10.245 11.7226 10.29 11.7451 10.3425 11.7676C10.4025 11.7901 10.4625 11.7976 10.53 11.7976C10.6575 11.7976 10.755 11.7526 10.8375 11.6701L11.4075 11.1076C11.595 10.9201 11.775 10.7776 11.9475 10.6876C12.12 10.5826 12.2925 10.5301 12.48 10.5301C12.6225 10.5301 12.7725 10.5601 12.9375 10.6276C13.1025 10.6951 13.275 10.7926 13.4625 10.9201L15.945 12.6826C16.14 12.8176 16.275 12.9751 16.3575 13.1626C16.4325 13.3501 16.4775 13.5376 16.4775 13.7476Z" stroke="currentColor" stroke-miterlimit="10"></path>
				<path d="M13.875 6.75012C13.875 6.30012 13.5225 5.61012 12.9975 5.04762C12.5175 4.53012 11.88 4.12512 11.25 4.12512" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
				<path d="M16.5 6.75012C16.5 3.84762 14.1525 1.50012 11.25 1.50012" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
			</svg>
			<p>
				<?php esc_html_e('Phone Number','woodmartplus') ?>: <span class="dark"><?php  echo !empty($customer->get_shipping_phone())  ? $customer->get_shipping_phone() : esc_html__('Phone Not Set' ,'woodmartplus'); ?></span>
			</p>
			</li>
			<li class="item">
			<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
				<path d="M12.75 15.3751H5.25C3 15.3751 1.5 14.2501 1.5 11.6251V6.37512C1.5 3.75012 3 2.62512 5.25 2.62512H12.75C15 2.62512 16.5 3.75012 16.5 6.37512V11.6251C16.5 14.2501 15 15.3751 12.75 15.3751Z" stroke="currentColor" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
				<path d="M12.75 6.75012L10.4025 8.62512C9.63 9.24012 8.3625 9.24012 7.59 8.62512L5.25 6.75012" stroke="currentColor" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
			</svg>
			<?php  ?>
			<p>
				<?php esc_html_e('Email','woodmartplus'); ?>: <span class="dark"><?php echo $customer->get_billing_email() !== null ? $customer->get_billing_email() : esc_html('Email Not Set','woodmartplus'); ?></span>
			</p>
			</li>
		</ul>
	</div>

</div>

