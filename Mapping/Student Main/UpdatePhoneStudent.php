<?php
// including the database connection file
include("Connections/Connection.php");
 
if(isset($_POST['update']))
{    
  
	$phone = $_POST['Student_Phone'];
	$staffid = $_POST['Student_Matric'];

	
    
        //updating the table
        $result = mysqli_query($db, "UPDATE student SET  Student_Phone='$phone'  WHERE Student_Matric=$staffid");
        
        //redirectig to the display page. In our case, it is index.php
      
		
		 echo "<script>
		  alert('Successfully Updated');
		  window.location.href='StudentMain.php?Student_Matric=$staffid';
		  </script>"; 
  
}
?>

<?php
$con = mysqli_connect("localhost","root","","mapping");//create a connection to a database
//getting id from url
$id = $_GET['Student_Matric'];
 
//selecting data associated with this particular id
$result = mysqli_query($con, 'SELECT student.Student_Id,student.Student_Name,student.Student_Matric,student.Student_Course,student.semester_session,student.Student_Phone,supervisor.Supervisor_Name FROM student INNER JOIN stud_attachment ON student.Student_Id = stud_attachment.Student_Id INNER JOIN company ON company.Company_Id = stud_attachment.Company_Id INNER JOIN sv_assignment ON company.Group_Id = sv_assignment.Group_Id INNER JOIN supervisor ON supervisor.Supervisor_Id = sv_assignment.Supervisor_Id WHERE student.Student_Matric="'.$id.'"');
 
while($res = mysqli_fetch_array($result))
{
	
    $matric = $res['Student_Matric'];
    $name = $res['Student_Name'];
	$course = $res['Student_Course'];
	$session = $res['semester_session'];
	$phone = $res['Student_Phone'];
	$svname = $res['Supervisor_Name'];
	$error = " ";
	
	
	
	
    
}

if(mysqli_num_rows($result)==0)
 {
	
	$matric = " ";
	$name = " ";
	$course = " ";
	$session = " ";
	$phone = " ";
	$svname = " ";
	
	$error ="The Internship Details Are Not Available ! Please come again later";
	echo "<script>
alert('The Internship Details Are Not Available ! Please come again later');
window.location.href='StudentLogin.php';
</script>";
	 
 }
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Student Main</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-image="icon/sidebar.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="logo">
                 <h6 class="text-center"><strong><?php echo $name; ?></strong></h6>
              <h6 class="text-center"><strong>1-2017/2018</strong></h6>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="active">
                        <a href="StudentMain.php?Student_Matric=<?php echo$_GET['Student_Matric'] ?>">
                            <i class="material-icons">dashboard</i>
                            <p>Profile</p>
                        </a>
                    </li>
                     
                        <li class="dropdown">
                                <a href="#submenu-2" class="accordion-toggle collapsed toggle-switch" data-toggle="collapse">
                                    <i class="material-icons">bookmark</i>
                                    <p>Feedback</p>
                                </a>
                                <ul class="panel-collapse collapse panel-switch" role="menu" id="submenu-2">
                                    <li>
                                        <a href="ViewFeedback.php?Student_Matric=<?php echo $_GET['Student_Matric'] ?>">View Feedback</a>
                                    </li>
                                    <li>
                                        <a href="StudentMain2.php?Student_Name=<?php echo $name ?>&Student_Course=<?php echo $course ?>&Supervisor_Name=<?php echo $svname ?>">Feedback Form</a>
                                    </li>
                                </ul>
                            </li>
                    
                    <li>
                     <a href="InternView.php?Student_Matric=<?php echo $_GET['Student_Matric'] ?>">
                     <i class="material-icons">book</i>
                     <p>Internship Details</p>
                     </a>
                    </li>
                    
                    <li>
                     <a href="SVDetails.php?Student_Matric=<?php echo $_GET['Student_Matric'] ?>">
                     <i class="material-icons">person pin</i>
                     <p>Supervisor Details</p>
                     </a>
                    </li>
                    
                     <li>
                     <a href="ViewCompanyDetails.php?Student_Matric=<?php echo $_GET['Student_Matric'] ?>">
                     <i class="material-icons">assignment ind</i>
                     <p>Company Details</p>
                     </a>
                    </li>
                   
                        </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-transparent navbar-absolute">
              <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"> Student Profile </a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                          
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">person</i>
                                    <p class="hidden-lg hidden-md">Account</p>
                                </a>
                                <ul class="dropdown-menu">
                                   
                                    <li>
                                        <a href="Main.php">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
       <div class="content">
         <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title"><?php echo $name; ?></h4>
                                    <h4 class="title"><?php echo $error; ?></h4>

                                </div>
                                <div class="card-content">
                                                                  
                                    <form action="UpdatePhoneStudent.php" method="post">
                                        <div class="row">
                                            <div class="col-md-4">
                                             <div class="form-group label-floating">
                                             <label class="control-label">Matric No</label>
    <input type="text" class="form-control" value="<?php echo $matric; ?>" disabled>
                                                </div> 
  													</div>
                                                    <div class="col-md-8">
                                         <div class="form-group label-floating">
                                                    <label class="control-label">Name</label>
          <input type="text" class="form-control" value="<?php echo $name; ?>" disabled>
                                                </div>   </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Course</label>
                                                    <input type="text" class="form-control" value="<?php echo $course; ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Sem/Session</label>
                                                    <input type="text" class="form-control" value="<?php echo $session ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                          <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Phone Number</label>
                                                    <input type="text" class="form-control" id="Student_Phone"
                                                     name="Student_Phone" value="<?php echo $phone; ?>">
                                                </div>
                                            </div> 
                                            </div>
                                              <div class="row">
                                        <div class="col-md-8">
                                        <input type="hidden" name="Student_Matric" value=<?php echo  $_GET['Student_Matric'];?>>
										<input type="submit" id="update" name="update" value="Update" class="btn btn-default">
                                        </div>
                                        </div>
                                             
                                             
                                       
 <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>
                </div>
          </div>
   <footer class="footer">
                    <p class="copyright pull-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        <a href="#">Bengkel 2 Group 1</a>, made with love for a better web
                    </p>
      </div>
            </footer>
</div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/js/material.min.js" type="text/javascript"></script>
<!--  Charts Plugin -->
<script src="assets/js/chartist.min.js"></script>
<!--  Dynamic Elements plugin -->
<script src="assets/js/arrive.min.js"></script>
<!--  PerfectScrollbar Library -->
<script src="assets/js/perfect-scrollbar.jquery.min.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="assets/js/material-dashboard.js?v=1.2.0"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>


</html>

