<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage Architectonic
 * @since Architectonic 1.0.0
 */
$options = architectonic_get_theme_options();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'clear' ); ?>>
	<header class="entry-header">
    	<?php if ( ! $options['single_post_hide_date'] ) : ?>
	        <div class="entry-meta">
	            <?php architectonic_posted_on(); ?>
	        </div><!-- .entry-meta -->
        <?php endif; ?>

        <div class="post-title">
            <?php architectonic_single_categories(); ?>
            <h2 class="entry-title"><?php the_title(); ?></h2>
        </div><!-- .post-title -->
    </header>
    <?php  
    /**
	 * Hook architectonic_author_profile_action
	 *  
	 * @hooked architectonic_get_author_profile 
	 */
    do_action( 'architectonic_author_profile_action' );
    ?>

	<div class="post-wrapper">
		<div class="entry-container">
			<div class="entry-content">
				<?php
					the_content( sprintf(
						/* translators: %s: Name of current post. */
						wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'architectonic' ), array( 'span' => array( 'class' => array() ) ) ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					) );

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'architectonic' ),
						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->

			<div class="entry-meta">
				<?php architectonic_entry_footer(); ?>
			</div>
		</div><!-- .entry-container -->
    </div><!-- .post-wrapper -->
</article><!-- #post-## -->
