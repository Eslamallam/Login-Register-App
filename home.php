<?php
require_once('functions.php');
session_start();

	if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
		 
		 header("location: home.php");
	}
	else
	{
		header("location: login.php");
	}

	$user = new LoginAndReg();

	$uid = $_SESSION['uid']; // get username of logged user
?>

<!DOCTYPE html>
<html>
<head>
	<title>Register & Login</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-default navbar-default ">
	<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li class="active"><a href="logout.php">Logout</a></li>
				<li><a href="reset.php">Change password</a></li>
			</ul>
		</div>
	</div>
</nav>

<div class="container">
		<div class="row">
			<div class="col-lg-6 col-lg-offfset-3">
			   <h2>Welcome <?php echo $user->getUsername($uid) ?></h2>
			</div>
		</div>
	</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>