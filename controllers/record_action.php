<?php

require_once "../models/db_project.php";

if(!preg_match("/^[a-zA-Z][a-zA-Z ]+[a-zA-Z]$/", $_POST['fname']))
{
	echo "invalid first name";
}
else
{
	if(!preg_match("/^[a-zA-Z][a-zA-Z ]+[a-zA-Z]$/", $_POST['lname']))
     	{
	echo "invalid last name";
		}
		else
		{
			$name=$_POST['fname'];
			$surname=$_POST['lname'];
			
		}

}