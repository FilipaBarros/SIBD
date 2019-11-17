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
        <header>
            <?php if (isset($_SESSION['username'])) { ?>
            <form class="logout" action="action_logout.php">
                <span><?=$_SESSION['username']?></span>
                <input type="submit" value="Logout">
            </form>
            </header> 
            <?php } ?>
           
        </body>
    </html>
