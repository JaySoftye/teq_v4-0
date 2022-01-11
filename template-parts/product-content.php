<?php
/**
 * Template part for displaying custom post type product and service content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Teq_v4.0
 */

?>

<section class="post-<?php the_ID(); ?> grey-background">
	<div class="container padding-top">
		<div class="columns is-desktop is-vend featured-container">
			<div class="column is-4 notopbottompadding featured-content">
				<?php if ( is_singular() ) :
					the_title( '<h1 class="headline-title">', '</h1>' );
					else :
						the_title( '<h2 class="page-titles strong"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					endif; ?>

					<div class="content">
						<?php echo get_the_excerpt(); ?>
					</div>

					<div class="content padding-bottom">
						<?php
							// CHECK IF THIS IS AN CDW EDC OR FAMIS PRODUCT
							// DISPLAY BACK BUTTON LINK BASED ON TYPE OF PRODUCT
							if(isset($_GET['edc'])) { ?>
								<button class="button no-shadow rounded caption" g-model="hidden" ng-click="hidden=!hidden">Need a Quote?</button>
						<?php } elseif(isset($_GET['famis'])) { ?>
							<a class="button no-shadow rounded small-text" href="/nycdoe/#famis-products-container">Back to Products</a>
							<button class="button no-shadow rounded caption" g-model="hidden" ng-click="hidden=!hidden">Need a Quote?</button>
						<?php } ?>
							<a class="button no-shadow rounded caption" href="javascript:window.print()" data-tooltip="Tooltip Text">PRINT</a>

						<div class="columns" ng-show="hidden">
							<div class="column hbspot-form_quote">
								<h4 class="padding-sm-top">Interested in <strong><?php echo the_title(); ?></strong> for your school or classroom?<br />Request a quote using the form below.</h4>

								<?php
									// CHECK IF THIS IS AN CDW EDC OR FAMIS PRODUCT
									// DISPLAY QUOTE FORM BASED UPON CDW OR FAMIS
									if(isset($_GET['edc'])) { ?>
										<!--[if lte IE 8]>
										<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
										<![endif]-->
										<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
										<script>
  										hbspt.forms.create({
												portalId: "182596",
												formId: "d90fa090-8474-4069-90b2-909d2b9e42d7",
												submitButtonClass: '',
		    								inlineMessage: 'Request Submitted, Thanks.',
		    									onFormSubmit: function($form){
														// GRAB THE PAGE TITLE AND SET 'BLANK' HIDDEN INPUT FIELD AS TITLE OF THE PAGE
														var title = $(document).find("title").text();
														$('input[name="blank"]').val(title)

														// SET REDIRECT WITH FORM DATA IN URL
		        								setTimeout( function() {
		            							var formData = $form.serialize();
		            								window.location = "/thankyouforyourinterest?" + formData;
		        									}, 250 ); // Redirects to url with query string data from form fields after 250 milliseconds.
		    										}
													});
											</script>
										<?php } elseif(isset($_GET['famis'])) { ?>
											<!--[if lte IE 8]>
											<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
											<![endif]-->
											<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
											<script>
												hbspt.forms.create({
													portalId: "182596",
													formId: "42b188a8-165d-4be0-af27-ce6016a04a8a",
													submitButtonClass: '',
		    									inlineMessage: 'Request Submitted, Thanks.',
		    										onFormSubmit: function($form){

															// GRAB THE PAGE TITLE AND SET 'BLANK' HIDDEN INPUT FIELD AS TITLE OF THE PAGE
															var title = $(document).find("title").text();
															$('input[name="blank"]').val(title)

															// SET REDIRECT WITH FORM DATA IN URL
		        									setTimeout( function() {
		            								var formData = $form.serialize();
		            								window.location = "/thankyouforyourinterest?" + formData;
		        									}, 250 ); // Redirects to url with query string data from form fields after 250 milliseconds.
		    										}
												});
											</script>
									<?php } ?>
								<hr />
							</div>
						</div>
					</div>
			</div>
			<div class="column notopbottompadding featured-image">
				<?php
        	if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
            the_post_thumbnail( 'full', array( 'class'  => 'full-width' ) ); // show featured image
        	}
    		?>
			</div>
		</div>
	</div>
</section>
<section class="post-<?php the_ID(); ?> container padding-bottom">
	<div class="columns is-desktop">
		<div class="column is-4 topic-tags padding-top padding-right">

			<?php if(get_the_title() === 'iBlocks') { ?>
				<img src="/wp-content/uploads/2020/02/product-site-header_iblocks-logo.svg" />
			<?php } else { ?>
				<h5>-</h5>
			<?php } ?>



			<p>
				<?php
					function getProductTopics() {
						foreach(get_the_terms($product_query->post->ID, 'topics') as $topics)
							echo $topics->name . "/ ";
					}
					function getProductGrades() {
						foreach(get_the_terms($product_query->post->ID, 'grades') as $grades)
							echo $grades->name . "/ ";
					}
					function getProductProficiencies() {
						foreach(get_the_terms($product_query->post->ID, 'proficiency') as $proficiencies)
							echo $proficiencies->name . "/ ";
					}
					function getProductCurriculums() {
						foreach(get_the_terms($product_query->post->ID, 'curriculum') as $curriculums)
							echo $curriculums->name . "/ ";
					}

					echo getProductTopics(); getProductGrades(); getProductProficiencies(); getProductCurriculums();
				?>
			</p>
			<?php
				if(isset($_GET['edc'])) {
					$edc_info = get_post_meta( get_the_ID(), 'edc_meta_content', true );
					echo html_entity_decode($edc_info);
				// SHOW THE FAMIS META INFO
				} elseif(isset($_GET['famis'])) {
					$famis_info = get_post_meta( get_the_ID(), 'famis_meta_content', true );
					echo html_entity_decode($famis_info);
				}
			?>
		</div>
		<div class="column entry-content padding-top">
			<?php
				if(isset($_GET['edc'])) {
					$edc_info = get_post_meta( get_the_ID(), 'additional_info_meta_content', true );
					echo html_entity_decode($edc_info);
				}
					the_content();
			?>
		</div>
	</div>
</section>
<?php if(isset($_GET['edc'])) { ?>
	<section class="post-<?php the_ID(); ?> grey-background">
		<div class="container padding-top">
			<div class="columns is-desktop is-vend">
				<div class="column is-4 notopbottompadding">
					<h1 class="headline-title">Professional Development Made Easy</h1>
					<div class="content">
						<p>With Otis (formerly known as Opd), educators have access to PD that will boost their technology skills, and provide them with new ways to engage students and improve instruction. Otis PD helps teachers fulfill state-mandated PD hours while learning valuable skills on dozens of technology topics. Administrators can align PD with instructional goals and create personalized PD plans for their staff.</p>
						<p>
					</div>
					<div class="content padding-bottom">
						<a class="button no-shadow rounded caption" href="/product-and-service/otis-for-educators/?edc">Read More</a>
					</div>
				</div>
				<div class="column notopbottompadding">
					<img class="full-width wp-post-image" src="<?php echo get_template_directory_uri() . '/inc/images/CDW-G-otis-post-image.jpg'; ?>" alt="OTIS for educators" />
				</div>
			</div>
		</div>
	</section>
<?php } ?>
