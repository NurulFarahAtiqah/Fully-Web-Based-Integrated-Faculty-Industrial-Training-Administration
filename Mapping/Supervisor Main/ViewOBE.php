<?php
// including the database connection file
include("SupervisorCheck.php"); 
 
//getting id from url
$id = $_GET['Student_Id'];

//selecting data associated with this particular id
$result = mysqli_query($db, "CALL logbook_Mark('".$_GET['Student_Id']."')");

while($res = mysqli_fetch_array($result))
{
	
	$ID = $res['ID'];
	$name = $res['Student_Name'];
    $QA1 = $res['QA1'];
	$QA2 = $res['QA2'];
	$LR1 = $res['LR1'];
    
}
$result->close();
$db->next_result();



	

$result1 = mysqli_query($db, "CALL sv_internship_Mark('".$_GET['Student_Id']."')");

while($res = mysqli_fetch_array($result1))
{
	$ID = $res['ID'];
	$name = $res['Student_Name'];
    $QA1 = $res['QA1'];
	$QA11 = $res['QA11'];
	$QA2 = $res['QA2'];
	$QA21 = $res['QA21'];
	$QA3 = $res['QA3'];
	$QB1 = $res['QB1'];
	$QC1 = $res['QC1']; 
	$QC2 = $res['QC2']; 
	$QC3 = $res['QC3']; 
	$QC4 = $res['QC4']; 	
    $TA =  $res['TA']; 	
	$TB = $QB1;
	$PRJ3 =$res['PRJ3']; 	
	$PRJ4 =$res['PRJ4']; 
	$PR11A= $res['PR11A']; 
	$PR11B=$res['PR11B']; 	
}


$TA2 = $PRJ3+$PRJ4+$LR1;

$result1->close();
$db->next_result();




$result2 = mysqli_query($db, "CALL sv_presentation_Mark('".$_GET['Student_Id']."')");

while($res = mysqli_fetch_array($result2))
{
	$name = $res['Student_Name'];
    $QA1 = $res['QA1'];
	$QB1 = $res['QB1'];
	$QB2 = $res['QB2'];
	$QB3 = $res['QB3'];
	$QB4 = $res['QB4'];
	$QB5 = $res['QB5'];
	$QC1 = $res['QC1']; 
	$QC2 = $res['QC2']; 
	$QC3 = $res['QC3']; 
	$QD1 = $res['QD1']; 
	$QD2 = $res['QD2']; 
	$QD3 = $res['QD3']; 
	$QD4 = $res['QD4']; 	 	
    $TB = $res['TB'];
	$TC = $res['TC'];
	$TD = $res['TD'];
}

$result2->close();
$db->next_result();



$result3 = mysqli_query($db, "CALL c_internship_Mark('".$_GET['Student_Id']."')");

while($res = mysqli_fetch_array($result3))
{
	$name = $res['Student_Name'];
	$svname = $res['Supervisor_Name']; 
    $QA1 = $res['QA1'];
	$QA2 = $res['QA2'];
	$QA3 = $res['QA3'];
	$QA4 = $res['QA4'];
	$QB1 = $res['QB1'];	
	$QB2 = $res['QB2']; 
	$QB3 = $res['QB3']; 
	$QB4 = $res['QB4'];	
	$QB5 = $res['QB5']; 
	$QB6 = $res['QB6'];
	$QB7 = $res['QB7'];	
	$QB8 = $res['QB8']; 
	$QB9 = $res['QB9'];
	$QB10 = $res['QB10'];	
	$QC1 = $res['QC1']; 
	$QC2 = $res['QC2']; 
	$TA = $res['TA']; 
    $TB = $res['TB']; 
   	$PRJ1 =$res['PRJ1'];
	$PRJ2 = $res['PRJ2'];
	$PR11C = $res['PR11C'];
}


$TA1 = $PRJ1+$PRJ2;
$TAA4 = $PR11C+$PR11A;
$TAB4 = $PR11C+$PR11B;

$result3->close();
$db->next_result();

//selecting data associated with this particular id
$result4 = mysqli_query($db, "CALL c_present_mark('".$_GET['Student_Id']."')");

