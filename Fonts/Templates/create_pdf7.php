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

//$html = "<h4>Date:". $letter_data['added_on']."</h4>";

$html = "<div style='text-align:right'><h4>Date:". $letter_data['added_on']."</h4></div><h2>To,</h2><br /><h3>".$sent_to_data['name'] ."</h3><br/><h3>". $department['name'] ."</h3><br/><h3>" .$sent_to_data['district'] ."</h3><br/><h3>". $sent_to_data['state']."</h3><br/><h1>Subject: ".$template_name['name'] ."</h1><br/>
    <p><h4>DearSir/Madam,</h4></p><p><h4>I am hereby applying for the issue of new ration card form me and my family member. I am providing 
                              Here under the required detail for this purpose.
							</h4></p>
							<p><h4>Category of ration card: ". $letter_data['answer1']." <br /><br /> Name of the applicant: ". $letter_data['answer2']." <br /><br /> Date of birth:  ". $letter_data['dob']."(Proof attached) <br /><br /> Address: ". $letter_data['answer4']." <br /><br /> District: ". $letter_data['answer5']." Block: ". $letter_data['answer6']." ward No: ". $letter_data['answer7']." Pin code: ". $letter_data['answer8']." 
							<br /><br /> Contact No: : ". $letter_data['answer9']." <br /><br /> House (Owned/Rented/Company allotted): : ". $letter_data['answer10']."<br /><br /> Nationality: ". $letter_data['answer11']." <br /><br /> Caste: ". $letter_data['answer12']." <br /><br /> I am enclosing the require documents as mentioned above with along this application. Kindly request to please consider and approve my application and issue a ration card in my name at the earliest possible. I shall be grateful to you for this. <br /><br />Signature: <br /><br />	Place: ". $letter_data['answer5']." <br /><br />	Date: ". $letter_data['added_on']."</h4></p>";
// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');
// ---------------------------------------------------------

//Close and output PDF document

$pdf->Output('automated_letter.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
