<?php
$email = get_option('new_admin_email');
?>
<div class="item br-bottom p-18">
   <span class="title"><?php esc_html_e('متغییر های ارسال پیامک به همراه ایمیل','woodmartplus'); ?></span>
   <p class="des"><?php esc_html_e('متغییر های خود را تنظیم کنید','woodmartplus'); ?></p>
   <div class="progress-wrapper br-radius-8 m-t-18">
      <div class="progress-content">
         <div class="progress-bar-left">
            <p><?php esc_html_e('Wating resend','woodmartplus') ?></p>
            <div class="inp-rang p-top-18">
               <input type="range" class="rang" min="1" max="120" value="<?php echo wplus_helper::show_value('wating_resend',false) ? wplus_helper::show_value('wating_resend') :  50 ?>" name="<?php echo wplus_helper::generate_option('[wating_resend]'); ?>">
               <div class="br-radius-8 rang-number d-center">
                  <span class="num">1200</span><span class="text-num">ثانیه</span>
               </div>
            </div>
         </div>
         <div class="progress-bar-right">
            <p><?php esc_html_e('Ban time','woodmartplus') ?></p>
            <div class="inp-rang p-top-18">
               <input type="range" class="rang" min="1" max="700" value="<?php echo wplus_helper::show_value('ban_time',false) ? wplus_helper::show_value('ban_time') :  120 ?>"  name="<?php echo wplus_helper::generate_option('[ban_time]'); ?>">
               <div class="br-radius-8 rang-number d-center">
                  <span class="num">1200</span><span class="text-num">ثانیه</span>
               </div>
            </div>
         </div>
      </div>
      <div class="progress-content">
         <div class="progress-bar-left">
            <p><?php esc_html_e('Nummber OTP resend','woodmartplus') ?></p>
            <div class="inp-rang p-top-18">
               <input type="range" class="rang" min="1" max="100" value="<?php echo wplus_helper::show_value('otp_resend',false) ? wplus_helper::show_value('otp_resend') :  50 ?>" name="<?php echo wplus_helper::generate_option('[otp_resend]'); ?>">
               <div class="br-radius-8 rang-number d-center">
                  <span class="num">1200</span><span class="text-num">مرتبه</span>
               </div>
            </div>
         </div>
         <div class="progress-bar-right">
            <p><?php esc_html_e('Expire OTP','woodmartplus') ?></p>
            <div class="inp-rang p-top-18">
               <input type="range" class="rang" min="1" max="120" value="<?php echo wplus_helper::show_value('expire_otp',false) ? wplus_helper::show_value('expire_otp') :  60 ?>" name="<?php echo wplus_helper::generate_option('[expire_otp]'); ?>">
               <div class="br-radius-8 rang-number d-center">
                  <span class="num">120</span><span class="text-num">ثانیه</span>
               </div>
            </div>
         </div>
      </div>
      <div class="progress-content">
         <div class="progress-bar-left">
            <p><?php esc_html_e('Incorrect OTP limit','woodmartplus') ?></p>
            <div class="inp-rang p-top-18">
               <input type="range" class="rang" min="1" max="6" value="<?php echo wplus_helper::show_value('incorretct_otp',false) ? wplus_helper::show_value('incorretct_otp') :  4 ?>" name="<?php echo wplus_helper::generate_option('[incorretct_otp]'); ?>">
               <div class="br-radius-8 rang-number d-center">
                  <span class="num">1200</span><span class="text-num">مرتبه</span>
               </div>
            </div>
         </div>
         <div class="progress-bar-right">
            <p><?php esc_html_e('Number of otp digits','woodmartplus'); ?></p>
            <div class="inp-rang p-top-18">
               <input type="range" class="rang" min="1" max="6" value="<?php echo wplus_helper::show_value('number_otp',false) ? wplus_helper::show_value('number_otp') :  4 ?>" name="<?php echo wplus_helper::generate_option('[number_otp]'); ?>">
               <div class="br-radius-8 rang-number d-center">
                  <span class="num">1200</span><span class="text-num">تعداد</span>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<div class="item br-bottom p-18">
   <span class="title"><?php esc_html_e('ارسال ایمیل از آدرس','woodmartplus') ?></span>
   <p class="des"><?php esc_html_e('ایمیل های ارسالی از چه آدرسی انجام شود ؟ تنظیمات smpt هاست خود را بررسی کنید','woodmartplus'); ?></p>
   <div class="suggestion-inputs gray-inp">
      <input type="text" class="left-text" name="<?php echo wplus_helper::generate_option('[email_send_from]'); ?>" value="<?php wplus_helper::show_value( 'email_send_from',false ) ? wplus_helper::show_value( 'email_send_from' ) : ($email ? $email : ''); ?>">
   </div>
</div>
<div class="item br-bottom p-18">
   <span class="title"><?php esc_html_e('متن کد احراز هویت برای ایمیل','woodmartplus') ?></span>
   <p class="des"><?php esc_html_e('برای مثال ، کد ارسال یکبار مصرف شما :','woodmartplus'); ?></p>
   <div class="suggestion-inputs gray-inp">
        <textarea name="<?php echo wplus_helper::generate_option('[text_send_otp_email]'); ?>"><?php wplus_helper::show_value( 'text_send_otp_email' ) ?? ''; ?></textarea>
   </div>
</div>