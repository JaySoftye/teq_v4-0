<?php
/**
 * The template for displaying all Product and Service custom post type
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Teq_v4.0
 */

get_header();
?>

<div id="primary" class="content-area" scroll>
	<main id="main" class="site-main section-container">
		<section class="full-section container padding-bottom">
			<div class="page-content columns is-multiline padding-bottom">

    		<div class="column is-full">
					<h1 class="white"><strong><?php the_title();?></strong></h1>
      		<h5><strong><?php echo get_post_meta( $post->ID, 'firstName', true );?> <?php echo get_post_meta( $post->ID, 'lastName', true ); ?></strong>, <?php echo get_post_meta( $post->ID, 'titleRole', true ); ?></h5>
					<p><?php echo get_post_meta( $post->ID, 'contactPhone', true ); ?> | <?php echo get_post_meta( $post->ID, 'contactEmail', true ); ?></p>
					<p><?php echo get_post_meta( $post->ID, 'surveyConcerns', true ); ?> | <?php echo get_post_meta( $post->ID, 'surveyConcerns', true ); ?></p>
					<hr />
    		</div>

				<?php the_content(); ?>

				<div class="column is-full">
					<hr />
					<p>Network-Enabled Device Management</p>
	        <p class="white">7 Norden Lane<br />Huntington Station, NY 11746<br />877.455.9369<br /><a href="https://www.teq.com" class="white">Teq.com</a> | <a href="https://otis.teq.com/" class="white">OtisPD.teq.com</a></p>
				</div>

			</div>
		</section>
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
