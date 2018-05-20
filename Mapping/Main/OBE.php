<?php
require_once('../Connections/Check.php');



					



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
            
			
       <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                            
                            
                                <div class="card-header" data-background-color="red">
                                    <h4 class="title">View OBE Mark</h4>
                                </div>
                               
        
         <div class="card-content table-responsive" style="overflow-x:auto;">
         <table id="st_data" class="table table-striped table-bordered">
         <thead>
          <tr>
                <td>Matric No</td>
                <td>Student Name</td>
                <td>PRJ-1(10%)</td>
                <td>PRJ-2(15%)</td>
                <td>PRJ-3(15%)</td>
                <td>PRJ-4(15%)</td>
                <td>LR1(20%)</td>
                <td>PR1-1(15%)</td>
                <td>PRJ-5(10%)</td>
                <td>Total Mark(100%)</td>
                <td>Grade</td>
                <td>TR1(70%)</td>
                <td>PR1-1(20%)</td>
                <td>PR1-2(10%)</td>
                <td>Total Mark(100%)</td>
                <td>Grade</td>
          </tr>
          </thead>
          <tbody>
          
          
                      <?php
                      $result = mysqli_query($db,  "CALL OBE('".$session."')");

					  while($res = mysqli_fetch_array($result))
        					   	{
									
									$name = $res['Student_Name'];
									$matric = $res['Student_Matric'];
									
									$PRJ1 = (round($res['PRJ1'],1)); //ECHO
									$PRJ2 = (round($res['PRJ2'],1)); //ECHO
									$PRJ3 = (round($res['PRJ3'],1)); //ECHO
									$PRJ4 = (round($res['PRJ4'],1)); //ECHO
									$LR1 = (round($res['LR1'],1));	//ECHO
									$TAA4 = (round($res['PR11C'],1))+(round($res['PR11A'],1)); //ECHO
									$AT = $res['AT']; //ECHO
									$TA1 = $PRJ1+$PRJ2;
									$TA2 = $PRJ3+$PRJ4+$LR1;
									$TotalA = $TA1 + $TA2 + $TAA4 + $AT; //ECHO
									$TAF = $res['TAF'];
									$TBF = $res['TBF'];
									$TR1 = (round(((($TAF+$TBF)/70)*70),1)); //ECHO
									$TAB4 = (round($res['PR11C'],1))+(round($res['PR11B'],1)); //ECHO
									$TotalIn = (round(((($TA1 + $res['PR11C'])/35)*10),1));	//ECHO								
									$TotalB = $TR1 + $TAB4 + $TotalIn; //ECHO
									
									if($TotalA<40)
									{
										$G = "HG";
									}
									else
									{
										$G = "HL";
									}
									
									if($TotalB==0)
									{
										$GB = "E";
									}
									else if (($TotalB <= 1) && ($TotalB <= 40))
									{
										$GB = "D";
									}
									else if (($TotalB <= 41) && ($TotalB <= 44))
									{
										$GB = "D+";
									}
									else if (($TotalB <= 45) && ($TotalB <= 47))
									{
										$GB = "C-";
									}
									else if (($TotalB <= 48) && ($TotalB <= 50))
									{
										$GB = "C";
									}
									else if (($TotalB <= 51) && ($TotalB <= 55))
									{
										$GB = "C+";
									}
									else if (($TotalB <= 56) && ($TotalB <= 60))
									{
										$GB = "B-";
									}
									else if (($TotalB <= 61) && ($TotalB <= 65))
									{
										$GB = "B";
									}
									else if (($TotalB <= 66) && ($TotalB <= 70))
									{
										$GB = "B+";
									}
									else if (($TotalB <= 76) && ($TotalB <= 80))
									{
										$GB = "A-";
									}
									else 
									{
										$GB = "A";
									}

								  echo '<tr>';
                        $companyArray = array("$matric","$name","$PRJ1","$PRJ2","$PRJ3","$PRJ4","$LR1","$TAA4","$AT",
						"$TotalA","$G","$TR1","$TAB4","$TotalIn","$TotalB","$GB");
                        while (list ($key, $val) = each ($companyArray) ) {
                          echo '<td>';
                          echo $val;
                          echo '</td>';
                        }
          						
					     echo '</tr>';
								}
        						

          						
 $result->close();
$db->next_result();  
								   
			   

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
$(document).ready(function()
 {
var dtable = $('#st_data').DataTable({
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
  otable = $('#st_data').dataTable();
  })
  function filterme() {
    //build a regex filter string with an or(|) condition
  var types = $('input:checkbox[name="type"]:checked').map(function() {
    return '^' + this.value + '\$';
  }).get().join('|');
  //filter in column 0, with an regex, no smart filtering, no inputbox,not case sensitive
  otable.fnFilter(types, 2, true, false, false, false);
  }
</script>
