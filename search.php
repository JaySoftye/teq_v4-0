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
		<main id="main" class="site-main section-container">

		<?php if ( have_posts() ) : ?>

			<section class="full-section teq-talk block padding-bottom">
				<div id="blue-wave-cover"></div>

				<div class="page-content">
					<div class="container">
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
						<div class="columns is-vcentered is-desktop">
							<div class="column is-6 is-offset-3 teq-blog-search">

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

				<div class="page-content padding-bottom">
					<div class="container">
						<div class="columns is-vcentered is-desktop is-multiline post-card-container">

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
										the_posts_navigation();
									else :
										get_template_part( 'template-parts/content', 'none' );
									endif;
							?>
						</div>
					</div>
				</div>
			</section>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
