<?php
/**
 * Template Name: Create Your Solution 3.0 Results
 * The template for displaying the Create Your Solution final results
 * Product Service Custom Post type query
 * @package Teq_v4.0
 */

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main section-container">
		<section class="full-section create-your-solution-container">
			<div class="container product-list" ng-controller="solutionController">


				<?php echo file_get_contents(get_template_directory_uri() . '/inc/ui/dropshadow-filter.svg'); ?>
				<section id="solutionSet" class="columns prelim-product-container is-multiline is-centered is-desktop">
					<?php
					/**
						* GET FORM INPUT DATA FOR SCHOOL NAME AND EMAIL
						* DISPLAY DATA FROM GET VALUES
						*/
						$schoolName = $_POST['schoolNameValue'];
						$schoolEmail = $_POST['schoolEmailValue'];

					/**
						* GET FORM INPUT DATA FOR SCHOOL NAME AND EMAIL
						* DISPLAY DATA FROM GET VALUES
						*/
						if(isset($_POST['userProductSelections'])) {
					?>
						<div class="column is-full-desktop is-full-mobile">
							<?php
							/**
								* SET FORM DATA FROM PRODUCT SELECTIONS INTO VARIABLES
								* STEM PRODUCTS, IBLOCK PATHWAYS, PD OPTIONS, TEQTIVITY OPTION
								* VARIABLES STORE POST ID EXCEPT FOR TEQTIVITY OPTION
								*/
								$user_product_selections = $_POST['userProductSelections'];
								$user_pathway_selections = $_POST['userPathwaySelections'];
								$user_pd_selections = $_POST['userPdSelections'];
								$user_teqtivity_selected = $_POST['teq-tivity-selectioned'];
								?>
								<div class="padding-bottom">
									<h4 class="strong margin-bottom"> It’s here!</h4>
									<h1>This is Your Complete Solution.</h1>
									<h5><strong>Congratulations <?php echo $schoolName; ?>,</strong> is the plan you’ve been waiting for. We took your input and then used our expertise to put together the following solution. It’s complete, it’s unique to you, and it gives you a holistic pathway to successfully infuse STEM learning into your class, school, or district.</h5>
								</div>
								<nav class="ui product-tabs-nav main outer dark">
									<div class="product-tabs results tabs">
										<div class="select-menu-container">
											<select id="product-summary-options" name="productSummaryOptions">
												<option disabled selected>Products in this summary</option>
											</select>
										</div>
										<ul id="nav-tab-button">
											<li class="form-ui">
												<a href id="solutionQuoteRequest" class="modal-open-button">
													Get a quote
													<?php echo file_get_contents(get_template_directory_uri() . '/inc/images/create-prelim-form-ui_quote-icons.svg'); ?>
												</a>
											</li>
											<li class="form-ui print-solution">
												<a href onclick="window.print()">
													Print your solution
													<?php echo file_get_contents(get_template_directory_uri() . '/inc/images/create-prelim-form-ui_print-icons.svg'); ?>
												</a>
											</li>
										</ul>
									</div>
								</nav>

								<div class="column is-full-desktop is-full-mobile solutions-container">

									<?php
									/**
									* WORDPRESS SEARCH QUERY FOR STEM PRODUCTS, Query Post Type 'product-and-service'
									* STORED IN userProductSelections Array IN Variable
									* CHECK IF ARRAY IS EMPTY, IF NOT QUERY RESULTS
									*/

									if(!empty($user_product_selections)) :

										$args = array(
											'post_type' => 'product-and-service',
											'post__in' => $_POST['userProductSelections'],
											'orderby' => 'title',
											'order'   => 'ASC'
										);

										$the_query = new WP_Query( $args );
											if ($the_query -> have_posts()) : while ($the_query -> have_posts()) : $the_query -> the_post();
									?>
									<article title="<?php the_title(); ?>" class="ui rounded product-solution" id="<?php echo $the_query->post->ID; ?>">
										<?php if (has_post_thumbnail( $post->ID ) ): ?>
											<div class="product-image">
												<?php echo get_the_post_thumbnail( $post_id, 'full', array( 'class' => 'product' ) ); ?>
											</div>
										<?php endif; ?>
										<div class="product-content">
											<div class="columns">
												<div>
													<h2><?php the_title(); ?></h2>
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
																		echo $gradeTerm -> name . ' | ';
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
																	echo $proficiencyTerm -> name . ' | ';
																}
															?>
														</span>
													</p>
													<div class="bar-counter"><i data="<?php echo $proficiencyTermsCount; ?>"></i></div>
													<p class="product-stats">
														<strong>Educational Environment:</strong>
														<span>
															<?php
																$environmentTerms = get_the_terms( $post->ID, 'environment' );
																$environmentTermsCount = count($proficiencyTerms);
																foreach($environmentTerms as $environmentTerm) {
																	echo $environmentTerm -> name . ' | ';
																}
															?>
														</span>
													</p>
													<div class="bar-counter"><i data="<?php echo $environmentTermsCount; ?>"></i></div>
												</div>
											</div>
										</div>
									</article>
								<?php endwhile; endif; endif; wp_reset_postdata(); ?>

								<?php
								/**
									* WORDPRESS SEARCH QUERY FOR iBlock PRODUCTS, Query Post Type 'pathways'
									* STORED IN userPathwaySelections Array IN Variable
									* CHECK IF ARRAY IS EMPTY, IF NOT QUERY RESULTS
									*/

									if(!empty($user_pathway_selections)) :

										$args = array(
											'post_type' => 'pathways',
											'post__in' => $_POST['userPathwaySelections'],
											'orderby' => 'title',
											'order'   => 'ASC'
										);

										$the_query = new WP_Query( $args );
											if ($the_query -> have_posts()) : while ($the_query -> have_posts()) : $the_query -> the_post();
									?>
									<article title="<?php the_title(); ?>" class="ui rounded product-solution iblock-solution" id="<?php echo $the_query->post->ID; ?>">
										<div class="columns is-vcentered product-content">
											<div class="column is-one-third">
												<img src="<?php echo get_template_directory_uri() . '/inc/ui/iblock-content-header_iblocks-logo.svg'; ?>" />
											</div>
											<nav class="column navbar">
												<section class="navbar-menu">
													<div class="navbar-start">
														<h3 class="product-title">Project-Based Learning</h3>
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
																	echo $gradeTerm -> name . ' | ';
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
																	echo $proficiencyTerm -> name . ' | ';
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
								<?php endwhile; endif; endif; wp_reset_postdata(); ?>

								<?php
								/**
									* WORDPRESS SEARCH QUERY FOR PROFESSIONAL DEVELOPMENT, Query Post Type 'product-and-service'
									* STORED IN userPdSelections Array IN Variable
									* STORE PD CATEGORIES TERM SELECTIONS IN Array userPdCategoriesSelections
									* CHECK IF ARRAY IS EMPTY, IF NOT QUERY RESULTS
									*/

									$user_pd_categories = $_POST['userPdCategoriesSelections'];

									if(!empty($user_pd_selections)) :

										$args = array(
											'post_type' => 'product-and-service',
											'post__in' => $_POST['userPdSelections'],
											'orderby' => 'title',
											'order'   => 'ASC'
										);

										$the_query = new WP_Query( $args );
											if ($the_query -> have_posts()) : while ($the_query -> have_posts()) : $the_query -> the_post();
									?>
									<article title="<?php the_title(); ?>" class="ui rounded product-solution pd-solution" id="<?php echo $the_query->post->ID; ?>">
										<?php if (has_post_thumbnail( $post->ID ) ): ?>
											<div class="product-image">
												<?php echo get_the_post_thumbnail( $post_id, 'full', array( 'class' => 'product' ) ); ?>
											</div>
										<?php endif; ?>
										<div class="product-content">
											<div class="columns">
												<div>
													<h5 class="strong"><?php the_title(); ?></h5>
													<?php if ($post->post_name == 'otis-for-educators') { ?>
														<p><strong>Online Professional Development</strong></p>
														<p>We created OTIS so you have access to the professional learning you need every step of the way. With a subscription to OTIS, you’ll benefit from learning content that focuses on the topics you’ve selected.</p>
														<div class="tags OTIS for educators">
															<?php foreach ($user_pd_categories as $user_pd_category) {
																echo "<span class='tag is-rounded'>";
																echo $user_pd_category;
																echo "</span>";
															} ?>
														</div>
													<?php } elseif ($post->post_name == 'onsite-professional-development') { ?>
														<p>Our PD Specialists will visit your school and provide hands-on training. You’ll learn all about your new edtech products — how they work, and how they can impact student success. Purchase PD days and work with us in a mentoring/coaching capacity, or receive a bundle of days with your technology purchase.</p>
													<?php } ?>
												</div>
											</div>
										</div>
									</article>
								<?php endwhile; endif; endif; wp_reset_postdata(); ?>

								<?php
								/**
									* WORDPRESS SEARCH QUERY FOR TEQ-TIVITY, Query Post Type 'product-and-service'
									* QUERY RESULT BASED ON USER CRITIERIA FOR TAXONOMIES: 'grade level' and 'stem focus'
									* STORED IN teq-tivity-selectioned Array IN Variable
									* STORE TEQTIVITY CATEGORIES TERM SELECTIONS IN Array userTeqtivityCategoriesSelections
									* CHECK IF TEQ-TIVITY SELECTED VALUE IS TRUE
									*/

									$user_teqtivity_categories = $_POST['userTeqtivityCategoriesSelections'];

									if(!empty($user_teqtivity_selected)) :

										$teq_tivity_tax_query = array(
											'relation' => 'AND'
										);

										if(isset($_POST['stemFocusValue'])) {
											$teq_tivity_tax_query[] = array(
												'taxonomy' => 'category',
												'field' => 'slug',
												'compare' => '=',
												'terms' => $stemFocus
											);
										}
										if(isset($_POST['generalEdValue'])) {
											$teq_tivity_tax_query[] = array(
												'taxonomy' => 'grades',
												'field' => 'slug',
												'compare' => '=',
												'terms' => $gradeLevel
											);
										}
										$teq_tivity_args = array(
											'post_type' => 'Product-and-Service',
											'category_name' => 'Teq-tivities',
											'posts_per_page' => 1,
											'tax_query' => $teq_tivity_tax_query
										);

										$teq_tivity_query = new WP_Query( $teq_tivity_args );
											if ($teq_tivity_query -> have_posts()) : while ($teq_tivity_query -> have_posts()) :
												$teq_tivity_query -> the_post();
										?>
										<article title="<?php the_title(); ?>" class="ui rounded product-solution pd-solution" id="<?php echo $teq_tivity_query->post->ID; ?>">
											<?php if (has_post_thumbnail( $post->ID ) ): ?>
												<div class="product-image">
													<?php echo get_the_post_thumbnail( $post_id, 'full', array( 'class' => 'product' ) ); ?>
												</div>
											<?php endif; ?>
											<div class="product-content">
												<div class="columns">
													<div>
														<h5><strong><?php the_title(); ?> Teq-tivity</strong></h5>
														<?php the_content(); ?>
														<div class="tags OTIS for educators">
															<?php foreach ($user_teqtivity_categories as $user_teqtivity_category) {
																echo "<span class='tag is-rounded'>";
																echo $user_teqtivity_category;
																echo "</span>";
															} ?>
														</div>
													</div>
												</div>
											</div>
										</article>
									<?php endwhile; endif; endif; wp_reset_postdata(); ?>
								</div>
							</div>

						<?php
						/**
							* GET FORM INPUT DATA FOR SCHOOL NAME AND EMAIL
							* DISPLAY DATA FROM GET VALUES
							*/
							} else {
						?>

							<div class="column is-full-desktop is-full-mobile">
								<div class="padding-bottom">
									<h4 class="strong margin-bottom"> Uh oh!</h4>
									<h1>No products were selected.</h1>
									<h5>We're sorry <strong><?php echo $schoolName; ?>,</strong> it appears no product(s) were selected to create your solution. Try <u><a href onclick="history.back(-1)">going back to the previous page</a></u> and submitting your choices again.</h5>
								</div>
								<nav class="ui product-tabs-nav main outer dark">
									<div class="product-tabs results tabs">
										<div class="select-menu-container">
											<select id="product-summary-options" name="productSummaryOptions">
												<option disabled selected>No results found</option>
											</select>
										</div>
										<ul id="nav-tab-button">
											<li class="form-ui">
												<a href onclick="history.back(-1)">
													Back
													<?php echo file_get_contents(get_template_directory_uri() . '/inc/images/create-prelim-form-ui_back-icons.svg'); ?>
												</a>
											</li>
										</ul>
									</div>
								</nav>
							</div>

						<?php } ?>

					<div class="modal" data-modal-title="solutionQuoteRequest">
						<div class="modal-background"></div>
						<form class="modal-content ui outer dark quote-form" id="quoteRequestForm" method="post" action="<?php echo get_home_url(); ?>/create-your-solution/your-solution-quote-request/">

							<div class="columns">
								<div class="column is-full">
									<h4 class="strong">Let's get your solution inside the classroom!</h4>
									<p>For pricing on any of the products in your solution set, simply fill out the form below and a Teq Sales Req will reach out to you directly.</p>
									<div class="field">
										<div class="control is-expanded">
											<label class="caption">Name</label>
											<input class="input quote-field" type="text" name="schoolNameQuote" value="<?php echo $schoolName ?>" required>
										</div>
									</div>
									<div class="field">
										<div class="control is-expanded">
											<label class="caption">School and/or State</label>
											<input class="input quote-field" type="text" name="schoolDetailsQuote" value="" required>
										</div>
									</div>
									<div class="field is-grouped">
										<div class="control is-expanded">
											<label class="caption">Email</label>
											<input class="input quote-field" type="email" name="schoolEmailQuote" value="<?php echo $schoolEmail ?>" required>
										</div>
										<div class="control is-expanded">
											<label class="caption">Phone</label>
											<input class="input quote-field" type="tel" name="schoolTelQuote" value="" required>
										</div>
									</div>
									<div id="product-solution-quote-options" class="field ui selection-list">
										<p><label class="strong">I would like to see pricing on:</label></p>
									</div>
									<div class="field is-grouped">
										<div class="control">
											<input id="submit" class="button is-link" type="submit" value="Get Quote" name="submit" />
										</div>
										<div class="control">
											<button class="button is-light quote-modal-close close-modal">Cancel</button>
										</div>
									</div>
								</div>
							</div>

						</form>
					</div>


				</section>


			</div>
		</section>
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
