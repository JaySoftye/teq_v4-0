<?php
/**
 * Template Name: Create Your Solution 5.0
 * The template for displaying the Create Your Solution first phase
 * Product entry point selection
 * @package Teq_v4.0
 */

get_header();

?>

<div id="primary" class="content-area">
	<main id="main" class="site-main container create-your-solution-container">
		<form id="products_search_form" name="products_search_form" method="GET" action="<?php echo get_home_url(); ?>/create-your-solution/your-solution-products" ng-controller="solutionController">

			<section id="solutionsHeader">
				<div class="columns is-multiline is-centered is-desktop">
					<div class="column is-full">
						<p class="caption blue-text">
  						<strong>YOUR</strong> classroom solution.
						</p>
						<h1 class="main-title">{{solutionHeaderText}}</h1>
						<progress id="solutionProgressBar" class="progress is-success" value="{{createProgress}}" max="100" ng-click="createProgress = '1'"></progress>
						<span id="solutionProgressBarText" class="progress-status">{{createProgress}}</span>
					</div>
				</div>
			</section>

			<section id="solutionsIntro" ng-hide="getStarted">
				<div class="columns is-multiline is-centered is-desktop">
					<div class="column is-full">
						<div class="box-section">
							<h3 class="margin-top margin-bottom">Use our self-guided products and services selection tool to build a custom classroom  solution for your school.</h3>
							<p>You’ll build a plan that includes STEM technology, project-based learning activities, and the professional learning that ties it all together. Then, get a summary of your selection results and start a conversation with our team.</p>
						</div>
					</div>
				</div>
				<div class="button-container form-action">
					<div class="container">
						<div class="buttonGroup">
							<button type="button" class="next" ng-click="letsGetStarted()">Let's get started</button>
						</div>
					</div>
				</div>
			</section>

			<section id="solutionsEntryPoint" ng-show="entryPointChoiced">
				<div class="columns is-multiline is-centered is-desktop">
					<div class="column is-full">
						<div class="box-section fill-area">
							<div class="control fill-flex-items">
  							<label class="radio fill-item" ng-class="{selected: entryPoint == 'stemEntryPoint'}">
									<img src="<?php echo get_template_directory_uri() . '/inc/ui/stem_entry-point_image-750x375.png'; ?>" />
    							<input type="radio" name="entryPoint" ng-click="createProgress = '25'" ng-model="entryPoint" value="stemEntryPoint">
									<span class="checkmark"></span>
									<h4><b>STEM</b></h4>
									<p>STEM is the perfect place to start transforming your classroom. By giving students the right tools and technology, you can spark curiosity, learning, and inquiry-based thinking.</p>
								</label>
								<label class="radio fill-item" ng-class="{selected: entryPoint == 'pblEntryPoint'}">
									<img src="<?php echo get_template_directory_uri() . '/inc/ui/pbl_entry-point_image-750x375.png'; ?>" />
    							<input type="radio" name="entryPoint" ng-click="createProgress = '25'" ng-model="entryPoint" value="pblEntryPoint">
									<span class="checkmark"></span>
									<h4><b>Project-Based Learning Activities</b></h4>
									<p>An iBlock, or “instructional block,” is a project-based learning solution built to foster critical thinking, spark creativity, and give students the opportunity to practice 21st century skills.</p>
								</label>
							</div>
						</div>
					</div>
				</div>
				<div class="button-container form-action">
					<div class="container">
						<div class="buttonGroup">
							<button type="submit" class="next" ng-hide="!entryPoint">Next</button>
						</div>
					</div>
				</div>
			</section>

		</form>
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
