<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php esc_html_e('Factor page', 'woodmartplus'); ?></title>
    <link rel="stylesheet" href="<?php echo WOODPLUS_ASSET ?>css/all.css">
    <link rel="stylesheet" href="<?php echo WOODPLUS_ASSET ?>css/global-fonts.css">
    <link rel="stylesheet" href="<?php echo WOODPLUS_ASSET ?>css/hint.min.css">
    <link rel="stylesheet" href="<?php echo WOODPLUS_ASSET ?>css/global.css">
    <?php if (!wplus_helper::get_setting('setting_elementor_factor_enable')): ?>
        <link rel="stylesheet" href="<?php echo WOODPLUS_ASSET ?>css/factor.css">
    <?php endif; ?>
    <script src="<?php echo WOODPLUS_ASSET ?>js/jquery.min.js"></script>
    <style>
        :root {
            --color-factor: <?php echo wplus_helper::get_setting('color_factor'); ?>;
            --factor-width: <?php echo wplus_helper::get_setting('width_factor') . 'px'; ?>;
        }

        body {
            font-family: <?php echo wplus_helper::get_setting('font_dashboard');  ?> !important;
        }
    </style>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>



    <div class="container printer-button" style="margin-top:30px">
        <div class="row">
            <div class="col-3">
                <a href="javascript:window.print()" class="header__cart__list__pay__link text-white float-end" style="line-height: 2;
    color: white;">پرینت</a>
            </div>
        </div>
    </div>
    <div class="invoice-1 invoice-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="invoice-inner clearfix">
                        <div class="invoice-info clearfix" id="invoice_wrapper">

                            <?php if (wplus_helper::get_setting('setting_elementor_factor_enable')): ?>
                                <?php do_action('build_something_here'); ?>
                            <?php else: ?>
                                <div class="invoice-headar">
                                    <div class="row g-0">
                                        <div class="col-4 factor-logo-header">
                                            <div class="factor-logo">
                                                <img src="<?php echo $more_manager_info['logo'] ?>" alt="logo" width="50%">
                                            </div>
                                        </div>
                                        <div class="col-4 text-center invoice-title-header">
                                            <div class="invoice-titletwo">
                                                صورتحساب کالا
                                            </div>
                                        </div>
                                        <div class="col-4 text-center invoice-info-style-two">
                                            <div class="factor-date">
                                                <span><?php echo $buyer_info['order_date']['label'] ?> :</span>
                                                <span><?php echo $buyer_info['order_date']['output'] ?></span>
                                            </div>
                                            <div class="factor-num">
                                                <span>شماره فاکتور :</span>
                                                <span><?php echo $order->get_id() ?></span>
                                            </div>
                                            <div class="factor-status">
                                                <span>وضعیت سفارش :</span>
                                                <span><?php echo wc_get_order_status_name($order->get_status()) ?></span>
                                            </div>
                                            <div class="factor-barcode">
                                                <img src="<?php echo $order_barcode; ?>" alt="order_barcode" width="20%">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="invoce-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <table>
                                                <tbody>
                                                    <tr class="info-header-seller-customer">
                                                        <th class="invoice-title-seller">فروشنده</th>
                                                        <th class="invoice-title-customer">خریدار</th>
                                                    </tr>
                                                    <tr class="info-body-seller-customer">
                                                        <th class="seller-data-invoice">
                                                            <?php foreach ($manager_info as $key => $value): ?>
                                                                <span class="seller-title"><?php echo $value['label'] ?> :</span>
                                                                <span><?php echo $value['output'] ?></span>
                                                            <?php endforeach; ?>
                                                        </th>
                                                        <th class="customer-data-invoice">
                                                            <?php foreach ($buyer_info as $value): ?>
                                                                <span class="seller-title"><?php echo $value['label'] ?> :</span>
                                                                <span><?php echo $value['output'] ?></span>
                                                            <?php endforeach; ?>
                                                        </th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <table class="table-info-seller-customer" width="100%">
                                                <thead>
                                                    <tr class="factor-product-title">
                                                        <th>شناسه</th>
                                                        <th>تصویر</th>
                                                        <th>محصول</th>
                                                        <th>قیمت</th>
                                                        <th>مبلغ تخفیف</th>
                                                        <th>تعداد</th>
                                                        <th>مبلغ کل</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1;
                                                    foreach ($items as $key => $item):  ?>
                                                        <?php
                                                        $product = $item->get_product();
                                                        $url    = $product ? wp_get_attachment_url($product->get_image_id()) : '';

                                                        ?>
                                                        <tr class="factor-product-info">
                                                            <td><?php echo esc_html($i) ?>#</td>
                                                            <?php $regular_price = wc_get_order_item_meta($item->get_id(), '_order_product_regular_price', true); ?>
                                                            <td class="text-center"><img src="<?php echo isset($url) && !empty($url) ? esc_url($url) : '' ?>" width="100" height="100" alt=""></td>
                                                            <td><?php echo $item->get_name() ?></td>
                                                            <td><?php echo $regular_price ? wc_price($regular_price) : $order->get_formatted_line_subtotal($item); ?></td>
                                                            <td><?php echo wc_price(wplus_factory::calculateOrderDiscount($item, $order)); ?></td>
                                                            <td><?php echo $item->get_quantity(); ?></td>
                                                            <td><?php echo $order->get_formatted_line_subtotal($item); ?></td>
                                                        </tr>
                                                    <?php $i++;
                                                    endforeach; ?>
                                                    <tr class="factor-product-info total-factor">
                                                        <td class="text-center" colspan="4">کل</td>
                                                        <td class="text-center"><?php echo wc_price($total_discount) ?></td>
                                                        <td class="text-center"><?php echo $total_quantity ?></td>
                                                        <td class="text-end"><?php echo $order->get_subtotal_to_display() ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="col-lg-12">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <table class="invoice-table-cal">

                                                            <tr>
                                                                <td class="title-invoice-cal"> مبلغ کل</td>
                                                                <td class="output-invoice-cal"><?php echo wc_price($order->get_subtotal()); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="title-invoice-cal">مبلغ تخفیف</td>
                                                                <td class="output-invoice-cal"><?php echo wc_price($total_discount) . '<span style="font-size: 9px;" >-مبلغ تخفیف محصولات</span>' ?>

                                                                    <?php foreach ($order->get_coupon_codes() as $coupon_code): ?>
                                                                        <span>کد تخفیف : <?php echo $coupon_code ?></span>
                                                                        <span>تخفیف <?php echo wc_price($order->get_discount_total()) ?>-</span>
                                                                    <?php endforeach; ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="title-invoice-cal">مبلغ حمل و نقل</td>
                                                                <td class="output-invoice-cal">
                                                                    <?php if ($order->get_shipping_total()): ?>
                                                                        <span><?php echo  wc_price($order->get_shipping_total()) . '-'; ?></span>
                                                                    <?php endif; ?>
                                                                    <span><?php echo $order->get_shipping_method(); ?></span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="title-invoice-cal">مبلغ نهایی</td>
                                                                <td class="output-invoice-cal"><?php echo $order->get_formatted_order_total() ?></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="col-sm-8" style="margin-top:23px">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-30 dear-client">
                                                                    <h3 class="inv-title-1">یادداشت مدیر</h3>
                                                                    <p style="font-size:12px"><?php echo $more_manager_info['manager_note'] ?></p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-30">
                                                                    <h3 class="inv-title-1">یادداشت مشتری</h3>
                                                                    <p style="font-size:12px"><?php echo $order->get_customer_note() ?></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php wp_footer(); ?>

</body>

</html>