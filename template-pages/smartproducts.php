<?php
/**
 * Template Name: SMART Products
 * The template for displaying SMART Products Only
 * @package Teq_v4.0
 */

get_header();
?>
<div id="product-form" product-title="" class="modal product-pricing">
	<div class="modal-background"></div>
	<div class="modal-content is-centered columns">
		<section class="modal-card-body column is-three-quarters rounded-corners">
			<img id="product-image" src />
			<p>To request exact pricing for <strong id="product-form-title"></strong>, simply fill out the form below and a Teq Representative will reach out to you directly.</p>
			<br />
			<!--[if lte IE 8]>
			<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
			<![endif]-->
			<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
			<script>
				hbspt.forms.create({
					portalId: "182596",
					formId: "2c1fcff8-e0a3-4b79-8745-b53e2125a305",
					submitButtonClass: '',
					inlineMessage: 'Request Submitted, Thanks.',
					onFormSubmit: function($form) {

						// GRAB THE PAGE TITLE AND SET 'BLANK' HIDDEN INPUT FIELD AS TITLE OF THE PAGE
						var title = $("#product-form").attr("product-title");
						$('input[name="blank"]').val(title)

						// SET REDIRECT WITH FORM DATA IN URL
						setTimeout( function() {
							var formData = $form.serialize();
							window.location = "/thankyouforyourinterest?" + formData;
						}, 250 ); // Redirects to url with query string data from form fields after 250 milliseconds.
					}
				});
			</script>
		</section>
	</div>
	<button class="modal-close is-large" aria-label="close"></button>
</div>

<div id="primary" class="content-area" scroll>
	<main id="main" class="site-main section-container">

		<section class="full-section smart-products target-element action">
			<div class="fluid-width columns is-desktop">
				<div class="column is-4 is-offset-2">
					<h1><img src="<?php echo get_template_directory_uri() . '/inc/images/SMART-product-logo_black.svg'; ?>" alt="SMART" /></h1>
					<h5 class="scroll-icon dark-icon strong less-line-height nomargin">Gives your students the best in collaboration technology with Ultra 4K HD Resolution and the SMART Learning Suite.</h5>
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
					<div class="featured-product-browse smart-default"></div>
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
							<label>Product Filters</label>
						</div>
						<div class="filter-item" ng-controller="gradeLevelFilter">
							<select class="product-filter"  id="selectedGradeLevel" ng-model="selectedGradeLevel" ng-options="item.id as item.name for item in items track by item.id">
								<option value="" selected disabled>Grade Level</option>
							</select>
							<span class="down-arrow"></span>
						</div>
						<div class="filter-item" ng-controller="technologyProficiencyFilter">
							<select class="product-filter"  id="selectedtechnologyProficiencyLevel" ng-model="selectedtechnologyProficiencyLevel" ng-options="item.id as item.name for item in items track by item.id">
								<option value="" selected disabled>Technology Proficiency</option>
							</select>
							<span class="down-arrow"></span>
						</div>
						<div class="filter-item non-filter">
							<input class="reset-filters" type="reset" value="Reset Filters">
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
										'terms' => 'Interactive Flat Panels'
									)
								),
							);

							$the_query = new WP_Query( $args );
								while ($the_query -> have_posts()) : $the_query -> the_post();
									$custom_url = get_post_meta( $post->ID, 'custom_url_meta_content', true );
									$image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'full' );

									// GET ALL THE CUSTON TAXONOMIES FOR THE Custom Post Type
									$taxonomies = array('topics', 'grades', 'proficiency', 'curriculum');
									$terms = wp_get_post_terms( get_the_ID(), $taxonomies, [ 'fields' => 'id=>slug'] );
							?>

							<article class="<?php echo the_title() . ' '; echo implode( ' ', $terms ); ?> column is-three-quarters-mobile is-one-third-tablet is-one-quarter-desktop is-one-fifth-widescreen is-one-fifth-fullhd product-item">
								<div class="product-container">
									<div class="product-content">
										<h3>
											<a href="<?php if(empty( $custom_url)) { the_permalink(); } else { echo get_post_meta( $post->ID, 'custom_url_meta_content', true ); } ?>">
												<?php the_title(); ?>
											</a>
										</h3>
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
									<a class="image-link" href="<?php if(empty( $custom_url)) { the_permalink(); } else { echo get_post_meta( $post->ID, 'custom_url_meta_content', true ); } ?>">
										<?php echo get_the_post_thumbnail( $post_id, 'full', array( 'class' => 'featured-image' ) ); ?>
									</a>
								</div>
								<div class="button-group">
									<a href="<?php if(empty( $custom_url)) { the_permalink(); } else { echo get_post_meta( $post->ID, 'custom_url_meta_content', true ); } ?>">More Details</a>
								</div>
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
