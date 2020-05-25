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
		$id = (int)$current_page["id"];
		$menu_name = $_POST["menu_name"];
		$position = (int)$_POST["position"];
		$visible = (int)$_POST["visible"];
        $content = $_POST["content"];
        
		$menu_name = mysqli_real_escape_string($conn, $menu_name);
		$content = mysqli_real_escape_string($conn, $content);     
        
		$query = "UPDATE pages SET menu_name = '{$menu_name}', position = {$position}, visible = {$visible}, content = '{$content}' WHERE id = {$id}";
		$result = mysqli_query($conn, $query);
		
		if($result){
			$_SESSION["message"] = "Page Updated.";
		    header("location:manage_website.php");
		}else{
			$_SESSION["message"] = "Page Updation Failed.";
		    header("location:new_subject.php");	
		}
	}
?>

<main>
    <h2>Edit Page: <?php echo $current_page["menu_name"]; ?></h2>
	<form action="edit_page.php?page=<?php echo $current_page["id"]; ?>" method="post">
		<label>Menu name:</label><input type="text" name="menu_name" value="<?php echo $current_page["menu_name"]; ?>" /><br/>
		<label>Position:</label>
		<select name="position">
			<?php
				$pages = get_pages($current_subject["id"]);
				$page_count = mysqli_num_rows($pages);
				if(!$page_count)
				{
					echo "<option value='1'>1</option>";
				}
				else
				{
                    for($count=1; $count <= ($page_count + 1); $count++)
                    {
                        echo "<option value='{$count}'";
                        if($current_page["position"] == $count)
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
            if($current_page["visible"] == 0)
            {
				echo " checked='checked'";
			}
        ?>	 />
        <label>No </label>
		<input type="radio" name="visible" value="1"
        <?php 
			if($current_page["visible"] == 1){
				echo " checked='checked'";
			}
        ?> />
        <label>Yes</label><br/>
        <label>Content:</label><br/><textarea name="content" rows="20" cols="100"></textarea><br/><br/>
		<input type="submit" name="submit" value="Edit Page" />
	</form>
    <br />
	<a href="manage_website.php">Cancel</a>&nbsp;&nbsp;
	<a href="delete_page.php?page=<?php echo $current_page["id"] ?>">Delete Page</a>
</main>
<?php include '../footer.php'; ?>