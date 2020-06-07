<?php
/**
 * Video Section options
 *
 * @package Theme Palace
 * @subpackage Architectonic
 * @since Architectonic 1.0.0
 */

// Add Video section
$wp_customize->add_section( 'architectonic_video_section', array(
	'title'             => esc_html__( 'Video','architectonic' ),
	'description'       => esc_html__( 'Video Section options.', 'architectonic' ),
	'panel'             => 'architectonic_front_page_panel',
) );

// Video content enable control and setting
$wp_customize->add_setting( 'architectonic_theme_options[video_section_enable]', array(
	'default'			=> 	$options['video_section_enable'],
	'sanitize_callback' => 'architectonic_sanitize_switch_control',
) );

$wp_customize->add_control( new Architectonic_Switch_Control( $wp_customize, 'architectonic_theme_options[video_section_enable]', array(
	'label'             => esc_html__( 'Video Section Enable', 'architectonic' ),
	'section'           => 'architectonic_video_section',
	'on_off_label' 		=> architectonic_switch_options(),
) ) );

// video title setting and control
$wp_customize->add_setting( 'architectonic_theme_options[video_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> 	$options['video_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'architectonic_theme_options[video_title]', array(
	'label'           	=> esc_html__( 'Title', 'architectonic' ),
	'section'        	=> 'architectonic_video_section',
	'active_callback' 	=> 'architectonic_is_video_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'architectonic_theme_options[video_title]', array(
		'selector'            => '#latest-video .wrapper .section-header h2.section-title',
		'settings'            => 'architectonic_theme_options[video_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'architectonic_video_title_partial',
    ) );
}

// video image setting and control.
$wp_customize->add_setting( 'architectonic_theme_options[video_image]', array(
	'sanitize_callback' => 'architectonic_sanitize_image',
	'default'			=> $options['video_image'],
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'architectonic_theme_options[video_image]',
		array(
		'label'       		=> esc_html__( 'Background Image', 'architectonic' ),
		'description' 		=> sprintf( esc_html__( 'Recommended size: %1$dpx x %2$dpx ', 'architectonic' ), 1920, 1000 ),
		'section'     		=> 'architectonic_video_section',
		'active_callback'	=> 'architectonic_is_video_section_enable',
) ) );

// video url setting and control
$wp_customize->add_setting( 'architectonic_theme_options[video_section_url]', array(
	'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( 'architectonic_theme_options[video_section_url]', array(
	'label'           	=> esc_html__( 'Featured Video URL', 'architectonic' ),
	'description'       => esc_html__( 'Note: Input video url from youtube or media library.', 'architectonic' ),
	'section'        	=> 'architectonic_video_section',
	'active_callback' 	=> 'architectonic_is_video_section_enable',
	'type'				=> 'url',
) );