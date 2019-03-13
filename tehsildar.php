<?php
session_start();
include 'config.php';
if (!isset($_SESSION['admin_id']) || $_SESSION['admin_id'] == '') {
	header("Location: index.php");
die();
}
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
								<h1>स्वचालित पत्र लेखन</h1>
							</div>
						</div>
					</div>
				</section>
				<div class="container">
					<div class="row">
						
						<div class="col">
							<h2 class="mb-3">contact details</h2>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<table class="table table-bordered table-hover" id="contact_tables">
								<?php
								$query = mysqli_query($link, "SELECT * FROM tbl_contacts_details");
								if(mysqli_num_rows($query)==0) {
								echo " <td>No Record found</td>";
								} else {
								echo "<thead>";
													echo  "<tr>";
																echo "<th>Select</th>";
																echo "<th>User Name</th>";
																echo "<th>Mobile Number</th>";
																echo "<th>Address</th>";
																echo "<th>Country</th>";
																echo "<th>State</th>";
																echo "<th>City</th>";
																echo "<th>locality</th>";
																echo "<th>pincode</th>";
																echo "<th>Date Added</th>";
												echo "</tr>";
								echo "</thead>";
								echo "<tbody>";
												$a = 1;
									while ($qry = mysqli_fetch_array($query)) {?>
									<tr class="att">
										<td><input type="checkbox" name="mobile[]" id="checkbox<?php echo $a; ?>" class="css-checkbox" value="<?php echo  $qry['phone']; ?>"/><label for="checkbox<?php echo $a ?>" class="css-label"></label></td>
										<td><?php echo $qry['name'];  ?></td>
										<td><?php echo $qry['phone']; ?></td>
										<td><?php echo $qry['address']; ?></td>
										<?php
										$con=$qry['country'];
										$sta=$qry['state'];
										$cit=$qry['city'];
										$cont_country = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM countries WHERE id = '$con' "));
										$cont_state = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM states WHERE id = '$sta' "));
										$cont_city = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM cities WHERE id = '$cit' ")); ?>
										<td><?php echo $cont_country['name'];  ?></td>
										<td><?php echo $cont_state['name']; ?></td>
										<td><?php echo $cont_city['name']; ?></td>
										<td><?php echo $qry['locality'];  ?></td>
										<td><?php echo $qry['pincode']; ?></td>
										<td><?php echo $qry['date_added']; ?></td>
									</tr>
									<?php
									$a++;
									} }
									?>
								</tbody>
							</table>
						</div>
					</div>
					<button class="btn btn-primary" data-toggle="modal" data-target="#formModal" id="openmodal">Send SMS</button>
					<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" style="display: none;" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title" id="formModalLabel">Message Content</h4>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								</div>
								<div class="modal-body">
									<form id="sms-form" class="mb-4">
										<div>&nbsp; &nbsp; &nbsp;<h1 id="result"></h1></div>
										 <div class="form-group row">
											<label class="col-sm-5 text-left text-sm-right mb-0">Choose from Templates</label>
											<div class="col-sm-7">
												<?php
													$template_date = mysqli_query($link, "SELECT * FROM tbl_sms_templates");
												?>
														<select id="headings" name="headings" class="form-control form-control-sm" required="">
															<option value="">select</option>
															<?php 
															while($head=mysqli_fetch_array($template_date)){ ?>
															<option value="<?php echo $head['id']; ?>" name="<?php echo $head['id']; ?>"><?php echo $head['heading']; ?></option>
														<?php } ?>
														</select>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 text-center text-sm-right mb-0">OR</label>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 text-left text-sm-right mb-0">Type Message</label>
											<div class="col-sm-9">
												<textarea rows="5" class="form-control" placeholder="Type your SMS..." required="" id="content_sms"></textarea>
											</div>
										</div>
									</form>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
									<button type="button" class="btn btn-primary" id="submit_sms">Send</button>
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
		<script src="vendor/datatables/datatables.js"></script>
		<script>
		$(document).ready(function() {
		$("#contact_tables").DataTable( {
		"order": [[ 3, "desc" ]]
		} );
		$('#headings').change(getDropdownLoads);
        function getDropdownLoads() {
        var bid = $(this).val();
        $.post('php/fetch_template_message.php', { id : bid }, populateDropdown, 'html');
        }
        function populateDropdown(data) {
        if (data != 'error') {
        $('#content_sms').html(data);
         }
        }
		var checkBoxes = $('tbody .css-checkbox');
		checkBoxes.change(function () {
		$('#openmodal').prop('disabled', checkBoxes.filter(':checked').length < 1);
		});
		$('tbody .css-checkbox').change();
		});
		$("#submit_sms").click(function() {
		var sms = $("#content_sms").val();
		var number = ($("input[name='mobile[]']:checked").map(function() {
		return this.value;
		}).get().join(', '));
		$.ajax({
		type: "POST",
		url: "php/sendsms.php",
		data: {'submit': "submit",'sms': sms, 'number': number},
		success: function(data) {
		$("#result").append('SMS sent successfully!');
		setTimeout(function(){ location.reload(); }, 5000);
		}
		});
		
		});
		</script>
	</body>
</html>