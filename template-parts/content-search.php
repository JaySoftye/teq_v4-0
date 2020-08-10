<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Teq_v4.0
 */

?>

<article id="post-<?php the_ID(); ?>" class="column is-4 post-card">
	<div class="post-card-body">
		<div class="post-details">
			<h4>
				<a class="strong" href="<?php if(metadata_exists('post', $post->ID,'bannerHeaderURL')) { echo get_post_meta( $post->ID, 'bannerHeaderURL', true ); } else { the_permalink(); }; ?>"><?php the_title(); ?></a>
			</h4>
			<?php if(has_excerpt( $some_post_id )) { ?>
				<p class="medium"><?php echo get_the_excerpt(); ?> <a href="<?php if(metadata_exists('post', $post->ID,'bannerHeaderURL')) { echo get_post_meta( $post->ID, 'bannerHeaderURL', true ); } else { the_permalink(); }; ?>" rel="bookmark">[...]</a></p>
			<?php } ?>
			<div class="level padding-top">
				<div class="level-left">
					<p>
						<a class="relative-position strong" href="<?php if(metadata_exists('post', $post->ID,'bannerHeaderURL')) { echo get_post_meta( $post->ID, 'bannerHeaderURL', true ); } else { the_permalink(); }; ?>">
							<?php
								if (get_post_type() === 'post') {
									echo 'Read Article';
								} else if (get_post_type() === 'page') {
	    						echo 'View the Page';
								}
							?>
							<span class="arrow"></span>
						</a>
					</p>
				</div>
				<div class="level-right">
					<p class="caption condensed-text upper-case"><?php echo get_the_date( 'M Y' ); ?></p>
				</div>
			</div>
		</div>
	</div>
</article>
<?php wp_reset_postdata(); ?>
