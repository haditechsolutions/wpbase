<?php $notif_manager = wplus_helper::get_setting('notif_manager',[]); ?>

<div class="item p-18 br-bottom">
   <span class="title"><?php esc_html_e('فعال کردن اعلان سفارش مدیران','woodmartplus'); ?></span>
   <p class="des"></p>
   <div class="btn-select">
      <input type="checkbox" class="switch" name="<?php echo wplus_helper::generate_option('[enable-order-notification-manager]'); ?>"  <?php echo wplus_helper::show_value('enable-order-notification-manager',false) ? 'checked' : '' ?> >
   </div>
</div>

<div class="item p-18 br-bottom">
    <span class="title"><?php esc_html_e('انتخاب شماره تماس مدیران','woodmartplus') ?></span>
    <p class="des"><?php esc_html_e('شماره تماس مدیران را جهت ارسال پیامک وارد کنید. ( میتوانید یک یا چند شماره انتخاب کنید )','woodmartplus'); ?></p>
    <div>
        <select class="js-example-basic-multiple" name="<?php echo wplus_helper::generate_option('[notif_manager][managers-to-send-sms-order][]'); ?>" multiple="multiple" dir="rtl">
            <?php foreach( woodmartPlusInit::get_manager_phone_detail() as $key => $value ): ?>               
                <?php $selected = isset( $notif_manager['managers-to-send-sms-order'] ) && !empty( $notif_manager['managers-to-send-sms-order'] ) ? $notif_manager['managers-to-send-sms-order'] : []; ?>
                <option value="<?php echo esc_attr($key) ?>" <?php echo in_array( $key ,$selected) ? 'selected' : '' ?> ><?php echo esc_html( $value ); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>

<div class="item br-bottom p-18">
   <span class="title">انتخاب وضعیت های ارسال پیامک</span>
   <p class="des">انتخاب کنید که در کدام یک از وضعیت های زیر پیامک ارسال شود.</p>
   <div class="select-sms-setting">
      <div>
         <input type="checkbox" id="Immediately_purchase-cust" class="customer-" name="<?php echo wplus_helper::generate_option('[notif_manager][pending_now]'); ?>" <?php echo isset( $notif_manager['pending_now'] ) && !empty( $notif_manager['pending_now'] ) ? 'checked' : '' ?>>
         <label for="Immediately_purchase-cust" >(بلافاصله بعد از خرید)در انتظار پرداخت</label>
      </div>
      <div>
         <input type="checkbox" id="awaiting_payment_cust" name="<?php echo wplus_helper::generate_option('[notif_manager][pending]'); ?>" <?php echo isset( $notif_manager['pending'] ) && !empty( $notif_manager['pending'] ) ? 'checked' : '' ?>>
         <label for="awaiting_payment_cust">در انتظار پرداخت</label>
      </div>
      <div>
         <input type="checkbox" id="in_progress_cust" name="<?php echo wplus_helper::generate_option('[notif_manager][processing]'); ?>" <?php echo isset( $notif_manager['processing'] ) && !empty( $notif_manager['processing'] ) ? 'checked' : '' ?>>
         <label for="in_progress_cust">در حال انجام</label>
      </div>
      <div>
         <input type="checkbox" id="awaiting_review_cust" name="<?php echo wplus_helper::generate_option('[notif_manager][on-hold]'); ?>" <?php echo isset( $notif_manager['on-hold'] ) && !empty( $notif_manager['on-hold'] ) ? 'checked' : '' ?>>
         <label for="awaiting_review_cust">در انتظار بررسی</label>
      </div>
      <div>
         <input type="checkbox" id="completed_status_cust" name="<?php echo wplus_helper::generate_option('[notif_manager][completed]'); ?>" <?php echo isset( $notif_manager['completed'] ) && !empty( $notif_manager['completed'] ) ? 'checked' : '' ?>>
         <label for="completed_status_cust">تکمیل شده</label>
      </div>
      <div>
         <input type="checkbox" id="canceled_status_cust" name="<?php echo wplus_helper::generate_option('[notif_manager][cancelled]'); ?>" <?php echo isset( $notif_manager['cancelled'] ) && !empty( $notif_manager['cancelled'] ) ? 'checked' : '' ?>>
         <label for="canceled_status_cust">لغو شده</label>
      </div>
      <div>
         <input type="checkbox" id="returned_status_cust" name="<?php echo wplus_helper::generate_option('[notif_manager][refunded]'); ?>" <?php echo isset( $notif_manager['refunded'] ) && !empty( $notif_manager['refunded'] ) ? 'checked' : '' ?>>
         <label for="returned_status_cust">مسترد شده</label>
      </div>
      <div>
         <input type="checkbox" id="unsuccessful-conditions_cust" name="<?php echo wplus_helper::generate_option('[notif_manager][failed]'); ?>" <?php echo isset( $notif_manager['failed'] ) && !empty( $notif_manager['failed'] ) ? 'checked' : '' ?>>
         <label for="unsuccessful-conditions_cust">ناموفق</label>
      </div>
      <div>
         <input type="checkbox" id="draft_sms_cust" name="<?php echo wplus_helper::generate_option('[notif_manager][checkout-draft]'); ?>" <?php echo isset( $notif_manager['checkout-draft'] ) && !empty( $notif_manager['checkout-draft'] ) ? 'checked' : '' ?>>
         <label for="draft_sms_cust">پیشنویس</label>
      </div>
   </div>
