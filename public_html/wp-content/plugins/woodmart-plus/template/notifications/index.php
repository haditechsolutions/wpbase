
<div class="white_card">
   <div class="card_header">
      <div class="title">
         <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
            <path d="M11.018 2.66748C7.98388 2.66748 5.51805 5.13331 5.51805 8.16748V10.8166C5.51805 11.3758 5.27971 12.2283 4.99555 12.705L3.94138 14.4558C3.29055 15.5375 3.73971 16.7383 4.93138 17.1416C8.88221 18.4616 13.1447 18.4616 17.0955 17.1416C18.2047 16.775 18.6905 15.4641 18.0855 14.4558L17.0314 12.705C16.7564 12.2283 16.518 11.3758 16.518 10.8166V8.16748C16.518 5.14248 14.043 2.66748 11.018 2.66748Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"></path>
            <path d="M12.7139 2.93332C12.4298 2.85082 12.1364 2.78665 11.8339 2.74999C10.9539 2.63999 10.1106 2.70415 9.32227 2.93332C9.5881 2.25499 10.2481 1.77832 11.0181 1.77832C11.7881 1.77832 12.4481 2.25499 12.7139 2.93332Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M13.7686 17.4717C13.7686 18.9842 12.5311 20.2217 11.0186 20.2217C10.2669 20.2217 9.57022 19.91 9.07522 19.415C8.58022 18.92 8.26855 18.2233 8.26855 17.4717" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"></path>
         </svg>
         <p>لیست اعلانات من</p>
      </div>
      <hr>
   </div>
   <!-- اعلان ها -->
   <?php foreach( $notifications as $key => $notification ): ?>
   <div class="outline_card--border_row">
      <div class="item gap-y-2">
         <div class="space_between">
            <p><?php echo esc_html( $notification['title_notif'] ); ?></p>
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
               <p class="text_sm"><?php echo esc_html( wplus_helper::date_to_garegorian($notification['date_create_notification']) ); ?></p>
            </div>
         </div>
         <p class="text_gray">
            <?php echo esc_html( $notification['description'] ); ?>
         </p>
      </div>
      <div class="item justify_end">
         <a href="<?php echo esc_url( add_query_arg(['show_notification' => $key]) ); ?>" class="btn solid small">
         <?php esc_html_e('Show more','woodmartplus'); ?>
         </a>
      </div>
   </div>
   <?php endforeach; ?>
</div>