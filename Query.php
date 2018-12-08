<html lang = "en">
 <link rel="stylesheet" type ="text/css" href="Homepage.css"/>
<body>

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
<<<<<<< HEAD
        if (isset($_REQUEST['incidentNo']))
	{       $incidentNo = $_REQUEST['incidentNo'];  }
	$sql = "SELECT * FROM Incident WHERE incidentNo = $incidentNo";
	$result = $db->query($sql);
	if (!$result){
		echo "Oops! " . $db->error;
	}
	else{
=======

        if (isset($_REQUEST['incidentNo']))
	{       $incidentNo = $_REQUEST['incidentNo'];  }

	$sql = "SELECT * FROM Incident WHERE incidentNo = $incidentNo";
	$result = $db->query($sql);

	if (!$result){
		echo "Oops! " . $db->error;
	}
	else{ 
>>>>>>> 1c4e8f5a3da643a6b3e012cf4b78609e30e3e729
          $table = $result->fetch_all();
          {
                foreach($table as $row) {
                ?>
               		 <tr class = "TableRow">
                <?php
<<<<<<< HEAD
=======

>>>>>>> 1c4e8f5a3da643a6b3e012cf4b78609e30e3e729
                	foreach($row as $value)
                	{
                        	echo "<td>$value</td>";
                	}
                }
                ?>
                </tr>
<?php
          }
	}
?>
</table>

</body>
</html>
