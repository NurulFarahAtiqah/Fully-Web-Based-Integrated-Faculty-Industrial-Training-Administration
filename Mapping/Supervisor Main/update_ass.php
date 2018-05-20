<?php
// including the database connection file
include("../Supervisor Main/SupervisorCheck.php");
 
if(isset($_POST['update']))
{    

    $ID = $_POST['Student_Id'];
    $QA1 = $_POST['QA1'];
	$QA11 = $_POST['QA11'];
	$QA2 = $_POST['QA2'];
	$QA21 = $_POST['QA21'];
	$QA3 = $_POST['QA3'];
	$QB1 = $_POST['QB1'];
	$QC1 = $_POST['QC1']; 
	$QC2 = $_POST['QC2']; 
	$QC3 = $_POST['QC3']; 
	$QC4 = $_POST['QC4']; 
	
    
	//updating the table
	$result = mysqli_query($db, "UPDATE c_mark SET QA1='$QA1',QA11='$QA11',QA2='$QA2',QA21='$QA21',QA3='$QA3',QB1='$QB1',QC1='$QC1',QC2='$QC2',QC3='$QC3',QC4='$QC4' WHERE Student_Id=$ID");
	
	//redirectig to the display page. In our case, it is index.php
      
	  
		
	echo "<script>
	alert('Successfully Updated');
	window.location.href='view_ass.php';
	</script>"; 
  
}


//getting id from url
$id = $_GET['Student_Id'];
 
//selecting data associated with this particular id
$result1 = mysqli_query($db, 'SELECT student.Student_Name,c_mark.QA1,c_mark.QA11,c_mark.QA2,c_mark.QA21,c_mark.QA3,c_mark.QB1,c_mark.QC1, c_mark.QC2,c_mark.QC3,c_mark.QC4 FROM c_mark INNER JOIN student ON c_mark.Student_Id = student.Student_Id WHERE c_mark.Student_Id = "'.$id.'"');
 
