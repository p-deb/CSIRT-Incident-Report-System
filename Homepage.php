<?php
        echo "<link rel='stylesheet' type='text/css' href='Query.css' />";

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

$sql = "SELECT * FROM Incident ORDER BY dateCreated DESC";
        $result = $db->query($sql);

//two methods
        $table = $result->fetch_all();
        //var_dump($table);
        echo "<table border = '1'>";
        echo "<tr><th>Incident #</th><th>Incident Title</th><th>Incident Type</th><th>Status</th><th>Date Created</th></tr>";
        foreach($table as $row){
                echo "<tr>";
                foreach($row as $value){
                        echo "<td>$value</td>";
                }
                echo "</tr>";
        }

        $db->close();


?>
<html lang="en">
<head>
 <title> CSIRT Homepage </title>
 <link rel="stylesheet" type ="text/css" href="Homepage.css"/>
 </head>
<body>
   <h1> CSIRT INCIDENT REPORT SYSTEM </h1>
 <ul>
     <li> <a class= "current" href= "#homepage"> Home </a> </li>
     <li> <a href = "Query.html"> Search </a> </li>
     <li> <a href = "NewIncident.html" target = "_blank"> Report an Incident </a> </li>
 </ul>

<br><br>

</body>
</html>
