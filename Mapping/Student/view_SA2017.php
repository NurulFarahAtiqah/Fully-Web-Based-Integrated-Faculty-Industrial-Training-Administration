<?php
require_once('../Connections/Check.php');
$query =  "SELECT stud_attachment.Stud_AttachmentID,student.Student_Matric,student.Student_Name,company.Company_Name,stud_attachment.Intern_Status,stud_attachment.Start_Date,stud_attachment.Finish_Date,stud_attachment.Issue FROM `stud_attachment`INNER JOIN `student` ON stud_attachment.Student_Id = student.Student_Id INNER JOIN `company` ON stud_attachment.Company_Id=company.Company_Id WHERE student.semester_session='$session' ORDER BY stud_attachment.Stud_AttachmentID ASC ";
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
         <?php include "../Nav.php"; ?>
        <div class="main-panel">
          <?php include "../Header.php"; ?>
            
			
       <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                            
                            
                                <div class="card-header" data-background-color="red">
                                    <h4 class="title">View Attachment Records</h4>
                                </div>
                                
                                
                                
            <nav class="navbar navbar-default">
            <div class="container-fluid">
         
             <form method="post" role="form" class="form-inline" action="../Mapping/Student_Attachment.php">
             <button type="submit" class="btn btn-danger navbar-btn pull-right">Insert New Student  Attachment</button>
             </form>
             </div>
             </nav>   
          
        
         <div class="card-content table-responsive">
         <table id="st_data" class="table table-striped table-bordered">
         <thead>
          <tr>
                <td>No</td>
                <td>Matric No</td>
                <td>Student Name</td>
                <td>Company Name</td>
                <td>Internship Status</td>
                <td>Start Date</td>
                <td>Finish Date</td>
                <td>Issue</td>
                <td></td>
          </tr>
        </thead>
        <tbody>
        <?php
		 $x=1;
  			while($row = mysqli_fetch_array($result))
  	    	{
  				$id = $row['Stud_AttachmentID'];
  		    	$student_matric = $row['Student_Matric'];
				$student_name = $row['Student_Name'];
  		    	$company_name = $row['Company_Name'];
  		    	$status = $row['Intern_Status'];
  		    	$start = $row['Start_Date'];
  		    	$finish = $row['Finish_Date'];
				$issue = $row['Issue'];

  		    	echo '<tr>';
              $stArray = array($x++,"$student_matric","$student_name","$company_name","$status","$start","$finish","$issue");
            while (list ($key, $val) = each ($stArray) ) {
              echo '<td>';
              echo $val;
              echo '</td>';
            }
  		    	echo '<td>';
  		    	echo '<a class="btn btn-primary btn-sm " href="Update_SA.php?Stud_AttachmentID='.$id.'">Edit</a>';
  		    	echo '&nbsp;';
  		    	echo '<a class="btn btn-danger btn-sm" href="Delete_SA.php?Stud_AttachmentID='.$id.'" onclick="return confirm(\'Confirm Delete this ?\')">Delete</a>';
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
