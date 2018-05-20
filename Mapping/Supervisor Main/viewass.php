<?php
// including the database connection file
include("SupervisorCheck.php");

//getting id from url
$id = $_GET['Student_Id'];
 
//selecting data associated with this particular id
$result = mysqli_query($db,"CALL sv_internship_Mark('".$_GET['Student_Id']."')");


while($res = mysqli_fetch_array($result))
{
	
	$name = $res['Student_Name'];
    $QA1 = $res['QA1'];
	$QA11 = $res['QA11'];
	$QA2 = $res['QA2'];
	$QA21 = $res['QA21'];
	$QA3 = $res['QA3'];
	$QB1 = $res['QB1'];
	$QC1 = $res['QC1']; 
	$QC2 = $res['QC2']; 
	$QC3 = $res['QC3']; 
	$QC4 = $res['QC4']; 
	$TA = $res['TA'];
    $TB = $QB1;	
    
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
          
<script>
function generatePdfA(){
	document.forms['getcsvpdf'].action = 'printass.php?';
	document.forms['getcsvpdf'].submit();
}</script>
          
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
                                <form action="printass.php?Student_Id=<?php echo $id; ?>" method="POST" class="form-horizontal" name="form1">
                                
                                
                                <div class="form-group">
                                <label class="col-sm-3" for="Student_Id">Student Name*:</label>
                                <div class="col-sm-6">
                                <input type="text" class="form-control" value="<?php echo $name; ?>" readonly/>
                                </div>
                                </div>
                                
                                <h5 class="text-center"><strong>Section A:KNOWLEDGE, SKILLS AND PERFORMANCE</strong></h5>
                                
                                <div class="form-group">
                                <h6><strong>1. Knowledge and Skills</strong></h6>
								<label class="col-sm-8" for="QA1">In-depth knowledge and skill possessed/gained by executing all the task given in:</label>
                                
                               
                                 <h6 class="col-sm-12"><strong>Administartion and Management</strong></h6>
                                
                               
                                 <label class="col-sm-6" for="QA1">(Eg.:Preparing material,attending and conducting meeting/courses/discussion/presentation and other administrative task)</label>
                                 
                                <div class="col-sm-3">
                                <input type="text" class="form-control" value="<?php echo $QA1; ?>" readonly/>
                                 </div>
                                </div>
                                
                               <div class="form-group">  
                               <h6 class="col-sm-12"><strong>Technical</strong></h6>
                               <label class="col-sm-6" for="QA11">(Eg.:Analyzing,Designing,Developing,
                               Implementing,Documenting,Testing and Maintaining ICT system)</label>
                                 
                                <div class="col-sm-3">
                                 <input type="text" class="form-control" value="<?php echo $QA11; ?>" readonly/>
                                </div>
                                </div>
                                
                                 
                                <div class="form-group">
                                <h6 class="col-sm-12"><strong>2. Quantity Of Work</strong></h6>
                                <label class="col-sm-8" for="QA2">Accomplish the quantity of task that have been set successfully</label>
                                 
                                 
                                 <h6 class="col-sm-12"><strong>Administartion and Management</strong></h6>
                               
                                
                                <label class="col-sm-6" for="QA2">(Eg.:Present the material,attends and conducts meeting/courses/discussion/presentation and other administrative task)</label> 
                                   
                                <div class="col-sm-3">
                                <input type="text" class="form-control" value="<?php echo $QA2; ?>" readonly/>
                                </div>
                                </div>
                                
                                
                                 <div class="form-group">
                               <h6 class="col-sm-12"><strong>Technical</strong></h6>
                              <label class="col-sm-6" for="QA21">(Eg.:Present the outcome of the project such as system, database or web design that been produced include the report and document)</label>
                                 
                                <div class="col-sm-3">
                                <input type="text" class="form-control" value="<?php echo $QA21; ?>" readonly/>
                                </div>
                                </div>
                                
                                <div class="form-group">
                                <h6 class="col-sm-12"><strong>3. Quality Of Work</strong></h6>
                              <label class="col-sm-6" for="QA3">Accomplish the task that according to the target for quality of work that have been set successfully</label>
                            
                          
                                <div class="col-sm-3">
                                <input type="text" class="form-control" value="<?php echo $QA3; ?>" readonly/>
                                </div>
                                </div>
                                
                                <div class="form-group">
                               <label class="col-sm-6" for="QB1">TOTAL MARK (90):</label>
                               <div class="col-sm-3">
                                <input type="text" class="form-control" value="<?php echo $TA; ?>" readonly/>
                                </div>
                                </div>
                                
                              <h5 class="text-center"><strong>Section B:DISCIPLINE OF TRAINEE</strong></h5>
                              <div class="form-group">
                              
                                
                                <label class="col-sm-6" for="QB1">Dediacation and responsibilities, cooperation, discipline and attire, competitiveness,leaadership and the ability to make a decision, communication</label>
                                   
                                <div class="col-sm-3">
                                <input type="text" class="form-control" value="<?php echo $QB1; ?>" readonly/>
                                </div>
                              </div>
                              
                                <div class="form-group">
                                <label class="col-sm-6" for="QB1">TOTAL MARK (10):</label>
                               <div class="col-sm-1">
                                <input type="text" class="form-control" value="<?php echo $TB;?>"readonly/>
                               </div>
                                </div>
                                
                           

							  <h5 class="text-center"><strong>Section C:OVERALL COMMENTS</strong></h5>
                           
                              <div class="form-group">
                                <label class="col-sm-9" for="QC1">Give overall comments on the trainee's job performance, discipline, potential and others</label>
                                <div class="col-sm-12">
                                <textarea class="col-sm-12" rows="5" id="QC1" name="QC1" placeholder="Comments" readonly/><?php echo $QC1; ?></textarea>
                                </div>    
                                </div>
                               
                              
                              
                                <div class="form-group">
                                <label class="col-sm-6" for="QC2">Overall Assesment</label> 
                                   
                                <div class="col-sm-3">
                                <input type="text" class="form-control" value="<?php echo $QC2; ?>" readonly/>
                                </div>
                                </div>  
                                
                                
                                                              
                               <div class="form-group">
                              <label class="col-sm-6" for="QC3">Internship Status</label>
                                 
                                <div class="col-sm-3">
                                 <input type="text" class="form-control" value="<?php echo $QC3; ?>" readonly/>
                                </div>
                                </div>
                                
                                
                                 <div class="form-group">
                                <label class="col-sm-7" for="QC4">If student fails, please put a comments</label>
                                <div class="col-sm-12">
                                <textarea class="col-sm-12" rows="5" id="QC4" name="QC4" placeholder="Comment" readonly><?php echo $QC4; ?></textarea>
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
