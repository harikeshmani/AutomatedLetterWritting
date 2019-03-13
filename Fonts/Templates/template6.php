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
							<?php echo $sent_to_data['name']; ?></br>
							<?php echo $department['name']; ?></br>
							<?php echo $sent_to_data['district']; ?></br>
							<?php echo $sent_to_data['state']; ?></br></h4>
							<p><h3>Re: <?php echo $template_name['name']; ?></h3></p>
							<p><h4>Dear Sir</h4></p>
							<p><h4>This is for your information that I continued to draw ration from Ration Shop No <?php echo $letter_data['answer1']; ?> situated at
								<?php echo $letter_data['answer2']; ?>. I along with the members of my family have very recently shifted my residence
								to the above address and accordingly it has posed a great problem for me to continue to draw ration from the
								said Ration shop because of involvement of long distance from my present residence.
								
							</h4></p>
							<p><h4> The Ration Shop No.<?php echo $letter_data['answer1']; ?> Situated at <?php echo $letter_data['answer2']; ?> is very near to my present residence and it
								will be convenient to draw ration from there. I am, therefore, enclosing five Ration Cards of myself, my wife
								and three sons, duly signed and affixing the seal of the Ration Shop No. <?php echo $letter_data['answer1']; ?> as a mark of their consent
								for drawing ration by us from them, with the request to issue fresh ration cards effecting the change of my
								residence and the Ration Shop.
								
							</h4></p>
							
							<p><h4>	Thanking you</h4></p>
							<p><h4>	Yours Faithfully</h4></p>
							<p><h4>	<?php echo $user_id_data['username']; ?></h4></p>
							<!-- <p><h4><?php/* echo $letter_data['answer6'] */?></br> -->
							
						</div>
					</div>
				</div>
				<div class="container mt-5">
					<div class="row">
						<div class="col">
							<a href="create_pdf6.php?letter_id=<?php echo $letter_id ?>"  target="_blank"><button class="btn btn-primary mt-3">Export PDF</button></a>
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
			url: 'send_mail6.php',
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