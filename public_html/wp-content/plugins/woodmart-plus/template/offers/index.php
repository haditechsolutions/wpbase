<div class="white_card">
   <div class="card_header">
      <div class="title">
         <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
            <path d="M11.018 2.66748C7.98388 2.66748 5.51805 5.13331 5.51805 8.16748V10.8166C5.51805 11.3758 5.27971 12.2283 4.99555 12.705L3.94138 14.4558C3.29055 15.5375 3.73971 16.7383 4.93138 17.1416C8.88221 18.4616 13.1447 18.4616 17.0955 17.1416C18.2047 16.775 18.6905 15.4641 18.0855 14.4558L17.0314 12.705C16.7564 12.2283 16.518 11.3758 16.518 10.8166V8.16748C16.518 5.14248 14.043 2.66748 11.018 2.66748Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"></path>
            <path d="M12.7139 2.93332C12.4298 2.85082 12.1364 2.78665 11.8339 2.74999C10.9539 2.63999 10.1106 2.70415 9.32227 2.93332C9.5881 2.25499 10.2481 1.77832 11.0181 1.77832C11.7881 1.77832 12.4481 2.25499 12.7139 2.93332Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M13.7686 17.4717C13.7686 18.9842 12.5311 20.2217 11.0186 20.2217C10.2669 20.2217 9.57022 19.91 9.07522 19.415C8.58022 18.92 8.26855 18.2233 8.26855 17.4717" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"></path>
         </svg>
         <p><?php esc_html_e('Offer list','woodmartplus'); ?></p>
      </div>
      <hr>
   </div>
   <!-- اعلان ها -->
   <?php foreach( $offers as $key => $offer ):  ?>
   <div class="outline_card--border_row">
      <div class="item gap-y-2">
         <div class="space_between">
            <p><?php echo esc_html(  $offer['title_coupon'] ) ?></p>
            <a  class="btn_copy__code">
               <div class="status">کپی کردن</div>
               <div class="box">
                  <i class="fa-regular fa-copy"></i>
                  <p class="content"><?php echo esc_html(  $offer['coupon_code'] ) ?></p>
               </div>
            </a>
         </div>
         <p class="text_gray">
            <?php echo esc_html($offer['description']); ?>
         </p>
      </div>
      <div class="item justify_end">
         <a href="<?php echo esc_url( add_query_arg(['show_offer' => $key]) ) ?>" class="btn solid small">
            <?php esc_html_e( 'show more','woodmartplus' ); ?>
         </a>
      </div>
   </div>
  <?php endforeach; ?>
  
</div>