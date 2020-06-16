<?php
/**
 * Theme Palace basic theme structure hooks
 *
 * This file contains structural hooks.
 *
 * @package Theme Palace
 * @subpackage Architectonic
 * @since Architectonic 1.0.0
 */

$options = architectonic_get_theme_options();



if ( ! function_exists( 'architectonic_doctype' ) ) :
	/**
	 * Doctype Declaration.
	 *
	 * @since Architectonic 1.0.0
	 */
	function architectonic_doctype() {
	?>
		<!DOCTYPE html>
			<html lang="id" <?php //language_attributes(); ?>>
	<?php
	}
endif;

add_action( 'architectonic_doctype', 'architectonic_doctype', 10 );


if ( ! function_exists( 'architectonic_head' ) ) :
	/**
	 * Header Codes
	 *
	 * @since Architectonic 1.0.0
	 *
	 */
	function architectonic_head() {
		?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
			<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php endif;
	}
endif;
add_action( 'architectonic_before_wp_head', 'architectonic_head', 10 );

if ( ! function_exists( 'architectonic_page_start' ) ) :
	/**
	 * Page starts html codes
	 *
	 * @since Architectonic 1.0.0
	 *
	 */
	function architectonic_page_start() {
		?>
		<div id="page" class="site">
			<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'architectonic' ); ?></a>

		<?php
	}
endif;
add_action( 'architectonic_page_start_action', 'architectonic_page_start', 10 );

if ( ! function_exists( 'architectonic_top_menu' ) ) :
	/**
	 * Top menu html codes
	 *
	 * @since Architectonic 1.0.0
	 *
	 */
	function architectonic_top_menu() {
		$options = architectonic_get_theme_options();
		if ( ! $options['topbar_section_enable'] )
			return;
		?>
		<div id="top-navigation">
			<div class="wrapper">
				<?php if ( ! empty( $options['topbar_email'] ) || ! empty( $options['topbar_phone'] ) ) : ?>
		            <div class="widget widget_contact_info">
		                <ul>
		                	<?php if ( ! empty( $options['topbar_email'] ) ) : ?>
			                    <li class="topbar-email" ><a href="mailto:<?php echo esc_attr( $options['topbar_email'] ); ?>"><?php echo esc_html( $options['topbar_email'] ); ?></a></li>
			                <?php endif; 

			                if ( ! empty( $options['topbar_phone'] ) ) : ?>
		                    	<li class="topbar-phone"><a href="tel:<?php echo esc_attr( $options['topbar_phone'] ) ?>"><?php echo esc_html( $options['topbar_phone'] ); ?></a></li>
	                    	<?php endif; ?>
		                </ul>
		            </div><!-- .widget_contact_info -->
		        <?php endif; ?>
	        </div>
        </div><!-- .top-navigation -->

		<?php
	}
endif;
add_action( 'architectonic_page_start_action', 'architectonic_top_menu', 30 );

if ( ! function_exists( 'architectonic_page_end' ) ) :
	/**
	 * Page end html codes
	 *
	 * @since Architectonic 1.0.0
	 *
	 */
	function architectonic_page_end() {
		?>
		</div><!-- #page -->
		<?php
	}
endif;
add_action( 'architectonic_page_end_action', 'architectonic_page_end', 10 );

if ( ! function_exists( 'architectonic_header_start' ) ) :
	/**
	 * Header start html codes
	 *
	 * @since Architectonic 1.0.0
	 *
	 */
	function architectonic_header_start() {
		$options = architectonic_get_theme_options();
		$sticky = ( true === $options['menu_sticky'] ) ? 'sticky-header' : '';
		?>
		<header id="masthead" class="site-header <?php echo esc_attr( $sticky ); ?>" role="banner">
			<div class="bg-header"></div>
			<div class="wrapper">
		<?php
	}
endif;
add_action( 'architectonic_header_action', 'architectonic_header_start', 10 );

