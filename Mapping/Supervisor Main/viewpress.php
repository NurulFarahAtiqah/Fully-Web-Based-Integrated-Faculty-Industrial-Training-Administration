<?php
// including the database connection file
include("../Supervisor Main/SupervisorCheck.php");
 

//getting id from url
$id = $_GET['Student_Id'];
 
//selecting data associated with this particular id
$result = mysqli_query($db, "CALL sv_presentation_Mark('".$_GET['Student_Id']."')");


while($res = mysqli_fetch_array($result))
{
	$name = $res['Student_Name'];
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
    $TB = $res['TB'];
	$TC = $res['TC'];
	$TD = $res['TD'];
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
                                    <h4 class="title">Presentation Assesment(Faculty Supervisor)</h4>
                                 </div>
                                 
                                 
                                <div class="card-content">
                                
                                <!--form-->
                                <form action="printpres.php?Student_Id=<?php echo $id; ?>" method="POST" class="form-horizontal" name="form1">
                                
                                
                                <div class="form-group">
                                <label class="col-sm-3" for="Student_Id">Student Name*:</label>
                                <div class="col-sm-6">
                                 <input type="text" class="form-control" value="<?php echo $name; ?>" disabled/>
                                </div>
                                </div>
                                
                                
                                <h5 class="text-center"><strong>Section A:Preparation</strong></h5>
                                
                                
                                <div class="row">
                                
                                <div class="form-group">
                                 <h6 class="col-md-6"><strong>1. Good preparation and use visual aid appropriately</strong></h6>
                                 <div class="col-sm-3">
                                <input type="text" class="form-control" value="<?php echo $QA1; ?>" disabled/>
                                </div>
                                </div>
                                </div>
                                
                                <div class="row">
                                
                                <div class="form-group">
                                 <h6 class="col-md-6"><strong>TOTAL MARK (5):</strong></h6>
                                 <div class="col-sm-3">
                                <input type="text" class="form-control" value="<?php echo $QA1; ?>" disabled/>
                                </div>
                                </div>
                                </div>
                                
                                
                                
								<h5 class="text-center"><strong>Section B:Presentation</strong></h5>
                                
                                
                                <div class="row">
                                
                                 <div class="form-group">
                                 <h6 class="col-md-6"><strong>1. Presentation style</strong></h6>
                                 <div class="col-sm-3">
                                 <input type="text" class="form-control" value="<?php echo $QB1; ?>" disabled/>
                                </div>
                                </div>
                                </div>
                               
                           
                                <div class="row">
                                
                                 <div class="form-group">
                                 <h6 class="col-md-6"><strong>2. Confidence and energetic presentation</strong></h6>
                                 <div class="col-sm-3">
                                <input type="text" class="form-control" value="<?php echo $QB2; ?>" disabled/>
                                </div>
                                </div>
                                </div>
                                
                                 <div class="row">
                                
                                 <div class="form-group">
                                 <h6 class="col-md-6"><strong>3.Well organize and structured presentation.</strong></h6>
                                 <div class="col-sm-3">
                                <input type="text" class="form-control" value="<?php echo $QB3; ?>" disabled/>
                                </div>
                                </div>
                                </div>
                                
                                <div class="row">
                                
                                 <div class="form-group">
                                 <h6 class="col-md-6"><strong>4. Fluency of the delivery</strong></h6>
                                 <div class="col-sm-3">
                               <input type="text" class="form-control" value="<?php echo $QB4; ?>" disabled/>
                                </div>
                                </div>
                                </div>
                                
                                 <div class="row">
                                
                                 <div class="form-group">
                                 <h6 class="col-md-6"><strong>5. Clear and understandable presentation</strong></h6>
                                 <div class="col-sm-3">
                                 <input type="text" class="form-control" value="<?php echo $QB5; ?>" disabled/>
                                </div>
                                </div>
                                </div>
                                
                                 <div class="row">
                                 <div class="form-group">
                                 <h6 class="col-md-6"><strong>TOTAL MARK (50):</strong></h6>
                                 <div class="col-sm-3">
                                 <input type="text" class="form-control" value="<?php echo $TB; ?>" disabled/>
                                </div>
                                </div>
                                </div>
                               
                               
                               
                                 <h5 class="text-center"><strong>Section C:Content</strong></h5>
                             
                                 <div class="row">
                                
                                 <div class="form-group">
                                 <h6 class="col-md-6"><strong>1. Intoduction</strong></h6>
                                
                                 <div class="col-sm-3">
                                 <input type="text" class="form-control" value="<?php echo $QC1; ?>" disabled/>
                                </div>
                                </div>
                                </div>
                                
                                 <div class="row">
                                
                                 <div class="form-group">
                                 <h6 class="col-md-6"><strong>2. Description of the implemented task(s)/project(s)</strong></h6>
                                
                                 <div class="col-sm-3">
                                 <input type="text" class="form-control" value="<?php echo $QC2; ?>" disabled/>
                                </div>
                                </div>
                                </div>
                                
                                 <div class="row">
                                
                                 <div class="form-group">
                                 <h6 class="col-md-6"><strong>3. Conclusion</strong></h6>
                                 
                                 <div class="col-sm-3">
                               <input type="text" class="form-control" value="<?php echo $QC3; ?>" disabled/>
                                </div>
                                </div>
                                </div>
                                
                                 <div class="row">
                                 <div class="form-group">
                                 <h6 class="col-md-6"><strong>TOTAL MARK (35):</strong></h6>
                                 <div class="col-sm-3">
                                 <input type="text" class="form-control" value="<?php echo $TC; ?>" disabled/>
                                </div>
                                </div>
                                </div>
                               
                                
                                 
                                <h5 class="text-center"><strong>Section D:QUESTION and ANSWER</strong></h5>
                             
                                 <div class="row">
                                
                                 <div class="form-group">
                                 <h6 class="col-md-6"><strong>1. Understand question well</strong></h6>
                                 <div class="col-sm-3">
                                 <input type="text" class="form-control" value="<?php echo $QD1; ?>" disabled/>
                                 </div>
                                 </div>
                                 </div>
                                
                                 <div class="row">
                                
                                 <div class="form-group">
                                 <h6 class="col-md-6"><strong>2. Pay attention to the questions</strong></h6>
                                 <div class="col-sm-3">
                                  <input type="text" class="form-control" value="<?php echo $QD2; ?>" disabled/>
                                </div>
                                </div>
                                </div>
                                
                                 <div class="row">
                                
                                 <div class="form-group">
                                 <h6 class="col-md-6"><strong>3. Answer question calmly and confidently</strong></h6>
                                
                                 <div class="col-sm-3">
                               <input type="text" class="form-control" value="<?php echo $QD3; ?>" disabled/>
                                </div>
                                </div>
                                </div>
                                
                                <div class="row">
                                
                                 <div class="form-group">
                                 <h6 class="col-md-6"><strong>4. Answers given satisfactory</strong></h6>
                                
                                 <div class="col-sm-3">
                               <input type="text" class="form-control" value="<?php echo $QD4; ?>" disabled/>
                                </div>
                                </div>
                                </div>
                                
                                <div class="row">
                                <div class="form-group">
                                 <h6 class="col-md-6"><strong>TOTAL MARK (10):</strong></h6>
                                 <div class="col-sm-3">
                                 <input type="text" class="form-control" value="<?php echo $TD; ?>" disabled/>
                                </div>
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
