<?php
    require_once('config/init.php');
?>


<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <title>Create Device</title>
        </head>
        <body>    
        <section id="createDevice">
                <?php
                    $title = "Create Local";
                    echo "<h2>".$title."</h2>";
                ?>
                <form action="action_createLocal.php" method="post">
                    <p>&nbsp&nbspCountry: <input type="text" name="country" placeholder="Country" required></p>
                    <p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspCity: <input type="text" name="city" placeholder="City" required></p>
                    <p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp ZIP: <input type="text" name="zip" placeholder="****-***" pattern="[0-9]*" required></p>
                    <p>&nbsp&nbsp&nbsp&nbsp&nbspStreet: <input type="text" name="street" placeholder="Street" required></p>
                    <p>Building: <input type="text" name="building" placeholder="Building" required></p>
                    <p>&nbsp&nbsp&nbsp&nbsp&nbspFloor: <input type="number" name="floor" placeholder="Floor" required></p>
                    <p>&nbsp&nbsp&nbspRoom: <input type="text" name="room" placeholder="Room" required></p>
                    <input type="submit" value="Create">
                </form>
                
            </section> 
        </body>
    </html>