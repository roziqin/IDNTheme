<?php
/**
 * pagination options
 *
 * @package Theme Palace
 * @subpackage Architectonic
 * @since Architectonic 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'architectonic_pagination', array(
	'title'               => esc_html__('Pagination','architectonic'),
	'description'         => esc_html__( 'Pagination section options.', 'architectonic' ),
	'panel'               => 'architectonic_theme_options_panel',
) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'architectonic_theme_options[pagination_enable]', array(
	'sanitize_callback' => 'architectonic_sanitize_switch_control',
	'default'             => $options['pagination_enable'],
) );

$wp_customize->add_control( new Architectonic_Switch_Control( $wp_customize, 'architectonic_theme_options[pagination_enable]', array(
	'label'               => esc_html__( 'Pagination Enable', 'architectonic' ),
	'section'             => 'architectonic_pagination',
	'on_off_label' 		=> architectonic_switch_options(),
) ) );

// Site layout setting and control.
$wp_customize->add_setting( 'architectonic_theme_options[pagination_type]', array(
	'sanitize_callback'   => 'architectonic_sanitize_select',
	'default'             => $options['pagination_type'],
) );

$wp_customize->add_control( 'architectonic_theme_options[pagination_type]', array(
	'label'               => esc_html__( 'Pagination Type', 'architectonic' ),
	'section'             => 'architectonic_pagination',
	'type'                => 'select',
	'choices'			  => architectonic_pagination_options(),
	'active_callback'	  => 'architectonic_is_pagination_enable',
) );
