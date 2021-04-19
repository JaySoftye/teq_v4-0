<?php
/**
 * Template Name: Network-Enabled Device Management Survey 2.0
 * The template for displaying the NEDM survey
 * @package Teq_v4.0
 */
 /**
  * PUBLISH SURVEY results TO CUSTOM POST TYPE 'NEDM Surveys'
	* TEMPLATE PART MUST BE CALLED BEFORE THE HEADER TO 'wp_safe_redirect' PROPERLY
  */
 	get_template_part( 'template-parts/nedm-surveys-publish' );
		get_header();
?>

<div id="primary" class="content-area white-background-fill" ng-app="productTabs" scroll>

	<form id="NEDMsurvey" name="NEDMsurvey" class="site-main section-container" method="POST" action="" ng-controller="TabController">

		<nav class="navbar product-site-header">
			<div class="navbar-menu padding-top">
				<div class="navbar-start">
					<figure ng-class="{ active: isSet(1) }" ng-click="setTab(1)" class="active">
						<img src="<?php echo get_template_directory_uri() . '/inc/images/teq-NEDM.svg'?>" alt="Teq NEDM">
					</figure>
				</div>
				<div class="navbar-end">
					<a class="navbar-item product-demo-request" href="<?php echo get_page_permalink_from_name('Teq Support and Service'); ?>">Back to Teq Support</a>
				</div>
			</div>
		</nav>

		<section class="container">
			<div class="survey-form-tab-container">
				<div class="columns is-centered">
					<div class="column is-1 hide-tablet hide-mobile survey-form-sticky">
						<ol class="survey-pagination">
							<li class="marker" ng-class="{ 'is-active': isSet(2), 'is-complete': tab > 2 }" ng-click="setTab(2)">1</li>
							<li class="spacer"></li>
							<li class="spacer"></li>
							<li class="marker" ng-class="{ 'is-active': isSet(3), 'is-complete': tab > 3  }" ng-click="setTab(3)" >2</li>
							<li class="spacer"></li>
							<li class="spacer"></li>
							<li class="marker" ng-class="{ 'is-active': isSet(4), 'is-complete': tab > 4  }" ng-click="setTab(4)">3</li>
							<li class="spacer"></li>
							<li class="spacer"></li>
							<li class="marker" ng-class="{ 'is-active': isSet(5), 'is-complete': tab > 5  }" ng-click="setTab(5)">4</li>
							<li class="spacer"></li>
							<li class="spacer"></li>
							<li class="marker" ng-class="{ 'is-active': isSet(6) }" ng-click="setTab(6)">5</li>
						</ol>
					</div>

					<section class="column is-8-tablet padding-left padding-right" ng-show="isSet(1)">
						<div>
							<h2 class="step-header" id="surveyHeader">NEDM Survey</h2>
							<h1 class="less-line-height" id="surveySubHeader">Understanding the impact that adding hundreds of devices, will have on your network infrastructure.</h1>
							<p class="margin-top"><strong class="important">A comprehensive approached to managing SMART Devices.</strong> This process is designed to predict and prepare network engineers in mitigating network usability and performance issues prior to the deployment of a significant amount of interactive flat panels. When you purchase interactive flat panels (IFP) from Teq we ask you fill out our <u class="strong important">online network survey</u> that will generate a report describing your network infrastructure and performance.</p>
							<div class="survey-form-fields">
								<div class="field"></div>
								<div class="field">
  								<p class="control">
    								<button type="button" class="button primary" ng-class="{ active: isSet(1) }" ng-click="setTab(2)">GET STARTED <span class="span arrow light"></span></button>
  								</p>
								</div>
							</div>
						</div>
					</section><!-- END OF SURVEY SLIDE 1 -->
					<section class="column is-8-tablet padding-left padding-right" ng-show="isSet(2)">
						<div>
							<h2 class="step-header">Step 1</h2>
							<h1 class="less-line-height">Basic Contact Information</h1>

							<div class="survey-form-fields">
								<div class="field">
  								<label class="label" for="nedmSurveyFirstName">First Name <span class="bold" ng-show="NEDMsurvey.nedmSurveyFirstName.$error.required">(required)</span></label>
  								<div class="control">
    								<input class="input" type="text" name="nedmSurveyFirstName" id="nedmSurveyFirstName" ng-model="nedmSurveyFirstName" placeholder="--" required>
  								</div>
								</div>
								<div class="field">
  								<label class="label" for="nedmSurveyLastName">Last Name <span class="bold" ng-show="NEDMsurvey.nedmSurveyLastName.$error.required">(required)</span></label>
  								<div class="control">
    								<input class="input" type="text" name="nedmSurveyLastName" id="nedmSurveyLastName" ng-model="nedmSurveyLastName" placeholder="--" required>
  								</div>
								</div>
								<div class="field" for="nedmSurveyTitleRole">
  								<label class="label">Title and/or Role <span class="bold" ng-show="NEDMsurvey.nedmSurveyTitleRole.$error.required">(required)</span></label>
  								<div class="control">
    								<input class="input" type="text" name="nedmSurveyTitleRole" id="nedmSurveyTitleRole" ng-model="nedmSurveyTitleRole" placeholder="--" required>
  								</div>
								</div>
								<div class="field">
  								<label class="label" for="nedmSurveySchoolName">School Name <span class="bold" ng-show="NEDMsurvey.nedmSurveySchoolName.$error.required">(required)</span></label>
  								<div class="control">
    								<input class="input" type="text" name="nedmSurveySchoolName" id="nedmSurveySchoolName" ng-model="nedmSurveySchoolName" placeholder="--" required>
  								</div>
								</div>
								<div class="field" for="nedmSurveyContactPhone">
  								<label class="label">Phone <span class="bold" ng-show="NEDMsurvey.nedmSurveyContactPhone.$error.required">(required)</span></label>
  								<div class="control">
    								<input class="input" type="phone" name="nedmSurveyContactPhone" id="nedmSurveyContactPhone" ng-model="nedmSurveyContactPhone" placeholder="000-000-0000" required>
  								</div>
								</div>
								<div class="field">
  								<label class="label" for="nedmSurveyContactEmail">Email <span class="bold" ng-show="NEDMsurvey.nedmSurveyContactEmail.$error.required">(required)</span></label>
  								<div class="control">
    								<input class="input" type="email" name="nedmSurveyContactEmail" id="nedmSurveyContactEmail" ng-model="nedmSurveyContactEmail" placeholder="--" required>
  								</div>
								</div>
								<div class="field is-grouped">
  								<p class="control">
    								<button type="button" class="button secondary" ng-click="setTab(1)"><span class="span arrow light prev"></span> PREV</button>
  								</p>
  								<p class="control">
    								<button type="button" class="button primary" ng-class="{ active: isSet(2) }" ng-click="setTab(3)" ng-disabled="NEDMsurvey.nedmSurveyFirstName.$error.required || NEDMsurvey.nedmSurveyLastName.$error.required || NEDMsurvey.nedmSurveyTitleRole.$error.required || NEDMsurvey.nedmSurveySchoolName.$error.required || NEDMsurvey.nedmSurveyContactPhone.$error.required || NEDMsurvey.nedmSurveyContactEmail.$error.required">NEXT <span class="span arrow light"></span></button>
  								</p>
								</div>
							</div>
						</div>
					</section><!-- END OF SURVEY SLIDE 1 CONTACT INFORMATION -->
					<section class="column is-8-tablet padding-left padding-right" ng-show="isSet(3)">
						<div>
							<h2 class="step-header">Step 2</h2>
							<h1 class="less-line-height">School/district Network Setup</h1>
							<div class="survey-form-fields">
								<div class="field">
  								<label class="label" for="nedmSurveyMakeModelNetworkSwitches">1. What make and Model Network switches are you using?</label>
  								<div class="control">
    								<input class="input" type="text" name="nedmSurveyMakeModelNetworkSwitches" id="nedmSurveyMakeModelNetworkSwitches" placeholder="--">
  								</div>
								</div>
								<div class="field">
  								<label class="label" for="nedmSurveyTotalNumberClientDevices">2. What is total number of client devices on your network</label>
  								<div class="control">
    								<input class="input" type="text" name="nedmSurveyTotalNumberClientDevices" id="nedmSurveyTotalNumberClientDevices" placeholder="--">
  								</div>
								</div>
								<div class="field">
  								<label class="label" for="nedmSurveyDeviceVendor">3. Is there a device vendor that is more prevalent?</label>
  								<div class="control">
    								<input class="input" type="text" name="nedmSurveyDeviceVendor" id="nedmSurveyDeviceVendor" placeholder="Apple, Google, Microsoft etc.">
  								</div>
								</div>
								<div class="field">
  								<label class="label" for="nedm-survey-">4. How will your Devices be connected to the network?</label>
									<div class="field has-addons">
  									<p class="control question-block">
    									<label class="input">A. Interactive Flat Panels</label>
  									</p>
    								<p class="control">
											<span class="select">
												<select name="nedmSurveyIFPconnect" id="nedmSurveyIFPconnect" ng-model="iFPconnect" ng-value="">
													<option value>..</option>
        									<option>wireless</option>
													<option>Wired</option>
      									</select>
    									</span>
  									</p>
									</div>
									<div class="field has-addons">
  									<p class="control question-block">
    									<label class="input">B. Computers/ Desktops </label>
  									</p>
    								<p class="control">
											<span class="select">
												<select name="nedmSurveyComputersDesktopsConnect" id="nedmSurveyComputersDesktopsConnect" ng-model="computersDesktopsConnect" ng-value="">
													<option value>..</option>
        									<option>wireless</option>
													<option>Wired</option>
      									</select>
    									</span>
  									</p>
									</div>
									<div class="field has-addons">
  									<p class="control question-block">
    									<label class="input">C. Tablets etc. </label>
  									</p>
    								<p class="control">
											<span class="select">
												<select name="nedmSurveyTabletsConnect" id="nedmSurveyTabletsConnect" ng-model="tabletsConnect" ng-value="">
													<option value>..</option>
        									<option>wireless</option>
													<option>Wired</option>
      									</select>
    									</span>
  									</p>
									</div>
								</div>
								<div class="field">
  								<label class="label">5. Have you already configured and implemented your managed ports for your IFP’s?</label>
									<div class="field has-addons">
										<p class="control">
											<span class="select">
      									<select name="nedmSurveyConfiguredImplementedManagedPorts" id="nedmSurveyConfiguredImplementedManagedPorts" ng-model="configuredImplementedManagedPorts" ng-value="">
													<option value>..</option>
        									<option value="Yes">Yes</option>
													<option value="No">No</option>
      									</select>
    									</span>
  									</p>
										<p class="control middle-item question-block">
    									<span class="input" ng-class="{ 'disabled': configuredImplementedManagedPorts !== 'Yes' }">If yes, is it a Cloud Solution?</span>
  									</p>
										<div class="control is-expanded">
	    								<input class="input" type="text" name="nedmSurveyYesManagedPorts" id="nedmSurveyYesManagedPorts" placeholder="--" ng-disabled="configuredImplementedManagedPorts !== 'Yes'">
	  								</div>
									</div>
								</div>
								<div class="field">
  								<label class="label">6. Is your school using a proxy for Internet connectivity? </label>
									<div class="field has-addons">
										<p class="control">
											<span class="select">
												<select name="nedmSurveyUsingProxyForInternet" id="nedmSurveyUsingProxyForInternet" ng-model="usingProxyForInternet" ng-value="">
													<option value>..</option>
        									<option value="Yes">Yes</option>
													<option value="No">No</option>
      									</select>
    									</span>
  									</p>
										<p class="control middle-item question-block">
    									<span class="input" ng-class="{ 'disabled': usingProxyForInternet !== 'Yes' }">If yes, what vender you are using?</span>
  									</p>
										<div class="control is-expanded">
	    								<input class="input" type="text" name="nedmSurveyYesWeAreUsingProxy" id="nedmSurveyYesWeAreUsingProxy" placeholder="--" ng-disabled="usingProxyForInternet !== 'Yes'">
	  								</div>
									</div>
								</div>
								<div class="field">
  								<label class="label" for="nedmSurveyTopologyChangesUpgrades">7. Has there been any recent topology changes or upgrades to your Network Infrastructure recently? Some examples that would have an impact would be (new security appliances, new wireless access points and or new updated firmware)</label>
  								<div class="control">
    								<input class="input" type="text" name="nedmSurveyTopologyChangesUpgrades" id="nedmSurveyTopologyChangesUpgrades" placeholder="--">
  								</div>
								</div>
								<div class="field is-grouped">
  								<p class="control">
    								<button type="button" class="button secondary" ng-click="setTab(2)"><span class="span arrow light prev"></span> PREV</button>
  								</p>
  								<p class="control">
    								<button type="button" class="button primary" ng-class="{ active: isSet(3) }" ng-click="setTab(4)">NEXT <span class="span arrow light"></span></button>
  								</p>
								</div>
							</div>
						</div>
					</section><!-- END OF SURVEY STEP 2 SCHOOL/DISTRICT NETWORK SETUP -->
					<section class="column is-8-tablet padding-left padding-right" ng-show="isSet(4)">
						<div>
							<h2 class="step-header">Step 3</h2>
							<h1 class="less-line-height">WIFI landscape</h1>
							<div class="survey-form-fields">
								<div class="field">
  								<label class="label" for="nedmSurveyMakeModelFirmwareBuildAccessPoints">8. What is the Make Model and Firmware build of your Access points? </label>
  								<div class="control">
    								<input class="input" type="text" name="nedmSurveyMakeModelFirmwareBuildAccessPoints" id="nedmSurveyMakeModelFirmwareBuildAccessPoints" placeholder="--">
  								</div>
								</div>
								<div class="field">
  								<label class="label">9. Wireless connectivity on your network.</label>
									<div class="field has-addons">
										<p class="control question-block">
    									<label class="input" for="nedmSurveyHighestWirelessStandard">A. What is the highest wireless standard supported?</label>
  									</p>
										<div class="control is-expanded">
											<input class="input" type="text" name="nedmSurveyHighestWirelessStandard" id="nedmSurveyHighestWirelessStandard" placeholder="--">
										</div>
									</div>
									<div class="field has-addons">
										<p class="control question-block">
    									<label class="input" for="nedmSurveyAgeAccessPoints">B. What is the age of your wireless Access points and infrastructure? </label>
  									</p>
										<div class="control is-expanded">
	    								<input class="input" type="text" name="nedmSurveyAgeAccessPoints" id="nedmSurveyAgeAccessPoints" placeholder="--">
	  								</div>
									</div>
								</div>
								<div class="field">
  								<label class="label">10. How are students and teachers connecting to Service Set Identifier (SSID)?</label>
									<div class="field has-addons">
										<p class="control question-block">
    									<label class="input">A.	Are your SSID's Broadcasted or hidden throughout the network?</label>
  									</p>
    								<p class="control">
											<span class="select">
      									<select name="nedmSurveySSIDBroadcastedHidden" id="nedmSurveySSIDBroadcastedHidden" ng-model="ssidBroadcastedHidden" ng-value="">
													<option value>...</option>
        									<option value="Broadcasted">Broadcasted</option>
													<option value="hidden">hidden</option>
      									</select>
    									</span>
  									</p>
									</div>
									<div class="field has-addons">
  									<p class="control question-block">
    									<label class="input">B.	Are they connecting to the same SSID’s? </label>
  									</p>
    								<p class="control">
											<span class="select">
												<select name="nedmSurveyConnectingToSameSSID" id="nedmSurveyConnectingToSameSSID" ng-model="connectingToSameSSID" ng-value="">
													<option value>..</option>
        									<option value="Yes">Yes</option>
													<option value="No">No</option>
      									</select>
    									</span>
  									</p>
									</div>
									<div class="field has-addons">
  									<p class="control question-block">
    									<label class="input">C. Are the connected devices 5GHZ capable? </label>
  									</p>
    								<p class="control">
											<span class="select">
												<select name="nedmSurveyConnectedDevicesFiveGHZ" id="nedmSurveyConnectedDevicesFiveGHZ" ng-model="connectedDevicesFiveGHZ" ng-value="">
													<option value>..</option>
        									<option value="Yes">Yes</option>
													<option value="No">No</option>
      									</select>
    									</span>
  									</p>
									</div>
								</div>
								<div class="field">
  								<label class="label" for="nedmSurveyAverageDensityAccessPoints">11.	Average density of clients per access point</label>
  								<div class="control">
    								<input class="input" type="text" name="nedmSurveyAverageDensityAccessPoints" id="nedmSurveyAverageDensityAccessPoints" placeholder="--">
  								</div>
								</div>
								<div class="field">
  								<label class="label" for="nedmSurveyWirelessAssistiveTechnology">12.	What wireless Networking Assistive technology are enabled if any? </label>
  								<div class="control">
    								<input class="input" type="text" name="nedmSurveyWirelessAssistiveTechnology" id="nedmSurveyWirelessAssistiveTechnology" placeholder="Band steering, Airtime Fairness, Min. RSSI values, MDNS reflectors etc.">
  								</div>
								</div>
								<div class="field">
  								<label class="label">13. Are WMM or other QoS policies defined and enabled on your LAN?</label>
									<p class="control">
										<span class="select">
											<select name="nedmSurveyWMMPoliciesEnabled" id="nedmSurveyWMMPoliciesEnabled" ng-model="wmmPoliciesEnabled" ng-value="">
												<option value>..</option>
												<option value="Yes">Yes</option>
												<option value="No">No</option>
											</select>
										</span>
									</p>
								</div>
								<div class="field">
  								<label class="label">14. Wireless access points</label>
									<div class="field has-addons">
										<p class="control question-block">
    									<label class="input" for="nedmSurveyAccessPointsDeployed">A. How many access points are deployed in each building?</label>
  									</p>
										<div class="control is-expanded">
											<input class="input" type="text" name="nedmSurveyAccessPointsDeployed" id="nedmSurveyAccessPointsDeployed" placeholder="--">
										</div>
									</div>
									<div class="field has-addons">
										<p class="control question-block">
    									<label class="input" for="nedmSurveyAccessPointsClassroom">B.	Is there an Access Point for each classroom?</label>
  									</p>
										<div class="control is-expanded">
	    								<input class="input" type="text" name="nedmSurveyAccessPointsClassroom" id="nedmSurveyAccessPointsClassroom" placeholder="--">
	  								</div>
									</div>
								</div>
								<div class="field">
  								<label class="label" for="nedmSurveyVLANTagging">15. Is VLAN tagging at the SSID part of your deployment? </label>
									<p class="control">
										<span class="select">
											<select name="nedmSurveyVLANTagging" id="nedmSurveyVLANTagging" ng-model="vlanTagging" ng-value="">
												<option value>..</option>
												<option value="Yes">Yes</option>
												<option value="No">No</option>
											</select>
										</span>
									</p>
								</div>
								<div class="field">
  								<label class="label" for="nedmSurveyClientDevicesIP">16.	Please provide an example of the board and client devices IP Address including subnet mask and default gateway </label>
  								<div class="control">
    								<input class="input" type="text" name="nedmSurveyClientDevicesIP" id="nedmSurveyClientDevicesIP" placeholder="--">
  								</div>
								</div>
								<div class="field">
  								<label class="label" for="nedmSurveyWirelessSecurityImplemented">17. What type of wireless security is being implemented at your school?</label>
  								<div class="control">
    								<input class="input" type="text" name="nedmSurveyWirelessSecurityImplemented" id="nedmSurveyWirelessSecurityImplemented" placeholder="WPA2, WPA Enterprise etc.">
  								</div>
								</div>
								<div class="field">
  								<label class="label" for="nedmSurveyUsingPortIsolation">18. Are you using Port Isolation for access point or switch in your Configuration? </label>
									<p class="control">
										<span class="select">
											<select name="nedmSurveyUsingPortIsolation" id="nedmSurveyUsingPortIsolation" ng-model="usingPortIsolation" ng-value="">
												<option value>..</option>
												<option value="Yes">Yes</option>
												<option value="No">No</option>
											</select>
										</span>
									</p>
								</div>
								<div class="field">
  								<label class="label" for="nedmSurveyAccessPointsCurrentFirmware">19. Are your Access points on the current firmware revision? </label>
									<p class="control">
										<span class="select">
											<select name="nedmSurveyAccessPointsCurrentFirmware" id="nedmSurveyAccessPointsCurrentFirmware" ng-model="accessPointsCurrentFirmware" ng-value="">
												<option value>..</option>
												<option value="Yes">Yes</option>
												<option value="No">No</option>
											</select>
										</span>
									</p>
								</div>
								<div class="field">
  								<label class="label" for="nedmSurveyGettingIPaddress">20. Are you getting an IP address and is it pingable? </label>
									<p class="control">
										<span class="select">
											<select name="nedmSurveyGettingIPaddress" id="nedmSurveyGettingIPaddress" ng-model="gettingIPaddress" ng-value="">
												<option value>..</option>
												<option value="Yes">Yes</option>
												<option value="No">No</option>
											</select>
										</span>
									</p>
								</div>
								<div class="field is-grouped">
  								<p class="control">
    								<button type="button" class="button secondary" ng-click="setTab(3)"><span class="span arrow light prev"></span> PREV</button>
  								</p>
  								<p class="control">
    								<button type="button" class="button primary" ng-class="{ active: isSet(4) }" ng-click="setTab(5)">NEXT <span class="span arrow light"></span></button>
  								</p>
								</div>
							</div>
						</div>
					</section><!-- END OF SURVEY SLIDE 3 WIFI LANDSCAPE -->
					<section class="column is-8-tablet padding-left padding-right" ng-show="isSet(5)">
						<div>
							<h2 class="step-header">Step 4</h2>
							<h1 class="less-line-height">Local Network Environment </h1>
							<div class="survey-form-fields">
								<div class="field">
  								<label class="label">21.	Dynamic Host Configuration Protocol</label>
									<div class="field has-addons">
										<p class="control question-block">
    									<label class="input" for="nedmSurveyEnoughAddressesForAllDevices">A. Are there enough addresses to support all the devices in your landscape?</label>
  									</p>
										<div class="control is-expanded">
											<input class="input" type="text" name="nedmSurveyEnoughAddressesForAllDevices" id="nedmSurveyEnoughAddressesForAllDevices" placeholder="--">
										</div>
									</div>
									<div class="field has-addons">
										<p class="control question-block">
    									<label class="input" for="nedmSurveyCurrentDHCPTime">B. What is your current DHCP time?</label>
  									</p>
										<div class="control is-expanded">
	    								<input class="input" type="text" name="nedmSurveyCurrentDHCPTime" id="nedmSurveyCurrentDHCPTime" placeholder="--">
	  								</div>
									</div>
								</div>
								<div class="field">
  								<label class="label" for="nedmSurveyClientDevicesIFPSameNetwork">22. Will the client devices and Interactive Flat Panels be on the same VLAN/Network Segment </label>
									<p class="control">
										<span class="select">
											<select name="nedmSurveyClientDevicesIFPSameNetwork" id="nedmSurveyClientDevicesIFPSameNetwork" ng-model="clientDevicesIFPSameNetwork" ng-value="">
												<option value>..</option>
												<option value="Yes">Yes</option>
												<option value="No">No</option>
											</select>
										</span>
									</p>
								</div>
								<div class="field">
  								<label class="label" for="nedmSurveyScreenSharingIFP">23. Will students as well as teachers be screen sharing to the SMART IFP? </label>
									<p class="control">
										<span class="select">
											<select name="nedmSurveyScreenSharingIFP" id="nedmSurveyScreenSharingIFP" ng-model="screenSharingIFP" ng-value="">
												<option value>..</option>
												<option value="Yes">Yes</option>
												<option value="No">No</option>
											</select>
										</span>
									</p>
								</div>
								<div class="field is-grouped">
  								<p class="control">
    								<button type="button" class="button secondary" ng-click="setTab(4)"><span class="span arrow light prev"></span> PREV</button>
  								</p>
  								<p class="control">
    								<button type="button" class="button primary" ng-class="{ active: isSet(5) }" ng-click="setTab(6)">NEXT <span class="span arrow light"></span></button>
  								</p>
								</div>
							</div>
						</div>
					</section><!-- END OF SURVEY SLIDE 4 LOCAL NETWORK ENVIRONMENT -->
					<section class="column is-8-tablet padding-left padding-right" ng-show="isSet(6)">
						<div>
							<h2 class="step-header">Step 5</h2>
							<h1 class="less-line-height">General Information</h1>
							<div class="survey-form-fields">
								<div class="field">
  								<label class="label" for="nedmSurveyWhichIQModules">24.	Which IQ modules/ IQ experience do you have in your IFP’s? AM30 or AM40 or AM50 or embedded scalar (6000s,7000-v2,7000R, MX-v2)</label>
  								<div class="control">
    								<input class="input" type="text" name="nedmSurveyWhichIQModules" id="nedmSurveyWhichIQModules" value="<?php echo $firstName; ?>" placeholder="If a combination, how many of each?">
  								</div>
								</div>
								<div class="field">
  								<label class="label" for="nedmSurveyBuildNumberOfKappIQ">25. What is the build number of the Kapp IQ or the Embedded IQ (you can find that in the settings button on the screen?</label>
  								<div class="control">
    								<input class="input" type="text" name="nedmSurveyBuildNumberOfKappIQ" id="nedmSurveyBuildNumberOfKappIQ" value="<?php echo $firstName; ?>" placeholder="--">
  								</div>
								</div>
								<div class="field">
  								<label class="label" for="nedmSurveyTypesOfSMARTIFP">26.	How many IFP’s of each type do you have in your School? (6000, 6000-V2, 6000-V3,6000s 7000, 7000-V2,7000R, MX, MX-V2)</label>
  								<div class="control">
    								<input class="input" type="text" name="nedmSurveyTypesOfSMARTIFP" id="nedmSurveyTypesOfSMARTIFP" value="<?php echo $firstName; ?>" placeholder="--">
  								</div>
								</div>
								<div class="field">
  								<label class="label" for="nedmSurveyOtherConcerns"><strong>Please describe any other major issues and/or concerns within your IFP setup.</strong></label>
  								<div class="control">
    								<input class="input" type="text" name="nedmSurveyOtherConcerns" id="nedmSurveyOtherConcerns" value="" placeholder=...>
  								</div>
								</div>
                <div class="field is-grouped googleCaptcha">
                  <script>
                  function enableSubmit(){
                    document.getElementById("submit").disabled = false;
                  }
                  </script>
                  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                  <form action="?" method="POST">
                    <div class="g-recaptcha" data-sitekey="6LfqWpUaAAAAAP4_sViemuZgI-LHYW2S5VbJkVQo" data-callback="enableSubmit"></div>
                    <input type="submit" value="Submit">
                  </form>
                </div>
								<div class="field is-grouped">
  								<p class="control">
    								<button type="button" class="button secondary" ng-click="setTab(5)"><span class="span arrow light prev"></span> PREV</button>
  								</p>
  								<p class="control">
    								<button type="submit" class="button" id="submit" name="submit" ng-class="{ active: isSet(6) }" ng-disabled="NEDMsurvey.nedmSurveyFirstName.$error.required || NEDMsurvey.nedmSurveyLastName.$error.required || NEDMsurvey.nedmSurveyTitleRole.$error.required || NEDMsurvey.nedmSurveySchoolName.$error.required || NEDMsurvey.nedmSurveyContactPhone.$error.required || NEDMsurvey.nedmSurveyContactEmail.$error.required || nedmSurveyErrorCheck == false" disabled="disabled"><span ng-bind="nedmSurveySubmitField"></span> <span class="arrow checkmark"></span></button>
  								</p>
                  <p class="control" ng-show="NEDMsurvey.nedmSurveyFirstName.$error.required || NEDMsurvey.nedmSurveyLastName.$error.required || NEDMsurvey.nedmSurveyTitleRole.$error.required || NEDMsurvey.nedmSurveySchoolName.$error.required || NEDMsurvey.nedmSurveyContactPhone.$error.required || NEDMsurvey.nedmSurveyContactEmail.$error.required">
                    <span class="button text danger">Required field(s) empty!</span>
  								</p>
									<input type="hidden" name="action" id="action" value="new_nedm_post" />
									<?php wp_nonce_field( 'new_nedm_survey', 'new_nedm_survey' ); ?>
								</div>
							</div>
						</div>
					</section><!-- END OF SURVEY SLIDE 5 GENERAL INFORMATION -->

					<div class="column is-3 hide-tablet hide-mobile survey-form-sticky">
						<figure ng-show="isSet(1)">
							<img src="<?php echo get_template_directory_uri() . '/inc/images/'?>nedm-survey_svg-1.svg" />
						</figure>
						<figure ng-show="isSet(2)">
							<img src="<?php echo get_template_directory_uri() . '/inc/images/'?>nedm-survey_svg-2.svg" />
						</figure>
						<figure ng-show="isSet(3)">
							<img src="<?php echo get_template_directory_uri() . '/inc/images/'?>nedm-survey_svg-3.svg" />
						</figure>
						<figure ng-show="isSet(4)">
							<img src="<?php echo get_template_directory_uri() . '/inc/images/'?>nedm-survey_svg-4.svg" />
						</figure>
						<figure ng-show="isSet(5)">
							<img src="<?php echo get_template_directory_uri() . '/inc/images/'?>nedm-survey_svg-5.svg" />
						</figure>
						<figure ng-show="isSet(6)">
							<img src="<?php echo get_template_directory_uri() . '/inc/images/'?>nedm-survey_svg-6.svg" />
						</figure>
					</div>

				</div>
			</div>
		</section>

	</form><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
