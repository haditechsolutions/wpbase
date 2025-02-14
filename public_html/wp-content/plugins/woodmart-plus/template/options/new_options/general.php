<div class="item p-18 br-bottom">
    <span class="title"><?php esc_html_e('فعال کردن پلاگین', 'woodmartplus'); ?></span>
    <p class="des"></p>
    <div class="btn-select">
        <input type="checkbox" class="switch" name="<?php echo wplus_helper::generate_option('[enable_panel]'); ?>" <?php echo wplus_helper::show_value('enable_panel', false) ? 'checked' : '' ?>>
    </div>
</div>

<div class="item br-bottom p-18">
    <span class="title"><?php echo esc_html_e('عنوان ابتدایی داشبورد', 'woodmartplus'); ?></span>
    <p class="des"><?php esc_html_e('عنوان در ابتدای صفحه داشبورد نمایش داده می شود', 'woodmartplus'); ?></p>
    <div class="suggestion-inputs gray-inp">
        <input type="text" class="left-text" name="<?php echo wplus_helper::generate_option('[title_page_dashboard]'); ?>" value="<?php wplus_helper::show_value('title_page_dashboard'); ?>">
    </div>
</div>

<div class="item p-18 br-bottom">
    <span class="title"><?php esc_html_e('چه مواردی در داشبورد کاربر نمایش داده نشود.', 'woodmartplus') ?></span>
    <p class="des"><?php esc_html_e('فیلد های زیر اگر نمایش داده نمی شود یکبار وارد صفحه پیشخوان کاربر شوید', 'woodmartplus'); ?></p>
    <div>
        <?php $dashboard_menu = wplus_helper::get_setting('dashboard_menu', []); ?>
        <select class="js-example-basic-multiple" name="<?php echo wplus_helper::generate_option('[dashboard_menu][]'); ?>" multiple="multiple" dir="rtl">
            <?php foreach (woodmartPlusInit::generate_all_dashboard_menu() as $key => $value): ?>
                <?php if (strpos($key, '%') !== false) {
                    $key = urldecode($key);
                } ?>
                <option value="<?php echo esc_attr($key) ?>" <?php echo in_array($key, $dashboard_menu) ? 'selected' : '' ?>><?php echo esc_html($value); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>

<div class="item p-18 br-bottom">
    <span class="title"><?php esc_html_e('Show last product', 'woodmartplus'); ?></span>
    <p class="des"></p>
    <div class="btn-select">
        <input type="checkbox" class="switch" name="<?php echo wplus_helper::generate_option('[recenlty_viwed_enable]'); ?>" <?php echo wplus_helper::show_value('recenlty_viwed_enable', false) ? 'checked' : '' ?>>
    </div>
    <h4><?php esc_html_e('Choose number of shows last product on dashboard, default on 4', 'woodmartplus'); ?></h4>
    <div class="inp-rang p-top-18">
        <input type="range" class="rang" min="1" max="6" name="<?php echo wplus_helper::generate_option('[recenlty_viewed_show_nummber]'); ?>" value="<?php wplus_helper::show_value('recenlty_viewed_show_nummber'); ?>">
        <div class="br-radius-8 rang-number d-center">
            <span class="num">4</span><span class="text-num"><?php esc_html_e('مقدار', 'woodmartplus'); ?></span>
        </div>
    </div>
</div>

<div class="item p-18 br-bottom">
    <span class="title"><?php esc_html_e('اسلایدر داشبورد', 'woodmartplus'); ?></span>
    <p class="des"><?php esc_html_e('اسلایدر را در داشبورد نمایش دهید', 'woodmartplus'); ?></p>
    <div class="btn-select">
        <input type="checkbox" class="switch" name="<?php echo wplus_helper::generate_option('[slider_image_enable]'); ?>" <?php echo wplus_helper::show_value('slider_image_enable', false) ? 'checked' : '' ?>>
    </div>
</div>

