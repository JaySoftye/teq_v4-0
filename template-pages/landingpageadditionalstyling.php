<?php
/**
 * Template Name: Landing Page with Additional Styling
 * The template blank pages outside of Teq Branding
 * @package Teq_v4.0
 */

get_header();
?>

	<div id="primary" class="content-area white-background-fill">
		<main id="main" class="site-main section-container">
			<?php
				while ( have_posts() ) :
					the_post();
			?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php the_content(); ?>
			</div>
		<?php endwhile; // End of the loop. ?>
		</main><!-- #main -->
	</div><!-- #primary -->

	<footer class="site-footer">
		<div class="container">
			<div class="columns is-vcentered is-desktop">
				<div class="column is-6 is-offset-1 hide-mobile">
					<h4 class="strong">Teq Talk</h4>
					<?php if ( have_posts() ) :
        		$args = array(
          		'post_status' => 'publish',
							'category_name' => 'news, events',
          		'posts_per_page' => 2,
	        		'order'   => 'DESC',
          	);
        		$the_query = new WP_Query( $args );
          		while ($the_query -> have_posts()) :
								$the_query -> the_post();
					?>
					<article class="columns <?php foreach((get_the_category()) as $category) { echo $category -> slug; } ?>">
          	<div class="column is-3">
							<a href="<?php if(metadata_exists('post', $post->ID,'location')) { echo get_post_meta( $post->ID, 'location', true ); } else { the_permalink(); }; ?>">
            		<?php echo get_the_post_thumbnail( $page->ID, 'full' );?>
							</a>
          	</div>
						<div class="column">
            	<h5 class="nomargin"><a href="<?php if(metadata_exists('post', $post->ID,'location')) { echo get_post_meta( $post->ID, 'location', true ); } else { the_permalink(); }; ?>"><?php the_title(); ?></a></h5>
							<p>
								<a class="relative-position strong" href="<?php if(metadata_exists('post', $post->ID,'bannerHeaderURL')) { echo get_post_meta( $post->ID, 'bannerHeaderURL', true ); } else { the_permalink(); }; ?>">Read Article <span class="arrow"></span></a>
							</p>
          	</div>
					</article>

          <?php wp_reset_postdata(); endwhile; endif; ?>
				</div>
				<div class="column is-4 is-12-mobile">
					<h3 class="large-header strong">877.455.9369</h3>
					<p>7 Norden Lane | Huntington Station, NY 11746</p>
					<p class="opacity-one-third less-line-height"><small><sup>	&copy;</sup>2020 - Teq<sup>&reg;</sup>, It’s all about learning.<sup>&trade;</sup>, iBlocks<sup>&trade;</sup>, evoSpaces<sup>&trade;</sup>, pBlocks<sup>&trade;</sup>, Teq Essentials<sup>&reg;</sup>, nOw Instructional Support<sup>&reg;</sup>, OPD Online Professional Development<sup>&reg;</sup>, Onsite Professional Development<sup>&reg;</sup>, and Powered by Teq<sup>&reg;</sup> are trademarks or registered trademarks of Tequipment, Inc. in the US. Other company names and product names appearing here are the trademarks and registered trademarks of their respective companies.</small></p>
					</script>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->

	<?php wp_footer(); ?>

	</body>
	</html>
