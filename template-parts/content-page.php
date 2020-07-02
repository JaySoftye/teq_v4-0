<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Teq_v4.0
 */

?>

<section class="full-section">
	<div class="page-content columns is-desktop">
		<div class="column nopadding">
			<?php
				the_content();
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'teq_v4-0' ),
					'after'  => '</div>',
				) );
			?>
		</div>
	</div>
</section>
