
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Print</title>
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


<?php
    





require_once('C:xampp\htdocs\Mapping\tcpdf\tcpdf.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));


$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);


$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);


$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);


$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


$pdf->SetFont('helvetica', 'B', 20);


$pdf->AddPage();

$pdf->Write(0, '', '', 0, 'L', true, 0, false, false, 0);

$pdf->SetFont('helvetica', '', 8);

$pdf->SetCreator(PDF_CREATOR);

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

$result7 = mysqli_query($db, "CALL atitude_Mark('".$_GET['Student_Id']."')");
while($res = mysqli_fetch_array($result7))
{
	
	$AT = $res['TA'];

    
}

$result7->close();
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


$tbl .='<h1>Student OBE Mark</h1>
<body>
<html>
<div> 

<table class="table table-striped" width="600" height="91" border="1" >
                                 <tr>
                                        <td width="200" height="20" ><strong>Student Name:</strong></td>
                                        <td width="400" height="20" >'.$name.'</td>
                                 
                                  </tr>
                                    <tr>
                                       <td width="200" height="20" ><strong>Matric No:</strong></td>
                                       <td width="400" height="20" >'.$matric.'</td>
                                     </tr>
									 
									 
                                      <tr>
                                      <td width="200" height="20" ><strong>Course:</strong></td>
                                        <td width="400" height="20" >'.$course.'</td>
                                    </tr>
                                      <tr>
                                        <td width="200" height="20" ><strong>Faculty Supervisor Name:</strong></td>
                                        <td width="400" height="20" >'.$super_name.'</td>
                                      
                                    </tr>
                                      <tr>
                                        <td width="200" height="20" ><strong>Company Name</strong></td>
                                      <td width="400" height="20" >'.$comp_name.'</td>
                                    
                                    </tr>
									
                                      <tr>
                                        <td width="200" height="20" ><strong>Industry Supervisor Name:</strong></td>
                                        <td width="400" height="20" >'.$svname.'</td>
                                     
                                    </tr>
                                    
                                     <tr>
                                      
                                       
 										 <td width="600" height="20" ><h4><strong>Part A: Internship Assesment</strong></h4></td>
                                      
                                       

                                     </tr>
                               
                                    <tr>
                                       <td width="100" height="20" ><strong>Assesment</strong></td>
                                       <td width="100" height="20" ><strong>Code Metod</strong></td>
                                       <td width="200" height="20" ><strong>Mark</strong></td>
                                       <td width="200" height="20" ><strong>Total Mark</strong></td>
                                  </tr>
                                  
                                      <tr>
                                       <td width="100" height="20" ><strong>Industry Supervisor (10%):</strong></td>
									   <td width="100" height="20" >PRJ-1</td>
                                       <td width="200" height="20" >'.(round($PRJ1,1)).'</td>
                                       <td width="200" height="20" ><strong></strong></td>
                                      </tr>
                                      
                                        <tr>
                                       <td width="100" height="20" ><strong>Industry Supervisor (15%):</strong></td>
                                       <td width="100" height="20" >PRJ-2</td>
                                       <td width="200" height="20" >'.(round($PRJ2,1)).'</td>
                                       <td width="200" height="20" ><strong>'.(round($TA1,1)).'/25</strong></td>
                                       </tr>
                                       
                                       <tr>
                                       <td width="100" height="20" ><strong>Faculty Supervisor (15%):</strong></td>
                                       <td width="100" height="20" >PRJ-3</td>
                                       <td width="200" height="20" >'.(round($PRJ3,1)).'</td>
                                       <td width="200" height="20" ></td>
                                       </tr>
                                    
                                    
                                    
                                       <tr>
                                       <td width="100" height="20" ><strong>Faculty Supervisor (15%):</strong></td>
									   <td width="100" height="20" >PRJ-4</td>
                                       <td width="200" height="20" >'.(round($PRJ4,1)).'</td>
                                       <td width="200" height="20" ><strong></strong></td>
                                       
                                       </tr>
                                       <tr>
                                       <td width="100" height="20" ><strong>Faculty Supervisor (20%):</strong></td>
                                       <td width="100" height="20" >LR-1</td>
                                       <td width="200" height="20" >'.(round($LR1,1)).'</td>
                                       <td width="200" height="20" ><strong>'.(round($TA2,1)).'/50</strong></td>
                                       </tr>
                                       
                                        <tr>
                                       <td width="100" height="20" ><strong>Industry Supervisor (10%):</strong></td>
                                       <td width="100" height="20" >PR1-1</td>
                                       <td width="200" height="20" >'.(round($PR11C,1)).'</td>
                                       <td width="200" height="20" ></td>
                                       </tr>
                                       
                                       <tr>
                                       <td width="100" height="20" ><strong>Faculty Supervisor (5%):</strong></td>
                                       <td width="100" height="20" >PR1-1</td>
                                       <td width="200" height="20" >'.(round($PR11A,1)).'</td>
                                       <td width="200" height="20" ><strong>'.(round($TAA4,1)).'/15</strong></td>
                                       </tr>
                                       
                                       <tr>
                                       <td width="100" height="20" ><strong>Commitment and Attitude (10%):</strong></td>
                                       <td width="100" height="20" >PRJ-5</td>
                                       <td width="200" height="20" >'.$AT.'</td>
                                       <td width="200" height="20" ><strong>'.$AT.'/10</strong></td>
                                       </tr>
                                       
                                       <tr>
                                        <td width="200" height="20" ><strong>Total Mark BITU 3926 (100%):</strong></td>
                                        <td width="200" height="20" >'.(round($TotalA,1)).'/100</td>
                                         <td width="100" height="20" ><strong>GRADE:</strong></td>
                                        <td width="100" height="20" >'.$G.'</td>
                                    </tr>
                                    
                                      <tr>
                                      
                                      
 										 <td width="600" height="20" ><h4><strong>Part B: Internship LogBook</strong></h4></td>
                                    
                                       

                                     </tr>
                               
                                    <tr>
                                       <td width="100" height="20" ><strong>Assesment</strong></td>
                                       <td width="100" height="20" ><strong>Code Metod</strong></td>
                                       <td width="200" height="20" ><strong>Mark</strong></td>
                                       <td width="200" height="20" ><strong>Total Mark</strong></td>
                                  </tr>
                                  
                                      <tr>
                                       <td width="100" height="20" ><strong>Faculty Supervisor (70%):</strong></td>
									   <td width="100" height="20" >TR1</td>
                                       <td width="200" height="20" >'.(round($TR1,1)).'</td>
                                       <td width="200" height="20" ><strong>'.(round($TR1,1)).'/70</strong></td>
                                      </tr>
                                      
                                       
                                       
                                      <tr>
                                       <td width="100" height="20" ><strong>Industry Supervisor (10%):</strong></td>
                                       <td width="100" height="20" >PR1-1</td>
                                       <td width="200" height="20" >'.(round($PR11C,1)).'</td>
                                       <td width="200" height="20" ></td>
                                       </tr>
                                       
                                       <tr>
                                       <td width="100" height="20" ><strong>Faculty Supervisor (10%):</strong></td>
                                       <td width="100" height="20" >PRI-1</td>
                                       <td width="200" height="20" >'.(round($PR11B,1)).'</td>
                                       <td width="200" height="20" ><strong>'.(round($TAB4,1)).'/20</strong></td>
                                       </tr>
                                       
                                       
                                       <tr>
                                       <td width="100" height="20" ><strong>Industry Supervisor (10%):</strong></td>
                                       <td width="100" height="20" >PR1-2</td>
                                       <td width="200" height="20" >'.(round($TotalIn,1)).'</td>
                                       <td width="200" height="20" ><strong>'.(round($TotalIn,1)).'/10</strong></td>
                                       </tr>
                                       
                                       
                                       
                                       <tr>
                                        <td width="200" height="20" ><strong>Total Mark BITU 3496 (100%):</strong></td>
                                        <td width="200" height="20" >'.(round($TotalB,1)).'/100</td>
                                        <td width="100" height="20" ><strong>GRADE:</strong></td>
                                        <td width="100" height="20" >'.$GB.'</td>
                                    </tr>
                                 
                                </table>
<p>&nbsp;</p>



	

</body>
</html>
         
';


$pdf->writeHTML($tbl, true, false, false, false, '');
ob_end_clean();
$pdf->Output('obe.pdf', 'I');
?>
</body>
</body>
</html>
