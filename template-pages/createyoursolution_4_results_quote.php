<?php
/**
 * Template Name: Created Your Solution 4.0 Quote Request
 * The template for displaying a quote request
 * @package Teq_v4.0
 */

get_header();

	$postTitle = htmlspecialchars(stripslashes(trim($_POST['schoolNameQuote'])));
	$postName = htmlspecialchars(stripslashes(trim($_POST['schoolDetailsQuote'])));
	$postEmail = htmlspecialchars(stripslashes(trim($_POST['schoolEmailQuote'])));
	$postPhone = htmlspecialchars(stripslashes(trim($_POST['schoolTelQuote'])));
		$quoteNameItems = $_POST['quoted_items'];

	$post = "$postTitle from $postName at $postEmail | $postPhone has requested a quote for: ";
		foreach ($quoteNameItems as $item) {
	$post .= $item . ', ';
		};

		$submit = $_POST['submit'];

	if (isset($submit)) {

		global $user_ID;

		$new_post = array(
			'post_title' => $postTitle,
			'post_content' => $post,
			'post_status' => 'publish',
			'post_date' => date('Y-m-d H:i:s'),
			'post_type' => 'Custom-Solutions',
		);

		wp_insert_post($new_post);

	}
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main section-container">
		<section class="full-section create-your-solution-container">
			<div class="container padding">

				<section class="columns is-multiline is-centered is-desktop">

					<div class="column is-full-desktop is-full-mobile padding-bottom">
						<div class="has-text-centered">
							<h1>Thank you <b><?php echo $postTitle ?></b></h1>
							<h5>A Teq Representative will be reaching out shortly with your quote request, if you have any immediate questions feel free to contact us directly at: <strong>877.455.9369</strong></h5>
						</div>
					</div>

				</section>

			</div>
		</section>
	</main>
</div>

<?php
get_footer();
