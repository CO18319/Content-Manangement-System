<?php 
require_once 'header.php';
require_once '../session.php'; 
if(logged_in())
    header("location:admin.php");
?>
<nav></nav>
<main>
    <h2>Login</h2>
    <form action="validate_login.php" method="post"><br/>
        <label>Username: </label><input type="text" name="username"></p>
        <label>Password: </label><input type="password" name="password"></p><br/>
        <input type="submit" value="Submit" name="submit"></p><br/><br/>
        <?php
            if(isset($_SESSION["message"]))
                echo $_SESSION["message"];
        ?>
    </form>
</main>
<?php include 'f../footer.php'; ?>