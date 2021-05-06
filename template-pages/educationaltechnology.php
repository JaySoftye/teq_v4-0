<?php
/**
 * Template Name: Educational Technology
 * The template for displaying Edtech products including SMART
 * @package Teq_v4.0
 */

get_header();
?>
<div id="product-form" product-title="" class="modal product-pricing">
	<div class="modal-background"></div>
	<div class="modal-content is-centered columns">
		<section class="modal-card-body column is-three-quarters rounded-corners">
			<img id="product-image" src />
			<p>To request exact pricing for <strong id="product-form-title"></strong>, simply fill out the form below and a Teq Representative will reach out to you directly.</p>
			<br />
			<!--[if lte IE 8]>
			<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
			<![endif]-->
			<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
			<script>
				hbspt.forms.create({
					portalId: "182596",
					formId: "2c1fcff8-e0a3-4b79-8745-b53e2125a305",
					submitButtonClass: '',
					inlineMessage: 'Request Submitted, Thanks.',
					onFormSubmit: function($form) {

						// GRAB THE PAGE TITLE AND SET 'BLANK' HIDDEN INPUT FIELD AS TITLE OF THE PAGE
						var title = $("#product-form").attr("product-title");
						$('input[name="blank"]').val(title)

						// SET REDIRECT WITH FORM DATA IN URL
						setTimeout( function() {
							var formData = $form.serialize();
							window.location = "/thankyouforyourinterest?" + formData;
						}, 250 ); // Redirects to url with query string data from form fields after 250 milliseconds.
					}
				});
			</script>
		</section>
	</div>
	<button class="modal-close is-large" aria-label="close"></button>
</div>

