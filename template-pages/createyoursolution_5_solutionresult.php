<?php
/**
 * Template Name: Create Your Solution 5.0 Solution Result
 * The template for displaying the Create Your Solution Result from Product.php template
 * Choose Your iBlock (PBL - Pathways) and/or STEM Products
 * @package Teq_v4.0
 */

get_header();

?>

<div class="modal" id="talkToaRepContactForm">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title"></p>
      <button class="delete contactFormButton" aria-label="close"></button>
    </header>
    <section class="modal-card-body">
			<!--[if lte IE 8]>
			<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
			<![endif]-->
			<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
			<script>
				hbspt.forms.create({
					region: "na1",
					portalId: "182596",
					formId: "7ba87b62-fc68-47e1-95c7-8cd530871ec3",
					onFormReady: function($form) {

						// HIDE THE INITIAL HUBSPOT FORM SUBMIT BUTTON
						$('input[type="submit"]').css("display","none");

						// CLICK FUNCTION TO SUBMIT HUBSPOT FORM
						$( "#productSearchNextButton" ).click(function() {

							// CREATE ARRAY VARIABLE TO STORE input::checked QUOTED_ITEMS[]
							var quoted_items = new Array();

							// LOOP THROUGH ALL input::checked ELEMENTS AND PASS TO HIDDEN INPUT FIELD input[name="products"]
							// SUBMIT FORM USING DEFAULT HUBSPOT ERROR CHECKING
							$.each($("input[name='quoted_items[]']:checked"), function() {
								quoted_items.push($(this).val());
							});
								$("input[name='products']").val(JSON.stringify(quoted_items)); //store array

						$( "form.hs-form" ).submit();
					});
				},
				onFormSubmit: function($form) {
					$("#productSearchNextButton").hide();
					console.log('submitted');
				}
			});
			</script>
    </section>
		<footer class="modal-card-foot buttonGroup">
			<button type="submit" id="productSearchNextButton" class="next">GET MY QUOTE</button>
    </footer>
  </div>
</div>

