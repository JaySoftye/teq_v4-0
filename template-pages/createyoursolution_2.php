<?php
/**
 * Template Name: Create Your Solution 2.0
 * The template for displaying the Create Your Solution Section
 * @package Teq_v4.0
 */

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main section-container">
		<section class="full-section create-your-solution-container">
		<?php
			/**
				* WORDPRESS SEARCH QUERY
				* 3 RANDOM POSTS with loop to grab featured image
			*	$args = array(
			*		'post_type' => 'product-and-service',
			*		'category_name' => 'coding, engineering, robotics, hydroponics, general-education',
			*		'posts_per_page' => 3,
			*		'orderby' => 'rand'
			*	);

			*	$the_query = new WP_Query( $args );
			*		if ($the_query -> have_posts()) :
			*			while ($the_query -> have_posts()) : $the_query -> the_post();
			*				echo get_the_post_thumbnail( $post_id, 'full', array( 'class' => 'featured-image-product' ) );
			*			endwhile;
			*		endif;
			*	wp_reset_postdata();
			*/
			?>
			<div class="container" ng-controller="solutionController">

				<?php echo file_get_contents(get_template_directory_uri() . '/inc/ui/dropshadow-filter.svg'); ?>

				<section id="nameFields" class="columns is-multiline is-centered is-vcentered is-desktop">
					<div class="column is-full-desktop is-full-mobile">
						<h1 class="has-text-centered">Welcome!</h1>
						<h5>Here at Teq, we’re continuing to innovate the entire learning experience by bringing all of the dynamic moving parts of education together into a complete thought through the introduction of STEM and interdisciplinary topics.</h5>
						<h5>The goal of this section is to create a personal profile that reflects your decisions on how to introduce technology to your class, school, or district by taking you through a series of criteria on products, content, instructional support, and learning environment. This unique approach results in a summary specifically tailored to your responses. Use your results as a guide as you make decisions on how you want to integrate STEM, and how you want to foster future-ready skills and career readiness in your students.  </h5>
						<h3 class="has-text-centered strong">Let’s get started.</h3>

						<?php echo do_shortcode("[my_ajax_filter_search]"); ?>

						<div class="input-control level padding-sm-top-bottom">
							<div class="level-left absolute-position">
								<p class="level-item margin-left margin-right" ng-bind-html="errorText"></p>
							</div>
							<button type="button" class="submit-button margin-auto ui white outer dark {{my_ajax_filter_search_form.schoolName.$valid}} {{my_ajax_filter_search_form.schoolEmail.$valid}}" ng-click="gradeSelection()"><span class="inner">NEXT</span></button>
							<div class="level-right absolute-position">
								<p class="level-item margin-left margin-right"><a class="caption disabled" href><em>TEQ PRIVACY POLICY</em></a></p>
							</div>
						</div>
					</div>
				</section>

				<section id="gradeFields" class="columns is-multiline is-centered is-vcentered is-desktop hidden">
					<div class="column is-full-desktop is-full-mobile">

						<div class="padding-bottom has-text-centered">
							<h1>Select Your Grade Level</h1>
							<h5>To get things started, using the selection dial, choose the grade level that suits your own unique profile.</h5>
						</div>

						<section class="columns is-vcentered ui ui-content">
							<div class="column is-one-third-desktop is-full-tablet is-full-mobile ui ui-container">
								<p class="text-padding" ng-bind-html="gradeContent"></p>
								<div class="ui radio-selections">
									<input type="radio" id="gradeK2Selected" name="grade" value="grades-k-2" ng-checked="gradek2Select">
									<input type="radio" id="grade35Selected" name="grade" value="grades-3-5" ng-checked="grade35Select">
									<input type="radio" id="grade68Selected" name="grade" value="grades-6-8" ng-checked="grade68Select">
									<input type="radio" id="grade912Selected" name="grade" value="grades-9-12" ng-checked="grade912Select">
								</div>
							</div>
							<div class="column is-one-third-desktop is-full-tablet is-full-mobile ui ui-container">
								<div class="ui ui-dial selected">

									<?php echo file_get_contents(get_template_directory_uri() . '/inc/ui/grade_level_dial_2.svg'); ?>
									<p><span ng-bind="schoolName"></span> Solution Profile</p>

									<button disabled id="stemFieldsNextMobile" type="button" onclick="stemSelection()" class="submit-button mobile-next ui white outer dark"><span class="inner"></span></button>
								</div>
							</div>
							<div class="column is-one-third-desktop is-full-tablet is-full-mobile input-control">
								<button disabled id="stemFieldsNext" type="button" onclick="stemSelection()" class="submit-button margin-auto ui white outer dark"><span class="inner">NEXT</span></button>

								<script>
								function stemSelection() {
									document.getElementById("gradeFields").classList.add("hidden");
									document.getElementById("stemFields").classList.remove("hidden");
								}
								</script>
							</div>
						</section>

					</div>
				</section>

				<section id="stemFields" class="columns is-multiline is-centered is-vcentered is-desktop hidden">
					<div class="column is-full-desktop is-full-mobile">

						<div class="padding-bottom has-text-centered">
							<h1>Select Your STEM-Based Subject Matter </h1>
							<h4 class="strong" ng-bind="gradeLevelText"></h4>
							<h5>Next, we’ll zero in on your specific area of interest, primarily focused on <strong>STEM-based subject matter.</strong> This will provide us with the data we need to produce your preliminary solution profile. </h5>
						</div>

						<section class="columns is-vcentered ui ui-content">
							<div class="column is-one-third-desktop is-full-tablet is-full-mobile">

								<div ng-bind-html="stemContent"></div>

								<div class="ui margin-top" ng-show="generalEdSelect">
					        <p class="ui-checkbox-container">
					          <input type="radio" id="elaSelect" name="generaleducation" />
					          <label for="elaSelect" ng-model="elaSelect" ng-click="elaSelected()"><span class="toggle"></span> English Language Arts</label>
					        </p>
					        <p class="ui-checkbox-container">
					          <input type="radio" id="mathematicsSelect" name="generaleducation" />
					          <label for="mathematicsSelect" ng-model="mathematicsSelect" ng-click="mathematicsSelected()"><span class="toggle"></span> Mathematics</label>
					        </p>
					        <p class="ui-checkbox-container">
					          <input type="radio" id="scienceSelect" name="generaleducation" />
					          <label for="scienceSelect" ng-model="scienceSelect" ng-click="scienceSelected()"><span class="toggle"></span> Science</label>
					        </p>
					        <p class="ui-checkbox-container">
					          <input type="radio" id="socialstudiesSelect" name="generaleducation" />
					          <label for="socialstudiesSelect" ng-model="socialstudiesSelect" ng-click="socialstudiesSelected()"><span class="toggle"></span> Social Studies</label>
					        </p>
					        <p class="ui-checkbox-container">
					          <input type="radio" id="specialedSelect" name="generaleducation" />
					          <label for="specialedSelect" ng-model="specialedSelect" ng-click="specialedSelected()"><span class="toggle"></span> Special Education</label>
					        </p>
					      </div>

							</div>
							<div class="column is-one-third-desktop is-full-tablet is-full-mobile ui ui-container">
								<div class="ui ui-dial selected general-education">
									<?php echo file_get_contents(get_template_directory_uri() . '/inc/ui/stem-focus-dial_2.svg'); ?>
									<p>School Solution Profile</p>

									<button disabled type="button" id="submitPreliminaryFormMobile" class="submit-button mobile-next ui white outer dark"><span class="inner"></span></button>
								</div>
							</div>
							<div class="column is-one-third-desktop is-full-tablet is-full-mobile input-control">
								<button disabled type="button" id="submitPreliminaryForm" class="submit-button margin-auto ui white outer dark"><span class="inner">NEXT</span></button>
							</div>
						</section>

					</div>
				</section>

				<section id="prelimProducts" class="columns is-multiline is-centered is-vcentered is-desktop hidden">
					<div class="column is-full-desktop is-full-mobile">

						<div class="padding-bottom has-text-centered">
							<h1>Preliminary Product Summary</h1>
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
