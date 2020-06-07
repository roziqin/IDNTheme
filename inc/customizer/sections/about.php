<?php
/**
 * About Section options
 *
 * @package Theme Palace
 * @subpackage Architectonic
 * @since Architectonic 1.0.0
 */

// Add About section
$wp_customize->add_section( 'architectonic_about_section', array(
	'title'             => esc_html__( 'About Us','architectonic' ),
	'description'       => esc_html__( 'About Section options.', 'architectonic' ),
	'panel'             => 'architectonic_front_page_panel',
) );

// About content enable control and setting
$wp_customize->add_setting( 'architectonic_theme_options[about_section_enable]', array(
	'default'			=> 	$options['about_section_enable'],
	'sanitize_callback' => 'architectonic_sanitize_switch_control',
) );

$wp_customize->add_control( new Architectonic_Switch_Control( $wp_customize, 'architectonic_theme_options[about_section_enable]', array(
	'label'             => esc_html__( 'About Section Enable', 'architectonic' ),
	'section'           => 'architectonic_about_section',
	'on_off_label' 		=> architectonic_switch_options(),
) ) );

// about pages drop down chooser control and setting
$wp_customize->add_setting( 'architectonic_theme_options[about_content_page]', array(
	'sanitize_callback' => 'architectonic_sanitize_page',
) );

$wp_customize->add_control( new Architectonic_Dropdown_Chooser( $wp_customize, 'architectonic_theme_options[about_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'architectonic' ),
	'section'           => 'architectonic_about_section',
	'choices'			=> architectonic_page_choices(),
	'active_callback'	=> 'architectonic_is_about_section_enable',
) ) );

// about btn title setting and control
$wp_customize->add_setting( 'architectonic_theme_options[about_btn_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'architectonic_theme_options[about_btn_title]', array(
	'label'           	=> esc_html__( 'Button Label', 'architectonic' ),
	'section'        	=> 'architectonic_about_section',
	'active_callback' 	=> 'architectonic_is_about_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'architectonic_theme_options[about_btn_title]', array(
		'selector'            => '#about-us .read-more a',
		'settings'            => 'architectonic_theme_options[about_btn_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'architectonic_about_btn_title_partial',
    ) );
}
