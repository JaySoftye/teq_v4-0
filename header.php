<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Teq_v4.0
 */
	global $post
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> ng-app="application" ng-controller="navCtrl">

	<header id="masthead" class="site-header" ng-controller="dropdownCtrl">
		<nav class="navbar" role="navigation" aria-label="main navigation">

  		<div class="navbar-brand">
    		<a class="navbar-item" href="<?php echo home_url(); ?>">
					<svg version="1.1" x="0px" y="0px" viewBox="0 0 85 60">
						<g>
							<polygon points="28,10.3 8.6,9.5 9.4,13.4 15.4,12.7 14.9,44.4 17.3,45 20.7,12.5 27.2,12.2 	"/>
							<path d="M37.5,38.8c-0.3,0-0.6,0-0.8,0.1c-3.4,0.2-7.6-0.8-8.7-8.7l14.2-1c-0.1-1.3-0.2-2-0.4-3.1c-0.9-5.3-3.3-9.7-9.4-9.3 c-0.2,0-0.5,0-0.7,0.1c-5.9,0.9-8.1,7.2-6.9,14.4c1,5.8,4.6,12.2,13.2,11c2.1-0.3,4.1-0.9,5.2-1.6l-1.7-3.3 C40.5,38,39.3,38.6,37.5,38.8z M31.8,19.5c2.9-0.4,5.1,2.2,5.9,6.8l-9.5,1.1C27.7,23.9,28.5,20,31.8,19.5z"/>
							<path d="M62.6,21.5h-0.1c-1.1-2.8-3.1-4-5.2-4.3c-4.4-0.6-9.6,2.9-10.9,10.8C45.2,34.3,46,42,53,43c3,0.4,5.7-1.1,6.8-2.8H60 l-1.6,12.6l3-0.4l4.8-25.9l1.3-7.4l-4.9-2.2L62.6,21.5z M61.4,27.7l-0.7,6.1c-0.5,4.6-3.8,5.9-5.7,5.7c-4.9-0.7-5.2-7.3-4.5-11.5 c0.8-4.8,3.2-8.3,6.8-7.7C60.3,20.7,61.9,24,61.4,27.7z"/>
							<path d="M76.7,11.2c-0.2-0.4-0.5-0.6-0.8-0.8s-0.7-0.3-1.1-0.3s-0.8,0.1-1.1,0.3c-0.3,0.2-0.6,0.5-0.8,0.8 c-0.2,0.4-0.3,0.7-0.3,1.2c0,0.4,0.1,0.8,0.3,1.2c0.2,0.4,0.5,0.6,0.8,0.9c0.3,0.2,0.7,0.3,1.1,0.3s0.8-0.1,1.1-0.3 c0.3-0.2,0.6-0.5,0.8-0.9c0.2-0.4,0.3-0.7,0.3-1.2C77,12,76.9,11.6,76.7,11.2z M76.5,13.4c-0.2,0.3-0.4,0.6-0.7,0.8 c-0.3,0.2-0.6,0.3-1,0.3s-0.7-0.1-1-0.3s-0.5-0.4-0.7-0.8c-0.2-0.3-0.3-0.7-0.3-1c0-0.4,0.1-0.7,0.3-1c0.2-0.3,0.4-0.6,0.7-0.8 c0.3-0.2,0.6-0.3,1-0.3s0.7,0.1,1,0.3s0.5,0.4,0.7,0.8c0.2,0.3,0.3,0.7,0.3,1C76.7,12.8,76.6,13.1,76.5,13.4z"/>
							<path d="M75.7,13.1c0-0.2,0-0.3-0.1-0.4c-0.1-0.1-0.2-0.2-0.3-0.3c0.3-0.1,0.4-0.3,0.4-0.6s-0.1-0.5-0.2-0.6 c-0.2-0.1-0.4-0.2-0.7-0.2H74v2.6h0.3v-1.1h0.6c0.2,0,0.3,0,0.4,0.1s0.1,0.2,0.1,0.4c0,0.3,0,0.5,0,0.6h0.3l0,0c0,0,0-0.1,0-0.2 C75.7,13.4,75.7,13.3,75.7,13.1z M75.3,12.2c-0.1,0.1-0.2,0.1-0.4,0.1h-0.6v-1h0.5c0.2,0,0.4,0,0.5,0.1s0.1,0.2,0.1,0.4 S75.4,12.1,75.3,12.2z"/>
						</g>
					</svg>
    		</a>
				<svg version="1.1" class="mobile-brand-icon" viewBox="0 0 133.71 60" ng-click="mainMenu()" ng-class="class">
					<g>
						<path d="M132.438,32.618c-0.203-1.656-1.557-2.946-3.213-3.051c-0.324-0.02-0.648-0.02-0.972-0.02c-8.522,0-10.503,0-19.019,0 c-8.578,0-17.156,0.003-25.732-0.005c-0.94-0.001-1.811,0.147-2.57,0.746c-1.149,0.906-1.613,2.414-1.169,3.826 c0.436,1.384,1.723,2.359,3.186,2.412c0.223,0.008,0.446,0.007,0.669,0.007c17.114,0,27.695,0.001,44.809-0.007 c0.522,0,1.064-0.023,1.562-0.162C131.603,35.915,132.641,34.284,132.438,32.618z"/>
						<path  d="M83.135,22.546c3.933,0.02,7.867,0.007,11.8,0.007c1.989,0.001,3.976,0.001,5.962,0.001c5.839,0,11.679,0.003,17.518-0.001 c1.736-0.001,3.065-0.936,3.53-2.443c0.699-2.27-0.948-4.515-3.356-4.527c-3.589-0.02-7.178-0.007-10.767-0.007 c-8.191,0-16.382-0.003-24.573,0.001c-2.06,0.001-3.601,1.434-3.653,3.369C79.542,20.956,81.068,22.535,83.135,22.546z"/>
						<path d="M111.855,42.957c-0.061-0.001-0.122-0.003-0.182-0.003c-3.668,0-13.888,0-17.556,0c-0.001-0.001-0.001-0.001-0.001,0 c-3.689,0-7.377-0.028-11.068,0.01c-2.711,0.028-4.337,2.92-2.972,5.234c0.711,1.203,1.803,1.739,3.199,1.738 c6.548-0.008,19.644-0.003,26.192-0.003c0.79,0,1.582,0.013,2.372-0.005c1.928-0.044,3.411-1.564,3.414-3.478 C115.255,44.526,113.792,43.023,111.855,42.957z"/>
					</g>
					<g>
						<polygon points="23.755,8.998 2.789,8.133 3.653,12.348 10.138,11.592 9.597,45.851 12.191,46.5 15.866,11.376 22.891,11.051 	"/>
						<path d="M34.022,39.799c-0.324,0-0.648,0-0.865,0.108c-3.675,0.216-8.214-0.865-9.403-9.403l15.347-1.081 c-0.108-1.405-0.216-2.161-0.432-3.35c-0.973-5.728-3.566-10.483-10.159-10.051c-0.216,0-0.54,0-0.757,0.108 c-6.376,0.973-8.754,7.781-7.457,15.563c1.081,6.268,4.971,13.185,14.266,11.888c2.27-0.324,4.431-0.973,5.62-1.729l-1.837-3.566 C37.265,38.935,35.968,39.583,34.022,39.799z M27.862,18.941c3.134-0.432,5.512,2.378,6.376,7.349l-10.267,1.189 C23.431,23.696,24.296,19.481,27.862,18.941z"/>
						<path d="M61.149,21.102h-0.108c-1.189-3.026-3.35-4.323-5.62-4.647c-4.755-0.648-10.375,3.134-11.78,11.672 c-1.297,6.809-0.432,15.131,7.133,16.211c3.242,0.432,6.16-1.189,7.349-3.026h0.216L56.61,54.93l3.242-0.432l5.188-27.991 l1.405-7.998l-5.296-2.378L61.149,21.102z M59.852,27.803l-0.757,6.593c-0.54,4.971-4.107,6.376-6.16,6.16 c-5.296-0.757-5.62-7.889-4.863-12.429c0.865-5.188,3.458-8.97,7.349-8.322C58.663,20.238,60.393,23.804,59.852,27.803z"/>
						<path d="M72.406,12.51c-0.216-0.432-0.54-0.648-0.865-0.865c-0.324-0.216-0.757-0.324-1.189-0.324 c-0.432,0-0.865,0.108-1.189,0.324c-0.324,0.216-0.648,0.54-0.865,0.865c-0.216,0.432-0.324,0.757-0.324,1.297 c0,0.432,0.108,0.865,0.324,1.297s0.54,0.648,0.865,0.973c0.324,0.216,0.757,0.324,1.189,0.324c0.432,0,0.865-0.108,1.189-0.324 c0.324-0.216,0.648-0.54,0.865-0.973c0.216-0.432,0.324-0.757,0.324-1.297C72.73,13.375,72.622,12.943,72.406,12.51z M72.189,14.888c-0.216,0.324-0.432,0.648-0.757,0.865c-0.324,0.216-0.648,0.324-1.081,0.324c-0.432,0-0.757-0.108-1.081-0.324 c-0.324-0.216-0.54-0.432-0.757-0.865c-0.216-0.324-0.324-0.757-0.324-1.081c0-0.432,0.108-0.757,0.324-1.081 c0.216-0.324,0.432-0.648,0.757-0.865c0.324-0.216,0.648-0.324,1.081-0.324c0.432,0,0.757,0.108,1.081,0.324 c0.324,0.216,0.54,0.432,0.757,0.865c0.216,0.324,0.324,0.757,0.324,1.081C72.406,14.24,72.297,14.564,72.189,14.888z"/>
						<path d="M71.325,14.564c0-0.216,0-0.324-0.108-0.432c-0.108-0.108-0.216-0.216-0.324-0.324c0.324-0.108,0.432-0.324,0.432-0.648 s-0.108-0.54-0.216-0.648c-0.216-0.108-0.432-0.216-0.757-0.216h-0.865v2.81h0.324v-1.189h0.648c0.216,0,0.324,0,0.432,0.108 c0.108,0.108,0.108,0.216,0.108,0.432c0,0.324,0,0.54,0,0.648h0.324l0,0c0,0,0-0.108,0-0.216 C71.325,14.888,71.325,14.78,71.325,14.564z M70.892,13.591c-0.108,0.108-0.216,0.108-0.432,0.108h-0.648v-1.081h0.54 c0.216,0,0.432,0,0.54,0.108c0.108,0.108,0.108,0.216,0.108,0.432C71.001,13.375,71.001,13.483,70.892,13.591z"/>
					</g>
				</svg>
  		</div>

			<div class="navbar-menu">
				<ul class="main-menu navbar-start primary-menu" role="menu">
					<li class="navbar-item browse-nav-item">
						<a href="/browse">Browse<span>our products</span></a>
					</li>
					<li class="navbar-item create-nav-item">
						<a href="/create">Create<span>your solution</span></a>
					</li>
					<li class="navbar-item evolve-nav-item">
						<a href="/evolve">Evolve<span>your classroom</span></a>
					</li>
				</ul>
			</div>

  		<div class="navbar-menu secondary-browse-menu">
				<ul class="main-menu navbar-end" role="menu">
					<li>
						<div class="dropdown is-hoverable">
							<div class="dropdown-trigger">
								<button class="ng-class: stemMenuActive" ng-click="stemMenu()">ALL PRODUCTS</button>
							</div>
						</div>
					</li>
					<li>
						<div class="dropdown is-hoverable">
							<div class="dropdown-trigger">
								<button class="ng-class: filtersMenuActive" ng-click="filtersMenu()">PRODUCT FILTERS</button>
							</div>
						</div>
					</li>
				</ul>
				<button class="menu-button search-button" ng-init="searchActive = false" ng-click="searchActive = !searchActive">Search</button>
				<div class="search-form-container">
					<form role="search" method="get" class="search-form" ng-class="{'active': searchActive}" action="<?php echo home_url(); ?>">
						<label>
							<input type="search" class="search-field" placeholder="...search" value="" name="s">
						</label>
					</form>
				</div>
				<button class="menu-button hamburger-button ng-class: mainMenuActive" ng-click="mainMenu()">Menu</button>
  		</div>
		</nav>
		<div class="main-dropdown-menu-container ng-class: menuActive">
			<div class="container">
				<div class="menu-list primary-menu columns">
					<?php if(is_page('Browse')) { ?>
						<div class="column">
							<?php wp_nav_menu(array(
								'menu'       => 'Main Menu', // specify the menu name
								'menu_class' => '',
								'container'  => '',
								'items_wrap' => '<ul class="main-dropdown-menu center" role="menu" >%3$s</ul>'
							));?>
						</div>
					<?php } elseif($post->post_parent != 0) { ?>
						<div class="column">
							<?php wp_nav_menu(array(
								'menu'       => 'Main Menu', // specify the menu name
								'menu_class' => '',
								'container'  => '',
								'items_wrap' => '<ul class="main-dropdown-menu center" role="menu" >%3$s</ul>'
							));?>
						</div>
					<?php } else { ?>
						<div class="column">
							<h6><a href="/browse/stem-technologies">STEM Technologies</a></h6>
							<div class="has-dropdown-menu menu-closed">
								<h6 class="dropdown-target">Coding</h6>
								<?php wp_nav_menu(array(
									'menu'       => 'Coding', // specify the menu name
									'menu_class' => '',
									'container'  => '',
									'items_wrap' => '<ul class="main-dropdown-menu dropdown-list" role="menu" >%3$s</ul>'
								));?>
							</div>
							<div class="has-dropdown-menu menu-closed">
								<h6 class="dropdown-target">Robotics</h6>
								<?php wp_nav_menu(array(
									'menu'       => 'Robotics', // specify the menu name
									'menu_class' => '',
									'container'  => '',
									'items_wrap' => '<ul class="main-dropdown-menu dropdown-list" role="menu" >%3$s</ul>'
								));?>
							</div>
							<div class="has-dropdown-menu menu-closed">
								<h6 class="dropdown-target">3D Printing</h6>
								<?php wp_nav_menu(array(
									'menu'       => '3D Printing', // specify the menu name
									'menu_class' => '',
									'container'  => '',
									'items_wrap' => '<ul class="main-dropdown-menu dropdown-list" role="menu" >%3$s</ul>'
								));?>
							</div>
							<div class="has-dropdown-menu menu-closed">
								<h6 class="dropdown-target">Hydroponics</h6>
								<?php wp_nav_menu(array(
									'menu'       => 'Hydroponics', // specify the menu name
									'menu_class' => '',
									'container'  => '',
									'items_wrap' => '<ul class="main-dropdown-menu dropdown-list" role="menu" >%3$s</ul>'
								));?>
							</div>
							<div class="has-dropdown-menu menu-closed">
								<h6 class="dropdown-target">AR/VR</h6>
								<?php wp_nav_menu(array(
									'menu'       => 'AR/VR', // specify the menu name
									'menu_class' => '',
									'container'  => '',
									'items_wrap' => '<ul class="main-dropdown-menu dropdown-list" role="menu" >%3$s</ul>'
								));?>
							</div>
							<div class="has-dropdown-menu menu-closed">
								<h6 class="dropdown-target">Instructional Software</h6>
								<?php wp_nav_menu(array(
									'menu'       => 'Instructional Software', // specify the menu name
									'menu_class' => '',
									'container'  => '',
									'items_wrap' => '<ul class="main-dropdown-menu dropdown-list" role="menu" >%3$s</ul>'
								));?>
							</div>
						</div>
						<div class="column">
							<h6><a href="/teq-blocks">Teq Blocks</a></h6>
							<?php wp_nav_menu(array(
								'menu'       => 'Teq Blocks Dropdown Menu', // specify the menu name
								'menu_class' => '',
								'container'  => '',
								'items_wrap' => '<ul class="main-dropdown-menu dropdown-list" role="menu" >%3$s</ul>'
							));?>

						</div>
						<div class="column">
							<h6><a href="/browse/professional-development">Professional Development</a></h6>
							<?php wp_nav_menu(array(
								'menu'       => 'Professional Development Dropdown Menu', // specify the menu name
								'menu_class' => '',
								'container'  => '',
								'items_wrap' => '<ul class="main-dropdown-menu" role="menu" >%3$s</ul>'
							));?>
						</div>
						<div class="column">
							<h6><a href="/browse/educational-technology">Educational Technology</a></h6>
							<div class="has-dropdown-menu menu-closed">
								<h6 class="dropdown-target">SMART Boards</h6>
								<?php wp_nav_menu(array(
									'menu'       => 'SMART Boards', // specify the menu name
									'menu_class' => '',
									'container'  => '',
									'items_wrap' => '<ul class="main-dropdown-menu dropdown-list" role="menu" >%3$s</ul>'
								));?>
							</div>
							<?php wp_nav_menu(array(
								'menu'       => 'Educational Technology Dropdown Menu', // specify the menu name
								'menu_class' => '',
								'container'  => '',
								'items_wrap' => '<ul class="main-dropdown-menu" role="menu" >%3$s</ul>'
							));?>
						</div>
						<div class="column">
							<h6></h6>
							<?php wp_nav_menu(array(
								'menu'       => 'Main Menu', // specify the menu name
								'menu_class' => '',
								'container'  => '',
								'items_wrap' => '<ul class="main-dropdown-menu right" role="menu" >%3$s</ul>'
							));?>
						</div>
					<?php } ?>
				</div>
				<div class="menu-list stem-menu columns is-multiline">
					<div class="column">
						<h6><a href="/browse/stem-technologies">STEM Technologies</a></h6>
						<div class="has-dropdown-menu menu-closed">
							<h6 class="dropdown-target">Coding</h6>
							<?php wp_nav_menu(array(
								'menu'       => 'Coding', // specify the menu name
								'menu_class' => '',
								'container'  => '',
								'items_wrap' => '<ul class="main-dropdown-menu dropdown-list" role="menu" >%3$s</ul>'
							));?>
						</div>
						<div class="has-dropdown-menu menu-closed">
							<h6 class="dropdown-target">Robotics</h6>
							<?php wp_nav_menu(array(
								'menu'       => 'Robotics', // specify the menu name
								'menu_class' => '',
								'container'  => '',
								'items_wrap' => '<ul class="main-dropdown-menu dropdown-list" role="menu" >%3$s</ul>'
							));?>
						</div>
						<div class="has-dropdown-menu menu-closed">
							<h6 class="dropdown-target">3D Printing</h6>
							<?php wp_nav_menu(array(
								'menu'       => '3D Printing', // specify the menu name
								'menu_class' => '',
								'container'  => '',
								'items_wrap' => '<ul class="main-dropdown-menu dropdown-list" role="menu" >%3$s</ul>'
							));?>
						</div>
						<div class="has-dropdown-menu menu-closed">
							<h6 class="dropdown-target">Hydroponics</h6>
							<?php wp_nav_menu(array(
								'menu'       => 'Hydroponics', // specify the menu name
								'menu_class' => '',
								'container'  => '',
								'items_wrap' => '<ul class="main-dropdown-menu dropdown-list" role="menu" >%3$s</ul>'
							));?>
						</div>
						<div class="has-dropdown-menu menu-closed">
							<h6 class="dropdown-target">AR/VR</h6>
							<?php wp_nav_menu(array(
								'menu'       => 'AR/VR', // specify the menu name
								'menu_class' => '',
								'container'  => '',
								'items_wrap' => '<ul class="main-dropdown-menu dropdown-list" role="menu" >%3$s</ul>'
							));?>
						</div>
						<div class="has-dropdown-menu menu-closed">
							<h6 class="dropdown-target">Instructional Software</h6>
							<?php wp_nav_menu(array(
								'menu'       => 'Instructional Software', // specify the menu name
								'menu_class' => '',
								'container'  => '',
								'items_wrap' => '<ul class="main-dropdown-menu dropdown-list" role="menu" >%3$s</ul>'
							));?>
						</div>
					</div>
					<div class="column">
						<h6><a href="/teq-blocks">Teq Blocks</a></h6>
						<?php wp_nav_menu(array(
							'menu'       => 'Teq Blocks Dropdown Menu', // specify the menu name
							'menu_class' => '',
							'container'  => '',
							'items_wrap' => '<ul class="main-dropdown-menu dropdown-list" role="menu" >%3$s</ul>'
						));?>

					</div>
					<div class="column">
						<h6><a href="/browse/professional-development">Professional Development</a></h6>
						<?php wp_nav_menu(array(
							'menu'       => 'Professional Development Dropdown Menu', // specify the menu name
							'menu_class' => '',
							'container'  => '',
							'items_wrap' => '<ul class="main-dropdown-menu" role="menu" >%3$s</ul>'
						));?>
					</div>
					<div class="column">
						<h6><a href="/browse/educational-technology">Educational Technology</a></h6>
						<div class="has-dropdown-menu menu-closed">
							<h6 class="dropdown-target">SMART Boards</h6>
							<?php wp_nav_menu(array(
								'menu'       => 'SMART Boards', // specify the menu name
								'menu_class' => '',
								'container'  => '',
								'items_wrap' => '<ul class="main-dropdown-menu dropdown-list" role="menu" >%3$s</ul>'
							));?>
						</div>
						<?php wp_nav_menu(array(
							'menu'       => 'Educational Technology Dropdown Menu', // specify the menu name
							'menu_class' => '',
							'container'  => '',
							'items_wrap' => '<ul class="main-dropdown-menu" role="menu" >%3$s</ul>'
						));?>
					</div>
					<div class="column">
						<h6><a href="/browse/active-learning-spaces">Active Learning Spaces</a></h6>
						<?php wp_nav_menu(array(
							'menu'       => 'Active learning Spaces Dropdown Menu', // specify the menu name
							'menu_class' => '',
							'container'  => '',
							'items_wrap' => '<ul class="main-dropdown-menu" role="menu" >%3$s</ul>'
						));?>
					</div>
				</div>
				<div class="menu-list filters-menu columns">
					<div class="column is-offset-1">

						<div class="filter-container showHideElement">

							<h4>We’re here to help you every step of the way.<br />Find exactly what you need to meet the demands of your school or district using our <strong>product filters.</strong></h4>
							<p>All Teq products and services can categorized using the filters below. <strong>Use the dropdown menus below</strong> to create a customized search for more specific solution.</p>
							<form class="list-filters padding-sm-top-bottom" role="search" method="get" action="<?php echo home_url(); ?>/filter-search-page/?">
								<div class="filter-item" ng-controller="productTypeFilter">
									<select id="selectedProductType" name="selectedProductType" ng-model="selectedProductType" ng-options="item.id as item.name for item in items track by item.id">
										<option value="" selected disabled>Product Type</option>
									</select>
									<span class="down-arrow"></span>
								</div>
								<div class="filter-item" ng-controller="gradeLevelFilter">
									<select id="selectedGradeLevel" name="selectedGradeLevel" ng-model="selectedGradeLevel" ng-options="item.id as item.name for item in items track by item.id">
										<option value="" selected disabled>Grade Level</option>
									</select>
								</div>
								<div class="filter-item" ng-controller="stemSubjectMatterFilter">
									<select id="selectedStemSubjectMatter" name="selectedStemSubjectMatter" ng-model="selectedStemSubjectMatter" ng-options="item.id as item.name for item in items track by item.id">
										<option value="" selected disabled>Subject Matter</option>
									</select>
								</div>
								<div class="filter-item" ng-controller="technologyProficiencyFilter">
									<select id="selectedtechnologyProficiencyLevel" name="selectedtechnologyProficiencyLevel" ng-model="selectedtechnologyProficiencyLevel" ng-options="item.id as item.name for item in items track by item.id">
										<option value="" selected disabled>Technology Proficiency</option>
									</select>
								</div>
								<div class="filter-item">
									<input type="submit" value="View Product(s)" />
								</div>
							</form>
						</div>

					</div>
				</div>
			</div>
		</div>

	</header><!-- #masthead -->
