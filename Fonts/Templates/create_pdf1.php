<?php
include 'getdata.php';


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

//$html = "<h4>Date:". $letter_data['added_on']."</h4>";

$html = "<div style='text-align:right'><h4>Date:". $letter_data['added_on']."</h4></div><h2>To,</h2><br /><h3>".$sent_to_data['name'] ."</h3><br/><h3>". $department['name'] ."</h3><br/><h3>" .$sent_to_data['district'] ."</h3><br/><h3>". $sent_to_data['state']."</h3><br/><h1>Subject: ".$template_name['name'] ."</h1><br/>
    <p><h4>Sir/Mam,</h4></p><p><h4>I am writing this letter to you from ".$user_id_data['address']." This letter is in reference to ".$letter_data['answer1']." We are writing to you to explain our problem and seek your guidance in  how we can improve the situation.".$letter_data['answer2']." We believe a possible solution would be ". $letter_data['answer3'] ."If you can enable us to deliver this solution by ". $letter_data['todate'] ." we would be highly obliged.
	</h4></p><p><h4>" . $letter_data['answer6'] ."</h4>	</p><p><h4>	Thanking you</h4></p><p><h4>".$letter_data['answer6']."<br/>". $user_id_data['username'] ."<br/>".$user_id_data['address'] ."</h4></p>";
// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');
// ---------------------------------------------------------
//$pdf->Annotation(85, 27, 5, 5, 'text file', array('Subtype'=>'FileAttachment', 'Name' => 'PushPin', 'FS' => '../documents/14_pdf1.pdf'));
//Close and output PDF document

$pdf->Output('automated_letter.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
