
<?php 
 include 'security.php';
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

    <title>NIBH | View Enquiry</title>
<link rel="icon" href="img/logo/nibhLogoWhite-1.png">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> 


<!--     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css"> -->
   
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="css/buttons.dataTables.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedcolumns/3.3.0/js/dataTables.fixedColumns.min.js">

    <!-- Morris -->
    <link href="css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>
<body>

	<div id="wrapper">
        <?php 
            include './imports/sidebar.php';
            include './imports/header.php';

        ?>
                    <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Data</h5>
                    </div>
                    <div class="modal-body">
                        
                        <?php
                        
                         $con = mysqli_connect("127.0.0.1","root-1","nibh@1713","nibh-v1");
                            if(isset($_POST['editEnquiry'])){
                               
                                $id = $_POST['edit_id2'];
                                // $w = "SELECT acceptedenquiry.id,acceptedenquiry.OrderId,acceptedenquiry.OrderDate,acceptedenquiry.OrderYear,acceptedenquiry.MobileNo,acceptedenquiry.CustomerName,stream.streamName,branch.branchName,year.yearName,sem.semName,books.bookName,publication.publicationName,author.authorName,acceptedenquiry.Quantity,acceptedenquiry.Delivery,acceptedenquiry.Address,acceptedenquiry.Instructions,acceptedenquiry.OrderPlacedBy,acceptedenquiry.Location FROM (((((((acceptedenquiry INNER JOIN stream ON acceptedenquiry.Stream = stream.streamID) INNER JOIN branch ON acceptedenquiry.Branch = branch.branchID)INNER JOIN year ON acceptedenquiry.Year = year.yearID)INNER JOIN sem ON acceptedenquiry.Sem = sem.semID)INNER JOIN books ON acceptedenquiry.Book = books.bookID)INNER JOIN publication ON acceptedenquiry.Publication = publication.publicationID)INNER JOIN author ON acceptedenquiry.Author = author.authorID)";
                                $sql = "SELECT deliveryorder.id,deliveryorder.OrderId,deliveryorder.OrderDate,deliveryorder.OrderYear,deliveryorder.MobileNo,deliveryorder.CustomerName,stream.streamName,branch.branchName,year.yearName,sem.semName,books.bookName,publication.publicationName,author.authorName,deliveryorder.Quantity,deliveryorder.Delivery,deliveryorder.Address,deliveryorder.Instructions,deliveryorder.OrderPlacedBy,deliveryorder.Location FROM (((((((deliveryorder INNER JOIN stream ON deliveryorder.Stream = stream.streamID) INNER JOIN branch ON deliveryorder.Branch = branch.branchID)INNER JOIN year ON deliveryorder.Year = year.yearID)INNER JOIN sem ON deliveryorder.Sem = sem.semID)INNER JOIN books ON deliveryorder.Book = books.bookID)INNER JOIN publication ON deliveryorder.Publication = publication.publicationID)INNER JOIN author ON deliveryorder.Author = author.authorID) where id = '$id' ";
                                $query = mysqli_query($con,$sql);
                                
                                foreach($query as $row){
                                    ?>
                        
                            
                            <div  style="margin-top:10px">
                                <label><b>Customer Name: </b> <?php echo $row['CustomerName'] ?></label>
                            </div>
                            
                            <div  style="margin-top:10px">
                                <label><b>Mobile No:</b>  <?php echo $row['MobileNo'] ?></label>
                            </div>

                            <div  style="margin-top:10px">
                                <label><b>Stream: </b> <?php echo $row['streamName'] ?></label>
                            </div>
                            
                            <div style="margin-top:10px">
                                <label><b>Branch: </b> <?php echo $row['branchName'] ?></label>
                            </div>
                            
                            <div style="margin-top:10px">
                                <label><b>Year: </b><?php echo $row['yearName'] ?></label>
                            </div>
                            
                            <div style="margin-top:10px">
                                <label><b>Sem: </b> <?php echo $row['semName'] ?></label>
                            </div>
                            
                            <div style="margin-top:10px">
                                <label><b>Book Name: </b> <?php echo $row['bookName'] ?></label>
                            </div>
                            
                            <div style="margin-top:10px">
                                <label >Publication: <?php echo $row['publicationName'] ?></label>
                            </div>
                            
                            <div style="margin-top:10px">
                                <label>Author: <?php echo $row['authorName'] ?></label>
                            </div>
                            
                            <div style="margin-top:10px">
                                <label>Quantity: <?php echo $row['Quantity'] ?></label>
                            </div>
                            
                            <div style="margin-top:10px">
                                <label>Instructions: <?php echo $row['Instructions'] ?></label>
                            </div>

                            <div style="margin-top:10px">
                                <label>Delivery: <?php echo $row['Delivery'] ?></label>
                            </div>
                            
                            <div style="margin-top:10px">
                                <label>Address: <?php echo $row['Address'] ?></label>
                            </div>
                            
                            <div style="margin-top:10px">
                                <label>Order Placed By: <?php echo $row['OrderPlacedBy'] ?></label>
                            </div>
                            
                            <div style="margin-top:10px">
                                <label>Location: <?php echo $row['Location'] ?></label>
                            </div>
                          
                       
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" onclick="window.location.href = 'http://newindiabookhouse.com/delivery.php';">Close</button>
                    </div>
                   
                                    <?php
                                }
                            }
                        ?>
                </div>
            </div>
        </div>
    
    </div>
            
            
            
<script>
    $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>


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

<!-- <script>
    $(document).ready(function() {

} );
</script>  -->

<script>
        $(document).ready(function(){

 // $('#tableCategory thead tr').clone(true).appendTo( '#tableCategory thead' );
 //    $('#tableCategory thead tr:eq(1) th').each( function (i) {
 //        var title = $(this).text();
 //        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
 
 //        $( 'input', this ).on( 'keyup change', function () {
 //            if ( table.column(i).search() !== this.value ) {
 //                table
 //                    .column(i)
 //                    .search( this.value )
 //                    .draw();
 //            }
 //        } );
 //    } );
 
 //    var table = $('#tableCategory').DataTable( {
 //        orderCellsTop: true,
 //        fixedHeader: true
 //    } );
 

            $('#tableCategory').DataTable({
                pageLength: 10,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel'},
                    {extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'A4'},

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


         $('.chosen-select').chosen({width: "100%"});

    </script>

   

    <!-- Dual Listbox --> 
    <script src="js/plugins/dualListbox/jquery.bootstrap-duallistbox.js"></script>
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
   <!--  <script src="js/datatables/jquery.dataTables.min.css"></script> -->

        <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>


<script src="css/buttons.dataTables.min.css"></script>
<script src="css/jquery.dataTables.min.css"></script>

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


    <!-- jQuery UI -->
    <script src="js/plugins/jquery-ui/jquery-ui.min.js"></script>

</body>
</html>