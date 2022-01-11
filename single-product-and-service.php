<?php
/**
 * The template for displaying all Product and Service custom post type
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Teq_v4.0
 */

get_header();

	// IF NOT EDC CDW PRODUCT OR FAMIS PRODUCT GET THE NAVIGATION HEADER FILE
	if(!isset($_GET['famis']) && !isset($_GET['edc']))  {
		include 'navigation.php';
	}
?>

<div id="primary" class="content-area" scroll>
	<main id="main" class="site-main section-container">

		<?php
			// CHECK IF THIS IS AN CDW EDC OR FAMIS PRODUCT
			// SHOW THE CDW-G Header
			if(isset($_GET['edc'])) {
				get_template_part( 'template-parts/cdw-g-header', '' );

			// CHECK IF THIS IS AN CDW EDC OR FAMIS  PRODUCT
			// SHOW THE NYC Department of Education Header
			} elseif(isset($_GET['famis'])) {
		?>
		<div class="container">
			<nav class="navbar padding-sm-top" role="navigation" aria-label="main navigation">
				<div class="navbar-brand">
					<a href="/nycdoe/">
						<img src="/wp-content/uploads/2020/02/teq-cdw-g-contract-no-B220901.svg" width="270"  alt="Teq CDW-G" />
					</a>
				</div>
				<div id="navbarBasicExample" class="navbar-menu">
					<div class="navbar-start"></div>
					<div class="navbar-end">
						<h6 class="navbar-item blue-text strong">NYC Product Catalog | 877.455.9369</h6>
					</div>
				</div>
			</nav>
		</div>
		<?php } ?>

		<article>

				<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/product-content', get_post_type() );

						// the_post_navigation();

						// If comments are open or we have at least one comment, load up the comment template.
						/**
						 *if ( comments_open() || get_comments_number() ) :
						 *comments_template();
						 *endif;
						**/
					endwhile; // End of the loop.
				?>

		</article>

	</main><!-- #main -->
</div><!-- #primary -->

	<?php get_template_part( 'template-parts/simple-footer', '' ); ?>

<?php wp_footer(); ?>
