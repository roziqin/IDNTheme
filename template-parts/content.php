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
$readmore = ! empty( $options['read_more_text'] ) ? $options['read_more_text'] : '';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-meta">
        <?php architectonic_posted_on(); ?> 
    </div><!-- .entry-meta -->

    <div class="featured-image">
         <?php if ( has_post_thumbnail() ) : ?>
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => the_title_attribute( 'echo=0' ) ) ) ?>
            </a>
        <?php endif; ?>

        <?php echo architectonic_article_footer_meta(); ?>
    </div><!-- .featured-image -->

    <div class="entry-container">
        <header class="entry-header">
            <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        </header>

        <div class="entry-content">
            <?php 
            the_excerpt(); 

            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'architectonic' ),
                'after'  => '</div>',
            ) );
            ?>
        </div><!-- .entry-content -->

        <?php if ( ! empty( $readmore ) ) : ?>
            <div class="read-more">
                <a href="<?php the_permalink(); ?>" class="more-link"><?php echo esc_html( $readmore ); ?></a>
            </div><!-- .read-more -->
        <?php endif; ?>
    </div><!-- .entry-container -->
</article><!-- #post-## -->
