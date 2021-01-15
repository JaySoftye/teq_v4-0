<?php
/**
 * Template Name: Create Your Solution 3.0 Products
 * The template for displaying the Create Your Solution second phase
 * Prelim query for products and services
 * STEM Product, PD, iBlocks
 * @package Teq_v4.0
 */

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main section-container">
		<section class="full-section create-your-solution-container">
			<div class="container" ng-controller="solutionController">

				<?php

					echo file_get_contents(get_template_directory_uri() . '/inc/ui/dropshadow-filter.svg');

					if(isset($_POST['gradeLevelValue'])) {
						$gradeLevel = htmlspecialchars($_POST['gradeLevelValue']);
						$cat = get_term_by( 'slug', $gradeLevel, 'grades');
						$gradeLevelName = $cat -> name;
					}
					if(isset($_POST['stemFocusValue'])) {
						$stemFocus = htmlspecialchars($_POST['stemFocusValue']);
						$cat = get_term_by( 'slug', $stemFocus, 'category');
						$stemFocusName = $cat -> name;
					}
					if(isset($_POST['generalEdValue'])) {
						$generalEd = htmlspecialchars($_POST['generalEdValue']);
						$cat = get_term_by( 'slug', $generalEd, 'topics');
						$generalEdName = $cat -> name;
					}
					if(isset($_POST['schoolName'])) {
						$schoolName = htmlspecialchars($_POST['schoolName']);
					}
					if(isset($_POST['schoolEmail'])) {
						$schoolEmail = htmlspecialchars($_POST['schoolEmail']);
					}

					function console_log( $data ){
  					echo '<script>';
  					echo 'console.log('. json_encode( $data ) .')';
  					echo '</script>';
					}
					$data = $gradeLevel . ' ' . $stemFocus . ' ' . $generalEd;
					console_log( $data );

				?>
				<form id="prelimProducts" class="columns is-multiline is-centered is-vcentered is-desktop" name="prelimProductsForm" action="<?php echo get_home_url(); ?>/create-your-solution/your-solution-results?" method="POST">
					<div class="column is-full-desktop is-full-mobile">

						<div class="padding-bottom">
							<h4 class="strong margin-bottom"><?php echo $gradeLevelName; ?>, <?php echo $stemFocusName; ?>, <?php echo $generalEdName; ?></h4>
							<h1>Customize Your <?php echo $schoolName; ?> Solution</h1>
							<h5>This page will guide you through recommended solutions. As you navigate through the tabs, you’ll be able to look at Products, Instructional Materials, and Instructional Support. Select all the options that interest you, and we’ll build your solution.</h5>
						</div>

						<nav class="ui product-tabs-nav main outer dark">
							<div class="product-tabs tabs">
  							<ul id="nav-tab-button">
    							<li ng-class="{ active: isSet(1) }" ng-click="setTab(1)"><a href><i>1</i> Product Selection</a></li>
    							<li ng-class="{ active: isSet(2) }"ng-click="setTab(2)"><a href><i>2</i> Intructional Material(s)</a></li>
    							<li ng-class="{ active: isSet(3) }" ng-click="setTab(3)"><a href><i>3</i> Instructional Support</a></li>
    							<li class="selected-items-counter">
										<a href><i>0</i> Items Selected</a>
										<ul id="select-items-content" class="tooltip-content"></ul>
									</li>
									<li class="button-container prev-section">
										<button type="button" class="next-section prev" ng-click="prevTab()"><span class="inner">Prev Section</span></button>
									</li>
									<li class="button-container" ng-hide="formSubmitButton">
										<button type="button" class="next-section" ng-click="nextTab()"><span class="inner" ng-bind="nextText"></span></button>
									</li>
									<li class="button-container getresults" ng-show="formSubmitButton">
										<button type="submit" class="next-section"><span class="inner" ng-bind="resultsText"></span></button>
									</li>
  							</ul>
							</div>
						</nav>

						<div id="preliminary-product-list" class="columns prelim-product-container">

							<input type="hidden" name="schoolNameValue" value="<?php echo $schoolName; ?>">
							<input type="hidden" name="schoolEmailValue" value="<?php echo $schoolEmail; ?>">

							<section id="product-selection" class="column is-full products-list teq ui outer dark" ng-show="isSet(1)">
								<div class="modal" data-modal-title="productRefineFilters">
	  							<div class="modal-background"></div>
  								<div class="modal-content ui background outer dark">
    								<div class="columns">
											<div class="column is-full">
												<img src="<?php echo get_template_directory_uri() . '/inc/images/create-prelim-site-header_teq-products-logo.svg'; ?>" />
												<p>You can further refine your results by using the Technology Proficiency and Educational Environment dials. Simply click on the level or environment you would like to view and your product results list will update automatically.</p>
											</div>
										</div>
										<div class="columns">
											<div class="column is-half ui ui-container">
												<div class="filter-container rounded background outer dark">
													<?php echo file_get_contents(get_template_directory_uri() . '/inc/ui/technology_proficiency_dial_2.svg'); ?>
													<p class="has-text-centered strong caption">Technology Proficiency</p>
												</div>
											</div>
											<div class="column is-half ui ui-container">
												<div class="filter-container ui rounded background outer dark">
													<?php echo file_get_contents(get_template_directory_uri() . '/inc/ui/educational_environment_dial_2.svg'); ?>
													<p class="has-text-centered strong caption">Educational Environment</p>
												</div>
											</div>
										</div>
										<button class="close-modal" type="button" aria-label="close">&times;</button>
  								</div>
								</div>

								<img class="section-logo" src="<?php echo get_template_directory_uri() . '/inc/images/create-prelim-site-header_teq-products-logo.svg'; ?>" />

								<div class="preliminary-product-list-container">
									<p class="column">Are you ready to explore the products and solutions that meet your criteria? Review the solutions below, select the products that interest you, or refine your results even further by using the Technology Proficiency and Educational Environment filters. </p>
									<nav class="column is-two-fifths ui product-tabs-nav">
										<div class="product-tabs tabs sub-nav">
			  							<ul>
			    							<li class="form-ui">
													<a id="productRefineFilters" class="modal-open-button is-size-6" href>
														Refine your product results
														<?php echo file_get_contents(get_template_directory_uri() . '/inc/images/create-prelim-form-ui_filter-icons.svg'); ?>
													</a>
												</li>
			  							</ul>
										</div>
									</nav>
									<?php
										/**
									  	* WORDPRESS SEARCH QUERY FOR STEM PRODUCTS
											* Query Custom Post Type 'Product and Service'
											* TAXONOMY Criteria based up on user input
											* USER INPUT STORED IN tax_query ARRAY
											*/

											$stem_product_tax_query = array(
												'relation' => 'AND'
											);

											if(isset($_POST['gradeLevelValue'])) {
												$stem_product_tax_query[] = array(
													'taxonomy' => 'grades',
								        	'field' => 'slug',
													'compare' => '=',
								        	'terms' => $gradeLevel
												);
								    	}
											if(isset($_POST['stemFocusValue'])) {
							        	$stem_product_tax_query[] = array(
							          	'taxonomy' => 'category',
							          	'field' => 'slug',
													'compare' => '=',
							          	'terms' => $stemFocus
							        	);
							    		}
											if(isset($_POST['generalEdValue'])) {
							        	$stem_product_tax_query[] = array(
							          	'taxonomy' => 'topics',
							          	'field' => 'slug',
													'compare' => '=',
							          	'terms' => $generalEd
							        	);
							    		}
							    		$stem_product_args = array(
							        	'post_type' => 'Product-and-Service',
												'category_name' => 'Teq Product',
							        	'posts_per_page' => -1,
												'orderby' => 'title',
												'order' => 'ASC',
							        	'tax_query' => $stem_product_tax_query
							    		);

											$stem_product_query = new WP_Query( $stem_product_args );
												if ($stem_product_query -> have_posts()) : while ($stem_product_query -> have_posts()) :
													$stem_product_query -> the_post();
									?>
									<article class="ui rounded product-item <?php
										foreach(get_the_terms($stem_product_query->post->ID, 'proficiency') as $proficiency) echo $proficiency->slug . " ";

										foreach(get_the_terms($stem_product_query->post->ID, 'environment') as $environment) echo $environment->slug . " ";
									?>">
										<label for="<?php echo $post->post_name; ?>">
  										<input type="checkbox" id="<?php echo $post->post_name; ?>" name="userProductSelections[]" title="<?php the_title(); ?>" value="<?php echo $stem_product_query->post->ID; ?>">
  										<span class="checkmark"></span>
										</label>
										<?php echo get_the_post_thumbnail( $stem_product_query->post->ID, 'full', array( 'class' => 'product' ) ); ?>
										<div class="inner-content">
											<h3 class="product-title"><?php the_title(); ?></h3>
											<div class="product-description"><?php the_excerpt(); ?></div>
										</div>
									</article>
									<?php
										endwhile; else :
									?>
									<div class="column">
										<h3>No products were found.</h3>
										<h5>We're sorry, but it seems we couldn't find any product matching <?php echo $gradeLevelName; ?>, <?php echo $stemFocusName; ?>, <?php echo $generalEdName; ?>. Try <u><a href onclick="history.back(-1)">going back to the previous page</a></u> and submitting another search.</h5>
									</div>
									<?php
										endif; wp_reset_postdata();
									?>
									<nav class="ui product-tabs-nav">
										<div class="product-tabs tabs">
			  							<ul>
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
							</section>

							<section id="instructional-material-selection"  class="column is-full products-list iblocks ui outer dark" ng-show="isSet(2)">
								<div class="modal" data-modal-title="iBlockPathways">
	  							<div class="modal-background"></div>
  								<div class="modal-content ui background outer dark" id="pathway-checkbox-list">
    								<div class="columns">
											<div class="column is-full">
												<img src="<?php echo get_template_directory_uri() . '/inc/images/create-prelim-site-header_iblocks-logo.svg'; ?>" />
												<p>Discover the iBlocks we’ve imagined and see how they align to relevant state standards. An iBlock can be customized for your interests, goals, and needs. Choose any of the topics below to add to your iBlock product list.</p>
											</div>
										</div>
										<?php
											/**
										  	* WORDPRESS SEARCH QUERY FOR ALL IBLOCK PATHWAYS
												* QUERY ALL Custom Post Type 'Pathway'
												*/

								    		$full_pathway_args = array(
								        	'post_type' => 'Pathways',
								        	'posts_per_page' => -1,
													'orderby' => 'title',
    											'order'   => 'ASC'
								    		);

												$full_pathway_query = new WP_Query( $full_pathway_args );
													if ($full_pathway_query -> have_posts()) : while ($full_pathway_query -> have_posts()) :
														$full_pathway_query -> the_post();
														$post_id = get_the_ID();
										?>
										<div class="ui selection-list">
											<div class="ui-checkbox-container">
												<input type="checkbox" class="pathway-checkbox" id="<?php echo $post->post_name . '-checkbox'; ?>" name="<?php echo $post->post_name . '-checkbox'; ?>" value="<?php echo $post_id; ?>" />
												<label for="<?php echo $post->post_name . '-checkbox'; ?>">
													<span class="toggle"></span>
													<em><?php echo $post->post_title; ?></em>
													<button type="button"></button>
												</label>
												<div class="pathway-checkbox-content">
													<?php the_content(); ?>
												</div>
											</div>
										</div>
										<?php
											endwhile; endif;
												wp_reset_postdata();
										?>
										<button class="close-modal" type="button" aria-label="close">&times;</button>
  								</div>
								</div>

								<img class="section-logo" src="<?php echo get_template_directory_uri() . '/inc/images/create-prelim-site-header_iblocks-logo.svg'; ?>" />

								<div class="preliminary-product-list-container">
									<p class="column">An iBlock, or “instructional block,” is a project-based learning solution built to foster critical thinking, spark creativity, and give students the opportunity to practice 21st century skills. Below are the iBlocks we think will be a great fit for you. To explore even more iBlock topics and trends, click the <em>more iblock pathways</em> button below.</p>
									<nav class="column is-two-fifths ui product-tabs-nav">
										<div class="product-tabs tabs sub-nav">
			  							<ul>
			    							<li class="form-ui">
													<a id="iBlockPathways" class="modal-open-button is-size-6" href>
														more iblock pathways
														<?php echo file_get_contents(get_template_directory_uri() . '/inc/images/create-prelim-form-ui_list-icons.svg'); ?>
													</a>
												</li>
			  							</ul>
										</div>
									</nav>
									<?php
										/**
									  	* WORDPRESS SEARCH QUERY FOR IBLOCK PATHWAYS
											* Query Custom Post Type 'Pathway'
											* TAXONOMY Criteria based up on user input
											* USER INPUT STORED IN tax_query ARRAY
											*/

											$pathway_tax_query = array(
												'relation' => 'AND'
											);

											if(isset($_POST['gradeLevelValue'])) {
												$pathway_tax_query[] = array(
													'taxonomy' => 'grades',
								        	'field' => 'slug',
													'compare' => '=',
								        	'terms' => $gradeLevel
												);
								    	}
											if(isset($_POST['stemFocusValue'])) {
							        	$pathway_tax_query[] = array(
							          	'taxonomy' => 'category',
							          	'field' => 'slug',
													'compare' => '=',
							          	'terms' => $stemFocus
							        	);
							    		}
							    		$pathway_args = array(
							        	'post_type' => 'Pathways',
												'orderby'   => 'rand',
							        	'posts_per_page' => 3,
							        	'tax_query' => $pathway_tax_query
							    		);

											$pathway_query = new WP_Query( $pathway_args );
												if ($pathway_query -> have_posts()) : while ($pathway_query -> have_posts()) :
													$pathway_query -> the_post();
													$post_id = get_the_ID();
									?>
									<article class="ui rounded product-item iblock-pathway" id="<?php echo $post_id; ?>">
										<label for="<?php echo $post->post_name; ?>">
  										<input type="checkbox" id="<?php echo $post->post_name; ?>" name="userPathwaySelections[]" title="<?php the_title(); ?> iBlock" value="<?php echo $post_id; ?>">
  										<span class="checkmark"></span>
										</label>
										<input type="hidden" class="checked-items-loaded" value="<?php echo $post->post_name . '-checkbox'; ?>" />
										<?php
											if ( has_post_thumbnail() ) {
												echo get_the_post_thumbnail( $post_id, 'full', array( 'class' => 'product' ) );
											} else {
										?>
										<img src="<?php echo get_template_directory_uri() . '/inc/images/create-prelim-iblock-template_default.png'; ?>" />
										<?php } ?>
										<div class="inner-content">
											<nav class="level">
  											<div class="level-left">
													<h3 class="level-item product-title"><?php the_title(); ?></h3>
  											</div>
  											<div class="level-right">
													<h6 class="level-item iblock-info-button">details</h6>
												</div>
											</nav>
											<div class="iblock-description hidden columns">
												<div class="column is-5">
  												<?php the_content(); ?>
												</div>
												<div class="column is-7">
													<?php
														$iblock_focus_content = get_post_meta(get_the_ID(),'iblock_focus_meta_html',true);
														if ( !empty( $iblock_focus_content) ) {
															echo html_entity_decode($iblock_focus_content);
														}
													?>
												</div>
											</div>
										</div>
									</article>
								<?php endwhile; else :
								/**
									* WORDPRESS SEARCH QUERY FOR IBLOCK PATHWAYS
									* Query Custom Post Type 'Pathway'
									* TAXONOMY Criteria based up on user input
									* USER INPUT STORED IN tax_query ARRAY
									*/
									$pathway_tax_query = array(
										'relation' => 'AND'
									);
									if(isset($_POST['gradeLevelValue'])) {
										$pathway_tax_query[] = array(
											'taxonomy' => 'grades',
											'field' => 'slug',
											'compare' => '=',
											'terms' => $gradeLevel
										);
									}
									$pathway_args = array(
										'post_type' => 'Pathways',
										'orderby'   => 'rand',
										'posts_per_page' => 2,
										'tax_query' => $pathway_tax_query
									);

									$pathway_query = new WP_Query( $pathway_args );
										if ($pathway_query -> have_posts()) : while ($pathway_query -> have_posts()) :
											$pathway_query -> the_post();
											$post_id = get_the_ID();
								?>
								<article class="ui rounded product-item iblock-pathway" id="<?php echo $post_id; ?>">
									<label for="<?php echo $post->post_name; ?>">
										<input type="checkbox" id="<?php echo $post->post_name; ?>" name="userPathwaySelections[]" title="<?php the_title(); ?> iBlock" value="<?php echo $post_id; ?>">
										<span class="checkmark"></span>
									</label>
									<input type="hidden" class="checked-items-loaded" value="<?php echo $post->post_name . '-checkbox'; ?>" />
									<?php
										if ( has_post_thumbnail() ) {
											echo get_the_post_thumbnail( $post_id, 'full', array( 'class' => 'product' ) );
										} else {
									?>
									<img src="<?php echo get_template_directory_uri() . '/inc/images/create-prelim-iblock-template_default.png'; ?>" />
									<?php } ?>
									<div class="inner-content">
										<nav class="level">
											<div class="level-left">
												<h3 class="level-item product-title"><?php the_title(); ?></h3>
											</div>
											<div class="level-right">
												<h6 class="level-item iblock-info-button">details</h6>
											</div>
										</nav>
										<div class="iblock-description hidden columns">
											<div class="column is-5">
												<?php the_content(); ?>
											</div>
											<div class="column is-7">
												<?php
													$iblock_focus_content = get_post_meta(get_the_ID(),'iblock_focus_meta_html',true);
													if ( !empty( $iblock_focus_content) ) {
														echo html_entity_decode($iblock_focus_content);
													}
												?>
											</div>
										</div>
									</div>
								</article>
							<?php endwhile; endif; endif; wp_reset_postdata();?>

									<section id="additionalPathways"></section>

									<nav class="ui product-tabs-nav">
										<div class="product-tabs tabs">
			  							<ul>
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
							</section>

							<section id="instructional-support-selection"  class="column is-full products-list professional-development ui outer dark" ng-show="isSet(3)">
								<div class="modal" data-modal-title="otisPdCategories">
									<div class="modal-background"></div>
  								<div class="modal-content model-dual-containers ui outer dark">
    								<div class="columns is-flex-wrap-wrap">
											<div class="column is-half">
												<img src="<?php echo get_template_directory_uri() . '/inc/images/create-prelim-site-header_otis-logo.svg'; ?>" />
												<p>Explore our PD categories on the technology, tools, and strategies that can spark student success.</p>
												<div class="ui selection-list pd-category-list">
													<label ng-repeat="category in categories" for="{{category.value}}">
														<input type="checkbox" class="pd-category-item otis" name="{{category.value}}" title="{{category.title}}" id="{{category.value}}" value="{{category.title}}">
														<span class="checkmark"></span>
														{{category.title}}
													</label>
												</div>
											</div>
											<div class="column is-half">
												<img src="<?php echo get_template_directory_uri() . '/inc/images/create-prelim-site-header_teqtivities-logo.png'; ?>" />
												<p>Explore our Teq-tivities topics meant to jumpstart meaningful learning and engage students.</p>
												<div class="ui selection-list pd-category-list">
													<label ng-repeat="teqtivity in teqtivities" for="{{teqtivity.value}}">
														<input type="checkbox" class="pd-category-item teqtivity" name="{{teqtivity.value}}" title="{{teqtivity.title}}" id="{{teqtivity.value}}" value="{{teqtivity.title}}">
														<span class="checkmark"></span>
														{{teqtivity.title}}
													</label>
												</div>
											</div>
										</div>
										<button class="close-modal" type="button" aria-label="close">&times;</button>
  								</div>
								</div>

								<img class="section-logo" src="<?php echo get_template_directory_uri() . '/inc/images/create-prelim-site-header_otis-logo.svg'; ?>" />

								<div class="preliminary-product-list-container">
									<p class="column">Learn educational technology skills with PD designed around your needs; with options for on-site, online, or a blended learning model. Teq’s PD Specialists and Curriculum Specialists who facilitate both our Onsite PD, Virtual, and  Online PD sessions are State Certified Educators with skills and expertise in every subject and content area – English, Math, Science, Social Studies, STEM, ENL and Special Education. </p>
									<nav class="column is-two-fifths ui product-tabs-nav">
										<div class="product-tabs tabs sub-nav">
			  							<ul>
			    							<li class="form-ui">
													<a id="otisPdCategories" class="modal-open-button is-size-6" href>
														professional development cateogries
														<?php echo file_get_contents(get_template_directory_uri() . '/inc/images/create-prelim-form-ui_list-icons.svg'); ?>
													</a>
												</li>
			  							</ul>
										</div>
									</nav>
									<?php
										/**
									  	* WORDPRESS SEARCH QUERY FOR PROFESSIONAL DEVELOPMENT OPTIONS
											* Query Custom Post Type 'Product and Service'
											* TAXONOMY 'teq-summary-add-on'
											* SEARCH FOR ONLY POSTS WITH 'teq-summary-add-on' TOPIC ONLY
											* CONDITIONAL STATEMENT: INSIDE LOOP IF THE POST NAME IS 'teq-tivities'
											* ADD HIDDEN INPUT FIELD TO QUERY A TEQ-TIVITY on results page
											*/

											$pd_addon_args = array(
												'post_type' => 'product-and-service',
												'posts_per_page' => -1,
												'orderby' => 'title',
												'order'   => 'ASC',
												'tax_query' => array (
													'relation' => 'AND',
													array(
														'taxonomy' => 'topics',
														'field' => 'slug',
														'terms' => 'teq-summary-add-on',
														'operator' => 'AND',
													),
												),
											);

											$pd_addon_query = new WP_Query( $pd_addon_args );
												if ($pd_addon_query -> have_posts()) : while ($pd_addon_query -> have_posts()) :
													$pd_addon_query -> the_post();
													$post_id = get_the_ID();
									?>
									<article class="ui rounded product-item">
										<label for="<?php echo $post->post_name; ?>">
  										<input type="checkbox" id="<?php echo $post->post_name; ?>" <?php if ($post->post_name == 'teq-tivities') { echo 'name="teq-tivity-selectioned"'; } else { echo 'name="userPdSelections[]"';} ?> title="<?php the_title(); ?>" value="<?php echo $post_id; ?>">
  										<span class="checkmark"></span>
										</label>
										<?php echo get_the_post_thumbnail( $post_id, 'full', array( 'class' => 'product' ) ); ?>
										<div class="inner-content">
											<h3 class="product-title"><?php the_title(); ?></h3>
											<div class="product-description"><?php the_excerpt(); ?></div>
											<div class="tags <?php the_title(); ?>"></div>
										</div>
									</article>
									<?php
										endwhile; endif;
											wp_reset_postdata();
									?>
									<nav class="ui product-tabs-nav">
										<div class="product-tabs tabs">
			  							<ul>
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
							</section>

						</div>

					</div>
				</form>

			</div>
		</section>
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
