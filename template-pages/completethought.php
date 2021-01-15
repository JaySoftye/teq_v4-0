<?php
/**
 * Template Name: The Complete Thought
 * The template for displaying Teq's Complete Thought Page
 * @package Teq_v4.0
 */

 get_header();
 ?>

 	<div id="primary" class="content-area" scroll>
 		<main id="main" class="site-main">
       <section class="section the-complete-thought">


         <div class="container">
 					<div class="columns">
 						<div class="column is-full-desktop is-full-tablet is-full-mobile has-text-centered">
           		<h1 class="serif-text text-shadow less-letter-spacing white-text title">We’re not the company you think we are.  </h1>
 							<section class="accordion-container" ng-controller="theCompleteThought">
								<div class="accordion-content">
									<h2 ng-repeat="item in items" class="accordion-item sub-header-title" ng-show="show == {{item.id}}" ng-bind-html="item.content|trustAsHtml"></h2>
								</div>
								<div class="accordion-ui">
									<button type="button" class="prev" ng-class="{'active': show > 1}" ng-disabled="show < 2" ng-click="prevItem()">
										<svg version="1.1" viewBox="0 0 50 50">
											<polygon points="22.005,3.425 0.289,25.142 0.293,25.146 0.289,25.15 21.957,46.817 29.104,39.67 19.622,30.189 49.594,30.189 49.594,20.082 19.641,20.082 29.152,10.571 	"/>
										</svg>
									</button>
									<button type="button" class="next" ng-class="{'active': show < {{items.length - 1}}}" ng-disabled="show > {{items.length - 1}}" ng-click="nextItem()">
										<svg version="1.1" viewBox="0 0 50 50">
											<polygon points="27.878,46.817 49.594,25.1 49.59,25.096 49.594,25.092 27.926,3.425 20.779,10.572 30.261,20.053 0.289,20.053  0.289,30.16 30.242,30.16 20.731,39.671 	"/>
										</svg>
									</button>
								</div>
 							</section>
 						</div>
 					</div>
         </div>

				 <div class="sticky-bottom-container">
					 <div class="container">
						 <div class="columns">
							 <div class="column is-full">
								 <a href id="caseStudyDownload" class="flex-button serif-text modal-open-button">
                   <svg version="1.1" viewBox="0 0 50 50">
                   	<path fill="#FAEF02" d="M24.535,36.851c0.994-0.757,1.929-1.468,2.907-2.212c0.322,0.504,0.605,0.947,0.904,1.416 c-0.331,0.249-0.62,0.466-0.91,0.683c0.013,0.025,0.027,0.05,0.04,0.074c0.669-0.173,1.338-0.347,2.09-0.542 c0.134,0.522,0.265,1.029,0.407,1.582c-0.248,0.078-0.483,0.15-0.716,0.224c-1.717,0.543-3.431,1.097-5.155,1.618 c-0.268,0.081-0.612,0.095-0.868-0.001c-4.476-1.671-9.089-2.731-13.851-3.111c-1.424-0.114-2.854-0.153-4.283-0.204 c-0.881-0.031-1.154-0.282-1.155-1.157c-0.001-5.669-0.001-11.338-0.001-17.008c0-0.213,0-0.427,0-0.684c-0.569,0-1.114,0-1.706,0 c0,7.117,0,14.255,0,21.455c0.215,0,0.424,0,0.633,0c5.096,0,10.192,0.005,15.288-0.007c0.524-0.001,0.912,0.159,1.266,0.551 c0.563,0.623,1.167,1.21,1.78,1.784c0.149,0.139,0.401,0.233,0.607,0.236c1.233,0.022,2.468,0.024,3.701-0.001 c0.22-0.004,0.486-0.116,0.647-0.267c0.665-0.623,1.283-1.298,1.953-1.915c0.206-0.189,0.522-0.363,0.789-0.365 c3.629-0.022,7.259-0.012,10.889-0.01c0.034,0,0.068,0.016,0.152,0.036c0,0.51,0,1.034,0,1.637c-0.201,0-0.408,0-0.616,0 c-3.201,0-6.401,0.007-9.602-0.01c-0.411-0.002-0.702,0.117-0.979,0.412c-0.563,0.599-1.13,1.201-1.753,1.734 c-0.271,0.232-0.68,0.409-1.033,0.419c-1.518,0.045-3.039,0.006-4.559,0.027c-0.469,0.006-0.818-0.149-1.134-0.483 c-0.554-0.583-1.147-1.13-1.696-1.717c-0.265-0.283-0.542-0.393-0.934-0.392c-5.293,0.013-10.585,0.009-15.878,0.008 c-0.997,0-1.247-0.243-1.247-1.219c0-7.493,0-14.987,0-22.48c0-0.883,0.273-1.157,1.145-1.16c0.697-0.002,1.395-0.003,2.092-0.006 c0.035,0,0.07-0.012,0.195-0.036c0-0.365,0-0.75,0-1.134c0-0.501,0-1.002,0-1.502c0-1.523,0.107-1.625,1.655-1.607 c0.567,0.007,1.135,0.001,1.778,0.001c0-0.76-0.002-1.541,0-2.321c0.002-0.839,0.298-1.14,1.129-1.115 c5.565,0.164,10.411,2.112,14.522,5.873c0.197,0.18,0.391,0.365,0.633,0.59c0.161-0.146,0.318-0.282,0.468-0.424 c3.591-3.389,7.854-5.336,12.745-5.919c0.691-0.082,1.39-0.101,2.087-0.118c0.659-0.016,0.985,0.316,0.992,0.981 c0.009,0.818,0.002,1.637,0.002,2.456c0.586,0,1.116,0.006,1.645-0.001c1.743-0.022,1.791,0.025,1.789,1.794 c-0.001,0.803,0,1.605,0,2.488c0.811,0,1.59-0.004,2.369,0.001c0.766,0.005,1.062,0.304,1.063,1.08 c0.002,5.472,0.001,10.945,0.002,16.417c0,0.14,0,0.281,0,0.457c-0.563,0-1.088,0-1.661,0c0-5.401,0-10.794,0-16.231 c-0.589,0-1.133,0-1.745,0c0,1.663,0,3.349,0,5.071c-0.591,0-1.116,0-1.693,0c0-3.112,0-6.215,0-9.339c-0.61,0-1.167,0-1.767,0 c0,2.003,0,3.947,0,5.934c-0.567,0-1.091,0-1.681,0c0-3.134,0-6.253,0-9.518c-1.347,0.219-2.623,0.354-3.864,0.643 c-3.714,0.865-6.891,2.712-9.552,5.438c-0.179,0.183-0.338,0.483-0.338,0.729c-0.018,6.67-0.014,13.341-0.013,20.011 C24.51,36.601,24.524,36.704,24.535,36.851z M22.829,36.926c0-0.331,0-0.508,0-0.685c0-6.438-0.011-12.875,0.017-19.312 c0.003-0.642-0.213-1.059-0.649-1.481c-3.019-2.918-6.588-4.739-10.726-5.434c-0.78-0.131-1.574-0.176-2.383-0.263 c0,7.231,0,14.359,0,21.526C14.283,31.566,18.82,33.434,22.829,36.926z M5.653,34.7c4.877,0.106,9.609,0.804,14.265,2.093 c-0.115-0.148-0.246-0.256-0.385-0.352c-3.299-2.269-6.956-3.419-10.954-3.497C7.63,32.925,7.38,32.678,7.38,31.726 c0-5.934,0-11.868,0-17.801c0-0.207,0-0.415,0-0.672c-0.615,0-1.158,0-1.727,0C5.653,20.391,5.653,27.513,5.653,34.7z"/>
                   	<path fill="#FAEF02" d="M40.29,35.203c-2.246,1.709-4.637,2.435-7.327,1.794c-2.158-0.514-3.857-1.731-5.145-3.528 c-2.395-3.341-1.945-7.945,1.058-10.863c3.15-3.061,7.667-3.349,11.127-0.667c1.874,1.452,2.998,3.37,3.308,5.742 c0.313,2.39-0.452,4.466-1.902,6.391c0.506,0.502,0.988,1.002,1.499,1.468c0.1,0.091,0.332,0.104,0.479,0.064 c1.16-0.314,2.137-0.058,2.972,0.828c0.748,0.793,1.541,1.544,2.307,2.32c1.072,1.086,1.096,2.765,0.061,3.805 c-1.037,1.042-2.721,1.028-3.804-0.039c-0.802-0.791-1.582-1.605-2.394-2.384c-0.833-0.799-1.071-1.751-0.768-2.836 c0.086-0.307,0.03-0.492-0.182-0.706C41.141,36.147,40.729,35.678,40.29,35.203z M41.713,28.708 c0.008-3.921-2.925-6.915-6.787-6.929c-3.986-0.015-6.973,2.912-6.982,6.842c-0.009,3.94,2.935,6.921,6.841,6.93 C38.723,35.56,41.705,32.615,41.713,28.708z M48.046,40.758c-0.178-0.297-0.255-0.504-0.397-0.649 c-0.924-0.942-1.853-1.88-2.799-2.801c-0.449-0.437-0.788-0.39-1.284,0.11c-0.491,0.495-0.53,0.828-0.085,1.284 c0.908,0.933,1.835,1.847,2.759,2.765c0.254,0.253,0.574,0.457,0.901,0.209C47.477,41.423,47.741,41.075,48.046,40.758z"/>
                   	<path fill="#FAEF02" d="M26.78,19.013c-0.356-0.463-0.67-0.87-1.017-1.321c3.165-2.413,6.678-3.859,10.625-4.447 c0.046,0.275,0.095,0.531,0.131,0.788c0.037,0.265,0.062,0.531,0.1,0.863C33.007,15.412,29.723,16.743,26.78,19.013z"/>
                   	<path fill="#FAEF02" d="M21.583,23.701c-0.369,0.473-0.685,0.877-1.027,1.315c-2.93-2.249-6.208-3.597-9.824-4.106 c0-0.106-0.006-0.159,0.001-0.21c0.065-0.458,0.131-0.916,0.207-1.44C14.871,19.82,18.385,21.286,21.583,23.701z"/>
                   	<path fill="#FAEF02" d="M21.549,29.69c-0.057,0.101-0.085,0.166-0.127,0.221c-0.271,0.354-0.545,0.706-0.86,1.114 c-2.913-2.227-6.181-3.592-9.849-4.104c0.076-0.554,0.147-1.075,0.226-1.654C14.875,25.837,18.394,27.292,21.549,29.69z"/>
                   	<path fill="#FAEF02" d="M10.711,14.899c0.079-0.57,0.152-1.093,0.23-1.654c3.933,0.576,7.447,2.027,10.639,4.447 c-0.341,0.441-0.663,0.858-1.017,1.317C17.636,16.764,14.36,15.411,10.711,14.899z"/>
                   	<path fill="#FAEF02" d="M29.724,31.177c0-0.521,0-1.033,0-1.591c1.958,0,3.923,0,5.916,0c0,0.521,0,1.033,0,1.591 C33.682,31.177,31.717,31.177,29.724,31.177z"/>
                   	<path fill="#FAEF02" d="M33.158,27.761c0-0.552,0-1.075,0-1.626c1.123,0,2.218,0,3.339,0c0,0.552,0,1.075,0,1.626 C35.374,27.761,34.28,27.761,33.158,27.761z"/>
                   	<path fill="#FAEF02" d="M39.932,29.587c0,0.557,0,1.068,0,1.607c-0.836,0-1.645,0-2.482,0c0-0.549,0-1.073,0-1.607 C38.297,29.587,39.119,29.587,39.932,29.587z"/>
                   	<path fill="#FAEF02" d="M31.345,27.763c-0.567,0-1.078,0-1.619,0c0-0.548,0-1.071,0-1.625c0.541,0,1.064,0,1.619,0 C31.345,26.68,31.345,27.203,31.345,27.763z"/>
                   	<path fill="#FAEF02" d="M39.938,26.141c0,0.558,0,1.068,0,1.613c-0.544,0-1.067,0-1.625,0c0-0.532,0-1.055,0-1.613 C38.844,26.141,39.368,26.141,39.938,26.141z"/>
                   </svg>
									 View the Case Study
                   <svg version="1.1" viewBox="0 0 50 50">
                   	<polygon fill="#FAEF02" points="27.937,46.817 49.653,25.1 49.649,25.096 49.653,25.092 27.985,3.425 20.838,10.572 30.32,20.053  0.347,20.053 0.347,30.16 30.301,30.16 20.79,39.671 	"/>
                   </svg>

								 </a>
							 </div>
						 </div>
					 </div>
				 </div>

				 <div class="modal" data-modal-title="caseStudyDownload">
					 <div class="modal-background"></div>
					 <div class="modal-card">
						 <header class="modal-card-head">
							 <p class="modal-card-title">View the Case Study</p>
							 <button class="delete close-modal"></button>
						 </header>
						 <section class="modal-card-body">
               <p>Using the form below, you will be able to download a pdf copy of our case study.</p>
               <br />
               <!--[if lte IE 8]>
               <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
               <![endif]-->
               <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
               <script>
                hbspt.forms.create({
	                 portalId: "182596",
	                 formId: "ff5294f6-3316-40ca-b55e-b67b9943cdf4"
                });
               </script>
						 </section>
					 </div>
				 </div>


       </section>
 		</main><!-- #main -->
 	</div><!-- #primary -->

 <?php
 get_footer();
