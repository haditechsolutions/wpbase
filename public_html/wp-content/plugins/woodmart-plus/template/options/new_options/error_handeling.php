<div class="item br-bottom p-18">
    <span class="title">
        <?php esc_html__('تغییر متن ارور های ورود و ثبت نام', 'woodmartplus') ?>
    </span>
    <p class="des"><?php esc_html_e('شما میتواینید متن ارور ها را تغییر دهید ، همچنین دقت کنید مواردی که با %s مشخص شده اند حتما استفاده شود', 'woodmartplus') ?></p>
    <p class="desc"><?php esc_html_e('برای مثال (شما حداکثر تلاش را انجام داده اید لطفا %s دیگیر اقدام کنید)', 'woodmartplus') ?></p>
</div>
<?php foreach (wplus_helper::error_generated_key('plugin') as $key => $value): ?>
    <div class="item br-bottom p-18">
        <span class="title"><?php echo $value ?></span>
        <div class="suggestion-inputs gray-inp">
            <input type="text" class="left-text" name="<?php echo wplus_helper::generate_option('[' . $key . ']'); ?>" value="<?php wplus_helper::show_value($key); ?>">
        </div>
    </div>
<?php endforeach; ?>