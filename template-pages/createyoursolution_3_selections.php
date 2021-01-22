<?php
/**
 * Template Name: Create Your Solution 3.0 Grade and STEM Focus
 * The template for displaying the Create Your Solution first phase
 * Name, Email, Grade Band, STEM FOCUS input fields
 * @package Teq_v4.0
 */

get_header();

/**
 * GET $_POST values from INITIAL CREATE PAGE
 */
 if(isset($_POST['schoolName'])) {
	 $schoolName = htmlspecialchars($_POST['schoolName']);
 }
 if(isset($_POST['schoolEmail'])) {
	 $schoolEmail = $_POST['schoolEmail'];
 }
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main section-container">
		<section class="full-section create-your-solution-container">
			<?php
				/**
					* WORDPRESS SEARCH QUERY
					* 3 RANDOM POSTS with loop to grab featured image
					*/
				$args = array(
					'post_type' => 'product-and-service',
					'category_name' => 'coding, engineering, robotics, hydroponics, general-education',
					'posts_per_page' => 2,
					'orderby' => 'rand'
				);

				$the_query = new WP_Query( $args );
					if ($the_query -> have_posts()) :
						while ($the_query -> have_posts()) : $the_query -> the_post();
							echo get_the_post_thumbnail( $post_id, 'full', array( 'class' => 'featured-image-product' ) );
						endwhile;
					endif;
				wp_reset_postdata();
			?>

			<form id="products_search_form" name="products_search_form" method="POST" action="<?php echo get_home_url(); ?>/create-your-solution/your-solution-products?id=<?php echo(mt_rand(0,999)); ?>" class="container" ng-controller="solutionController" autocomplete="off" ng-submit="cacheStorageItems()">

				<?php echo file_get_contents(get_template_directory_uri() . '/inc/ui/dropshadow-filter.svg'); ?>

				<input type="hidden" name="schoolName" id="schoolName" value="<?php echo $schoolName; ?>">
				<input type="hidden" name="schoolEmail" id="schoolEmail" value="<?php echo $schoolEmail; ?>">
				<script>
					var stored = sessionStorage.getItem('grade_level_cached_select') + ' ' + sessionStorage.getItem('stem_focus_cached_select') + ' ' + sessionStorage.getItem('general_ed_cached_select');
						console.log(stored);
				</script>

				<section id="gradeFields" class="columns is-multiline is-centered is-vcentered is-desktop">
					<div class="column is-full-desktop is-full-mobile">

						<div class="padding-bottom has-text-centered">
							<h1>Select Your Grade Level</h1>
							<h5>To begin, use the dial below to select the grade band that best suits your needs.</h5>
						</div>
						<section class="columns is-vcentered ui ui-content">
							<div class="column is-one-third-desktop is-full-tablet is-full-mobile ui ui-container">
								<p class="text-padding" ng-bind-html="gradeContent"></p>
								<div class="ui radio-selections">
									<input type="radio" id="gradeK2Selected" name="gradeLevelValue" value="grades-k-2" ng-checked="gradek2Select">
									<input type="radio" id="grade35Selected" name="gradeLevelValue" value="grades-3-5" ng-checked="grade35Select">
									<input type="radio" id="grade68Selected" name="gradeLevelValue" value="grades-6-8" ng-checked="grade68Select">
									<input type="radio" id="grade912Selected" name="gradeLevelValue" value="grades-9-12" ng-checked="grade912Select">
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
							</div>
						</section>

					</div>
				</section>

				<section id="stemFields" class="columns is-multiline is-centered is-vcentered is-desktop hidden">
					<div class="column is-full-desktop is-full-mobile">

						<div class="padding-bottom has-text-centered">
							<h4 class="strong" ng-bind="gradeLevelText"></h4>
							<h1>Select Your STEM-Based Subject Matter </h1>
							<h5>Next, we’ll zero in on your area of interest. <strong>Using the dial below,</strong> choose the STEM-based subject matter that best suits your interests. If you would like to choose a different grade level <button type="button" onclick="gradeSelection()" class="button blank"><u>click here</u></button>.</h5>
						</div>

						<section class="columns is-vcentered ui ui-content">
							<div class="column is-one-third-desktop is-full-tablet is-full-mobile">

								<div class="ui radio-selections">
									<input type="radio" id="codingSelected" name="stemFocusValue" value="coding" ng-checked="codingSelect">
									<input type="radio" id="engineeringSelected" name="stemFocusValue" value="engineering" ng-checked="engineeringSelect">
									<input type="radio" id="generalEdSelected" name="stemFocusValue" value="general-education"ng-checked="generalEdSelect">
									<input type="radio" id="hydroponicsSelected" name="stemFocusValue" value="hydroponics" ng-checked="hydroponicsSelect">
									<input type="radio" id="roboticsSelected" name="stemFocusValue" value="robotics" ng-checked="roboticsSelect">
								</div>

								<div ng-bind-html="stemContent"></div>

								<div class="ui margin-top" ng-show="generalEdSelect">
					        <p class="ui-checkbox-container">
					          <input type="radio" id="elaSelect" name="generalEdValue" value="ela" ng-checked="elaSelect" />
					          <label for="elaSelect" ng-model="elaSelect" ng-click="elaSelected()"><span class="toggle"></span> <em>English Language Arts</em></label>
					        </p>
					        <p class="ui-checkbox-container">
					          <input type="radio" id="mathematicsSelect" name="generalEdValue" value="mathematics" ng-checked="mathematicsSelect" />
					          <label for="mathematicsSelect" ng-model="mathematicsSelect" ng-click="mathematicsSelected()"><span class="toggle"></span> <em>Mathematics</em></label>
					        </p>
					        <p class="ui-checkbox-container">
					          <input type="radio" id="scienceSelect" name="generalEdValue" value="science" ng-checked="scienceSelect" />
					          <label for="scienceSelect" ng-model="scienceSelect" ng-click="scienceSelected()"><span class="toggle"></span> <em>Science</em></label>
					        </p>
					        <p class="ui-checkbox-container">
					          <input type="radio" id="socialstudiesSelect" name="generalEdValue" value="social-studies" ng-checked="socialstudiesSelect" />
					          <label for="socialstudiesSelect" ng-model="socialstudiesSelect" ng-click="socialstudiesSelected()"><span class="toggle"></span> <em>Social Studies</em></label>
					        </p>
					        <p class="ui-checkbox-container">
					          <input type="radio" id="specialedSelect" name="generalEdValue" value="special-education" ng-checked="specialedSelect" />
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
