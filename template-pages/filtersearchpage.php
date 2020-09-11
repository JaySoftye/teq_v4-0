<?php
/**
 * Template Name: Product Filter Search Page
 * The template for displaying the filtered product search from the top Navbar
 * @package Teq_v4.0
 */

get_header();

/**
  * CHECK IF PARAMETERS EXIST IN URL
	* IF TRUE THEN SET VARIABLE TO THE TERM
	*/
	if(get_query_var('selectedProductType') !== '') {
    $selectedProductType = get_query_var('selectedProductType');
	}
	if(get_query_var('selectedGradeLevel') !== '') {
    $selectedGradeLevel = get_query_var('selectedGradeLevel');
	}
	if(get_query_var('selectedStemSubjectMatter') !== '') {
    $selectedStemSubjectMatter = get_query_var('selectedStemSubjectMatter');
	}
	if(get_query_var('selectedtechnologyProficiencyLevel') !== '') {
    $selectedtechnologyProficiencyLevel = get_query_var('selectedtechnologyProficiencyLevel');
	}
?>

<div id="primary" class="content-area" scroll>
	<main id="main" class="site-main section-container">

		<section class="full-section grey-background">
			<div class="columns is-multiline padding-top">

				<div class="column is-full filter-results">
					<h1>Teq Solutions for:<br />
						<strong><?php echo $selectedProductType . ' ' . $selectedGradeLevel . ' ' . $selectedStemSubjectMatter . ' ' . $selectedtechnologyProficiencyLevel ?></strong>
					</h1>
					<h6 class="padding-bottom">Didn’t find what you need? <strong ng-click="openFiltersMenu()"><u>Start another search here.</u></strong></h6>
					<div class='columns is-multiline'>

							<?php if ( have_posts() ) :
								$args = array(
									'post_type' => 'product-and-service',
									'category_name' => 'teq-product',
									'taxonomy' => 'topic',
									'posts_per_page' => -1,
									'orderby' => 'title',
									'order'   => 'ASC',
									'tax_query' => array(
        						array (
            					'taxonomy' => 'topics',
            					'field' => 'slug',
            					'terms' => array($selectedProductType, $selectedGradeLevel, $selectedStemSubjectMatter, $selectedtechnologyProficiencyLevel)
        						)
    							),
								);

							$the_query = new WP_Query( $args );
								while ($the_query -> have_posts()) : $the_query -> the_post();
									$custom_url = get_post_meta( $post->ID, 'custom_url_meta_content', true );
							?>

								<article class="<?php $terms = get_the_terms( $post->ID, 'topics' ); foreach($terms as $term) { echo $term -> slug . ' '; } ?>column is-4-desktop is-6-tablet product-item">
									<a class="product-container" href="<?php if(empty( $custom_url)) { the_permalink(); } else { echo get_post_meta( $post->ID, 'custom_url_meta_content', true ); } ?>">
										<div class="product-content">
											<h3>
												<?php the_title(); ?>
											</h3>
										</div>
										<div class="image-link">
											<?php echo get_the_post_thumbnail( $post_id, 'full', array( 'class' => 'featured-image' ) ); ?>
										</div>
										<div class="product-content">
											<?php the_excerpt(); ?>
											<p class="product-filter-list toggle-content" style="display:none;">
												<strong>PRODUCT FILTERS:</strong><br />
												<?php
													$terms = get_the_terms( $post->ID, 'topics' );
													foreach($terms as $term) {
														echo '<span>' . $term -> name . '  /  </span>';
													}
												?>
											</p>
										</div>
									</a>
									<a role="button" class="navbar-burger">
    								<span aria-hidden="true"></span>
    								<span aria-hidden="true"></span>
    								<span aria-hidden="true"></span>
  								</a>
								</article>

							<?php endwhile; endif; wp_reset_postdata(); // End have_posts() check. ?>

					</div>
				</div>
			</div>
		</section>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
