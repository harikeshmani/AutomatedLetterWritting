<?php 

include '../config.php';

$id = $_POST['id'];

$msg_text = mysqli_fetch_array(mysqli_query($link, "SELECT sms_text FROM tbl_sms_templates WHERE id ='$id'"));
if($msg_text) {
echo $msg_text['sms_text'];
} else {
echo 'error';	
}  
?>