<?php
/**
 * Template Name: Create Your Solution Result
 * The template for displaying the Create Your Solution Result
 * @package Teq_v4.0
 */

get_header();
?>

<div id="primary" class="content-area" scroll>
	<main id="main" class="site-main section-container">

		<section class="full-section grey-background padding-bottom create-your-solution-container" ng-controller="solutionResults">
			<div class="container padding-left padding-right padding-bottom">

				<?php
					/** HERE ARE THE FORM VARIABLES
					*/
					$solutionTitle = $_POST['title'];
					$professional_development_solution = $_POST['professinal-development-solutions'];
					$lesson_content_solution = $_POST['lesson-content-solutions'];
					$stem_solution = $_POST['stem-solutions'];
					$classroom_transformation_solution = $_POST['classroom-transformation-solutions'];
					$grade_band_level = $_POST['grade-band-level'];
					$subject_matter = $_POST['subject-matter'];
					$technology_proficiency = $_POST['technology-proficiency'];


					$args = array(
						'post_type' => 'pathways',
						'category_name' => $stem_solution,
						'taxonomy' => 'topic',
						'posts_per_page' => 1,
						'orderby'   => 'rand',
						'tax_query' => array(
							array (
								'taxonomy' => 'topics',
								'field' => 'slug',
								'terms' => array($grade_band_level, $subject_matter, $technology_proficiency)
							),
						),
					);
					$pathway_solution_query = new WP_Query($args);
						if ( $pathway_solution_query->have_posts() ) :
							while ($pathway_solution_query -> have_posts()) :
								$pathway_solution_query -> the_post();
				?>

				<section class="solution-set <?php echo $technology_proficiency .' '. $professional_development_solution .' '. $lesson_content_solution .' '. $stem_solution .' '. $classroom_transformation_solution .' '. $grade_band_level .' '. $subject_matter; ?>">

					<div class="solution-set-column title columns is-centered is-vend">
						<div class="column is-full">
							<h1>Here is your Teq solution, <u class="strong"><?php echo $solutionTitle; ?></u>.</h1>
						</div>
					</div>

					<div id="sticky-container-trigger"></div>
					<div id="sticky-container" class="solution-set-column columns">
						<div class="column">
							<div class="navbar-menu container">
								<a class="navbar-item option " href="/create-your-solution">
									<?php echo file_get_contents(get_template_directory_uri() . '/inc/ui/back-icon.svg'); ?>
									<span>Back</span>
								</a>
								<a class="navbar-item option" href="#sticky-container" ng-click="setTab(1)">
									<?php echo file_get_contents(get_template_directory_uri() . '/inc/ui/solution-summary-icon.svg'); ?>
									<span>Solution Summary</span>
								</a>
								<a class="navbar-item option solution-quote-button" href="#sticky-container" ng-click="setTab(2)">
									<?php echo file_get_contents(get_template_directory_uri() . '/inc/ui/quote-icon.svg'); ?>
									<span>Get a Quote</span>
								</a>
								<a class="navbar-item print" href onclick="window.print()">
									<?php echo file_get_contents(get_template_directory_uri() . '/inc/ui/print-icon.svg'); ?>
									<span>Print</span>
								</a>
							</div>
						</div>
					</div>

					<script>
					/**
						* RESULTS PAGE STICK NAVBAR
						* CHECK WHEN ELEMENT TRIGGER INTERSECTS WITH THE SCREEN
						* Toggle Sticky Class when 'Trigger' is scrolled into view
						*/
						var observer = new IntersectionObserver(function(entries) {
							// no intersection with screen
								if(entries[0].intersectionRatio === 0)
									document.querySelector("#sticky-container").classList.add("sticking");
							// fully intersects with screen
								else if(entries[0].intersectionRatio === 1)
									document.querySelector("#sticky-container").classList.remove("sticking");
								}, { threshold: [0,1] });
							observer.observe(document.querySelector("#sticky-container-trigger"));
					</script>

					<form class="solution-set-quote-request solution-set-column columns is-multiline" name="quoteRequest" method="post" action="{{'/create-your-solution/solution-quote-request/?' + quote_name}}" ng-show="isSet(2)">
						<div class="column is-11">
							<h4 class="large-header strong">Let's get your solution inside the classroom!</h4>
							<h5>For pricing on any of the products in your solution set, simply fill out the form below and a Teq Sales Req will reach out to you directly. <strong>Please sure to check off which item(s) you would like to see pricing on.</strong></h5>
						</div>
						<div class="column is-1 has-text-right">
							<a class="delete is-large" href ng-click="closeTabs()"></a>
						</div>
						<div class="field column is-full">
							<table class="table is-hoverable">
								<tbody>
									<tr>
										<td class="control">
											<input class="input" type="text" name="quote_name" ng-model="quote_name" placeholder="Name" required>
										</td>
									</tr>
									<tr>
										<td class="control">
											<input class="input" name="quote_name_title" type="text" placeholder="Title">
										</td>
									</tr>
									<tr>
										<td class="control">
											<input class="input" type="email" name="quote_name_email" ng-model="quote_name_email"  placeholder="Email" required>
										</td>
									</tr>
										<td class="control">
											<input class="input" type="phone" name="quote_name_phone" ng-model="quote_name_phone" placeholder="phone" required>
										</td>
									</tr>
									<tr>
										<td class="control">
											<input class="input" type="text" name="quote_name_school" placeholder="School or District">
										</td>
									</tr>
									<?php if (isset($professional_development_solution)) { ?>
									<tr>
										<td class="control">
											<input type="checkbox" id="<?php echo $professional_development_solution; ?>" value="<?php echo $professional_development_solution; ?>" name="quote_items[]">
											<label class="checkbox" for="<?php echo $professional_development_solution; ?>"><?php echo $professional_development_solution; ?></label>
										</td>
									</tr>
									<?php } if ($lesson_content_solution == "Educational Resources") { ?>
									<tr>
										<td class="control">
											<input type="checkbox" id="educational-resources" value="educational-resources" name="quote_items[]">
											<label class="checkbox" for="educational-resources">
												Educational Resource Materials
											</label>
										</td>
									</tr>
									<?php } elseif (isset($lesson_content_solution)) { ?>
									<tr>
										<td class="control">
											<input type="checkbox" id="<?php echo $lesson_content_solution; ?>" value="<?php the_title(); ?>" name="quote_items[]">
											<label class="checkbox" for="<?php echo $lesson_content_solution; ?>">
												<?php the_title(); ?> - <?php echo $lesson_content_solution; ?>
											</label>
										</td>
									</tr>
									<?php } if (isset($classroom_transformation_solution)) { ?>
									<tr>
										<td class="control">
											<input type="checkbox" id="<?php echo $classroom_transformation_solution; ?>" value="<?php echo $classroom_transformation_solution; ?>" name="quote_items[]">
											<label class="checkbox" for="<?php echo $classroom_transformation_solution; ?>">
												<?php echo $classroom_transformation_solution; ?>
											</label>
										</td>
									</tr>
									<?php }
									// Get the taxonomy's terms
									$terms = get_the_terms( $post->ID , 'products' );

									// Check if any term exists
									if ( ! empty( $terms ) ) {
										// Run a loop and print them all
										foreach ( $terms as $term ) { ?>
											<tr>
												<td class="control">
													<input type="checkbox" id="<?php echo $term->name; ?>" value="<?php echo $term->name; ?>" name="quote_items[]">
													<label class="checkbox" for="<?php echo $term->name; ?>"><?php echo $term->name; ?></label>
												</td>
											</tr>
										<?php
										}
									}
								?>
								</tbody>
								<tfoot>
									<tr>
										<td class="control">
											<button class="button is-link" type="submit" name="submit" ng-disabled="quoteForm.$invalid">Submit</button>
										</td>
									</tr>
								</tfoot>
							</table>
						</div>
					</form>

					<section class="solution-set-container columns is-multiline" ng-show="isSet(1)">
						<div class="column is-6">
							<h3>Your Solution Summary</h3>
						</div>
						<div class="column is-6 has-text-right">
							<a class="delete is-large" href ng-click="closeTabs()"></a>
						</div>
						<?php
							if (isset($professional_development_solution)) {
						?>
						<div class="column is-2">
							<p class="strong"><?php echo $professional_development_solution; ?></p>
						</div>
						<div class="column is-10">
							<?php if ($professional_development_solution == "Mentoring PD") { ?>
								<p>Work one-on-one with a Teq PD Specialist and get <strong>focused mentoring</strong> to help you become your most effective. Available as in-person and/or virtual PD.</p>
							<?php } elseif ($professional_development_solution == "Coaching PD") { ?>
								<p>Assemble a small group of educators for <strong>specialized coaching</strong> around your goals and needs. Available as in-person and/or virtual PD.</p>
							<?php } elseif ($professional_development_solution == "Online (OTIS) PD") { ?>
								<p>Utilize <strong>OTIS for educators</strong>, our virtual PD platform, for relevant and on-demand training that connects technology and instruction.</p>
							<?php } ?>
						</div>
						<?php }
							if (isset($lesson_content_solution)) {
						?>
						<div class="column is-2">
							<p class="strong"><?php echo $lesson_content_solution; ?></p>
						</div>
						<div class="column is-10">
							<?php if ($lesson_content_solution == "Project-Based Learning") { ?>
								<p>Explore our technology-centric, <strong>project-based learning (PBL)</strong> challenges that guide students through the journey of the Engineering Design Process.</p>
							<?php } elseif ($lesson_content_solution == "Customized Content Creation") { ?>
								<p>Take your iBlock up a notch with our options to <strong>customize content,</strong> subject matter, scope, and sequence. </p>
							<?php } elseif ($lesson_content_solution == "Educational Resources") { ?>
								<p>Access our ever-growing <strong>library of lesson resources and inspiration,</strong> and download templates, files, worksheets, and more. </p>
							<?php } ?>
						</div>
						<?php }
							if (isset($classroom_transformation_solution)) {
						?>
						<div class="column is-2">
							<p class="strong"><?php echo $classroom_transformation_solution; ?></p>
						</div>
						<div class="column is-10">
							<?php if ($classroom_transformation_solution == "SMART Board/SMART Learning Suite") { ?>
								<p><strong>SMART’s range of interactive flat panels and accompanying software</strong> support dynamic, student-centered learning that sparks interaction and engagement.</p>
							<?php } elseif ($classroom_transformation_solution == "Active Learning Spaces") { ?>
								<p>Physical movement and activity helps students learn. Explore the <strong>best-in-class active learning solutions</strong> that get students moving and thinking at the same time.</p>
							<?php } elseif ($classroom_transformation_solution == "Evospaces (furniture)") { ?>
								<p>An <strong>evoSpace is a unique classroom environment</strong> that supports and represents every aspect of 21st century learning — we like to call it the complete thought.</p>
							<?php } ?>
						</div>
						<?php }
							if (isset($stem_solution)) {
						?>
						<div class="column is-2">
							<p class="strong"><?php echo $stem_solution; ?></p>
						</div>
						<div class="column is-10">
							<?php if ($stem_solution == "General STEM") { ?>
								<p>Take a look at the classroom solutions that open up a world of <strong>STEM for students</strong> and make a lasting impact on learning. </p>
							<?php } elseif ($stem_solution == "Coding") { ?>
								<p>Explore options in <strong>coding</strong> and programming to ensure students thrive in computer science.</p>
							<?php } elseif ($stem_solution == "Robotics") { ?>
								<p>Engage students in <strong>robotics</strong> with a wide range of products that build knowledge through hands-on learning.</p>
							<?php } elseif ($stem_solution == "Hydroponics") { ?>
								<p>Introduce students to <strong>hydroponic gardening</strong> as they experience everything from agriculture to engineering.</p>
							<?php } ?>
						</div>
						<?php }
							if (isset($grade_band_level)) {
						?>
						<div class="column is-2">
							<p class="strong"><?php echo $grade_band_level; ?></p>
						</div>
						<div class="column is-10">
							<?php if ($grade_band_level == "Grades K-2") { ?>
								<p><strong>K-2</strong> best fits the solution I'm looking for.</p>
							<?php } elseif ($grade_band_level == "Grades 3-5") { ?>
								<p>G<strong>3-5</strong> best fits the solution I'm looking for.</p>
							<?php } elseif ($grade_band_level == "Grades 6-8") { ?>
								<p><strong>6-8</strong> best fits the solution I'm looking for.</p>
							<?php } elseif ($grade_band_level == "Grades 9-12") { ?>
								<p><strong>9-12</strong> best fits the solution I'm looking for.</p>
							<?php } ?>
						</div>
						<?php }
							if (isset($subject_matter)) {
						?>
						<div class="column is-2">
							<p class="strong"><?php echo $subject_matter; ?></p>
						</div>
						<div class="column is-10">
							<?php if ($subject_matter == "ELA") { ?>
								<p>Subject Matter</p>
							<?php } elseif ($subject_matter == "Engineering") { ?>
								<p>Subject Matter</p>
							<?php } elseif ($subject_matter == "English") { ?>
								<p>Subject Matter</p>
							<?php } elseif ($subject_matter == "Math") { ?>
								<p>Subject Matter</p>
							<?php } elseif ($subject_matter == "Science") { ?>
								<p>Subject Matter</p>
							<?php } elseif ($subject_matter == "Social Studies") { ?>
								<p>Subject Matter</p>
							<?php } elseif ($subject_matter == "Special Education") { ?>
								<p>Subject Matter</p>
							<?php } elseif ($subject_matter == "STEM") { ?>
								<p>Subject Matter</p>
							<?php } ?>
						</div>
						<?php }
							if (isset($technology_proficiency)) {
						?>
						<div class="column is-2">
							<p class="strong"><?php echo $technology_proficiency; ?></p>
						</div>
						<div class="column is-10">
							<?php if ($technology_proficiency == "Easy Proficiency") { ?>
								<p>I'm a beginner so I'll need products with a lighter lift.</p>
							<?php } elseif ($technology_proficiency == "Intermediate Proficiency") { ?>
								<p>I'm still learning, but I'm pretty good with technology.</p>
							<?php } elseif ($technology_proficiency == "Advanced Proficiency") { ?>
								<p>I'm a pro, so give me your best!</p>
							<?php } ?>
						</div>
						<?php } ?>
					</section>

					<?php
						$pd_course_content = get_post_meta( get_the_ID(), 'custom_pd_meta_html', true );
						$product_content = get_post_meta( get_the_ID(), 'custom_product_meta_html', true );
						if (isset($professional_development_solution)) {
			 		?>

					<div class="solution-set-title columns">
						<div class="column is-full">
							<h3>Based on your feedback, here’s the <br /><strong class="professional-development-color">professional development solution</strong> we recommend for you.</h3>
						</div>
					</div>
					<section class="solution-set-container professional-development">
						<div class="solution-set-details columns">
							<?php if ($professional_development_solution == "Mentoring PD") { ?>
							<div class="column is-9">
								<h5 class="professional-development-color">Mentoring Professional Development</h5>
								<p>Work one-on-one with a Teq PD Specialist and get focused mentoring to help you become your most effective. Available as in-person and/or virtual PD.</p>
							</div>
							<figure class="column">
								<a href="/professional-development/onsite-pd/">
									<img src="<?php echo get_template_directory_uri() . '/inc/ui/solution-set_mentoring-coaching-pd.jpg'; ?>" />
								</a>
							</figure>
							<?php } elseif ($professional_development_solution == "Coaching PD") { ?>
							<div class="column is-9">
								<h5 class="professional-development-color">Coaching Professional Development</h5>
								<p>Assemble a small group of educators for specialized coaching around your goals and needs. Available as in-person and/or virtual PD.</p>
							</div>
							<figure class="column">
								<a href="/professional-development/onsite-pd/">
									<img src="<?php echo get_template_directory_uri() . '/inc/ui/solution-set_mentoring-coaching-pd.jpg'; ?>" />
								</a>
						 	</figure>
						 	<?php } elseif ($professional_development_solution == "Online (OTIS) PD") { ?>
							<div class="column is-9">
								<h5 class="professional-development-color">Online Professional Development with OTIS for educators!</h5>
								<p>Utilize OTIS for educators, our virtual PD platform, for relevant and on-demand training that connects technology and instruction.</p>
							</div>
							<figure class="column">
								<a href="/professional-development/onsite-pd/">
									<img src="<?php echo get_template_directory_uri() . '/inc/ui/solution-set_otis-online-pd.jpg'; ?>" />
								</a>
		 					</figure>
							<?php } ?>
						</div>
						<?php if ($professional_development_solution == "Online (OTIS) PD") { ?>
						<div class="solution-set-details expandable-content columns">
								<?php echo html_entity_decode($pd_course_content); ?>
						</div>
						<?php } ?>
					</section>

					<?php } if (isset($lesson_content_solution)) { ?>
					<div class="solution-set-title columns">
						<div class="column is-full">
							<h3>We looked at your responses and picked the <br /><strong class="content-creation-color">lesson content solution</strong> that best fits the needs you defined.</h3>
						</div>
					</div>
					<section class="solution-set-container content-creation">
						<div class="solution-set-details columns">
							<div class="column is-9">
								<?php if ($lesson_content_solution == "Project-Based Learning") { ?>
									<h5 class="content-creation-color strong">Project-Based Learning with iBlocks</h5>
									<p>Explore iBlocks, our technology-centric project-based learning (PBL) challenges that guide students through the journey of the Engineering Design Process.</p>
								<?php } elseif ($lesson_content_solution == "Customized Content Creation") { ?>
									<h5 class="content-creation-color strong">Completely Customized iBlock Content</h5>
									<p>Take your iBlock up a notch with our options to customize content, subject matter, scope, and sequence.</p>
								<?php } elseif ($lesson_content_solution == "Educational Resources") { ?>
									<h5 class="content-creation-color strong">The Educator Resources Center by OTIS</h5>
									<p>Access our ever-growing library of lesson resources and inspiration, and download templates, files, worksheets, and more.</p>
								<?php } ?>
							</div>
							<figure class="column">
								<?php if ($lesson_content_solution == "Project-Based Learning") { ?>
									<img src="<?php echo get_template_directory_uri() . '/inc/ui/solution-set_iblocks.jpg'; ?>" />
								<?php } elseif ($lesson_content_solution == "Customized Content Creation") { ?>
									<img src="<?php echo get_template_directory_uri() . '/inc/ui/solution-set_iblocks.jpg'; ?>" />
								<?php } elseif ($lesson_content_solution == "Educational Resources") { ?>
									<a class="expandable-content-button absolute" href="https://otispd.teq.com">Learn more</a>
									<img src="<?php echo get_template_directory_uri() . '/inc/ui/solution-set_erc.jpg'; ?>" />
									<?php } ?>
							</figure>
						</div>
						<?php if ($lesson_content_solution == "Project-Based Learning" or $lesson_content_solution == "Customized Content Creation") { ?>
							<div class="solution-set-details expandable-content columns">
								<div class="column is-9">
									<h5 class="strong"><?php the_title(); ?></h5>
										<?php the_content(); ?>
								</div>
								<div class="column">
									<p class="has-text-centered"><a class="expandable-content-button" href="/iblocks-project-based-learning/">See More</a></p>
								</div>
							</div>
						<?php } ?>
					</section>
					<?php } ?>

					<div class="solution-set-title columns">
						<div class="column is-full">
							<h3>For <?php echo $grade_band_level; ?> with <?php echo $subject_matter; ?> as your focus,<br /> we recommend the following <strong class="stem-solutions-color">STEM Solution(s)</strong></h3>
						</div>
					</div>
					<section class="solution-set-container stem-solutions">
						<?php echo html_entity_decode($product_content); ?>
					</section>

					<?php if (isset($classroom_transformation_solution)) { ?>
					<div class="solution-set-title columns">
						<div class="column is-full">
							<h3>Which <strong class="classroom-transformation-color">classroom transformation solution</strong><br />is best for you? Check it out below.</h3>
						</div>
					</div>
					<section class="solution-set-container classroom-transformation">
						<div class="solution-set-details columns">
							<?php if ($classroom_transformation_solution == "SMART Board/SMART Learning Suite") { ?>
								<div class="column is-9">
									<h5 class="classroom-transformation-color strong">SMART Boards and the SMART Learning Suite</h5>
									<p>SMART’s range of interactive flat panels and accompanying software support dynamic, student-centered learning that sparks interaction and engagement.</p>
								</div>
								<figure class="column">
									<a href="/smart/">
										<img src="<?php echo get_template_directory_uri() . '/inc/ui/solution-set_smart.jpg'; ?>" />
									</a>
								</figure>
							<?php } elseif ($classroom_transformation_solution == "Active Learning Spaces") { ?>
								<div class="column is-9">
									<h5 class="classroom-transformation-color strong">Active Floor</h5>
									<p>Physical movement and activity helps students learn. Explore the best-in-class active learning solutions that get students moving and thinking at the same time.</p>
								</div>
								<figure class="column">
									<a href="/stem/active-floor/">
										<img src="<?php echo get_template_directory_uri() . '/inc/ui/solution-set_active-floor.jpg'; ?>" />
									</a>
								</figure>
							<?php } elseif ($classroom_transformation_solution == "Evospaces (furniture)") { ?>
								<div class="column is-9">
									<h5 class="classroom-transformation-color strong">Evospaces for the 21st Century Classroom</h5>
									<p>An evoSpace is a unique classroom environment that supports and represents every aspect of 21st century learning — we like to call it the complete thought.</p>
								</div>
								<figure class="column">
									<a href="/evospaces/">
										<img src="<?php echo get_template_directory_uri() . '/inc/ui/solution-set_evospaces.jpg'; ?>" />
									</a>
								</figure>
							<?php } ?>
						</div>
						<div class="solution-set-details expandable-content columns">
							<div class="column is-9">
								<p>Transform classroom learning with immersive solutions that break the mold, build engagement, and make a lasting impact on student learning.</p>
							</div>
							<div class="column">
								<?php if ($classroom_transformation_solution == "SMART Board/SMART Learning Suite") { ?>
									<p class="has-text-centered"><a class="expandable-content-button" href="/educational-technology/smart/">More Info</a></p>
								<?php } elseif ($classroom_transformation_solution == "Active Learning Spaces") { ?>
									<p class="has-text-centered"><a class="expandable-content-button" href="/stem/active-floor/">More Info</a></p>
								<?php } elseif ($classroom_transformation_solution == "Evospaces (furniture)") { ?>
									<p class="has-text-centered"><a class="expandable-content-button" href="/evospaces/">More Info</a></p>
								<?php } ?>
							</div>
						</div>
					</section>
					<?php } ?>

			 		<?php endwhile; wp_reset_postdata(); else : ?>
						<section class="welcome columns is-multiline is-centered padding-top <?php echo $technology_proficiency .' '. $professional_development_solution .' '. $lesson_content_solution .' '. $stem_solution .' '. $classroom_transformation_solution .' '. $grade_band_level .' '. $subject_matter; ?>">
							<div class="column is-full padding">
								<h1>Sorry <span class="strong"><?php echo $solutionTitle; ?></span>, we didn't find matches.</h1>
								<div class="field is-full has-text-right">
								   <a href="/create-your-solution" class="button is-link padding-sm">Try Creating Another Solution</a>
								</div>
							</div>
						</section>
					<?php endif; ?>

					</div>
				</section>

			</div>
		</section><!-- END OF create-your-solution-container -->

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
