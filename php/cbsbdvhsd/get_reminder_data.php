<?php
include 'connection.php';
$user_id = $_POST['user_id'];
$today = date("d-m-Y");
$result = pg_query($db_connection, "SELECT * FROM tbl_reminder WHERE user_id='$user_id' AND reminder_date>='$today'");

$countrow = pg_num_rows($result);
$det =array();
if($countrow>0){
while($myrow = pg_fetch_assoc($result)){
$title = $myrow['title'];
$reminder_date = $myrow['reminder_date'];
$reminder_time = $myrow['reminder_time'];

$newarray =array();

  $newarray= array(

'title' => "$title",
'date' => "$reminder_date",
'time' => "$reminder_time",
//'message' => "Login Successfull.",
    );
   array_push($det,$newarray);
  $details= array(

'status' => true,
'data' => $det,

    );
 
}
}else{
  $newarray= array(


'message' => "Invalid user id.",
    );
  $details= array(

'status' => false,
'data' => $newarray,
    );
}
echo json_encode($details);
?>