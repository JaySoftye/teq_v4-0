<?php
/**
 * Template Name: CDW-G Professional Development Products
 * The template for displaying all PD Products of custom post type product and service for CDW-G
 * @package Teq_v4.0
 */

get_header();
?>

	<div id="primary" class="content-area" scroll>
		<main id="main" class="site-main section-container">

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
						<h5>Register your deal using the form below.</h5><br />
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
			<section class="section cdw-g-pd padding-top padding-bottom">
				<div class="container">
					<div class="columns is-vcentered">
						<div class="column is-6">
							<h1 class="condensed-text thin-heading less-line-height blue-text padding-right">LET US HELP YOU INTEGRATE THE BEST EDUCATIONAL TECHNOLOGY INTO CLASSROOM LEARNING </h1>
							<h5>Whether you’re rolling out devices school-wide, building out your STEM program, integrating a new piece of technology, or anything in between – sometimes you need a helping hand to get going. Professional development can build your skillset, boost your comfort with new technologies, and bolster technology initiatives. <strong>Below is a list of our Professional Development options available.</strong></h5>
						</div>
					</div>
				</div>
			</section>
			<section class="container padding">
				<div class="columns is-desktop">
					<div class="column is-full">
						<h1 class="has-text-centered"><strong>Professional Development</strong> that’s relevant for you.</h1>
					</div>
				</div>
				<div id="famis-products-container" class="columns is-desktop is-multiline post-card-container padding-top padding-bottom">
					<?php
						$args = array(
							'post_type' => 'product-and-service',
							'category_name' => 'CDW-G',
							'taxonomy' => 'topic',
							'posts_per_page' => -1,
							'orderby' => 'title',
							'order'   => 'ASC',
							'tax_query' => array(
								array (
									'taxonomy' => 'topics',
									'field' => 'slug',
									'terms' => 'Professional Development'
								)
							),
						);

					  $the_query = new WP_Query( $args );
					 	if ( $the_query->have_posts() ) :
							while ( $the_query->have_posts() ) :
								$the_query->the_post();
						?>
						<article class="column is-4 post-card">
							<div class="post-card-body">
								<a href="<?php the_permalink(); ?>?edc"><?php the_post_thumbnail( 'large') ?></a>
								<h5 class="has-text-centered padding-sm-bottom">
									<a class="inline-block relative-position btn" href="<?php the_permalink(); ?>?edc"><?php the_title(); ?> <span class="arrow light"></span></a>
								</h5>
							</div>
						</article>
						<?php endwhile; wp_reset_postdata(); endif; ?>
					</div>

				</div>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

	<footer class="site-footer">
		<div class="container">
			<div class="columns is-vcentered">
				<div class="column is-6 is-offset-1">
					<h4 class="strong">Teq Talk</h4>
					<?php if ( have_posts() ) :
        		$args = array(
          		'post_status' => 'publish',
							'category_name' => 'news, events',
          		'posts_per_page' => 2,
	        		'order'   => 'DESC',
          	);
        		$the_query = new WP_Query( $args );
          		while ($the_query -> have_posts()) :
								$the_query -> the_post();
					?>
					<article class="columns <?php foreach((get_the_category()) as $category) { echo $category -> slug; } ?>">
          	<div class="column is-3">
							<a href="<?php if(metadata_exists('post', $post->ID,'location')) { echo get_post_meta( $post->ID, 'location', true ); } else { the_permalink(); }; ?>">
            		<?php echo get_the_post_thumbnail( $page->ID, 'full' );?>
							</a>
          	</div>
						<div class="column">
            	<h5 class="nomargin"><a href="<?php if(metadata_exists('post', $post->ID,'location')) { echo get_post_meta( $post->ID, 'location', true ); } else { the_permalink(); }; ?>"><?php the_title(); ?></a></h5>
							<p>
								<a class="relative-position strong" href="<?php if(metadata_exists('post', $post->ID,'bannerHeaderURL')) { echo get_post_meta( $post->ID, 'bannerHeaderURL', true ); } else { the_permalink(); }; ?>">Read Article <span class="arrow"></span></a>
							</p>
          	</div>
					</article>

          <?php wp_reset_postdata(); endwhile; endif; ?>
				</div>
				<div class="column is-4">
					<h3 class="large-header strong">877.455.9369</h3>
					<p>7 Norden Lane | Huntington Station, NY 11746</p>
					<p class="opacity-one-third less-line-height"><small><sup>	&copy;</sup>2020 - Teq<sup>&reg;</sup>, It’s all about learning.<sup>&trade;</sup>, iBlocks<sup>&trade;</sup>, evoSpaces<sup>&trade;</sup>, pBlocks<sup>&trade;</sup>, Teq Essentials<sup>&reg;</sup>, nOw Instructional Support<sup>&reg;</sup>, OPD Online Professional Development<sup>&reg;</sup>, Onsite Professional Development<sup>&reg;</sup>, and Powered by Teq<sup>&reg;</sup> are trademarks or registered trademarks of Tequipment, Inc. in the US. Other company names and product names appearing here are the trademarks and registered trademarks of their respective companies.</small></p>
					</script>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->

	<?php wp_footer(); ?>

	</body>
	</html>
