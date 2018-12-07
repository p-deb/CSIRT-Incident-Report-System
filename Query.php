<?php
include ("connection.php");
echo "<link rel='stylesheet' type='text/css' href='Query.css' />";

if (isset($_REQUEST['incidentNo']))
{       $incidentNo = $_REQUEST['incidentNo'];  }

$sql = "SELECT * FROM Incident WHERE incidentNo = $incidentNo";
$result = $db->query($sql);

if(!$result){
  echo "Oops! " . $db->error;
}
else{
  echo "<br>" . $result->num_rows. " ticket(s) displayed.<br>";

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
}

/*$title = $db->query("SELECT incidentTitle FROM Incident;");*/
$title = $table->incidentTitle;
echo "\nTitle:" . $title;

$title = $table->$incidentTitle;
echo "\nTitle:" . $title;

$title = $result->incidentTitle;
echo "\nTitle:" . $title;

$title = $result->incidentTitle;
echo "\nTitle:" . $title;

$db->close();

?>