if ( ! function_exists( 'architectonic_site_branding' ) ) :
	/**
	 * Site branding codes
	 *
	 * @since Architectonic 1.0.0
	 *
	 */
	function architectonic_site_branding() {
		$options  = architectonic_get_theme_options();
		$header_txt_logo_extra = $options['header_txt_logo_extra'];		
		?>
		<div class="site-branding">
			<?php if ( in_array( $header_txt_logo_extra, array( 'show-all', 'logo-title', 'logo-tagline' ) )  ) { ?>
				<div class="site-logo">
					<?php the_custom_logo(); ?>
				</div>
			<?php } 
			if ( in_array( $header_txt_logo_extra, array( 'show-all', 'title-only', 'logo-title', 'show-all', 'tagline-only', 'logo-tagline' ) ) ) : ?>
				<div id="site-details">
					<?php
					if( in_array( $header_txt_logo_extra, array( 'show-all', 'title-only', 'logo-title' ) )  ) {
						if ( architectonic_is_latest_posts() ) : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else : ?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php
						endif;
					} 
					if ( in_array( $header_txt_logo_extra, array( 'show-all', 'tagline-only', 'logo-tagline' ) ) ) {
						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo esc_html( $description ); /* WPCS: xss ok. */ ?></p>
						<?php
						endif; 
					}?>
				</div>
			<?php endif; ?>
		</div><!-- .site-branding -->
		<?php
	}
endif;
add_action( 'architectonic_header_action', 'architectonic_site_branding', 20 );

if ( ! function_exists( 'architectonic_site_navigation' ) ) :
	/**
	 * Site navigation codes
	 *
	 * @since Architectonic 1.0.0
	 *
	 */
	function architectonic_site_navigation() {
		$options = architectonic_get_theme_options();
		?>
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
				<span class="menu-label"><?php esc_html_e( 'Menu', 'architectonic' ); ?></span>
				<?php
				echo architectonic_get_svg( array( 'icon' => 'menu' ) );
				echo architectonic_get_svg( array( 'icon' => 'close' ) );
				?>					
			</button>

			<?php  
				$search = '';
				if ( $options['nav_menu_search'] ) :
					$search = '<li class="search-menu"><a href="#">';
					$search .= architectonic_get_svg( array( 'icon' => 'search' ) );
					$search .= architectonic_get_svg( array( 'icon' => 'close' ) );
					$search .= '</a><div id="search">';
					$search .= get_search_form( $echo = false );
	                $search .= '</div><!-- #search --></li>';
                endif;

        		$defaults = array(
        			'theme_location' => 'primary',
        			'container' => 'div',
        			'menu_class' => 'menu nav-menu',
        			'menu_id' => 'primary-menu',
        			'echo' => true,
        			'fallback_cb' => 'architectonic_menu_fallback_cb',
        			'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s' . $search . '</ul>',
        		);
        	
        		wp_nav_menu( $defaults );
        	?>
		</nav><!-- #site-navigation -->
		<?php
	}
endif;
add_action( 'architectonic_header_action', 'architectonic_site_navigation', 30 );


if ( ! function_exists( 'architectonic_header_end' ) ) :
	/**
	 * Header end html codes
	 *
	 * @since Architectonic 1.0.0
	 *
	 */
	function architectonic_header_end() {
		?>
				<div class="translate"><div id="box-translate"><span class="flag"></span><span class="text"></span> <span class="icon-keyboard_arrow_down"></span></div><?php echo do_shortcode('[google-translator]'); ?></div>
			</div><!-- .wrapper -->
		</header><!-- #masthead -->
		<?php
	}
endif;

add_action( 'architectonic_header_action', 'architectonic_header_end', 50 );

if ( ! function_exists( 'architectonic_content_start' ) ) :
	/**
	 * Site content codes
	 *
	 * @since Architectonic 1.0.0
	 *
	 */
	function architectonic_content_start() {
		?>
		<div id="content" class="site-content">
		<?php
	}
