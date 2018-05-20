<?php
include("SupervisorCheck.php"); 
//getting id from url
$id = $login_user;
 
 

$id = $_GET['Student_Id'];
 
 

$result = mysqli_query($db, "Select student.Student_Name, company.Company_Name FROM student INNER JOIN stud_attachment ON student.Student_Id = stud_attachment.Student_Id INNER JOIN company ON stud_attachment.Company_Id = company.Company_Id INNER JOIN sv_assignment ON sv_assignment.Group_Id = company.Group_Id INNER JOIN supervisor ON sv_assignment.Supervisor_Id = supervisor.Supervisor_Id WHERE supervisor.Supervisor_StaffID ='$login_user' AND student.Student_Id=$id");



while($res = mysqli_fetch_array($result))
{
	$name = $res['Student_Name'];
	$cname = $res['Company_Name'];
    
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
    
    <style>
	
		.hidden-form{
	  visibility:hidden;
	  }
	  .show-form{
	  visibility: visible !important;
	  }
	</style>
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
                                    <h4 class="title">Report Assesment(Faculty Supervisor) BITU 3946</h4>
                                 </div>
                                 
                                 
                                <div class="card-content">
                                
                                <!--form-->
                                <form action="save_report.php" method="POST" class="form-horizontal" name="form1">
                                
                                
                                <div class="form-group">
                                <label class="col-sm-3" for="Student_Id">Student Name*:</label>
                                <div class="col-sm-6">
                                <input type="text" class="form-control" id="Student_Id" name="Student_Id" value="<?php echo $name?>" readonly/>
                                </div>
                                </div>
                                
                                <div class="form-group">
                                <label class="col-sm-3" for="Company_Name">Company Name*:</label>
                                <div class="col-sm-6">
                                <input type="text" class="form-control" id="Company_Name" name="Company_Name" value="<?php echo $cname?>" readonly/>
                                </div>
                                </div>

                                
                                <h5 class="text-center"><strong>Section A:REPORT CONTENT</strong></h5>
                                
                                <div class="form-group">
                                <h6><strong>1. ABSTRACT</strong></h6>
								<label>Student provide executive summary about all the content in the report with the information such as:</label>
                                <ul>
                                  <li>- Place</li>
                                  <li>- Work and work result during internship</li>
                                  <li>- Conclude about the task done meet the objective of the internhsip</li>
                                </ul>
                                
                                <div class="col-sm-6">
                                 <input type="number" class="form-control" name="QA1" id="QA1" min="0" max="3" step="0.5" 
                               value="0">(Full Mark:3)
                                </div>
                                </div>
                                
                                
                               <div class="form-group">
                                <h6><strong>2. INTRODUCTION</strong></h6>
							
                                <ul>
                                  <li>- Internship Company</li>
                                  <li>- Internship Objective</li>
                                 </ul>
                                
                                <div class="col-sm-6">
                                <input type="number" class="form-control" name="QA2" id="QA2" min="0" max="2" step="0.5" 
                               value="0">(Full Mark:2)
                                </div>
                                </div>
                                
                                
                                
                                 <div class="form-group">
                                <h6><strong>3.COMPANY BACKGROUND</strong></h6>
							
                                <ul>
                                  <li>- Company History</li>
                                  <li>- Business Orientation</li>
                                  <li>- Company Organization Chart </li>
                                  <li>- Company Function</li>
                                 </ul>
                                
                                <div class="col-sm-6">
                                 <input type="number" class="form-control" name="QA3" id="QA3" min="0" max="5" step="0.5" 
                               value="0">(Full Mark:5)
                                </div>
                                </div>
                                
                                
                                
                                
                                
                                <h6><strong>4. PROJECT DESCRIPTION</strong></h6>
							
                                <ul>
                                  <li>- Problem Statement</li>
                                  <li>- Task Specification</li>
                                  <li>- Implementation and Solve Method </li>
                                  <li>- Work Result</li>
                                  <li>- The Goodness and Weakness of The Task Result including a proposal to improve</li>
                                  <li>- Skill, Knowledge and Experiences obtained during Internship</li>
                                 </ul>
                                 
                                 <h6 class="col-lg-12"><strong><center>Please choose between A or B to input the Mark</center></strong></h6>
                            	
                                 <div class="form-group">
                                <div class="col-sm-12">
                                <select class="form-control" onchange="yesnoCheck(this);" required/>
                                <option selected>Please Select</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                               </select>
                                </div>
                                </div>
                                
                                
                                 <div id="A" style="display: none;">
                                <div class="form-group">
                                <label class="col-sm-2" for="Student_Id">Technical Task (40):</label>
                                <div class="col-sm-3">
                                
                                  <input type="number" class="form-control" name="QAA4" id="QAA4" min="0" max="40" step="0.5" 
                               value="0">(Full Mark:40)
                               </div>
                               
                               
                              
                                <label class="col-sm-2" for="Student_Id">Administration Task (10):</label>
                                <div class="col-sm-3">
                                  <input type="number" class="form-control" name="QAA41" id="QAA41" min="0" max="10" step="0.5" 
                               value="0">(Full Mark:10)
                               </div>
                                </div>
                                </div>
                              
                                
                                
                              
                                <div id="B" style="display: none;">
                                <div class="form-group">
                             	<label class="col-sm-2" for="Student_Id">Technical Task (30):</label>
                                <div class="col-sm-3">
                                 <input type="number" class="form-control" name="QA4" id="QA4" min="0" max="30" step="0.5" 
                               value="0">(Full Mark:30)
                                </div>
                              
                                <label class="col-sm-2" for="Student_Id">Administration Task (20):</label>
                                <div class="col-sm-3">
                                 <input type="number" class="form-control" name="QA41" id="QA41" min="0" max="20" step="0.5" 
                               value="0">(Full Mark:20)
                              
                                </div>
                                </div>
                                </div>
                                
                                
                                
                                 <div class="form-group">
                                <h6><strong>5. CONCLUSION</strong></h6>
								
                                <ul>
                                  <li>- Contribution student to the organization</li>
                                  <li>(
The significance of the completed tasks and the ideas, the solutions that bring repairs to the organization.)</li>
                                 <li>- Conclusion</li>
                                 <li>(The task that have been done achieve the objective of the Internships.)</li>
                                </ul>
                                
                                <div class="col-sm-6">
                               <input type="number" class="form-control" name="QA5" id="QA5" min="0" max="5" step="0.5" 
                               value="0">(Full Mark:5)
                                </div>
                                </div>
                                
                                
                               <div class="form-group">
                                <h6><strong>6. APPENDIX</strong></h6>
							
                                <ul>
                                  <li>- In accordance with the task field being run.</li>
                                 </ul>
                                
                                <div class="col-sm-6">
                               <input type="number" class="form-control" name="QA6" id="QA6" min="0" max="5" step="0.5" 
                               value="0">(Full Mark:5)
                                </div>
                                </div>
                                
                                
                                
                                 <div class="form-group">
                                <h6><strong>7. QUALITY CONTENT</strong></h6>
							
                                <ul>
                                  <li>- The overall content of the report consistent with the content of the log book</li>
                                  <li>- Need to be support with document attached. As example DFD, ERD and Flow Chart</li>
                                 </ul>
                                
                                <div class="col-sm-6">
                                <input type="number" class="form-control" name="QA7" id="QA7" min="0" max="10" step="0.5" 
                               value="0">(Full Mark:10)
                                </div>
                                </div>
                                
                                
                                
                                
                                 <h5 class="text-center"><strong>Section B:REPORT PRESENTATION</strong></h5>
                                
                                <div class="form-group">
                                <h6><strong>1. LANGUAGE QUALITY</strong></h6>
								<ul>
                                  <li>- Good Word Structure</li>
                                  <li>- Facts Accuracy</li>
                                  <li>- Good Use Of English</li>
                                </ul>
                                
                                <div class="col-sm-6">
                                 <input type="number" class="form-control" name="QB1" id="QB1" min="0" max="10" step="0.5" 
                               value="0">(Full Mark:10)
                                </div>
                                </div>
                                
                                
                               <div class="form-group">
                                <h6><strong>2. PRESENTATION QUALITY </strong></h6>
							
                                <ul>
                                  <li>- Using appropriate diagrams in describing and supporting report content</li>
                            	</ul>
                                
                                <div class="col-sm-6">
                               <input type="number" class="form-control" name="QB2" id="QB2" min="0" max="10" step="0.5" 
                               value="0">(Full Mark:10)
                                </div>
                                </div>
                                
                                
                                
                                 <div class="form-group">
                                <h6><strong>3.NEATNESS</strong></h6>
							
                                <ul>
                                  <li>- Written easily to understand</li>
                                  <li>- Minimum type error</li>
                                  <li>- Arrangement of diagram and table</li>
                                 </ul>
                                
                                <div class="col-sm-6">
                               <input type="number" class="form-control" name="QB3" id="QB3" min="0" max="10" step="0.5" 
                               value="0">(Full Mark:10)
                                </div>
                                </div>
                                
                                
                                
                              <div class="form-group">
                                <h6><strong>4. REPORT FORMAT</strong></h6>
							
                                <ul>
                                  <li>- Title Page</li>
                                  <li>- Appreciation</li>
                                  <li>- Abstract</li>
                                  <li>- List Of Content</li>
                                  <li>- Table Register</li>
                                  <li>- Diagram Register</li>
                                  <li>- Acronym Register</li>
                                  <li>- Report Text</li>
                                  <li>- Reference</li>
                                  <li>- Appendix</li>
                                </ul>
                                
                                <div class="col-sm-6">
                               <input type="number" class="form-control" name="QB4" id="QB4" min="0" max="10" step="0.5" 
                               value="0">(Full Mark:10)
                                </div>
                                </div>
                                
                              <h5 class="text-center"><strong>Section C:OVERALL COMMENTS</strong></h5>
                           
                              <div class="form-group">
                                <h6 class="col-sm-9" for="QC1"><strong>Give overall comments on the overall Student Internship Reports</strong></h6>
                                <div class="col-sm-12">
                                <textarea class="col-sm-12" rows="5" id="QC1" name="QC1" placeholder="Comments" required/></textarea>
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

<script>
 
function yesnoCheck(that) {
        if (that.value == "A") {
           
            document.getElementById("A").style.display = "block";
			
			document.getElementById("B").style.display = "none";
        }else if (that.value == "B") {
           
            document.getElementById("B").style.display = "block";
			document.getElementById("A").style.display = "none";
        } 
		
    }
</script>

