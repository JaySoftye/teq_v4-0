<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Teq_v4.0
 */

?>

<article id="post-<?php the_ID(); ?>" class="column is-8">
	<div class="card">
		<div class="post-details padding-sm">
			<h3>
				<a class="strong" href="<?php if(metadata_exists('post', $post->ID,'bannerHeaderURL')) { echo get_post_meta( $post->ID, 'bannerHeaderURL', true ); } else { the_permalink(); }; ?>"><?php the_title(); ?></a>
			</h3>
			<?php if(has_excerpt( $some_post_id )) { ?>
				<p class="medium"><?php echo get_the_excerpt(); ?></p>
			<?php } ?>
			<div class="level">
				<div class="level-left">
					<p>
						<a class="relative-position strong" href="<?php if(metadata_exists('post', $post->ID,'bannerHeaderURL')) { echo get_post_meta( $post->ID, 'bannerHeaderURL', true ); } else { the_permalink(); }; ?>">
							<?php
								if (has_category(array('resources', 'ebooks', 'data-sheets', 'catalogs', 'lesson-plans', 'case-studies'))) {
									echo 'Download Resource';
								} else if (get_post_type() === 'page') {
	    						echo 'View the Page';
								} else if (get_post_type() === 'post') {
									echo 'Read Article';
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
