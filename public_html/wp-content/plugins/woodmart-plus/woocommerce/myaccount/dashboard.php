<?php


if (! defined('ABSPATH')) {
   exit; // Exit if accessed directly.
}

$allowed_html = array(
   'a' => array(
      'href' => array(),
   ),
);




$ticket = new wplus_ticket();

$note = __('Complete your information', 'woodmartplus');

$user_id = get_current_user_id();
$last_name = get_user_meta($user_id, 'last_name', true) ? get_user_meta($user_id, 'last_name', true) : $note;
$first_name = get_user_meta($user_id, 'first_name', true) ? get_user_meta($user_id, 'first_name', true) : $note;



$phone = get_user_meta($user_id, '_wplus_phone', true) ? get_user_meta($user_id, '_wplus_phone', true) : $note;

if (! wc_ship_to_billing_address_only() && wc_shipping_enabled()) {
   $get_addresses = apply_filters(
      'woocommerce_my_account_get_addresses',
      array(
         'billing'  => __('Billing address', 'woocommerce'),
         'shipping' => __('Shipping address', 'woocommerce'),
      ),
      $user_id
   );
} else {
   $get_addresses = apply_filters(
      'woocommerce_my_account_get_addresses',
      array(
         'billing' => __('Billing address', 'woocommerce'),
      ),
      $user_id
   );
}

?>
<?php if (!wplus_helper::is_user_completed_information()): ?>
   <div class="white_card">
      <div class="main_dashboard__head">
         <p class="text_gray">
            <span class="text_danger"><?php esc_html_e('Attention', 'woodmartplus') ?>:</span>
            <?php esc_html_e('To increase the security of your account, please complete your profile', 'woodmartplus'); ?>
         </p>
         <div class="justify_end">
            <a href="<?php echo esc_url(wc_get_endpoint_url('edit-account')); ?>" class="link_primary"><?php esc_html_e('Complete information', 'woodmartplus'); ?></a>
         </div>
      </div>
   </div>
<?php endif; ?>
<?php do_action('load_slider_template'); ?>
<div class="items_container--3">
   <div class="box_with__icon link">
      <div class="box_right">
         <div class="icon_container blue">
            <i class="ordericonshoping"></i>
         </div>
         <div class="box_right__text">

            <p class="text_darkgray">
               <?php $html_ = __('<a href="%s" > order </a> <span class="text_danger">%s</span>', 'woodmartplus'); ?>
               <?php

               printf(
                  $html_,
                  esc_url(wc_get_endpoint_url('orders')),
                  esc_html(wplus_helper::get_total_compressed_order())
               );
               ?>
            </p>
            <p class="text_gray"><?php esc_html_e('Complated', 'woodmartplus'); ?></p>
         </div>
      </div>
      <a href="<?php echo esc_url(wc_get_endpoint_url('orders')); ?>" class="box_left">
         <i class="fa-regular fa-arrow-left"></i>
      </a>
   </div>
   <div class="box_with__icon link">
      <div class="box_right">
         <div class="icon_container green">
            <i class="fa-regular fa-basket-shopping"></i>
         </div>
         <div class="box_right__text">
            <p class="text_darkgray">
               <?php
               $html_2 = __('Total <span class="text_danger">%s</span>', 'woodmartplus');

               printf($html_2, wplus_helper::get_total_price_completed());
               ?>
            </p>
            <p class="text_gray"><?php esc_html_e('Order', 'woodmartplus'); ?></p>
         </div>
      </div>

   </div>
   <div class="box_with__icon link">
      <div class="box_right">
         <div class="icon_container red">
            <i class="fa-regular fa-b"></i>
         </div>
         <div class="box_right__text">
            <p class="text_darkgray">
               <?php

               $html_3 = __('<a href="%s" >Ticket</a> <span class="text_danger">%s</span> ', 'woodmartplus');
               printf(
                  $html_3,
                  esc_url(wc_get_endpoint_url('tickets')),
                  $ticket->ticket_count('open') ? count($ticket->ticket_count('open')) : 0
               );
               ?>
            </p>
            <p class="text_gray"><?php esc_html_e('open', 'woodmartplus'); ?></p>
         </div>
      </div>
      <a href="<?php echo esc_url(wc_get_endpoint_url('tickets')); ?>" class="box_left">
         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path d="M9.57 5.92993L3.5 11.9999L9.57 18.0699" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M20.4999 12H3.66992" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
         </svg>
      </a>
   </div>
</div>

