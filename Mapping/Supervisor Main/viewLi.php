<?php
include("SupervisorCheck.php"); 
//getting id from url
$id = $login_user;

if(isset($_GET['ID']))
{
$query ='DELETE FROM notification WHERE ID = "'.$_GET['ID'].'"';
$result1 = mysqli_query($db,$query);
}


$query = "SELECT student.Student_Id,student.Student_Name,pdf.path FROM student INNER JOIN stud_attachment ON student.Student_Id = stud_attachment.Student_Id INNER JOIN company ON stud_attachment.Company_Id = company.Company_Id INNER JOIN sv_assignment ON sv_assignment.Group_Id = company.Group_Id INNER JOIN supervisor ON sv_assignment.Supervisor_Id = supervisor.Supervisor_Id LEFT JOIN pdf ON pdf.Student_Id = student.Student_Id  WHERE supervisor.Supervisor_Id =$login_id AND student.semester_session='$session'";

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
    <?php include "SupervisorNav.php"; ?>
        <div class="main-panel">
          <?php include "SupervisorHeader.php"; ?>
          
          
       <div class="content">
           
                   <div class="row">
                        <div class="col-md-12">
              				
                               <div class="card">
                               <div class="card-header" data-background-color="red">
                                    <h4 class="title">View Student LI End Letter</h4>
                                </div>
                                
  								
                                
		                           <div class="card-content table-responsive">
                                      
        <table id="company_data" class="table table-striped table-bordered">
        <thead>
        <tr>
        					  
                              <td>Student Name</td>
                              <td>File</td>
        			          <td>Functions</td>

        </tr>
        </thead>
		<tbody>
        <?php
        while($row = mysqli_fetch_array($result))
        {
        					   	
			$stud_id = $row['Student_Id'];					
            $stud_name = $row['Student_Name'];
			$path = $row['path'];
			$file = basename($path);  
			
			if($path == NULL)
			{
				 $disabled = 'disabled="disabled"';
			}
			else
			{
				$disabled = "";
			}
			
			if($path != NULL)
			{
				 $disabled1 = 'disabled="disabled"';
			}
			else
			{
				$disabled1 = "";
			}
			
			echo '<tr>';
                        $companyArray = array("$stud_name","$file");
                        while (list ($key, $val) = each ($companyArray) ) {
                          echo '<td>';
                          echo $val;
                          echo '</td>';
                        }
          						echo '<td>';
								
								echo '<a class="btn btn-primary btn-sm" href="download.php?dow='.$path.'" '.$disabled.'>Download</a>';
								echo '&nbsp;';
								echo ' <a class="btn btn-danger btn-sm" name="end_letter" href="notification2.php?Student_Id='.$stud_id.'" '.$disabled1.'>Notify</a>';
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
