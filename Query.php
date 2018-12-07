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

  $title3 = $table->incidentTitle;
  echo "\nTitle 3:" . $title3;

  $title2 = $table[incidentTitle];
  echo "\nTitle 2:" . $title2;

  $title1 = $table[0]->$incidentNo;
  echo "\nTitle 1:" . $title1;
}

$db->close();

?>
