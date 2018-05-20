<?php
require_once('../Connections/Connection.php');

if($db->connect_errno)
{
    die('Sorry! Connection was not Successful');
}

if(isset($_GET['s']) && $_GET['s'] != ''){
    $s = $_GET['s'];
    $sql = "SELECT * FROM company WHERE Company_Name like '%$s%' order by Company_Name LIMIT 5";
    $result = $db->query($sql) or die($db->error);
    while($row = $result->fetch_assoc()){
        $name = $row['Company_Name'];

        // No need for a href in the anchor tag, as you don't want it to redirect to any page, but added a style for a pointer cursor
        echo "<div class='form-control cnameid' id='searchtitle'>" . "<a class='' style='cursor: pointer; font-size:12px' onclick='setCName(\"$name\")'>". "\t" . $name ."</a></div>";
    }

}
?>
