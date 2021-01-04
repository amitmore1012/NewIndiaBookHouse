<?php 
include 'userSecurity.php';
        include './imports/usersidebar.php';
        include './imports/userheader.php';
require_once("dbcontroller.php");
$db_handle = new DBController();

    $query = "select * from stream";
    $result = $db_handle->runQuery($query);
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>NIBH | <?php echo $_SESSION['usernameUser']; ?></title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
        <!--     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css"> -->
   
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="css/buttons.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <link href="css/plugins/footable/footable.core.css" rel="stylesheet">

    <!-- Morris -->
    <link href="css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="">

    <div id="wrapper">


<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalCenterTitle">Place Enquiry Order</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
        


<form action="addUserEnquiry.php" method="POST">
    <div class="modal-body">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="CustomerName">Customer Name</label>
      <input type="text" class="form-control" id="CustomerName" name="CustomerName" value= "<?php echo $_SESSION['usernameUser']; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="MobileNo">Mobile Number</label>
      <input type="text" class="form-control" id="MobileNo" name="MobileNo" value= "<?php echo $_SESSION['usernameNo']; ?>">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
           <select class="form-control" id="StreamList" name="StreamList" onChange="getBranch(this.value);">
            <option selected disabled> Stream...</option>
            <?php 

    foreach ($result as $key) {
         ?>

         <option value="<?php echo $key["streamID"]; ?>"> <?php echo $key["streamName"]; ?> </option>

        <?php  
    }

  ?>

      </select>
    </div>
    <div class="form-group col-md-6">
           <select class="form-control" id="BranchList" name="BranchList" onChange="getSem(this.value);">
<option selected>Branch...</option>
      </select>
    </div>
  </div>
   <div class="form-row">
    <div class="form-group col-md-6">
           <select class="form-control" id="SemList" name="SemList" onChange="getBooks(this.value);">
        <option selected>Semester...</option>
        
      </select>
    </div>
    <div class="form-group col-md-6">
           <select class="form-control" id="BookList" name="BookList" onChange="getAuthor(this.value);">
        <option selected>Book Title...</option>
        
      </select>
    </div>
    
  </div>
     <div class="form-row">
    <div class="form-group col-md-6">
           <select class="form-control" id="AuthorList" name="AuthorList" onChange="getPublication(this.value);">
        <option selected>Author...</option>
        
      </select>
    </div>
    <div class="form-group col-md-6">
           <select class="form-control" id="PubList" name="PubList" >
        <option selected>Publication...</option>
       
      </select>
    </div>
  </div>
     <div class="form-row">
    <div class="form-group col-md-4">
      <label for="Quantity">Quantity</label>
      <input type="text" class="form-control" id="Quantity" name="Quantity">
    </div>
    <div class="form-group col-md-4">
        <label for="Instructions">Instructions</label>
      <input type="text" class="form-control" id="Instructions" name="Instructions">
    </div>
        <div class="form-group col-md-4">
        <label for="Delivery">Delivery</label>
      <input type="text" class="form-control" id="Delivery" name="Delivery">
    </div>

  </div>
<!--   <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="hidden" id="Delivery" value="0">
      <input class="form-check-input" type="checkbox" id="Delivery" value="1">
      <label class="form-check-label" for="Delivery">
        Check Me for Delivery
      </label>
    </div>
  </div> -->
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="saveBtn">Save changes</button>

      </div>
      </div>
</form>
                



      

    </div>
  </div>
</div>








        <div class="wrapper wrapper-content">
            <center><h2>Placed Enquires</h2></center>

                <button type="button" class="pull pull-right btn btn-default" data-toggle="modal" data-target="#exampleModalCenter">
  <i class="fa fa-plus-circle"> Add Enquiry</i> 
