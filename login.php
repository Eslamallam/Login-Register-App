<?php 
session_start();
require_once('functions.php');

if (isset($_SESSION['login']) && $_SESSION['login'] == true) { //if the user already logged in redirect him to home. 
				
			header("location: home.php");
	} 
	else {
    //...
   	 	
	}

$user = new LoginAndReg();

//input validate and login user
if (isset($_POST['btn_log'])) {

	$pass = $_POST['password'];
	$u_name = $_POST['username'];

	if (!empty($pass) && !empty($u_name)) 
	{
		$Login = $user->LoginUser($_POST['username'],$_POST['password']);

		if ($Login) {
		
			header("location: home.php");

		}
		else
		{
			$_SESSION['msg'] =  "Your email | password are incorrect";
		}	

	}
	else
	{
		$_SESSION['msg'] = "all fields are required";
	}
	
	
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<br><br><br>
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3">
			<?php
					if (isset($_SESSION['msg'])) { //show error message if something went wrong.
					 	
					 	echo "<div class='alert alert-danger'>".$_SESSION['msg']."</div>";
					 	unset($_SESSION['msg']);
					 } 
				 ?>
				 <div class="panel panel-default">
				 	<div class="panel-heading">
				 		<h4>Login Here</h4>
				 	</div>
				 	<div class="panel-body">
				 		<form method="POST" action="">
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" name="username" class="form-control" placeholder="Enter username...">
				    </div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" name="password" class="form-control" placeholder="Enter password...">
					</div>
					<div class="form-group">
						<input type="submit" name="btn_log" class="btn btn-primary pull-right" value="Login"></input>
					</div>
				</form>
				 	</div>
				 </div>
				<a class="btn btn-default" href="index.php">Back To Home</a>
			</div>
		</div>
	</div>



<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>