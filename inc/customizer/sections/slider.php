<?php
/**
 * Slider Section options
 *
 * @package Theme Palace
 * @subpackage Architectonic
 * @since Architectonic 1.0.0
 */

// Add Slider section
$wp_customize->add_section( 'architectonic_slider_section', array(
	'title'             => esc_html__( 'Main Slider','architectonic' ),
	'description'       => esc_html__( 'Slider Section options.', 'architectonic' ),
	'panel'             => 'architectonic_front_page_panel',
) );

// Slider content enable control and setting
$wp_customize->add_setting( 'architectonic_theme_options[slider_section_enable]', array(
	'default'			=> 	$options['slider_section_enable'],
	'sanitize_callback' => 'architectonic_sanitize_switch_control',
) );

$wp_customize->add_control( new Architectonic_Switch_Control( $wp_customize, 'architectonic_theme_options[slider_section_enable]', array(
	'label'             => esc_html__( 'Slider Section Enable', 'architectonic' ),
	'section'           => 'architectonic_slider_section',
	'on_off_label' 		=> architectonic_switch_options(),
) ) );

for ( $i = 1; $i <= 3; $i++ ) :
	// slider pages drop down chooser control and setting
	$wp_customize->add_setting( 'architectonic_theme_options[slider_content_page_' . $i . ']', array(
		'sanitize_callback' => 'architectonic_sanitize_page',
	) );

	$wp_customize->add_control( new Architectonic_Dropdown_Chooser( $wp_customize, 'architectonic_theme_options[slider_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'architectonic' ), $i ),
		'section'           => 'architectonic_slider_section',
		'choices'			=> architectonic_page_choices(),
		'active_callback'	=> 'architectonic_is_slider_section_enable',
	) ) );

endfor;
