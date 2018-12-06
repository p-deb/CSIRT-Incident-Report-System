<html lang = "en">
<head>
<title> CSIRT Login Page </title>
<link rel = "stylesheet" type = "text/css" href = "Homepage.css"/>
</head>
<body>
   <h1> CSIRT INCIDENT REPORT SYSTEM </h1>
<div align="center">
<form action="home.php" method="POST">

<b>Username:</b><input type="text" name="user"><br>
<b>Password:</b><input type="password" name="pass"><br>
<input type="submit">

</form>
</div>
</body>
</html>
proggadeb@compsci:~/public_html/DBMSFinal$ ^C
proggadeb@compsci:~/public_html/DBMSFinal$ ^C
proggadeb@compsci:~/public_html/DBMSFinal$ cat home.php
<?php

        include("connection.php");      // connects to database
        session_start();

        if (isset($_REQUEST['user']))
        {       $user = $_REQUEST['user'];      }
        if (isset($_REQUEST['pass']))
        {       $pass = $_REQUEST['pass'];      }

        $sqlLogin = mysqli_query($db,"SELECT * FROM incidentResponders WHERE username = '$user' AND password = '$pass'");

        if (mysqli_num_rows($sqlLogin) == 1)
        {
                $_SESSION['login_user'] = $user;
                echo "<script> location.href='Homepage.php'; </script>";
                exit;
        }
        else
        {
                echo "Error: " . $sqlLogin . "<br>" . $db->error;
        }
?>
