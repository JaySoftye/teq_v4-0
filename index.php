<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Teq_v4.0
 */

get_header();
?>

	<div id="primary" class="content-area" scroll>
		<main id="main" class="site-main">
      <section class="section full">

        <div id="index-container">

					<div class="columns is-vcentered ui ui-content">
						<div class="column is-half-desktop is-half-tablet is-full-mobile index-content">
          		<h1>Learning<br />solutions<br />for every<br />environment</h1>
							<div class="sub-content">
								<h2>Explore the technology, tools, and instructional solutions that bring all of the dynamic moving parts of education together into the complete thought.</h2>
								<!--
								<h2>Explore the technology, tools, and instructional solutions for successful learning inside and outside of the classroom.</h2>
								<h2>From STEM products to PD to PBL, our instructional solutions are created specifically to fit your needs and can be crafted to follow the scope and sequence of your existing curricula.</h2>
							-->
							</div>
						</div>

						<div class="column is-half-desktop is-half-tablet is-full-mobile ui ui-container">
							<div class="ui ui-dial offwhite outer">
								<?php echo file_get_contents(get_template_directory_uri() . '/inc/ui/the-complete-thought-dial.svg'); ?>
							</div>
						</div>
					</div>
        </div>

				<svg class="dial-highlight" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 400 400">
					<circle cx="200" cy="200" r="75" fill="rgba(255,255,255,.1)" />
					<circle cx="200" cy="200" r="87" fill="rgba(255,255,255,.1)" />
					<circle cx="200" cy="200" r="99" fill="rgba(255,255,255,.1)" />
					<circle cx="200" cy="200" r="114" fill="rgba(255,255,255,.1)" />
					<circle cx="200" cy="200" r="132" fill="rgba(255,255,255,.1)" />
				</svg>

      </section>
			<video autoplay muted loop id="backgroundVid" poster="<?php echo get_template_directory_uri() . '/inc/images/teq_complete-thought_website_720p_cover.jpg'; ?>">
				<source src="<?php echo get_template_directory_uri() . '/inc/images/teq_complete-thought_website_720p.mp4'; ?>" type="video/mp4">
			</video>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
