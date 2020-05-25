<?php 
require_once 'header.php'; 
require_once '../session.php';
confirm_logged_in();
?>
<nav>
</nav>
<main>
    <div class="page_content">
        <h2>Admin Menu</h2>
        <p>Welcome to the admin area, <?php echo $_SESSION['username'];?></p><br/>
        <ul id="admin_ul">
            <li><a href="manage_website.php">Manage Website Contents</a></li>
            <li><a href="manage_admins.php">Manage Admin Users</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
</main>
<?php include '../footer.php'; ?>