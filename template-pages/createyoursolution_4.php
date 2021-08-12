<?php
/**
 * Template Name: Create Your Solution 4.0
 * The template for displaying the Create Your Solution first phase
 * Name, Email, Grade Band, STEM FOCUS input fields
 * @package Teq_v4.0
 */

get_header();

/**
 * Template Name: Create Your Solution 3.0
 */

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

			<form id="products_search_form" name="products_search_form" method="POST" action="<?php echo get_home_url(); ?>/create-your-solution/your-solution-selections?id=<?php echo(mt_rand(0,999)); ?>" class="container" ng-controller="solutionController">

				<?php echo file_get_contents(get_template_directory_uri() . '/inc/ui/dropshadow-filter.svg'); ?>

				<section id="nameFields" class="columns is-multiline is-centered is-vcentered is-desktop">
					<div class="column is-9-desktop is-full-mobile has-text-centered">
						<h1><strong>CREATE</strong> Your Solution</h1>
						<h2 class="is-size-5 margin-top margin-bottom">Use our self-guided product and services selection tool to build a custom solution for your school!</h2>
						<h2 class="is-size-5 margin-top margin-bottom">After answering a few simple questions, you’ll build a plan that includes STEM technology, project-based learning activities, and the professional learning that ties it all together. Then, get a summary of your selection results and start a conversation with our team.</h2>
						<div class="input-control level">
							<div class="level-item margin-top">
								<button type="submit" class="level-item submit-button margin-auto ui white outer dark"><span class="inner">LET'S GET STARTED </span></button>
							</div>
						</div>
					</div>
				</section>

			</form>

		</section>
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
