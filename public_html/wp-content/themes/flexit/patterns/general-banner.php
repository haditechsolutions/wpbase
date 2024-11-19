<?php
/**
 * Title: Banner Section
 * Slug: flexit/general-banner
 * Categories: flexit-banner
 */
?>

<!-- wp:group {"className":"is-style-boxshadow-solid","layout":{"type":"default"}} -->
<div class="wp-block-group is-style-boxshadow-solid"><!-- wp:cover {"url":"<?php echo esc_url( get_theme_file_uri( 'assets/images/banner-image.jpg', 'flexit' ) ); ?>","id":433,"hasParallax":true,"isRepeated":true,"dimRatio":50,"overlayColor":"secondary","isUserOverlayColor":true,"tagName":"section","style":{"color":{"duotone":"unset"}}} -->
<section class="wp-block-cover has-parallax is-repeated" id="banner-image"><span aria-hidden="true" class="wp-block-cover__background has-secondary-background-color has-background-dim"></span><div class="wp-block-cover__image-background wp-image-433 has-parallax is-repeated" style="background-position:50% 50%;background-image:url(<?php echo esc_url( get_theme_file_uri( 'assets/images/banner-image.jpg', 'flexit' ) ); ?>)"></div><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","fontSize":"max-60"} -->
<p class="has-text-align-center has-max-60-font-size"><?php esc_html_e('Simple & Awesome', 'flexit'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><?php esc_html_e('Beautiful, Elegantly Coded', 'flexit'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"fontSize":"small"} -->
<p class="has-text-align-center has-small-font-size" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><?php esc_html_e('Lorem ipsum dolor sit amet elit do, consectetur adipiscing, sed eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'flexit'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"textAlign":"center"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-text-align-center wp-element-button" href="#"><?php esc_html_e('Contact us', 'flexit'); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></section>
<!-- /wp:cover --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"social info","layout":{"type":"constrained"}} -->
<div class="wp-block-group social info"><!-- wp:heading {"textAlign":"center"} -->
<h2 class="wp-block-heading has-text-align-center"><?php esc_html_e('Connect With Us:', 'flexit'); ?></h2>
<!-- /wp:heading -->

<!-- wp:social-links {"showLabels":true,"align":"center"} -->
<ul class="wp-block-social-links aligncenter has-visible-labels"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

<!-- wp:social-link {"url":"#","service":"twitter"} /-->

<!-- wp:social-link {"url":"#","service":"behance"} /-->

<!-- wp:social-link {"url":"#","service":"linkedin"} /-->

<!-- wp:social-link {"url":"#","service":"whatsapp"} /--></ul>
<!-- /wp:social-links --></div>
<!-- /wp:group -->