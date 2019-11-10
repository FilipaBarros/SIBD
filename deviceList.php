<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <title>Device Lookup Service</title>
        </head>
        <body>    
            <?php
                if (isset($_SESSION['username'])){
                    $title = "Device List";
                    echo "<p>".$title."</p>";   
                }
                else{
                    header('Location: login_page.php');
                } 
            ?>
        </body>
    </html>