<?php
session_start();
include_once '../config.php';
$letter_id = $_GET['letter_id'];
//$letter_id = '10';
if($letter_id!=='') {
$letter_data = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM tbl_all_letters WHERE id = '$letter_id' AND status = 'active'"));
if($letter_data!==''){
$subject_id = $letter_data['subject'];
$subject_name = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM tbl_subjects WHERE id = '$subject_id' AND status = 'active'"));
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
								<h1>Complete Letter</h1>
							</div>
						</div>
					</div>
				</section>
				
				<div class="container" id="divToPrint">
					<div class="row">
						<div class="col">
							<h4 class="text-right">Date:<?php echo $letter_data['added_on']; ?></h4>
							<h4>To</br>
							
							<p><h4>Municipal corporation </h4></p>
							<!-- <p><h4>Address: -  </h4></p> -->

							<p><h3>Sub: <?php echo $subject_name['subject']; ?></h3></p>
							<p><h4>Dear Sir/Madam</h4></p>
							<p><h4>This application refers to the Birth certificate Registration no. MCD<?php echo $letter_data['answer1']; ?> & Registered dated on <?php echo $letter_data['answer2']; ?> for the new born <?php echo $letter_data['answer3']; ?> child on DD/MM/YYYY in <?php echo $letter_data['answer4']; ?>Hospital <?php echo $letter_data['answer5']; ?>.
								
							</h4></p>
							<p><h4> We (his / her parents) would like to inform you that we have done namakaran of our child as "<?php echo $letter_data['answer6']; ?>"for his / her Birth certificate. Hereby, you are requested to update your record with the provided details and issue a new certificate for his / her future records.
							</h4></p>
							
							<p><h4>	Thanking you</h4></p>
							<p><h4>	Yours Sincerely</h4></p>
							<p><h4>	(Your Name)</h4></p>

							<p><h4>	Father of child – <?php echo $letter_data['answer7']; ?> </h4></p>
                            <p><h4>	Mother of child – <?php echo $letter_data['answer8']; ?></h4></p>
							<!-- <p><h4><?php/* echo $letter_data['answer6'] */?></br> -->
							
						</div>
					</div>
				</div>
				<div class="container mt-5">
					<div class="row">
						<div class="col">
							<a href="../generate_pdf.php?letter_id=<?php// echo $letter_id ?>&template_id=1"><button class="btn btn-primary mt-3">Export PDF</button></a>
							<button class="btn btn-primary mt-3" onclick="PrintDiv();">Print</button>
							<button class="btn btn-primary mt-3" data-toggle="modal" data-target="#noAnimModal">Upload Documents</button>
							<button class="btn btn-primary mt-3">Send Via Email</button>
							
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
		    // $('.print').click(function() {
		    // $.ajax({
		    // type: "POST",
		    // url: "generate_pdf.php",
		    // data: { submit: "pdf", template_id: template_id, letter_id: letter_id }
		    //  }).done(function( msg ) {
		    // alert( "PDF saved" );
		    // });
		    // });
		</script>
		
	</body>
</html>