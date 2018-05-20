<?php
require_once('../Connections/Connection.php');

if($db->connect_errno)
{
    die('Sorry! Connection was not Successful');
}

if(isset($_GET['v']) && $_GET['v'] != ''){
    $s = $_GET['v'];
    $sql = "SELECT * from supervisor WHERE supervisor_id NOT IN(SELECT sv_assignment.supervisor_id FROM supervisor inner join sv_assignment on supervisor.Supervisor_Id=sv_assignment.supervisor_id) AND Supervisor_Name like '%$s%' AND Supervisor_Status = 'Active' LIMIT 5";
    $result = $db->query($sql) or die($db->error);
    while($row = $result->fetch_assoc()){
        $name = $row['Supervisor_Name'];
        // No need for a href in the anchor tag, as you don't want it to redirect to any page, but added a style for a pointer cursor
        echo "<div class='form-control supervisorid' id='searchtitle'>" . "<a class='' style='cursor: pointer; font-size:12px' onclick='setSName(\"$name\")'>". "\t" . $name ."</a></div>";
    }

}
?>
<script>
alert(<?php echo $name?>)
</script>
