<?php 
session_start();

require_once('functions.php');

if (isset($_SESSION['login']) && $_SESSION['login'] == true) { //if the user already logged in redirect him to home. 
				
			
	} 
	else {
    
    	 header("location: index.php");
   	 	
	}

	$user = new LoginAndReg();

	if (isset($_POST['reset'])) {

	 $pass = $_POST['Newpassword'];
	 $conpass = $_POST['Conpassword'];
	 $u_name = $_POST['username'];

	if (!empty($pass) && !empty($u_name)) 
	{
		if ($pass == $conpass)
		{
			$reset = $user->reset($_POST['username'],$_POST['Newpassword']);		
		}
		else
		{
			$_SESSION['msg'] = "passwords not matched";
		}
	}
	else
	{

		$_SESSION['msg'] = "All fields are required";
	}
}


?>

 <!DOCTYPE html>
<html>
<head>
	<title>Login&Register</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<br>
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
				 		<h4>Reset Password</h4>
				 	</div>
				 	<div class="panel-body">
				 		<form method="POST" action="reset.php">
				    <div class="form-group">
						<label for="username">Username</label>
						<input type="text" name="username" class="form-control" placeholder="Enter username...">
				    </div>
					<div class="form-group">
						<label for="Newpassword">New Password</label>
						<input type="password" name="Newpassword" class="form-control" placeholder="Enter password...">
					</div>
					<div class="form-group">
						<label for="Conpassword">Confirm Password</label>
						<input type="password" name="Conpassword" class="form-control" placeholder="Enter password...">
					</div>
					<div class="form-group">
						<input type="submit" name="reset" class="btn btn-primary pull-right" value="Reset">
					</div>
				</form>
				 	</div>
				 </div>
				 <a class="btn btn-default" href="home.php">Back To Home</a>
			</div>
		</div>
	</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>