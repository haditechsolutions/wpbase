<?php
/**
 * Template Name: Custom Home
 */
get_header(); ?>

<main id="skip-content" role="main">

	<?php do_action( 'luzuk_wine_store_above_slider' ); ?>

	<?php if( get_theme_mod('luzuk_wine_store_slider_hide_show') != ''){ ?>
	<section id="slider">	  
		<div class="extimg">
			<div class="row mr-0">
				<div class="col-6 lhsbx">
					<div class="g_bx">
						<?php 
							$newari_image = get_theme_mod('newari_image');

							if(!empty($newari_image)){
								echo '<img alt="'. esc_html(get_the_title()) .'" src="'.esc_url($newari_image).'" class="img-responsive secondry-bg-img" />';
							}else{
								echo '<img alt="newari_image" src="'.get_template_directory_uri().'/assets/images/slidee-L.png" class="img-responsive" />';
							}
						?>
					</div>
				</div>
				<div class="col-6 rhsbx">
					<div class="v_bx">
							
							<?php 
								$newari_image = get_theme_mod('newari_image');

								if(!empty($newari_image)){
									echo '<img alt="'. esc_html(get_the_title()) .'" src="'.esc_url($newari_image).'" class="img-responsive secondry-bg-img" />';
								}else{
									echo '<img alt="newari_image" src="'.get_template_directory_uri().'/assets/images/slidee-R.png" class="img-responsive" />';
								}
							?>
							
						</div>
				</div>
			</div>
		</div>
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			    <?php $luzuk_wine_store_slider_pages = array();
			    for ( $count = 1; $count <= 4; $count++ ) {
			        $mod = intval( get_theme_mod( 'luzuk_wine_store_slider'. $count ));
			        if ( 'page-none-selected' != $mod ) {
			          $luzuk_wine_store_slider_pages[] = $mod;
			        }
			    }
		      	if( !empty($luzuk_wine_store_slider_pages) ) :
			        $args = array(
			          	'post_type' => 'page',
			          	'post__in' => $luzuk_wine_store_slider_pages,
			          	'orderby' => 'post__in'
			        );
		        	$query = new WP_Query( $args );
		        if ( $query->have_posts() ) :
		          	$i = 1;
		    	?>   
		    	<div class="carousel-inner" role="listbox">
		    	<!-- <div class="container">    -->
				   
				      	<?php  while ( $query->have_posts() ) : $query->the_post(); ?>
				        <div <?php if($i == 1){echo 'class="carousel-item fade-in-image active"';} else{ echo 'class="carousel-item fade-in-image"';}?>>										
							<div class="slideimg">
								<?php
									// Check if the post has a thumbnail
									if (has_post_thumbnail()) {
										// If post has thumbnail, display it
										?>
										<img src="<?php echo esc_url(the_post_thumbnail_url('full')); ?>" alt="<?php the_title_attribute(); ?> "/>
										<?php
									} else {
										// If post does not have thumbnail, display default image
										?>
										<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/abt1.jpg'); ?>" alt="Default Image" />
										<?php
									}

								?>
								<div class="slider-overlay"></div>
							</div>		
							<div class="content">
								<!-- <h5></?php echo esc_html(get_theme_mod('luzuk_wine_store_slider_heading')); ?></h5> -->
								<h2><?php the_title(); ?></h2>
								<?php 
									$luzuk_wine_store_slider_excerpt_length = get_theme_mod('luzuk_wine_store_slider_excerpt_length','15');
								
									if( $luzuk_wine_store_slider_excerpt_length != ''){?>
									<p class="mb-0"><?php $luzuk_wine_store_excerpt = get_the_excerpt(); echo esc_html( luzuk_wine_store_string_limit_words( $luzuk_wine_store_excerpt, esc_attr(get_theme_mod('luzuk_wine_store_slider_excerpt_length','15') ) )); ?></p>
								<?php } ?>
								<div class="read-btn sbtn1">
									<a href="<?php echo esc_url(get_theme_mod('luzuk_wine_store_sliderbtnlink')) ?>" >
										<?php _e( 'See More', 'wine-store' ); ?>
									</a>
								</div>
							</div>						
							
				        </div>
				      	<?php $i++; endwhile; 
				      	wp_reset_postdata();?>
				    <!-- </div> -->
			    <?php else : ?>

			    	</div>
			    	<div class="no-postfound"></div>
	      		<?php endif;
			    endif;?>
			
		  	<div class="clearfix"></div>
		</div> 
	</section>
	<?php }?>
	
	<?php do_action('luzuk_wine_store_below_slider'); ?>

	<section id="productcategory-section">
		<div class="container"> 
			<div class="p-sbox">			
				<?php if(class_exists('woocommerce')){ ?>
					<div class="category">
						<div class="pcbox">
							<div class="row mr-0">  
							<?php
							$args = array(
								'number'     => 6,  // Limit to 6 categories
								'orderby'    => 'title',
								'order'      => 'ASC',
								'hide_empty' => false
							);
							$product_categories = get_terms('product_cat', $args);

							$count = count($product_categories);
							$limit = 6; // Set limit to 6
							if ($count > 0) {
								$counter = 0;
								foreach ($product_categories as $product_category) {
									if ($counter >= $limit) break; // Stop loop after 8 categories
									$counter++;

									$image = esc_html(get_template_directory_uri()).'/assets/images/default.png'; // Set default image

									if (function_exists('get_term_meta')) {
										if (isset($product_category->term_id)) {
											// Get the thumbnail ID
											$thumbnail_id = get_term_meta($product_category->term_id, 'thumbnail_id', true);
											if ($thumbnail_id) {
												// Get the image URL for parent category
												$image = wp_get_attachment_url($thumbnail_id);
											}
										}
									}

									if (isset($product_category->name)) {
										echo '<div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-6 item cat-product hvr-float-shadow"> ';
										echo '<div class="pro-cat-img">   
												<a href="' . get_term_link($product_category) . '" data-hover="' . $product_category->name . '">
													<img src="' . $image . '" alt="" width="270" height="377" />
													<div class="pro-cat-content">
														<h5><a href="' . get_term_link($product_category) . '" data-hover="' . $product_category->name . '">
																' . $product_category->name . '
															</a>
														</h5>
													</div>
												</a>
											</div>';
										
										echo '</div>';
									}
								}
							}
							?>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>

				<?php }?>
			</div>
		</div>
	</section>

	<?php do_action('luzuk_wine_store_below_productcategory_section'); ?>

	<section id="newarrivalproducts-section">	 
		<div class="container">
			<div class="S_headingbx">
				<div class="productcategory-head ">
					<?php if(get_theme_mod('luzuk_wine_store_newarrivalproducts_heading') != ''){?>
						<h2><?php echo esc_html(get_theme_mod('luzuk_wine_store_newarrivalproducts_heading')); ?>
						</h2>
					<?php }?>
					<?php if(get_theme_mod('luzuk_wine_store_newarrivalproducts_subheading') != ''){?>
						<h3><?php echo esc_html(get_theme_mod('luzuk_wine_store_newarrivalproducts_subheading')); ?>
						</h3>
					<?php }?>
							
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row mr-0">
				<div class="newrimgbx ">
					<div class="imgbx">
						
						<?php 
							$luzuk_wine_store_bannerimg = get_theme_mod('luzuk_wine_store_bannerimg');

							if(!empty($luzuk_wine_store_bannerimg)){
								echo '<img alt="'. esc_html(get_the_title()) .'" src="'.esc_url($luzuk_wine_store_bannerimg).'" class="img-responsive secondry-bg-img" />';
							}else{
								echo '<img alt="newari_image" src="'.get_template_directory_uri().'/assets/images/new-arrival.jpg" class="img-responsive" />';
							}
						?>
						<div class="disbx"> <?php echo esc_html(get_theme_mod('luzuk_wine_store_newarrivalproducts_banneroffertext')); ?></div>
					</div>
					<div class="imgbx_con">
						<div class="title"><?php echo esc_html(get_theme_mod('luzuk_wine_store_newarrivalproducts_bannertitle')); ?></div>
						<div class="btn">
							<a href="<?php echo esc_url(get_theme_mod('luzuk_wine_store_newarrivalproducts_btnlink')) ?>" >
								<?php _e( 'Shop Now', 'wine-store' ); ?>
							</a>
						</div>
					</div>
				</div>
				<div class="newarrivalproductsbx">
					<div class="newarrivalproductsus-post-wrap">
						<div class="newarrivalproductsus-post-boxes">

							<div class="row owl-carousel owl-theme mr-0">
								<?php
								if (function_exists('woocommerce_template_loop_add_to_cart') && function_exists('WC')) {
									// Query to fetch new arrival products
									$args = array(
										'post_type' => 'product',
										'posts_per_page' => 3,
										'orderby' =>'date',
										'order' => 'DESC',
										'meta_query' => array(
											array(
												'key' => '_stock_status',
												'value' => 'instock'
											)
										)
									);
									$loop = new WP_Query($args);
									if ($loop->have_posts()) {
										while ($loop->have_posts()) : $loop->the_post(); global $product;
											?>
											<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 item newarproductsbx wow zoomIn" data-wow-duration="1s">
												<div class="newarrivalproductsus-single">
													<div class="newarrivalproducts-box"> 
														<div class="hi-icon">
															<a id="id-<?php the_id(); ?>" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
																<?php if (has_post_thumbnail($loop->post->ID)) {
																	echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog');
																} else {
																	echo '<img src="' . get_template_directory_uri() . '/images/new-arrival.jpg" alt="featured products" />';
																} ?>
															</a>
														</div>
													</div> 
													
													<div class="pcontent">
														<a class="add-to-cart" id="id-<?php the_id(); ?>" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">    
															<h3><?php the_title(); ?></h3>
														</a>
														<div class="Pr_bx">
															<?php 
																if ( $product->is_on_sale() ) {
																	echo '<span class="price">' . wc_price( $product->get_sale_price() ) . '</span>';
																} 
															?>
														</div>
														<div class="btn-rentadress">
															<a class="cart-contents" href="<?php the_permalink(); ?>"><?php echo esc_html('Add to Cart','wine-store'); ?></a>
														</div>
													</div>             
												</div>
											</div>
										<?php endwhile;
									} else {
										// No new arrival products found
										echo '<div class="item">';
										echo '<p>No new arrival products found.</p>';
										echo '</div>';
									}
								}
								?>
							</div> 							
						</div> 
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php do_action('luzuk_wine_store_below_newarrivalproducts_section'); ?>

	<div class="container">
	  	<?php while ( have_posts() ) : the_post(); ?>
	  		<div class="lz-content">
	        	<?php the_content(); ?>
	        </div>
	    <?php endwhile; // end of the loop. ?>
	</div>
</main>

<?php get_footer(); ?>