<?php 
require_once 'header.php';
require_once '../connection.php'; 
require_once '../session.php';
confirm_logged_in();
?>
<?php
    if(isset($_POST["submit"]))
    {
		$id = $_POST["hidden"];
		$username = $_POST["new_username"];
		$hashed_password = md5($_POST["new_password"]);
		
		$query = "UPDATE admins SET username = '{$username}', hashed_password = '{$hashed_password}' WHERE id = {$id} ";
		$result = mysqli_query($conn, $query);
		
        if($result)
            $_SESSION["message"] = "Admin Updated.";
        else
        {
            $_SESSION["message"] = "Admin update failed.";
            header("location:edit_admin.php");
	    }
	}
?>
<nav>
    <a class="spl_a" href="admin.php"><< Main Menu</a>
</nav>
<main>
    <h2>Manage Admins</h2>
    <table>
        <tr>
            <th>Username</th>
            <th colspan="2">Actions</th>
        </tr>
        <?php
        $query= "select * from admins";
        $get= mysqli_query($conn,$query);
        while($row=mysqli_fetch_assoc($get))
        {
            if( $row["username"]!=$_SESSION["username"])
            {
                echo "<tr><td> {$row['username']} </td>
                <td><a href=edit_admin.php?id={$row['id']}>Edit</td>
                <td><a class='delete' href=delete_admin.php?id={$row['id']}>Delete</td></tr>";
            }
        }
        ?>
    </table><br/>
    <a href="new_admin.php">Add new admin</a><br/><br/>
    <?php
        if(isset($_SESSION["message"]))
            echo $_SESSION["message"];
    ?>
</main>
<?php include '../footer.php'; ?>