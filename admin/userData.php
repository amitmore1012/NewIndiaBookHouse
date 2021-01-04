

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

    <title>NIBH | User Data</title>
<link rel="icon" href="img/logo/nibhLogoWhite-1.png">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> 

<link href="css/plugins/chosen/bootstrap-chosen.css" rel="stylesheet">

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
    
    <link href="js/multiselect/bootstrap-multiselect.css" rel="stylesheet">
    <script src="js/multiselect/bootstrap-multiselect.js"></script>

</head>
<body>

	<div id="wrapper">
   <?php 
        include './imports/sidebar.php';
        include './imports/header.php';

    ?>


    <div class="table-responsive">



<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalCenterTitle">Add Enquiry</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
        <div class="modal-body">
                        
                    


        <form action="addUserData.php" method="POST">
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group">
                        <label for="CustomerName">Customer Name</label>
                        <input type="text" class="form-control" id="CustomerName" name="CustomerName">
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="MobileNo">Mobile Number</label>
                        <input type="text" class="form-control" id="MobileNo" name="MobileNo">
                    </div>
                </div>
  
                <div class="form-row">
                    <div class="form-group">
                        <select class="form-control chosen-select" id="StreamList" name="StreamList" onChange="getBranch(this.value);">
                            <option selected disabled> Stream</option>
                            <?php

                                 foreach ($result as $key) {
                            ?>

                            <option value="<?php echo $key["streamID"]; ?>"> <?php echo $key["streamName"]; ?> </option>

                             <?php 
                                 }

                            ?>

                        </select>
                    </div>
                </div>
                
                <div class="form-row">   
                    <div class="form-group">
                        <select class="form-control" id="BranchList" name="BranchList" onChange="getYear(this.value);">
                            <option selected>Branch</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <select class="form-control " id="YearList" name="YearList" onChange="getSem(this.value);">
                            <option selected>Year</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <select class="form-control" id="SemList" name="SemList">
                            <option selected>Semester</option>
                        </select>
                    </div>
                </div>
                
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="Address">Address</label>
                        <input type="text" class="form-control" id="Address" name="Address">
                    </div>
                </div>
                
               
                
            </div>
            
    
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="saveBtn">Save changes</button>
      </div>
      
</form>
                
</div>


      

    </div>
  </div>
</div>

        <center><h2>User Data</h2></center>

        <button type="button" class="pull pull-right btn btn-default" data-toggle="modal" data-target="#exampleModalCenter">
  <i class="fa fa-plus-circle"> Add Entry</i> 
</button>
<br>

<br>


<a href="userDataSmsPanel.php" class="pull pull-right btn btn-default"><i class="fa fa-sign-out"> SMS Panel</i></a>


    <br>
    <br>


	<table id="tableCategory" class="table-bordered dataTables-example contenteditable" cellspacing="10" cellpadding="10" width="100%">
		<thead>
            <th>Action</th>
            <th>Edit</th>
			<th>ID</th>
            <th>Customer Name</th>
            <th>Mobile</th>
            <th>Stream</th>
            <th>Branch</th>
            <th>Year</th>
            <th>Sem</th>
            <th>Address</th>
		</thead>
		<tbody>
            <?php 
            require_once("dbConfig.php");
              $w = "select * from userData ORDER BY id DESC";
              $query = mysqli_query($con, $w);
                while ($res = mysqli_fetch_array($query)) { ?>
                    <tr>
                        <td>
                            <form action="addUserData.php" method="POST">
                                <div style="float: left; width: 70px">
                                <input type="hidden" class="form-control" id="edit_id2" name="edit_id2" value='<?php echo $res['id']; ?>'>
                                <button type="submit" class="btn btn-sm btn-danger fa fa-times" id="deleteEnquiry" name="deleteEnquiry"> </button>
                                </div>
                            </form>
                            
                        </td>
                        <td>
                            <form action="editUserData.php" method="POST">
                                <input type="hidden" class="form-control" id="edit_id1" name="edit_id1" value='<?php echo $res['id']; ?>'>
                                <button type="submit" class="btn btn-sm btn-warning fa fa-pencil" id="editEnquiry" name="editEnquiry"> </button>
                            </form>
                            
                        </td>
                        <td>
                            <form action="viewList.php" method="POST">
                                <input type="hidden" class="form-control" id="edit_id2" name="edit_id2" value='<?php echo $res['id']; ?>'>
                                <button type="submit" class="btn btn-sm btn-success " id="editEnquiry" name="editEnquiry"> <?php echo $res['id']; ?></button>
                            </form>
                            
                        </td>
                        
                        
                        <td><?php echo $res['CustomerName']; ?></td>
                        <td><?php echo $res['MobileNo']; ?></td>
                        <td><?php echo $res['Stream']; ?></td>
                        <td><?php echo $res['Branch']; ?></td>
                        <td><?php echo $res['Year']; ?></td>
                        <td><?php echo $res['Sem']; ?></td>
                        <td><?php echo $res['Address']; ?></td>
                    </tr>
                    <?php  
                }
             ?>
        </tbody>



	</table>
</div>
</div>
            

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>











<!-- <script>
    $(document).ready(function() {

} );
</script>  -->

    <script src="js/plugins/chosen/chosen.jquery.js"></script>





<script>
        $(document).ready(function(){

        $('.chosen-select').chosen({width: "100%"});
        
        });
        
        
        
        
        </script>
        
        
        <script>
            $(document).ready(function(){
               $(".chosen-select").chosen();
                $('button').click(function(){
                    $(".chosen-select").val('').trigger("chosen:updated");
                }); 
            });
        </script>

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
         $('.BranchList').chosen({width: "100%"});

    </script>

<script>
        $(document).ready(function(){

        $('.BranchList').chosen({width: "100%"});
        
        });
        
        
        
        
        </script>
        
        
        <script>
            $(document).ready(function(){
               $(".BranchList").chosen();
                $('button').click(function(){
                    $(".BranchList").val('').trigger("chosen:updated");
                }); 
            });
        </script>

<script type="text/javascript">
        function getBranch(val) {
            $.ajax({
                type : "POST",
                url : "getBranch.php",
                data : 'streamID='+val,
                success : function(data) {
                    $('#BranchList').html(data);
                    $(".BranchList").val('').trigger("chosen:updated");
                   // $('.chzn-select').trigger("liszt:updated");
                    getYear();
                }
            });
        }   

        function getYear(val) {
            $.ajax({
                type : "POST",
                url : "getYear.php",
                data : 'branchID='+val,
                success : function(data) {
                    $('#YearList').html(data);
                    getSem();
                }
            });
        }

         function getSem(val) {
            $.ajax({
                type : "POST",
                url : "getSem.php",
                data : 'yearID='+val,
                success : function(data) {
                    $('#SemList').html(data);
                    getBooks();
                }
            });
        }

        function getBooks(val) {
            $.ajax({
                type : "POST",
                url : "getBooks.php",
                data : 'semID='+val,
                success : function(data) {
                    $('#BookList').html(data);
                   getPublication();
                }
            });
        }


            function getPublication(val) {
            $.ajax({
                type : "POST",
                url : "getPublication.php",
                data : 'bookID='+val,
                success : function(data) {
                    $('#PublicationList').html(data);
                    getAuthor();
                }
            });
        }

        function getAuthor(val) {
            $.ajax({
                type : "POST",
                url : "getAuthor.php",
                data : 'bookID='+val,
                success : function(data) {
                    $('#AuthorList').html(data);
                    //getPublication();
                }
            });
        }

        
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