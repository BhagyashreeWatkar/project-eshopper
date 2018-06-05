<?php
 //print_r($_POST);
 $proid = $_POST['x'];
 //echo $proid;
 //4
 $cartdata = $_COOKIE['cookie_product_id'];
 //echo $cartdata;
 
 $arr = explode(",",$cartdata);
 //print_r($arr);
foreach ($arr as $key=>$val) {
	//echo $val;
	//echo $key;
	if($val==$proid){
		unset($arr[$key]);
	}
}
  $newproduct = implode(",",$arr);

  setcookie("cookie_product_id",$newproduct,time() + 36000,"/");

  $ans = explode(",",$newproduct);
  $result = array_unique($ans);

  echo count($result);
?>