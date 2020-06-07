<?php
/**
 * Latest section
 *
 * This is the template for the content of latest section
 *
 * @package Theme Palace
 * @subpackage Architectonic
 * @since Architectonic 1.0.0
 */
if ( ! function_exists( 'architectonic_add_latest_section' ) ) :
    /**
    * Add latest section
    *
    *@since Architectonic 1.0.0
    */
    function architectonic_add_latest_section() {
    	$options = architectonic_get_theme_options();
        // Check if latest is enabled on frontpage
        $latest_enable = apply_filters( 'architectonic_section_status', true, 'latest_section_enable' );

        if ( true !== $latest_enable ) {
            return false;
        }
        // Get latest section details
        $section_details = array();
        $section_details = apply_filters( 'architectonic_filter_latest_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render latest section now.
        architectonic_render_latest_section( $section_details );
    }
endif;

if ( ! function_exists( 'architectonic_get_latest_section_details' ) ) :
    /**
    * latest section details.
    *
    * @since Architectonic 1.0.0
    * @param array $input latest section details.
    */
    function architectonic_get_latest_section_details( $input ) {
        $options = architectonic_get_theme_options();

        $content = array();
        $post_ids = array();

        for ( $i = 1; $i <= 3; $i++ ) {
            if ( ! empty( $options['latest_content_post_' . $i] ) )
                $post_ids[] = $options['latest_content_post_' . $i];
        }
        
        $args = array(
            'post_type'         => 'post',
            'post__in'          => ( array ) $post_ids,
            'posts_per_page'    => 3,
            'orderby'           => 'post__in',
            'ignore_sticky_posts'   => true,
            );                    


            // Run The Loop.
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) : 
                while ( $query->have_posts() ) : $query->the_post();
                    $page_post['title']     = get_the_title();
                    $page_post['url']       = get_the_permalink();
                    $page_post['excerpt']   = architectonic_trim_content( 15 );
                    $page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'post-thumbnail' ) : '';

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
// latest section content details.
add_filter( 'architectonic_filter_latest_section_details', 'architectonic_get_latest_section_details' );


if ( ! function_exists( 'architectonic_render_latest_section' ) ) :
  /**
   * Start latest section
   *
   * @return string latest content
   * @since Architectonic 1.0.0
   *
   */
   function architectonic_render_latest_section( $content_details = array() ) {
        $options = architectonic_get_theme_options();
        $readmore = ! empty( $options['read_more_text'] ) ? $options['read_more_text'] : esc_html__( 'Read More', 'architectonic' );

        if ( empty( $content_details ) ) {
            return;
        } 
        $count = count( $content_details );
        ?>

        <div id="latest-projects" class="relative page-section">
            <div class="wrapper">
                <?php if ( ! empty( $options['latest_title'] ) ) : ?>
                    <div class="section-header">
                        <h2 class="section-title color-white"><?php echo esc_html( $options['latest_title'] ); ?></h2>
                    </div><!-- .section-header -->
                <?php endif; ?>

                <div class="project-slider <?php echo ( $count < 3 ) ? 'col-' . absint( $count ) : ''; ?>" data-slick='{"slidesToShow": <?php echo ( $count >= 3 ) ? 3 : absint( $count ); ?>, "slidesToScroll": 1, "infinite": false, "speed": 800, "dots": false, "arrows":true, "autoplay": true, "fade": false, "draggable": false }'>
                    <?php foreach ( $content_details as $content ) : ?>
                        <article class="slick-item">
                            <div class="overlay"></div>
                            <?php if ( ! empty( $content['image'] ) ) : ?>
                                <div class="featured-image">
                                    <a href="<?php echo esc_url( $content['url'] ); ?>"><img src="<?php echo esc_url( $content['image'] ); ?>" alt="<?php echo esc_attr( $content['title'] ); ?>"></a>
                                </div><!-- .featured-image -->
                            <?php endif; ?>
                            <div class="entry-container">
                                <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                <div class="entry-content">
                                    <?php echo esc_html( $content['excerpt'] ); ?>
                                </div><!-- .entry-content -->

                                <div class="read-more">
                                    <a href="<?php echo esc_url( $content['url'] ); ?>" class="more-link"><?php echo esc_html( $readmore ); ?></a>
                                </div><!-- .read-more -->
                            </div><!-- .entry-container -->
                        </article><!-- .slick-item -->
                    <?php endforeach; ?>
                </div><!-- .project-slider -->

            </div><!-- .wrapper -->
        </div><!-- #latest-projects -->
        
    <?php }
endif;