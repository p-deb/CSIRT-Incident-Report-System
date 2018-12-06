<?php
        include ("connection.php");
	echo "<link rel='stylesheet' type='text/css' href='Report.css' />";

	if (isset($_REQUEST['incidentNo']))
        {       $incidentNo = $REQUEST['incidentNo'];  }

	$sql = "SELECT incidentNo FROM Incident WHERE incidentNo = $incidentNo";
	$result = $db->query($sql);

	if(!$result){
    echo "Oops! " . $db->error;
        }
        else{

        $table = $result->fetch_all();

        $incidentNo = $table->$incidentNo;
        $title = $table->$incidentNo;

      }
?>
