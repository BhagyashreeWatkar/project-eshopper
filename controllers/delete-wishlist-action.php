<?php
	require_once '../models/db_project.php';
	//print_r($_POST);
	$id = $_POST['x'];

	//print_r($_SESSION);
	$uid = $_SESSION['project_uid'];

	$obj->delete_from_wishlist($uid,$id);
?>