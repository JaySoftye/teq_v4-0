<?php
/**
 * Template part for displaying post content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Teq_v4.0
 */

?>

<article id="post-<?php the_ID(); ?>" class="container content-container padding-bottom blog-content">

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
		<div class="column is-3 padding-right">
			<?php
				$full_name = get_the_author_meta('first_name') . ' ' . get_the_author_meta('last_name');
				$authorname = get_the_author_meta('nickname');
				$aside_info = get_post_meta( get_the_ID(), 'aside_content', true );
			?>
			<h6><strong><?php echo $full_name; ?></strong><br /><?php echo $authorname; ?></h6>
			<div>
				<?php echo html_entity_decode($aside_info); ?>
			</div>
			<h6 class="caption">
				<?php
					$categories = get_the_category();
					if ( ! empty( $categories ) ) {
    				echo esc_html( $categories[0]->name );
					}
				?>
				on
				<?php echo get_the_date( 'F d Y' ); ?>
			</h6>
			<br />
			<?php if ( in_category('registered-event') ) { ?>
				<section class="register-form">
					<h4 class="strong">Interested in this event? Register using the form below:</h4>
					<!--[if lte IE 8]>
					<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
					<![endif]-->
					<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
					<script>
						hbspt.forms.create({
							portalId: "182596",
							formId: "22436275-3a7a-4670-bdab-188d25e49b55",
							submitButtonClass: '',
    					inlineMessage: 'Thanks for your interest.',
    						onFormSubmit: function($form){

									// GRAB THE PAGE TITLE AND SET EVENT INPUT FIELD AS TITLE
									var title = $(document).find("title").text();
									var titleURL = title.toLowerCase().replace(/–|teq| /g, "-").replace(/----/g, "-");
									$('input[name="event"]').val(title)

									// SET REDIRECT WITH FORM DATA IN URL
        					setTimeout( function() {
            				var formData = $form.serialize();
            				window.location = "/upcoming-events/"+titleURL+"registrated?" + formData;
        					}, 250 ); // Redirects to url with query string data from form fields after 250 milliseconds.
    						}
						});
					</script>
				</section>
			<?php } ?>

		</div>
		<div class="column is-7 entry-content">
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

</article>

<section class="recent-posts-container padding-top">
	<div class="container">
		<div class="columns">
			<div class="column is-11 is-offset-1 border-bottom">
				<h4>Related Articles</h4>
			</div>
		</div>
		<div class="columns is-desktop padding-top padding-bottom">

			<?php
   		// recent post query
				$the_query = new WP_Query( array(
     			'category_name' => 'news',
      		'posts_per_page' => 3,
   			));
			?>

			<?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

				<div class="column is-3 is-offset-1 card padding-sm">
					<p>
						<a class="strong" href="<?php if(metadata_exists('post', $post->ID,'bannerHeaderURL')) { echo get_post_meta( $post->ID, 'bannerHeaderURL', true ); } else { the_permalink(); }; ?>">
						<?php echo get_the_post_thumbnail( $page->ID, 'medium' ); ?></a>
					</p>
					<h6>
						<a class="strong" href="<?php if(metadata_exists('post', $post->ID,'bannerHeaderURL')) { echo get_post_meta( $post->ID, 'bannerHeaderURL', true ); } else { the_permalink(); }; ?>"><?php the_title(); ?></a>
					</h6>
					<p class="relative-position"><span class="arrow"></span></p>
				</div>
  			<?php endwhile; ?>
  		<?php wp_reset_postdata(); endif; ?>

		</div>
	</div>
</section>
