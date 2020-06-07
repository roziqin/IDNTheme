<?php
/**
 * Topbar Section options
 *
 * @package Theme Palace
 * @subpackage Architectonic
 * @since Architectonic 1.0.0
 */

// Add Topbar section
$wp_customize->add_section( 'architectonic_topbar_section', array(
	'title'             => esc_html__( 'Topbar','architectonic' ),
	'description'       => esc_html__( 'Topbar Section options.', 'architectonic' ),
	'panel'             => 'architectonic_front_page_panel',
) );

// Topbar content enable control and setting
$wp_customize->add_setting( 'architectonic_theme_options[topbar_section_enable]', array(
	'default'			=> 	$options['topbar_section_enable'],
	'sanitize_callback' => 'architectonic_sanitize_switch_control',
) );

$wp_customize->add_control( new Architectonic_Switch_Control( $wp_customize, 'architectonic_theme_options[topbar_section_enable]', array(
	'label'             => esc_html__( 'Topbar Section Enable', 'architectonic' ),
	'section'           => 'architectonic_topbar_section',
	'on_off_label' 		=> architectonic_switch_options(),
) ) );

// topbar email setting and control
$wp_customize->add_setting( 'architectonic_theme_options[topbar_email]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['topbar_email'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'architectonic_theme_options[topbar_email]', array(
	'label'           	=> esc_html__( 'Email ID', 'architectonic' ),
	'section'        	=> 'architectonic_topbar_section',
	'active_callback' 	=> 'architectonic_is_topbar_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'architectonic_theme_options[topbar_email]', array(
		'selector'            => '#top-navigation .widget_contact_info .topbar-email a',
		'settings'            => 'architectonic_theme_options[topbar_email]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'architectonic_topbar_email_partial',
    ) );
}

// topbar phone setting and control
$wp_customize->add_setting( 'architectonic_theme_options[topbar_phone]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['topbar_phone'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'architectonic_theme_options[topbar_phone]', array(
	'label'           	=> esc_html__( 'Phone No.', 'architectonic' ),
	'section'        	=> 'architectonic_topbar_section',
	'active_callback' 	=> 'architectonic_is_topbar_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'architectonic_theme_options[topbar_phone]', array(
		'selector'            => '#top-navigation .widget_contact_info .topbar-phone a',
		'settings'            => 'architectonic_theme_options[topbar_phone]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'architectonic_topbar_phone_partial',
    ) );
}