while($res = mysqli_fetch_array($result4))
{
	$name = $res['Student_Name'];
	$svname = $res['Supervisor_Name']; 
    $QA1 = $res['QA1'];
	$QB1 = $res['QB1'];
	$QB2 = $res['QB2'];
	$QB3 = $res['QB3'];
	$QB4 = $res['QB4'];
	$QB5 = $res['QB5'];
	$QC1 = $res['QC1']; 
	$QC2 = $res['QC2']; 
	$QC3 = $res['QC3']; 
	$QD1 = $res['QD1']; 
	$QD2 = $res['QD2']; 
	$QD3 = $res['QD3']; 
	$QD4 = $res['QD4']; 	 	
    $TB =  $res['TB'];
	$TC =  $res['TC'];
	$TD =  $res['TD'];

}

$result4->close();
$db->next_result();


	
$result5 = mysqli_query($db, "CALL report_Mark('".$_GET['Student_Id']."')");



while($res = mysqli_fetch_array($result5))
{
	
	$name = $res['Student_Name'];
    $cname = $res['Company_Name'];
    $QA1 = $res['QA1'];
	$QA2 = $res['QA2'];
	$QA3 = $res['QA3'];
	$QAA4 = $res['QAA4'];
	$QAA41 = $res['QAA41'];
	$QA4 = $res['QA4'];
	$QA41 = $res['QA41'];
	$QA5 = $res['QA5'];
	$QA6 = $res['QA6'];
	$QA7 = $res['QA7'];
	
	$QB1 = $res['QB1'];
	$QB2 = $res['QB2'];
	$QB3 = $res['QB3'];
	$QB4 = $res['QB4'];
	
	$QC1 = $res['QC1']; 
	
	$TA4 = $res['TA4'];
	$TA42 = $res['TA42'];
	$TAF = $res['TAF'];
	$TBF = $res['TBF'];
    
}
$TR1 = ((($TAF+$TBF)/70)*70);
$result5->close();
$db->next_result();

$result6 = mysqli_query($db, "CALL atitude_Mark('".$_GET['Student_Id']."')");
while($res = mysqli_fetch_array($result6))
{
	
	$AT = $res['TA'];

    
}

$result6->close();
$db->next_result();


$result6 = mysqli_query($db, "SELECT student.Student_Matric,student.Student_IC,student.Student_Name,student.Student_Course,student.Student_Phone,company.Company_Name,company.Company_Add,company.Company_Add2,company.Company_City,company.Company_Posscode,company.Company_State,company.Company_Phone,company.Company_Fax,supervisor.Supervisor_Name,supervisor.Supervisor_Phone,supervisor.Supervisor_StaffID,stud_attachment.Start_Date,stud_attachment.Finish_Date FROM student INNER JOIN stud_attachment ON student.Student_Id = stud_attachment.Student_Id INNER JOIN company ON stud_attachment.Company_Id = company.Company_Id INNER JOIN sv_assignment ON sv_assignment.Group_Id = company.Group_Id LEFT JOIN supervisor ON sv_assignment.Supervisor_Id = supervisor.Supervisor_Id WHERE student.Student_Id = $id ");

while($row = mysqli_fetch_array($result6))
        					   	{
            						$matric = $row['Student_Matric'];
									$stud_name = $row['Student_Name'];
									$stud_ic = $row['Student_IC'];
									$course = $row['Student_Course'];
            				        $comp_name = $row['Company_Name'];
                                	$comp_phone = $row['Company_Phone'];
									$super_name = $row['Supervisor_Name'];
								}
								

	
$TotalA = $TA1 + $TA2 + $TAA4 + $AT;
$TotalIn = (($TA1 + $PR11C)/35)*10;
$TotalB = $TR1 + $TAB4 + $TotalIn;

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



