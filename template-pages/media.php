<?php
/**
 * Template Name: Media
 * The template for displaying all media posts
 * @package Teq_v4.0
 */

get_header();
?>

<div id="primary" class="content-area" scroll>
	<main id="main" class="site-main section-container">

		<section class="full-section media-resources block padding-bottom">
			<div id="blue-wave-cover"></div>

			<div class="page-content">
				<div class="container">
					<div class="columns is-vcentered is-desktop">
						<div class="column is-6 is-offset-3">
							<h1 class="page-titles has-text-centered">Media</h1>
						</div>
					</div>
					<div class="columns is-vcentered is-desktop">
						<div class="column is-6 is-offset-3 teq-blog-search">

							<form role="search" method="get" class="teq-blog-search search-form" action="<?php echo home_url(); ?>">
								<div class="field has-addons">
									<div class="control">
										<input type="search" class="input search-field" placeholder="Search …" value="" name="s">
									</div>
									<input type="hidden" name="post_type" value="post" />
									<div class="control">
										<button type="submit" class="search-submit search-button" value="Search"></button>
									</div>
								</div>
							</form>

						</div>
					</div>
				</div>
			</div>

			<div class="page-content padding-bottom">
				<div class="container">
					<div class="columns is-vcentered is-desktop is-multiline post-card-container">

						<?php
							//get the current page
							$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

							//pagination fixes prior to loop
							$temp =  $query;
							$query = null;

							$args = array(
								'post_status' => 'publish',
								'order' => 'DESC'
							);
							$the_query = new WP_Query($args);

							//set our query's parameters and then set pagination to $paged
 							$the_query -> query('post_type=post&posts_per_page=20&category_name=resources'.'&paged='.$paged);

							if ( $wp_query->have_posts() ) :
								while ($the_query -> have_posts()) :
									$the_query -> the_post();

							$thumb_id = get_post_thumbnail_id();
							$thumb_url = wp_get_attachment_image_src($thumb_id,'full', true);
						?>
						<article class="column is-3 post-card">
							<div class="post-card-body">
								<div class="post-details">
									<h4>
										<a class="strong" href="<?php if(metadata_exists('post', $post->ID,'bannerHeaderURL')) { echo get_post_meta( $post->ID, 'bannerHeaderURL', true ); } else { the_permalink(); }; ?>"><?php the_title(); ?></a>
									</h4>
									<?php if(has_excerpt( $some_post_id )) { ?>
										<p class="medium"><?php echo get_the_excerpt(); ?> <a href="<?php if(metadata_exists('post', $post->ID,'bannerHeaderURL')) { echo get_post_meta( $post->ID, 'bannerHeaderURL', true ); } else { the_permalink(); }; ?>">[...]</a></p>
									<?php } ?>
									<br />
									<p class="small">
										<?php
											$posttags = get_the_tags();
											if ($posttags) {
											  foreach($posttags as $tag) {
										?>
											<span class="tag is-black">
												<?php echo $tag->name . ' ';?>
											</span>
										<?php } ?>
									<?php } ?>
									</p>
									<div class="level padding-top">
										<div class="level-left">
											<p>
												<a class="relative-position strong" href="<?php if(metadata_exists('post', $post->ID,'bannerHeaderURL')) { echo get_post_meta( $post->ID, 'bannerHeaderURL', true ); } else { the_permalink(); }; ?>">Read Article <span class="arrow"></span></a>
											</p>
										</div>
									</div>
								</div>
							</div>
						</article>
						<?php endwhile; ?>
						<div class="column page-nav">
							<div class="previous"><?php previous_posts_link('', $the_query->max_num_pages) ?></div>
							<div class="next"><?php next_posts_link('', $the_query->max_num_pages) ?></div>
  					</div>
						<?php wp_reset_postdata(); else : ?>
        			<p>
								<?php _e( 'Sorry, no news events posts at this time.', 'theme' ); ?>
							</p>
						<?php endif;
							//reset the following that was set above prior to loop
							$query = null;
							$query = $temp;
						?>
					</div>
				</div>

			</div>
		</section>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
