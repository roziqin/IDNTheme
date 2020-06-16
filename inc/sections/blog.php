<?php
/**
 * Blog section
 *
 * This is the template for the content of blog section
 *
 * @package Theme Palace
 * @subpackage Architectonic
 * @since Architectonic 1.0.0
 */
if ( ! function_exists( 'architectonic_add_blog_section' ) ) :
    /**
    * Add blog section
    *
    *@since Architectonic 1.0.0
    */
    function architectonic_add_blog_section() {
    	$options = architectonic_get_theme_options();
        // Check if blog is enabled on frontpage
        $blog_enable = apply_filters( 'architectonic_section_status', true, 'blog_section_enable' );

        if ( true !== $blog_enable ) {
            return false;
        }
        // Get blog section details
        $section_details = array();
        $section_details = apply_filters( 'architectonic_filter_blog_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render blog section now.
        architectonic_render_blog_section( $section_details );
    }
endif;

if ( ! function_exists( 'architectonic_get_blog_section_details' ) ) :
    /**
    * blog section details.
    *
    * @since Architectonic 1.0.0
    * @param array $input blog section details.
    */
    function architectonic_get_blog_section_details( $input ) {
        $options = architectonic_get_theme_options();

        $content = array();
        $cat_id = ! empty( $options['blog_content_category'] ) ? $options['blog_content_category'] : '';
        $args = array(
            'post_type'         => 'post',
            'posts_per_page'    => 3,
            'cat'               => absint( $cat_id ),
            'ignore_sticky_posts'   => true,
            );                    


        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = architectonic_trim_content( 25 );
                $page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : '';

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
// blog section content details.
add_filter( 'architectonic_filter_blog_section_details', 'architectonic_get_blog_section_details' );


if ( ! function_exists( 'architectonic_render_blog_section' ) ) :
  /**
   * Start blog section
   *
   * @return string blog content
   * @since Architectonic 1.0.0
   *
   */
   function architectonic_render_blog_section( $content_details = array() ) {
        $options = architectonic_get_theme_options();
        $readmore = ! empty( $content['read_more_text'] ) ? $content['read_more_text'] : esc_html__( 'Read More', 'architectonic' );

        if ( empty( $content_details ) ) {
            return;
        } 
        $col_count = count( $content_details );
        ?>
        <div id="latest-posts" class="relative page-section">
            <div class="impact-logo"></div>
            <div class="wrapper">
                <div class="entry-content">
                    <div class="box-left">
                    <?php if ( ! empty( $options['blog_title'] ) ) : ?>
                        <h3 class="section-title"><?php echo esc_html( $options['blog_title'] ); ?></h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting. Lorem Ipsum</p>
                        <a href="" class="see-all">LIHAT SEMUA INFOGRAFIK</a>
                    <?php endif; ?>
                    </div>
                    <div class="box-right">
                        <div class="owl-carousel">
                            <?php foreach ( $content_details as $content ) : ?>
                                <div class="slide-item-box">
                                    <a href="<?php echo esc_url( $content['url'] ); ?>" class="slide-item-box">
                                        <div class="image-box" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');"></div>
                                        <div class="text-box">
                                            <label><?php echo esc_html( $content['title'] ); ?></label>
                                            <span>By <?php the_author() ?></span>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        
                    </div>
                </div>
            </div><!-- .wrapper -->
        </div><!-- #latest-posts -->

    <?php }
endif;