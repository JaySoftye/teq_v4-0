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

					function console_log( $data ){
  					echo '<script>';
  					echo 'console.log('. json_encode( $data ) .')';
  					echo '</script>';
					}
					$data = $gradeLevel . ' ' . $stemFocus . ' ' . $generalEd;
					console_log( $data );

				?>
				<section id="prelimProducts" class="columns is-multiline is-centered is-vcentered is-desktop">
					<div class="column is-full-desktop is-full-mobile">

						<div class="padding-bottom">
							<h4 class="strong margin-bottom"><?php echo $gradeLevelName; ?>, <?php echo $stemFocusName; ?>, <?php echo $generalEdName; ?></h4>
							<h1>Preliminary Product Summary</h1>
							<h5>This page will guide you through recommended solutions. As you navigate through the tabs, you’ll be able to look at Products, Instructional Materials, and Instructional Support. Select all the options that interest you, and we’ll build your solution.</h5>
						</div>

						<nav class="ui product-tabs-nav main outer dark">
							<div class="product-tabs tabs">
  							<ul id="nav-tab-button">
    							<li ng-class="{ active: isSet(1) }" href ng-click="setTab(1)"><a><i>1</i> Product Selection</a></li>
    							<li ng-class="{ active: isSet(2) }" href ng-click="setTab(2)"><a href><i>2</i> Intructional Material(s)</a></li>
    							<li ng-class="{ active: isSet(3) }" href ng-click="setTab(3)"><a href><i>3</i> Instructional Support</a></li>
    							<li class="selected-items-counter">
										<a href><i>0</i> Items Selected</a>
										<ul id="select-items-content" class="tooltip-content"></ul>
									</li>
									<li class="button-container">
										<button type="button" class="next-section"><span class="inner">NEXT Section</span></button>
									</li>
  							</ul>
							</div>
						</nav>

						<form id="preliminary-product-list" class="columns prelim-product-container" name="prelimProductsForm" action="<?php echo get_home_url(); ?>/create-your-solution/your-solution-results?" method="POST">

							<input type="hidden" name="schoolNameValue" value="{{schoolName}}">
							<input type="hidden" name="schoolEmailValue" value="{{schoolEmail}}">
							<input type="hidden" name="gradeLevelValue" ng-value="gradeLevelValue">
					    <input type="hidden" name="stemFocusValue" ng-value="stemFocusValue">
					    <input type="hidden" name="generalEdValue" ng-value="generalEdValue">

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
									<p class="column">Are you ready to explore the products and solutions that meet your criteria? Review the solutions below, select the products that interest you, or refine your results even further by using the Technology Proficiency and Educational Environment filters.  </p>
									<nav class="ui product-tabs-nav">
										<div class="product-tabs tabs">
			  							<ul>
			    							<li class="form-ui">
													<a id="productRefineFilters" class="modal-open-button" href>
														Refine your product results
														<?php echo file_get_contents(get_template_directory_uri() . '/inc/images/create-prelim-form-ui_filters-icons.svg'); ?>
													</a>
												</li>
												<li class="form-ui">
													<a href>
														Back
														<?php echo file_get_contents(get_template_directory_uri() . '/inc/images/create-prelim-form-ui_back-icons.svg'); ?>
													</a>
												</li>
			  							</ul>
										</div>
									</nav>
									<div class="product-list">
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
  										<input type="checkbox" id="<?php echo $post->post_name; ?>" name="<?php echo $post->post_title; ?>" value="<?php echo $post->post_name; ?>">
  										<span class="checkmark"></span>
										</label>
										<?php echo get_the_post_thumbnail( $post_id, 'full', array( 'class' => 'product' ) ); ?>
										<div class="inner-content">
											<h3 class="product-title"><?php the_title(); ?></h3>
											<div class="product-description"><?php the_excerpt(); ?></div>
										</div>
									</article>
									<?php
										endwhile; endif;
											wp_reset_postdata();
									?>
									<h3 class="empty-text">no products here</h3>
									</div>
								</div>
							</section>

							<section id="instructional-material-selection"  class="column is-full products-list iblocks ui outer dark" ng-show="isSet(2)">
								<div class="modal" data-modal-title="iBlockPathways">
	  							<div class="modal-background"></div>
  								<div class="modal-content ui background outer dark">
    								<div class="columns">
											<div class="column is-full">
												<img src="<?php echo get_template_directory_uri() . '/inc/images/create-prelim-site-header_iblocks-logo.svg'; ?>" />
												<p>Discover the iBlocks we’ve imagined and see how they align to relevant state standards. An iBlock can be customized for your interests, goals, and needs. Choose any of the topics below to add to your iBlock product list.</p>
											</div>
										</div>
										<div class="ui selection-list">
											<p class="ui-checkbox-container" ng-repeat="pathway in pathways">
												<input type="checkbox" name="{{pathway.value}}" id="{{pathway.value}}" ng-value="{{pathway.value}}" value="{{pathway.value}}">
												<label for="{{pathway.value}}"><span class="toggle"></span> <em>{{pathway.title}}</em></label>
											</p>
										</div>
										<button class="close-modal" type="button" aria-label="close">&times;</button>
  								</div>
								</div>

								<img class="section-logo" src="<?php echo get_template_directory_uri() . '/inc/images/create-prelim-site-header_iblocks-logo.svg'; ?>" />

								<div class="preliminary-product-list-container">
									<p class="column">An iBlock, or “instructional block,” is a project-based learning solution built to foster critical thinking, spark creativity, and give students the opportunity to practice 21st century skills. Below are the iBlocks we think will be a great fit for you. To explore even more iBlock topics and trends, click the <em>more iblock pathways</em> button below.</p>
									<nav class="ui product-tabs-nav">
										<div class="product-tabs tabs">
			  							<ul>
			    							<li class="form-ui">
													<a id="iBlockPathways" class="modal-open-button" href>
														more iblock pathways
														<?php echo file_get_contents(get_template_directory_uri() . '/inc/images/create-prelim-form-ui_list-icons.svg'); ?>
													</a>
												</li>
												<li class="form-ui">
													<a href>
														Back
														<?php echo file_get_contents(get_template_directory_uri() . '/inc/images/create-prelim-form-ui_back-icons.svg'); ?>
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

											$pathway_tax_query = array();

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
							        	'posts_per_page' => 3,
							        	'tax_query' => $pathway_tax_query
							    		);

											$pathway_query = new WP_Query( $pathway_args );
												if ($pathway_query -> have_posts()) : while ($pathway_query -> have_posts()) :
													$pathway_query -> the_post();
									?>
									<article class="ui rounded product-item iblock-pathway">
										<label for="<?php echo $post->post_name; ?>">
  										<input type="checkbox" id="<?php echo $post->post_name; ?>" name="<?php echo $post->post_title; ?>" value="<?php echo $post->post_name; ?>">
  										<span class="checkmark"></span>
										</label>
										<?php
											if ( has_post_thumbnail() ) {
												echo get_the_post_thumbnail( $post_id, 'full', array( 'class' => 'product' ) );
											} else {
										?>
											<img src="<?php echo get_template_directory_uri() . '/inc/images/create-prelim-iblock-template_default.png'; ?>" />
										<?php } ?>
										<div class="inner-content">
											<h3 class="product-title accordion_button"><?php the_title(); ?></h3>
											<div class="iblock-description columns">
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
									<?php
										endwhile; endif;
											wp_reset_postdata();
									?>
								</div>
							</section>

							<section id="instructional-material-selection"  class="column is-full products-list professional-development ui outer dark" ng-show="isSet(3)">
								<div class="modal" data-modal-title="otisPdCategories">
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
										</div>
										<button class="close-modal" type="button" aria-label="close">&times;</button>
  								</div>
								</div>

								<img class="section-logo" src="<?php echo get_template_directory_uri() . '/inc/images/create-prelim-site-header_otis-logo.svg'; ?>" />

								<div class="preliminary-product-list-container">
									<p class="column">Learn educational technology skills with PD designed around your needs; with options for on-site, online, or a blended learning model. Teq’s PD Specialists and Curriculum Specialists who facilitate both our Onsite PD, Virtual, and  Online PD sessions are State Certified Educators with skills and expertise in every subject and content area – English, Math, Science, Social Studies, STEM, ENL and Special Education. </p>
									<nav class="ui product-tabs-nav">
										<div class="product-tabs tabs">
			  							<ul>
			    							<li class="form-ui">
													<a id="otisPdCategories" class="modal-open-button" href>
														professional development cateogries
														<?php echo file_get_contents(get_template_directory_uri() . '/inc/images/create-prelim-form-ui_list-icons.svg'); ?>
													</a>
												</li>
												<li class="form-ui">
													<a href>
														Back
														<?php echo file_get_contents(get_template_directory_uri() . '/inc/images/create-prelim-form-ui_back-icons.svg'); ?>
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
									?>
									<article class="ui rounded product-item">
										<label for="<?php echo $post->post_name; ?>">
  										<input type="checkbox" id="<?php echo $post->post_name; ?>" name="<?php echo $post->post_title; ?>" value="<?php echo $post->post_name; ?>">
  										<span class="checkmark"></span>
										</label>
										<?php echo get_the_post_thumbnail( $post_id, 'full', array( 'class' => 'product' ) ); ?>
										<div class="inner-content">
											<h3 class="product-title"><?php the_title(); ?></h3>
											<div class="product-description"><?php the_excerpt(); ?></div>
										</div>
									</article>
									<?php
										endwhile; endif;
											wp_reset_postdata();
									?>
								</div>
							</section>

						</form>

					</div>
				</section>

			</div>
		</section>
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
