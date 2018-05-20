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
                                    <h4 class="title">Internship Asseassment(Faculty Supervisor)BITU 3926</h4>
                                 </div>
                                 
                                 
                                <div class="card-content">
                                
                                <!--form-->
                                <form action="saveass.php" method="POST" class="form-horizontal" name="form1">
                                
                                
                                <div class="form-group">
                                <label class="col-sm-3" for="Student_Id">Student Name*:</label>
                                <div class="col-sm-6">
                                <input type="text" class="form-control" id="Student_Id" name="Student_Id" value="<?php echo $name?>" readonly/>
                                </div>
                                </div>
                                
                                <h5 class="text-center"><strong>Section A:KNOWLEDGE, SKILLS AND PERFORMANCE</strong></h5>
                                
                                <div class="form-group">
                                <h6><strong>1. Knowledge and Skills</strong></h6>
								<label class="col-sm-8" for="QA1">In-depth knowledge and skill possessed/gained by executing all the task given in:</label>
                                
                               
                                 <h6 class="col-sm-12"><strong>Administartion and Management</strong></h6>
                                
                               
                                 <label class="col-sm-6" for="QA1">(Eg.:Preparing material,attending and conducting meeting/courses/discussion/presentation and other administrative task)</label>
                                 
                                <div class="col-sm-3">
                               <input type="number" class="form-control" name="QA1" id="QA1" min="0" max="10" step="0.5" 
                               value="0">(Full Mark:10)
                                </div>
                                </div>
                                
                               <div class="form-group">  
                               <h6 class="col-sm-12"><strong>Technical</strong></h6>
                               <label class="col-sm-6" for="QA11">(Eg.:Analyzing,Designing,Developing,
                               Implementing,Documenting,Testing and Maintaining ICT system)</label>
                                 
                                <div class="col-sm-3">
                                <input type="number" class="form-control" name="QA11" id="QA11" min="0" max="20" 
                                step="0.5" value="0">(Full Mark:20)
                                </div>
                                </div>
                                
                                 
                                <div class="form-group">
                                <h6 class="col-sm-12"><strong>2. Quantity Of Work</strong></h6>
                                <label class="col-sm-8" for="QA2">Accomplish the quantity of task that have been set successfully</label>
                                 
                                 
                                 <h6 class="col-sm-12"><strong>Administartion and Management</strong></h6>
                               
                                
                                <label class="col-sm-6" for="QA2">(Eg.:Present the material,attends and conducts meeting/courses/discussion/presentation and other administrative task)</label> 
                                   
                                <div class="col-sm-3">
                               <input type="number" class="form-control" name="QA2" id="QA2" min="0" max="10" step="0.5" 
                               value="0">(Full Mark:10)
                                </div>
                                </div>
                                
                                
                                 <div class="form-group">
                               <h6 class="col-sm-12"><strong>Technical</strong></h6>
                              <label class="col-sm-6" for="QA21">(Eg.:Present the outcome of the project such as system, database or web design that been produced include the report and document)</label>
                                 
                                <div class="col-sm-3">
                               <input type="number" class="form-control" name="QA21" id="QA21" min="0" max="20" 
                               step="0.5" value="0">(Full Mark:20)
                                </div>
                                </div>
                                
                                <div class="form-group">
                                <h6 class="col-sm-12"><strong>3. Quality Of Work</strong></h6>
                              <label class="col-sm-6" for="QA3">Accomplish the task that according to the target for quality of work that have been set successfully</label>
                            
                          
                                <div class="col-sm-3">
                                <input type="number" class="form-control" name="QA3" id="QA3" min="0" max="30" 
                                step="0.5" value="0">(Full Mark:30)
                                </div>
                                </div>
                               
                              <h5 class="text-center"><strong>Section B:DISCIPLINE OF TRAINEE</strong></h5>
                              <div class="form-group">
                              
                                
                                <label class="col-sm-6" for="QB1">Dediacation and responsibilities, cooperation, discipline and attire, competitiveness,leaadership and the ability to make a decision, communication</label>
                                   
                                <div class="col-sm-3">
                                 <input type="number" class="form-control" name="QB1" id="QB1" min="0" max="10" 
                                step="0.5" value="0">(Full Mark:10)
                               </select>
                                </div>
                              </div>

							  <h5 class="text-center"><strong>Section C:OVERALL COMMENTS</strong></h5>
                           
                              <div class="form-group">
                                <h6 class="col-sm-9" for="QC1"><strong>Give overall comments on the trainee's job performance, discipline, potential and others</strong></h6>
                                <div class="col-sm-12">
                                <textarea class="col-sm-12" rows="5" id="QC1" name="QC1" placeholder="Comments" required/></textarea>
                                </div>    
                                </div>
                               
                              
                              
                                <div class="form-group">
                                <h6 class="col-sm-6" for="QC2"><strong>Overall Assesment</strong></h6> 
                                   
                                <div class="col-sm-3">
                                <select class="form-control" id="QC2" name="QC2" required/>
                                <option selected>Please Select</option>
                                <option>Not Satisfactory</option>
                                <option>Less Satisfactory</option>
                                <option>Satisfactory</option>
                                <option>Good</option>
                                <option>Excellent</option>
                            </select>
                                </div>
                                </div>  
                                
                                
                                                              
                               <div class="form-group">
                              <h6 class="col-sm-6" for="QC3"><strong>Internship Status</strong></h6>
                                 
                                <div class="col-sm-3">
                                <select class="form-control" id="QC3" name="QC3" required/>
                                <option selected>Please Select</option>
                                <option>Pass</option>
                                <option>Fail</option>
                               </select>
                                </div>
                                </div>
                                
                                
                                 <div class="form-group">
                                <h6 class="col-sm-7" for="QC4"><strong>If student fails, please put a comments</strong></h6>
                                <div class="col-sm-12">
                                <textarea class="col-sm-12" rows="5" id="QC4" name="QC4" placeholder="Comment"></textarea>
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

