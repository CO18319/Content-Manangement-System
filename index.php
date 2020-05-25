<?php require_once 'connection.php'; ?>
<?php require_once 'php_functions.php'; ?>
<?php require_once 'header_public.php'; ?>
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
	<?php 
	echo "<ul>";
	$subjects = get_all_subjects();
	while ($subject = mysqli_fetch_assoc($subjects)) 
	{
		echo "<li class='subject ";
		if ($subject["id"] == $selected_subject_id) 
		{ 
			echo " selected'"; 
		}
		else
			echo "'";
		echo "><a href='index.php?subject={$subject['id']}'>{$subject['menu_name']}</a></li>";
		
		if($subject["id"] == $selected_subject_id)
		{
			
			$pages = get_pages($subject["id"]);
			echo "<ul class='page'>";
			while ($page = mysqli_fetch_assoc($pages)) 
			{
				echo "<li";
				if ($page["id"] == $selected_page_id) 
					echo " class='selected'"; 
				echo "><a href='index.php?subject={$subject['id']}&page={$page['id']}'>{$page['menu_name']}</a></li>";
			}
			echo "</ul>"; 
		}
	}
	echo "</ul>"; ?>
	<br />
</nav>
<main>
<?php 
    if($selected_page_id)
    { ?>
        <h2><?php echo $current_page["menu_name"]; ?></h2>
        <div><?php echo $current_page["content"]; ?></div>
    <?php 
    } 
    elseif($selected_subject_id)
    {
        $page=get_default_page($current_subject["id"]); ?>
        <h2><?php echo $page["menu_name"]; ?></h2>
        <div><?php echo $page["content"]; ?></div>
    <?php 
    }
    else 
    { 
        $page2=get_default_page(1); ?>
        <h2><?php echo $page2["menu_name"]; ?></h2>
        <div><?php echo $page2["content"]; ?></div>
    <?php }?>
</main>
<?php include 'footer.php'; ?>