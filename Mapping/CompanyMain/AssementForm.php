<?php
include("Check.php"); 
//getting id from url
$id = $login_user;
 

$id = $_GET['Student_Id'];
 


$result = mysqli_query($db, "SELECT student.Student_Name FROM student INNER JOIN stud_attachment ON stud_attachment.Student_Id=student.Student_Id INNER JOIN company ON stud_attachment.Company_Id=company.Company_Id WHERE company.Company_Id =$login_user AND student.Student_Id=$id");



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
    <?php include "CompanyNav.php"; ?>
        <div class="main-panel">
          <?php include "CompanyHeader.php"; ?>
          

          
          <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                            
                            
                                <div class="card-header" data-background-color="red">
                                    <h4 class="title">Internship Assesment(Industry Supervisor)</h4>
                                 </div>
                                 
                                 
                                <div class="card-content">
                                
                                <!--form-->
                                <form action="addAss.php" method="POST" class="form-horizontal" name="form1">
                                
                                
                                <div class="form-group">
                                <label class="col-sm-3" for="Student_Id">Student Name*:</label>
                                <div class="col-sm-6">
                                <input type="text" class="form-control" id="Student_Id" name="Student_Id" value="<?php echo $name?>" readonly/>
                                </div>
                                </div>
                                
                                <div class="form-group">
                                <label class="col-sm-3" for="Supervisor_Name">Industry Supervisor Name*:</label>
                                <div class="col-sm-6">
                                <input type="text" class="form-control" id="Supervisor_Name" name="Supervisor_Name" placeholder="Supervisor Name" required/>
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
                               <label class="col-sm-6" for="QA2">(Eg.:Analyzing,Designing,Developing,
                               Implementing,Documenting,Testing and Maintaining ICT system)</label>
                                 
                                <div class="col-sm-3">
                                <input type="number" class="form-control" name="QA2" id="QA2" min="0" max="20" step="0.5" 
                               value="0">(Full Mark:20)
                                </div>
                                </div>
                                
                                 
                                <div class="form-group">
                                <h6 class="col-sm-12"><strong>2. Quantity Of Work</strong></h6>
                                <label class="col-sm-6" for="QA3">Accomplish the quantity of task that have been set successfully</label>
                                <div class="col-sm-3">
                            <input type="number" class="form-control" name="QA3" id="QA3" min="0" max="10" step="0.5" 
                               value="0">(Full Mark:10)
                                </div>
                                </div>
                                
                                
                                 
                                <div class="form-group">
                                <h6 class="col-sm-12"><strong>3. Quality Of Work</strong></h6>
                              <label class="col-sm-6" for="QA4">Accomplish the task that according to the target for quality of work that have been set successfully</label>
                            
                          
                                <div class="col-sm-3">
                                 <input type="number" class="form-control" name="QA4" id="QA4" min="0" max="10" step="0.5" 
                               value="0">(Full Mark:10)
                                </div>
                                </div>
                               
                              <h5 class="text-center"><strong>Section B:DISCIPLINE OF TRAINEE</strong></h5>
                              
                              
                              <div class="form-group">
                             <h6 class="col-sm-12"><strong>1. Time Management</strong></h6> 
                                
                                <label class="col-sm-6" for="QB1">The ability to carry out tasks within the specified time frame and use time wisely</label>
                                   
                                <div class="col-sm-3">
                                <input type="number" class="form-control" name="QB1" id="QB1" min="0" max="5" step="0.5" 
                               value="0">(Full Mark:5)
                                </div>
                              </div>
                              
                              <div class="form-group">
                             <h6 class="col-sm-12"><strong>2. Problem Solving Skill</strong></h6> 
                                
                                <label class="col-sm-6" for="QB2">The ability to analyze problems in various views and able to propose alternative solutions and choose the best solution.</label>
                                   
                                <div class="col-sm-3">
                               <input type="number" class="form-control" name="QB2" id="QB2" min="0" max="5" step="0.5" 
                               value="0">(Full Mark:5)
                                </div>
                              </div>
                              
                              <div class="form-group">
                             <h6 class="col-sm-12"><strong>3. Management Skill</strong></h6> 
                                
                                <label class="col-sm-6" for="QB3">The ability to manage and utilize available resources in accomplishing the task</label>
                                   
                                <div class="col-sm-3">
                              <input type="number" class="form-control" name="QB3" id="QB3" min="0" max="5" step="0.5" 
                               value="0">(Full Mark:5)
                                </div>
                              </div>
                              
                              <div class="form-group">
                             <h6 class="col-sm-12"><strong>4. Effectiveness Of Communication</strong></h6> 
                                
                                <label class="col-sm-6" for="QB4">The ability to communicate in a logical,clear and structured manner,orally and in writing</label>
                                   
                                <div class="col-sm-3">
                               <input type="number" class="form-control" name="QB4" id="QB4" min="0" max="5" step="0.5" 
                               value="0">(Full Mark:5)
                                </div>
                              </div>
                              
                              <div class="form-group">
                             <h6 class="col-sm-12"><strong>5. Socialization and Cooperation</strong></h6> 
                                
                                <label class="col-sm-6" for="QB5">The ability to adapt in all situations and commit with other staff in completing assigned tasks</label>
                                   
                                <div class="col-sm-3">
                                <input type="number" class="form-control" name="QB5" id="QB5" min="0" max="5" step="0.5" 
                               value="0">(Full Mark:5)
                                </div>
                              </div>
                              
                              <div class="form-group">
                             <h6 class="col-sm-12"><strong>6.Dicipline</strong></h6> 
                                
                                <label class="col-sm-6" for="QB6">The ability to himself/herself (mentally and physically), and abide to the organiztion rule well as having proper attire according to work environment</label>
                                   
                                <div class="col-sm-3">
                               <input type="number" class="form-control" name="QB6" id="QB6" min="0" max="5" step="0.5" 
                               value="0">(Full Mark:5)
                                </div>
                              </div>
                              
                              <div class="form-group">
                             <h6 class="col-sm-12"><strong>7. Ability To Face Challenges</strong></h6> 
                                
                                <label class="col-sm-6" for="QB7">The ability to face and overcome internal and external challenges in the constantly changing environtment as as striving to positively compete with others in carrying out assigned tasks</label>
                                   
                                <div class="col-sm-3">
                                 <input type="number" class="form-control" name="QB7" id="QB7" min="0" max="5" step="0.5" 
                               value="0">(Full Mark:5)
                                </div>
                              </div>
                              
                              <div class="form-group">
                             <h6 class="col-sm-12"><strong>8. Leadership</strong></h6> 
                                
                                <label class="col-sm-6" for="QB8">The ability to plan, manage and make decision in achieving the task goals that have been set and leadership quality which can be followed by others</label>
                                   
                                <div class="col-sm-3">
                           <input type="number" class="form-control" name="QB8" id="QB8" min="0" max="5" step="0.5" 
                               value="0">(Full Mark:5)
                                </div>
                              </div>
                              
                              <div class="form-group">
                             <h6 class="col-sm-12"><strong>9. Commitment</strong></h6> 
                                
                                <label class="col-sm-6" for="QB9">Committed and initiative, dedicated, hardworking and willing to accept and carry put the responsibilities given</label>
                                   
                                <div class="col-sm-3">
                              <input type="number" class="form-control" name="QB9" id="QB9" min="0" max="5" step="0.5" 
                               value="0">(Full Mark:5)
                                </div>
                              </div>
                              
                              <div class="form-group">
                             <h6 class="col-sm-12"><strong>10. Proactive, Creative and Innovative</strong></h6> 
                                
                                <label class="col-sm-6" for="QB10">Always get involve in giving his/her opinions and ideas during group discussion to improve his/her quality of work</label>
                                   
                                <div class="col-sm-3">
                               <input type="number" class="form-control" name="QB10" id="QB10" min="0" max="5" step="0.5" 
                               value="0">(Full Mark:5)
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

