<div class="item p-18 br-bottom">
   <span class="title"><?php esc_html_e('فعال شدن ثبت نام ورود با موبایل', 'woodmartplus'); ?></span>
   <p class="des"><?php esc_html_e('برای فعال شدن ثبت نام و ورود با شماره همراه ، گزینه را فعال کنید') ?></p>
   <div class="btn-select">
      <input type="checkbox" class="switch" name="<?php echo wplus_helper::generate_option('[enable_phone_login_register]'); ?>" <?php echo wplus_helper::show_value('enable_phone_login_register', false) ? 'checked' : '' ?>>
   </div>
</div>

<div class="item p-18 br-bottom">
   <span class="title"><?php esc_html_e('Choose operator', 'woodmartplus') ?></span>
   <p class="des"><?php esc_html_e('اپراتور ارسال پیامک خود را انتخاب کنید', 'woodmartplus') ?></p>
   <div class="dropdown_select">
      <select name="<?php echo wplus_helper::generate_option('[operator_name]'); ?>" class="dropdown select_operator">
         <option value="default"><?php esc_html_e('default', 'woodmartplus') ?></option>
         <option value="faraz" <?php selected('faraz', wplus_helper::show_value('operator_name', false));  ?>><?php esc_html_e('فراز اس ام اس', 'woodmartplus') ?></option>
         <option value="smsir" <?php selected('smsir', wplus_helper::show_value('operator_name', false));  ?>><?php esc_html_e('Sms.ir', 'woodmartplus') ?></option>
         <option value="melipayamak" <?php selected('melipayamak', wplus_helper::show_value('operator_name', false));  ?>><?php esc_html_e('ملی پیامک', 'woodmartplus') ?></option>
      </select>
   </div>
</div>
<?php $faraz_options = wplus_helper::get_setting('faraz'); ?>
<div class="item br-bottom p-top-18 faraz_field">
   <span class="title"><?php esc_html_e('اطلاعات پنل پیامکی فراز', 'woodmartplus') ?></span>
   <p class="des"><?php esc_html_e('اطلاعات پنل پیامکی را تکمیل کنید', 'woodmartplus') ?></p>
   <div class="sms-panel br-radius-8">
      <div>
         <p>
            <?php esc_html_e('faraz username', 'woodmartplus') ?>
            <input type="text" placeholder="نام کاربری" name="<?php echo wplus_helper::generate_option('[faraz][username]'); ?>" value="<?php echo isset($faraz_options['username']) && !empty($faraz_options['username']) ? $faraz_options['username'] : '' ?>">
         </p>
         <p>
            <?php esc_html_e('Farz password', 'woodmartplus') ?>
            <input type="text" placeholder="رمز عبور" name="<?php echo wplus_helper::generate_option('[faraz][password]'); ?>" value="<?php echo isset($faraz_options['password']) && !empty($faraz_options['password']) ? $faraz_options['password'] : '' ?>">
         </p>
      </div>
      <div>
         <p>
            <?php esc_html_e('Farz numbber', 'woodmartplus') ?>
            <input type="text" placeholder="شماره ارسال" name="<?php echo wplus_helper::generate_option('[faraz][nummber]'); ?>" value="<?php echo isset($faraz_options['nummber']) && !empty($faraz_options['nummber']) ? $faraz_options['nummber'] : '' ?>">
         </p>
         <p>
            <?php esc_html_e('Farz pattern', 'woodmartplus') ?>
            <input type="text" placeholder="12345678" name="<?php echo wplus_helper::generate_option('[faraz][pattern]'); ?>" value="<?php echo isset($faraz_options['pattern']) && !empty($faraz_options['pattern']) ? $faraz_options['pattern'] : '' ?>">
         </p>
      </div>
      <h5>
         زمان ساخت پترن در وبسایت فراز فقط و فقط یک پارامتر ورودی استفاده کنید و نام پارامتر حتما verification-code باشد ، نمونه پترن (وودمارت پلاس خوش امدید : %verification-code% )
      </h5>
   </div>
</div>

<?php $smsir_options = wplus_helper::get_setting('smsir'); ?>

<div class="item br-bottom p-top-18 sms_ir_field">
   <span class="title"><?php esc_html_e('اطلاعات پنل پیامکی sms.ir', 'woodmartplus') ?></span>
   <p class="des"><?php esc_html_e('اطلاعات پنل پیامکی را تکمیل کنید', 'woodmartplus') ?></p>
   <div class="sms-panel br-radius-8">
      <div>
         <p>
            <?php esc_html_e('کد امنیتی (apikey)', 'woodmartplus') ?>
            <input type="text" placeholder="apikey" name="<?php echo wplus_helper::generate_option('[smsir][apikey]'); ?>" value="<?php echo isset($smsir_options['apikey']) && !empty($smsir_options['apikey']) ? $smsir_options['apikey'] : '' ?>">
         </p>
         <p>
            <?php esc_html_e('شناسه قالب پترن', 'woodmartplus') ?>
            <input type="text" placeholder="پترن" name="<?php echo wplus_helper::generate_option('[smsir][patternid]'); ?>" value="<?php echo isset($smsir_options['patternid']) && !empty($smsir_options['patternid']) ? $smsir_options['patternid'] : '' ?>">
         </p>
      </div>
      <h5>
         هنگام ساخت قالب (پترن) در وبسایت sms.ir دقت کنید که صرفا یک متغییر ورودی با نام #code# ایجاد کنید
      </h5>
   </div>
</div>

<?php $melipayamak_options = wplus_helper::get_setting('melipayamak'); ?>

<div class="item br-bottom p-top-18 melipayamak_fiedl">
   <span class="title"><?php esc_html_e('اطلاعات پنل پیامکی ملی پیامک', 'woodmartplus') ?></span>
   <p class="des"><?php esc_html_e('اطلاعات پنل پیامکی را تکمیل کنید', 'woodmartplus') ?></p>
   <div class="sms-panel br-radius-8">
      <div>
         <p>
            <?php esc_html_e('نام کاربری', 'woodmartplus') ?>
            <input type="text" placeholder="نام کاربری" name="<?php echo wplus_helper::generate_option('[melipayamak][username]'); ?>" value="<?php echo isset($melipayamak_options['username']) && !empty($melipayamak_options['username']) ? $melipayamak_options['username'] : '' ?>">
         </p>
         <p>
            <?php esc_html_e('کلید apikey', 'woodmartplus') ?>
            <input type="text" placeholder="apikey" name="<?php echo wplus_helper::generate_option('[melipayamak][apikey]'); ?>" value="<?php echo isset($melipayamak_options['apikey']) && !empty($melipayamak_options['apikey']) ? $melipayamak_options['apikey'] : '' ?>">
         </p>
      </div>
      <div>
         <p>
            <?php esc_html_e('شماره الگو', 'woodmartplus') ?>
            <input type="text" placeholder="الگو" name="<?php echo wplus_helper::generate_option('[melipayamak][pattern]'); ?>" value="<?php echo isset($melipayamak_options['pattern']) && !empty($melipayamak_options['pattern']) ? $melipayamak_options['pattern'] : '' ?>">
         </p>
      </div>
      <h5>
         هنگام ساخت پترن (الگو) در سایت ملی پیامک دقت کنید که از یک متغییر استفاده کنید برای مثال : (وودمارت پلاس خوش امدید : {0})
      </h5>
   </div>
</div>