<?php
$con = mysqli_connect("localhost","root","","mapping");//create a connection to a database
//getting id from url
$id = $_GET['Supervisor_StaffID'];
 
//selecting data associated with this particular id
$result = mysqli_query($con, 'SELECT * FROM supervisor WHERE Supervisor_StaffID = "'.$id.'"');
 
while($res = mysqli_fetch_array($result))
{
	$sid =$res['Supervisor_Id'];
	$svname = $res['Supervisor_Name'];
	$sdept = $res['Supervisor_Department'];
	$sphone = $res['Supervisor_Phone'];
	$st = $res['Supervisor_St'];
	$role = $res['Supervisor_Status'];
	$staffid = $res['Supervisor_StaffID'];

    
}
?>
<!doctype html>
<html lang="en">
<style>
.colourbox {
  float: left;
  width: 14px;
  height: 14px;
  margin: 0px;
  border: 1px solid rgba(0, 0, 0, .2);
}

.bits {
  background: #0099FF;
}

.biti {
  background: #FFCE00;
}

.bitd {
  background: #45A081;
}

.bite {
  background: #9B59B6;
}

.bitz {
  background: #5D6D7E;
}

.bitm {
  background: #ECF0F1;
}

.bitc {
  background: #E74C3C;
}
</style>
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Map</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href=".assets/css/demo.css" rel="stylesheet" />
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
                 <h6 class="text-center"><strong><?php echo $svname; ?></strong></h6>
              <h6 class="text-center"><strong>1-2017/2018</strong></h6>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li>
                        <a href="SupervisorMain.php?Supervisor_StaffID=<?php echo $staffid ?>">
                            <i class="material-icons">dashboard</i>
                            <p>Profile</p>
                        </a>
                    </li>
                     
                       <li>
                     <a href="ViewStateSupervisor.php?Supervisor_StaffID=<?php echo $staffid ?>">
                     <i class="material-icons">done</i>
                     <p>Preference State</p>
                     </a>
                    </li>
                    
                  <li>
                     <a href="ViewStudentAttachmentMap.php?Supervisor_StaffID=<?php echo $staffid ?>">
                     <i class="material-icons">person pin</i>
                     <p>Student Attachment</p>
                     </a>
                    </li>
                    
                     <li>
                     <a href="FeedbackView.php?Supervisor_StaffID=<?php echo $staffid ?>">
                     <i class="material-icons">bookmark</i>
                     <p>Student Feedback</p>
                     </a>
                    </li>
                 
                   <li class="active">
                     <a href="ViewMapSV.php?Supervisor_StaffID=<?php echo $staffid ?>">
                     <i class="material-icons">location_on</i>
                     <p>View Map</p>
                     </a>
                    </li>  
                    <li>
                     <a href="ViewAllList.php?Supervisor_StaffID=<?php echo $staffid ?>">
                     <i class="material-icons">face</i>
                     <p>All Internship</p>
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
                        <a class="navbar-brand" href="#">  </a>
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
                            <div class="card card-plain">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">View Maps</h4>

                                </div>

                                <div class="card-content card"> <h4>Filter</h4>
                                  <div id="buttons">
                                  <div class='col-lg-4'>
									        <table id="company_data" class="table table-striped table-bordered">
        <thead>
        <tr>
                              <td>Course</td>
                              <td>No of Student</td>

        </tr>
        </thead>
		<tbody>
            <?php
			  $query2 = "SELECT student.student_course,COUNT(student.student_course) AS NUMBER FROM company INNER JOIN stud_attachment ON company.Company_Id=stud_attachment.Company_Id INNER JOIN student ON student.Student_Id=stud_attachment.Student_Id GROUP BY student.Student_Course";
			    $result2 = mysqli_query($con,$query2);

        						while($row2 = mysqli_fetch_array($result2))
        					   	{
            						$course = $row2['student_course'];
            				        $noofstudent = $row2['NUMBER'];

          						  echo '<tr>';
          						  echo '<td>';
          						  echo $course;
								  echo '<td>';
          						  echo $noofstudent;
          					    echo '</td>';
          					    echo '</tr>';
        						   }

        								?>
		</tbody>
        </table>
                                    <input type="checkbox" name="filter" value="BITS" class='chk-btn'checked onclick="selectAllChecked();">
                                    <label for='bits'>BITS<div class="colourbox bits"></div></label>

                                    <input type="checkbox" name="filter" value="BITI" class='chk-btn'checked onclick="selectAllChecked();">
                                    <label for='biti'>BITI<div class="colourbox biti"></div></label>

                                    <input type="checkbox" name="filter" value="BITD" class='chk-btn'checked onclick="selectAllChecked();">
                                    <label for='bitd'>BITD<div class="colourbox bitd"></div></label>

                                    <input type="checkbox" name="filter" value="BITE" class='chk-btn'checked onclick="selectAllChecked();">
                                    <label for='bite'>BITE<div class="colourbox bite"></div></label>

                                    <input type="checkbox" name="filter" value="BITZ" class='chk-btn'checked onclick="selectAllChecked();">
                                    <label for='bitz'>BITZ<div class="colourbox bitz"></div></label>

                                    <input type="checkbox" name="filter" value="BITM" class='chk-btn' checked onclick="selectAllChecked();">
                                    <label for='bitm'>BITM<div class="colourbox bitm"></div></label>

                                    <input type="checkbox" name="filter" value="BITC" class='chk-btn'checked onclick="selectAllChecked();">
                                    <label for='bitc'>BITC<div class="colourbox bitc"></div></label>

                                </div>
                                  <div id="map-canvas"></div>
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



