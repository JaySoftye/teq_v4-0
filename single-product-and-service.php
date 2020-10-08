<?php
/**
 * The template for displaying all Product and Service custom post type
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Teq_v4.0
 */

get_header();

	// IF NOT EDC CDW PRODUCT OR FAMIS PRODUCT GET THE NAVIGATION HEADER FILE
	if(!isset($_GET['famis']) && !isset($_GET['edc']))  {
		include 'navigation.php';
	}
?>

<div id="primary" class="content-area" scroll>
	<main id="main" class="site-main section-container">

		<?php
			// CHECK IF THIS IS AN CDW EDC OR FAMIS PRODUCT
			// SHOW THE CDW-G Header
			if(isset($_GET['edc'])) {
		?>
		<nav class="navbar padding-sm-left-right" role="navigation" aria-label="main navigation">
			<div class="navbar-brand">
				<a href="/cdw-g-products/">
					<img src="/wp-content/uploads/2020/02/teq-tagline-logo.svg" width="270"  alt="Teq CDW-G" />
				</a>
			</div>
			<div id="navbarBasicExample" class="navbar-menu nomargin">
				<div class="navbar-start"></div>
				<div class="navbar-end">
					<a class="navbar-item" href="/cdw-g-products/cdw-g-stem-products">STEM Products</a>
					<a class="navbar-item" href="/cdw-g-products/cdw-g-professional-development">Professional Development</a>
					<a class="navbar-item strong" href ng-model="collapsed" ng-click="collapsed=!collapsed">Register Your Deal</a>
				</div>
			</div>
		</nav>
		<div id="hbspot-register-form" class="container" ng-show="collapsed">
			<div class="columns">
				<div class="column">
					<h5>Register you deal using the form below.</h5><br />
				</div>
				<div class="column has-text-right">
					<button class="button is-danger is-light is-rounded" ng-model="collapsed" ng-click="collapsed=!collapsed"><small>X</small></button>
				</div>
			</div>
			<div class="columns">
				<div class="column">
					<!--[if lte IE 8]>
					<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
					<![endif]-->
					<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
					<script>
						hbspt.forms.create({
							portalId: "182596",
							formId: "239ef9d7-666a-4a6c-83f9-ec34e5e37a42"
						});
					</script>
				</div>
			</div>
		</div>
		<?php
			// CHECK IF THIS IS AN CDW EDC OR FAMIS  PRODUCT
			// SHOW THE NYC Department of Education Header
			} elseif(isset($_GET['famis'])) {
		?>
		<div class="container">
			<nav class="navbar padding-sm-top" role="navigation" aria-label="main navigation">
				<div class="navbar-brand">
					<a href="/nycdoe/">
						<img src="/wp-content/uploads/2020/02/teq-cdw-g-contract-no-B220901.svg" width="270"  alt="Teq CDW-G" />
					</a>
				</div>
				<div id="navbarBasicExample" class="navbar-menu">
					<div class="navbar-start"></div>
					<div class="navbar-end">
						<h6 class="navbar-item blue-text strong">NYC Product Catalog | 877.455.9369</h6>
					</div>
				</div>
			</nav>
		</div>
		<?php } ?>

		<section class="full-section padding-bottom">


				<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/product-content', get_post_type() );

						// the_post_navigation();

						// If comments are open or we have at least one comment, load up the comment template.
						/**
						 *if ( comments_open() || get_comments_number() ) :
						 *comments_template();
						 *endif;
						**/
					endwhile; // End of the loop.
				?>


		</section>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
