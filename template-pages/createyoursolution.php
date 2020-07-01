<?php
/**
 * Template Name: Create Your Solution
 * The template for displaying the Create Your Solution Section
 * @package Teq_v4.0
 */

get_header();
?>

<div id="primary" class="content-area" scroll>
	<main id="main" class="site-main section-container">

		<section class="full-section grey-background create-your-solution-container">

			<div class="container padding-top">
				<div class="pre-content-container columns is-multiline is-centered is-desktop">
					<div class="image-cover">
						<?php
							// Get the Feature Image
							echo get_the_post_thumbnail( get_the_ID(), 'full', array( 'class' => 'feature-image-cover' ));
						?>
					</div>
					<div class="column is-10" ng-hide="startCreating">
						<h1>Welcome</h1>
						<form class="school-name-control">
  						<div class="input-control">
    						<input class="input school-name" type="text" ng-model="schoolName" placeholder="Please enter your name or school name">
  						</div>
							<div class="button-control">
            		<button type="submit" class="submit-button" ng-click="startCreating = !startCreating">LET'S GET STARTED <span class="arrow light"></span></button>
          		</div>
						</form>
					</div>
					<div class="column is-10" ng-show="startCreating">
						<h1>Okay {{schoolName}}, let's create your solution.</h1>
					</div>
				</div>
			</div>

		</section>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
