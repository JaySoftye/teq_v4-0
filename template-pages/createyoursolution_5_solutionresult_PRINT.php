<?php
/**
 * Template Name: PRINT Your Solution 5.0 Solution Result
 * The template for printing the Create Your Solution Result from Product.php template
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: XHTML Forms
 * @package Teq_v4.0
 */

 // GET QUOTED ITEMS ARRAY FROM POST DATA
 if (isset($_POST['quoted_items'])) {
   $products = $_POST['quoted_items'];

   // Include the main TCPDF library (search for installation path).
   require_once('./TCPDF/tcpdf.php');

   // Extend the TCPDF class to create custom Header and Footer
   class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = './images/teq-brands_solution_invoice.jpg';
        $this->Image($image_file, 15, 10, 300, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, true);
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 6);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }

   }

   // create new PDF document
   $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

   // set document information
   $pdf->SetCreator(PDF_CREATOR);
   $pdf->SetAuthor('Teq');
   $pdf->SetTitle('YOUR COMPLETED classroom solution');

   // set default header data
   $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

   // set header and footer fonts
   $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
   $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

   // set default monospaced font
   $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

   // set margins
   $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
   $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
   $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

   // set auto page breaks
   $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
   // set image scale factor
   $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
   // set some language-dependent strings (optional)
   if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
       require_once(dirname(__FILE__).'/lang/eng.php');
       $pdf->setLanguageArray($l);
   }
   // IMPORTANT: disable font subsetting to allow users editing the document
   $pdf->setFontSubsetting(false);
   // set font
   $pdf->SetFont('helvetica', '', 10, '', false);
   // add a page
   $pdf->AddPage();
   // create some HTML content
   $content = '';
   $content .= '<p><b>Based on your input, here is your classroom solution. It’s complete, it’s unique to you, and it gives you a holistic way to successfully infuse STEAM learning into your class, school, or district.</b></p>';
   $content .='
      <table border="0" cellspacing="0" cellpadding="9">
        <tr>
          <td width="10%" style="border-top:3px solid #dbdbdb;border-bottom:3px solid #dbdbdb;"></td>
          <td width="20%" style="border-top:3px solid #dbdbdb;border-bottom:3px solid #dbdbdb;"><h6>PRODUCT</h6></td>
          <td width="70%" style="border-top:3px solid #dbdbdb;border-bottom:3px solid #dbdbdb;"><h6>DESCRIPTION</h6></td>
        </tr>
      ';

      $product_args = array(
        'post_type' => array('product-and-service', 'pathways'),
        'orderby'=> 'title',
        'order' => 'ASC',
        'post__in' => $products,
      );

    $product_query = new WP_Query( $product_args );

    if ($product_query -> have_posts()) : while ($product_query -> have_posts()) :
        $product_query -> the_post();
        $post_id = get_the_ID();
        $post_name = get_the_title();
        $product_content = get_post_meta( get_the_ID(), 'additional_info_meta_content', true );
        $pathway_content = get_post_meta( get_the_ID(), 'iblock_focus_meta_html', true );
        $image_url = get_the_post_thumbnail( $post_id, 'thumbnail' );

      $content .= '<tr><td style="border-bottom:1px solid #dbdbdb;padding-bottom:21px;">';
      $content .= '<img src="';
      $content .= $image_url;
      $content .= '" /></td><td style="border-bottom:1px solid #dbdbdb;padding-bottom:21px;"><h4>';
      $content .= $post_name;
      $content .= '</h4></td><td style="border-bottom:1px solid #dbdbdb;padding-bottom:21px;">';
      $content .= html_entity_decode($product_content);
      $content .= html_entity_decode($pathway_content);
      $content .= '<br /><br /></td></tr>';

    endwhile; endif;

    $content .= '</table><p></p>';
    $content .= '<h6>Teq | Teaching Things, Inc.</h6x><p><small>7 Norden Lane Huntington Station, NY 11746 (US) | 877.455.9369 | info@teq.com | Privacy Policy<br />©2020 - Teq®, It’s all about learning.™, registered trademarks of Tequipment, Inc. in the US. Other company names and product names appearing here are the trademarks and registered trademarks of their respective companies.</small></p>';

   // output the HTML content
   $pdf->writeHTML($content, true, 0, true, 0);
   //Close and output PDF document
   $pdf->Output('teq_solution_NEW.pdf', 'D');
 }

 get_header();

 ?>

 <div id="primary" class="content-area">
 	<main id="main" class="site-main container create-your-solution-container">
 		<form id="products_search_form" name method action>

 			<section id="solutionsHeader">
 				<div class="columns is-multiline is-centered is-desktop">
 					<div class="column is-full">
 						<p class="caption blue-text">
   						<strong>YOUR</strong> classroom solution.
 						</p>
 						<h1 class="main-title ng-binding">We're sorry a problem has occured.</h1>
 					</div>
 				</div>
 			</section>

 			<section id="solutionsIntro">
 				<div class="columns is-multiline is-centered is-desktop">
          <div class="column is-three-fifths">
            <h4>Uh oh, don't be alarmed but there was an error processing this request, but please <u>don't scream</u>. Unless, its for <strong>Ice-Cream</strong>. Which, we are told, is on the way.</h4>
          </div>
          <div class="column">
            <object type="image/svg+xml" data="<?php echo get_template_directory_uri() . '/inc/ui/main-solution-container_error.svg'; ?>"></object>
          </div>
 				</div>
 			</section>

 		</form>
 	</main><!-- #main -->
 </div>

 <?php

 get_footer();
