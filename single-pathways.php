<?php
/**
 * The template for displaying all PATHWAYS custom post types
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Teq_v4.0
 */

 get_header();
 ?>

 	<div id="primary" class="content-area">
 		<main id="main" class="site-main section-container">

 		<?php
	 		while ( have_posts() ) :
 				the_post();

					$pd_course_content = get_post_meta( get_the_ID(), 'custom_pd_meta_html', true );
					$product_content = get_post_meta( get_the_ID(), 'custom_product_meta_html', true );
		?>

				<article id="post-<?php the_ID(); ?>" class="container content-container padding-bottom">

					<div class="columns is-desktop is-centered">
						<div class="column is-10">
							<?php if ( is_singular() ) :
								the_title( '<h1 class="page-titles strong">', '</h1>' );
							else :
								the_title( '<h2 class="page-titles strong"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
							endif; ?>

							<?php if ( metadata_exists('post', $post->ID, 'hero_image' )) { ?>
								<img class="full-width" src="<?php echo get_post_meta( $post->ID, 'hero_image', true ); ?>" />
							<?php } ?>
						</div>
					</div>

					<div class="columns is-desktop is-centered">
						<div class="column is-10 entry-content">
							<?php
							the_content( sprintf(
								wp_kses(
									/* translators: %s: Name of current post. Only visible to screen readers */
									__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'teq_v4-0' ),
									array(
										'span' => array(
											'class' => array(),
										),
									)
								),
								get_the_title()
							) );
							?>
						</div>
					</div>
					<div class="columns is-desktop is-centered">
						<div class="column is-10">
							<div class="solution-set-details expandable-content">
								<?php echo html_entity_decode($product_content); ?>
							</div>
						</div>
					</div>
					<div class="columns is-desktop is-centered">
						<div class="column is-10">
							<div class="solution-set-details expandable-content columns">
								<?php echo html_entity_decode($pd_course_content); ?>
							</div>
						</div>
					</div>
				</article>


			<?php endwhile; ?>

 		</main><!-- #main -->
 	</div><!-- #primary -->

 <?php
