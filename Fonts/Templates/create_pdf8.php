<?php
include 'getdata.php';
//$txt = $letter_data['added_on'];		
//$tests = 'hello';
// Include the main TCPDF library (search for installation path).
require_once('TCPDF/tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Automated Letter writting');
$pdf->SetTitle('Automated Letter writting');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
// set default header data

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

// ---------------------------------------------------------

// set font
$pdf->SetFont('dejavusans', '', 10);

// add a page
$pdf->AddPage();


$html = "<div style='text-align:right'><h4>Date:". $letter_data['added_on']."</h4></div><h2>To,</h2><br /><h3>".$sent_to_data['name']."<br/>". $department['name']." <br/> ".$sent_to_data['district']."<br/>".  $sent_to_data['state']."</h3><br/><h1>Subject: ".$template_name['name'] ."</h1><br/>
    <p><h4>Dear Sir/Madam,</h4></p><p><h4>This application refers to the Birth certificate Registration no. ". $letter_data['answer1']." & Registered dated on ". $letter_data['answer2']." for the new born ". $letter_data['answer4']." child on ". $letter_data['answer3']." in ". $letter_data['answer5']." Hospital ". $letter_data['answer6'].".
	
							</h4></p>
							<p><h4>We his/her parents would like to inform you that we have done namakaran of our child as  ". $letter_data['answer7']." for his/her Birth certificate. Hereby, you are requested to update your record with the provided details and issue a new certificate for his / her future records.</h4>	</p>
							<p><h4>	Thanking you</h4></p>
							<p><h4>	Yours Sincerely</h4></p>
							<p><h4>". $user_id_data['username']."</h4></p>

							<p><h4>	Father of child – ". $letter_data['answer9']." </h4></p>
                            <p><h4>	Mother of child – ". $letter_data['answer8']."</h4></p>";
// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');
// ---------------------------------------------------------

//Close and output PDF document

$pdf->Output('automated_letter.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