endif;
add_action( 'architectonic_content_start_action', 'architectonic_content_start', 10 );

if ( ! function_exists( 'architectonic_header_image' ) ) :
	/**
	 * Header Image codes
	 *
	 * @since Architectonic 1.0.0
	 *
	 */
	function architectonic_header_image() {
		global $post;
		$page_slug1 = $post->post_name;
		if ( architectonic_is_frontpage() )
			return;
		$header_image = get_header_image();
		$class = '';
		if ( is_singular() ) :
			$class = ( has_post_thumbnail() || ! empty( $header_image ) ) ? '' : 'header-media-disabled';
		else :
			$class = ! empty( $header_image ) ? '' : 'header-media-disabled';
		endif;
		?>
		<div id="header-image" class="relative <?php echo esc_attr( $class ); ?>">
            <div class="wrapper">
                <div id="wp-custom-header" class="wp-custom-header">
                	<?php if ( is_singular() ) : 
                		if ( has_post_thumbnail() ) : ?>
                			<?php if ($page_slug1=="about") { ?>
			            		<div class="banner-image" style="background-image: url('<?php echo esc_url( get_the_post_thumbnail_url( get_the_id(), 'full' ) ); ?>');" ></div>
		            		<?php } else { ?>
		            			<div class="banner-image a">
        							<div class="image-circle-header"></div>
        						</div>
		            		<?php } ?>
            				<?php /*<div class="banner-image" style="background-image: url('<?php echo esc_url( get_the_post_thumbnail_url( get_the_id(), 'full' ) ); ?>');" ></div>*/?>
        						
        				<?php else : 
        					if ( ! empty( $header_image ) ) : ?>
        						<?php /*<div class="banner-image" style="background-image: url('<?php echo esc_url( $header_image ); ?>');"></div> */?>
        						<div class="banner-image b">
        							<div class="image-circle-header"></div>
        						</div>
    						<?php endif;
    					endif;
        			else : 
        				if ( ! empty( $header_image ) ) : ?>
                    		<div class="banner-image" style="background-image: url('<?php echo esc_url( $header_image ); ?>');"></div>
                		<?php endif;
                	endif; ?>
                	<?php /*if ($page_slug1=="about") { ?>
            		<div class="text-bg">
                		<span class="text">Bersama Lebih Berdampak</span>
                		<span class="line"></span>
                	</div>
            		<?php } */?>
            	</div><!--#wp-custom-header -->

                <header class="page-header">
                	<?php //echo architectonic_custom_header_banner_title(); ?>
                </header><!-- .page-header -->
            </div><!-- .wrapper -->
        </div><!--#header-image -->
		<?php
	}
endif;
add_action( 'architectonic_header_image_action', 'architectonic_header_image', 10 );

if ( ! function_exists( 'architectonic_add_breadcrumb' ) ) :
	/**
	 * Add breadcrumb.
	 *
	 * @since Architectonic 1.0.0
	 */
	function architectonic_add_breadcrumb() {
		$options = architectonic_get_theme_options();
		// Bail if Breadcrumb disabled.
		$breadcrumb = $options['breadcrumb_enable'];
		if ( false === $breadcrumb ) {
			return;
		}
		
		// Bail if Home Page.
		if ( architectonic_is_frontpage() ) {
			return;
		}

		echo '<div id="breadcrumb-list" >
			<div class="wrapper">';
				/**
				 * architectonic_simple_breadcrumb hook
				 *
				 * @hooked architectonic_simple_breadcrumb -  10
				 *
				 */
				do_action( 'architectonic_simple_breadcrumb' );
		echo '</div>
			</div><!-- #breadcrumb-list -->';
		return;
	}
endif;
add_action( 'architectonic_header_image_action', 'architectonic_add_breadcrumb', 20 );

if ( ! function_exists( 'architectonic_content_end' ) ) :
	/**
	 * Site content codes
	 *
	 * @since Architectonic 1.0.0
	 *
	 */
	function architectonic_content_end() {
		?>
			<div class="menu-overlay"></div>
		</div><!-- #content -->
		<?php
	}
