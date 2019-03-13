<?php

include '../config.php';

$head  = $_POST['heading'];
$sms   = $_POST['content_sms'];


$result = mysqli_query($link, "INSERT INTO tbl_sms_templates (heading, sms_text) VALUES ('$head', '$sms')");
if(!$result) {
	echo "error";
}else{
	echo "ok";
  }

?>
