<?php
/**
 * Template Name: Create Your Solution 3.0 Results
 * The template for displaying the Create Your Solution final results
 * Product Service Custom Post type query
 * @package Teq_v4.0
 */

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main section-container">
		<section class="full-section create-your-solution-container">

			<div class="container" ng-controller="solutionController">

				<?php echo file_get_contents(get_template_directory_uri() . '/inc/ui/dropshadow-filter.svg'); ?>

				<section id="prelimProducts" class="columns is-multiline is-centered is-vcentered is-desktop">
					<div class="column is-full-desktop is-full-mobile">

						<div class="padding-bottom has-text-centered">
							<h1>Preliminary Product Summary</h1>
							<?php echo htmlspecialchars($_POST['gradeLevelValue']); ?>
							<h4 class="strong margin-bottom"><span ng-bind="gradeLevelText"></span>, <span ng-bind="stemFocusText"></span><span ng-bind="generalEdText"></span></h4>
							<h5>This summary is a compiled list of product solution(s) we recommend for the options above. Select which product(s) you would like to have on your complete solution set from the list below. You can further refine your results by using the Technology Proficiency and Educational Environment dials. Simply click on the level or environment you would like to hide.</h5>
						</div>

						<form id="preliminary-product-list" class="columns ui ui-content" name="solutionsForm" action="<?php echo get_home_url(); ?>/create-your-solution/your-solution-results?" method="post">
							<div class="column is-two-thirds-desktop is-full-tablet is-full-mobile nopadding">

								<input type="hidden" name="schoolNameValue" value="{{schoolName}}">
								<input type="hidden" name="schoolEmailValue" value="{{schoolEmail}}">
								<input type="hidden" name="gradeLevelValue" ng-value="gradeLevelValue">
					      <input type="hidden" name="stemFocusValue" ng-value="stemFocusValue">
					      <input type="hidden" name="generalEdValue" ng-value="generalEdValue">

								<h6 class="margin-bottom hide-tablet-mobile">You have <strong id="count-checked-checkboxes">0</strong> products selected.</h6>
								<section class="preliminary-product-list-container stem-products"></section>
								<section class="preliminary-product-list-container">
									<?php
										/**
									  	* WORDPRESS SEARCH QUERY
											* Query Custom Post Type 'Product and Service'
											* TAXONOMY Criteria based up on user input
											*/

											$args = array(
												'post_type' => 'product-and-service',
												'posts_per_page' => -1,
												'orderby' => 'title',
												'order'   => 'ASC',
												'tax_query' => array (
													'relation' => 'AND',
													array(
														'taxonomy' => 'topics',
														'field' => 'slug',
														'terms' => 'teq-summary-add-on',
														'operator' => 'AND',
													),
												),
											);

											$the_query = new WP_Query( $args );
												if ($the_query -> have_posts()) : while ($the_query -> have_posts()) :
													$the_query -> the_post();
									?>
									<article class="ui rounded product-item">
										<label for="<?php echo $post->post_name; ?>">
  										<input type="checkbox" id="<?php echo $post->post_name; ?>" name="<?php echo $post->post_name; ?>" value="<?php echo $post->post_name; ?>">
  										<span class="checkmark"></span>
										</label>
										<?php echo get_the_post_thumbnail( $post_id, 'full', array( 'class' => 'product' ) ); ?>
										<div class="inner-content">
											<h3 class="product-title"><?php the_title(); ?></h3>
											<div class="product-description"><?php the_excerpt(); ?></div>
										</div>
									</article>

									<?php
										endwhile; endif;
											wp_reset_postdata();
									?>
								</section>

							</div>

							<div class="refine-filter-container column is-one-third-desktop is-full-tablet is-full-mobile nopadding mobile-sticky-container">
								<h6 class="margin-bottom hide-tablet-mobile has-text-centered">You have <strong id="filter-count">0</strong> product filters selected.</h6>
								<section class="columns is-centered ui ui-content padding-bottom hide-tablet-mobile">
									<div class="column is-half ui ui-container">
										<div class="ui ui-dial">
											<?php echo file_get_contents(get_template_directory_uri() . '/inc/ui/technology_proficiency_dial_2.svg'); ?>
										</div>
									</div>
								</section>
								<section class="columns is-centered ui ui-content padding-bottom hide-tablet-mobile">
									<div class="column is-half ui ui-container">
										<div class="ui ui-dial">
											<?php echo file_get_contents(get_template_directory_uri() . '/inc/ui/educational_environment_dial_2.svg'); ?>
										</div>
									</div>
								</section>
								<section class="columns is-vcentered ui ui-content mobile-sticky-button">
									<div class="column is-full-desktop is-4-tablet is-4-mobile input-control">
										<button id="solutionSetNext" type="submit" class="submit-button margin-auto ui white outer dark"><span class="inner">NEXT</span></button>
									</div>
									<div class="column view-tablet-mobile">
										<p class="ui padding-right"><strong>Select which product(s) interests you most and click next when complete.</strong> You can further refine your product list using the filter button below.</p>
									</div>
								</section>
							</div>
						</form>

					</div>
				</section>

			</div>

		</section>
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
