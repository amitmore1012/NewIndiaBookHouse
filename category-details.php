   <?php 
  include 'security.php';
  $book_isbn = $_GET['categoryName'];
  $count = 0;
  require 'dbConfig.php';
  $query = "SELECT streamID FROM stream where streamName = '$book_isbn'";
   $result = mysqli_query($con, $query);
   $e = mysqli_fetch_assoc($result);
   $w = implode("",$e);
  $query1 = "SELECT * FROM branch where sID = '$w'";
  $result1 = mysqli_query($con, $query1);
  $result2 = mysqli_query($con, $query1);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($conn);
    exit;
  }
      
// $row = mysqli_fetch_assoc($result);
//   if(!$row){
//     	header('Location: https://newindiabookhouse.com/website/final/pustok/pustok/index.php');
//     exit;
//   }  
    ?>


<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>NIBH - Category Details</title>
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
							<li class="breadcrumb-item active">Category Details</li>
						</ol>
					</nav>
				</div>
			</div>
		</section>
		<main class="inner-page-sec-padding-bottom">
			<div class="container">
				<div class="row">
					<div class="col-lg-9 order-lg-2">
						<div class="shop-product-wrap grid with-pagination row space-db--30 shop-border">
	 <?php 
	    while($query_row = mysqli_fetch_assoc($result1)){        
    ?>
							<div class="col-lg-4 col-sm-6">
								    <div class="product-card">
                                        <div class="product-card--body">
                                            <div class="card-image">
                                                <a href="branch-details.php?branchName=<?php echo urlencode($query_row['branchName']); ?>">   
                                                <!--<img class="img-responsive img-thumbnail" src="../../../../admin/branchImages/<?php // echo $query_row['image']; ?>">-->
                                            </a>
                                                <div class="hover-contents">
                                                    <a href="branch-details.php?branchName=<?php echo urlencode($query_row['branchName']); ?>">   
                                                <!--<img class="img-responsive img-thumbnail" src="../../../../admin/branchImages/<?php // echo $query_row['image']; ?>">-->
                                            </a>
                                                    <!--<div class="hover-btns">-->
                                                    <!--    <a href="cart.html" class="single-btn">-->
                                                    <!--        <i class="fas fa-shopping-basket"></i>-->
                                                    <!--    </a>-->
                                                    <!--    <a href="wishlist.html" class="single-btn">-->
                                                    <!--        <i class="fas fa-heart"></i>-->
                                                    <!--    </a>-->
                                                    <!--    <a href="#" data-toggle="modal" data-target="#quickModal"-->
                                                    <!--        class="single-btn">-->
                                                    <!--        <i class="fas fa-eye"></i>-->
                                                    <!--    </a>-->
                                                    <!--</div>-->
                                                </div>
                                            </div>
                                            <div class="price-block">
                                                <a href="branch-details.php?branchName=<?php echo urlencode($query_row['branchName']); ?>"><span class="price"><?php echo $query_row['branchName']; ?> </span></a>  
                                                
                                            </div>
                                        </div>
                                    </div>
							</div>
     <?php
              }
    ?> 
    
    
    
						</div>
					</div>
					<div class="col-lg-3  mt--40 mt-lg--0">
						<div class="inner-page-sidebar">
							<!-- Accordion -->
							<div class="single-block">
								<h3 class="sidebar-title">Categories</h3>
								<ul class="sidebar-menu--shop">
     <?php 
	    while($query_row = mysqli_fetch_assoc($result2)){        
    ?>
									<li><a href="branch-details.php?branchName=<?php echo urlencode($query_row['branchName']); ?>"><span class="price"><?php echo $query_row['branchName']; ?> </span></a>  </li>
	<?php
              }
          
    ?> 
								</ul>
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
    <?php 
        include './imports/footer.php';

    ?>
	<!-- Use Minified Plugins Version For Fast Page Load -->
	<script src="js/plugins.js"></script>
	<script src="js/ajax-mail.js"></script>
	<script src="js/custom.js"></script>
</body>

</html>