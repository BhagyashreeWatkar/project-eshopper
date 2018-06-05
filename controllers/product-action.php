<?php
require_once "../models/db_project.php";
// pre($_POST);
// pre($_FILES);

if(empty($_POST['pro_name']))
{
	echo "please enter product name";
}

else if(empty($_POST['pro_price']) || !is_numeric($_POST['pro_price'])
|| $_POST['pro_price']<=0){
	echo "please enter product price";
}

else if(empty($_POST['pro_discount']) || !ctype_digit($_POST['pro_discount']) || $_POST['pro_discount']<0 || $_POST['pro_discount']>99){
	echo "please enter product discount";
}

else if(empty($_POST['pro_caid']))
{
	echo "please select category";
}

else if(empty($_POST['pro_brid']))
{
	echo "please select brand";
}
else if(empty($_POST['pro_desc']))
{
	echo "please enter desc";
}
else if(empty($_FILES['pro_path']['name']))
{
	echo "please select product image";
}
else if($_FILES['pro_path']['size']>2*1024*1024)
{
	echo "file size large";
}

else if($_FILES['pro_path']['type']=="image/jpeg" || $_FILES['pro_path']['type']=="image/png" || $_FILES['pro_path']['type']=="image/gif")
{
	// echo ok;
	$name = time().$_FILES['pro_path']['name'];
	//echo $name;
	$dest ="../assets/uploads/".$name;
	//echo $dest

	$res = move_uploaded_file($_FILES['pro_path']['tmp_name'],$dest);

	//var_dump($res);
	if($res)
	{
		$data[] = $obj->conn->real_escape_string(strip_tags(trim($_POST['pro_name'])));
		$data[] = $obj->conn->real_escape_string(strip_tags(trim($_POST['pro_price'])));
		$data[] = $obj->conn->real_escape_string(strip_tags(trim($_POST['pro_discount'])));
		$data[] = $obj->conn->real_escape_string(strip_tags(trim($_POST['pro_caid'])));
		$data[] = $obj->conn->real_escape_string(strip_tags(trim($_POST['pro_brid'])));
		$data[] = $obj->conn->real_escape_string(strip_tags(trim($_POST['pro_desc'])));
		$data[]=$name;

		if($obj->product_insert($data))
		{
			echo "product added";
		}


	}
}
else
{
	echo "file type invalid";
}


?>