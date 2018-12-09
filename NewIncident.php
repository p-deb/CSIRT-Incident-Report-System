<?php 
     include("connection.php");// Connects to db
     include("session.php");	//Verifies which user logged in is entering data
	session_start();
     # Inserts Incident title, category, and status into incident table
     # Incident No is also incremented by 1
     if (isset($_REQUEST['IncidentTitle']))
          {$IncidentTitle = $_REQUEST['IncidentTitle'];}    
     if (isset($_REQUEST['Category']))
          {$Category = $_REQUEST['Category'];}
     if (isset($_REQUEST['Status']))
          {$Status = $_REQUEST['Status'];}

        #CONTACT INFO   
        if (isset($_REQUEST['LastName']))
        {       $LastName = $_REQUEST['LastName'];      }
        if (isset($_REQUEST['FirstName']))
        {       $FirstName = $_REQUEST['FirstName'];    }
        if (isset($_REQUEST['Email']))
        {       $Email = $_REQUEST['Email'];    }
        if (isset($_REQUEST['Job']))
        {       $Job = $_REQUEST['Job'];        }
        if (isset ($_REQUEST['Relation']))
        {       $Relation = $_REQUEST['Relation'];     }

#DESCRIPTION
        if (isset($_REQUEST['textarea']))
        {       $textarea = $_REQUEST['textarea'];      }

#IP
if (isset($_REQUEST['ip']))
        {       $IP = $_REQUEST['ip'];        }
        if (isset ($_REQUEST['ipRelation']))
        {       $ipRelation = $_REQUEST['ipRelation'];     }


$sql = "INSERT INTO `Incident` (incidentType, dateCreated, incidentStatus, incidentTitle ) VALUES ('$Category', current_timestamp(), '$Status', '$IncidentTitle');";
$sql .= "INSERT INTO `Participant` (lastName, firstName, jobTitle, email, reasonForIncident) VALUES ('$LastName', '$FirstName', '$Job', '$Email', '$Relation');";

$last = mysqli_query($db, "SELECT MAX(incidentNo) AS maxNo FROM incident");
$row = mysqli_fetch_assoc($last);
$lastIncident = $row['maxNo'];

echo "The most recent incident entered is: " .$lastIncident; ?> <br><br> <?php
echo "Incident number:" . $lastIncident;

$sql .= "INSERT INTO `Participant_has_Incident` VALUES ('$lastIncident', '$LastName', '$FirstName');";               
$sql .= "INSERT INTO `IP Address` VALUES ('$lastIncident', '$IP', '$ipRelation');";
$sql .= "INSERT INTO `Comments` VALUES (current_timestamp(), '$textarea', '$lastIncident', '$login_session');";

if ($db->multi_query($sql) === TRUE)
{ ?> <br>
<?php
echo "New ticket created and successfuly entered into database"; }
else
{echo "Error: " .$sql . "<br>" . $db->error;}

$db->close();
header("refresh: 3; url = Homepage.php");
?>

