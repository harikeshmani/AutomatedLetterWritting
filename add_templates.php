<?php
session_start();
include 'config.php';
?>
<!DOCTYPE html>
<html class="boxed">
	<head>
		<?php include 'header.php'; ?>
		<link rel="stylesheet" type="text/css" href="vendor/datatables/datatables.css">
	</head>
	<body>
		<div class="body">
			<?php include 'menu.php'; ?>
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
								<h1>Add SMS Templates</h1>
							</div>
						</div>
					</div>
				</section>
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="featured-boxes">
								<div class="row">
									<div class="featured-box featured-box-primary text-left">
										<div class="box-content">
											<h4 class="heading-primary text-uppercase mb-3">New SMS Text</h4>
											<h5><?php echo $error; ?></h5>
											<form action="" id="frmAdd" name="frmAdd" method="post">
												<div class="form-row">
													<div class="form-group col">
														<label>Heading of the sms template</label>
														<input type="text" name="heading" value="" class="form-control form-control-lg">
													</div>
												</div>
												<div class="form-row">
													<div class="form-group col">
														<label>Text of SMS Template </label>
														<textarea rows="7" class="form-control" placeholder="Type your SMS..." id="content_sms" name="content_sms"></textarea>
													</div>
												</div>
													
												<div class="form-row">
													<div class="form-group col-lg-6">
													</div>
													<div class="form-group col-lg-6">
														 <button type="submit" class="btn btn-primary float-right mb-5" name="button_submit">Submit</button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<footer id="footer">
				<?php include 'footer.php'; ?>
			</footer>
		</div>
		<!-- Vendor -->
		<?php include 'footer_files.php'; ?>
		<!-- Theme Initialization Files -->
		<script>
				$("form[name='frmAdd']").validate({
		rules: {
		heading: {
		required: true
		},
		content_sms: {
		required: true
		}
		},
		messages: {
		heading: {
		lettersonly: "headings cannot contain special characters and digits"
		},
		content_sms:  {
		required: "Please enter SMS text"
		},
		email: "Please enter a valid email address"
		},
		submitHandler: addnew
		});
		//alert("enter OTP");
		function addnew() {
		var data = $("#frmAdd").serialize();
		$.ajax({
		data: data,
		type: "POST",
		url: "php/add_sms.php",
		success: function(data){
		if(data == "ok"){
		$("#frmAdd")[0].reset();	
         alert("successfully added new SMS template");
		} else {
		alert("error in inserting new template");	
		}
		}
		});
		}
		</script>
	</body>
</html>