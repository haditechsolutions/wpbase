<?php
/**
 * Title: Footer
 * Slug: flexit/footer
 * Categories: flexit-footer
 */

?>
<!-- wp:group {"align":"full","style":{"typography":{"fontSize":"18px"},"spacing":{"margin":{"top":"0px"}}},"backgroundColor":"main","layout":{"inherit":true,"type":"constrained"}} -->
<div class="wp-block-group alignfull has-main-background-color has-background" style="margin-top:0px;font-size:18px"><!-- wp:columns {"align":"wide","style":{"elements":{"link":{"color":[]}},"spacing":{"padding":{"top":"100px","bottom":"100px"},"blockGap":"100px"}}} -->
<div class="wp-block-columns alignwide has-link-color" style="padding-top:100px;padding-bottom:100px"><!-- wp:column {"width":"30%"} -->
<div class="wp-block-column" style="flex-basis:30%"><!-- wp:heading {"level":4,"style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base"} -->
<h4 class="wp-block-heading has-base-color has-text-color has-link-color" id="our-company"><?php esc_html_e('Our Company', 'flexit'); ?></h4>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base"} -->
<p class="has-base-color has-text-color has-link-color"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing lectus. Vestibulum mi justo, luctus eu pellentesque vitae gravida non.', 'flexit'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"base","textColor":"main","className":"is-style-outline","style":{"elements":{"link":{"color":{"text":"var:preset|color|main"}}}}} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-main-color has-base-background-color has-text-color has-background has-link-color wp-element-button" href="#"><?php esc_html_e('Learn More', 'flexit'); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"30%"} -->
<div class="wp-block-column" style="flex-basis:30%"><!-- wp:heading {"level":4,"style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base"} -->
<h4 class="wp-block-heading has-base-color has-text-color has-link-color" id="about-us"><?php esc_html_e('About Us', 'flexit'); ?></h4>
<!-- /wp:heading -->

<!-- wp:list {"style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base","fontSize":"small"} -->
<ul class="wp-block-list has-base-color has-text-color has-link-color has-small-font-size"><!-- wp:list-item -->
<li><a href="#"><?php esc_html_e('Start Here', 'flexit'); ?></a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="#"><?php esc_html_e('Our Mission', 'flexit'); ?></a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="#"><?php esc_html_e('Brand Guide', 'flexit'); ?></a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="#"><?php esc_html_e('Newsletter', 'flexit'); ?></a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="#"><?php esc_html_e('Accessibility', 'flexit'); ?></a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"33%"} -->
<div class="wp-block-column" style="flex-basis:33%"><!-- wp:heading {"level":4,"style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base"} -->
<h4 class="wp-block-heading has-base-color has-text-color has-link-color" id="services"><?php esc_html_e('Services', 'flexit'); ?></h4>
<!-- /wp:heading -->

<!-- wp:list {"style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base","fontSize":"small"} -->
<ul class="wp-block-list has-base-color has-text-color has-link-color has-small-font-size"><!-- wp:list-item -->
<li><a href="#"><?php esc_html_e('Web Design', 'flexit'); ?></a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="#"><?php esc_html_e('Development', 'flexit'); ?></a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="#"><?php esc_html_e('Copywriting', 'flexit'); ?></a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="#"><?php esc_html_e('Marketing', 'flexit'); ?></a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="#"><?php esc_html_e('Social Media', 'flexit'); ?></a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"40px","bottom":"40px"},"margin":{"top":"0px"}}},"backgroundColor":"secondary","fontSize":"small","layout":{"inherit":true,"type":"constrained"}} -->
<div class="wp-block-group alignfull has-secondary-background-color has-background has-small-font-size" style="margin-top:0px;padding-top:40px;padding-bottom:40px"><!-- wp:group {"align":"wide","layout":{"type":"flex","allowOrientation":false,"justifyContent":"space-between"}} -->
<div class="wp-block-group alignwide"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base"} -->
<p class="has-base-color has-text-color has-link-color"><?php printf(esc_html__('Copyright © %s - WordPress Theme by', 'flexit'), date('Y')); ?> <a href="<?php esc_url(home_url('/')); ?>"><?php esc_html_e('Flexit', 'flexit'); ?></a></p>
<!-- /wp:paragraph -->

<!-- wp:social-links {"iconColor":"base","iconColorValue":"#fff","iconBackgroundColor":"main","iconBackgroundColorValue":"#000","showLabels":true,"className":"is-style-default","style":{"spacing":{"blockGap":"10px"}}} -->
<ul class="wp-block-social-links has-visible-labels has-icon-color has-icon-background-color is-style-default"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

<!-- wp:social-link {"url":"#","service":"instagram"} /-->

<!-- wp:social-link {"url":"#","service":"twitter"} /--></ul>
<!-- /wp:social-links --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->