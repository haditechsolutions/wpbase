<?php  $order_tracking = wplus_helper::get_setting('order_tracking',[]); ?>
<div class="item p-18 br-bottom">
   <span class="title"><?php esc_html_e('فعال کردن پیگیری سفارش','woodmartplus'); ?></span>
   <p class="des"></p>
   <div class="btn-select">
      <input type="checkbox" class="switch" name="<?php echo wplus_helper::generate_option('[enable-order-tracking]'); ?>"  <?php echo wplus_helper::show_value('enable-order-tracking',false) ? 'checked' : '' ?> >
   </div>
</div>

<div class="item p-top-18">
    <span class="title"><?php esc_html_e('شرکت های پستی','woodmartplus') ?></span>
    <p class="des"><?php esc_html_e('اسامی شرکت های پستی را که سفارش های خود را از آن طریق ارسال می کنید انتخاب کنید','woodmartplus'); ?></p>
    <div>
        <select class="js-example-basic-multiple" name="<?php echo wplus_helper::generate_option('[order_tracking][shipping_company][]'); ?>" multiple="multiple" dir="rtl">
            <?php $shipping_selected =  isset( $order_tracking['shipping_company'] ) && !empty( $order_tracking['shipping_company'] ) ? $order_tracking['shipping_company'] : []; ?>
            <?php foreach( wplus_helper::get_shipping_company() as $key => $value ): ?>               
                <option value="<?php echo esc_attr($key) ?>" <?php echo in_array( $key , $shipping_selected) ? 'selected' : '' ?> ><?php echo esc_html( $value ); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>

<div class="item">
    <div class="manager-sms-wrapper">
        <div class="br-bottom" style="padding-bottom: 18px;">
        <div class="sms-sent-post m-t-18">
            <div class="short-code-text">
                <span class="title">متن پیامک ارسال پستی</span>
                <p class="des">می توانید از این شورت کد ها در متن پیامک استفاده کنید</p>
            </div>
            <div class="sms-sent-post-detailes br-radius-8">
                <p>[shipping_tracking] = شرکت حمل و نقل</p>
                <p>[consignment_tracking] = شماره مرسوله</p>
                <p>[date_tracking] = تاریخ ارسال</p>
                <p>[delivery_mob_tracking] = موبایل پیک</p>
            </div>
        </div>
        <div class="awaiting-payment-immediately br-radius-8 m-t-18">
            <div class="awaiting-payment-immediately-text">
                متن پیامک ارسال پستی
            </div>
            <div class="awaiting-payment-immediately-inp">
                <textarea placeholder="<?php esc_html_e('متن پیامک را وارد کنید.','woodmartplus') ?>" name="<?php echo wplus_helper::generate_option('[order_tracking][post]'); ?>"><?php echo isset( $order_tracking['post'] ) && !empty( $order_tracking['post'] ) ? esc_html( $order_tracking['post'] ) : '' ?></textarea>
            </div>
        </div>
        </div>
        <div class="sms-sent-post m-t-18">
            <div class="short-code-text">
                <span class="title">متن پیامک ارسال با پیک</span>
                <p class="des">می توانید از این شورت کد ها در متن پیامک استفاده کنید</p>
            </div>
            <div class="sms-sent-post-detailes br-radius-8">
                <p>[shipping_tracking] = شرکت حمل و نقل</p>
                <p>[consignment_tracking] = شماره مرسوله</p>
                <p>[date_tracking] = تاریخ ارسال</p>
                <p>[delivery_mob_tracking] = موبایل پیک</p>
            </div>
        </div>
        <div class="awaiting-payment-immediately sms-sent-courier br-radius-8 m-t-18">
            <div class="sms-sent-courier-text">
                متن پیامک ارسال با پیک </div>
            <div class="sms-sent-courier-inp">
                <textarea placeholder="<?php esc_html_e('متن پیامک را وارد کنید.','woodmartplus') ?>" name="<?php echo wplus_helper::generate_option('[order_tracking][delivery]'); ?>"><?php echo isset( $order_tracking['post'] ) && !empty( $order_tracking['delivery'] ) ? esc_html( $order_tracking['delivery'] ) : '' ?></textarea>
            </div>
        </div>
    </div>
</div>