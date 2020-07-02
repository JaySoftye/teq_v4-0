<?php
/**
 * Template Name: Network-Enabled Device Management Survey
 * The template for displaying the NEDM survey
 * @package Teq_v4.0
 */

get_header();
?>

<div id="primary" class="content-area" scroll>
	<main id="main" class="site-main section-container">
		<section class="full-section padding-bottom">
			<div class="page-content container padding-bottom">

			<?php
				/** Validate your form **/
				$hasError = null;

			 if (isset($_POST['submitted'])) {
			   if (trim( $_POST['nedm-survey-first-name']) === '' ) {
			     $firstNameError = 'is required';
			     $firstClassError = 'errorfield';
			     $hasError = true;
			   }
			   elseif (trim( $_POST['nedm-survey-last-name']) === '' ) {
			     $lastNameError = 'is required';
			     $lastClassError = 'errorfield';
			     $hasError = true;
			   }
			   elseif (trim( $_POST['nedm-survey-school-name']) === '' ) {
			     $schoolNameError = 'is required';
			     $schoolClassError = 'errorfield';
			     $hasError = true;
			   }
			   elseif (trim( $_POST['nedm-survey-contact-phone']) === '' ) {
			     $contactPhoneError = 'is required';
			     $phoneClassError = 'errorfield';
			     $hasError = true;
			   }
			   elseif (trim( $_POST['nedm-survey-contact-email']) === '' ) {
			     $contactEmailError = 'is required';
			     $emailClassError = 'errorfield';
			     $hasError = true;
			   }
			   else {
			     $hasError = false;
			   }
			 }

			  add_action( 'post_edit_form_tag' , 'post_edit_form_tag' );
			  function post_edit_form_tag( ) {
			    echo ' enctype="multipart/form-data"';
			  }

			  $firstName = wp_strip_all_tags($_POST['nedm-survey-first-name']);
			  $lastName = wp_strip_all_tags($_POST['nedm-survey-last-name']);
			  $titleRole = wp_strip_all_tags($_POST['nedm-survey-title-role']);
			  $schoolName = wp_strip_all_tags($_POST['nedm-survey-school-name']);
			  $contactPhone = wp_strip_all_tags($_POST['nedm-survey-contact-phone']);
			  $contactEmail = wp_strip_all_tags($_POST['nedm-survey-contact-email']);
			  $totalDevices = wp_strip_all_tags($_POST['nedm-survey-total-devices']);
			  $deviceVendor = wp_strip_all_tags($_POST['nedm-survey-device-vendor']);
			  $connection = wp_strip_all_tags($_POST['nedm-survey-connection']);
			  $proxyConnectivity = wp_strip_all_tags($_POST['nedm-survey-proxy-connectivity']);
			  $wpadImplemented = wp_strip_all_tags($_POST['nedm-survey-wpad-implemented']);
			  $filterFirewall = wp_strip_all_tags($_POST['nedm-survey-filter-firewall']);
			  $vendorType = wp_strip_all_tags($_POST['nedm-survey-vendor-type']);
			  $wirelessStandard = wp_strip_all_tags($_POST['nedm-survey-wireless-standard']);
			  $schoolBroadcasting = wp_strip_all_tags($_POST['nedm-survey-school-broadcasting']);
			  $averageDensity = wp_strip_all_tags($_POST['nedm-survey-average-density']);
			  $technologyEnabled = wp_strip_all_tags($_POST['nedm-survey-technology-enabled']);
			  $pointsDeployed = wp_strip_all_tags($_POST['nedm-survey-points-deployed']);
			  $vlanTagging= wp_strip_all_tags($_POST['nedm-survey-vlan-tagging']);
			  $wirelessSecurity = wp_strip_all_tags($_POST['nedm-survey-wireless-security']);
			  $wmmQos = wp_strip_all_tags($_POST['nedm-survey-wmm-qos']);
			  $totalIp = wp_strip_all_tags($_POST['nedm-survey-total-ip']);
			  $sameVlan = wp_strip_all_tags($_POST['nedm-survey-same-vlan']);
			  $hdcpContent = wp_strip_all_tags($_POST['nedm-survey-hdcp-content']);
			  $bcolumnsseInternet = wp_strip_all_tags($_POST['nedm-survey-bcolumnsse-internet']);
			  $teacherShare = wp_strip_all_tags($_POST['nedm-survey-teacher-share']);
			  $totalSharing = wp_strip_all_tags($_POST['nedm-survey-total-sharing']);
			  $wiredSharing = wp_strip_all_tags($_POST['nedm-survey-wired-sharing']);
			  $automaticUpdates = wp_strip_all_tags($_POST['nedm-survey-automatic-updates']);
			  $trafficTool = wp_strip_all_tags($_POST['nedm-survey-traffic-tool']);
			  $reportSharing = wp_strip_all_tags($_POST['nedm-survey-report-sharing']);
			  $deviceConnecting = wp_strip_all_tags($_POST['nedm-survey-device-connecting']);
			  $approxAge = wp_strip_all_tags($_POST['nedm-survey-approx-age']);
			  $processorType = wp_strip_all_tags($_POST['nedm-survey-processor-type']);
			  $operatingSystem = wp_strip_all_tags($_POST['nedm-survey-operating-system']);
			  $dedicatedGraphics = wp_strip_all_tags($_POST['nedm-survey-dedicated-graphics']);
			  $usbGraphics = wp_strip_all_tags($_POST['nedm-survey-usb-graphics']);
			  $graphicsAdapter = wp_strip_all_tags($_POST['nedm-survey-graphics-adapter']);
			  $freeDisplay = wp_strip_all_tags($_POST['nedm-survey-free-display']);
			  $availableUsb = wp_strip_all_tags($_POST['nedm-survey-available-usb']);
			  $usbType = wp_strip_all_tags($_POST['nedm-survey-usb-type']);
			  $mirroringCloning = wp_strip_all_tags($_POST['nedm-survey-mirroring-cloning']);
			  $desktopResolution = wp_strip_all_tags($_POST['nedm-survey-desktop-resolution']);
			  $connectedResolution = wp_strip_all_tags($_POST['nedm-survey-connected-resolution']);
			  $availableUsb = wp_strip_all_tags($_POST['nedm-survey-available-usb']);
			  $displaying4k = wp_strip_all_tags($_POST['nedm-survey-displaying-4k']);
			  $builtinBcolumnsser = wp_strip_all_tags($_POST['nedm-survey-builtin-bcolumnsser']);
			  $connectedDomain = wp_strip_all_tags($_POST['nedm-survey-connected-domain']);
			  $groupPolicy = wp_strip_all_tags($_POST['nedm-survey-group-policy']);
			  $multipleUsers = wp_strip_all_tags($_POST['nedm-survey-multiple-users']);
			  $userPermissions = wp_strip_all_tags($_POST['nedm-survey-user-permissions']);
			  $cloudgenixDevice = wp_strip_all_tags($_POST['nedm-survey-cloudgenix-device']);
			  $issueDescription = wp_strip_all_tags($_POST['nedm-survey-issue-description']);

			  /** Submit your form information **/
			  if (isset($_POST['submitted']) && isset($_POST['post_nonce_field']) && wp_verify_nonce($_POST['post_nonce_field'], 'post_nonce') && ($hasError == false)) {
				?>
					<div class="field">
		  			<div class="control full-height">
		    			<h1 class="has-text-success strong">Thank you for your submission</h1>
							<h2 class="strong">Your survey information has been sent to your Networking Consulting team for evaluation. A throughout check on the information provided usually takes between 3-5 business days, during which time we will be constructing a detailed report for your review.</h2>
						</div>
					</div>
				<?php

			    $post_information = array(
			      'post_title' => wp_strip_all_tags( $_POST['nedm-survey-school-name'] ),
			      'post_type' => 'NEDM-Surveys',
			      'post_status' => 'publish'
			     );
			     $new_post = wp_insert_post( $post_information );
			       add_post_meta($new_post, "firstName", $firstName);
			       add_post_meta($new_post, "lastName", $lastName);
			       add_post_meta($new_post, "titleRole", $titleRole);
			       add_post_meta($new_post, "schoolName", $schoolName);
			       add_post_meta($new_post, "contactPhone", $contactPhone);
			       add_post_meta($new_post, "contactEmail", $contactEmail);
			       add_post_meta($new_post, "totalDevices", $totalDevices);
			       add_post_meta($new_post, "deviceVendor", $deviceVendor);
			       add_post_meta($new_post, "connection", $connection);
			       add_post_meta($new_post, "proxyConnectivity", $proxyConnectivity);
			       add_post_meta($new_post, "wpadImplemented", $wpadImplemented);
			       add_post_meta($new_post, "filterFirewall", $filterFirewall);
			       add_post_meta($new_post, "vendorType", $vendorType);
			       add_post_meta($new_post, "wirelessStandard", $wirelessStandard);
			       add_post_meta($new_post, "schoolBroadcasting", $schoolBroadcasting);
			       add_post_meta($new_post, "averageDensity", $averageDensity);
			       add_post_meta($new_post, "technologyEnabled", $technologyEnabled);
			       add_post_meta($new_post, "pointsDeployed", $pointsDeployed);
			       add_post_meta($new_post, "vlanTagging", $vlanTagging);
			       add_post_meta($new_post, "wirelessSecurity", $wirelessSecurity);
			       add_post_meta($new_post, "wmmQos", $wmmQos);
			       add_post_meta($new_post, "totalIp", $totalIp);
			       add_post_meta($new_post, "sameVlan", $sameVlan);
			       add_post_meta($new_post, "hdcpContent", $hdcpContent);
			       add_post_meta($new_post, "bcolumnsseInternet", $bcolumnsseInternet);
			       add_post_meta($new_post, "teacherShare", $teacherShare);
			       add_post_meta($new_post, "totalSharing", $totalSharing);
			       add_post_meta($new_post, "wiredSharing", $wiredSharing);
			       add_post_meta($new_post, "automaticUpdates", $automaticUpdates);
			       add_post_meta($new_post, "trafficTool", $trafficTool);
			       add_post_meta($new_post, "reportSharing", $reportSharing);
			       add_post_meta($new_post, "deviceConnecting", $deviceConnecting);
			       add_post_meta($new_post, "approxAge", $approxAge);
			       add_post_meta($new_post, "processorType", $processorType);
			       add_post_meta($new_post, "operatingSystem", $operatingSystem);
			       add_post_meta($new_post, "dedicatedGraphics", $dedicatedGraphics);
			       add_post_meta($new_post, "usbGraphics", $usbGraphics);
			       add_post_meta($new_post, "graphicsAdapter", $graphicsAdapter);
			       add_post_meta($new_post, "freeDisplay", $freeDisplay);
			       add_post_meta($new_post, "availableUsb", $availableUsb);
			       add_post_meta($new_post, "usbType", $usbType);
			       add_post_meta($new_post, "mirroringCloning", $mirroringCloning);
			       add_post_meta($new_post, "desktopResolution", $desktopResolution);
			       add_post_meta($new_post, "connectedResolution", $connectedResolution);
			       add_post_meta($new_post, "availableUsb", $availableUsb);
			       add_post_meta($new_post, "displaying4k", $displaying4k);
			       add_post_meta($new_post, "builtinBcolumnsser", $builtinBcolumnsser);
			       add_post_meta($new_post, "connectedDomain", $connectedDomain);
			       add_post_meta($new_post, "groupPolicy", $groupPolicy);
			       add_post_meta($new_post, "multipleUsers", $multipleUsers);
			       add_post_meta($new_post, "userPermissions", $userPermissions);
			       add_post_meta($new_post, "issueDescription", $issueDescription);
			  }
		?>
		<div class="field">
			<?php if ($hasError == true) { ?>
  			<div class="control">
    			<h1 class="has-text-danger strong">Oops, it appears you forgot a few items, please fill in the missing information below and resubmit.</h1>
				</div>
			<?php } ?>
		</div>

		<form action="" class="" method="POST" id="nedm-survey" <?php do_action('post_edit_form_tag'); ?> enctype="multipart/form-data">

		<div class="columns">
			<div class="column">
			 	<h1 class="strong">Network-Enable Device Management Survey</h1>
			</div>
		</div>

		<div class="columns is-multiline">
			<div class="column is-6">
			  <h3><strong>Basic information.</strong></h3>
					<div class="field">
			      <label for="nedm-survey-first-name"><?php _e('First Name', 'framework') ?> <span class="has-text-danger strong"><?php echo $firstNameError; ?></span></label>
			      <input type="text" class="form-control input <?php echo $firstClassError; ?>" name="nedm-survey-first-name" id="nedm-survey-first-name" value="<?php echo $firstName; ?>" />
			    </div>
			     <div class="field">
			       <label for="nedm-survey-last-name"><?php _e('Last Name', 'framework') ?> <span class="has-text-danger strong"><?php echo $lastNameError; ?></span></label>
			       <input type="text" class="form-control input <?php echo $lastClassError; ?>" name="nedm-survey-last-name" id="nedm-survey-last-name" value="<?php echo $lastName; ?>" />
			     </div>
			     <div class="field">
			       <label for="nedm-survey-title-role"><?php _e('Title and/or Role', 'framework') ?></label>
			       <select class="form-control input" name="nedm-survey-title-role" id="nedm-survey-title-role" value="<?php echo $titleRole; ?>">
			         <option value="" selected disabled></option>
			         <option value="Academic Assessment Director">Academic Assessment Director</option>
			         <option value="Assistant Principal">Assistant Principal</option>
			         <option value="Assistant Superintendent">Assistant Superintendent</option>
			         <option value="Business Administrator">Business Administrator</option>
			         <option value="Curriculum Director">Curriculum Director</option>
			         <option value="Curriculum Specialist">Curriculum Specialist</option>
			         <option value="Director">Director</option>
			         <option value="ELA Director/Chairperson">ELA Director/Chairperson</option>
			         <option value="Grant Coordinator">Grant Coordinator</option>
			         <option value="IT Director">IT Director</option>
			         <option value="Math Director/Chairperson">Math Director/Chairperson</option>
			         <option value="President">President</option>
			         <option value="Principal">Principal</option>
			         <option value="PTA/PTO President">PTA/PTO President</option>
			         <option value="School Board Member">School Board Member</option>
			         <option value="Science Director/Chairperson">Science Director/Chairperson</option>
			         <option value="Social Studies Director/Chairperson">Social Studies Director/Chairperson</option>
			         <option value="Staff Developer">Staff Developer</option>
			         <option value="STEM Coordinator">STEM Coordinator</option>
			         <option value="Superintendent">Superintendent</option>
			         <option value="Teacher">Teacher</option>
			         <option value="Teacher Effectiveness Coach">Teacher Effectiveness Coach</option>
			         <option value="Technology Director">Technology Director</option>
			         <option value="Technology Coordinator">Technology Coordinator</option>
			         <option value="Technology SPOC">Technology SPOC</option>
			         <option value="Instructional Media Services Director">Instructional Media Services Director</option>
			         <option value="Technology Integration Specialist">Technology Integration Specialist</option>
			         <option value="Technology Teacher">Technology Teacher</option>
			       </select>
			     </div>
			     <div class="field">
			       <label for="nedm-survey-school-name"><?php _e('School Name', 'framework') ?> <span class="has-text-danger strong"><?php echo $schoolNameError; ?></span></label>
			       <input type="text" class="form-control input <?php echo $schoolClassError; ?>" name="nedm-survey-school-name" id="nedm-survey-school-name" value="<?php echo $schoolName; ?>" />
			     </div>
			     <div class="field">
			       <label for="nedm-survey-contact-phone"><?php _e('Phone', 'framework') ?> <span class="has-text-danger strong"><?php echo $contactPhoneError; ?></span></label>
			       <input type="phone" class="form-control input <?php echo $phoneClassError; ?>" name="nedm-survey-contact-phone" id="nedm-survey-contact-phone" value="<?php echo $contactPhone; ?>" />
			     </div>
			     <div class="field">
			       <label for="nedm-survey-contact-email"><?php _e('Email', 'framework') ?> <span class="has-text-danger strong"><?php echo $contactEmailError; ?></span></label>
			       <input type="phone" class="form-control input <?php echo $emailClassError; ?>" name="nedm-survey-contact-email" id="nedm-survey-contact-email" value="<?php echo $contactEmail; ?>" />
			     </div>
			   </div>
			   <div class="column is-6 padding-right">
			     <h3><strong>School/district network setup.</strong></h3>
			     <div class="field">
			       <label for="nedm-survey-total-devices"><?php _e('What is total number of client devices on your network?', 'framework') ?></label>
			       <input type="text" class="form-control input" name="nedm-survey-total-devices" id="nedm-survey-total-devices" value="<?php echo $totalDevices; ?>" />
			     </div>
			     <div class="field">
			       <label for="nedm-survey-device-vendor"><?php _e('Is there a device vendor that is more prevalent? (Apple, Google, Microsoft etc.)', 'framework') ?></label>
			       <input type="text" class="form-control input" name="nedm-survey-device-vendor" id="nedm-survey-device-vendor" value="<?php echo $deviceVendor; ?>" />
			     </div>
			     <div class="field">
			       <div class="form-check">
			         <label>How will your Interactive Flat Panels be connecting to the network?</label>
			         <label class="form-check-label">
			           <input class="form-check-input" type="radio" name="nedm-survey-connection" id="nedm-survey-wired-connection" value="Wired connection"><span class="form-check-input-text"><?php _e('Wired', 'framework') ?></span>
			         </label>
			         <label class="form-check-label">
			           <input class="form-check-input" type="radio" name="nedm-survey-connection" id="nedm-survey-wireless-connection" value="Wireless connection"><span class="form-check-input-text"><?php _e('Wireless', 'framework') ?></span>
			         </label>
			       </div>
			     </div>
			     <div class="field columns">
			       <div class="form-check column is-6">
			         <label>Is your school using a proxy for connectivity and content filtering?</label>
			         <label class="form-check-label">
			           <input class="form-check-input" type="radio" name="nedm-survey-proxy-connectivity" id="nedm-survey-proxy-connectivity-yes" value="A proxy is being used for connectivity and content filtering"><span class="form-check-input-text"><?php _e('Yes', 'framework') ?></span>
			         </label>
			         <label class="form-check-label">
			           <input class="form-check-input" type="radio" name="nedm-survey-proxy-connectivity" id="nedm-survey-proxy-connectivity-no" value="A proxy is NOT being used for connectivity and content filtering?"><span class="form-check-input-text"><?php _e('No', 'framework') ?></span>
			         </label>
			       </div>
			       <div class="form-check column is-6">
			         <label>Is WPAD implemented?</label>
			         <label class="form-check-label">
			           <input class="form-check-input" type="radio" name="nedm-survey-wpad-implemented" id="nedm-survey-wpad-implemented-yes" value="WPAD is implemented"><span class="form-check-input-text"><?php _e('Yes', 'framework') ?></span>
			         </label>
			         <label class="form-check-label">
			           <input class="form-check-input" type="radio" name="nedm-survey-wpad-implemented" id="nedm-survey-wpad-implemented-no" value="WPAD is NOT implemented"><span class="form-check-input-text"><?php _e('No', 'framework') ?></span>
			         </label>
			       </div>
			     </div>
			     <div class="field columns">
			       <div class="form-check column is-6">
			         <label>Is there an In-Line content filter or firewall deployed?</label>
			         <label class="form-check-label">
			           <input class="form-check-input" type="radio" name="nedm-survey-filter-firewall" id="nedm-survey-filter-firewall-yes" value="There is an In-Line content filter or firewall deployed"><span class="form-check-input-text"><?php _e('Yes', 'framework') ?></span>
			         </label>
			         <label class="form-check-label">
			           <input class="form-check-input" type="radio" name="nedm-survey-filter-firewall" id="nedm-survey-filter-firewall-no" value="There is NOT an In-Line content filter or firewall deployed"><span class="form-check-input-text"><?php _e('No', 'framework') ?></span>
			         </label>
			       </div>
			       <div class="form-check column is-6">
			         <label for="nedm-survey-vendor-type"><?php _e('What vendor or type?', 'framework') ?></label>
			         <input type="text" class="form-control input" name="nedm-survey-vendor-type" id="nedm-survey-vendor-type" value="<?php echo $vendorType; ?>" />
			       </div>
			     </div>
			   </div>
			 </div>

			 <div class="columns group-columns">
			   <div class="column is-6 padding-right">
			     <h3><strong>WIFI landscape.</strong></h3>
			     <div class="field columns">
			       <div class="form-check column is-6">
			         <label for="nedm-survey-wireless-standard"><?php _e('Highest wireless standard supported?', 'framework') ?> </label>
			         <select class="form-control input" name="nedm-survey-wireless-standard" id="nedm-survey-wireless-standard">
			           <option value="" selected disabled></option>
			           <option value="802.11g">802.11g</option>
			           <option value="802.11n">802.11n</option>
			           <option value="802.11ac">802.11ac</option>
			         </select>
			       </div>
			       <div class="form-check column is-6">
			         <label>Is your school currently broadcasting?</label>
			         <label class="form-check-label">
			           <input class="form-check-input" type="radio" name="nedm-survey-school-broadcasting" id="nedm-survey-school-broadcasting-two" value="2.5Ghz"><span class="form-check-input-text"><?php _e('2.4Ghz', 'framework') ?></span>
			         </label>
			         <label class="form-check-label">
			           <input class="form-check-input" type="radio" name="nedm-survey-school-broadcasting" id="nedm-survey-school-broadcasting-five" value="5Ghz"><span class="form-check-input-text"><?php _e('5Ghz', 'framework') ?></span>
			         </label>
			         <label class="form-check-label">
			           <input class="form-check-input" type="radio" name="nedm-survey-school-broadcasting" id="nedm-survey-school-broadcasting-both" value="both"><span class="form-check-input-text"><?php _e('Both', 'framework') ?></span>
			         </label>
			       </div>
			     </div>
			     <div class="field">
			       <label for="nedm-survey-average-density"><?php _e('Average density of clients per access point?', 'framework') ?></label>
			       <input type="text" class="form-control input" name="nedm-survey-average-density" id="nedm-survey-average-density" value="<?php echo $averageDensity; ?>" />
			     </div>
			     <div class="field">
			       <label for="nedm-survey-technology-enabled"><?php _e('What feature technology is enabled if any? (Band steering, Airtime Fairness, Min. RSSI values etc.)', 'framework') ?></label>
			       <input type="text" class="form-control input" name="nedm-survey-technology-enabled" id="nedm-survey-technology-enabled" value="<?php echo $technologyEnabled; ?>">
			     </div>
			     <div class="field">
			       <label for="nedm-survey-points-deployed"><?php _e('How many access points are deployed in each build?', 'framework') ?></label>
			       <input type="text" class="form-control input" name="nedm-survey-points-deployed" id="nedm-survey-points-deployed" value="<?php echo $pointsDeployed; ?>">
			     </div>
			     <div class="field columns">
			       <div class="form-check column is-6">
			         <label>Is VLAN tagging at the SSID part of your deployment?</label>
			         <label class="form-check-label">
			           <input class="form-check-input" type="radio" name="nedm-survey-vlan-tagging" id="nedm-survey-vlan-tagging-yes" value="VLAN tagging is part of the SSID part of your deployment"><span class="form-check-input-text"><?php _e('Yes', 'framework') ?></span>
			         </label>
			         <label class="form-check-label">
			           <input class="form-check-input" type="radio" name="nedm-survey-vlan-tagging" id="nedm-survey-vlan-tagging-no" value="VLAN tagging is NOT part of the SSID part of your deployment"><span class="form-check-input-text"><?php _e('No', 'framework') ?></span>
			         </label>
			       </div>
			       <div class="form-check column is-6">
			         <label for="nedm-survey-wireless-security"><?php _e('What type of wireless security is being implemented at your school? (WEP, WPA/WPA2, WPA Enterprise etc.)', 'framework') ?></label>
			         <input type="text" class="form-control input" name="nedm-survey-wireless-security" id="nedm-survey-wireless-security" value="<?php echo $wirelessSecurity; ?>">
			       </div>
			     </div>
			   </div>
			   <div class="column is-6 padding-right">
			     <h3><strong>Local network environment.</strong></h3>
			     <div class="field columns">
			       <div class="form-check column is-6">
			         <label>Are WMM or other QoS policies defined and enabled on your LAN</label>
			         <label class="form-check-label">
			           <input class="form-check-input" type="radio" name="nedm-survey-wmm-qos" id="nedm-survey-wmm-qos-yes" value="WMM and/or QoS policies are defined and/or enabled on my LAN"><span class="form-check-input-text"><?php _e('Yes', 'framework') ?></span>
			         </label>
			         <label class="form-check-label">
			           <input class="form-check-input" type="radio" name="nedm-survey-wmm-qos" id="nedm-survey-wmm-qos-no" value="WMM and/or QoS policies are NOT defined and/or enabled on my LAN"><span class="form-check-input-text"><?php _e('No', 'framework') ?></span>
			         </label>
			       </div>
			     </div>
			     <div class="field columns">
			       <div class="form-check column is-6">
			         <label for="nedm-survey-total-ip"><?php _e('How many IP addresses are available in the current DHCP scope?', 'framework') ?></label>
			         <input type="text" class="form-control input" name="nedm-survey-total-ip" id="nedm-survey-total-ip" value="<?php echo $totalIp; ?>">
			       </div>
			       <div class="form-check column is-6">
			         <label>Will the client devices and Interactive Flat Panels be on the same VLAN?</label>
			         <label class="form-check-label">
			           <input class="form-check-input" type="radio" name="nedm-survey-same-vlan" id="nedm-survey-same-vlan-yes" value="Client devices and IFP's will be on the same VLAN"><span class="form-check-input-text"><?php _e('Yes', 'framework') ?></span>
			         </label>
			         <label class="form-check-label">
			           <input class="form-check-input" type="radio" name="nedm-survey-same-vlan" id="nedm-survey-same-vlan-no" value="Client devices and IFP's will NOT be on the same VLAN"><span class="form-check-input-text"><?php _e('No', 'framework') ?></span>
			         </label>
			       </div>
			     </div>
			   </div>
			 </div>

			 <div class="columns group-columns">
			   <div class="column is-6 padding-right">
			     <h3><strong>Interactive Flat Panel utilization.</strong></h3>
			     <div class="field columns">
			       <div class="form-check column is-6">
			         <label>Will the Interactive Flat Panels be used to play any HDCP content, including Blu-rays, DVDs, and other HD media?</label>
			         <label class="form-check-label">
			           <input class="form-check-input" type="radio" name="nedm-survey-hdcp-content" id="nedm-survey-hdcp-content-yes" value="The IFPs will be used to play HDCP content"><span class="form-check-input-text"><?php _e('Yes', 'framework') ?></span>
			         </label>
			         <label class="form-check-label">
			           <input class="form-check-input" type="radio" name="nedm-survey-hdcp-content" id="nedm-survey-hdcp-content-no" value="The IFPs will NOT be used to play HDCP content"><span class="form-check-input-text"><?php _e('No', 'framework') ?></span>
			         </label>
			       </div>
			       <div class="form-check column is-6">
			         <label>Will teachers and students be allowed to bcolumnsse the Internet from the Interactive Flat Panels?</label>
			         <label class="form-check-label">
			           <input class="form-check-input" type="radio" name="nedm-survey-bcolumnsse-internet" id="nedm-survey-bcolumnsse-internet-yes" value="Teachers and students will be allowed to bcolumnsse the Internet from the IFPs"><span class="form-check-input-text"><?php _e('Yes', 'framework') ?></span>
			         </label>
			         <label class="form-check-label">
			           <input class="form-check-input" type="radio" name="nedm-survey-bcolumnsse-internet" id="nedm-survey-bcolumnsse-internet-no" value="Teachers and students will NOT be allowed to bcolumnsse the Internet from the IFPs"><span class="form-check-input-text"><?php _e('No', 'framework') ?></span>
			         </label>
			       </div>
			     </div>
			     <div class="field">
			       <div class="form-check">
			         <label>Should teachers and students be able to share their device’s screen to the Interactive Flat Panels?</label>
			         <label class="form-check-label">
			           <input class="form-check-input" type="radio" name="nedm-survey-teacher-share" id="nedm-survey-teacher-share-yes" value="Teachers and students will be able to share their device’s screen to the IFPs"><span class="form-check-input-text"><?php _e('Yes', 'framework') ?></span>
			         </label>
			         <label class="form-check-label">
			           <input class="form-check-input" type="radio" name="nedm-survey-teacher-share" id="nedm-survey-teacher-share-no" value="Teachers and students will NOT be able to share their device’s screen to the IFPs"><span class="form-check-input-text"><?php _e('No', 'framework') ?></span>
			         </label>
			       </div>
			     </div>
			     <div class="field columns">
			       <div class="form-check column is-6">
			         <label for="nedm-survey-total-sharing"><?php _e('How many classrooms with device screen sharing capabilities will there be?', 'framework') ?></label>
			         <input type="text" class="form-control input" name="nedm-survey-total-sharing" id="nedm-survey-total-sharing" value="<?php echo $totalSharing; ?>">
			       </div>
			       <div class="form-check column is-6">
			         <label>Will wired devices such as desktops be expected to share their screen on the Interactive Flat Panels?</label>
			         <label class="form-check-label">
			           <input class="form-check-input" type="radio" name="nedm-survey-wired-sharing" id="nedm-survey-wired-sharing-yes" value="Wired devices such as desktops will be expected to share their screen on the IFPs"><span class="form-check-input-text"><?php _e('Yes', 'framework') ?></span>
			         </label>
			         <label class="form-check-label">
			           <input class="form-check-input" type="radio" name="nedm-survey-wired-sharing" id="nedm-survey-wired-sharing-no" value="Wired devices such as desktops will NOT be expected to share their screen on the IFPs"><span class="form-check-input-text"><?php _e('No', 'framework') ?></span>
			         </label>
			       </div>
			     </div>
			   </div>
			   <div class="column is-6 padding-right">
			     <h3><strong>General Info.</strong></h3>
			     <div class="field">
			       <div class="form-check">
			         <label>Will your school be leveraging automatic updates for the Interactive Flat Panels' firmware/software? </label>
			         <label class="form-check-label">
			           <input class="form-check-input" type="radio" name="nedm-survey-automatic-updates" id="nedm-survey-automatic-updates-yes" value="The school will be leveraging automatic updates for IFP firmware/software"><span class="form-check-input-text"><?php _e('Yes', 'framework') ?></span>
			         </label>
			         <label class="form-check-label">
			           <input class="form-check-input" type="radio" name="nedm-survey-automatic-updates" id="nedm-survey-automatic-updates-no" value="The school will NOT be leveraging automatic updates for IFP firmware/software"><span class="form-check-input-text"><?php _e('No', 'framework') ?></span>
			         </label>
			       </div>
			     </div>
			     <div class="field">
			       <div class="form-check">
			         <label>Does your school have a tool/tools deployed in the environment that can profile traffic by type and bandwidth?</label>
			         <label class="form-check-label">
			           <input class="form-check-input" type="radio" name="nedm-survey-traffic-tool" id="nedm-survey-traffic-tool-yes" value="The school does have tools deployed in the environment that can profile traffic by type and bandwidth"><span class="form-check-input-text"><?php _e('Yes', 'framework') ?></span>
			         </label>
			         <label class="form-check-label">
			           <input class="form-check-input" type="radio" name="nedm-survey-traffic-tool" id="nedm-survey-traffic-tool-no" value="The school does NOT have tools deployed in the environment that can profile traffic by type and bandwidth"><span class="form-check-input-text"><?php _e('No', 'framework') ?></span>
			         </label>
			       </div>
			     </div>
			     <div class="field">
			       <div class="form-check">
			         <label>If available, are you willing to share some of the reporting with us in order have better visibility into possible bottlenecks or configuration challenges?</label>
			         <label class="form-check-label">
			           <input class="form-check-input" type="radio" name="nedm-survey-report-sharing" id="nedm-survey-report-sharing-yes" value="The school is willing to share some of the reporting"><span class="form-check-input-text"><?php _e('Yes', 'framework') ?></span>
			         </label>
			         <label class="form-check-label">
			           <input class="form-check-input" type="radio" name="nedm-survey-report-sharing" id="nedm-survey-report-sharing-no" value="The school is NOT willing to share some of the reporting"><span class="form-check-input-text"><?php _e('No', 'framework') ?></span>
			         </label>
			       </div>
			     </div>
			   </div>
			 </div>

			 <div class="columns group-columns is-multiline">
				 <div class="column is-full padding-right">
			 	 	<h3><strong>Devices connecting to the Interactive Flat Panels.</strong></h3>
			 	</div>
			   <div class="column is-6 padding-right">
			     <div class="field columns">
			       <div class="form-check column is-6">
			         <label for="nedm-survey-device-connecting"><?php _e('What type of devices are you planning on connecting to the IFP?', 'framework') ?></label>
			         <input type="text" class="form-control input" name="nedm-survey-device-connecting" id="nedm-survey-device-connecting" value="<?php echo $deviceConnecting; ?>">
			       </div>
			       <div class="form-check column is-6">
			         <label for="nedm-survey-approx-age"><?php _e('What is the approximate age of the systems you will be running?', 'framework') ?></label>
			         <input type="text" class="form-control input" name="nedm-survey-approx-age" id="nedm-survey-approx-age" value="<?php echo $approxAge; ?>">
			       </div>
			     </div>
			     <div class="field columns">
			       <div class="form-check column is-6">
			         <label for="nedm-survey-processor-type"><?php _e('Processor Type, Intel or AMD? If Intel which model? i.e. i3, i5, i7 etc?', 'framework') ?></label>
			         <input type="text" class="form-control input" name="nedm-survey-processor-type" id="nedm-survey-processor-type" value="<?php echo $processorType; ?>">
			       </div>
			       <div class="form-check column is-6">
			         <label for="nedm-survey-operating-system"><?php _e('What is the Operating system version that will be running on your devices?', 'framework') ?></label>
			         <input type="text" class="form-control input" name="nedm-survey-operating-system" id="nedm-survey-operating-system" value="<?php echo $operatingSystem; ?>">
			       </div>
			     </div>
			     <div class="field columns">
			       <div class="form-check column is-6">
			         <label for="nedm-survey-dedicated-graphics"><?php _e('Dedicated graphics hardware or Onboard?', 'framework') ?></label>
			         <input type="text" class="form-control input" name="nedm-survey-dedicated-graphics" id="nedm-survey-dedicated-graphics" value="<?php echo $dedicatedGraphics; ?>" />
			       </div>
			       <div class="form-check column is-6">
			         <label>Are there free display ports available?</label>
			         <label class="form-check-label">
			           <input class="form-check-input" type="radio" name="nedm-survey-free-display" id="nedm-survey-free-display-yes" value="There are display ports available"><span class="form-check-input-text"><?php _e('Yes', 'framework') ?></span>
			         </label>
			         <label class="form-check-label">
			           <input class="form-check-input" type="radio" name="nedm-survey-free-display" id="nedm-survey-free-display-no" value="There are NOT any display ports available"><span class="form-check-input-text"><?php _e('No', 'framework') ?></span>
			         </label>
			       </div>
			     </div>
			     <div class="field columns">
			       <div class="form-check column is-6">
			         <label>Are you using USB graphics adapters?</label>
			         <label class="form-check-label">
			           <input class="form-check-input" type="radio" name="nedm-survey-usb-graphics" id="nedm-survey-usb-graphics-yes" value="We are using USB Graphics Adapters"><span class="form-check-input-text"><?php _e('Yes', 'framework') ?></span>
			         </label>
			         <label class="form-check-label">
			           <input class="form-check-input" type="radio" name="nedm-survey-usb-graphics" id="nedm-survey-usb-graphics-no" value="We are NOT using USB Graphics Adapters"><span class="form-check-input-text"><?php _e('No', 'framework') ?></span>
			         </label>
			       </div>
			       <div class="form-check column is-6">
			         <label for="nedm-survey-graphics-adapter"><?php _e('Do you know the make, model or general description of the adapter?', 'framework') ?></label>
			         <input type="text" class="form-control input" name="nedm-survey-graphics-adapter" id="nedm-survey-graphics-adapter" value="<?php echo $graphicsAdapter; ?>" />
			       </div>
			     </div>
			     <div class="field columns">
			       <div class="form-check column is-6">
			         <label>Are there available USB ports on the computer?</label>
			         <label class="form-check-label">
			           <input class="form-check-input" type="radio" name="nedm-survey-available-usb" id="nedm-survey-available-usb-yes" value="There are available USB ports on the computer"><span class="form-check-input-text"><?php _e('Yes', 'framework') ?></span>
			         </label>
			         <label class="form-check-label">
			           <input class="form-check-input" type="radio" name="nedm-survey-available-usb" id="nedm-survey-available-usb-no" value="There are NOT any available USB ports on the computer"><span class="form-check-input-text"><?php _e('No', 'framework') ?></span>
			         </label>
			       </div>
			       <div class="form-check column is-6">
			         <label for="nedm-survey-usb-type"><?php _e('What type of USB ports are they? i.e. 2.0, 3.0 etc.', 'framework') ?></label>
			         <input type="text" class="form-control input" name="nedm-survey-usb-type" id="nedm-survey-usb-type" value="<?php echo $usbType; ?>" />
			       </div>
			     </div>
			   </div>
			   <div class="column is-6 padding-right">
			     <div class="field">
			       <label for="nedm-survey-mirroring-cloning"><?php _e('Will you be mirroring or cloning a primary display to the IFP or will the IFP be an extended desktop?', 'framework') ?></label>
			       <input type="text" class="form-control input" name="nedm-survey-mirroring-cloning" id="nedm-survey-mirroring-cloning" value="<?php echo $mirroringCloning; ?>" />
			     </div>
			     <div class="field columns">
			       <div class="form-check column is-6">
			         <label for="nedm-survey-deskop-resolution"><?php _e('What desktop resolution does your current configuration run in?', 'framework') ?></label>
			         <input type="text" class="form-control input" name="nedm-survey-desktop-resolution" id="nedm-survey-desktop-resolution" value="<?php echo $desktopResolution; ?>">
			       </div>
			       <div class="form-check column is-6">
			         <label for="nedm-survey-connected-resolution"><?php _e('How is it connected to the computer? i.e. HDMI, DisplayPort, DVI or VGA', 'framework') ?></label>
			         <input type="text" class="form-control input" name="nedm-survey-connected-resolution" id="nedm-survey-connected-resolution" value="<?php echo $connectedResolution; ?>">
			       </div>
			     </div>
			     <div class="field columns">
			       <div class="form-check col-md">
			         <label>Are you planning on displaying 4K content on your IFP?</label>
			         <label class="form-check-label">
			           <input class="form-check-input" type="radio" name="nedm-survey-displaying-4k" id="nedm-survey-displaying-4k-yes" value="4K content will be displayed on the IFP"><span class="form-check-input-text"><?php _e('Yes', 'framework') ?></span>
			         </label>
			         <label class="form-check-label">
			           <input class="form-check-input" type="radio" name="nedm-survey-displaying-4k" id="nedm-survey-displaying-4k-no" value="4K content will NOT be displayed on the IFP"><span class="form-check-input-text"><?php _e('No', 'framework') ?></span>
			         </label>
			       </div>
			     </div>
			     <div class="field columns">
			       <div class="form-check col-md">
			         <label>Using the built-in bcolumnsser or via the connected computer?</label>
			         <label class="form-check-label">
			           <input class="form-check-input" type="radio" name="nedm-survey-builtin-bcolumnsser" id="nedm-survey-builtin-bcolumnsser-yes" value="4K content will be displayed using the built-in bcolumnsser"><span class="form-check-input-text"><?php _e('Built-in bcolumnsser', 'framework') ?></span>
			         </label>
			         <label class="form-check-label">
			           <input class="form-check-input" type="radio" name="nedm-survey-builtin-bcolumnsser" id="nedm-survey-builtin-bcolumnsser-no" value="4K content will be displayed via the connected computer"><span class="form-check-input-text"><?php _e('Via the connected computer', 'framework') ?></span>
			         </label>
			       </div>
			     </div>
			     <div class="field columns">
			       <div class="form-check column is-6">
			         <label>Are the systems being connected to the IFP part of a Windows Domain?</label>
			         <label class="form-check-label">
			           <input class="form-check-input" type="radio" name="nedm-survey-connected-domain" id="nedm-survey-connected-domain-yes" value="The connected IFP will be part of our Windows Domain"><span class="form-check-input-text"><?php _e('Yes', 'framework') ?></span>
			         </label>
			         <label class="form-check-label">
			           <input class="form-check-input" type="radio" name="nedm-survey-connected-domain" id="nedm-survey-connected-domain-no" value="The connected IFP will NOT be part of our Windows Domain"><span class="form-check-input-text"><?php _e('No', 'framework') ?></span>
			         </label>
			       </div>
			       <div class="form-check column is-6">
			         <label for="nedm-survey-group-policy"><?php _e('Is there group policy in place that will prevent a user from accessing or changing display parameters such as resolution and refresh rate?', 'framework') ?></label>
			         <input type="text" class="form-control input" name="nedm-survey-group-policy" id="nedm-survey-group-policy" value="<?php echo $groupPolicy; ?>" />
			       </div>
			     </div>
			     <div class="field columns">
			       <div class="form-check column is-6">
			         <label>Will there be multiple users logging into the computer?</label>
			         <label class="form-check-label">
			           <input class="form-check-input" type="radio" name="nedm-survey-multiple-users" id="nedm-survey-multiple-users-yes" value="There will be multiple users logging into the computer"><span class="form-check-input-text"><?php _e('Yes', 'framework') ?></span>
			         </label>
			         <label class="form-check-label">
			           <input class="form-check-input" type="radio" name="nedm-survey-multiple-users" id="nedm-survey-multiple-users-no" value="There will NOT be multiple users logging into the computer"><span class="form-check-input-text"><?php _e('No', 'framework') ?></span>
			         </label>
			       </div>
			       <div class="form-check column is-6">
			         <label for="nedm-survey-user-permissions"><?php _e('Do each of the users have the same permissions or will there be different levels of access for each user?', 'framework') ?></label>
			         <input type="text" class="form-control input" name="nedm-survey-user-permissions" id="nedm-survey-user-permissions" value="<?php echo $userPermissions; ?>" />
			       </div>
			     </div>
			   </div>
			 </div>

			 <div class="columns group-columns">
			   <div class="field column">
			     <h3><strong>Please describe any other major issues and/or concerns within your IFP setup.</strong></h3>
					<div class="form-check">
						<input type="text" class="form-control input" name="nedm-survey-issue-description" id="nedm-survey-issue-description" value="<?php echo $issueDescription; ?>" />
				 	</div>
			   </div>
			 </div>

			  <div class="columns group-columns is-centered">
			    <div class="form-check column">
			      <input type="hidden" name="submitted" id="submitted" value="true" />
			      <?php wp_nonce_field( 'post_nonce', 'post_nonce_field' ); ?>
			      <button class="button" type="submit" value="submit" id="submit-survey">Submit Survey Answers</button>
			    </div>
			  </div>

			 </form>


			</div>
		</section>
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
