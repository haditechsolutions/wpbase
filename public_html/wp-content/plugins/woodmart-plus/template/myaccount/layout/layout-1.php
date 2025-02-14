
<?php if( isset( $_GET['action_register'] ) && !empty( $_GET['action_register'] ) && 'register' === $_GET['action_register'] ): ?>

<div class="all_center">
   <div class="login_container">
      
      <div class="white_card ">
         <div class="text_center">
            <img src="<?php echo wplus_helper::get_logo_login_register(); ?>" alt="logo" />
         </div>
         <div class="alert" style="display:none" >
            <div class="gap-x">
               <svg xmlns="http://www.w3.org/2000/svg" width="22" height="23" viewBox="0 0 22 23" fill="none">
                  <path d="M11 7.60417V12.4167" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M19.3234 8.36503V14.635C19.3234 15.6617 18.7733 16.615 17.8842 17.1375L12.4392 20.2817C11.55 20.795 10.45 20.795 9.55166 20.2817L4.10665 17.1375C3.21749 16.6242 2.66748 15.6708 2.66748 14.635V8.36503C2.66748 7.33836 3.21749 6.38499 4.10665 5.86249L9.55166 2.71833C10.4408 2.20499 11.5408 2.20499 12.4392 2.71833L17.8842 5.86249C18.7733 6.38499 19.3234 7.32919 19.3234 8.36503Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M11 15.35V15.4417" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
               </svg>
               <p></p>
            </div>
         </div>
         <h2 class="text_center"> <?php esc_html_e('Register','woodmartplus') ?> </h2>
         <form class="gap-y-2 aramis_register_form" method="POST" action="/">
            
            <div class="solid_input">
               <label class="gap-x">
                  <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                     <path d="M9 16.5C13.125 16.5 16.5 13.125 16.5 9C16.5 4.875 13.125 1.5 9 1.5C4.875 1.5 1.5 4.875 1.5 9C1.5 13.125 4.875 16.5 9 16.5Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                     <path d="M9 6V9.75" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                     <path d="M8.99588 12H9.00262" stroke="#292D32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                  <?php esc_html_e('Phone Number','woodmartplus'); ?> <span class="text_danger">*</span>
               </label>
               <div class="input_container">
                  <input type="text"  placeholder="شماره موبایل خود را وارد کنید" name="phone"/>
                  <span class="btn_clear" disabled>
                  <svg fill="#5e5e5b" width="18px" height="18px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
<circle cx="12" cy="6" r="4" stroke="#1C274C" stroke-width="1.5"></circle>
<path d="M20 17.5C20 19.9853 20 22 12 22C4 22 4 19.9853 4 17.5C4 15.0147 7.58172 13 12 13C16.4183 13 20 15.0147 20 17.5Z" stroke="#1C274C" stroke-width="1.5"></path>
</svg>
                  </span>
               </div>
            </div>
            <?php wp_nonce_field('woodplus_form_register', 'nonce_woodplus_register');  ?>
            <button type="submit" class="btn solid medium font_semibold">
            ثبت نام
            </button>
         </form>
         <form class="gap-y-2 verify_otp verify_otp_all" style="display: none;">
            <div class="gap-x">
               <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                  <path d="M6.375 14.25H6C3 14.25 1.5 13.5 1.5 9.75V6C1.5 3 3 1.5 6 1.5H12C15 1.5 16.5 3 16.5 6V9.75C16.5 12.75 15 14.25 12 14.25H11.625C11.3925 14.25 11.1675 14.3625 11.025 14.55L9.9 16.05C9.405 16.71 8.595 16.71 8.1 16.05L6.975 14.55C6.855 14.385 6.5775 14.25 6.375 14.25Z" stroke="#5E5E5E" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                  <path d="M11.9973 8.25H12.0041" stroke="#5E5E5E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                  <path d="M8.99661 8.25H9.00335" stroke="#5E5E5E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                  <path d="M5.99588 8.25H6.00262" stroke="#292D32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
               </svg>
               <p class="msg_detail_number">
               </p>
            </div>
            <div class="items_container--<?php echo $number_digits ?>" style="direction: ltr;">
               <?php for($i=0; $number_digits > $i ; $i++):  ?>
               <div class="solid_input">
                  <input type="text" class="phone_validate" autocomplete="off" maxlength="1"  name="otp[]" required>
               </div>
               <?php endfor; ?>
               <input type="hidden" class="phone_number" data-phone_number>
            </div>
            <div class="space_between">
               <p><?php esc_html_e('remaining time','woodmartplus'); ?>: <span class="time_resend"></span></p>
               <button type="button" class="text_blue edit_number">
               <?php esc_html_e('Edit Number','woodmartplus'); ?>
               </button>
            </div>
            <?php wp_nonce_field('_form_verify_otp', 'nonce_verify_otp');  ?>
            <button type="submit" class="btn solid medium font_semibold">
            <?php esc_html_e('Register','woodmartplus') ?>
            </button>
         </form>
         <div class="detail_register">
            <p class="text_center">
               حساب دارید؟ <a href="<?php echo esc_url(wc_get_endpoint_url('my-account')); ?>" class="text_blue font_semibold">وارد شوید</a>.
            </p>
            <p class="text_darkgray">
               با ورود و یا ثبت نام در سایت شما <a href="#" class="link_primary">شرایط و قوانین</a> استفاده از سرویس های سایت و <a href="#" class="link_primary">قوانین حریم خصوصی</a> آن را می‌پذیرید.
            </p>
         </div>
      </div>
   </div>
