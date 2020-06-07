<?php
/**
 * Layout options
 *
 * @package Theme Palace
 * @subpackage Architectonic
 * @since Architectonic 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'architectonic_layout', array(
	'title'               => esc_html__('Layout','architectonic'),
	'description'         => esc_html__( 'Layout section options.', 'architectonic' ),
	'panel'               => 'architectonic_theme_options_panel',
) );

// Site layout setting and control.
$wp_customize->add_setting( 'architectonic_theme_options[site_layout]', array(
	'sanitize_callback'   => 'architectonic_sanitize_select',
	'default'             => $options['site_layout'],
) );

$wp_customize->add_control(  new Architectonic_Custom_Radio_Image_Control ( $wp_customize, 'architectonic_theme_options[site_layout]', array(
	'label'               => esc_html__( 'Site Layout', 'architectonic' ),
	'section'             => 'architectonic_layout',
	'choices'			  => architectonic_site_layout(),
) ) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'architectonic_theme_options[sidebar_position]', array(
	'sanitize_callback'   => 'architectonic_sanitize_select',
	'default'             => $options['sidebar_position'],
) );

$wp_customize->add_control(  new Architectonic_Custom_Radio_Image_Control ( $wp_customize, 'architectonic_theme_options[sidebar_position]', array(
	'label'               => esc_html__( 'Global Sidebar Position', 'architectonic' ),
	'section'             => 'architectonic_layout',
	'choices'			  => architectonic_global_sidebar_position(),
) ) );

// Post sidebar position setting and control.
$wp_customize->add_setting( 'architectonic_theme_options[post_sidebar_position]', array(
	'sanitize_callback'   => 'architectonic_sanitize_select',
	'default'             => $options['post_sidebar_position'],
) );

$wp_customize->add_control(  new Architectonic_Custom_Radio_Image_Control ( $wp_customize, 'architectonic_theme_options[post_sidebar_position]', array(
	'label'               => esc_html__( 'Posts Sidebar Position', 'architectonic' ),
	'section'             => 'architectonic_layout',
	'choices'			  => architectonic_sidebar_position(),
) ) );

// Post sidebar position setting and control.
$wp_customize->add_setting( 'architectonic_theme_options[page_sidebar_position]', array(
	'sanitize_callback'   => 'architectonic_sanitize_select',
	'default'             => $options['page_sidebar_position'],
) );

$wp_customize->add_control( new Architectonic_Custom_Radio_Image_Control( $wp_customize, 'architectonic_theme_options[page_sidebar_position]', array(
	'label'               => esc_html__( 'Pages Sidebar Position', 'architectonic' ),
	'section'             => 'architectonic_layout',
	'choices'			  => architectonic_sidebar_position(),
) ) );