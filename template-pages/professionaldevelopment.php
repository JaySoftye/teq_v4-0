<?php
/**
 * Template Name: Professional Development
 * The template for displaying Professional Development Options
 * @package Teq_v4.0
 */

get_header();

?>

<div id="primary" class="content-area" scroll>
	<main id="main" class="site-main section-container">

		<section class="full-section target-element action">
			<div class="fluid-width columns is-desktop">
				<div class="column is-4 is-offset-2">
					<h1>Professional<br />Development</h1>
					<h5 class="scroll-icon dark-icon strong less-line-height">Learn educational technology skills with PD designed around your needs; with options for on-site, online, or a blended learning model. <br />
						<figure>
							<img src="/wp-content/themes/teq_v4-0/inc/images/pd-certified-trainers_google-cloud-microsoft.svg" alt="Google Cloud Partner | Microsoft MIE Certified Partner">
						</figure>
					</h5>

				</div>
				<div class="half-background">
					<?php
					if (have_posts()) :
						while (have_posts()) :
							the_post();
							// Check if content is empty
							if ( $post->post_content !== "" ) :
								the_content();
							else :
					?>
					<div class="featured-product-browse pd-default"></div>
					<?php
							endif;
						endwhile;
					endif;
					?>
				</div>
			</div>
		</section>

		<section class="full-section grey-background">
			<div class="columns is-multiline">

				<div class="filter-container">
					<form class="list-filters">
						<div class="filter-item non-filter">
							<label>Our Professional Development Options</label>
						</div>
					</form>
				</div>

				<div class="no-products-found column is-full" style="display: none;">
					<h3 class="has-text-centered"><strong>That's a bummer, no products found matching these filters.</strong></h3>
				</div>

				<div class="column is-full filter-results">
					<div class='columns is-multiline'>

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
            					'terms' => 'Professional Development'
        						)
    							),
								);

							$the_query = new WP_Query( $args );
								while ($the_query -> have_posts()) : $the_query -> the_post();
									$custom_url = get_post_meta( $post->ID, 'custom_url_meta_content', true );
							?>

								<article class="<?php $terms = get_the_terms( $post->ID, 'topics' ); foreach($terms as $term) { echo $term -> slug . ' '; } ?>column is-4-desktop is-6-tablet product-item">
									<a class="product-container" href="<?php if(empty( $custom_url)) { the_permalink(); } else { echo get_post_meta( $post->ID, 'custom_url_meta_content', true ); } ?>">
										<div class="product-content">
											<h3>
												<?php the_title(); ?>
											</h3>
										</div>
										<div class="image-link">
											<?php echo get_the_post_thumbnail( $post_id, 'full', array( 'class' => 'featured-image' ) ); ?>
										</div>
										<div class="product-content">
											<?php the_excerpt(); ?>
											<p class="product-filter-list toggle-content" style="display:none;">
												<strong>PRODUCT FILTERS:</strong><br />
												<?php
													$terms = get_the_terms( $post->ID, 'topics' );
													foreach($terms as $term) {
														echo '<span>' . $term -> name . '  /  </span>';
													}
												?>
											</p>
										</div>
									</a>
									<a role="button" class="navbar-burger">
    								<span aria-hidden="true"></span>
    								<span aria-hidden="true"></span>
    								<span aria-hidden="true"></span>
  								</a>
								</article>

							<?php endwhile; endif; wp_reset_postdata(); // End have_posts() check. ?>

					</div>
				</div>
			</div>
		</section>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
