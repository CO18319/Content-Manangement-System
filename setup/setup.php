<?php
    $servername = $_POST["server_name"];
    $server_username = $_POST["db_username"];
    $server_password = $_POST["db_password"];
    $db_name = $_POST["db_name"];
    
    $conn = mysqli_connect($servername,$server_username,$server_password);
    if(!$conn)
        die("Database connection failed".mysqli_connect_error());

    $query="CREATE DATABASE widget_corp";
    if (!mysqli_query($conn,$query))
        echo "Error: " . $query . "<br>" . mysqli_error($conn);

    $db=mysqli_select_db($conn,$db_name);
    $query2="CREATE TABLE subjects(
        id int(6) NOT NULL AUTO_INCREMENT,
        menu_name varchar(50) NOT NULL,
        position varchar(15) NOT NULL,
        visible varchar(15) NOT NULL,
        PRIMARY KEY(id));";
    
    $query2 .="CREATE TABLE pages(
        id int(6) NOT NULL AUTO_INCREMENT,
        subject_id varchar(15) NOT NULL,
        menu_name varchar(50) NOT NULL,
        position varchar(15) NOT NULL,
        visible varchar(15) NOT NULL,
        content varchar(100) NOT NULL,
        PRIMARY KEY(id));";
    
    $query2 .="CREATE TABLE admins(
        id int(6) NOT NULL AUTO_INCREMENT,
        username varchar(15) NOT NULL,
        hashed_password char(32) NOT NULL,
        PRIMARY KEY(id));";
    
    if (!mysqli_multi_query($conn,$query2))
        echo "Error: " . $query2 . "<br>" . mysqli_error($conn);
    
    $username = $_POST["username"];
    $hashed_password = md5($_POST["password"]);

    $query = "INSERT INTO admins (username, hashed_password)";
    $query .= " VALUES('{$username}', '{$hashed_password}')";
    $result = mysqli_query($conn, $query);

    if(!$result)
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    mysqli_close($conn);
    header("location:index.php?message=Database and admin have been created");
?>