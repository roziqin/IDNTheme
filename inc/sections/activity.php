<?php
/**
 * activity section
 *
 * This is the template for the content of activity section
 *
 * @package Theme Palace
 * @subpackage Architectonic
 * @since Architectonic 1.0.0
 */
if ( ! function_exists( 'architectonic_add_activity_section' ) ) :
    /**
    * Add activity section
    *
    *@since Architectonic 1.0.0
    */
    function architectonic_add_activity_section() {
    	$options = architectonic_get_theme_options();
        // Check if activity is enabled on frontpage
        $activity_enable = apply_filters( 'architectonic_section_status', true, 'activity_section_enable' );

        if ( true !== $activity_enable ) {
            return false;
        }
        // Get activity section details
        $section_details = array();
        $section_details = apply_filters( 'architectonic_filter_activity_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render activity section now.
        architectonic_render_activity_section( $section_details );
    }
endif;

if ( ! function_exists( 'architectonic_get_activity_section_details' ) ) :
    /**
    * activity section details.
    *
    * @since Architectonic 1.0.0
    * @param array $input activity section details.
    */
    function architectonic_get_activity_section_details( $input ) {
        $options = architectonic_get_theme_options();
        
        $content = array();
        $page_id = ! empty( $options['activity_content_page'] ) ? $options['activity_content_page'] : '';
        $args = array(
            'post_type'         => 'page',
            'page_id'           => $page_id,
            'posts_per_page'    => 1,
            );                    

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = architectonic_trim_content( 50 );
                $page_post['content']   = apply_filters( 'the_content', get_the_content() );
                $page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'medium_large' ) : '';

                // Push to the main array.
                array_push( $content, $page_post );
            endwhile;
        endif;
        wp_reset_postdata();
            
        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// activity section content details.
add_filter( 'architectonic_filter_activity_section_details', 'architectonic_get_activity_section_details' );


if ( ! function_exists( 'architectonic_render_activity_section' ) ) :
  /**
   * Start activity section
   *
   * @return string activity content
   * @since Architectonic 1.0.0
   *
   */
   function architectonic_render_activity_section( $content_details = array() ) {
        $options = architectonic_get_theme_options();
        $readmore = ! empty( $options['activity_btn_title'] ) ? $options['activity_btn_title'] : esc_html__( 'Read More', 'architectonic' );

        if ( empty( $content_details ) ) {
            return;
        } 

        foreach ( $content_details as $content ) : ?>
             <div id="activity" class="relative page-section">
                <div class="activity-bg"></div>
                <div class="wrapper">
                    <article class="<?php echo ! empty( $content['image'] ) ? 'has-featured-image' : 'no-featured-image'; ?>">

                        <div class="entry-container">
                            <?php if ( ! empty( $content['title'] ) ) : ?>
                                <div class="section-header">
                                    <h2 class="section-title"><?php echo esc_html( $content['title'] ); ?></h2>
                                </div>
                            <?php endif; 

                            if ( ! empty( $content['excerpt'] ) ) : ?>
                                <div class="entry-content">
                                    <?php echo $content['content']; ?>
                                </div><!-- .entry-content -->
                            <?php endif; ?>
                        </div><!-- .entry-container -->
                    </article>
                    <div class="image-circle"></div>
                </div><!-- .wrapper -->
            </div><!-- #activity -->
        <?php endforeach;
    }
endif;