<?php
/**
 * Template Name: Product Page Centered Image 
 * The template for displaying Products (includes Sub headers, OTIS Course, Pathway meta values)
 * @package Teq_v4.0
 */

get_header();
?>

	<div id="primary" class="content-area white-background-fill" ng-app="productTabs">
		<main id="main" class="site-main section-container" ng-controller="TabController">

			<?php
				while ( have_posts() ) :
					the_post();

					// variables for metadata
					$sub_header = get_post_meta( get_the_ID(), 'sub_header_meta_content', true );
					$header_info = get_post_meta( get_the_ID(), 'header_info_meta_content', true );
					$pd_content = get_post_meta( get_the_ID(), 'pd_meta_content', true );
					$pathway_content = get_post_meta( get_the_ID(), 'pathway_meta_content', true );
					$tabs_content = get_post_meta( get_the_ID(), 'tabs_meta_content', true );


					// Grab the Sub Header Meta for the product sub navbar if it exists
					if( !empty( $sub_header) ) {
			?>
			<nav id="subhead" class="navbar product-site-header">
				<?php
					$sub_header_print_value = get_post_meta(get_the_ID(),'sub_header_meta_content',true);
						echo html_entity_decode($sub_header_print_value);
					}

					/** ADD FOR TOP SLIDE DOWN ELEMENT
					* <section class="product-demo-form" ng-show="demoFormCollapsed">
					*	<div class="columns">
					* <div class="column">
					* <a class="delete is-large close-form" href ng-model="demoFormCollapsed" ng-click="demoFormCollapsed=!demoFormCollapsed"></a>
					* </div>
					* </div>
					* </section>
					*/
				?>
			</nav>
			<section ng-show="isSet(1)">
				<div class="container padding-top">

					<div class="pre-content-container columns is-multiline is-desktop">
						<div class="image-cover">
							<?php
								// Get the Feature Image
								echo get_the_post_thumbnail( get_the_ID(), 'full', array( 'class' => 'feature-image-cover' ));
							?>
						</div>
						<?php
							// Grab the Header Info Meta for the product intro if it exists
							if ( !empty( $header_info) ) {
								$header_info_print_value = get_post_meta(get_the_ID(),'header_info_meta_content',true);
									echo html_entity_decode($header_info_print_value);
							}
						?>
					</div>
				</div>
				<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>

				<?php
					// Grab the main contents for the page
					the_content();
				?>

				<script>
					var productForm = document.getElementById("productForm");
					/**
						* TARGET HTML ELEMENT WITH ID 'productForm'
						* If it isn't "undefined" and it isn't "null", then it exists.
						* IF THE ELEMENT EXISTS Create the hbspot form
						* Append hbspot form in 'Target' HTML element with ID 'productForm'
						* Grab page title and set input field - REDIRECT TO THANK YOU PAGE
					*/
					if(typeof(productForm) != 'undefined' && productForm != null){
						hbspt.forms.create({
							portalId: "182596",
							formId: "7066d3c7-0d82-4dca-8b83-48fe09525649",
							target: "#productForm",
							submitButtonClass: '',
							inlineMessage: 'Request Submitted, Thanks.',

							onFormSubmit: function($form) {

								// GRAB THE PAGE TITLE AND SET 'BLANK' HIDDEN INPUT FIELD AS TITLE OF THE PAGE
								var title = document.getElementsByTagName("title")[0].innerHTML;
								$('input[name="blank"]').val(title)

								// SET REDIRECT WITH FORM DATA IN URL
								setTimeout( function() {
									var formData = $form.serialize();
									window.location = "/thankyouforyourinterest?" + formData;
								}, 250 ); // Redirects to url with query string data from form fields after 250 milliseconds.
							}

						});
				}
				</script>

				<?php

					// Grab the iBlock Pathway content if it exists
					if ( !empty( $pathway_content) ) {
				?>
				<div id="iblock-content-pathway" class="iblock-pathway-container">
					<?php
						$pathway_print_value = get_post_meta(get_the_ID(),'pathway_meta_content',true);
							echo html_entity_decode($pathway_print_value);
					?>
				</div>
				<div class="iblock-pathway-container">
					<div class="columns">
						<div class="column is-8 is-offset-2 padding-bottom">
							<h1><strong>Drive student achievement, and career readiness.</strong></h1>
							<h5><a href="https://www.iblocks.com"><strong>Introducing iBlocks</strong></a>, a cross-curricular, holistic learning approach by structuring your learning content with a primary and secondary subject focus. But because iBlocks are also customizable and expandable, these foci can change to suit your school’s needs, should you choose to tailor your iBlock.</h5>
							<p class="has-text-centered"><img class="three-quarters-width" src="/wp-content/uploads/2020/02/project-based-learning-iblocks-image.jpg" /></p>
						</div>
					</div>
				</div>
				<?php }
					// Grab the PD content if it exists
					if ( !empty( $pd_content) ) {
				?>
				<div id="otis-pd-course" class="otis-pd-course-container">
					<div class="before-course-content">
						<div class="container">
							<div class="columns is-centered">
								<div class="column is-6-desktop is-8-tablet">
									<h1><strong>We Help Educators Succeed!</strong></h1>
									<p class="hide-laptop">Boost your classroom technology skills to engage your students and improve instruction with Teq’s Online Professional Development platform, now known as <strong>OTIS for educators.</strong> <u>SCROLL DOWN</u> for a sample course.</p>
								</div>
							</div>
						</div>
					</div>
					<?php
						$pd_print_value = get_post_meta(get_the_ID(),'pd_meta_content',true);
							echo html_entity_decode($pd_print_value);
					?>
				</div>
				<?php } ?>
			</section>
			<?php
				// Grab the PD content if it exists and put the content into the second tab
				if ( !empty( $pd_content) ) {
			?>
			<section ng-show="isSet(2)">
				<div id="otis-pd-course" class="otis-pd-course-container">
					<div class="before-course-content">
						<div class="container">
							<div class="columns is-centered">
								<div class="column is-6-desktop is-8-tablet">
									<h1><strong>We HelpEducators Succeed!</strong></h1>
									<p class="hide-laptop">Boost your classroom technology skills to engage your students and improve instruction with Teq’s Online Professional Development platform, now known as <strong>OTIS for educators.</strong> <u>SCROLL DOWN</u> for a sample course.</p>
								</div>
							</div>
						</div>
					</div>
					<?php
						$pd_print_value = get_post_meta(get_the_ID(),'pd_meta_content',true);
							echo html_entity_decode($pd_print_value);
					?>
				</div>
			</section>
			<?php } ?>
			<?php
				// Grab the iBlock Pathway content if it exists and put the content into the third tab
				if ( !empty( $pathway_content) ) {
			?>
			<section ng-show="isSet(3)">
				<div id="iblock-content-pathway" class="iblock-pathway-container">
					<?php
						$pathway_print_value = get_post_meta(get_the_ID(),'pathway_meta_content',true);
							echo html_entity_decode($pathway_print_value);
					?>
				</div>
				<div class="iblock-pathway-container">
					<div class="columns">
						<div class="column is-8 is-offset-2 padding-bottom">
							<h1><strong>Drive student achievement, and career readiness.</strong></h1>
							<h5><a href="https://www.iblocks.com"><strong>Introducing iBlocks</strong></a>, a cross-curricular, holistic learning approach by structuring your learning content with a primary and secondary subject focus. But because iBlocks are also customizable and expandable, these foci can change to suit your school’s needs, should you choose to tailor your iBlock.</h5>
							<p class="has-text-centered"><img class="three-quarters-width" src="/wp-content/uploads/2020/02/project-based-learning-iblocks-image.jpg" /></p>
						</div>
					</div>
				</div>
			</section>
			<?php } ?>
			<?php
				// Grab the other tabs content if it exists
				if ( !empty( $tabs_content) ) {
					$tabs_print_value = get_post_meta(get_the_ID(),'tabs_meta_content',true);
						echo html_entity_decode($tabs_print_value);
				}
				endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
