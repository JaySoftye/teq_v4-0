<?php
/**
 * Template Name: Upcoming Events
 * The template for displaying all Event Posts
 * @package Teq_v4.0
 */

get_header();
?>

	<div id="primary" class="content-area" scroll>
		<main id="main" class="site-main section-container">

			<section class="full-section upcoming-events block padding-bottom">

				<div class="page-content">
					<div class="container">
						<div class="columns is-vcentered is-desktop">
							<div class="column is-9">
								<h1 class="page-titles">Upcoming Teq Events</h1>
								<h5>Here at Teq we strive to continually educate ourselves and others on the latest improvements in education. Below you can find a list of upcoming Events, Webinars, Professional Development Sessions, etc. Please feel free to engage with the Teq team here or through any one of our social channels. We look forward to your feedback and invite you to be part of our learning community.</h5>
								<h6><a class="button white-fill drop-shadow" href="/edtech-in-focus/">Host an EdTech Day <span class="arrow"></span></a> <a class="margin-left button blue-fill drop-shadow" href="/request-teq-squad">Request Teq Squad <span class="arrow light"></span></a> </h6>
							</div>
						</div>
					</div>
				</div>

				<div class="page-content padding-bottom">
					<div class="container">
						<div class="columns is-vcentered is-desktop is-multiline post-card-container">

							<?php
	          		$args = array(
									'post_status' => 'publish',
	            		'category_name' => 'events',
	            		'order' => 'DESC',
									'posts_per_page' => 10,
	            		'date_query' => array(
	            			'after' => date('Y-m-d', strtotime('-6 months'))
	              	)
	            	);

	          		$the_query = new WP_Query($args);
									while ($the_query -> have_posts()) : $the_query -> the_post();

							 		if ( has_post_thumbnail() ) {
										$thumb_id = get_post_thumbnail_id();
								  	$thumb_url = wp_get_attachment_image_src($thumb_id,'full', true);
									} else {
  									$thumb_url[0] = get_template_directory_uri() . '/inc/images/default-featured-image.jpg';
									}
	        			?>
	        		<article class="column is-4 post-card">
	          		<div class="post-card-body featured-image-background" style="background-image: url('<?php echo $thumb_url[0]; ?>');">
	            		<div class="post-details">
	              		<h4>
											<a class="strong" href="<?php if(metadata_exists('post', $post->ID,'bannerHeaderURL')) { echo get_post_meta( $post->ID, 'bannerHeaderURL', true ); } else { the_permalink(); }; ?>"><?php the_title(); ?></a>
										</h4>
										<?php if(has_excerpt( $some_post_id )) { ?>
	              			<p class="medium"><?php echo get_the_excerpt(); ?> <a href="<?php if(metadata_exists('post', $post->ID,'bannerHeaderURL')) { echo get_post_meta( $post->ID, 'bannerHeaderURL', true ); } else { the_permalink(); }; ?>">[...]</a></p>
										<?php } ?>
										<div class="level padding-top">
  										<div class="level-left">
      									<p>
        									<a class="relative-position strong" href="<?php if(metadata_exists('post', $post->ID,'bannerHeaderURL')) { echo get_post_meta( $post->ID, 'bannerHeaderURL', true ); } else { the_permalink(); }; ?>">Read Article <span class="arrow"></span></a>
      									</p>
  										</div>
  										<div class="level-right">
    										<p class="caption condensed-text upper-case"><?php echo get_the_date( 'F d Y' ); ?></p>
  										</div>
										</div>
	            		</div>
	          		</div>
	        		</article>
	        		<?php endwhile; wp_reset_postdata(); ?>

						</div>
					</div>

				</div>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
