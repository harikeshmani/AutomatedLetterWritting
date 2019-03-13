<?php
include 'getdata.php';
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
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="noAnimModalLabel">upload your documents</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">
						<input type="file" name="documents" placeholder="upload your documents">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-light" >Upload</button>
					</div>
				</div>
			</div>
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
								<h1>पूरा पत्र</h1>
							</div>
						</div>
					</div>
				</section>
				
				<div class="container" id="divToPrint">
					<div class="row">
						<div class="col">
							<h4 class="text-right">
							दिनांक:<?php echo $letter_data['added_on']; ?></h4>
							<h4>सेवा मे,</br>
							<?php echo $sent_to_data['name']; ?></br>
							<?php echo $department['name']; ?></br>
							<?php echo $sent_to_data['state']; ?></br></h4>
							<p><h3>विषय: <?php echo $template_name['name']; ?></h3></p>
							<p><h4>महोदय,</h4></p>
							<p><h4>मैं आपको सूचित करना चाहता हूँ की मेरे वित्त वर्ष <?php echo $letter_data['answer1']; ?> के आयकर में त्रुटि है। मेरा आपसे निवेदन है की कृपया मेरे वित्त वर्ष <?php echo $letter_data['answer1']; ?> के आयकर में यथाशीघ्र त्रुटि का निवारण करने का कष्ट करे।
							</h4></p>
							<p><h4>	धन्यवाद </h4></p>
							<p><h4>	आपका विश्वासी </h4></p>
							<p><h4>नाम :- <?php echo $user_id_data['username']; ?> </h4></p>
							<!-- <p><h4><?php/* echo $letter_data['answer6'] */?></br> -->
							
						</div>
					</div>
				</div>
				<div class="container mt-5">
					<div class="row">
						<div class="col">
							<a href="create_pdf10.php?letter_id=<?php echo $letter_id ?>"  target="_blank"><button class="btn btn-primary mt-3">Export PDF</button></a>
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
			<script src="js/upload.js"></script>
			<script src="js/print.js"></script>
			<script type="text/javascript">
			function sendMail() {
			var letter_id    = "<?php echo $letter_id; ?>";
			$.ajax({
			type: 'POST',
			url: 'send_mail10.php',
			data: {'send': "send", 'letter_id': letter_id},
			beforeSend: function(){
			$('.smsbtn').attr("disabled","disabled");
			},
			success: function(data){
			$('.smsbtn').removeAttr('disabled');
			alert(data);
			}
			});
			}
			</script>
			
		</body>
	</html>