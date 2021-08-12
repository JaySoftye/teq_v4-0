<?php
/**
 * Template Name: Product Page Version 2
 * The template for displaying Products (includes Sub headers, OTIS Course Call-Out, Project-Based Learning Call-Out, Meta values, similar products)
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
			<hr />
			<p>Additional product options included with quote:</p>
			<div class="product-options-container">
				<div class="panel">
					<label class="checkbox panel-block">
						<input type="checkbox" name="additionalOptions[]" value=" professional development"> Professional Development
					</label>
				</div>
				<div class="panel">
					<label class="checkbox panel-block">
						<input type="checkbox" name="additionalOptions[]" value=" content and curriculum"> Content/Curriculum
					</label>
				</div>
				<div class="panel">
					<label class="checkbox panel-block">
						<input type="checkbox" name="additionalOptions[]" value=" project-based learning"> Project-Based Learning Activities
					</label>
				</div>
			</div>
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

						// IF ANY ADDITIONAL PROJECT OPTIONS ARE ::selected DISPLAY VALUE IN "blanks" FIELD
						var productOptions = new Array();
						$.each($('input[name="additionalOptions[]"]:checked'), function() {
							productOptions.push($(this).val());
						});
							$('input[name="blanks"]').val(productOptions)
								$('.project-objects-container').hide();


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
					?>
				</div>
				<video class="pd-clip" autoplay muted loop>
  				<source src="<?php echo get_template_directory_uri() . '/inc/ui/otis-course-popup-image_clip.mp4'; ?>" type="video/mp4">
				</video>
				<video class="pbl-clip" autoplay muted loop>
  				<source src="<?php echo get_template_directory_uri() . '/inc/ui/pbl-popup-image_clip.mp4'; ?>" type="video/mp4">
				</video>
				<div class="conversation-bubble pd">
					<a href><img src="https://www.teq.com/images/headshots_circles/JosephQuadrino.png" /> Looking for Professional Development on this product?</a>
				</div>
				<div class="conversation-bubble iblocks">
					<a href><img src="https://www.teq.com/images/headshots_circles/DawnCastillo.png" /> Did you know we also offer Project-Based Learning Activities?</a>
				</div>
				<svg class="<?php echo $parent_slug; ?>">
					<clipPath id="videoClipPath">
						<circle id="logoHighlight" cx="66%" cy="48%" r="0" />
					</clipPath>
				</svg>
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
  							<button class="button rounded no-shadow is-black pricing-modal-activate">Get Pricing</button>
  							<button class="button rounded no-shadow scrollto" data-attr-scroll="productForm">Product Details</button>
							</div>
							<a class="similar-product-modal-activate caption"><b>Want to see similar products?</b></a>
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

				<div id="iblock-content-pathway" class="iblock-pathway-container">
					<section class="hero is-large">
				  	<div class="hero-body">
							<div class="columns is-centered is-multiline">
								<div class="column is-8 has-text-centered">
									<h1><strong>Discover what’s possible.</strong></h1>
									<p>The applications for using robots to teach are endless. In this lesson idea, students code Dash to go along with a Map Skills unit, creating a vibrant and <strong>multi disciplinary learning experience.</strong></p>
								</div>
								<div class="column is-8 pathway-content">
									<div class="card-container">
										<div class="card">
											<div class="card-image">
												<figure>
													<?php echo get_the_post_thumbnail( $post_id, 'full', array( 'class' => 'featured-image' ) ); ?>
												</figure>
											</div>
											<div class="card-content">
												<div class="content">
													<h3 class="condensed-text">LESSON PLAN</h3>
													<img src="<?php echo get_template_directory_uri() . '/inc/images/lesson-content-load_fill_dbdbdb.svg'; ?>" />
												</div>
											</div>
											<footer class="card-footer">
		    								<a href class="card-footer-item caption strong">PRINT LESSON</a>
		    								<a href class="card-footer-item caption strong" ng-click="setTab(3)">MORE INFO</a>
		  								</footer>
										</div>
										<div class="card">
											<div class="card-image">
												<figure>
													<?php echo get_the_post_thumbnail( $post_id, 'full', array( 'class' => 'featured-image' ) ); ?>
												</figure>
											</div>
											<div class="card-content">
												<div class="content">
													<h3 class="serif-text">LESSON PLAN</h3>
													<img src="<?php echo get_template_directory_uri() . '/inc/images/lesson-content-load_fill_dbdbdb.svg'; ?>" />
												</div>
											</div>
											<footer class="card-footer">
		    								<a href class="card-footer-item caption strong">-</a>
		    								<a href class="card-footer-item caption strong">-</a>
		  								</footer>
										</div>
									</div>
									<div class="lesson-container">
										<ul class="lesson-steps">
											<li class="sub-header"><strong>Dash Discovers The World</strong></li>
											<li><span>1</span> Lay an oversized map of the world on the floor of your classroom during your Map Skills unit.</li>
											<li><span>2</span> Code Dash to travel to three different countries on the map. Have students do this by identifying the cardinal directions.</li>
											<li><span>3</span> Ask students create a story about Dash's adventures travelling the world, recalling specific details about Dash's code as well as the map skills recently learned.</li>
											<li><span>4</span> Give students time to present their story. Stories can be in the form of a coded display with Dash, a stop-motion video, an essay, poem, and more!</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="columns is-centered is-multiline pblocks-container">
								<div class="column is-8 has-text-centered">
									<h1><img src="<?php echo get_template_directory_uri() . '/inc/images/pBlocks_logo_white-900px.jpg'; ?>" alt="pBlocks" /></h1>
									<p>Enjoy our introductory product primer videos to get you started with your new piece of edtech. These videos are <strong>made with both teachers and students in mind,</strong> so you can watch them yourself, send them home, or watch as a group.</p>
									<div class="pblock-search-field">
      							<select>
        							<option selected disabled>Choose which pBlock video to view</option>
											<option>pBlocks - Cue</option>
											<option>pBlocks - Dash</option>
      							</select>
									</div>
									<video controls poster="https://cf561eb26.lwcdn.com/i/v-i-299523bd-ac03-4675-be92-26be2e9a2f2e-high-5.jpg?cache=1622560426219">
										<source src="https://cf561eb26.lwcdn.com/v-299523bd-ac03-4675-be92-26be2e9a2f2e_high.mp4" type="video/mp4">Your browser does not support the video tag.
									</video>
								</div>
							</div>
				  	</div>
					</section>

					<?php
						// Grab the iBlock Pathway content if it exists
						if ( !empty( $pathway_content) ) {
							$pathway_print_value = get_post_meta(get_the_ID(),'pathway_meta_content',true);
								echo html_entity_decode($pathway_print_value);
						}
					?>
				</div>

			</section>
			<?php
				// Grab the PD content if it exists and put the content into the second tab
				if ( !empty( $pd_content) ) {
			?>
			<section  id="otis-pd-course" ng-class="{'is-active': isSet(2) }" class="modal pd-product-course">
				<div class="modal-background" ng-click="setTab(1)"></div>

				<div class="modal-content is-multiline columns">
					<div class="column is-full has-text-centered white-text">
						<h2 class="white-text"><strong>We HelpEducators Succeed!</strong></h2>
						<p class="white-text hide-tablet">Boost your classroom technology skills to engage your students and improve instruction with Teq’s Online Professional Development platform, now known as <strong>OTIS for educators.</strong></p>
					</div>
					<img class="three-quarter-width margin-auto hide-laptop" src="<?php echo get_template_directory_uri() . '/inc/images/otis-course-popup-image_transparent.png'; ?>" />
					<article class="modal-card-body course-content card">
						<div class="card-header">
							<?php echo get_the_post_thumbnail( get_the_ID(), 'full', array( 'class' => 'feature-image-cover' )); ?>
						</div>
						<?php $pd_print_value = get_post_meta(get_the_ID(),'pd_meta_content',true); echo html_entity_decode($pd_print_value); ?>
					</article>
				</div>
				<button class="modal-close is-large" aria-label="close" ng-click="setTab(1)"></button>
			</section>
			<section  id="iblocks-pbl" ng-class="{'is-active': isSet(3) }" class="modal pd-product-course iblocks">
				<div class="modal-background" ng-click="setTab(1)"></div>
				<div class="modal-content is-multiline columns">
					<img class="feature-image-cover" src="<?php echo get_template_directory_uri() . '/inc/images/iblocks-popup-image_transparent.png'; ?>" />
					<article class="modal-card-body course-content card">
						<div class="card-header">
							<img class="feature-image-cover" src="<?php echo get_template_directory_uri() . '/inc/images/iblocks-popup-image_header.jpg'; ?>" />
						</div>
						<div class="course-card">
							<h4><strong>Drive student achievement, and career readiness.</strong></h4>
							<p>Introducing iBlocks, a cross-curricular, holistic learning approach by structuring your learning content with a primary and secondary subject focus. But because iBlocks are also customizable and expandable, these foci can change to suit your school’s needs, should you choose to tailor your iBlock.</p>
							<footer class="card-footer">
								<div class="card-footer-item">
									<a href="https://otis.teq.com/events/preview/14183" class="button is-black no-shadow rounded nomargin">More iBlocks Info</a>
								</div>
							</footer>
						</div>
					</article>
				</div>
				<button class="modal-close is-large" aria-label="close" ng-click="setTab(1)"></button>
			</section>
		<?php }
			// END OF PD CONTENT
		?>
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

	<script src="<?php echo get_template_directory_uri() . '/js/product_page-template_app.js'; ?>"></script>

<?php
get_footer();
