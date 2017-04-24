<?php 
require('config.php');
	class LoginAndReg{

		function __construct()
		{
			$db = new db_connect();
		}

		function RegisterUser($username,$password,$email,$name)
		{
			$user_name = mysql_real_escape_string($username);
			$u_pass = mysql_real_escape_string(md5($password));
			$u_email = mysql_real_escape_string($email);
			$u_name = mysql_real_escape_string($name);

			$query = mysql_query("select ID from users where username='$u_name' or email='$u_email' "); // this validate if user exist or no

			$num_row = mysql_num_rows($query);
			if ($num_row == 0) { //if there is no rows exist then register user.
				
				$_SESSION['user'] = $user_name;
				$result = mysql_query("insert into users(username,password,email,name) 
									  values('$user_name','$u_pass','$u_email','$user_name')");
				return $result;
			}
			else
			{
				$_SESSION['msg'] = "user already exist";
			}
		}

		function LoginUser($username,$password)
		{
			$u_pass = mysql_real_escape_string(md5($password));
			$u_name = mysql_real_escape_string($username);

			$result = mysql_query("select ID from users where username='$u_name' and password='$u_pass' ");
			$user_data = mysql_fetch_array($result);
			$num_row = mysql_num_rows($result);

			if ($num_row == 1 ) {
				
				$_SESSION['login'] = true;
				$_SESSION['user'] = $u_name;
				$_SESSION['uid'] = $user_data['ID'];
				return true;
			}
			else
			{
				return false;
			}
		}

		function getUsername($uid)
		{
			$result = mysql_query("select name from users where ID='$uid' ");
			$user_data = mysql_fetch_array($result);
			echo $user_data['name'];
		}

		function reset($username,$password)
		{
			$u_pass = mysql_real_escape_string(md5($password));
			$u_name = mysql_real_escape_string($username);

			$query = mysql_query("select ID from users where username='$username' ");

			$num_row = mysql_num_rows($query);

			if ($num_row == 1) { //if exist then update info.
				
				$result = mysql_query("update users set password='$u_pass' where username='$u_name' ");

				$_SESSION['msg'] =  "updated successfully";

			}
			else
			{
				$_SESSION['msg'] = "Opps..!! please enter the correct username";
			}
		}

	}

?>