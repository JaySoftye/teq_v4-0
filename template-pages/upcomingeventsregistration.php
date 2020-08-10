<?php
/**
 * Template Name: Event Registration Confirmation
 * The template for displaying a confirmation of your event registration
 * Page title MUST match the 'POST-TITLE' OF THE EVENT + 'REGISTRATED' 
 * @package Teq_v4.0
 */

get_header();
?>

<div id="primary" class="content-area" scroll>
	<main id="main" class="site-main section-container">

		<section class="section block padding-top registration">
			<div class="container" ng-controller="eventRegistrationConfirmation">
				<div class="columns is-centered is-desktop">
					<div class="column is-8">
						<h1 class="page-titles white-text">Thanks {{firstName}}!</h1>
						<h1 class="large-header white-text">You have registered for <em>{{eventName}}</em></h1>.
					</div>
				</div>
			</div>
		</section>
		<section class="section block padding-bottom">
			<div class="container">
				<div class="columns is-centered is-desktop padding-bottom">
					<div class="column is-8">
						<?php
							while ( have_posts() ) :
								the_post();
									the_content();
							endwhile; // End of the loop.
						?>
						<p class="margin-top">Got Questions? Contact us direct at <strong>877.455.9369</strong></p>
					</div>
				</div>
			</div>
		</section>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
