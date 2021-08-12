<?php
/**
 * Template part for displaying POST - in card format
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Teq_v4.0
 */

$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');

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
