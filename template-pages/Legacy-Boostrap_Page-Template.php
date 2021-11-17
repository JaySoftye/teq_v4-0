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
		<div id="demoRequest" class="modal">
<div class="modal-background"></div>
<div class="modal-card" style="max-width:500px;">
<header class="modal-card-head"></header>
<section class="modal-card-body">
<p style="font-size:15px;">There’s a SMART display for every classroom. Discover a range of high-quality interactive displays engineered for the simplicity teachers want. Easy to deploy and support, they’re a solid investment for any EdTech budget. <br><br><strong>Ready to get your SMART interactive flat panel?</strong> Schedule a FREE Demo using the form below.</p>
<!--[if lte IE 8]>
<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
<![endif]-->
<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
<script>
hbspt.forms.create({
	region: "na1",
	portalId: "182596",
	formId: "4785b1b7-90b2-4e14-af33-5c7c141e8706",
	onFormReady: function($form) {
		$('input[type="submit"]').css("display","none");
		var title = $(document).attr('title');
		$('input[name="state"]').val(title)
		$( "#submitQuoteRequest" ).click(function() {
			$( "form.hs-form" ).submit();
		});
	}
});
</script>
</section>
<footer class="modal-card-foot">
<button id="submitQuoteRequest" class="button is-success" style="margin:0;border-radius:6px;box-shadow:none;font-weight:bold;">SUBMIT REQUEST</button> <button class="button is-white closeModal" style="margin:0 0 0 12px;border-radius:6px;box-shadow:none;">Cancel</button>
</footer>
</div>
</div>
<div id="downloadSmartBoardforEveryClassroom" class="modal">
<div class="modal-background"></div>
<div class="modal-card">
<header class="modal-card-head" style="padding:0 0;align-items:flex-start;"><img src="/wp-content/uploads/2021/08/smart-boards-one-smar-choice_mailer-landing-download-button.png"><button class="delete closeModal" style="padding:0 0;margin-right:12px;margin-top: 12px;"></button></header>
<section class="modal-card-body">
<p style="font-size:15px;">There’s a SMART display for every classroom. <strong>Download our FREE SMART Display guide</stong> using the form below.</p>
<!--[if lte IE 8]>
<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
<![endif]-->
<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
<script>
  hbspt.forms.create({
	region: "na1",
	portalId: "182596",
	formId: "a91e5204-57d9-43f1-ae00-2393454a2b2b"
});
</script>
</section>
</div>
</div>
		<script>
		function modal_visibility(id) {
		  var e = document.getElementById(id);
		    e.classList.toggle('is-active');
		}

		var elements = document.getElementsByClassName('closeModal');
		var modals = document.getElementsByClassName('modal');

		var closeAllModal = function() {
		    for (var i = 0; i < modals.length; i++) {
		        modals[i].classList.remove("is-active");
		    }
		};

		for (var i = 0; i < elements.length; i++) {
		    elements[i].addEventListener('click', closeAllModal, false);
		}
		</script>
	</body>
</html>
