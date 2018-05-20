<?php
 include("../Connections/Check.php"); 
 $query = "SELECT * FROM session";
 $result1 = mysqli_query($db, $query);
 $options = "";
while($row2 = mysqli_fetch_array($result1))
{
    $options = $options."<option>$row2[0]</option>";
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>﻿

</head>
<style>
  #map {
    height: 100%;
  }
  #map2 {
    height: 100%;
  }
  html, body {
    height: 100%;
    margin: 0;
    padding: 0;
  }
</style>
<body>
 <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="#" class="navbar-brand">NAVIGATION</a>
            </div>
            <div>
                <ul class="nav navbar-nav">
                    <li class=""><a href="../Dashboard.php">Home</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Company <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="../Company/Company.php">Insert New Company</a></li>
                            <li><a href="../Company/View_Company.php">View Company</a></li>
                        </ul>
                        </li>
                         <li class="dropdown">
                         <a href="#" class="dropdown-toggle" data-toggle="dropdown">Lecturer<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="../Lecturer/Supervisor.php">Insert New Lecturer</a></li>
                            <li><a href="../Lecturer/View_Supervisor.php">View Lecturer</a></li>
                        </ul>
                        </li>
                         <li class="dropdown">
                         <a href="#" class="dropdown-toggle" data-toggle="dropdown">Student<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="../Student/Student.php">Insert New Student</a></li>
                            <li><a href="../Student/View_Student.php">View Student</a></li>
                        </ul>
                        </li>
                         <li class="dropdown active">
                         <a href="#" class="dropdown-toggle" data-toggle="dropdown">Mapping<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="Lecturer_Attachment.php">Lecturer Attachment</a></li>
                            <li><a href="Student_Attachment.php">Student Attachment</a></li>
                            <li><a href="Grouping_Company.php">Company Grouping</a></li>
                        </ul>
                        </li>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Logout</a></li>
                </ul>
            </div>
        </div>
</nav>


        <div class="container-fluid">
        <div class='col-lg-12'>
          <h1 align="center">Company Grouping</h1>
        </div>

        <div class='col-lg-12 panel panel-default'>
          <div class='col-lg-6'>
            <h3 align="center">Ungrouped Company</h3>
          <div id="map"></div>
          </div>

          <div class='col-lg-6'>
            <h3 align="center">Grouped Company</h3>
          <div id="map2"></div>
          </div>
        </div>
        <?php
          $query = "SELECT Company_Name FROM company WHERE Group_Id = '".$_GET['Group_Id']."'";
          $result = mysqli_query($db,$query);
          $num = 1;
          while($row = mysqli_fetch_assoc($result)){
            $companyname = $row['Company_Name'];
            echo "<script>$( document ).ready(function() {";
            echo "document.getElementById('cname$num').value = '$companyname';});</script>";
            $num++;
          }
        ?>
        <script>
        $( document ).ready(function() {
          document.getElementById('semester_session').value = "<?php echo $_GET['Sem']; ?>";
        });
        </script>

        <div class='col-lg-12 panel panel-default'>
          <div class='col-lg-12'>
               <?php echo "&nbsp"?>
          </div>
          <form method="POST" action="Update_Grouping_Company.php?Group_Id=<?php echo $_GET['Group_Id']; ?>" class="form-horizontal" name="form" onsubmit="validation();">
            <?php
            for ($x = 1; $x <= 5; $x++) {
                echo "<div class='form-group'><label class='control-label col-sm-2'for='Company_Id'>Company $x :</label>";
                echo "<div class='col-sm-6'>";
                echo "<input id='cname$x' type='text' name='cname$x' class='validate form-control' placeholder='Search for Company Name' onkeyup='searchc$x(this.value)''>";
                echo "<div id='search_cdiv$x'></div></div></div>";
            }
            ?>
    <div class='form-group'><label class='control-label col-sm-2'for='semester_session'>Session/Sem:</label>
            <div class='col-sm-6'>
             <select class="form-control" id="semester_session" required name="semester_session">
                                  <?php echo $options;?>
                            </select>
            </div>
            </div>            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Update</button>
              </div>
            </div>
          </form>
        </div>
      </div>
