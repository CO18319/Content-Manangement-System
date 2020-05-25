<?php require_once "../connection.php"; ?>
<?php require_once "../session.php"; ?>
<?php
    if(isset($_POST["submit"]))
    {
		$username = $_POST["username"];
		$hashed_password = md5($_POST["password"]);
		echo $hashed_password;
		$query = "SELECT * FROM admins ";
		$query .= "WHERE username = '{$username}' AND hashed_password = '{$hashed_password}'";
		$result = mysqli_query($conn, $query);
		$check = mysqli_fetch_array($result);
		
		if(isset($check)) 
		{
			$_SESSION["username"]=$username;
            header("location:admin.php");
		}
		else 
		{
            $_SESSION["message"] = "Invalid username or password";
            header("location:login.php");
	    }
	}
?>