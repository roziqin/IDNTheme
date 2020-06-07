<?php
/**
 * Blog Section options
 *
 * @package Theme Palace
 * @subpackage Architectonic
 * @since Architectonic 1.0.0
 */

// Add Blog section
$wp_customize->add_section( 'architectonic_blog_section', array(
	'title'             => esc_html__( 'Blog','architectonic' ),
	'description'       => esc_html__( 'Blog Section options.', 'architectonic' ),
	'panel'             => 'architectonic_front_page_panel',
) );

// Blog content enable control and setting
$wp_customize->add_setting( 'architectonic_theme_options[blog_section_enable]', array(
	'default'			=> 	$options['blog_section_enable'],
	'sanitize_callback' => 'architectonic_sanitize_switch_control',
) );

$wp_customize->add_control( new Architectonic_Switch_Control( $wp_customize, 'architectonic_theme_options[blog_section_enable]', array(
	'label'             => esc_html__( 'Blog Section Enable', 'architectonic' ),
	'section'           => 'architectonic_blog_section',
	'on_off_label' 		=> architectonic_switch_options(),
) ) );

// blog title setting and control
$wp_customize->add_setting( 'architectonic_theme_options[blog_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['blog_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'architectonic_theme_options[blog_title]', array(
	'label'           	=> esc_html__( 'Title', 'architectonic' ),
	'section'        	=> 'architectonic_blog_section',
	'active_callback' 	=> 'architectonic_is_blog_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'architectonic_theme_options[blog_title]', array(
		'selector'            => '#latest-posts .section-header h2.section-title',
		'settings'            => 'architectonic_theme_options[blog_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'architectonic_blog_title_partial',
    ) );
}

// Add dropdown category setting and control.
$wp_customize->add_setting(  'architectonic_theme_options[blog_content_category]', array(
	'sanitize_callback' => 'architectonic_sanitize_single_category',
) ) ;

$wp_customize->add_control( new Architectonic_Dropdown_Taxonomies_Control( $wp_customize,'architectonic_theme_options[blog_content_category]', array(
	'label'             => esc_html__( 'Select Category', 'architectonic' ),
	'description'      	=> esc_html__( 'Note: Latest four posts will be shown from selected category', 'architectonic' ),
	'section'           => 'architectonic_blog_section',
	'type'              => 'dropdown-taxonomies',
	'active_callback'	=> 'architectonic_is_blog_section_enable'
) ) );