</div>    

<?php else: ?>

<main class="all_center">
   <div class="login_container">
      <div class="white_card">
         <div class="text_center">
            <img src="<?php echo wplus_helper::get_logo_login_register(); ?>" alt="logo" />
         </div>
         <div class="alert" style="display:none" >
            <div class="gap-x">
               <svg xmlns="http://www.w3.org/2000/svg" width="22" height="23" viewBox="0 0 22 23" fill="none">
                  <path d="M11 7.60417V12.4167" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M19.3234 8.36503V14.635C19.3234 15.6617 18.7733 16.615 17.8842 17.1375L12.4392 20.2817C11.55 20.795 10.45 20.795 9.55166 20.2817L4.10665 17.1375C3.21749 16.6242 2.66748 15.6708 2.66748 14.635V8.36503C2.66748 7.33836 3.21749 6.38499 4.10665 5.86249L9.55166 2.71833C10.4408 2.20499 11.5408 2.20499 12.4392 2.71833L17.8842 5.86249C18.7733 6.38499 19.3234 7.32919 19.3234 8.36503Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M11 15.35V15.4417" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
               </svg>
               <p></p>
            </div>
         </div>
         <div class="parrent_aramis_login">
            <h2 class="text_center"> <?php esc_html_e('Login','woodmartplus'); ?> </h2>
            <form class="gap-y-2 aramis_login" method="post">

               <div class="solid_input">
                  <label for="txtPassword" class="gap-x">
                     <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                        <path d="M4.5 7.5V6C4.5 3.5175 5.25 1.5 9 1.5C12.75 1.5 13.5 3.5175 13.5 6V7.5" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12.75 16.5H5.25C2.25 16.5 1.5 15.75 1.5 12.75V11.25C1.5 8.25 2.25 7.5 5.25 7.5H12.75C15.75 7.5 16.5 8.25 16.5 11.25V12.75C16.5 15.75 15.75 16.5 12.75 16.5Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M11.9973 12H12.0041" stroke="#292D32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M8.99661 12H9.00335" stroke="#292D32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M5.99588 12H6.00262" stroke="#292D32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                     </svg>
                     <?php esc_html_e('Phone Number','woodmartplus') ?> <span class="text_danger">*</span>
                  </label>
                  <div class="input_container">
                     <input type="text" id="txtPassword" placeholder="<?php esc_html_e('Phone Number','woodmartplus') ?>" name="phone_login" />
                     <span class="btn_clear">
                     <svg xmlns="http://www.w3.org/2000/svg" fill="#000000" width="18px" height="18px" viewBox="0 0 32 32" id="icon">
  <defs>
    <style>
      .cls-1 {
        fill: none;
      }
    </style>
  </defs>
  <path d="M21,2a8.9977,8.9977,0,0,0-8.6119,11.6118L2,24v6H8L18.3881,19.6118A9,9,0,1,0,21,2Zm0,16a7.0125,7.0125,0,0,1-2.0322-.3022L17.821,17.35l-.8472.8472-3.1811,3.1812L12.4141,20,11,21.4141l1.3787,1.3786-1.5859,1.586L9.4141,23,8,24.4141l1.3787,1.3786L7.1716,28H4V24.8284l9.8023-9.8023.8472-.8474-.3473-1.1467A7,7,0,1,1,21,18Z"/>
  <circle cx="22" cy="10" r="2"/>
  <rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32"/>
