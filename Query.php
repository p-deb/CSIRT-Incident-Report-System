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
        echo "<tr><th>Incident #</th><th>Incident Type</th><th>Date Created</th><th>Status</th><th>Title</th></tr>";
        foreach($table as $row){
                echo "<tr>";
                foreach($row as $value){
                        echo "<td>$value</td>";
                }
                echo "</tr>";
        }
}

        $db->close();

?>
