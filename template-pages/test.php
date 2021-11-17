<?php
/**
 * Template Name: TEST
 * The template for displaying the Create Your Solution Section
 * @package Teq_v4.0
 */

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main section-container">
		<section class="full-section create-your-solution-container">
			<div class="container" ng-controller="solutionController">

				<section id="solutionSet" class="columns is-multiline is-centered is-desktop">

					<?php
						$product_args = array(
							'post_type' => array('product-and-service'),
					    'category_name' => 'teq-product',
					    'taxonomy' => 'topic',
					    'posts_per_page' => 3,
					    'orderby' => 'title',
					    'order'   => 'ASC',
					    'tax_query' => array(
					      array (
					        'taxonomy' => 'topics',
					        'field' => 'slug',
					        'terms' => array('STEM Technologies'),
					      )
					    ),
						);

						$product_query = new WP_Query( $product_args );

						function getGrades() {
							foreach(get_the_terms($product_query->post->ID, 'grades') as $grades)
								echo $grades->name . " ";
						}
						function getCategories() {
							$categories = get_the_category();
								foreach( $categories as $category) {
									if($category->name !== 'CDW-G')
									if($category->name !== 'FAMIS Product')
									if($category->name !== 'Teq Product') {
										$name = $category->name;
										$category_link = get_category_link( $category->term_id );
										echo esc_attr( $name) . " ";
									}
								}
						}
						function getTags() {
							$posttags = get_the_tags();
								if ($posttags) { foreach($posttags as $tag) {
									echo $tag->slug . ' ';
								}
							}
						}

						if ($product_query -> have_posts()) :
							while ($product_query -> have_posts()) :
								$product_query -> the_post();
					      $post_name = $post->post_name;
					      $post_label = str_replace('-', '', $post_name);
					      $post_id = get_the_ID();
					      $custom_image = get_post_meta( get_the_ID(), 'custom_image_meta_content', true );
					      $post_type = $post->post_type;
					?>
					<article data-type="<?php echo $post_type; ?>" class="column is-3-desktop all-products product-item <?php getGrades(); ?> <?php getCategories(); ?> <?php getTags(); ?>" id="<?php echo $post_id; ?>">
						<input type="checkbox" data-type="<?php echo $post_type; ?>" ng-model="stemProductOption" class="stem-product" name="stemproducts[]" id="<?php echo $post_name; ?>" value="<?php echo $post_id; ?>" />
						<div class="card">
							<div class="product-selected"></div>
							<?php
								$product_icon = get_post_meta(get_the_ID(),'custom_image_meta_content',true);
								if ( !empty( $product_icon) ) {
							?>
								<img src="<?php echo get_template_directory_uri() . '/inc/ui/' . html_entity_decode($custom_image) . '.svg' ?>" />
							<?php
								} else {
									echo '<img src="' . get_template_directory_uri() . '/inc/ui/default-stem-product.svg" />';
								}
							?>
							<div class="product-item-details">
								<h3 class="product-title"><?php the_title(); ?></h3>
								<p class="product-grade-band">
									<?php getGrades(); ?>
								</p>
								<p class="product-categories">
									<?php getCategories(); ?>
								</p>
							</div>
							<button type="button" id="<?php echo $post_name; ?>-details" class="details-btn">View Details</button>
						</div>
					</article>
					<?php endwhile; endif; wp_reset_postdata(); ?>

					<?php
					$pathway_args = array(
						'post_type' => 'Pathways',
						'orderby'=> 'title',
						'order' => 'ASC',
						'posts_per_page' => 3,
					);


					$pathway_query = new WP_Query( $pathway_args );

						function getGrades() {
							foreach(get_the_terms($pathway_query->post->ID, 'grades') as $grades)
									echo $grades->name . " ";
						}
						function getCategories() {
							foreach(get_the_terms($pathway_query->post->ID, 'category') as $category)
								echo $category->name . " ";
						}
						function getTags() {
							$posttags = get_the_tags();
								if ($posttags) { foreach($posttags as $tag) {
									echo $tag->slug . ' ';
								}
							}
						}
						
						if ($pathway_query -> have_posts()) : while ($pathway_query -> have_posts()) :
							$pathway_query -> the_post();
					?>
						<li>
							<a href="<?php the_permalink(); ?>"><u><?php the_title(); ?></u></a>
						</li>
					<?php endwhile; endif; wp_reset_postdata(); ?>



				</section>

			</div>
		</section>
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
