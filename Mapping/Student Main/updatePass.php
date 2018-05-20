<?php
include("../Connections/Connection.php"); 
if(isset($_POST['update']))
{    
   
    $Student_Matric = $_POST['Student_Matric'];
	$pass = $_POST['Password'];
	$comfirm = $_POST['Confirm_Password']; 
	
    
    // checking empty fields
    if(empty($pass)|| empty($comfirm)) {           
        
		if(empty($pass)) {
            echo "<font color='red'>Password field is empty.</font><br/>";
        }  
		 if(empty($comfirm)) {
            echo "<font color='red'>Comfirm Password field is empty.</font><br/>";
        }
        
		    
    } else {    
        //updating the table
        $result = mysqli_query($db, "UPDATE student SET Password='$pass',Confirm_Password='$comfirm' WHERE Student_Matric='$Student_Matric'");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: ../Main/StudentLogin.php");
    }
}


//getting id from url
$id = $_GET['Student_Matric'];
 
//selecting data associated with this particular id
$result = mysqli_query($db, "SELECT * FROM student WHERE Student_Matric='$id'");
 
while($res = mysqli_fetch_array($result))
{
    $staffid = $res['Student_Matric'];
	
    
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../Landing Page/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../Landing Page/assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Login Page</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../Landing Page/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../Landing Page/assets/css/now-ui-kit.css?v=1.1.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../Landing Page/assets/css/demo.css" rel="stylesheet" />
</head>

<body class="login-page sidebar-collapse">
   <!-- Navbar -->
    <nav class="navbar navbar-expand-lg  fixed-top bg-primary navbar-transparent  " color-on-scroll="400">
        <div class="container">
            <div class="navbar-translate">
              <div class="navbar-brand"><a href="../Main/Main.php"><img src="../FTMK-logo.png" alt="FTMK logo"></a></div>
                <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            
            <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="../assets/img/blurred-image-1.jpg">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../Main/StudentLogin.php">Student</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../CompanyMain/Login.php">Company</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Main/SupervisorLogin.php">Supervisor</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    
    <!-- Form -->
    <div class="page-header" filter-color="orange">
        <div class="page-header-image" style="background-image:url(../icon/ftmk.jpg)"></div>
        <div class="container">
            <div class="col-md-4 content-center">
                <div class="card card-login card-plain">
                    <form class="form" method="post" action="updatePass.php">
                        <div class="header header-primary text-center">
                                <h1 class="title text-center">Update Password</h1>
                               
                        </div>
                        <div class="content">
                        
                        
                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons text_caps-small"></i>
                                </span>
                                <input type="password" class="form-control" id="Password"  name="Password" placeholder="Password" required/>
                                
                            </div>
                             <h6>
                               <input type="checkbox" onclick="myFunction()">Show Answer
                            </h6>
                            
                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons text_caps-small"></i>
                                </span>
                                <input type="password" placeholder="Comfirm Password" id="Confirm_Password" name="Confirm_Password"  class="form-control" required />
                                 
                            </div> 
                             <h6>
                               <input type="checkbox" onclick="myFunction2()">Show Answer
                            </h6>
                        </div>
                       
                        
                        <div class="footer text-center">
                        <td><input type="hidden" name="Student_Matric" value=<?php echo $_GET['Student_Matric'];?>></td>
                        <td><input type="submit" id="update" name="update" value="Update" class="btn btn-primary btn-round btn-lg btn-block" ></td>
                         
                           
                        </div>
                        
                    </form>
                    
                     <script>
function myFunction() {
    var x = document.getElementById("Password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

function myFunction2() {
    var x = document.getElementById("Confirm_Password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

</script>    
                </div>
            </div>
        </div>
        <!-- End Form -->
          <!--Footer-->
        
          <?php include "../Footer.php"; ?>         
  
        <!-- End Footer-->
    </div>
   


</body>
<!--   Core JS Files   -->
<script src="../Landing Page/assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../Landing Page/assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../Landing Page/assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../Landing Page/assets/js/plugins/bootstrap-switch.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="../Landing Page/assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="../Landing Page/assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="../Landing Page/assets/js/now-ui-kit.js?v=1.1.0" type="text/javascript"></script>

</html>
<script type="text/javascript">
$("#Password").password();
</script>
<script type="text/javascript">
$("#Confirm_Password").password();
</script>
<script type="text/javascript">
    $(function () {
        $("#update").click(function () {
            var password = $("#Password").val();
            var confirmPassword = $("#Confirm_Password").val();
            if (password != confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }
            return true;
        });
    });
</script>