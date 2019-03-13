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
curl_setopt($ch, CURLOPT_POSTFIELDS, "{'FromEmail':'harikesh@pinkrickshawdesign.com', 'FromName': 'Automated letter writting', 'Subject':'automated letter', 'Text-part':'','Html-part':'Date:". $letter_data['added_on']."</h4></div><h2>To,</h2><br /><h3>".$sent_to_data['name']."<br/>". $department['name']." <br/> ".$sent_to_data['district']."<br/>".  $sent_to_data['state']."</h3><br/><h1>Subject: ".$template_name['name'] ."</h1><br/>
    <p><h4>Dear Sir/Madam,</h4></p><p><h4>This application refers to the Birth certificate Registration no. ". $letter_data['answer1']." & Registered dated on ". $letter_data['answer2']." for the new born ". $letter_data['answer4']." child on ". $letter_data['answer3']." in ". $letter_data['answer5']." Hospital ". $letter_data['answer6'].".
	
							</h4></p>
							<p><h4>We his/her parents would like to inform you that we have done namakaran of our child as  ". $letter_data['answer7']." for his/her Birth certificate. Hereby, you are requested to update your record with the provided details and issue a new certificate for his / her future records.</h4>	</p>
							<p><h4>	Thanking you</h4></p>
							<p><h4>	Yours Sincerely</h4></p>
							<p><h4>". $user_id_data['username']."</h4></p>

							<p><h4>	Father of child – ". $letter_data['answer9']." </h4></p>
                            <p><h4>	Mother of child – ". $letter_data['answer8']."</h4></p>','Recipients':[{'Email': '".$sent_to_data['email-id']."'}]}");
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