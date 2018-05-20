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

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Supervisor</title>
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
    <?php include "SupervisorNav.php"; ?>
        <div class="main-panel">
          <?php include "SupervisorHeader.php"; ?>
          

          
          <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                            
                            
                                <div class="card-header" data-background-color="red">
                                    <h4 class="title">Presentation Assesment(Faculty Supervisor)BITU 3946</h4>
                                 </div>
                                 
                                 
                                <div class="card-content">
                                
                                <!--form-->
                                <form action="save_pres.php" method="POST" class="form-horizontal" name="form1">
                                
                                
                                <div class="form-group">
                                <label class="col-sm-3" for="Student_Id">Student Name*:</label>
                                <div class="col-sm-6">
                               <input type="text" class="form-control" id="Student_Id" name="Student_Id" value="<?php echo $name?>" readonly/>
                                </div>
                                </div>
                                
                                
                                <h5 class="text-center"><strong>Section A:Preparation</strong></h5>
                                
                                
                                <div class="row">
                                
                                <div class="form-group">
                                 <h6 class="col-md-6"><strong>1. Good preparation and use visual aid appropriately</strong></h6>
                                 <div class="col-sm-3">
                             <input type="number" class="form-control" name="QA1" id="QA1" min="0" max="5" step="0.5" 
                               value="0">(Full Mark:5)
                                </div>
                                </div>
                                </div>
                                
                                
								<h5 class="text-center"><strong>Section B:Presentation</strong></h5>
                                
                                
                                <div class="row">
                                
                                 <div class="form-group">
                                 <h6 class="col-md-6"><strong>1. Presentation style</strong></h6>
                                 <div class="col-sm-3">
                               <input type="number" class="form-control" name="QB1" id="QB1" min="0" max="10" step="0.5" 
                               value="0">(Full Mark:10)
                                </div>
                                </div>
                                </div>
                               
                           
                                <div class="row">
                                
                                 <div class="form-group">
                                 <h6 class="col-md-6"><strong>2. Confidence and energetic presentation</strong></h6>
                                 <div class="col-sm-3">
                               <input type="number" class="form-control" name="QB2" id="QB2" min="0" max="10" step="0.5" 
                               value="0">(Full Mark:10)
                                </div>
                                </div>
                                </div>
                                
                                 <div class="row">
                                
                                 <div class="form-group">
                                 <h6 class="col-md-6"><strong>3.Well organize and structured presentation.</strong></h6>
                                 <div class="col-sm-3">
                                <input type="number" class="form-control" name="QB3" id="QB3" min="0" max="10" step="0.5" 
                               value="0">(Full Mark:10)
                                </div>
                                </div>
                                </div>
                                
                                <div class="row">
                                
                                 <div class="form-group">
                                 <h6 class="col-md-6"><strong>4. Fluency of the delivery</strong></h6>
                                 <div class="col-sm-3">
                              <input type="number" class="form-control" name="QB4" id="QB4" min="0" max="10" step="0.5" 
                               value="0">(Full Mark:10)
                                </div>
                                </div>
                                </div>
                                
                                 <div class="row">
                                
                                 <div class="form-group">
                                 <h6 class="col-md-6"><strong>5. Clear and understandable presentation</strong></h6>
                                 <div class="col-sm-3">
                                <input type="number" class="form-control" name="QB5" id="QB5" min="0" max="10" step="0.5" 
                               value="0">(Full Mark:10)
                                </div>
                                </div>
                                </div>
                               
                               
                                 <h5 class="text-center"><strong>Section C:Content</strong></h5>
                             
                                 <div class="row">
                                
                                 <div class="form-group">
                                 <h6 class="col-md-6"><strong>1. Intoduction</strong></h6>
                                
                                 <div class="col-sm-3">
                              <input type="number" class="form-control" name="QC1" id="QC1" min="0" max="5" step="0.5" 
                               value="0">(Full Mark:5)
                                </div>
                                </div>
                                </div>
                                
                                 <div class="row">
                                
                                 <div class="form-group">
                                 <h6 class="col-md-6"><strong>2. Description of the implemented task(s)/project(s)</strong></h6>
                                
                                 <div class="col-sm-3">
                            <input type="number" class="form-control" name="QC2" id="QC2" min="0" max="20" step="0.5" 
                               value="0">(Full Mark:20)
                                </div>
                                </div>
                                </div>
                                
                                 <div class="row">
                                
                                 <div class="form-group">
                                 <h6 class="col-md-6"><strong>3. Conclusion</strong></h6>
                                 
                                 <div class="col-sm-3">
                              <input type="number" class="form-control" name="QC3" id="QC3" min="0" max="10" step="0.5" 
                               value="0">(Full Mark:10)
                                </div>
                                </div>
                                </div>
                                
                                 
                                <h5 class="text-center"><strong>Section D:QUESTION and ANSWER</strong></h5>
                             
                                 <div class="row">
                                
                                 <div class="form-group">
                                 <h6 class="col-md-6"><strong>1. Understand question well</strong></h6>
                                 <div class="col-sm-3">
                              <input type="number" class="form-control" name="QD1" id="QD1" min="0" max="3" step="0.5" 
                               value="0">(Full Mark:3)
                                </div>
                                </div>
                                </div>
                                
                                 <div class="row">
                                
                                 <div class="form-group">
                                 <h6 class="col-md-6"><strong>2. Pay attention to the questions</strong></h6>
                                 <div class="col-sm-3">
                               <input type="number" class="form-control" name="QD2" id="QD2" min="0" max="2" step="0.5" 
                               value="0">(Full Mark:2)
                                </div>
                                </div>
                                </div>
                                
                                 <div class="row">
                                
                                 <div class="form-group">
                                 <h6 class="col-md-6"><strong>3. Answer question calmly and confidently</strong></h6>
                                
                                 <div class="col-sm-3">
                               <input type="number" class="form-control" name="QD3" id="QD3" min="0" max="2" step="0.5" 
                               value="0">(Full Mark:2)
                                </div>
                                </div>
                                </div>
                                
                                <div class="row">
                                
                                 <div class="form-group">
                                 <h6 class="col-md-6"><strong>4. Answers given satisfactory</strong></h6>
                                
                                 <div class="col-sm-3">
                           <input type="number" class="form-control" name="QD4" id="QD4" min="0" max="3" step="0.5" 
                               value="0">(Full Mark:3)
                                </div>
                                </div>
                                </div>
                                
                               
                            
                           
                              <div class="form-group"> 
                              <div class="col-sm-offset-5 col-sm-10">
                              <button type="submit" id="Submit" name="Submit" class="btn btn-default">Submit</button>
                              </div>
                              </div>
                              
                              </form>
                              <!--end form-->

                              
                              
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

