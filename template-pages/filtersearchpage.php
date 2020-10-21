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

				<div class="column is-full filter-results filter-container">
					<h1 class="strong">Our Teq Solutions</h1>
					<h6>Didn’t find what you need? <strong>Start another search here using the form below.</strong></h6>
					<?php get_template_part( 'template-parts/product-filters-search', get_post_type() ); ?>

					<div id="productSearchResults" class='columns is-multiline'>

						<?php
							/**
						  	* WORDPRESS SEARCH QUERY
								* Query Custom Post Type 'Product and Service'
								* TAXONOMY Criteria based up on user input
								* Tax Query handles main search - PRODUCT TYPE REQUIRED!
								*/

								$args = array(
									'post_type' => 'product-and-service',
									'category_name' => 'teq-product',
									'posts_per_page' => -1,
									'orderby' => 'title',
									'order'   => 'ASC',
									'tax_query' => array (
										'relation' => 'AND',
										array(
											'taxonomy' => 'topics',
											'field' => 'slug',
											'terms' => $selectedProductType,
										),
										array(
											'taxonomy' => 'topics',
											'field' => 'slug',
											'terms' => $selectedStemSubjectMatter,
											'operator' => 'AND',
										),
										array(
											'taxonomy' => 'grades',
											'field' => 'slug',
											'terms' => $selectedGradeLevel,
											'operator' => 'AND',
										),
										array(
											'taxonomy' => 'proficiency',
											'field' => 'slug',
											'terms' => $selectedtechnologyProficiencyLevel,
											'operator' => 'AND',
										),
									),
								);

								$the_query = new WP_Query( $args );
									if ($the_query -> have_posts()) : while ($the_query -> have_posts()) : $the_query -> the_post();
										$custom_url = get_post_meta( $post->ID, 'custom_url_meta_content', true );
						?>

						<article class="<?php $terms = get_the_terms( $post->ID, 'topics' ); foreach($terms as $term) { echo $term -> slug . ' '; } ?>column is-4-desktop is-6-tablet product-item">
							<a class="product-container" href="<?php if(empty( $custom_url)) { the_permalink(); } else { echo get_post_meta( $post->ID, 'custom_url_meta_content', true ); } ?>">
								<div class="product-content">
									<h3><?php the_title(); ?></h3>
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

						<?php endwhile; else : ?>
							<div class="column">
								<?php echo file_get_contents( get_template_directory_uri() . '/inc/images/nothing-found-icon.svg' ); ?>
								<h4><b>We are sorry</b>, but we couldn't find any products matching the filters you've selected.</h4>
								<p>Your filters - "<strong><?php echo $selectedProductType . ' ' . $selectedGradeLevel . ' ' . $selectedStemSubjectMatter . ' ' . $selectedtechnologyProficiencyLevel ?></strong>" - did not match any current products we have to offer. Using the form above try another search, or if you would like to reach out to us directly <a href="/contact-us"><u>click here</u></a> or call us at 877.455.9369</p>
							</div>
						<?php endif; wp_reset_postdata(); // End have_posts() check. ?>

					</div>
				</div>

			</div>
		</section>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
