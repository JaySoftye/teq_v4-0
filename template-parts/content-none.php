<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Teq_v4.0
 */

?>


<div id="primary" class="content-area" scroll>
	<main id="main" class="site-main section-container">

		<section class="full-section media-resources padding-bottom">
			<div id="blue-wave-cover"></div>

			<?php if ( is_search() ) : ?>

			<div class="page-content">
				<div class="container">
					<div class="columns is-vcentered is-desktop">
						<div class="column is-6 is-offset-3">
							<h1 class="page-titles has-text-centered"><?php esc_html_e( 'Nothing Found', 'teq_v4-0' ); ?></h1>
						</div>
					</div>
					<div class="columns is-vcentered is-desktop">
						<div class="column is-6 is-offset-3 teq-blog-search">

							<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'teq_v4-0' ); ?></p>

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

			<?php else : ?>

				<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'teq_v4-0' ); ?></p>
				<?php get_search_form(); ?>

			<?php endif; ?>

		</section>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
