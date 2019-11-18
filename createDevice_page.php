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
                    <p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Name: <input type="text" name="deviceName" placeholder="Device Name" required></p>
                    <p>Manufacturer: <input type="text" name="manufacturer" placeholder="Manufacturer" required></p>
                    <p>&nbsp&nbsp Description: <input type="text" name="description" placeholder="Description" required></p>
                    <p>&nbsp&nbsp SW Version:<input type="text" name="swversion" placeholder="Software Version" required></p>
                    <p>&nbspSW Artefact: <input type="text" name="swartefact" placeholder="Software Artefact" required></p>
                    <p>&nbsp&nbsp&nbsp IP Address: <input type="text" name="ip" placeholder="IP Address" required pattern="^([0-9]{1,3}\.){3}[0-9]{1,3}$"></p>
                    <p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspStatus: <input type="text" name="status" placeholder="Status" required></p>
                    <p>Local ID: <select name ="local" required>
                        <?php
                            global $dataB;
                            $queryLocal = "SELECT locid FROM Locals";
                            $result = $dataB->query($queryLocal);
                            while ($row = $result->fetch()){
                                echo "<option value=\"local\">" . $row['locid'] . "</option>";
                            }
                            
                        ?>
                    </select></p>
                    <input type="submit" value="Create">
                </form>
                
            </section> 
        </body>
    </html>
