<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage Architectonic
 * @since Architectonic 1.0.0
 */

// Add excerpt section
$wp_customize->add_section( 'architectonic_single_post_section', array(
	'title'             => esc_html__( 'Single Post','architectonic' ),
	'description'       => esc_html__( 'Options to change the single posts globally.', 'architectonic' ),
	'panel'             => 'architectonic_theme_options_panel',
) );

// Archive date meta setting and control.
$wp_customize->add_setting( 'architectonic_theme_options[single_post_hide_date]', array(
	'default'           => $options['single_post_hide_date'],
	'sanitize_callback' => 'architectonic_sanitize_switch_control',
) );

$wp_customize->add_control( new Architectonic_Switch_Control( $wp_customize, 'architectonic_theme_options[single_post_hide_date]', array(
	'label'             => esc_html__( 'Hide Date', 'architectonic' ),
	'section'           => 'architectonic_single_post_section',
	'on_off_label' 		=> architectonic_hide_options(),
) ) );

// Archive author meta setting and control.
$wp_customize->add_setting( 'architectonic_theme_options[single_post_hide_author]', array(
	'default'           => $options['single_post_hide_author'],
	'sanitize_callback' => 'architectonic_sanitize_switch_control',
) );

$wp_customize->add_control( new Architectonic_Switch_Control( $wp_customize, 'architectonic_theme_options[single_post_hide_author]', array(
	'label'             => esc_html__( 'Hide Author', 'architectonic' ),
	'section'           => 'architectonic_single_post_section',
	'on_off_label' 		=> architectonic_hide_options(),
) ) );

// Archive author category setting and control.
$wp_customize->add_setting( 'architectonic_theme_options[single_post_hide_category]', array(
	'default'           => $options['single_post_hide_category'],
	'sanitize_callback' => 'architectonic_sanitize_switch_control',
) );

$wp_customize->add_control( new Architectonic_Switch_Control( $wp_customize, 'architectonic_theme_options[single_post_hide_category]', array(
	'label'             => esc_html__( 'Hide Category', 'architectonic' ),
	'section'           => 'architectonic_single_post_section',
	'on_off_label' 		=> architectonic_hide_options(),
) ) );

// Archive tag category setting and control.
$wp_customize->add_setting( 'architectonic_theme_options[single_post_hide_tags]', array(
	'default'           => $options['single_post_hide_tags'],
	'sanitize_callback' => 'architectonic_sanitize_switch_control',
) );

$wp_customize->add_control( new Architectonic_Switch_Control( $wp_customize, 'architectonic_theme_options[single_post_hide_tags]', array(
	'label'             => esc_html__( 'Hide Tag', 'architectonic' ),
	'section'           => 'architectonic_single_post_section',
	'on_off_label' 		=> architectonic_hide_options(),
) ) );
