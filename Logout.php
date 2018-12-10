<?php
	session_start();
	if (session_destroy())
	{
		// End session and redirect user to login page
                echo "<script> location.href='index.html'; </script>";
        }
?>
