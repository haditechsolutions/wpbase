<?php if (!wplus_helper::check_panel_is_active()): ?>
   <div class="item p-18 br-bottom">
      <span class="title warning-title"><?php esc_html_e('توجه کنید ، ثبت نام و ورود از طریق موبایل امکان پذیر نیست ، برای فعال شدن این موضوع از گزینه اپراتور های اس ام اس ، اطلاعات اپراتور مورد نظر خود را با دقت قرار دهید', 'woodmartplus') ?></span>
   </div>
<?php endif; ?>
<div class="item p-18 br-bottom">
   <span class="title"><?php esc_html_e('Enable login register', 'woodmartplus'); ?></span>
   <p class="des"></p>
   <div class="btn-select">
      <input type="checkbox" class="switch" name="<?php echo wplus_helper::generate_option('[setting_loginregister_enable]'); ?>" <?php echo wplus_helper::show_value('setting_loginregister_enable', false) ? 'checked' : '' ?>>
   </div>
</div>

<div class="item p-18 br-bottom">
   <span class="title"><?php esc_html_e('فعال کردن ثبت نام و ورود با المنتور', 'woodmartplus'); ?></span>
<p class="des"><?php esc_html_e('شما می توانید صفحه ثبت نام و ورود خود را در المنتور طراحی کنید', 'woodmartplus') ?></p>
   <div class="btn-select">
      <input type="checkbox" class="switch" name="<?php echo wplus_helper::generate_option('[login_register_elementor]'); ?>" <?php echo wplus_helper::show_value('login_register_elementor', false) ? 'checked' : '' ?>>
   </div>
</div>

<?php $logo_login_register = wplus_helper::get_setting('logo_login_register'); ?>
<div class="item p-18">
   <span class="title"><?php esc_html_e('Logo', 'woodmartplus'); ?></span>
   <p class="des"><?php esc_html_e('آپلود لوگوی ثبت نام و ورود', 'woodmartplus'); ?></p>
   <div class="upload-loding logo_login_register">
      <?php if (isset($logo_login_register) && !empty($logo_login_register)): ?>
         <?php $img_logo_lr = wp_get_attachment_image_src($logo_login_register, 'medium'); ?>
         <div class="upload-loding-img upload_image">
            <img class="img-responsive" src="<?php echo isset($img_logo_lr[0]) ? $img_logo_lr[0] : '' ?>" alt="logo_login_register">
         </div>
         <div class="upload-loding-btns">
            <span class="blue-btn upload-btn upload-image-button"><?php esc_html_e('ویرایش', 'woodmartplus'); ?></span>
            <span class="delete-btn remove-image-button">
               <img src="<?php echo WOODPLUS_ASSET ?>admin/img/dashboard/trash.svg" alt="trash">
            </span>
            <input type="hidden" name="<?php echo wplus_helper::generate_option('[logo_login_register]'); ?>" class="upload_image_id" value="<?php echo $logo_login_register ?>" />
         </div>
      <?php else: ?>
         <div class="upload-loding-img upload_image">
         </div>
         <div class="upload-loding-btns">
            <span class="blue-btn upload-btn upload-image-button"><?php esc_html_e('آپلود', 'woodmartplus'); ?></span>
            <span class="delete-btn remove-image-button" style="display: none;">
               <img src="<?php echo WOODPLUS_ASSET ?>admin/img/dashboard/trash.svg" alt="trash">
            </span>
            <input type="hidden" name="<?php echo wplus_helper::generate_option('[logo_login_register]'); ?>" class="upload_image_id" value="" />
         </div>
      <?php endif; ?>
   </div>
</div>
<?php $logo_bg_login_register = wplus_helper::get_setting('img_background_login_register'); ?>
<div class="item p-18">
   <span class="title"><?php esc_html_e('تصویر پس زمینه ثبت نام ورود', 'woodmartplus') ?></span>
   <p class="des"><?php esc_html_e('تصویر پس زمینه ثبت نام و ورود را تغییر دهید', 'woodmartplus'); ?></p>
   <div class="upload-loding image_background_login_register_section">
      <?php if (isset($logo_bg_login_register) && !empty($logo_bg_login_register)): ?>
         <?php $img_bg_lr = wp_get_attachment_image_src($logo_bg_login_register, 'medium'); ?>
         <div class="upload-loding-img upload_image">
            <img src="<?php echo isset($img_bg_lr[0]) ? $img_bg_lr[0] : '' ?>" class="img-responsive" alt="">
         </div>
         <div class="upload-loding-btns">
            <span class="blue-btn upload-btn upload-image-button"><?php esc_html_e('ویرایش', 'woodmartplus'); ?></span>
            <span class="delete-btn remove-image-button">
               <img src="<?php echo WOODPLUS_ASSET ?>admin/img/dashboard/trash.svg" alt="trash">
            </span>
            <input type="hidden" name="<?php echo wplus_helper::generate_option('[img_background_login_register]'); ?>" class="upload_image_id" value="<?php echo $logo_bg_login_register ?>" />
         </div>
      <?php else: ?>
         <div class="upload-loding-img upload_image">
         </div>
         <div class="upload-loding-btns">
            <span class="blue-btn upload-btn upload-image-button"><?php esc_html_e('آپلود', 'woodmartplus'); ?></span>
            <span class="delete-btn remove-image-button" style="display: none;">
               <img src="<?php echo WOODPLUS_ASSET ?>admin/img/dashboard/trash.svg" alt="trash">
            </span>
            <input type="hidden" name="<?php echo wplus_helper::generate_option('[img_background_login_register]'); ?>" class="upload_image_id" value="" />
         </div>
      <?php endif; ?>
   </div>
