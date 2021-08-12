<?php
/**
 * Template Name: Product Page with Similar Products Button
 * The template for displaying Products (includes Sub headers, OTIS Course, Pathway meta values)
 * @package Teq_v4.0
 */

get_header();
?>

<div id="product-form" product-title="<?php the_title_attribute(); ?>" class="modal product-pricing similar-products-options">
	<div class="modal-background"></div>
	<div class="modal-content is-centered columns pricing-form">
		<section class="modal-card-body column is-three-quarters rounded-corners">
			<?php echo get_the_post_thumbnail(); ?>
			<p>To request exact pricing for <strong><?php the_title_attribute(); ?></strong>, simply fill out the form below and a Teq Representative will reach out to you directly.</p>
			<br />
			<!--[if lte IE 8]>
			<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
			<![endif]-->
			<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
			<script>
				hbspt.forms.create({
					portalId: "182596",
					formId: "7066d3c7-0d82-4dca-8b83-48fe09525649",
					submitButtonClass: '',
					inlineMessage: '-',
					onFormSubmit: function($form) {

						// GRAB THE PAGE TITLE AND SET 'BLANK' HIDDEN INPUT FIELD AS TITLE OF THE PAGE
						var title = $("#product-form").attr("product-title");
						$('input[name="blank"]').val(title)

						// SET CONFIRMATION TEXT UPON FormSubmit to #similarProductFormSubmitText HTML ELEMENT
						$('h2#similarProductFormSubmitText').html('<strong class="blue-text condensed-text">Thank you </strong>for your interest. <span class="block is-size-5">A Teq Representative will reach out to you shortly, but please feel free to contact us with any additional questions at 877.455.9369.<br /><br /><br /><strong class="is-size-4">You might also be interested in:</strong></span>');
						// SET PRICING FORM CONTAINER TO HIDDEN
						$('.modal-content.pricing-form').hide();
						// DISPLAY SIMILAR PRODUCTS CONTAINER UPON FormSubmit
						$('.modal-content.similar-products').css('display', 'flex');
					}
				});
			</script>
		</section>
	</div>
	<div class="modal-content is-centered columns similar-products">
		<h2 id="similarProductFormSubmitText" class="column is-full has-text-centered white-text"><strong>You might also be interested in:</strong></h2>

		<?php
		// GET MATCHING CPT Product-and-Service
		// STORE in ARRAY ALL 'CATEGORIES' ASSOCIATED WITH MATCHING CustomPostType
			$post_name = get_the_title();
			$post = get_page_by_title( $post_name, OBJECT, 'Product-and-Service' );
			$terms = wp_get_post_categories( $post->ID );
			$categories = array();
				foreach ( $terms as $term => $post_terms ) {
					$categories[] = $post_terms;
				};

			// EXCLUDE 'CDW-G, FAMIS Product, Teq Product, Teq-tivities' CATEGORIES FROM THE ARRAY
			$cdw_g_cat = get_cat_ID('CDW-G');
			$famis_cat = get_cat_ID('FAMIS Product');
			$teq_cat = get_cat_ID('Teq Product');
			$teqtivities_cat = get_cat_ID('Teq-tivities');
				$excluded_categories = array($cdw_g_cat, $famis_cat, $teq_cat, $teqtivities_cat);
				$categories = array_diff($categories, $excluded_categories);


				// QUERY WORDPRESS LOOP
				if ( have_posts() ) :
					$args = array(
						'post_type' => 'product-and-service',
						'cat' => $categories,
						'post__not_in' => array( $post->ID ),
						'taxonomy' => 'topic',
						'posts_per_page' => 3,
						'orderby' => 'rand',
						'tax_query' => array(
							array (
								'taxonomy' => 'topics',
								'field' => 'slug',
								'terms' => 'STEM Technologies'
							)
						),
					);

			$the_query = new WP_Query( $args );
				while ($the_query -> have_posts()) : $the_query -> the_post();
					$custom_url = get_post_meta( $post->ID, 'custom_url_meta_content', true );
		?>
			<article class="column is-one-third rounded-corners <?php echo implode( ' ', $categories ); ?>">
				<div class="modal-card-body card">
					<a href="<?php if(empty( $custom_url)) { the_permalink(); } else { echo get_post_meta( $post->ID, 'custom_url_meta_content', true ); } ?>">
						<span class="block has-text-centered strong is-size-5"><?php the_title(); ?></span>
						<?php echo get_the_post_thumbnail( $post_id, 'full', array( 'class' => 'featured-image' ) ); ?>
					</a>
				</div>
			</article>
		<?php endwhile; endif; wp_reset_postdata(); // End have_posts() check. ?>
	</div>
	<button class="modal-close is-large" aria-label="close"></button>
</div>

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

					// GRAB THE PARENT PAGE TITLE
					$post_data = get_post($post->post_parent);
						$parent_slug = $post_data->post_name;

					// Grab the Sub Header Meta for the product sub navbar if it exists
					if( !empty( $sub_header) ) {
			?>
			<nav id="subhead" class="navbar product-site-header">
				<div class="navbar-menu similar-products-template">
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
							<div class="buttons">
  							<button class="button rounded no-shadow is-black pricing-modal-activate">Contact a Sales Rep</button>
  							<button class="button rounded no-shadow scrollto" data-attr-scroll="productForm">Product Details</button>
							</div>
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
							inlineMessage: '',

							onFormSubmit: function($form) {

								// GRAB THE PAGE TITLE AND SET 'BLANK' HIDDEN INPUT FIELD AS TITLE OF THE PAGE
								var title = document.getElementsByTagName("title")[0].innerHTML;
								$('input[name="blank"]').val(title)

								// SET REDIRECT WITH FORM DATA IN URL
								setTimeout( function() {
									var formData = $form.serialize();
									window.location = "/thankyouforyourinterest?" + formData;
								}, 50 ); // Redirects to url with query string data from form fields after 250 milliseconds.
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
