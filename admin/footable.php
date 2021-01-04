<?php 
        include 'http://newindiabookhouse.com/security.php';
        include './imports/sidebar.php';
        include './imports/header.php';
require_once("http://newindiabookhouse.com/dbcontroller.php");
$db_handle = new DBController();

    $query = "select * from stream";
    $result = $db_handle->runQuery($query);
?>


<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | FooTable</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
        <!--     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css"> -->
   
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="css/buttons.dataTables.min.css">

    <!-- FooTable -->
    <link href="css/plugins/footable/footable.core.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper" class="gray-bg">

        <center><h2>Placed Order</h2></center>

        <div class="wrapper wrapper-content animated fadeInRight">

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">

                            <table class="footable table table-stripped toggle-arrow-tiny">
                                <thead>
                                <tr>

                                    <th data-toggle="true">OrderId</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th data-hide="all">ID</th>
                                    <th data-hide="all">Order Date</th>
                                    <th data-hide="all">Order Year</th>
                                    <th data-hide="all">Stream</th>
                                    <th data-hide="all">Branch</th>
                                    <th data-hide="all">Semester</th>
                                    <th data-hide="all">Book Name</th>
                                    <th data-hide="all">Publication</th>
                                    <th data-hide="all">Author</th>
                                    <th data-hide="all">Quantity</th>
                                    <th data-hide="all">Delivery</th>
                                    <th data-hide="all">Instructions</th>
                                    <th>Forward</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>

                                <tbody>


<?php 
            require_once("http://newindiabookhouse.com/dbConfig.php");
                //$con = mysqli_connect("192.168.43.22","root-1","root","nibh") or die("error in connection");
            //  $query = mysqli_query($con, "select * from acceptedenquiry");
              $w = "SELECT placedorder.id, placedorder.OrderId, placedorder.OrderDate, placedorder.OrderYear, placedorder.MobileNo, placedorder.CustomerName, stream.streamName ,branch.branchName, sem.semName, books.bookName, publication.publicationName, author.authorName, placedorder.Quantity, placedorder.Delivery, placedorder.Instructions FROM ((((((placedorder INNER JOIN stream ON placedorder.Stream = stream.streamID) INNER JOIN branch ON placedorder.Branch = branch.branchID) INNER JOIN sem ON placedorder.Semester = sem.semID) INNER JOIN books ON placedorder.Title = books.bookID) INNER JOIN publication ON placedorder.Publication = publication.publicationID) INNER JOIN author ON placedorder.Author = author.authorID)";
              $query = mysqli_query($con, $w);
                while ($res = mysqli_fetch_array($query)) { ?>



                                <tr>
                                    <td><?php echo $res['OrderId']; ?></td>
                                    <td><?php echo $res['CustomerName']; ?></td>
                                    <td><?php echo $res['MobileNo']; ?></td>
                                    <td><?php echo $res['id']; ?></td>
                                    <td><?php echo $res['OrderDate']; ?></td>
                                    <td><?php echo $res['OrderYear']; ?></td>
                                    <td><?php echo $res['streamName']; ?></td>
                        <td><?php echo $res['branchName']; ?></td>
                        <td><?php echo $res['semName']; ?></td>
                        <td><?php echo $res['bookName']; ?></td>
                        <td><?php echo $res['publicationName']; ?></td>
                        <td><?php echo $res['authorName']; ?></td>
                        <td><?php echo $res['Quantity']; ?></td>
                        <td><?php echo $res['Delivery']; ?></td>
                        <td><?php echo $res['Instructions']; ?></td>
                                    <td>
                            <form action="addPlacedOrder.php" method="POST">
                                <input type="hidden" class="form-control" id="place_id" name="place_id" value='<?php echo $res['id']; ?>'>
                                <button type="submit" class="btn btn-sm btn-primary fa fa-check" id="placeEnquiry" name="placeEnquiry"> </button>
                            </form>
                                    </td>
                                    <td><a href="#"><i class="fa fa-pencil text-navy"></i></a></td>
                                    <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                                </tr>
                                 <?php  
                }
             ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="5">
                                        <ul class="pagination pull-right"></ul>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>



    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- FooTable -->
    <script src="js/plugins/footable/footable.all.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function() {

            $('.footable').footable();
            $('.footable2').footable();

        });

    </script>

</body>

</html>
