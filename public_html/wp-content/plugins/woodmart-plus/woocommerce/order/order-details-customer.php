<?php
/**
 * Order Customer Details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details-customer.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 5.6.0
 */

defined( 'ABSPATH' ) || exit;

$show_shipping = ! wc_ship_to_billing_address_only() && $order->needs_shipping_address();

?>

<div class="items_container--2">
	<div class="white_card">
		<div class="section_head">
			<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
			<path d="M10.9997 20.1667C16.0413 20.1667 20.1663 16.0417 20.1663 11C20.1663 5.95837 16.0413 1.83337 10.9997 1.83337C5.95801 1.83337 1.83301 5.95837 1.83301 11C1.83301 16.0417 5.95801 20.1667 10.9997 20.1667Z" stroke="#4D4D4D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
			<path d="M11 7.33337V11.9167" stroke="#4D4D4D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
			<path d="M10.9951 14.6666H11.0034" stroke="#4D4D4D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
			</svg>
			<p><?php esc_html_e('Billing information','woodmartplus') ?></p>
			<hr>
		</div>

		<ul class="list_separate__vertical line">
			<li class="item">
			<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
				<path d="M13.6045 16.2151C12.9445 16.4101 12.1645 16.5001 11.2495 16.5001H6.74953C5.83453 16.5001 5.05453 16.4101 4.39453 16.2151C4.55953 14.2651 6.56203 12.7275 8.99953 12.7275C11.437 12.7275 13.4395 14.2651 13.6045 16.2151Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
				<path d="M11.25 1.5H6.75C3 1.5 1.5 3 1.5 6.75V11.25C1.5 14.085 2.355 15.6375 4.395 16.215C4.56 14.265 6.5625 12.7275 9 12.7275C11.4375 12.7275 13.44 14.265 13.605 16.215C15.645 15.6375 16.5 14.085 16.5 11.25V6.75C16.5 3 15 1.5 11.25 1.5ZM9 10.6275C7.515 10.6275 6.315 9.42001 6.315 7.93501C6.315 6.45001 7.515 5.25 9 5.25C10.485 5.25 11.685 6.45001 11.685 7.93501C11.685 9.42001 10.485 10.6275 9 10.6275Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
				<path d="M11.6854 7.93501C11.6854 9.42001 10.4854 10.6275 9.00043 10.6275C7.51543 10.6275 6.31543 9.42001 6.31543 7.93501C6.31543 6.45001 7.51543 5.25 9.00043 5.25C10.4854 5.25 11.6854 6.45001 11.6854 7.93501Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
			</svg>
			<p class="dark"><?php echo $order->get_formatted_billing_full_name(); ?></p>
			</li>
			<li class="item">
			<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
				<path d="M9.00016 10.0725C10.2925 10.0725 11.3402 9.0248 11.3402 7.73246C11.3402 6.44011 10.2925 5.39246 9.00016 5.39246C7.70781 5.39246 6.66016 6.44011 6.66016 7.73246C6.66016 9.0248 7.70781 10.0725 9.00016 10.0725Z" stroke="currentColor"></path>
				<path d="M2.71527 6.3675C4.19277 -0.127498 13.8153 -0.119998 15.2853 6.375C16.1478 10.185 13.7778 13.41 11.7003 15.405C10.1928 16.86 7.80777 16.86 6.29277 15.405C4.22277 13.41 1.85277 10.1775 2.71527 6.3675Z" stroke="currentColor"></path>
			</svg>
			<p>
				<?php esc_html_e('Address','woodmartplus') ?>: <span class="dark"><?php echo $order->get_billing_address_1(); ?></span>
			</p>
			</li>
			<?php if($order->get_billing_phone()): ?>
			<li class="item">
			<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
				<path d="M16.4775 13.7476C16.4775 14.0176 16.4175 14.2951 16.29 14.5651C16.1625 14.8351 15.9975 15.0901 15.78 15.3301C15.4125 15.7351 15.0075 16.0276 14.55 16.2151C14.1 16.4026 13.6125 16.5001 13.0875 16.5001C12.3225 16.5001 11.505 16.3201 10.6425 15.9526C9.78 15.5851 8.9175 15.0901 8.0625 14.4676C7.2 13.8376 6.3825 13.1401 5.6025 12.3676C4.83 11.5876 4.1325 10.7701 3.51 9.91512C2.895 9.06012 2.4 8.20512 2.04 7.35762C1.68 6.50262 1.5 5.68512 1.5 4.90512C1.5 4.39512 1.59 3.90762 1.77 3.45762C1.95 3.00012 2.235 2.58012 2.6325 2.20512C3.1125 1.73262 3.6375 1.50012 4.1925 1.50012C4.4025 1.50012 4.6125 1.54512 4.8 1.63512C4.995 1.72512 5.1675 1.86012 5.3025 2.05512L7.0425 4.50762C7.1775 4.69512 7.275 4.86762 7.3425 5.03262C7.41 5.19012 7.4475 5.34762 7.4475 5.49012C7.4475 5.67012 7.395 5.85012 7.29 6.02262C7.1925 6.19512 7.05 6.37512 6.87 6.55512L6.3 7.14762C6.2175 7.23012 6.18 7.32762 6.18 7.44762C6.18 7.50762 6.1875 7.56012 6.2025 7.62012C6.225 7.68012 6.2475 7.72512 6.2625 7.77012C6.3975 8.01762 6.63 8.34012 6.96 8.73012C7.2975 9.12012 7.6575 9.51762 8.0475 9.91512C8.4525 10.3126 8.8425 10.6801 9.24 11.0176C9.63 11.3476 9.9525 11.5726 10.2075 11.7076C10.245 11.7226 10.29 11.7451 10.3425 11.7676C10.4025 11.7901 10.4625 11.7976 10.53 11.7976C10.6575 11.7976 10.755 11.7526 10.8375 11.6701L11.4075 11.1076C11.595 10.9201 11.775 10.7776 11.9475 10.6876C12.12 10.5826 12.2925 10.5301 12.48 10.5301C12.6225 10.5301 12.7725 10.5601 12.9375 10.6276C13.1025 10.6951 13.275 10.7926 13.4625 10.9201L15.945 12.6826C16.14 12.8176 16.275 12.9751 16.3575 13.1626C16.4325 13.3501 16.4775 13.5376 16.4775 13.7476Z" stroke="currentColor" stroke-miterlimit="10"></path>
				<path d="M13.875 6.75012C13.875 6.30012 13.5225 5.61012 12.9975 5.04762C12.5175 4.53012 11.88 4.12512 11.25 4.12512" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
				<path d="M16.5 6.75012C16.5 3.84762 14.1525 1.50012 11.25 1.50012" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
			</svg>
			<p>
				<?php esc_attr_e('Phone Number','woodmartplus') ?>: <span class="dark"><?php echo esc_html( $order->get_billing_phone() ); ?></span>
			</p>
			</li>
			<?php endif; ?>
			<?php if($order->get_billing_email()): ?>
			<li class="item">
			<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
				<path d="M12.75 15.3751H5.25C3 15.3751 1.5 14.2501 1.5 11.6251V6.37512C1.5 3.75012 3 2.62512 5.25 2.62512H12.75C15 2.62512 16.5 3.75012 16.5 6.37512V11.6251C16.5 14.2501 15 15.3751 12.75 15.3751Z" stroke="currentColor" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
				<path d="M12.75 6.75012L10.4025 8.62512C9.63 9.24012 8.3625 9.24012 7.59 8.62512L5.25 6.75012" stroke="currentColor" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
			</svg>
			<p>
				<?php esc_html_e('Email','woodmartplus') ?>: <span class="dark"><?php echo esc_html( $order->get_billing_email() ); ?></span>
			</p>
			</li>
			<?php endif; ?>
		</ul>
		</div>
	<?php if($show_shipping): ?>
		<div class="white_card">
			<div class="section_head">
				<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
				<path d="M13.7497 1.83337V11C13.7497 12.0084 12.9247 12.8334 11.9163 12.8334H1.83301V5.50004C1.83301 3.47421 3.47384 1.83337 5.49967 1.83337H13.7497Z" stroke="#4D4D4D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
				<path d="M20.1663 12.8334V15.5834C20.1663 17.105 18.938 18.3334 17.4163 18.3334H16.4997C16.4997 17.325 15.6747 16.5 14.6663 16.5C13.658 16.5 12.833 17.325 12.833 18.3334H9.16634C9.16634 17.325 8.34134 16.5 7.33301 16.5C6.32467 16.5 5.49967 17.325 5.49967 18.3334H4.58301C3.06134 18.3334 1.83301 17.105 1.83301 15.5834V12.8334H11.9163C12.9247 12.8334 13.7497 12.0084 13.7497 11V4.58337H15.4363C16.0963 4.58337 16.7013 4.94088 17.0313 5.50922L18.5988 8.25004H17.4163C16.9122 8.25004 16.4997 8.66254 16.4997 9.16671V11.9167C16.4997 12.4209 16.9122 12.8334 17.4163 12.8334H20.1663Z" stroke="#4D4D4D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
				<path d="M7.33333 20.1667C8.34586 20.1667 9.16667 19.3459 9.16667 18.3333C9.16667 17.3208 8.34586 16.5 7.33333 16.5C6.32081 16.5 5.5 17.3208 5.5 18.3333C5.5 19.3459 6.32081 20.1667 7.33333 20.1667Z" stroke="#4D4D4D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
				<path d="M14.6663 20.1667C15.6789 20.1667 16.4997 19.3459 16.4997 18.3333C16.4997 17.3208 15.6789 16.5 14.6663 16.5C13.6538 16.5 12.833 17.3208 12.833 18.3333C12.833 19.3459 13.6538 20.1667 14.6663 20.1667Z" stroke="#4D4D4D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
				<path d="M20.1667 11V12.8333H17.4167C16.9125 12.8333 16.5 12.4208 16.5 11.9167V9.16667C16.5 8.6625 16.9125 8.25 17.4167 8.25H18.5992L20.1667 11Z" stroke="#4D4D4D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
				</svg>
				<p><?php esc_html_e('Shipping Information','woodmartplus') ?></p>
				<hr>
			</div>

			<ul class="list_separate__vertical line">
				<li class="item">
				<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
					<path d="M13.6045 16.2151C12.9445 16.4101 12.1645 16.5001 11.2495 16.5001H6.74953C5.83453 16.5001 5.05453 16.4101 4.39453 16.2151C4.55953 14.2651 6.56203 12.7275 8.99953 12.7275C11.437 12.7275 13.4395 14.2651 13.6045 16.2151Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
					<path d="M11.25 1.5H6.75C3 1.5 1.5 3 1.5 6.75V11.25C1.5 14.085 2.355 15.6375 4.395 16.215C4.56 14.265 6.5625 12.7275 9 12.7275C11.4375 12.7275 13.44 14.265 13.605 16.215C15.645 15.6375 16.5 14.085 16.5 11.25V6.75C16.5 3 15 1.5 11.25 1.5ZM9 10.6275C7.515 10.6275 6.315 9.42001 6.315 7.93501C6.315 6.45001 7.515 5.25 9 5.25C10.485 5.25 11.685 6.45001 11.685 7.93501C11.685 9.42001 10.485 10.6275 9 10.6275Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
					<path d="M11.6854 7.93501C11.6854 9.42001 10.4854 10.6275 9.00043 10.6275C7.51543 10.6275 6.31543 9.42001 6.31543 7.93501C6.31543 6.45001 7.51543 5.25 9.00043 5.25C10.4854 5.25 11.6854 6.45001 11.6854 7.93501Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
				</svg>
				<p class="dark"><?php echo $order->get_formatted_billing_full_name(); ?></p>
				</li>
				<li class="item">
				<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
					<path d="M9.00016 10.0725C10.2925 10.0725 11.3402 9.0248 11.3402 7.73246C11.3402 6.44011 10.2925 5.39246 9.00016 5.39246C7.70781 5.39246 6.66016 6.44011 6.66016 7.73246C6.66016 9.0248 7.70781 10.0725 9.00016 10.0725Z" stroke="currentColor"></path>
					<path d="M2.71527 6.3675C4.19277 -0.127498 13.8153 -0.119998 15.2853 6.375C16.1478 10.185 13.7778 13.41 11.7003 15.405C10.1928 16.86 7.80777 16.86 6.29277 15.405C4.22277 13.41 1.85277 10.1775 2.71527 6.3675Z" stroke="currentColor"></path>
				</svg>
				<p>
					<?php esc_html_e('Address','woodmartplus') ?>: <span class="dark"><?php echo $order->get_shipping_address_1(); ?></span>
				</p>
				</li>
				<?php if($order->get_shipping_phone()): ?>
				<li class="item">
				<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
					<path d="M16.4775 13.7476C16.4775 14.0176 16.4175 14.2951 16.29 14.5651C16.1625 14.8351 15.9975 15.0901 15.78 15.3301C15.4125 15.7351 15.0075 16.0276 14.55 16.2151C14.1 16.4026 13.6125 16.5001 13.0875 16.5001C12.3225 16.5001 11.505 16.3201 10.6425 15.9526C9.78 15.5851 8.9175 15.0901 8.0625 14.4676C7.2 13.8376 6.3825 13.1401 5.6025 12.3676C4.83 11.5876 4.1325 10.7701 3.51 9.91512C2.895 9.06012 2.4 8.20512 2.04 7.35762C1.68 6.50262 1.5 5.68512 1.5 4.90512C1.5 4.39512 1.59 3.90762 1.77 3.45762C1.95 3.00012 2.235 2.58012 2.6325 2.20512C3.1125 1.73262 3.6375 1.50012 4.1925 1.50012C4.4025 1.50012 4.6125 1.54512 4.8 1.63512C4.995 1.72512 5.1675 1.86012 5.3025 2.05512L7.0425 4.50762C7.1775 4.69512 7.275 4.86762 7.3425 5.03262C7.41 5.19012 7.4475 5.34762 7.4475 5.49012C7.4475 5.67012 7.395 5.85012 7.29 6.02262C7.1925 6.19512 7.05 6.37512 6.87 6.55512L6.3 7.14762C6.2175 7.23012 6.18 7.32762 6.18 7.44762C6.18 7.50762 6.1875 7.56012 6.2025 7.62012C6.225 7.68012 6.2475 7.72512 6.2625 7.77012C6.3975 8.01762 6.63 8.34012 6.96 8.73012C7.2975 9.12012 7.6575 9.51762 8.0475 9.91512C8.4525 10.3126 8.8425 10.6801 9.24 11.0176C9.63 11.3476 9.9525 11.5726 10.2075 11.7076C10.245 11.7226 10.29 11.7451 10.3425 11.7676C10.4025 11.7901 10.4625 11.7976 10.53 11.7976C10.6575 11.7976 10.755 11.7526 10.8375 11.6701L11.4075 11.1076C11.595 10.9201 11.775 10.7776 11.9475 10.6876C12.12 10.5826 12.2925 10.5301 12.48 10.5301C12.6225 10.5301 12.7725 10.5601 12.9375 10.6276C13.1025 10.6951 13.275 10.7926 13.4625 10.9201L15.945 12.6826C16.14 12.8176 16.275 12.9751 16.3575 13.1626C16.4325 13.3501 16.4775 13.5376 16.4775 13.7476Z" stroke="currentColor" stroke-miterlimit="10"></path>
					<path d="M13.875 6.75012C13.875 6.30012 13.5225 5.61012 12.9975 5.04762C12.5175 4.53012 11.88 4.12512 11.25 4.12512" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
					<path d="M16.5 6.75012C16.5 3.84762 14.1525 1.50012 11.25 1.50012" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
				</svg>
				<p>
					<?php esc_html_e('Phone Number', 'woodmartplus') ?>: <span class="dark"><?php echo $order->get_shipping_phone(); ?></span>
				</p>
				<?php endif; ?>
				</li>
				<?php if($order->get_billing_email()): ?>
				<li class="item">
				<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
					<path d="M12.75 15.3751H5.25C3 15.3751 1.5 14.2501 1.5 11.6251V6.37512C1.5 3.75012 3 2.62512 5.25 2.62512H12.75C15 2.62512 16.5 3.75012 16.5 6.37512V11.6251C16.5 14.2501 15 15.3751 12.75 15.3751Z" stroke="currentColor" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
					<path d="M12.75 6.75012L10.4025 8.62512C9.63 9.24012 8.3625 9.24012 7.59 8.62512L5.25 6.75012" stroke="currentColor" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
				</svg>
				<p>
					<?php esc_html_e('Email','woodmartplus') ?>: <span class="dark"><?php echo $order->get_billing_email(); ?></span>
				</p>
				</li>
				<?php endif ?>
			</ul>
	    </div>
	<?php endif; ?>
</div>