<div id="primary" class="content-area">
	<main id="main" class="site-main container create-your-solution-container">
		<form id="products_search_form" name="" ng-controller="solutionController">

			<section id="solutionsHeader">
				<div class="columns is-multiline is-centered is-desktop">
					<div class="column is-full">
						<p class="caption blue-text">
  						<strong>YOUR COMPLETED</strong> classroom solution.
						</p>
						<h1 class="main-title" ng-scope="solutionHeaderText">Congratulations, let's get your solution in the classroom today!</h1>
						<h6 class="margin-top margin-bottom">Based on your input, here is your classroom solution. It’s complete, it’s unique to you, and it gives you a holistic way to successfully infuse STEAM learning into your class, school, or district.</h6>
					</div>
				</div>
			</section>

			<section id="productSelections">
			  <div class="columns is-multiline is-centered is-desktop">
			    <div class="column is-full">
			      <div class="box-section">
							<?php
								$submit_error = false;

								if (isset($_POST['stemProducts'])) {
							    $stem_products = $_POST['stemProducts'];
								} else if (empty($_POST['stemProducts'])) {
										$submit_error = true;
								}
								if (isset($_POST['iblockPathways'])) {
							    $pathways_products = $_POST['iblockPathways'];
								} else if (empty($_POST['iblockPathways'])) {
										$submit_error = true;
								}
								if (isset($_POST['professionalDevelopment'])) {
							    $pd_products = $_POST['professionalDevelopment'];
								} else if (empty($_POST['professionalDevelopment'])) {
										$pd_products = 'null';
								}
							?>
							<div id="main-solution-container" class="columns" ng-class="{'has-active-selection' : accordionNameItem != ''}">

								<?php if ($submit_error == true) { ?>
									<div class="column is-three-fifths">
										<h4>Uh oh, don't be alarmed but there was an error processing this request, but please <u>don't scream</u>. Unless, its for <strong>Ice-Cream</strong>. Which, we are told, is on the way.</h4>
									</div>
									<div class="column">
										<object type="image/svg+xml" data="<?php echo get_template_directory_uri() . '/inc/ui/main-solution-container_error.svg'; ?>"></object>
									</div>
								<?php } else { ?>
									<div class="column is-three-fifths">
										<ul>
										  <?php
										    $product_args = array(
										      'post_type' => 'product-and-service',
										      'orderby'=> 'title',
										      'order' => 'ASC',
										      'post__in' => $stem_products,
										    );

										    $product_query = new WP_Query( $product_args );
										    if ($product_query -> have_posts()) : while ($product_query -> have_posts()) :
										      $product_query -> the_post();
													$post_name = $post->post_name;
													$post_label = str_replace('-', '', $post_name);
													$post_type = $post->post_type;
													$post_id = get_the_ID();
										      $custom_image = get_post_meta( get_the_ID(), 'custom_image_meta_content', true );
													$solution_content = get_post_meta( get_the_ID(), 'additional_info_meta_content', true );
                          $product_url = get_post_meta( get_the_ID(), 'custom_url_meta_content', true );
										  ?>
										  <li class="solution-item">
												<button type="button" class="close-selection" ng-click="accordionNameItem = ''" ng-show="accordionNameItem == '<?php echo $post_label; ?>'"></button>
												<input type="checkbox" name="quoted_items[]" value="<?php echo $post_name ?>" checked />
												<div class="solution-title" title="<?php echo $post_name ?>" data-type="<?php echo $post_type; ?>" data-target="<?php echo $post_id; ?>" data-category="stem" ng-click="accordionNameItem = '<?php echo $post_label; ?>'" ng-class="{'is-active' : accordionNameItem == '<?php echo $post_label; ?>'}">
													<img src='/wp-content/themes/teq_v4-0/inc/ui/<?php echo $custom_image; ?>.svg' />
													<h2><?php the_title(); ?><small>STEM Technology</small></h2>
													<div class="solution-details" ng-show="accordionNameItem == '<?php echo $post_label; ?>'">
														<?php echo html_entity_decode($solution_content); ?>
                            <a href="<?php echo $product_url; ?>" class="product-link" target="_blank">Learn More ›</a>
													</div>
												</div>
											</li>
										  <?php
										    endwhile; endif;
										      wp_reset_postdata();

										    $pathway_args = array(
										      'post_type' => 'pathways',
										      'orderby'=> 'title',
										      'order' => 'ASC',
										      'post__in' => $pathways_products,
										    );

										    $pathway_query = new WP_Query( $pathway_args );
										      if ($pathway_query -> have_posts()) : while ($pathway_query -> have_posts()) :
										        $pathway_query -> the_post();
														$post_name = $post->post_name;
														$post_label = str_replace('-', '', $post_name);
														$post_type = $post->post_type;
														$post_id = get_the_ID();
														$custom_image = get_post_meta( get_the_ID(), 'iblock_focus_stats_html', true );
														$solution_content = get_post_meta( get_the_ID(), 'iblock_focus_meta_html', true );
										  ?>
											<li class="solution-item">
												<button type="button" class="close-selection" ng-click="accordionNameItem = ''" ng-show="accordionNameItem == '<?php echo $post_label; ?>'"></button>
												<input type="checkbox" name="quoted_items[]" value="<?php echo $post_name ?>" checked />
												<div class="solution-title" data-type="<?php echo $post_type; ?>" data-target="<?php echo $post_id; ?>" data-category="pathway" ng-click="accordionNameItem = '<?php echo $post_label; ?>'" ng-class="{'is-active' : accordionNameItem == '<?php echo $post_label; ?>'}">
													<img src='/wp-content/themes/teq_v4-0/inc/ui/<?php echo $custom_image; ?>.svg' />
													<h2><?php the_title(); ?><small>Project-Based Learning Activity</small></h2>
													<div class="solution-details" ng-show="accordionNameItem == '<?php echo $post_label; ?>'">
														<?php echo html_entity_decode($solution_content); ?>
                            <a href="https://iblocks.com/iblocks-ideas/" class="product-link" target="_blank">Learn More ›</a>
													</div>
												</div>
											</li>
										  <?php
										    endwhile; endif;
										      wp_reset_postdata();

										    $pd_args = array(
										      'post_type' => 'product-and-service',
										      'orderby'=> 'title',
										      'order' => 'ASC',
										      'post__in' => $pd_products,
										    );

										    $pd_query = new WP_Query( $pd_args );
										      if ($pd_query -> have_posts()) : while ($pd_query -> have_posts()) :
										        $pd_query -> the_post();
														$post_name = $post->post_name;
														$post_label = str_replace('-', '', $post_name);
														$post_type = $post->post_type;
														$post_id = get_the_ID();
											      $custom_image = get_post_meta( get_the_ID(), 'custom_image_meta_content', true );
														$solution_content = get_post_meta( get_the_ID(), 'additional_info_meta_content', true );
                            $pd_product_url = get_post_meta( get_the_ID(), 'custom_url_meta_content', true );
										    ?>
												<li class="solution-item">
													<button type="button" class="close-selection" ng-click="accordionNameItem = ''" ng-show="accordionNameItem == '<?php echo $post_label; ?>'"></button>
													<input type="checkbox" name="quoted_items[]" value="<?php echo $post_name ?>" checked />
													<div class="solution-title" data-type="<?php echo $post_type; ?>" data-target="<?php echo $post_id; ?>" data-category="<?php echo $post_name; ?>" ng-click="accordionNameItem = '<?php echo $post_label; ?>'" ng-class="{'is-active' : accordionNameItem == '<?php echo $post_label; ?>'}">
														<img src='/wp-content/themes/teq_v4-0/inc/ui/<?php echo $custom_image; ?>.svg' />
														<h2><?php the_title(); ?><small>Professional Development</small></h2>
														<div class="solution-details" ng-show="accordionNameItem == '<?php echo $post_label; ?>'">
															<?php echo html_entity_decode($solution_content); ?>
                              <a href="<?php echo $pd_product_url; ?>" class="product-link" target="_blank">Learn More ›</a>
														</div>
													</div>
												</li>
										  <?php
										    endwhile; endif;
										      wp_reset_postdata();
										  ?>
											<li class="solution-item smart-board-option">
												<button type="button" class="close-selection" ng-click="accordionNameItem = ''" ng-show="accordionNameItem == 'smart_board_options'"></button>
												<div class="smart-board-title" ng-click="accordionNameItem = 'smart_board_options'" ng-class="{'is-active' : accordionNameItem == 'smart_board_options'}">

													<img src='/wp-content/themes/teq_v4-0/inc/ui/add_a_smart_display.svg' />
                          <img src='/wp-content/themes/teq_v4-0/inc/ui/add_a_smart_display_is-selected.svg' />

													<h2>An unparalleled collaborative experience <small>There’s a SMART display for every classroom</small></h2>
                          <div class="solution-details" ng-show="accordionNameItem == 'smart_board_options'">

                            <label class="checkbox" data-type="7000r" ng-click="smartBoard7000r = 'true'; smartBoard6000s = 'false'; smartBoardMx = 'false';" ng-class="{'is-selected' : smartBoard7000r == 'true'}">
                              <img src='/wp-content/themes/teq_v4-0/inc/ui/smart-board-add-on-solution-7000r-icon.svg' />
                              <input type="checkbox" class="smartBoardOption" name="quoted_items[]" value="SMART-7000r">
                              <p>SMART 7000r Series<small>Available in 65”, 75”, or 86” with HyPr Touch with inGlass™ included, fueled by the powerful iQ module. Designed for precision writing and interaction. SMART Board 7000R series gives you cutting-edge technology for a competitive price, for more connected classrooms and engaging learning. </small></p>
                            </label>
                            <label class="checkbox" data-type="6000s" ng-click="smartBoard7000r = 'false'; smartBoard6000s = 'true'; smartBoardMx = 'false';" ng-class="{'is-selected' : smartBoard6000s == 'true'}">
                              <img src='/wp-content/themes/teq_v4-0/inc/ui/smart-board-add-on-solution-6000s-icon.svg' />
                              <input type="checkbox" class="smartBoardOption" name="quoted_items[]" value="SMART-6000s">
                              <p>SMART 6000s Series<small>Available in 55“, 65”, 75”, or 86” with HyPr Touch with Advanced IR included, fueled by the powerful iQ module. Cutting-edge technology at a competitive price, for more connected classrooms and engaging learning. SMART Board 6000S’s ease of use brings capability to the classroom without complexity, for a proven return on your technology investment.</small></p>
                            </label>
                            <label class="checkbox" data-type="mx" ng-click="smartBoard7000r = 'false'; smartBoard6000s = 'false'; smartBoardMx = 'true';" ng-class="{'is-selected' : smartBoardMx == 'true'}">
                              <img src='/wp-content/themes/teq_v4-0/inc/ui/smart-board-add-on-solution-mx-icon.svg' />
                              <input type="checkbox" class="smartBoardOption" name="quoted_items[]" value="SMART-MX">
                              <p>SMART MX Series<small>Available in 65”, 75”, or 86” with Advanced IR included. Easily connect devices, content and learning experiences, both in and out of the classroom. And with a SMART Board that’s easy to deploy and support, you achieve return on your technology investment and a lower total cost of ownership.</small></p>
                            </label>

                            <button type="button" class="removeSmartOptions" ng-show="smartBoard7000r == 'true' || smartBoard6000s == 'true' || smartBoardMx == 'true'" ng-click="smartBoard7000r = 'false'; smartBoard6000s = 'false'; smartBoardMx = 'false';">Remove Selected</button>
                          </div>
												</div>
											</li>
										</ul>
									</div>
									<div id="solutionSVG" class="column solution-svg-container">
										<div id="loader" style="display:none;">
											<img class="margin-auto" src="<?php echo get_template_directory_uri() . '/inc/ui/loading_content.gif'; ?>" width="120px" height="120px" />
										</div>
										<?php
											$svg_object = file_get_contents(get_template_directory_uri() . '/inc/ui/main-solution-container_temp.svg');
												print $svg_object;
										?>
									</div>
								<?php } ?>

							</div>
						</div>
					</div>
				</div>
			</section>
			<div class="button-container form-action">
				<div class="container">
					<div class="buttonGroup">
						<button type="button" id="productSearchNextButton" class="next contactFormButton">Talk to a Rep</button>
						<button type="button" id="productSearchBackButton" class="skip" onclick="goBack()">Back</button>
					</div>
					<div class="buttonGroup hide-tablet">
            <button type="button" class="print" onclick="checkedItems()">/ LOG</button>
						<button type="button" id="printYourSolution" class="print">PRINT SOLUTION</button>
					</div>
				</div>
			</div>
		</form>
	</main><!-- #main -->
</div><!-- #primary -->
<script>
	var postTags = [
		<?php
			$tags = get_tags('post_tag'); //taxonomy=post_tag

			if ( $tags ) :
				foreach ( $tags as $tag ) :
					echo '"' . esc_attr( $tag->slug ) . '",';
				endforeach;
			endif;
		?>
	];
</script>

<?php
get_footer();
