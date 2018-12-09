<?php
        include("connection.php");      // connects to database
        session_start();	// starts login session

        if (isset($_REQUEST['user']))	// sets username input as $user
        {       $user = mysqli_real_escape_string($db, $_REQUEST['user']);      }
        if (isset($_REQUEST['pass']))	// sets password input as $pass
        {       $pass = mysqli_real_escape_string($db, $_REQUEST['pass']);      }

	// query to get all results matching user and pass inputs
        $sqlLogin = mysqli_query($db,"SELECT * FROM incidentResponders WHERE username = '$user' AND password = '$pass'");

	// sets array of results to $row
	$row = mysqli_fetch_array($sqlLogin, MYSQLI_ASSOC);
        
	// checks number of rows (should only show 1 for success) and determines login credentials
        if (mysqli_num_rows($sqlLogin) == 1)
        {
	        $_SESSION['login_user'] = $user;
                echo "<script> location.href='Homepage.php'; </script>";
                exit;	// if login successful, user is redirected to homepage
        }
        else
        {
		 ?> <h2>Invalid Login. Please try again!</h2> <?php
                  header("refresh: 0; url = index.html");	// if invalid login, user is redirected to login page
        }
?>
