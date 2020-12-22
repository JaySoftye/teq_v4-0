<?php
/**
 * Template Name: Create Your Solution 3.0
 * The template for displaying the Create Your Solution first phase
 * Name, Email, Grade Band, STEM FOCUS input fields
 * @package Teq_v4.0
 */

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main section-container">
		<section class="full-section create-your-solution-container">

			<form id="products_search_form" name="products_search_form" method="POST" action="<?php echo get_home_url(); ?>/index.php/create-your-solution/your-solution-products?id=<?php echo(mt_rand(0,999)); ?>" class="container" ng-controller="solutionController">

				<?php echo file_get_contents(get_template_directory_uri() . '/inc/ui/dropshadow-filter.svg'); ?>

				<section id="nameFields" class="columns is-multiline is-centered is-vcentered is-desktop">
					<div class="column is-full-desktop is-full-mobile">
						<h1 class="has-text-centered">Welcome!</h1>
						<h5>Here at Teq, we’re continuing to innovate the entire learning experience by bringing all of the dynamic moving parts of education together into a complete thought through the introduction of STEM and interdisciplinary topics. </h5>
						<h5>The goal of this section is to create a personal profile that reflects your decisions on how to introduce technology to your class, school, or district by taking you through a series of criteria on products, content, instructional support, and learning environment. This unique approach results in a summary specifically tailored to your responses. Use your results as a guide as you make decisions on how you want to integrate STEM, and how you want to foster future-ready skills and career readiness in your students. </h5>
						<h3 class="has-text-centered strong">Let’s get started. </h3>
						<div class="ui">
							<div class="field has-addons">
								<div class="control input-control is-expanded">
									<input required class="is-fullwidth ui rounded outer dark input school-name {{products_search_form.schoolName.$valid}}" type="text" name="schoolName" ng-model="schoolName" placeholder="Please enter your name, school name, or district">
								</div>
								<div class="control input-control is-expanded">
									<input required class="is-fullwidth ui rounded outer dark input school-email {{products_search_form.schoolEmail.$valid}}" type="email" name="schoolEmail" ng-model="schoolEmail" placeholder="Please enter an email">
								</div>
							</div>
			      	<input type="hidden" name="gradeLevelValue" id="gradeLevelValue" ng-value="gradeLevelValue">
							<input type="hidden" name="stemFocusValue" id="stemFocusValue" ng-value="stemFocusValue">
							<input type="hidden" name="generalEdValue" id="generalEdValue" ng-value="generalEdValue">
						</div>

						<div class="input-control level padding-sm-top-bottom">
							<div class="level-left absolute-position">
								<p class="level-item margin-left margin-right" ng-bind-html="errorText"></p>
							</div>
							<button type="button" class="submit-button margin-auto ui white outer dark {{products_search_form.schoolName.$valid}} {{products_search_form.schoolEmail.$valid}}" ng-click="gradeSelection()"><span class="inner">NEXT</span></button>
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
							<h4 class="strong" ng-bind="gradeLevelText"></h4>
							<h1>Select Your STEM-Based Subject Matter </h1>
							<h5>Next, we’ll zero in on your specific area of interest, primarily focused on <strong>STEM-based subject matter.</strong> This will provide us with the data we need to produce your preliminary solution profile. </h5>
						</div>

						<section class="columns is-vcentered ui ui-content">
							<div class="column is-one-third-desktop is-full-tablet is-full-mobile">

								<div ng-bind-html="stemContent"></div>

								<div class="ui margin-top" ng-show="generalEdSelect">
					        <p class="ui-checkbox-container">
					          <input type="radio" id="elaSelect" name="generaleducation" />
					          <label for="elaSelect" ng-model="elaSelect" ng-click="elaSelected()"><span class="toggle"></span> <em>English Language Arts</em></label>
					        </p>
					        <p class="ui-checkbox-container">
					          <input type="radio" id="mathematicsSelect" name="generaleducation" />
					          <label for="mathematicsSelect" ng-model="mathematicsSelect" ng-click="mathematicsSelected()"><span class="toggle"></span> <em>Mathematics</em></label>
					        </p>
					        <p class="ui-checkbox-container">
					          <input type="radio" id="scienceSelect" name="generaleducation" />
					          <label for="scienceSelect" ng-model="scienceSelect" ng-click="scienceSelected()"><span class="toggle"></span> <em>Science</em></label>
					        </p>
					        <p class="ui-checkbox-container">
					          <input type="radio" id="socialstudiesSelect" name="generaleducation" />
					          <label for="socialstudiesSelect" ng-model="socialstudiesSelect" ng-click="socialstudiesSelected()"><span class="toggle"></span> <em>Social Studies</em></label>
					        </p>
					        <p class="ui-checkbox-container">
					          <input type="radio" id="specialedSelect" name="generaleducation" />
					          <label for="specialedSelect" ng-model="specialedSelect" ng-click="specialedSelected()"><span class="toggle"></span> <em>Special Education</em></label>
					        </p>
					      </div>

							</div>
							<div class="column is-one-third-desktop is-full-tablet is-full-mobile ui ui-container">
								<div class="ui ui-dial selected general-education">
									<?php echo file_get_contents(get_template_directory_uri() . '/inc/ui/stem-focus-dial_2.svg'); ?>
									<p>School Solution Profile</p>

									<button disabled type="submit" id="submit_products_search_mobile" class="submit-button mobile-next ui white outer dark"><span class="inner"></span></button>
								</div>
							</div>
							<div class="column is-one-third-desktop is-full-tablet is-full-mobile input-control">
								<button disabled type="submit" id="submit_products_search_form" class="submit-button margin-auto ui white outer dark"><span class="inner">NEXT</span></button>
							</div>
						</section>

					</div>
				</section>

			</form>

		</section>
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
