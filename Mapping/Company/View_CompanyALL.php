<?php
require_once('../Connections/Check.php');
$query = "SELECT*FROM company ORDER BY Company_Name ASC";
$result = mysqli_query($db,$query);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>View Table</title>
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
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    
	<?php include "../Table.php"; ?>
	
</head>

   <body>
    <div class="wrapper">
         <?php include "../Nav.php"; ?>
        <div class="main-panel">
          <?php include "../Header.php"; ?>
          
       
			
              <!-- Sidebar Holder -->
              <nav id="sidebar">
              <div class="sidebar-header" >
              <h3>Filter</h3>
              <?php
              $stateArray = array('KUALA LUMPUR','PUTRAJAYA','JOHOR','KEDAH','KELANTAN','MELAKA','NEGERI SEMBILAN','PAHANG','PERAK','PERLIS','PULAU PINANG','SABAH','SARAWAK','SELANGOR','TERENGGANU');
              while (list ($key, $val) = each ($stateArray) ) {
              ?>
                <div id="filters">
                  <div class="filterblock">
                    <input onchange="filterme()" type="checkbox" name="type" value="<?php echo $val ?>"><?php echo $val ?>
                  </div>
                </div>
              <?php } ?>
              </div>
              </nav>
              
              
        <div class="content">
          
                   <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="red">
                                    <h4 class="title">View Company Records</h4>
                                </div>
                                
                                 
                                <nav class="navbar navbar-default">
                                <div class="container-fluid">
                                <div class="navbar-header">
                                <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn pull-right">
                                <i class="material-icons">view_headline</i>
                                <span>Toggle Filter</span>
                                </button>
                                </div>
                                <form method="post" role="form" class="form-inline" action="Company.php">
                		        <button type="submit" class="btn btn-danger navbar-btn pull-left">Insert New Company</button>
                                </form> 
                                </div>
                                
                                </nav>
                                
                                 <div class="card-content table-responsive" style="overflow-x:auto;">
                                 <!--table-->    
		
            
                                  <table id="company_data" class="table table-striped table-bordered">
                                  <thead>
                                  <tr>
                                   						<td>No</td>
                                                        <td>Name</td>
                                                        <td>Address 1</td>
                                                        <td>Address 2</td>
                                                        <td>City</td>
                                                        <td>Postcode</td>
                                                        <td>State</td>
                                                        <td>Phone No</td>
                                                        <td>Fax No</td>
                                                        <td>Latitude</td>
                                                        <td>Longtitude</td>
                                                        <td>Functions</td>
                          
                                  </tr>
                                  </thead>
                                  <tbody>
                                      <?php
									  $x=1;
                                                          while($row = mysqli_fetch_array($result))
                                                          {
                                                              $id = $row['Company_Id'];
                                                              $comp_name = $row['Company_Name'];
                                                              $comp_phone = $row['Company_Phone'];
                                                              $comp_add = $row['Company_Add'];
															  $comp_add2 = $row['Company_Add2'];
															  $comp_city = $row['Company_City'];
															  $comp_fax = $row['Company_Fax'];
                                                              $comp_poss = $row['Company_Posscode'];
                                                              $comp_state = $row['Company_State'];
                                                              $comp_lat = $row['Company_Latitude'];
                                                              $comp_long = $row['Company_Longtitude'];
                          
                                                            echo '<tr>';
                                                  $companyArray = array($x++,"$comp_name","$comp_add","$comp_add2","$comp_city","$comp_poss","$comp_state","$comp_phone","$comp_fax","$comp_lat","$comp_long");
                                                  while (list ($key, $val) = each ($companyArray) ) {
                                                    echo '<td>';
                                                    echo $val;
                                                    echo '</td>';
                                                  }
                                                            echo '<td>';
                                                            echo '<a class="btn btn-primary btn-sm" style="padding-left:25px;padding-right:26px" href="Update_Company.php?Company_Id='.$id.'">Edit</a>';
                                                  echo "<a class='btn btn-info btn-sm' href=\"https://www.google.com.my/maps/dir/'$comp_lat,$comp_long'/\" target=\"_blank\">View Map</a>";
                                                            echo '<a class="btn btn-danger btn-sm" style="padding-left:19px;padding-right:19px" href="Delete_Company.php?Company_Id='.$id.'" onclick="return confirm(\'Confirm Delete this Company?\')">Delete</a>';
                                                          echo '</td>';
                                                          echo '</tr>';
                                                             }
                          
                                                                  ?>
                                  </tbody>
                                  </table>
                                  
                                  
        					 </div> <!--card content-->
                            </div> <!--card--> 
                          </div> <!--row-->
                      </div> <!--col-->
                </div> <!--content-->
            </div><!--container-->
            
              <?php include "../Footer.php"; ?>         
  
        </div> <!--main panel-->
    </div> <!--wrapper-->
    
</body>
<?php include "../Footer3.php"; ?>
</html>

<script>
$(document).ready(function(){
  var dtable = $('#company_data').DataTable({
  		dom: 'Bfrtip',
  		 buttons: [
              'copyHtml5',
              'excelHtml5',
              'csvHtml5',
              'pdfHtml5'
          ]
  	});

  $('.filter').on('keyup change', function () {
          //clear global search value
          dtable.search('');
          dtable.column($(this).data('columnIndex')).search(this.value).draw();
  });

  $( ".dataTables_filter input" ).on( 'keyup change',function() {
         //clear all column search values
          dtable.columns().search('');
         //clear all form input values
         $('.filter').val('');
  });


  $('#sidebar, #content').toggleClass('active');
  $('.collapse.in').toggleClass('in');
  $('a[aria-expanded=true]').attr('aria-expanded', 'false');

});

$('#sidebarCollapse').on('click', function () {
    $('#sidebar, #content').toggleClass('active');
    $('.collapse.in').toggleClass('in');
    $('a[aria-expanded=true]').attr('aria-expanded', 'false');
});

$(function() {
  otable = $('#company_data').dataTable();
  })
  function filterme() {
  //build a regex filter string with an or(|) condition
  var types = $('input:checkbox[name="type"]:checked').map(function() {
    return '^' + this.value + '\$';
  }).get().join('|');
  //filter in column 0, with an regex, no smart filtering, no inputbox,not case sensitive
  otable.fnFilter(types, 5, true, false, false, false);
}
</script>
