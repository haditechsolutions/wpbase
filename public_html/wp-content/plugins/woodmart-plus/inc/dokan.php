<?php

class woodplus_dokan
{

    public function __construct()
    {
        remove_action('woocommerce_account_dashboard', 'dokan_set_go_to_vendor_dashboard_btn');
        add_action('woocommerce_account_dashboard', [$this, 'woodplus_dokan_set_go_to_vendor_dashboard_btn']);
        add_filter('dokan_get_template_part', [$this, 'load_dokan_tempalte'], 999, 3);
    }

    public function woodplus_dokan_set_go_to_vendor_dashboard_btn()
    {
        if (! dokan_is_user_seller(get_current_user_id())) {
            return;
        }

?>
        <div class="white_card">
            <div class="card_header">
                <div class="title">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="23" viewBox="0 0 22 23" fill="none">
                        <path d="M2.75879 10.785V14.9009C2.75879 19.0167 4.40879 20.6667 8.52462 20.6667H13.4655C17.5813 20.6667 19.2313 19.0167 19.2313 14.9009V10.785" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M11.0001 11.5C12.6776 11.5 13.9151 10.1342 13.7501 8.45671L13.1451 2.33337H8.86428L8.25011 8.45671C8.08511 10.1342 9.32261 11.5 11.0001 11.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M16.7842 11.5C18.6359 11.5 19.9926 9.99671 19.8092 8.15421L19.5526 5.63337C19.2226 3.25004 18.3059 2.33337 15.9042 2.33337H13.1084L13.7501 8.75921C13.9059 10.2717 15.2717 11.5 16.7842 11.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M5.16953 11.5C6.68203 11.5 8.04786 10.2717 8.19453 8.75921L8.39619 6.73337L8.83619 2.33337H6.04036C3.63869 2.33337 2.72203 3.25004 2.39203 5.63337L2.14453 8.15421C1.96119 9.99671 3.31786 11.5 5.16953 11.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M10.9997 16.0834C9.46884 16.0834 8.70801 16.8442 8.70801 18.375V20.6667H13.2913V18.375C13.2913 16.8442 12.5305 16.0834 10.9997 16.0834Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    <p><?php esc_html_e('Go to Vendor Dashboard', 'dokan-lite'); ?></strong></p>
                </div>
            </div>
            <a href="<?php echo esc_url(dokan_get_navigation_url()); ?>" class="btn solid small">
                <?php esc_html_e('Go to Vendor Dashboard', 'dokan-lite'); ?>
            </a>
        </div>
<?php
    }

    public function load_dokan_tempalte($template, $template_name, $template_path)
    {

        if (strpos($template, 'become-a-vendor-section')) {
            $template = DIR_PATH . 'template/dokan/become-a-vendor-section.php';
        }

        if (strpos($template, 'update-customer-to-vendor')) {
            $template = DIR_PATH . 'template/dokan/update-customer-to-vendor.php';
        }


        return $template;
    }
}
