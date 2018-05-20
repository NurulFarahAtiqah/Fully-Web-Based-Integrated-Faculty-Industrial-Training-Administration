<?php

include("StudentCheck.php"); 
//getting id from url
$id = $login_user;
 
//selecting data associated with this particular id
$result = mysqli_query($db, 'SELECT supervisor.Supervisor_Name, student.Student_Course, student.Student_Name,student.Student_Matric, company.Company_Name, company.Company_Phone, company.Company_Add,company.Company_Add2,company.Company_City,company.Company_Fax, company.Company_Posscode, company.Company_State,company.Company_Latitude,Company.Company_Longtitude FROM student INNER JOIN stud_attachment ON student.Student_Id = stud_attachment.Student_Id INNER JOIN company ON company.Company_Id = stud_attachment.Company_Id INNER JOIN sv_assignment ON company.Group_Id = sv_assignment.Group_Id INNER JOIN supervisor ON supervisor.Supervisor_Id = sv_assignment.Supervisor_Id WHERE student.Student_Matric="'.$id.'"');
 
while($res = mysqli_fetch_array($result))
{
	$course = $res['Student_Course'];
    $svname = $res['Supervisor_Name'];
    $matric = $res['Student_Matric'];
    $name = $res['Student_Name'];
	 $cname = $res['Company_Name'];
    $phone = $res['Company_Phone'];
    $add = $res['Company_Add'];
	$posscode = $res['Company_Posscode'];
    $state = $res['Company_State'];
	$lat = $res['Company_Latitude'];
	$long = $res['Company_Longtitude'];
	$add2 = $res['Company_Add2'];
	$city = $res['Company_City'];
	$fax = $res['Company_Fax'];
	
	$map = "<a class='btn btn-info btn-sm' href=\"https://www.google.com.my/maps/dir/'$lat,$long'/\" target=\"_blank\">View Map</a>";
	$error="";
	
	
    
}
if(mysqli_num_rows($result)==0)
{
	$add2 = "";
	$city = "";
	$fax = "";
	$course = "";
    $svname = "";
	$matric = "";
    $name ="";
	$cname ="";
    $phone = "";
    $add ="";
	$posscode ="";
    $state = "";
	$lat = "";
	$long = "";
	$map = "<a class='btn btn-info btn-sm' href=\"https://www.google.com.my/maps/dir/'$lat,$long'/\" target=\"_blank\">View Map</a>";
	$error="Your Are Not Assigned To Any Company Yet";
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Student Main</title>
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
    <?php include "StudentNav.php"; ?>
        <div class="main-panel">
          <?php include "NavHeader.php"; ?>
          
          
       <div class="content">
         <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="red">
                                    <h4 class="title"><?php echo $cname; ?></h4>
                                   <h4 class="title"><?php echo $error; ?></h4>
                                </div>
                                <div class="card-content">
                                    <form>
                                        			<div class="row">
                                                    <div class="col-md-12">
                                         <div class="form-group label-floating">
                                                    <label class="control-label">Company Name</label>
          <input type="text" class="form-control" value="<?php echo $cname; ?>" disabled>
                                                </div>   </div>
                                            
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Address 1</label>
                                                    <input type="text" class="form-control" value="<?php echo $add; ?>" disabled>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Address 2</label>
                                                    <input type="text" class="form-control" value="<?php echo $add2; ?>" disabled>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">City</label>
                                                    <input type="text" class="form-control" value="<?php echo $city ?>" disabled>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Postcode</label>
                                                    <input type="text" class="form-control" value="<?php echo $posscode ?>" disabled>
                                                </div>
                                            </div>
                                       
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">State</label>
                                                    <input type="text" class="form-control" value="<?php echo $state; ?>" disabled>
                                                </div>
                                            </div> 
                                            </div>
                                            
                                             <div class="row">
                                             
                                              <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Company Fax Number</label>
                                                    <input type="text" class="form-control" value="<?php echo $fax; ?>" disabled>
                                                </div>
                                            </div> 
                                            
                                            
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Company Phone Number</label>
                                                    <input type="text" class="form-control" value="<?php echo $phone; ?>" disabled>
                                                </div>
                                            </div> 
                                            </div>
                                            
                                            
                                            <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Latitude</label>
                                                    <input type="text" class="form-control" value="<?php echo $lat; ?>" disabled>
                                                </div>
                                            </div>
                                       
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Longtitude</label>
                                                    <input type="text" class="form-control" value="<?php echo $long; ?>" disabled>
                                                </div>
                                            </div> 
                                            </div>
                                            
                                            <div class="row">
                                            <div class="col-md-6">
                                            <?php echo $map; ?> 
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
</html
></html>

