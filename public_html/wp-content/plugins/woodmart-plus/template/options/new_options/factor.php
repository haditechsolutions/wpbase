<div class="item p-18 br-bottom">
   <span class="title"><?php esc_html_e('Enable Factor','woodmartplus'); ?></span>
   <p class="des"><?php esc_html_e('فاکتور را فعال و یا غیر فعال کنید','woodmartplus'); ?></p>
   <div class="btn-select">
      <input type="checkbox" class="switch" name="<?php echo wplus_helper::generate_option('[setting_factor_enable]'); ?>"  <?php echo wplus_helper::show_value('setting_factor_enable',false) ? 'checked' : '' ?> >
   </div>
</div>

<div class="item p-18 br-bottom">
   <span class="title"><?php esc_html_e('فعال سازی فاکتور المنتور','woodmartplus'); ?></span>
   <p class="des"><?php esc_html_e('میتوانید صفحه فاکتور خود را با المنتور طراحی کنید','woodmartplus'); ?></p>
   <div class="btn-select">
      <input type="checkbox" class="switch" name="<?php echo wplus_helper::generate_option('[setting_elementor_factor_enable]'); ?>"  <?php echo wplus_helper::show_value('setting_elementor_factor_enable',false) ? 'checked' : '' ?> >
   </div>
</div>

<div class="item p-18 br-bottom">
    <span class="title"><?php esc_html_e('Choose width factor, default on 1350','woodmartplus'); ?></span>
    <p class="des"><?php esc_html_e('عرض صفحه فاکتور را میتوانید تغییر دهید','woodmartplus'); ?></p>
    <div class="inp-rang p-top-18">
        <input type="range" class="rang" min="1200" max="1500" name="<?php echo wplus_helper::generate_option('[width_factor]'); ?>" value="<?php wplus_helper::show_value( 'width_factor' ); ?>">
        <div class="br-radius-8 rang-number d-center">
            <span class="num">4</span><span class="text-num"><?php esc_html_e('px','woodmartplus'); ?></span>
        </div>
    </div>
</div>

<div class="item p-18 br-bottom">
   <span class="title"><?php esc_html_e('انتخاب رنگ','woodmartplus'); ?></span>
   <p class="des"><?php esc_html_e('Choose your color factor.','woodmartplus') ?></p>
   <div class="chose-color">
      <div class="color-palet"><input class="color_picke" type="text" name="<?php echo wplus_helper::generate_option('[color_factor]'); ?>" value="<?php wplus_helper::show_value( 'color_factor' ); ?>" ></div>
      <div class="color-icon">
        <img src="<?php echo WOODPLUS_ASSET ?>admin/img/dashboard/brush.svg" alt="brush">
      </div>
   </div>
</div>

<?php $logo_factor_id= wplus_helper::get_setting('logo_factor') ?>
<div class="item p-18">
   <span class="title"><?php esc_html_e('لوگوی فاکتور','woodmartplus'); ?></span>
   <p class="des"><?php esc_html_e('آپلود لوگوی فاکتور','woodmartplus'); ?></p>
   <div class="upload-loding logo_login_register">
    <?php if( isset( $logo_factor_id ) && !empty( $logo_factor_id ) ): ?>
        <?php 
            $img_src = wp_get_attachment_image_src( $logo_factor_id );    
        ?>
        <div class="upload-loding-img upload_image">
            <img src="<?php echo isset( $img_src[0] ) ? $img_src[0] : '' ?>" class="img-responsive" alt="logo-factor">
        </div>
        <div class="upload-loding-btns">
            <span class="blue-btn upload-btn upload-image-button"><?php esc_html_e('ویرایش','woodmartplus'); ?></span>
            <span class="delete-btn remove-image-button">
                <img class="img-responisve" src="<?php echo WOODPLUS_ASSET ?>admin/img/dashboard/trash.svg" alt="trash">
            </span>
            <input type="hidden" name="<?php echo wplus_helper::generate_option('[logo_factor]'); ?>"  class="upload_image_id" value="<?php echo $logo_factor_id ?>" / >
        </div>
    <?php else: ?>
    
      <div class="upload-loding-img upload_image">
      </div>
      <div class="upload-loding-btns">
         <span class="blue-btn upload-btn upload-image-button"><?php esc_html_e('آپلود','woodmartplus'); ?></span>
         <span class="delete-btn remove-image-button" style="display: none;">
            <img src="<?php echo WOODPLUS_ASSET ?>admin/img/dashboard/trash.svg" alt="trash">
         </span>
         <input type="hidden" name="<?php echo wplus_helper::generate_option('[logo_factor]'); ?>"  class="upload_image_id" value="" / >
      </div>
    <?php endif; ?>
   </div>
</div>

