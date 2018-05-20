
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
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

$result2=mysqli_query($db,"CALL logbook_Mark('".$_GET['Student_Id']."')");
	
$row2=mysqli_fetch_array($result2);
$result2->close();
$db->next_result();

$tbl .='<h1>Student Logbook Assesment (Faculty Supervisor)</h1>
<body>
<html>
<div> 

<table width="600" height="91" border="1" bordercolor="#000000">
  <tr>
    <td width="200" height="20" ><font color="#000000" >Student Name: &nbsp;</font></td>
    <td width="400" height="20"><font color="#000000" >  '.$row2['Student_Name'].'</font>
    
</td>
  </tr>
  <tr>
    <td width="200" height="20"><font color="#000000" >Supervisor Name : &nbsp;</font></td>
    <td width="400" height="20"><font color="#000000" > '.$login_name.'</font></td>
  </tr>
  <tr>
    <td width="200" height="20"><font color="#000000" >Supervisor Department : &nbsp; </font></td>
    <td width="400" height="20"><font color="#000000" > '.$row2['Department_Name'].'</font></td>
  </tr>
  <tr>
    <td width="600" height="20"><font color="#000000" ><strong>Section A:Content</strong></font> </td>
  </tr>
  <tr>
    <td width="600" height="20"><font color="#000000" ><strong>1. Clearly states the work / daily tasks performed</strong></font> </td>
  </tr>
   <tr>
    <td width="600" height="20"><font color="#000000" ><strong>2. Clealy states the methods and approaches used to perform tasks</strong></font> </td>
  </tr>
   <tr>
    <td width="600" height="20"><font color="#000000" ><strong>3. Clearly states  the daily results and progress</strong></font> </td>
  </tr>
   <tr>
    <td width="600" height="20"><font color="#000000" ><strong>4. Clearly states  the Problem, Experience, Knowledge AND Skills Provided</strong></font> </td>
  </tr>
  <tr>
    <td width="200" height="20"><font color="#000000" >Total Mark:</font> </td>
    <td width="400" height="20"><font color="#000000" >  '.$row2['QA1'].'</font></td>
  </tr>
  
   <tr>
    <td width="600" height="20"><font color="#000000" ><strong>Section B:Logbook Content Details</strong></font> </td>
  </tr>
   <tr>
    <td width="600" height="20"><font color="#000000" ><strong>1. Logbook are neat and easy to read</strong></font> </td>
  </tr>
   <tr>
    <td width="600" height="20"><font color="#000000" ><strong>2. Logbook are written in English well</strong></font> </td>
  </tr>
   <tr>
    <td width="600" height="20"><font color="#000000" ><strong>3. Logbook are compiled with easy-to-use words and sentences easy to understand</strong></font> </td>
  </tr>
   <tr>
    <td width="600" height="20"><font color="#000000" ><strong>4. Checked by industry supervisors from time to time within the specified timeframe</strong></font> </td>
  </tr>
  <tr>
    <td width="200" height="20"><font color="#000000" >Total Mark: </font></td>
    <td width="400" height="20"><font color="#000000" >  '.$row2['QA2'].'</font></td>
  </tr>
  
</table>
<p>&nbsp;</p>



	

</body>
</html>
         
';


$pdf->writeHTML($tbl, true, false, false, false, '');
ob_end_clean();
$pdf->Output('asessment.pdf', 'I');
?>
</body>
</body>
</html>
