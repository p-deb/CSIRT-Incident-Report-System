<?php
	include("connection.php");	// connects to db
	session_start();

	$validate = $_SESSION['login_user'];

	$sql = mysqli_query($db, "SELECT username FROM incidentResponders WHERE username = '$validate'");
	$row = mysqli_fetch_array($sql, MYSQLI_ASSOC);
        $login_session = $row['username'];

        if (!isset($_SESSION['login_user']))
        { echo "<script> location.href='index.html'; </script>"; }

?>
