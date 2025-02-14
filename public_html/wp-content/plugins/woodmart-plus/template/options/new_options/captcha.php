<div class="item p-18 br-bottom">
   <span class="title"><?php esc_html_e('گوگل کپچا','woodmartplus'); ?></span>
   <p class="des"><?php esc_html_e('فعال کردن گوگل کپچا','woodmartplus'); ?></p>
   <div class="btn-select">
      <input type="checkbox" class="switch" name="<?php echo wplus_helper::generate_option('[setting_recaptcha_enable]'); ?>"  <?php echo wplus_helper::show_value('setting_recaptcha_enable',false) ? 'checked' : '' ?> >
   </div>
</div>

<div class="item br-bottom p-18">
   <span class="title"><?php  esc_html_e('گوگل سایت کی','woodmartplus'); ?></span>
   <p class="des"><?php esc_html_e('از داشبورد گوگل سایت کی خود را دریافت کنید','woodmartplus'); ?></p>
   <div class="suggestion-inputs gray-inp">
      <input type="text" class="left-text" name="<?php echo wplus_helper::generate_option('[google_recaptcha_site_key]'); ?>" value="<?php wplus_helper::show_value( 'google_recaptcha_site_key' ); ?>">
   </div>
</div>
<div class="item br-bottom p-18">
   <span class="title"><?php  esc_html_e('گوگل سکرت کی','woodmartplus'); ?></span>
   <p class="des"><?php esc_html_e('از داشبورد گوگل سکرت کی خود را دریافت کنید','woodmartplus'); ?></p>
   <div class="suggestion-inputs gray-inp">
      <input type="text" class="left-text" name="<?php echo wplus_helper::generate_option('[google_recaptcha_secret_key]'); ?>" value="<?php wplus_helper::show_value( 'google_recaptcha_secret_key' ); ?>">
   </div>
</div>
<h5>برای دریافت اطلاعات مورد نیاز از <a href="<?php echo esc_url( 'https://www.google.com/recaptcha/admin/create' ) ?>" target="_blank"> اینجا</a> اقدام کنید</h5>