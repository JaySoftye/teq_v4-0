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
				<div class="horizontal-outer-wrapper">
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


						<div class="info-container">
							<div class="slide-content">
								<div class="columns is-vcentered is-centered">
									<div class="column is-2">
										<h1 class="has-text-right medium">Evolve.</h1>
									</div>
									<div class="column is-7">
										<h6 class="serif-text">Transitions in education make us think outside of the box and push past existing boundaries. But the sheer amount of options, the fast rate of change, and shifting guidelines, can be overwhelming. </h6>
										<h6 class="serif-text">In the midst of all the options available, Teq emerges with a single solution that speaks to teachers and administrators as much as it does the entire educational community.</h6>
									</div>
								</div>
							</div>
							<div class="svg-container">
								<?php echo file_get_contents(get_template_directory_uri() . '/inc/evolve/evolveSTART_text.svg'); ?>
								<?php echo file_get_contents(get_template_directory_uri() . '/inc/evolve/evolveSTART.svg'); ?>
							</div>
						</div>
						<div class="info-container hideContent">
							<div class="slide-content convex-background">
								<div class="columns is-vcentered is-centered">
									<div class="column is-2">
										<h1 class="has-text-right medium">Adapt.</h1>
									</div>
									<div class="column is-6">
										<h6 class="serif-text">While educators and education are quickly adapting to new teaching environments and learning models, support mechanisms are essential for getting from where you are, to where you need to be.</h6>
									</div>
								</div>
							</div>
							<div class="text-container adapt content-shown">
								<p>Teq provides that support for you, whether on the state, district, school, or individual level.</p>
								<ul>
									<li>Leverage <span class="strong">OTIS for educators,</span> our online professional development and instructional support platform. </li>
									<li>Engage with our <span class="strong">on-site, virtual, and blended professional development</span> to provide educators, administrators, and parents with coaching, mentoring, and PD to build capacity and confidence.</li>
								</ul>
								<p>Our professional development and instructional support are not only built to fit your individual needs, but to exceed your expectations. We provide the training that the entire community needs to succeed.</p>
								<img src="<?php echo get_template_directory_uri() . '/inc/evolve/evolve_OTIS-for-educators-logo.svg'; ?>" />
							</div>
							<div class="svg-container">
								<img class="displacementImageElement startAnimation adapt-image" src="<?php echo get_template_directory_uri() . '/inc/evolve/adapt_Teacher-image.png'; ?>" />
								<?php echo file_get_contents(get_template_directory_uri() . '/inc/evolve/adaptSTART_text.svg'); ?>
									<?php echo file_get_contents(get_template_directory_uri() . '/inc/evolve/adaptSTART1.svg'); ?>
										<?php echo file_get_contents(get_template_directory_uri() . '/inc/evolve/adaptSTART2.svg'); ?>
											<?php echo file_get_contents(get_template_directory_uri() . '/inc/evolve/adaptSTART3.svg'); ?>
												<?php echo file_get_contents(get_template_directory_uri() . '/inc/evolve/adaptSTART4.svg'); ?>
													<?php echo file_get_contents(get_template_directory_uri() . '/inc/evolve/adaptSTART5.svg'); ?>
								<?php echo file_get_contents(get_template_directory_uri() . '/inc/evolve/evolveLine.svg'); ?>
							</div>
						</div>
						<div class="info-container hideContent">
							<div class="slide-content description-text columns is-centered">
								<div class="column is-6 content-shown">Now that you have the PD and instructional support you need,<br />let’s take that new perspective into your learning environment.</div>
							</div>
							<div class="svg-container">
								<?php echo file_get_contents(get_template_directory_uri() . '/inc/evolve/evolveLine.svg'); ?>
							</div>
						</div>
						<div class="info-container">
							<div class="slide-content convex-background">
								<div class="columns is-vcentered is-centered">
									<div class="column is-2">
										<h1 class="has-text-right medium">Innovate.</h1>
									</div>
									<div class="column is-6">
										<h6 class="serif-text">If the learning environment and models change, then it’s likely the curriculum will have to adapt as well. While each new learning model has its own benefits, each also poses its own challenge. </h6>
									</div>
								</div>
							</div>
							<div class="text-container innovate content-shown">
								<p>How do we keep students on-pace and engaged with active learning when the manner in which they learn is suddenly turned upside-down?</p>
								<p>Our solutions provide flexible, do-anywhere project-based learning that are adaptable to your needs.</p>
								<ul>
									<li><span class="strong">iBlocks </span></li>
									<li><span class="strong">sBlocks  </span></li>
									<li><span class="strong">Teq-tivities </span></li>
								</ul>
								<p>Teq’s PBL activities provide practical, easy to implement activities that work on-pace with your existing curriculum. Our solutions enhance learning, substantiate comprehension, provide a means for self-assessment, and give students an arena in which to practice critical thinking and other essential skills.</p>
								<img src="<?php echo get_template_directory_uri() . '/inc/evolve/evolve_teq-blocks-logo.png'; ?>" />
							</div>
							<div class="svg-container">
								<img class="displacementImageElement startAnimation innovate-image" src="<?php echo get_template_directory_uri() . '/inc/evolve/innovate_Teacher-image.png'; ?>" />
								<?php echo file_get_contents(get_template_directory_uri() . '/inc/evolve/innovateSTART_text.svg'); ?>
									<?php echo file_get_contents(get_template_directory_uri() . '/inc/evolve/innovateSTART1.svg'); ?>
										<?php echo file_get_contents(get_template_directory_uri() . '/inc/evolve/innovateSTART2.svg'); ?>
											<?php echo file_get_contents(get_template_directory_uri() . '/inc/evolve/innovateSTART3.svg'); ?>
												<?php echo file_get_contents(get_template_directory_uri() . '/inc/evolve/innovateSTART4.svg'); ?>
													<?php echo file_get_contents(get_template_directory_uri() . '/inc/evolve/innovateSTART5.svg'); ?>
														<?php echo file_get_contents(get_template_directory_uri() . '/inc/evolve/innovateSTART6.svg'); ?>
								<?php echo file_get_contents(get_template_directory_uri() . '/inc/evolve/evolveLine.svg'); ?>
							</div>
						</div>
						<div class="info-container">
							<div class="slide-content description-text columns is-centered">
								<div class="column is-10 content-shown">After you’ve explored active and PBL solutions for every learning environment,<br />next you’ll need the tools and technology to make it happen.</div>
							</div>
							<div class="svg-container">
								<?php echo file_get_contents(get_template_directory_uri() . '/inc/evolve/evolveLine.svg'); ?>
							</div>
						</div>
						<div class="info-container">
							<div class="slide-content convex-background">
								<div class="columns is-vcentered is-centered">
									<div class="column is-2">
										<h1 class="has-text-right medium content-shown">Educate.</h1>
									</div>
									<div class="column is-6 content-shown">
										<h6 class="serif-text">In addition to layers of support and solutions for anywhere learning, Teq also offers the tools and technologies you need as you adapt to this new learning environment.  </h6>
									</div>
								</div>
							</div>
							<div class="text-container educate content-shown">
								<p>We believe that learning can stay just as vibrant and active in the face of new guidelines and restrictions, and we have the tools that can help.</p>
								<ul>
									<li><span class="strong">STEM Solutions</span> that travel with students and work just as dynamically in the classroom as they do at home.
									<li><span class="strong">Interactive flat panels and other classroom technologies</span> that make distance learning as engaging and effective as in-person instruction.
									<li><span class="strong">ClassVoice</span>, our audio app that ensures teachers and students can be heard during class time, making the most of in-person communication even in the face of limitations, like teaching with PPE. </li>
								</ul>
								<img src="<?php echo get_template_directory_uri() . '/inc/evolve/evolve_educate-logo.png'; ?>" />
							</div>
							<div class="svg-container">
								<img class="displacementImageElement startAnimation educate-image" src="<?php echo get_template_directory_uri() . '/inc/evolve/educate_Teacher-image.png'; ?>" />
								<?php echo file_get_contents(get_template_directory_uri() . '/inc/evolve/educateSTART_text.svg'); ?>
									<?php echo file_get_contents(get_template_directory_uri() . '/inc/evolve/educateSTART1.svg'); ?>
										<?php echo file_get_contents(get_template_directory_uri() . '/inc/evolve/educateSTART2.svg'); ?>
											<?php echo file_get_contents(get_template_directory_uri() . '/inc/evolve/educateSTART3.svg'); ?>
												<?php echo file_get_contents(get_template_directory_uri() . '/inc/evolve/educateSTART4.svg'); ?>
								<?php echo file_get_contents(get_template_directory_uri() . '/inc/evolve/evolveLine.svg'); ?>
							</div>
						</div>
						<div class="info-container">
							<div class="slide-content description-text columns is-centered">
								<div class="column is-8 content-shown">You now have everything you need to be your most effective as you face the<br />challenges ahead, and Teq is here to support you along the way.</div>
							</div>
							<div class="svg-container">
								<?php echo file_get_contents(get_template_directory_uri() . '/inc/evolve/evolveLine.svg'); ?>
							</div>
						</div>
						<div class="info-containe">
							<div class="slide-content">
								<div class="columns is-vcentered is-centered">
									<div class="column is-2 content-shown">
										<h1 class="has-text-right medium">Evolve with us.</h1>
									</div>
								</div>
							</div>
							<div class="svg-container">
								<?php echo file_get_contents(get_template_directory_uri() . '/inc/evolve/evolveLine.svg'); ?>
							</div>
						</div>


      		</div>
    		</div>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
