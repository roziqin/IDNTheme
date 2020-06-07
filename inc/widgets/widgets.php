<?php
/**
 * Theme Palace widgets inclusion
 *
 * This is the template that includes all custom widgets of Architectonic
 *
 * @package Theme Palace
 * @subpackage Architectonic
 * @since Architectonic 1.0.0
 */

/*
 * Add social link widget
 */
require get_template_directory() . '/inc/widgets/social-link-widget.php';
/*
 * Add Latest Posts widget
 */
require get_template_directory() . '/inc/widgets/latest-posts-widget.php';


/**
 * Register widgets
 */
function architectonic_register_widgets() {

	register_widget( 'Architectonic_Latest_Post' );

	register_widget( 'Architectonic_Social_Link' );

}
add_action( 'widgets_init', 'architectonic_register_widgets' );