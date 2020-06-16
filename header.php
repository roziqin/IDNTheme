<?php
	/**
	 * The header for our theme.
	 *
	 * This is the template that displays all of the <head> section and everything up until <div id="content">
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package Theme Palace
	 * @subpackage Architectonic
	 * @since Architectonic 1.0.0
	 */

	/**
	 * architectonic_doctype hook
	 *
	 * @hooked architectonic_doctype -  10
	 *
	 */
	do_action( 'architectonic_doctype' );

?>
<!--</body></html>-->
<head>
<?php
	/**
	 * architectonic_before_wp_head hook
	 *
	 * @hooked architectonic_head -  10
	 *
	 */
	do_action( 'architectonic_before_wp_head' );

	wp_head(); 
?>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/owl.theme.default.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style-custom.css">
</head>
<?php

global $post;
$page_slug1 = $post->post_name;
?>
<body id="<?php echo $page_slug1; ?>" <?php body_class(); ?>>
	<div class="box-loader">
        <div class="loader">Loading..</div>
    </div>
<?php do_action( 'wp_body_open' ); ?>
<?php
	/**
	 * architectonic_page_start_action hook
	 *
	 * @hooked architectonic_page_start -  10
	 *
	 */
	do_action( 'architectonic_page_start_action' ); 

	/**
	 * architectonic_header_action hook
	 *
	 * @hooked architectonic_header_start -  10
	 * @hooked architectonic_site_branding -  20
	 * @hooked architectonic_site_navigation -  30
	 * @hooked architectonic_header_end -  50
	 *
	 */
	do_action( 'architectonic_header_action' );

	/**
	 * architectonic_content_start_action hook
	 *
	 * @hooked architectonic_content_start -  10
	 *
	 */
	do_action( 'architectonic_content_start_action' );

	/**
	 * architectonic_header_image_action hook
	 *
	 * @hooked architectonic_header_image -  10
	 *
	 */
	do_action( 'architectonic_header_image_action' );

    if ( architectonic_is_frontpage() ) {
    	$i = 1;
    	$sections = architectonic_sections();
		foreach ( $sections as $section => $value ) {
			add_action( 'architectonic_primary_content', 'architectonic_add_'. $section .'_section', $i . 0 );
			$i++;
		}
		do_action( 'architectonic_primary_content' ); 
	}