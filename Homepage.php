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

<table class="IncidentsTable">
  <tr class="TableHeader">
    <th id="headerItem"><center>Incident #</center></th>
    <th id="headerItemTitle"><center>Title</center></th>
    <th id="headerItem"><center>Type</center></th>
    <th id="headerItem"><center>Status</center></th>
    <th id="headerItem"><center>Date Created</center></th>
  </tr>

<?php
        include ("connection.php");     //connects to db

        $sql = "SELECT * FROM Incident ORDER BY dateCreated DESC";
        $result = mysqli_query($db,$sql);
        //$num = mysqli_query

        $table = $result->fetch_all();
        {
                foreach($table as $row) {
                ?>
                <tr class = "TableRow">
                <?php

                foreach($row as $value)
                {
                        echo "<td>$value</td>";
                }
                }
                ?>
                </tr>
<?php
        }
?>
</table>

</body>
</html>
