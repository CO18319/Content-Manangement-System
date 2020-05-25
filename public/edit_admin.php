<?php 
require_once 'header.php';
require_once '../connection.php'; 
require_once '../session.php';
confirm_logged_in();
?>
<?php
    $query = "select * from admins where id='{$_REQUEST["id"]}'";
    $result= mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($result);
?>

<nav>
    <a href="admin.php"><< Main Menu</a>
</nav>
<main>
    <h2>Edit Admin: <?php echo $row["username"]; ?></h2>
	<form action="manage_admins.php" method="post">
        <label>New Username:</label><input type="text" name="new_username" value=""?><br/>
        <label>New Password:</label><input type="password" name="new_password" value="" />
        <input type="hidden" name="hidden" value="<?php echo $row["id"];?>"><br/><br/>
	    <input type="Submit" name="submit" value="Edit Admin" />
	</form>
	<br />
    <a href="manage_admins.php">Cancel</a><br/><br/>
    <?php
        if(isset($_SESSION["message"]))
            echo $_SESSION["message"];
    ?>
</main>
<?php include '../footer.php'; ?>