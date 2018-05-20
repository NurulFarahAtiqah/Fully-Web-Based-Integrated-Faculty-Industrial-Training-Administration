<?php
include("SupervisorCheck.php"); 
$query =  "SELECT stud_attachment.Student_Id,stud_attachment.Stud_AttachmentID,student.Student_Matric,student.Student_Name,company.Company_Name,c_mark.time_submit AS c_mark_time , c_present_mark.time_submit AS c_present_mark_time, logbook_mark.time_submit AS logbook_mark_time , present_mark.time_submit AS present_mark_time, report.time_submit AS report_time , sv_mark.time_submit AS sv_mark_time  FROM student INNER JOIN stud_attachment ON student.Student_Id = stud_attachment.Student_Id INNER JOIN company ON stud_attachment.Company_Id = company.Company_Id INNER JOIN sv_assignment ON sv_assignment.Group_Id = company.Group_Id INNER JOIN supervisor ON sv_assignment.Supervisor_Id = supervisor.Supervisor_Id LEFT JOIN c_mark ON c_mark.Student_Id = student.Student_Id LEFT JOIN c_present_mark ON c_present_mark.Student_Id = student.Student_Id LEFT JOIN logbook_mark ON logbook_mark.Student_Id = student.Student_Id LEFT JOIN present_mark ON present_mark.Student_Id = student.Student_Id LEFT JOIN report ON report.Student_Id = student.Student_Id LEFT JOIN sv_mark ON sv_mark.Student_Id = student.Student_Id WHERE supervisor.Supervisor_StaffID ='$login_user' AND student.semester_session='$session'";
$result = mysqli_query($db,$query);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>View Table</title>
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
        <?php include "SupervisorNav.php"; ?>
        <div class="main-panel">
          <?php include "SupervisorHeader.php"; ?>
            
			
       <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                            
                            
                                <div class="card-header" data-background-color="red">
                                    <h4 class="title">View OBE Mark Records</h4>
                                </div>
                                
                                
                                
          
          
        
         <div class="card-content table-responsive">
         <table id="st_data" class="table table-striped table-bordered">
         <thead>
          <tr>
                <td>Matric No</td>
                <td>Student Name</td>
                <td>Company Name</td>
                  <td></td>
          </tr>
        </thead>
        <tbody>
        <?php
  			while($row = mysqli_fetch_array($result))
  	    	{
  				$id = $row['Stud_AttachmentID'];
				$Student_Id = $row['Student_Id'];
  		    	$student_matric = $row['Student_Matric'];
				$student_name = $row['Student_Name'];
  		    	$company_name = $row['Company_Name'];
				$c_mark_time = $row['c_mark_time'];
				$c_present_mark_time = $row['c_present_mark_time'];
				$logbook_mark_time = $row['logbook_mark_time'];
				$present_mark_time = $row['present_mark_time'];
				$report_time = $row['report_time'];
				$sv_mark_time = $row['sv_mark_time'];
				
				if($c_mark_time!=NULL && $c_present_mark_time!=NULL && $logbook_mark_time!=NULL && $present_mark_time!=NULL && $report_time!=NULL && $sv_mark_time!=NULL)
				{
					$disabled2 = "";
				}
				else
				{
					$disabled2 = 'disabled="disabled"';
					
				}
				
				
				
  		   

  		    	echo '<tr>';
              $stArray = array("$student_matric","$student_name","$company_name");
            while (list ($key, $val) = each ($stArray) ) {
              echo '<td>';
              echo $val;
              echo '</td>';
            }
  		    	echo '<td>';
  		    	echo '<a class="btn btn-primary btn-sm " href="ViewOBE.php?Student_Id='.$Student_Id.'" '.$disabled2.'>View OBE Mark</a>';
  		    	echo '&nbsp;';
  		    	echo '</td>';
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
var dtable = $('#st_data').DataTable({
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
  otable = $('#st_data').dataTable();
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
