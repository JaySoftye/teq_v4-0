<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Teq_v4.0
 */

get_header();
?>

<div id="primary" class="content-area" scroll>
	<main id="main" class="site-main section-container grey-background">

		<section class="full-section padding-bottom">

			<div class="page-content">
				<div class="container">
					<div class="columns is-vcentered is-desktop">
 						<div class="column is-8 is-offset-2">
							<p class="has-text-centered">
	 							<img src="<?php echo get_template_directory_uri() . '/inc/images/404-error-image.gif'; ?>" alt="404 error" />
							</p>
							<h5 class="has-text-centered sub-header">We seem to be having some <strong>Teq</strong><em>&bull;ni&bull;cal</em> difficulties.</h5>
							<p class="has-text-centered small-header">The page you’re looking for can’t be found. If the problem persists please <a class="strong blue-text" href="mailto:info@teq.com"><u>let us know</u></a>,<br />but for now try <a class="strong blue-text" href="<?php echo home_url(); ?>"><u>visiting the home page again</u> <span style='sub-header'>&#8594;</span> </a></p>
						</div>
					</div>
				</div>
			</div>

    </section>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
