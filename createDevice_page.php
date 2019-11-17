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
                    $title = "Create Device";
                    echo "<h2>".$title."</h2>";
                ?>
                <form action="action_createDevice.php" method="post">
                    <input type="text" name="deviceName" placeholder="Device Name" required>
                    <input type="text" name="manufacturer" placeholder="Manufacturer" required>
                    <input type="text" name="description" placeholder="Description" required>
                    <input type="text" name="swversion" placeholder="Software Version" required>
                    <input type="text" name="swartefact" placeholder="Software Artefact" required>
                    <input type="text" name="ip" placeholder="IP Address" required>
                    <input type="text" name="status" placeholder="Status" required>
                    <select name ="local" required>
                        <?php
                            global $dataB;
                            $queryLocal = "SELECT room FROM Locals";
                            $result = $dataB->query($queryLocal);
                            while ($row = $result->fetch()){
                                echo "<option value=\"local\">" . $row['room'] . "</option>";
                            }
                            
                        ?>
                    </select>
                    <input type="submit" value="Create">
                </form>
                
            </section> 
        </body>
    </html>