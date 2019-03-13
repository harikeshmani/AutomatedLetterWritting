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
$pdf->SetFont('freesans', '', 10);

// set font
//3$pdf->SetFont('dejavusans', '', 10);

// add a page
$lg = Array();
$lg['a_meta_charset'] = 'UTF-8';
$lg['a_meta_language'] = 'IN'; // I think you can change this to HI or IN for hindi
$lg['w_page'] = 'page';

// CHANGE SETTINGS IN TCPDF
$pdf->setLanguageArray($lg);


$pdf->AddPage();

//$html = "<h4>Date:". $letter_data['added_on']."</h4>";

$html = "<div style='text-align:right'><h4>Date:". $letter_data['added_on']."</h4></div><h2>सेवा मे,</h2><br /><h3>श्रीयुत आयकर आधिकारी,</h3><br/><h1>विषय: ".$template_name['name'] ."</h1><br/>
    <p><h4>श्रीमान,</h4></p><p><h4>मैं आपको सूचित करना चाहता हूँ की मेरे वित्त वर्ष ". $letter_data['answer1']." के आयकर में त्रुटि है। मेरा आपसे निवेदन है की कृपया मेरे वित्त वर्ष ". $letter_data['answer1']." के आयकर में यथाशीघ्र त्रुटि का निवारण करने का कष्ट करे। </h4></p>
		</h4></p>
		<p><h4>	आपका विश्वासी </h4></p>
		<p><h4>नाम :- ".$user_id_data['username']."</h4></p>";
// output the HTML content

$pdf->writeHTML($html, true, false, true, false, '');
// ---------------------------------------------------------
//$pdf->Write(5, $pdf, '', 0, '', false, 0, false, false, 0);

//Close and output PDF document

$pdf->Output('automated_letter.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
