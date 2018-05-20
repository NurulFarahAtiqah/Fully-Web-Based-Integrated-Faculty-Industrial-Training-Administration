<?php
// including the database connection file
include("../Supervisor Main/SupervisorCheck.php");
 
//getting id from url
$id = $_GET['Student_Id'];
 

//selecting data associated with this particular id
$result = mysqli_query($db, "CALL logbook_Mark('".$_GET['Student_Id']."')");


while($res = mysqli_fetch_array($result))
{
	
	$name = $res['Student_Name'];
    $QA1 = $res['QA1'];
	$QA2 = $res['QA2'];
	
    
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
                                    <h4 class="title">Logbook Assesment(Faculty Supervisor)</h4>
                                 </div>
                                 
                                 
                                <div class="card-content">
                                
                                <!--form-->
                                <form action="printlog.php?Student_Id=<?php echo $id; ?>" method="POST" class="form-horizontal" name="form1">
                                
                                
                                <div class="form-group">
                                <label class="col-sm-3" for="Student_Id">Student Name:</label>
                                <div class="col-sm-6">
                                <input type="text" class="form-control" value="<?php echo $name; ?>" disabled/>
                                </div>
                                </div>
                                
                                
                                <h5 class="text-center"><strong>Section A:Content</strong></h5>
                                
                                <div class="form-group">
                                <h6><strong>1. Clearly states the work / daily tasks performed</strong></h6>
								<h6><strong>2. Clealy states the methods and approaches used to perform tasks</strong></h6>
                                <h6><strong>3. Clearly states  the daily results and progress</strong></h6>
                                <h6><strong>4. Clearly states  the Problem, Experience, Knowledge AND Skills Provided</strong></h6>
                                
                               
                                
                           
                                <div class="col-sm-3">
                                 <input type="text" class="form-control" value="<?php echo $QA1; ?>" disabled/>
                                </div>
                                </div>
                                
                                 <div class="form-group">
                               <label class="col-sm-6" for="QB1">TOTAL MARK(40):</label>
                              <div class="col-sm-3">
                                <input type="text" class="form-control" value="<?php echo $QA1; ?>" readonly/>
                                </div>
                                </div>
                                
                               
                                <h5 class="text-center"><strong>Section B:Logbook Content Details</strong></h5>
                             
                                <div class="form-group">
                                <h6><strong>1. Logbook are neat and easy to read</strong></h6>
								<h6><strong>2. Logbook are written in English well</strong></h6>
                                <h6><strong>3. Logbook are compiled with easy-to-use words and sentences easy to understand</strong></h6>
                                <h6><strong>4. Checked by industry supervisors from time to time within the specified timeframe</strong></h6>
                                
                               
                               
                                 
                                <div class="col-sm-3">
                                <input type="text" class="form-control" value="<?php echo $QA2; ?>" disabled/>
                                </div>
                                </div>
                                
                                  <div class="form-group">
                               <label class="col-sm-6" for="QB1">TOTAL MARK (20):</label>
                              <div class="col-sm-3">
                                <input type="text" class="form-control" value="<?php echo $QA2; ?>" readonly/>
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

