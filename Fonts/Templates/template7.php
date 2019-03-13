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
							<h4 class="text-right">Date:<?php echo $letter_data['added_on']; ?></h4>
							<h4>To,</br>
							<h4><?php echo $sent_to_data['name']; ?></h4>
							<h4><?php echo $department['name']; ?></h4>
							<h4><?php echo $sent_to_data['district']; ?></h4>
							<h4><?php echo $sent_to_data['state']; ?></h4>
							<p><h3>Sub: <?php echo $template_name['name']; ?></h3></p>
							<p><h4>Dear Sir/Madam</h4></p>
							<p><h4>I am hereby applying for the issue of new ration card form me and my family member. I am providing
							Here under the required detail for this purpose.</h4></p>
							<p><h4> Category of ration card: <?php echo $letter_data['answer1']; ?></h4></p>
							<p><h4> Name of the applicant: <?php echo $letter_data['answer2']; ?></h4></p>
							<p><h4> Date of birth:  <?php echo $letter_data['dob']; ?>(Proof attached)</h4></p>
							<p><h4> Address: <?php echo $letter_data['answer4']; ?></h4></p>
							<p><h4>District: -<?php echo $letter_data['answer5']; ?> Block:-<?php echo $letter_data['answer6']; ?> ward No: -<?php echo $letter_data['answer7']; ?>. Pin code: - <?php echo $letter_data['answer8']; ?>.</h4><p>
								<p><h4> Contact No: : <?php echo $letter_data['answer9']; ?></h4></p>
								<p><h4> House (Owned/Rented/Company allotted): : <?php echo $letter_data['answer10']; ?></h4></p>
								<p><h4> Nationality: <?php echo $letter_data['answer11']; ?></h4></p>
								<p><h4> Caste: <?php echo $letter_data['answer12']; ?></h4></p>
								<p><h4>I am enclosing the require documents as mentioned above with along this application. Kindly request to please consider and approve my application and issue a ration card in my name at the earliest possible. I shall be grateful to you for this.
								</h4></p>
								<h4 class="text-right">Signature:</h4>
								<p><h4>	Place: <?php echo $letter_data['answer5']; ?></h4></p>
								<p><h4>	Date: <?php echo $letter_data['added_on']; ?></h4></p>
								
								<!-- <p><h4><?php/* echo $letter_data['answer6'] */?></br> -->
								
							</div>
						</div>
					</div>
					<div class="container mt-5">
						<div class="row">
							<div class="col">
								<a href="create_pdf7.php?letter_id=<?php echo $letter_id ?>"  target="_blank"><button class="btn btn-primary mt-3">Export PDF</button></a>
								<button class="btn btn-primary mt-3" onclick="PrintDiv();">Print</button>
								<button class="btn btn-primary mt-3" data-toggle="modal" data-target="#noAnimModal">Upload Documents</button>
								<button class="btn btn-primary mt-3" onclick="sendMail();">Send Via Email</button>
								
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
				url: 'send_mail7.php',
				data: {'send': "send", 'letter_id': letter_id},
				beforeSend: function(){
				$('.smsbtn').attr("disabled","disabled");
				},
				success: function(data){
				alert(data);
				}
				});
				}
				</script>
				
			</body>
		</html>