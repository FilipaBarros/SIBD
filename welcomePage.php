<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <title>Device Lookup Service</title>
        </head>
        <body>    
            <?php
                if (isset($_SESSION['username'])){
                    $title = "Welcome";
                    echo "<p>".$title."</p>";   
                    echo $_SESSION['username'];
                }
                else{
                    header('Location: login_page.php');
                } 
            ?>
        </body>
    </html>