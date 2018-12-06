<?php

	$host = 'localhost';
	$user = 'proggadeb';
	$pw = '';
	$database = 'proggadeb';
	
	$db = new mysqli($host, $user, $pw, $database);
	if ($db->connect_errno)
	{
		echo "Connect failed: ". $db->connect_error;
		exit();
	}

	if (isset($_REQUEST['user']))
	{	$user = $_REQUEST['user'];	}
	if (isset($_REQUEST['pass']))
	{	$pass = $_REQUEST['pass'];	}
		
	if (isset($_REQUEST['user']))
	{		
		if ("username = $user AND password = $pass")
		{
			include 'Homepage.php';
		}
		else
		{
			echo "Error: " . $sqlLogin . "<br>" . $db->error;
		}
	}
	
?>
