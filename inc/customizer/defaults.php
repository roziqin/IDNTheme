<?php
/**
 * Customizer default options
 *
 * @package Theme Palace
 * @subpackage Architectonic
 * @since Architectonic 1.0.0
 * @return array An array of default values
 */

function architectonic_get_default_theme_options() {
	$architectonic_default_options = array(
		// Color Options
		'header_title_color'			=> '#fff',
		'header_tagline_color'			=> '#fff',
		'header_txt_logo_extra'			=> 'show-all',

		// breadcrumb
		'breadcrumb_enable'				=> true,
		'breadcrumb_separator'			=> '/',
		
		// layout 
		'site_layout'         			=> 'wide',
		'sidebar_position'         		=> 'right-sidebar',
		'post_sidebar_position' 		=> 'right-sidebar',
		'page_sidebar_position' 		=> 'right-sidebar',
		'menu_sticky'					=> true,
		'nav_menu_search'				=> true,

		// excerpt options
		'long_excerpt_length'           => 25,
		'read_more_text'           		=> esc_html__( 'Read More', 'architectonic' ),
		
		// pagination options
		'pagination_enable'         	=> true,
		'pagination_type'         		=> 'default',

		// footer options
		'copyright_text'           		=> sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s', '1: Year, 2: Site Title with home URL', 'architectonic' ), '[the-year]', '[site-link]' ),
		'scroll_top_visible'        	=> true,

		// reset options
		'reset_options'      			=> false,
		
		// homepage options
		'enable_frontpage_content' 		=> false,

		// blog/archive options
		'your_latest_posts_title' 		=> esc_html__( 'Blogs', 'architectonic' ),
		'hide_date' 					=> false,
		'hide_author'					=> false,
		'hide_category'					=> false,
		'hide_tags'						=> false,
		'hide_comments'					=> false,

		// single post theme options
		'single_post_hide_date' 		=> false,
		'single_post_hide_author'		=> false,
		'single_post_hide_category'		=> false,
		'single_post_hide_tags'			=> false,

		/* Front Page */

		// topbar
		'topbar_section_enable'			=> false,
		'topbar_email'					=> 'info@themepalace.com',
		'topbar_phone'					=> esc_html__( '+0 00 000000000', 'architectonic' ),


		// Slider
		'slider_section_enable'			=> false,

		// About
		'about_section_enable'			=> false,

		// Latest
		'latest_section_enable'			=> false,
		'latest_title'					=> esc_html__( 'We are working on', 'architectonic' ),

		// service
		'service_section_enable'		=> false,
		'service_title'					=> esc_html__( 'We believe in', 'architectonic' ),

		// blog
		'blog_section_enable'			=> false,
		'blog_title'					=> esc_html__( 'Happening around us', 'architectonic' ),

		// testimonial
		'testimonial_section_enable'	=> false,
		'testimonial_title'				=> esc_html__( 'From our great clients', 'architectonic' ),

		// video
		'video_section_enable'			=> false,
		'video_title'					=> esc_html__( 'Video of the week', 'architectonic' ),
		'video_image'					=> get_template_directory_uri() . '/assets/uploads/video.jpg',

	);

	$output = apply_filters( 'architectonic_default_theme_options', $architectonic_default_options );

	// Sort array in ascending order, according to the key:
	if ( ! empty( $output ) ) {
		ksort( $output );
	}

	return $output;
}