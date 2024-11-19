<?php
/**
 * The header for our theme
 *
 * @subpackage Wine Store
 * @since 1.0
 * @version 0.1
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
} else {
    do_action( 'wp_body_open' );
}?>

<a class="screen-reader-text skip-link" href="#skip-content"><?php esc_html_e( 'Skip to content', 'wine-store' ); ?></a>
<div id="header">
	<div class="main-header">
		<div class="announcement-bar ">	
			<div class="container">
				<div class="row mr-0">
					<div class="col-lg-7 col-md-5 col-sm-12 col-12">
						<div id="mail-container">
							<div class="mail">
								<?php
									$header_mailtext = esc_html(get_theme_mod('luzuk_wine_store_header_mailtext', 'Email:'));
									$header_mail = esc_html(get_theme_mod('luzuk_wine_store_header_mail', 'demo@example.com'));
								?>
								<?php if($header_mail) { ?>
									<i class="fas fa-envelope"></i>
									<a href="mailto:<?php echo $header_mail ?>"><div class="num tooltiptext"><span><?php echo $header_mailtext ?></span> <?php echo $header_mail ?></div>								
									</a>
								<?php } ?>
							</div>
						</div>
					</div>
					<div class="col-lg-5 col-md-7 col-sm-12 col-12 ">		
						<div class="row mr-0">	
							<div class="col-lg-8 col-md-7 col-sm-8 col-8 pd-0">		
								<div id="phn-container">
									<div class="phn">
										<?php
											$header_phntext = esc_html(get_theme_mod('luzuk_wine_store_header_phntext', 'Phone:'));
											$header_phn = esc_html(get_theme_mod('luzuk_wine_store_header_phn', '(00) 123-456-789'));
										?>
										<?php if($header_phn) { ?>
											<i class="fas fa-phone"></i>
											<a href="tel:<?php echo $header_phn ?>"><div class="num tooltiptext"><span><?php echo $header_phntext ?></span> <?php echo $header_phn ?></div>
												
											</a>
										<?php } ?>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="col-lg-4 col-md-5 col-sm-4 col-4">	
								<div class="sicn_bx">
									<button type="button" class="share-icn"><i class="fa fa-share-alt" aria-hidden="true"></i> </button>
									<div class="social-icon">
										<li>
											<a href="<?php echo esc_html(get_theme_mod('luzuk_wine_store_header_twittericonlink')); ?>">
												<i class="fab fa-twitter"></i>
											</a>
										</li>
										<li>
											<a href="<?php echo esc_html(get_theme_mod('luzuk_wine_store_header_instagramiconlink')); ?>">
												<i class="fab fa-instagram"></i>
											</a>
										</li>
										<li>
											<a href="<?php echo esc_html(get_theme_mod('luzuk_wine_store_header_facebookiconlink')); ?>">
												<i class="fab fa-facebook-f"></i>
											</a>
										</li>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="top-head">
			<div class="container">
				<div class="row m-0 m-center">
					<div class="col-lg-5 col-md-5 col-sm-2 col-2 pd-0">
						<div class="m-head">
							<div class="row mr-0">
								<div class="header-inner section-inner">
									<div class="header-titles-wrapper">
										<?php if ( has_nav_menu( 'primary' ) ) { ?>
											<button class="toggle nav-toggle mobile-nav-toggle" data-toggle-target=".menu-modal"  data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle">
												<span class="toggle-inner">
													<span class="toggle-icon">
														<i class="fas fa-bars"></i>
													</span>
													<!-- <span class="toggle-text"><//?php _e( 'Menu', 'wine-store' ); ?></span> -->
												</span>
											</button><!-- .nav-toggle -->
										<?php } ?>
									</div><!-- .header-titles-wrapper -->

									<div class="header-navigation-wrapper">
										<?php
										if ( has_nav_menu( 'primary' ) || ! has_nav_menu( 'expanded' ) ) {
											?>
											<nav class="primary-menu-wrapper" aria-label="<?php echo esc_attr_x( 'Horizontal', 'menu', 'wine-store' ); ?>">
												<ul class="primary-menu reset-list-style">
													<?php
													if ( has_nav_menu( 'primary' ) ) {

														wp_nav_menu(
															array(
																'container'  => '',
																'items_wrap' => '%3$s',
																'theme_location' => 'primary',
																'walker'     => new Custom_Walker_Nav_Menu(),
															)
														);
											

													} else { ?>

														<!-- Show "Add Menu" link if the primary menu does not exist -->
														<p class="no-primary-menu">
															<a href="<?php echo esc_url(admin_url('nav-menus.php')); ?>" class="add-menu-link">
																<?php _e( 'Add Menu and Checked Primary Text', 'wine-store' ); ?>
															</a>
														</p>

													<?php } ?>
												</ul>
											</nav><!-- .primary-menu-wrapper -->
										<?php } ?>
									</div><!-- .header-navigation-wrapper -->

								</div><!-- .header-inner -->

								<?php if ( has_nav_menu( 'primary' ) ) {
									// Output the menu modal.
									get_template_part( '/inc/modal-menu' );
								}?>
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-8 col-8 pd-0">
						<div class="logo ">
							<?php if ( has_custom_logo() ) : ?>
								<?php the_custom_logo(); ?>
							<?php endif; ?>
							<?php if (get_theme_mod('luzuk_wine_store_show_site_title',true)) {?>
								<?php $blog_info = get_bloginfo( 'name' ); ?>
								<?php if ( ! empty( $blog_info ) ) : ?>
									<?php if ( is_front_page() && is_home() ) : ?>
										<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
									<?php else : ?>
										<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
									<?php endif; ?>
								<?php endif; ?>
							<?php }?>
							<?php if (get_theme_mod('luzuk_wine_store_show_tagline',true)) {?>
								<?php $description = get_bloginfo( 'description', 'display' );
								if ( $description || is_customize_preview() ) : ?>
									<p class="site-description"><?php echo esc_html($description); ?></p>
								<?php endif; ?>
							<?php }?>
						</div>
					</div>
					<div class="col-lg-5 col-md-5 col-sm-2 col-2 pd-0">
						<div class="row mr-0">
							<div class="col-lg-9 col-md-6 col-sm-12">

								<?php if ( has_nav_menu( 'primary' ) ) { ?>

									<nav class="primary-navigation">
										<?php
										wp_nav_menu(array(
											'theme_location' => 'primary',
											'menu_class'     => 'primary-menu-class',
										));
										?>
									</nav>

								<?php } else { ?>

									<!-- Show "Add Menu" link if the primary menu does not exist -->
									<p class="no-primary-menu">
										<a href="<?php echo esc_url(admin_url('nav-menus.php')); ?>" class="add-menu-link">
											<?php _e( 'Add Menu and Checked Primary Text', 'wine-store' ); ?>
										</a>
									</p>

								<?php } ?>

									
								


							</div>
							
							
							<div class="col-lg-3 col-md-6">
								<div class="shp-c">
									<li>
										<div class="cartbtn">
											<?php if(class_exists('woocommerce')){ ?>
												<div class="cart">
													<!-- <div class="count"><?php echo wp_kses_data( WC()->cart->get_cart_contents_count() );?></div> -->
													<a class="cart-contents" href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>"><i class="far fa-shopping-cart"></i>
													</a>
													<!-- <li class="cart_box">
														<span class="cart-value"> <?php echo wp_kses_data( WC()->cart->get_cart_contents_count() );?></span>
													</li> -->
												</div>
											<?php }?>
										</div>
									</li>
									<li>
										<div class="signinregister">
											<div class="signinregisterinnbx">
											<?php if ( class_exists( 'WooCommerce' ) ) { ?>
												<a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>">
													<p><i class="fas fa-user-circle"></i><span class="signinregistertxt"></span></p>
												</a>
											<?php } ?>
											</div>
										</div>
									</li>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>		
	</div>
</div>


<script type="text/javascript">
    $( document ).ready(function() {
     $( " .main-header .share-icn" ).click(function(e) {
         $('.main-header .social-icon').not($(this).next( ".main-header .social-icon" )).each(function(){
            $(this).removeClass("active");
         });
     
            $(this).next( ".main-header .social-icon" ).toggleClass( "active" );
    });   
});
</script>

<?php if(is_singular()) {?>
	<div id="inner-pages-header">
		<div class="header-overlay"></div>
	    <div class="header-content">
		    <div class="container"> 
		      	<h1><?php single_post_title(); ?></h1>
		      	<div class="innheader-border"></div>
		      	<div class="theme-breadcrumb mt-2">
					<?php luzuk_wine_store_breadcrumb();?>
				</div>
		    </div>
		</div>
	</div>
<?php } ?>

