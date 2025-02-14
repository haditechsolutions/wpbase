<div class="item p-18 br-bottom">
   <span class="title"><?php esc_html_e('فعال کردن تیکت','woodmartplus'); ?></span>
   <p class="des"><?php esc_html_e('تیکت خود را فعال و یا غیر فعال کنید.','woodmartplus'); ?></p>
   <div class="btn-select">
      <input type="checkbox" class="switch" name="<?php echo wplus_helper::generate_option('[setting_ticket_enable]'); ?>"  <?php echo wplus_helper::show_value('setting_ticket_enable',false) ? 'checked' : '' ?> >
   </div>
</div>

<div class="item br-bottom p-18">
   <span class="title"><?php esc_html_e('Text before send ticket','woodmartplus'); ?></span>
   <p class="des"><?php esc_html_e('متن قبل از ارسال تیکت','woodmartplus'); ?></p>
   <div class="suggestion-inputs gray-inp">
        <textarea name="<?php echo wplus_helper::generate_option('[text_before_send_ticket]'); ?>"><?php wplus_helper::show_value( 'text_before_send_ticket' ) ?? ''; ?></textarea>
   </div>
</div>

<div class="item br-bottom p-18">
   <span class="title"><?php esc_html_e('How to send text','woodmartplus'); ?></span>
   <p class="des"><?php esc_html_e('توضیح چگونگی ارسال تیکت','woodmartplus'); ?></p>
   <div class="suggestion-inputs gray-inp">
        <textarea name="<?php echo wplus_helper::generate_option('[text_how_send_ticket]'); ?>"><?php wplus_helper::show_value( 'text_how_send_ticket' ) ?? ''; ?></textarea>
   </div>
</div>