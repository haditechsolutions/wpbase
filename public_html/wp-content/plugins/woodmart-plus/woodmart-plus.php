<?php

/*
Plugin Name: Woodmart Plus
Plugin URI: https://www.rtl-theme.com/author/devwp/products/
Description: new feature for woodmart rtl-theme
Version: 1.11.0
Author: devwp
Author URI: https://www.rtl-theme.com/author/devwp/products/
Text Domain: woodmartplus
Domain Path: languages
*/


define('WPLUS_FILE', __FILE__);
define('DIR_PATH', plugin_dir_path(__FILE__));
define('DIR_URL', plugin_dir_url(__FILE__));

define("WOODPLUS_ASSET", DIR_URL . 'assets/');
define('WOODMARTPLUSOPTION', 'woodmartplus_settings');
define('PHONEMETA', '_wplus_phone');

add_action('plugins_loaded', function () {

    include DIR_PATH . 'inc/save-settings.php';
    include DIR_PATH . 'inc/wplus-helper.php';
    include DIR_PATH . 'inc/init.php';

    new woodmartPlusInit;
});

function core_load_template($view, $data = [])
{

    extract($data);

    $path = str_replace('.', '/', $view);
    include plugin_dir_path(__FILE__) . 'template/' . $path . '.php';
}

function elementor_load_template($view, $data = [])
{

    extract($data);

    $path = str_replace('.', '/', $view);
    include plugin_dir_path(__FILE__) . 'woocommerce/' . $path . '.php';
}

add_action('init', function () {

    load_plugin_textdomain('woodmartplus', false, dirname(plugin_basename(__FILE__)) . '/languages');

    if (is_plugin_active('dokan-lite/dokan.php')) {
        require_once DIR_PATH . 'inc/dokan.php';

        new woodplus_dokan;
    }
});

if (!class_exists('woodmartPlusInit')) {
    include DIR_PATH . '/inc/install.php';
}