<div id="primary" class="content-area" scroll>
	<main id="main" class="site-main section-container">

		<section class="full-section educational-technology target-element action">
			<div class="fluid-width columns is-desktop">
				<div class="column is-4 is-offset-2">
					<h1>Educational<br />Technology</h1>
					<h5 class="scroll-icon dark-icon strong less-line-height">From the latest interactive displays and learning spaces that foster collaborative learning, to classroom audio systems and instructional software, technology plays an integral part in 21st century learning.</h5>
				</div>
				<div class="half-background">
					<?php
					if (have_posts()) :
						while (have_posts()) :
							the_post();
							// Check if content is empty
							if ( $post->post_content !== "" ) :
								the_content();
							else :
					?>
					<div class="featured-product-browse edtech-default"></div>
					<?php
							endif;
						endwhile;
					endif;
					?>
				</div>
			</div>
		</section>

		<section class="full-section grey-background">
			<div class="columns is-multiline">

				<div class="filter-container showHideElement">
					<form class="list-filters">
						<div class="filter-item non-filter">
							<label>Product Filters</label> <div class="tooltip"><a><b>&nbsp; [?]</b></a><div class="tooltiptext"><span class="tooltip-inner">Technology proficiency ranks the complexity level for teachers as they implement the product into their instruction.</span></div></div>
						</div>
						<div class="filter-item" ng-controller="edTechFilter">
							<select class="product-filter"  id="selectedEdTechLevel" ng-model="selectedEdTech" ng-options="item.id as item.name for item in items track by item.id">
								<option value="" selected disabled>Product Type</option>
							</select>
							<span class="down-arrow"></span>
						</div>
						<div class="filter-item" ng-controller="gradeLevelFilter">
							<select class="product-filter"  id="selectedGradeLevel" ng-model="selectedGradeLevel" ng-options="item.id as item.name for item in items track by item.id">
								<option value="" selected disabled>Grade Level</option>
							</select>
							<span class="down-arrow"></span>
						</div>
						<div class="filter-item" ng-controller="technologyProficiencyFilter">
							<select class="product-filter"  id="selectedtechnologyProficiencyLevel" ng-model="selectedtechnologyProficiencyLevel" ng-options="item.id as item.name for item in items track by item.id">
								<option value="" selected disabled>Technology Proficiency</option>
							</select>
							<span class="down-arrow"></span>
						</div>
						<div class="filter-item non-filter">
							<input class="reset-filters" type="reset" value="Reset Filters">
						</div>
					</form>
				</div>

				<div class="no-products-found column is-full" style="display: none;">
					<div class="columns is-centered margin-top">
						<div class="column is-half">
							<div class="product-container padding">
								<svg version="1.1" class="quarter-width margin-auto" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 30 30">
									<path d="M28.604,18.203l-4.11-3.458c-0.01-0.008-0.02-0.014-0.021-0.014l-9.244-2.781c-0.046-0.015-0.095-0.013-0.138,0 L5.72,14.809c-0.015,0.005-0.029,0.012-0.041,0.02l-4.087,3.4c-0.064,0.055-0.095,0.14-0.081,0.223 c0.015,0.083,0.073,0.153,0.152,0.182l3.724,1.376v4.501c0,0.099,0.062,0.188,0.156,0.223l9.51,3.512l0.028,0.008 c0.019,0.005,0.037,0.007,0.054,0.007s0.035-0.002,0.054-0.007l9.533-3.486c0.095-0.035,0.156-0.123,0.156-0.224v-4.529 l3.655-1.405c0.078-0.028,0.136-0.099,0.15-0.183C28.699,18.342,28.668,18.257,28.604,18.203z M19.105,22.198L19.105,22.198 l0.019,0.004l0.048-0.003c0.02-0.002,0.038-0.007,0.054-0.014l5.178-1.99v4.181l-9.03,3.305v-8.899l3.601,3.354 c0.021,0.02,0.045,0.035,0.092,0.053C19.082,22.194,19.1,22.198,19.105,22.198z M19.193,21.688l-3.61-3.361l8.714-3.125 l3.691,3.106L19.193,21.688z M12.815,13.142c0.128,0.247,0.284,0.493,0.465,0.73c0.077,0.102,0.235,0.122,0.333,0.045 c0.104-0.08,0.125-0.229,0.045-0.333c-0.146-0.191-0.273-0.388-0.38-0.584l1.881-0.574l8.424,2.525l-8.451,3.031l-8.562-2.938 L12.815,13.142z M5.863,20.185l5.281,1.95c0.017,0.007,0.035,0.012,0.053,0.015l0.007,0.003l0.066-0.005 c0.014-0.003,0.031-0.008,0.054-0.016c0.027-0.011,0.05-0.026,0.07-0.045l3.503-3.301v8.893l-9.034-3.335V20.185z M2.214,18.33 L5.85,15.3l8.836,3.032l-3.51,3.308L2.214,18.33z"></path>
									<path d="M16.157,22.552c-0.044,0.044-0.044,0.116,0,0.16l3.178,3.179c0.022,0.022,0.051,0.033,0.08,0.033s0.058-0.011,0.08-0.033 c0.044-0.044,0.044-0.116,0-0.16l-3.179-3.179C16.273,22.508,16.201,22.508,16.157,22.552z"></path>
									<path d="M16.326,23.762c-0.044-0.044-0.116-0.044-0.16,0c-0.044,0.044-0.044,0.116,0,0.16l1.958,1.958 c0.022,0.022,0.051,0.033,0.08,0.033c0.029,0,0.058-0.011,0.08-0.033c0.044-0.044,0.044-0.116,0-0.16L16.326,23.762z"></path>
									<path d="M14.239,25.371c-0.044-0.044-0.116-0.044-0.16,0l-1.143,1.143c-0.044,0.044-0.044,0.116,0,0.16 c0.022,0.022,0.051,0.033,0.08,0.033s0.058-0.011,0.08-0.033l1.143-1.143C14.283,25.487,14.283,25.416,14.239,25.371z"></path>
									<path d="M14.335,26.065l-0.704,0.704c-0.044,0.044-0.044,0.116,0,0.16c0.022,0.022,0.051,0.033,0.08,0.033s0.058-0.011,0.08-0.033 l0.704-0.704c0.044-0.044,0.044-0.116,0-0.16C14.45,26.021,14.379,26.021,14.335,26.065z"></path>
									<path d="M19.076,3.57c0.005,0.002,0.009,0.005,0.015,0.008c-0.002,0.003-0.003,0.006-0.005,0.009 C19.019,3.691,18.96,3.8,18.908,3.914c-0.059,0.129-0.047,0.253,0.037,0.366c0.067,0.091,0.16,0.137,0.272,0.14 c0.125,0.004,0.249,0.001,0.373-0.012c0.004,0,0.007-0.001,0.013-0.001c0,0.004,0,0.008,0,0.012 c-0.001,0.16,0.028,0.315,0.087,0.464c0.017,0.043,0.059,0.065,0.104,0.056c0.077-0.016,0.152-0.04,0.224-0.071 c0.081-0.034,0.158-0.077,0.23-0.128c0.122-0.087,0.227-0.193,0.309-0.319c0.18-0.277,0.241-0.579,0.184-0.904 C20.741,3.513,20.74,3.51,20.74,3.505c0.004,0.003,0.006,0.005,0.008,0.007c0.098,0.09,0.19,0.185,0.28,0.282 c0.037,0.04,0.074,0.08,0.111,0.12c0.035,0.038,0.091,0.04,0.128,0.006c0.038-0.034,0.041-0.091,0.006-0.129 c-0.124-0.136-0.249-0.271-0.383-0.396c-0.075-0.07-0.152-0.136-0.233-0.197c-0.004-0.003-0.008-0.008-0.009-0.013 c-0.032-0.178-0.083-0.35-0.143-0.52c-0.035-0.1-0.073-0.199-0.11-0.299c-0.018-0.048-0.07-0.071-0.117-0.054 c-0.048,0.018-0.072,0.069-0.054,0.117c0.035,0.096,0.072,0.192,0.106,0.289c0.028,0.08,0.052,0.161,0.077,0.241 c0.001,0.003,0.001,0.006,0.002,0.01c-0.019-0.014-0.037-0.027-0.055-0.04c-0.314-0.211-0.655-0.27-1.022-0.176 c-0.091,0.023-0.177,0.059-0.259,0.104c-0.004,0.002-0.008,0.004-0.012,0.005c-0.03,0.019-0.06,0.037-0.091,0.056 c-0.02,0.015-0.04,0.03-0.06,0.045c-0.078,0.06-0.148,0.128-0.209,0.205c-0.028,0.035-0.027,0.083,0.003,0.117 C18.811,3.404,18.935,3.498,19.076,3.57z M19.62,4.222c-0.031,0.003-0.062,0.007-0.093,0.009c-0.101,0.008-0.201,0.01-0.302,0.007 c-0.127-0.003-0.206-0.13-0.153-0.245c0.055-0.118,0.116-0.231,0.189-0.339c0.002-0.003,0.004-0.005,0.006-0.008 c0.189,0.058,0.381,0.072,0.579,0.04C19.727,3.849,19.653,4.026,19.62,4.222z M20.502,3.42c0.012-0.004,0.029,0.006,0.034,0.021 c0.019,0.064,0.033,0.129,0.039,0.196c0.027,0.319-0.068,0.597-0.288,0.83c-0.088,0.094-0.192,0.167-0.31,0.219 c-0.046,0.021-0.094,0.038-0.145,0.058c-0.009-0.036-0.018-0.068-0.025-0.099c-0.036-0.173-0.03-0.344,0.019-0.513 c0.056-0.194,0.158-0.36,0.308-0.496C20.241,3.538,20.364,3.466,20.502,3.42z M18.97,3.151c0.219-0.188,0.473-0.276,0.761-0.255 c0.248,0.017,0.463,0.114,0.644,0.285c0.005,0.005,0.006,0.015,0.009,0.022c0.005,0.01-0.003,0.014-0.008,0.02 c-0.092,0.09-0.196,0.161-0.314,0.211c-0.206,0.089-0.419,0.11-0.638,0.066c-0.198-0.04-0.371-0.13-0.518-0.269 c-0.003-0.003-0.005-0.005-0.009-0.009C18.922,3.197,18.945,3.173,18.97,3.151z"></path>
									<path d="M18.031,4.725c0.017,0,0.034-0.004,0.05-0.012c0.132-0.065,0.268-0.13,0.405-0.191c0.057-0.026,0.082-0.093,0.056-0.149 c-0.026-0.057-0.093-0.082-0.149-0.056c-0.139,0.063-0.277,0.128-0.411,0.194c-0.056,0.028-0.079,0.095-0.051,0.151 C17.95,4.702,17.99,4.725,18.031,4.725z"></path>
									<path d="M15.066,6.912c0.032,0,0.064-0.014,0.086-0.04c0.188-0.222,0.403-0.441,0.637-0.651c0.046-0.042,0.05-0.113,0.009-0.159 c-0.042-0.046-0.113-0.05-0.159-0.009c-0.242,0.217-0.464,0.443-0.659,0.673c-0.04,0.048-0.035,0.119,0.013,0.159 C15.015,6.903,15.04,6.912,15.066,6.912z"></path>
									<path d="M14.272,9.095c0.018,0.044,0.06,0.07,0.105,0.07c0.014,0,0.029-0.003,0.043-0.008c0.241-0.098,0.468-0.124,0.663-0.073 c0.048,0.012,0.097,0.03,0.146,0.053c0.057,0.026,0.124,0.001,0.15-0.055c0.026-0.057,0.001-0.124-0.055-0.15 c-0.061-0.028-0.123-0.05-0.184-0.066c-0.243-0.062-0.518-0.034-0.805,0.083C14.276,8.972,14.248,9.038,14.272,9.095z"></path>
									<path d="M14.766,11.033c-0.168,0-0.314-0.035-0.421-0.101c0,0-0.006-0.004-0.006-0.004l-0.06,0.096l-0.054,0.1 c0.144,0.089,0.331,0.135,0.54,0.135c0.144,0,0.297-0.023,0.444-0.065c0.06-0.017,0.094-0.08,0.077-0.14 c-0.017-0.06-0.08-0.094-0.14-0.077C15.021,11.013,14.889,11.033,14.766,11.033z"></path>
									<path d="M16.438,5.671c0.023,0,0.046-0.007,0.066-0.021c0.24-0.172,0.498-0.34,0.769-0.5c0.054-0.032,0.071-0.101,0.04-0.155 c-0.032-0.054-0.101-0.071-0.155-0.04c-0.276,0.163-0.541,0.335-0.786,0.511c-0.051,0.036-0.062,0.107-0.026,0.158 C16.369,5.655,16.403,5.671,16.438,5.671z"></path>
									<path d="M15.819,9.727c0.069,0.14,0.105,0.285,0.105,0.418c0,0.061-0.008,0.121-0.023,0.177c-0.017,0.063-0.043,0.124-0.078,0.182 c-0.032,0.053-0.015,0.123,0.038,0.155c0.018,0.011,0.038,0.016,0.058,0.016c0.038,0,0.075-0.019,0.097-0.054 c0.046-0.077,0.081-0.158,0.104-0.242c0.02-0.076,0.03-0.155,0.03-0.235c0-0.168-0.044-0.347-0.129-0.518 c-0.028-0.056-0.095-0.079-0.151-0.051C15.815,9.603,15.792,9.671,15.819,9.727z"></path>
									<path d="M14.165,14.338c-0.045-0.043-0.116-0.042-0.16,0.003c-0.043,0.045-0.042,0.116,0.003,0.16 c0.219,0.212,0.46,0.417,0.716,0.61c0.02,0.015,0.044,0.023,0.068,0.023c0.034,0,0.068-0.016,0.09-0.045 c0.037-0.05,0.027-0.121-0.022-0.158C14.611,14.742,14.377,14.544,14.165,14.338z"></path>
									<path d="M12.687,12.18c0.007,0,0.014-0.001,0.02-0.002c0.061-0.011,0.102-0.07,0.091-0.131c-0.028-0.153-0.042-0.304-0.042-0.451 c0-0.146,0.014-0.29,0.042-0.428c0.012-0.061-0.027-0.121-0.088-0.133c-0.061-0.012-0.121,0.027-0.133,0.089 c-0.031,0.152-0.046,0.311-0.046,0.472c0,0.16,0.015,0.325,0.046,0.491C12.586,12.141,12.633,12.18,12.687,12.18z"></path>
									<path d="M14.104,8.499c0.012,0.004,0.024,0.006,0.036,0.006c0.047,0,0.091-0.03,0.107-0.077c0.094-0.278,0.221-0.553,0.377-0.819 c0.032-0.054,0.014-0.123-0.04-0.155c-0.054-0.032-0.123-0.014-0.155,0.04c-0.165,0.279-0.298,0.569-0.397,0.862 C14.013,8.415,14.045,8.479,14.104,8.499z"></path>
									<path d="M13.033,10.403c0.038,0,0.076-0.019,0.097-0.055c0.153-0.254,0.347-0.495,0.56-0.698c0.045-0.043,0.047-0.114,0.004-0.16 c-0.043-0.045-0.115-0.047-0.16-0.004c-0.227,0.216-0.434,0.474-0.598,0.745c-0.032,0.053-0.015,0.123,0.038,0.155 C12.993,10.398,13.014,10.403,13.033,10.403z"></path>
									<path d="M13.889,10.331c0.004,0,0.007,0,0.011-0.001c0.062-0.006,0.107-0.061,0.101-0.123c-0.008-0.078-0.011-0.162-0.011-0.251 c0-0.193,0.018-0.41,0.054-0.645c0.009-0.062-0.033-0.119-0.095-0.128c-0.062-0.01-0.119,0.033-0.129,0.095 c-0.037,0.247-0.056,0.475-0.056,0.679c0,0.096,0.004,0.188,0.012,0.273C13.783,10.287,13.832,10.331,13.889,10.331z"></path>
									<path d="M15.909,15.857c0.017,0.009,0.035,0.013,0.053,0.013c0.041,0,0.08-0.022,0.1-0.06c0.029-0.055,0.008-0.123-0.047-0.153 c-0.131-0.069-0.262-0.143-0.389-0.218c-0.054-0.032-0.123-0.014-0.155,0.04c-0.032,0.054-0.014,0.123,0.04,0.155 C15.64,15.711,15.774,15.786,15.909,15.857z"></path>
									<path d="M11.431,10.151c0.008,0,0.017-0.001,0.025-0.004c0.039-0.014,0.06-0.057,0.046-0.096l-0.751-2.127 c-0.014-0.039-0.057-0.06-0.096-0.046c-0.039,0.014-0.06,0.057-0.046,0.096l0.751,2.127C11.371,10.132,11.4,10.151,11.431,10.151z"></path>
									<path d="M10.219,10.843c0.011,0.006,0.024,0.009,0.036,0.009c0.027,0,0.053-0.014,0.066-0.039c0.02-0.036,0.006-0.082-0.03-0.102 L8.314,9.634c-0.037-0.02-0.082-0.006-0.102,0.03c-0.02,0.036-0.006,0.082,0.03,0.102L10.219,10.843z"></path>
									<path d="M7.922,13.327l2.278-0.601c0.04-0.011,0.064-0.052,0.054-0.092c-0.011-0.04-0.052-0.064-0.092-0.054l-2.278,0.601 c-0.04,0.011-0.064,0.052-0.054,0.092c0.009,0.034,0.039,0.056,0.073,0.056C7.909,13.33,7.915,13.329,7.922,13.327z"></path>
									<path d="M19.119,10.027c-0.013,0.039,0.008,0.082,0.048,0.095c0.008,0.003,0.016,0.004,0.024,0.004c0.031,0,0.061-0.02,0.071-0.052 l0.751-2.253c0.013-0.039-0.008-0.082-0.048-0.095c-0.04-0.013-0.082,0.008-0.095,0.048L19.119,10.027z"></path>
									<path d="M20.401,10.663c0.014,0.025,0.039,0.039,0.066,0.039c0.012,0,0.025-0.003,0.036-0.009l2.002-1.101 c0.036-0.02,0.05-0.066,0.03-0.102c-0.02-0.036-0.066-0.05-0.102-0.03l-2.002,1.101C20.394,10.581,20.38,10.626,20.401,10.663z"></path>
									<path d="M20.52,12.306c-0.013,0.04,0.009,0.082,0.049,0.095l2.277,0.726c0.008,0.002,0.015,0.004,0.023,0.004 c0.032,0,0.062-0.02,0.072-0.052c0.013-0.04-0.009-0.082-0.049-0.095l-2.277-0.726C20.575,12.244,20.533,12.266,20.52,12.306z"></path>
								</svg>
								<h3 class="has-text-centered">We're sorry, we couldn't find a match for the filters you have selected.</h3>
								<h3 class="has-text-centered"><input type="reset" class="reset-filters reset-text" value="RESET FILTERS"></h3>
							</div>
						</div>
					</div>
				</div>

				<div class="column is-full filter-results">
					<div class='columns is-multiline'>

						<?php if ( have_posts() ) :
							$args = array(
								'post_type' => 'product-and-service',
								'category_name' => 'teq-product',
								'taxonomy' => 'topic',
								'posts_per_page' => -1,
								'orderby' => 'title',
								'order'   => 'ASC',
								'tax_query' => array(
									array (
										'taxonomy' => 'topics',
										'field' => 'slug',
										'terms' => 'Educational Technology'
									)
								),
							);

						$the_query = new WP_Query( $args );
							while ($the_query -> have_posts()) : $the_query -> the_post();
								$custom_url = get_post_meta( $post->ID, 'custom_url_meta_content', true );
								$image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'full' );

								// GET ALL THE CUSTON TAXONOMIES FOR THE Custom Post Type
								$taxonomies = array('topics', 'grades', 'proficiency', 'curriculum');
								$terms = wp_get_post_terms( get_the_ID(), $taxonomies, [ 'fields' => 'id=>slug'] );
						?>

						<article class="<?php echo the_title() . ' '; echo implode( ' ', $terms ); ?> column is-three-quarters-mobile is-one-third-tablet is-one-quarter-desktop is-one-fifth-widescreen is-one-fifth-fullhd product-item">
							<div class="product-container">
								<div class="product-content">
									<h3>
										<a href="<?php if(empty( $custom_url)) { the_permalink(); } else { echo get_post_meta( $post->ID, 'custom_url_meta_content', true ); } ?>">
											<?php the_title(); ?>
										</a>
									</h3>
									<?php the_excerpt(); ?>
									<p class="product-filter-list toggle-content" style="display:none;">
										<strong>PRODUCT FILTERS:</strong><br />
										<?php
											$terms = get_the_terms( $post->ID, 'topics' );
											foreach($terms as $term) {
												echo '<span>' . $term -> name . '  /  </span>';
											}
										?>
									</p>
								</div>
								<a class="image-link" href="<?php if(empty( $custom_url)) { the_permalink(); } else { echo get_post_meta( $post->ID, 'custom_url_meta_content', true ); } ?>">
									<?php echo get_the_post_thumbnail( $post_id, 'full', array( 'class' => 'featured-image' ) ); ?>
								</a>
							</div>
							<div class="button-group">
								<a href="<?php if(empty( $custom_url)) { the_permalink(); } else { echo get_post_meta( $post->ID, 'custom_url_meta_content', true ); } ?>">More Info</a>
								<a class="pricing-modal-activate" data-title="<?php the_title(); ?>" data-image="<?php echo $image_url ?>">Get Pricing</a>
							</div>
						</article>

					<?php endwhile; endif; wp_reset_postdata(); // End have_posts() check. ?>

					</div>
				</div>
			</div>
		</section>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
