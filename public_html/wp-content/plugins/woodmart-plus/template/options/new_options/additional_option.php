
<div class="item p-18 br-bottom">
   <span class="title"><?php esc_html_e('فعال کردن ایجاد رنگ','woodmartplus'); ?></span>
   <p class="des"><?php esc_html_e('با فعال کردن این گزینه ، قسمت انتخاب رنگ در ویژگی های محصولات ایجاد میشود (این رنگ صرفا بر روی اسلایدر محصولات افزونه فعال میشود!!!!!)') ?></p>
   <div class="btn-select">
      <input type="checkbox" class="switch" name="<?php echo wplus_helper::generate_option('[active_color_carouel]'); ?>"  <?php echo wplus_helper::show_value('active_color_carouel',false) ? 'checked' : '' ?> >
   </div>
</div>

<div class="item br-bottom p-18">
   <span class="title"><?php  esc_html_e('متن محصول ناموجود','woodmartplus'); ?></span>
   <p class="des"><?php esc_html_e('این متن صرفا بر روی کارت محصولات افزونه نمایش داده میشود','woodmartplus'); ?></p>
   <div class="suggestion-inputs gray-inp">
      <input type="text" class="left-text" name="<?php echo wplus_helper::generate_option('[outofstock_carousel]'); ?>" value="<?php wplus_helper::show_value( 'outofstock_carousel' ); ?>">
   </div>
</div>