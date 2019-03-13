<header id="header" class="header-narrow" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 57, 'stickySetTop': '-55px', 'stickyChangeLogo': false}">
	<div class="header-body">
		<div class="header-container container">
			<div class="header-row">
				<div class="header-column">
					<div class="header-row">
						<div class="header-logo">
							<a href="index.php">
								<img alt="sterlite Garv" width="100" height="48" src="img/logo.png">
							</a>
						</div>
					</div>
				</div>
				<div class="header-column justify-content-end">
					<div class="header-row">
						<div class="header-nav">
							<?php if(isset($_SESSION['admin_id'])){ ?>
							<div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1">
								<nav class="collapse">
									<ul class="nav nav-pills" id="mainNav">
										<li class="">
											<a class="nav-link" href="home.php">
												Home
											</a>
										</li>
										<!-- <li class="dropdown">
											<a class="dropdown-item dropdown-toggle" href="#">
												Add Contacts
											</a>
											<ul class="dropdown-menu">
												<li><a class="dropdown-item" href="elements-accordions.html">Your Profile</a></li>
												<li><a class="dropdown-item" href="elements-toggles.html">Your Account</a></li>
												<li><a class="dropdown-item" href="elements-tabs.html">Your Files</a></li>
											</ul>
										</li>-->
										<li class="dropdown">
											<a class="dropdown-item dropdown-toggle" href="#">
												Add
											</a>
											<ul class="dropdown-menu">
												<li><a class="dropdown-item" href="add_contacts.php">Add Contacts</a></li>
												<li><a class="dropdown-item" href="add_templates.php">Add SMS Templates</a></li>
											</ul>
										</li> 
										<li>
											<a class="nav-link" href="logout.php">
												Log Out
											</a>
										</li>
										<!-- <li>
											<a class="nav-link" href="paynow.php">
												Login / Register
											</a>
										</li>
										<li class="dropdown">
											<a class="dropdown-item dropdown-toggle" href="#">
												Select Language
											</a>
											<ul class="dropdown-menu">
												<li><a class="dropdown-item" href="elements-accordions.html">English</a></li>
												<li><a class="dropdown-item" href="elements-toggles.html">Hindi</a></li>
												<li><a class="dropdown-item" href="elements-tabs.html">Marathi</a></li>
											</ul> -->
										</li>
									</ul>
								</nav>
							</div>
							<?php } ?> 
							<button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main nav">
							<i class="fas fa-bars"></i>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>