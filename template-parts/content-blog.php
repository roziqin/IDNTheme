<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage Architectonic
 * @since Architectonic 1.0.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="post-wrapper">
    	<div class="entry-container">
			<div class="entry-content">
				<div class="entry-content-header">
					<div class="box-right">
						<?php get_search_form(); ?>
					</div>
					<div class="box-left">
						<h3>Regulasi pemerintah dengan sajian Infografik</h3>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
					</div>
				</div>
				<ul class="list">
				<?php
					$currentPage = get_query_var('paged');
				   	$args = array('posts_per_page' => 6, 'category_name' => 'infografik', 'paged' => $currentPage);
				   	$category_posts = new WP_Query($args);

				   	if($category_posts->have_posts()) : 
				      	while($category_posts->have_posts()) : 
				         	$category_posts->the_post();
				         	$url = get_the_permalink();
				         	$imgurl = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : '';
				?>
							<li class="list-item">
								<div class="list-item-container">
									<a href="<?php echo esc_url($url); ?>">
										<div class="item-image" style="background-image: url('<?php echo esc_url($imgurl);?>');"></div>
										<div class="item-text">
									        <h5><?php the_title() ?></h5>	
									        <p>By <?php the_author() ?></p>
										</div>
									</a>
								</div>
							</li>

				<?php
				      	endwhile;
				   	else: 
				?>
				      Oops, there are no posts.
				<?php
				   	endif;
				   	echo "
				   		</ul>
				   		<div class='page-nav-container'>" . paginate_links(array(
				    	'total' => $category_posts->max_num_pages,
				    	'prev_text' => __('<'),
				    	'next_text' => __('>')
					)) . "</div>";
				?>
			</div><!-- .entry-content -->

			<div class="image-circle"></div>
		</div><!-- .entry-container -->
	</div><!-- .post-wrapper -->
</article><!-- #post-## -->
