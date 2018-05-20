<?php
include("StudentCheck.php"); 
//getting id from url
$id = $login_user;
 
//selecting data associated with this particular id
$result = mysqli_query($db, 'SELECT student.Student_Id,student.Student_Name,student.Student_Matric,student.Student_Course,student.semester_session,student.Student_Phone,supervisor.Supervisor_Name,company.Company_Name,stud_attachment.Start_Date,stud_attachment.Finish_Date,stud_attachment.Intern_Status FROM student INNER JOIN stud_attachment ON student.Student_Id = stud_attachment.Student_Id INNER JOIN company ON company.Company_Id = stud_attachment.Company_Id INNER JOIN sv_assignment ON company.Group_Id = sv_assignment.Group_Id INNER JOIN supervisor ON supervisor.Supervisor_Id = sv_assignment.Supervisor_Id WHERE student.Student_Matric="'.$id.'"');
 
while($res = mysqli_fetch_array($result))
{
	
    $matric = $res['Student_Matric'];
    $name = $res['Student_Name'];
	$course = $res['Student_Course'];
	$session = $res['semester_session'];
	$phone = $res['Student_Phone'];
	$svname = $res['Supervisor_Name'];
	$company = $res['Company_Name'];
	$start = $res['Start_Date'];
	$finish = $res['Finish_Date'];
	$status = $res['Intern_Status'];
	$error = " ";
	
	
	
    
}

if(mysqli_num_rows($result)==0)
{
	
    $matric = " ";
    $name = " ";
	$course = " ";
	$session = " ";
	$phone = " ";
	$svname = " ";
	$company = " ";
	$start = " ";
	$finish = " ";
	$status = " ";
	$error = "Internship Details Not Available";
	
	
	
    
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Student Main</title>
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
    <?php include "StudentNav.php"; ?>
        <div class="main-panel">
          <?php include "NavHeader.php"; ?>
          
          
       <div class="content">
         <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="red">
                                    <h4 class="title"><?php echo $name; ?></h4>
                                     <h4 class="title"><?php echo $error; ?></h4>
                                  
                                </div>
                                <div class="card-content">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-4">
                                             <div class="form-group label-floating">
                                             <label class="control-label">Matric No</label>
    <input type="text" class="form-control" value="<?php echo $matric; ?>" disabled>
                                                </div> 
  													</div>
                                                    <div class="col-md-8">
                                         <div class="form-group label-floating">
                                                    <label class="control-label">Name</label>
          <input type="text" class="form-control" value="<?php echo $name; ?>" disabled>
                                                </div>   </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Course</label>
                                                    <input type="text" class="form-control" value="<?php echo $course; ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Sem/Session</label>
                                                    <input type="text" class="form-control" value="<?php echo $session ?>" disabled>
                                                </div>
                                            </div>
                                       
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Student Phone Number</label>
                                                    <input type="text" class="form-control" value="<?php echo $phone; ?>" disabled>
                                                </div>
                                            </div> 
                                            </div>
                                            
                                             <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Company Name</label>
                                                    <input type="text" class="form-control" value="<?php echo $company; ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Supervisor Name</label>
                                                    <input type="text" class="form-control" value="<?php echo $svname ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                          <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Start Date</label>
                                                    <input type="text" class="form-control" value="<?php echo $start; ?>" disabled>
                                                </div>
                                            </div> 
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Finish Date</label>
                                                    <input type="text" class="form-control" value="<?php echo $finish; ?>" disabled>
                                                </div>
                                            </div> 
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Internship Status</label>
                                                    <input type="text" class="form-control" value="<?php echo $status; ?>" disabled>
                                                </div>
                                            </div> 
                                            </div>
                                             
                                       
 <div class="clearfix"></div>
                                    </form>
                  <!--end form-->
                              
                                </div> <!--card content-->
                            </div> <!--card--> 
                        </div> <!--col12-->
                      
                </div> <!--content-->
            </div><!--container-->
            
              <?php include "../Footer.php"; ?>         
  
        </div> <!--main panel-->
    </div> <!--wrapper-->
    
</body>
<?php include "../Footer2.php"; ?>
</html>

