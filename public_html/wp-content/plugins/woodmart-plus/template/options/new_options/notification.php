<div class="item p-18 br-bottom">
   <span class="title"><?php esc_html_e('Enable Notification','woodmartplus'); ?></span>
   <p class="des"></p>
   <div class="btn-select">
      <input type="checkbox" class="switch" name="<?php echo wplus_helper::generate_option('[enable_notif_data]'); ?>"  <?php echo wplus_helper::show_value('enable_notif_data',false) ? 'checked' : '' ?> >
   </div>
</div>

<div class="item p-18 br-bottom">
    <span class="title"><?php esc_html_e('Show notification number','woodmartplus') ?></span>
    <p class="des"><?php esc_html_e('چه تعداد از اعلانات نمایش داده شود؟','woodmartplus'); ?></p>
    <div class="inp-rang p-top-18">
        <input type="range" class="rang" min="1" max="10" name="<?php echo wplus_helper::generate_option('[show_notif_number]'); ?>" value="<?php wplus_helper::show_value( 'show_notif_number' ); ?>">
        <div class="br-radius-8 rang-number d-center">
            <span class="num">4</span><span class="text-num"><?php esc_html_e('تعداد','woodmartplus'); ?></span>
        </div>
    </div>
</div>

<div class="item p-top-18 notif_section">
   <span class="title"><?php esc_html_e('اطلاعیه ها','woodmartplus') ?></span>
   <p class="des"><?php esc_html_e('اطلاعات اطلاعیه را تکمیل کنید','woodmartplus'); ?></p>
   <div data-repeater-list="<?php echo wplus_helper::generate_option('[notif_section]'); ?>" >
        <?php foreach( wplus_helper::get_setting( 'notif_section',[
            'default_slider' => [
                'title',
                'image',
                'description'
            ]
        ] ) as $slider ): ?>
            <?php 
                $img_id = isset( $slider['image'] ) && !empty( $slider['image'] ) ? $slider['image'] : false;
                $image = '';
                if( $img_id )
                {
                    $img_src = wp_get_attachment_image_src($img_id,'medium');
                    if( isset( $img_src[0] ) )
                    {
                        $image = $img_src[0];
                    }
                }
            ?>
            <section class="repeater-sections-slider-images add-suggestions m-t-18" data-repeater-item >
                <div class="br-radius-8 opened">

                    <div class="suggestion-title">
                        <span class="suggestion-menu">
                            <img src="<?php echo WOODPLUS_ASSET ?>admin/img/dashboard/menu.svg" alt="">
                            <p><?php esc_html_e('اطلاعیه جدید','woodmartplus'); ?></p>
                        </span>
                        <span class="arrow-icon"><img src="<?php echo WOODPLUS_ASSET ?>admin/img/dashboard/arrow-down2.svg" alt=""></span>
                    </div>

                    <div class="suggestion-content">
                        <div class="upload-loding">
                            <?php if( $image ): ?>
                                <div class="upload-loding-img upload_image">
                                    <img class="img-responsive" src="<?php echo esc_url( $image ); ?>" alt="slider">
                                </div>
                                <div class="upload-loding-btns">
                                    <span class="blue-btn upload-btn upload-image-button"><?php esc_html_e('ویرایش','woodmartplus') ?></span>
                                    <span class="delete-btn remove-image-button">
                                        <img src="<?php echo WOODPLUS_ASSET ?>admin/img/dashboard/trash.svg" alt="">
                                    </span>
                                </div>
                                <input type="hidden" name="image" id="" class="upload_image_id" value="<?php echo esc_attr( $img_id ); ?>" / >
                            <?php else: ?>
                            <div class="upload-loding-img upload_image">
                            </div>
                            <div class="upload-loding-btns">
                                <span class="blue-btn upload-btn upload-image-button"><?php esc_html_e('آپلود','woodmartplus') ?></span>
                                <span class="delete-btn remove-image-button" style="display: none;">
                                    <img src="<?php echo WOODPLUS_ASSET ?>admin/img/dashboard/trash.svg" alt="">
                                </span>
                            </div>
                            <input type="hidden" name="image" id="" class="upload_image_id" value="" / >
                            <?php endif; ?>
                        </div>

                        <div class="suggestion-inputs">
                            <div>
                                <input type="text" name="title_notif" id="" placeholder="<?php esc_html_e('عنوان اطلاعیه ها','woodmartplus'); ?>" value="<?php echo isset( $slider['title_notif'] ) && !empty( $slider['title_notif'] ) ? $slider['title_notif']  : '' ?>">
                            </div>
                            <div>
                                <textarea name="description" placeholder="<?php esc_html_e('توضیحات','woodmartplus'); ?>" id=""><?php echo isset( $slider['description'] ) && !empty( $slider['description'] ) ? $slider['description']  : '' ?></textarea>
                            </div>
                            <input type="hidden" name="date_create_notification" class="date_notif_class" value="<?php echo  esc_attr( isset( $slider['date_create_notification'] ) ? $slider['date_create_notification'] : time() ); ?>" >
                        </div>
                    </div>

                    <div class="suggestion-btns">
                        <input class="delete-btn" data-repeater-delete type="button" value="<?php esc_html_e('حذف اطلاعیه ها','woodmartplus') ?>" >
                    </div>
                </div>
            </section>
        <?php endforeach; ?>
   </div>
   <input class="add-btn blue-btn m-t-18" style="display:inline-block" data-repeater-create type="button" value="<?php esc_html_e('افزودن اطلاعیه ها','woodmartplus') ?>" >
</div>