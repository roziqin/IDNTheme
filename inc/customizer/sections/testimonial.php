<?php
/**
 * Testimonial Section options
 *
 * @package Theme Palace
 * @subpackage Architectonic
 * @since Architectonic 1.0.0
 */

// Add Testimonial section
$wp_customize->add_section( 'architectonic_testimonial_section', array(
	'title'             => esc_html__( 'Testimonial','architectonic' ),
	'description'       => esc_html__( 'Testimonial Section options.', 'architectonic' ),
	'panel'             => 'architectonic_front_page_panel',
) );

// Testimonial content enable control and setting
$wp_customize->add_setting( 'architectonic_theme_options[testimonial_section_enable]', array(
	'default'			=> 	$options['testimonial_section_enable'],
	'sanitize_callback' => 'architectonic_sanitize_switch_control',
) );

$wp_customize->add_control( new Architectonic_Switch_Control( $wp_customize, 'architectonic_theme_options[testimonial_section_enable]', array(
	'label'             => esc_html__( 'Testimonial Section Enable', 'architectonic' ),
	'section'           => 'architectonic_testimonial_section',
	'on_off_label' 		=> architectonic_switch_options(),
) ) );

// testimonial title setting and control
$wp_customize->add_setting( 'architectonic_theme_options[testimonial_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> 	$options['testimonial_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'architectonic_theme_options[testimonial_title]', array(
	'label'           	=> esc_html__( 'Title', 'architectonic' ),
	'section'        	=> 'architectonic_testimonial_section',
	'active_callback' 	=> 'architectonic_is_testimonial_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'architectonic_theme_options[testimonial_title]', array(
		'selector'            => '#client-testimonial .section-header h2.section-title',
		'settings'            => 'architectonic_theme_options[testimonial_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'architectonic_testimonial_title_partial',
    ) );
}

for ( $i = 1; $i <= 2; $i++ ) :
	// testimonial pages drop down chooser control and setting
	$wp_customize->add_setting( 'architectonic_theme_options[testimonial_content_page_' . $i . ']', array(
		'sanitize_callback' => 'architectonic_sanitize_page',
	) );

	$wp_customize->add_control( new Architectonic_Dropdown_Chooser( $wp_customize, 'architectonic_theme_options[testimonial_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'architectonic' ), $i ),
		'section'           => 'architectonic_testimonial_section',
		'choices'			=> architectonic_page_choices(),
		'active_callback'	=> 'architectonic_is_testimonial_section_enable',
	) ) );	
endfor;

