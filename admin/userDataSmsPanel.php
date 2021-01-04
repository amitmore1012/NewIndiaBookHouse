

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

    <title>NIBH | SMS Panel</title>
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
    
    
    
    <!--Select all Script-->
    	<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script type="text/javascript" language="javascript" src="https://nightly.datatables.net/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://nightly.datatables.net/buttons/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://nightly.datatables.net/buttons/js/buttons.flash.min.js"></script>
	<!--<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>-->
	<!--<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>-->
	<!--<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>-->
	<script type="text/javascript" language="javascript" src="https://nightly.datatables.net/buttons/js/buttons.html5.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://nightly.datatables.net/buttons/js/buttons.print.min.js"></script>
    
    <!--<link href="https://nightly.datatables.net/select/css/select.dataTables.css?_=9a6592f8d74f8f520ff7b22342fa1183.css" rel="stylesheet" type="text/css" />-->
<script src="https://nightly.datatables.net/select/js/dataTables.select.js?_=9a6592f8d74f8f520ff7b22342fa1183"></script>


</head>
<body>

	<div id="wrapper">
   <?php 
        include './imports/sidebar.php';
        include './imports/header.php';

    ?>


    <div class="table-responsive">

        <center><h2>SMS Panel</h2></center>



<br>


    <div class="modal-body">
        <div class="form-row modal-body">
                    <div class="form-group col-sm-2">
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
                
                
                <div class="form-row col-sm-2">   
                    <div class="form-group">
                        <select class="form-control " id="BranchList" name="BranchList" onChange="getYear(this.value);">
                            <option selected>Branch</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-row col-sm-2">
                    <div class="form-group">
                        <select class="form-control" id="YearList" name="YearList" onChange="getSem(this.value);">
                            <option selected>Year</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-row col-sm-2">
                    <div class="form-group">
                        <select class="form-control" id="SemList" name="SemList" onChange="getBooks(this.value);">
                            <option selected>Semester</option>
                        </select>
                    </div>
                </div>
                

                
                <div class="form-row col-sm-1">
                    <div class="form-group">
                
          
                    </div>
                </div>
                                </div>
                                 </div>
                                        <div class="modal-footer">
                                             <button type="button" name="filter" id="filter" class="btn btn-primary">Filter</button>
      </div>


	<table id="tableCategory" class="table-bordered dataTables-example contenteditable" cellspacing="10" cellpadding="10" width="100%">
		<thead>
			<th>id</th>
			<th>MobileNo</th>
			<th>Customer</th>
            <th>Stream</th>
            <th>Branch</th>
            <th>Year</th>
            <th>Sem</th>
            <th>Address</th>
		</thead>
	



	</table>
</div>
</div>
            


<script type="text/javascript">


    $(document).ready(function(){
        
        fill_datatable();
        
  
  function fill_datatable(filter_stream = '', filter_branch = '', filter_year = '', filter_sem = '')
 // function fill_datatable(filter_stream , filter_branch , filter_year , filter_sem)
  {
      var events = $('#events');
   var dataTable = $('#tableCategory').DataTable({
    "processing" : true,
     "serverSide" : true,
    "searching" : false,
    "ajax" : {
     url:"fetchFilterUserData.php",
     type:"POST",
      data:{
          filter_stream:filter_stream, 
          filter_branch:filter_branch, 
          filter_year:filter_year, 
          filter_sem:filter_sem
      }
    },
     columnDefs: [ {
            orderable: false,
            className: 'select-checkbox',
            targets:   0,
            checkboxes: true
        } ],
        select: true,
        select:{
            style:    'multi',
            selector: 'td:first-child'
        },
        order: [[ 1, 'asc' ]],
        dom: '<"html5buttons"B>lTfgitp',
        buttons: [
                    
                    { extend: 'copy'},
                    {extend: 'csv',
                          exportOptions: {
                    columns: [ 1, 2 ]
                }
                    },
                    {extend: 'excel'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    },
                    
                    {text: 'Select all',
                           action: function() {
        dataTable.rows({
          page: 'current'
        }).select();
      }
                    },
                    
                    {
                text: 'Compose SMS',
                action: function ( e, node, config ) {
                            var url = "composeSMS3.php";
                            var jsonString = JSON.stringify( dataTable.rows( { selected: true } ).data().toArray() );
                            $.ajax({
                                    type: "POST",
                                    url: "insertSMSNo3.php",
                                    data: {data : jsonString}, 
                                    cache: false,
                                    success: function(data){
                                        window.location.assign(url); 
                                    }
            
                            });
                }
                
            }
        ]
       
   });
  }
  
//filter button
  $('#filter').click(function(){
   var filter_stream = $('#StreamList').val();
   var filter_branch = $('#BranchList').val();
   var filter_year = $('#YearList').val();
   var filter_sem = $('#SemList').val();
   if(filter_stream != '' && filter_branch != '' && filter_year != '' && filter_sem != '')
   {
    $('#tableCategory').DataTable().destroy();
    fill_datatable(filter_stream, filter_branch, filter_year, filter_sem);
   }
   else
   {
    alert('Select Both filter option');
    $('#tableCategory').DataTable().destroy();
    fill_datatable();
   }
  });
  

  
  
    });
</script>





<!--<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>-->

<script type="text/javascript">
        function getBranch(val) {
            $.ajax({
                type : "POST",
                url : "getBranch.php",
                data : 'streamID='+val,
                success : function(data) {
                    $('#BranchList').html(data);
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
        //     $(document).ready(function(){
        //       $(".chosen-select").chosen();
        //         $('button').click(function(){
        //             $(".chosen-select").val('').trigger("chosen:updated");
        //         }); 
        //     });
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
 

        //     $('#tableCategory').DataTable({
        //         pageLength: 10,
        //         responsive: true,
        //         dom: '<"html5buttons"B>lTfgitp',
        //         buttons: [
        //             { extend: 'copy'},
        //             {extend: 'csv'},
        //             {extend: 'excel'},
        //             {extend: 'pdfHtml5',
        //         orientation: 'landscape',
        //         pageSize: 'A4'},

        //             {extend: 'print',
        //              customize: function (win){
        //                     $(win.document.body).addClass('white-bg');
        //                     $(win.document.body).css('font-size', '10px');

        //                     $(win.document.body).find('table')
        //                             .addClass('compact')
        //                             .css('font-size', 'inherit');
        //             }
        //             }
        //         ]

        //     });
        // });


        //  $('.chosen-select').chosen({width: "100%"});

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
    <script src="js/datatables/dataTables.select.min.js"></script> 
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