<?php
 include("../Connections/Check.php");
 
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Grouping</title>
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
   <div class="wrapper">
         <?php include "../Nav.php"; ?>
        <div class="main-panel">
          <?php include "../Header.php"; ?>
          
          
       <div class="content">
     
                    <div class="row">
                        <div class="col-md-12">
                         
       
            <div class='col-lg-6'>
            <div class="card">
            <div class="card-header" data-background-color="red">
            <h4 class="title">Ungrouped Company</h4>
            </div>
            <div id="map"></div>
            </div>
            </div>

           <div class='col-lg-6'>
           <div class="card">
           <div class="card-header" data-background-color="red">
           <h4 class="title">Grouped Company</h4>
           </div></br></br></br>
           <div id="map2"></div>
           </div>
           </div>
           
           </div>
           </div>
           </div>
          
         
         
           
           
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Insert Grouping Company</h4>
                                </div>
                                
                                
                                <div class="card-content">
                                
                                <!--form-->
                                <form method="POST" action="Insert_Grouping_Company.php" class="form-horizontal" name="form" onsubmit="validation();">

                 <div id="InputsWrapper">
                   <div class='form-group'><label class='col-sm-2'for='Company_Id'style="color:
                               #000"><strong>Company Name:</strong></label>
                     <div class='col-sm-6'>
                   <input type="text" name='cname1' id='cname1' class=" validate form-control" onkeyup='searchc1(this.value)'>
                    <div id='search_cdiv1'></div>
                 </div>                <div id="AddMoreFileId"><a href="#" id="AddMoreFileBox" class="btn btn-info">Add Company</a></div>
                                 <div id="lineBreak"></div></div></div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Submit</button>
              </div>
            </div>
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

<?php include "../Footer2.php"; ?>


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
			  var no = markerElem.getAttribute('no');
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
			  
			   infowincontent.appendChild(document.createElement('br'));
              infowincontent.appendChild(document.createElement('br'));

              var text2 = document.createElement('text3');
              text2.textContent = "No. of Student: " + no
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
  $query = "SELECT DISTINCT Company_Name,Company_Add,Company_Add2,Company_Phone,Company_Latitude,Company_Longtitude FROM company INNER JOIN stud_attachment ON company.Company_id=stud_attachment.Company_id WHERE Group_Id =0 ORDER BY company.Company_Id";
  $query2 = "SELECT COUNT(stud_attachment.company_id) AS NUMBER FROM company RIGHT JOIN stud_attachment ON company.Company_Id=stud_attachment.Company_Id WHERE Group_Id =0 GROUP BY company.Company_Name ORDER BY company.Company_Id";
  $result = mysqli_query($db,$query);
  $result2 = mysqli_query($db,$query2);

  $types = array();
  while(($row2 =  mysqli_fetch_assoc($result2))) {
      $types[] = $row2['NUMBER'];
  }

  $x = 0;
  while($row = mysqli_fetch_array($result)){
    $lat = $row['Company_Latitude'];
    $lng = $row['Company_Longtitude'];
    $companyname = $row['Company_Name'];
    $companyadd = $row['Company_Add'];
	$companyadd2 = $row['Company_Add2'];
    $companyphone = $row['Company_Phone'];
	$fullcompanyinfo=$companyadd.$companyadd2;

    echo "{lat:$lat, lng:$lng, info:'<b>$companyname</b></br></br>Address: $fullcompanyinfo </br></br> No-Tel:$companyphone </br></br> No of Students:$types[$x]'},";
    $x++;
  }
  ?>
  ]
  $(window).resize(function () {
      var h = $(window).height(),
          offsetTop = 300; // Calculate the top offset
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

  function searchc6(string){
          var xmlhttp;
          if(window.XMLHttpRequest){
              xmlhttp = new XMLHttpRequest();
          }else{
              xmlhttp = new ActiveXObject("XMLHTTP");
          }
          xmlhttp.onreadystatechange = function(){
              if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                  document.getElementById("search_cdiv6").innerHTML = xmlhttp.responseText;
              }
          }
          xmlhttp.open("GET", "../Mapping/Search_Company_Names.php?w="+string, true);
          xmlhttp.send(null);
  }

  function setCName6(string) {
      document.getElementById("cname6").value = string;
      $(".cnameid6").hide();
  }

  function searchc7(string){
          var xmlhttp;
          if(window.XMLHttpRequest){
              xmlhttp = new XMLHttpRequest();
          }else{
              xmlhttp = new ActiveXObject("XMLHTTP");
          }
          xmlhttp.onreadystatechange = function(){
              if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                  document.getElementById("search_cdiv7").innerHTML = xmlhttp.responseText;
              }
          }
          xmlhttp.open("GET", "../Mapping/Search_Company_Names.php?x="+string, true);
          xmlhttp.send(null);
  }

  function setCName7(string) {
      document.getElementById("cname7").value = string;
      $(".cnameid7").hide();
  }

  function searchc8(string){
          var xmlhttp;
          if(window.XMLHttpRequest){
              xmlhttp = new XMLHttpRequest();
          }else{
              xmlhttp = new ActiveXObject("XMLHTTP");
          }
          xmlhttp.onreadystatechange = function(){
              if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                  document.getElementById("search_cdiv8").innerHTML = xmlhttp.responseText;
              }
          }
          xmlhttp.open("GET", "../Mapping/Search_Company_Names.php?y="+string, true);
          xmlhttp.send(null);
  }

  function setCName8(string) {
      document.getElementById("cname8").value = string;
      $(".cnameid8").hide();
  }

  function searchc9(string){
          var xmlhttp;
          if(window.XMLHttpRequest){
              xmlhttp = new XMLHttpRequest();
          }else{
              xmlhttp = new ActiveXObject("XMLHTTP");
          }
          xmlhttp.onreadystatechange = function(){
              if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                  document.getElementById("search_cdiv9").innerHTML = xmlhttp.responseText;
              }
          }
          xmlhttp.open("GET", "../Mapping/Search_Company_Names.php?z="+string, true);
          xmlhttp.send(null);
  }

  function setCName9(string) {
      document.getElementById("cname9").value = string;
      $(".cnameid9").hide();
  }

  function searchc10(string){
          var xmlhttp;
          if(window.XMLHttpRequest){
              xmlhttp = new XMLHttpRequest();
          }else{
              xmlhttp = new ActiveXObject("XMLHTTP");
          }
          xmlhttp.onreadystatechange = function(){
              if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                  document.getElementById("search_cdiv10").innerHTML = xmlhttp.responseText;
              }
          }
          xmlhttp.open("GET", "../Mapping/Search_Company_Names.php?a="+string, true);
          xmlhttp.send(null);
  }

  function setCName10(string) {
      document.getElementById("cname10").value = string;
      $(".cnameid10").hide();
  }

  function validation(){

    var obj = {};
    var i = 0;
    $(".validate").each(function(){
      if(this.value === "") {
        alert("Value Cannot Be Empty");
        event.preventDefault();
      }else if(obj.hasOwnProperty(this.value)) {
        alert("There Is A Duplicate Value : " + this.value);
        event.preventDefault();
      } else {
        obj[this.value] = this.value;
      }
    });

}

