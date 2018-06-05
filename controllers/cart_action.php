<?php
//print_r($_POST);
$productid = $_POST['x'];


if(!isset($_COOKIE['cookie_product_id']))
{
	$newproduct=$productid;
	setcookie("cookie_product_id",$newproduct,time() + 36000, "/");
}
else
{
	$getcookiedata = $_COOKIE['cookie_product_id'];

	$newproduct = $getcookiedata.",".$productid;
	setcookie("cookie_product_id",$newproduct,time() + 36000,"/");
}

$ans=explode(",",$newproduct);
$result = array_unique($ans);
echo count($result);
?>