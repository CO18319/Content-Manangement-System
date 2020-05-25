<?php require_once '../connection.php'; ?>
<?php require_once '../php_functions.php' ?>

<?php
	if(isset($_GET["subject"]))
	{
		$selected_subject_id = $_GET["subject"];
		$current_subject = get_subject_by_id($selected_subject_id);
		$selected_page_id = null;
	}
	elseif(isset($_GET["page"]))
	{
		$selected_subject_id = null;
		$selected_page_id = $_GET["page"];
		$current_page = get_page_by_id($selected_page_id);
	}
	else
	{
		$selected_subject_id = null;
		$selected_page_id = null;
	}
?>
<?php
    if(isset($_POST["submit"])){
		$subject_id = $current_subject["id"];
        $menu_name = $_POST["menu_name"];
	    $position = (int)$_POST["position"];
	    $visible = (int)$_POST["visible"];
	    $content = $_POST["content"];
	
	    $query = "INSERT INTO pages(subject_id, menu_name, position, visible, content)";
	    $query .= "VALUES ( {$subject_id}, '{$menu_name}', {$position}, {$visible}, '{$content}' )";
	    $result = mysqli_query($conn, $query);
	
	    if($result){
		    $_SESSION["message"] = "Page Created.";
		    header("location:manage_website.php");
	    }else{
		    $_SESSION["message"] = "Page Creation Failed.";
	    }
	}	
?>