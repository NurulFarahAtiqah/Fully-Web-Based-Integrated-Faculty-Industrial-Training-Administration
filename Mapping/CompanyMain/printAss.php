
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

include("Check.php");

//getting id from url
$id = $_GET['Student_Id'];

$result2=mysqli_query($db, "CALL c_internship_Mark('".$_GET['Student_Id']."')");
	
$row2=mysqli_fetch_array($result2);

$result2->close();
$db->next_result();

$tbl .='<h1>Student Internship Assesment (Industry Supervisor)</h1>
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
    <td width="200" height="20"><font color="#000000" >Industry Supervisor Name : &nbsp;</font></td>
    <td width="400" height="20"><font color="#000000" > '.$row2['Supervisor_Name'].'</font></td>
  </tr>
  <tr>
    <td width="200" height="20"><font color="#000000" >Company Name : &nbsp; </font></td>
    <td width="400" height="20"><font color="#000000" > '.$login_name.'</font></td>
  </tr>
  <tr>
    <td width="600" height="20"><font color="#000000" ><strong>Section A:KNOWLEDGE, SKILLS AND PERFORMANCE</strong></font> </td>
  </tr>
  <tr>
    <td width="600" height="20"><font color="#000000" ><strong>1. Knowledge and Skills</strong></font> </td>
  </tr>
  <tr>
    <td width="200" height="20"><font color="#000000" >Administartion and Management:</font> </td>
    <td width="400" height="20"><font color="#000000" >  '.$row2['QA1'].'</font></td>
  </tr>
  <tr>
    <td width="200" height="20"><font color="#000000" >Technical: </font></td>
    <td width="400" height="20"><font color="#000000" >  '.$row2['QA2'].'</font></td>
  </tr>
   <tr>
    <td width="200" height="20"><font color="#000000" ><strong>2. Quantity Of Work</strong></font> </td>  
	<td width="400" height="20"><font color="#000000" > '.$row2['QA3'].'</font></td>
  </tr>
  
  <tr>
    <td width="200" height="20"><font color="#000000" ><strong>3. Quality Of Work: </strong></font></td>
    <td width="400" height="20"><font color="#000000" >  '.$row2['QA4'].'</font></td>
  </tr>
   <tr>
    <td width="200" height="20"><font color="#000000" ><strong>TOTAL MARK (50): </strong></font></td>
    <td width="400" height="20"><font color="#000000" > '.$row2['TA'].'</font></td>
  </tr>
  <tr>
    <td width="600" height="20"><font color="#000000" ><strong>Section B:DISCIPLINE OF TRAINEE</strong></font> </td>
  </tr>
   <tr>
    <td width="200" height="20"><font color="#000000" >1. Time Management: </font></td>
    <td width="400" height="20"><font color="#000000" >  '.$row2['QB1'].'</font></td>
  </tr>
    <tr>
    <td width="200" height="20"><font color="#000000" >2. Problem Solving Skill: </font></td>
    <td width="400" height="20"><font color="#000000" >  '.$row2['QB2'].'</font></td>
  </tr>
    <tr>
    <td width="200" height="20"><font color="#000000" >3. Management Skill : </font></td>
    <td width="400" height="20"><font color="#000000" >  '.$row2['QB3'].'</font></td>
  </tr>
    <tr>
    <td width="200" height="20"><font color="#000000" >4. Effectiveness Of Communication : </font></td>
    <td width="400" height="20"><font color="#000000" >  '.$row2['QB4'].'</font></td>
  </tr>
    <tr>
    <td width="200" height="20"><font color="#000000" >5. Socialization and Cooperation : </font></td>
    <td width="400" height="20"><font color="#000000" >  '.$row2['QB5'].'</font></td>
  </tr>  <tr>
    <td width="200" height="20"><font color="#000000" >6. Dicipline : </font></td>
    <td width="400" height="20"><font color="#000000" >  '.$row2['QB6'].'</font></td>
  </tr>  <tr>
    <td width="200" height="20"><font color="#000000" >7. Ability To Face Challenges : </font></td>
    <td width="400" height="20"><font color="#000000" >  '.$row2['QB7'].'</font></td>
  </tr>  <tr>
    <td width="200" height="20"><font color="#000000" >8. Leadership : </font></td>
    <td width="400" height="20"><font color="#000000" >  '.$row2['QB8'].'</font></td>
  </tr>  <tr>
    <td width="200" height="20"><font color="#000000" >9. Commitment : </font></td>
    <td width="400" height="20"><font color="#000000" >  '.$row2['QB9'].'</font></td>
  </tr>  <tr>
    <td width="200" height="20"><font color="#000000" >10. Proactive, Creative and Innovative : </font></td>
    <td width="400" height="20"><font color="#000000" >  '.$row2['QB1'].'</font></td>
  </tr>
    <tr>
    <td width="200" height="20"><font color="#000000" ><strong>TOTAL MARK (50): </strong></font></td>
    <td width="400" height="20"><font color="#000000" > '.$row2['TB'].'</font></td>
  </tr>
  <tr>
    <td width="600" height="20"><font color="#000000" ><strong>Section C:OVERALL COMMENTS</strong></font> </td>
  </tr>
   <tr>
    <td width="200" height="20"><font color="#000000" >Overall Comments: </font></td>
    <td width="400" height="20"><font color="#000000" >  '.$row2['QC1'].'</font></td>
  </tr>
   <tr>
    <td width="200" height="20"><font color="#000000" >Overall Assesment: </font></td>
    <td width="400" height="20"><font color="#000000" >  '.$row2['QC2'].'</font></td>
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
