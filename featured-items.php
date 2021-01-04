   <?php 
  include 'security.php';
        
    ?>


<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>NIBH - Featured Items</title>
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
							<li class="breadcrumb-item active">Featured Items</li>
						</ol>
					</nav>
				</div>
			</div>
		</section>
		<main class="inner-page-sec-padding-bottom">
			<div class="container">
				<div class="shop-product-wrap grid with-pagination row space-db--30 shop-border">
                    
<?php 
  $count = 0;
  require 'dbConfig.php';
  $query = "select * from featuredItem";
  $result = mysqli_query($con, $query);
  if(!$result){
    echo "Items not found.. Please try again later.." . mysqli_error($conn);
    //exit;

  }
    while($query_row = mysqli_fetch_assoc($result)){        
    ?>
							<div class="col-lg-4 col-sm-6">
								     <div class="product-card">
                                        <div class="product-header">
                                            <a href="" class="author">
                                                <?php echo $query_row['author']; ?>
                                            </a>
                                            <h3><a href="product-details.php?bookisbn=<?php echo $query_row['isbn']; ?>"><?php echo $query_row['book']; ?></a></h3>
                                        </div>
                                        <div style="height: auto"></div>
                                        <div class="product-card--body">
                                            <div class="card-image">
                                                <a href="product-details.php?bookisbn=<?php echo $query_row['isbn']; ?>">
                                                <img class="img-responsive img-thumbnail" src="../../../../admin/uploadImages/<?php echo $query_row['image']; ?>">
                                            </a>
                                                <div class="hover-contents">
                                                    <a href="product-details.php?bookisbn=<?php echo $query_row['isbn']; ?>" class="hover-image">
                                                        <img class="img-responsive img-thumbnail" src="../../../../admin/uploadImages/<?php echo $query_row['image']; ?>">
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
                                            <div style="height: 30px">
                                                <span class="price-discount">Featured</span>
                                            </div>
                                            <div class="price-block">
                                                <span class="price">₹<?php echo $query_row['ourprice']; ?> </span>
                                                <del class="price-old">₹<?php echo $query_row['price']; ?> </del>
                                                <span class="price-discount"><?php echo $query_row['discount']; ?>%</span>
                                            </div>
                                        </div>
                                    </div>
							</div>
     <?php
              }
          
    ?> 
				</div>
				<!-- Pagination Block -->
				<!-- Modal -->
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