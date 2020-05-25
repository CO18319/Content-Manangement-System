<?php 
require_once '../connection.php';
require_once '../session.php' ?>
<?php 
if(logged_in())
{
    session_unset();
    session_destroy();
    header("location:login.php");
}
?>