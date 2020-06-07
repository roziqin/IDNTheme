<?php
/**
 * Customizer active callbacks
 *
 * @package Theme Palace
 * @subpackage Architectonic
 * @since Architectonic 1.0.0
 */

if ( ! function_exists( 'architectonic_is_loader_enable' ) ) :
	/**
	 * Check if loader is enabled.
	 *
	 * @since Architectonic 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function architectonic_is_loader_enable( $control ) {
		return $control->manager->get_setting( 'architectonic_theme_options[loader_enable]' )->value();
	}
endif;

if ( ! function_exists( 'architectonic_is_breadcrumb_enable' ) ) :
	/**
	 * Check if breadcrumb is enabled.
	 *
	 * @since Architectonic 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function architectonic_is_breadcrumb_enable( $control ) {
		return $control->manager->get_setting( 'architectonic_theme_options[breadcrumb_enable]' )->value();
	}
endif;

if ( ! function_exists( 'architectonic_is_pagination_enable' ) ) :
	/**
	 * Check if pagination is enabled.
	 *
	 * @since Architectonic 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function architectonic_is_pagination_enable( $control ) {
		return $control->manager->get_setting( 'architectonic_theme_options[pagination_enable]' )->value();
	}
endif;

/**
 * Front Page Active Callbacks
 */

/**
 * Check if topbar section is enabled.
 *
 * @since Architectonic 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function architectonic_is_topbar_section_enable( $control ) {
	return ( $control->manager->get_setting( 'architectonic_theme_options[topbar_section_enable]' )->value() );
}

/**
 * Check if slider section is enabled.
 *
 * @since Architectonic 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function architectonic_is_slider_section_enable( $control ) {
	return ( $control->manager->get_setting( 'architectonic_theme_options[slider_section_enable]' )->value() );
}

/**
 * Check if about section is enabled.
 *
 * @since Architectonic 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function architectonic_is_about_section_enable( $control ) {
	return ( $control->manager->get_setting( 'architectonic_theme_options[about_section_enable]' )->value() );
}

/**
 * Check if latest section is enabled.
 *
 * @since Architectonic 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function architectonic_is_latest_section_enable( $control ) {
	return ( $control->manager->get_setting( 'architectonic_theme_options[latest_section_enable]' )->value() );
}

/**
 * Check if service section is enabled.
 *
 * @since Architectonic 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function architectonic_is_service_section_enable( $control ) {
	return ( $control->manager->get_setting( 'architectonic_theme_options[service_section_enable]' )->value() );
}

/**
 * Check if blog section is enabled.
 *
 * @since Architectonic 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function architectonic_is_blog_section_enable( $control ) {
	return ( $control->manager->get_setting( 'architectonic_theme_options[blog_section_enable]' )->value() );
}

/**
 * Check if testimonial section is enabled.
 *
 * @since Architectonic 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function architectonic_is_testimonial_section_enable( $control ) {
	return ( $control->manager->get_setting( 'architectonic_theme_options[testimonial_section_enable]' )->value() );
}

/**
 * Check if video section is enabled.
 *
 * @since Architectonic 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function architectonic_is_video_section_enable( $control ) {
	return ( $control->manager->get_setting( 'architectonic_theme_options[video_section_enable]' )->value() );
}
