<?php require_once '../connection.php'; ?>
<?php require_once '../php_functions.php'; ?>
<?php require_once 'header.php'; ?>
<?php require_once 'navigation.php' ?>
<?php require_once '../session.php';
confirm_logged_in();
?>
<?php
    if(isset($_POST["submit"]))
    {
		$id = (int)$current_subject["id"];
		$menu_name = $_POST["subject_name"];
		$position = (int)$_POST["position"];
		$visible = (int)$_POST["visible"];
		
		$menu_name = mysqli_real_escape_string($conn, $menu_name);
		
		$query = "UPDATE subjects SET menu_name = '{$menu_name}', position = {$position}, visible = {$visible} WHERE id = {$id}";
		$result = mysqli_query($conn, $query);
		
		if($result){
			$_SESSION["message"] = "Subject Updated.";
		    header("location:manage_website.php");
		}else{
			$_SESSION["message"] = "Subject Updation Failed.";
		    header("location:new_subject.php");	
		}
	}
?>

<main>
    <h2>Edit Subject: <?php echo $current_subject["menu_name"]; ?></h2>
	<form action="edit_subject.php?subject=<?php echo $current_subject["id"]; ?>" method="post">
		<label>Subject name:</label><input type="text" name="subject_name" value="<?php echo $current_subject["menu_name"]; ?>" /><br/>
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
                    for($count=1; $count <= ($subject_count + 1); $count++)
                    {
                        echo "<option value='{$count}'";
                        if($current_subject["position"] == $count)
                        {
                            echo " selected='selected'";
                        }
                        echo ">{$count}</option>";
					}
				}
		    ?>
		</select><br/>
		<label>Visible:</label>
		<input type="radio" name="visible" value="0"
        <?php 
            if($current_subject["visible"] == 0)
            {
				echo " checked='checked'";
			}
        ?>	 />
        <label>No </label>
		<input type="radio" name="visible" value="1"
        <?php 
			if($current_subject["visible"] == 1){
				echo " checked='checked'";
			}
        ?> />
        <label>Yes</label><br/><br/>
		<input type="submit" name="submit" value="Edit Subject" />
	</form>
	<br />
	<a href="manage_website.php">Cancel</a>&nbsp;&nbsp;
	<a href="delete_subject.php?subject=<?php echo $current_subject["id"] ?>">Delete Subject</a>
</main>
<?php include '../footer.php'; ?>