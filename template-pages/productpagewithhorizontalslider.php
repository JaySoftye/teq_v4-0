<?php
/**
 * Template Name: Product Page with Horizontal Slider
 * The template for displaying Products (includes Sub headers, OTIS Course, Pathway meta values)
 * with Additional Product and Service slider for the product-and-service custom post type
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
				?>
				<section class="product-demo-form" ng-show="demoFormCollapsed">
					<div class="columns">
						<div class="column">
							<a class="delete is-large close-form" href ng-model="demoFormCollapsed" ng-click="demoFormCollapsed=!demoFormCollapsed"></a>
							<!--[if lte IE 8]>
							<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
							<![endif]-->
							<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
							<script>
								hbspt.forms.create({
									portalId: "182596",
									formId: "7066d3c7-0d82-4dca-8b83-48fe09525649",
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
						</div>
					</div>
				</section>
			</nav>
			<section ng-show="isSet(1)">
				<div class="container padding-top">

					<div class="scroll-down bounce">
						<svg version="1.1" viewBox="0 0 99 99">
							<path d="M45.383,80.352c0.068,0.056,0.141,0.105,0.211,0.157c0.099,0.075,0.197,0.151,0.3,0.221c0.09,0.06,0.183,0.112,0.274,0.167 c0.09,0.054,0.178,0.11,0.27,0.16c0.096,0.051,0.195,0.095,0.293,0.141c0.094,0.044,0.187,0.091,0.283,0.131 c0.096,0.04,0.194,0.072,0.292,0.107c0.102,0.037,0.203,0.076,0.308,0.108c0.099,0.03,0.199,0.052,0.298,0.077 c0.106,0.027,0.21,0.056,0.318,0.078c0.118,0.023,0.238,0.038,0.357,0.054c0.091,0.013,0.18,0.03,0.271,0.039 c0.428,0.042,0.858,0.042,1.286,0c0.09-0.009,0.177-0.026,0.266-0.038c0.121-0.017,0.242-0.031,0.362-0.055 c0.105-0.021,0.207-0.05,0.311-0.076c0.102-0.026,0.205-0.048,0.306-0.079c0.101-0.031,0.199-0.069,0.298-0.104 c0.101-0.036,0.203-0.07,0.303-0.111c0.091-0.038,0.179-0.082,0.268-0.124c0.104-0.049,0.208-0.095,0.309-0.149 c0.084-0.045,0.164-0.097,0.246-0.145c0.1-0.059,0.201-0.116,0.299-0.182c0.088-0.059,0.17-0.124,0.255-0.187 c0.086-0.064,0.173-0.123,0.257-0.192c0.134-0.11,0.261-0.229,0.387-0.349c0.029-0.028,0.06-0.051,0.088-0.079l21.162-21.163 c2.538-2.538,2.538-6.654,0-9.192c-2.539-2.539-6.654-2.539-9.192,0L56,59.632V23.677c0-3.59-2.91-6.5-6.5-6.5s-6.5,2.91-6.5,6.5 v35.956L32.933,49.565c-2.538-2.539-6.653-2.539-9.192,0c-1.269,1.269-1.903,2.933-1.903,4.596s0.635,3.327,1.904,4.596 l21.158,21.157C45.053,80.069,45.214,80.214,45.383,80.352z"/>
						</svg>
					</div>

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

				<?php
					// Grab the main contents for the page
					the_content();

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
							<p class="has-text-centered"><img class="full-width" src="/wp-content/uploads/2020/02/project-based-learning-iblocks-image.jpg" /></p>
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
							<div class="columns">
								<div class="column is-6 is-offset-3">
									<h1><strong>We Help Educators Succeed!</strong></h1>
									<h5><strong>Boost your classroom technology skills to engage your students and improve instruction with Teq’s Online Professional Development platform, now known as OTIS.</strong></h5>
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
							<div class="columns">
								<div class="column is-6 is-offset-3">
									<h1><strong>We Help Educators Succeed!</strong></h1>
									<h5><strong>Boost your classroom technology skills to engage your students and improve instruction with Teq’s Online Professional Development platform, now known as OTIS.</strong></h5>
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
							<p class="has-text-centered"><img class="full-width" src="/wp-content/uploads/2020/02/project-based-learning-iblocks-image.jpg" /></p>
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

			<section class="relative-position padding-bottom z-index-top white-background-fill">
				<div class="slider-start columns padding-bottom">
					<div class="column nopadding">

						<div class="hs-container">
							<ul class="hs">

							<?php if ( have_posts() ) :
								$args = array(
									'post_type' => 'product-and-service',
									'taxonomy' => 'topic',
									'posts_per_page' => -1,
									'orderby' => 'title',
									'order'   => 'ASC',
									'tax_query' => array(
        						array (
            					'taxonomy' => 'topics',
            					'field' => 'slug',
            					'terms' => array( "STEM Technologies", "Educational Technology" )
        						)
    							),
								);

							$the_query = new WP_Query( $args );
								while ($the_query -> have_posts()) : $the_query -> the_post();
									$custom_url = get_post_meta( $post->ID, 'custom_url_meta_content', true );
							?>

								<li class="<?php $terms = get_the_terms( $post->ID, 'topics' ); foreach($terms as $term) { echo $term -> slug . ' '; } ?>item">
									<article class="box">
										<div class="image-link">
											<a href="<?php if(empty( $custom_url)) { the_permalink(); } else { echo get_post_meta( $post->ID, 'custom_url_meta_content', true ); } ?>">
												<?php echo get_the_post_thumbnail( $post_id, 'full', array( 'class' => 'featured-image' ) ); ?>
											</a>
										</div>
										<h4 class="strong"><?php the_title(); ?></h4>
										<?php the_excerpt(); ?>
										<h6>
											<a class="relative-position block strong" href="<?php if(empty( $custom_url)) { the_permalink(); } else { echo get_post_meta( $post->ID, 'custom_url_meta_content', true ); } ?>"><span class="arrow"></span></a>
										</h6>
									<article>
								</li>

							<?php endwhile; endif; wp_reset_postdata(); // End have_posts() check. ?>
							</ul>
						</div>

					</div>
				</div>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
