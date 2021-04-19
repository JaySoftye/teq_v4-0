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

		<?php if ( have_posts() && in_category('careers') ) : ?>

			<nav id="subhead" class="navbar product-site-header">
				<div class="navbar-menu">
					<div class="navbar-start">
						<figure>
							<img class="large-brand-logo" src="/wp-content/uploads/2020/02/about-us-teq-careers.jpg" alt="Teq Careers" />
						</figure>
					</div>
					<div class="navbar-end mobile-dropdown-trigger">
						<a class="navbar-item" href>Product Options</a>
					</div>
					<div class="navbar-end mobile-dropdown">
						<a class="navbar-item" href ng-click="setTab(1)">Join our Team</a>
						<a class="navbar-item" href="/about-us">About Teq</a>
						<a class="navbar-item product-demo-request" href="/contact-us">Contact us</a>
					</div>
				</div>
			</nav>
			<section class="padding-bottom">
				<div class="content-container">

					<div class="columns padding-bottom">
						<div class="container">
							<div class="column is-offset-1 is-10">
								<h1 class="strong">Become part of our team, join the #1 education technology company in the country, and make a difference in the lives of students.</h1>
								<p class="padding-sm-top-bottom">
									<a class="button dark no-shadow" href="#teqCareers">View our current job opportunities</a>
								</p>
								<p>Wake up in the morning with a passion for making a difference in the lives of students. Teq believes in improving educational outcomes. At Teq, we work hard to foster innovation, passion, and creativity in the twenty-first century classroom by providing a unique blend of the latest K-12 educational technology products, experienced service, and meaningful professional development. With a focus on the fusion of technology and learning, our goal is to empower educators, improve technology integration, and increase student achievement in today's schools.</p>
								<figure class="padding-sm-top-bottom">
									<img src="/wp-content/uploads/2020/02/about-us-benefits-image.svg" />
								</figure>
							</div>
						</div>
					</div>
					<div id="teqCareers" class="columns padding-bottom">
						<div class="container">
							<div class="column is-offset-1 is-10">
								<h1 class="strong">Our current job opportunities:</h1><br /><br />
								<div class="columns is-multiline">
								<?php
									$args = array(
										'post_type' => 'post',
										'category_name' => 'careers',
										'posts_per_page' => -1,
										'orderby' => 'title',
										'order'   => 'ASC'
									);
									$the_query = new WP_Query( $args );

									if ( $the_query -> have_posts() ) :
										while ($the_query -> have_posts()) : $the_query -> the_post();
								?>
									<article class="column is-4-desktop is-2-tablet">
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
												<p class="caption"><?php echo get_the_excerpt(); ?></p>
											</div>
										</div>
									</article>
								<?php endwhile; else: ?>
            			<h3 class="is-size-4"><?php _e( 'Sorry, no current job postings at this time. <strong>Check back soon for updates</strong>.' ); ?></h3>
        				<?php endif; wp_reset_query(); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

		<?php elseif ( have_posts() ) : ?>

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
			<section class="padding-bottom">
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
						<?php endwhile; ?>
					</div>
				</div>
			</section>

		<?php else : ?>

			<section class="padding-bottom">
				<div class="content-container container">
					<div class="columns is-centered padding-bottom">

						<div class="container">
							<div class="column">
								<h1 class="page-titles has-text-centered"><?php esc_html_e( 'Nothing Found', 'teq_v4-0' ); ?></h1>
								<p class="has-text-centered"><?php esc_html_e( 'Sorry, but nothing can be found for this page.', 'teq_v4-0' ); ?></p>
							</div>
						</div>

					</div>
				</div>
			</section>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
