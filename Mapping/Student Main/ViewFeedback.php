<?php
include("StudentCheck.php"); 
//getting id from url
$id = $login_user;


$result2 = mysqli_query($db, 'SELECT student.Student_Matric,supervisor.Supervisor_Name, supervisor.Supervisor_StaffID,student.Student_Id,student.Student_Name,feedback.Student_Course,feedback.QA1, feedback.QA2,feedback.QA3,feedback.QA4,feedback.QA5,feedback.QA5,feedback.QA6,feedback.QA7,feedback.QA8,feedback.QB1,feedback.QB2,feedback.QB3,feedback.QB4,feedback.QB5,feedback.QB6,feedback.QB7, feedback.QB8,feedback.QB9,feedback.QB10,feedback.QC1,feedback.QC2,feedback.QC3 FROM feedback INNER JOIN student ON feedback.Student_Id = student.Student_Id INNER JOIN supervisor ON feedback.Supervisor_Id = supervisor.Supervisor_Id WHERE 
student.Student_Matric = "'.$id.'"');

while($res2 = mysqli_fetch_array($result2))
{
	$id = $res2['Student_Id'];
	$matric = $res2['Student_Matric'];
	$name = $res2['Student_Name'];
	$course = $res2['Student_Course'];
	$qa1 = $res2['QA1'];
	$qa2 = $res2['QA2'];
	$qa3 = $res2['QA3'];
	$qa4  = $res2['QA4'];
	$qa5  = $res2['QA5'];
	$qa6 = $res2['QA6'];
	$qa7 = $res2['QA7'];
	$qa8 = $res2['QA8'];
	$qb1 = $res2['QB1'];
	$qb2 = $res2['QB2'];
	$qb3 = $res2['QB3'];
	$qb4 = $res2['QB4'];
	$qb5 = $res2['QB5'];
	$qb6 = $res2['QB6'];
	$qb7 = $res2['QB7'];
	$qb8 = $res2['QB8'];
	$qb9 = $res2['QB9'];
	$qb10 = $res2['QB10'];
	$qc1 = $res2['QC1'];
	$qc2 = $res2['QC2'];
	$qc3 = $res2['QC3'];
	$svname = $res2['Supervisor_Name'];
	$error = "";

	
}
    
if(mysqli_num_rows($result2)==0)
 {
	echo "<script>
alert('You Do Not Submit Feedback Form Yet ! Please Submit Feedback Form.');
window.location.href='StudentMain2.php';
</script>";
	
	 
 }

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Feedback</title>
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
                                  
                                </div>
                                <div class="card-content">
                                    <form>
                                        <div class="row">
                                        <h5 class="text-center"><u><strong><?php echo $error; ?></strong></u></h5>
                                            <div class="col-md-3">
                                             <div class="form-group label-floating">
                                                <h6 class="h6"><strong>Matric No</strong></h6>
    <input type="text" class="form-control" value="<?php echo $matric; ?>" disabled>
                                                </div> 
  													</div>
                                                    <div class="col-md-6">
                                         <div class="form-group label-floating">
                                                    <h6 class="h6"><strong>Name</strong></h6>
          <input type="text" class="form-control" value="<?php echo $name; ?>" disabled>
                                                </div>  
                                                 </div>
                                                  <div class="col-md-3">
                                             <div class="form-group label-floating">
                                             <h6 class="h6"><strong>Course</strong></h6>
    <input type="text" class="form-control" value="<?php echo $course; ?>" disabled>
                                                </div> 
  													</div>
                                                </div>
                                                
                                            <div class="row"> 
                                            <h5 class="text-center"><u>Feedback Part A : Organization Assessment</u></h5>   
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <h6 class="h6"><strong>1. Cooperation</strong></h6>
                                                    <input type="text" class="form-control" value="<?php echo $qa1; ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <h6 class="h6"><strong>2. Guidance</strong></h6>
                                                    <input type="text" class="form-control" value="<?php echo $qa2; ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <h6 class="h6"><strong>3. Work load.</strong></h6>
                                                    <input type="text" class="form-control" value="<?php echo $qa5 ?>" disabled>
                                                </div>
                                            </div>
                                            </div>
                                            
                                             <div class="row"> 
                                             <h6 class="h6"><strong>4. Internship Scope</strong>:</h6>
                                            <div class="col-md-6">
                                          
                                                <div class="form-group label-floating">
                                                   <h6 class="h6">I) Compatibility with specialization course.</h6>
                                                    <input type="text" class="form-control" value="<?php echo $qa3 ?>" disabled>
                                                </div>
                                            </div>
                                     
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <h6 class="h6">II) Compliance with the field of ICT in general.</h6>
                                                    <input type="text" class="form-control" value="<?php echo $qa4; ?>" disabled>
                                                </div>
                                            </div> 
                                            </div>
                                            
                                             <div class="row"> 
                                             <h6 class="h6"><strong>5. Facilities provided:</strong></h6>
                                            <div class="col-md-4">
                                          
                                                <div class="form-group label-floating">
                                                    <h6 class="h6">I) Computer.</h6>
                                                    <input type="text" class="form-control" value="<?php echo $qa6 ?>" disabled>
                                                </div>
                                            </div>
                                     
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <h6 class="h6">II) Allowance.</h6>
                                                    <input type="text" class="form-control" value="<?php echo $qa7; ?>" disabled>
                                                </div>
                                            </div> 
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <h6 class="h6">III) Room </h6>
                                                    <input type="text" class="form-control" value="<?php echo $qa8; ?>" disabled>
                                                </div>
                                            </div> 
                                            </div>
                                            
                                             <div class="row"> 
                                            <h5 class="text-center"><u>Feedback Part B : Organization Info</u></h5>   
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <h6 class="h6"><strong>1. Your internship training venue is suitable for:</strong></h6>
                                                    <input type="text" class="form-control" value="<?php echo $qb1; ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <h6 class="h6"><strong>2. The programming language used at the internship training site:</strong></h6>
                                                    <input type="text" class="form-control" value="<?php echo $qb2; ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <h6 class="h6"><strong>3. The Operating System used at the internship training site:</strong></h6>
                                                    <input type="text" class="form-control" value="<?php echo $qb3 ?>" disabled>
                                                </div>
                                            </div>
                                            </div>
                                            
                                             <div class="row"> 
                                             <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <h6 class="h6"><strong> 4. The Computer Type used at the internship training site:</strong></h6>
                                                    <input type="text" class="form-control" value="<?php echo $qb4; ?>" disabled>
                                                </div>
                                            </div>
                                          
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <h6 class="h6"><strong>5. The Database used at the internship training site:</strong></h6>
                                                    <input type="text" class="form-control" value="<?php echo $qb5; ?>" disabled>
                                                </div>
                                            </div>
                                     
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <h6 class="h6"><strong>6. The Software used at the internship training site:</strong></h6>
                                                    <input type="text" class="form-control" value="<?php echo $qb6; ?>" disabled>
                                                </div>
                                            </div>
                                            </div>
                                            
                                            
                                             <div class="row"> 
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <h6 class="h6"><strong>7. The Information System used at the internship training site:</strong></h6>
                                                    <input type="text" class="form-control" value="<?php echo $qb7; ?>" disabled>
                                                </div>
                                            </div>
                                            
                                         <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <h6 class="h6"><strong>8. Software Development Techniques used:</strong></h6>
                                                    <input type="text" class="form-control" value="<?php echo $qb8; ?>" disabled>
                                                </div>
                                            </div>
                                            </div>
                                     
                                          <div class="row"> 
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <h6 class="h6"><strong>9. The Activity done at the internship training site:</strong></h6>
                                                    <input type="text" class="form-control" value="<?php echo $qb9; ?>" disabled>
                                                </div>
                                            </div>
                                            
                                         <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <h6 class="h6"><strong>10. Got an offer to work in an industry training?:</strong></h6>
                                                    <input type="text" class="form-control" value="<?php echo $qb10; ?>" disabled>
                                                </div>
                                            </div>
                                           
                                            </div>
                                            
                                             <div class="row"> 
                                            <h5 class="text-center"><u>Feedback Part C : Assessment of the Curriculum Course</u></h5>    <h6 class="h6"><strong>1. Please inform whether the knowledge and skills learned in UTeM are sufficient and appropriate to the tasks being given and requested by the industry:</strong></h6>
                                            <div class="col-md-6">
                                         
                                                <div class="form-group label-floating">
                                                    <h6 class="h6">a) Sufficient</h6>
                                                    <input type="text" class="form-control" value="<?php echo $qc1; ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <h6 class="h6">b) Suitable.</h6>
                                                    <input type="text" class="form-control" value="<?php echo $qc2; ?>" disabled>
                                                </div>
                                            </div>
                                            </div>
                                            
                                            <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <h6 class="h6"><strong>Please provide comments and suggestions based on statements 1 (a) and 1 (b).</strong></h6>
                                                    <textarea name="QC3" id="QC3" class="form-control" disabled><?php echo $qc3; ?></textarea>
                                                  
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
