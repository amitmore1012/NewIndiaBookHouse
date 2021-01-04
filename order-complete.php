   <?php 
  include 'security.php';
  $con = mysqli_connect("127.0.0.1","root-1","nibh@1713","nibh-v1");
 $where =  "'".session_id()."'";
    $count = 0;
  $query = "SELECT * FROM cart WHERE sessionid = $where";
  $result = mysqli_query($con, $query);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($conn);
    header('Location: https://newindiabookhouse.com/website/final/pustok/pustok/index.php');
    exit;
  }
    ?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>NIBH - Order Complete</title>
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
							<li class="breadcrumb-item active">Order Complete</li>
						</ol>
					</nav>
				</div>
			</div>
		</section>

		<!-- order complete Page Start -->
		<section class="order-complete inner-page-sec-padding-bottom">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="order-complete-message text-center">
							<h1>Thank you !</h1>
							<p>Your order has been received.</p>
							<p>Please check the order details in <b>My Account.</b></p>
						</div>
						<!--<ul class="order-details-list">-->
						<!--	<li>Order Number: <strong>3053</strong></li>-->
						<!--	<li>Date: <strong>January 24, 2019</strong></li>-->
						<!--	<li>Total: <strong>$117.00</strong></li>-->
						<!--	<li>Payment Method: <strong>Cash on Delivery</strong></li>-->
						<!--</ul>-->
						<!--<p>Pay with cash upon delivery.</p>-->
						<!--<h3 class="order-table-title">Order Details</h3>-->
						<!--<div class="table-responsive">-->
						<!--	<table class="table order-details-table">-->
						<!--		<thead>-->
						<!--			<tr>-->
						<!--				<th>Product</th>-->
						<!--				<th>Total</th>-->
						<!--			</tr>-->
						<!--		</thead>-->
						<!--		<tbody>-->
						<!--			<tr>-->
						<!--				<td><a href="single-product.html">Vans Off The Wall T-Shirt In</a> <strong>× 1</strong></td>-->
						<!--				<td><span>$59.00</span></td>-->
						<!--			</tr>-->
						<!--			<tr>-->
						<!--				<td><a href="single-product.html">Supreme Being Icon Glitch T-Shirt</a> <strong>× 1</strong></td>-->
						<!--				<td><span>$58.00</span></td>-->
						<!--			</tr>-->
						<!--		</tbody>-->
						<!--		<tfoot>-->
						<!--			<tr>-->
						<!--				<th>Subtotal:</th>-->
						<!--				<td><span>$117.00</span></td>-->
						<!--			</tr>-->
						<!--			<tr>-->
						<!--				<th>Payment Method:</th>-->
						<!--				<td>Cash on Delivery</td>-->
						<!--			</tr>-->
						<!--			<tr>-->
						<!--				<th>Total:</th>-->
						<!--				<td><span>$117.00</span></td>-->
						<!--			</tr>-->
						<!--		</tfoot>-->
						<!--	</table>-->
						<!--</div>-->
					</div>
				</div>
			</div>
		</section>
		<!-- order complete Page End -->
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