<?php require_once '../connection.php'; ?>
<?php require_once '../php_functions.php'; ?>
<?php require_once 'header.php'; ?>
<?php require_once 'navigation.php' ?>
<?php require_once '../session.php';
confirm_logged_in();
?>
<?php
    if(!$current_subject["id"]){
		header("location:manage_website.php?subject={$current_subject["id"]}?>");
	}
?>

<main>
    <h2>Create Page</h2>
	<form action="create_page.php?subject=<?php echo $current_subject["id"]; ?>" method="post">
		<label>Subject Name:</label><input type="text" name="subject_name" readonly="true" value="<?php echo $current_subject["menu_name"]; ?>" /><br />
		<label>Menu name:</label><input type="text" name="menu_name" value="" /><br/>
		<label>Position:</label>
		<select name="position">
				<?php
                $pages = get_pages($current_subject["id"]);
                $page_count = mysqli_num_rows($pages);
                for($count = 1; $count <= ($page_count + 1); $count++){
                    echo "<option value='{$count}'>{$count}</option>";
                }
                ?>
		</select><br/>
		<label>Visible:</label>
		<input type="radio" name="visible" value="0" /><label>No </label>
		<input type="radio" name="visible" value="1" /><label>Yes</label><br/>
        <label>Content:</label><br/><textarea name="content" rows="20" cols="100"></textarea><br/><br/>
		<input type="submit" name="submit" value="Create Subject" />
	</form>
    <a href="manage_website.php">Cancel</a>
<?php include '../footer.php'; ?>
					
					