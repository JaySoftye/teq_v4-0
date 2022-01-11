<?php
/**
 * Template Name: CDW-G STEM Products
 * The template for displaying all STEM Products of custom post type product and service for CDW-G
 * @package Teq_v4.0
 */

get_header();
?>

	<div id="primary" class="content-area" scroll>
		<main id="main" class="site-main section-container padding-bottom cdw-g-grey-background">

			<?php get_template_part( 'template-parts/cdw-g-header', '' ); ?>

			<section class="section cdw-g-stem padding">
				<div class="container">
					<div class="columns is-vcentered">
						<div class="column">
							<h1 class="headline-title less-line-height">Are you ready to choose the technology that will directly impact student outcomes?</h1>
							<p>STEM learning is crucial for today’s students. If we are going to equip them with skills for the future, we need to use technology in a way that engages students and brings learning to life. Below is a list of our STEM products options available.</p>
						</div>
					</div>
				</div>
				<div class="container">
					<form class="container">
						<nav id="filters-category-menu" class="navbar cdw-g-grey-background">
	  					<div class="navbar-menu">
	    					<div class="navbar-start">
	      					<span class="navbar-item headline-title caption">You are viewing Products for:</span>
									<div class="navbar-item select">
	  								<select id="gradeBandFilter" onchange="filterItems(this);">
	    								<option value="post-card">All Grade Levels</option>
	    								<option value="grades-k-2">Grades K-2</option>
											<option value="grades-3-5">Grades 3-5</option>
											<option value="grades-6-8">Grades 6-8</option>
											<option value="grades-9-12">Grades 9-12</option>
	  								</select>
									</div>
									<div class="navbar-item select">
										<select id="subjectMatterFilter" onchange="filterItems(this);">
	    								<option value="post-card">All Subject Matters</option>
	    								<option value="coding">Coding</option>
											<option value="engineering">Engineering</option>
											<option value="general-education">General Education</option>
											<option value="hydroponics">Hydroponics</option>
											<option value="robotics">Robotics</option>
	  								</select>
									</div>
	    					</div>
	    					<div class="navbar-end">
	      					<div class="navbar-item">
										<input id="clear-filters" type="reset" value="Reset Filters" onclick="clearFilters()">
	        				</div>
	      				</div>
	    				</div>
						</nav>
					</form>
					<div id="famis-products-container" class="columns is-desktop is-multiline post-card-container">
						<div id="noProductsFound" class="column is-full"></div>
						<?php
							function getProductGrades() {
								foreach(get_the_terms($product_query->post->ID, 'grades') as $grades)
									echo $grades->slug . " ";
							}
							function getProductCategories() {
								$categories = get_the_category();
									foreach( $categories as $category) {
										if($category->name !== 'CDW-G')
										if($category->name !== 'FAMIS Product')
										if($category->name !== 'Teq Product') {
											$name = $category->slug;
											$category_link = get_category_link( $category->term_id );
											echo esc_attr( $name) . " ";
										}
									}
								}

							$args = array(
								'post_type' => 'product-and-service',
								'category_name' => 'CDW-G',
								'taxonomy' => 'topic',
								'posts_per_page' => -1,
								'orderby' => 'title',
								'order'   => 'ASC',
								'tax_query' => array(
									array (
										'taxonomy' => 'topics',
										'field' => 'slug',
										'terms' => array('Educational Technology', 'STEM Technologies'),
									),
								),
							);

					  	$the_query = new WP_Query( $args );
					 			if ( $the_query->have_posts() ) :
									while ( $the_query->have_posts() ) :
										$the_query->the_post();
						?>
							<article class="column is-4 post-card <?php getProductGrades(); getProductCategories(); ?>">
								<div class="post-card-body">
									<a href="<?php the_permalink(); ?>?edc">
										<div class="view-hover"></div>
										<?php the_post_thumbnail( 'large') ?>
									</a>
									<h4 class="has-text-centered padding-sm-bottom"><?php the_title(); ?></h4>
								</div>
							</article>
						<?php endwhile; wp_reset_postdata(); endif; ?>
					</div>

				</div>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php get_template_part( 'template-parts/simple-footer', '' ); ?>

	<?php wp_footer(); ?>

	</body>
	</html>
