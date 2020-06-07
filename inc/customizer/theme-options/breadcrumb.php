<?php
/**
 * Breadcrumb options
 *
 * @package Theme Palace
 * @subpackage Architectonic
 * @since Architectonic 1.0.0
 */

$wp_customize->add_section( 'architectonic_breadcrumb', array(
	'title'             => esc_html__( 'Breadcrumb','architectonic' ),
	'description'       => esc_html__( 'Breadcrumb section options.', 'architectonic' ),
	'panel'             => 'architectonic_theme_options_panel',
) );

// Breadcrumb enable setting and control.
$wp_customize->add_setting( 'architectonic_theme_options[breadcrumb_enable]', array(
	'sanitize_callback' => 'architectonic_sanitize_switch_control',
	'default'          	=> $options['breadcrumb_enable'],
) );

$wp_customize->add_control( new Architectonic_Switch_Control( $wp_customize, 'architectonic_theme_options[breadcrumb_enable]', array(
	'label'            	=> esc_html__( 'Enable Breadcrumb', 'architectonic' ),
	'section'          	=> 'architectonic_breadcrumb',
	'on_off_label' 		=> architectonic_switch_options(),
) ) );

// Breadcrumb separator setting and control.
$wp_customize->add_setting( 'architectonic_theme_options[breadcrumb_separator]', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'          	=> $options['breadcrumb_separator'],
) );

$wp_customize->add_control( 'architectonic_theme_options[breadcrumb_separator]', array(
	'label'            	=> esc_html__( 'Separator', 'architectonic' ),
	'active_callback' 	=> 'architectonic_is_breadcrumb_enable',
	'section'          	=> 'architectonic_breadcrumb',
) );
