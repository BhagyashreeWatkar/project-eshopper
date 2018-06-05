<?php

session_start();

if(!isset($_SESSION['project_name']))
{
	header("location:../views/index.php");
}

require_once "../models/db_project.php";

if(!preg_match("/^[A-Za-z0-9][A-Za-z0-9 ]+[A-Za-z0-9 ]$/", $_POST['ca_name']))
{
	echo "invalid category name";
}
else
{
	$name=$_POST['ca_name'];

	$result=$obj->check_category_count($name);

	if($result[0]['cnt']>0)
	{
		echo "category alredy exist";
	}
	else
	{
		if($obj->category_insert($name))
		{
			echo "category added";
		}
	}
}




?>