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
							
							<p><h4>The Rationing Officer</h4></p>
							<p><h3>Re: <?php echo $subject_name['subject']; ?></h3></p>
							<p><h4>Dear Sir</h4></p>
							<p><h4>This is for your information that I continued to draw ration from Ration Shop No <?php echo $letter_data['answer1']; ?> situated at
								<?php echo $letter_data['answer2']; ?>. I along with the members of my family have very recently shifted my residence 
								to the above address and accordingly it has posed a great problem for me to continue to draw ration from the 
								said Ration shop because of involvement of long distance from my present residence.
								
							</h4></p>
							<p><h4> The Ration Shop No.<?php echo $letter_data['answer1']; ?> Situated at <?php echo $letter_data['answer2']; ?> is very near to my present residence and it 
								will be convenient to draw ration from there. I am, therefore, enclosing five Ration Cards of myself, my wife 
								and three sons, duly signed and affixing the seal of the Ration Shop No. <?php echo $letter_data['answer1']; ?>as a mark of their consent
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
							<a href="../generate_pdf.php?letter_id=<?php echo $letter_id ?>&template_id=1"><button class="btn btn-primary mt-3">Export PDF</button></a>
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