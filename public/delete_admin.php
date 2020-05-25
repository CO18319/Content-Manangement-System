<?php
require_once '../connection.php'; 
$query="delete from admins where id='{$_REQUEST["id"]}'";
$result=mysqli_query($conn,$query);
if($result)
    $_SESSION["message"] = "Admin Deleted.";
else
    $_SESSION["message"] = "Admin deletion failed.";
header("location:manage_admins.php");
?>