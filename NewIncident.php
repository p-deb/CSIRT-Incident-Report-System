<?php 
     include("connection.php");// Connects to db
//include("home.php");
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


$sql = "INSERT INTO `Incident` (incidentNo, incidentType, dateCreated, incidentStatus, incidentTitle ) VALUES (DEFAULT, '$Category', current_timestamp(), '$Status', '$IncidentTitle');";
$lastIncident = mysqli_query($db, "SET @lastIncident := (SELECT incidentNo FROM incident WHERE incident.incidentNo = (SELECT MAX(incidentNo) FROM incident));");     
$sql .= "INSERT INTO `Participant` (lastName, firstName, jobTitle, email, reasonForIncident) VALUES ('$LastName', '$FirstName', '$Job', '$Email', '$Relation');";
$sql .= "INSERT INTO `Participant_has_Incident` VALUES ('$lastIncident', '$LastName', '$FirstName');";               
$sql .= "INSERT INTO `IP Address` VALUES ('$lastIncident', '$IP', '$ipRelation');";
$sql .= "INSERT INTO `Comments` VALUES (current_timestamp(), '$textarea', '@lastIncident');";

if ($db->multi_query($sql) === TRUE)
{echo "New ticket created and successfuly entered into database"; }
else
{echo "Error: " .$sql . "<br>" . $db->error;}

$db->close();
?>
