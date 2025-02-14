
<div class="item p-18 br-bottom">
   <span class="title"><?php esc_html_e('انتخاب رنگ','woodmartplus'); ?></span>
   <p class="des"><?php esc_html_e('انتخاب رنگ اصلی داشبورد','woodmartplus') ?></p>
   <div class="chose-color">
      <div class="color-palet"><input class="color_picke" type="text" name="<?php echo wplus_helper::generate_option('[color_dashboard]'); ?>" value="<?php wplus_helper::show_value( 'color_dashboard' ); ?>" ></div>
      <div class="color-icon">
        <img src="<?php echo WOODPLUS_ASSET ?>admin/img/dashboard/brush.svg" alt="brush">
      </div>
   </div>
</div>

<div class="item p-18 br-bottom">
   <span class="title"><?php esc_html_e('انتخاب رنگ هاور','woodmartplus'); ?></span>
   <p class="des"><?php esc_html_e('انتخاب رنگ هاور داشبورد','woodmartplus') ?></p>
   <div class="chose-color">
      <div class="color-palet"><input class="color_picke" type="text" name="<?php echo wplus_helper::generate_option('[color_dashboard_hover]'); ?>" value="<?php wplus_helper::show_value( 'color_dashboard_hover' ); ?>" ></div>
      <div class="color-icon">
         <img src="<?php echo WOODPLUS_ASSET ?>admin/img/dashboard/brush.svg" alt="brush">
      </div>
   </div>
</div>