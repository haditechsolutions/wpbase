<div class="item br-bottom p-18">
   <span class="title"><?php esc_html_e('عنوان ثبت نام و ورود', 'woodmartplus'); ?></span>
   <p class="des"><?php esc_html_e('عنوان ثبت نام و ورود خود را تنظیم کنید', 'woodmartplus'); ?></p>
   <div class="suggestion-inputs gray-inp">
      <input type="text" class="left-text" name="<?php echo wplus_helper::generate_option('[title_login_register]'); ?>" value="<?php wplus_helper::show_value('title_login_register'); ?>">
   </div>
</div>

<div class="item br-bottom p-18">
   <span class="title"><?php esc_html_e('توضیح نحوه ورود', 'woodmartplus'); ?></span>
   <p class="des"><?php esc_html_e('این قسمت بعد از ثبت نام و ورود نمایش داده میشود', 'woodmartplus'); ?></p>
   <div class="suggestion-inputs gray-inp">
      <input type="text" class="left-text" name="<?php echo wplus_helper::generate_option('[after_title_text]'); ?>" value="<?php wplus_helper::show_value('after_title_text'); ?>">
   </div>
</div>

<div class="item br-bottom p-18">
   <span class="title"><?php esc_html_e('توضیح قوانین و شرایط', 'woodmartplus'); ?></span>
   <p class="des"><?php esc_html_e('برای قرار دادن صفحه قوانین و مقرارت از شورتکد استفاده کنید [wplus_term_condion]', 'woodmartplus'); ?></p>
   <div class="suggestion-inputs gray-inp">
      <textarea name="<?php echo wplus_helper::generate_option('[description_login_register]'); ?>"><?php wplus_helper::show_value('description_login_register') ?? ''; ?></textarea>
   </div>
</div>
<div class="item br-bottom p-18">
   <span class="title"><?php esc_html_e('توضیحات اضافی ثبت نام و ورود', 'woodmartplus'); ?></span>
   <p class="des"><?php esc_html_e('این توضیحات در زیر قسمت ثبت نام و ورود نمایش داده میشود', 'woodmartplus'); ?></p>
   <div class="suggestion-inputs gray-inp">
      <textarea name="<?php echo wplus_helper::generate_option('[more_description_login_register]'); ?>"><?php wplus_helper::show_value('more_description_login_register') ?? ''; ?></textarea>
   </div>
</div>

<div class="item p-18 br-bottom">
   <span class="title"><?php esc_html_e('انتخاب برگه قوانین و مقرارت', 'woodmartplus') ?></span>
   <p class="des"><?php esc_html_e('این برگه با شورتکد بالا ([wplus_term_condion]) ست میشود', 'woodmartplus') ?></p>
   <div class="dropdown_select">
      <select name="<?php echo wplus_helper::generate_option('[terms_and_conditions]'); ?>" class="dropdown">
         <option value="default">انتخاب گزینه</option>
         <?php foreach (wplus_helper::get_page_register() as $key => $page): ?>
            <option value="<?php echo esc_attr($key) ?>" <?php selected($key, wplus_helper::show_value('terms_and_conditions', false)) ?>><?php echo esc_html($page) ?></option>
         <?php endforeach; ?>
      </select>
   </div>
</div>

<div class="item br-bottom p-18">
   <span class="title"><?php esc_html_e('تغییر متن های فرم ورود و ثبت نام هوشمند', 'woodmartplus') ?></span>
   <p class="des"><?php esc_html_e('شما میتوانید متن های موجود در فرم ورود و ثبت نام هوشمند را تغییر دهید', 'woodmartplus') ?></p>
