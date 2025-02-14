<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
$colors = wplus_helper::generate_colors_on_cart($product);

?>

<div class="product_card reverse_card align_right product_carousel_layout_9">
   <div class="product_cover">
      <div class="product_cover__image">
         <a href="<?php echo get_the_permalink(); ?>">
               <?php echo $product->get_image( isset( $settings['product_size'] ) ? $settings['product_size'] : 'woocommerce_thumbnail' ); ?>
         </a>

         <?php if( 'yes' === $settings['show_sale'] ): ?>
            <?php if( $product->is_on_sale() ): ?>
               <div class="product_offer__box"><?php echo esc_html(wplus_helper::_price_discount($product)); ?>%</div>  
            <?php endif; ?>
         <?php endif; ?>

         <?php if( 'yes' === $settings['show_colors'] && !empty( $colors ) ): ?>
              <div class="product_colors">
                <?php foreach( $colors as $color ): if( empty( $color ) ) continue; ?>
                    <div class="product_color" style="<?php echo "background-color:$color"; ?>" ></div>
                <?php endforeach; ?>
              </div>
         <?php endif; ?>
      </div>
   </div>
   <div class="product_body">
   <?php wplus_helper::title_in_product_cart_carousel(); ?>
      <div class="product_middle">
         <?php if( !$product->is_in_stock() ): ?>
            <p class="unavailable_text"><?php echo wplus_helper::get_setting('outofstock_carousel',__('ناموجود','woodmartplus')); ?></p>
         <?php else: ?>
            <?php core_load_template('custom-price.carousel-slider-4'); ?>
            <div class="product_menu">
            <?php wplus_helper::load_custom_add_to_cart_template($product,'loop.carousel-layout-4'); ?>
            
            <?php #if( 'yes' === $settings['show_action_btn'] ): ?>
               <!-- <div class="product_menu__items">
                  <div class="product_menu__options">
                        <?php #if( isset( $settings['choose_btn_card'] ) ):  ?>
                           <?php #foreach( $settings['choose_btn_card'] as $type ):  ?>
                                 <?php #echo ( $type,$product ) ?>
                           <?php #endforeach; ?>
                        <?php #endif ?>
                  </div>
               </div> -->
            <?php #endif; ?>
            </div>
         <?php endif; ?>
      </div>
   </div>
</div>