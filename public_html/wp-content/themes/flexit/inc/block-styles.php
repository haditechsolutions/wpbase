<?php
/**
 * Register block styles.
 *
 * @since 1.0.0
 */
function flexit_register_block_styles() {

	$block_styles = array(
		'core/button'          => array(
			'fill-base'    => __( 'Fill Base', 'flexit' ),
			'outline-base' => __( 'Outline Base', 'flexit' ),
		),
		'core/group'           => array(
			'boxshadow'       => __( 'Box Shadow', 'flexit' ),
			'boxshadow-solid' => __( 'Box Shadow Solid', 'flexit' ),
			'full-height'     => __( 'Full-height', 'flexit' ),
		),
		'core/image'           => array(
			'boxshadow' => __( 'Box Shadow', 'flexit' ),
		),
		'core/column'          => array(
			'boxshadow'      => __( 'Box Shadow', 'flexit' ),
			'rounded-corner' => __( 'Rounded Corner with Box Shadow', 'flexit' ),
		),
		'core/list'            => array(
			'no-disc' => __( 'No Disc', 'flexit' ),
		),
		'core/media-text'      => array(
			'boxshadow-media' => __( 'Box Shadow', 'flexit' ),
		),
		'core/navigation-link' => array(
			'fill'         => __( 'Fill', 'flexit' ),
			'fill-base'    => __( 'Fill Base', 'flexit' ),
			'outline'      => __( 'Outline', 'flexit' ),
			'outline-base' => __( 'Outline Base', 'flexit' ),
		),
	);

	foreach ( $block_styles as $block => $styles ) {
		foreach ( $styles as $style_name => $style_label ) {
			register_block_style(
				$block,
				array(
					'name'  => $style_name,
					'label' => $style_label,
				)
			);
		}
	}
}
add_action( 'init', 'flexit_register_block_styles' );

/**
 * Registers block categories, and type.
 *
 * @since 1.0.0
 */
function flexit_register_block_pattern_categories() {

	/* Functionality specific to the Block Pattern Explorer plugin. */
	if ( function_exists( 'register_block_pattern_category_type' ) ) {
		register_block_pattern_category_type( 'flexit', array( 'label' => __( 'Flexit', 'flexit' ) ) );
	}

	$block_pattern_categories = array(
		'flexit-footer'       => array(
			'label'         => __( 'Flexit Footer', 'flexit' ),
			'categoryTypes' => array( 'flexit' ),
		),
		'flexit-general'      => array(
			'label'         => __( 'Flexit General', 'flexit' ),
			'categoryTypes' => array( 'flexit' ),
		),
		'flexit-hero'         => array(
			'label'         => __( 'Flexit Hero', 'flexit' ),
			'categoryTypes' => array( 'flexit' ),
		),
		'flexit-cta'          => array(
			'label'         => __( 'Flexit Call To Action', 'flexit' ),
			'categoryTypes' => array( 'flexit' ),
		),
		'flexit-testimonials' => array(
			'label'         => __( 'Flexit Testimonials', 'flexit' ),
			'categoryTypes' => array( 'flexit' ),
		),
		'flexit-clients'      => array(
			'label'         => __( 'Flexit Clients', 'flexit' ),
			'categoryTypes' => array( 'flexit' ),
		),
		'flexit-price'        => array(
			'label'         => __( 'Flexit Price', 'flexit' ),
			'categoryTypes' => array( 'flexit' ),
		),
		'flexit-team-member'  => array(
			'label'         => __( 'Flexit Team Member', 'flexit' ),
			'categoryTypes' => array( 'flexit' ),
		),
		'flexit-header'       => array(
			'label'         => __( 'Flexit Header', 'flexit' ),
			'categoryTypes' => array( 'flexit' ),
		),
		'flexit-page'         => array(
			'label'         => __( 'Flexit Page', 'flexit' ),
			'categoryTypes' => array( 'flexit' ),
		),
		'flexit-query'        => array(
			'label'         => __( 'Flexit Query', 'flexit' ),
			'categoryTypes' => array( 'flexit' ),
		),
	);

	foreach ( $block_pattern_categories as $name => $properties ) {
		register_block_pattern_category( $name, $properties );
	}
}
add_action( 'init', 'flexit_register_block_pattern_categories', 9 );
