<?php include('../partials/header.php') ?> 
<?php if (isset($_SESSION['username'])) { ?> 
<h1>Edit Device</h1>
<section id="editDevice">
        <?php
        $id = htmlspecialchars($_GET["id"]);
        function get_table($id)
        {
            global $dataB;
            $statement = $dataB->prepare("SELECT * FROM Devices WHERE devid=?");
            $statement->execute(array($id));
            $locations = $statement->fetchAll();
            return $locations;
        }
        $res = get_table($id)[0];
        //print_r($res);
        ?>
        <form action="actions/action_edit_device.php?id=<?php echo $_GET["id"]?>" method="post">
            <p>Name: <input type="text" name="deviceName" placeholder="Device Name" value="<?php echo $res['devname']?>" required></p>
            <p>Manufacturer: <input type="text" name="manufacturer" placeholder="Manufacturer" value="<?php echo $res['manufacturer']?>" required></p>
            <p>Description: <input type="text" name="description" placeholder="Description" value="<?php echo $res['devdescription']?>" required></p>
            <p>SW Version:<input type="text" name="swversion" placeholder="Software Version" value="<?php echo $res['swversion']?>" required></p>
            <p>SW Artefact: <input type="text" name="swartefact" placeholder="Software Artefact" value="<?php echo $res['swartefact']?>" required></p>
            <p>IP Address: <input type="text" name="ip" placeholder="IP Address" value="<?php echo $res['ip']?>" required pattern="^([0-9]{1,3}\.){3}[0-9]{1,3}$"></p>
            <p>Status: <input type="text" name="status" placeholder="Status" value="<?php echo $res['stat']?>" required></p>
            <p>Local ID: <select name ="local" value="<?php echo $res['locid']?>"required>
                <?php
                global $dataB;
                $queryLocal = "SELECT locid FROM Locals";
                $result = $dataB->query($queryLocal);
                while ($row = $result->fetch()) {
                    echo "<option value=\"local\">" . $row['locid'] . "</option>";
                }

                ?>
            </select></p>
            <p>System ID: <select name ="system" value="<?php echo $res['sysid']?>"required>
                <?php
                global $dataB;
                $queryLocal = "SELECT sysid FROM Systems";
                $result = $dataB->query($queryLocal);
                while ($row = $result->fetch()) {
                    echo "<option value=\"system\">" . $row['sysid'] . "</option>";
                }

                ?>
            </select></p>
            <input type="submit" value="Update">
        </form>
    </section> 
    <?php 
} 
include('../partials/footer.php')
?>  
