<?php

	include("connection.php");	// connects to database
	session_start();

	if (isset($_REQUEST['user']))
	{	$user = $_REQUEST['user'];	}
	if (isset($_REQUEST['pass']))
	{	$pass = $_REQUEST['pass'];	}

	$sqlLogin = mysqli_query($db,"SELECT * FROM login WHERE username = '$user' AND password = '$pass'");
		
	if (mysqli_num_rows($sqlLogin) == 1)
	{		
		$_SESSION['login_user'] = $user;
		include 'Homepage.html';
	}
	else
	{
		echo "Error: " . $sqlLogin . "<br>" . $db->error;
	}	
?>
