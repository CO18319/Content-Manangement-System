<?php require_once '../connection.php'; ?>
<?php require_once '../php_functions.php'; ?>
<?php require_once 'header.php'; ?>
<?php require_once 'navigation.php' ?>
<?php require_once '../session.php';
confirm_logged_in();
?>
<main>
	<?php 
		if($selected_subject_id  && !$selected_page_id) 
		{ ?>
			<h2> Manage Subject</h2>
			Menu name: <?php echo $current_subject["menu_name"]; ?><br />
			Position: <?php echo $current_subject["position"]; ?><br />
			Visible: <?php if($current_subject["visible"] == 1){echo "Yes";} else{echo "No";}; ?><br /><br />
			<a href="edit_subject.php?subject=<?php echo $current_subject["id"]; ?>">Edit Subject</a><br /><br /><hr /><br />
			
			<h2>Pages in this subject:</h2>
			<?php
				$pages = get_pages($current_subject["id"],false);
				echo "<ul class='spl_page'>";
				while ($page = mysqli_fetch_assoc($pages)) 
				{
					echo "<li";
					if ($page["id"] == $selected_page_id) 
						echo " class='selected'"; 
					echo "><a href='manage_website.php?subject={$current_subject['id']}&page={$page['id']}'>{$page['menu_name']}</a></li>";
				}
				echo "</ul>";
			?><br/> 
			<a href="new_page.php?subject=<?php echo $current_subject["id"]; ?>">+Add a new page to this subject</a>
		<?php 
		} 
		elseif($selected_page_id)
		{ ?>
			<h2>Manage Page</h2>
			Menu name: <?php echo $current_page["menu_name"]; ?><br />
			Position: <?php echo $current_page["position"]; ?><br />
			Visible: <?php if($current_page["visible"] == 1){echo "Yes";} else{echo "No";}; ?><br/>
			Content: <br /><div id="content"><?php echo $current_page["content"]; ?></div><br /><br />
			<a href="edit_page.php?subject=<?php echo $current_subject["id"]; ?>&page=<?php echo $current_page["id"]; ?>">Edit Page</a>
		<?php 
		} 
		else 
		{ ?>
		Please select a subject or a page.
	<?php }?>
	<br/><br/>
	<?php
	if(isset($_SESSION["message"]))
		echo $_SESSION["message"];
    ?>
</main>
<?php include '../footer.php'; ?>