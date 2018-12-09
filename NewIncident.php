<?php 
     include("connection.php");// Connects to db
     include("session.php");//Verifies which user logged in is entering data
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

$sql.= "INSERT INTO participant_has_incident SELECT '$LastName', '$FirstName', MAX(incidentNo) FROM incident;";

$sql .= "INSERT INTO `Participant` (lastName, firstName, jobTitle, email, reasonForIncident) VALUES ('$LastName', '$FirstName', '$Job', '$Email', '$Relation');";
              
$sql .= "INSERT INTO `IP Address` SELECT '$IP', '$ipRelation', MAX(incidentNo) FROM incident;";

$sql .= "INSERT INTO `Comments` SELECT current_timestamp(), '$textarea', '$login_session', MAX(incidentNo) FROM incident;";

if ($db->multi_query($sql) === TRUE)
{ ?> <br>
<link rel="stylesheet" type ="text/css" href="Homepage.css"/>
<h3>New ticket created and successfully entered into database</h3>
<h3>If you are not redirected to the homepage in 3 seconds, please <a href = "Homepage.php"> click here </a></h3>
<?php 
header("refresh: 2; url = Homepage.php");
}
else
{echo "Error: " .$sql . "<br>" . $db->error;
}

$db->close();
?>
