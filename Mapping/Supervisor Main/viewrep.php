<?php
// including the database connection file
include("SupervisorCheck.php");

//getting id from url
$id = $_GET['Student_Id'];
 
//selecting data associated with this particular id
$result = mysqli_query($db, "CALL report_Mark('".$_GET['Student_Id']."')");



while($res = mysqli_fetch_array($result))
{
	
	$name = $res['Student_Name'];
    $cname = $res['Company_Name'];
    $QA1 = $res['QA1'];
	$QA2 = $res['QA2'];
	$QA3 = $res['QA3'];
	$QAA4 = $res['QAA4'];
	$QAA41 = $res['QAA41'];
	$QA4 = $res['QA4'];
	$QA41 = $res['QA41'];
	$QA5 = $res['QA5'];
	$QA6 = $res['QA6'];
	$QA7 = $res['QA7'];
	
	$QB1 = $res['QB1'];
	$QB2 = $res['QB2'];
	$QB3 = $res['QB3'];
	$QB4 = $res['QB4'];
	
	$QC1 = $res['QC1']; 
	
	$TA4 = $res['TA4'];
	$TA42 = $res['TA42'];
	$TAF = $res['TAF'];
	$TBF = $res['TBF'];
    
}

$result->close();
$db->next_result();




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
                                    <h4 class="title">Report Assesment(Faculty Supervisor)</h4>
                                 </div>
                                 
                                 
                                <div class="card-content">
                                
                                <!--form-->
                                <form action="printrep.php?Student_Id=<?php echo $id; ?>" method="POST" class="form-horizontal" name="form1">
                                
                            <div class="form-group">
                                <label class="col-sm-3" for="Student_Id">Student Name*:</label>
                                <div class="col-sm-6">
                                <input type="text" class="form-control" id="Student_Id" name="Student_Id" value="<?php echo $name?>" disabled/>
                                </div>
                                </div>
                                
                                <div class="form-group">
                                <label class="col-sm-3" for="Company_Name">Company Name*:</label>
                                <div class="col-sm-6">
                                <input type="text" class="form-control" id="Company_Name" name="Company_Name" value="<?php echo $cname?>" disabled/>
                                </div>
                                </div>

                                
                                <h5><strong>Section A:REPORT CONTENT</strong></h5>
                                
                                <div class="form-group">
                                <h6><strong>1. ABSTRACT</strong></h6>
								<label>Student provide executive summary about all the content in the report with the information such as:</label>
                                <ul>
                                  <li>- Place</li>
                                  <li>- Work and work result during internship</li>
                                  <li>- Conclude about the task done meet the objective of the internhsip</li>
                                </ul>
                                
                                <div class="col-sm-6">
                                <input type="text" class="form-control" id="QA1" name="QA1" value="<?php echo $QA1?>" disabled/>
                                </div>
                                </div>
                                
                                
                               <div class="form-group">
                                <h6><strong>2. INTRODUCTION</strong></h6>
							
                                <ul>
                                  <li>- Internship Company</li>
                                  <li>- Internship Objective</li>
                                 </ul>
                                
                                <div class="col-sm-6">
                                <input type="text" class="form-control" id="QA2" name="QA2" value="<?php echo $QA2?>" disabled/>
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
                               <input type="text" class="form-control" id="QA3" name="QA3" value="<?php echo $QA3?>" disabled/>
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
                                <h6 class="col-sm-1"><strong>A</strong></h6>
                                <label class="col-sm-2" for="Student_Id">Technical Task (80%):</label>
                                <div class="col-sm-3">
                                <input type="text" class="form-control" id="QA4" name="QAA4" placeholder="Mark/40" value="<?php echo $QAA4?>">
                                </div>
                              
                                <label class="col-sm-2" for="Student_Id">Administration Task (20%):</label>
                                <div class="col-sm-3">
                                <input type="text" class="form-control" id="QA41" name="QAA41" placeholder="Mark/10" value="<?php echo $QAA41?>">
                                </div>
                                </div>
                                
                                <div class="form-group">
                                <h6 class="col-sm-1"><strong>B</strong></h6>
                                <label class="col-sm-2" for="Student_Id">Technical Task (60%):</label>
                                <div class="col-sm-3">
                                <input type="text" class="form-control" id="QA4" name="QA4" placeholder="Mark/30" value="<?php echo $QA4?>">
                                </div>
                              
                                <label class="col-sm-2" for="Student_Id">Administration Task (40%):</label>
                                <div class="col-sm-3">
                                <input type="text" class="form-control" id="QA41" name="QA41" placeholder="Mark/20" value="<?php echo $QA41?>">
                                </div>
                                </div>
                                
                                 <div class="form-group">
                                 <label class="col-sm-6" for="QB1">TOTAL MARK (50):</label>
                                <div class="col-sm-3">
                                <input type="text" class="form-control" value="<?php if($TA4==0){echo $TA42;}else if($TA42==0){echo $TA4;} ?>" readonly/>
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
                                 <input type="text" class="form-control" id="QA5" name="QA5" value="<?php echo $QA5?>">
                                </div>
                                </div>
                                
                                
                               <div class="form-group">
                                <h6><strong>6. APPENDIX</strong></h6>
							
                                <ul>
                                  <li>- In accordance with the task field being run.</li>
                                 </ul>
                                
                                <div class="col-sm-6">
                                 <input type="text" class="form-control" id="QA6" name="QA6" value="<?php echo $QA6?>">
                                </div>
                                </div>
                                
                                
                                
                                 <div class="form-group">
                                <h6><strong>7. QUALITY CONTENT</strong></h6>
							
                                <ul>
                                  <li>- The overall content of the report consistent with the content of the log book</li>
                                  <li>- Need to be support with document attached. As example DFD, ERD and Flow Chart</li>
                                 </ul>
                                
                                <div class="col-sm-6">
                                   <input type="text" class="form-control" id="QA7" name="QA7" value="<?php echo $QA7?>">
                                </div>
                                </div>
                                
                                 <div class="form-group">
                                 <label class="col-sm-6" for="QB1">TOTAL MARK (60):</label>
                                <div class="col-sm-3">
                                <input type="text" class="form-control" value="<?php echo $TAF; ?>" readonly/>
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
                                  <input type="text" class="form-control" id="QB1" name="QB1" value="<?php echo $QB1?>">
                                </div>
                                </div>
                                
                                
                               <div class="form-group">
                                <h6><strong>2. PRESENTATION QUALITY </strong></h6>
							
                                <ul>
                                  <li>- Using appropriate diagrams in describing and supporting report content</li>
                            	</ul>
                                
                                <div class="col-sm-6">
                                  <input type="text" class="form-control" id="QB2" name="QB2" value="<?php echo $QB2?>">
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
                                   <input type="text" class="form-control" id="QB3" name="QB3" value="<?php echo $QB3?>">
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
                                   <input type="text" class="form-control" id="QB4" name="QB4" value="<?php echo $QB4?>">
                                </div>
                                </div>
                                
                                
                                <div class="form-group">
                                 <label class="col-sm-6" for="QB1">TOTAL MARK (10):</label>
                                <div class="col-sm-3">
                                <input type="text" class="form-control" value="<?php echo $TBF; ?>" readonly/>
                                </div>
                                </div
                                
                              ><h5 class="text-center"><strong>Section C:OVERALL COMMENTS</strong></h5>
                           
                              <div class="form-group">
                                <h6 class="col-sm-9" for="QC1"><strong>Give overall comments on the overall Student Internship Reports</strong></h6>
                                <div class="col-sm-12">
                                <textarea class="col-sm-12" rows="5" id="QC1" name="QC1" placeholder="Comments" required/><?php echo $QC1?></textarea>
                                </div>    
                                </div>
                               
                              
                             
                             
                              
                             
                              <div class="form-group"> 
                              <div class="col-sm-offset-5 col-sm-10">
                            
							<input type="submit"  name="submitpdf" value="Print" class="btn btn-default">
                          
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
