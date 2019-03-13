<?php
//error_reporting(0);
include 'connection.php';
$user_id = $_POST['user_id'];
$title = $_POST['title'];
$description = $_POST['description'];
$notify_email = $_POST['notify_email'];
$notify_mirror = $_POST['notify_mirror'];
$reminder_date = $_POST['reminder_date'];
$reminder_time = $_POST['reminder_time'];
$newarray =array();
$result = pg_query($db_connection, "INSERT INTO tbl_reminder (title, description, reminder_date, reminder_time, notify_email, notify_mirror, user_id) 
	VALUES ('$title', '$description', '$reminder_date', '$reminder_time', '$notify_email', '$notify_mirror', '$user_id' )  ");


if($result){
  $newarray= array(


'message' => "Successfull.",
    );
  $details= array(

'status' => true,
'data' => $newarray,

    );
  
}else{
  $newarray= array(
'message' => "error.",
    );
  
  $details= array(
'status' => false,
'data' => $newarray,
    );
}
echo json_encode($details);
?>