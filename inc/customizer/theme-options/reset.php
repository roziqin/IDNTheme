<?php
/**
 * Reset options
 *
 * @package Theme Palace
 * @subpackage Architectonic
 * @since Architectonic 1.0.0
 */

/**
* Reset section
*/
// Add reset enable section
$wp_customize->add_section( 'architectonic_reset_section', array(
	'title'             => esc_html__('Reset all settings','architectonic'),
	'description'       => esc_html__( 'Caution: All settings will be reset to default. Refresh the page after clicking Save & Publish.', 'architectonic' ),
) );

// Add reset enable setting and control.
$wp_customize->add_setting( 'architectonic_theme_options[reset_options]', array(
	'default'           => $options['reset_options'],
	'sanitize_callback' => 'architectonic_sanitize_checkbox',
	'transport'			  => 'postMessage',
) );

$wp_customize->add_control( 'architectonic_theme_options[reset_options]', array(
	'label'             => esc_html__( 'Check to reset all settings', 'architectonic' ),
	'section'           => 'architectonic_reset_section',
	'type'              => 'checkbox',
) );
