<?php
include_once '../config.php';
$letter_id = $_POST['letter_id'];
//$letter_id = '10';
if($letter_id!=='') {
$letter_data = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM tbl_bpl_letter WHERE id = '$letter_id' AND status = 'active'"));
if($letter_data!==''){

$tahsildar_id = $letter_data['tehsildar_id'];
$tahsildar_name = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM tbl_tahsil WHERE id = '$tahsildar_id' AND status = 'active'")); 
$tahsildar_email = $tahsildar_name['tahsildar_email'];
$template_id = $letter_data['template_id'];
$template_name = mysqli_fetch_array(mysqli_query($link, "SELECT name FROM tbl_templates WHERE id = '$template_id' AND status = 'active'"));
//echo $subject_name['subject'];
$department_id = $letter_data['department'];
$department = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM tbl_department WHERE id = '$department_id' AND status = 'active'"));
//echo $department['name'];
$sent_to_data = $letter_data['sent_to'];
$sent_to_data = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM tbl_recipients WHERE id = '$sent_to_data' AND status = 'active'"));
//$number_of_fields = $template_data['numbers'];
$user_id_data = $letter_data['villager_id'];
$sarpanch_id = $letter_data['sarpanch_id'];
$user_id_dataa = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM tbl_villegers WHERE id = '$user_id_data' AND status = 'active'"));
$mobile = $user_id_dataa['mb_no'];
$letter_dataaa = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM tbl_panchayat WHERE id = '$sarpanch_id' AND status = 'active'"));
$sarpanch_mobile = $letter_dataaa['sarpanch_mb_no'];


}
} 
if(isset($_POST['send'])) {

$username = "Priyam";
$pass    = "xscURQIi";

$dest_mobileno   = "+91".$mobile;
$sms = utf8_encode("पत्र सफलतापूर्वक तहसीलदार को भेजा गया ");
$senderid = "PRDAPP";
$curl = curl_init();
curl_setopt_array($curl, array(
CURLOPT_URL => "http://193.105.74.159/api/v3/sendsms/plain",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 30,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "POST",
CURLOPT_POSTFIELDS => "user=$username&password=$pass&sender=$senderid&SMSText=$sms&dataCoding=8&type=longsms&GSM=$dest_mobileno",
CURLOPT_HTTPHEADER => array(
"Cache-Control: no-cache",
"Content-Type: application/x-www-form-urlencoded",
),
));
$response = curl_exec($curl);
$object = json_decode($response);
$err = curl_error($curl);
curl_close($curl);

/////
$username = "Priyam";
$pass    = "xscURQIi";

$dest_mobileno   = "+91".$sarpanch_mobile;
$sms = utf8_encode("पत्र सफलतापूर्वक तहसीलदार को भेजा गया ");
$senderid = "PRDAPP";
$curl = curl_init();
curl_setopt_array($curl, array(
CURLOPT_URL => "http://193.105.74.159/api/v3/sendsms/plain",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 30,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "POST",
CURLOPT_POSTFIELDS => "user=$username&password=$pass&sender=$senderid&SMSText=$sms&dataCoding=8&type=longsms&GSM=$dest_mobileno",
CURLOPT_HTTPHEADER => array(
"Cache-Control: no-cache",
"Content-Type: application/x-www-form-urlencoded",
),
));
$response = curl_exec($curl);
$object = json_decode($response);
$err = curl_error($curl);
curl_close($curl);



$query = "UPDATE tbl_bpl_letter SET tehsildar_status = 'active' WHERE id= '$letter_id' ";
$result = mysqli_query($link, $query);

$public ="ba6c05e1d413b1d13e3e0b74d9e84544";
$private ="03ac1362914088acbffd88004277d8d4";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.mailjet.com/v3/send");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "{'FromEmail':'harikesh@pinkrickshawdesign.com', 'FromName': 'Automated letter writting', 'Subject':'automated letter', 'Text-part':'','Html-part':'Date:". $letter_data['added_on']."</h4></div><h2>सेवा मे,</h2><br /><h3>". $sent_to_data['name'].",</h3><br/><h3>".$department['name'] ."</h3><br/><h3>" .$sent_to_data['district'] ."</h3><br/><h3>". $sent_to_data['state']."</h3><br/><h1>विषय: ".$template_name['name'] ."</h1><br/>
    <p><h4>श्रीमान,</h4></p><p><h4>उपरोक्त विषयान्तर्गत निवेदन है की प्रार्थी एक गरीब कमजोर वर्ग का सदस्य है तथा प्रार्थी मेहनत मजदूरी कर अपना व अपने परिवार का पालन पोषण कर रहा है| तथा प्रार्थी का नाम गरीबी रेखा गरीबी रेखा सूचि में नहीं होने से प्रार्थी शाशन द्वारा दी जा रही योजनाओ का लाभ प्राप्त करने से वंचित हो रहा है तथा प्रार्थी अपना नाम गरीबी रेखा सूचि में जुड़वाना चाहता है| तथा प्रार्थी के परिवार के निम्न सदस्य हैं  :- ". $letter_data['answer3'] ." 2. ". $letter_data['answer4']."  3. ". $letter_data['answer5']." 4. ". $letter_data['answer6']." 5. ". $letter_data['answer7']." 6. ". $letter_data['answer8']." 7. ". $letter_data['answer9']."  8. ". $letter_data['answer10']."  </h4></p>
    <p><h4>अतः श्रीमान जी से निवेदन है की उचित कार्यवाही कर प्रार्थी का नाम गरीबी रेखा की सर्वे सूचि में जोड़ने के आदेश प्रदान करने की कृपा करें तो श्रीमान जी की अति कृपा होगी|</h4></p>
    <p><h4> धन्यवाद </h4></p>
              <p><h4> प्रार्थी </h4></p>
              
              <p><h4>नाम :- ".$letter_data['answer1']."</br>

                पिता का नाम :- ". $letter_data['answer2'] ." </br> 
               जाति :- ". $letter_data['answer11'] ."</br>
                 निवास का पूरा पता :- ". $letter_data['answer12']."</h4></p>','Recipients':[{'Email': '".$tahsildar_email."'}]}");
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
echo "
ईमेल सफलतापूर्वक भेजा गया !";
exit();
}
?>