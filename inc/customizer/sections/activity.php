<?php
/**
 * activity Section options
 *
 * @package Theme Palace
 * @subpackage Architectonic
 * @since Architectonic 1.0.0
 */

// Add activity section
$wp_customize->add_section( 'architectonic_activity_section', array(
	'title'             => esc_html__( 'Activity','architectonic' ),
	'description'       => esc_html__( 'Activity Section options.', 'architectonic' ),
	'panel'             => 'architectonic_front_page_panel',
) );

// activity content enable control and setting
$wp_customize->add_setting( 'architectonic_theme_options[activity_section_enable]', array(
	'default'			=> 	$options['activity_section_enable'],
	'sanitize_callback' => 'architectonic_sanitize_switch_control',
) );

$wp_customize->add_control( new Architectonic_Switch_Control( $wp_customize, 'architectonic_theme_options[activity_section_enable]', array(
	'label'             => esc_html__( 'Activity Section Enable', 'architectonic' ),
	'section'           => 'architectonic_activity_section',
	'on_off_label' 		=> architectonic_switch_options(),
) ) );

// activity pages drop down chooser control and setting
$wp_customize->add_setting( 'architectonic_theme_options[activity_content_page]', array(
	'sanitize_callback' => 'architectonic_sanitize_page',
) );

$wp_customize->add_control( new Architectonic_Dropdown_Chooser( $wp_customize, 'architectonic_theme_options[activity_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'architectonic' ),
	'section'           => 'architectonic_activity_section',
	'choices'			=> architectonic_page_choices(),
	'active_callback'	=> 'architectonic_is_activity_section_enable',
) ) );

// activity btn title setting and control
$wp_customize->add_setting( 'architectonic_theme_options[activity_btn_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'architectonic_theme_options[activity_btn_title]', array(
	'label'           	=> esc_html__( 'Button Label', 'architectonic' ),
	'section'        	=> 'architectonic_activity_section',
	'active_callback' 	=> 'architectonic_is_activity_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'architectonic_theme_options[activity_btn_title]', array(
		'selector'            => '#activity .read-more a',
		'settings'            => 'architectonic_theme_options[activity_btn_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'architectonic_activity_btn_title_partial',
    ) );
}
