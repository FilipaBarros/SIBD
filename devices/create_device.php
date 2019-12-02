
<?php include('../partials/header.php'); ?> 
<?php if (isset($_SESSION['username'])) { ?> 
<section id="createDevice">
        <?php
        $title = "Create Device";
        echo "<h2>" . $title . "</h2>";
        ?>
        <form action="actions/action_create_device.php" method="post">
            <p>Name: <input type="text" name="deviceName" placeholder="Device Name" required></p>
            <p>Manufacturer: <input type="text" name="manufacturer" placeholder="Manufacturer" required></p>
            <p>Description: <input type="text" name="description" placeholder="Description" required></p>
            <p>SW Version:<input type="text" name="swversion" placeholder="Software Version" required></p>
            <p>SW Artefact: <input type="text" name="swartefact" placeholder="Software Artefact" required></p>
            <p>IP Address: <input type="text" name="ip" placeholder="IP Address" required pattern="^([0-9]{1,3}\.){3}[0-9]{1,3}$"></p>
            <p>Status: <input type="text" name="status" placeholder="Status" required></p>
            <p>Local ID: <select name ="local" required>
                <?php
                global $dataB;
                $queryLocal = "SELECT locid, zip FROM Locals";
                $result = $dataB->query($queryLocal);
                while ($row = $result->fetch()) {
                    echo "<option value='" . $row['locid'] . "'>". $row['zip'] . "</option>";
                }

                ?>
            </select></p>
            <p>System ID: <select name ="system" value="<?php echo $res['sysid']?>"required>
                <?php
                global $dataB;
                $queryLocal = "SELECT sysid, sysdescription FROM Systems";
                $result = $dataB->query($queryLocal);
                while ($row = $result->fetch()) {
                    echo "<option value='" . $row['sysid'] ."'>" . $row['sysdescription'] . "</option>";
                }

                ?>
            </select></p>
            <input type="submit" value="Create">
        </form>
        
    </section> 
    <?php 
} 
include('../partials/footer.php');
?>