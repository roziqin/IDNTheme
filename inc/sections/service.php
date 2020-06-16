<?php
/**
 * Service section
 *
 * This is the template for the content of service section
 *
 * @package Theme Palace
 * @subpackage Architectonic
 * @since Architectonic 1.0.0
 */
if ( ! function_exists( 'architectonic_add_service_section' ) ) :
    /**
    * Add service section
    *
    *@since Architectonic 1.0.0
    */
    function architectonic_add_service_section() {
    	$options = architectonic_get_theme_options();
        // Check if service is enabled on frontpage
        $service_enable = apply_filters( 'architectonic_section_status', true, 'service_section_enable' );

        if ( true !== $service_enable ) {
            return false;
        }
        // Get service section details
        $section_details = array();
        $section_details = apply_filters( 'architectonic_filter_service_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render service section now.
        architectonic_render_service_section( $section_details );
    }
endif;

if ( ! function_exists( 'architectonic_get_service_section_details' ) ) :
    /**
    * service section details.
    *
    * @since Architectonic 1.0.0
    * @param array $input service section details.
    */
    function architectonic_get_service_section_details( $input ) {
        $options = architectonic_get_theme_options();
        
        $content = array();
        $post_ids = array();

        for ( $i = 1; $i <= 3; $i++ ) {
            if ( ! empty( $options['service_content_post_' . $i] ) )
                $post_ids[] = $options['service_content_post_' . $i];
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
                    $page_post['excerpt']   = architectonic_trim_content( 13 );
                    $page_post['content']   = apply_filters( 'the_content', get_the_content() );
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
// service section content details.
add_filter( 'architectonic_filter_service_section_details', 'architectonic_get_service_section_details' );


if ( ! function_exists( 'architectonic_render_service_section' ) ) :
  /**
   * Start service section
   *
   * @return string service content
   * @since Architectonic 1.0.0
   *
   */
   function architectonic_render_service_section( $content_details = array() ) {
        $options = architectonic_get_theme_options();
        $i = 1;        

        if ( empty( $content_details ) ) {
            return;
        } ?>

         <div id="our-services" class="relative page-section">
                <div class="wrapper">
                    <div class="entry-content">
                        <span>CARA UNTUK BERDAMPAK</span>
                        <h2>Bergabunglah dengan kami untuk menjadi bagian dari #BersamaLebihBerdampak</h2>
                    </div>
                    <div class="box-tabs">
                        <div class="box-top-tabs">    
                            <ul class="tabs">
                                <?php
                                $no = 1;     
                                foreach ( $content_details as $content ) : 
                                    if ($no==1) {
                                        $current = "current";
                                    } else {
                                        $current = "";
                                    }
                                ?>
                                    <li class="tab-link <?php echo $current; ?>" data-tab="tab-<?php echo $no; ?>"><label><span class="icon-tabicon-<?php echo $no; ?>"></span><?php echo esc_html( $content['title'] ); ?></label></li>
                                <?php $no++; endforeach; ?>
                            </ul>
                        </div>
                        <?php 
                        $no = 1;
                        foreach ( $content_details as $content ) : 
                            if ($no==1) {
                                $current = "current";
                            } else {
                                $current = "";
                            }
                        ?>
                            <div id="tab-<?php echo $no; ?>" class="tab-content <?php echo $current; ?>">
                                <?php echo $content['content']; ?>
                            </div>
                        <?php $no++; endforeach; ?>
                    </div><!-- box-tabs -->
                </div><!-- .wrapper -->
            </div><!-- #our-services-->
        
    <?php }
endif;