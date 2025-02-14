<?php $detial_notif_sms = wplus_helper::get_setting('notif_sms',[]); ?>

<div class="item p-18 br-bottom">
    <span class="title"><?php esc_html_e('Choose operator','woodmartplus') ?></span>
    <p class="des"><?php esc_html_e('اپراتور ارسال پیامک خود را انتخاب کنید','woodmartplus') ?></p>
    <div class="dropdown_select">
        <select name="<?php echo wplus_helper::generate_option('[notif_sms][operator_name]'); ?>" class="dropdown select_operator">

            <option value="default" ><?php esc_html_e('default','woodmartplus') ?></option>
            <?php $operator_selected = isset( $detial_notif_sms['operator_name'] ) && !empty( $detial_notif_sms['operator_name'] ) ? $detial_notif_sms['operator_name'] : '' ?>
            <?php foreach( wplus_helper::generate_operator() as $operator_key => $operator_name ):  ?>
                <option value="<?php echo esc_html( $operator_key ) ?>" <?php selected($operator_key,$operator_selected);  ?> ><?php echo  esc_html( $operator_name ); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>

<div class="item br-bottom p-top-18 faraz_field">
   <span class="title"><?php esc_html_e('اطلاعات پنل پیامکی فراز','woodmartplus') ?></span>
   <p class="des"><?php esc_html_e('اطلاعات پنل پیامکی را تکمیل کنید','woodmartplus') ?></p>
   <div class="sms-panel br-radius-8">
      <div>
         <p>
            <?php esc_html_e('faraz username','woodmartplus') ?>
            <input type="text" placeholder="<?php esc_html_e('faraz username','woodmartplus') ?>" name="<?php echo wplus_helper::generate_option('[notif_sms][faraz][username]'); ?>" value="<?php echo isset( $detial_notif_sms['faraz']['username'] ) && !empty( $detial_notif_sms['faraz']['username'] ) ? $detial_notif_sms['faraz']['username'] : '' ?>">
         </p>
         <p>
            <?php esc_html_e('Farz password','woodmartplus') ?>
            <input type="text" placeholder="<?php esc_html_e('Farz password','woodmartplus') ?>" name="<?php echo wplus_helper::generate_option('[notif_sms][faraz][password]'); ?>" value="<?php echo isset( $detial_notif_sms['faraz']['password'] ) && !empty( $detial_notif_sms['faraz']['password']) ? $detial_notif_sms['faraz']['password']: '' ?>">
         </p>
      </div>
      <div>
         <p>
         <?php esc_html_e('Farz numbber','woodmartplus') ?>
            <input type="text" placeholder="<?php esc_html_e('Farz numbber','woodmartplus') ?>" name="<?php echo wplus_helper::generate_option('[notif_sms][faraz][nummber]'); ?>" value="<?php echo isset( $detial_notif_sms['faraz']['nummber'] ) && !empty( $detial_notif_sms['faraz']['nummber'] ) ? $detial_notif_sms['faraz']['nummber'] : '' ?>">
         </p>
      </div>
   </div>
</div>

<div class="item br-bottom p-top-18 sms_ir_field">
   <span class="title"><?php esc_html_e('اطلاعات پنل پیامکی sms.ir','woodmartplus') ?></span>
   <p class="des"><?php esc_html_e('اطلاعات پنل پیامکی را تکمیل کنید','woodmartplus') ?></p>
   <div class="sms-panel br-radius-8">
      <div>
         <p>
            <?php esc_html_e('نام کاربری','woodmartplus') ?>
            <input type="text" placeholder="<?php esc_html_e('نام کاربری','woodmartplus') ?>" name="<?php echo wplus_helper::generate_option('[notif_sms][smsir][username]'); ?>" value="<?php echo isset( $detial_notif_sms['smsir']['username'] ) && !empty( $detial_notif_sms['smsir']['username'] ) ? $detial_notif_sms['smsir']['username'] : '' ?>" >
         </p>
         <p>
            <?php esc_html_e('رمزعبور','woodmartplus') ?>
            <input type="text" placeholder="<?php esc_html_e('رمزعبور','woodmartplus') ?>" name="<?php echo wplus_helper::generate_option('[notif_sms][smsir][password]'); ?>" value="<?php echo isset( $detial_notif_sms['smsir']['password'] ) && !empty( $detial_notif_sms['smsir']['password'] ) ? $detial_notif_sms['smsir']['password'] : '' ?>" >
         </p>
      </div>
      <div>
         <p>
            <?php esc_html_e('شماره ارسال پیامک','woodmartplus') ?>
            <input type="text" placeholder=" <?php esc_html_e('شماره ارسال پیامک','woodmartplus') ?>" name="<?php echo wplus_helper::generate_option('[notif_sms][smsir][nummber]'); ?>" value="<?php echo isset( $detial_notif_sms['smsir']['nummber'] ) && !empty( $detial_notif_sms['smsir']['nummber'] ) ? $detial_notif_sms['smsir']['nummber'] : '' ?>" >
         </p>
      </div>
   </div>
</div>

<div class="item br-bottom p-top-18 melipayamak_fiedl">
   <span class="title"><?php esc_html_e('اطلاعات پنل پیامکی ملی پیامک','woodmartplus') ?></span>
   <p class="des"><?php esc_html_e('اطلاعات پنل پیامکی را تکمیل کنید','woodmartplus') ?></p>
   <div class="sms-panel br-radius-8">
      <div>
         <p>
         <?php esc_html_e('نام کاربری','woodmartplus') ?>
            <input type="text" placeholder="<?php esc_html_e('نام کاربری','woodmartplus') ?>" name="<?php echo wplus_helper::generate_option('[notif_sms][melipayamak][username]'); ?>" value="<?php echo isset( $detial_notif_sms['melipayamak']['username'] ) && !empty( $detial_notif_sms['melipayamak']['username'] ) ? $detial_notif_sms['melipayamak']['username'] : '' ?>" >
         </p>
         <p>
            <?php esc_html_e('رمزعبور','woodmartplus') ?>
            <input type="text" placeholder="<?php esc_html_e('رمزعبور','woodmartplus') ?>" name="<?php echo wplus_helper::generate_option('[notif_sms][melipayamak][password]'); ?>" value="<?php echo isset( $detial_notif_sms['melipayamak']['password'] ) && !empty( $detial_notif_sms['melipayamak']['password'] ) ? $detial_notif_sms['melipayamak']['password'] : '' ?>" >
         </p>
      </div>
      <div>
        <p>
        <?php esc_html_e('شماره ارسال پیامک','woodmartplus') ?>
        <input type="text" placeholder="<?php esc_html_e('شماره ارسال پیامک','woodmartplus') ?>" name="<?php echo wplus_helper::generate_option('[notif_sms][melipayamak][numbber]'); ?>" value="<?php echo isset( $detial_notif_sms['melipayamak']['nummber'] ) && !empty( $detial_notif_sms['melipayamak']['nummber'] ) ? $detial_notif_sms['melipayamak']['nummber'] : '' ?>" >
        </p>
      </div>
   </div>
</div>