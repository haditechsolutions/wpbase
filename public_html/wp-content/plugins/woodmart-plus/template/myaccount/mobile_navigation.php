<?php
/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
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

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_account_navigation' );

$menus = wc_get_account_menu_items();
$new_menu = [
	'dashboard' => '',
	'orders' => '',
	'downloads' => '',
	'wishlist' => '',
	'tickets' => '',
	'notifications' => '',
	'offers' => '',
	'edit-address' => '',
	'edit-account' => '',
];
foreach( $menus as  $key => $menu )
{
	foreach( $new_menu as $k => $new )
	{
		if( $key == $k )
		{
			$new_menu[$key] = $menu;

		}else{
			$new_menu[$key] = $menu;
		}
	}
}


$user_id = get_current_user_id();
$attachment_id = get_user_meta( $user_id, '_acount_image', true );
$last_name = get_user_meta($user_id , 'last_name',true);
$first_name = get_user_meta($user_id , 'first_name',true);

$note = __('Complete your information' , 'woodmartplus');

$phone = get_user_meta($user_id, '_wplus_phone',true) ? get_user_meta($user_id, '_wplus_phone',true) : false ;

$full_name = isset($first_name) && !empty($first_name) ? $first_name . ' ' .$last_name : $note;

$original_image_url = wp_get_attachment_url( $attachment_id );
?>
	<div class="dashboard_avatar">
		<?php if($original_image_url): ?>
		<img src="<?php echo wp_get_attachment_image_url($attachment_id,'full'); ?>" alt="user avatar">
		<?php else: ?>
		<img src="<?php echo WOODPLUS_ASSET . 'img/' ?>user.svg" alt="user avatar">
		<?php endif; ?>
	</div>

	<div class="dashboard_side__user">
		<div class="justify_end">
		<a href="<?php echo esc_url( wc_get_endpoint_url( 'edit-account' ) );  ?>" class="link_gray small">
			<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none"> <path d="M6.41699 1.16663H5.25033C2.33366 1.16663 1.16699 2.33329 1.16699 5.24996V8.74996C1.16699 11.6666 2.33366 12.8333 5.25033 12.8333H8.75033C11.667 12.8333 12.8337 11.6666 12.8337 8.74996V7.58329" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M9.35708 1.76169L4.76042 6.35836C4.58542 6.53336 4.41042 6.87753 4.37542 7.12836L4.12458 8.88419C4.03125 9.52002 4.48042 9.96336 5.11625 9.87586L6.87208 9.62503C7.11708 9.59003 7.46125 9.41503 7.64208 9.24003L12.2388 4.64336C13.0321 3.85003 13.4054 2.92836 12.2388 1.76169C11.0721 0.595025 10.1504 0.968359 9.35708 1.76169Z" stroke="currentColor" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M8.69727 2.42078C9.0881 3.81494 10.1789 4.90578 11.5789 5.30244" stroke="currentColor" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> </svg>
			<p>ویرایش اطلاعات</p>
		</a>
		</div>
		<div class="badge_gray space_between">
		<p><?php echo esc_html($full_name); ?></p>
		<p class="font_semibold"><?php echo $phone ? esc_html_e($phone) : '<a href=" '.esc_url( wc_get_endpoint_url( 'edit-account' ) ).' " >'.__('اضافه کردن شماره موبایل','woodmartplus').'</a>'; ?></p>
		</div>
	</div>
	<!-- wc_logout_url() -->
	
	<ul class="dashboard_menu">
		<?php foreach ( $new_menu as $endpoint => $label ) : ?>

			<?php if($endpoint === 'customer-logout'): ?>
				<?php continue ?>
			<?php endif; ?>

			<?php if( !$label ) continue; ?>

			<li class="dashboard_menu__item <?php echo wc_get_account_menu_item_classes( $endpoint ); ?>">
				<div class="gap-x">
					<div class="icon">
					<?php if($endpoint === 'dashboard'): ?>
						<i class="fa-regular fa-house"></i>
					<?php elseif($endpoint === 'orders'): ?>
						<i class="fa-regular fa-box"></i>
					<?php elseif($endpoint === 'downloads'): ?>
						<i class="fa-regular fa-arrow-down-to-line"></i>
					<?php elseif($endpoint === 'edit-address'): ?>
						<i class="fa-regular fa-location-dot"></i>
					<?php elseif($endpoint === 'edit-account'): ?>
						<i class="fa-regular fa-info-circle"></i>
					<?php elseif($endpoint === 'offers'): ?>
						<i class="fa-regular fa-ticket"></i>
					<?php elseif($endpoint === 'notifications'): ?>
						<i class="fa-regular fa-bell"></i>
					<?php elseif($endpoint === 'tickets'): ?>
						<i class="fa-regular fa-ballot-check"></i>
					<?php elseif($endpoint === 'wishlist'): ?>
						<i class="fa-regular fa-heart"></i>
					<?php endif; ?>
					</div>
					<p><a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>"><?php echo esc_html( $label ); ?></a></p>
				</div>
				<div class="arrow_button">
					<i class="fa-regular fa-arrow-left"></i>
            	</div>
			</li>
			
		<?php endforeach; ?>
	</ul>
	<a href="<?php echo wc_logout_url(); ?>" class="btn solid medium"><?php esc_html_e('logout','woodmartplus'); ?></a>

<?php do_action( 'woocommerce_after_account_navigation' ); ?>
