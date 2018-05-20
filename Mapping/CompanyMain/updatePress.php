<?php
// including the database connection file
include("Check.php");
 
 
if(isset($_POST['update']))
{    

    $ID = $_POST['Student_Id'];
	$svname = $_POST['Supervisor_Name'];
    $QA1 = $_POST['QA1'];
	$QB1 = $_POST['QB1'];
	$QB2 = $_POST['QB2'];
	$QB3 = $_POST['QB3'];
	$QB4 = $_POST['QB4'];
	$QB5 = $_POST['QB5'];
	$QC1 = $_POST['QC1']; 
	$QC2 = $_POST['QC2']; 
	$QC3 = $_POST['QC3']; 
	$QD1 = $_POST['QD1']; 
	$QD2 = $_POST['QD2']; 
	$QD3 = $_POST['QD3']; 
	$QD4 = $_POST['QD4']; 	
	
    
	//updating the table
	$result = mysqli_query($db, "UPDATE c_present_mark SET Supervisor_Name = '$svname',QA1='$QA1',QB1='$QB1',QB2='$QB2',QB3='$QB3',QB4='$QB4',QB5='$QB5',QC1='$QC1',QC2='$QC2',QC3='$QC3',QD1='$QD1',QD2='$QD2',QD3='$QD3',QD4='$QD4' WHERE Student_Id=$ID");
	
	//redirectig to the display page. In our case, it is index.php
      
	
		
	echo "<script>
	alert('Successfully Updated');
	window.location.href='view_Press.php';
	</script>"; 
  
}


//getting id from url
$id = $_GET['Student_Id'];
 
