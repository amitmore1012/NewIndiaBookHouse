   <?php 
  include 'security.php';

    ?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>NIBH - Checkout</title>
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
							<li class="breadcrumb-item active">Checkout</li>
						</ol>
					</nav>
				</div>
			</div>
		</section>
		<main id="content" class="page-section inner-page-sec-padding-bottom space-db--20">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<!-- Checkout Form s-->
						<div class="checkout-form">
							<div class="row row-40">
								<div class="col-12">
									<h1 class="quick-title">Checkout</h1>
									<!-- Slide Down Trigger  -->
									<!--<div class="checkout-quick-box">-->
									<!--	<p><i class="far fa-sticky-note"></i>Returning customer? <a href="javascript:"-->
									<!--			class="slide-trigger" data-target="#quick-login">Click-->
									<!--			here to login</a></p>-->
									<!--</div>-->
									<!-- Slide Down Blox ==> Login Box  -->
									<!--<div class="checkout-slidedown-box" id="quick-login">-->
									<!--	<form action="./">-->
									<!--		<div class="quick-login-form">-->
									<!--			<p>If you have shopped with us before, please enter your details in the-->
									<!--				boxes below. If you are a new-->
									<!--				customer-->
									<!--				please-->
									<!--				proceed to the Billing & Shipping section.</p>-->
									<!--			<div class="form-group">-->
									<!--				<label for="quick-user">Username or email *</label>-->
									<!--				<input type="text" placeholder="" id="quick-user">-->
									<!--			</div>-->
									<!--			<div class="form-group">-->
									<!--				<label for="quick-pass">Password *</label>-->
									<!--				<input type="text" placeholder="" id="quick-pass">-->
									<!--			</div>-->
									<!--			<div class="form-group">-->
									<!--				<div class="d-flex align-items-center flex-wrap">-->
									<!--					<a href="#" class="btn btn-outlined   mr-3">Login</a>-->
									<!--					<div class="d-inline-flex align-items-center">-->
									<!--						<input type="checkbox" id="accept_terms" class="mb-0 mr-1">-->
									<!--						<label for="accept_terms" class="mb-0">I’ve read and accept-->
									<!--							the terms &amp; conditions</label>-->
									<!--					</div>-->
									<!--				</div>-->
									<!--				<p><a href="javascript:" class="pass-lost mt-3">Lost your-->
									<!--						password?</a></p>-->
									<!--			</div>-->
									<!--		</div>-->
									<!--	</form>-->
									<!--</div>-->
									<!-- Slide Down Trigger  -->
									<div class="checkout-quick-box">
										<p><i class="far fa-sticky-note"></i>Have a coupon? <a href="javascript:"
												class="slide-trigger" data-target="#quick-cupon">
												Click here to enter your code</a></p>
									</div>
									<!-- Slide Down Blox ==> Cupon Box -->
									<div class="checkout-slidedown-box" id="quick-cupon">
										<form action="./">
											<div class="checkout_coupon">
												<input type="text" class="mb-0" placeholder="Coupon Code" id="CouponCode" name="CouponCode" />
												<input type="button" class="mb-0 btn btn-outlined" name="CouponBtn" value="Apply coupon" onclick="set_coupon()" />
												<!--<a href="" class="btn btn-outlined">Apply coupon</a-->
											</div>
										</form>
									</div>
								</div>
								<div class="col-lg-7 mb--20">
									<div class="row">
										<!-- Cart Total -->
										<div class="col-12">
											<div class="checkout-cart-total">
							
												<h2 class="checkout-title">YOUR ORDER</h2>
												<h4>Product <span>Total</span></h4>
												<ul>
												    	<?php
											 $total = 0;
											 $id = array();
											 $pid = array();
											 
											 
											   $con = mysqli_connect("127.0.0.1","root-1","nibh@1713","nibh-v1");
 $where =  "'".session_id()."'";
    $count = 0;
  $query = "SELECT * FROM cart WHERE sessionid = $where";
  $result = mysqli_query($con, $query);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($conn);
    header('Location: index.php');
    exit;
  }

  
  $username = $_SESSION['username'];
   $query1 = "SELECT lat,lng FROM users WHERE name = '$username'";
  $r= mysqli_query($con, $query1);
  while($query_row1 = mysqli_fetch_assoc($r)){
      $lat=$query_row1['lat'];
      $lng=$query_row1['lng'];
  }
  $add_source = "20.0070796,73.7849965";
  $add_destination = $lat.",".$lng;
  

    $a = 'https://maps.googleapis.com/maps/api/distancematrix/json?origins='.$add_source.'&destinations='.$add_destination.'&key=AIzaSyDzvMqiourwx4ZkG7-fnebJgQ6zEg67h78';

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, $a
        
    );
    $content = curl_exec($ch);
    //echo $content;
    $s=json_decode($content, true);
    $w = $s['rows'][0]['elements'][0]['distance']['text'];
   $split = explode(" ", $w);
    $s1 = $split[0];
  
  
											 
											 
											 
											 while($query_row = mysqli_fetch_assoc($result)){ 
											 ?>
													<li><span class="left"><?php echo $query_row['product']; ?> X <?php echo $query_row['qnty']; ?></span> <span
															class="right">₹<?php echo $query_row['totalprice']; $total = $total + $query_row['totalprice']; ?></span></li>
																		     <?php
																		     $id1 = $query_row['id'];
																		     array_push($id,$id1);
																		     
																		     $pid1 = $query_row['productid'];
																		     array_push($pid,$pid1);
																		     
      }
       
  if(isset($con)) { mysqli_close($con); }
  
