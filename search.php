<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Teq_v4.0
 */

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main section-container teq-talk media-download-nav">

		<?php if ( have_posts() ) : ?>

			<?php if (has_category(array('resources', 'ebooks', 'data-sheets', 'catalogs', 'lesson-plans', 'case-studies'))) { ?>
				<nav id="subhead" class="navbar product-site-header background-transparent">
					<div class="navbar-menu has-align-self-center background-transparent">
						<div class="navbar-start hide-mobile">
							<a class="navbar-item search-button" ng-class="{ close: isSearchFormOpen }" ng-click="isSearchFormOpen = !isSearchFormOpen">DIDN'T FIND WHAT YOU NEED?</a>
						</div>
						<div class="navbar-center"><strong>Media</strong> Downloads</div>
				  	<div class="navbar-end hide-tablet">
							<?php echo file_get_contents(get_template_directory_uri() . '/inc/images/social.svg'); ?>
				  	</div>
					</div>
					<div class="navbar-menu" ng-show="isSearchFormOpen">
						<div class="product-demo-form container">
							<div class="columns">
								<div class="column">
									<!--[if lte IE 8]>
										<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
									<![endif]-->
									<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
									<script>
	  								hbspt.forms.create({
											portalId: "182596",
											formId: "3f0b30e6-e31e-4390-a8ae-d94c51265716"
										});
									</script>
								</div>
							</div>
						</div>
					</div>
				</nav>
				<section class="media-download-header">
					<div class="container columns is-vcentered is-desktop">
						<div class="column is-7 teq-blog-search card">
							<h1 class="less-line-height"><strong>Explore our resource</strong> library and get on learning today.</h1>
							<h6>Search for lessons ideas, professional development learning, ebook resources, product guides, edtech tips and more!</h6>
							<form role="search" method="get" class="teq-blog-search search-form" action="<?php echo home_url(); ?>">
								<div class="field has-addons">
									<div class="control">
										<input type="search" class="input search-field" placeholder="Search STEM, Makerbot, Robotics, Project-based Learning..." value="" name="s">
									</div>
									<input type="hidden" name="post_type" value="post" />
									<input type="hidden" name="cat" id="cat" value="360" />
									<div class="control">
										<button type="submit" class="search-submit search-button" value="Search"></button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</section>

				<div class="media-resources block padding-bottom">
					<div class="page-content">
						<div class="container padding-top">
							<div class="columns is-vcentered is-desktop">
								<div class="column is-6 is-offset-3">
									<h1 class="page-titles has-text-centered">
										<?php
										/* translators: %s: search query. */
										printf( esc_html__( 'Search Results for: %s', 'teq_v4-0' ), '<span>' . get_search_query() . '</span>' );
										?>
									</h1>
								</div>
							</div>
						</div>
					</div>
					<?php } else { ?>
					<div class="page-content">
						<div class="container padding-top">
							<div class="columns is-vcentered is-desktop">
								<div class="column is-6 is-offset-3">
									<h1 class="page-titles has-text-centered padding-top">
										<?php
										/* translators: %s: search query. */
										printf( esc_html__( 'Search Results for: %s', 'teq_v4-0' ), '<span>' . get_search_query() . '</span>' );
										?>
									</h1>
								</div>
							</div>
							<div class="columns is-centered is-desktop">
								<div class="column is-8 teq-blog-search">

									<form role="search" method="get" class="teq-blog-search search-form" action="<?php echo home_url(); ?>">
										<div class="field has-addons">
											<div class="control">
												<input type="search" class="input search-field" placeholder="Search …" value="" name="s">
											</div>
											<div class="control">
												<button type="submit" class="search-submit search-button" value="Search"></button>
											</div>
										</div>
									</form>

								</div>
							</div>
						</div>
					</div>
					<?php } ?>

				<div class="content padding-bottom">
					<div class="container">

						<div class="columns is-centered is-desktop is-multiline post-card-container">
							<?php
							/* Start the Loop */
								while ( have_posts() ) :
									the_post();
									/**
				 					* Run the loop for the search to output the results.
				 					* If you want to overload this in a child theme then include a file
				 					* called content-search.php and that will be used instead.
				 					*/
									get_template_part( 'template-parts/content', 'search' );

								endwhile;
							?>
						</div>

						<div class="columns">
							<div class="column is-full has-text-centered strong">
								<?php posts_nav_link(); ?>
							</div>
						</div>

						<?php
							else :
								get_template_part( 'template-parts/content', 'none' );
							endif;
						?>

					</div>
				</div>

			<div>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
