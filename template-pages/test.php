<?php
/**
 * Template Name: TEST
 * The template for displaying the Create Your Solution Section
 * @package Teq_v4.0
 */

get_header();

?>


<div id="primary" class="content-area">
	<main id="main" class="site-main section-container">
		<section class="full-section create-your-solution-container">
			<div class="container" ng-controller="solutionController">

				<?php echo file_get_contents(get_template_directory_uri() . '/inc/ui/dropshadow-filter.svg'); ?>

				<section id="solutionSet" class="columns is-multiline is-centered is-desktop">

					<?php
					/**
						* SET FORM DATA INTO Variables for use in WP Query
						*/
						$gradeLevel = 'grades-3-5';
						$stemFocus = 'general-education';
						$generalEducation = 'mathematics';
					?>

					<div class="column is-full-desktop is-full-mobile padding-bottom">
						<div class="has-text-centered">
							<h1>Product Summary Suggestion </h1>
							<h4 class="strong">Thank you for taking the time to complete your personal profile.</h4>
							<h5>To keep our promise of delivering The Complete Thought, click here to link to the <a class="strong" href="/evolve/">Evolve section</a> where we illustrate and suggest a method of implementing the components of your profile to an innovative and effective outcome. You will discover that we have left no stone unturned. With your input and our expertise, we will engineer a holistic and complete program to effectively introduce the infusion of STEM education in your class, school, or district. </h5>

						</div>
					</div>
					<div class="column is-full-desktop is-full-mobile solutions-container">
						<?php
							/**
								* WORDPRESS SEARCH QUERY FOR STEM PRODUCTS
								* Query Custom Post Type 'Product and Service'
								* TAXONOMY Criteria based up on user input
								*/

								$args = array(
									'post_type' => 'product-and-service',
									'post__in' => array(28806, 28758)
								);

								$the_query = new WP_Query( $args );
									if ($the_query -> have_posts()) : while ($the_query -> have_posts()) : $the_query -> the_post();
						?>
						<article class="ui rounded product-solution">
							<?php
								if (has_post_thumbnail( $post->ID ) ):
  								$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
							?>
  							<div class="product-image"  style="background-image: url('<?php echo $image[0]; ?>')"></div>
							<?php endif; ?>
							<div class="product-content">

								<nav class="navbar">
									<section class="navbar-menu">
										<div class="navbar-start">
											<h3 class="product-title"><?php the_title(); ?></h3>
										</div>
										<div class="navbar-end">
											<button onclick="window.print()" class="navbar-item">Print Solution</button>
											<a href class="navbar-item">Request a Quote</a>
										</div>
									</section>
								</nav>

								<div class="columns">
									<div>
										<?php the_excerpt(); ?>
									</div>
									<div>
										<p class="product-stats">
											<strong>Appropriate for Grade Level(s):</strong>
											<span>
												<?php
													$gradeTerms = get_the_terms( $post->ID, 'grades' );
													$gradeTermsCount = count($gradeTerms);
														foreach($gradeTerms as $gradeTerm) {
															echo $gradeTerm -> name . ', ';
														}
												?>
											</span>
										</p>
										<div class="bar-counter"><i data="<?php echo $gradeTermsCount; ?>"></i></div>
										<p class="product-stats">
											<strong>Technology Proficiency Level:</strong>
											<span>
												<?php
													$proficiencyTerms = get_the_terms( $post->ID, 'proficiency' );
													$proficiencyTermsCount = count($proficiencyTerms);
													foreach($proficiencyTerms as $proficiencyTerm) {
														echo $proficiencyTerm -> name . ', ';
													}
												?>
											</span>
										</p>
										<div class="bar-counter"><i data="<?php echo $proficiencyTermsCount; ?>"></i></div>
									</div>
								</div>
							</div>
						</article>


							<article class="ui rounded product-solution solution-pd">
								<div class="product-content onsite-pd">
									<div class="columns">
										<div class="column">
											<p><strong>Onsite and Virtual Professional Development</strong>Our PD Specialists will visit your school and provide hands-on training. You’ll learn all about your new edtech products — how they work, and how they can impact student success. Purchase PD days and work with us in a mentoring/coaching capacity, or receive a bundle of days with your technology purchase. </p>
										</div>
										<a class="pd-link onsite" href="<?php echo home_url(); ?>/browse/professional-development/onsite-professional-development/">See more</a>
									</div>
								</div>
							</article>

							<article class="ui rounded product-solution solution-pd otis-course">
								<div class="product-content">
									<div class="columns">
										<?php
											$pd_content_value = get_post_meta(get_the_ID(),'additional_info_meta_content',true);
												echo html_entity_decode($pd_content_value);
										?>
									</div>
								</div>
							</article>
						<?php	endwhile; endif; ?>

						<?php
							/**
								* WORDPRESS SEARCH QUERY FOR IBLOCK
								* Query Custom Post Type 'PATHWAY' IF DATA EXISTS
								* TAXONOMY Criteria based up on user input
								*/


									$args = array(
										'post_type' => 'pathways',
										'category_name' => $stemFocus,
										'posts_per_page' => 1,
										'orderby'   => 'rand',
										'tax_query' => array (
											'relation' => 'AND',
												array(
													'taxonomy' => 'topics',
													'field' => 'slug',
													'terms' => $generalEducation,
													'operator' => 'AND',
												),
												array(
													'taxonomy' => 'grades',
													'field' => 'slug',
													'terms' => $gradeLevel,
													'operator' => 'AND',
												),
											),
										);

										$the_query = new WP_Query( $args );
											if ($the_query -> have_posts()) : while ($the_query -> have_posts()) : 	$the_query -> the_post();
						?>
						<article class="ui rounded product-solution iblock-solution">
							<div class="columns is-vcentered product-content iblock-content">
								<div class="column is-one-third">
									<img src="<?php echo get_template_directory_uri() . '/inc/ui/iblock-content-header_iblocks-logo.svg'; ?>" />
								</div>
								<nav class="column navbar">
									<section class="navbar-menu">
										<div class="navbar-start">
											<h3 class="product-title">Project-Based Learning</h3>
										</div>
										<div class="navbar-end">
											<button onclick="window.print()" class="navbar-item">Print Solution</button>
											<a href class="navbar-item">Request a Quote</a>
										</div>
									</section>
								</nav>
							</div>
							<div class="columns product-content iblock-content">
								<div class="column is-4-desktop is-full-tablet is-full-mobile">
									<p class="strong"><?php the_title(); ?></p>
									<?php the_content(); ?>
								</div>
								<div class="column is-5-desktop is-full-tablet is-full-mobile">
									<p class="strong">iBlock Focus</p>
									<?php
										$iblock_focus_content = get_post_meta(get_the_ID(),'iblock_focus_meta_html',true);
										if ( !empty( $iblock_focus_content) ) {
											echo html_entity_decode($iblock_focus_content);
										}
									?>
									<img class="is-bottom-vertical" src="<?php echo get_template_directory_uri() . '/inc/ui/iblocks-featured-image.png'; ?>" />
								</div>
								<div class="column">
									<p class="product-stats">
										<strong>Appropriate for Grade Level(s):</strong>
										<span>
											<?php
												$gradeTerms = get_the_terms( $post->ID, 'grades' );
												$gradeTermsCount = count($gradeTerms);
													foreach($gradeTerms as $gradeTerm) {
														echo $gradeTerm -> name . ', ';
													}
											?>
										</span>
									</p>
									<div class="bar-counter"><i data="<?php echo $gradeTermsCount; ?>"></i></div>
									<p class="product-stats">
										<strong>Technology Proficiency Level:</strong>
										<span>
											<?php
												$proficiencyTerms = get_the_terms( $post->ID, 'proficiency' );
												$proficiencyTermsCount = count($proficiencyTerms);
												foreach($proficiencyTerms as $proficiencyTerm) {
													echo $proficiencyTerm -> name . ', ';
												}
											?>
										</span>
									</p>
									<div class="bar-counter"><i data="<?php echo $proficiencyTermsCount; ?>"></i></div>
									<p class="caption strong">An iBlock matches skills to standards (like Common Core or NGSS).</p>
									<p class="caption">An iBlock provides a cross-curricular, holistic learning approach by structuring your learning content with a primary and secondary subject focus. But because iBlocks are also customizable and expandable, these foci can change to suit your school’s needs, should you choose to tailor your iBlock.</p>
									<?php
										$iblock_focus_stats_content = get_post_meta(get_the_ID(),'iblock_focus_stats_html',true);
										if ( !empty( $iblock_focus_stats_content) ) {
											echo html_entity_decode($iblock_focus_stats_content);
										}
									?>
								</div>
							</div>
						</article>
						<?php endwhile; endif;

							/**
								* WORDPRESS SEARCH QUERY FOR TEQ-TIVITIES
								* Query Custom Post Type 'Product and Service'
								* TAXONOMY Criteria based up on user input
								*/

									$args = array(
										'post_type' => 'product-and-service',
										'category_name' => 'teq-tivities',
										'posts_per_page' => 1,
										'orderby'   => 'rand',
										'tax_query' => array (
											'relation' => 'AND',
											array(
												'taxonomy' => 'topics',
												'field' => 'slug',
												'terms' => $generalEducation,
												'operator' => 'AND',
											),
											array(
												'taxonomy' => 'category',
												'field' => 'slug',
												'terms' => $stemFocus,
												'operator' => 'AND',
											),
										),
									);

									$the_query = new WP_Query( $args );
										if ($the_query -> have_posts()) : while ($the_query -> have_posts()) : $the_query -> the_post();
						?>
						<article class="ui rounded product-solution iblock-solution">
							<div class="columns is-vcentered product-content iblock-content">
								<div class="column is-one-third">
									<img src="<?php echo get_template_directory_uri() . '/inc/ui/teq-tivities-logo-image.png'; ?>" />
								</div>
								<nav class="column navbar">
									<section class="navbar-menu">
										<div class="navbar-start">
											<h3 class="strong"><?php the_title(); ?></h3>
										</div>
										<div class="navbar-end">
											<button onclick="window.print()" class="navbar-item">Print Solution</button>
											<a href class="navbar-item">Request a Quote</a>
										</div>
									</section>
								</nav>
							</div>
							<div class="columns product-content iblock-content">
								<div class="column is-9-desktop is-full-tablet is-full-mobile">
									<?php the_content(); ?>
									<p class="margin-bottom">
										<a class="button dark pill" href="<?php echo get_post_meta( $post->ID, 'custom_url_meta_content', true ); ?>">VIEW ACTIVITY</a>
									</p>
								</div>
								<div class="column">
									<p class="product-stats">
										<strong>Appropriate for Grade Level(s):</strong>
										<span>
											<?php
												$gradeTerms = get_the_terms( $post->ID, 'grades' );
												$gradeTermsCount = count($gradeTerms);
													foreach($gradeTerms as $gradeTerm) {
														echo $gradeTerm -> name . ', ';
													}
											?>
										</span>
									</p>
									<div class="bar-counter"><i data="<?php echo $gradeTermsCount; ?>"></i></div>
									<p class="product-stats">
										<strong>Activity Incorporates:</strong>
										<span>
											<?php
												$topicTerms = get_the_terms( $post->ID, 'topics' );
													foreach($topicTerms as $topicTerm) {
														echo $topicTerm -> name . ', ';
													}
											?>
										</span>
									</p>
								</div>
							</div>
						</article>
						<?php endwhile; endif; wp_reset_postdata(); ?>

					</div>
				</section>

			</div>

		</section>
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