//selecting data associated with this particular id
$result = mysqli_query($db, 'SELECT student.Student_Name,c_present_mark.Supervisor_Name,c_present_mark.QA1,c_present_mark.QB1,c_present_mark.QB2,c_present_mark.QB3,c_present_mark.QB4,c_present_mark.QB5,c_present_mark.QC1, c_present_mark.QC2,c_present_mark.QC3,c_present_mark.QD1,c_present_mark.QD2,c_present_mark.QD3,c_present_mark.QD4 FROM c_present_mark INNER JOIN student ON c_present_mark.Student_Id = student.Student_Id WHERE c_present_mark.Student_Id = "'.$id.'"');


	
while($res = mysqli_fetch_array($result))
{
	$name = $res['Student_Name'];
	$svname = $res['Supervisor_Name']; 
    $QA1 = $res['QA1'];
	$QB1 = $res['QB1'];
	$QB2 = $res['QB2'];
	$QB3 = $res['QB3'];
	$QB4 = $res['QB4'];
	$QB5 = $res['QB5'];
	$QC1 = $res['QC1']; 
	$QC2 = $res['QC2']; 
	$QC3 = $res['QC3']; 
	$QD1 = $res['QD1']; 
	$QD2 = $res['QD2']; 
	$QD3 = $res['QD3']; 
	$QD4 = $res['QD4']; 	 	
    
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
                                    <h4 class="title">Presentation Assesment(Faculty Supervisor)</h4>
                                 </div>
                                 
                                 
                                <div class="card-content">
                                
                                <!--form-->
                                <form action="updatePress.php" method="POST" class="form-horizontal" name="form1">
                                
                                
                                <div class="form-group">
                                <label class="col-sm-3" for="Student_Id">Student Name*:</label>
                                <div class="col-sm-6">
                                 <input type="text" class="form-control" value="<?php echo $name; ?>" disabled/>
                                </div>
                                </div>
                                
                                 <div class="form-group">
                                <label class="col-sm-3" for="Supervisor_Name">Industry Supervisor Name*:</label>
                                <div class="col-sm-6">
                                <input type="text" class="form-control" id="Supervisor_Name" name="Supervisor_Name" value = "<?php echo $svname; ?>"/>
                                </div>
                                </div>
                                
                                <h5 class="text-center"><strong>Section A:Preparation</strong></h5>
                                
                                
                                <div class="row">
                                
                                <div class="form-group">
                                 <h6 class="col-md-6"><strong>1. Good preparation and use visual aid appropriately</strong></h6>
                                 <div class="col-sm-3">
                             <input type="number" class="form-control" name="QA1" id="QA1" min="0" max="5" step="0.5" 
                               value="<?php echo $QA1;?>">(Full Mark:5)            
                                </div>
                                </div>
                                </div>
                                
                                
								<h5 class="text-center"><strong>Section B:Presentation</strong></h5>
                                
                                
                                <div class="row">
                                
                                 <div class="form-group">
                                 <h6 class="col-md-6"><strong>1. Presentation style</strong></h6>
                                 <div class="col-sm-3">
                              <input type="number" class="form-control" name="QB1" id="QB1" min="0" max="10" step="0.5" 
                               value="<?php echo $QB1;?>">(Full Mark:10)
                                </div>
                                </div>
                                </div>
                               
                           
                                <div class="row">
                                
                                 <div class="form-group">
                                 <h6 class="col-md-6"><strong>2. Confidence and energetic presentation</strong></h6>
                                 <div class="col-sm-3">
                            <input type="number" class="form-control" name="QB2" id="QB2" min="0" max="10" step="0.5" 
                               value="<?php echo $QB2;?>">(Full Mark:10)
                                </div>
                                </div>
                                </div>
                                
                                 <div class="row">
                                
                                 <div class="form-group">
                                 <h6 class="col-md-6"><strong>3.Well organize and structured presentation.</strong></h6>
                                 <div class="col-sm-3">
                               <input type="number" class="form-control" name="QB3" id="QB3" min="0" max="10" step="0.5" 
                               value="<?php echo $QB3;?>">(Full Mark:10)
                                </div>
                                </div>
                                </div>
                                
                                <div class="row">
                                
                                 <div class="form-group">
                                 <h6 class="col-md-6"><strong>4. Fluency of the delivery</strong></h6>
                                 <div class="col-sm-3">
                                 <input type="number" class="form-control" name="QB4" id="QB4" min="0" max="10" step="0.5" 
                               value="<?php echo $QB4; ?>">(Full Mark:10)

                                </div>
                                </div>
                                </div>
                                
                                 <div class="row">
                                
                                 <div class="form-group">
                                 <h6 class="col-md-6"><strong>5. Clear and understandable presentation</strong></h6>
                                 <div class="col-sm-3">
                                 <input type="number" class="form-control" name="QB5" id="QB5" min="0" max="10" step="0.5" 
                               value="<?php echo $QB5; ?>">(Full Mark:10)
                                </div>
                                </div>
                                </div>
                               
                               
                                 <h5 class="text-center"><strong>Section C:Content</strong></h5>
                             
                                 <div class="row">
                                
                                 <div class="form-group">
                                 <h6 class="col-md-6"><strong>1. Intoduction</strong></h6>
                                
                                 <div class="col-sm-3">
                                   <input type="number" class="form-control" name="QC1" id="QC1" min="0" max="5" step="0.5" 
                               value="<?php echo $QC1;?>">(Full Mark:5)
                                </div>
                                </div>
                                </div>
                                
                                 <div class="row">
                                
                                 <div class="form-group">
                                 <h6 class="col-md-6"><strong>2. Description of the implemented task(s)/project(s)</strong></h6>
                                
                                 <div class="col-sm-3">
                           <input type="number" class="form-control" name="QC2" id="QC2" min="0" max="20" step="0.5" 
                               value="<?php echo $QC2; ?>">(Full Mark:20)
                                </div>
                                </div>
                                </div>
                                
                                 <div class="row">
                                
                                 <div class="form-group">
                                 <h6 class="col-md-6"><strong>3. Conclusion</strong></h6>
                                 
                                 <div class="col-sm-3">
                                    <input type="number" class="form-control" name="QC3" id="QC3" min="0" max="10" step="0.5" 
                               value="<?php echo $QC3; ?>">(Full Mark:10)
                                </div>
                                </div>
                                </div>
                                
                                 
                                <h5 class="text-center"><strong>Section D:QUESTION and ANSWER</strong></h5>
                             
                                 <div class="row">
                                
                                 <div class="form-group">
                                 <h6 class="col-md-6"><strong>1. Understand question well</strong></h6>
                                 <div class="col-sm-3">
                                 <input type="number" class="form-control" name="QD1" id="QD1" min="0" max="3" step="0.5" 
                               value="<?php echo $QD1;?>">(Full Mark:3)
                                </div>
                                </div>
                                </div>
                                
                                 <div class="row">
                                
                                 <div class="form-group">
                                 <h6 class="col-md-6"><strong>2. Pay attention to the questions</strong></h6>
                                 <div class="col-sm-3">
                                   <input type="number" class="form-control" name="QD2" id="QD2" min="0" max="2" step="0.5" 
                               value="<?php echo $QD2?>">(Full Mark:2)
                                </div>
                                </div>
                                </div>
                                
                                 <div class="row">
                                
                                 <div class="form-group">
                                 <h6 class="col-md-6"><strong>3. Answer question calmly and confidently</strong></h6>
                                
                                 <div class="col-sm-3">
                             <input type="number" class="form-control" name="QD3" id="QD3" min="0" max="2" step="0.5" 
                               value="<?php echo $QD3;?>">(Full Mark:2)
                                </div>
                                </div>
                                </div>
                                
                                <div class="row">
                                
                                 <div class="form-group">
                                 <h6 class="col-md-6"><strong>4. Answers given satisfactory</strong></h6>
                                
                                 <div class="col-sm-3">
                                <input type="number" class="form-control" name="QD4" id="QD4" min="0" max="3" step="0.5" 
                               value="<?php echo $QD4?>">(Full Mark:3)
                                </div>
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
