<?php

session_start(); //access after login  //dont call withot login
//print_r($_SESSION);

if(!isset($_SESSION['project_name'])){
	header("location:index.php");  //after manually placed login.php in url it will redirect to index.php
}


require_once 'header.php';
?>

<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Add product</h2>
						<form id="product_form"> 

							<input type="text" name="pro_name" placeholder="Mens formal wear" />

							<input type="text" name="pro_price" placeholder="2400" />

							<input type="text" name="pro_discount" placeholder="20 in %" />

							<select name="pro_caid">
								<option value="">Please select category</option>
								<?php
								$res=$obj->show_categories();
								//pre($res);
								if(is_array($res))
								{
                                   foreach($res as $key=>$val)
                                   {
                                   	$id=$val['ca_id'];
                                   	echo "<option value='$id'>".$val['ca_name']."</option>";
                                   }
								}
								
								?>
							</select>
							<br><br>
							<select name="pro_brid">
								<option value="">Please select brand</option>
								<?php
								$res=$obj->show_brands();
								//pre($res);
								if(is_array($res))
								{
                                   foreach($res as $key=>$val)
                                   {
                                   	$id=$val['br_id'];
                                   	echo "<option value='$id'>".$val['br_name']."</option>";
                                   }
								}
								
								?>
							</select>
							<br><br>

							<input type="file" name="pro_path" />

							<textarea name="pro_desc" placeholder="product description"></textarea>


							
							<button type="button" class="btn btn-default btn-product">Add product</button>

							</form> 
							
							<div class="msg_product"></div>
						 
						</div><!--/login form-->
				</div>
				
			</div>
		</div>
	</div>
</section><!--/form-->


<?php
require_once 'footer.php';
?>