<?php
/**
 * Template Name: Create Your Solution
 * The template for displaying the Create Your Solution Section
 * @package Teq_v4.0
 */

get_header();
?>

<div id="primary" class="content-area" scroll>
	<main id="main" class="site-main section-container">

		<section class="full-section grey-background create-your-solution-container">
			<div class="container padding-top padding-bottom">

				<section class="welcome columns is-multiline is-vcentered is-desktop" ng-hide="startCreating">
					<div class="image-cover">
						<?php
							// Get the Feature Image
							echo get_the_post_thumbnail( get_the_ID(), 'full', array( 'class' => 'feature-image-cover' ));
						?>
					</div>
					<div class="column is-full">
						<h1><strong>Welcome</strong></h1>
						<form class="school-name-control">
  						<div class="input-control">
    						<input class="input school-name" type="text" ng-model="schoolName" placeholder="Please enter your name or school name">
  						</div>
							<div class="button-control">
            		<button type="submit" class="submit-button" ng-click="startCreating = !startCreating">LET'S GET STARTED <span class="arrow light"></span></button>
          		</div>
						</form>
					</div>
				</section>

			<!--
				<section class="create columns is-multiline is-centered is-desktop" >
					<div class="column is-full ">
						<h1>Okay <strong>{{schoolName}}</strong>, let's create your solution.</h1>
						<h2>Please identify the needs of your school using the dials below:</h2>
					</div>
					<div class="dial-ui container columns">
						<div class="column is-4 relative-position">
							<div class="circle outer"></div>
							<div class="circle inner"></div>
						</div>
						<div class="column is-4 relative-position">
							section content
						</div>
						<div class="column is-4 relative-position">
							section 2
						</div>
					</div>
				</section>
			-->

				<section class="create columns is-multiline is-centered is-desktop" ng-show="startCreating">
					<div class="column">
						<h1>Okay <strong>{{schoolName}}</strong>, let's create your solution.</h1>
						<h2>Please identify the needs of your school using the dials below:</h2>
					</div>
					<div class="dial-ui-container columns is-vcentered">
						<div class="column is-4 relative-position">
							<div class="circle outer a"></div>
							<div class="circle inner b"></div>
							<div class="circle inner c"></div>
							<object type="image/svg+xml" data="<?php echo get_template_directory_uri() . '/inc/images/dial-ticks.svg'; ?>" class="circle dial"></object>
							<div class="circle inner hard d"></div>
							<div class="circle outer e"><strong class="circle">{{schoolName}}</strong></div>
						</div>
						<div class="column is-4 relative-position has-text-centered">
							{{schoolName}}
						</div>
						<div class="column is-4 relative-position">
							<div class="gauge outer hard"></div>
							<object type="image/svg+xml" data="<?php echo get_template_directory_uri() . '/inc/images/gauge-ticks.svg'; ?>" class="gauge-ticks"></object>
							<div class="gauge-reader-shadow outer"></div>
							<div class="gauge-reader inner">
								<div class="fill"></div>
							</div>
							<div class="gauge-labels">
								<h6 class="technology-proficiency-color">- {{technologyProficiency}}</h6>
								<h6 class="subject-matter-color">- {{subjectMatter}}</h6>
								<h6 class="grade-band-color">- {{gradeBand}}</h6>
								<h6 class="classroom-transformation-color">- {{classroomTransformationSolutions}}</h6>
								<h6 class="stem-solutions-color">- {{stemSolutions}}</h6>
								<h6 class="content-creation-color">- {{lessonContentSolutions}}</h6>
								<h6 class="professional-development-color">- {{professionalDevelopmentSolutions}}</h6>
							</div>
						</div>
					</div>
					<div class="dial-ui-container columns is-multiline">
						<div class="column is-3">
							<h5 class="strong">Professional Development Solutions</h5>
							<div class="control">
  							<label class="radio"><input type="radio" name="professinal-development-solutions" ng-model="professionalDevelopmentSolutions" ng-value='"Mentoring PD"' value="mentoring_pd"> Mentoring PD</label>
							</div>
							<div class="control">
  							<label class="radio"><input type="radio" name="professinal-development-solutions" ng-model="professionalDevelopmentSolutions" ng-value='"Coaching PD"' value="coaching_pd"> Coaching PD</label>
							</div>
							<div class="control">
  							<label class="radio"><input type="radio" name="professinal-development-solutions" ng-model="professionalDevelopmentSolutions" ng-value='"Online PD from OTIS for educators"' value="online_pd"> Online (OTIS) PD</label>
							</div>
						</div>
						<div class="column is-3">
							<h5 class="strong">Lesson Content Solutions</h5>
							<div class="control">
  							<label class="radio"><input type="radio" name="lesson-content-solutions" ng-model="lessonContentSolutions" ng-value='"Project-Based Learning"' value="project_based_learning_lesson_content"> Project-Based Learning</label>
							</div>
							<div class="control">
  							<label class="radio"><input type="radio" name="lesson-content-solutions" ng-model="lessonContentSolutions" ng-value='"Customized Content Creation"' value="customized_content_lesson_content"> Customized Content Creation</label>
							</div>
							<div class="control">
  							<label class="radio"><input type="radio" name="lesson-content-solutions" ng-model="lessonContentSolutions" ng-value='"Educational Resources"' value="educational_resources_lesson_content"> Educational Resources (ERC)</label>
							</div>
						</div>
						<div class="column is-3">
							<h5 class="strong">STEM Solutions</h5>
							<div class="control">
  							<label class="radio"><input type="radio" name="stem-solutions" ng-model="stemSolutions" ng-value='"General STEM"' value="general_stem"> General STEM</label>
							</div>
							<div class="control">
  							<label class="radio"><input type="radio" name="stem-solutions" ng-model="stemSolutions" ng-value='"STEM Coding"' value="coding_stem"> Coding</label>
							</div>
							<div class="control">
  							<label class="radio"><input type="radio" name="stem-solutions" ng-model="stemSolutions" ng-value='"STEM Robotics"' value="robotics_stem"> Robotics</label>
							</div>
							<div class="control">
  							<label class="radio"><input type="radio" name="stem-solutions" ng-model="stemSolutions" ng-value='"Hydroponics"' value="hydroponics_stem"> Hydroponics</label>
							</div>
						</div>
						<div class="column is-3">
							<h5 class="strong">Classroom Transformation Solutions</h5>
							<div class="control">
  							<label class="radio"><input type="radio" name="classroom-transformation-solutions" ng-model="classroomTransformationSolutions" ng-value='"SMART Board/SMART Learning Suite"' value="smartboard_classroom_solutions"> SMART Board/SMART Learning Suite</label>
							</div>
							<div class="control">
  							<label class="radio"><input type="radio" name="classroom-transformation-solutions" ng-model="classroomTransformationSolutions" ng-value='"Active Learning Spaces"' value="active_spaces_classroom_solutions"> Active Learning Spaces</label>
							</div>
							<div class="control">
  							<label class="radio"><input type="radio" name="classroom-transformation-solutions" ng-model="classroomTransformationSolutions" ng-value='"Evospaces (Furniture)"' value="evospaces_classroom_solutions"> Evospaces (furniture)</label>
							</div>
						</div>
						<div class="column is-3">
							<h5 class="strong">Grade Band</h5>
							<div class="control">
  							<label class="radio"><input type="radio" name="grade-band-level" ng-model="gradeBand" ng-value='"Grades K-2"' value="grades-k-2"> Grades K-2</label>
							</div>
							<div class="control">
  							<label class="radio"><input type="radio" name="grade-band-level" ng-model="gradeBand" ng-value='"Grades 3-5"' value="grades-3-5"> Grades 3-5</label>
							</div>
							<div class="control">
  							<label class="radio"><input type="radio" name="grade-band-level" ng-model="gradeBand" ng-value='"Grades 6-8"' value="grades-6-8"> Grades 6-8</label>
							</div>
							<div class="control">
  							<label class="radio"><input type="radio" name="grade-band-level" ng-model="gradeBand" ng-value='"Grades 9-12"' value="grades-9-12"> Grades 9-12</label>
							</div>
						</div>
						<div class="column is-3">
							<h5 class="strong">Subject Matter</h5>
							<div class="control">
							  <label class="radio"><input type="radio" name="subject-matter" ng-model="subjectMatter" ng-value='"ELA"' value="ela"> ELA</label>
							</div>
							<div class="control">
							  <label class="radio"><input type="radio" name="subject-matter" ng-model="subjectMatter" ng-value='"Engineering"' value="engineering"> Engineering</label>
							</div>
							<div class="control">
							  <label class="radio"><input type="radio" name="subject-matter" ng-model="subjectMatter" ng-value='"English"' value="english"> English</label>
							</div>
							<div class="control">
							  <label class="radio"><input type="radio" name="subject-matter" ng-model="subjectMatter" ng-value='"Math"' value="math"> Math</label>
							</div>
							<div class="control">
							  <label class="radio"><input type="radio" name="subject-matter" ng-model="subjectMatter" ng-value='"Science"' value="science"> Science</label>
							</div>
							<div class="control">
							  <label class="radio"><input type="radio" name="subject-matter" ng-model="subjectMatter" ng-value='"Social Studies"' value="social-studies"> Social Students</label>
							</div>
							<div class="control">
							  <label class="radio"><input type="radio" name="subject-matter" ng-model="subjectMatter" ng-value='"Special Education"' value="special-education"> Engineering</label>
							</div>
							<div class="control">
							  <label class="radio"><input type="radio" name="subject-matter" ng-model="subjectMatter" ng-value='"STEM"' value="stem"> STEM</label>
							</div>
						</div>
						<div class="column is-3">
							<h5 class="strong">Technology Proficiency</h5>
							<div class="control">
  							<label class="radio"><input type="radio" name="technology-proficiency" ng-model="technologyProficiency" ng-value='"Easy Proficiency"' value="easy-technology-Proficiency"> Easy Proficiency</label>
							</div>
							<div class="control">
  							<label class="radio"><input type="radio" name="technology-proficiency" ng-model="technologyProficiency"  ng-value='"Intermediate Proficiency"' value="intermediate-technology-Proficiency"> Intermediate Proficiency</label>
							</div>
							<div class="control">
  							<label class="radio"><input type="radio" name="technology-proficiency" ng-model="technologyProficiency"  ng-value='"Advanced Proficiency"' value="advanced-technology-Proficiency"> Advanced Proficiency</label>
							</div>
						</div>
					</div>
				</section>

			</div>
		</section>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
