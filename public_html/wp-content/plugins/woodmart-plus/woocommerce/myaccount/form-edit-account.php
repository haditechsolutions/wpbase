<?php
/**
 * Edit account form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-account.php.
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
$user_id = get_current_user_id();
$attachment_id = get_user_meta( $user_id, '_acount_image', true );
$original_image_url = wp_get_attachment_url( $attachment_id );

$note = __('Complete your information' , 'woodmartplus');
// __('اضافه کردن شماره موبایل','woodmartplus')
$phone = get_user_meta($user->ID, '_wplus_phone',true) ? get_user_meta($user_id, '_wplus_phone',true) : null ;

if( is_null( $phone ) )
{
	$phone = get_user_meta($user->ID,'digits_phone_no',true) ?  get_user_meta($user->ID,'digits_phone_no',true) : null;
}


wp_enqueue_media(); 
wp_print_media_templates();



do_action( 'woocommerce_before_edit_account_form' ); ?>
<div class="white_card">
	<div class="card_header">
		<div class="title">
			<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
			<path d="M16.6287 19.8182C15.8221 20.0565 14.8687 20.1665 13.7504 20.1665H8.2504C7.13207 20.1665 6.17874 20.0565 5.37207 19.8182C5.57374 17.4349 8.02124 15.5557 11.0004 15.5557C13.9796 15.5557 16.4271 17.4349 16.6287 19.8182Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
			<path d="M13.7497 1.83301H8.24967C3.66634 1.83301 1.83301 3.66634 1.83301 8.24967V13.7497C1.83301 17.2147 2.87801 19.1122 5.37134 19.818C5.57301 17.4347 8.02051 15.5555 10.9997 15.5555C13.9788 15.5555 16.4263 17.4347 16.628 19.818C19.1213 19.1122 20.1663 17.2147 20.1663 13.7497V8.24967C20.1663 3.66634 18.333 1.83301 13.7497 1.83301ZM10.9997 12.9888C9.18467 12.9888 7.71801 11.513 7.71801 9.69802C7.71801 7.88302 9.18467 6.41634 10.9997 6.41634C12.8147 6.41634 14.2813 7.88302 14.2813 9.69802C14.2813 11.513 12.8147 12.9888 10.9997 12.9888Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
			<path d="M14.2821 9.69867C14.2821 11.5137 12.8154 12.9895 11.0004 12.9895C9.18542 12.9895 7.71875 11.5137 7.71875 9.69867C7.71875 7.88367 9.18542 6.41699 11.0004 6.41699C12.8154 6.41699 14.2821 7.88367 14.2821 9.69867Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
			</svg>
			<p><?php esc_html_e('اطلاعات کاربری'); ?></p>
		</div>
		<hr>
	</div>

	<form class="gap-y-3 woocommerce-EditAccountForm edit-account" action="" method="post" <?php do_action( 'woocommerce_edit_account_form_tag' ); ?> >

		<?php do_action( 'woocommerce_edit_account_form_start' ); ?>

		<div class="avatar_container">
			<?php if($original_image_url): ?>
			<div class="avatar_image"><img src="<?php echo wp_get_attachment_image_url($attachment_id,'full'); ?>" alt="user avatar"></div>
			<input type="hidden" name="image"  class="upload_image_id" value="<?php echo $attachment_id ?>" />
			<div class="avatar_body">
				<button  class="upload-image-button btn_gray small outline"><?= esc_html__('Edit Image','woodmartplus'); ?></button>
			</div>
			<?php else: ?>
			<div class="avatar_image"><img src="<?php echo WOODPLUS_ASSET . 'img/' ?>user.svg" alt="user avatar"></div>
			<input type="hidden" name="image" id="" class="upload_image_id" value="" />
			<div class="avatar_body">
				<button  class="upload-image-button btn_gray small outline"><?= esc_html__('Add Image','woodmartplus'); ?></button>
			</div>
			<?php endif; ?>
		</div>

		<div class="items_container--2">
			<div class="solid_input">
				<label for="account_first_name"><?php esc_html_e( 'First name', 'woocommerce' ); ?>&nbsp;<span class="required text_danger">*</span></label>
				<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_first_name" id="account_first_name" autocomplete="given-name" value="<?php echo esc_attr( $user->first_name ); ?>" />
			</div>
			<div class="solid_input">
				<label for="account_last_name"><?php esc_html_e( 'Last name', 'woocommerce' ); ?>&nbsp;<span class="required text_danger">*</span></label>
				<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_last_name" id="account_last_name" autocomplete="family-name" value="<?php echo esc_attr( $user->last_name ); ?>" />
			</div>
		</div>
		<div class="items_container--2">
			<p class="solid_input">
				<label for="account_display_name"><?php esc_html_e( 'Display name', 'woocommerce' ); ?>&nbsp;<span class="required text_danger">*</span></label>
				<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_display_name" id="account_display_name" value="<?php echo esc_attr( $user->display_name ); ?>" /> <span><em><?php esc_html_e( 'This will be how your name will be displayed in the account section and in reviews', 'woocommerce' ); ?></em></span>
			</p>
			<p class="solid_input">
				<label for="account_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?>&nbsp;<span class="required text_danger">*</span></label>
				<input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="account_email" id="account_email" autocomplete="email" value="<?php echo esc_attr( $user->user_email ); ?>" />
			</p>
		</div>
		<div class="items_container--1">
			<p class="solid_input">
				<label for="account_display_phone"><?php esc_html_e( 'Phone Numbber', 'woodmartplus' ); ?>&nbsp;<span class="required text_danger">*</span></label>
				<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_display_phone" id="account_display_phone" value="<?php echo !is_null( $phone ) ? esc_attr($phone) : __('اضافه کردن شماره موبایل','woodmartplus') ?>" />
			</p>
		</div>
		<div class="badge_gray gap-y-3">
				<p class="text_gray">
					<span class="text_black">
					<?php esc_html_e( 'Password change', 'woocommerce' ); ?>
					</span>
				</p>
				
				<div class="solid_input">
					<label for="password_current"><?php esc_html_e( 'Current password (leave blank to leave unchanged)', 'woocommerce' ); ?></label>
					<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_current" id="password_current" autocomplete="off" />
				</div>
				<div class="solid_input">
					<label for="password_1"><?php esc_html_e( 'New password (leave blank to leave unchanged)', 'woocommerce' ); ?></label>
					<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_1" id="password_1" autocomplete="off" />
				</div>
				<div class="solid_input">
					<label for="password_2"><?php esc_html_e( 'Confirm new password', 'woocommerce' ); ?></label>
					<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_2" id="password_2" autocomplete="off" />
				</div>
		</div>

		<?php do_action( 'woocommerce_edit_account_form' ); ?>

		<div class="justify_start">
			<?php wp_nonce_field( 'save_account_details', 'save-account-details-nonce' ); ?>
			<button type="submit" class="btn solid medium<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="save_account_details" value="<?php esc_attr_e( 'Save changes', 'woocommerce' ); ?>"><?php esc_html_e( 'Save changes', 'woocommerce' ); ?></button>
			<input type="hidden" name="action" value="save_account_details" />
		</div>

		<?php do_action( 'woocommerce_edit_account_form_end' ); ?>
	</form>
</div>
<script src="<?php echo WOODPLUS_ASSET ?>js/media-upload.js" ></script>
<?php do_action( 'woocommerce_after_edit_account_form' ); ?>
