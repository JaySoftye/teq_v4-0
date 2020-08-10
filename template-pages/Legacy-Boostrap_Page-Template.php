<?php
/**
 * Template Name: Legacy Bootstrap Page Template
 * template for moving over old Teq.com pages using the Boostrap Theme
 * @package Teq_v4.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
    <meta http-equiv="content-type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
    <meta name="description" content="<?php echo esc_attr( get_bloginfo( 'description' ) ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>

		<?php wp_reset_query();
			the_content();
				wp_footer();
		?>

	</body>
</html>