<div class="items_container--2">
   <!-- کد های تخفیف -->
   <?php if (wplus_helper::get_setting('enable_offer_data')) : ?>
      <div class="white_card">
         <div class="card_header">
            <div class="title">
               <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                  <path d="M17.8747 11.4583C17.8747 10.1933 18.9013 9.16663 20.1663 9.16663V8.24996C20.1663 4.58329 19.2497 3.66663 15.583 3.66663H6.41634C2.74967 3.66663 1.83301 4.58329 1.83301 8.24996V8.70829C3.09801 8.70829 4.12467 9.73496 4.12467 11C4.12467 12.265 3.09801 13.2916 1.83301 13.2916V13.75C1.83301 17.4166 2.74967 18.3333 6.41634 18.3333H15.583C19.2497 18.3333 20.1663 17.4166 20.1663 13.75C18.9013 13.75 17.8747 12.7233 17.8747 11.4583Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                  <path d="M8.25 13.5209L13.75 8.02087" stroke="#4D4D4D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                  <path d="M13.7453 13.5208H13.7535" stroke="#4D4D4D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                  <path d="M8.24529 8.47921H8.25352" stroke="#292D32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
               </svg>
               <p><?php esc_html_e('Discount Code', 'woodmartplus') ?></p>
            </div>
            <hr>
            <a href="<?php echo esc_url(wc_get_endpoint_url('offers'));  ?>" class="btn link_primary">
               <p><?php esc_html_e('More', 'woodmartplus') ?></p>
               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                  <path d="M6.37967 3.95337L2.33301 8.00004L6.37967 12.0467" stroke="currentColor" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                  <path d="M13.6663 8H2.44629" stroke="currentColor" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
               </svg>
            </a>
         </div>

         <?php foreach (wplus_helper::get_offers() as $key => $value): ?>
            <div class="outline_card">
               <div class="space_between">
                  <p><a href="<?php echo esc_url(wc_get_endpoint_url('offers') . '?show_offer=' . $key); ?>" target="_blank"><?php echo isset($value['title_coupon']) ? esc_html($value['title_coupon']) : '' ?></a></p>
                  <div class="badge_gray--oneline">

                     <button type="button" class="btn_copy__code">
                        <div class="status"><?php esc_html_e('Copy code', 'woodmartplus'); ?></div>
                        <div class="box">
                           <i class="fa-regular fa-copy"></i>
                           <p class="content"><?php echo isset($value['coupon_code']) ? esc_html($value['coupon_code']) : ''; ?></p>
                        </div>
                     </button>

                  </div>
               </div>
               <p class="text_gray">
                  <?php
                  $small = substr($value['description'], 0, 150);
                  echo esc_html($small . '...');
                  ?>
               </p>
            </div>
         <?php endforeach; ?>

      </div>
   <?php endif; ?>
   <!-- آخرین اعلانات -->
   <?php if (wplus_helper::get_setting('enable_notif_data')): ?>
      <div class="white_card">
         <div class="card_header">
            <div class="title">
               <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                  <path d="M11.018 2.66748C7.98388 2.66748 5.51805 5.13331 5.51805 8.16748V10.8166C5.51805 11.3758 5.27971 12.2283 4.99555 12.705L3.94138 14.4558C3.29055 15.5375 3.73971 16.7383 4.93138 17.1416C8.88221 18.4616 13.1447 18.4616 17.0955 17.1416C18.2047 16.775 18.6905 15.4641 18.0855 14.4558L17.0314 12.705C16.7564 12.2283 16.518 11.3758 16.518 10.8166V8.16748C16.518 5.14248 14.043 2.66748 11.018 2.66748Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"></path>
                  <path d="M12.7139 2.93332C12.4298 2.85082 12.1364 2.78665 11.8339 2.74999C10.9539 2.63999 10.1106 2.70415 9.32227 2.93332C9.5881 2.25499 10.2481 1.77832 11.0181 1.77832C11.7881 1.77832 12.4481 2.25499 12.7139 2.93332Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                  <path d="M13.7686 17.4717C13.7686 18.9842 12.5311 20.2217 11.0186 20.2217C10.2669 20.2217 9.57022 19.91 9.07522 19.415C8.58022 18.92 8.26855 18.2233 8.26855 17.4717" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"></path>
               </svg>
               <p><?php esc_html_e('Last Notification', 'woodmartplus'); ?></p>
            </div>
            <hr>
            <a href="<?php echo esc_url(wc_get_endpoint_url('notifications')); ?>" class="btn link_primary">
               <p><?php esc_html_e('See All Notification', 'woodmartplus'); ?></p>
               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                  <path d="M6.37967 3.95337L2.33301 8.00004L6.37967 12.0467" stroke="currentColor" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                  <path d="M13.6663 8H2.44629" stroke="currentColor" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
               </svg>
            </a>
         </div>
         <?php foreach (wplus_helper::get_notifs() as $key => $value):  ?>
            <div class="outline_card">
               <div class="space_between">
                  <p><a href="<?php echo esc_url(wc_get_endpoint_url('notifications') . '?show_notification=' . $key); ?>" target="_blank"><?php echo isset($value['title_notif']) ? esc_html($value['title_notif']) : ''; ?></a></p>
                  <div class="badge_gray--oneline">
                     <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
                        <path d="M6.66699 2.16663V4.66663" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M13.333 2.16663V4.66663" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M2.91699 8.07495H17.0837" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M17.5 7.58329V14.6666C17.5 17.1666 16.25 18.8333 13.3333 18.8333H6.66667C3.75 18.8333 2.5 17.1666 2.5 14.6666V7.58329C2.5 5.08329 3.75 3.41663 6.66667 3.41663H13.3333C16.25 3.41663 17.5 5.08329 17.5 7.58329Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M13.0791 11.9167H13.0866" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M13.0791 14.4167H13.0866" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M9.99607 11.9167H10.0036" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M9.99607 14.4167H10.0036" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M6.91209 11.9167H6.91957" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M6.91209 14.4167H6.91957" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                     </svg>
                     <p><?php echo isset($value['date_create_notification']) ?  wplus_helper::date_to_garegorian($value['date_create_notification']) : ''; ?></p>
                  </div>
               </div>
               <p class="text_gray">
                  <?php
                  $small = substr($value['description'], 0, 150);

                  echo esc_html($small . '...');
                  ?>
               </p>
            </div>
         <?php endforeach; ?>

      </div>
   <?php endif; ?>
   <!-- اطلاعات شما -->
   <div class="white_card">
      <div class="card_header">
         <div class="title">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
               <path d="M10.9997 20.1666C16.0413 20.1666 20.1663 16.0416 20.1663 10.9999C20.1663 5.95825 16.0413 1.83325 10.9997 1.83325C5.95801 1.83325 1.83301 5.95825 1.83301 10.9999C1.83301 16.0416 5.95801 20.1666 10.9997 20.1666Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
               <path d="M11 7.33325V11.9166" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
               <path d="M10.9951 14.6667H11.0034" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
            <p><?php esc_html_e('Infromation', 'woodmartplus'); ?></p>
         </div>
         <hr>
         <a href="<?php echo esc_url(wc_get_endpoint_url('edit-account')) ?>" class="btn link_primary">
            <p><?php esc_html_e('Edit Information', 'woodmartplus'); ?></p>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
               <path d="M7.33301 1.33325H5.99967C2.66634 1.33325 1.33301 2.66659 1.33301 5.99992V9.99992C1.33301 13.3333 2.66634 14.6666 5.99967 14.6666H9.99967C13.333 14.6666 14.6663 13.3333 14.6663 9.99992V8.66659" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
               <path d="M10.6933 2.01326L5.43992 7.26659C5.23992 7.46659 5.03992 7.85992 4.99992 8.14659L4.71325 10.1533C4.60659 10.8799 5.11992 11.3866 5.84659 11.2866L7.85325 10.9999C8.13325 10.9599 8.52659 10.7599 8.73325 10.5599L13.9866 5.30659C14.8933 4.39992 15.3199 3.34659 13.9866 2.01326C12.6533 0.679924 11.5999 1.10659 10.6933 2.01326Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
               <path d="M9.94043 2.7666C10.3871 4.35993 11.6338 5.6066 13.2338 6.05993" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
         </a>
      </div>
      <div class="outline_card--border_2">
         <div class="item">
            <p class="text_gray"><?php esc_html_e('First name', 'woodmartplus') ?></p>
            <p class="text_darkgray"><?php echo esc_html($first_name) ?></p>
         </div>
         <div class="item">
            <p class="text_gray"><?php esc_html_e('Last name', 'woodmartplus') ?></p>
            <p class="text_darkgray"> <?php echo esc_html($last_name); ?> </p>
         </div>
         <div class="item">
            <p class="text_gray"><?php esc_html_e('phone', 'woodmartplus'); ?></p>
            <p class="text_darkgray"><?php echo esc_html($phone);  ?></p>
         </div>
         <div class="item">
            <p class="text_gray"><?php esc_html_e('Email', 'woodmartplus') ?></p>
            <p class="text_darkgray"><?php echo isset(wp_get_current_user()->user_email) ? wp_get_current_user()->user_email : $note ?></p>
         </div>
      </div>
      <div class="gap-y">
         <div class="space_between">
            <p class="text_gray"><?php esc_html_e('Address', 'woodmartplus'); ?></p>
            <a href="<?php echo esc_url(wc_get_endpoint_url('edit-address')); ?>" class="link_primary"><?php esc_html_e('Edit Address', 'woodmartplus'); ?></a>
         </div>

         <div class="badge_gray gap-y">
            <p><?php esc_html_e('address', 'woodmartplus'); ?></p>
            <?php foreach ($get_addresses as $name => $address_title):
               $address = wc_get_account_formatted_address($name);
            ?>
               <p>

                  <?php
                  echo $address ? wp_kses_post($address) : esc_html_e('You have not set up this type of address yet.', 'woocommerce');
                  ?>
               </p>
            <?php endforeach; ?>
         </div>
      </div>
   </div>
   <!-- آخرین محصولات مشاهده شده -->
   <div class="white_card">
      <?php do_action('woocommerce_load_recenlty_viwed'); ?>
   </div>


</div>