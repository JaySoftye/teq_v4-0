<?php
/**
 * Template part for NEDM SURVEY post content and results
 * PUBLISH A 'NEDM-Surveys' Custom-Post-Type
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Teq_v4.0
 */

 /** Validate your form and send reDirects accordingly **/
 $hasError == null;

if (isset($_POST['action'])) {
  if (trim($_POST['nedmSurveyFirstName']) === '' || trim($_POST['nedmSurveyLastName']) === '' || trim($_POST['nedmSurveyTitleRole']) === '' || trim($_POST['nedmSurveySchoolName']) === '' || trim($_POST['nedmSurveyContactPhone']) === '' ||
  trim( $_POST['nedmSurveyContactEmail']) === '') {

    wp_safe_redirect(
    // Sanitize and REDIRECT TO 404 ERROR page
      esc_url(
        // Retrieves the site url for the current site.
        site_url( '/404.php' )
      )
    );
    exit();

  } else {
    $hasError == false;
  }
}

if ( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == "new_nedm_post" && isset($_POST['action']) && isset($_POST['new_nedm_survey']) && wp_verify_nonce($_POST['new_nedm_survey'], 'new_nedm_survey') && ($hasError == false)) {

  add_action( 'post_edit_form_tag' , 'post_edit_form_tag' );
  function post_edit_form_tag( ) {
    echo ' enctype="multipart/form-data"';
  }

  //store our post vars into variables for later use
  $firstName = wp_strip_all_tags($_POST['nedmSurveyFirstName']);
  $lastName = wp_strip_all_tags($_POST['nedmSurveyLastName']);
  $titleRole = wp_strip_all_tags($_POST['nedmSurveyTitleRole']);
  $schoolName = wp_strip_all_tags($_POST['nedmSurveySchoolName']);
  $contactPhone = wp_strip_all_tags($_POST['nedmSurveyContactPhone']);
  $contactEmail = wp_strip_all_tags($_POST['nedmSurveyContactEmail']);
  $surveyConcerns = wp_strip_all_tags($_POST['nedmSurveyOtherConcerns']);

  // store survey post fields in variables
  $makeModelNetworkSwitches = wp_strip_all_tags($_POST['nedmSurveyMakeModelNetworkSwitches']);
  $totalNumberClientDevices = wp_strip_all_tags($_POST['nedmSurveyTotalNumberClientDevices']);
  $deviceVendor = wp_strip_all_tags($_POST['nedmSurveyDeviceVendor']);
  $iFPconnect = wp_strip_all_tags($_POST['nedmSurveyIFPconnect']);
  $computersDesktopsConnect = wp_strip_all_tags($_POST['nedmSurveyComputersDesktopsConnect']);
  $tabletsConnect = wp_strip_all_tags($_POST['nedmSurveyTabletsConnect']);
  $configuredImplementedManagedPorts = wp_strip_all_tags($_POST['nedmSurveyConfiguredImplementedManagedPorts']);
  $yesManagedPorts = wp_strip_all_tags($_POST['nedmSurveyYesManagedPorts']);
  $usingProxyForInternet = wp_strip_all_tags($_POST['nedmSurveyUsingProxyForInternet']);
  $yesWeAreUsingProxy = wp_strip_all_tags($_POST['nedmSurveyYesWeAreUsingProxy']);
  $topologyChangesUpgrades = wp_strip_all_tags($_POST['nedmSurveyTopologyChangesUpgrades']);
  $makeModelFirmwareBuildAccessPoints = wp_strip_all_tags($_POST['nedmSurveyMakeModelFirmwareBuildAccessPoints']);
  $highestWirelessStandard = wp_strip_all_tags($_POST['nedmSurveyHighestWirelessStandard']);
  $ageAccessPoints = wp_strip_all_tags($_POST['nedmSurveyAgeAccessPoints']);
  $sSIDBroadcastedHidden = wp_strip_all_tags($_POST['nedmSurveySSIDBroadcastedHidden']);
  $connectingToSameSSID = wp_strip_all_tags($_POST['nedmSurveyConnectingToSameSSID']);
  $connectedDevicesFiveGHZ = wp_strip_all_tags($_POST['nedmSurveyConnectedDevicesFiveGHZ']);
  $averageDensityAccessPoints = wp_strip_all_tags($_POST['nedmSurveyAverageDensityAccessPoints']);
  $wirelessAssistiveTechnology = wp_strip_all_tags($_POST['nedmSurveyWirelessAssistiveTechnology']);
  $wMMPoliciesEnabled = wp_strip_all_tags($_POST['nedmSurveyWMMPoliciesEnabled']);
  $accessPointsDeployed = wp_strip_all_tags($_POST['nedmSurveyAccessPointsDeployed']);
  $accessPointsClassroom = wp_strip_all_tags($_POST['nedmSurveyAccessPointsClassroom']);
  $vLANTagging = wp_strip_all_tags($_POST['nedmSurveyVLANTagging']);
  $clientDevicesIP = wp_strip_all_tags($_POST['nedmSurveyClientDevicesIP']);
  $wirelessSecurityImplemented = wp_strip_all_tags($_POST['nedmSurveyWirelessSecurityImplemented']);
  $usingPortIsolation = wp_strip_all_tags($_POST['nedmSurveyUsingPortIsolation']);
  $accessPointsCurrentFirmware = wp_strip_all_tags($_POST['nedmSurveyAccessPointsCurrentFirmware']);
  $gettingIPaddress = wp_strip_all_tags($_POST['nedmSurveyGettingIPaddress']);
  $enoughAddressesForAllDevices = wp_strip_all_tags($_POST['nedmSurveyEnoughAddressesForAllDevices']);
  $currentDHCPTime = wp_strip_all_tags($_POST['nedmSurveyCurrentDHCPTime']);
  $clientDevicesIFPSameNetwork = wp_strip_all_tags($_POST['nedmSurveyClientDevicesIFPSameNetwork']);
  $screenSharingIFP = wp_strip_all_tags($_POST['nedmSurveyScreenSharingIFP']);
  $whichIQModules = wp_strip_all_tags($_POST['nedmSurveyWhichIQModules']);
  $buildNumberOfKappIQ = wp_strip_all_tags($_POST['nedmSurveyBuildNumberOfKappIQ']);
  $typesOfSMARTIFP = wp_strip_all_tags($_POST['nedmSurveyTypesOfSMARTIFP']);


  //create post content variable with FORM fields from submission
  $content = '<article class="column is-4"><div class="card card-content"><p class="strong">1. What make and Model Network switches are you using?</p><p>' . $makeModelNetworkSwitches . '</p></div></article>';
  $content .= '<article class="column is-4"><div class="card card-content"><p class="strong">2. What is total number of client devices on your network?</p><p>' . $totalNumberClientDevices . '</p></div></article>';
  $content .= '<article class="column is-4"><div class="card card-content"><p class="strong">3. Is there a device vendor that is more prevalent?</p><p>' . $deviceVendor . '</p></div></article>';
  $content .= '<article class="column is-4"><div class="card card-content"><p class="strong">4a. How will your IFP Devices connect to the network?</p><p>' . $iFPconnect . '</p></div></article>';
  $content .= '<article class="column is-4"><div class="card card-content"><p class="strong">4b. How will your Computer/Desktops connect to the network?</p><p>' . $computersDesktopsConnect . '</p></div></article>';
  $content .= '<article class="column is-4"><div class="card card-content"><p class="strong">4c. How will your Tablets and other devices connect to the network?</p><p>' . $tabletsConnect . '</p></div></article>';
  $content .= '<article class="column is-4"><div class="card card-content"><p class="strong">5. Have you already configured and implemented your managed ports for your IFP’s?<p>' . $configuredImplementedManagedPorts . ', ' . $yesManagedPorts . '</p></div></article>';
  $content .= '<article class="column is-4"><div class="card card-content"><p class="strong">6. Is your school using a proxy for Internet connectivity?<p>' . $usingProxyForInternet . ', ' . $yesWeAreUsingProxy . '</p></div></article>';
  $content .= '<article class="column is-4"><div class="card card-content"><p class="strong">7. Has there been any recent topology changes or upgrades to your Network Infrastructure recently?</p><p>' . $topologyChangesUpgrades  . '</p></div></article>';
  $content .= '<article class="column is-4"><div class="card card-content"><p class="strong">8. What is the Make Model and Firmware build of your Access points? </p><p>' . $makeModelFirmwareBuildAccessPoints . '</p></div></article>';
  $content .= '<article class="column is-4"><div class="card card-content"><p class="strong">9a. What is the highest wireless standard supported?</p><p>' . $highestWirelessStandard . '</p></div></article>';
  $content .= '<article class="column is-4"><div class="card card-content"><p class="strong">9b. What is the age of your wireless Access points and infrastructure?</p><p>' . $ageAccessPoints . '</p></div></article>';
  $content .= '<article class="column is-4"><div class="card card-content"><p class="strong">10a. Are your SSIDs Broadcasted or hidden throughout the network?</p><p>' . $sSIDBroadcastedHidden . '</p></div></article>';
  $content .= '<article class="column is-4"><div class="card card-content"><p class="strong">10b. Are students and teachers connecting to the same SSIDs?</p><p>' . $connectingToSameSSID . '</p></div></article>';
  $content .= '<article class="column is-4"><div class="card card-content"><p class="strong">10c. Are the connected devices 5GHZ capable?</p><p>' . $connectedDevicesFiveGHZ . '</p></div></article>';
  $content .= '<article class="column is-4"><div class="card card-content"><p class="strong">11. Average density of clients per access point?</p><p>' . $averageDensityAccessPoints . '</p></div></article>';
  $content .= '<article class="column is-4"><div class="card card-content"><p class="strong">12. What wireless Networking Assistive technology are enabled if any?</p><p>' . $wirelessAssistiveTechnology . '</p></div></article>';
  $content .= '<article class="column is-4"><div class="card card-content"><p class="strong">13. Are WMM or other QoS policies defined and enabled on your LAN?</p><p>' . $wMMPoliciesEnabled . '</p></div></article>';
  $content .= '<article class="column is-4"><div class="card card-content"><p class="strong">14a. How many wireless access points are deployed in each building?</p><p>' . $accessPointsDeployed . '</p></div></article>';
  $content .= '<article class="column is-4"><div class="card card-content"><p class="strong">14b. Are there access points for each classroom?</p><p>' . $accessPointsClassroom . '</p></div></article>';
  $content .= '<article class="column is-4"><div class="card card-content"><p class="strong">15. Is VLAN tagging at the SSID part of your deployment?</p><p>' . $vLANTagging . '</p></div></article>';
  $content .= '<article class="column is-4"><div class="card card-content"><p class="strong">16. Please provide an example of the board and client devices IP Address including subnet mask and default gateway.</p><p>' . $clientDevicesIP . '</p></div></article>';
  $content .= '<article class="column is-4"><div class="card card-content"><p class="strong">17. What type of wireless security is being implemented at your school?</p><p>' . $wirelessSecurityImplemented . '</p></div></article>';
  $content .= '<article class="column is-4"><div class="card card-content"><p class="strong">18. Are you using Port Isolation for access point or switch in your Configuration?</p><p>' . $usingPortIsolation . '</p></div></article>';
  $content .= '<article class="column is-4"><div class="card card-content"><p class="strong">19. Are your Access points on the current firmware revision?</p><p>' . $accessPointsCurrentFirmware . '</p></div></article>';
  $content .= '<article class="column is-4"><div class="card card-content"><p class="strong">20. Are you getting an IP address and is it pingable?</p><p>' . $gettingIPaddress . '</p></div></article>';
  $content .= '<article class="column is-4"><div class="card card-content"><p class="strong">21a. Are there enough IP addresses to support all the devices in your landscape?</p><p>' . $enoughAddressesForAllDevices . '</p></div></article>';
  $content .= '<article class="column is-4"><div class="card card-content"><p class="strong">21b. What is your current DHCP time?</p><p>' . $currentDHCPTime . '</p></div></article>';
  $content .= '<article class="column is-4"><div class="card card-content"><p class="strong">22. Will the client devices and Interactive Flat Panels be on the same VLAN/Network Segment?</p><p>' . $clientDevicesIFPSameNetwork . '</p></div></article>';
  $content .= '<article class="column is-4"><div class="card card-content"><p class="strong">23. Will students as well as teachers be screen sharing to the SMART IFP?</p><p>' . $screenSharingIFP . '</p></div></article>';
  $content .= '<article class="column is-4"><div class="card card-content"><p class="strong">24. Which IQ modules/ IQ experience do you have in your IFP’s?</p><p>' . $whichIQModules . '</p></div></article>';
  $content .= '<article class="column is-4"><div class="card card-content"><p class="strong">25. What is the build number of the Kapp IQ or the Embedded IQ</p><p>' . $buildNumberOfKappIQ . '</p></div></article>';
  $content .= '<article class="column is-4"><div class="card card-content"><p class="strong">26. How many IFP’s of each type do you have in your School?</p><p>' . $typesOfSMARTIFP . '</p></div></article>';


  //the array of arguements to be inserted with wp_insert_post
  $new_post = array(
    'post_title'   => $schoolName,
    'post_content' => $content,
    'post_status'  => 'publish',
    'post_type'    => 'NEDM-Surveys'
  );

  //insert the the post into database by passing $new_post to wp_insert_post
  //store our post ID in a variable $pid
  $pid = wp_insert_post($new_post);

    //insert custom meta data into post for contact data
    add_post_meta($pid, "firstName", $firstName);
    add_post_meta($pid, "lastName", $lastName);
    add_post_meta($pid, "titleRole", $titleRole);
    add_post_meta($pid, "schoolName", $schoolName);
    add_post_meta($pid, "contactPhone", $contactPhone);
    add_post_meta($pid, "contactEmail", $contactEmail);
    add_post_meta($pid, "surveyConcerns", $surveyConcerns);

  wp_safe_redirect(
  // Sanitize.
    esc_url(
      // Retrieves the site url for the current site.
      site_url( '/nedm-survey/survey-submitted' )
    )
  );
  exit();

}