while($res = mysqli_fetch_array($result1))
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
                                <form action="update_ass.php" method="POST" class="form-horizontal" name="form1">
                                
                                
                                <div class="form-group">
                                <label class="col-sm-3" for="Student_Id">Student Name*:</label>
                                <div class="col-sm-6">
                                <input type="text" class="form-control" value="<?php echo $name; ?>" disabled/>
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
                               value="<?php echo $QA1;?>">(Full Mark:10)
                                 </div>
                                </div>
                                
                               <div class="form-group">  
                               <h6 class="col-sm-12"><strong>Technical</strong></h6>
                               <label class="col-sm-6" for="QA11">(Eg.:Analyzing,Designing,Developing,
                               Implementing,Documenting,Testing and Maintaining ICT system)</label>
                                 
                                <div class="col-sm-3">
                                  <input type="number" class="form-control" name="QA11" id="QA11" min="0" max="20" 
                                step="0.5" value="<?php echo $QA11;?>">(Full Mark:20)
                                </div>
                                </div>
                                
                                 
                                <div class="form-group">
                                <h6 class="col-sm-12"><strong>2. Quantity Of Work</strong></h6>
                                <label class="col-sm-8" for="QA2">Accomplish the quantity of task that have been set successfully</label>
                                 
                                 
                                 <h6 class="col-sm-12"><strong>Administartion and Management</strong></h6>
                               
                                
                                <label class="col-sm-6" for="QA2">(Eg.:Present the material,attends and conducts meeting/courses/discussion/presentation and other administrative task)</label> 
                                   
                                <div class="col-sm-3">
                                <input type="number" class="form-control" name="QA2" id="QA2" min="0" max="10" step="0.5" 
                               value="<?php echo $QA2;?>">(Full Mark:10)
                                </div>
                                </div>
                                
                                
                                 <div class="form-group">
                               <h6 class="col-sm-12"><strong>Technical</strong></h6>
                              <label class="col-sm-6" for="QA21">(Eg.:Present the outcome of the project such as system, database or web design that been produced include the report and document)</label>
                                 
                                <div class="col-sm-3">
                               <input type="number" class="form-control" name="QA21" id="QA21" min="0" max="20" 
                               step="0.5" value="<?php echo $QA21;?>">(Full Mark:20)
                                </div>
                                </div>
                                
                                <div class="form-group">
                                <h6 class="col-sm-12"><strong>3. Quality Of Work</strong></h6>
                              <label class="col-sm-6" for="QA3">Accomplish the task that according to the target for quality of work that have been set successfully</label>
                            
                          
                                <div class="col-sm-3">
                               <input type="number" class="form-control" name="QA3" id="QA3" min="0" max="30" 
                                step="0.5" value="<?php echo $QA3;?>">(Full Mark:30)

                                </div>
                                </div>
                               
                              <h5 class="text-center"><strong>Section B:DISCIPLINE OF TRAINEE</strong></h5>
                              <div class="form-group">
                              
                                
                                <label class="col-sm-6" for="QB1">Dediacation and responsibilities, cooperation, discipline and attire, competitiveness,leaadership and the ability to make a decision, communication</label>
                                   
                                <div class="col-sm-3">
                               
                                 <input type="number" class="form-control" name="QB1" id="QB1" min="0" max="10" 
                                step="0.5" value="<?php echo $QB1;?>">(Full Mark:10)
                                </div>
                              </div>

							  <h5 class="text-center"><strong>Section C:OVERALL COMMENTS</strong></h5>
                           
                              <div class="form-group">
                                <label class="col-sm-9" for="QC1">Give overall comments on the trainee's job performance, discipline, potential and others</label>
                                <div class="col-sm-12">
                                <textarea class="col-sm-12" rows="5" id="QC1" name="QC1" placeholder="Comments" /><?php echo $QC1; ?></textarea>
                                </div>    
                                </div>
                               
                              
                              
                                <div class="form-group">
                                <label class="col-sm-6" for="QC2">Overall Assesment</label> 
                                   
                                <div class="col-sm-3">
                                <select class="form-control" id="QC2" name="QC2" required/>
                                <option>Please Choose</option>
                                <option <?php if($QC2== "Not Satisfactory") echo "selected"; ?> >Not Satisfactory</option>
                                <option <?php if($QC2== "Less Satisfactory") echo "selected"; ?> >Less Satisfactory</option>
                                <option <?php if($QC2== "Satisfactory") echo "selected"; ?> >Satisfactory</option>
                                <option <?php if($QC2== "Good") echo "selected"; ?> >Good</option>
                                <option <?php if($QC2== "Excellent") echo "selected"; ?> >Excellent</option>
                            </select>
                                </div>
                                </div>  
                                
                                
                                                              
                               <div class="form-group">
                              <label class="col-sm-6" for="QC3">Internship Status</label>
                                 
                                <div class="col-sm-3">
                                <select class="form-control" id="QC3" name="QC3" required/>
                                <option>Please Choose</option>
                                <option <?php if($QC3== "Pass") echo "selected"; ?> >Pass</option>
                                <option <?php if($QC3== "Fail") echo "selected"; ?> >Fail</option>
                               </select>
                                </div>
                                </div>
                                
                                
                                 <div class="form-group">
                                <label class="col-sm-7" for="QC4">If student fails, please put a comments</label>
                                <div class="col-sm-12">
                                <textarea class="col-sm-12" rows="5" id="QC4" name="QC4" placeholder="Comment" ><?php echo $QC4; ?></textarea>
                                </div> 
                                 </div>
                             
                              
                             
                              <div class="form-group"> 
                              <div class="col-sm-offset-5 col-sm-10">
                            <input type="hidden" name="Student_Id" value=<?php echo $_GET['Student_Id'];?>> 
							<input type="submit" id="update" name="update" value="Update" class="btn btn-default">
                           
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

