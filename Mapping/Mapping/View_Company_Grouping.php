<?php
require_once('../Connections/Check.php');
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Student</title>
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
                            
                            
                                <div class="card-header" data-background-color="red">
                                    <h4 class="title">View Company Group Records</h4>
                                </div>
                                
                                
                                <nav class="navbar navbar-default">
                                <div class="container-fluid">
                                <form method="post" role="form" class="form-inline" action="Grouping_Company.php">
                                <button type="submit" class="btn btn-info navbar-btn pull-right">Insert New Group</button>
                                </div>
                                </form>
                                </nav>

                                <div class="card-content table-responsive" style="overflow-x:auto;">
                                 <!--table-->    
		
                                 <table id="group_data" class="table table-striped table-bordered">
                                 <thead>
                                 <tr>
                                                      <td>Group</td>
                                                      <td>Company Name</td>
                                                      <td>Company State</td>
                                                      <td>No of Student</td>
                                                      <td>Function</td>
                        
                                </tr>
                                </thead>
                                <tbody>
                                   <?php
                                 $query = "SELECT count(stud_attachment.Company_Id) AS NUMBER,sv_assignment.Group_Id,company.Company_Id,company.Company_Name,company.Company_State FROM sv_assignment LEFT JOIN supervisor ON sv_assignment.Supervisor_Id=supervisor.Supervisor_Id LEFT JOIN company ON company.Group_Id=sv_assignment.Group_id LEFT JOIN stud_attachment ON company.Company_Id=stud_attachment.Company_Id LEFT JOIN student ON student.Student_Id=stud_attachment.Student_Id WHERE company.Group_Id != 0 AND student.semester_session='$session' GROUP BY company.Company_Id";
                                 $result = mysqli_query($db,$query);
                        
                                            while($row = mysqli_fetch_array($result))
                                            {
                                                $groupid = $row['Group_Id'];
                                      $companyid = $row['Company_Id'];
                                      $companyname = $row['Company_Name'];
                                      $companystate = $row['Company_State'];
                                      $noofstudent = $row['NUMBER'];
                        
                                      echo '<td>';
                                      echo 'G'.$groupid;
                                      echo '</td><td>';
                                      echo $companyname;
                                            echo '</td><td>';
                                      echo $companystate;
                                      echo '</td><td>';
                                      echo $noofstudent;
                                      echo '</td><td>';
                                                  echo '<a class="btn btn-danger btn-sm" style="padding-left:19px;padding-right:19px" href="Delete_Grouping.php?Group_Id='.$groupid.'&Company_Id='.$companyid.'" onclick="return confirm(\'Confirm Ungroup?\')">Ungroup</a>';
                                                echo '</td></tr>';
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
$(document).ready(function(){
  var dtable = $('#group_data').DataTable({
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

});

</script>
