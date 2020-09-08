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

		<section class="full-section grey-background create-your-solution-container" ng-controller="createSolution">
			<div class="container padding-top padding-bottom">

				<section class="welcome columns is-multiline is-centered is-vcentered is-desktop" ng-hide="startCreating">
					<div class="image-cover">
						<?php
							// Get the Feature Image
							echo get_the_post_thumbnail( get_the_ID(), 'full', array( 'class' => 'feature-image-cover' ));
						?>
					</div>
					<div class="column is-9-desktop is-full-mobile">
						<h1>Welcome Educators!</h1>
						<h2>We want to help find a solution that fits your school's specific needs, let's get started by first telling us your name, school name, or district.</h2>
						<div class="school-name-control">
  						<div class="input-control">
    						<input class="input school-name" type="text" ng-model="schoolName" placeholder="Please enter your name, school name, or district">
  						</div>
							<div class="button-control" ng-show="schoolName">
            		<button type="button" class="submit-button" ng-disabled="!schoolName" ng-click="startCreatingSolution()">
									<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 60 60">
										<path class="white-fill" d="M38.6,30.9L32,37.5c-0.8,0.8-2.1,0.8-2.9-0.1c-0.7-0.8-0.5-2,0.2-2.7l3.2-3.2H22.4c-1.1,0-1.9-0.9-1.9-1.9 s0.9-1.9,1.9-1.9h10.1l-3.2-3.2c-0.8-0.8-0.8-2.1,0-2.9c0.4-0.3,0.8-0.5,1.3-0.5c0.5,0,1,0.2,1.4,0.6l6.6,6.6 C39.3,28.9,39.3,30.1,38.6,30.9z"/>
									</svg>
								</button>
          		</div>
						</div>
					</div>
				</section>

				<section class="create columns is-multiline is-centered is-desktop" ng-show="startCreating">
					<div class="column">
						<h1>Okay <strong>{{schoolName}}</strong>, let's create your solution.</h1>
					</div>

					<div class="dial-ui-container is-vcentered main-dashboard" ng-controller="formTabController">
					<form class="dial-ui-container columns" method="post" name="createYourEdtechSolution" action="{{'/create-your-solution/your-solution/?' + schoolName}}">

						<div class="column is-4-desktop is-6-tablet is-full-mobile relative-position dial-display-main">
							<p class="title-field">Your Selection</p>
							<div class="circle outer a"></div>
							<div class="circle inner b"></div>
							<div class="circle inner c"></div>
							<object type="image/svg+xml" data="<?php echo get_template_directory_uri() . '/inc/images/dial-ticks.svg'; ?>" class="circle dial"></object>
							<svg class="circle dial markers" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 400 400">
							<g>
								<path d="M131.973,80.377l-1.969-3.365c-0.395,0.231-0.79,0.464-1.184,0.699l1.998,3.349 C131.202,80.83,131.586,80.602,131.973,80.377z"/>
								<path d="M144.181,74.041l-1.624-3.545c-0.422,0.193-0.842,0.388-1.261,0.585l1.654,3.525 C143.358,74.413,143.77,74.228,144.181,74.041z"/>
								<path d="M138.042,77.034l-1.792-3.464c-0.434,0.225-0.867,0.452-1.298,0.682l1.831,3.44 C137.201,77.47,137.622,77.252,138.042,77.034z"/>
								<path d="M150.508,71.336l-1.444-3.622c-0.436,0.174-0.872,0.35-1.306,0.528l1.477,3.6 C149.656,71.668,150.083,71.505,150.508,71.336z"/>
								<path d="M115.011,92.05l-2.441-3.036c-0.365,0.293-0.729,0.588-1.091,0.886l2.476,3.019 C114.307,92.63,114.656,92.335,115.011,92.05z"/>
								<path d="M126.146,83.974l-2.129-3.265c-0.397,0.259-0.792,0.519-1.186,0.782l2.164,3.247 C125.379,84.482,125.761,84.226,126.146,83.974z"/>
								<path d="M109.771,96.484l-2.589-2.915c-0.356,0.317-0.711,0.635-1.064,0.956l2.623,2.892 C109.085,97.105,109.425,96.791,109.771,96.484z"/>
								<path d="M120.465,87.883l-2.29-3.152c-0.378,0.275-0.753,0.55-1.128,0.828l2.324,3.136 C119.736,88.424,120.097,88.149,120.465,87.883z"/>
								<path d="M190.636,62.008l-0.302-3.89c-0.477,0.037-0.953,0.077-1.429,0.119l0.343,3.881 C189.709,62.077,190.173,62.044,190.636,62.008z"/>
								<path d="M197.505,61.645l-0.109-3.903c-0.474,0.013-0.948,0.029-1.422,0.047l0.149,3.895 C196.582,61.668,197.044,61.658,197.505,61.645z"/>
								<path d="M183.777,62.715l-0.497-3.869c-0.472,0.06-0.944,0.124-1.415,0.189l0.536,3.858 C182.859,62.83,183.318,62.774,183.777,62.715z"/>
								<path d="M176.96,63.766l-0.691-3.838c-0.471,0.085-0.941,0.172-1.411,0.262l0.731,3.824 C176.045,63.928,176.503,63.849,176.96,63.766z"/>
								<path d="M163.503,66.898l-1.077-3.748c-0.451,0.13-0.9,0.26-1.347,0.394l1.111,3.729C162.625,67.144,163.065,67.023,163.503,66.898 z"/>
								<path d="M170.193,65.162l-0.885-3.797c-0.453,0.106-0.906,0.214-1.357,0.323l0.919,3.782 C169.309,65.364,169.752,65.265,170.193,65.162z"/>
								<path d="M156.962,68.95l-1.26-3.69c-0.444,0.152-0.886,0.306-1.329,0.461l1.293,3.669C156.096,69.239,156.53,69.098,156.962,68.95z"/>
								<path d="M79.975,134.096l-3.428-1.856c-0.234,0.431-0.464,0.864-0.693,1.298l3.441,1.811 C79.517,134.928,79.749,134.514,79.975,134.096z"/>
								<path d="M69.366,159.579l-3.731-1.13c-0.139,0.458-0.275,0.917-0.409,1.377l3.74,1.089 C69.096,160.469,69.231,160.024,69.366,159.579z"/>
								<path d="M74.009,146.612l-3.599-1.495c-0.181,0.436-0.36,0.872-0.537,1.31l3.609,1.458 C73.654,147.459,73.833,147.036,74.009,146.612z"/>
								<path d="M71.513,153.069l-3.671-1.309c-0.153,0.43-0.305,0.861-0.455,1.293l3.678,1.277 C71.211,153.908,71.363,153.489,71.513,153.069z"/>
								<path d="M67.54,166.216l-3.784-0.943c-0.117,0.467-0.23,0.935-0.342,1.404l3.791,0.901C67.313,167.122,67.427,166.67,67.54,166.216z"/>
								<path d="M66.05,172.929l-3.828-0.755c-0.092,0.471-0.183,0.943-0.271,1.417l3.831,0.713 C65.867,173.843,65.96,173.387,66.05,172.929z"/>
								<path d="M64.077,186.508l-3.887-0.378c-0.048,0.488-0.091,0.977-0.133,1.466l3.881,0.331 C63.979,187.452,64.032,186.981,64.077,186.508z"/>
								<path d="M64.89,179.734l-3.864-0.561c-0.069,0.472-0.135,0.945-0.199,1.419l3.862,0.519 C64.753,180.651,64.824,180.193,64.89,179.734z"/>
								<path d="M87.101,122.348l-3.232-2.183c-0.257,0.38-0.513,0.762-0.767,1.144l3.245,2.152 C86.596,123.088,86.85,122.719,87.101,122.348z"/>
								<path d="M91.114,116.73l-3.119-2.343c-0.276,0.367-0.549,0.735-0.822,1.103l3.136,2.315 C90.574,117.444,90.845,117.087,91.114,116.73z"/>
								<path d="M95.41,111.309l-2.996-2.5c-0.306,0.366-0.61,0.735-0.912,1.104l3.021,2.467C94.816,112.021,95.113,111.665,95.41,111.309z"/>
								<path d="M99.932,106.151l-2.871-2.642c-0.315,0.342-0.629,0.686-0.941,1.032l2.896,2.616 C99.32,106.82,99.625,106.484,99.932,106.151z"/>
								<path d="M204.389,61.624l0.086-3.904c-0.475-0.011-0.949-0.018-1.423-0.024l-0.046,3.898 C203.466,61.6,203.928,61.614,204.389,61.624z"/>
								<path d="M76.823,140.299l-3.52-1.674c-0.199,0.42-0.397,0.84-0.594,1.263l3.528,1.639 C76.429,141.116,76.628,140.709,76.823,140.299z"/>
								<path d="M83.395,128.127l-3.334-2.023c-0.248,0.409-0.494,0.819-0.738,1.231l3.348,1.984 C82.908,128.918,83.154,128.524,83.395,128.127z"/>
								<path d="M104.723,101.204l-2.735-2.781c-0.332,0.327-0.663,0.655-0.992,0.985l2.763,2.757 C104.079,101.844,104.399,101.522,104.723,101.204z"/>
								<path d="M328.582,145.555l3.588-1.525c-0.194-0.456-0.39-0.911-0.589-1.364l-3.563,1.567 C328.21,144.672,328.394,145.115,328.582,145.555z"/>
								<path d="M325.683,139.211l3.502-1.717l-0.592-1.197l-3.485,1.74C325.302,138.426,325.492,138.819,325.683,139.211z"/>
								<path d="M322.522,133.121l3.414-1.887l-0.662-1.186l-3.397,1.913C322.094,132.347,322.308,132.733,322.522,133.121z"/>
								<path d="M63.588,193.419l-3.901-0.177c-0.021,0.46-0.04,0.919-0.057,1.378l3.895,0.143 C63.541,194.315,63.568,193.866,63.588,193.419z"/>
								<path d="M331.102,151.889l3.656-1.353c-0.162-0.435-0.323-0.87-0.489-1.304l-3.635,1.383 C330.795,151.037,330.946,151.465,331.102,151.889z"/>
								<path d="M311.285,115.887l3.095-2.364c-0.29-0.379-0.58-0.757-0.875-1.133l-3.077,2.402 C310.713,115.157,311.003,115.518,311.285,115.887z"/>
								<path d="M211.232,61.941l0.274-3.897c-0.472-0.033-0.944-0.064-1.415-0.092l-0.235,3.889 C210.315,61.869,210.774,61.909,211.232,61.941z"/>
								<path d="M315.332,121.473l3.212-2.206c-0.27-0.394-0.544-0.786-0.817-1.176l-3.194,2.243 C314.801,120.713,315.069,121.091,315.332,121.473z"/>
								<path d="M338.003,178.53l3.854-0.594c-0.07-0.459-0.144-0.917-0.218-1.375l-3.844,0.628 C337.868,177.635,337.934,178.083,338.003,178.53z"/>
								<path d="M333.321,158.389l3.72-1.169c-0.141-0.447-0.282-0.894-0.427-1.339l-3.7,1.203 C333.053,157.517,333.184,157.954,333.321,158.389z"/>
								<path d="M339.606,199.113l3.905-0.011c-0.001-0.462-0.006-0.922-0.011-1.383l-3.899,0.046 C339.607,198.213,339.605,198.663,339.606,199.113z"/>
								<path d="M338.881,185.367l3.88-0.4c-0.048-0.459-0.097-0.919-0.148-1.377l-3.872,0.434 C338.791,184.47,338.835,184.919,338.881,185.367z"/>
								<path d="M339.415,192.235l3.896-0.206c-0.024-0.461-0.051-0.922-0.08-1.382l-3.89,0.24 C339.371,191.335,339.392,191.785,339.415,192.235z"/>
								<path d="M335.214,165l3.773-0.982c-0.117-0.451-0.236-0.901-0.358-1.35l-3.757,1.015C334.99,164.121,335.1,164.561,335.214,165z"/>
								<path d="M336.779,171.731l3.819-0.789c-0.094-0.452-0.189-0.905-0.288-1.356l-3.805,0.822 C336.6,170.847,336.688,171.289,336.779,171.731z"/>
								<path d="M306.983,110.537l2.976-2.514c-0.307-0.364-0.618-0.727-0.929-1.088l-2.956,2.55 C306.377,109.836,306.684,110.183,306.983,110.537z"/>
								<path d="M319.054,127.181l3.313-2.053c-0.244-0.393-0.487-0.784-0.733-1.174l-3.297,2.084 C318.578,126.419,318.818,126.799,319.054,127.181z"/>
								<path d="M257.811,73.55l1.591-3.558c-0.434-0.194-0.872-0.386-1.31-0.577l-1.551,3.569 C256.967,73.169,257.388,73.361,257.811,73.55z"/>
								<path d="M238.292,66.557l1.031-3.76c-0.443-0.121-0.885-0.241-1.328-0.358l-0.998,3.765 C237.43,66.318,237.86,66.438,238.292,66.557z"/>
								<path d="M251.405,70.883l1.406-3.635c-0.443-0.172-0.887-0.34-1.332-0.508l-1.367,3.646 C250.545,70.548,250.974,70.717,251.405,70.883z"/>
								<path d="M244.884,68.548l1.217-3.703l-1.291-0.419l-1.187,3.709C244.045,68.27,244.464,68.41,244.884,68.548z"/>
								<path d="M231.63,64.903l0.846-3.808c-0.453-0.101-0.908-0.199-1.363-0.296l-0.81,3.812 C230.747,64.704,231.188,64.804,231.63,64.903z"/>
								<path d="M218.101,62.596l0.47-3.876c-0.476-0.058-0.953-0.113-1.432-0.166l-0.427,3.872 C217.178,62.478,217.638,62.54,218.101,62.596z"/>
								<path d="M224.924,63.587l0.664-3.846c-0.485-0.084-0.97-0.163-1.456-0.241l-0.617,3.848 C223.987,63.423,224.455,63.507,224.924,63.587z"/>
								<path d="M270.16,79.828l1.946-3.378c-0.436-0.251-0.875-0.499-1.315-0.745l-1.896,3.395 C269.32,79.338,269.738,79.586,270.16,79.828z"/>
								<path d="M264.037,76.519l1.766-3.475c-0.425-0.216-0.853-0.431-1.281-0.643l-1.726,3.486 C263.212,76.093,263.623,76.309,264.037,76.519z"/>
								<path d="M287.231,91.399l2.424-3.057c-0.374-0.297-0.751-0.592-1.127-0.885l-2.39,3.081 C286.504,90.823,286.868,91.111,287.231,91.399z"/>
								<path d="M297.583,100.479l2.715-2.801c-0.341-0.331-0.683-0.66-1.029-0.988l-2.688,2.831 C296.916,99.84,297.251,100.158,297.583,100.479z"/>
								<path d="M292.522,95.812l2.573-2.933c-0.351-0.308-0.703-0.614-1.057-0.918l-2.546,2.957 C291.837,95.215,292.18,95.513,292.522,95.812z"/>
								<path d="M302.406,105.391l2.85-2.661c-0.331-0.355-0.664-0.709-1.001-1.06l-2.822,2.697 C301.758,104.707,302.085,105.046,302.406,105.391z"/>
								<path d="M281.683,87.223l2.262-3.18l-1.105-0.781l-2.235,3.192C280.967,86.708,281.325,86.966,281.683,87.223z"/>
								<path d="M275.974,83.357l2.1-3.287l-1.154-0.731l-2.069,3.297C275.228,82.873,275.6,83.117,275.974,83.357z"/>
								<path d="M80.517,266.213l-3.417,1.88c0.229,0.416,0.461,0.832,0.695,1.247l3.397-1.916 C80.965,267.022,80.74,266.618,80.517,266.213z"/>
								<path d="M276.93,315.356l2.13,3.263c0.386-0.251,0.773-0.507,1.158-0.763l-2.162-3.249 C277.681,314.858,277.307,315.11,276.93,315.356z"/>
								<path d="M271.067,318.977l1.964,3.369c0.425-0.247,0.848-0.497,1.269-0.75l-2.005-3.346 C271.886,318.494,271.477,318.737,271.067,318.977z"/>
								<path d="M258.919,325.284l1.629,3.544c0.421-0.194,0.843-0.389,1.262-0.586l-1.659-3.524 C259.742,324.91,259.33,325.096,258.919,325.284z"/>
								<path d="M265.127,322.252l1.807,3.455l1.167-0.613l-1.829-3.442C265.892,321.854,265.509,322.054,265.127,322.252z"/>
								<path d="M293.352,302.797l2.598,2.907l0.975-0.877l-2.62-2.895C293.988,302.221,293.672,302.512,293.352,302.797z"/>
								<path d="M282.58,311.468l2.286,3.155c0.386-0.28,0.772-0.564,1.156-0.847l-2.324-3.137 C283.325,310.915,282.955,311.196,282.58,311.468z"/>
								<path d="M288.095,307.251l2.448,3.032l1.02-0.829l-2.472-3.022C288.759,306.704,288.43,306.981,288.095,307.251z"/>
								<path d="M212.48,337.336l0.309,3.89c0.458-0.037,0.918-0.074,1.376-0.115l-0.342-3.881 C213.376,337.269,212.927,337.301,212.48,337.336z"/>
								<path d="M219.337,336.625l0.503,3.867c0.455-0.06,0.911-0.121,1.367-0.184l-0.536-3.857 C220.228,336.513,219.782,336.568,219.337,336.625z"/>
								<path d="M298.271,298.198l2.722,2.791c0.37-0.36,0.734-0.722,1.097-1.087l-2.766-2.754 C298.975,297.499,298.625,297.851,298.271,298.198z"/>
								<path d="M226.147,335.572l0.697,3.837c0.457-0.083,0.915-0.167,1.371-0.255l-0.731-3.825 C227.039,335.414,226.593,335.491,226.147,335.572z"/>
								<path d="M239.502,332.463l1.067,3.75c0.472-0.135,0.943-0.272,1.414-0.412l-1.11-3.73 C240.418,332.207,239.959,332.333,239.502,332.463z"/>
								<path d="M246.045,330.413l1.25,3.692c0.465-0.157,0.928-0.318,1.392-0.481l-1.292-3.669 C246.947,330.112,246.495,330.259,246.045,330.413z"/>
								<path d="M232.838,334.191l0.878,3.798c0.487-0.113,0.971-0.228,1.455-0.347l-0.925-3.779 C233.778,333.977,233.307,334.081,232.838,334.191z"/>
								<path d="M252.504,328.027l1.434,3.625c0.455-0.179,0.909-0.364,1.363-0.55l-1.475-3.6 C253.388,327.682,252.945,327.852,252.504,328.027z"/>
								<path d="M303.097,293.217l2.864,2.647c0.324-0.35,0.646-0.702,0.965-1.055l-2.893-2.619 C303.723,292.534,303.411,292.877,303.097,293.217z"/>
								<path d="M335.522,233.075l3.785,0.938c0.112-0.452,0.221-0.903,0.33-1.356l-3.791-0.902 C335.741,232.196,335.631,232.635,335.522,233.075z"/>
								<path d="M337.004,226.388l3.829,0.754c0.095-0.482,0.187-0.964,0.277-1.449l-3.834-0.707 C337.189,225.455,337.096,225.921,337.004,226.388z"/>
								<path d="M333.689,239.743l3.731,1.13c0.135-0.446,0.267-0.891,0.397-1.339l-3.738-1.094 C333.952,238.876,333.82,239.309,333.689,239.743z"/>
								<path d="M338.16,219.594l3.864,0.562c0.066-0.463,0.132-0.926,0.195-1.391l-3.863-0.524 C338.295,218.694,338.225,219.143,338.16,219.594z"/>
								<path d="M339.456,205.995l3.902,0.183c0.023-0.488,0.043-0.977,0.06-1.465l-3.896-0.137 C339.505,205.049,339.478,205.523,339.456,205.995z"/>
								<path d="M331.509,246.35l3.665,1.324c0.171-0.471,0.337-0.942,0.5-1.416l-3.679-1.276 C331.836,245.44,331.672,245.895,331.509,246.35z"/>
								<path d="M63.441,200.264l-3.904,0.011c0.002,0.476,0.006,0.95,0.012,1.425l3.898-0.051 C63.44,201.188,63.443,200.725,63.441,200.264z"/>
								<path d="M319.692,271.157l3.337,2.016c0.24-0.397,0.479-0.795,0.715-1.194l-3.348-1.982 C320.165,270.388,319.926,270.771,319.692,271.157z"/>
								<path d="M311.98,282.558l3.125,2.338l0.786-1.057l-3.136-2.315C312.499,281.87,312.239,282.213,311.98,282.558z"/>
								<path d="M315.955,276.988l3.231,2.184c0.26-0.384,0.517-0.768,0.773-1.155l-3.245-2.152 C316.464,276.242,316.208,276.614,315.955,276.988z"/>
								<path d="M307.604,288.08l2.987,2.508c0.332-0.395,0.661-0.794,0.987-1.195l-3.022-2.464 C308.241,287.316,307.923,287.699,307.604,288.08z"/>
								<path d="M205.603,337.702l0.114,3.902c0.462-0.013,0.922-0.029,1.383-0.047l-0.149-3.895 C206.502,337.68,206.052,337.689,205.603,337.702z"/>
								<path d="M326.235,259.026l3.519,1.674c0.205-0.432,0.409-0.864,0.61-1.298l-3.531-1.635 C326.638,258.189,326.435,258.606,326.235,259.026z"/>
								<path d="M323.115,265.175l3.432,1.847l0.641-1.201l-3.439-1.816C323.543,264.397,323.326,264.784,323.115,265.175z"/>
								<path d="M329.041,252.731l3.598,1.498c0.189-0.455,0.375-0.91,0.559-1.366l-3.611-1.453 C329.408,251.852,329.224,252.291,329.041,252.731z"/>
								<path d="M338.979,212.747l3.889,0.367c0.043-0.461,0.085-0.922,0.124-1.383l-3.881-0.331 C339.073,211.851,339.022,212.298,338.979,212.747z"/>
								<path d="M84.001,272.181l-3.316,2.052c0.245,0.396,0.492,0.792,0.74,1.185l3.299-2.085 C84.482,272.95,84.239,272.567,84.001,272.181z"/>
								<path d="M74.488,253.849l-3.587,1.53c0.192,0.45,0.386,0.897,0.582,1.343l3.563-1.569C74.856,254.72,74.674,254.283,74.488,253.849z"/>
								<path d="M87.762,277.947l-3.207,2.214l0.779,1.12l3.194-2.244C88.273,278.674,88.015,278.313,87.762,277.947z"/>
								<path d="M77.348,260.105l-3.507,1.708c0.214,0.44,0.431,0.878,0.649,1.314l3.483-1.747 C77.762,260.956,77.556,260.53,77.348,260.105z"/>
								<path d="M91.779,283.484l-3.096,2.365c0.29,0.379,0.581,0.756,0.875,1.133l3.077-2.402 C92.351,284.214,92.06,283.852,91.779,283.484z"/>
								<path d="M100.676,293.995l-2.847,2.664c0.318,0.341,0.639,0.68,0.961,1.018l2.826-2.694 C101.301,294.654,100.986,294.327,100.676,293.995z"/>
								<path d="M96.084,288.835l-2.977,2.515c0.313,0.371,0.627,0.738,0.944,1.105l2.954-2.554 C96.698,289.546,96.387,289.194,96.084,288.835z"/>
								<path d="M105.445,298.852l-2.72,2.794c0.357,0.348,0.714,0.69,1.074,1.032l2.688-2.831 C106.139,299.517,105.79,299.186,105.445,298.852z"/>
								<path d="M64.168,214.005l-3.88,0.399c0.049,0.476,0.101,0.95,0.154,1.424l3.871-0.44C64.261,214.928,64.216,214.466,64.168,214.005z"/>
								<path d="M65.047,220.838l-3.855,0.593c0.073,0.473,0.148,0.944,0.226,1.416l3.842-0.633 C65.186,221.757,65.118,221.297,65.047,220.838z"/>
								<path d="M63.633,207.14l-3.898,0.206c0.025,0.476,0.053,0.952,0.083,1.427l3.89-0.246C63.679,208.065,63.658,207.602,63.633,207.14z"/>
								<path d="M67.83,234.333l-3.775,0.975c0.122,0.471,0.246,0.94,0.373,1.408l3.757-1.016C68.061,235.246,67.948,234.789,67.83,234.333z"/>
								<path d="M66.271,227.631l-3.818,0.786c0.097,0.476,0.198,0.949,0.301,1.422l3.803-0.828 C66.457,228.552,66.366,228.091,66.271,227.631z"/>
								<path d="M69.738,240.996l-3.719,1.171c0.14,0.443,0.281,0.886,0.424,1.326l3.7-1.203C70.003,241.861,69.873,241.428,69.738,240.996z"/>
								<path d="M71.955,247.487l-3.657,1.353c0.161,0.436,0.324,0.87,0.489,1.304l3.635-1.383 C72.261,248.338,72.111,247.911,71.955,247.487z"/>
								<path d="M139.048,322.849l-1.764,3.477c0.421,0.213,0.842,0.424,1.265,0.633l1.726-3.486 C139.863,323.27,139.457,323.057,139.048,322.849z"/>
								<path d="M171.444,334.453l-0.846,3.808c0.454,0.101,0.908,0.199,1.363,0.297l0.811-3.813 C172.328,334.65,171.886,334.551,171.444,334.453z"/>
								<path d="M164.73,332.785l-1.039,3.758c0.474,0.131,0.949,0.259,1.425,0.384l0.993-3.767 C165.647,333.038,165.189,332.911,164.73,332.785z"/>
								<path d="M158.146,330.795l-1.224,3.7c0.45,0.148,0.9,0.295,1.352,0.44l1.185-3.71C159.02,331.084,158.583,330.939,158.146,330.795z"/>
								<path d="M178.22,335.779l-0.653,3.848c0.459,0.079,0.919,0.155,1.381,0.228l0.616-3.849 C179.114,335.934,178.667,335.855,178.22,335.779z"/>
								<path d="M191.841,337.41l-0.274,3.896c0.46,0.032,0.918,0.062,1.377,0.09l0.24-3.889 C192.737,337.48,192.288,337.442,191.841,337.41z"/>
								<path d="M151.605,328.451l-1.416,3.63c0.462,0.18,0.926,0.357,1.391,0.53l1.369-3.644 C152.499,328.799,152.052,328.624,151.605,328.451z"/>
								<path d="M184.98,336.757l-0.469,3.877c0.486,0.059,0.972,0.114,1.459,0.167l0.422-3.873 C185.92,336.876,185.451,336.814,184.98,336.757z"/>
								<path d="M110.566,303.572l-2.571,2.936l1.034,0.898l2.546-2.957C111.237,304.158,110.901,303.866,110.566,303.572z"/>
								<path d="M145.256,325.808l-1.591,3.557c0.454,0.203,0.908,0.403,1.365,0.6l1.544-3.572 C146.133,326.202,145.695,326.004,145.256,325.808z"/>
								<path d="M115.841,307.97l-2.423,3.057c0.364,0.288,0.729,0.576,1.096,0.86l2.393-3.077 C116.55,308.532,116.195,308.251,115.841,307.97z"/>
								<path d="M127.079,315.996l-2.103,3.286c0.389,0.249,0.779,0.496,1.171,0.742l2.069-3.297 C127.835,316.487,127.459,316.24,127.079,315.996z"/>
								<path d="M121.345,312.113l-2.268,3.174c0.39,0.278,0.779,0.554,1.172,0.828l2.232-3.194 C122.099,312.655,121.723,312.383,121.345,312.113z"/>
								<path d="M133.006,319.589l-1.931,3.388c0.4,0.228,0.801,0.455,1.204,0.68l1.896-3.395 C133.782,320.042,133.396,319.812,133.006,319.589z"/>
								<path d="M198.719,337.726l-0.08,3.904c0.461,0.009,0.922,0.017,1.382,0.022l0.046-3.897 C199.618,337.75,199.168,337.736,198.719,337.726z"/>
							</g>
							<g>
								<path ng-show="professionalDevelopmentSolutions=='Mentoring PD' || professionalDevelopmentSolutions=='Coaching PD' || professionalDevelopmentSolutions=='Online (OTIS) PD'" class="professional-development-color" d="M217.038,14.265c45.532,3.88,85.823,23.855,115.774,53.836l4.743-4.743 C302.669,28.472,254.475,6.894,201.24,6.894v6.701C206.467,13.602,211.735,13.813,217.038,14.265z"/>
								<path ng-show="lessonContentSolutions=='Project-Based Learning' || lessonContentSolutions=='Customized Content Creation' || lessonContentSolutions=='Educational Resources'" class="content-creation-color" d="M387.318,199.674h6.701c0-53.235-21.578-101.43-56.464-136.316l-4.743,4.743 C366.731,102.055,387.375,148.847,387.318,199.674z"/>
								<path ng-show="stemSolutions=='General STEM' || stemSolutions=='Coding' || stemSolutions=='Robotics' || stemSolutions=='Hydroponics'" class="stem-solutions-color" d="M387.318,199.674c-0.006,5.228-0.218,10.495-0.67,15.798c-3.88,45.532-23.855,85.823-53.836,115.774 l4.743,4.743c34.886-34.886,56.464-83.081,56.464-136.316H387.318z"/>
								<path ng-show="classroomTransformationSolutions=='SMART Board/SMART Learning Suite' || classroomTransformationSolutions=='Active Learning Spaces' || classroomTransformationSolutions=='Evospaces (furniture)'" class="classroom-transformation-color" d="M201.24,385.753v6.701c53.235,0,101.43-21.578,136.316-56.464l-4.743-4.743 C298.859,365.166,252.068,385.81,201.24,385.753z"/>
								<path ng-show="gradeBand=='Grades K-2' || gradeBand=='Grades 3-5' || gradeBand=='Grades 6-8' || gradeBand=='Grades 9-12'" class="grade-band-color" d="M185.441,385.084c-45.532-3.88-85.823-23.855-115.774-53.836l-4.743,4.743 c34.886,34.886,83.081,56.464,136.316,56.464v-6.701C196.012,385.747,190.744,385.536,185.441,385.084z"/>
								<path ng-show="subjectMatterEla == true || subjectMatterEngineering == true || subjectMatterEnglish == true || subjectMatterMath == true || subjectMatterScience == true || subjectMatterSocialStudies == true  || subjectMatterSpecialEducation == true || subjectMatterStem == true" class="subject-matter-color" d="M15.161,199.674H8.46c0,53.235,21.578,101.43,56.464,136.316l4.743-4.743 C35.748,297.294,15.105,250.502,15.161,199.674z"/>
								<path ng-show="technologyProficiency=='Easy Proficiency' || technologyProficiency=='Intermediate Proficiency' || technologyProficiency=='Advanced Proficiency'" class="technology-proficiency-color" d="M15.831,183.876c3.88-45.532,23.855-85.823,53.836-115.774l-4.743-4.743 C30.037,98.245,8.46,146.44,8.46,199.674h6.701C15.167,194.447,15.379,189.179,15.831,183.876z"/>
								<path class="hidden" d="M201.24,13.596V6.894c-53.235,0-101.43,21.578-136.316,56.464l4.743,4.743 C103.62,34.183,150.412,13.539,201.24,13.596z"/>
							</g>
							</svg>
							<div class="circle inner hard d"></div>
							<div class="circle outer e">
								<h4 class="professional-development-color strong" ng-show="show==1">Mentoring Professional Development</h4>
								<h4 class="professional-development-color strong" ng-show="show==2">Coaching Professional Development</h4>
								<h4 class="professional-development-color strong" ng-show="show==3">OTIS for educators</h4>
								<h4 class="content-creation-color strong" ng-show="show==4">Project-Based Learning</h4>
								<h4 class="content-creation-color strong" ng-show="show==5">Customized Content Creation</h4>
								<h4 class="content-creation-color strong" ng-show="show==6">Educational Resources</h4>
								<h4 class="stem-solutions-color strong" ng-show="show==7">General STEM</h4>
								<h4 class="stem-solutions-color strong" ng-show="show==8">Coding</h4>
								<h4 class="stem-solutions-color strong" ng-show="show==9">Robotics</h4>
								<h4 class="stem-solutions-color strong" ng-show="show==10">Hydroponics</h4>
								<h4 class="classroom-transformation-color strong" ng-show="show==11">SMART Board/SMART Learning</h4>
								<h4 class="classroom-transformation-color strong" ng-show="show==12">Active Learning Spaces</h4>
								<h4 class="classroom-transformation-color strong" ng-show="show==13">Evospaces</h4>
								<h4 class="grade-band-color strong" ng-show="show==14">Grades K-2</h4>
								<h4 class="grade-band-color strong" ng-show="show==15">Grades 3-5</h4>
								<h4 class="grade-band-color strong" ng-show="show==16">Grades 6-8</h4>
								<h4 class="grade-band-color strong" ng-show="show==17">Grades 9-12</h4>
								<h4 class="subject-matter-color strong" ng-show="show==18">ELA</h4>
								<h4 class="subject-matter-color strong" ng-show="show==19">Engineering</h4>
								<h4 class="subject-matter-color strong" ng-show="show==20">English</h4>
								<h4 class="subject-matter-color strong" ng-show="show==21">Math</h4>
								<h4 class="subject-matter-color strong" ng-show="show==22">Science</h4>
								<h4 class="subject-matter-color strong" ng-show="show==23">Social Studies</h4>
								<h4 class="subject-matter-color strong" ng-show="show==24">Special Education</h4>
								<h4 class="subject-matter-color strong" ng-show="show==25">STEM</h4>
								<h4 class="technology-proficiency-color strong" ng-show="show==26">Easy Level of Proficiency</h4>
								<h4 class="technology-proficiency-color strong" ng-show="show==27">Intermediate Level of Proficiency</h4>
								<h4 class="technology-proficiency-color strong" ng-show="show==28">Advanced Level of Proficiency</h4>
							</div>
							<input type="submit" value="" ng-if="pdSelected==true && lessonContentSelected==true && classroomSelected==true && stemSelected==true && gradeSelected==true && subjectSelected==true && proficiencySelected==true" />
						</div>

						<div class="column is-5-desktop is-5-tablet is-full-mobile relative-position outer rounded-corners dial-display-sub">
							<input type="hidden" name="title" value="{{schoolName}}">
							<div class="prev-next-button-container">
								<a class="previous-button" ng-class="{disabled : isSet(0)}" ng-click="back()" alt="previous">
									<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 60 60">
										<path class="grey-fill" d="M21.186,28.152l6.507-6.507c0.784-0.784,2.082-0.742,2.811,0.126c0.646,0.77,0.525,1.929-0.185,2.639 l-3.184,3.184h9.958c1.053,0,1.906,0.853,1.906,1.906s-0.853,1.906-1.906,1.906h-9.958l3.175,3.175 c0.781,0.781,0.825,2.105,0.004,2.844c-0.362,0.325-0.818,0.488-1.274,0.488c-0.488,0-0.976-0.186-1.348-0.558l-6.507-6.507 C20.441,30.104,20.441,28.897,21.186,28.152z"/>
									</svg>
								</a>
								<a class="next-button" ng-class="{disabled : isSet(4)}" ng-click="next()" alt="next">
									<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 60 60">
										<path class="grey-fill" d="M38.442,28.152l-6.507-6.507c-0.784-0.784-2.082-0.742-2.811,0.126c-0.646,0.77-0.525,1.929,0.185,2.639 l3.184,3.184h-9.958c-1.053,0-1.906,0.853-1.906,1.906s0.853,1.906,1.906,1.906h9.958l-3.175,3.175 c-0.781,0.781-0.825,2.105-0.004,2.844c0.362,0.325,0.818,0.488,1.274,0.488c0.488,0,0.976-0.186,1.348-0.558l6.507-6.507 C39.186,30.104,39.186,28.897,38.442,28.152z"/>
									</svg>
								</a>
								<input type="reset" value="" ng-click="resetSolutionSet()">
								<input type="submit" value="GO!" ng-if="pdSelected==true && lessonContentSelected==true && classroomSelected==true && stemSelected==true && gradeSelected==true && proficiencySelected==true" />
							</div>

							<div class="dial-ui-set-container slide" ng-show="isSet(0)">
								<p><strong>1</strong><span class="caption"> / 5</span></p>
								<div class="dial-ui-set instructions">
										<h4>Are you ready to start building your custom plan?</h4>
										<p class="strong">Use the arrows to advance through each page. Click the dial to select the option that best describes your school/district needs.</p>
								</div>
								<div class="dial-ui-set">
									<div class="content-dial demo">
										<h5>Continue through the menu to complete all 7 dials. Each option represents a specific criteria that will build your custom solution.</h5>
										<?php echo file_get_contents(get_template_directory_uri() . '/inc/ui/demo-three_option_pointer.svg'); ?>
									</div>
									<div class="radio-dial outer">
										<?php echo file_get_contents(get_template_directory_uri() . '/inc/ui/demo-three_option_dial.svg'); ?>
									</div>
								</div>
							</div>

							<div class="dial-ui-set-container slide" ng-show="isSet(1)">
								<p><strong>2</strong><span class="caption"> / 5</span></p>
								<div class="dial-ui-set">
									<div class="content-dial">
										<h5 ng-hide="pdSelected==true"><strong>Professional development</strong> is essential for building capacity and confidence in educators. Choose the PD solution that best fits your needs.</h5>
										<p class="professional-development-color" ng-show="professionalDevelopmentSolutions == 'Mentoring PD'">Work one-on-one with a Teq PD Specialist and get <strong>focused mentoring</strong> to help you become your most effective. Available as in-person and/or virtual PD.</p>
										<p class="professional-development-color" ng-show="professionalDevelopmentSolutions == 'Coaching PD'">Assemble a small group of educators for <strong>specialized coaching</strong> around your goals and needs. Available as in-person and/or virtual PD.</p>
										<p class="professional-development-color" ng-show="professionalDevelopmentSolutions == 'Online (OTIS) PD'">Utilize <strong>OTIS for educators</strong>, our virtual PD platform, for relevant and on-demand training that connects technology and instruction.</p>
										<input type="radio" name="professinal-development-solutions" ng-model="professionalDevelopmentSolutions" ng-value='"Mentoring PD"' id="mentoring-pd" value="mentoring-pd">
										<input type="radio" name="professinal-development-solutions" ng-model="professionalDevelopmentSolutions" ng-value='"Coaching PD"' id="coaching-pd" value="coaching-pd">
										<input type="radio" name="professinal-development-solutions" ng-model="professionalDevelopmentSolutions" ng-value='"Online (OTIS) PD"' id="online-pd" value="online-pd">
									</div>
									<div class="radio-dial professional-development outer">
										<?php echo file_get_contents(get_template_directory_uri() . '/inc/ui/pd-three_option_dial.svg'); ?>
									</div>
								</div>
								<div class="dial-ui-set">
									<div class="content-dial">
										<h5 ng-hide="lessonContentSelected==true">From project-based learning, to custom curriculum and do-anywhere activities, there's a wealth of <strong>lesson content solutions</strong> for you to leverage. Choose an option!</h5>
										<p class="content-creation-color" ng-show="lessonContentSolutions == 'Project-Based Learning'">Explore iBlocks, our technology-centric <strong>project-based learning (PBL)</strong> challenges that guide students through the journey of the Engineering Design Process.</p>
										<p class="content-creation-color" ng-show="lessonContentSolutions == 'Customized Content Creation'">Take your iBlock up a notch with our options to <strong>customize content,</strong> subject matter, scope, and sequence. </p>
										<p class="content-creation-color" ng-show="lessonContentSolutions == 'Educational Resources'">Access our ever-growing <strong>library of lesson resources and inspiration,</strong> and download templates, files, worksheets, and more.</p>
										<input type="radio" name="lesson-content-solutions" ng-model="lessonContentSolutions" ng-value='"Project-Based Learning"' value="project-based-learning-lesson-content">
										<input type="radio" name="lesson-content-solutions" ng-model="lessonContentSolutions" ng-value='"Customized Content Creation"' value="customized-content-lesson-content">
										<input type="radio" name="lesson-content-solutions" ng-model="lessonContentSolutions" ng-value='"Educational Resources"' value="educational-resources-lesson-content">
									</div>
									<div class="radio-dial outer">
										<?php echo file_get_contents(get_template_directory_uri() . '/inc/ui/lesson-content-three_option_dial.svg'); ?>
									</div>
								</div>
							</div>

							<div class="dial-ui-set-container slide" ng-show="isSet(2)">
								<p><strong>3</strong><span class="caption"> / 5</span></p>
								<div class="dial-ui-set">
									<div class="content-dial">
										<h5 ng-hide="classroomSelected==true"><strong>Transform classroom learning</strong> with immersive solutions that break the mold, build engagement, and make a lasting impact on student learning.</h5>
										<p class="classroom-transformation-color" ng-show="classroomTransformationSolutions == 'SMART Board/SMART Learning Suite'"><strong>SMART’s range of interactive flat panels and accompanying software</strong> support dynamic, student-centered learning that sparks interaction and engagement.</p>
										<p class="classroom-transformation-color" ng-show="classroomTransformationSolutions == 'Active Learning Spaces'">Physical movement and activity helps students learn. Explore the <strong>best-in-class active learning solutions</strong> that get students moving and thinking at the same time.</p>
										<p class="classroom-transformation-color" ng-show="classroomTransformationSolutions == 'Evospaces (furniture)'">An <strong>evoSpace is a unique classroom environment</strong> that supports and represents every aspect of 21st century learning — we like to call it the complete thought.</p>
										<input type="radio" name="classroom-transformation-solutions" ng-model="classroomTransformationSolutions" ng-value='"SMART Board/SMART Learning Suite"' value="smartboard-classroom-solutions">
										<input type="radio" name="classroom-transformation-solutions" ng-model="classroomTransformationSolutions" ng-value='"Active Learning Spaces"' value="active-spaces-classroom-solutions">
										<input type="radio" name="classroom-transformation-solutions" ng-model="classroomTransformationSolutions" ng-value='"Evospaces (furniture)"' value="evospaces-classroom-solutions">
									</div>
									<div class="radio-dial outer">
										<?php echo file_get_contents(get_template_directory_uri() . '/inc/ui/classroom-transformation-three_option_dial.svg'); ?>
									</div>
								</div>
								<div class="dial-ui-set">
									<div class="content-dial">
										<h5 ng-hide="stemSelected==true"><strong>Explore the STEM solutions</strong> that help students practice future-ready skills now, and prepare them for success in college and career.</h5>
										<p class="stem-solutions-color" ng-show="stemSolutions == 'General STEM'">Take a look at the classroom solutions that open up a world of <strong>STEM for students</strong> and make a lasting impact on learning. </p>
										<p class="stem-solutions-color" ng-show="stemSolutions == 'Coding';">Explore options in <strong>coding</strong> and programming to ensure students thrive in computer science.</p>
										<p class="stem-solutions-color" ng-show="stemSolutions == 'Robotics'">Engage students in <strong>robotics</strong> with a wide range of products that build knowledge through hands-on learning.</p>
										<p class="stem-solutions-color" ng-show="stemSolutions == 'Hydroponics'">Introduce students to <strong>hydroponic gardening</strong> as they experience everything from agriculture to engineering.</p>
										<input type="radio" name="stem-solutions" ng-model="stemSolutions" ng-value='"General STEM"' value="general-stem">
										<input type="radio" name="stem-solutions" ng-model="stemSolutions" ng-value='"Coding"' value="coding">
										<input type="radio" name="stem-solutions" ng-model="stemSolutions" ng-value='"Robotics"' value="robotics">
										<input type="radio" name="stem-solutions" ng-model="stemSolutions" ng-value='"Hydroponics"' value="hydroponics">
									</div>
									<div class="radio-dial outer">
										<?php echo file_get_contents(get_template_directory_uri() . '/inc/ui/stem_solutions_four_option_dial.svg'); ?>
									</div>
								</div>
							</div>

							<div class="dial-ui-set-container slide" ng-show="isSet(3)">
								<p><strong>4</strong><span class="caption"> / 5</span></p>
								<div class="dial-ui-set">
									<div class="content-dial">
										<h5 ng-hide="gradeSelected==true"><strong>Choose the grade band</strong> that best represents your student demographic. This will help us find the right solution for you.</h5>
										<p class="grade-band-color" ng-show="gradeBand == 'Grades K-2'"><strong>K-2</strong> best fits the solution I'm looking for.</p>
										<p class="grade-band-color" ng-show="gradeBand == 'Grades 3-5'"><strong>Grades 3-5</strong> best fits the solution I'm looking for.</p>
										<p class="grade-band-color" ng-show="gradeBand == 'Grades 6-8'"><strong>Grades 6-8</strong> best fits the solution I'm looking for.</p>
										<p class="grade-band-color" ng-show="gradeBand == 'Grades 9-12'"><strong>Grades 9-12</strong> best fits the solution I'm looking for.</p>
										<input type="radio" name="grade-band-level" ng-model="gradeBand" ng-value='"Grades K-2"' value="grades-k-2">
										<input type="radio" name="grade-band-level" ng-model="gradeBand" ng-value='"Grades 3-5"' value="grades-3-5">
										<input type="radio" name="grade-band-level" ng-model="gradeBand" ng-value='"Grades 6-8"' value="grades-6-8">
										<input type="radio" name="grade-band-level" ng-model="gradeBand" ng-value='"Grades 9-12"' value="grades-9-12">
									</div>
									<div class="radio-dial outer">
										<?php echo file_get_contents(get_template_directory_uri() . '/inc/ui/grade_band_four_option_dial.svg'); ?>
									</div>
								</div>
								<div class="dial-ui-set">
									<div class="content-dial">
										<h5 ng-hide="subjectSelected==true"><strong>Choose the subject</strong> that's most relevant for you.</h5>
										<p class="subject-matter-color" ng-bind-html="subjectTitle"></p>
										<input type="checkbox" name="subject[ela]" ng-model="subjectMatterEla" ng-value='"ELA"' value="ela">
										<input type="checkbox" name="subject[engineering]" ng-model="subjectMatterEngineering" ng-value='"Engineering"' value="engineering">
										<input type="checkbox" name="subject[english]" ng-model="subjectMatterEnglish" ng-value='"English"' value="english">
										<input type="checkbox" name="subject[math]" ng-model="subjectMatterMath" ng-value='"Math"' value="math">
										<input type="checkbox" name="subject[science]" ng-model="subjectMatterScience" ng-value='"Science"' value="science">
										<input type="checkbox" name="subject[socialStudies]" ng-model="subjectMatterSocialStudies" ng-value='"Social Studies"' value="social-studies">
										<input type="checkbox" name="subject[specialEducation]" ng-model="subjectMatterSpecialEducation" ng-value='"Special Education"' value="special-education">
										<input type="checkbox" name="subject[stem]" ng-model="subjectMatterStem" ng-value='"STEM"' value="stem">
									</div>
									<div class="radio-dial outer">
										<?php echo file_get_contents(get_template_directory_uri() . '/inc/ui/subject_matter_eight_option_dial.svg'); ?>
									</div>
								</div>
							</div>

							<div class="dial-ui-set-container slide" ng-show="isSet(4)">
								<p><strong>5</strong><span class="caption"> / 5</span></p>
								<div class="dial-ui-set">
									<div class="content-dial">
										<h5 ng-hide="show==26 || show==27 || show==28">What's your level of <strong>proficiency with technology</strong>? (This is not a trick question!)</h5>
										<p class="technology-proficiency-color" ng-show="show==26">I'm a beginner so I'll need products with a lighter lift. </p>
										<p class="technology-proficiency-color" ng-show="show==27">I'm still learning, but I'm pretty good with technology.</p>
										<p class="technology-proficiency-color" ng-show="show==28">I'm a pro, so give me your best!</p>
										<input type="radio" name="technology-proficiency" ng-model="technologyProficiency" ng-value='"Easy Proficiency"' value="easy-technology-Proficiency">
										<input type="radio" name="technology-proficiency" ng-model="technologyProficiency"  ng-value='"Intermediate Proficiency"' value="intermediate-technology-Proficiency">
										<input type="radio" name="technology-proficiency" ng-model="technologyProficiency"  ng-value='"Advanced Proficiency"' value="advanced-technology-Proficiency">
									</div>
									<div class="radio-dial outer">
										<?php echo file_get_contents(get_template_directory_uri() . '/inc/ui/technology-proficiency-three_option_dial.svg'); ?>
									</div>
								</div>
								<div class="dial-ui-set instructions" ng-if="pdSelected==true && lessonContentSelected==true && classroomSelected==true && stemSelected==true && gradeSelected==true &&  proficiencySelected==true">
									<h4 class="padding-sm strong">Let's create your solution now <span class="arrow"></span></h4>
								</div>
							</div>

						</div>

						<div class="column is-3-desktop relative-position gauge-display-main">
							<p class="title-field">Your Solution</p>
							<div class="gauge outer"></div>
							<div class="gauge-reader-glare"></div>
							<object type="image/svg+xml" data="<?php echo get_template_directory_uri() . '/inc/images/gauge-ticks.svg'; ?>" class="gauge-ticks"></object>
							<div class="gauge-reader-shadow outer hard"></div>
							<div class="gauge-reader inner">
								<div class="fill">
									<span ng-if="technologyProficiency==='Easy Proficiency' || technologyProficiency==='Intermediate Proficiency' || technologyProficiency==='Advanced Proficiency'"></span>
									<span ng-if="subjectTitle"></span>
									<span ng-if="gradeBand==='Grades K-2' || gradeBand==='Grades 3-5' || gradeBand==='Grades 6-8' || gradeBand==='Grades 9-12'"></span>
									<span ng-if="classroomTransformationSolutions==='SMART Board/SMART Learning Suite' || classroomTransformationSolutions==='Active Learning Spaces' || classroomTransformationSolutions==='Evospaces (furniture)'"></span>
									<span ng-if="stemSolutions==='General STEM' || stemSolutions==='Coding' || stemSolutions==='Robotics' || stemSolutions==='Hydroponics'"></span>
									<span ng-if="lessonContentSolutions==='Project-Based Learning' || lessonContentSolutions==='Customized Content Creation' || lessonContentSolutions==='Educational Resources'"></span>
									<span ng-if="professionalDevelopmentSolutions==='Mentoring PD' || professionalDevelopmentSolutions==='Coaching PD' || professionalDevelopmentSolutions==='Online (OTIS) PD'"></span>
									<span class="top-fill"></span>
								</div>
							</div>
							<h6 class="gauge-labels">
								<span class="technology-proficiency-color" ng-if="technologyProficiency==='Easy Proficiency' || technologyProficiency==='Intermediate Proficiency' || technologyProficiency==='Advanced Proficiency'">{{technologyProficiency}}</span>
								<span class="subject-matter-color" ng-bind-html="subjectLabel"></span>
								<span class="grade-band-color" ng-if="gradeBand==='Grades K-2' || gradeBand==='Grades 3-5' || gradeBand==='Grades 6-8' || gradeBand==='Grades 9-12'">{{gradeBand}}</span>
								<span class="classroom-transformation-color" ng-if="classroomTransformationSolutions==='SMART Board/SMART Learning Suite' || classroomTransformationSolutions==='Active Learning Spaces' || classroomTransformationSolutions==='Evospaces (furniture)'">{{classroomTransformationSolutions}}</span>
								<span class="stem-solutions-color" ng-if="stemSolutions==='General STEM' || stemSolutions==='Coding' || stemSolutions==='Robotics' || stemSolutions==='Hydroponics'">{{stemSolutions}}</span>
								<span class="content-creation-color" ng-if="lessonContentSolutions==='Project-Based Learning' || lessonContentSolutions==='Customized Content Creation' || lessonContentSolutions==='Educational Resources'">{{lessonContentSolutions}}</span>
								<span class="professional-development-color" ng-if="professionalDevelopmentSolutions==='Mentoring PD' || professionalDevelopmentSolutions==='Coaching PD' || professionalDevelopmentSolutions==='Online (OTIS) PD'">{{professionalDevelopmentSolutions}}</span>
							</h6>
						</div>

					</form>
					</div>

				</section><!-- END OF START CREATING SECTION -->

			</div>
		</section>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