<script>

  var customLabel = {
    <?php
      $query = "SELECT DISTINCT Group_Id FROM company WHERE Group_Id != 0 ORDER BY Group_Id";
      $result = mysqli_query($db,$query);
      while($row = mysqli_fetch_assoc($result)){
        $groupid = $row['Group_Id'];
        $color = str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);

        echo $groupid;
        echo ": {label: 'http://thydzik.com/thydzikGoogleMap/markerlink.php?text=$groupid&color=$color&image=.png'},";
      }
    ?>
  };

  function initMap() {

    var map = new google.maps.Map(document.getElementById('map'), {
      center: new google.maps.LatLng(3.5, 108),
      zoom: 6,
    });
    var infoWin = new google.maps.InfoWindow();
    var markers = locations.map(function(location, i) {
          var marker = new google.maps.Marker({
            position: location,
            icon:"http://thydzik.com/thydzikGoogleMap/markerlink.php?text=*&color=55D7D7&image=.png"
        });
        google.maps.event.addListener(marker,'click',function(evt){
          infoWin.setContent(location.info);
          infoWin.open(map,marker);
        })
        return marker;
    });
    var markerCluster = new MarkerClusterer(map, markers,{imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});


    var map = new google.maps.Map(document.getElementById('map2'), {
          center: new google.maps.LatLng(3.5, 108),
          zoom: 6
        });
        var infoWindow = new google.maps.InfoWindow;

          // Change this depending on the name of your PHP or XML file
          downloadUrl('../Mapping/Company_List.php', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var id = markerElem.getAttribute('id');
              var name = markerElem.getAttribute('name');
              var address = markerElem.getAttribute('address');
              var phone = markerElem.getAttribute('phone');
              var type = markerElem.getAttribute('type');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = "Address: " + address
              infowincontent.appendChild(text);

              infowincontent.appendChild(document.createElement('br'));
              infowincontent.appendChild(document.createElement('br'));

              var text2 = document.createElement('text2');
              text2.textContent = "No-Tel: " + phone
              infowincontent.appendChild(text2);

              var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                icon: icon.label,
              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });
        }

      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}

  var locations = [
  <?php
  $query = "SELECT * FROM company INNER JOIN stud_attachment ON company.company_id=stud_attachment.company_id WHERE Group_Id =0 ORDER BY company.Company_Id";
  $result = mysqli_query($db,$query);

  while($row = mysqli_fetch_array($result)){
    $lat = $row['Company_Latitude'];
    $lng = $row['Company_Longtitude'];
    $companyname = $row['Company_Name'];
    $companyadd = $row['Company_Add'];
    $companyphone = $row['Company_Phone'];

    echo "{lat:$lat, lng:$lng, info:'<b>$companyname</b></br></br>Address: $companyadd </br></br> No-Tel:$companyphone'},";
  }
  ?>
  ]

  $(window).resize(function () {
      var h = $(window).height(),
          offsetTop = 400; // Calculate the top offset
      $('#map').css('height', (h - offsetTop));
      $('#map2').css('height', (h - offsetTop));
  }).resize();

  function searchc1(string){
          var xmlhttp;
          if(window.XMLHttpRequest){
              xmlhttp = new XMLHttpRequest();
          }else{
              xmlhttp = new ActiveXObject("XMLHTTP");
          }
          xmlhttp.onreadystatechange = function(){
              if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                  document.getElementById("search_cdiv1").innerHTML = xmlhttp.responseText;
              }
          }
          xmlhttp.open("GET", "../Mapping/Search_Company_Names.php?s="+string, true);
          xmlhttp.send(null);
  }

  function setCName(string) {
      document.getElementById("cname1").value = string;
      $(".cnameid1").hide();
  }

  function searchc2(string){
          var xmlhttp;
          if(window.XMLHttpRequest){
              xmlhttp = new XMLHttpRequest();
          }else{
              xmlhttp = new ActiveXObject("XMLHTTP");
          }
          xmlhttp.onreadystatechange = function(){
              if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                  document.getElementById("search_cdiv2").innerHTML = xmlhttp.responseText;
              }
          }
          xmlhttp.open("GET", "../Mapping/Search_Company_Names.php?q="+string, true);
          xmlhttp.send(null);
  }

  function setCName2(string) {
      document.getElementById("cname2").value = string;
      $(".cnameid2").hide();
  }

  function searchc3(string){
          var xmlhttp;
          if(window.XMLHttpRequest){
              xmlhttp = new XMLHttpRequest();
          }else{
              xmlhttp = new ActiveXObject("XMLHTTP");
          }
          xmlhttp.onreadystatechange = function(){
              if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                  document.getElementById("search_cdiv3").innerHTML = xmlhttp.responseText;
              }
          }
          xmlhttp.open("GET", "../Mapping/Search_Company_Names.php?t="+string, true);
          xmlhttp.send(null);
  }

  function setCName3(string) {
      document.getElementById("cname3").value = string;
      $(".cnameid3").hide();
  }

  function searchc4(string){
          var xmlhttp;
          if(window.XMLHttpRequest){
              xmlhttp = new XMLHttpRequest();
          }else{
              xmlhttp = new ActiveXObject("XMLHTTP");
          }
          xmlhttp.onreadystatechange = function(){
              if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                  document.getElementById("search_cdiv4").innerHTML = xmlhttp.responseText;
              }
          }
          xmlhttp.open("GET", "../Mapping/Search_Company_Names.php?u="+string, true);
          xmlhttp.send(null);
  }

  function setCName4(string) {
      document.getElementById("cname4").value = string;
      $(".cnameid4").hide();
  }

  function searchc5(string){
          var xmlhttp;
          if(window.XMLHttpRequest){
              xmlhttp = new XMLHttpRequest();
          }else{
              xmlhttp = new ActiveXObject("XMLHTTP");
          }
          xmlhttp.onreadystatechange = function(){
              if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                  document.getElementById("search_cdiv5").innerHTML = xmlhttp.responseText;
              }
          }
          xmlhttp.open("GET", "../Mapping/Search_Company_Names.php?v="+string, true);
          xmlhttp.send(null);
  }

  function setCName5(string) {
      document.getElementById("cname5").value = string;
      $(".cnameid5").hide();
  }

  function validation(){
    var company1 = document.getElementById("cname1").value;
    if(company1 ==''){company1 = 1};
    var company2 = document.getElementById("cname2").value;
    if(company2 ==''){company2 = 2};
    var company3 = document.getElementById("cname3").value;
    if(company3 ==''){company3 = 3};
    var company4 = document.getElementById("cname4").value;
    if(company4 ==''){company4 = 4};
    var company5 = document.getElementById("cname5").value;
    if(company5 ==''){company5 = 5};

    if(company1==company2||company1==company3||company1==company4||company1==company5||company2==company3||company2==company4||company2==company5||company3==company4||company3==company5||company4==company5){
      alert("Same Company Detected. Please Edit Your Grouping.");
      event.preventDefault();
    }
    else{
      return true;
    }
}
</script>
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCd319KPTRzC3mSZezb3T2gwwQTnq2vIRM&callback=initMap"></script>
</body>
</html>
