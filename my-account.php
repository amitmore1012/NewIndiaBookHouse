   <?php 
        include 'security.php';
        if(empty($_SESSION['username'])){
         header('Location: pleaseLogIn.php');
         } else{ }
  
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
							<li class="breadcrumb-item"><a href="index.html">Home</a></li>
							<li class="breadcrumb-item active">My Account</li>
						</ol>
					</nav>
				</div>
			</div>
		</section>
		
		<?php 
		require 'dbConfig.php';
  $s = $_SESSION['username'];
  $query = "select * from users where name = '$s'";

  $result = mysqli_query($con, $query);
  $query_row = mysqli_fetch_assoc($result);
  $id = $query_row['id'];
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($conn);
    exit;
  }
        
		?>
		
		<div class="page-section inner-page-sec-padding">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="row">
							<!-- My Account Tab Menu Start -->
							<div class="col-lg-3 col-12">
								<div class="myaccount-tab-menu nav" role="tablist">
									<a href="#dashboad" class="active" data-toggle="tab"><i
											class="fas fa-tachometer-alt"></i>
										Dashboard</a>
									<a href="#orders" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Orders</a>
									<!--<a href="#download" data-toggle="tab"><i class="fas fa-download"></i> Download</a>-->
									<!--<a href="#payment-method" data-toggle="tab"><i class="fa fa-credit-card"></i>-->
									<!--	Payment-->
									<!--	Method</a>-->
									<a href="#address-edit" data-toggle="tab"><i class="fa fa-map-marker"></i>
										Address</a>
									<a href="#account-info" data-toggle="tab"><i class="fa fa-user"></i> Account Details</a>
									<a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
								</div>
							</div>
							<!-- My Account Tab Menu End -->
							<!-- My Account Tab Content Start -->
							<div class="col-lg-9 col-12 mt--30 mt-lg--0">
								<div class="tab-content" id="myaccountContent">
									<!-- Single Tab Content Start -->
									<div class="tab-pane fade show active" id="dashboad" role="tabpanel">
										<div class="myaccount-content">
											<h3>Dashboard</h3>
											<div class="welcome mb-20">
												<p>Hello, <strong><?php echo $query_row['name']; ?></strong> (If Not <strong><?php echo $query_row['name']; ?>!  </strong><a href="logout.php" class="logout">
														 Logout</a>)</p>
											</div>
											<p class="mb-0">From your account dashboard. you can easily check &amp; view
												your
												recent orders, manage your shipping and billing addresses and edit your
												password and account details.</p>
										</div>
									</div>
									<!-- Single Tab Content End -->
									<!-- Single Tab Content Start -->
									<div class="tab-pane fade" id="orders" role="tabpanel">
										<div class="myaccount-content">
											<h3>Orders</h3>
											<div class="myaccount-table table-responsive text-center">
												<table class="table table-bordered">
													<thead class="thead-light">
														<tr>
															<th>No</th>
															<th>Name</th>
															<th>Date</th>
															<th>Status</th>
															<th>Total</th>
															<!--<th>Action</th>-->
														</tr>
													</thead>
													<tbody>
													    <?php 
													        $sql1="select * from userOrders where userId = '$id'";
													        $q1 = mysqli_query($con, $sql1);
													        while($q2 = mysqli_fetch_assoc($q1)){
													    ?>
														<tr>
															<td><?php echo $q2['id']; ?></td>
															<td><?php echo $q2['OrderId']; ?></td>
															<td><?php echo $q2['OrderDate']; ?></td>
															<td><?php echo $q2['Status']; ?></td>
															<td><?php echo $q2['price']; ?></td>
															<!--<form action="invoice.php" method="POST">-->
															<!--<input type="hidden" name="id" value=<?php //echo $query_row['OrderId']; ?>>-->
															<!--<td><button class="btn" name="invoiceBtn">View</button></td>-->
															<!--</form>-->
														</tr>
														<?php 
													        }   
													    ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<!-- Single Tab Content End -->
									<!-- Single Tab Content Start -->
									<!--<div class="tab-pane fade" id="download" role="tabpanel">-->
									<!--	<div class="myaccount-content">-->
									<!--		<h3>Downloads</h3>-->
									<!--		<div class="myaccount-table table-responsive text-center">-->
									<!--			<table class="table table-bordered">-->
									<!--				<thead class="thead-light">-->
									<!--					<tr>-->
									<!--						<th>Product</th>-->
									<!--						<th>Date</th>-->
									<!--						<th>Expire</th>-->
									<!--						<th>Download</th>-->
									<!--					</tr>-->
									<!--				</thead>-->
									<!--				<tbody>-->
									<!--					<tr>-->
									<!--						<td>Mostarizing Oil</td>-->
									<!--						<td>Aug 22, 2018</td>-->
									<!--						<td>Yes</td>-->
									<!--						<td><a href="#" class="btn">Download File</a></td>-->
									<!--					</tr>-->
									<!--					<tr>-->
									<!--						<td>Katopeno Altuni</td>-->
									<!--						<td>Sep 12, 2018</td>-->
									<!--						<td>Never</td>-->
									<!--						<td><a href="#" class="btn">Download File</a></td>-->
									<!--					</tr>-->
									<!--				</tbody>-->
									<!--			</table>-->
									<!--		</div>-->
									<!--	</div>-->
									<!--</div>-->
									<!-- Single Tab Content End -->
									<!-- Single Tab Content Start -->
									<!--<div class="tab-pane fade" id="payment-method" role="tabpanel">-->
									<!--	<div class="myaccount-content">-->
									<!--		<h3>Payment Method</h3>-->
									<!--		<p class="saved-message">You Can't Saved Your Payment Method yet.</p>-->
									<!--	</div>-->
									<!--</div>-->
									<!-- Single Tab Content End -->
									<!-- Single Tab Content Start -->
									<div class="tab-pane fade" id="address-edit" role="tabpanel">
										<div class="myaccount-content">
											<h3>Billing Address</h3>
											<address>
												<p><strong>Name: <?php echo $query_row['name']; ?></strong></p>
												<p>Address: <?php echo $query_row['userAddress']; ?></p>
												<p>Mobile: <?php echo $query_row['phoneNo']; ?></p>
											</address>
										
										</div>
									</div>
									<!-- Single Tab Content End -->
									<!-- Single Tab Content Start -->
									<div class="tab-pane fade" id="account-info" role="tabpanel">
										<div class="myaccount-content">
											<h3>Account Details</h3>
											<div class="account-details-form">
												<form role="form" action="register_user.php" method="POST">
													<div class="row">
														<div class="col-12  mb--30">
														    <label for="new-email">Email</label>
															<input id="new-email" name="new-email" placeholder="Email Address" type="email" value=<?php echo $query_row['email']; ?>>
														</div>
														<div class="col-12  mb--30">
														    <label for="first-name">Address</label>
															<input name="first-name" placeholder="Address" type="text" value="<?php echo htmlspecialchars($query_row['userAddress']); ?>" >
														</div>
														<div class="col-12  mb--30">
														    <label for="new-Mobile">Mobile</label>
															<input id="new-Mobile" name="new-Mobile" placeholder="Mobile" type="text" value=<?php echo $query_row['phoneNo']; ?>>
															<input id="old-Mobile" name="old-Mobile" placeholder="Mobile" type="hidden" value=<?php echo $query_row['phoneNo']; ?>>
														</div>
														<div class="col-12  mb--30">
															<h4>Password change</h4>
														</div>
														<div class="col-12  mb--30">
														    <label for="first-name">Current Password</label>
															<input placeholder="Current Password" type="text" value=<?php echo $query_row['password']; ?> >

														</div>
														<div class="col-lg-6 col-12  mb--30">
															<input id="new-pwd" name="new-pwd" placeholder="New Password" type="password">
														</div>
														<div class="col-lg-6 col-12  mb--30">
															<input id="confirm-pwd" name="confirm-pwd" placeholder="Confirm Password" type="password">
														</div>
														<div class="col-12">
															<button class="btn btn--primary" name="register2">Save Changes</button>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
									<!-- Single Tab Content End -->
								</div>
							</div>
							<!-- My Account Tab Content End -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--=================================
  Brands Slider
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