</button>
<br />
<br />


    <table id="tableCategory" class=" table-bordered dataTables-example" cellspacing="10" cellpadding="10" width="100%">
        <thead>
            <th>ID</th>
            <th>Order Id</th>
            <th>Customer Name</th>
            <th>Mobile No.</th>
            <th>Status</th>
        </thead>
        <tbody>
            <?php
      require_once("dbConfig.php"); 
            //  $con = mysqli_connect("192.168.43.161","root-1","root","nibh") or die("error in connection");

       // $w = "SELECT books.bookID, books.bookName, stream.streamName, branch.branchName, sem.semName FROM (((books INNER JOIN stream ON books.sID = stream.streamID) INNER JOIN branch ON books.bID = branch.branchID) INNER JOIN sem ON books.semIDD = sem.semID)";

        $w = $_SESSION['usernameNo'];
        $u = $_SESSION['usernameUser'];



    $query = "select * from userlogs where CustomerName = '$u' and MobileNo = '$w'";
    $result = mysqli_query($con,$query);
    $res = mysqli_fetch_array($result);

    if ($res['CustomerName'] == $u && $res['MobileNo'] == $w) {
        $query1 = mysqli_query($con, "select * from userlogs where MobileNo = '".$w."'");
        while ($res = mysqli_fetch_array($query1)) {
          echo "<tr>
            <td>".$res['id']."</td>
            <td>".$res['OrderId']."</td>
            <td>".$res['CustomerName']."</td>
            <td>".$res['MobileNo']."</td>
            <td>".$res['Status']."</td>
          </tr>";
        }
    
    }


             ?>
        </tbody>

    </table>




    
        </div>


<script type="text/javascript">
        function getBranch(val) {
            $.ajax({
                type : "POST",
                url : "http://newindiabookhouse.com/getBranch.php",
                data : 'streamID='+val,
                success : function(data) {
                    $('#BranchList').html(data);
                    getSem();
                }
            });
        }   

         function getSem(val) {
            $.ajax({
                type : "POST",
                url : "http://newindiabookhouse.com/getSem.php",
                data : 'branchID='+val,
                success : function(data) {
                    $('#SemList').html(data);
                    getBooks();
                }
            });
        }

        function getBooks(val) {
            $.ajax({
                type : "POST",
                url : "http://newindiabookhouse.com/getBooks.php",
                data : 'semID='+val,
                success : function(data) {
                    $('#BookList').html(data);
                    getAuthor();
                }
            });
        }

        function getAuthor(val) {
            $.ajax({
                type : "POST",
                url : "http://newindiabookhouse.com/getAuthor.php",
                data : 'bookID='+val,
                success : function(data) {
                    $('#AuthorList').html(data);
                    getPublication();
                }
            });
        }

        function getPublication(val) {
            $.ajax({
                type : "POST",
                url : "http://newindiabookhouse.com/getPublication.php",
                data : 'authorID='+val,
                success : function(data) {
                    $('#PubList').html(data);
                   // getPublication();
                }
            });
        }
    </script>


<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>


   <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 10,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel'},
                    {extend: 'pdf'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

        });

    </script>

 
    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
    <script src="js/datatables/jquery-3.3.1.js"></script>
    <script src="js/datatables/jquery.dataTables.min.js"></script>
    <script src="js/datatables/dataTables.buttons.min.js"></script>
    <script src="js/datatables/buttons.flash.min.js"></script>
    <script src="js/datatables/jszip.min.js"></script>
    <script src="js/datatables/pdfmake.min.js"></script>
    <script src="js/datatables/vfs_fonts.js"></script>
    <script src="js/datatables/buttons.html5.min.js"></script>
    <script src="js/datatables/buttons.print.min.js"></script>

        <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Flot -->
    <script src="js/plugins/flot/jquery.flot.js"></script>
    <script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="js/plugins/flot/jquery.flot.symbol.js"></script>
    <script src="js/plugins/flot/curvedLines.js"></script>

    <!-- Peity -->
    <script src="js/plugins/peity/jquery.peity.min.js"></script>
    <script src="js/demo/peity-demo.js"></script>

    <!-- jQuery UI -->
    <script src="js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- Jvectormap -->
    <script src="js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

    <!-- Sparkline -->
    <script src="js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="js/demo/sparkline-demo.js"></script>

    <!-- ChartJS-->
    <script src="js/plugins/chartJs/Chart.min.js"></script>

<script src="js/plugins/footable/footable.all.min.js"></script>
    <!-- jQuery UI -->
    <script src="js/plugins/jquery-ui/jquery-ui.min.js"></script>

</body>
</html>