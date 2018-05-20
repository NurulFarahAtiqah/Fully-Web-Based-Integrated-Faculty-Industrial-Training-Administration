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
                                    <h4 class="title">Internship Assesment(Faculty Supervisor)</h4>
                                 </div>
                                 
                                 
                                <div class="card-content">
                                
                                <!--form-->
                                <form action="savePre.php" method="POST" class="form-horizontal" name="form1">
                                
                                
                                <div class="form-group">
                                <label class="col-sm-3" for="Student_Id">Student Name*:</label>
                                <div class="col-sm-6">
                                <input type="text" class="form-control" id="Student_Id" name="Student_Id" value="<?php echo $name?>" readonly/>
                                </div>
                                </div>
                                
                                <h5 class="text-center"><strong>A.	Task / Project / Assignment</strong></h5>
                                
                              
                                <div class="form-group">
                                <h6><strong>I.	Technical Task</strong></h6>
								<label class="col-sm-9" for="QA1">(e.g.: Operating system; System application; Web Page; Network; Multimedia application; Database)</label>
                                 <div class="col-sm-12">
                                 <textarea class="col-sm-12" rows="5" id="QA1" name="QA1" ></textarea>
                                 </div>
                                 </div>
                                 
                                 

                                 
                                  <div class="form-group">
                                <h6><strong> II.	Administrative Task</strong></h6>
								<label class="col-sm-9" for="QA2">(e.g.: Attending / preparing / conducting meeting / training /course / presentation; Clerical works; Visiting site)</label>
                                 <div class="col-sm-12">
                                 <textarea class="col-sm-12" rows="5" id="QA2" name="QA2" ></textarea>
                                 </div>
                                 </div>
                                 
                                  <h5 class="text-center"><strong>B.	Suitability of Training Organization</strong></h5>
                                
                            

                                <div class="form-group">
                                <h6><strong>  I.	Working Environment</strong></h6>
								<label class="col-sm-7" for="QA3">(e.g.: ICT facilities; Workforce; Size of IT unit)</label>
                                 <div class="col-sm-12">
                                 <textarea class="col-sm-12" rows="5" id="QA3" name="QA3" ></textarea>
                                 </div>
                                 </div>
                                 
                                 


                                 
                                  <div class="form-group">
                                <h6><strong> II.	Facilities for the students</strong></h6>
								<label class="col-sm-7" for="QA1">(e.g.: Dedicated PC; Room/workspace; Allowance)</label>
                                 <div class="col-sm-12">
                                 <textarea class="col-sm-12" rows="5" id="QA4" name="QA4" ></textarea>
                                 </div>
                                 </div>
                                 
                                   <div class="form-group">
                                 <h6><strong> III.	Problems and Opportunities</strong></h6>
                                 <div class="col-sm-12">
                                 <textarea class="col-sm-12" rows="5" id="QA5" name="QA5" ></textarea>
                                 </div>
                                 </div>
                                
                              
                                
                               <div class="form-group">
                              <h6 class="col-sm-6" for="QC3"><strong>Please give a suggestion for the student’s status:</strong></h6>
                              <label class="col-sm-7" for="QA6">Is it suitable for the Industrial Training placement?	</label>
                                 
                                <div class="col-sm-8">
                                <select class="form-control" id="QA6" name="QA6" required/>
                                <option selected>Please Select</option>
                                <option>Yes</option>
                                <option>No</option>
                               </select>
                                </div>
                                </div>
                                
                                
                                
                                
                                 <div class="form-group">
                                <h6 class="col-sm-7" for="QA7"><strong>If NO, please state your reason:</strong></h6>
                                <div class="col-sm-12">
                                <textarea class="col-sm-12" rows="5" id="QA7" name="QA7" ></textarea>
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

