<div class="card_header">
   <div class="title">
      <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
         <path d="M14.2821 10.9999C14.2821 12.8149 12.8154 14.2816 11.0004 14.2816C9.18542 14.2816 7.71875 12.8149 7.71875 10.9999C7.71875 9.18493 9.18542 7.71826 11.0004 7.71826C12.8154 7.71826 14.2821 9.18493 14.2821 10.9999Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
         <path d="M10.9999 18.5807C14.2357 18.5807 17.2515 16.6741 19.3507 13.3741C20.1757 12.0816 20.1757 9.90908 19.3507 8.61658C17.2515 5.31658 14.2357 3.40991 10.9999 3.40991C7.76402 3.40991 4.74819 5.31658 2.64902 8.61658C1.82402 9.90908 1.82402 12.0816 2.64902 13.3741C4.74819 16.6741 7.76402 18.5807 10.9999 18.5807Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
      </svg>
      <p><?php esc_html_e( 'آخرین محصولات فروشگاه','woodmartplus' ); ?></p>
   </div>
   <hr>
   <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="btn link_primary" target="_blank">
      <p><?php esc_html_e( 'نمایش بیشتر' , 'woodmartplus' ); ?></p>
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
         <path d="M6.37967 3.95337L2.33301 8.00004L6.37967 12.0467" stroke="currentColor" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
         <path d="M13.6663 8H2.44629" stroke="currentColor" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
      </svg>
   </a>
</div>
<div class="gap-y-2">

      <?php foreach( $products as $product ):  ?>
        <div class="product_card inline_box transparent align_right">
                <div class="product_cover">
                  <div class="product_cover__image">
                    <img src="<?php echo esc_url( $product['image_url'] ); ?>" alt="product iamge">
                  </div>
                </div>
                <div class="product_body">
                  <div class="product_text">
                    <h3 class="product_title"><a href="<?php echo esc_url( $product['permalink'] ); ?>"><?php echo esc_html( $product['title'] ); ?></a></h3>
                    <div class="product_price">
                    <?php if( $product['is_on_sale'] ): ?>
                        <div class="product_offer">
                            <p class="offer_price"><?php echo wc_price( $product['regular_price'] ); ?></p>
                            <div class="offer_box"><?php echo esc_html( $product['percentage'] ); ?>%</div>
                        </div>
                        <p class="product_price__text"><?php echo wc_price( $product['price'] ); ?></p>
                    <?php else: ?>
                      <p class="product_price__text"><?php echo wc_price( $product['price'] ); ?></p>
                    <?php endif; ?>
                    </div>
                  </div>
                  <a href="<?php echo esc_url( $product['permalink'] ); ?>" class="btn solid small">
                        <i class="fa-light fa-cart-shopping"></i>
                  </a>
                </div>
        </div>
         
      <?php endforeach; ?>
</div>