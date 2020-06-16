<?php
/**
 * Theme Palace options
 *
 * @package Theme Palace
 * @subpackage Architectonic
 * @since Architectonic 1.0.0
 */

/**
 * List of pages for page choices.
 * @return Array Array of page ids and name.
 */
function architectonic_page_choices() {
    $pages = get_pages();
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'architectonic' );
    foreach ( $pages as $page ) {
        $choices[ $page->ID ] = $page->post_title;
    }
    return  $choices;
}

/**
 * List of posts for post choices.
 * @return Array Array of post ids and name.
 */
function architectonic_post_choices() {
    $posts = get_posts( array( 'numberposts' => -1 ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'architectonic' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    return  $choices;
}

if ( ! function_exists( 'architectonic_site_layout' ) ) :
    /**
     * Site Layout
     * @return array site layout options
     */
    function architectonic_site_layout() {
        $architectonic_site_layout = array(
            'wide'  => get_template_directory_uri() . '/assets/images/full.png',
            'boxed' => get_template_directory_uri() . '/assets/images/boxed.png',
        );

        $output = apply_filters( 'architectonic_site_layout', $architectonic_site_layout );
        return $output;
    }
endif;

if ( ! function_exists( 'architectonic_selected_sidebar' ) ) :
    /**
     * Sidebars options
     * @return array Sidbar positions
     */
    function architectonic_selected_sidebar() {
        $architectonic_selected_sidebar = array(
            'sidebar-1'             => esc_html__( 'Default Sidebar', 'architectonic' ),
            'optional-sidebar'      => esc_html__( 'Optional Sidebar', 'architectonic' ),
        );

        $output = apply_filters( 'architectonic_selected_sidebar', $architectonic_selected_sidebar );

        return $output;
    }
endif;

if ( ! function_exists( 'architectonic_global_sidebar_position' ) ) :
    /**
     * Global Sidebar position
     * @return array Global Sidebar position
     */
    function architectonic_global_sidebar_position() {
        $architectonic_global_sidebar_position = array(
            'right-sidebar' => get_template_directory_uri() . '/assets/images/right.png',
            'left-sidebar'  => get_template_directory_uri() . '/assets/images/left.png',
            'no-sidebar'    => get_template_directory_uri() . '/assets/images/full.png',
        );

        $output = apply_filters( 'architectonic_global_sidebar_position', $architectonic_global_sidebar_position );

        return $output;
    }
endif;

if ( ! function_exists( 'architectonic_sidebar_position' ) ) :
    /**
     * Sidebar position
     * @return array Sidbar positions
     */
    function architectonic_sidebar_position() {
        $architectonic_sidebar_position = array(
            'right-sidebar' => get_template_directory_uri() . '/assets/images/right.png',
            'left-sidebar'  => get_template_directory_uri() . '/assets/images/left.png',
            'no-sidebar'    => get_template_directory_uri() . '/assets/images/full.png',
            'no-sidebar-content'   => get_template_directory_uri() . '/assets/images/boxed.png',
        );

        $output = apply_filters( 'architectonic_sidebar_position', $architectonic_sidebar_position );

        return $output;
    }
endif;


if ( ! function_exists( 'architectonic_pagination_options' ) ) :
    /**
     * Pagination
     * @return array site pagination options
     */
    function architectonic_pagination_options() {
        $architectonic_pagination_options = array(
            'numeric'   => esc_html__( 'Numeric', 'architectonic' ),
            'default'   => esc_html__( 'Default(Older/Newer)', 'architectonic' ),
        );

        $output = apply_filters( 'architectonic_pagination_options', $architectonic_pagination_options );

        return $output;
    }
endif;

if ( ! function_exists( 'architectonic_switch_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function architectonic_switch_options() {
        $arr = array(
            'on'        => esc_html__( 'Enable', 'architectonic' ),
            'off'       => esc_html__( 'Disable', 'architectonic' )
        );
        return apply_filters( 'architectonic_switch_options', $arr );
    }
endif;

if ( ! function_exists( 'architectonic_hide_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function architectonic_hide_options() {
        $arr = array(
            'on'        => esc_html__( 'Yes', 'architectonic' ),
            'off'       => esc_html__( 'No', 'architectonic' )
        );
        return apply_filters( 'architectonic_hide_options', $arr );
    }
endif;

if ( ! function_exists( 'architectonic_sortable_sections' ) ) :
    /**
     * List of sections Control options
     * @return array List of Sections control options.
     */
    function architectonic_sections() {
        $sections = array(
            'slider'    => esc_html__( 'Main Slider', 'architectonic' ),
            'activity'  => esc_html__( 'Activity', 'architectonic' ),
            'about'     => esc_html__( 'About Us', 'architectonic' ),
            'latest'    => esc_html__( 'Latest', 'architectonic' ),
            'service'   => esc_html__( 'Services', 'architectonic' ),
            'blog'      => esc_html__( 'Blog', 'architectonic' ),
            'testimonial' => esc_html__( 'Testimonial', 'architectonic' ),
            'video'     => esc_html__( 'Video', 'architectonic' ),
        );
        return apply_filters( 'architectonic_sortable_sections', $sections );
    }
endif;