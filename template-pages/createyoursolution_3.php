<?php
/**
 * Template Name: Create Your Solution 3.0
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
					<div class="column is-full-desktop is-full-mobile">
						<h1 class="has-text-centered">Welcome!</h1>
						<h5>As educators, finding the perfect pedagogical solution to meet your needs can be challenging — until now! </h5>
						<h5>Here at Teq, we’re innovating the entire learning experience by bringing all the dynamic moving parts of education together into a complete thought. After answering just a few questions, you’ll be able to identify, browse, and refine a selection of customized solutions that best fit your unique needs.  </h5>
						<h3 class="has-text-centered strong">Let’s get started. </h3>
						<div class="ui">
							<div class="field has-addons">
								<div class="control input-control is-expanded">
									<input required class="is-fullwidth ui rounded outer dark input school-name {{products_search_form.schoolName.$valid}}" type="text" name="schoolName" ng-model="schoolName" placeholder="Please enter your name, school name, or district">
								</div>
								<div class="control input-control is-expanded">
									<input required class="is-fullwidth ui rounded outer dark input school-email {{products_search_form.schoolEmail.$valid}}" type="email" name="schoolEmail" ng-model="schoolEmail" placeholder="Please enter an email">
								</div>
							</div>
						</div>

						<div class="input-control level padding-sm-top-bottom">
							<div class="level-left absolute-position">
								<p class="level-item margin-left margin-right" ng-bind-html="errorText"></p>
							</div>
							<button type="submit" class="submit-button margin-auto ui white outer dark {{products_search_form.schoolName.$valid}} {{products_search_form.schoolEmail.$valid}}"><span class="inner">NEXT</span></button>
							<div class="level-right absolute-position">
								<p class="level-item margin-left margin-right"><a class="caption disabled" href="/teq-privacy-policy/"><em>TEQ PRIVACY POLICY</em></a></p>
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
