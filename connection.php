<?php
// Connection to database "proggadeb"
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
?>
