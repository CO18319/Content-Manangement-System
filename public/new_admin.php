<?php 
require_once 'header.php';
require_once '../connection.php'; 
require_once '../session.php';
confirm_logged_in();
?>
<?php
    if(isset($_POST["submit"]))
    {
		$username = $_POST["username"];
		$hashed_password = md5($_POST["password"]);
		
		$query = "INSERT INTO admins (username, hashed_password)";
		$query .= "VALUES('{$username}', '{$hashed_password}')";
		$result = mysqli_query($conn, $query);
		
        if($result)
        {
		    $_SESSION["message"] = "Admin Created.";
		    header("location:manage_admins.php");
        }
        else{
		    $_SESSION["message"] = "Admin Creation Failed.";
	    }
	}
?>

<nav></nav>
<main>
	<h2>Create Admin</h2><br/>
	<form action="new_admin.php" method="post">
	    <label>Username:</label><input type="text" name="username" value="" /><br/>
	    <label>Password:</label><input type="password" name="password" value="" /><br/><br/>
	    <input type="submit" name="submit" value="Create Admin" />
	</form>
	<br/>
	<a href="manage_admins.php">Cancel</a>
</main>

<?php include '../footer.php'; ?>