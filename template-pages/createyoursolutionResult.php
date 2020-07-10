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

		<section class="full-section grey-background create-your-solution-container" ng-controller="solutionResults">
			<div class="container padding-top padding-bottom">

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
				?>

				<section class="welcome columns is-multiline is-vcentered is-desktop">
					<div class="column is-full">
						<h1 class="strong">Here is the <span class="extra-large-header"><?php echo $solutionTitle; ?></span> Teq Solution.</h1>

						<div class="<?php echo $technology_proficiency .' '. $professional_development_solution .' '. $lesson_content_solution .' '. $stem_solution .' '. $classroom_transformation_solution .' '. $grade_band_level .' '. $subject_matter; ?>">
						<?php

							$args = array(
			 					'post_type' => 'pathways',
			 					'taxonomy' => 'topic',
			 					'posts_per_page' => 1,
								'orderby'   => 'rand',
								'tax_query' => array(
									array (
										'taxonomy' => 'topics',
										'field' => 'slug',
										'terms' => array($stem_solution, $grade_band_level, $subject_matter, $technology_proficiency)
									),
								),
			 				);
							$pathway_solution_query = new WP_Query($args);

							if ( $pathway_solution_query->have_posts() ) :
								while ($pathway_solution_query -> have_posts()) :
									$pathway_solution_query -> the_post();

									$pd_course_content = get_post_meta( get_the_ID(), 'custom_pd_meta_html', true );
									$product_content = get_post_meta( get_the_ID(), 'custom_product_meta_html', true );
			 			?>
			 			<div class="columns border-bottom">
							<div class="column">
			 					<h1 class="strong"><?php the_title(); ?></h1>
								<p><?php the_content(); ?></p>
							</div>
						</div>

						<?php if ($professional_development_solution == "Mentoring PD") { ?>
							<div class="columns border-bottom">
								<div class="column">
			 						<h1 class="strong">Mentoring PD</h1>
								</div>
							</div>
						<?php } elseif ($professional_development_solution == "Coaching PD") { ?>
							<div class="columns border-bottom">
								<div class="column">
				 					<h1 class="strong">Coaching PD</h1>
								</div>
							</div>
						<?php } elseif ($professional_development_solution == "Online (OTIS) PD") { ?>
							<div class="columns border-bottom">
								<div class="column">
				 					<h1 class="strong"><?php echo $pd_course_content; ?></h1>
								</div>
							</div>
						<?php } ?>

						<?php if ($lesson_content_solution == "Project-Based Learning") { ?>
							<div class="columns border-bottom">
								<div class="column">
			 						<h1 class="strong">iBlocks</h1>
								</div>
							</div>
						<?php } elseif ($lesson_content_solution == "Customized Content Creation") { ?>
							<div class="columns border-bottom">
								<div class="column">
				 					<h1 class="strong">iBlock Custom Content Creation</h1>
								</div>
							</div>
						<?php } elseif ($lesson_content_solution == "Educational Resources") { ?>
							<div class="columns border-bottom">
								<div class="column">
				 					<h1 class="strong">Educator Resource Center</h1>
								</div>
							</div>
						<?php } ?>

						<?php if ($classroom_transformation_solution == "SMART Board/SMART Learning Suite") { ?>
							<div class="columns border-bottom">
								<div class="column">
			 						<h1 class="strong">SMART Boards and the SMART Learning Suite</h1>
								</div>
							</div>
						<?php } elseif ($classroom_transformation_solution == "Active Learning Spaces") { ?>
							<div class="columns border-bottom">
								<div class="column">
				 					<h1 class="strong">Lu and Active Floor</h1>
								</div>
							</div>
						<?php } elseif ($classroom_transformation_solution == "Evospaces (furniture)") { ?>
							<div class="columns border-bottom">
								<div class="column">
				 					<h1 class="strong">Evospaces for the 21st Century Classroom</h1>
								</div>
							</div>
						<?php } ?>

						<div class="columns border-bottom">
							<div class="column">
								<h1 class="strong"><?php echo $product_content; ?></h1>
							</div>
						</div>


			 			<?php
							endwhile; wp_reset_postdata(); else : ?>
								<h5>Sorry <span class="strong"><?php echo $solutionTitle; ?></span>, we didn't find matches for: <?php echo $technology_proficiency .' '. $professional_development_solution .' '. $lesson_content_solution .' '. $stem_solution .' '. $classroom_transformation_solution .' '. $grade_band_level .' '. $subject_matter; ?></h5>
							<?php endif; ?>
						</div>

					</div>
				</section>

			</div>
		</section>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