</div>
<?php $logo_lr_layout_3 = wplus_helper::get_setting('logo_login_register_layout_3'); ?>
<div class="item p-18">
   <span class="title"><?php esc_html_e('تصویر ثبت نام ورود هوشمند 3', 'woodmartplus') ?></span>
   <p class="des"><?php esc_html_e('تصویر ثبت نام و ورود هوشمند 3 خود را قرار دهید', 'woodmartplus'); ?></p>
   <div class="upload-loding logo_login_register">
      <?php if (isset($logo_lr_layout_3) && !empty($logo_lr_layout_3)): ?>
         <?php $img3 = wp_get_attachment_image_src($logo_lr_layout_3, 'medium'); ?>
         <div class="upload-loding-img upload_image">
            <img class="img-responsive" src="<?php echo isset($img3[0]) ? $img3[0] : '' ?>" alt="">
         </div>
         <div class="upload-loding-btns">
            <span class="blue-btn upload-btn upload-image-button"><?php esc_html_e('ویرایش', 'woodmartplus'); ?></span>
            <span class="delete-btn remove-image-button">
               <img src="<?php echo WOODPLUS_ASSET ?>admin/img/dashboard/trash.svg" alt="trash">
            </span>
            <input type="hidden" name="<?php echo wplus_helper::generate_option('[logo_login_register_layout_3]'); ?>" class="upload_image_id" value="<?php echo $logo_lr_layout_3 ?>" />
         </div>
      <?php else: ?>

         <div class="upload-loding-img upload_image">
         </div>
         <div class="upload-loding-btns">
            <span class="blue-btn upload-btn upload-image-button"><?php esc_html_e('آپلود', 'woodmartplus'); ?></span>
            <span class="delete-btn remove-image-button" style="display: none;">
               <img src="<?php echo WOODPLUS_ASSET ?>admin/img/dashboard/trash.svg" alt="trash">
            </span>
            <input type="hidden" name="<?php echo wplus_helper::generate_option('[logo_login_register_layout_3]'); ?>" class="upload_image_id" value="" />
         </div>
      <?php endif; ?>
   </div>
</div>

<div class="item p-18 br-bottom">
   <span class="title"><?php esc_html_e('رنگ پس زمینه ورود و ثبت نام', 'woodmartplus') ?></span>
   <p class="des"><?php esc_html_e('انتخاب رنگ پس زمینه', 'woodmartplus') ?></p>
   <div class="chose-color">
      <div class="color-palet"><input class="color_picke" type="text" name="<?php echo wplus_helper::generate_option('[color_bg_login_register]'); ?>" value="<?php wplus_helper::show_value('color_bg_login_register'); ?>"></div>
      <div class="color-icon">
         <img src="<?php echo WOODPLUS_ASSET ?>admin/img/dashboard/brush.svg" alt="brush">
      </div>
   </div>
</div>

<div class="item p-18 br-bottom">
   <span class="title"><?php esc_html_e('حالت ثبت نام و ورود', 'woodmartplus') ?></span>
   <p class="des"><?php esc_html_e('نوع ثبت نام و ورود را انتخاب کنید', 'woodmartplus') ?></p>
   <div class="dropdown_select">
      <select name="<?php echo wplus_helper::generate_option('[register_login_type]'); ?>" class="dropdown">
         <option disabled selected>لطفا یک گزینه رو انتخاب کنید.</option>
         <option value="layout-2" <?php selected('layout-2', wplus_helper::show_value('register_login_type', false)); ?>>هوشمند 2</option>
         <option value="layout-3" <?php selected('layout-3', wplus_helper::show_value('register_login_type', false)); ?>>هوشمند 3</option>
         <option value="layout-4" <?php selected('layout-4', wplus_helper::show_value('register_login_type', false)); ?>>ووکامرس</option>
      </select>
   </div>
</div>