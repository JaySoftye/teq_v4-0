<?php
/**
 * Template part for displaying custom post type product and service content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Teq_v4.0
 */

?>

<article id="post-<?php the_ID(); ?>" class="container content-container padding-bottom">

	<div class="columns is-desktop">
		<div class="column is-10 is-offset-1">
			<?php if ( is_singular() ) :
				the_title( '<h1 class="page-titles strong">', '</h1>' );
			else :
				the_title( '<h2 class="page-titles strong"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif; ?>

			<?php if ( metadata_exists('post', $post->ID, 'hero_image' )) { ?>
				<img class="full-width" src="<?php echo get_post_meta( $post->ID, 'hero_image', true ); ?>" />
			<?php }
				// CHECK IF THIS IS AN CDW EDC OR FAMIS PRODUCT
				// DISPLAY BACK BUTTON LINK BASED ON TYPE OF PRODUCT
				if(isset($_GET['edc'])) { ?>
				<a class="button no-shadow rounded small-text" href="/cdw-g-products/cdw-g-stem-products">Back to Products</a>
			<?php } elseif(isset($_GET['famis'])) { ?>
				<a class="button no-shadow rounded small-text" href="/nycdoe/#famis-products-container">Back to Products</a>
			<?php } ?>
			<button class="button no-shadow rounded caption" g-model="hidden" ng-click="hidden=!hidden">Need a Quote?</button>
			<a class="button no-shadow rounded caption" href="javascript:window.print()" data-tooltip="Tooltip Text">PRINT</a>

			<div class="columns" ng-show="hidden">
				<div class="column hbspot-form_quote">
					<?php
					// CHECK IF THIS IS AN CDW EDC OR FAMIS PRODUCT
					// DISPLAY QUOTE FORM BASED UPON CDW OR FAMIS
					if(isset($_GET['edc'])) { ?>
						<!--[if lte IE 8]>
						<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
						<![endif]-->
						<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
						<script>
  						hbspt.forms.create({
								portalId: "182596",
								formId: "d90fa090-8474-4069-90b2-909d2b9e42d7"
							});
						</script>
					<?php } elseif(isset($_GET['famis'])) { ?>
						<!--[if lte IE 8]>
						<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
						<![endif]-->
						<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
						<script>
							hbspt.forms.create({
								portalId: "182596",
								formId: "42b188a8-165d-4be0-af27-ce6016a04a8a"
							});
						</script>
					<?php } ?>
					<hr />
				</div>
			</div>

			<?php
			// CHECK IF THIS IS AN CDW EDC OR FAMIS PRODUCT
				if(isset($_GET['edc'])) {
					$custom_image = get_post_meta( get_the_ID(), 'custom_image_meta_content', true );
					if ( !empty( $custom_image) ) {
			?>
				<a class="block padding-sm-top" href="/product-and-service/otis-for-educators/?edc">
					<img src="<?php echo html_entity_decode($custom_image); ?>" />
				</a>
				<?php } ?>
			<?php } ?>
		</div>
	</div>

	<div class="columns is-desktop">
		<div class="column is-3 is-offset-1 topic-tags">
			<br />
			<p>
				<?php
					$terms = get_the_terms( $post->ID , array( 'topics') );
					// init counter to list all taxonomies for the post
					$i = 1;
					foreach ( $terms as $term ) {
 						$term_link = get_term_link( $term, array( 'topics') );
 							if( is_wp_error( $term_link ) )
 							continue;
 								echo $term->name;
 								//  Add space (except after the last theme)
 								echo ($i < count($terms))? " / " : "";
 								// Increment counter
 								$i++;
					}
				?>
			</p>
			<br />
			<p>
				<?php
					$additional_info = get_post_meta( get_the_ID(), 'additional_info_meta_content', true );
					if ( !empty( $additional_info) ) {
						echo html_entity_decode($additional_info);
					}
				?>
			</p>
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
			<?php
				// CHECK IF THIS IS AN CDW EDC OR FAMIS  PRODUCT
				// SHOW THE EDC META INFO
				if(isset($_GET['edc'])) {
			?>
			<div class="padding-top padding-bottom">
				<h6><img src="<?php echo get_template_directory_uri() . '/inc/images/CDW-G-otis-post-image.jpg'; ?>" alt="OTIS for educators" /></h6>
				<h4 class="condensed-text thin-heading strong">Bundle with up to 3 Otis for educators licenses!</h4>
				<p>With Otis (formerly known as Opd), educators have access to PD that will boost their technology skills, and provide them with new ways to engage students and improve instruction. Otis PD helps teachers fulfill state-mandated PD hours while learning valuable skills on dozens of technology topics. Administrators can align PD with instructional goals and create personalized PD plans for their staff.</p>
				<p>
					<a class="inline-block relative-position button dark" href="/product-and-service/otis-for-educators/?edc">Read more <span class="arrow light"></span></a>
				</p>
			</div>
			<?php
					$edc_info = get_post_meta( get_the_ID(), 'edc_meta_content', true );
					echo html_entity_decode($edc_info);
				// SHOW THE FAMIS META INFO
				} elseif(isset($_GET['famis'])) {
					$famis_info = get_post_meta( get_the_ID(), 'famis_meta_content', true );
					echo html_entity_decode($famis_info);
				}
			?>
		</div>
	</div>

</article>
