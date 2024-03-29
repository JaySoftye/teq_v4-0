<?php
/**
 * Template Name: About Teq
 * The template for displaying the about us page
 * @package Teq_v4.0
 */

get_header();
?>

	<div id="primary" class="content-area white-background-fill" ng-app="productTabs">
		<main id="main" class="site-main section-container" ng-controller="TabController">
			<?php
				while ( have_posts() ) :
					the_post();
			?>

			<nav id="subhead" class="navbar product-site-header">
				<div class="navbar-menu">
					<div class="navbar-start">
						<figure ng-class="{ active: isSet(1) }" ng-click="setTab(1)">
							<img class="large-brand-logo" src="/wp-content/uploads/2020/02/about-us-teq-teq-blocks-otis-for-educators_logo.png" alt="Teq Teq Blocks OTIS for educators" />
						</figure>
					</div>
					<div class="navbar-end mobile-dropdown-trigger">
						<a class="navbar-item" href>Product Options</a>
					</div>
					<div class="navbar-end mobile-dropdown">
						<a class="navbar-item" ng-class="{ active: isSet(1) }" href ng-click="setTab(1)">Our Mission</a>
						<a class="navbar-item" ng-class="{ active: isSet(2) }" href ng-click="setTab(2)">Our Culture & Leadership</a>
						<a class="navbar-item" ng-class="{ active: isSet(3) }" href ng-click="setTab(3)">Testimonials</a>
						<a class="navbar-item" ng-class="{ active: isSet(4) }" href ng-click="setTab(4)">Join our Team</a>
						<a class="navbar-item product-demo-request" href ng-model="demoFormCollapsed" ng-click="demoFormCollapsed=!demoFormCollapsed">Contact us</a>
					</div>
				</div>
				<section class="product-demo-form container" ng-show="demoFormCollapsed">
					<div class="columns">
						<div class="column">
							<a class="delete is-large close-form" href ng-model="demoFormCollapsed" ng-click="demoFormCollapsed=!demoFormCollapsed"></a>
							<!--[if lte IE 8]>
								<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
							<![endif]-->
							<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
							<script>
  							hbspt.forms.create({
									portalId: "182596",
									formId: "3f0b30e6-e31e-4390-a8ae-d94c51265716"
								});
							</script>
						</div>
					</div>
				</section>
			</nav>

			<section ng-show="isSet(1)">
				<div class="container padding-top">
					<div class="pre-content-container columns is-multiline is-desktop">
						<div class="image-cover">
							<?php
								// Get the Feature Image
								echo get_the_post_thumbnail( get_the_ID(), 'full', array( 'class' => 'feature-image-cover' ));
							?>
						</div>
						<div class="column is-12">
							<h1 class="has-text-centered ">Teq supports outcomes by evaluating and delivering products and services for the educational environment.</h1>
						</div>
						<div class="column is-12">
							<h1 class="has-text-centered">We are dedicated to <strong>providing dynamic professional development and instructional support</strong> to educators.</h1>
						</div>
					</div>
				</div>
				<?php
					// Grab the main contents for the page
					the_content();
						endwhile; // End of the loop.
				?>
				<div class="content-container">
					<div class="columns padding-bottom">
						<div class="container">
							<div class="column is-offset-2 is-8">
								<p class="padding-top"><img class="drop-shadow" src="/wp-content/uploads/2020/02/about-us-image_crowd.jpg" /></p>
								<h2 class="padding-top"><strong>The Fusion of Technology and Learning</strong></h2>
								<p>We customize professional development to empower educators, improve technology integration, and increase student achievement. By differentiating instruction, we are able to help schools meet their instructional goals and help teachers achieve their individual goals. Teq provides technology and professional development solutions to ultimately increase student achievement.</p>
							</div>
						</div>
					</div>
					<div class="columns">
						<div class="container">
							<div class="column is-offset-1 is-10">
								<p><img src="/wp-content/uploads/2020/02/aboutus-improving-the-quality-of-education.svg" /></p>
							</div>
						</div>
					</div>
					<div class="columns padding-bottom">
						<div class="container">
							<div class="column is-offset-1 is-10">
								<p><img src="/wp-content/uploads/2020/02/aboutus-solutions-to-increase-student-achievement.svg" /></p>
							</div>
						</div>
					</div>
				</div>
				<div class="post-content-container">
					<div class="full-section columns is-vcentered main-page-content-container">
						<div class="container targetScrollContent not-visible">
							<div class="column is-offset-2 is-4">
								<h2 class="white-text"><strong>Join Our Team</strong></h2>
								<a class="button white-border no-shadow" ng-class="{ active: isSet(4) }" href ng-click="setTab(4)">View our current job opportunities</a>
							</div>
						</div>
						<span class="background-image-cover"></span>
						<img class="background-image" src="/wp-content/uploads/2020/02/Full-Background-Image_about-us-join-our-team.jpg">
					</div>
				</div>
			</section>

			<section ng-show="isSet(2)">
				<div class="content-container">
					<div class="columns padding-bottom">
						<div class="container">
							<div class="column is-offset-1 is-10">
								<p class="is-size-5">Learning is at the heart of everything we do at Teq. With our unique blend of emerging educational technologies, STEM solutions, and dynamic professional development and instructional support, we are committed to supporting and enriching the learning experience.</p>
								<p class="is-size-5 strong">What sets Teq apart is not only our outcome-driven focus, but our passion to ensure that equitable and innovative STEM education is a successful part of every student’s learning journey — and school environment.</p>
							</div>
						</div>
					</div>
					<div class="columns">
						<div class="container">
							<div class="column is-offset-1 is-10">
								<h4 class="is-size-3 extra-letter-spacing strong">IT'S ALL ABOUT LEARNING</h4>
							</div>
						</div>
					</div>
					<div class="slider-start columns">
						<div class="container">
							<div class="column is-full">
								<div class="hs-container">
									<ul class="hs">
										<li class="item">
											<figure>
												<img src="/wp-content/uploads/2020/02/about-us-culture-image1.jpg" />
											</figure>
										</li>
										<li class="item">
											<figure>
												<img src="/wp-content/uploads/2020/02/about-us-culture-image2.jpg" />
											</figure>
										</li>
										<li class="item">
											<figure>
												<img src="/wp-content/uploads/2020/02/about-us-culture-image3.jpg" />
											</figure>
										</li>
										<li class="item">
											<figure>
												<img src="/wp-content/uploads/2020/02/about-us-culture-image4.jpg" />
											</figure>
										</li>
										<li class="item">
											<figure>
												<img src="/wp-content/uploads/2020/02/about-us-culture-image5.jpg" />
											</figure>
										</li>
										<li class="item">
											<figure>
												<img src="/wp-content/uploads/2020/02/about-us-culture-image6.jpg" />
											</figure>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="columns padding-top padding-bottom">
						<div class="container">
							<div class="column is-offset-1 is-10">
								<h4 class="is-size-3 extra-letter-spacing strong">OUR LEADERSHIP TEAM</h4>
								<p>At Teq, we work hard to foster innovation, passion, and creativity in the twenty-first century classroom by providing a unique blend of the latest K-12 educational technology products, experienced service, and meaningful professional development. With a focus on the fusion of technology and learning, our goal is to empower educators, improve technology integration, and increase student achievement in today's schools. Below you will find a list of your leadership team here at Teq.</p>
							</div>
						</div>
					</div>
					<div class="columns padding-bottom">
						<div class="container">
							<div class="column is-offset-1 is-10">

								<div class="columns">
									<div class="column">
										<h6 class="extra-letter-spacing strong has-text-centered">EXECUTIVE TEAM</h6>
									</div>
								</div>
								<div class="columns is-centered">
									<div class="column is-one-quarter has-text-centered">
										<article class="profile-card">
											<figure>
												<img src="https://www.teq.com/images/headshots_circles/DamianScarfo.png" />
											</figure>
											<h5><strong class="blue-text">Damian Scarfo</strong><em class="block caption">Chief Executive Officer</em></h5>
										</article>
									</div>
									<div class="column is-one-quarter has-text-centered">
										<article class="profile-card">
											<figure>
												<img src="https://www.teq.com/images/headshots_circles/JenniferEddelson.png" />
											</figure>
											<h5><strong class="blue-text">Jennifer Eddelson</strong><em class="block caption">Chief Financial Officer</em></h5>
										</article>
									</div>
									<div class="column is-one-quarter has-text-centered">
										<article class="profile-card">
											<figure>
												<img src="https://www.teq.com/images/headshots_circles/Robert-WayneHarris.png" />
											</figure>
											<h5><strong class="blue-text">Robert-Wayne Harris</strong><em class="block caption">Chief Learning Officer</em></h5>
										</article>
									</div>
									<div class="column is-one-quarter has-text-centered">
										<article class="profile-card">
											<figure>
												<img src="https://www.teq.com/wp-content/uploads/2016/12/about-us-leadership-JohnBall.png" />
											</figure>
											<h5><strong class="blue-text">John Ball</strong><em class="block caption">Chief Operating Officer</em></h5>
										</article>
									</div>
								</div>
								<div class="columns">
									<div class="column">
										<h6 class="extra-letter-spacing strong has-text-centered">VICE PRESIDENTS<h6>
									</div>
								</div>
								<div class="columns is-multiline">
									<div class="column is-one-fifth is-4-tablet has-text-centered">
										<article class="profile-card">
											<figure>
												<img src="https://www.teq.com/images/headshots_circles/DawnCastillo.png" />
											</figure>
											<h5><strong class="blue-text">Dawn Castillo</strong><em class="block caption">President of Teq</em></h5>
										</article>
									</div>
									<div class="column is-one-fifth is-4-tablet has-text-centered">
										<article class="profile-card">
											<figure>
												<img src="https://www.teq.com/wp-content/uploads/2016/12/about-us-leadership-chrissy_rebert.png" />
											</figure>
											<h5><strong class="blue-text">Chrissy Rebert</strong><em class="block caption">VP of Global Instructional Solutions</em></h5>
										</article>
									</div>
									<div class="column is-one-fifth is-4-tablet has-text-centered">
										<article class="profile-card">
											<figure>
												<img src="https://www.teq.com/wp-content/uploads/2016/12/about-us-leadership-BrianBeedenbender.png" />
											</figure>
											<h5><strong class="blue-text">Brian Beedenbender</strong><em class="block caption">VP of Sales</em></h5>
										</article>
									</div>
									<div class="column is-one-fifth is-4-tablet has-text-centered">
										<article class="profile-card">
											<figure>
												<img src="https://www.teq.com/wp-content/uploads/2016/12/about-us-leadership-PeterKurtz.png" />
											</figure>
											<h5><strong class="blue-text">Peter Kurtz</strong><em class="block caption">VP of Marketing</em></h5>
										</article>
									</div>
									<div class="column is-one-fifth is-4-tablet is-4-tablet has-text-centered">
										<article class="profile-card">
											<figure>
												<img src="https://www.teq.com/wp-content/uploads/2016/12/about-us-leadership-PaulPrincipato.png" />
											</figure>
											<h5><strong class="blue-text">Paul Principato</strong><em class="block caption">Vice President of Creative Services and Development</em></h5>
										</article>
									</div>
									<div class="column is-one-fifth is-4-tablet has-text-centered">
										<article class="profile-card">
											<figure>
												<img src="https://www.teq.com/wp-content/uploads/2016/12/RaymondSimpson.png" />
											</figure>
											<h5><strong class="blue-text">Ray Simpson</strong><em class="block caption">Chief Technology Officer</em></h5>
										</article>
									</div>
								</div>
								<div class="columns">
									<div class="column">
										<h6 class="extra-letter-spacing strong has-text-centered">DIRECTORS AND MANAGERS<h6>
									</div>
								</div>
								<div class="columns is-multiline">
									<div class="column is-one-fifth is-4-tablet has-text-centered">
										<article class="profile-card">
											<figure>
												<img src="https://www.teq.com/images/headshots_circles/JeffreyKoss.png" />
											</figure>
											<h5><strong class="blue-text">Jeffrey Koss</strong><em class="block caption">Director of Sales Operations</em></h5>
										</article>
									</div>
									<div class="column is-one-fifth is-4-tablet has-text-centered">
										<article class="profile-card">
											<figure>
												<img src="https://www.teq.com/wp-content/uploads/2016/12/about-us-leadership-BrianFried.png" />
											</figure>
											<h5><strong class="blue-text">Brian Fried</strong><em class="block caption">Director of Inside Sales</em></h5>
										</article>
									</div>
									<div class="column is-one-fifth is-4-tablet has-text-centered">
										<article class="profile-card">
											<figure>
												<img src="/wp-content/uploads/2020/02/LindseyKane.png" />
											</figure>
											<h5><strong class="blue-text">Lindsey Kane</strong><em class="block caption">Director of Channel Sales</em></h5>
										</article>
									</div>
									<div class="column is-one-fifth is-4-tablet has-text-centered">
										<article class="profile-card">
											<figure>
												<img src="https://www.teq.com/images/headshots_circles/MichelleHollander.png" />
											</figure>
											<h5><strong class="blue-text">Michelle Hollander</strong><em class="block caption">Director of Content and Curriculum</em></h5>
										</article>
									</div>
									<div class="column is-one-fifth is-4-tablet has-text-centered">
										<article class="profile-card">
											<figure>
												<img src="https://www.teq.com/wp-content/uploads/2016/12/about-us-leadership-MichellePetry.png" />
											</figure>
											<h5><strong class="blue-text">Michelle Petry</strong><em class="block caption">Director of Client Services</em></h5>
										</article>
									</div>
									<div class="column is-one-fifth is-4-tablet has-text-centered">
										<article class="profile-card">
											<figure>
												<img src="https://www.teq.com/images/headshots_circles/SamanthaBurkhardt.png" />
											</figure>
											<h5><strong class="blue-text">Samantha Burkhardt</strong><em class="block caption">Director of Business Processes</em></h5>
										</article>
									</div>
									<div class="column is-one-fifth is-4-tablet has-text-centered">
										<article class="profile-card">
											<figure>
												<img src="https://www.teq.com/wp-content/uploads/2016/12/about-us-leadership-FrankFalconeri.png" />
											</figure>
											<h5><strong class="blue-text">Frank Falconeri</strong><em class="block caption">Director of Logistics</em></h5>
										</article>
									</div>
									<div class="column is-one-fifth is-4-tablet has-text-centered">
										<article class="profile-card">
											<figure>
												<img src="https://www.teq.com/wp-content/uploads/2016/12/about-us-leadership-DawnLibretto.png" />
											</figure>
											<h5><strong class="blue-text">Dawn Libretto</strong><em class="block caption">Director of Scheduling</em></h5>
										</article>
									</div>
									<div class="column is-one-fifth is-4-tablet has-text-centered">
										<article class="profile-card">
											<figure>
												<img src="https://www.teq.com/wp-content/uploads/2016/12/about-us-leadership-JenniferHennessey.png" />
											</figure>
											<h5><strong class="blue-text">Jennifer Hennessey</strong><em class="block caption">Purchasing Manager</em></h5>
										</article>
									</div>
									<div class="column is-one-fifth is-4-tablet has-text-centered">
										<article class="profile-card">
											<figure>
												<img src="https://www.teq.com/images/headshots_circles/JenniferBailey.png" />
											</figure>
											<h5><strong class="blue-text">Jennifer Bailey</strong><em class="block caption">Product Marketing Manager</em></h5>
										</article>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section ng-show="isSet(3)">
				<div class="content-container">
					<div class="columns padding-bottom">
						<div class="container">
							<div class="column is-offset-1 is-10">
								<h4 class="is-size-3 strong">Customer Testimonials</p>
								<p class="is-size-5">Below you will find a partial list of our customer testimonials, feel free to <a href ng-model="demoFormCollapsed" ng-click="demoFormCollapsed=!demoFormCollapsed"><u class="strong">contact us</u></a> for a full referral list.</p>
								<div class="columns is-multiline padding-top padding-bottom">
									<?php
										$args = array(
											'post_type' => 'post',
											'category_name' => 'testimonial',
											'posts_per_page' => -1,
											'orderby' => 'title',
											'order'   => 'ASC'
										);
										$the_query = new WP_Query( $args );

										if ( $the_query -> have_posts() ) :
											while ($the_query -> have_posts()) : $the_query -> the_post();
									?>
									<div class="column is-3-desktop is-4-tablet">
										<div class="card">
  										<div class="card-image">
    										<figure class="image">
      										<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large') ?></a>
    										</figure>
  										</div>
  										<div class="card-content">
												<h5>
													<a class="relative-position less-line-height" href="<?php the_permalink(); ?>"><?php the_title(); ?> <span class="arrow"></span></a>
												</h5>
    									</div>
										</div>
  								</div>
									<?php endwhile; else: ?>
            				<h3 class="is-size-4"><?php _e( 'Sorry, no new testimonials are available at this time. <strong>Check back soon for updates</strong>.' ); ?></h3>
        					<?php endif; wp_reset_query(); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section ng-show="isSet(4)">
				<div class="content-container">

					<div class="columns padding-bottom">
						<div class="container">
							<div class="column is-offset-1 is-10">
								<h4 class="is-size-3 strong">Become part of our team, join the #1 education technology company in the country, and make a difference in the lives of students.</h4>
								<p class="padding-sm-top-bottom">
									<a class="button dark no-shadow" href="#teqCareers">View our current job opportunities</a>
								</p>
								<p class="is-size-5">Wake up in the morning with a passion for making a difference in the lives of students. Teq believes in improving educational outcomes. At Teq, we work hard to foster innovation, passion, and creativity in the twenty-first century classroom by providing a unique blend of the latest K-12 educational technology products, experienced service, and meaningful professional development. With a focus on the fusion of technology and learning, our goal is to empower educators, improve technology integration, and increase student achievement in today's schools.</p>
								<figure class="padding-sm-top-bottom">
									<img src="/wp-content/uploads/2020/02/about-us-benefits-image.svg" />
								</figure>
							</div>
						</div>
					</div>

					<div class="post-content-container">
						<div class="full-section columns is-vcentered main-page-content-container">
							<div class="container targetScrollContent not-visible">
								<div class="column is-offset-2 is-3">
									<a class="video-link" target="_blank" href="https://youtu.be/kWiUDx5ikVk"><span>Hear what our staff has to say.</span></a>
								</div>
							</div>
							<span class="background-image-cover"></span>
							<img class="background-image" src="/wp-content/uploads/2020/02/Full-Background-Image_about-us-what-others-say.jpg">
						</div>
					</div>
					<div id="teqCareers" class="columns padding-top padding-bottom">
						<div class="container">
							<div class="column is-offset-1 is-10">
								<?php
									$args = array(
										'post_type' => 'post',
										'category_name' => 'careers',
										'posts_per_page' => -1,
										'orderby' => 'title',
										'order'   => 'ASC'
									);
									$the_query = new WP_Query( $args );

									if ( $the_query -> have_posts() ) :
										while ($the_query -> have_posts()) : $the_query -> the_post();
								?>
								<article class='columns is-vcentered border-bottom'>
									<div class="column is-9">
										<h6><a class="strong" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
										<p><?php echo get_the_excerpt(); ?></p>
									</div>
									<div class="column">
										<a class="button no-shadow" href="<?php the_permalink(); ?>">Details <span class="arrow"></span></a>
									</div>
								</article>
								<?php endwhile; else: ?>
            			<h3 class="is-size-4"><?php _e( 'Sorry, no current job postings at this time. <strong>Check back soon for updates</strong>.' ); ?></h3>
        				<?php endif; wp_reset_query(); ?>
							</div>
						</div>
					</div>

				</div>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
