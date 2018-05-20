<?php
include("SupervisorCheck.php"); 
if(isset($_POST['update']))
{    

    $ID = $_POST['Student_Id'];
    $Feedback_Form = $_POST['Feedback_Form'];
	$Pre_Evaluation = $_POST['Pre_Evaluation'];
	$End_Letter = $_POST['End_Letter'];
	$Logbook = $_POST['Logbook'];
	$Report = $_POST['Report'];
	
    
	//updating the table
	$result = mysqli_query($db, "UPDATE atitude_mark SET Feedback_Form='$Feedback_Form',Pre_Evaluation='$Pre_Evaluation',End_Letter='$End_Letter',Logbook='$Logbook',Report='$Report' WHERE Student_Id=$ID");
	
	//redirectig to the display page. In our case, it is index.php
      
	  
		
	echo "<script>
	alert('Successfully Updated');
	window.location.href='view_Atitude.php';
	</script>"; 
  
}


//getting id from url
$id = $_GET['Student_Id'];
 
//selecting data associated with this particular id
$result1 = mysqli_query($db, "CALL atitude_Mark('".$_GET['Student_Id']."')");
 
while($res = mysqli_fetch_array($result1))
{
	$name = $res['Student_Name'];
    $Feedback_Form = $res['Feedback_Form'];
	$Pre_Evaluation = $res['Pre_Evaluation'];
	$End_Letter = $res['End_Letter'];
	$Logbook = $res['Logbook'];
	$Report = $res['Report'];
    
}

$result1->close();
$db->next_result();

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Supervisor Main</title>
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
                                    <h4 class="title">Atitude Asessment</h4>
                                  
                                </div>
                                <div class="card-content">
                                <form action="update_Atitude.php" method="POST">
                                
                                <div class="row">
                                <div class="form-group">
                                <label class="col-sm-4" for="Student_Id">Student Name*:</label>
                                <div class="col-sm-6">
                                <input type="text" class="form-control" id="Student_Id" name="Student_Id" 
                                value="<?php echo $name?>" readonly/>
                                </div>
                                </div>
                                </div>
                                   
                                <div class="form-group has-success has-feedback">
                                <label class="col-sm-4"for="Feedback_Form">1. Feedback Form:</label>
                                <div class="col-sm-8">
                                <span style="display:inline-block; width:50px;"></span>
                                <input type="checkbox" name="Feedback_Form" value="2" 
								<?php if ($Feedback_Form==2) echo 'checked="checked"'; else echo '';?>> Yes
                                <input type="checkbox" name="Feedback_Form" value="0" 
								<?php if ($Feedback_Form==0) echo 'checked="checked"'; else echo '';?>> No
                                </div>
                                </div>
                                 
  								<div class="form-group has-success has-feedback">
                                <label class="col-sm-4"for="Pre_Evaluation">2. Pre Evaluation Form:</label>
                                <div class="col-sm-8">
                                <span style="display:inline-block; width:50px;"></span>
                                <input type="checkbox" name="Pre_Evaluation" value="2" 
                                <?php if ($Pre_Evaluation==2) echo 'checked="checked"'; else echo '';?>> Yes
                                <input type="checkbox" name="Pre_Evaluation" value="0" 
                                <?php if ($Pre_Evaluation==0) echo 'checked="checked"'; else echo '';?>> No
                                </div>
                                </div>                                    
                                    
                                <div class="form-group has-success has-feedback">
                                <label class="col-sm-4"for="End_Letter">3. End Internship Confirmation Letter:</label>
                                <div class="col-sm-8">
                                <span style="display:inline-block; width:50px;"></span>
                                <input type="checkbox" name="End_Letter" value="2" 
                                <?php if ($End_Letter==2) echo 'checked="checked"'; else echo '';?>> Yes
                                <input type="checkbox" name="End_Letter" value="0" 
                                <?php if ($End_Letter==0) echo 'checked="checked"'; else echo '';?>> No
                                </div>
                                </div>
                                
                                <div class="form-group has-success has-feedback">
                                <label class="col-sm-4"for="Logbook">4. Logbook:</label>
                                <div class="col-sm-8">
                                <span style="display:inline-block; width:50px;"></span>
                                <input type="checkbox" name="Logbook" value="2" 
								<?php if ($Logbook==2) echo 'checked="checked"'; else echo '';?>> Yes
                                <input type="checkbox" name="Logbook" value="0" 
                                <?php if ($Logbook==0) echo 'checked="checked"'; else echo '';?>> No
                                </div>
                                </div>  
                                
                                <div class="form-group has-success has-feedback">
                                <label class="col-sm-4"for="Report">5. Internship Report:</label>
                                <div class="col-sm-8">
                                <span style="display:inline-block; width:50px;"></span>
                                <input type="checkbox" name="Report" value="2" 
								<?php if ($Report==2) echo 'checked="checked"'; else echo '';?>> Yes
                                <input type="checkbox" name="Report" value="0" 
                                <?php if ($Report==0) echo 'checked="checked"'; else echo '';?>> No
                                </div>
                                </div>  
                                
                                                                    
                                    
                              <div class="row">
                              <div class="col-md-6">
                            <input type="hidden" name="Student_Id" value=<?php echo $_GET['Student_Id'];?>> 
							<input type="submit" id="update" name="update" value="Update" class="btn btn-default">
                              </div>
                              </div>
                               
                                       
                            <div class="clearfix"></div>
                                              </form>
                                    
                                    
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