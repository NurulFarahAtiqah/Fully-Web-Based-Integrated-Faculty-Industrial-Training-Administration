<?php
require_once('../Connections/Connection.php');

if(isset($_GET['s']) && $_GET['s'] != ''){
    $s = $_GET['s'];
    $sql = "SELECT DISTINCT Company_Name FROM company INNER JOIN stud_attachment ON company.Company_Id=stud_attachment.Company_Id WHERE Company_Name like '%$s%' AND Group_id = 0 order by Company_Name LIMIT 5";
    $result = $db->query($sql) or die($db->error);
    while($row = $result->fetch_assoc()){
        $name = $row['Company_Name'];
		

        // No need for a href in the anchor tag, as you don't want it to redirect to any page, but added a style for a pointer cursor
        echo "<div class='form-control cnameid1' id='searchtitle'>" . "<a class='' style='cursor: pointer; font-size:12px' onclick='setCName(\"$name\")'>". "\t" . $name ."</a></div>";
    }
}

if(isset($_GET['q']) && $_GET['q'] != ''){
    $q = $_GET['q'];
    $sql = "SELECT DISTINCT Company_Name FROM company INNER JOIN stud_attachment ON company.Company_Id=stud_attachment.Company_Id WHERE Company_Name like '%$q%' AND Group_Id = 0 order by Company_Name LIMIT 5";
    $result = $db->query($sql) or die($db->error);
    while($row = $result->fetch_assoc()){
        $name = $row['Company_Name'];

        // No need for a href in the anchor tag, as you don't want it to redirect to any page, but added a style for a pointer cursor
        echo "<div class='form-control cnameid2' id='searchtitle2'>" . "<a class='' style='cursor: pointer; font-size:12px' onclick='setCName2(\"$name\")'>". "\t" . $name ."</a></div>";
    }
}

if(isset($_GET['t']) && $_GET['t'] != ''){
    $t = $_GET['t'];
    $sql = "SELECT DISTINCT Company_Name FROM company INNER JOIN stud_attachment ON company.Company_Id=stud_attachment.Company_Id WHERE Company_Name like '%$t%' AND Group_Id = 0 order by Company_Name LIMIT 5";
    $result = $db->query($sql) or die($db->error);
    while($row = $result->fetch_assoc()){
        $name = $row['Company_Name'];

        // No need for a href in the anchor tag, as you don't want it to redirect to any page, but added a style for a pointer cursor
        echo "<div class='form-control cnameid3' id='searchtitle3'>" . "<a class='' style='cursor: pointer; font-size:12px' onclick='setCName3(\"$name\")'>". "\t" . $name ."</a></div>";
    }
}

if(isset($_GET['u']) && $_GET['u'] != ''){
    $u = $_GET['u'];
    $sql = "SELECT DISTINCT Company_Name FROM company INNER JOIN stud_attachment ON company.Company_Id=stud_attachment.Company_Id WHERE Company_Name like '%$u%' AND Group_Id = 0 order by Company_Name LIMIT 5";
    $result = $db->query($sql) or die($db->error);
    while($row = $result->fetch_assoc()){
        $name = $row['Company_Name'];

        // No need for a href in the anchor tag, as you don't want it to redirect to any page, but added a style for a pointer cursor
        echo "<div class='form-control cnameid4' id='searchtitle4'>" . "<a class='' style='cursor: pointer; font-size:12px' onclick='setCName4(\"$name\")'>". "\t" . $name ."</a></div>";
    }
}

if(isset($_GET['v']) && $_GET['v'] != ''){
    $v = $_GET['v'];
    $sql = "SELECT DISTINCT Company_Name FROM company INNER JOIN stud_attachment ON company.Company_Id=stud_attachment.Company_Id WHERE Company_Name like '%$v%' AND Group_Id = 0 order by Company_Name LIMIT 5";
    $result = $db->query($sql) or die($db->error);
    while($row = $result->fetch_assoc()){
        $name = $row['Company_Name'];

        // No need for a href in the anchor tag, as you don't want it to redirect to any page, but added a style for a pointer cursor
        echo "<div class='form-control cnameid5' id='searchtitle5'>" . "<a class='' style='cursor: pointer; font-size:12px' onclick='setCName5(\"$name\")'>". "\t" . $name ."</a></div>";
    }
}
?>