</svg>
                     </span>
                  </div>
               </div>
               <div class="space_between">
                  <div class="gap-x">
                     <input type="checkbox" id="checkRemember" name="checkRemember" />
                     <label for="checkRemember"><?php esc_html_e('Remember me','woodmartplus'); ?></label>
                  </div>
                  <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>" class="text_blue">
                  <?php esc_html_e('Lost your password?','woodmartplus'); ?>
                  </a>
               </div>
               <?php 
                  wp_nonce_field('form_login_register', 'nonce_login_register'); 
                  ?>
               <button type="submit" class="btn solid medium font_semibold">
               <?php esc_html_e('Login','woodmartplus'); ?>
               </button>
            </form>
            
            <p class="text_center">
               <?php echo sprintf(__('حساب کاربری ندارید ؟ <a href="%s" class="text_blue font_semibold">همین حالا ثبت نام کنید</a>'),esc_url(add_query_arg(['action_register' => 'register']))); ?>
            </p>
            <p class="text_darkgray">
               با ورود و یا ثبت نام در سایت شما <a href="<?php echo wplus_helper::get_page_by_id('') ? esc_url( wplus_helper::get_page_by_id() ) : '#' ?>" target="_blank" class="link_primary">شرایط و قوانین</a> استفاده از سرویس های سایت و <a href="<?php echo wplus_helper::get_page_by_id('') ? esc_url( wplus_helper::get_page_by_id() ) : '#' ?>" target="_blank" class="link_primary">قوانین حریم خصوصی</a> آن را می‌پذیرید.
            </p>
         </div>
         <div class="verify_otp_login" style="display:none">
            <h2 class="text_center"> ورود </h2>
            <form class="gap-y-2 verify_otp_login_form verify_otp_all">
               <div class="gap-x">
                  <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                     <path d="M6.375 14.25H6C3 14.25 1.5 13.5 1.5 9.75V6C1.5 3 3 1.5 6 1.5H12C15 1.5 16.5 3 16.5 6V9.75C16.5 12.75 15 14.25 12 14.25H11.625C11.3925 14.25 11.1675 14.3625 11.025 14.55L9.9 16.05C9.405 16.71 8.595 16.71 8.1 16.05L6.975 14.55C6.855 14.385 6.5775 14.25 6.375 14.25Z" stroke="#5E5E5E" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                     <path d="M11.9973 8.25H12.0041" stroke="#5E5E5E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                     <path d="M8.99661 8.25H9.00335" stroke="#5E5E5E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                     <path d="M5.99588 8.25H6.00262" stroke="#292D32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                  <p class="msg_detail_number">
                  </p>
               </div>
               <div class="items_container--<?php echo $number_digits ?>" style="direction:ltr;">
                  <?php for($i=0; $number_digits > $i ; $i++):  ?>
                  <div class="solid_input">
                     <input type="text" class="phone_validate" maxlength="1" name="otp[]" required >
                  </div>
                  <?php endfor; ?>
                  <input type="hidden" class="phone_number"  data-phone_number>
               </div>
               <div class="space_between">
                  <p>زمان باقی مانده: <span class="time_resend"></span></p>
                  <button type="button" class="text_blue edit_number">
                  ویرایش شماره
                  </button>
               </div>
               <?php wp_nonce_field('_form_verify_otp_login', 'nonce_verify_otp_login');  ?>
               <button type="submit" class="btn solid medium font_semibold">
               ورود
               </button>
            </form>
         </div>
      </div>
   </div>
</main>

<?php endif; ?>