?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Supervisor</title>
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
            <?php include "SupervisorNav.php"; ?>
        <div class="main-panel">
          <?php include "SupervisorHeader.php"; ?>
          

          
          <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                            
                            
                                <div class="card-header" data-background-color="red">
                                    <h4 class="title">OBE Mark</h4>
                                 </div>
                                 
                                 
                                <div class="card-content">
                                
                                <!--form-->
   
                                <div class="card-content table-responsive">
                                <table width="1000 height="91" class="table table-striped">
                                 <tr>
                                        <td width="300" height="20" ><strong>Student Name:</strong></td>
                                        <td width="500" height="20" ><?php echo $name; ?></td>
                                        <td width="100" height="20" ></td>
                                        <td width="100" height="20" ></td>
                                      
                                 
                                  </tr>
                                    <tr>
                                       <td width="300" height="20" ><strong>Matric No:</strong></td>
                                       <td width="500" height="20" ><?php echo $matric; ?></td>
                                       <td width="100" height="20" ></td>
                                        <td width="100" height="20" ></td>
                                      
                                    </tr>
                                      <tr>
                                      <td width="300" height="20" ><strong>Course:</strong></td>
                                        <td width="500" height="20" ><?php echo $course; ?></td>
                                        <td width="100" height="20" ></td>
                                        <td width="100" height="20" ></td>
                                     
                                    </tr>
                                      <tr>
                                        <td width="300" height="20" ><strong>Faculty Supervisor Name:</strong></td>
                                        <td width="500" height="20" ><?php echo $super_name; ?></td>
                                        <td width="100" height="20" ></td>
                                        <td width="100" height="20" ></td>
                                    </tr>
                                      <tr>
                                        <td width="300" height="20" ><strong>Company Name</strong></td>
                                      <td width="500" height="20" ><?php echo $comp_name; ?></td>
                                       <td width="100" height="20" ></td>
                                        <td width="100" height="20" ></td>
                                    </tr>
                                      <tr>
                                        <td width="300" height="20" ><strong>Industry Supervisor Name:</strong></td>
                                        <td width="500" height="20" ><?php echo $svname; ?></td>
                                        <td width="100" height="20" ></td>
                                        <td width="100" height="20" ></td>
                                    </tr>
                                    
                                     <tr>
                                      
                                        <td width="50" height="20" ></td>
 										 <td width="800" height="20" ><h5><strong>Part A: Internship Assesment</strong></h5></td>
                                        <td width="50" height="20" ></td>
                                        <td width="100" height="20" ></td>
                                       

                                     </tr>
                               
                                    <tr>
                                       <td width="400" height="20" ><strong>Assesment</strong></td>
                                       <td width="200" height="20" ><strong>Code Method</strong></td>
                                       <td width="200" height="20" ><strong>Mark</strong></td>
                                       <td width="200" height="20" ><strong>Total Mark</strong></td>
                                  </tr>
                                  
                                      <tr>
                                       <td width="400" height="20" ><strong>Industry Supervisor (10%):</strong></td>
									   <td width="200" height="20" >PRJ-1</td>
                                       <td width="200" height="20" ><?php echo (round($PRJ1,1)) ; ?></td>
                                       <td width="200" height="20" ><strong></strong></td>
                                      </tr>
                                      
                                        <tr>
                                       <td width="400" height="20" ><strong>Industry Supervisor (15%):</strong></td>
                                       <td width="200" height="20" >PRJ-2</td>
                                       <td width="200" height="20" ><?php echo (round($PRJ2,1)) ; ?></td>
                                       <td width="200" height="20" ><strong><?php echo (round($TA1,1)) ; ?>/25</strong></td>
                                       </tr>
                                       
                                       <tr>
                                       <td width="400" height="20" ><strong>Faculty Supervisor (15%):</strong></td>
                                       <td width="200" height="20" >PRJ-3</td>
                                       <td width="200" height="20" ><?php echo (round($PRJ3,1)) ; ?></td>
                                       <td width="200" height="20" ></td>
                                       </tr>
                                    
                                    
                                    
                                       <tr>
                                       <td width="400" height="20" ><strong>Faculty Supervisor (15%):</strong></td>
									   <td width="200" height="20" >PRJ-4</td>
                                       <td width="200" height="20" ><?php echo (round($PRJ4,1)) ; ?></td>
                                       <td width="200" height="20" ><strong></strong></td>
                                       
                                       </tr>
                                       <tr>
                                       <td width="400" height="20" ><strong>Faculty Supervisor (20%):</strong></td>
                                       <td width="200" height="20" >LR-1</td>
                                       <td width="200" height="20" ><?php echo (round($LR1,1)) ; ?></td>
                                       <td width="200" height="20" ><strong><?php echo (round($TA2,1)) ; ?>/50</strong></td>
                                       </tr>
                                       
                                        <tr>
                                       <td width="400" height="20" ><strong>Industry Supervisor (10%):</strong></td>
                                       <td width="200" height="20" >PR1-1</td>
                                       <td width="200" height="20" ><?php echo (round($PR11C,1)) ; ?></td>
                                       <td width="200" height="20" ></td>
                                       </tr>
                                       
                                       <tr>
                                       <td width="400" height="20" ><strong>Faculty Supervisor (5%):</strong></td>
                                       <td width="200" height="20" >PR1-1</td>
                                       <td width="200" height="20" ><?php echo (round($PR11A,1)) ; ?></td>
                                       <td width="200" height="20" ><strong><?php echo (round($TAA4,1)) ; ?>/15</strong></td>
                                       </tr>
                                       
                                       <tr>
                                       <td width="400" height="20" ><strong>Commitment and Attitude (10%):</strong></td>
                                       <td width="200" height="20" >PRJ-5</td>
                                       <td width="200" height="20" ><?php echo $AT ?></td>
                                       <td width="200" height="20" ><strong><?php echo $AT ; ?>/10</strong></td>
                                       </tr>
                                       
                                       <tr>
                                        <td width="300" height="20" ><strong>Total Mark BITU 3926 (100%):</strong></td>
                                        <td width="200" height="20" ><?php echo (round($TotalA,1)); ?>/100</td>
                                         <td width="300" height="20" ><strong>GRADE:</strong></td>
                                        <td width="200" height="20" ><?php echo $G; ?></td>
                                    </tr>
                                    
                                      <tr>
                                      
                                        <td width="50" height="20" ></td>
 										 <td width="800" height="20" ><h5><strong>Part B: Internship Log Book</strong></h5></td>
                                        <td width="50" height="20" ></td>
                                        <td width="100" height="20" ></td>
                                       

                                     </tr>
                               
                                    <tr>
                                       <td width="400" height="20" ><strong>Assesment</strong></td>
                                       <td width="200" height="20" ><strong>Code Method</strong></td>
                                       <td width="200" height="20" ><strong>Mark</strong></td>
                                       <td width="200" height="20" ><strong>Total Mark</strong></td>
                                  </tr>
                                  
                                      <tr>
                                       <td width="400" height="20" ><strong>Faculty Supervisor (70%):</strong></td>
									   <td width="200" height="20" >TR1</td>
                                       <td width="200" height="20" ><?php echo (round($TR1,1)) ; ?></td>
                                       <td width="200" height="20" ><strong><?php echo (round($TR1,1)) ; ?>/70</strong></td>
                                      </tr>
                                      
                                       
                                       
                                      <tr>
                                       <td width="400" height="20" ><strong>Industry Supervisor (10%):</strong></td>
                                       <td width="200" height="20" >PR1-1</td>
                                       <td width="200" height="20" ><?php echo (round($PR11C,1)) ; ?></td>
                                       <td width="200" height="20" ></td>
                                       </tr>
                                       
                                       <tr>
                                       <td width="400" height="20" ><strong>Faculty Supervisor (10%):</strong></td>
                                       <td width="200" height="20" >PRI-1</td>
                                       <td width="200" height="20" ><?php echo (round($PR11B,1)) ; ?></td>
                                       <td width="200" height="20" ><strong><?php echo (round($TAB4,1)) ; ?>/20</strong></td>
                                       </tr>
                                       
                                       
                                       <tr>
                                       <td width="400" height="20" ><strong>Industry Supervisor (10%):</strong></td>
                                       <td width="200" height="20" >PR1-2</td>
                                       <td width="200" height="20" ><?php echo (round($TotalIn,1)) ; ?></td>
                                       <td width="200" height="20" ><strong><?php echo (round($TotalIn,1)) ; ?>/10</strong></td>
                                       </tr>
                                       
                                       
                                       
                                       <tr>
                                        <td width="300" height="20" ><strong>Total Mark BITU 3496 (100%):</strong></td>
                                        <td width="200" height="20" ><?php echo (round($TotalB,1)); ?>/100</td>
                                        <td width="300" height="20" ><strong>GRADE:</strong></td>
                                        <td width="200" height="20" ><?php echo $GB ; ?></td>
                                    </tr>
                                 
                                </table>
                               
                            
                            <form action="printOBE.php?Student_Id=<?php echo $id; ?>" method="POST" class="form-horizontal" name="form1">
                              <div class="form-group"> 
                              <div class="col-sm-offset-5 col-sm-10">
                             <input type="submit"  name="submitpdf" value="Print" class="btn btn-default">
                              </div>
                              </div>
                              
                              </form>
                              <!--end form-->

                              
                              
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
</html>

