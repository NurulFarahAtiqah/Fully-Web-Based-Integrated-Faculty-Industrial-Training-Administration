<?php
include("SupervisorCheck.php"); 

$query = "SELECT student.Student_Matric,student.Student_IC,student.Student_Name,student.Student_Course,student.Student_Phone,company.Company_Name,company.Company_Add,company.Company_Add2,company.Company_City,company.Company_Posscode,company.Company_State,company.Company_Phone,company.Company_Fax,supervisor.Supervisor_Name,supervisor.Supervisor_Phone,supervisor.Supervisor_StaffID,stud_attachment.Start_Date,stud_attachment.Finish_Date FROM student INNER JOIN stud_attachment ON student.Student_Id = stud_attachment.Student_Id INNER JOIN company ON stud_attachment.Company_Id = company.Company_Id INNER JOIN sv_assignment ON sv_assignment.Group_Id = company.Group_Id LEFT JOIN supervisor ON sv_assignment.Supervisor_Id = supervisor.Supervisor_Id WHERE student.semester_session='$session' ORDER BY student.Student_Name ASC";
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
    <link href="../assets/css/material-dashboard.css" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    
	 
	<?php include "../Table.php"; ?>
	
</head>

<body>
   <body>
   <div class="wrapper">
    <?php include "SupervisorNav.php"; ?>
        <div class="main-panel">
          <?php include "SupervisorHeader.php"; ?>
			
 

         <div class="content">
           
                   <div class="row">
                        <div class="col-md-12">
              				
                               <div class="card">
     
              
                                <div class="card-header" data-background-color="red">
                                    <h4 class="title">View Intership Records</h4>
                                </div>
                                
       <div class="card-content table-responsive" style="overflow-x:auto;">
            
        <table id="intern_data" class="table table-striped table-bordered">
        <thead>
        <tr>
                              <td>Matric No</td>
                              <td>Student Name</td>
                              <td>Student IC</td>
                              <td>Course</td> 
                              <td>Company Name</td>
                              <td>Address 1</td>
                              <td>Address 2</td>
                              <td>City</td>
                              <td>Postcode</td>
                              <td>State</td>
                              <td>Company Phone No</td>
                              <td>Start Date</td>
                              <td>Finish Date</td>

        </tr>
        </thead>
		<tbody>
            <?php
        						while($row = mysqli_fetch_array($result))
        					   	{
            						$matric = $row['Student_Matric'];
									$stud_name = $row['Student_Name'];
									$stud_ic = $row['Student_IC'];
									$course = $row['Student_Course'];
            				        $comp_name = $row['Company_Name'];
          					        $comp_add = $row['Company_Add'];
									$comp_add2 = $row['Company_Add2'];
									$comp_city = $row['Company_City'];
									$comp_pos = $row['Company_Posscode'];
          						    $comp_state = $row['Company_State'];  
									$comp_phone = $row['Company_Phone'];
									
									$start = $row['Start_Date'];
									$finish = $row['Finish_Date'];
          						  

          						    echo '<tr>';
                                    $internArray = array("$matric","$stud_name","$stud_ic","$course","$comp_name","$comp_add","$comp_add2","$comp_city","$comp_pos","$comp_state","$comp_phone","$start","$finish");
                        while (list ($key, $val) = each ($internArray) ) {
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
$(document).ready(function(){
  var dtable = $('#intern_data').DataTable({
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

   $('#container').css( 'display', 'block' );
table.columns.adjust().draw();

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
  otable = $('#intern_data').dataTable();
  })
  function filterme() {
  //build a regex filter string with an or(|) condition
  var types = $('input:checkbox[name="type"]:checked').map(function() {
    return '^' + this.value + '\$';
  }).get().join('|');
  //filter in column 0, with an regex, no smart filtering, no inputbox,not case sensitive
  otable.fnFilter(types, 4, true, false, false, false);
}
</script>
