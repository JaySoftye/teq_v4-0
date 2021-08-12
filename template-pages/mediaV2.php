<?php
/**
 * Template Name: Media Downloads Version 2
 * The template for displaying all media posts
 * @package Teq_v4.0
 */

get_header();
?>

<div id="primary" class="content-area" scroll>
	<main id="main" class="site-main section-container teq-talk media-download-nav">

		<nav id="subhead" class="navbar product-site-header background-transparent">
			<div class="navbar-menu has-align-self-center background-transparent">
				<div class="navbar-start hide-mobile">
					<a class="navbar-item search-button" ng-class="{ close: isSearchFormOpen }" ng-click="isSearchFormOpen = !isSearchFormOpen">DIDN'T FIND WHAT YOU NEED?</a>
				</div>
				<div class="navbar-center"><strong>Media</strong> Downloads</div>
			  <div class="navbar-end hide-tablet">
					<?php echo file_get_contents(get_template_directory_uri() . '/inc/images/social.svg'); ?>
			  </div>
			</div>
			<div class="navbar-menu" ng-show="isSearchFormOpen">
				<div class="product-demo-form container">
					<div class="columns">
						<div class="column">
							<!--[if lte IE 8]>
								<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
							<![endif]-->
							<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
							<script>
  							hbspt.forms.create({
									portalId: "182596",
									formId: "3f0b30e6-e31e-4390-a8ae-d94c51265716"
								});
							</script>
						</div>
					</div>
				</div>
			</div>
		</nav>

		<section class="media-download-header">
			<div class="container columns is-vcentered is-desktop">
				<div class="column is-7 teq-blog-search card">
					<h1 class="less-line-height"><strong>Explore our resource</strong> library and get on learning today.</h1>
					<h6>Search for lessons ideas, professional development learning, ebook resources, product guides, edtech tips and more!</h6>

					<form role="search" method="get" class="teq-blog-search search-form" action="<?php echo home_url(); ?>">
						<div class="field has-addons">
							<div class="control">
								<input type="search" class="input search-field" placeholder="Search STEM, Makerbot, Robotics, Project-based Learning..." value="" name="s">
							</div>
							<input type="hidden" name="post_type" value="post" />
							<input type="hidden" name="cat" id="cat" value="360" />
							<div class="control">
								<button type="submit" class="search-submit search-button" value="Search"></button>
							</div>
						</div>
					</form>

				</div>
			</div>
		</section>

		<div class="media-resources block padding-bottom">
			<section class="page-content padding-bottom container">

				<div class="columns is-desktop">
					<div class="column is-full padding-top">
						<h1 class="has-text-centered"><strong>Popular</strong> Downloads</h1>
					</div>
				</div>

				<div class="carousel is-3 carousel-animated carousel-animate-slide padding-bottom">
					<div class="carousel-navigation is-centered">
						<div class="carousel-nav-left nav-item">
							<svg version="1.1" viewBox="0 0 50 50">
								<path d="M41,50H9c-4.95,0-9-4.05-9-9V9c0-4.95,4.05-9,9-9h32c4.95,0,9,4.05,9,9v32C50,45.95,45.95,50,41,50z"/>
								<path fill="#FFFFFF" d="M35.436,26.84c0.019-0.023,0.035-0.047,0.052-0.07c0.025-0.033,0.05-0.066,0.074-0.1 c0.02-0.03,0.037-0.061,0.056-0.091c0.018-0.03,0.037-0.059,0.053-0.09c0.017-0.032,0.032-0.065,0.047-0.098 c0.015-0.031,0.03-0.062,0.044-0.094c0.013-0.032,0.024-0.065,0.036-0.097c0.012-0.034,0.025-0.068,0.036-0.103 c0.01-0.033,0.017-0.066,0.026-0.099c0.009-0.035,0.019-0.07,0.026-0.106c0.008-0.039,0.013-0.079,0.018-0.119 c0.004-0.03,0.01-0.06,0.013-0.09c0.014-0.143,0.014-0.286,0-0.429c-0.003-0.03-0.009-0.059-0.013-0.089 c-0.006-0.04-0.01-0.081-0.018-0.121c-0.007-0.035-0.017-0.069-0.025-0.104c-0.009-0.034-0.016-0.068-0.026-0.102 c-0.01-0.034-0.023-0.066-0.035-0.099c-0.012-0.034-0.023-0.068-0.037-0.101c-0.013-0.03-0.027-0.06-0.041-0.089 c-0.016-0.035-0.032-0.069-0.05-0.103c-0.015-0.028-0.032-0.055-0.048-0.082c-0.02-0.033-0.039-0.067-0.061-0.1 c-0.02-0.029-0.041-0.057-0.062-0.085c-0.021-0.029-0.041-0.058-0.064-0.086c-0.037-0.045-0.076-0.087-0.117-0.129 c-0.009-0.01-0.017-0.02-0.026-0.029l-7.066-7.065c-0.847-0.847-2.222-0.847-3.069,0c-0.848,0.848-0.848,2.222,0,3.069l3.361,3.361 H16.514c-1.199,0-2.17,0.972-2.17,2.17c0,1.199,0.972,2.17,2.17,2.17h12.005l-3.361,3.361c-0.848,0.847-0.848,2.221,0,3.069 c0.424,0.424,0.979,0.635,1.534,0.635c0.555,0,1.111-0.212,1.534-0.636l7.064-7.064C35.341,26.95,35.39,26.896,35.436,26.84z"/>
							</svg>
						</div>
						<div class="carousel-nav-right nav-item">
							<svg version="1.1" viewBox="0 0 50 50">
								<path d="M41,50H9c-4.95,0-9-4.05-9-9V9c0-4.95,4.05-9,9-9h32c4.95,0,9,4.05,9,9v32C50,45.95,45.95,50,41,50z"/>
								<path fill="#FFFFFF" d="M35.436,26.84c0.019-0.023,0.035-0.047,0.052-0.07c0.025-0.033,0.05-0.066,0.074-0.1 c0.02-0.03,0.037-0.061,0.056-0.091c0.018-0.03,0.037-0.059,0.053-0.09c0.017-0.032,0.032-0.065,0.047-0.098 c0.015-0.031,0.03-0.062,0.044-0.094c0.013-0.032,0.024-0.065,0.036-0.097c0.012-0.034,0.025-0.068,0.036-0.103 c0.01-0.033,0.017-0.066,0.026-0.099c0.009-0.035,0.019-0.07,0.026-0.106c0.008-0.039,0.013-0.079,0.018-0.119 c0.004-0.03,0.01-0.06,0.013-0.09c0.014-0.143,0.014-0.286,0-0.429c-0.003-0.03-0.009-0.059-0.013-0.089 c-0.006-0.04-0.01-0.081-0.018-0.121c-0.007-0.035-0.017-0.069-0.025-0.104c-0.009-0.034-0.016-0.068-0.026-0.102 c-0.01-0.034-0.023-0.066-0.035-0.099c-0.012-0.034-0.023-0.068-0.037-0.101c-0.013-0.03-0.027-0.06-0.041-0.089 c-0.016-0.035-0.032-0.069-0.05-0.103c-0.015-0.028-0.032-0.055-0.048-0.082c-0.02-0.033-0.039-0.067-0.061-0.1 c-0.02-0.029-0.041-0.057-0.062-0.085c-0.021-0.029-0.041-0.058-0.064-0.086c-0.037-0.045-0.076-0.087-0.117-0.129 c-0.009-0.01-0.017-0.02-0.026-0.029l-7.066-7.065c-0.847-0.847-2.222-0.847-3.069,0c-0.848,0.848-0.848,2.222,0,3.069l3.361,3.361 H16.514c-1.199,0-2.17,0.972-2.17,2.17c0,1.199,0.972,2.17,2.17,2.17h12.005l-3.361,3.361c-0.848,0.847-0.848,2.221,0,3.069 c0.424,0.424,0.979,0.635,1.534,0.635c0.555,0,1.111-0.212,1.534-0.636l7.064-7.064C35.341,26.95,35.39,26.896,35.436,26.84z"/>
							</svg>
						</div>
					</div>
  				<div class="post-card-container carousel-container mt-5">
						<?php
							$args = array(
								'post_status' => 'publish',
								'category_name' => 'resources',
								'posts_per_page' => 6,
								'order' => 'DESC',
							);
							$the_query = new WP_Query($args);

							if ( $wp_query->have_posts() ) :
								while ($the_query -> have_posts()) :
									$the_query -> the_post();
									$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
									$blog_title = esc_html( get_the_title() );
						?>
						<article class="post-card carousel-item is-active">
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
													<a class="relative-position strong" href="<?php if(metadata_exists('post', $post->ID,'bannerHeaderURL')) { echo get_post_meta( $post->ID, 'bannerHeaderURL', true ); } else { the_permalink(); }; ?>">Download Resource <span class="arrow"></span></a>
												</p>
											</div>
											<div class="level-right">
												<p class="caption condensed-text upper-case"><?php echo get_the_date( 'M Y' ); ?></p>
											</div>
										</div>
									</div>
								</div>
							</article>
						<?php endwhile; else : ?>
							<p><?php _e( 'Sorry, an error has occured. Please refresh the page.', 'theme' ); ?></p>
						<?php endif; wp_reset_postdata();?>
					</div>
  			</div>
				<div class="columns padding-top">
					<div class="column black-background rounded-corners">
						<nav class="level p-2">
							<div class="level-left">
								<div class="level-item strong white-text is-size-4 ml-3">View Recent
									<div class="media-select">
  									<select id="resourceFilter">
											<option value="resource-item">Resource</option>
    									<option value="case-studies">Case Study</option>
											<option value="catalogs">Catalog</option>
											<option value="data-sheets">Datasheet</option>
											<option value="ebooks">Ebook</option>
											<option value="lesson-plans">Lesson Plan</option>
  									</select>
									</div>
									Media Entries.
								</div>
							</div>
							<div class="level-right">
								<a href="/category/resources/" class="level-item white-text mr-3"><b><u>View all posts</u></b></a>
							</div>
						</nav>
					</div>
				</div>

				<div class="content-container media-resource-content">
					<?php
						$args = array(
							'post_status' => 'publish',
							'category_name' => 'resources',
							'posts_per_page' => 24,
							'order' => 'DESC',
							'offset' => 6
						);
						$the_query = new WP_Query($args);

						if ( $wp_query->have_posts() ) :
							while ($the_query -> have_posts()) :
								$the_query -> the_post();

								$post_id = get_the_ID(); // or use the post id if you already have it
								$categories = get_the_category($post_id);
								$category_names = '';
								if ( ! empty( $categories ) ) {
  								foreach ( $categories as $cat ) {
    								$category_names .= $cat->slug . ' ';
  								}
								}
					?>
					<article class="resource-item <?php echo $category_names; ?>">
					<div class="columns is-vcentered">
						<div class="column is-1">
							<?php if ( has_post_thumbnail() ) { ?>
								<a class="block less-line-height" href="<?php the_permalink(); ?>">
									<img width="42" height="42" src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'thumbnail' ); ?>" />
								</a>
							<?php } ?>
						</div>
						<div class="column">
							<a class="block less-line-height" href="<?php the_permalink(); ?>"><?php the_title(); ?><span class="arrow"></span></a>
						</div>
						<div class="column is-2">
							<p class="condensed-text upper-case caption has-text-right"><?php echo get_the_date( 'M d, Y' ); ?></p>
						</div>
					</div>
					</article>
					<?php endwhile; else : ?>
					<div class="columns is-vcentered margin-left margin-right border-bottom">
						<div class="column">
							<p><?php _e( 'Sorry, no resources have been found at this time.', 'theme' ); ?></p>
						</div>
					</div>
					<?php endif; ?>
					<div class="columns is-vcentered margin-left margin-right border-bottom no-products-found" style="display:none;">
						<div class="column">
							<p><?php _e( 'Sorry, no resources have been found at this time.', 'theme' ); ?></p>
						</div>
					</div>
				</div>


			</section>
		</div>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
