<?php
/**
 * Template Name: Professional Development Product Page
 * The template for displaying OTIS and Onsite PD and PD Bios
 * @package Teq_v4.0
 */

get_header();
?>

	<div id="primary" class="content-area white-background-fill" ng-app="productTabs">
		<main id="main" class="site-main section-container" ng-controller="TabController">

			<?php while ( have_posts() ) : the_post();

				// IF THE PAGE IS THE PD BIO PAGE DISABLE THIS
				$page_title = get_the_title( get_the_ID() );
				if ($page_title === 'Professional Development Team Biographies') {

			?>
				<section class="container padding">
					<div class="columns is-centered">
						<div class="column is-full">
							<h4 class="margin-bottom">We provide you with access to a dedicated team of State Certified Educators with skills and expertise in every subject and content area – English, Math, Science, Social Studies, STEM, ENL and Special Education. Teq’s PD Specialists and Curriculum Specialists who facilitate both our Onsite PD and Online PD sessions are all SMART Certified Trainers, Google Certified Educators, and possess various certifications including, but not limited to: <strong>Microsoft Office 365; Adobe Acrobat; STEM, Robotics and Coding; and Apple.</strong></h4>
						</div>
					</div>
					<div class="columns is-centered is-multiline padding-bottom">
						<?php $blogusers = get_users( [ 'role__in' => [ 'author' ] ] );
							// Array of WP_User objects.
							foreach ( $blogusers as $user ) {
								echo '<div class="column is-4"><div class="card" style="height:100%;"><div class="card-content">';
								echo '<div class="media">';
								echo '<div class="media-left">';
								echo '<figure class="image is-96x96"><img src="https://www.teq.com/images/headshots_circles/' . esc_html( $user->first_name ) . esc_html( $user->last_name ) . '.png" /></figure>';
								echo '</div>';
								echo '<div class="media-content"><p class="title is-5">' . esc_html( $user->first_name ) . ' ' . esc_html( $user->last_name ) . '<br />';
								echo '<small><em>' . esc_html( $user->nickname ) . '</em><br /><a href="mailto:' . esc_html( $user->user_email ) . '">' . esc_html( $user->user_email ) . '</a></small></p></div>';
								echo '</div>';
								echo '<div class="content">';
								echo '<p>' . $user->background . '</p>';
									if ( !empty( $user->certification) ) {
										echo '<p><strong class="caption">CERTIFICATIONS:</strong><br />' . $user->certification . '</p>';
									}
								echo '<p class="caption">' . $user->description . '</p>';
								echo '</div>';
								echo '</div></div></div>';
							}
						?>
					</div>
				</section>
			<?php
				} else {

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
				<div class="navbar-menu">
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
					<svg class="<?php echo $parent_slug; ?>">
						<circle id="logoHighlight" cx="30%" cy="30%" r="0" />
					</svg>
				</div>
			</nav>
			<section ng-show="isSet(1)">
				<div class="container padding-top">

					<div class="pre-content-container product-content-container columns is-vcentered is-multiline is-desktop">
						<div class="column featured-image is-three-fifths <?php echo $parent_slug; ?>">
							<?php
								// Get the Feature Image
								echo get_the_post_thumbnail( get_the_ID(), 'full', array( 'class' => 'feature-image-cover' ));
							?>
							<svg>
  							<circle id="featureHighlight" cx="50%" cy="50%" r="45%" />
							</svg>
						</div>
						<div class="column is-two-fifths-desktop <?php echo $parent_slug; ?>">
							<?php
								// Grab the Header Info Meta for the product intro if it exists
								if ( !empty( $header_info) ) {
									$header_info_print_value = get_post_meta(get_the_ID(),'header_info_meta_content',true);
									echo html_entity_decode($header_info_print_value);
								}
							?>
						</div>
						<div class="relative-position scroll-icon-container hide-laptop">
							<div class="icon-scroll vertical"></div>
							<p class="margin-sm-bottom caption">SCROLL</p>
						</div>
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
									<h1><strong>We Help Educators Succeed!</strong></h1>
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

			<section ng-show="isSet(2)">
				<div class="content-container container margin-bottom">
					<div class="columns is-centered">
						<div class="column is-full">
							<h4 class="margin-bottom">We provide you with access to a dedicated team of State Certified Educators with skills and expertise in every subject and content area – English, Math, Science, Social Studies, STEM, ENL and Special Education. Teq’s PD Specialists and Curriculum Specialists who facilitate both our Onsite PD and Online PD sessions are all SMART Certified Trainers, Google Certified Educators, and possess various certifications including, but not limited to: <strong>Microsoft Office 365; Adobe Acrobat; STEM, Robotics and Coding; and Apple.</strong></h4>
						</div>
					</div>
					<div class="columns is-multiline margin-bottom">

						<?php $blogusers = get_users( [ 'role__in' => [ 'author' ] ] );
							// Array of WP_User objects.
							foreach ( $blogusers as $user ) {
								echo '<div class="column is-4"><div class="card" style="height:100%;"><div class="card-content">';
								echo '<div class="media">';
								echo '<div class="media-left">';
								echo '<figure class="image is-96x96"><img src="https://www.teq.com/images/headshots_circles/' . esc_html( $user->first_name ) . esc_html( $user->last_name ) . '.png" /></figure>';
								echo '</div>';
								echo '<div class="media-content"><p class="title is-5">' . esc_html( $user->first_name ) . ' ' . esc_html( $user->last_name ) . '<br />';
								echo '<small><em>' . esc_html( $user->nickname ) . '</em><br /><a href="mailto:' . esc_html( $user->user_email ) . '">' . esc_html( $user->user_email ) . '</a></small></p></div>';
								echo '</div>';
								echo '<div class="content">';
								echo '<p>' . $user->background . '</p>';
									if ( !empty( $user->certification) ) {
										echo '<p><strong class="caption">CERTIFICATIONS:</strong><br />' . $user->certification . '</p>';
									}
								echo '<p class="caption">' . $user->description . '</p>';
								echo '</div>';
								echo '</div></div></div>';
							}
						?>
					</div>
				</div>
			</section>

			<?php
				// Grab the other tabs content if it exists
				if ( !empty( $tabs_content) ) {
					$tabs_print_value = get_post_meta(get_the_ID(),'tabs_meta_content',true);
						echo html_entity_decode($tabs_print_value);
				}
			}
			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
