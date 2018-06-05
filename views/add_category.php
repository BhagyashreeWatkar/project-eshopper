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
						<h2>Add category</h2>
						<form id="category_form"> 

							<input type="text" name="ca_name" placeholder="" />
							
							<button type="button" class="btn btn-default btn-category">Add</button>
							<div class="msg_category"></div>
						</form> 
						
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Show Category</h2>
						<?php

						$result = $obj->show_categories();

						if(is_array($result)):
						foreach($result as $val):
						?>
						<li><?php echo $val['ca_name'];
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