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
 					<div class="columns is-vcentered">
 						<div class="column is-full-desktop is-full-tablet is-full-mobile has-text-centered">
           		<h1 class="serif-text text-shadow less-letter-spacing white-text extra-large-header">We’re not the company you think we are.  </h1>
 							<section class="accordion-container" ng-controller="theCompleteThought">
								<div class="accordion-content">
									<h2 ng-repeat="item in items" class="accordion-item" ng-show="show == {{item.id}}" ng-class="{'is-active': item == items[0]}">
										{{item.content}}
									</h2>
								</div>
								<div class="accordion-ui">
									<button type="button" class="prev" ng-class="{'active': show < {{items.length + 1}}}" ng-disabled="show < 1" ng-click="prevItem()">
										<svg version="1.1" viewBox="0 0 50 50">
											<polygon points="22.005,3.425 0.289,25.142 0.293,25.146 0.289,25.15 21.957,46.817 29.104,39.67 19.622,30.189 49.594,30.189 49.594,20.082 19.641,20.082 29.152,10.571 	"/>
										</svg>
									</button>
									<button type="button" class="next" ng-class="{'active': show > 0}" ng-disabled="show > {{items.length + 1}}" ng-click="nextItem()">
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
								 View the Case Study
							 </div>
						 </div>
					 </div>
				 </div>


       </section>
 		</main><!-- #main -->
 	</div><!-- #primary -->

 <?php
 get_footer();