endif;
add_action( 'architectonic_content_end_action', 'architectonic_content_end', 10 );

if ( ! function_exists( 'architectonic_footer_start' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Architectonic 1.0.0
	 *
	 */
	function architectonic_footer_start() {
		?>
		<footer id="colophon" class="site-footer" role="contentinfo">
		<?php
	}
endif;
add_action( 'architectonic_footer', 'architectonic_footer_start', 10 );

if ( ! function_exists( 'architectonic_footer_site_info' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Architectonic 1.0.0
	 *
	 */
	function architectonic_footer_site_info() {
		$theme_data = wp_get_theme();
		$options = architectonic_get_theme_options();
		$search = array( '[the-year]', '[site-link]' );

        $replace = array( date( 'Y' ), '<a href="'. esc_url( home_url( '/' ) ) .'">'. esc_attr( get_bloginfo( 'name', 'display' ) ) . '</a>' );

        $options['copyright_text'] = str_replace( $search, $replace, $options['copyright_text'] );

		$copyright_text = $options['copyright_text']; 
		$powered_by_text = esc_html__( 'All Rights Reserved | ', 'architectonic' ) . esc_html( $theme_data->get( 'Name') ) . '&nbsp;' . esc_html__( 'by', 'architectonic' ). '&nbsp;<a target="_blank" href="'. esc_url( $theme_data->get( 'AuthorURI' ) ) .'">'. esc_html( ucwords( $theme_data->get( 'Author' ) ) ) .'</a>';
		?>
		<div class="site-info">
                <div class="wrapper">
                    <span><?php echo architectonic_santize_allow_tag( $copyright_text ); ?></span>
                    <span><?php echo architectonic_santize_allow_tag( $powered_by_text ); ?></span>
                    <?php if ( function_exists( 'the_privacy_policy_link' ) ) {
								the_privacy_policy_link( '<span> | </span>', '' );
							} ?>
                </div><!-- .wrapper -->    
            </div><!-- .site-info -->

		<?php
	}
endif;
add_action( 'architectonic_footer', 'architectonic_footer_site_info', 40 );

if ( ! function_exists( 'architectonic_footer_scroll_to_top' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Architectonic 1.0.0
	 *
	 */
	function architectonic_footer_scroll_to_top() {
		$options  = architectonic_get_theme_options();
		if ( true === $options['scroll_top_visible'] ) : ?>
			<div class="backtotop"><?php echo architectonic_get_svg( array( 'icon' => 'up' ) ); ?></div>
		<?php endif;
	}
endif;
add_action( 'architectonic_footer', 'architectonic_footer_scroll_to_top', 40 );

if ( ! function_exists( 'architectonic_footer_end' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Architectonic 1.0.0
	 *
	 */
	function architectonic_footer_end() {
		?>
		</footer>
		<div class="popup-overlay"></div>
		<?php
	}
endif;
add_action( 'architectonic_footer', 'architectonic_footer_end', 100 );

if ( ! function_exists( 'architectonic_get_author_profile' ) ) :
	/**
	 * Function to get author profile
	 *
	 * @since Architectonic 1.0.0
	 */           
	function architectonic_get_author_profile(){
		$options = architectonic_get_theme_options();
		if ( $options['single_post_hide_author'] ) {
			return;
		} ?>

		<div id="author-section">
            <div class="author-image">
                <?php echo get_avatar( get_the_author_meta( 'ID' ), 95 );  ?>
            </div><!-- .author-image -->

            <div class="author-content">
                <h3 class="author-name"><?php the_author_posts_link(); ?>, <span><?php echo esc_html_e( 'Author', 'architectonic' ); ?></span></h3>
            </div><!-- .author-content -->
        </div><!-- #author -->

	<?php
	}	
endif;
add_action( 'architectonic_author_profile_action', 'architectonic_get_author_profile' );