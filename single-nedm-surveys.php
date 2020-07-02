<?php
/**
 * The template for displaying all Product and Service custom post type
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Teq_v4.0
 */

get_header();
?>

<div id="primary" class="content-area" scroll>
	<main id="main" class="site-main section-container">
		<section class="full-section container padding-bottom">
			<div class="page-content columns is-multiline padding-bottom">

    		<div class="column is-full">
      		<h1><strong><?php echo get_post_meta( $post->ID, 'firstName', true );?> <?php echo get_post_meta( $post->ID, 'lastName', true ); ?></strong></h1>
      		<p><?php echo get_post_meta( $post->ID, 'titleRole', true ); ?></p>
					<h4><?php echo get_post_meta( $post->ID, 'contactPhone', true ); ?> | <?php echo get_post_meta( $post->ID, 'contactEmail', true ); ?></h4>
					<hr />
					<p class="white"><small class="white"><strong>Brief Description:</strong></small><br /><?php echo get_post_meta( $post->ID, 'issueDescription', true ); ?></p>
					<p class="white"><?php echo get_post_meta( $post->ID, 'reportSharing', true ); ?></p>
					<hr />
					<h1 class="white"><strong><?php the_title();?></strong></h1>
    		</div>

        <article class="column is-4 nedm-data">
          <div class="card nedm-data-field">
            <div class="card-content">
              <h6 class="nedm-text"><strong>Total client devices on the network</strong></h6>
              <h2><?php echo get_post_meta( $post->ID, 'totalDevices', true ); ?></h2>
            </div>
          </div>
        </article>
        <article class="column is-4 nedm-data">
          <div class="card nedm-data-field">
            <div class="card-content">
              <h6 class="nedm-text"><strong>Our most prevalent device vendor(s) are:</strong></h6>
              <h2><?php echo get_post_meta( $post->ID, 'deviceVendor', true ); ?></h2>
            </div>
          </div>
        </article>
        <article class="column is-4 nedm-data">
          <div class="card nedm-data-field">
            <div class="card-content">
              <h6 class="nedm-text"><strong>Interactive Flat Panels are connected through:</strong></h6>
              <h2><?php echo get_post_meta( $post->ID, 'connection', true ); ?></h2>
            </div>
          </div>
        </article>
        <article class="column is-4 nedm-data">
          <div class="card nedm-data-field">
            <div class="card-content">
              <h6 class="nedm-text"><strong>Is your school using a proxy for connectivity?</strong></h6>
              <h2><?php echo get_post_meta( $post->ID, 'proxyConnectivity', true ); ?></h2>
            </div>
          </div>
        </article>
        <article class="column is-4 nedm-data">
          <div class="card nedm-data-field">
            <div class="card-content">
              <h6 class="nedm-text"><strong>Is WPAD implemented?</strong></h6>
              <h2><?php echo get_post_meta( $post->ID, 'wpadImplemented', true ); ?></h2>
            </div>
          </div>
        </article>
        <article class="column is-4 nedm-data">
          <div class="card nedm-data-field">
            <div class="card-content">
              <h6 class="nedm-text"><strong>Is there an In-Line content filter or firewall deployed?</strong></h6>
              <h2><?php echo get_post_meta( $post->ID, 'filterFirewall', true ); ?></h2>
            </div>
          </div>
        </article>
        <article class="column is-4 nedm-data">
          <div class="card nedm-data-field">
            <div class="card-content">
              <h6 class="nedm-text"><strong>Highest wireless standard supported?</strong></h6>
              <h2><?php echo get_post_meta( $post->ID, 'wirelessStandard', true ); ?></h2>
            </div>
          </div>
        </article>
        <article class="column is-4 nedm-data">
          <div class="card nedm-data-field">
            <div class="card-content">
              <h6 class="nedm-text"><strong>Vendor of Firewall?</strong></h6>
              <h2><?php echo get_post_meta( $post->ID, 'vendorType', true ); ?></h2>
            </div>
          </div>
        </article>
        <article class="column is-4 nedm-data">
          <div class="card nedm-data-field">
            <div class="card-content">
              <h6 class="nedm-text"><strong>Broadcasting Speed (2.4Ghz / 5Ghz)</strong></h6>
              <h2><?php echo get_post_meta( $post->ID, 'schoolBroadcasting', true ); ?></h2>
            </div>
          </div>
        </article>
        <article class="column is-4 nedm-data">
          <div class="card nedm-data-field">
            <div class="card-content">
              <h6 class="nedm-text"><strong>Average Density of clients per access point</strong></h6>
              <h2><?php echo get_post_meta( $post->ID, 'averageDensity', true ); ?></h2>
            </div>
          </div>
        </article>
        <article class="column is-4 nedm-data">
          <div class="card nedm-data-field">
            <div class="card-content">
              <h6 class="nedm-text"><strong>Enabled Technology</strong></h6>
              <h2><?php echo get_post_meta( $post->ID, 'technologyEnabled', true ); ?></h2>
            </div>
          </div>
        </article>
        <article class="column is-4 nedm-data">
          <div class="card nedm-data-field">
            <div class="card-content">
              <h6 class="nedm-text"><strong>Access points deployed in each build</strong></h6>
              <h2><?php echo get_post_meta( $post->ID, 'pointsDeployed', true ); ?></h2>
            </div>
          </div>
        </article>
        <article class="column is-4 nedm-data">
          <div class="card nedm-data-field">
            <div class="card-content">
              <h6 class="nedm-text"><strong>Is VLAN tagging at the SSID part of your deployment? </strong></h6>
              <h2><?php echo get_post_meta( $post->ID, 'vlanTagging', true ); ?></h2>
            </div>
          </div>
        </article>
        <article class="column is-4 nedm-data">
          <div class="card nedm-data-field">
            <div class="card-content">
              <h6 class="nedm-text"><strong>Wireless Security implemented</strong></h6>
              <h2><?php echo get_post_meta( $post->ID, 'wirelessSecurity', true ); ?></h2>
            </div>
          </div>
        </article>
        <article class="column is-4 nedm-data">
          <div class="card nedm-data-field">
            <div class="card-content">
              <h6 class="nedm-text"><strong>Policies defined and enabled on the LAN</strong></h6>
              <h2><?php echo get_post_meta( $post->ID, 'wmmQos', true ); ?></h2>
            </div>
          </div>
        </article>
        <article class="column is-4 nedm-data">
          <div class="card nedm-data-field">
            <div class="card-content">
              <h6 class="nedm-text"><strong>Available IP addresses in the currently DHCP scope</strong></h6>
              <h2><?php echo get_post_meta( $post->ID, 'totalIp', true ); ?></h2>
            </div>
          </div>
        </article>
        <article class="column is-4 nedm-data">
          <div class="card nedm-data-field">
            <div class="card-content">
              <h6 class="nedm-text"><strong>Will the client devices and Interactive Flat Panels be on the same VLAN?</strong></h6>
              <h2><?php echo get_post_meta( $post->ID, 'sameVlan', true ); ?></h2>
            </div>
          </div>
        </article>
        <article class="column is-4 nedm-data">
          <div class="card nedm-data-field">
            <div class="card-content">
              <h6 class="nedm-text"><strong>HDCP content utilized?</strong></h6>
              <h2><?php echo get_post_meta( $post->ID, 'hdcpContent', true ); ?></h2>
            </div>
          </div>
        </article>
        <article class="column is-4 nedm-data">
          <div class="card nedm-data-field">
            <div class="card-content">
              <h6 class="nedm-text"><strong>Teachers/Students be allowed to bcolumnsse the Internet?</strong></h6>
              <h2><?php echo get_post_meta( $post->ID, 'bcolumnsseInternet', true ); ?></h2>
            </div>
          </div>
        </article>
        <article class="column is-4 nedm-data">
          <div class="card nedm-data-field">
            <div class="card-content">
              <h6 class="nedm-text"><strong>Share the device’s screen?</strong></h6>
              <h2><?php echo get_post_meta( $post->ID, 'teacherShare', true ); ?></h2>
            </div>
          </div>
        </article>
        <article class="column is-4 nedm-data">
          <div class="card nedm-data-field">
            <div class="card-content">
              <h6 class="nedm-text"><strong>Total classroom with device screen sharing abilities</strong></h6>
              <h2><?php echo get_post_meta( $post->ID, 'totalSharing', true ); ?></h2>
            </div>
          </div>
        </article>
        <article class="column is-4 nedm-data">
          <div class="card nedm-data-field">
            <div class="card-content">
              <h6 class="nedm-text"><strong>Wired device screen sharing?</strong></h6>
              <h2><?php echo get_post_meta( $post->ID, 'wiredSharing', true ); ?></h2>
            </div>
          </div>
        </article>
        <article class="column is-4 nedm-data">
          <div class="card nedm-data-field">
            <div class="card-content">
              <h6 class="nedm-text"><strong>Leveraging automatic updates?</strong></h6>
              <h2><?php echo get_post_meta( $post->ID, 'automaticUpdates', true ); ?></h2>
            </div>
          </div>
        </article>
        <article class="column is-4 nedm-data">
          <div class="card nedm-data-field">
            <div class="card-content">
              <h6 class="nedm-text"><strong>Tool/tools deployed for network traffic?</strong></h6>
              <h2><?php echo get_post_meta( $post->ID, 'trafficTool', true ); ?></h2>
            </div>
          </div>
        </article>
        <article class="column is-4 nedm-data">
          <div class="card nedm-data-field">
            <div class="card-content">
              <h6 class="nedm-text"><strong>Devices connecting to the IFP</strong></h6>
              <h2><?php echo get_post_meta( $post->ID, 'deviceConnecting', true ); ?></h2>
            </div>
          </div>
        </article>
        <article class="column is-4 nedm-data">
          <div class="card nedm-data-field">
            <div class="card-content">
              <h6 class="nedm-text"><strong>Approximate Age of the Systems</strong></h6>
              <h2><?php echo get_post_meta( $post->ID, 'approxAge', true ); ?></h2>
            </div>
          </div>
        </article>
        <article class="column is-4 nedm-data">
          <div class="card nedm-data-field">
            <div class="card-content">
              <h6 class="nedm-text"><strong>Processor Type</strong></h6>
              <h2><?php echo get_post_meta( $post->ID, 'processorType', true ); ?></h2>
            </div>
          </div>
        </article>
        <article class="column is-4 nedm-data">
          <div class="card nedm-data-field">
            <div class="card-content">
              <h6 class="nedm-text"><strong>Operating System</strong></h6>
              <h2><?php echo get_post_meta( $post->ID, 'operatingSystem', true ); ?></h2>
            </div>
          </div>
        </article>
        <article class="column is-4 nedm-data">
          <div class="card nedm-data-field">
            <div class="card-content">
              <h6 class="nedm-text"><strong>Dedicated graphics hardware or Onboard?</strong></h6>
              <h2><?php echo get_post_meta( $post->ID, 'dedicatedGraphics', true ); ?></h2>
            </div>
          </div>
        </article>
        <article class="column is-4 nedm-data">
          <div class="card nedm-data-field">
            <div class="card-content">
              <h6 class="nedm-text"><strong>Are there free display ports?</strong></h6>
              <h2><?php echo get_post_meta( $post->ID, 'freeDisplay', true ); ?></h2>
            </div>
          </div>
        </article>
        <article class="column is-4 nedm-data">
          <div class="card nedm-data-field">
            <div class="card-content">
              <h6 class="nedm-text"><strong>Using USB Graphics?</strong></h6>
              <h2><?php echo get_post_meta( $post->ID, 'usbGraphics', true ); ?></h2>
            </div>
          </div>
        </article>
        <article class="column is-4 nedm-data">
          <div class="card nedm-data-field">
            <div class="card-content">
              <h6 class="nedm-text"><strong>Graphics Adapter</strong></h6>
              <h2><?php echo get_post_meta( $post->ID, 'graphicsAdapter', true ); ?></h2>
            </div>
          </div>
        </article>
        <article class="column is-4 nedm-data">
          <div class="card nedm-data-field">
            <div class="card-content">
              <h6 class="nedm-text"><strong>Available USB ports on the computer</strong></h6>
              <h2><?php echo get_post_meta( $post->ID, 'availableUsb', true ); ?></h2>
            </div>
          </div>
        </article>
        <article class="column is-4 nedm-data">
          <div class="card nedm-data-field">
            <div class="card-content">
              <h6 class="nedm-text"><strong>Type of USB</strong></h6>
              <h2><?php echo get_post_meta( $post->ID, 'usbType', true ); ?></h2>
            </div>
          </div>
        </article>
        <article class="column is-4 nedm-data">
          <div class="card nedm-data-field">
            <div class="card-content">
              <h6 class="nedm-text"><strong>Mirroring or Cloning a primary display or extended desktop?</strong></h6>
              <h2><?php echo get_post_meta( $post->ID, 'mirroringCloning', true ); ?></h2>
            </div>
          </div>
        </article>
        <article class="column is-4 nedm-data">
          <div class="card nedm-data-field">
            <div class="card-content">
              <h6 class="nedm-text"><strong>Desktop Resolution</strong></h6>
              <h2><?php echo get_post_meta( $post->ID, 'desktopResolution', true ); ?></h2>
            </div>
          </div>
        </article>
        <article class="column is-4 nedm-data">
          <div class="card nedm-data-field">
            <div class="card-content">
              <h6 class="nedm-text"><strong>IFP to Computer Connection</strong></h6>
              <h2><?php echo get_post_meta( $post->ID, 'connectedResolution', true ); ?></h2>
            </div>
          </div>
        </article>
        <article class="column is-4 nedm-data">
          <div class="card nedm-data-field">
            <div class="card-content">
              <h6 class="nedm-text"><strong>Display 4k Content?</strong></h6>
              <h2><?php echo get_post_meta( $post->ID, 'displaying4k', true ); ?></h2>
            </div>
          </div>
        </article>
        <article class="column is-4 nedm-data">
          <div class="card nedm-data-field">
            <div class="card-content">
              <h6 class="nedm-text"><strong>Using the built-in bcolumnsser or connected computer?</strong></h6>
              <h2><?php echo get_post_meta( $post->ID, 'builtinBcolumnsser', true ); ?></h2>
            </div>
          </div>
        </article>
        <article class="column is-4 nedm-data">
          <div class="card nedm-data-field">
            <div class="card-content">
              <h6 class="nedm-text"><strong>Systems connected to the IFP part of the Windows Domain</strong></h6>
              <h2><?php echo get_post_meta( $post->ID, 'connectedDomain', true ); ?></h2>
            </div>
          </div>
        </article>
        <article class="column is-4 nedm-data">
          <div class="card nedm-data-field">
            <div class="card-content">
              <h6 class="nedm-text"><strong>Group Policy to prevent users from changing display?</strong></h6>
              <h2><?php echo get_post_meta( $post->ID, 'groupPolicy', true ); ?></h2>
            </div>
          </div>
        </article>
        <article class="column is-4 nedm-data">
          <div class="card nedm-data-field">
            <div class="card-content">
              <h6 class="nedm-text"><strong>Multiple Users logging into the computer?</strong></h6>
              <h2><?php echo get_post_meta( $post->ID, 'multipleUsers', true ); ?></h2>
            </div>
          </div>
        </article>
        <article class="column is-4 nedm-data">
          <div class="card nedm-data-field">
            <div class="card-content">
              <h6 class="nedm-text"><strong>User Permissions for every user?</strong></h6>
              <h2><?php echo get_post_meta( $post->ID, 'userPermissions', true ); ?></h2>
            </div>
          </div>
        </article>

				<div class="column is-full">
					<hr />
					<p>Network-Enabled Device Management</p>
	        <p class="white">7 Norden Lane<br />Huntington Station, NY 11746<br />877.455.9369<br /><a href="https://www.teq.com" class="white">Teq.com</a> | <a href="https://otis.teq.com/" class="white">OtisPD.teq.com</a></p>
				</div>


			</div>

			</div>
		</section>
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
