<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Teq_v4.0
 */

get_header();
?>

	<div id="primary" class="content-area white-background-fill">
		<main id="main" class="site-main section-container">

		<?php if ( have_posts() ) : ?>

			<nav id="subhead" class="navbar product-site-header">
				<div class="navbar-menu container">
					<div class="navbar-start">
						<figure>
							<img class="large-brand-logo" src="/wp-content/uploads/2020/02/about-us-teq-teq-blocks-otis-for-educators_logo.png" alt="Teq OTIS for educators" />
						</figure>
					</div>
					<div class="navbar-end">
						<?php the_archive_title( '<h1 class="navbar-item nomargin is-size-5">', ' </h1>' ); ?>
					</div>
					<div class="navbar-end">
						<a class="navbar-item product-demo-request" href="/contact-us">Contact us</a>
					</div>
				</div>
			</nav>

			<section>
				<div class="content-container container">
					<div class="columns is-centered is-multiline padding-bottom">


						<?php while ( have_posts() ) : the_post(); ?>

							<div class="column is-3-desktop is-4-tablet">
								<div class="card">
									<div class="card-image">
										<figure class="image">
											<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large') ?></a>
										</figure>
									</div>
									<div class="card-content">
										<h5>
											<a class="relative-position less-line-height" href="<?php the_permalink(); ?>"><?php the_title(); ?> <span class="arrow"></span></a>
										</h5>
									</div>
								</div>
							</div>

						<?php endwhile;

		else : ?>

			<section>
				<div class="content-container container">
					<div class="columns is-centered padding-bottom">

						<div class="container">
							<div class="column">
								<h1 class="page-titles has-text-centered"><?php esc_html_e( 'Nothing Found', 'teq_v4-0' ); ?></h1>
								<p class="has-text-centered"><?php esc_html_e( 'Sorry, but nothing can be found for this page.', 'teq_v4-0' ); ?></p>
							</div>
						</div>

		<?php endif; ?>

					</div>
				</div>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
