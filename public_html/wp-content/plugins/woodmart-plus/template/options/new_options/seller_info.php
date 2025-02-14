<?php $options = wplus_helper::get_setting('factor',[]); ?>
<div class="item br-bottom p-18">
   <span class="title"><?php esc_html_e( 'Seller name :','woodmartplus' ); ?></span>
   <p class="des"><?php esc_html_e('نام فروشنده یا فروشگاه را وارد کنید','woodmartplus'); ?></p>
   <div class="suggestion-inputs gray-inp">
      <input type="text" class="left-text" name="<?php echo wplus_helper::generate_option('[factor][seller_info][seller_name]'); ?>" value="<?php echo isset( $options['seller_info']['seller_name'] ) ? $options['seller_info']['seller_name'] : '' ?>" >
   </div>
</div>

<div class="item br-bottom p-18">
   <span class="title"><?php esc_html_e( 'National id :','woodmartplus' ); ?> </span>
   <p class="des"><?php esc_html_e('کد ملی فروشنده را وارد کنید','woodmartplus'); ?></p>
   <div class="suggestion-inputs gray-inp">
      <input type="text" class="left-text" name="<?php echo wplus_helper::generate_option('[factor][seller_info][national_id]'); ?>" value="<?php echo isset( $options['seller_info']['national_id'] ) ? $options['seller_info']['national_id'] : '' ?>" >
   </div>
</div>

<div class="item br-bottom p-18">
   <span class="title"><?php esc_html_e( 'Registration id :','woodmartplus' ); ?> </span>
   <p class="des"><?php esc_html_e('شماره ثبت/ملی  خود را برای درج در فاکتور وارد کنید.','woodmartplus'); ?></p>
   <div class="suggestion-inputs gray-inp">
      <input type="text" class="left-text" name="<?php echo wplus_helper::generate_option('[factor][seller_info][registration_id]'); ?>" value="<?php echo isset( $options['seller_info']['registration_id'] ) ? $options['seller_info']['registration_id'] : '' ?>" >
   </div>
</div>
<div class="item br-bottom p-18">
   <span class="title"><?php esc_html_e( 'Company address :','woodmartplus' ); ?> </span>
   <p class="des"><?php esc_html_e('آدرس فروشگاه خود را برای درج در فاکتور وارد کنید.','woodmartplus'); ?></p>
   <div class="suggestion-inputs gray-inp">
      <input type="text" class="left-text" name="<?php echo wplus_helper::generate_option('[factor][seller_info][company_address]'); ?>" value="<?php echo isset( $options['seller_info']['company_address'] ) ? $options['seller_info']['company_address'] : '' ?>" >
   </div>
</div>
<div class="item br-bottom p-18">
   <span class="title"><?php esc_html_e( 'Postal code :','woodmartplus' ); ?> </span>
   <p class="des"><?php esc_html_e('کد پستی فروشگاه خود را برای درج در فاکتور وارد کنید.','woodmartplus'); ?></p>
   <div class="suggestion-inputs gray-inp">
      <input type="text" class="left-text" name="<?php echo wplus_helper::generate_option('[factor][seller_info][postal_code]'); ?>" value="<?php echo isset( $options['seller_info']['postal_code'] ) ? $options['seller_info']['postal_code'] : '' ?>" >
   </div>
</div>
<div class="item br-bottom p-18">
   <span class="title"><?php esc_html_e( 'Phone or Fax  :','woodmartplus' ); ?> </span>
   <p class="des"><?php esc_html_e('شماره تماس خود را برای درج در فاکتور وارد کنید.','woodmartplus'); ?></p>
   <div class="suggestion-inputs gray-inp">
      <input type="text" class="left-text" name="<?php echo wplus_helper::generate_option('[factor][seller_info][phon_fax]'); ?>" value="<?php echo isset( $options['seller_info']['phon_fax'] ) ? $options['seller_info']['phon_fax'] : '' ?>" >
   </div>
</div>
<div class="item br-bottom p-18">
   <span class="title"><?php esc_html_e('Manager note :','woodmartplus'); ?> </span>
   <p class="des"><?php esc_html_e('یاداشت مدیریت برای درج در فاکتور','woodmartplus'); ?></p>
   <div class="suggestion-inputs gray-inp">
      <input type="text" class="left-text" name="<?php echo wplus_helper::generate_option('[factor][manager_note]'); ?>" value="<?php echo isset( $options['manager_note'] ) ? $options['manager_note'] : '' ?>" >
   </div>
</div>