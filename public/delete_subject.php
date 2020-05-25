<?php require_once '../connection.php'; ?>
<?php require_once '../php_functions.php'; ?>

<?php

	if(isset($_GET["subject"]))
	{
		$current_subject = get_subject_by_id($_GET["subject"]);
		if(!$current_subject)
		{
			header("location:manage_website.php");
		}
	}
	
	$id = $current_subject["id"];
	$query = "DELETE FROM subjects WHERE id = {$id} LIMIT 1";
	$result = mysqli_query($conn, $query);
	
	if($result)
	{
		$_SESSION["message"] = "Subject Deleted.";
		header("location:manage_website.php");
	}
	else
	{
		$_SESSION["message"] = "Subject Deletion Failed.";
		header("location:new_subjcet.php");
	}

?>