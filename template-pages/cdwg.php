<?php
/**
 * Template Name: CDW-G
 * The template for displaying the landing page for CDW-G custom post type product and service for CDW-G
 * @package Teq_v4.0
 */

get_header();
?>

<?php get_template_part( 'template-parts/cdw-g-header', '' ); ?>

<section class="hero cdw-g-products is-fullheight">
  <div class="hero-body">
    <div class="container">
			<h1 class="headline-title less-line-height white-text">Technology has the power to<br /> change the way students learn.</h1>
			<div class="columns direct-navigation">
				<a class="column strong" href="/cdw-g-products/cdw-g-stem-products">STEM Technology</a>
				<a class="column strong" href="/cdw-g-products/cdw-g-professional-development">Professional Development</a>
				<a class="column strong" href="/product-and-service/iblocks/?edc">Project-Based Learning Activities</a>
				<a class="column half" href="https://otis.teq.com/webinars"><strong>Schedule a custom webinar on OTIS for educators</strong><br /><span class="white-text">We'll present online, a deep dive on the product of your choosing, and answer all yourquestions.</span></a>
			</div>
    </div>
  </div>
</section>

	<?php get_template_part( 'template-parts/simple-footer', '' ); ?>

<?php wp_footer(); ?>

	</body>
</html>
