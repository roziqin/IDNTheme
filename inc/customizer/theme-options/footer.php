<?php
/**
 * Footer options
 *
 * @package Theme Palace
 * @subpackage Architectonic
 * @since Architectonic 1.0.0
 */

// Footer Section
$wp_customize->add_section( 'architectonic_section_footer',
	array(
		'title'      			=> esc_html__( 'Footer Options', 'architectonic' ),
		'priority'   			=> 900,
		'panel'      			=> 'architectonic_theme_options_panel',
	)
);

// footer text
$wp_customize->add_setting( 'architectonic_theme_options[copyright_text]',
	array(
		'default'       		=> $options['copyright_text'],
		'sanitize_callback'		=> 'architectonic_santize_allow_tag',
		'transport'				=> 'postMessage',
	)
);
$wp_customize->add_control( 'architectonic_theme_options[copyright_text]',
    array(
		'label'      			=> esc_html__( 'Copyright Text', 'architectonic' ),
		'section'    			=> 'architectonic_section_footer',
		'type'		 			=> 'textarea',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'architectonic_theme_options[copyright_text]', array(
		'selector'            => '.site-info .copyright p',
		'settings'            => 'architectonic_theme_options[copyright_text]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'architectonic_copyright_text_partial',
    ) );
}

// scroll top visible
$wp_customize->add_setting( 'architectonic_theme_options[scroll_top_visible]',
	array(
		'default'       		=> $options['scroll_top_visible'],
		'sanitize_callback' => 'architectonic_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Architectonic_Switch_Control( $wp_customize, 'architectonic_theme_options[scroll_top_visible]',
    array(
		'label'      			=> esc_html__( 'Display Scroll Top Button', 'architectonic' ),
		'section'    			=> 'architectonic_section_footer',
		'on_off_label' 		=> architectonic_switch_options(),
    )
) );