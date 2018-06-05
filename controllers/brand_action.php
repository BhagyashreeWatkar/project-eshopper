<?php

session_start(); //access after login

if(!isset($_SESSION['project_name'])){
	header("location:../views/index.php");  //after manually placed login.php in url it will redirect to index.php
}


require_once "../models/db_project.php";

if(!preg_match("/^[A-Za-z0-9][A-Za-z0-9 ]+[A-Za-z0-9 ]$/", $_POST['br_name']))
{
	echo "invalid brand name";
}
else
{
	$name =$_POST['br_name'];

	$result=$obj->check_brand_count($name);

	if($result[0]['cnt']>0)
	{
		echo "brnad already exist";
	}
	else
	{
		if($obj->brand_insert($name))
		{
			echo "brand added";
		}
	}
}
?>