<div class="item p-top-18 sliders_section">
    <span class="title"><?php esc_html_e('اطلاعات اسلایدر', 'woodmartplus') ?></span>
    <p class="des"><?php esc_html_e('اطلاعات اسلایدر داشبورد را تکمیل کنید', 'woodmartplus'); ?></p>
    <div data-repeater-list="<?php echo wplus_helper::generate_option('[slider_image]'); ?>">
        <?php foreach (
            wplus_helper::get_setting('slider_image', [
                'default_slider' => [
                    'image',
                    'url'
                ]
            ]) as $slider
        ): ?>
            <?php
            $img_id = isset($slider['image']) && !empty($slider['image']) ? $slider['image'] : false;
            $image = '';
            if ($img_id) {
                $img_src = wp_get_attachment_image_src($img_id, 'medium');
                if (isset($img_src[0])) {
                    $image = $img_src[0];
                }
            }
            ?>
            <section class="repeater-sections-slider-images add-suggestions m-t-18" data-repeater-item>
                <div class="br-radius-8 opened">
                    <div class="suggestion-title">
                        <span class="suggestion-menu">
                            <img src="<?php echo WOODPLUS_ASSET ?>admin/img/dashboard/menu.svg" alt="">
                            <p><?php esc_html_e('اسلایدر جدید', 'woodmartplus'); ?></p>
                        </span>
                        <span class="arrow-icon"><img src="<?php echo WOODPLUS_ASSET ?>admin/img/dashboard/arrow-down2.svg" alt=""></span>
                    </div>

                    <div class="suggestion-content">
                        <div class="upload-loding">
                            <?php if ($image): ?>
                                <div class="upload-loding-img upload_image">
                                    <img class="img-responsive" src="<?php echo esc_url($image); ?>" alt="slider">
                                </div>
                                <div class="upload-loding-btns">
                                    <span class="blue-btn upload-btn upload-image-button"><?php esc_html_e('ویرایش', 'woodmartplus') ?></span>
                                    <span class="delete-btn remove-image-button">
                                        <img src="<?php echo WOODPLUS_ASSET ?>admin/img/dashboard/trash.svg" alt="">
                                    </span>
                                </div>
                                <input type="hidden" name="image" id="" class="upload_image_id" value="<?php echo esc_attr($img_id); ?>" />
                            <?php else: ?>
                                <div class="upload-loding-img upload_image">
                                    <!-- <img class="img-responsive" src="./img/christopher-gower-m_HRfLhgABo-unsplash 1.jpg" alt=""> -->
                                </div>
                                <div class="upload-loding-btns">
                                    <span class="blue-btn upload-btn upload-image-button"><?php esc_html_e('آپلود', 'woodmartplus') ?></span>
                                    <span class="delete-btn remove-image-button" style="display: none;">
                                        <img src="<?php echo WOODPLUS_ASSET ?>admin/img/dashboard/trash.svg" alt="">
                                    </span>
                                </div>
                                <input type="hidden" name="image" id="" class="upload_image_id" value="" />
                            <?php endif; ?>
                        </div>

                        <div class="suggestion-inputs">
                            <div>
                                <input type="text" name="url" id="" placeholder="<?php esc_html_e('لینک تصویر', 'woodmartplus'); ?>" value="<?php echo isset($slider['url']) && !empty($slider['url']) ? esc_url($slider['url']) : ''  ?>">
                            </div>
                        </div>
                    </div>
                    <div class="suggestion-btns">
                        <input class="delete-btn" data-repeater-delete type="button" value="<?php esc_html_e('حذف اسلایدر', 'woodmartplus') ?>">
                    </div>
                </div>
            </section>
        <?php endforeach; ?>
    </div>
    <input class="add-btn blue-btn m-t-18" style="display:inline-block" data-repeater-create type="button" value="<?php esc_html_e('افزودن اسلایدر', 'woodmartplus'); ?>">
</div>