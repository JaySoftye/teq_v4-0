<?php
/**
 * Template Name: Browse
 * The template for displaying all browse categories
 * @package Teq_v4.0
 */

get_header();
?>

	<div id="primary" class="content-area" scroll>
		<main id="main" class="site-main section-container">

			<?php
				// Grab the main contents for the page
				while ( have_posts() ) :
					the_post(); the_content();
				endwhile; // End of the loop.

			?>

			<section class="full-section browse">
				<div class="fluid-width">
					<div class="container">
						<div class="columns is-desktop">
  						<div class="column is-8 is-offset-2">
								<h1 class="page-titles white-text has-text-centered scroll-icon centered light-icon">Transform your <span class="inline-content">classroom</span></h1>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="full-section browse stem-technology">
				<div class="fluid-width">
					<div class="container">
						<div class="columns is-desktop">
  						<div class="column is-8 is-offset-2">
								<h1 class="page-titles has-text-centered"><a class="white-text" href="/browse/stem-technologies">STEM <span class="inline-content">Technology</span></a></h1>
								<h5 class="has-text-centered white-text">Revolutionizing the way your students learn by creating solutions with real-world applications.</h5>
								<h5 class="has-text-centered">
									<a class="button white-border no-shadow" href="/browse/stem-technologies">Discover more</a>
								</h5>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="full-section browse education-technology">
				<div class="fluid-width">
					<div class="container">
						<div class="columns is-desktop">
  						<div class="column is-8 is-offset-2">
								<h1 class="page-titles has-text-centered"><a class="white-text" href="/browse/educational-technology">Educational<span class="inline-content">Technology</span></a></h1>
								<h5 class="has-text-centered white-text">Enrich student experiences and cultivate collaborative learning with the latest interactive displays and classroom audio systems.</h5>
								<h5 class="has-text-centered">
									<a class="button white-border no-shadow" href="/browse/educational-technology">Discover more</a>
								</h5>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="full-section browse professional-development">
				<div class="fluid-width">
					<div class="container">
						<div class="columns is-desktop">
  						<div class="column is-8 is-offset-2">
								<h1 class="page-titles has-text-centered"><a class="white-text" href="/browse/professional-development">Professional<span class="inline-content">Development</span></a></h1>
								<h5 class="has-text-centered white-text">Learn educational technology skills with PD designed around your needs; with options for on-site, online, or a blended learning model.</h5>
								<h5 class="has-text-centered">
									<a class="button white-border no-shadow" href="/browse/professional-development">Discover more</a>
								</h5>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="full-section browse active-learning-spaces">
				<div class="fluid-width">
					<div class="container">
						<div class="columns is-desktop">
  						<div class="column is-8 is-offset-2">
								<h1 class="page-titles has-text-centered"><a class="white-text" href="/browse/active-learning-spaces">Active Learning<span class="inline-content">Spaces</span></a></h1>
								<h5 class="has-text-centered white-text">Interactive learning through play and movement</h5>
								<h5 class="has-text-centered">
									<a class="button white-border no-shadow" href="/browse/active-learning-spaces">Discover more</a>
								</h5>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="full-section browse project-based-learning">
				<div class="fluid-width">
					<div class="container">
						<div class="columns is-desktop">
  						<div class="column is-8 is-offset-2">
									<h1 class="page-titles has-text-centered transition-one-thirds"><a class="white-text" href="/teq-blocks">Teq<span class="inline-content">Blocks</span></a></h1>
								<h5 class="has-text-centered white-text">Teq’s family of “Block” products are technology-centric, do-anywhere activities that engage students in every aspect of the learning process.</h5>
								<h5 class="has-text-centered">
									<a class="button white-border no-shadow" href="/teq-blocks">Discover more</a>
								</h5>
							</div>
						</div>
					</div>
				</div>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
