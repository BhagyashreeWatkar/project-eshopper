<?php
require_once '../models/db_project.php';
//pre($_POST);

//

if(!preg_match("/^[a-zA-Z][a-zA-Z ]+[a-zA-Z]$/", $_POST['username']))
{
	echo "invalid name";
}
else if(!preg_match("/^[1-9][0-9]{9}$/", $_POST['usermobile']))
{
	echo "invalid mobile";
}
 
 else if(!preg_match("/^([a-zA-Z0-9][a-zA-Z0-9_\.]+[a-zA-Z0-9])@([0-9a-zA-Z][0-9a-zA-Z\-]+[0-9a-zA-Z])\.([a-z]{2,})([a-z]{2,})?$/",$_POST['useremail']))
 {
 	echo "invalid emailid";
 }

 else if(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[@#\-\$_]).{4,12}$/", $_POST['userpassword']))
{
	echo "invalid password";
}

else if($_POST['userpassword']!=$_POST['usercpassword'])
{
	echo "invalid confirm password";
}

else
{
	//echo "ok"
	$name=$_POST['username'];
	$mobile=$_POST['usermobile'];
	$email=$_POST['useremail'];
	$password=sha1($_POST['userpassword']); //sha1 for encryption

	//echo $password;

	//check user exist or not
	$result= $obj->check_email_count($email);
	//pre($result);

	if($result[0]['cnt']>0)
	{
		echo "Email id alredy exist";
	}
	else
	{
		if($obj->user_insert($name,$mobile,$email,$password))
		{
			echo "user added";
		}
	}
}

?>