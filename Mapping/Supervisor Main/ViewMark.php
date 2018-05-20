<?php
include("SupervisorCheck.php"); 
//getting id from url
$id = $login_user;

$id = $_GET['Student_Id'];

$result = mysqli_query($db, "Select student.Student_Name FROM student INNER JOIN stud_attachment ON student.Student_Id = stud_attachment.Student_Id INNER JOIN company ON stud_attachment.Company_Id = company.Company_Id INNER JOIN sv_assignment ON sv_assignment.Group_Id = company.Group_Id INNER JOIN supervisor ON sv_assignment.Supervisor_Id = supervisor.Supervisor_Id WHERE supervisor.Supervisor_StaffID ='$login_user' AND student.Student_Id=$id");



while($res = mysqli_fetch_array($result))
{
	$name = $res['Student_Name'];
    
}

$Feedback =  mysqli_query($db, "Select student.* , feedback.* From feedback RIGHT JOIN student ON feedback.Student_Id = student.Student_Id WHERE student.Student_Id =$id");
while($res1 = mysqli_fetch_array($Feedback))
{
	$time_submit = $res1['time_submit'];
	if($time_submit == NULL)
	{
	 $CHECK = "checked=checked";
	 $CHECK1 = " ";
	}
	else
	{
	 $CHECK = "";
	 $CHECK1 = "checked=checked";
	}
    
}

$End =  mysqli_query($db, "Select student.* , pdf.* From pdf RIGHT JOIN student ON pdf.Student_Id = student.Student_Id WHERE student.Student_Id =$id");
while($res2 = mysqli_fetch_array($End))
{
	$time_submit = $res2['time_submit'];
	if($time_submit == NULL)
	{
	 $CHECK2 = "checked=checked";
	 $CHECK3 = " ";
	}
	else
	{
	 $CHECK2 = "";
	 $CHECK3 = "checked=checked";
	}
    
}

$logbook_mark =  mysqli_query($db, "Select student.* , logbook_mark.* From logbook_mark RIGHT JOIN student ON logbook_mark.Student_Id = student.Student_Id WHERE student.Student_Id =$id");
while($res3 = mysqli_fetch_array($logbook_mark))
{
	$time_submit = $res3['time_submit'];
	if($time_submit == NULL)
	{
	 $CHECK4 = "checked=checked";
	 $CHECK5 = " ";
	}
	else
	{
	 $CHECK4 = "";
	 $CHECK5 = "checked=checked";
	}
    
}

$logbook_mark =  mysqli_query($db, "Select student.* , logbook_mark.* From logbook_mark RIGHT JOIN student ON logbook_mark.Student_Id = student.Student_Id WHERE student.Student_Id =$id");
while($res3 = mysqli_fetch_array($logbook_mark))
{
	$time_submit = $res3['time_submit'];
	if($time_submit == NULL)
	{
	 $CHECK4 = "checked=checked";
	 $CHECK5 = " ";
	}
	else
	{
	 $CHECK4 = "";
	 $CHECK5 = "checked=checked";
	}
    
}

$report =  mysqli_query($db, "Select student.* , report.* From report RIGHT JOIN student ON report.Student_Id = student.Student_Id WHERE student.Student_Id =$id");
while($res4 = mysqli_fetch_array($report))
{
	$time_submit = $res4['time_submit'];
	if($time_submit == NULL)
	{
	 $CHECK6 = "checked=checked";
	 $CHECK7 = " ";
	}
	else
	{
	 $CHECK6 = "";
	 $CHECK7 = "checked=checked";
	}
    
}

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Supervisor Main</title>
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
</head>

<body>
    <div class="wrapper">
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
                                    <h4 class="title">Atitude Assessment BITU 3926</h4>
                                  
                                </div>
                                <div class="card-content">
                                <form action="insert_Atitude.php" method="POST">
                                
                                <div class="row">
                                <div class="form-group">
                                <label class="col-sm-4" for="Student_Id">Student Name*:</label>
                                <div class="col-sm-6">
                                <input type="text" class="form-control" id="Student_Id" name="Student_Id" 
                                value="<?php echo $name?>" readonly/>
                                </div>
                                </div>
                                </div>
                                   
                                <div class="form-group has-success has-feedback">
                                <label class="col-sm-4"for="Feedback_Form">1. Feedback Form:</label>
                                <div class="col-sm-8">
                                <span style="display:inline-block; width:50px;"></span>
                                <input type="checkbox" name="Feedback_Form" value="2" <?php echo $CHECK1;?> 
                                 onclick="return false;"> Yes
                                <input type="checkbox" name="Feedback_Form" value="0"  <?php echo $CHECK;?> 
                                 onclick="return false;" > No
                                </div>
                                </div>
                                 
  								                        
                                    
                                <div class="form-group has-success has-feedback">
                                <label class="col-sm-4"for="End_Letter">2. End Internship Confirmation Letter:</label>
                                <div class="col-sm-8">
                                <span style="display:inline-block; width:50px;"></span>
                                <input type="checkbox" name="End_Letter" value="2" <?php echo $CHECK3;?> 
                                onclick="return false;"> Yes
                                <input type="checkbox" name="End_Letter" value="0" <?php echo $CHECK2;?>
                                onclick="return false;"> No
                                </div>
                                </div>
                                
                                <div class="form-group has-success has-feedback">
                                <label class="col-sm-4"for="Logbook">3. Logbook:</label>
                                <div class="col-sm-8">
                                <span style="display:inline-block; width:50px;"></span>
                                <input type="checkbox" name="Logbook" value="2" <?php echo $CHECK5;?>
                                onclick="return false;"> Yes
                                <input type="checkbox" name="Logbook" value="0" <?php echo $CHECK4;?>
                                onclick="return false;"> No
                                </div>
                                </div>  
                                
                                <div class="form-group has-success has-feedback">
                                <label class="col-sm-4"for="Report">4. Internship Report:</label>
                                <div class="col-sm-8">
                                <span style="display:inline-block; width:50px;"></span>
                                <input type="checkbox" name="Report" value="2" <?php echo $CHECK7;?>
                                onclick="return false;"> Yes
                                <input type="checkbox" name="Report" value="0" <?php echo $CHECK6;?>
                                onclick="return false;"> No
                                </div>
                                </div>  
                                
                                                                    
                                    
                           
                               
                                       
                            <div class="clearfix"></div>
                                              </form>
                                    
                                    
                                      <!--end form-->
                               
                                </div> <!--card content-->
                            </div> <!--card--> 
                        </div> <!--col12-->
                      </div> <!--row-->
                </div> <!--content-->
            </div><!--container-->
            
              <?php include "../Footer.php"; ?>         
  
        </div> <!--main panel-->
    </div> <!--wrapper-->
    
</body>
<?php include "../Footer2.php"; ?>
</html>