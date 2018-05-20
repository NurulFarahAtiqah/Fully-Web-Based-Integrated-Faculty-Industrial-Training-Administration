<?php
include("Check.php"); 
//getting id from url
$id = $login_user;
 
$query = "SELECT student.Student_Id,student.Student_Matric, student.Student_Name,student.Student_Course,student.Student_Phone FROM student INNER JOIN stud_attachment ON stud_attachment.Student_Id=student.Student_Id INNER JOIN company ON stud_attachment.Company_Id=company.Company_Id WHERE company.Company_Id =$login_user AND student.semester_session='$session'";
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
    <link href="../assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    
	<?php include "../Table.php"; ?>
	
</head>

<body>
   <body>
   <div class="wrapper">
    <?php include "CompanyNav.php"; ?>
        <div class="main-panel">
          <?php include "CompanyHeader.php"; ?>
          
          
       <div class="content">
           
                   <div class="row">
                        <div class="col-md-12">
              				
                               <div class="card">
                               <div class="card-header" data-background-color="red">
                                    <h4 class="title">View Student Presentation-Asessment Records</h4>
                                </div>
                                
  								
                                
		                           <div class="card-content table-responsive">
                                      
        <table id="company_data" class="table table-striped table-bordered">
        <thead>
        <tr>
        					  <td>Matric No</td>
                              <td>Student Name</td>
        					  <td>Student Course</td>
                              <td>Phone No</td>

        </tr>
        </thead>
		<tbody>
            <?php
        						while($row = mysqli_fetch_array($result))
        					   	{
									$id = $row['Student_Id'];
            						$matric = $row['Student_Matric'];
									$stud_name = $row['Student_Name'];
								    $course = $row['Student_Course'];
									$phone = $row['Student_Phone'];
								

          						  echo '<tr>';
                        $companyArray = array("$matric","$stud_name","$course","$phone");
                        while (list ($key, $val) = each ($companyArray) ) {
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
  var dtable = $('#company_data').DataTable({
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
  otable = $('#company_data').dataTable();
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
