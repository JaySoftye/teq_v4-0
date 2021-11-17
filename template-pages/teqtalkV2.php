<?php
/**
 * Template Name: Teq Talk Version 2
 * The template for displaying all news and event posts
 * @package Teq_v4.0
 */

get_header();
?>

<div id="primary" class="content-area" scroll>
	<main id="main" class="site-main section-container teq-talk">

		<nav id="subhead" class="navbar product-site-header">
			<div class="navbar-menu has-align-self-center">
				<div class="navbar-start">
					<a class="navbar-item search-button" ng-class="{ close: isSearchFormOpen }" ng-click="isSearchFormOpen = !isSearchFormOpen">SEARCH TEQ TALK</a>
				</div>
				<div class="navbar-center">Teq <strong>Talk</strong></div>
			  <div class="navbar-end hide-tablet">
					<?php echo file_get_contents(get_template_directory_uri() . '/inc/images/social.svg'); ?>
			  </div>
			</div>
			<div class="navbar-menu search-dropdown" ng-show="isSearchFormOpen">
				<div class="container">
					<form role="search" method="get" action="<?php echo home_url(); ?>">
						<div class="field">
							<div class="control">
								<input type="search" class="input search-field" placeholder="Search …" value="" name="s">
							</div>
							<button type="submit" class="hidden" value="Search"></button>
						</div>
						<small class="ml-3 mr-3">Popular search terms:
							<a href="/?s=smart"><b><u>SMART</u></b></a>,
							<a href="/?s=stem"><b><u>STEM</u></b></a>,
							<a href="/?s=google+classroom"><b><u>Google Classroom</u></b></a>,
							<a href="/?s=microsoft+office"><b><u>Microsoft Office</u></b></a>
						</small>
					</form>
					<div class="field is-grouped pt-3 ml-3 mr-3 hide-tablet">
						<div class="control">
							<h5 class="strong">Other popular articles that  might interest you:</h5>
						</div>
						<ul class="control">
							<?php
								$args = array(
									'category_name' => 'news',
									'post_status' => 'publish',
									'meta_key' => 'my_post_viewed',
							    'orderby' => 'meta_value_num',
							    'order'=> 'DESC',
									'posts_per_page' => 3
								);

								$the_query = new WP_Query( $args );
									if ( $the_query->have_posts() ) :
										while ( $the_query->have_posts() ) :
											$the_query->the_post();
							?>
								<li>
									<a href="<?php the_permalink(); ?>"><u><?php the_title(); ?></u></a>
								</li>
							<?php endwhile; endif; ?>
						</ul>
					</div>
				</div>
			</div>
		</nav>

		<section>
			<div class="page-content featured-post">
				<div class="container">

					<div class="columns">
						<?php
							$args = array(
								'category_name' => 'news',
								'post_status' => 'publish',
								'posts_per_page' => 1,
							);

							$the_query = new WP_Query( $args );
								if ( $the_query->have_posts() ) :
									while ( $the_query->have_posts() ) :
										$the_query->the_post();
											$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
						?>
						<div class="column">
							<a href="<?php the_permalink(); ?>" style="height:100%;display:block;background-image:url('<?php echo esc_url($featured_img_url) ?>');background-position:center top;background-size:cover;background-repeat:no-repeat;"></a>
						</div>
						<article class="column">
							<small class="condensed-text upper-case strong"><?php echo get_the_date( 'F d Y' ); ?></small>
							<h2 class="mt-0">
								<a class="strong" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h2>
							<?php the_excerpt(); ?>
							<br />
							<p class="ml-4">
								<a class="relative-position strong is-size-5" href="<?php the_permalink(); ?>">Read Article <span class="arrow"></span></a>
							</p>
						</article>
						<?php endwhile; endif; wp_reset_postdata(); ?>
					</div>

				</div>
			</div>
		</section>

		<section class="page-content posts-container">

			<section>
				<div class="container black-background rounded-corners">
					<div class="columns">
						<div class="column">
							<nav class="level p-2">
  							<div class="level-left">
    							<div class="level-item strong white-text is-size-3 ml-3">Most Recent Posts</div>
  							</div>
  							<div class="level-right">
    							<a href="/category/news/" class="level-item white-text mr-3"><b><u>View all posts</u></b></a>
  							</div>
							</nav>
						</div>
					</div>
				</div>
			</section>

			<section>
				<div class="container">
					<div class="columns is-vcentered is-desktop is-multiline post-card-container">
						<?php
							$args = array(
								'post_status' => 'publish',
								'category_name' => 'news',
								'posts_per_page' => 12,
								'order' => 'DESC',
								'offset' => 1
							);
							$the_query = new WP_Query($args);

							if ( $wp_query->have_posts() ) :
								while ($the_query -> have_posts()) :
									$the_query -> the_post();
									$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
									$blog_title = esc_html( get_the_title() );
						?>
						<article class="column is-4 post-card targetScrollContent has-fade-in">
							<div class="post-card-body featured-image-background">
								<a href="<?php if(metadata_exists('post', $post->ID,'bannerHeaderURL')) { echo get_post_meta( $post->ID, 'bannerHeaderURL', true ); } else { the_permalink(); }; ?>"></a>

								<?php
									if ( has_post_thumbnail() ) {
										echo '<img src="' . esc_url($featured_img_url) . '" alt="' . $blog_title . '" />';
									} else {
										echo '<img src="' . get_template_directory_uri() . '/inc/images/default-featured-image.jpg" alt="' . $blog_title . '" />';
									} ?>

									<div class="post-details">
										<h4>
											<a class="strong" href="<?php if(metadata_exists('post', $post->ID,'bannerHeaderURL')) { echo get_post_meta( $post->ID, 'bannerHeaderURL', true ); } else { the_permalink(); }; ?>"><?php the_title(); ?></a>
										</h4>
										<?php if(has_excerpt( $some_post_id )) { ?>
											<p class="medium"><?php echo get_the_excerpt(); ?> <a href="<?php if(metadata_exists('post', $post->ID,'bannerHeaderURL')) { echo get_post_meta( $post->ID, 'bannerHeaderURL', true ); } else { the_permalink(); }; ?>">[...]</a></p>
										<?php } ?>
										<div class="level">
											<div class="level-left">
												<p>
													<a class="relative-position strong" href="<?php if(metadata_exists('post', $post->ID,'bannerHeaderURL')) { echo get_post_meta( $post->ID, 'bannerHeaderURL', true ); } else { the_permalink(); }; ?>">Read Article <span class="arrow"></span></a>
												</p>
											</div>
											<div class="level-right">
												<p class="caption condensed-text upper-case"><?php echo get_the_date( 'M Y' ); ?></p>
											</div>
										</div>
									</div>
								</div>
							</article>
						<?php endwhile; wp_reset_postdata(); else : ?>
							<p><?php _e( 'Sorry, no news events posts at this time.', 'theme' ); ?></p>
						<?php endif;?>
						</div>
						<div class="columns is-vcentered is-desktop is-multiline post-card-container additional-posts-area"></div>
						<section class="has-text-centered loadmore">
							<button class="button larger rounded dark more">LOAD MORE POSTS</button>
							<a href="/category/news/" class="button larger rounded dark all" style="display:none;">VIEW ALL POSTS</a>
						</section>
					</div>
				</section>

			</section>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
