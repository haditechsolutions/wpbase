<?php

$input   = file_get_contents("php://input");
$request = json_decode($input,true);

global $woocommerce;
            

if (isset($request['os']) && $request['os'] == 'android') {

    if (isset($request['user_id']) && ! empty($request['user_id'])) {
        $user_id         = $request['user_id'];
        $current_user_id = null;
        if(is_user_logged_in()) {
            $current_user_id = get_current_user_id();
        }
        
        if ($current_user_id != $user_id) {
            //wp_destroy_current_session();
            //wp_clear_auth_cookie();
            $user = get_user_by('id', $user_id);
            if ($user) {
                $user_set = wp_set_current_user($user_id, $user->data->user_login);
                 wp_set_auth_cookie($user_id);
				
                $current_user_id = $user_id;
                @do_action( 'wp_login', $user->data->user_login, 10) ;

				if( $user_set  )
				{
					?>
					<script>
						location.reload();
					</script>
					<?php
				}
				
            }
        } 
		

		$user_meta = get_user_meta($current_user_id, '_woocommerce_persistent_cart_1', true);
		
		if( $user_meta )
		{
			$woocommerce->cart->empty_cart();

			foreach($user_meta['cart'] as $cart_item) {

				
				if( $cart_item['variation_id'] )
				{
					$woocommerce->cart->add_to_cart($cart_item['product_id'], $cart_item['quantity'], $cart_item['variation_id'], isset( $cart_item['variation'] ) ? $cart_item['variation'] : []);

				}else{
					$woocommerce->cart->add_to_cart($cart_item['product_id'], $cart_item['quantity']);
				}
			}
		}
    }
}


woodapp_wc_api_remove_admin_bar();?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php echo esc_attr(get_bloginfo( 'charset' )); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="format-detection" content="telephone=no" />
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php echo esc_url(get_bloginfo( 'pingback_url' )); ?>">
<?php $app_color = woodapp_wc_api_get_app_color();?>
<style>
.woodapp-wc-api-app-checkout { background-color:#fff; }
.woodapp-wc-api-app-checkout .woocommerce .woocommerce-checkout-review-order-table .order-total td { color: <?php echo esc_attr($app_color['primary_color'])?> !important; }
.woodapp-wc-api-app-checkout .woocommerce button, input[type="button"], input[type="submit"]{ background-color: <?php echo esc_attr($app_color['secondary_color'])?> !important; }
.woodapp-wc-api-app-checkout .woocommerce .input-text:focus { border-width: 2px; border-color: <?php echo esc_attr($app_color['primary_color'])?> !important; }
/*.woodapp-wc-api-app-checkout .select2-container--default.select2-container--open li:hover{ background-color: <?php //echo esc_attr($app_color['primary_color'])?> !important; }
.woodapp-wc-api-app-checkout .select2-container--default.select2-container--open .select2-results__option--highlighted{ background-color: <?php //echo esc_attr($app_color['primary_color'])?> !important; }*/
.woodapp-wc-api-app-checkout .woocs_auto_switcher{ display: none;}
.wpml-ls-statics-footer{ display: none;}

.woodapp-wc-api-app-checkout .woocommerce .woocommerce-checkout-review-order-table .order-total td .woocommerce-Price-amount bdi  {
	color: <?php echo esc_attr($app_color['secondary_color'])?> !important;
}
.woodapp-wc-api-app-checkout .select2-container--default .select2-results__option[data-selected=true], .woodapp-wc-api-app-checkout .select2-container--default.select2-container--open .select2-results__option--highlighted, .woodapp-wc-api-app-checkout .select2-container--default.select2-container--open li:hover, .select2-container--default.select2-container--open li:focus, .woodapp-wc-api-app-checkout .select2-container--default.select2-container--open li:active {
	background-color: <?php echo esc_attr($app_color['secondary_color'])?> !important;
	color: <?php echo esc_attr($app_color['primary_color'])?> !important;
}

<?php
$is_woodapp_multisteps = is_woodapp_multisteps_checkout_active();
if( $is_woodapp_multisteps ){
    woodapp_wc_api_MultiSteps_Checkout::woodapp_wc_api_wcmc_inline_checkout_style($app_color);
}?>
</style>
<?php wp_head(); ?>
</head>

<body <?php body_class('woodapp-wc-api-app-checkout');?>>
<?php

remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_login_form', 10 );
add_filter( 'woocommerce_checkout_registration_enabled', function( $data ) { return $data = 0; });

// Product thumbnail in checkout
if ( !$woocommerce->cart->is_empty() ) {
	do_action( 'woodapp_wc_api_preloader' );
}
/**
 * Hook: woodapp_wc_api_app_checkout_before_main_content.
 */
do_action( 'woodapp_wc_api_app_checkout_before_main_content' );
	/**
	* Hook: woodapp_wc_api_app_checkout_content_wrapper_start.
	* @hooked woodapp_wc_api_app_checkout_output_content_wrapper_start - 10
	*/
	do_action( 'woodapp_wc_api_app_checkout_content_wrapper_start' );

		/**
		 * Hook: woodapp_wc_api_app_checkout_.
		 */
		do_action( 'woodapp_wc_api_app_checkout_before_content_loop' );

		if ( have_posts() ) :
			if( !$woocommerce->cart->is_empty()){

				while ( have_posts() ) : the_post();
					the_content();
				endwhile; // End of the loop.
			}else{
				esc_html_e( 'سبد خرید شما خالی است', 'woodapp-api' );
			}
		endif;

		/**
		 * Hook: woodapp_wc_api_app_checkout_after_content_loop.
		 */
		do_action( 'woodapp_wc_api_app_checkout_after_content_loop' );

	/**
	* Hook: woodapp_wc_api_app_checkout_content_wrapper_end.
	* @hooked woodapp_wc_api_app_checkout_output_content_wrapper_end - 10
	*/
	do_action( 'woodapp_wc_api_app_checkout_content_wrapper_end' );

/**
 * Hook: woodapp_wc_api_app_checkout_after_main_content.
 */
do_action( 'woodapp_wc_api_app_checkout_after_main_content' );

// header('Location: '.$_SERVER['REQUEST_URI']);
wp_footer();
?>
</body>
</html>
