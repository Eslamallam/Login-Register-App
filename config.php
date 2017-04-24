<?php
	
	define('server', 'localhost');  //localhost
	define('user', 'root');         //db username
	define('password', 'eslam');    //db password
	define('database', 'simplelr'); //db name

	class db_connect{
		
		function __construct()
		{
			$conn = mysql_connect(server,user,password,database);
			mysql_select_db(database,$conn) or die ("Error: ".mysql_error());
		}
	}
?>