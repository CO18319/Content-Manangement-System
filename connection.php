<?php require_once 'constants.php' ?>
<?php
    $conn = mysqli_connect(SERVER_NAME,DB_USER,DB_PASS);
    if(!$conn)
        die("Database connection failed".mysqli_connect_error());

    $db=mysqli_select_db($conn,DB_NAME);
    if(!$db)
        die("Database connection failed".mysqli_connect_error());
?>