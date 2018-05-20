<?php
require_once('../Connections/Check.php');
$query = "SELECT*FROM student WHERE semester_session='$session' ORDER BY Student_Id ASC";
$result = mysqli_query($db,$query);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>View Student</title>
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
          
          
			
<!-- Sidebar Holder -->
<nav id="sidebar">
<div class="sidebar-header" >
<h3>Filter</h3>
<?php
$courseArray = array('BITS','BITI','BITD','BITE','BITZ','BITM','BITC');
while (list ($key, $val) = each ($courseArray) ) {
?>
  <div id="filters">
    <div class="filterblock">
      <input onchange="filterme()" type="checkbox" name="type" value="<?php echo $val ?>"><?php echo $val ?>
    </div>
  </div>
<?php } ?>
</div>
</nav>


       <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="red">
                                    <h4 class="title">View Student Records</h4>
                                </div>
      <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn pull-right">
                       <i class="material-icons">view_headline</i>
                        <span>Toggle Filter</span>
                    </button>
                </div>
         
                    <form method="post" role="form" class="form-inline" action="Student.php">
                		<button type="submit" class="btn btn-danger navbar-btn pull-left">Insert New Student</button>
                  </form>
				</div>
        </nav>
		
            
        <div class="card-content table-responsive" style="overflow-x:auto;">
        <table id="student_data" class="table table-striped table-bordered">
        <thead>
          <tr>
                <td>No.</td>
                <td>Matric No</td>
                <td>Name</td>
                <td>IC No.</td>
                <td>Course</td>
                <td>Semester</td>
                <td>Tel. No</td>
                <td>HP No</td>
                <td></td>
          </tr>
        </thead>
		<tbody>
        <?php
		   $x=1;
  			while($row = mysqli_fetch_array($result))
  	    	{
				
				
  				$id = $row['Student_Id'];
  		    	$student_matric = $row['Student_Matric'];
  		    	$student_name = $row['Student_Name'];
				$ic = $row['Student_IC'];
  		    	$student_course = $row['Student_Course'];
  		    	$student_semester = $row['semester_session'];
  		    	$student_phone = $row['Student_Phone'];
				$tel= $row['Student_Tel'];

  		    	echo '<tr>';
            $studentArray = array($x++,"$student_matric","$student_name","$ic","$student_course","$student_semester","$tel","$student_phone");
            while (list ($key, $val) = each ($studentArray) ) {
              echo '<td>';
              echo $val;
              echo '</td>';
            }
  		    	echo '<td>';
  		    	echo '<a class="btn btn-primary btn-sm " href="Update_Student.php?Student_Id='.$id.'">Edit</a>';
  		    	echo '&nbsp;';
  		    	echo '<a class="btn btn-danger btn-sm" href="Delete_Student.php?Student_Id='.$id.'" onclick="return confirm(\'Confirm Delete this Student?\')">Delete</a>';
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
var dtable = $('#student_data').DataTable({
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
  otable = $('#student_data').dataTable();
  })
  function filterme() {
    //build a regex filter string with an or(|) condition
  var types = $('input:checkbox[name="type"]:checked').map(function() {
    return '^' + this.value + '\$';
  }).get().join('|');
  //filter in column 0, with an regex, no smart filtering, no inputbox,not case sensitive
  otable.fnFilter(types, 3, true, false, false, false);
  }
</script>
