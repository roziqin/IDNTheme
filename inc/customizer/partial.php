<?php
/**
* Partial functions
*
* @package Theme Palace
* @subpackage Architectonic
* @since Architectonic 1.0.0
*/

if ( ! function_exists( 'architectonic_topbar_email_partial' ) ) :
    // topbar email
    function architectonic_topbar_email_partial() {
        $options = architectonic_get_theme_options();
        return esc_html( $options['topbar_email'] );
    }
endif;

if ( ! function_exists( 'architectonic_topbar_phone_partial' ) ) :
    // topbar phone
    function architectonic_topbar_phone_partial() {
        $options = architectonic_get_theme_options();
        return esc_html( $options['topbar_phone'] );
    }
endif;

if ( ! function_exists( 'architectonic_about_btn_title_partial' ) ) :
    // about btn title
    function architectonic_about_btn_title_partial() {
        $options = architectonic_get_theme_options();
        return esc_html( $options['about_btn_title'] );
    }
endif;

if ( ! function_exists( 'architectonic_latest_title_partial' ) ) :
    // latest title
    function architectonic_latest_title_partial() {
        $options = architectonic_get_theme_options();
        return esc_html( $options['latest_title'] );
    }
endif;

if ( ! function_exists( 'architectonic_service_title_partial' ) ) :
    // service title
    function architectonic_service_title_partial() {
        $options = architectonic_get_theme_options();
        return esc_html( $options['service_title'] );
    }
endif;

if ( ! function_exists( 'architectonic_blog_title_partial' ) ) :
    // blog title
    function architectonic_blog_title_partial() {
        $options = architectonic_get_theme_options();
        return esc_html( $options['blog_title'] );
    }
endif;

if ( ! function_exists( 'architectonic_testimonial_title_partial' ) ) :
    // testimonial title
    function architectonic_testimonial_title_partial() {
        $options = architectonic_get_theme_options();
        return esc_html( $options['testimonial_title'] );
    }
endif;

if ( ! function_exists( 'architectonic_video_title_partial' ) ) :
    // video title
    function architectonic_video_title_partial() {
        $options = architectonic_get_theme_options();
        return esc_html( $options['video_title'] );
    }
endif;

if ( ! function_exists( 'architectonic_copyright_text_partial' ) ) :
    // copyright text
    function architectonic_copyright_text_partial() {
        $options = architectonic_get_theme_options();
        return esc_html( $options['copyright_text'] );
    }
endif;
