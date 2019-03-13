<?php
include 'config.php';
$letter_id = $_POST['letter_id'];
$marks = $_POST['total_marks'];
$result = mysqli_query($link, "UPDATE tbl_bpl_letter SET marks = $marks WHERE id = $letter_id");
if(!$result) {
	echo "error";
} else {
?>
<!DOCTYPE html>
<html class="boxed">
	<head>
		<?php include 'header.php'; ?>
		<style type="text/css">
		.form-group p {
		color: #222;
		font-size: 16px;
		}
		.form-group h2 {
		margin-bottom: 0px;
		}
		input[type="radio"] {
		margin-right: 6px;
		}
		.mukhiya.gramin {
		border-bottom: 1px #d0d0d0 solid;
		margin-top: 20px;
		}
		.mukhiya.bhag {
		margin-top: 24px;
		}
		input[type=checkbox][disabled]{
		height: 36px;
		width: 36px;
		color: #0000FF;
		}
		</style>
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
								<h1>बी . पी . एल. सर्वेक्षण फॉर्म </h1>
							</div>
						</div>
					</div>
				</section>
				<div id="printMe">
					
					<div class="container">
						<div class="row">
							<div class="col">
								<h2 class="text-center text-6 mb-0">प्रपत्र-1</h2>
								<h1 class="text-center mb-0">बी. पी. एल. सर्वेक्षण 2003 हेतु सर्वे शेड्यूल</h1>
								<h2 class="text-center text-6 mb-0">( प्रत्येक परिवार के लिए पृथक-पृथक भरा जायेगा ) </h2>
							</div>
						</div>
					</div>
					<div class="mukhiya">
						<div class="container">
							<div class="row">
								<div class="col-sm-8 col-md-8">
									<div class="form-group">
										<label for="email">परिवार के मुखिया का नाम </label>
										<input type="text" class="form-control" id="" value="<?php echo $_POST['mukhya_name'];?>" name="mukhya_name" disabled>
									</div>
								</div>
								<div class="col-sm-4 col-md-4">
									<div class="form-group">
										<label for="email">कुल प्राप्तांक  </label>
										<input type="text" class="form-control" id="" name="total_marks" value="<?php echo $_POST['total_marks'];?>" disabled>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="mukhiya">
						<div class="container">
							<div class="row">
								<div class="col-sm-12 col-md-12">
									<div class="form-group">
										<label for="email">मकान क्रमांक एवं नाम (यदि कोई हो तो)</label>
										<input type="text" class="form-control" id="" value="<?php echo $_POST['makan_no'];?>" name="makan_no" disabled>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="mukhiya">
						<div class="container">
							<div class="row">
								<div class="col-sm-6 col-md-6">
									<div class="form-group">
										<label for="email">ग्राम का नाम </label>
										<input type="text" class="form-control" id="" name="village_name" value="<?php echo $_POST['village_name'];?>" disabled>
									</div>
								</div>
								<div class="col-sm-3 col-md-3">
									<div class="form-group">
										<label for="email">कोड नंबर </label>
										<input type="text" class="form-control" id="" name="vill_code" value="<?php echo $_POST['vill_code'];?>" disabled>
									</div>
								</div>
								<div class="col-sm-3 col-md-3">
									<div class="form-group">
										<label for="email">श्रेणी </label>
										<input type="text" class="form-control" id="" name="vill_shreni" value="<?php echo $_POST['vill_shreni'];?>" disabled>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="mukhiya">
						<div class="container">
							<div class="row">
								<div class="col-sm-6 col-md-6">
									<div class="form-group">
										<label for="email">ग्राम पंचायत का नाम </label>
										<input type="text" class="form-control" id="" name="panchayat_name" value="<?php echo $_POST['panchayat_name'];?>" disabled>
									</div>
								</div>
								<div class="col-sm-6 col-md-6">
									<div class="form-group">
										<label for="email">कोड नंबर </label>
										<input type="text" class="form-control" id="" name="panchayat_code" value="<?php echo $_POST['panchayat_code'];?>" disabled>
									</div>
								</div>
								
							</div>
						</div>
					</div>
					<div class="mukhiya">
						<div class="container">
							<div class="row">
								<div class="col-sm-6 col-md-6">
									<div class="form-group">
										<label for="email">विकास खंड का नाम </label>
										<input type="text" class="form-control" id="" name="vikas_khand" value="<?php echo $_POST['vikas_khand'];?>" disabled>
									</div>
								</div>
								<div class="col-sm-6 col-md-6">
									<div class="form-group">
										<label for="email">कोड नंबर </label>
										<input type="text" class="form-control" id="" name="vikas_code" value="<?php echo $_POST['vikas_code'];?>" disabled>
									</div>
								</div>
								
							</div>
						</div>
					</div>
					<div class="mukhiya">
						<div class="container">
							<div class="row">
								<div class="col-sm-6 col-md-6">
									<div class="form-group">
										<label for="email">जिले का नाम </label>
										<input type="text" class="form-control" id="" name="zila" value="<?php echo $_POST['zila'];?>" disabled>
									</div>
								</div>
								<div class="col-sm-6 col-md-6">
									<div class="form-group">
										<label for="email">कोड नंबर </label>
										<input type="text" class="form-control" id="" name="zila_code" value="<?php echo $_POST['zila_code'];?>" disabled>
									</div>
								</div>
								
							</div>
						</div>
					</div>
					<div class="mukhiya bhag">
						<div class="container">
							<div class="row">
								<div class="col-sm-5 col-md-5">
									<div class="form-group">
										<h2>भाग (क) </h2>
									</div>
								</div>
								<div class="col-sm-7 col-md-7">
									<div class="form-group">
										<h2>परिवार की जानकारी </h2>
									</div>
								</div>
								
							</div>
						</div>
					</div>
					<div class="mukhiya">
						<div class="container">
							<div class="row">
								<div class="col-sm-12 col-md-12">
									<div class="form-group">
										<p>(अ)  शिक्षा का स्तर </p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="mukhiya">
						<div class="container">
							<div class="row">
								<div class="col-sm-12 col-md-12">
									<table class="table table-bordered">
										<thead>
											<tr>
												<th scope="col">सरल क्र. </th>
												<th scope="col">नाम </th>
												<th scope="col">आयु (वर्षो में)</th>
												<th scope="col">लिंग (पुरुष / स्त्री)</th>
												<th scope="col">मुखिया से सम्बन्ध </th>
												<th scope="col">शैक्षणिक स्तर * (कृपया कोड दे $)</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<th scope="row">1</th>
												<td><input type="text" name="member1" value="<?php echo $_POST['member1']; ?>" class="form-control-md" disabled></td>
												<td><input type="number" name="age1" class="form-control-md" value="<?php echo $_POST['age1']; ?>" disabled></td>
												<td>
													<input name="gender1" class="form-control-md" value="<?php echo $_POST['gender1']; ?>" disabled>
												</td>
												<td><input type="text" name="rel1" value="<?php echo $_POST['rel1']; ?>" disabled ></td>
												<td>
													<input type="text" name="edu1" value="<?php echo $_POST['edu1']; ?>" disabled >
												</td>
											</tr>
											<tr>
												<th scope="row">2</th>
												<td><input type="text" name="member2" value="<?php echo $_POST['member2']; ?>" class="form-control-md" disabled></td>
												<td><input type="number" name="age2" class="form-control-md" value="<?php echo $_POST['age2']; ?>" disabled></td>
												<td>
													<input name="gender2" class="form-control-md" value="<?php echo $_POST['gender2']; ?>" disabled>
												</td>
												<td><input type="text" name="rel2" value="<?php echo $_POST['rel2']; ?>" disabled ></td>
												<td>
													<input type="text" name="edu2" value="<?php echo $_POST['edu2']; ?>" disabled >
												</td>
											</tr>
											<tr>
												<th scope="row">3</th>
												<td><input type="text" name="member3" value="<?php echo $_POST['member3']; ?>" class="form-control-md" disabled></td>
												<td><input type="number" name="age3" class="form-control-md" value="<?php echo $_POST['age3']; ?>" disabled></td>
												<td>
													<input name="gender3" class="form-control-md" value="<?php echo $_POST['gender3']; ?>" disabled>
												</td>
												<td><input type="text" name="rel3" value="<?php echo $_POST['rel3']; ?>" disabled ></td>
												<td>
													<input type="text" name="edu3" value="<?php echo $_POST['edu3']; ?>" disabled >
												</td>
											</tr>
											<tr>
												<th scope="row">4</th>
												<td><input type="text" name="member4" value="<?php echo $_POST['member4']; ?>" class="form-control-md" disabled></td>
												<td><input type="number" name="age4" class="form-control-md" value="<?php echo $_POST['age4']; ?>" disabled></td>
												<td>
													<input name="gender4" class="form-control-md" value="<?php echo $_POST['gender4']; ?>" disabled>
												</td>
												<td><input type="text" name="rel4" value="<?php echo $_POST['rel4']; ?>" disabled ></td>
												<td>
													<input type="text" name="edu4" value="<?php echo $_POST['edu4']; ?>" disabled >
												</td>
											</tr>
											<tr>
												<th scope="row">5</th>
												<td><input type="text" name="member5" value="<?php echo $_POST['member5']; ?>" class="form-control-md" disabled></td>
												<td><input type="number" name="age5" class="form-control-md" value="<?php echo $_POST['age5']; ?>" disabled></td>
												<td>
													<input name="gender5" class="form-control-md" value="<?php echo $_POST['gender5']; ?>" disabled>
												</td>
												<td><input type="text" name="rel5" value="<?php echo $_POST['rel5']; ?>" disabled ></td>
												<td>
													<input type="text" name="edu5" value="<?php echo $_POST['edu5']; ?>" disabled >
												</td>
											</tr>
											<tr>
												<th scope="row">6</th>
												<td><input type="text" name="member6" value="<?php echo $_POST['member6']; ?>" class="form-control-md" disabled></td>
												<td><input type="number" name="age6" class="form-control-md" value="<?php echo $_POST['age6']; ?>" disabled></td>
												<td>
													<input name="gender6" class="form-control-md" value="<?php echo $_POST['gender6']; ?>" disabled>
												</td>
												<td><input type="text" name="rel6" value="<?php echo $_POST['rel6']; ?>" disabled ></td>
												<td>
													<input type="text" name="edu6" value="<?php echo $_POST['edu6']; ?>" disabled >
												</td>
											</tr>
											<tr>
												<th scope="row">7</th>
												<td><input type="text" name="member7" value="<?php echo $_POST['member7']; ?>" class="form-control-md" disabled></td>
												<td><input type="number" name="age7" class="form-control-md" value="<?php echo $_POST['age7']; ?>" disabled></td>
												<td>
													<input name="gender7" class="form-control-md" value="<?php echo $_POST['gender7']; ?>" disabled>
												</td>
												<td><input type="text" name="rel7" value="<?php echo $_POST['rel7']; ?>" disabled ></td>
												<td>
													<input type="text" name="edu7" value="<?php echo $_POST['edu7']; ?>" disabled >
												</td>
											</tr>
											<tr>
												<th scope="row">8</th>
												<td><input type="text" name="member8" value="<?php echo $_POST['member8']; ?>" class="form-control-md" disabled></td>
												<td><input type="number" name="age8" class="form-control-md" value="<?php echo $_POST['age8']; ?>" disabled></td>
												<td>
													<input name="gender8" class="form-control-md" value="<?php echo $_POST['gender8']; ?>" disabled>
												</td>
												<td><input type="text" name="rel8" value="<?php echo $_POST['rel8']; ?>" disabled ></td>
												<td>
													<input type="text" name="edu8" value="<?php echo $_POST['edu8']; ?>" disabled >
												</td>
											</tr>
											<tr>
												<th scope="row">9</th>
												<td><input type="text" name="member9" value="<?php echo $_POST['member9']; ?>" class="form-control-md" disabled></td>
												<td><input type="number" name="age9" class="form-control-md" value="<?php echo $_POST['age9']; ?>" disabled></td>
												<td>
													<input name="gender9" class="form-control-md" value="<?php echo $_POST['gender9']; ?>" disabled>
												</td>
												<td><input type="text" name="rel9" value="<?php echo $_POST['rel9']; ?>" disabled ></td>
												<td>
													<input type="text" name="edu9" value="<?php echo $_POST['edu9']; ?>" disabled >
												</td>
											</tr>
											<tr>
												<th scope="row">10</th>
												<td><input type="text" name="member10" value="<?php echo $_POST['member10']; ?>" class="form-control-md" disabled></td>
												<td><input type="number" name="age10" class="form-control-md" value="<?php echo $_POST['age10']; ?>" disabled></td>
												<td>
													<input name="gender10" class="form-control-md" value="<?php echo $_POST['gender10']; ?>" disabled>
												</td>
												<td><input type="text" name="rel10" value="<?php echo $_POST['rel10']; ?>" disabled ></td>
												<td>
													<input type="text" name="edu10" value="<?php echo $_POST['edu10']; ?>" disabled >
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="mukhiya">
						<div class="container">
							<div class="row">
								<div class="col-sm-4 col-md-4">
									<div class="form-group">
										<p>अशिक्षित/पांचवी से कम पास - 1</p>
										<p>दसवीं पास - 4</p>
									</div>
								</div>
								<div class="col-sm-4 col-md-4">
									<div class="form-group">
										<p>पांचवी पास - 2</p>
										<p>बारहवीं पास - 5</p>
									</div>
								</div>
								<div class="col-sm-4 col-md-4">
									<div class="form-group">
										<p>आंठवी पास - 2</p>
										<p>स्नातक व अन्य - 6</p>
									</div>
								</div>
								
							</div>
						</div>
					</div>
					<div class="mukhiya">
						<div class="container">
							<div class="row">
								<div class="col-sm-12 col-md-12">
									<div class="form-group">
										<p>( ब )  परिवार की औसत मासिक आय ( रुपये में )* (सर्वाधिक उपयुक्त किसी एक कॉलम को टिक करे )</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="mukhiya">
						<div class="container">
							<div class="row">
								<div class="col-sm-12 col-md-12">
									<table class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>250 से कम </th>
												<th>250 - 499</th>
												<th>500 - 1499</th>
												<th>1500 - 2500</th>
												<th>2500 से अधिक </th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													<div class="radio">
														<label>
															<input type="checkbox" name="optradio1" value="1" <?php if ($_POST['optradio1'] == '1') { print 'CHECKED'; } ?>/ disabled>
														</label>
													</div>
												</td>
												<td>
													<div class="radio">
														<label>
															<input type="checkbox" name="optradio1" value="2" <?php if ($_POST['optradio1'] == '2') { print 'CHECKED'; } ?>/ disabled>
														</label>
													</div>
												</td>
												<td>
													<div class="radio">
														<label>
															<input type="checkbox" name="optradio1" value="3" <?php if ($_POST['optradio1'] == '3') { print 'CHECKED'; } ?>/ disabled>
														</label>
													</div>
												</td>
												<td>
													<div class="radio">
														<label>
															<input type="checkbox" name="optradio1" value="4" <?php if ($_POST['optradio1'] == '4') { print 'CHECKED'; } ?>/ disabled>
														</label>
													</div>
												</td>
												<td>
													<div class="radio">
														<label>
															<input type="checkbox" name="optradio1" value="5" <?php if ($_POST['optradio1'] == '5') { print 'CHECKED'; } ?>/ disabled>
														</label>
													</div>
												</td>
											</tr>
											
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="mukhiya">
						<div class="container">
							<div class="row">
								<div class="col-sm-12 col-md-12">
									<div class="form-group">
										<p>( स )  धारित भूमि की हैसियत * (सर्वाधिक उपयुक्त किसी एक कॉलम को टिक करे )</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="mukhiya">
						<div class="container">
							<div class="row">
								<div class="col-sm-12 col-md-12">
									<table class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>स्वामी </th>
												<th>किरायेदार</th>
												<th>स्वामी एवं किरायेदार दोने</th>
												<th>इनमे से कुछ भी नहीं</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													<div class="radio">
														<label>
															<input type="checkbox" name="optradio2" value="1" <?php if ($_POST['optradio2'] == '1') { print 'CHECKED'; } ?>/ disabled>
														</label>
													</div>
												</td>
												<td>
													<div class="radio">
														<label>
															<input type="checkbox" name="optradio2" value="2" <?php if ($_POST['optradio2'] == '2') { print 'CHECKED'; } ?>/ disabled>
														</label>
													</div>
												</td>
												<td>
													<div class="radio">
														<label>
															<input type="checkbox" name="optradio2" value="3" <?php if ($_POST['optradio2'] == '3') { print 'CHECKED'; } ?>/ disabled>
														</label>
													</div>
												</td>
												<td>
													<div class="radio">
														<label>
															<input type="checkbox" name="optradio2" value="4" <?php if ($_POST['optradio2'] == '4') { print 'CHECKED'; } ?>/ disabled>
														</label>
													</div>
												</td>
											</tr>
											
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="mukhiya">
						<div class="container">
							<div class="row">
								<div class="col-sm-12 col-md-12">
									<div class="form-group">
										<p>( द ) इंदिरा आवास योजनान्तर्गत आवास निर्माण हेतु क्या भू-खंड उपलब्ध है? * (सर्वाधिक उपयुक्त किसी एक कॉलम को टिक करे )</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="mukhiya">
						<div class="container">
							<div class="row">
								<div class="col-sm-12 col-md-12">
									<table class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>हाँ  </th>
												<th>नहीं </th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													<div class="radio">
														<label>
															<input type="checkbox" name="optradio3" value="1" <?php if ($_POST['optradio3'] == '1') { print 'CHECKED'; } ?>/ disabled>
														</label>
													</div>
												</td>
												<td>
													<div class="radio">
														<label>
															<input type="checkbox" name="optradio3" value="2" <?php if ($_POST['optradio3'] == '2') { print 'CHECKED'; } ?>/ disabled>
														</label>
													</div>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="mukhiya">
						<div class="container">
							<div class="row">
								<div class="col-sm-12 col-md-12">
									<div class="form-group">
										<p>( इ ) पेयजल सुविधा  * (सर्वाधिक उपयुक्त किसी एक कॉलम को टिक करे )</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="mukhiya">
						<div class="container">
							<div class="row">
								<div class="col-sm-12 col-md-12">
									<table class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>1.6 कि.मी. के भीतर कोई सुविधा नहीं   </th>
												<th>1 - 1.59 कि.मी. के भीतर कोई सुविधा नहीं   </th>
												<th>0.50 - 0.99 कि.मी. के भीतर कोई सुविधा नहीं   </th>
												<th> आधा कि.मी. से कम दूरी पर उपलब्ध पेयजल सुविधा  </th>
												<th>पेयजल सुविधा मकान में ही उपलब्ध  </th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													<div class="radio">
														<label>
															<input type="checkbox" name="optradio4" value="1" <?php if ($_POST['optradio4'] == '1') { print 'CHECKED'; } ?>/ disabled>
														</label>
													</div>
												</td>
												<td>
													<div class="radio">
														<label>
															<input type="checkbox" name="optradio4" value="2" <?php if ($_POST['optradio4'] == '2') { print 'CHECKED'; } ?>/ disabled>
														</label>
													</div>
												</td>
												<td>
													<div class="radio">
														<label>
															<input type="checkbox" name="optradio4" value="3" <?php if ($_POST['optradio4'] == '3') { print 'CHECKED'; } ?>/ disabled>
														</label>
													</div>
												</td>
												<td>
													<div class="radio">
														<label>
															<input type="checkbox" name="optradio4" value="4" <?php if ($_POST['optradio4'] == '4') { print 'CHECKED'; } ?>/ disabled>
														</label>
													</div>
												</td>
												<td>
													<div class="radio">
														<label>
															<input type="checkbox" name="optradio4" value="5" <?php if ($_POST['optradio4'] == '5') { print 'CHECKED'; } ?>/ disabled>
															
														</label>
													</div>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="mukhiya">
						<div class="container">
							<div class="row">
								<div class="col-sm-12 col-md-12">
									<div class="form-group">
										<p>( ई ) परिवार का सामाजिक वर्ग   * (सर्वाधिक उपयुक्त किसी एक कॉलम को टिक करे )</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="mukhiya">
						<div class="container">
							<div class="row">
								<div class="col-sm-12 col-md-12">
									<table class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>अनुसूचित जन जाति   </th>
												<th>अनुसूचित जाति </th>
												<th>अन्य पिछड़ा वर्ग</th>
												<th>अन्य  </th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													<div class="radio">
														<label>
															<input type="checkbox" name="optradio5" value="1" <?php if ($_POST['optradio5'] == '1') { print 'CHECKED'; } ?>/ disabled>
														</label>
													</div>
												</td>
												<td>
													<div class="radio">
														<label>
															<input type="checkbox" name="optradio5" value="2" <?php if ($_POST['optradio5'] == '2') { print 'CHECKED'; } ?>/ disabled>
														</label>
													</div>
												</td>
												<td>
													<div class="radio">
														<label>
															<input type="checkbox" name="optradio5" value="3" <?php if ($_POST['optradio5'] == '3') { print 'CHECKED'; } ?>/ disabled>
														</label>
													</div>
												</td>
												<td>
													<div class="radio">
														<label>
															<input type="checkbox" name="optradio5" value="4" <?php if ($_POST['optradio5'] == '4') { print 'CHECKED'; } ?>/ disabled>
														</label>
													</div>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="mukhiya bhag">
						<div class="container">
							<div class="row">
								<div class="col-sm-12 col-md-12">
									<div class="form-group">
										<p>* कुल प्राप्तांक में शामिल नहीं किया जायेगा </p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="mukhiya bhag">
						<div class="container">
							<div class="row">
								<div class="col-sm-3 col-md-3">
									<div class="form-group">
										<h2>भाग (ख) </h2>
									</div>
								</div>
								<div class="col-sm-9 col-md-9">
									<div class="form-group">
										<h2>ग्रामीण गरीबो का चिन्हावन एवं श्रेणी विभाजन </h2>
									</div>
								</div>
								
							</div>
						</div>
					</div>
					<div class="mukhiya">
						<div class="container">
							<div class="row">
								<div class="col-sm-12 col-md-12" style="text-align:center;color: #222;font-size: 16px;">
									<div class="form-group" align="text-center">
										<p>(मद संख्या १ से १३ में प्रत्येक के लिए सर्वाधिक उपयुक्त किसी एक कॉलम को टिक करे )</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="container">
						<div class="row">
							<div class="col-sm-12 col-md-12">
								<table class="table table-bordered table-striped">
									<thead>
										<tr>
											<th rowspan="2" class="text-center">सरल क्रम</th>
											<th rowspan="2" class="text-center">मद</th>
											<th colspan="5" class="text-center">प्राप्तांक</th>
										</tr>
										<tr>
											<th class="text-center">0</th>
											<th class="text-center">1</th>
											<th class="text-center">2</th>
											<th class="text-center">3</th>
											<th class="text-center">4</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>परिवार द्वारा धारित भूमि </td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio6" value="1" <?php if ($_POST['optradio6'] == '1') { print 'CHECKED'; } ?>/ disabled>निरंक
												</label>
											</td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio6" value="2" <?php if ($_POST['optradio6'] == '2') { print 'CHECKED'; } ?>/ disabled>असिंचित एक हेक्टेयर से काम भूमि (सिंचित आधा हैक्टेयर से कम भूमि)
												</label>
											</td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio6" value="3" <?php if ($_POST['optradio6'] == '3') { print 'CHECKED'; } ?>/ disabled>असिंचित १ से २ हैक्टेयर भूमि १ सिंचित आधा से हैक्टेयर भूमि
												</label>
											</td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio6" value="4" <?php if ($_POST['optradio6'] == '4') { print 'CHECKED'; } ?>/ disabled>असिंचित २ से ५ हैक्टेयर भूमि (सिंचित १ से २.५ हैक्टेयर भूमि)
												</label>
											</td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio6" value="5" <?php if ($_POST['optradio6'] == '5') { print 'CHECKED'; } ?>/ disabled>असिंचित ५ हैक्टेयर से अधिक भूमि (सिंचित २.५ हैक्टेयर से अधिक भूमि)
												</label>
											</td>
										</tr>
										<tr>
											<td>2</td>
											<td>मकान का प्रकार </td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio7" value="1" <?php if ($_POST['optradio7'] == '1') { print 'CHECKED'; } ?>/ disabled>आवासहीन
												</label>
											</td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio7" value="2" <?php if ($_POST['optradio7'] == '2') { print 'CHECKED'; } ?>/ disabled>कच्चा
												</label>
											</td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio7" value="3" <?php if ($_POST['optradio7'] == '3') { print 'CHECKED'; } ?>/ disabled>अर्ध पक्का
												</label>
											</td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio7" value="4" <?php if ($_POST['optradio7'] == '4') { print 'CHECKED'; } ?>/ disabled>पक्का
												</label>
											</td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio7" value="5" <?php if ($_POST['optradio7'] == '5') { print 'CHECKED'; } ?>/ disabled>शहरी मकानों जैसा
												</label>
											</td>
										</tr>
										<tr>
											<td>3</td>
											<td>प्रति व्यक्ति पहनने के कपड़ो की उपलब्धता </td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio8" value="1" <?php if ($_POST['optradio8'] == '1') { print 'CHECKED'; } ?>/ disabled>दो जोड़ी
												</label>
											</td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio8" value="2" <?php if ($_POST['optradio8'] == '2') { print 'CHECKED'; } ?>/ disabled>दो से चार जोड़ी
												</label>
											</td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio8" value="3" <?php if ($_POST['optradio8'] == '3') { print 'CHECKED'; } ?>/ disabled>चार से छः जोड़ी
												</label>
											</td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio8" value="4" <?php if ($_POST['optradio8'] == '4') { print 'CHECKED'; } ?>/ disabled>छः से दस जोड़ी
												</label>
											</td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio8" value="5" <?php if ($_POST['optradio8'] == '5') { print 'CHECKED'; } ?>/ disabled>दस जोड़ी से अधिक
												</label>
											</td>
										</tr>
										<tr>
											<td>4</td>
											<td>खाद्य सुरक्षा  </td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio9" value="1" <?php if ($_POST['optradio9'] == '1') { print 'CHECKED'; } ?>/ disabled>वर्ष के अधिकांश समय प्रतिदिन एक समय से भी कम भोजन उपलब्ध होना .
												</label>
											</td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio9" value="2" <?php if ($_POST['optradio9'] == '2') { print 'CHECKED'; } ?>/ disabled>सामान्यतः वर्ष में प्रतिदिन एक समय, लेकिन यदा-कदा एक समय से भी कम भोजन उपलब्ध होना
												</label>
											</td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio9" value="3" <?php if ($_POST['optradio9'] == '3') { print 'CHECKED'; } ?>/ disabled>वर्ष भर प्रतिदिन एक समय भोजन उपलब्ध होना
												</label>
											</td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio9" value="4" <?php if ($_POST['optradio9'] == '4') { print 'CHECKED'; } ?>/ disabled>सामान्यतः वर्ष में प्रतिदिन दोनों समय भोजन उपलब्ध होना
												</label>
											</td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio9" value="5" <?php if ($_POST['optradio9'] == '5') { print 'CHECKED'; } ?>/ disabled>वर्ष भर पर्याप्त भोजन उपलब्ध होना
												</label>
											</td>
										</tr>
										<tr>
											<td>5</td>
											<td>स्वछता </td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio10" value="1" <?php if ($_POST['optradio10'] == '1') { print 'CHECKED'; } ?>/ disabled>खुले में
												</label>
											</td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio10" value="2" <?php if ($_POST['optradio10'] == '2') { print 'CHECKED'; } ?>/ disabled>अनियमित जल आपूर्ति सहित सामूहिक शौचालय
												</label>
											</td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio10" value="3" <?php if ($_POST['optradio10'] == '3') { print 'CHECKED'; } ?>/ disabled>अनियमित जल आपूर्ति सहित सामूहिक शौचालय
												</label>
											</td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio10" value="4" <?php if ($_POST['optradio10'] == '4') { print 'CHECKED'; } ?>/ disabled>नियमित जल आपूर्ति एवं स्वीपर सहित स्वच्छ सामूहिक शौचालय
												</label>
											</td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio10" value="5" <?php if ($_POST['optradio10'] == '5') { print 'CHECKED'; } ?>/ disabled>निजी शौचालय
												</label>
											</td>
										</tr>
										<tr>
											<td>6</td>
											<td>
												उपभोक्ता वस्तुओ का स्वामित्व क्या निम्नाँकित धारित है? (परिवार के मुखिया से पूछकर टिक करे )<br>
												<input type="checkbox" name="vehicle1" value="1" <?php if ($_POST['vehicle1'] == '1') { print 'CHECKED'; } ?>/ disabled>टेलीविज़न<br>
												<input type="checkbox" name="vehicle1" value="2" <?php if ($_POST['vehicle1'] == '2') { print 'CHECKED'; } ?>/ disabled>विद्युत् पंखा <br>
												<input type="checkbox" name="vehicle1" value="3" <?php if ($_POST['vehicle1'] == '3') { print 'CHECKED'; } ?>/ disabled>कुक्कर आदि जैसे रसोई के उपकरण<br>
												<input type="checkbox" name="vehicle1" value="4" <?php if ($_POST['vehicle1'] == '4') { print 'CHECKED'; } ?>/ disabled>रेडियो उपकरण<br>
											</td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio11" value="1" <?php if ($_POST['optradio11'] == '1') { print 'CHECKED'; } ?>/ disabled>निरंक
													<input type="radio" name="optradio11" value="1">निरंक
												</label>
											</td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio11" value="2" <?php if ($_POST['optradio11'] == '2') { print 'CHECKED'; } ?>/ disabled>कोई एक
												</label>
											</td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio11" value="3" <?php if ($_POST['optradio11'] == '3') { print 'CHECKED'; } ?>/ disabled>कोई दो
												</label>
											</td>
											<td>
												<label class="radio-inline">
													<<input type="checkbox" name="optradio11" value="4" <?php if ($_POST['optradio11'] == '4') { print 'CHECKED'; } ?>/ disabled>कोई तीन
												</label>
											</td>
											<td>
												<label class="radio-inline">
													<input type="radio" name="optradio11" >सभी (और भी आर्डर धारित हो तो उनका भी उपयोग किया जाए ) <br>यथा<br>
													<input type="checkbox" name="vehicle2" value="41" <?php if ($_POST['vehicle2'] == '41') { print 'CHECKED'; } ?>/ disabled>कम्प्यूटर<br>
													<input type="checkbox" name="vehicle2" value="42" <?php if ($_POST['vehicle2'] == '42') { print 'CHECKED'; } ?>/ disabled>टेलीफ़ोन<br>
													<input type="checkbox" name="vehicle2" value="43" <?php if ($_POST['vehicle2'] == '43') { print 'CHECKED'; } ?>/ disabled>रेफ्रिजरेटर<br>
													<input type="checkbox" name="vehicle2" value="44" <?php if ($_POST['vehicle2'] == '44') { print 'CHECKED'; } ?>/ disabled>रंगीन टीवी<br>
													<input type="checkbox" name="vehicle2" value="45" <?php if ($_POST['vehicle2'] == '45') { print 'CHECKED'; } ?>/ disabled>२/४ पहिया यांत्रिक वाहन<br>
													<input type="checkbox" name="vehicle2" value="46" <?php if ($_POST['vehicle2'] == '46') { print 'CHECKED'; } ?>/ disabled>ट्रेक्टर<br>
													<input type="checkbox" name="vehicle2" value="47" <?php if ($_POST['vehicle2'] == '47') { print 'CHECKED'; } ?>/ disabled>पावर टिलर<br>
													<input type="checkbox" name="vehicle2" value="48" <?php if ($_POST['vehicle2'] == '48') { print 'CHECKED'; } ?>/ disabled>थ्रेशर<br>
													<input type="checkbox" name="vehicle2" value="49" <?php if ($_POST['vehicle2'] == '49') { print 'CHECKED'; } ?>/ disabled>महंगा फर्नीचर<br>
													<input type="checkbox" name="vehicle2" value="50" <?php if ($_POST['vehicle2'] == '50') { print 'CHECKED'; } ?>/ disabled>रसोई के विधुत उपकरण यथा माइक्रोवेव, मिक्सी आदि<br>
												</label>
											</td>
										</tr>
										<tr>
											<td>7</td>
											<td>परिवार के सर्वाधिक पढ़े - लिखे व्यक्ति का शैक्षिक स्तर  </td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio12" value="1" <?php if ($_POST['optradio12'] == '1') { print 'CHECKED'; } ?>/ disabled>अशिक्षित
												</label>
											</td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio12" value="2" <?php if ($_POST['optradio12'] == '2') { print 'CHECKED'; } ?>/ disabled>प्राथमिक
												</label>
											</td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio12" value="3" <?php if ($_POST['optradio12'] == '3') { print 'CHECKED'; } ?>/ disabled>दसवीं पास
												</label>
											</td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio12" value="4" <?php if ($_POST['optradio12'] == '4') { print 'CHECKED'; } ?>/ disabled>स्नातक व्यावसायिक डिप्लोमा
												</label>
											</td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio12" value="5" <?php if ($_POST['optradio12'] == '5') { print 'CHECKED'; } ?>/ disabled>स्नातकोत्तर व्यावसायिक स्नातक
												</label>
											</td>
										</tr>
										<tr>
											<td>8</td>
											<td>पारिवारिक श्रम का स्तर </td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio13" value="1" <?php if ($_POST['optradio13'] == '1') { print 'CHECKED'; } ?>/ disabled>
													ंधुआ मजदूर
													<input type="radio" name="optradio13" value="1">बंधुआ मजदूर
												</label>
											</td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio13" value="1" <?php if ($_POST['optradio13'] == '1') { print 'CHECKED'; } ?>/ disabled>महिला एवं बाल श्रमिक
												</label>
											</td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio13" value="2" <?php if ($_POST['optradio13'] == '2') { print 'CHECKED'; } ?>/ disabled>केवल व्यसक महिला श्रमिक
												</label>
											</td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio13" value="3" <?php if ($_POST['optradio13'] == '3') { print 'CHECKED'; } ?>/ disabled>केवल व्यसक पुरुष श्रमिक
												</label>
											</td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio13" value="4" <?php if ($_POST['optradio13'] == '4') { print 'CHECKED'; } ?>/ disabled>अन्य
												</label>
											</td>
										</tr>
										<tr>
											<td>9</td>
											<td>जीविकोपार्जन के साधन </td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio14" value="1" <?php if ($_POST['optradio13'] == '1') { print 'CHECKED'; } ?>/ disabled>आकस्मिक मजदूरी
													
												</label>
											</td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio14" value="2" <?php if ($_POST['optradio13'] == '2') { print 'CHECKED'; } ?>/ disabled>निर्वाह योग्य खेती
												</label>
											</td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio14" value="3" <?php if ($_POST['optradio13'] == '3') { print 'CHECKED'; } ?>/ disabled>शिल्पी
												</label>
											</td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio14" value="4" <?php if ($_POST['optradio13'] == '4') { print 'CHECKED'; } ?>/ disabled>वैतनिक
												</label>
											</td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio14" value="5" <?php if ($_POST['optradio13'] == '5') { print 'CHECKED'; } ?>/ disabled>अन्य
												</label>
											</td>
										</tr>
										<tr>
											<td>10</td>
											<td>बच्चो का स्तर (५ - १४ वर्ष)  </td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio15" value="1" <?php if ($_POST['optradio15'] == '1') { print 'CHECKED'; } ?>/ disabled>स्कूल न जाकर काम पर जाना
												</label>
											</td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio15" value="2" <?php if ($_POST['optradio15'] == '2') { print 'CHECKED'; } ?>/ disabled>स्कूल और काम दोनों पर जाना
												</label>
											</td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio15" value="3" <?php if ($_POST['optradio15'] == '3') { print 'CHECKED'; } ?>/ disabled>-
												</label>
											</td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio15" value="4" <?php if ($_POST['optradio15'] == '4') { print 'CHECKED'; } ?>/ disabled>-
												</label>
											</td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio15" value="5" <?php if ($_POST['optradio15'] == '5') { print 'CHECKED'; } ?>/ disabled>स्कूल जाना एवं काम पर न जाना
												</label>
											</td>
										</tr>
										<tr>
											<td>11</td>
											<td>देनदारी का प्रकार </td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio16" value="1" <?php if ($_POST['optradio16'] == '1') { print 'CHECKED'; } ?>/ disabled>अनोपचारित स्त्रोतों से दैनिक उपभोग के लिए
												</label>
											</td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio16" value="2" <?php if ($_POST['optradio16'] == '2') { print 'CHECKED'; } ?>/ disabled>अनोपचारिक स्त्रोतों से उत्पादन हेतु
												</label>
											</td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio16" value="3" <?php if ($_POST['optradio16'] == '3') { print 'CHECKED'; } ?>/ disabled>अनोपचारिक स्त्रोतों से अन्य प्रयोजन हेतु
												</label>
											</td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio16" value="4" <?php if ($_POST['optradio16'] == '4') { print 'CHECKED'; } ?>/ disabled>केवल बैंक आदि जैसे संस्थागत एजेंसी से उधार लेना
												</label>
											</td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio16" value="5" <?php if ($_POST['optradio16'] == '5') { print 'CHECKED'; } ?>/ disabled>कोई देनदार नहीं, सम्पति धारित करना
												</label>
											</td>
										</tr>
										<tr>
											<td>12</td>
											<td>परिवार के गांव से बाहर गमन का कारण</td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio17" value="1" <?php if ($_POST['optradio17'] == '1') { print 'CHECKED'; } ?>/ disabled>आकस्मिक कार्य
												</label>
											</td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio17" value="2" <?php if ($_POST['optradio17'] == '2') { print 'CHECKED'; } ?>/ disabled>मौसमी रोजगार
												</label>
											</td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio17" value="3" <?php if ($_POST['optradio17'] == '3') { print 'CHECKED'; } ?>/ disabled>जीविकोपार्जन का अन्य साधन
												</label>
											</td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio17" value="4" <?php if ($_POST['optradio17'] == '4') { print 'CHECKED'; } ?>/ disabled>गमन नहीं करते
												</label>
											</td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio17" value="5" <?php if ($_POST['optradio17'] == '5') { print 'CHECKED'; } ?>/ disabled>अन्य प्रयोजन हेतु गमन
												</label>
											</td>
										</tr>
										<tr>
											<td>13</td>
											<td>सहायता की प्राथमिकता</td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio18" value="1" <?php if ($_POST['optradio18'] == '1') { print 'CHECKED'; } ?>/ disabled>मजदूरी आधारित रोजगार / लक्षित सार्वजनिक वितरण प्रणाली
												</label>
											</td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio18" value="2" <?php if ($_POST['optradio18'] == '2') { print 'CHECKED'; } ?>/ disabled>स्वरोजगार
												</label>
											</td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio18" value="3" <?php if ($_POST['optradio18'] == '3') { print 'CHECKED'; } ?>/ disabled>पर्शिक्षण एवं कौसल उन्नयन
												</label>
											</td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio18" value="4" <?php if ($_POST['optradio18'] == '4') { print 'CHECKED'; } ?>/ disabled>आवास हेतु
												</label>
											</td>
											<td>
												<label class="radio-inline">
													<input type="checkbox" name="optradio18" value="5" <?php if ($_POST['optradio18'] == '5') { print 'CHECKED'; } ?>/ disabled>एक लाख से अधिक अनुदान / ऋण हेतु अथवा किसी सहायता की आवश्यकता नहीं.
												</label>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="container">
					<div class="row">
						<div class="col-sm-12 col-md-12">
							<button type="button" onclick="printDiv('printMe')"  class="btn btn-primary btn-block mb-2">प्रिंट करें  करें </button>
						</div>
					</div>
				</div>
				<div class="container">
					<div class="row">
						<div class="col-sm-12 col-md-12">
							<button type="button" class="btn btn-primary btn-block mb-2 previous" onclick="history.back()">
							पीछे जाऐं</button>
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
			function printDiv(divName){
				var printContents = document.getElementById(divName).innerHTML;
				var originalContents = document.body.innerHTML;
				document.body.innerHTML = printContents;
				window.print();
				document.body.innerHTML = originalContents;
			}
	</script>
</body>
</html>
<?php } ?>