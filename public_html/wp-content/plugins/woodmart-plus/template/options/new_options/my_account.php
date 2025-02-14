<div class="item p-18 br-bottom">
   <span class="title"><?php esc_html_e('فعال کردن حساب کاربری با المنتور','woodmartplus'); ?></span>
   <p class="des"><?php esc_html_e('بعد از فعال کردن این گزینه شما امکان ساخت صفحه حساب کاربری را با المنتور دارید','woodmartplus'); ?></p>
   <div class="btn-select">
      <input type="checkbox" class="switch" name="<?php echo wplus_helper::generate_option('[setting_enable_myaccount_elementor]'); ?>"  <?php echo wplus_helper::show_value('setting_enable_myaccount_elementor',false) ? 'checked' : '' ?> >
   </div>
</div>

<div class="item p-18 br-bottom">
   <span class="title">جهت سایدبار وبلاگ</span>
   <p class="des">جهت سایدبار وبلاگ خود را انتخاب کنید</p>
   <div class="sidbar-continer">
    <label for="side-right" class="sidbar-item <?php echo wplus_helper::show_value('sidebar_myaccount',false) === 'side-right'  ? 'select' : '' ?>">
      
            <div class="sidbar-shap">
                <div></div>
                <div></div>
            </div>
         <div class="sidbar-text d-center">سایدبار راست</div>
         <input type="radio" name="<?php echo wplus_helper::generate_option('[sidebar_myaccount]'); ?>" style="display:none" id="side-right" value="side-right" <?php echo wplus_helper::show_value('sidebar_myaccount',false) === 'side-right'  ? 'checked' : '' ?> >
    </label>

      <label class="sidbar-item <?php #echo wplus_helper::show_value('sidebar_myaccount',false) === 'side-up'  ? 'select' : '' ?>" for="side-up"  >
         
      </label>

      <label class="sidbar-item <?php echo wplus_helper::show_value('sidebar_myaccount',false) === 'side-left'  ? 'select' : '' ?>" for="side-left">
         <div class="sidbar-shap">
            <div></div>
            <div></div>
         </div>
         <div class="sidbar-text d-center">سایدبار چپ</div>
         <input type="radio" name="<?php echo wplus_helper::generate_option('[sidebar_myaccount]'); ?>" style="display:none" id="side-left" value="side-left" <?php echo wplus_helper::show_value('sidebar_myaccount',false) === 'side-left'  ? 'checked' : '' ?>>
      </label>
   </div>
</div>