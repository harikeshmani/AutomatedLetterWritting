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
							<h4>The Civil Supplier Officer,</h4>

							<p><h4>Civil Supplies Department,</h4></p>
							<p><h4>Address: - <?php echo $user_id_data['address']; ?></h4></p>
							<p><h3>Sub: <?php echo $subject_name['subject']; ?></h3></p>
							<p><h4>Dear Sir/Madam</h4></p>
							<p><h4>I am hereby applying for the issue of new ration card form me and my family member. I am providing 
                              Hereunder the required detail for this purpose.</h4></p>
							<p><h4> Category of ration card: <?php echo $letter_data['answer1']; ?>(APL/BPL)</h4></p>
							<p><h4> Name of the applicant: <?php echo $letter_data['answer2']; ?>(Head of the Family)</h4></p>
							<p><h4> Date of birth:  <?php echo $letter_data['answer3']; ?>(Proof attached)</h4></p>
							<p><h4> Address: <?php echo $letter_data['answer4']; ?></h4></p>
							<p><h4>District: -<?php echo $letter_data['answer5']; ?> Block:-<?php echo $letter_data['answer6']; ?> ward No: -<?php echo $letter_data['answer7']; ?>. Pin code: - <?php echo $letter_data['answer8']; ?>.</h4><p>
                             <p><h4> Contact No: : <?php echo $letter_data['answer9']; ?></h4></p>
                             <p><h4> House (Owned/Rented/Company allotted): : <?php echo $letter_data['answer10']; ?></h4></p>
                             <p><h4> Nationality: <?php echo $letter_data['answer11']; ?></h4></p>
                             <p><h4> Caste: <?php echo $letter_data['answer12']; ?></h4></p>
                             <p><h4>I am enclosing the require documents as mentioned above with along this application. Kindly request to please consider and approve my application and issue a ration card in my name at the earliest possible. I shall be grateful to you for this.
</h4></p>
                            <h4 class="text-right">Signature:</h4>
							<p><h4>	Place: <?php echo $letter_data['added_on']; ?></h4></p>
							<p><h4>	Date: <?php echo $letter_data['answer5']; ?></h4></p>
							
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