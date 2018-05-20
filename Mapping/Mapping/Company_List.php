<?php
header('Content-Type: text/xml');
require_once('../Connections/Connection.php');

$query2 = "SELECT COUNT(stud_attachment.company_id) AS NUMBER FROM company RIGHT JOIN stud_attachment ON company.Company_Id=stud_attachment.Company_Id WHERE Group_Id !=0 GROUP BY company.Company_Name ORDER BY company.Company_Id";
$query = "SELECT * FROM company WHERE Group_Id !=0 ORDER BY Company_Id";
$result = mysqli_query($db,$query);
$num = 1;

 $result2 = mysqli_query($db,$query2);

  $types = array();
  while(($row2 =  mysqli_fetch_assoc($result2))) {
      $types[] = $row2['NUMBER'];
  }

  $x = 0;
  
echo "<markers>";
while($row = mysqli_fetch_array($result)){
  $lat = $row['Company_Latitude'];
  $lng = $row['Company_Longtitude'];
  $companyname = $row['Company_Name'];
  $companyadd = $row['Company_Add'];
  $companyadd2 = $row['Company_Add2'];
  $companyphone = $row['Company_Phone'];
  $groupid = $row['Group_Id'];
  $fullcompanyinfo=$companyadd.$companyadd2;
    echo "<marker id='$num' name='$companyname' address='$fullcompanyinfo' lat='$lat' lng='$lng' type='$groupid' phone='$companyphone'  no='$types[$x]'/>";
    $num++;
	$x++;
}
echo "</markers>"
?>
