<?php
/**
 * Latest Section options
 *
 * @package Theme Palace
 * @subpackage Architectonic
 * @since Architectonic 1.0.0
 */

// Add Latest section
$wp_customize->add_section( 'architectonic_latest_section', array(
	'title'             => esc_html__( 'Latest','architectonic' ),
	'description'       => esc_html__( 'Latest Section options.', 'architectonic' ),
	'panel'             => 'architectonic_front_page_panel',
) );

// Latest content enable control and setting
$wp_customize->add_setting( 'architectonic_theme_options[latest_section_enable]', array(
	'default'			=> 	$options['latest_section_enable'],
	'sanitize_callback' => 'architectonic_sanitize_switch_control',
) );

$wp_customize->add_control( new Architectonic_Switch_Control( $wp_customize, 'architectonic_theme_options[latest_section_enable]', array(
	'label'             => esc_html__( 'Latest Section Enable', 'architectonic' ),
	'section'           => 'architectonic_latest_section',
	'on_off_label' 		=> architectonic_switch_options(),
) ) );

// latest title setting and control
$wp_customize->add_setting( 'architectonic_theme_options[latest_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> 	$options['latest_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'architectonic_theme_options[latest_title]', array(
	'label'           	=> esc_html__( 'Title', 'architectonic' ),
	'section'        	=> 'architectonic_latest_section',
	'active_callback' 	=> 'architectonic_is_latest_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'architectonic_theme_options[latest_title]', array(
		'selector'            => '#latest-projects .section-header h2.section-title',
		'settings'            => 'architectonic_theme_options[latest_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'architectonic_latest_title_partial',
    ) );
}

for ( $i = 1; $i <= 3; $i++ ) :
	// latest posts drop down chooser control and setting
	$wp_customize->add_setting( 'architectonic_theme_options[latest_content_post_' . $i . ']', array(
		'sanitize_callback' => 'architectonic_sanitize_page',
	) );

	$wp_customize->add_control( new Architectonic_Dropdown_Chooser( $wp_customize, 'architectonic_theme_options[latest_content_post_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Post %d', 'architectonic' ), $i ),
		'section'           => 'architectonic_latest_section',
		'choices'			=> architectonic_post_choices(),
		'active_callback'	=> 'architectonic_is_latest_section_enable',
	) ) );
endfor;
