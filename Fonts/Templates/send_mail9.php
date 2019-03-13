<?php
include_once '../config.php';
$letter_id = $_POST['letter_id'];
//$letter_id = '10';
if($letter_id!=='') {
$letter_data = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM tbl_all_letters WHERE id = '$letter_id' AND status = 'active'"));
if($letter_data!==''){

$template_id = $letter_data['template_id'];
$template_name = mysqli_fetch_array(mysqli_query($link, "SELECT name FROM tbl_templates WHERE id = '$template_id' AND status = 'active'"));
//echo $subject_name['subject'];
$department_id = $letter_data['department'];
$department = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM tbl_department WHERE id = '$department_id' AND status = 'active'"));
//echo $department['name'];
$sent_to_data = $letter_data['sent_to'];
$sent_to_data = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM tbl_recipients WHERE id = '$sent_to_data' AND status = 'active'"));
//$number_of_fields = $template_data['numbers'];
$user_id_data = $letter_data['user_id'];
$user_id_data = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM tbl_user WHERE id = '$user_id_data' AND status = 'active'"));
}
}	
if(isset($_POST['send'])) {
$public ="ba6c05e1d413b1d13e3e0b74d9e84544";
$private ="03ac1362914088acbffd88004277d8d4";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.mailjet.com/v3/send");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "{'FromEmail':'harikesh@pinkrickshawdesign.com', 'FromName': 'Automated letter writting', 'Subject':'automated letter', 'Text-part':'','Html-part':'Date:". $letter_data['added_on']."</h4></div><h2>सेवा मे,</h2><br /><h3>माननीय प्रधान मंत्री जी</h3><br/><h1>विषय: ".$template_name['name'] ."</h1><br/>
    <p><h4>श्रीमान,</h4></p><p><h4>बहुत दुःख के साथ मुझे ये कहना पर रहा है की किसानो के उज्जवल भविस्य के लिए उठाये गए उत्तर प्रदेश
								सरकार की इस ". $letter_data['answer1']." दुकान की योजना पर रिश्वत की हल चल रही है  </h4></p>
								<p><h4>यह हल किसानो के खेतो में नहीं बल्कि उनके घरो में चलाई जा रही है कहने का अर्थ है ". $letter_data['answer1']." दुकान खोलने के लिए लोगो से ". $letter_data['answer4']." लाख का fixed deposit माँगा जा रहा है जबकि ऐसा government के scheme में नहीं है  </h4></p>
		<p><h4>  आप तो सब जानते हैं क्योंकि नाम हे है जनता पार्टी, यानि जो सबकुछ जनता हो आप हम किसानो को जानते हैं आपने मुफ्त में दुकान खोलने का वायदा किया है मुझे पक्का उम्मीद है की आप अपना वायदा जरूर पूरा करेंगे और इन बैंक वालो की मनमानी पर उनको सबक सिखाएंगे , जिससे देश में रिश्वतखोरी ख़त्म होने के साथ साथ उज्जवल भविस्य भी मिल सके. </h4></p>
							<p> <h4>रिश्वत मांगने वाले बैंक का नाम :- ". $letter_data['answer2']."  </h4></p>
							<p> <h4>रिश्वत मांगने वाले बैंक का पता :- ". $letter_data['answer3']."  </h4></p>
							<p><h4>	आपका विश्वासी </h4></p>
							
							<p><h4>नाम :- ".$user_id_data['username']."</h4></p>','Recipients':[{'Email': '".$sent_to_data['email-id']."'}]}");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_USERPWD, $public . ":" . $private);

$headers = array();
$headers[] = "Content-Type: application/json";
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close ($ch);
echo "Email Sent Successfully!";
exit();
}
?>