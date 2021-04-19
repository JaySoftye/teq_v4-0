<?php
/**
 * Template Name: Network-Enabled Device Management Survey Submission Complete
 * The template for displaying confimration of the user's NEDM survey
 * @package Teq_v4.0
 */

get_header();

?>

<div id="primary" class="content-area white-background-fill" ng-app="productTabs" scroll>
	<section id="NEDM_survey" class="site-main section-container">
		<nav class="navbar product-site-header">
			<div class="navbar-menu padding-top">
				<div class="navbar-start">
					<figure ng-class="{ active: isSet(1) }" ng-click="setTab(1)" class="active">
						<img src="<?php echo get_template_directory_uri() . '/inc/images/teq-NEDM.svg'?>" alt="Teq NEDM">
					</figure>
				</div>
				<div class="navbar-end">
					<a class="navbar-item product-demo-request" href="<?php echo get_page_permalink_from_name('Teq Support and Service'); ?>">Back to Teq Support</a>
				</div>
			</div>
		</nav>
		<section class="container">
			<div class="survey-form-tab-container">
				<div class="columns is-centered">
					<div class="column is-1 hide-mobile survey-form-sticky">
						<ol class="survey-pagination">
							<li class="marker is-complete">1</li>
							<li class="spacer"></li>
							<li class="spacer"></li>
							<li class="marker is-complete">2</li>
							<li class="spacer"></li>
							<li class="spacer"></li>
							<li class="marker is-complete">3</li>
							<li class="spacer"></li>
							<li class="spacer"></li>
							<li class="marker is-complete">4</li>
							<li class="spacer"></li>
							<li class="spacer"></li>
							<li class="marker is-complete">5</li>
						</ol>
					</div>
					<section class="column is-10 padding-left">
						<div>
							<h2 class="step-header">NEDM Survey Submitted</h2>
							<h1 class="less-line-height">Thank you <?php echo $title; ?> for your submission</h1>
							<p class="margin-top"><strong class="important">Your survey information has been sent to your Networking Consulting team for evaluation.</strong> A throughout check on the information provided usually takes between 3-5 business days, during which time we will be constructing a detailed report for your review.</p>
						</div>
					</section>

				</div>
			</div>
		</section>
	</section><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
