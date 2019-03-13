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
curl_setopt($ch, CURLOPT_POSTFIELDS, "{'FromEmail':'harikesh@pinkrickshawdesign.com', 'FromName': 'Automated letter writting', 'Subject':'automated letter', 'Text-part':'','Html-part':'Date:". $letter_data['added_on']."</h4></div><h2>To,</h2><br /><h3>".$sent_to_data['name'] ."</h3><br/><h3>". $department['name'] ."</h3><br/><h3>" .$sent_to_data['district'] ."</h3><br/><h3>". $sent_to_data['state']."</h3><br/><h1>Subject: ".$template_name['name'] ."</h1><br/>
    <p><h4>DearSir/Madam,</h4></p><p><h4>I am hereby applying for the issue of new ration card form me and my family member. I am providing 
                              Here under the required detail for this purpose.
							</h4></p>
							<p><h4>Category of ration card: ". $letter_data['answer1']." <br /><br /> Name of the applicant: ". $letter_data['answer2']." <br /><br /> Date of birth:  ". $letter_data['dob']."(Proof attached) <br /><br /> Address: ". $letter_data['answer4']." <br /><br /> District: ". $letter_data['answer5']." Block: ". $letter_data['answer6']." ward No: ". $letter_data['answer7']." Pin code: ". $letter_data['answer8']." 
							<br /><br /> Contact No: : ". $letter_data['answer9']." <br /><br /> House (Owned/Rented/Company allotted): : ". $letter_data['answer10']."<br /><br /> Nationality: ". $letter_data['answer11']." <br /><br /> Caste: ". $letter_data['answer12']." <br /><br /> I am enclosing the require documents as mentioned above with along this application. Kindly request to please consider and approve my application and issue a ration card in my name at the earliest possible. I shall be grateful to you for this. <br /><br />Signature: <br /><br />	Place: ". $letter_data['answer5']." <br /><br />	Date: ". $letter_data['added_on']."</h4></p>','Recipients':[{'Email': '".$sent_to_data['email-id']."'}]}");
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