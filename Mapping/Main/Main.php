<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../Landing Page/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../Landing Page/assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Main Page</title>
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

<body class=" sidebar-collapse">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg  fixed-top bg-primary navbar-transparent  " color-on-scroll="400">
        <div class="container">
            <div class="navbar-translate">
              <div class="navbar-brand"><a href="Main.php"><img src="../FTMK-logo.png" alt="FTMK logo"></a></div>
                <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            
            <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="../assets/img/blurred-image-1.jpg">
              
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    
    
    
    <div class="wrapper">
        <div class="page-header" filter-color="orange">
            <div class="page-header-image" data-parallax="true" style="background-image:url(../icon/ftmk.jpg);">
            </div>
            <div class="container">
                <div class="content-center">
                    <h1 class="title text-center">FTMK Industrial Training Web Application</h1>
                    <h3 class="description text-center">A Fully Web-Based Integration For Faculty Industrial Training.</h3>
                    <form>
                    <label>Choose Type of User:</label> <select name = " SiteSelector" onChange="Site(this.value)">
                     <option selected>Select</option>
                     <option value = "Sign In.php">AJK</option>
                     <option value = "SupervisorLogin.php">Supervisor</option>
                     <option value = "../CompanyMain/Login.php">Company</option>
                     <option value = "StudentLogin.php">Student</option>
                     </select>
                                
                    
                    </form>
                </div>
            </div>
        </div>
        
        <div class="wrapper">
        
      
        </div>
        
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
<script>
    var header_height;
    var fixed_section;
    var floating = false;

    $(document).ready(function() {
        suggestions_distance = $("#suggestions").offset();
        pay_height = $('.fixed-section').outerHeight();

        $(window).on('scroll', nowuiKit.checkScrollForTransparentNavbar);

        if ($(window).width() >= 768) {
            big_image = $('.header[data-parallax="true"]');
            if (big_image.length != 0) {
                $(window).on('scroll', nowuiKitDemo.checkScrollForParallax);
            }
        }

        // the body of this function is in assets/js/now-ui-kit.js
        nowuiKit.initSliders();
    });
</script>

</html>
<script>
function Site(val)
{
window.location.href = val;
}

</script>
