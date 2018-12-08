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
    $sql = "SELECT * FROM Incident WHERE incidentNo = $incidentNo";
    $result = $db->query($sql);
    if (!$result){
      echo "Oops! " . $db->error;
    }
    else{

      if (isset($_REQUEST['incidentNo']))
      {       $incidentNo = $_REQUEST['incidentNo'];  }

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
    } //
      ?>
    </table>

    <table class="CommentsTable">
      <tr class="TableHeaderDescription">
        <th id="headerItemDescription"><center>Description</center></th>
      </tr>
    </table>

  </body>
  </html>
