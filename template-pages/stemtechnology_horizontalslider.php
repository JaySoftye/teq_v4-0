<?php
/**
 * Template Name: STEM Products Horizontal Slider
 * STEM Technology Products in a Horizontal Slider
 * @package Teq_v4.0
 */

get_header();
?>

<div id="primary" class="content-area" scroll>
	<main id="main" class="site-main section-container">

		<section class="full-section">
			<div class="slider-start columns">

				<div class="column">

					<div class="hs-container">
						<ul class="hs">

							<?php if ( have_posts() ) :
								$args = array(
									'post_type' => 'product-and-service',
									'taxonomy' => 'topic',
									'posts_per_page' => -1,
									'orderby' => 'title',
									'order'   => 'ASC',
									'tax_query' => array(
        						array (
            					'taxonomy' => 'topics',
            					'field' => 'slug',
            					'terms' => 'STEM Technologies'
        						)
    							),
								);

							$the_query = new WP_Query( $args );
								while ($the_query -> have_posts()) : $the_query -> the_post();
							?>

								<li class="<?php $terms = get_the_terms( $post->ID, 'topics' ); foreach($terms as $term) { echo $term -> slug . ' '; } ?>item">
									<div class="image-link">
										<a href="<?php if ( metadata_exists('post', $post->ID, 'custom-url' )) { echo get_post_meta( $post->ID, 'custom-url', true ); } else { the_permalink(); } ?>">
											<?php echo get_the_post_thumbnail( $post_id, 'full', array( 'class' => 'featured-image' ) ); ?>
										</a>
									</div>
									<?php the_excerpt(); ?>
								</li>

							<?php
								endwhile; else :
									_e( 'Sorry, no posts were found.', 'textdomain' );
								endif; wp_reset_postdata(); // End have_posts() check.
							?>

						</ul>

					</div>

				</div>
			</div>
		</section>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
