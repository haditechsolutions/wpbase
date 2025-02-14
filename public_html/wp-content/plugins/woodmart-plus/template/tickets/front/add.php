<?php defined( 'ABSPATH' ) || exit; wp_enqueue_script('woodmartplus-media-core'); wp_enqueue_media(); ?>

<div class="white_card--border_row edit-account">
   <div class="item">
      <div class="gap-x">
         <a href="<?php echo esc_url( wc_get_endpoint_url( 'tickets' ) ); ?>" class="btn link">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
               <path d="M5.25005 2.38L9.05338 6.18333C9.50255 6.6325 9.50255 7.36749 9.05338 7.81666L5.25005 11.62" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <p><?php esc_html_e('Back','woodmartplus'); ?></p>
         </a>
      </div>
   </div>
   <div class="item gap-y-3">
      <div class="card_header">
         <div class="title">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
               <path d="M14.6663 1.83398H7.33301C3.66634 1.83398 1.83301 3.66732 1.83301 7.33398V19.2507C1.83301 19.7548 2.24551 20.1673 2.74967 20.1673H14.6663C18.333 20.1673 20.1663 18.334 20.1663 14.6673V7.33398C20.1663 3.66732 18.333 1.83398 14.6663 1.83398Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
               <path d="M6.41699 8.70898H15.5837" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
               <path d="M6.41699 13.293H12.8337" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <p><?php esc_html_e('Send a new ticket','woodmartplus'); ?></p>
         </div>
         <hr />
      </div>
      <?php if($before_send_text): ?>
      <div class="gap-y">
         <p class="text_black">
            <?php esc_html_e('Please read the text below before sending a ticket.','woodmartplus'); ?>
         </p>
         <p class="text_darkgray">
            <?php  echo esc_html( $before_send_text ); ?>
         </p>
      </div>
      <?php endif; ?>
      <?php if( $how_tosend_text ): ?>
      <div class="gap-y-2">
         <div class="accordion_container accordion_notice_container">
            <button type="button" class="accordion_button">
               <div class="accordion_button__text">
                  <i class="fa-light fa-arrow-circle-left"></i>
                  <p><?php esc_html_e('How to send?','woodmartplus'); ?></p>
               </div>
               <div class="accordion_button__icon">
                  <i class="text_danger fa-light fa-minus"></i>
                  <i class="text_danger fa-light fa-plus"></i>
               </div>
            </button>
            <ul class="accordion_notice__contents">
               <p>
                  <?php echo esc_html( $how_tosend_text ); ?>
               </p>
            </ul>
         </div>
      </div>
      <?php endif; ?>
   </div>
   <div class="item">
      <div class="gap-y-3">
         <p class="text_black"><?php esc_html_e('Send a new ticket','woodmartplus'); ?></p>
         <form class="add_ticket__form" action="" method="POST">
            <div class="solid_input">
               <label for="txtTicketTitle"><?php esc_html_e('Subject','woodmartplus'); ?> <span class="text_danger">*</span></label>
               <input type="text" id="txtTicketTitle" name="ticket_title" placeholder="<?php esc_html_e('Your ticket subject','woodmartplus'); ?>" />
            </div>
            <div class="items_container--2">
               <div class="solid_input">
                  <label for="sltTicketCategory"><?php esc_html_e('Departman','woodmartplus'); ?><span class="text_danger">*</span></label>

                  <select name="departeman" class="select_departeman">
                     <?php foreach($departemans as $key => $departeman): ?>
                        <option value="<?php echo esc_attr($key); ?>"><?php echo esc_html($departeman); ?></option>
                     <?php endforeach; ?>
                     <option value="departeman_order"><?php esc_html_e('سفارش','woodmartplus'); ?></option>
                  </select>
               </div>
               <div class="solid_input">
                  <label for="sltTicketPriority"><?php esc_html_e('Priority','woodmartplus'); ?><span class="text_danger">*</span></label>
                  <select name="wplus_ticket_priority" id="">
                     <?php foreach($priorities as $key => $priority): ?>
                        <option value="<?php echo esc_attr($key); ?>"><?php echo esc_html($priority); ?></option>
                     <?php endforeach; ?>
                  </select>
               </div>
            </div>
            <div class="solid_input ticket_product_selected">
               <label for="sltTicketProduct"><?php esc_html_e('Orders','woodmartplus'); ?><span class="text_danger">*</span></label>

               <select name="ticket_customer_product" id="" >
                  <?php foreach($orders as $order): ?>
                     <option value="<?php echo esc_attr($order['id']) ?>">
                           <?php echo sprintf(__('Order %s'),$order['id']); ?>
                     </option>
                  <?php endforeach; ?>
               </select>
            </div>
            <div class="solid_input">
               <label for="txtTicketDescription"><?php esc_html_e('Description','woodmartplus'); ?> <span class="text_danger">*</span></label>
               <textarea rows="5" id="txtTicketDescription" name="ticket_description" placeholder="<?php esc_html_e('Ticket Description','woodmartplus'); ?>"></textarea>
            </div>
            <div class="ticket_images__uploaded">

               <div class="avatar_image">
                  
               </div>

            </div>
            <label for="imageUploader" class="upload_image__button">
               <button type="button" class="upload-image-button" data-multiple="true">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none"> <path d="M13.6997 7.91602C16.6997 8.17435 17.9247 9.71602 17.9247 13.091V13.1993C17.9247 16.9243 16.4331 18.416 12.7081 18.416H7.28307C3.55807 18.416 2.06641 16.9243 2.06641 13.1993V13.091C2.06641 9.74102 3.27474 8.19935 6.22474 7.92435" stroke="#4D4D4D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> <path d="M10 13.0009V3.51758" stroke="#4D4D4D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> <path d="M12.7913 5.37565L9.99967 2.58398L7.20801 5.37565" stroke="#4D4D4D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>
                  <p><?php esc_html_e('Upload Picture','woodmartplus'); ?></p>
               </button>
            </label>
            <div class="justify_end">
               <button type="submit" class="btn solid medium" name="send_ticket">
                  <?php esc_html_e('Send ticket','woodmartplus'); ?>
               </button>
               <!-- <button type="submit" class="btn solid medium">
                  درحال ارسال تیکت
                  </button> -->
               <!-- <button type="submit" class="btn solid medium">
                  تیکت شما ارسال شد
                  </button> -->
            </div>
         </form>
      </div>
   </div>
</div>
<script src="<?php echo WOODPLUS_ASSET ?>js/media-upload.js" ></script>