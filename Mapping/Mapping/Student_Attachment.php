<?php
// including the database connection file
include("../Connections/Check.php");

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Student Attachment</title>
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
         <?php include "../Nav.php"; ?>
        <div class="main-panel">
          <?php include "../Header.php"; ?>
          
          
       <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                            
                                <div class="card-header" data-background-color="red">
                                    <h4 class="title">Add Student Attachment</h4>
                                </div>
                                
                                
                                <div class="card-content">
                                <!--form-->
                                
                               <form action="Insert_Student_Attachment.php" method="POST" name="form" class="form-horizontal">

                               <div class="form-group has-feedback">
                               <label class="col-sm-2"for="Student_Id" style="color:
                               #000"><strong>Student Name:</strong></label>
                               <div class="col-sm-6">
                              <input id="name" type="text" name="name" class="validate form-control" required placeholder="Search for Student Name or Matric" onkeyup="search(this.value)">
                              <div id="search_div">
                              </div>
                              </div>
                              </div>
                              
                              
                              <div class="form-group has-feedback">
                              <label class="col-sm-2"for="Company_Id"style="color:
                               #000"><strong>Company Name:</strong></label>
                              <div class="col-sm-6">
                              <input id="cname" type="text" name="cname" class="validate form-control" required placeholder="Search for Company Name" onkeyup="searchc(this.value)">
                              <div id="search_cdiv">
                              </div>
                              </select>
                              </div>
                              </div>
                              
                              
                             
                              
                          
                            
                            <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" name="Submit" class="btn btn-default">Submit</button>
                            </div>
                            </div>

                            </form>
                             <!--end form-->

                              <h4 class="title">Import CSV File</h4>
                               <a href="../csv/Senarai_Nama_PelajarSyarikat.csv"download>Senarai_Nama_PelajarSyarikat.csv</a>
                              <form action="../Student/import_sa.php" method="post" enctype="multipart/form-data" >
                              <input type="file" name="file" accept=".csv"/> 
                              <div class="col-sm-offset-2 col-sm-10">
                              <input type="submit" name="submit" class="btn btn-success" value="Import Excel"  disabled/>
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
function search(string){
        var xmlhttp;
        if(window.XMLHttpRequest){
            xmlhttp = new XMLHttpRequest();
        }else{
            xmlhttp = new ActiveXObject("XMLHTTP");
        }
        xmlhttp.onreadystatechange = function(){
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                document.getElementById("search_div").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "Search_Student_Name.php?s="+string, true);
        xmlhttp.send(null);
}

function setName(string) {
    document.getElementById("name").value = string;
    $(".nameid").hide();
}

function searchc(string){
        var xmlhttp;
        if(window.XMLHttpRequest){
            xmlhttp = new XMLHttpRequest();
        }else{
            xmlhttp = new ActiveXObject("XMLHTTP");
        }
        xmlhttp.onreadystatechange = function(){
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                document.getElementById("search_cdiv").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "Search_Company_Name.php?s="+string, true);
        xmlhttp.send(null);
}

function setCName(string) {
    document.getElementById("cname").value = string;
    $(".cnameid").hide();
}
</script>




</body>

</html>
 <script type="text/javascript"> 
                              $(document).ready(
                              function(){
                                  $('input:file').change(
                                      function(){
                                          if ($(this).val()) {
                                              $('input:submit').attr('disabled',false); 
                                          } 
                                      }
                                      );
                              });
							  
 </script>
                              
                           
                              