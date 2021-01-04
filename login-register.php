<?php  
session_start();

?>

<!DOCTYPE html>

<html lang="zxx">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>NIBH - New India Book House</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Use Minified Plugins Version For Fast Page Load -->
	<link rel="stylesheet" type="text/css" media="screen" href="css/plugins.css" />
	<link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
	<link rel="shortcut icon" type="image/x-icon" href="image/logo.ico">
</head>

<body>
	<div class="site-wrapper" id="top">
    <?php 
        include './imports/header.php';

    ?>
		<section class="breadcrumb-section">
			<h2 class="sr-only">Site Breadcrumb</h2>
			<div class="container">
				<div class="breadcrumb-contents">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.php">Home</a></li>
							<li class="breadcrumb-item active">Login</li>
						</ol>
					</nav>
				</div>
			</div>
		</section>
		<!--=============================================
    =            Login Register page content         =
    =============================================-->
		<main class="page-section inner-page-sec-padding-bottom">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb--30 mb-lg--0">
						<!-- Login Form s-->
						<form role="form" action="register_user.php" method="POST">
							<div class="login-form">
								<h4 class="login-title">New Customer</h4>
								<p><span class="font-weight-bold">I am a new customer</span></p>
								<div class="row">
									<div class="col-md-12 col-12 mb--15">
										<label for="email">Full Name</label>
										<input class="mb-0 form-control" type="text" name="name" placeholder="Enter your full name">
									</div>
									<div class="col-12 mb--20">
										<label for="email">Email</label>
										<input class="mb-0 form-control" type="email" name="email" placeholder="Enter Your Email Address Here..">
									</div>
									<div class="col-lg-6 mb--20">
										<label for="password">Password</label>
										<input class="mb-0 form-control" type="password" name="password" placeholder="Enter your password">
									</div>
									<div class="col-lg-6 mb--20">
										<label for="password">Mobile No.</label>
										<input class="mb-0 form-control" type="text" name="rphnNo" placeholder="Enter your mobile no.">
									</div>
									<div class="col-md-12">
										
										<button type="submit" class="btn btn-outlined" name="register">Register</button>
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
							<form role="form" action="login_user1.php" method="POST">
							<div class="login-form">
								<h4 class="login-title">Returning Customer</h4>
								<p><span class="font-weight-bold">I am a returning customer</span></p>
								<div class="row">
									<div class="col-md-12 col-12 mb--15">
										<label for="email">Enter your email address here...</label>
										<input class="mb-0 form-control" type="email" id="email1" name="email1"
											placeholder="Enter you email address here..." required="">
									</div>
									<div class="col-12 mb--20">
										<label for="password">Password</label>
										<input class="mb-0 form-control" type="password" id="pass1" name="pass1" placeholder="Enter your password" required="">
									</div>
									<div class="col-md-12">
										<button type="submit" class="btn btn-outlined" name="loginbt">Login</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</main>
	</div>

	<!--=================================
    Footer Area
===================================== -->
	    <?php 
        include './imports/footer.php';

    ?>
	<!-- Use Minified Plugins Version For Fast Page Load -->
	<script src="js/plugins.js"></script>
	<script src="js/ajax-mail.js"></script>
	<script src="js/custom.js"></script>
</body>

</html>