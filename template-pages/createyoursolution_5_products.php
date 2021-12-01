<?php
/**
 * Template Name: Create Your Solution 5.0 Products
 * The template for displaying the Create Your Solution Selection Phase 1
 * Choose Your iBlock (PBL - Pathways) and/or STEM Products and/or Professional Development Choices
 * @package Teq_v4.0
 */

get_header();

?>

<div id="primary" class="content-area">
	<main id="main" class="site-main container create-your-solution-container">
		<form id="products_search_form" name="products_search_form" autocomplete="off"  method="POST" action="<?php echo get_home_url(); ?>/create-your-solution/your-solution-results" ng-controller="solutionController">

			<div id="solutionSetModal" class="modal">
  			<div class="modal-background"></div>
  			<div class="modal-content">
					<div class="box">
						<table class="table">
							<thead>
								<tr>
									<th></th>
									<th></th>
									<th>Product Solution(s)</th>
									<th>Grade Level</th>
									<th>Subject Matter</th>
								</tr>
							</thead>
							<tbody id="solutionSetRows"></tbody>
						</table>
						<div id="loader" style="display:none;">
							<img class="margin-auto" src="<?php echo get_template_directory_uri() . '/inc/ui/loading_content.gif'; ?>" width="48px" height="48px" />
						</div>
					</div>
					<button type="button" id="closeSolutionButton" onclick="closeModals()">✕</button>
				</div>
			</div>

			<section id="solutionsHeader">
				<div class="columns is-multiline is-centered is-desktop">
					<div class="column is-full">
						<p class="caption blue-text">
  						<strong>YOUR</strong> classroom solution.
						</p>
						<h1 class="main-title" ng-scope="solutionHeaderText">{{solutionHeaderText}}</h1>
						<progress id="progressBarAmount" class="progress is-success" value="25" max="100"></progress>
						<span id="progressStatusAmount" class="progress-status">25</span>
					</div>
				</div>
			</section>

			<section id="productSelections">
			  <div class="columns is-multiline is-centered is-desktop">
			    <div class="column is-full">
			      <div class="box-section">

							<h4 class="margin-top margin-bottom">{{solutionSubheaderText}}</h4>
							<p>{{solutionBodyText}}</p>
							<br />

							<?php get_template_part( 'template-parts/create-your-solution-filters', '' ); wp_reset_postdata(); ?>

							<div id="product-details-container"></div>
			        <section id="productOptions" class="columns is-multiline">

								<div id="loader" class="margin-auto full-width" style="display:none;">
									<img class="margin-auto" src="<?php echo get_template_directory_uri() . '/inc/ui/loading_content.gif'; ?>" width="99px" height="99px" />
								</div>
								<?php

									if (isset($_GET['entryPoint']) && $_GET['entryPoint'] == 'stemEntryPoint') {

										get_template_part( 'template-parts/create-your-solution-selection-products', '' );

									} else if (isset($_GET['entryPoint']) && $_GET['entryPoint'] == 'pblEntryPoint') {

										get_template_part( 'template-parts/create-your-solution-selection-pathways', '' );

									} else {
										echo 'Oops there was an error';
									}
								?>
							</section>
						</div>
					</div>
				</div>
				<div class="button-container form-action">
					<div class="container">
						<div class="buttonGroup">
							<button type="button" id="productSearchNextButton" class="next" ng-hide="readyToSubmit" ng-click="nextSolutions()" disabled>Next Section</button>
							<button type="submit" id="productSearchSubmitButton" class="next" ng-show="readyToSubmit"><strong>submit</strong></button>
							<button type="button" id="productSearchBackButton" class="skip" ng-click="reload()">Start Over</button>
						</div>
						<button type="button" id="yourClassroomSolution" class="tags has-addons" disabled>
							<span class="tag">Your classroom solution</span>
							<span id="solutionSet" class="tag">0</span>
						</button>
					</div>
				</div>
			</section>

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
