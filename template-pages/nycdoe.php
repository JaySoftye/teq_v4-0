<?php
/**
 * Template Name: New York City Department of Education
 * The template for displaying all products and services for the NYC Department of Education
 * @package Teq_v4.0
 */

get_header();
?>

	<div id="primary" class="content-area" scroll>
		<main id="main" class="site-main section-container">

			<section class="full-section nycdoe">
				<div class="container">
					<nav class="navbar padding-sm-top" role="navigation" aria-label="main navigation">
  					<div class="navbar-brand">
    					<a href>
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
					<div class="columns is-desktop padding-top">
  					<div class="column is-8 is-offset-2 padding">
							<h1 class="is-size-5 white-text has-text-centered">Welcome to Teq's Online Product Catalog for the</h1>
							<p class="white-text has-text-centered"><img class="full-width" src="/wp-content/uploads/2020/02/teq-nyc-department-of-ed-logo.svg" alt="NYC Department of Education" /></p>
						</div>
					</div>
					<div class="columns is-desktop">
  					<div class="column is-full nopadding showHideElement">
							<p class="sub-header has-text-centered padding-sm-top-bottom">
								<a class="blue-text strong didyouknow" href><u class="show-hide-element-trigger">Did you know?</u></a>
							</p>
							<div class="show-hide-element-content">
								<h2 class="white-text has-text-centered">OTIS for educators is approved by NYS to fulfill CTLE requirments. Start earning CTLE hours towards maintaining your State Teaching License with Otis today!</h2>
							</div>
							<p class="white-text has-text-centered"><img class="full-width" src="/wp-content/uploads/2020/02/diit-nycdoe-otis-ctle-approved.png" /></p>
						</div>
					</div>
				</div>
			</section>
			<section class="container-fluid padding-top element-on-top" style="background-color: rgb(64, 85, 117);">
				<div class="columns is-desktop is-multiline nopadding">
					<div class="column is-2 hide-mobile nopadding hide-mobile">
						<img class="full-width" src="/wp-content/uploads/2020/02/nyc-doe-free-otis-account-compare-image.jpg" />
					</div>
					<div class="column is-8 padding-bottom">
						<h3 class="has-text-centered white-text strong">Comparison Documents</h3>
						<nav class="columns is-vcentered">
  						<div class="column is-half">
								<a class="btn smart-blue" href="https://www.teq.com/wp-content/themes/BootstrapFour/_img/Notebook_vs_ClassFlow_ActivInspire-Datasheet-2018.pdf">Compare SMART Notebook to a Classflow or ActivInspire Subscription</a>
  						</div>
  						<div class="column is-half">
								<a class="btn smart-purple" href="https://www.teq.com/wp-content/themes/BootstrapFour/_img/teq_sls_unlimited_comparison.pdf">Compare a SMART Notebook Account to a SLS or Teq Essentials Subscription</a>
  					</div>
					</nav>
					</div>
					<div class="column is-2 nopadding hide-mobile">
						<img class="full-width" src="/wp-content/uploads/2020/02/nyc-doe-smart-notebook-compare-image.jpg" />
					</div>
				</div>
			</section>

			<section class="container padding">
				<div class="columns is-desktop">
					<div class="column is-full">
						<h1 class="has-text-centered">Welcome to <strong>Teq’s Online Product Catalog</strong> for the New York City Department of Education</h1>
						<!-- FORM TO FILTER FAMIS PRODUCT RESULTS -->
						<form action="#famis-products-container" method="GET" class="filterform">
					    <select name="topic" id="topic" class="formselect">
								<option value="" disabled selected>Filter your product list</option>
								<option value="all">All Products</option>
								<option value="educational-technology">Educational Technology</option>
								<option value="stem-technologies">STEM Technologies</option>
								<option value="professional-development">Professional Development</option>
							</select>
					    <input name="submit" type="submit" id="formview" value="VIEW">
					  </form>
					</div>
				</div>
				<div id="famis-products-container" class="columns is-desktop is-multiline post-card-container padding-top padding-bottom">
					<?php
						// On Filter Form Submit check for product with topic
						if(isset($_GET['topic']) AND $_GET['topic'] == "all") {
							// query all famis products if selected all products
							$args = array(
								'post_type' => 'product-and-service',
								'category_name' => 'famis-product',
								'posts_per_page' => -1,
								'orderby' => 'title',
								'order'   => 'ASC',
							);
						} elseif(isset($_GET['topic'])) {
					   	// the query for product topic
							$args = array(
								'post_type' => 'product-and-service',
								'category_name' => 'famis-product',
								'taxonomy' => 'topic',
								'posts_per_page' => -1,
								'orderby' => 'title',
								'order'   => 'ASC',
								'tax_query' => array(
									array (
										'taxonomy' => 'topics',
										'field' => 'slug',
										'terms' => array($_GET['topic'])
									)
								),
							);
						} else {
							// query all famis products
							$args = array(
								'post_type' => 'product-and-service',
								'category_name' => 'famis-product',
								'posts_per_page' => -1,
								'orderby' => 'title',
								'order'   => 'ASC',
							);
						}
					  $the_query = new WP_Query( $args );
					 	if ( $the_query->have_posts() ) :
							while ( $the_query->have_posts() ) :
								$the_query->the_post();
						?>
						<article class="column is-4 post-card">
							<div class="post-card-body">
								<a href="<?php the_permalink(); ?>?famis"><?php the_post_thumbnail( 'large') ?></a>
								<h4 class="padding-sm-left-right">
									<a class="block strong" href="<?php the_permalink(); ?>?famis"><?php the_title(); ?></a>
								</h4>
								<p class="has-text-centered padding-sm-bottom">
									<a class="inline-block relative-position btn rounded blue-button-background " href="<?php the_permalink(); ?>?famis">Discover more <span class="arrow light"></span></a>
								</p>
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
