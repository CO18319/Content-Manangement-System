<?php require_once '../connection.php'; ?>
<?php require_once '../php_functions.php'; ?>
<?php require_once 'header.php'; ?>
<?php require_once 'navigation.php'; ?>
<?php require_once '../session.php';
confirm_logged_in();
?>

<main>
	<h2>Create Subject</h2>
	<form action="create_subject.php" method="post">
		<label>Subject name:</label><input type="text" name="subject_name" value="" /><br/>
		<label>Position:</label>
		<select name="position">
			<?php
				$subjects = get_all_subjects();
				$subject_count = mysqli_num_rows($subjects);
				if(!$subject_count)
				{
					echo "<option value='1'>1</option>";
				}
				else
				{
					for($count=1; $count <= ($subject_count + 1); $count++){
						echo "<option value='{$count}'>{$count}</option>";
					}
				}
		    ?>
		</select><br/>
		<label>Visible:</label>
		<input type="radio" name="visible" value="0" /><label>No </label>
		<input type="radio" name="visible" value="1" /><label>Yes</label><br/><br/>
		<input type="submit" name="submit" value="Create Page" />
	</form>
	<br />
	<a href="manage_website.php">Cancel</a>
</main>
	
<?php require_once '../footer.php'; ?>