<script>
var gmarkers1 = [];
var markers1 = [];

markers1 = [
  <?php
  $query = "SELECT Company_Name,Company_Add,Company_Phone,Company_Latitude,Company_Longtitude,student.Student_Course FROM company INNER JOIN stud_attachment ON company.Company_id=stud_attachment.Company_id INNER JOIN student on stud_attachment.Student_Id=student.Student_Id ORDER BY company.Company_Id";
  $query2 = "SELECT COUNT(student.student_course) AS NUMBER FROM company INNER JOIN stud_attachment ON company.Company_Id=stud_attachment.Company_Id INNER JOIN student ON student.Student_Id=stud_attachment.Student_Id GROUP BY company.Company_Id,student.Student_Course ORDER BY company.Company_Id";
  $result = mysqli_query($con,$query);
  $result2 = mysqli_query($con,$query2);

  $types = array();
  while(($row2 =  mysqli_fetch_assoc($result2))) {
      $types[] = $row2['NUMBER'];
  }

  while($row = mysqli_fetch_array($result)){
    $lat = $row['Company_Latitude'];
    $lng = $row['Company_Longtitude'];
    $companyname = $row['Company_Name'];
    $companyadd = $row['Company_Add'];
    $companyphone = $row['Company_Phone'];
    $stud_course = $row['Student_Course'];

    switch ($stud_course) {
    case "BITS":
        $colour = '0099FF';
        break;
    case "BITI":
        $colour = 'FFCE00';
        break;
    case "BITD":
        $colour = '45A081';
        break;
    case "BITE":
        $colour = '9B59B6';
        break;
    case "BITZ":
        $colour = '5D6D7E';
        break;
    case "BITM":
        $colour = 'ECF0F1';
        break;
    case "BITC":
        $colour = 'E74C3C';
        break;
    default:
        $colour = 'F5B041';
    }

    echo "['0','<b>$companyname</b></br></br>Address: $companyadd </br></br> No-Tel:$companyphone ', $lat, $lng,'$stud_course','$colour' ],";
  }
  ?>
];

function initMap() {

  var center = new google.maps.LatLng(3.5, 102);
  var mapOptions = {
    zoom: 7,
    center: center,
    mapTypeId: 'roadmap',
  };

  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
  for (i = 0; i < markers1.length; i++) {
    addMarker(markers1[i]);
  }
}

function addMarker(marker) {
  var tip = marker[4];
  var title = marker[0];
  var pos = new google.maps.LatLng(marker[2], marker[3]);
  var content = marker[1];
  var pinColor = marker[5];

  marker1 = new google.maps.Marker({
    title: title,
    position: pos,
    tip: tip,
    map: map,
    icon: "http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|" + pinColor
  });

  var infowindow = new google.maps.InfoWindow({
      content: ''
    });

  gmarkers1.push(marker1);
  google.maps.event.addListener(marker1, 'click', (function(marker1, content) {
    return function() {
      infowindow.setContent(content);
      infowindow.open(map, marker1);
    }
  })(marker1, content));
}

var get_set_options = function() {
  ret_array = []
  for (option in filters) {
    if (filters[option]) {
      ret_array.push(option)
    }
  }
  return ret_array;
}

var filter_markers = function() {
  set_filters = get_set_options()

  for (i = 0; i < markers.length; i++) {
    marker = markers[i];
    keep = true
    for (opt = 0; opt < set_filters.length; opt++) {
      if (!marker.properties[set_filters[opt]]) {
        keep = false;
      }
    }
    marker.setVisible(keep)
  }
}


var tipovi = document.getElementsByClassName('chk-btn').value;

var selectAllChecked = function() {
  var checkedPlace = []
  var allCheckedElem = document.getElementsByName('filter');
  for (var i = 0; i < allCheckedElem.length; i++) {
    if (allCheckedElem[i].checked == true) {
      checkedPlace.push(allCheckedElem[i].value)
    }
  }
  filterChecker(checkedPlace)
}

var filterChecker = function(tip) {

  for (i = 0; i < markers1.length; i++) {
    marker = gmarkers1[i];
    if (in_array(this.marker.tip, tip) != -1) {
      marker.setVisible(true);
    } else {
      marker.setVisible(false);
    }
  }
}

function in_array(needle, haystack) {
  var found = 0;
  for (var i = 0, len = haystack.length; i < len; i++) {
    if (haystack[i] == needle) return i;
    found++;
  }
  return -1;
}

$(window).resize(function () {
      var h = $(window).height(),
          offsetTop = 100; // Calculate the top offset
      $('#map-canvas').css('height', (h - offsetTop));
  }).resize();
</script>
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCd319KPTRzC3mSZezb3T2gwwQTnq2vIRM&callback=initMap"></script>
</html>
