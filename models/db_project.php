<?php
require_once 'db_helper.php';
final class db_project extends db_helper
{
	//////////////////////////////////
	function show_brands()
	{
		// echo "test";
		//select br_id,br_name from brands where 1;
		return $this->select("br_id,br_name","brands",1);

	}
	//////////////////////////////
	function show_categories()
	{
		// echo "test";
		//select br_id,br_name from brands where 1;
		return $this->select("ca_id,ca_name","categories",1);

	}


function show_products()
{
	return $this->select("*","products","1 order by pro_id desc");

}

//insted of $this->select we use db_helper::select(------);


function show_categorywise_products($id)
{

	return db_helper::select("*","products","pro_caid='$id' order by pro_id desc");
	//////////////////////////////
}


function check_email_count($email)
{
	//echo $email;
	//select count(*) from users where us_email='$email'
	return self::select(
		"count(*) as cnt","users","us_email='$email'");
}


function user_insert($name,$mobile,$email,$password)
{
	return parent::insert(
		"users",
		"us_name,us_mobile,us_email,us_password",
		"'$name','$mobile','$email','$password'");
}

function get_user_data($email)
{
	//echo $email;
	return db_helper::select(
		"*","users","us_email='$email'");
}

function get_password_userwise($email)
{
  return db_helper::select(
  	"us_password","users","us_email='$email'");
}

function update_password($pass,$email)
{
	//update users set us_password='$newpass' where us_email='$email'
	return $this->update("users","us_password='$pass'","us_email='$email'");
}

function check_brand_count($brname)
{


	return self::select(
		"count(*) as cnt","brands","br_name='$brname'");
}

function brand_insert($name)
 {
 	return parent::insert(
 		"brands",
 		"br_name",
 		"'$name'"
 	);
 }
 function check_category_count($caname)
 {
 	return self::select(
 		"count(*) as cnt", "categories", "ca_name='$caname'");
 }

 function category_insert($name)
 {
 	return parent::insert(
 		"categories",
 		"ca_name",
 		"'$name'"
 	);
}

 function show_cart_records($pro){
   //echo $pro;

 	//select * from products where pro_id=6 or pro_id=5 or pro_id=4
 	//select * from products where pro_id 

 	return $this->select("*","products","pro_id in($pro) order by pro_id desc "); 
 }

 function product_insert($res)
 {
 	//pre($res);
 	return parent::insert(
 		"products",
 		"pro_name,pro_price,pro_discount,pro_description,pro_caid,pro_brid,pro_path",
 		"'$res[0]','$res[1]','$res[2]','$res[3]','$res[4]','$res[5]','$res[6]'"
 	);
 }


 function check_count_wishlist($pid,$uid)
 {
 	return self::select(
 		"count(*) as cnt", "wishlist", "wi_pid='$pid' and wi_uid='$uid'");
 

 }

 function wishlist_insert($pid,$uid)
 {
 	return parent::insert(
 		"wishlist",
 		"wi_uid, wi_pid",
 		"'$uid','$pid'");
 }

 function show_wishlist_record($uid)
 {

 	/*select pro_id,pro_name,pro_price,pro_discount,pro_description,pro_path from products,wishlist where wi_uid='$uid' and wi_pid=pro_id


 	select pro_id,pro_name,pro_price,pro_discount,pro_description,pro_path
 	from products join wishlist on wi_uid='$uid' and wi_pid=pro_id


 	*/
 	///////////OR//////////

   return db_helper::select(
 		"pro_id,pro_name,pro_price,pro_discount,pro_description,pro_path","products,wishlist","wi_uid='$uid' and wi_pid=pro_id");
 }

 function delete_from_wishlist($uid,$id)
 {
 	//delete from table where condition(wi_uid='$uid' and wi_pid='$id')
 	return parent::delete("wishlist","wi_uid='$uid' and wi_pid='$id'");
 }
}
$obj= new db_project();  //instance of db_project

?>