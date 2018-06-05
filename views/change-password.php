<?php

session_start();

if(!isset($_SESSION['project_name']))
{
	header("location:index.php");
}
require_once "header.php";
?>

<div class="container">

<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Update Password!</h2>
						<form id="update_form">

							<input type="text" name="cpass" placeholder="enter old name" />

							<input type="password" name="npass" placeholder="enter new password" />

							<input type="password" name="cnpass" placeholder="enter confirm new password" />

							<button type="button" class="btn btn-default btn-update">Update</button>
							
							
						</form>
						<div class="msg_update"></div>
					</div><!--/sign up form-->
				</div>
			</div>

<?php
require_once "footer.php";
?>