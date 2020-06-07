<?php
/**
 * Testimonial section
 *
 * This is the template for the content of testimonial section
 *
 * @package Theme Palace
 * @subpackage Architectonic
 * @since Architectonic 1.0.0
 */
if ( ! function_exists( 'architectonic_add_testimonial_section' ) ) :
    /**
    * Add testimonial section
    *
    *@since Architectonic 1.0.0
    */
    function architectonic_add_testimonial_section() {
    	$options = architectonic_get_theme_options();
        // Check if testimonial is enabled on frontpage
        $testimonial_enable = apply_filters( 'architectonic_section_status', true, 'testimonial_section_enable' );

        if ( true !== $testimonial_enable ) {
            return false;
        }
        // Get testimonial section details
        $section_details = array();
        $section_details = apply_filters( 'architectonic_filter_testimonial_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render testimonial section now.
        architectonic_render_testimonial_section( $section_details );
    }
endif;

if ( ! function_exists( 'architectonic_get_testimonial_section_details' ) ) :
    /**
    * testimonial section details.
    *
    * @since Architectonic 1.0.0
    * @param array $input testimonial section details.
    */
    function architectonic_get_testimonial_section_details( $input ) {
        $options = architectonic_get_theme_options();

        $content = array();
        $page_ids = array();

        for ( $i = 1; $i <= 2; $i++ ) {
            if ( ! empty( $options['testimonial_content_page_' . $i] ) ) :
                $page_ids[] = $options['testimonial_content_page_' . $i];
            endif;
        }
        
        $args = array(
            'post_type'         => 'page',
            'post__in'          => ( array ) $page_ids,
            'posts_per_page'    => 2,
            'orderby'           => 'post__in',
            );                    

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = architectonic_trim_content( 40 );
                $page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'thumbnail' ) : '';

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
// testimonial section content details.
add_filter( 'architectonic_filter_testimonial_section_details', 'architectonic_get_testimonial_section_details' );


if ( ! function_exists( 'architectonic_render_testimonial_section' ) ) :
  /**
   * Start testimonial section
   *
   * @return string testimonial content
   * @since Architectonic 1.0.0
   *
   */
   function architectonic_render_testimonial_section( $content_details = array() ) {
        $options = architectonic_get_theme_options();

        if ( empty( $content_details ) ) {
            return;
        } 
        $col_count = count( $content_details );
        ?>

        <div id="client-testimonial" class="relative page-section">
            <div class="wrapper">
                <?php if ( ! empty( $options['testimonial_title'] ) ) : ?>
                    <div class="section-header">
                        <h2 class="section-title"><?php echo esc_html( $options['testimonial_title'] ); ?></h2>
                    </div><!-- .section-header -->
                <?php endif; ?>

                <div class="testimonial-slider" data-slick='{"slidesToShow": <?php echo absint( $col_count ); ?>, "slidesToScroll": 1, "infinite": false, "speed": 800, "dots": false, "arrows":true, "autoplay": true, "fade": false }'>
                    <?php foreach ( $content_details as $content ) : ?>
                        <article class="slick-item">
                            <div class="client-content-wrapper">
                                <?php if ( ! empty( $content['image'] ) ) : ?>
                                    <div class="featured-image">
                                        <a href="<?php echo esc_url( $content['image'] ); ?>"><img src="<?php echo esc_url( $content['image'] ); ?>" alt="<?php echo esc_attr( $content['title'] ); ?>"></a>
                                    </div><!-- .featured-image -->
                                <?php endif; ?>

                                <div class="entry-container">
                                    <header class="entry-header">
                                        <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                        <?php echo architectonic_get_svg( array( 'icon' => 'right-quotation-mark' ) ); ?>
                                    </header>

                                    <div class="entry-content">
                                        <?php echo esc_html( $content['excerpt'] ); ?>
                                    </div><!-- .entry-content -->
                                </div><!-- .entry-container -->
                            </div><!-- .client-content-wrapper -->
                        </article>
                    <?php endforeach; ?>
                </div><!-- .testimonial-slider -->
            </div><!-- .wrapper -->
        </div><!-- #client-testimonial -->

    <?php }
endif;