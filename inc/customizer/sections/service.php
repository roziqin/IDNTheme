<?php
/**
 * Service Section options
 *
 * @package Theme Palace
 * @subpackage Architectonic
 * @since Architectonic 1.0.0
 */

// Add Service section
$wp_customize->add_section( 'architectonic_service_section', array(
	'title'             => esc_html__( 'Services','architectonic' ),
	'description'       => esc_html__( 'Services Section options.', 'architectonic' ),
	'panel'             => 'architectonic_front_page_panel',
) );

// Service content enable control and setting
$wp_customize->add_setting( 'architectonic_theme_options[service_section_enable]', array(
	'default'			=> 	$options['service_section_enable'],
	'sanitize_callback' => 'architectonic_sanitize_switch_control',
) );

$wp_customize->add_control( new Architectonic_Switch_Control( $wp_customize, 'architectonic_theme_options[service_section_enable]', array(
	'label'             => esc_html__( 'Service Section Enable', 'architectonic' ),
	'section'           => 'architectonic_service_section',
	'on_off_label' 		=> architectonic_switch_options(),
) ) );

// service title setting and control
$wp_customize->add_setting( 'architectonic_theme_options[service_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['service_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'architectonic_theme_options[service_title]', array(
	'label'           	=> esc_html__( 'Title', 'architectonic' ),
	'section'        	=> 'architectonic_service_section',
	'active_callback' 	=> 'architectonic_is_service_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'architectonic_theme_options[service_title]', array(
		'selector'            => '#our-services .section-header h2.section-title',
		'settings'            => 'architectonic_theme_options[service_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'architectonic_service_title_partial',
    ) );
}

for ( $i = 1; $i <= 3; $i++ ) :

	// service note control and setting
	$wp_customize->add_setting( 'architectonic_theme_options[service_content_icon_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new Architectonic_Icon_Picker( $wp_customize, 'architectonic_theme_options[service_content_icon_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Icon %d', 'architectonic' ), $i ),
		'section'           => 'architectonic_service_section',
		'active_callback'	=> 'architectonic_is_service_section_enable',
	) ) );


	// service posts drop down chooser control and setting
	$wp_customize->add_setting( 'architectonic_theme_options[service_content_post_' . $i . ']', array(
		'sanitize_callback' => 'architectonic_sanitize_page',
	) );

	$wp_customize->add_control( new Architectonic_Dropdown_Chooser( $wp_customize, 'architectonic_theme_options[service_content_post_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Post %d', 'architectonic' ), $i ),
		'section'           => 'architectonic_service_section',
		'choices'			=> architectonic_post_choices(),
		'active_callback'	=> 'architectonic_is_service_section_enable',
	) ) );

	// service hr setting and control
	$wp_customize->add_setting( 'architectonic_theme_options[service_hr_'. $i .']', array(
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new Architectonic_Customize_Horizontal_Line( $wp_customize, 'architectonic_theme_options[service_hr_'. $i .']',
		array(
			'section'         => 'architectonic_service_section',
			'active_callback' => 'architectonic_is_service_section_enable',
			'type'			  => 'hr'
	) ) );
endfor;
