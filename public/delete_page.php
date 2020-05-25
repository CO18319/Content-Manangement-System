<?php require_once '../connection.php'; ?>
<?php require_once '../php_functions.php'; ?>

<?php

	if(isset($_GET["page"]))
	{
		$current_page = get_page_by_id($_GET["page"]);
		if(!$current_page)
		{
			header("location:manage_website.php");
		}
	}
	
	$id = $current_page["id"];
	$query = "DELETE FROM pages WHERE id = {$id} LIMIT 1";
	$result = mysqli_query($conn, $query);
	
	if($result)
	{
		$_SESSION["message"] = "Page Deleted.";
		header("location:manage_website.php");
	}
	else
	{
		$_SESSION["message"] = "Page Deletion Failed.";
		header("location:edit_page.php");
	}

?>