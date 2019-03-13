<?php
if(isset($_POST["submit"])) {
$sms = utf8_encode($_POST["sms"]); 

$mobileno = $_POST["number"];
$myArray = explode(',', $mobileno);
foreach ($myArray as $dest_mobileno) {

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "http://107.20.199.106/api/v3/sendsms/plain",
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "user=Priyam&password=xscURQIi&sender=PRDAPP&SMSText=$sms&dataCoding=8&GSM=$dest_mobileno&type=longsms",
));
$response = curl_exec($curl);
$object = json_decode($response);
$err = curl_error($curl);
curl_close($curl); 
// $xml = simplexml_load_string($object);
// $client = (string) $xml->client_id;
// echo $client; // produces 17992 in this case
//107.20.199.106/api/v3/sendsms/plain?user=Priyam&password=xscURQIi&sender=PRDAPP&SMSText=%E0%A4%A8%E0%A4%AE%E0%A4%B8%E0%A5%8D%E0%A4%A4%E0%A5%87%20%E0%A4%86%E0%A4%AA%20%E0%A4%95%E0%A5%88%E0%A4%B8%E0%A5%87%20%E0%A4%B9%E0%A5%88%E0%A4%82?&dataCoding=8&GSM=919990495092&type=longSMS
}
}
?>