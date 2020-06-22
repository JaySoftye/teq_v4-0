<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Teq_v4.0
 */

?>

<section class="full-section">
	<div class="page-content columns is-desktop">
		<div class="column">
			<div class="container">

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</header><!-- .entry-header -->

					<?php teq_v4_0_post_thumbnail(); ?>

					<div class="entry-content">
						<?php
							the_content();

							wp_link_pages( array(
								'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'teq_v4-0' ),
								'after'  => '</div>',
							) );
							?>
						</div><!-- .entry-content -->
					</article><!-- #post-<?php the_ID(); ?> -->

			</div>
		</div>
	</div>
</section>
