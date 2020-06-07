<?php
/**
 * Menu options
 *
 * @package Theme Palace
 * @subpackage Architectonic
 * @since Architectonic 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'architectonic_menu', array(
	'title'             => esc_html__('Header Menu','architectonic'),
	'description'       => esc_html__( 'Header Menu options.', 'architectonic' ),
	'panel'             => 'nav_menus',
) );

// Menu sticky setting and control.
$wp_customize->add_setting( 'architectonic_theme_options[menu_sticky]', array(
	'sanitize_callback' => 'architectonic_sanitize_switch_control',
	'default'           => $options['menu_sticky'],
) );

$wp_customize->add_control( new Architectonic_Switch_Control( $wp_customize, 'architectonic_theme_options[menu_sticky]', array(
	'label'             => esc_html__( 'Make Menu Sticky', 'architectonic' ),
	'section'           => 'architectonic_menu',
	'on_off_label' 		=> architectonic_switch_options(),
) ) );

// enable search setting and control.
$wp_customize->add_setting( 'architectonic_theme_options[nav_menu_search]', array(
	'sanitize_callback' => 'architectonic_sanitize_switch_control',
	'default'           => $options['nav_menu_search'],
) );

$wp_customize->add_control( new Architectonic_Switch_Control( $wp_customize, 'architectonic_theme_options[nav_menu_search]', array(
	'label'             => esc_html__( 'Enable Search', 'architectonic' ),
	'section'           => 'architectonic_menu',
	'on_off_label' 		=> architectonic_switch_options(),
) ) );