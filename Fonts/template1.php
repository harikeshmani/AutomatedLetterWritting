<?php
//date_default_timezone_set('Asia/Kolkata');
session_start();
include_once '../config.php';
$letter_id = $_GET['letter_id'];
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
require 'class/class.phpmailer.php';
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPKeepAlive = true;   
$mail->Mailer = “smtp”; // don't change the quotes!
$mail->SMTPDebug = 2;
$mail->Debugoutput = 'html';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "harikesh@pinktechdesign.com";
$mail->Password = "chintoo@1234";
$mail->setFrom('harikesh@pinktechdesign.com', 'harikesh singh');
//$mail->addReplyTo('replyto@example.com', 'First Last');
$mail->addAddress('harikesh@pinkrickshawdesign.com', 'John Doe');
$mail->Subject = '';
$mail->Body = 'hello'; // HTML -> PHP! 
$mail->AltBody = 'This is a plain-text message body';
//$mail->addAttachment('images/phpmailer_mini.png');
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
exit();
}
?>
<!DOCTYPE html>
<html class="boxed">
	<head>
		<?php include '../header.php'; ?>
	</head>
	<body>
		<!----modal---->
		<!----modal for uploading documents--->
		<div class="modal" id="noAnimModal" tabindex="-1" role="dialog" aria-labelledby="" style="display: none;" aria-hidden="true">
			<form enctype="multipart/form-data" id="docs" >
				<input type="hidden" name="letter_id" value="<?php echo $letter_id; ?>">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title" id="noAnimModalLabel">upload your documents</h4>
							<p class="statusMsg"></p>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						</div>
						<div class="modal-body">
							<input type="file" name="file" placeholder="upload your documents">
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-light submitBtn" >Upload</button>
						</div>
					</div>
				</div>
			</form>
		</div>
		<!---->
		<!--modal for sending email-->
		<!---->
		<!---modal ----->
		<div class="body">
			<div role="main" class="main">
				<!--all page code goes here-->
				<section class="page-header">
					<div class="container">
						<div class="row">
							<div class="col">
							</div>
						</div>
						<div class="row">
							<div class="col">
								<h1>Complete Letter</h1>
							</div>
						</div>
					</div>
				</section>
				
				<div class="container" id="divToPrint">
					<div class="row">
						<div class="col">
<!-- 						 <form enctype="multipart/form-data" id="form1" >
						 	<input type="hidden" name="text" value="hello"> -->
							<h4 class="text-right">Date:<?php echo $letter_data['added_on']; ?></h4>
							<h4>To,</br>
							<?php echo $sent_to_data['name']; ?></br>
							<?php echo $department['name']; ?></br>
							<?php echo $sent_to_data['district']; ?></br>
							<?php echo $sent_to_data['state']; ?></br></h4>
							<p><h3>Subject: <?php echo $template_name['name']; ?></h3></p>
							<p><h4>Sir/Mam</h4></p>
							<p><h4>I am writing this letter to you from <?php echo $user_id_data['address']; ?>
								This letter is in reference to <?php echo $letter_data['answer1']; ?> 
								We are writing to you to explain our problem and seek your guidance in  how we can improve the situation.<?php echo $letter_data['answer2']; ?>
								 We believe a possible solution would be <?php echo $letter_data['answer3']; ?> 
								If you can enable us to deliver this solution by <?php echo  $letter_data['todate']?> we would be highly obliged.
							</h4></p>
							<p><h4><?php echo $letter_data['answer6']?></h4>	</p>
							<p><h4>	Thanking you</h4></p>
							<p><h4><?php echo $letter_data['answer6']?></br>
							<?php echo $user_id_data['username']; ?></br><?php echo $user_id_data['address']; ?></h4></p>
<!-- 						</form> -->
						</div>
					</div>
				</div>
				<div class="container mt-5">
					<div class="row">
						<div class="col">
	                       <a href="create_pdf1.php?letter_id=<?php echo $letter_id ?>"  target="_blank"><button class="btn btn-primary mt-3">Export PDF</button></a>
							<button class="btn btn-primary mt-3" onclick="PrintDiv();">Print</button>
							<button class="btn btn-primary mt-3" data-toggle="modal" data-target="#noAnimModal">Upload Documents</button>
							<button class="btn btn-primary mt-3 smsbtn" onclick="sendMail();">Send Via Email</button>
							
						</div>
					</div>
				</div>
				<footer id="footer">
					<?php include '../footer.php'; ?>
				</footer>
			</div>
			<!-- Vendor -->
			<?php include '../footer_files.php'; ?>
			<!-- Theme Initialization Files -->
			<script type="text/javascript">
			var template_id = '1';
			var letter_id    = '10';
			function PrintDiv() {
			var divToPrint = document.getElementById('divToPrint');
			var popupWin = window.open('', '_blank');
			popupWin.document.open();
		popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
		popupWin.document.close();
		}
		function sendMail() {
		$.ajax({
		type: 'POST',
		url: '',
		data: {'send': "send"},
		beforeSend: function(){
		$('.smsbtn').attr("disabled","disabled");
		},
		success: function(data){
         alert(data);
		}
		});
		}
		// $('.print').click(function() {
		// $.ajax({
		// type: "POST",
		// url: "create_pdf.php",
		// contentType: false,
		// cache: false,
		// processData:false,
		// data: new FormData($('#form1')[0])
		//  }).done(function( msg ) {
		//   window.open('create_pdf.php','_blank');

		// });
		// });
		$("#docs").on('submit', function(e){
		e.preventDefault();
		$.ajax({
		type: 'POST',
		url: 'upload.php',
		data: new FormData(this),
		contentType: false,
		cache: false,
		processData:false,
		beforeSend: function(){
		$('.submitBtn').attr("disabled","disabled");
		$('#docs').css("opacity",".5");
		},
		success: function(msg){
		$('.statusMsg').html('');
		if(msg == 'ok'){
		$('#docs')[0].reset();
		$('.statusMsg').html('<span style="font-size:18px;color:#34A853">Documents uploaded successfully.</span>');
		}else{
		$('.statusMsg').html('<span style="font-size:18px;color:#EA4335">Some problem occurred, please try again.</span>');
		}
		$('#docs').css("opacity","");
		$(".submitBtn").removeAttr("disabled");
		}
		});
		});
		</script>
		
	</body>
</html>