?> 
												</ul>
												<div id="coupon_box">
												    <p>Coupon Value <span id="coupon_val">₹0</span></p>
												</div>
												
												<p>Sub Total <span id="sub_total">₹<?php echo $total; ?></span></p>
												<p>Shipping Fee <span>₹
												    
												    <?php 
												    $p11=0;
												    if($s1 <= 2){
			                                            $p11= 20;									        
                                                    } else{
	                                                    $p11=$s1*10;
                                                    }
												    
												    echo $p11;
												    ?>
												    
												</span></p>
												<div id="co"></div>
												<h4>Grand Total <span id="main_total">₹<?php echo $p11+$total; ?></span></h4>
												
												<!--<div class="method-notice mt--25">-->
												<!--</div>-->
												<form action="placeOrder.php" method="POST">
												<div class="term-block">
													<input type="checkbox" id="delivery" name="delivery" value="Yes">
													<label for="delivery">Home Delivery</label>
												</div>
												<div class="term-block">
													<input type="text" id="instruction" name="instruction" height="50" placeholder="Any Instructions">
												</div>
												<?php
												 if(empty($_SESSION['username'])){
                                                        ?>
                                                        
                                                <div class="term-block">
        									For Placing Order Please Login and Then Comeback!!			
												</div>
												
												<?php
                                                } else{
                                                    $_SESSION['id'] = $id;
                                                    $p =  implode(",",$pid);
 
?>
                                                
                                                <input type="hidden" name="productid" value='<?php echo $p; ?>'>
                                                <input type="hidden" name="CustomerName" value='<?php echo htmlspecialchars($_SESSION['username']); ?>'>
                                                <input type="hidden" name="totalPrice" value='<?php echo $total; ?>'>
												<button  class="place-order w-100" name = "placeOrder">Place order</button>
												</form>
<?php } ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
	</div>
	<!--=================================
  Brands Slider
===================================== -->
<?php include './imports/footer.php'; ?>
	<!-- Use Minified Plugins Version For Fast Page Load -->
	
	<script>
	    function set_coupon(){
	        var CouponCode = jQuery('#CouponCode').val();
	        if(CouponCode!=''){
	            jQuery('#co').html('');
	            jQuery.ajax({
	                url:'set_coupon.php',
	                type:'post',
	                data:'CouponCode='+CouponCode,
	                success:function(result){
	                    var data = jQuery.parseJSON(result);
	                    if(data.is_error=='yes'){
	                        jQuery('#co').html(data.result);
	                    }
	                    if(data.is_error=='no'){
	                        jQuery('#coupon_box').show();
	                        jQuery('#coupon_val').html(data.dd);
	                        jQuery('#sub_total').html(data.result);
	                        jQuery('#main_total').html(data.result);
	                    }
	                }
	            });
	        }
	    }
	</script>
	
	<script src="js/plugins.js"></script>
	<script src="js/ajax-mail.js"></script>
	<script src="js/custom.js"></script>
</body>

</html>