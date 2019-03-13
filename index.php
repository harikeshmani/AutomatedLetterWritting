<?php
session_start();
include 'config.php';
if (isset($_POST['submit'])) {
      $myusername = mysqli_real_escape_string($link,$_POST['username']);
      $mypassword = mysqli_real_escape_string($link,$_POST['password']); 
      
      $sql = "SELECT admin_id FROM tbl_admin WHERE name = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($link,$sql);
      $row = mysqli_fetch_array($result);
     
      $count = mysqli_num_rows($result);
      if($count == 1) {
         $_SESSION['admin_id'] = $row['admin_id'];
         header("location: home.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<!DOCTYPE html>
<html class="boxed">
	<head>
		<?php include 'header.php'; ?>
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
								<h1>Public Announcement System</h1>
							</div>
						</div>
					</div>
				</section>
				<div class="container">
				<div class="row">
						<div class="col">

							<div class="featured-boxes">
								<div class="row">
										<div class="featured-box featured-box-primary text-left mt-5">
											<div class="box-content">
												<h4 class="heading-primary text-uppercase mb-3">Admin Login</h4>
												<h5><?php echo $error; ?></h5>
												<form action="" id="frmSignIn" method="post">
													<div class="form-row">
														<div class="form-group col">
															<label>Username</label>
															<input type="text" name="username" value="" class="form-control form-control-lg" required="">
														</div>
													</div>
													<div class="form-row">
														<div class="form-group col">
															<label>Password</label>
															<input type="password" name="password" value="" class="form-control form-control-lg" required="">
														</div>
													</div>
													<div class="form-row">
														<div class="form-group col-lg-6">

														</div>
														<div class="form-group col-lg-6">
															<input type="submit" name="submit" value="Login" class="btn btn-primary float-right mb-5" data-loading-text="Loading...">
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
	</body>
</html>