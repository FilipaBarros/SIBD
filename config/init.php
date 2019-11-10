<?php 
    session_start();

    $dataB = new PDO('sqlite:/var/www/html/SQL/database1.sql');

    // Check connection
    if ($dataB->connect_error) {
        die("Connection failed: " . $dataB->connect_error);
    }

?>
