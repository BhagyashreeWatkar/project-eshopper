<?php
session_start();
if(!isset($_SESSION['project_name']))
{
	header("location:../views/index.php");

}
require_once '../models/db_project.php';
//pre($_POST);

if(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[@#\-\$_]).{4,12}$/", $_POST['cpass']))
{
	echo "invalid current password";
}
else if(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[@#\-\$_]).{4,12}$/", $_POST['npass']))
{
	echo "invalid new password";
}
else if($_POST['npass']!=$_POST['cnpass'])
{
	echo "new pass does not match with confirm new pass";
}
else if($_POST['npass']==$_POST['cpass'])
{
	echo "new pass should be different from current pass";
}
else
{
	//echo "ok";

	$dbpass = $obj->get_password_userwise($_SESSION['project_email']);
	//echo ($_SESSION['project_email']);
	//pre($dbpass);
	//pre(sha1($_POST['cpass']));
	if(sha1($_POST['cpass'])==$dbpass[0]['us_password'])
	{
		$newpass=sha1($_POST['npass']);

		$email=$_SESSION['project_email'];

		$fans=$obj->update_password($newpass,$email);
	//pre($dbpass);

		/////email
		$to="nakshine.bhagyashree@gmail.com";
		$subject="password updated confirmatioin";
		$txt= "password updated";
		$headers=
		$headers=

		$headres="From: <vishal@php-training.in>"  ;

		$result=mail($to,$subject,$txt,$headers);


		//sms
		$username="nakshine.bhagyashree@gmail.com"
		$hash="475456c0d7a57d6ff9e4c9f0a5b7faef281f88b76c95e53e4c8fc95c8b5726c4";
		$test="0";
		$sender=
		$number="9975982269";
		$message=urlencode("password updated");
		

		}
		else
		{
			echo "current password invalid";
		}
	}

?>