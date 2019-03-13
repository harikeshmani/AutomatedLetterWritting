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
			<script src="js/upload.js"></script>
			<script src="js/print.js"></script>
			<script type="text/javascript">
		    function sendMail() {
			var letter_id    = "<?php echo $letter_id; ?>";
		    $.ajax({
		    type: 'POST',
		    url: 'send_mail1.php',
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