</div>

<div class="item">
    <div class="manager-sms-wrapper">
        <div class="short-code br-bottom p-18">
            <div class="short-code-text">
                <span class="title">شورت کد های قابل استفاده</span>
                <p class="des">می توانید از این شورت کد ها در متن پیامک استفاده کنید</p>
            </div>
            <div class="short-code-detailes br-radius-8">
                <p>جزییات سفارش :[billing_phone] = شماره تلفن مشتری ، [billing_email] = ایمیل مشتری ،
                    [billing_status] = وضعیت سفارش[billing_items] = محصولات سفارش ،
                    [billing_all_items_qty] = محصولات سفارش بهمراه تعداد ، [billing_count_items] =</p>
                <br>
                <p> تعداد محصولات سفارش[billing_price] = مبلغ سفارش ، [billing_order_id] = شماره
                    سفارش[billing_date] = تاریخ سفارش ، [billing_customer_not] = توضیحات مشتری ،
                    [billing_payment_method] = روش پرداخت ، [billing_shipping_method] = روش ارسال</p>
                <br>
                <p>جزییات صورت حساب :[billing_first_name] = نام مشتری ، [billing_last_name] = نام
                    خانوادگی مشتری ، [billing_company] = نام شرکت ، [billing_country] =
                    کشور[billing_state] = ایالت/استان ، [billing_city] = شهر ، [billing_address_1] =
                    آدرس 1 ، [billing_address_2] = آدرس 2 ، [billing_postcode] = کد پستی</p>
                <br>
                <p>جزییات حمل و نقل :[shipping_first_name] = نام مشتری ، [shipping_last_name] = نام
                    خانوادگی مشتری ، [shipping_company] = نام شرکت ، [shipping_country] =
                    کشور[shipping_state] = ایالت/استان ، [shipping_city] = شهر ، [shipping_address_1] =
                    آدرس 1 ، [shipping_address_2] = آدرس 2 ، [shipping_postcode] = کد پستی</p>
                <br>
                <p>جزئیات پیگیری سفارش :[consignment_tracking] = شماره مرسوله[shipping_tracking] =
                    شرکت حمل و نقل[date_tracking] = تاریخ ارسال[delivery_mob_tracking] = موبایل پیک
                </p>
            </div>
        </div>
        <div class="awaiting-payment-immediately-cust br-radius-8 m-18">
            <div class="awaiting-payment-immediately-text-cust">(بلافاصله بعد از خرید) در انتظار
                پرداخت</div>
            <div class="awaiting-payment-immediately-inp-cust">
                <textarea placeholder="متن پیامک را وارد کنید." name="<?php echo wplus_helper::generate_option('[notif_manager][message-pending-now]'); ?>"><?php echo isset($notif_manager['message-pending-now']) && !empty( $notif_manager['message-pending-now'] ) ? $notif_manager['message-pending-now'] : '' ?></textarea>
            </div>
        </div>
        <div class="pending-payment-cust br-radius-8 m-18">
            <div class="pending-payment-text-cust">در انتظار پرداخت
                </div>
            <div class="pending-payment-inp-cust">
                <textarea placeholder="متن پیامک را وارد کنید." name="<?php echo wplus_helper::generate_option('[notif_manager][message-pending]'); ?>"><?php echo isset($notif_manager['message-pending']) && !empty( $notif_manager['message-pending'] ) ? $notif_manager['message-pending'] : '' ?></textarea>
            </div>
        </div>
        <div class="in-progress-cust br-radius-8 m-18">
            <div class="in-progress-text-cust">
                در حال انجام</div>
            <div class="in-progress-inp-cust">
                <textarea placeholder="متن پیامک را وارد کنید." name="<?php echo wplus_helper::generate_option('[notif_manager][message-processing]'); ?>"><?php echo isset($notif_manager['message-processing']) && !empty( $notif_manager['message-processing'] ) ? $notif_manager['message-processing'] : '' ?></textarea>
            </div>
        </div>
        <div class="awaiting-review-cust br-radius-8 m-18">
            <div class="awaiting-review-text-cust">
                در انتظار بررسی</div>
            <div class="awaiting-review-inp-cust">
                <textarea placeholder="متن پیامک را وارد کنید." name="<?php echo wplus_helper::generate_option('[notif_manager][message-on-hold]'); ?>"><?php echo isset($notif_manager['message-on-hold']) && !empty( $notif_manager['message-on-hold'] ) ? $notif_manager['message-on-hold'] : '' ?></textarea>
            </div>
        </div>
        <div class="sms-completed-cust br-radius-8 m-18">
            <div class="sms-completed-text-cust">
                تکمیل شده</div>
            <div class="sms-completed-inp-cust">
                <textarea placeholder="متن پیامک را وارد کنید." name="<?php echo wplus_helper::generate_option('[notif_manager][message-completed]'); ?>"><?php echo isset($notif_manager['message-completed']) && !empty( $notif_manager['message-completed'] ) ? $notif_manager['message-completed'] : '' ?></textarea>
            </div>
        </div>
        <div class="sms-canceled-cust br-radius-8 m-18">
            <div class="sms-canceled-text-cust">
                لغو شده</div>
            <div class="sms-canceled-inp-cust">
                <textarea placeholder="متن پیامک را وارد کنید." name="<?php echo wplus_helper::generate_option('[notif_manager][message-cancelled]'); ?>"><?php echo isset($notif_manager['message-cancelled']) && !empty( $notif_manager['message-cancelled'] ) ? $notif_manager['message-cancelled'] : '' ?></textarea>
            </div>
        </div>
        <div class="sms-returned-cust br-radius-8 m-18">
            <div class="sms-returned-text-cust">
                مسترد شده </div>
            <div class="sms-returned-inp-cust">
                <textarea placeholder="متن پیامک را وارد کنید." name="<?php echo wplus_helper::generate_option('[notif_manager][message-refunded]'); ?>"><?php echo isset($notif_manager['message-refunded']) && !empty( $notif_manager['message-refunded'] ) ? $notif_manager['message-refunded'] : '' ?></textarea>
            </div>
        </div>
        <div class="sms-unsuccessful-cust br-radius-8 m-18">
            <div class="sms-unsuccessful-text-cust">
                ناموفق</div>
            <div class="sms-unsuccessful-inp-cust">
                <textarea placeholder="متن پیامک را وارد کنید." name="<?php echo wplus_helper::generate_option('[notif_manager][message-failed]'); ?>"><?php echo isset($notif_manager['message-failed']) && !empty( $notif_manager['message-failed'] ) ? $notif_manager['message-failed'] : '' ?></textarea>
            </div>
        </div>
        <div class="sms-draft-cust br-radius-8 m-t-18">
            <div class="sms-draft-text-cust">
                پیشنویس</div>
            <div class="sms-draft-inp-cust">
                <textarea placeholder="متن پیامک را وارد کنید." name="<?php echo wplus_helper::generate_option('[notif_manager][message-checkout-draft]'); ?>"><?php echo isset($notif_manager['message-checkout-draft']) && !empty( $notif_manager['message-checkout-draft'] ) ? $notif_manager['message-checkout-draft'] : '' ?></textarea>
            </div>
        </div>
    </div>
</div>