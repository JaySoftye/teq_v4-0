<?php
/**
 * The template for displaying the footer
 *v
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Teq_v4.0
 */

?>

	<footer class="site-footer">
		<div class="site-info container fluid-width">
			<div class="columns">
				<div class="column">
					<h2 class="condensed-text"> It's all about learning.</h2>
					<?php wp_nav_menu(array(
	          'menu'       => 'Main Menu', // specify the menu name
	          'menu_class' => '',
	          'container'  => 'false',
						'echo'			 => 'false',
	          'items_wrap' => '<ul class="footer-menu" role="menu" >%3$s</ul>',
	        ));?>
					<svg version="1.1" viewBox="0 0 396 100">
						<a href="https://www.facebook.com/myTeq/">
						<path d="M20.08,30.301c-9.627,0-17.433,7.806-17.433,17.433c0,9.629,7.806,17.433,17.433,17.433
							c9.628,0,17.433-7.803,17.433-17.433C37.512,38.107,29.708,30.301,20.08,30.301z M23.814,47.74h-2.443c0,3.903,0,8.71,0,8.71h-3.62
							c0,0,0-4.758,0-8.71H16.03v-3.077h1.721v-1.992c0-1.426,0.677-3.654,3.653-3.654l2.681,0.011v2.988c0,0-1.63,0-1.946,0
							c-0.317,0-0.768,0.158-0.768,0.839v1.809h2.76L23.814,47.74z"/>
						</a>
						<a href="https://twitter.com/OTIS4educators">
						<path d="M72.165,30.301c-9.627,0-17.433,7.806-17.433,17.433c0,9.629,7.806,17.433,17.433,17.433s17.433-7.803,17.433-17.433
							C89.598,38.107,81.793,30.301,72.165,30.301z M79.098,44.18c0.007,0.153,0.011,0.307,0.011,0.462
							c0,4.726-3.597,10.176-10.176,10.176c-2.02,0-3.899-0.592-5.483-1.607c0.281,0.032,0.565,0.049,0.854,0.049
							c1.677,0,3.218-0.57,4.441-1.53c-1.564-0.03-2.886-1.064-3.34-2.483c0.218,0.04,0.442,0.064,0.672,0.064
							c0.326,0,0.643-0.045,0.942-0.125c-1.634-0.33-2.868-1.775-2.868-3.507c0-0.015,0-0.03,0-0.045c0.483,0.268,1.034,0.428,1.62,0.447
							c-0.96-0.64-1.591-1.736-1.591-2.977c0-0.655,0.177-1.27,0.484-1.798c1.763,2.164,4.4,3.588,7.371,3.737
							c-0.06-0.262-0.093-0.534-0.093-0.815c0-1.975,1.601-3.575,3.577-3.575c1.028,0,1.958,0.434,2.61,1.128
							c0.814-0.159,1.58-0.457,2.271-0.868c-0.268,0.836-0.834,1.536-1.572,1.979c0.723-0.085,1.413-0.278,2.053-0.562
							C80.403,43.046,79.797,43.676,79.098,44.18z"/>
						</a>
						<a href="https://www.linkedin.com/company/teq/">
						<path d="M125.295,46.453v-0.036c-0.006,0.012-0.016,0.026-0.024,0.036H125.295z"/>
						<path d="M124.251,30.301c-9.628,0-17.433,7.806-17.433,17.433c0,9.629,7.804,17.433,17.433,17.433
							c9.627,0,17.433-7.803,17.433-17.433C141.684,38.107,133.878,30.301,124.251,30.301z M119.493,56.066h-3.738v-11.24h3.738V56.066z
							 M117.623,43.289h-0.024c-1.253,0-2.064-0.864-2.064-1.943c0-1.102,0.836-1.943,2.113-1.943c1.279,0,2.067,0.84,2.09,1.943
							C119.737,42.425,118.926,43.289,117.623,43.289z M132.967,56.066h-3.737v-6.014c0-1.511-0.541-2.543-1.894-2.543
							c-1.031,0-1.647,0.698-1.917,1.368c-0.099,0.24-0.123,0.573-0.123,0.911v6.277h-3.736c0,0,0.048-10.187,0-11.24h3.736v1.592
							c0.498-0.768,1.386-1.856,3.369-1.856c2.458,0,4.303,1.605,4.303,5.058L132.967,56.066L132.967,56.066z"/>
						</a>
						<a href="https://www.youtube.com/channel/UCD_OKAjPLDEJbkgq3IYXdlg">
						<path d="M176.185,45.078c0.135,0,0.242-0.036,0.32-0.111c0.08-0.075,0.12-0.179,0.12-0.308v-2.647c0-0.107-0.04-0.191-0.121-0.257
							c-0.081-0.066-0.188-0.098-0.319-0.098c-0.12,0-0.219,0.032-0.296,0.098c-0.074,0.066-0.113,0.151-0.113,0.257v2.647
							c0,0.134,0.036,0.236,0.107,0.308C175.953,45.045,176.054,45.078,176.185,45.078z"/>
						<path d="M178.376,49.969c-0.137,0-0.272,0.034-0.407,0.104c-0.132,0.07-0.259,0.174-0.378,0.307v-1.926H176.7v5.982h0.892v-0.338
							c0.115,0.136,0.242,0.234,0.378,0.298c0.134,0.066,0.287,0.096,0.46,0.096c0.26,0,0.462-0.081,0.599-0.249
							c0.14-0.168,0.207-0.406,0.207-0.717v-2.449c0-0.362-0.072-0.636-0.221-0.825C178.869,50.062,178.657,49.969,178.376,49.969z
							 M178.328,53.401c0,0.143-0.026,0.242-0.075,0.304c-0.051,0.064-0.13,0.096-0.239,0.096c-0.074,0-0.145-0.017-0.213-0.049
							c-0.068-0.03-0.138-0.085-0.21-0.155v-2.749c0.06-0.062,0.12-0.107,0.182-0.136c0.062-0.027,0.125-0.042,0.188-0.042
							c0.118,0,0.211,0.039,0.275,0.115c0.063,0.077,0.093,0.189,0.093,0.341L178.328,53.401L178.328,53.401z"/>
						<polygon points="170.08,49.324 171.108,49.324 171.108,54.435 172.102,54.435 172.102,49.324 173.131,49.324 173.131,48.454
							170.08,48.454 	"/>
						<path d="M175.155,53.374c-0.083,0.096-0.173,0.174-0.273,0.239c-0.099,0.062-0.182,0.092-0.246,0.092
							c-0.082,0-0.143-0.021-0.181-0.07c-0.035-0.047-0.054-0.121-0.054-0.226v-3.385h-0.882v3.69c0,0.264,0.052,0.457,0.154,0.589
							c0.104,0.134,0.257,0.198,0.462,0.198c0.165,0,0.336-0.045,0.512-0.14c0.176-0.093,0.346-0.23,0.508-0.409v0.485h0.882v-4.413
							h-0.882L175.155,53.374L175.155,53.374z"/>
						<path d="M176.339,30.301c-9.627,0-17.433,7.806-17.433,17.433c0,9.629,7.806,17.433,17.433,17.433
							c9.628,0,17.433-7.803,17.433-17.433C193.771,38.107,185.967,30.301,176.339,30.301z M178.442,40.937h0.992v3.726
							c0,0.115,0.024,0.198,0.064,0.249c0.04,0.053,0.11,0.078,0.202,0.078c0.072,0,0.166-0.034,0.278-0.102
							c0.11-0.07,0.213-0.155,0.305-0.262v-3.69h0.994v4.86h-0.994v-0.538c-0.182,0.198-0.373,0.351-0.571,0.454
							c-0.198,0.102-0.389,0.158-0.576,0.158c-0.231,0-0.402-0.074-0.519-0.221c-0.116-0.143-0.174-0.359-0.174-0.649L178.442,40.937
							L178.442,40.937z M174.755,42.048c0-0.377,0.134-0.677,0.4-0.898c0.267-0.224,0.628-0.334,1.079-0.334
							c0.411,0,0.747,0.117,1.011,0.351c0.26,0.234,0.391,0.541,0.391,0.909v2.511c0,0.417-0.128,0.741-0.384,0.979
							c-0.259,0.236-0.613,0.355-1.064,0.355c-0.434,0-0.782-0.123-1.043-0.368c-0.26-0.245-0.391-0.573-0.391-0.985L174.755,42.048
							L174.755,42.048z M172.05,39.209l0.726,2.635h0.07l0.693-2.635h1.135l-1.301,3.856v2.733h-1.117v-2.611l-1.331-3.977H172.05z
							 M185.056,53.076c0,1.758-1.427,3.185-3.185,3.185h-11.065c-1.759,0-3.184-1.428-3.184-3.185v-2.56
							c0-1.758,1.425-3.185,3.184-3.185h11.065c1.758,0,3.185,1.428,3.185,3.185V53.076z"/>
						<path d="M181.038,49.913c-0.395,0-0.715,0.119-0.965,0.359c-0.25,0.24-0.374,0.556-0.374,0.936v1.981c0,0.426,0.115,0.759,0.341,1
							c0.227,0.245,0.538,0.364,0.933,0.364c0.439,0,0.771-0.113,0.989-0.341c0.224-0.23,0.333-0.57,0.333-1.024v-0.226h-0.908v0.2
							c0,0.26-0.031,0.428-0.087,0.505c-0.059,0.077-0.161,0.115-0.307,0.115c-0.14,0-0.24-0.045-0.299-0.134
							c-0.057-0.092-0.086-0.253-0.086-0.485v-0.83h1.688v-1.126c0-0.419-0.108-0.738-0.326-0.962
							C181.754,50.024,181.443,49.913,181.038,49.913z M181.388,51.648h-0.78v-0.445c0-0.185,0.03-0.319,0.092-0.396
							c0.062-0.083,0.162-0.123,0.302-0.123c0.134,0,0.234,0.04,0.293,0.123c0.06,0.077,0.093,0.211,0.093,0.396L181.388,51.648
							L181.388,51.648z"/>
						</a>
						<a href="https://www.instagram.com/edteq/">
						<path d="M233.302,40.444c-2.379-0.003-4.758-0.002-7.137,0.001c-0.569,0.001-1.143-0.025-1.705,0.038
							c-1.561,0.174-2.68,1.442-2.681,3.002c-0.004,2.835-0.005,5.67,0.001,8.505c0.003,1.691,1.351,3.033,3.045,3.035
							c2.822,0.004,5.644,0.004,8.465,0c1.731-0.002,3.063-1.338,3.068-3.07c0.004-1.405,0.001-2.81,0.001-4.215
							c0-1.411,0.002-2.822-0.001-4.233C236.353,41.79,235.015,40.446,233.302,40.444z M228.981,51.995
							c-2.245-0.032-4.165-1.951-4.167-4.238c-0.001-2.372,1.887-4.271,4.253-4.277c2.285-0.02,4.188,1.867,4.255,4.125
							C233.395,50.039,231.362,52.029,228.981,51.995z M233.896,44.088c-0.649-0.003-1.189-0.563-1.184-1.227
							c0.005-0.676,0.558-1.21,1.247-1.203c0.653,0.007,1.187,0.561,1.182,1.227C235.137,43.564,234.59,44.091,233.896,44.088z"/>
						<path d="M229.084,44.696c-1.673-0.008-3.051,1.361-3.055,3.031c-0.003,1.667,1.358,3.038,3.021,3.045
							c1.672,0.007,3.051-1.361,3.055-3.031C232.108,46.076,230.748,44.704,229.084,44.696z"/>
						<path d="M228.419,30.301c-9.627,0-17.433,7.806-17.433,17.433c0,9.629,7.806,17.433,17.433,17.433
							c9.628,0,17.433-7.803,17.433-17.433C245.852,38.107,238.048,30.301,228.419,30.301z M237.571,47.742
							c0,1.455,0.005,2.911-0.001,4.366c-0.009,1.92-1.521,3.736-3.418,4.041c-0.644,0.103-1.31,0.085-1.966,0.088
							c-2.467,0.009-4.935,0-7.402,0.004c-1.986,0.003-3.785-1.466-4.134-3.426c-0.09-0.505-0.083-1.032-0.084-1.549
							c-0.007-2.607-0.004-5.214-0.002-7.821c0.002-2.009,1.469-3.791,3.447-4.131c0.574-0.098,1.171-0.082,1.757-0.083
							c2.505-0.008,5.011-0.001,7.516-0.004c2.105-0.002,3.897,1.491,4.23,3.565c0.071,0.439,0.052,0.895,0.055,1.343
							c0.007,1.202,0.002,2.405,0.002,3.607C237.571,47.742,237.571,47.742,237.571,47.742z"/>
						</a>
					</svg>
				</div>
				<div class="column">
					<h2 class="condensed-text">Teq Talk.</h2>

						<?php
							$args = array(
								'category_name' => 'news',
								'post_status' => 'publish',
								'order' => 'DESC',
								'posts_per_page' => 2,
								'date_query' => array(
									'after' => date('Y-m-d', strtotime('-6 months'))
								)
							);

							$the_query = new WP_Query( $args );
								if ( $the_query->have_posts() ) :
									while ( $the_query->have_posts() ) :
										$the_query->the_post();
						?>
						<div class="columns is-vcentered is-mobile">
						<figure class="column is-2 nopadding">
							<?php if ( has_post_thumbnail() ) {  the_post_thumbnail( 'full', array( 'class'  => 'drop-shadow' ) ); } ?>
						</figure>
						<article class="column">
							<a class="strong" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							<br />
							<small class="condensed-text upper-case"><?php echo get_the_date( 'F d Y' ); ?></small>
						</article>
						</div>
						<?php endwhile; endif; wp_reset_postdata(); ?>

				</div>
				<div class="column">
					<h2 class="condensed-text"> And stay connected.</h2>
					<!--[if lte IE 8]>
		      <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
		      <![endif]-->
		      <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
		      <script>
		        hbspt.forms.create({
		          portalId: '182596',
		          formId: 'ec8c46db-58d6-4267-9f39-6f3fc85bfc2f',
							submitButtonClass: '',
        			css: ' ',
		        });
		      </script>
				</div>
			</div>

			<div class="columns is-multiline">
				<figure class="column is-8">
					<img src="<?php echo get_template_directory_uri() . '/inc/images/Teq-Inc_Brands.svg'; ?>" />
	  			<p class="caption">Teq, OTIS for educators, Onsite Professional Development, iBlocks for project-based learning, STEM</p>
				</figure>
				<div class="column is-full border-top">
					<p>
						<small class="condensed-text">7 Norden Lane Huntington Station, NY 11746 (US)  |  877.455.9369 |  info@teq.com |  <a href="/teq-privacy-policy/"><u>Privacy Policy</u></a></small>
						<br />
						<span>
							<small><sup>	&copy;</sup>2020 - Teq<sup>&reg;</sup>, It’s all about learning.<sup>&trade;</sup>, iBlocks<sup>&trade;</sup>, evoSpaces<sup>&trade;</sup>, pBlocks<sup>&trade;</sup>, Teq Essentials<sup>&reg;</sup>, OTIS for educators<sup>&reg;</sup> (formerly OPD, Online Professional Development), Onsite Professional Development<sup>&reg;</sup>, and Powered by Teq<sup>&reg;</sup> are trademarks or registered trademarks of Tequipment, Inc. in the US. Other company names and product names appearing here are the trademarks and registered trademarks of their respective companies.</small>
						</span>
					</p>
				</div>
			</div>

		</div><!-- .site-info -->
	</footer><!-- #colophon -->

	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-67374790-2', 'auto');
	  ga('send', 'pageview');

	  /**
	* Function that tracks a click on an outbound link in Analytics.
	* This function takes a valid URL string as an argument, and uses that URL string
	* as the event label. Setting the transport method to 'beacon' lets the hit be sent
	* using 'navigator.sendBeacon' in browser that support it.
	*/
	  var trackOutboundLink = function(url) {
	   ga('send', 'event', 'outbound', 'click', url, {
	     'transport': 'beacon',
	     'hitCallback': function(){document.location = url;}
	   });
	  }
	</script>

	<!-- Start of HubSpot Embed Code
		<script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/182596.js"></script>
	End of HubSpot Embed Code -->

<?php wp_footer(); ?>

</body>
</html>