$(document).ready(function() {

var MaxInputs       = 10; //maximum extra input boxes allowed
var InputsWrapper   = $("#InputsWrapper"); //Input boxes wrapper ID
var AddButton       = $("#AddMoreFileBox"); //Add button ID

var x = 2; //initlal text box count
var FieldCount=1; //to keep track of text box added

//on add input button click
$(AddButton).click(function (e) {
        //max input box allowed
        if(x <= MaxInputs) {
            FieldCount++; //text box added ncrement
            //add input box
            $(InputsWrapper).append('<div class="form-group"><label class="control-label col-sm-2"for="Company_Id">Company Name :</label><div class="col-sm-6"><input type="text" name="cname'+ x +'" id="cname'+ x +'" class="validate form-control" onkeyup="searchc'+ x +'(this.value)"/><div id="search_cdiv'+ x +'"></div></div><a href="#" class="removeclass">Remove</a></div>');
            x++; //text box increment

            $("#AddMoreFileId").show();

            $('AddMoreFileBox').html("Add field");

            // Delete the "add"-link if there is 3 fields.
            if(x == 11) {
                $("#AddMoreFileId").hide();
             	$("#lineBreak").html("<br>");
            }
        }
        return false;
});

$("body").on("click",".removeclass", function(e){ //user click on remove text
        if( x > 1 ) {
                $(this).parent('div').remove(); //remove text box
                x--; //decrement textbox

            	$("#AddMoreFileId").show();

            	$("#lineBreak").html("");

                // Adds the "add" link again when a field is removed.
                $('AddMoreFileBox').html("Add field");
        }
	return false;
})

});
</script>
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCd319KPTRzC3mSZezb3T2gwwQTnq2vIRM&callback=initMap"></script>
</body>

</html>
