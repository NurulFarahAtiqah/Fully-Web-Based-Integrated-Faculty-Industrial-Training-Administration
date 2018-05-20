<?php
require_once('../Connections/Check.php');

if($db->connect_errno)
{
    die('Sorry! Connection was not Successful');
}

if(isset($_GET['s']) && $_GET['s'] != ''){
    $s = $_GET['s'];
    $sql = "SELECT  Student_Name, Student_Matric FROM student WHERE Student_Name NOT IN(SELECT Student_Name FROM student INNER JOIN stud_attachment ON student.Student_Id=stud_attachment.Student_Id) AND (Student_Name like '%$s%' OR Student_Matric like '%$s%') AND semester_session = '$session' ORDER BY Student_Name LIMIT 5";
    $result = $db->query($sql) or die($db->error);
    while($row = $result->fetch_assoc()){
        $name = $row['Student_Name'];
		$name = str_replace("'",".",$name);
        $matric = $row['Student_Matric'];

        // No need for a href in the anchor tag, as you don't want it to redirect to any page, but added a style for a pointer cursor
        echo "<div class='form-control nameid' id='searchtitle'>" . "<a class='' style='cursor: pointer; font-size: 12px' onclick='setName(\"$name\")'>". "\t" . $name . "\t" . $matric ."</a></div>";
    }

}
?>

