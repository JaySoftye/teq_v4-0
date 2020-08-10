<?php
/**
 * Template Name: Create Your Solution Quote Request
 * The template for displaying the Create Your Solution Successfull Quote Request Submission
 * @package Teq_v4.0
 */

get_header();

	if( isset($_POST['submit']) ){
		$quoteName = htmlspecialchars(stripslashes(trim($_POST['quote_name'])));
		$quoteNameTitle = htmlspecialchars(stripslashes(trim($_POST['quote_name_title'])));
		$quoteNameEmail = htmlspecialchars(stripslashes(trim($_POST['quote_name_email'])));
		$quoteNamePhone = htmlspecialchars(stripslashes(trim($_POST['quote_name_phone'])));
		$quoteNameSchool = htmlspecialchars(stripslashes(trim($_POST['quote_name_school'])));
	}

	$quoteNameItems = $_POST['quote_items'];

	if( isset($_POST['submit']) ){
		$to = 'jay@teq.com';
		$from = $quoteNameEmail;
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: '.$from."\r\n".
    	'Reply-To: '.$from."\r\n" .
    	'X-Mailer: PHP/' . phpversion();
		$subject = "New Teq.com Solution Set Quote Request";
		$body = "<html>
			<head></head>
			<body>
				<h3>Quote Request For: </h3>
				<table style='border-collapse:collapse';>
				<tbody>
					<tr>
						<td valign='middle' style='font-size:14px;padding:12px;'>NAME:</td>
						<td valign='middle' style='font-weight:bold;font-size:24px;padding:12px;'>$quoteName</td>
					</tr>
					<tr>
						<td valign='middle' style='font-size:14px;padding:12px;'>TITLE:</td>
						<td valign='middle' style='font-size:18px;padding:12px;'>$quoteNameTitle</td>
					</tr>
					<tr>
						<td valign='middle' style='font-size:14px;padding:12px;'>SCHOOL OR DISTRICT:</td>
						<td valign='middle' style='font-weight:bold;font-size:18px;padding:12px;'>$quoteNameSchool</td>
					</tr>
					<tr>
						<td valign='middle' style='font-size:14px;padding:12px;'>PHONE:</td>
						<td valign='middle' style='font-size:18px;padding:12px;'>$quoteNamePhone</td>
					</tr>
					<tr>
						<td valign='middle' style='font-size:14px;padding:12px;'>EMAIL:</td>
						<td valign='middle' style='font-size:18px;padding:12px;'>$quoteNameEmail</td>
					</tr>
					<tr>
						<td valign='top' style='font-size:14px;padding:12px;'>QUOTE REQUEST FOR:</td>
						<td valign='top' style='font-size:18px;padding:12px;'>";
					foreach ($quoteNameItems as $item) {
		$body .= $item . '<br >';
					}
		$body .= "</td>
						</tr>
					</tbody>
				</table>
			</body>
			</html>"; //end of $message
	?>

<div id="primary" class="content-area" scroll>
	<main id="main" class="site-main section-container">

		<section class="full-section grey-background create-your-solution-container">
			<div class="container padding-top padding-bottom">

				<section class="welcome columns is-multiline is-centered is-vcentered is-desktop">
					<div class="image-cover">
						<?php
							// Get the Feature Image
							echo get_the_post_thumbnail( get_the_ID(), 'full', array( 'class' => 'feature-image-cover' ));
						?>
					</div>
					<div class="column is-9-desktop is-full-mobile">
						<?php if( mail($to, $subject, $body, $headers) ) { ?>
							<h1 class="strong">Thanks <?php echo $quoteName; ?>,</h1>
							<div class="notification is-info drop-shadow">
								A Teq Representative will be reaching out shortly, if you have any immediate questions feel free to contact us directly at: <strong>877.455.9369</strong>
							</div>
						<?php } else { ?>
							<h1>Sorry <?php echo $quoteName; ?></h1>
							<div class="notification is-danger drop-shadow">
								An error has occured, try submitting again.
							</div>
						<?php	} ?>
					</div>
				</section>

			</div>
		</section>

	</main>
</div>

<?php }
get_footer();
