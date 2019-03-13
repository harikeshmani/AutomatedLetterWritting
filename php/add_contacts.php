<?php

include '../config.php';

$username  = $_POST['username'];
$cc   = $_POST['countryCode'];
$mobile  = $_POST['mobile'];
$address  = $_POST['address'];
$country  = $_POST['country'];
$city  = $_POST['city'];
$state  = $_POST['state'];
$locality  = $_POST['locality'];
$pincode  = $_POST['pincode'];

$result = mysqli_query($link, "INSERT INTO tbl_contacts_details (name, phone, address, country, state, city, locality, pincode, status, group_id ) VALUES ('$username', '+$cc$mobile', '$address', '$country', '$state', '$city', '$locality', '$pincode' , '1', '1')");
if(!$result) {
	echo "error";
}else{
	echo "ok";
  }

?>
