<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Teq_v4.0
 */

get_header();
?>

<div id="primary" class="content-area" scroll>
	<main id="main" class="site-main section-container">

		<section class="full-section padding-bottom">

			<div class="page-content">

				<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', get_post_type() );

						// the_post_navigation();

						// If comments are open or we have at least one comment, load up the comment template.
						/**
						 *if ( comments_open() || get_comments_number() ) :
						 *comments_template();
						 *endif;
						**/
					endwhile; // End of the loop.
				?>
			</div>

		</section>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
