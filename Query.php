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
    if (isset($_REQUEST['incidentNo']))
    {       $incidentNo = $_REQUEST['incidentNo'];  }
      if (isset($_REQUEST['incidentNo']))
      {       

      $sql = "SELECT * FROM Incident WHERE incidentNo = $incidentNo";
      $result = $db->query($sql);

      if (!$result){
        echo "Oops! " . $db->error;
      }
      else{
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
      }
    }

      ?>

    <table class="CommentsTable">
    <tr class="TableHeaderDescription">
      <th id="headerItemTitle"><center>Description</center></th>
      <th id="headerItem"><center>Responder</center></th>
      <th id="headerItem"><center>Date Updated</center></th>
    </tr>
<br><br>

    <?php
    $sqlDesc = "SELECT description, IncidentResponders_username, dateUpdated FROM Comments WHERE Incident_incidentNo = $incidentNo";
    $result2 = $db->query($sqlDesc);
      if (!$result2){
        echo "Oops! " . $db->error;
      }
      else{
        $table2 = $result2->fetch_all();
        {
          foreach($table2 as $row2) {
            ?>
            <tr class = "TableHeaderDescription">
              <?php

              foreach($row2 as $value2)
              {
                echo "<td>$value2</td>";
              }
            }
            ?>
          </tr>
          <?php
        }
      }
      ?>


    <?php
    $sqlIP = "SELECT IPaddress, reasonForIncident FROM `ip address` WHERE Incident_incidentNo = '$incidentNo'";
    $result3 = $db->query($sqlIP);
      if (!$result3){
        echo "Oops! " . $db->error;
      }
      else{
?>
<table class="IPTable">
    <tr class="TableHeaderIP">
      <th id="headerItem"><center>IP Address</center></th>
      <th id="headerItemTitle"><center>Reason for Incident</center></th>
    </tr>
<br><br>

<?php
        $table3 = $result3->fetch_all();
        {
          foreach($table3 as $row3) {
            ?>
            <tr class = "TableHeaderIP">
              <?php

              foreach($row3 as $value3)
              {
                echo "<td>$value3</td>";
              }
            }
            ?>
          </tr>
          <?php
        }
      }
      ?>

    <?php
    $sqlParticipant = "SELECT participant.lastName, participant.firstName, participant.jobTitle, participant.email, participant.reasonForIncident FROM Participant,participant_has_incident WHERE participant.lastName = participant_has_incident.lastName AND participant_has_incident.incidentNo = '$incidentNo';";
    $result4 = $db->query($sqlParticipant);
      if (!$result4){
        echo "Oops! " . $db->error;
      }
      else{
?>
<table class="ParticipantTable">
    <tr class="TableHeaderParticipant">
      <th id="headerItem"><center>Last Name</center></th>
<th id="headerItem"><center>First Name</center></th>
<th id="headerItem"><center>Job Title</center></th>
<th id="headerItem"><center>Email</center></th>
      <th id="headerItemTitle"><center>Reason for Incident</center></th>
    </tr>
<br><br>

<?php
        $table4 = $result4->fetch_all();
        {
          foreach($table4 as $row4) {
            ?>
            <tr class = "TableHeaderParticipant">
              <?php

              foreach($row4 as $value4)
              {
                echo "<td>$value4</td>";
              }
            }
            ?>
          </tr>
          <?php
        }
      }
      ?>



  </body>
  </html>
