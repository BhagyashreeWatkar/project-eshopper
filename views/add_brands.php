<?php

session_start(); //access after login

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
						<h2>Add Brands</h2>
						<form id="brand_form"> 

							<input type="text" name="br_name" placeholder="" />
							
							<button type="button" class="btn btn-default btn-brand">Add</button>
							<div class="msg_brand"></div>
						</form> 
						
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Show Brands</h2>
						<?php

						$result = $obj->show_brands();

						if(is_array($result)):
						foreach($result as $val):
						?>
						<li><?php echo $val['br_name'];
						?></li>
						<?php
					endforeach;
				endif;
				?>
						
						<div class="msg_register"></div>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->


<?php
require_once 'footer.php';
?>