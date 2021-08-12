<?php
/**
 * Template Name: Evolve
 * The template for displaying Evolve Section
 * @package Teq_v4.0
 */

get_header();
?>

	<div id="primary" class="content-area" scroll>
		<main id="main" class="site-main section-container">


			<section class="full-section horizontal-scroll-container">
				<div class="horizontal-outer-wrapper" id="container">
      		<div class="horizontal-content">


						<svg id="imageDisplacementMap" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
							<defs xmlns="http://www.w3.org/2000/svg">
								<filter id="displacementMap" x="0%" y="0%" height="100%" width="100%">
									<feTurbulence type="turbulence" baseFrequency="0.05" numOctaves="2" result="turbulence"></feTurbulence>
									<feDisplacementMap in2="turbulence" in="SourceGraphic" xChannelSelector="B" yChannelSelector="G">
										<animate id="displace" attributeName="scale" values="100;0;" dur="1s" repeatCount="1" restart="always"></animate>
									</feDisplacementMap>
								</filter>
							</defs>
						</svg>


						<div class="info-container" id="evolve">
							<div class="slide-content">
								<h1 class="slide-title" >Evolve</h1>
								<div class="columns is-vcentered is-centered is-multiline">
									<div class="column is-6-desktop is-full-tablet">
										<h1 class="mobile-content">Evolve</h1>
										<h5 class="serif-text padding-left">The face of education is rapidly changing, and Teq can help you evolve to meet these challenges. Technology integration is at the center of what we do, and our approach is about helping you find the right resources, get the right support, and then pull it all together into a complete thought. </h5>
									</div>
								</div>
							</div>
							<div class="svg-container">
								<?php echo file_get_contents(get_template_directory_uri() . '/inc/evolve/evolveSTART.svg'); ?>
							</div>
						</div>


						<div class="info-container" id="prepare">
							<div class="slide-content">
								<h1 class="slide-title">Prepare</h1>
							</div>
							<div class="svg-container">
								<div class="text-container prepare">
									<h1 class="mobile-content">Prepare</h1>
									<h5>Planning for success requires solid preparation. That means making decisions with your new learning environment in mind, championing innovation when it comes to instructional methods, and being sure to prioritize skills development and technical proficiency.</h5>
								</div>
								<img src="<?php echo get_template_directory_uri() . '/inc/evolve/svg-container-image_prepare.png'; ?>" />
								<img class="cone" src="<?php echo get_template_directory_uri() . '/inc/evolve/prepareconeSTART.png'; ?>" />
								<img class="prepare-image-one" src="<?php echo get_template_directory_uri() . '/inc/evolve/svg-container-image_prepare1.png'; ?>" />
								<?php echo file_get_contents(get_template_directory_uri() . '/inc/evolve/evolveLine.svg'); ?>
							</div>
						</div>


						<div class="info-container" id="adapt">
							<div class="slide-content">
								<h1 class="slide-title">Adapt &<br />Innovate</h1>
							</div>
							<div class="svg-container">
								<div class="text-container adapt">
									<h1 class="mobile-content">Adapt and Innovate</h1>
									<h5>In times of challenge, being able to adapt and innovate is key. We have to examine and adjust our processes and find new resources that speak to our needs. We have to adopt alternative solutions, re-imagine assessment models, and maybe even invent our own learning model to respond to new challenges.  </h5>
								</div>
								<img class="cone" src="<?php echo get_template_directory_uri() . '/inc/evolve/adaptconeSTART.png'; ?>" />
								<img src="<?php echo get_template_directory_uri() . '/inc/evolve/svg-container-image_adapt.png'; ?>" />
								<img class="adapt-image-one" src="<?php echo get_template_directory_uri() . '/inc/evolve/svg-container-image_adapt2.png'; ?>" />
								<img class="adapt-image-two" src="<?php echo get_template_directory_uri() . '/inc/evolve/svg-container-image_adapt1.png'; ?>" />
								<?php echo file_get_contents(get_template_directory_uri() . '/inc/evolve/evolveLine.svg'); ?>
							</div>
						</div>


						<div class="info-container" id="educate">
							<div class="slide-content">
								<h1 class="slide-title">Educate</h1>
							</div>
							<div class="svg-container">
								<div class="text-container educate">
									<h1 class="mobile-content">Educate</h1>
									<h5>The common denominator of your planning and innovation is to educate. Finding the appropriate tools to engage students can be just as important as the methodology you choose. Our goal should always be to leverage technology in a way that serves students and enables us to deliver content, facilitate learning, and open up a world of discovery. </h5>
								</div>
								<img class="cone" src="<?php echo get_template_directory_uri() . '/inc/evolve/educateconeSTART.png'; ?>" />
								<img src="<?php echo get_template_directory_uri() . '/inc/evolve/svg-container-image_educate.png'; ?>" />
								<img class="educate-image-one" src="<?php echo get_template_directory_uri() . '/inc/evolve/svg-container-image_educate2.png'; ?>" />
								<img class="educate-image-two" src="<?php echo get_template_directory_uri() . '/inc/evolve/svg-container-image_educate1.png'; ?>" />
								<?php echo file_get_contents(get_template_directory_uri() . '/inc/evolve/evolveLine.svg'); ?>
							</div>
						</div>


						<div class="info-container end" id="ending">
							<div class="slide-content">
								<h1 class="slide-title desktop-content">Evolve with us</h1>
								<div class="columns is-vcentered is-centered is-multiline">
									<div class="column is-6-desktop is-full-tablet">
										<h1 class="mobile-content white-text">Evolve with us</h1>
										<h5 class="serif-text white-text">The face of education is rapidly changing, and Teq can help you evolve to meet these challenges. Technology integration is at the center of what we do, and our approach is about helping you find the right resources, get the right support, and then pull it all together into a complete thought. </h5>
									</div>
								</div>
								<div class="slide-container one">
									<h6 class="serif-text white-text">Browse the create section to discover what’s in your future.</h6>
									<p>
										<a class="pill blue serif-text" href="/create">Create</a>
									</p>
								</div>
								<div class="slide-container two">
									<p>
										<a class="pill yellow serif-text" href="https://otis.teq.com/">Sign Up</a>
									</p>
									<h6 class="serif-text white-text">Free sign up for a basic OTIS account.</h6>
								</div>
								<div class="slide-container three">
									<h6 class="serif-text white-text">Become a member of the growing community of educators that rely on Teq for guidance in preparing for remote and hybrid learning environments, and technology integration.</h6>
								</div>
							</div>
							<div class="svg-container desktop-content">
								<?php echo file_get_contents(get_template_directory_uri() . '/inc/evolve/evolveLineEnd.svg'); ?>
							</div>
						</div>

      		</div>
    		</div>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
