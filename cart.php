   <?php 
  include 'security.php';
 
    ?>


<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>NIBH - Cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <!--Use Minified Plugins Version For Fast Page Load -->
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
							<li class="breadcrumb-item active">Cart</li>
						</ol>
					</nav>
				</div>
			</div>
		</section>
		 <!--Cart Page Start -->
		<main class="cart-page-main-block inner-page-sec-padding-bottom">
            <div class="cartMsg"></div>
			<div class="cart_area cart-area-padding  ">
				<div class="container">
					<div class="page-section-title">
						<h1>Shopping Cart</h1>
					</div>
					<div class="row">
						<div class="col-12">
							
								 <!--Cart Table -->
								<div class="cart-table table-responsive mb--40">
									<table class="table">
										 <!--Head Row -->
										<thead>
											<tr>
												
												<th class="pro-thumbnail">Image</th>
												<th class="pro-title">Product</th>
												<th class="pro-quantity">Quantity</th>
												<th class="pro-price">Price</th>
												<th class="pro-price">Total</th>
												<th class="pro-remove">Update</th>
												<th class="pro-remove">Delete</th>
											</tr>
										</thead>
										<tbody>
											 <!--Product Row -->
											 <?php
											 $q=0;
											 $p=0;
											 $total = 0;
											 
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
											 
											 
											 while($query_row = mysqli_fetch_assoc($result)){ 
											 ?>
											<tr>
												
												<td class="pro-thumbnail"><img class="img-responsive img-thumbnail" src="../../../../admin/uploadImages/<?php echo $query_row['image']; ?>"></a></td>
												<td class="pro-title"><?php echo $query_row['product']; ?></a></td>
												<td class="pro-quantity">
													<div class="pro-qty">
												<form action="updatecart.php" method="POST">	    
														<div class="count-input-block">
															<input type="number"class="form-control text-center itemQty" name="itemQty" value=<?php echo $query_row['qnty']; ?>>
															<?php  $q=$query_row['qnty']; ?>
														</div>
													</div>
												</td>
												<td class="pro-price"><span>₹<?php echo $query_row['price']; ?></span></td>
												<td class="pro-price "><span>₹<?php echo $query_row['totalprice']; ?></span></td>
												
												<td class="pro-remove">
												            <input type="hidden" class="form-control" name="itemPrice" value='<?php echo $query_row['price']; ?>'>
												            <input type="hidden" class="form-control" name="itemId" value='<?php echo $query_row['id']; ?>'>
                                                            <button type="submit" class="btn btn-sm fa fa-check" name="updateItem" > </button>
                                                            
                                                            </td>
                                                            <td class="pro-remove">
                                                                <input type="hidden" class="form-control" id="edit_id1" name="edit_id1" value='<?php echo $query_row['productid']; ?>'>
                                                            <input type="hidden" class="form-control" id="edit_id2" name="edit_id2" value='<?php echo $query_row['id']; ?>'>
                                                            <button type="submit" class="btn btn-sm fa fa-trash" id="deleteItem" name="deleteItem"> </button>
                                                        
												</td>
												</form>
											</tr>
											           <?php
											           $total = $total + $query_row['totalprice'];
      }
?> 
										</tbody>
									</table>
								</div>
							
						</div>
					</div>
				</div>
			</div>
			<div class="cart-section-2">
				<div class="container">
					<div class="row">
						 <!--Cart Summary -->
						<div class="col-lg-6 col-12 d-flex">
							<div class="cart-summary">
								<div class="cart-summary-wrap">
								    <? php 
								        
								    ?>
									<h4>Cart Summary</h4>
									<p>Items <span class="text-primary"><?php echo count($_SESSION['cart']) ?></span></p>
									<h2>Grand Total <span class="text-primary">₹<?php echo $total; ?></span></h2>
								</div>
								
							<?php
										 if(empty($_SESSION['username'])){
                                                ?>
                                                        
                                <div class="cart-summary-button">
								For Checkout Please Login and Then Comeback!!
								</div>
												
												<?php
                                                } else{
 
?>
								<form action="updatecart.php" method="POST">
								<div class="cart-summary-button">
								    <input type="hidden" class="form-control" id="userName" name="userName" value='<?php echo htmlspecialchars($_SESSION['username']); ?>'>
									<button name="checkoutBtn" class="checkout-btn c-btn btn--primary">Checkout</button>
								    <a href="index.php" class="update-btn c-btn btn-outlined">Keep Shopping</a>
								</div>
								</form>
								<?php  } ?>
							</div>
						</div>
			<!--		</div>-->
			<!--	</div>-->
			<!--</div>-->
			
		</main>
		 <!--Cart Page End -->
	</div>
<!--	=================================-->
<!--  Brands Slider-->
<!--===================================== -->
<?php include './imports/footer.php'; ?>

	 <!--Use Minified Plugins Version For Fast Page Load -->
	<script src="js/plugins.js"></script>
	<script src="js/ajax-mail.js"></script>
	<script src="js/custom.js"></script>
</body>

</html>