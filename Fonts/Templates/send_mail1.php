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
curl_setopt($ch, CURLOPT_POSTFIELDS, "{'FromEmail':'harikesh@pinkrickshawdesign.com', 'FromName': 'Automated letter writting', 'Subject':'automated letter', 'Text-part':'','Html-part':'Date:". $letter_data['added_on']."<h2>To,</h2>".$sent_to_data['name'] ."<br/>". $department['name'] ."<br/>" .$sent_to_data['district'] ."<br/>". $sent_to_data['state']."<br/><h1>Subject: ".$template_name['name'] ."</h1><br/><p><h4>Sir/Mam,</h4></p><p><h4>I am writing this letter to you from ".$user_id_data['address']." This letter is in reference to ".$letter_data['answer1']." We are writing to you to explain our problem and seek your guidance in  how we can improve the situation.".$letter_data['answer2']." We believe a possible solution would be ". $letter_data['answer3'] ." If you can enable us to deliver this solution by ". $letter_data['todate'] ." we would be highly obliged.</h4></p><p><h4>" . $letter_data['answer6'] ."</h4>	</p><p><h4>	Thanking you</h4></p><p><h4>".$letter_data['answer6']."<br/>". $user_id_data['username'] ."<br/>".$user_id_data['address'] ."</h4></p>','Recipients':[{'Email': '".$sent_to_data['email-id']."'}]}");
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