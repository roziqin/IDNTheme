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
$imgurl = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : '';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'clear' ); ?>>
	<div class="post-wrapper">
		<div class="entry-container">
			<div class="entry-header">
		        <a href="../blog"><span class="icon-keyboard_arrow_down"></span>KEMBALI KE INDEX INFOGRAFIK</a>
		        <h5 class="entry-title"><?php the_title(); ?></h5>	
		        <p>By <?php the_author() ?></p>
		    </div>
			<div class="entry-content">
				<div class="image">
					<img src="<?php echo esc_url($imgurl); ?>">
				</div>
				<div class="text">
            		<a href="<?php echo esc_url($imgurl); ?>" class="button-download" download>Download Infografik Ini</a>
			        <h5 class="sub-title"><?php the_title(); ?></h5>
					<?php the_content(); ?>
					
				</div>
			</div><!-- .entry-content -->
			<div class="image-circle"></div>
		</div><!-- .entry-container -->
    </div><!-- .post-wrapper -->
</article><!-- #post-## -->