</div>
<div class="item">
   <div class="manager-sms-wrapper">

      <div class="awaiting-payment-immediately-cust br-radius-8 m-18">
         <div class="awaiting-payment-immediately-text-cust"><?php esc_html_e('متن های فرم ابتدایی ثبت نام ورود', 'woodmartplus') ?></div>
         <div class="awaiting-payment-immediately-inp-cust">
            <p><?php esc_html_e('متن نگهدارنده', 'woodmartplus') ?></p>
            <input class="type-text-width-100" type="text" class="left-text" placeholder="<?php esc_html_e('ایمیل / موبایل / نام کاربری', 'woodmartplus') ?>" name="<?php echo wplus_helper::generate_option('[first_placeholder]'); ?>" value="<?php wplus_helper::show_value('first_placeholder'); ?>">
            <p><?php esc_html_e('متن دکمه', 'woodmartplus') ?></p>
            <input class="type-text-width-100" type="text" class="left-text" placeholder="<?php esc_html_e('ثبت نام / ورود', 'woodmartplus') ?>" name="<?php echo wplus_helper::generate_option('[first_btn_text]'); ?>" value="<?php wplus_helper::show_value('first_btn_text'); ?>">
            <p><?php esc_html_e('متن فراموشی رمزعبور', 'woodmartplus') ?></p>
            <input class="type-text-width-100" type="text" class="left-text" placeholder="<?php esc_html_e('آیا رمز عبور خود را فراموش کرده اید', 'woodmartplus') ?>" name="<?php echo wplus_helper::generate_option('[first_text_forgetpassword]'); ?>" value="<?php wplus_helper::show_value('first_text_forgetpassword'); ?>">
         </div>
      </div>

      <div class="awaiting-payment-immediately-cust br-radius-8 m-18">
         <div class="awaiting-payment-immediately-text-cust"><?php esc_html_e('متن های فرم ورود با ایمیل', 'woodmartplus') ?></div>
         <div class="awaiting-payment-immediately-inp-cust">
            <p><?php esc_html_e('عنوان', 'woodmartplus') ?></p>
            <input class="type-text-width-100" type="text" class="left-text" placeholder="<?php esc_html_e('رمزعبور ایمیل خود را وارد کنید', 'woodmartplus') ?>" name="<?php echo wplus_helper::generate_option('[two_title_text]'); ?>" value="<?php wplus_helper::show_value('two_title_text'); ?>">
            <p><?php esc_html_e('متن نگهدارنده', 'woodmartplus') ?></p>
            <input class="type-text-width-100" type="text" class="left-text" placeholder="<?php esc_html_e('رمز عبور', 'woodmartplus') ?>" name="<?php echo wplus_helper::generate_option('[two_placeholder_text]'); ?>" value="<?php wplus_helper::show_value('two_placeholder_text'); ?>">
            <p><?php esc_html_e('متن دکمه', 'woodmartplus') ?></p>
            <input class="type-text-width-100" type="text" class="left-text" placeholder="<?php esc_html_e('ورود', 'woodmartplus') ?>" name="<?php echo wplus_helper::generate_option('[two_btn_text]'); ?>" value="<?php wplus_helper::show_value('two_btn_text'); ?>">
         </div>
      </div>

      <div class="awaiting-payment-immediately-cust br-radius-8 m-18">
         <div class="awaiting-payment-immediately-text-cust"><?php esc_html_e('متن های فرم ثبت نام با ایمیل', 'woodmartplus') ?></div>
         <div class="awaiting-payment-immediately-inp-cust">
            <p><?php esc_html_e('متن نگهدارنده', 'woodmartplus') ?></p>
            <input class="type-text-width-100" type="text" class="left-text" placeholder="<?php esc_html_e('نام کاربری', 'woodmartplus') ?>" name="<?php echo wplus_helper::generate_option('[three_placeholder_username]'); ?>" value="<?php wplus_helper::show_value('three_placeholder_username'); ?>">
            <p><?php esc_html_e('متن نگهدارنده', 'woodmartplus') ?></p>
            <input class="type-text-width-100" type="text" class="left-text" placeholder="<?php esc_html_e('رمز عبور', 'woodmartplus') ?>" name="<?php echo wplus_helper::generate_option('[three_placeholder_password]'); ?>" value="<?php wplus_helper::show_value('three_placeholder_password'); ?>">
            <p><?php esc_html_e('متن دکمه', 'woodmartplus') ?></p>
            <input class="type-text-width-100" type="text" class="left-text" placeholder="<?php esc_html_e('ثبت نام', 'woodmartplus') ?>" name="<?php echo wplus_helper::generate_option('[three_btn_text]'); ?>" value="<?php wplus_helper::show_value('three_btn_text'); ?>">
         </div>
      </div>

      <div class="awaiting-payment-immediately-cust br-radius-8 m-18">
         <div class="awaiting-payment-immediately-text-cust"><?php esc_html_e('متن های فرم احراز هویت موبایل', 'woodmartplus') ?></div>
         <div class="awaiting-payment-immediately-inp-cust">
            <p><?php esc_html_e('عنوان', 'woodmartplus') ?></p>
            <input class="type-text-width-100" type="text" class="left-text" placeholder="<?php esc_html_e('زمان باقی مانده :', 'woodmartplus') ?>" name="<?php echo wplus_helper::generate_option('[four_timeup_text]'); ?>" value="<?php wplus_helper::show_value('four_timeup_text'); ?>">
            <p><?php esc_html_e('عنوان', 'woodmartplus') ?></p>
            <input class="type-text-width-100" type="text" class="left-text" placeholder="<?php esc_html_e('ویرایش شماره', 'woodmartplus') ?>" name="<?php echo wplus_helper::generate_option('[four_editnumber]'); ?>" value="<?php wplus_helper::show_value('four_editnumber'); ?>">
            <p><?php esc_html_e('متن دکمه', 'woodmartplus') ?></p>
            <input class="type-text-width-100" type="text" class="left-text" placeholder="<?php esc_html_e('تایید موبایل', 'woodmartplus') ?>" name="<?php echo wplus_helper::generate_option('[four_btn_text]'); ?>" value="<?php wplus_helper::show_value('four_btn_text'); ?>">
         </div>
      </div>

      <div class="awaiting-payment-immediately-cust br-radius-8 m-18">
         <div class="awaiting-payment-immediately-text-cust"><?php esc_html_e('متن های فرم احراز هویت ایمیل', 'woodmartplus') ?></div>
         <div class="awaiting-payment-immediately-inp-cust">
            <p><?php esc_html_e('عنوان', 'woodmartplus') ?></p>
            <input class="type-text-width-100" type="text" class="left-text" placeholder="<?php esc_html_e('زمان باقی مانده :', 'woodmartplus') ?>" name="<?php echo wplus_helper::generate_option('[five_timeup_text]'); ?>" value="<?php wplus_helper::show_value('five_timeup_text'); ?>">
            <p><?php esc_html_e('متن دکمه', 'woodmartplus') ?></p>
            <input class="type-text-width-100" type="text" class="left-text" placeholder="<?php esc_html_e('تایید ایمیل', 'woodmartplus') ?>" name="<?php echo wplus_helper::generate_option('[five_btn_text]'); ?>" value="<?php wplus_helper::show_value('five_btn_text'); ?>">
         </div>
      </div>


   </div>
</div>