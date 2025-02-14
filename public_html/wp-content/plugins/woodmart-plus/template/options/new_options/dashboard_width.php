<div class="item p-18 br-bottom">
    <span class="title"><?php esc_html_e('Choose width dashboard, default on 1350','woodmartplus'); ?></span>
    <p class="des"><?php esc_html_e('عرض صفحه حساب کاربری را میتوانید تغییر دهید','woodmartplus'); ?></p>
    <div class="inp-rang p-top-18">
        <input type="range" class="rang" min="1200" max="1500" name="<?php echo wplus_helper::generate_option('[width_dashboard]'); ?>" value="<?php wplus_helper::show_value( 'width_dashboard' ); ?>">
        <div class="br-radius-8 rang-number d-center">
            <span class="num">4</span><span class="text-num"><?php esc_html_e('px','woodmartplus'); ?></span>
        </div>
    </div>
</div>

<div class="item p-18 br-bottom">
   <span class="title"><?php esc_html_e('Full width','woodmartplus'); ?></span>
   <p class="des"><?php esc_html_e('نمایش تمام عرض صفحه داشبورد','woodmartplus') ?></p>
   <div class="btn-select">
      <input type="checkbox" class="switch" name="<?php echo wplus_helper::generate_option('[full_width]'); ?>" <?php echo wplus_helper::show_value('full_width',false) ? 'checked' : '' ?>>
   </div>
</div>