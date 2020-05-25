<?php require_once '../connection.php'; ?>

<?php
    if(isset($_POST["submit"]))
    {
		$menu_name = $_POST["subject_name"];
		$position = $_POST["position"];
		$visible = $_POST["visible"];
		
		$query = "INSERT INTO subjects(menu_name, position, visible)";
		$query .="VALUES ( '{$menu_name}', {$position}, {$visible});";
		$result = mysqli_query($conn,$query);
		
		if($result){
			$_SESSION["message"] = "Subject created.";
			header("location:manage_website.php");
		}else{
			$_SESSION["message"] = "Subject creation failed.";
		    header("location:new_subject.php");
		}
		
    }
?>