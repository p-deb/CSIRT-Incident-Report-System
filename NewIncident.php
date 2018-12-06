<?php 
include("connection.php");// Conects to db

#TITLE---- Will date created be auto-generated or manually entered? ----
if (isset($_REQUEST['IncidentTitle']))
{$IncidentTitle = $_REQUEST['IncidentTitle'];}
if (isset($_REQUEST['Category']))
{$Category = $_REQUEST['Category'];}
if (isset($_REQUEST['Status']))
{$Status = $_REQUEST['Status'];}

if (isset($_REQUEST['IncidentTitle']))
{
$sqlTitle = "INSERT INTO `Incident` (incidentNo, incidentType, dateCreated, incidentStatus, incidentTitle ) 
     VALUES (DEFAULT, '$Category', current_timestamp(), '$Status', '$IncidentTitle');";
if ($db->query($sqlTitle) === TRUE)
{
echo "New Incident entered into database";
}
else
{
echo "Error: " . $sql . "<br>" . $db->error;
}
}
/*$sql = "SELECT * FROM `incident`;";
        $result = $db->query($sql);
        if(!$result){
                echo "Oops! " . $db->error;
        }
        else{
                echo "<br>" . $result->num_rows. " tickets displayed.";

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
*/
        #CONTACT INFO   ----- Need to add reasonForIncident to form -----
        if (isset($_REQUEST['LastName']))
        {       $LastName = $_REQUEST['LastName'];      }
        if (isset($_REQUEST['FirstName']))
        {       $FirstName = $_REQUEST['FirstName'];    }
        if (isset($_REQUEST['Email']))
        {       $Email = $_REQUEST['Email'];    }
        if (isset($_REQUEST['Job']))
        {       $Job = $_REQUEST['Job'];        }
if (isset ($_REQUEST['Relation']))
{$Relation = $_REQUEST['Relation'];}

        if (isset($_REQUEST['LastName']))
        {
        $sqlContact = "INSERT INTO `Participant` (lastName, firstName, jobTitle, email, reasonForIncident) VALUES ('$LastName', '$FirstName', '$Job', '$Email', '$Relation');";
/*if ($db->query($sqlContact) === TRUE)
                {
                        echo "New Incident entered into database";
                }
                else
                {
                        echo "Error: " . $sqlContact . "<br>" . $db->error;
                }
*/
        }



        #DESCRIPTION
        if (isset($_REQUEST['textarea']))
        {       $textarea = $_REQUEST['textarea'];      }

        $sqlDescription = "INSERT INTO `Comments` (description)
                           VALUES ('$textarea');";


$db->close();
?>
