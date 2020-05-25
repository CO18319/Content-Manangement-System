<?php

function get_all_subjects($public = true) 
{
	global $conn;
	$query = "SELECT * FROM subjects ";
	if ($public) {
		$query .= "WHERE visible = 1 ";
	}
	$query .= "ORDER BY position ASC";
	$subjects = mysqli_query($conn,$query);
	return $subjects;    
}

function get_pages($subject_id,$public = true)
{
	global $conn;
	$query = "SELECT * FROM pages WHERE subject_id={$subject_id} ";
	if ($public) {
		$query .="and visible = 1 ";
	}
	$query .="ORDER BY position ASC";
	$pages = mysqli_query($conn,$query);
	return $pages;
}

function get_subject_by_id($subject_id) {
	global $conn;
	$query = "SELECT * FROM subjects WHERE id={$subject_id} LIMIT 1";
	$result = mysqli_query($conn,$query);
	
	if ($subject = mysqli_fetch_array($result))
		return $subject;
	else 
		return NULL;
}

function get_page_by_id($page_id) {
	global $conn;
	$query = "SELECT * FROM pages WHERE id={$page_id} LIMIT 1";
	$result = mysqli_query($conn,$query);

	if ($page = mysqli_fetch_array($result)) 
		return $page;
 	else 
		return NULL;
}

function get_default_page($subject_id) {
	$pages = get_pages($subject_id);
	if ($page = mysqli_fetch_array($pages))
		return $page;
	else 
		return NULL;
}
?>