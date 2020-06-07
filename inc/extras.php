<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Theme Palace
 * @subpackage Architectonic
 * @since Architectonic 1.0.0
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function architectonic_body_classes( $classes ) {
	$options = architectonic_get_theme_options();

	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	if ( ( architectonic_is_frontpage() && ! $options['slider_section_enable'] ) || ( ! is_singular() && ! has_header_image() && ! architectonic_is_frontpage() ) || ( is_singular() && ! has_post_thumbnail() && ! has_header_image() && ! architectonic_is_frontpage() ) ) {
		$classes[] = 'top-navigation-classic';
	}

	if ( $options['service_section_enable'] )
		$classes[] = 'services-section-enabled';

	if ( $options['latest_section_enable'] )
		$classes[] = 'latest-projects-section-enabled';

	// Add a class for layout
	$classes[] = esc_attr( $options['site_layout'] );

	// Add a class for sidebar
	$sidebar_position = architectonic_layout();
	$sidebar = 'sidebar-1';
	if ( is_singular() || is_home() ) {
		$id = ( is_home() && ! is_front_page() ) ? get_option( 'page_for_posts' ) : get_the_id();
	  	$sidebar = get_post_meta( $id, 'architectonic-selected-sidebar', true );
	  	$sidebar = ! empty( $sidebar ) ? $sidebar : 'sidebar-1';
	}
	
	if ( is_active_sidebar( $sidebar ) ) {
		$classes[] = esc_attr( $sidebar_position );
	} else {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'architectonic_body_classes' );
