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

$html = "<div style='text-align:right'><h4>Date:". $letter_data['added_on']."</h4></div><h2>सेवा मे,</h2><br /><h3>माननीय प्रधान मंत्री जी</h3><br/><h1>विषय: ".$template_name['name'] ."</h1><br/>
    <p><h4>श्रीमान,</h4></p><p><h4>बहुत दुःख के साथ मुझे ये कहना पर रहा है की किसानो के उज्जवल भविस्य के लिए उठाये गए उत्तर प्रदेश
								सरकार की इस ". $letter_data['answer1']." दुकान की योजना पर रिश्वत की हल चल रही है  </h4></p>
								<p><h4>यह हल किसानो के खेतो में नहीं बल्कि उनके घरो में चलाई जा रही है कहने का अर्थ है ". $letter_data['answer1']." दुकान खोलने के लिए लोगो से ". $letter_data['answer4']." लाख का fixed deposit माँगा जा रहा है जबकि ऐसा government के scheme में नहीं है 
								
							</h4></p>
							<p><h4>  आप तो सब जानते हैं क्योंकि नाम हे है जनता पार्टी, यानि जो सबकुछ जनता हो आप हम किसानो को जानते हैं आपने मुफ्त में दुकान खोलने का वायदा किया है मुझे पक्का उम्मीद है की आप अपना वायदा जरूर पूरा करेंगे और इन बैंक वालो की मनमानी पर उनको सबक सिखाएंगे , जिससे देश में रिश्वतखोरी ख़त्म होने के साथ साथ उज्जवल भविस्य भी मिल सके.
							</h4></p>
							</h4></p>
							
							<p> <h4>रिश्वत मांगने वाले बैंक का नाम :- ". $letter_data['answer2']."  </h4></p>
							<p> <h4>रिश्वत मांगने वाले बैंक का पता :- ". $letter_data['answer3']."  </h4></p>
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
