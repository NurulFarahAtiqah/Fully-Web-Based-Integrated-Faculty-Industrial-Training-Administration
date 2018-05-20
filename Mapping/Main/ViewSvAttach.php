<?php
require_once('../Connections/Check.php');

$query ='SELECT * FROM supervisor WHERE Supervisor_Id NOT IN (SELECT supervisor.Supervisor_Id FROM sv_assignment INNER JOIN supervisor ON supervisor.Supervisor_Id = sv_assignment.Supervisor_Id WHERE sv_assignment.Group_Id IS NOT NULL)';
$result = mysqli_query($db,$query);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Supervisor</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="../assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    
	
<?php include "../Table.php"; ?>

</head>

   <body>
    <div class="wrapper">
         <?php include "../Nav.php"; ?>
          <div class="main-panel">
            <?php include "../Header.php"; ?>
          
			
          
            
            
            
           <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                        
                        
                            <div class="card">
                            
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">View Lecturer Records</h4>
                                </div>
                                
                               
		                          
                                  
                                  <div class="card-content table-responsive">

                                  <!--table-->    
            
                                   <table id="supervisor_data" class="table table-striped table-bordered">
                                   <thead>
                                    <tr>
                                          <td>ID</td>
                                          <td>Name</td>
                                          <td>Department</td>
                                          <td>Phone No</td>
                                          <td>Role</td>
                                          <td>Account Status</td>
                                          
                                    </tr>
                                  </thead>
                                  <tbody>
                                     <?php
                                      while($row = mysqli_fetch_array($result))
                                      {
                                            $id = $row['Supervisor_Id'];
                                          $lect_staffID = $row['Supervisor_StaffID'];
                                          $lect_name = $row['Supervisor_Name'];
                                          $lect_dep = $row['Supervisor_Department'];
                                          $lect_phone = $row['Supervisor_Phone'];
                                          $lect_role = $row['Supervisor_St'];
                                          $lect_status = $row['Supervisor_Status'];
                          
                                          echo '<tr>';
                                      $lectArray = array("$lect_staffID","$lect_name","$lect_dep","$lect_phone","$lect_role","$lect_status");
                                      while (list ($key, $val) = each ($lectArray) ) {
                                        echo '<td>';
                                        echo $val;
                                        echo '</td>';
                                      }
                                       
                                          echo '</tr>';
                                      }
                                  ?>
                                  </tbody>
                                  </table>
                                  
                                  
        					 </div> <!--card content-->
                            </div> <!--card--> 
                      </div> <!--row-->
                  </div> <!--col-->
                </div> <!--content-->
            </div><!--container-->
            
              <?php include "../Footer.php"; ?>         
  
      </div> <!--main panel-->
    </div> <!--wrapper-->
    
</body>
<?php include "../Footer3.php"; ?>
</html>

<script>
$(document).ready(function()
 {
var dtable = $('#supervisor_data').DataTable({
		dom: 'Bfrtip',
		 buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
	});

$('.filter').on('keyup change', function () {
        //clear global search value
        dtable.search('');
        dtable.column($(this).data('columnIndex')).search(this.value).draw();
});

$( ".dataTables_filter input" ).on( 'keyup change',function() {
       //clear all column search values
        dtable.columns().search('');
       //clear all form input values
       $('.filter').val('');
});
$('#sidebar, #content').toggleClass('active');
$('.collapse.in').toggleClass('in');
$('a[aria-expanded=true]').attr('aria-expanded', 'false');


});

$('#sidebarCollapse').on('click', function () {
  $('#sidebar, #content').toggleClass('active');
  $('.collapse.in').toggleClass('in');
  $('a[aria-expanded=true]').attr('aria-expanded', 'false');
});

$(function() {
  otable = $('#supervisor_data').dataTable();
  })
  function filterme() {
    //build a regex filter string with an or(|) condition
  var types = $('input:checkbox[name="type"]:checked').map(function() {
    return '^' + this.value + '\$';
  }).get().join('|');
  //filter in column 0, with an regex, no smart filtering, no inputbox,not case sensitive
  otable.fnFilter(types, 2, true, false, false, false);
  }
</script>
