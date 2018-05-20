<?php
session_start();

$_SESSION["semsesi"] = $_GET["semsesi"];
echo "<script>
alert('Successfully Change to ".$_SESSION["semsesi"]."');
window.location.href='Main/Dashboard.php';
</script>";

?>