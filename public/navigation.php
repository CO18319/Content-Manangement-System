<?php require_once '../php_functions.php'; ?>
<?php
	if(isset($_GET["subject"]) && !isset($_GET["page"]))
	{
		$selected_subject_id = $_GET["subject"];
		$current_subject = get_subject_by_id($selected_subject_id);
		$selected_page_id = null;
	}
	elseif(isset($_GET["page"]))
	{
		$selected_subject_id = $_GET["subject"];
		$current_subject = get_subject_by_id($selected_subject_id);
		$selected_page_id = $_GET["page"];
		$current_page = get_page_by_id($selected_page_id);
	}
	else
	{
		$selected_subject_id = null;
		$selected_page_id = null;
	}
?>
<nav>
	<a class="spl_a" href="admin.php"><< Main Menu</a><br/>
	<?php 
	echo "<ul>";
	$subjects = get_all_subjects(false);
	while ($subject = mysqli_fetch_assoc($subjects)) 
	{
		echo "<li class='subject";
		if ($subject["id"] == $selected_subject_id) 
		{ 
			echo " selected'"; 
		}
		else
			echo "'";
		echo "><a href='manage_website.php?subject={$subject['id']}'>{$subject['menu_name']}</a></li>";
		$pages = get_pages($subject["id"],false);
		echo "<ul class='page'>";
		while ($page = mysqli_fetch_assoc($pages)) 
		{
			echo "<li";
			if ($page["id"] == $selected_page_id) 
				echo " class='selected'"; 
			echo "><a href='manage_website.php?subject={$subject['id']}&page={$page['id']}'>{$page['menu_name']}</a></li>";
		}
		echo "</ul>"; 
	}
	
	echo "</ul>"; ?>
	<br />
	<a class="spl_a" href="new_subject.php">+ Add a subject</a>
</nav>