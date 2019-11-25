<?php
    require_once('config/init.php');
?>

<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <title>Device Lookup Service</title>
        </head>
        <body>   
            <?php include ('header.php') ?> 
            <?php if (isset($_SESSION['username'])) { ?> 
                <a href="createDevice_page.php"><p>Create New Device</p></a>
            <?php } ?>  
           
        </body>
    </html>