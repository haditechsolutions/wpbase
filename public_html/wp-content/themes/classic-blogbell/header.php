<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Classic BlogBell
 */
/**
* Hook - classic_blogbell_action_doctype.
*
* @hooked classic_blogbell_doctype -  10
*/
do_action( 'classic_blogbell_action_doctype' );
?>
<head>
<?php
/**
* Hook - classic_blogbell_action_head.
*
* @hooked classic_blogbell_head -  10
*/
do_action( 'classic_blogbell_action_head' );
?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<?php

/**
* Hook - classic_blogbell_action_before.
*
* @hooked classic_blogbell_page_start - 10
*/
do_action( 'classic_blogbell_action_before' );

/**
*
* @hooked classic_blogbell_header_start - 10
*/
do_action( 'classic_blogbell_action_before_header' );

/**
*
*@hooked classic_blogbell_site_branding - 10
*@hooked classic_blogbell_header_end - 15 
*/
do_action('classic_blogbell_action_header');

/**
*
* @hooked classic_blogbell_content_start - 10
*/
do_action( 'classic_blogbell_action_before_content' );

/**
 * Banner start
 * 
 * @hooked classic_blogbell_banner_header - 10
*/
do_action( 'classic_blogbell_banner_header' );  
