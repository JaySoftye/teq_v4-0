<?php
/**
 * Template Name: Create Your Solution 4.0 Products
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
			<?php
				/**
					* WORDPRESS SEARCH QUERY
					* 3 RANDOM POSTS with loop to grab featured image
					*/
				$args = array(
					'post_type' => 'product-and-service',
					'category_name' => 'coding, engineering, robotics, hydroponics, general-education',
					'posts_per_page' => 2,
					'orderby' => 'rand'
				);

				$the_query = new WP_Query( $args );
					if ($the_query -> have_posts()) :
						while ($the_query -> have_posts()) : $the_query -> the_post();
							echo get_the_post_thumbnail( $post_id, 'full', array( 'class' => 'featured-image-product' ) );
						endwhile;
					endif;
				wp_reset_postdata();
			?>

			<div class="container" ng-controller="solutionController">

				<?php

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
				<form id="prelimProducts" name="prelimProductsForm" action="<?php echo get_home_url(); ?>/create-your-solution/your-solution-results?" method="POST">
					<?php echo file_get_contents(get_template_directory_uri() . '/inc/ui/dropshadow-filter.svg'); ?>

					<div class="column is-three-quarters margin-auto padding-bottom has-text-centered">
						<h4 class="strong"><?php echo $gradeLevelName; ?>, <?php echo $stemFocusName; ?>, <?php echo $generalEdName; ?></h4>
						<h1>Customize Your <?php echo $schoolName; ?> Solution</h1>
						<h5 ng-bind="headerDescription"></h5>
						<div class="selected-items-counter">
							<a href><input ng-value="solutionProducts" disabled="disabled" ng-model="solutionProducts"> Items Selected</a>
							<ul id="select-items-content"></ul>
						</div>
					</div>

					<div id="preliminary-product-list" class="prelim-product-container">

						<section id="product-selection" class="products-list teq" ng-show="isSet(1)">
							<div class="preliminary-product-list-container">
								<div class="column is-one-quarter sticky-item">
									<img class="section-logo" src="<?php echo get_template_directory_uri() . '/inc/images/create-prelim-site-header_teq-products-logo.svg'; ?>" />
									<p>Are you ready to explore the products and solutions that meet your criteria? Review the solutions below, select the products that interest you, or refine your results even further by using the Technology Proficiency and Educational Environment filters. </p>
									<button id="productRefineFilters" type="button" class="dropdown-trigger-button ui white outer dark" >Product Filters</button>
									<div class="dropdown-menu-container" role="menu">
    								<div class="dropdown-content">
											<ul>
												<li class="dropdown-content-title">Technology Proficiency</li>
      									<li class="dropdown-content-option refine-filter tech-proficiency-filter" title="easy-proficiency">Beginner</li>
												<li class="dropdown-content-option refine-filter tech-proficiency-filter" title="intermediate-proficiency">Intermediate</li>
												<li class="dropdown-content-option refine-filter tech-proficiency-filter" title="advanced-proficiency">Advanced</li>
											</ul>
											<ul>
												<li class="dropdown-content-title">Classroom Environment</li>
      									<li class="dropdown-content-option refine-filter class-environment-filter" title="classroom">Classroom</li>
												<li class="dropdown-content-option refine-filter class-environment-filter" title="hybrid">Hybrid</li>
												<li class="dropdown-content-option refine-filter class-environment-filter" title="home">Home</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="column is-half">
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
									<article class="ui rounded product-item static-select <?php
										foreach(get_the_terms($stem_product_query->post->ID, 'proficiency') as $proficiency) echo $proficiency->slug . " ";

										foreach(get_the_terms($stem_product_query->post->ID, 'environment') as $environment) echo $environment->slug . " ";
									?>">
										<div class="product-checked-cover"></div>
  									<input type="checkbox" class="product-item-checkbox" id="<?php echo $post->post_name; ?>" name="userProductSelections[]" title="<?php the_title(); ?>" value="<?php echo $stem_product_query->post->ID; ?>">
										<?php echo get_the_post_thumbnail( $stem_product_query->post->ID, 'full', array( 'class' => 'product' ) ); ?>
										<div class="circle-highlight"></div>
										<button type="button" class="arrowBack-button close-expanded-selected"></button>
										<div class="inner-content">
											<h3 class="product-title"><?php the_title(); ?></h3>
											<svg version="1.1" viewBox="0 0 100 100">
											<path fill="#FFFFFF" d="M63.39,38.443L43.869,57.963l-7.986-7.986c-1.693-1.693-4.438-1.693-6.131,0c-1.693,1.693-1.693,4.438,0,6.131 l11.053,11.053c0.844,0.846,1.954,1.271,3.064,1.271s2.22-0.424,3.067-1.271l22.585-22.587c1.693-1.693,1.693-4.438,0-6.131 C67.826,36.75,65.082,36.75,63.39,38.443z"/>
											<path fill="#FFFFFF" d="M50.032,3.061C23.98,3.061,2.86,24.18,2.86,50.232S23.98,97.404,50.032,97.404
											c26.052,0,47.171-21.119,47.171-47.171S76.084,3.061,50.032,3.061z M50.032,87.659c-20.67,0-37.427-16.756-37.427-37.427 s16.756-37.427,37.427-37.427c20.67,0,37.427,16.756,37.427,37.427S70.702,87.659,50.032,87.659z"/>
											</svg>
										</div>
										<div class="product-content">
											<?php the_excerpt(); ?>
											<label for="<?php echo $post->post_name; ?>" class="add-or-remove-button ui white outer dark">Add to your solution</label>
											<button type="button" class="back-button close-expanded-selected">back</button>
										</div>
									</article>
								<?php
									endwhile; else :
								?>
								<h3>No products were found.</h3>
								<h5>We're sorry, but it seems we couldn't find any product matching <?php echo $gradeLevelName; ?>, <?php echo $stemFocusName; ?>, <?php echo $generalEdName; ?>. Try <u><a href onclick="history.back(-1)">going back to the previous page</a></u> and submitting another search.</h5>
								<?php endif; wp_reset_postdata(); ?>
								</div>
								<div class="column is-one-quarter sticky-item input-control">
									<button type="button" class="next-button margin-auto ui white outer dark top-content-scroll" ng-disabled="solutionProducts == 'No' || solutionProducts == '0'" ng-class="{ active: isSet(2) }" ng-click="setTab(2)">NEXT STEP</button>
									<a class="back-button top-content-scroll" onclick="history.back(-1)">PREV STEP</a>
									<div class="margin-top margin-left margin-right">
										<p class="has-text-centered is-size-6 has-text-grey-darker padding-top"><strong>Have a question?</strong><br /><a href id="solutionQuoteRequest" class="modal-open-button"><u>Click here</u></a> to have a Teq Representative reach out to you.</p>
									</div>

								</div>
							</section>

							<section id="instructional-material-selection"  class="products-list iblocks" ng-show="isSet(2)">
								<div class="preliminary-product-list-container">
									<div class="column is-one-quarter sticky-item">
										<img class="section-logo" src="<?php echo get_template_directory_uri() . '/inc/images/create-prelim-site-header_iblocks-logo.svg'; ?>" />
										<p>An iBlock, or “instructional block,” is a project-based learning solution built to foster critical thinking, spark creativity, and give students the opportunity to practice 21st century skills. All iBlocks are organized into a  “10-step” capstone project that is built around your desired outcome. They can be customized to meet any of your interests, goals, and needs. Choose any of the topics we think will be a great fit for you.</p>
										<p class="strong">To explore even more iBlock topics and trends, click the <u>Add more iBlock Pathways Options button.</u></p>
									</div>
									<div class="column is-half">
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
										<article class="ui rounded product-item iblock-pathway static-select" id="<?php echo $post_id; ?>">
											<div class="product-checked-cover"></div>
	  									<input type="checkbox" class="product-item-checkbox checked-items-loaded" id="<?php echo $post->post_name; ?>" name="userPathwaySelections[]" title="<?php the_title(); ?>" value="<?php echo $post_id; ?>">
											<?php
												if ( has_post_thumbnail() ) {
													echo get_the_post_thumbnail( $post_id, 'full', array( 'class' => 'product' ) );
												} else {
											?>
											<img src="<?php echo get_template_directory_uri() . '/inc/images/create-prelim-iblock-template_default.png'; ?>" />
											<?php } ?>
											<div class="circle-highlight"></div>
											<button type="button" class="arrowBack-button close-expanded-selected"></button>
											<div class="inner-content">
												<h3 class="product-title"><?php the_title(); ?></h3>
												<svg version="1.1" viewBox="0 0 100 100">
												<path fill="#FFFFFF" d="M63.39,38.443L43.869,57.963l-7.986-7.986c-1.693-1.693-4.438-1.693-6.131,0c-1.693,1.693-1.693,4.438,0,6.131 l11.053,11.053c0.844,0.846,1.954,1.271,3.064,1.271s2.22-0.424,3.067-1.271l22.585-22.587c1.693-1.693,1.693-4.438,0-6.131 C67.826,36.75,65.082,36.75,63.39,38.443z"/>
												<path fill="#FFFFFF" d="M50.032,3.061C23.98,3.061,2.86,24.18,2.86,50.232S23.98,97.404,50.032,97.404
												c26.052,0,47.171-21.119,47.171-47.171S76.084,3.061,50.032,3.061z M50.032,87.659c-20.67,0-37.427-16.756-37.427-37.427 s16.756-37.427,37.427-37.427c20.67,0,37.427,16.756,37.427,37.427S70.702,87.659,50.032,87.659z"/>
												</svg>
											</div>
											<button type="button" class="product-item-options"></button>
											<div class="dropdown-menu-container" role="menu">
												<button type="button" class="close-item-options"></button>
												<div class="dropdown-content">
													<button type="button" class="dropdown-button tab-active" data-target="#<?php echo $post->post_name . '-description'; ?>">Description</button>
													<button type="button" class="dropdown-button" data-target="#<?php echo $post->post_name . '-focus'; ?>">iBlock Focus</button>
												</div>
											</div>
											<div class="product-content iblock-content">
												<div id="<?php echo $post->post_name . '-description'; ?>" class="iblock-content-tab has-tab-visible">
													<?php the_content(); ?>
												</div>
												<div id="<?php echo $post->post_name . '-focus'; ?>" class="iblock-content-tab">
													<?php
														$iblock_focus_content = get_post_meta(get_the_ID(),'iblock_focus_meta_html',true);
														if ( !empty( $iblock_focus_content) ) {
															echo html_entity_decode($iblock_focus_content);
														}
													?>
												</div>
												<label for="<?php echo $post->post_name; ?>" class="add-or-remove-button ui white outer dark">Add to your solution</label>
												<button type="button" class="back-button close-expanded-selected">back</button>
											</div>
										</article>
									<?php
										endwhile; else :
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
											if ($pathway_query -> have_posts()) : while ($pathway_query -> 	have_posts()) :
												$pathway_query -> the_post();
												$post_id = get_the_ID();
									?>
									<article class="ui rounded product-item iblock-pathway static-select" id="<?php echo $post_id; ?>">
										<div class="product-checked-cover"></div>
										<input type="checkbox" class="product-item-checkbox checked-items-loaded" id="<?php echo $post->post_name; ?>" name="userPathwaySelections[]" title="<?php the_title(); ?>" value="<?php echo $post_id; ?>">
										<?php
											if ( has_post_thumbnail() ) {
												echo get_the_post_thumbnail( $post_id, 'full', array( 'class' => 'product' ) );
											} else {
										?>
										<img src="<?php echo get_template_directory_uri() . '/inc/images/create-prelim-iblock-template_default.png'; ?>" />
										<?php } ?>
										<div class="circle-highlight"></div>
										<button type="button" class="arrowBack-button close-expanded-selected"></button>
										<div class="inner-content">
											<h3 class="product-title"><?php the_title(); ?></h3>
											<svg version="1.1" viewBox="0 0 100 100">
											<path fill="#FFFFFF" d="M63.39,38.443L43.869,57.963l-7.986-7.986c-1.693-1.693-4.438-1.693-6.131,0c-1.693,1.693-1.693,4.438,0,6.131 l11.053,11.053c0.844,0.846,1.954,1.271,3.064,1.271s2.22-0.424,3.067-1.271l22.585-22.587c1.693-1.693,1.693-4.438,0-6.131 C67.826,36.75,65.082,36.75,63.39,38.443z"/>
											<path fill="#FFFFFF" d="M50.032,3.061C23.98,3.061,2.86,24.18,2.86,50.232S23.98,97.404,50.032,97.404
											c26.052,0,47.171-21.119,47.171-47.171S76.084,3.061,50.032,3.061z M50.032,87.659c-20.67,0-37.427-16.756-37.427-37.427 s16.756-37.427,37.427-37.427c20.67,0,37.427,16.756,37.427,37.427S70.702,87.659,50.032,87.659z"/>
											</svg>
										</div>
										<button type="button" class="product-item-options"></button>
										<div class="dropdown-menu-container" role="menu">
											<button type="button" class="close-item-options"></button>
											<div class="dropdown-content">
												<button type="button" class="dropdown-button tab-active" data-target="#<?php echo $post->post_name . '-description'; ?>">Description</button>
												<button type="button" class="dropdown-button" data-target="#<?php echo $post->post_name . '-focus'; ?>">iBlock Focus</button>
											</div>
										</div>
										<div class="product-content iblock-content">
											<div id="<?php echo $post->post_name . '-description'; ?>" class="iblock-content-tab has-tab-visible">
												<?php the_content(); ?>
											</div>
											<div id="<?php echo $post->post_name . '-focus'; ?>" class="iblock-content-tab">
												<?php
													$iblock_focus_content = get_post_meta(get_the_ID(),'iblock_focus_meta_html',true);
													if ( !empty( $iblock_focus_content) ) {
														echo html_entity_decode($iblock_focus_content);
													}
												?>
											</div>
											<label for="<?php echo $post->post_name; ?>" class="add-or-remove-button ui white outer dark">Add to your solution</label>
											<button type="button" class="back-button close-expanded-selected">back</button>
										</div>
									</article>
								<?php endwhile; endif; endif; wp_reset_postdata();?>

									<section id="additionalPathways"></section>

									<button id="addiBlockOptions" type="button" class="dropdown-trigger-button add-pathway-options ui white outer dark" >Add More iBlock Pathway Options</button>
									<div class="dropdown-menu-container iblock-pathway-menu" role="menu">
										<div id="pathway-checkbox-list" class="ui dropdown-content selection-list">
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
											<div class="ui-checkbox-container">
												<input type="checkbox" class="pathway-checkbox" id="<?php echo $post->post_name . '-checkbox'; ?>" name="<?php echo $post->post_name . '-checkbox'; ?>" title="<?php echo $post->post_title; ?>" value="<?php echo $post_id; ?>"  />
												<label for="<?php echo $post->post_name . '-checkbox'; ?>">
													<span class="toggle"></span>
													<em><?php echo $post->post_title; ?></em>
													<button type="button"></button>
												</label>
												<div class="pathway-checkbox-content">
													<?php the_content(); ?>
												</div>
											</div>
								    <?php
								      endwhile; endif;
								        wp_reset_postdata();
								    ?>
										</div>
									</div>

								</div>

								<div class="column is-one-quarter sticky-item input-control">
									<button type="button" disabled="disabled" id="iBlocksNextButton" class="next-button margin-auto ui white outer dark top-content-scroll" ng-class="{ active: isSet(3) }" ng-click="setTab(3)">NEXT STEP</button>
									<button type="button" id="iBlocksSkipButton" class="next-button skip ui white outer dark top-content-scroll" ng-class="{ active: isSet(3) }" ng-click="setTab(3)">SKIP STEP</button>
									<a class="back-button top-content-scroll" ng-class="{ active: isSet(1) }" ng-click="setTab(1)">PREV STEP</a>
									<div class="margin-top margin-left margin-right">
										<p class="has-text-centered is-size-6 has-text-grey-darker padding-top"><strong>Have a question?</strong><br /><a href id="solutionQuoteRequest" class="modal-open-button"><u>Click here</u></a> to have a Teq Representative reach out to you.</p>
									</div>
								</div>

							</section>

							<section id="instructional-support-selection"  class="products-list professional-development" ng-show="isSet(3)">
								<div class="preliminary-product-list-container">
									<div class="column is-one-quarter sticky-item">
										<img class="section-logo" src="<?php echo get_template_directory_uri() . '/inc/images/create-prelim-site-header_otis-logo.svg'; ?>" />
										<p>Learn educational technology skills with PD designed around your needs; with options for on-site, online, or a blended learning model. Teq’s PD Specialists and Curriculum Specialists who facilitate both our Onsite PD, Virtual, and  Online PD sessions are State Certified Educators with skills and expertise in every subject and content area – English, Math, Science, Social Studies, STEM, ENL and Special Education. </p>
									</div>
									<div class="column is-half">
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
										<article class="ui rounded product-item pd-option static-select">
											<div class="product-checked-cover"></div>
	  									<input type="checkbox" class="product-item-checkbox instructional-support" id="<?php echo $post->post_name; ?>" <?php if ($post->post_name == 'teq-tivities') { echo 'name="teq-tivity-selectioned"'; } else { echo 'name="userPdSelections[]"';} ?> title="<?php the_title(); ?>" value="<?php echo $post_id; ?>">
											<?php echo get_the_post_thumbnail( $post_id, 'full', array( 'class' => 'product' ) ); ?>
											<div class="circle-highlight"></div>
											<button type="button" class="arrowBack-button close-expanded-selected"></button>
											<div class="inner-content">
												<h3 class="product-title">
													<?php the_title(); ?>
													<div id="tag-container" class="<?php the_title(); ?>"></div>
												</h3>
												<svg version="1.1" viewBox="0 0 100 100">
												<path fill="#FFFFFF" d="M63.39,38.443L43.869,57.963l-7.986-7.986c-1.693-1.693-4.438-1.693-6.131,0c-1.693,1.693-1.693,4.438,0,6.131 l11.053,11.053c0.844,0.846,1.954,1.271,3.064,1.271s2.22-0.424,3.067-1.271l22.585-22.587c1.693-1.693,1.693-4.438,0-6.131 C67.826,36.75,65.082,36.75,63.39,38.443z"/>
												<path fill="#FFFFFF" d="M50.032,3.061C23.98,3.061,2.86,24.18,2.86,50.232S23.98,97.404,50.032,97.404
												c26.052,0,47.171-21.119,47.171-47.171S76.084,3.061,50.032,3.061z M50.032,87.659c-20.67,0-37.427-16.756-37.427-37.427 s16.756-37.427,37.427-37.427c20.67,0,37.427,16.756,37.427,37.427S70.702,87.659,50.032,87.659z"/>
												</svg>
											</div>

											<?php if ($post->post_name == 'otis-for-educators') { ?>
												<button type="button" class="product-item-options"></button>
												<div class="dropdown-menu-container" role="menu">
													<button type="button" class="close-item-options"></button>
													<div class="dropdown-content">
														<div class="ui selection-list pd-category-list">
												      <label ng-repeat="category in categories" for="{{category.value}}">
												        <input type="checkbox" class="pd-category-item otis" name="{{category.value}}" title="{{category.title}}" id="{{category.value}}" value="{{category.title}}">
												        <span class="checkmark"></span>
												        {{category.title}}
												      </label>
												    </div>
													</div>
												</div>
											<?php } elseif ($post->post_name == 'teq-tivities') { ?>
												<button type="button" class="product-item-options"></button>
												<div class="dropdown-menu-container" role="menu">
													<button type="button" class="close-item-options"></button>
													<div class="dropdown-content">
														<div class="ui selection-list pd-category-list">
												      <label ng-repeat="teqtivity in teqtivities" for="{{teqtivity.value}}">
												        <input type="checkbox" class="pd-category-item teqtivity" name="{{teqtivity.value}}" title="{{teqtivity.title}}" id="{{teqtivity.value}}" value="{{teqtivity.title}}">
												        <span class="checkmark"></span>
												        {{teqtivity.title}}
												      </label>
												    </div>
													</div>
												</div>
											<?php } ?>

											<div class="product-content">
												<?php the_excerpt(); ?>
												<label for="<?php echo $post->post_name; ?>" class="add-or-remove-button ui white outer dark">Add to your solution</label>
												<button type="button" class="back-button close-expanded-selected">back</button>
											</div>
										</article>
									<?php
										endwhile; endif;
									?>
									</div>
									<div class="column is-one-quarter sticky-item input-control">
										<button type="submit" id="pdFinishedButton" disabled="disabled" class="submit-button finished margin-auto ui white outer dark"><span class="inner">FINISHED</span></button>
										<button type="submit" id="pdSkipButton" class="next-button skip ui white outer dark top-content-scroll" ng-class="{ active: isSet(3) }"ng-click="setTab(3)">SKIP STEP</button>
										<a class="back-button top-content-scroll" ng-class="{ active: isSet(2) }" ng-click="setTab(2)">PREV STEP</a>
										<div class="margin-top margin-left margin-right">
											<p class="has-text-centered is-size-6 has-text-grey-darker padding-top"><strong>Have a question?</strong><br /><a href id="solutionQuoteRequest" class="modal-open-button"><u>Click here</u></a> to have a Teq Representative reach out to you.</p>
										</div>
									</div>

								</div>
							</section>

						</div>

					</div>
				</form>

				<div class="modal" data-modal-title="solutionQuoteRequest">
					<div class="modal-background"></div>
					<div class="modal-content ui outer dark quote-form" id="quoteRequestForm">

						<div class="columns">
							<div class="column is-full">
								<h4 class="strong">Let’s make it happen!</h4>
								<!--[if lte IE 8]>
									<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
								<![endif]-->
								<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
								<script>
									hbspt.forms.create({
										portalId: "182596",
										formId: "7ba87b62-fc68-47e1-95c7-8cd530871ec3",
										onFormReady: function($form) {

											// HIDE THE INITIAL HUBSPOT FORM SUBMIT BUTTON
											$('input[type="submit"]').css("display","none");

											// CLICK FUNCTION TO SUBMIT HUBSPOT FORM
											$( "#submitQuoteRequest" ).click(function() {
												$( "form.hs-form" ).submit();
											});
										},
										onFormSubmit: function($form) {
											console.log('submitted');
										}
									});
								</script>
								<div id="product-solution-quote-submit-buttons" class="field is-grouped">
									<div class="control">
										<input id="submitQuoteRequest" class="button is-link" type="button" value="Get Quote" name="submitQuoteRequest" />
									</div>
									<div class="control">
										<button class="button is-light quote-modal-close close-modal">Cancel</button>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>


		</section>
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
