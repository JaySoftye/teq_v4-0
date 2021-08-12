<?php
/**
 * Template Name: Category, Grade Band, Curriculum Versatility, Ease of Use, and Enviornment
 * The template for displaying Category, Grade Band, Curriculum Versatility, Ease of Use, and Enviornment Taxonomies.
 * @package Teq_v4.0
 */

get_header();
?>

<div id="primary" class="content-area" scroll>
	<main id="main" class="site-main section-container product-taxonomies">
		<section class="content drop-shadow">
			<div class="table-container">
				<table class="table is-hoverable">
					<thead>
						<th></th>
						<td>K-2</td>
						<td>3-5</td>
						<td>6-8</td>
						<td>9-12</td>
						<td>Coding</td>
						<td>Engineering</td>
						<td>Robotics</td>
						<td>Hydroponics</td>
						<td>General Education</td>
						<td>ELA</td>
						<td>Math</td>
						<td>Science</td>
						<td>Social Studies</td>
						<td>Special Education</td>
						<td>Easy Proficiency</td>
						<td>Intermediate Proficiency</td>
						<td>Advanced Proficiency</td>
						<td>Subject Grade Specific</td>
						<td>Medium Curriculum Versatility</td>
						<td>High Curriculum Versatility</td>
						<td>Home</td>
						<td>Hybrid</td>
						<td>Classroom</td>
					</thead>
					<tbody>
						<?php
							$tax_query = array(
								'relation' => 'OR',
							);
							$tax_query[] = array(
								'taxonomy' => 'category',
								'field' => 'slug',
								'compare' => '=',
								'terms' => ['Coding', 'Engineering', 'Robotics', 'Hydroponics', 'General Education'],
							);
							$tax_query[] = array(
								'taxonomy' => 'topics',
								'field' => 'slug',
								'compare' => '=',
								'terms' => ['STEM Technologies', 'English Language Arts', 'Mathematics', 'Science', 'Social Studies', 'Special Education'],
							);
							$tax_query[] = array(
								'taxonomy' => 'grades',
								'field' => 'slug',
								'compare' => '=',
								'terms' => ['Grades K-2', 'Grades 3-5', 'Grades 6-8', 'Grades 9-12'],
							);
							$tax_query[] = array(
								'taxonomy' => 'proficiency',
								'field' => 'slug',
								'compare' => '=',
								'terms' => ['Easy Proficiency', 'Intermediate Proficiency', 'Advanced Proficiency'],
							);
							$tax_query[] = array(
								'taxonomy' => 'curriculum',
								'field' => 'slug',
								'compare' => '=',
								'terms' => ['Subject Grade Specific', 'Medium Curriculum Versatility', 'High Curriculum Versatility'],
							);
							$tax_query[] = array(
								'taxonomy' => 'environment',
								'field' => 'slug',
								'compare' => '=',
								'terms' => ['Classroom', 'Home', 'Hybrid'],
							);
							$args = array(
								'post_type' => 'product-and-service',
								'category_name' => 'teq-product',
								'posts_per_page' => -1,
								'orderby' => 'title',
								'order'   => 'ASC',
								'tax_query' => $tax_query,
							);
							$the_query = new WP_Query($args);
								if ( $wp_query->have_posts() ) :
									while ($the_query -> have_posts()) :
										$the_query -> the_post();
						?>
						<tr>
							<th>
								<a href="<?php echo get_post_meta( $post->ID, 'custom_url_meta_content', true ); ?>">
									<?php the_title(); ?>
								</a>
							</th>
							<td <?php if (has_term('grades-k-2', 'grades')) { echo 'class="checked"'; } ?>></td>
							<td <?php if (has_term('grades-3-5', 'grades')) { echo 'class="checked"'; } ?>></td>
							<td <?php if (has_term('grades-6-8', 'grades')) { echo 'class="checked"'; } ?>></td>
							<td <?php if (has_term('grades-9-12', 'grades')) { echo 'class="checked"'; } ?>></td>
							<td <?php if (in_category('Coding') ) { echo 'class="checked"'; } ?>></td>
							<td <?php if (in_category('Engineering') ) { echo 'class="checked"'; } ?>></td>
							<td <?php if (in_category('Robotics') ) { echo 'class="checked"'; } ?>></td>
							<td <?php if (in_category('Hydroponics') ) { echo 'class="checked"'; } ?>></td>
							<td <?php if (in_category('General Education') ) { echo 'class="checked"'; } ?>></td>
							<td <?php if (has_term('ela', 'topics')) { echo 'class="checked"'; } ?>></td>
							<td <?php if (has_term('mathematics', 'topics')) { echo 'class="checked"'; } ?>></td>
							<td <?php if (has_term('science', 'topics')) { echo 'class="checked"'; } ?>></td>
							<td <?php if (has_term('social-studies', 'topics')) { echo 'class="checked"'; } ?>></td>
							<td <?php if (has_term('special-education', 'topics')) { echo 'class="checked"'; } ?>></td>
							<td <?php if (has_term('easy-proficiency', 'proficiency')) { echo 'class="checked"'; } ?>></td>
							<td <?php if (has_term('intermediate-proficiency', 'proficiency')) { echo 'class="checked"'; } ?>></td>
							<td <?php if (has_term('advanced-proficiency', 'proficiency')) { echo 'class="checked"'; } ?>></td>
							<td <?php if (has_term('subject-grade-specific', 'curriculum')) { echo 'class="checked"'; } ?>></td>
							<td <?php if (has_term('medium-curriculum-versatility', 'curriculum')) { echo 'class="checked"'; } ?>></td>
							<td <?php if (has_term('high-curriculum-versatility', 'curriculum')) { echo 'class="checked"'; } ?>></td>
							<td <?php if (has_term('classroom', 'environment')) { echo 'class="checked"'; } ?>></td>
							<td <?php if (has_term('hybrid', 'environment')) { echo 'class="checked"'; } ?>></td>
							<td <?php if (has_term('home', 'environment')) { echo 'class="checked"'; } ?>></td>
						</tr>
						<?php endwhile; endif;
							$args = array(
								'post_type' => 'pathways',
								'posts_per_page' => -1,
								'orderby' => 'title',
								'order'   => 'ASC',
								'tax_query' => $tax_query,
							);
							$the_query = new WP_Query($args);
								if ( $wp_query->have_posts() ) :
									while ($the_query -> have_posts()) :
										$the_query -> the_post();
						?>
						<tr>
							<th>
								<a href="<?php echo get_post_meta( $post->ID, 'custom_url_meta_content', true ); ?>">
									<?php the_title(); ?>
								</a>
							</th>
							<td <?php if (has_term('grades-k-2', 'grades')) { echo 'class="checked"'; } ?>></td>
							<td <?php if (has_term('grades-3-5', 'grades')) { echo 'class="checked"'; } ?>></td>
							<td <?php if (has_term('grades-6-8', 'grades')) { echo 'class="checked"'; } ?>></td>
							<td <?php if (has_term('grades-9-12', 'grades')) { echo 'class="checked"'; } ?>></td>
							<td <?php if ( in_category('Coding') ) { echo 'class="checked"'; } ?>></td>
							<td <?php if ( in_category('Engineering') ) { echo 'class="checked"'; } ?>></td>
							<td <?php if ( in_category('Robotics') ) { echo 'class="checked"'; } ?>></td>
							<td <?php if ( in_category('Hydroponics') ) { echo 'class="checked"'; } ?>></td>
							<td <?php if ( in_category('General Education') ) { echo 'class="checked"'; } ?>></td>
							<td <?php if (has_term('ela', 'topics')) { echo 'class="checked"'; } ?>></td>
							<td <?php if (has_term('mathematics', 'topics')) { echo 'class="checked"'; } ?>></td>
							<td <?php if (has_term('science', 'topics')) { echo 'class="checked"'; } ?>></td>
							<td <?php if (has_term('social-studies', 'topics')) { echo 'class="checked"'; } ?>></td>
							<td <?php if (has_term('special-education', 'topics')) { echo 'class="checked"'; } ?>></td>
							<td <?php if (has_term('easy-proficiency', 'proficiency')) { echo 'class="checked"'; } ?>></td>
							<td <?php if (has_term('intermediate-proficiency', 'proficiency')) { echo 'class="checked"'; } ?>></td>
							<td <?php if (has_term('advanced-proficiency', 'proficiency')) { echo 'class="checked"'; } ?>></td>
							<td <?php if (has_term('subject-grade-specific', 'curriculum')) { echo 'class="checked"'; } ?>></td>
							<td <?php if (has_term('medium-curriculum-versatility', 'curriculum')) { echo 'class="checked"'; } ?>></td>
							<td <?php if (has_term('high-curriculum-versatility', 'curriculum')) { echo 'class="checked"'; } ?>></td>
							<td <?php if (has_term('classroom', 'environment')) { echo 'class="checked"'; } ?>></td>
							<td <?php if (has_term('hybrid', 'environment')) { echo 'class="checked"'; } ?>></td>
							<td <?php if (has_term('home', 'environment')) { echo 'class="checked"'; } ?>></td>
						</tr>
						<?php endwhile; endif; ?>

					</tbody>
				</table>
			</div>
		</section>
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
