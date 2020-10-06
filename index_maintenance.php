<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Teq_v4.0
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> ng-app="application" ng-controller="navCtrl">

	<header id="masthead" class="site-header" ng-controller="dropdownCtrl">
		<nav class="navbar" role="navigation" aria-label="main navigation">
  		   <div class="navbar-brand">
				<svg version="1.1" x="0px" y="0px" viewBox="0 0 85 60">
					<polygon points="28,10.3 8.6,9.5 9.4,13.4 15.4,12.7 14.9,44.4 17.3,45 20.7,12.5 27.2,12.2 	"/>
					<path d="M37.5,38.8c-0.3,0-0.6,0-0.8,0.1c-3.4,0.2-7.6-0.8-8.7-8.7l14.2-1c-0.1-1.3-0.2-2-0.4-3.1c-0.9-5.3-3.3-9.7-9.4-9.3 c-0.2,0-0.5,0-0.7,0.1c-5.9,0.9-8.1,7.2-6.9,14.4c1,5.8,4.6,12.2,13.2,11c2.1-0.3,4.1-0.9,5.2-1.6l-1.7-3.3 C40.5,38,39.3,38.6,37.5,38.8z M31.8,19.5c2.9-0.4,5.1,2.2,5.9,6.8l-9.5,1.1C27.7,23.9,28.5,20,31.8,19.5z"/>
					<path d="M62.6,21.5h-0.1c-1.1-2.8-3.1-4-5.2-4.3c-4.4-0.6-9.6,2.9-10.9,10.8C45.2,34.3,46,42,53,43c3,0.4,5.7-1.1,6.8-2.8H60 l-1.6,12.6l3-0.4l4.8-25.9l1.3-7.4l-4.9-2.2L62.6,21.5z M61.4,27.7l-0.7,6.1c-0.5,4.6-3.8,5.9-5.7,5.7c-4.9-0.7-5.2-7.3-4.5-11.5 c0.8-4.8,3.2-8.3,6.8-7.7C60.3,20.7,61.9,24,61.4,27.7z"/>
					<path d="M76.7,11.2c-0.2-0.4-0.5-0.6-0.8-0.8s-0.7-0.3-1.1-0.3s-0.8,0.1-1.1,0.3c-0.3,0.2-0.6,0.5-0.8,0.8 c-0.2,0.4-0.3,0.7-0.3,1.2c0,0.4,0.1,0.8,0.3,1.2c0.2,0.4,0.5,0.6,0.8,0.9c0.3,0.2,0.7,0.3,1.1,0.3s0.8-0.1,1.1-0.3 c0.3-0.2,0.6-0.5,0.8-0.9c0.2-0.4,0.3-0.7,0.3-1.2C77,12,76.9,11.6,76.7,11.2z M76.5,13.4c-0.2,0.3-0.4,0.6-0.7,0.8 c-0.3,0.2-0.6,0.3-1,0.3s-0.7-0.1-1-0.3s-0.5-0.4-0.7-0.8c-0.2-0.3-0.3-0.7-0.3-1c0-0.4,0.1-0.7,0.3-1c0.2-0.3,0.4-0.6,0.7-0.8 c0.3-0.2,0.6-0.3,1-0.3s0.7,0.1,1,0.3s0.5,0.4,0.7,0.8c0.2,0.3,0.3,0.7,0.3,1C76.7,12.8,76.6,13.1,76.5,13.4z"/>
					<path d="M75.7,13.1c0-0.2,0-0.3-0.1-0.4c-0.1-0.1-0.2-0.2-0.3-0.3c0.3-0.1,0.4-0.3,0.4-0.6s-0.1-0.5-0.2-0.6 c-0.2-0.1-0.4-0.2-0.7-0.2H74v2.6h0.3v-1.1h0.6c0.2,0,0.3,0,0.4,0.1s0.1,0.2,0.1,0.4c0,0.3,0,0.5,0,0.6h0.3l0,0c0,0,0-0.1,0-0.2 C75.7,13.4,75.7,13.3,75.7,13.1z M75.3,12.2c-0.1,0.1-0.2,0.1-0.4,0.1h-0.6v-1h0.5c0.2,0,0.4,0,0.5,0.1s0.1,0.2,0.1,0.4 S75.4,12.1,75.3,12.2z"/>
				</svg>
  		   </div>
		</nav>
	</header><!-- #masthead -->

	<div id="primary" class="content-area" scroll>

		<main id="main" class="site-main">

      <section class="section full first-full-section">
        <div id="index-container" class="container is-fluid">
					<div class="columns is-centered">
						<div class="column is-8">
							 <h1 class="sub-header white-text thin"><strong>We're sorry, </strong>Teq.com is currently down for scheduled <strong>updating and maintanence.</strong> We expect to be back up and running shortly. Thank you for your patience. Be sure to check back soon for our <u class="strong">new updated look!</u></h1>
							 <br />
							 <h4 class="white-text thin has-text-right"><em>- The Teq Web Team</em></h4>
							 <p class="white-text small-text has-text-right nomargin">info@teq.com | 877.455.9369</p>
						</div>
					</div>
        </div>
      </section>

		</main><!-- #main -->
	</div><!-- #primary -->

   <footer class="site-footer">
		<div class="site-info container fluid-width">
			<div class="columns is-multiline">
				<div class="column is-full">
					<p>
						<small>7 Norden Lane Huntington Station, NY 11746 (US)  |  877.455.9369 |  info@teq.com</small>
						<br />
						<span>
							<small><sup>	&copy;</sup>2020 - Teq<sup>&reg;</sup>, It’s all about learning.<sup>&trade;</sup>, iBlocks<sup>&trade;</sup>, evoSpaces<sup>&trade;</sup>, pBlocks<sup>&trade;</sup>, Teq Essentials<sup>&reg;</sup>, nOw Instructional Support<sup>&reg;</sup>, OPD Online Professional Development<sup>&reg;</sup>, Onsite Professional Development<sup>&reg;</sup>, and Powered by Teq<sup>&reg;</sup> are trademarks or registered trademarks of Tequipment, Inc. in the US. Other company names and product names appearing here are the trademarks and registered trademarks of their respective companies.</small>
						</span>
					</p>
				</div>
			</div>

		</div><!-- .site-info -->
	</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>

