
<?php include('../partials/header.php'); ?> 
<?php if (isset($_SESSION['username'])) { ?> 
    <?php if ($_GET['id']==''){
        header ("Location: ../partials/404.php");
    } 
    global $dataB;
    $statement = $dataB->prepare("SELECT sysid FROM Systems WHERE sysid=?");
    $statement->execute(array($_GET['id']));
    $putId= $statement->fetchColumn();
    if($putId==FALSE){
        header ("Location: ../partials/404.php");
    }

?>
<section id="createDevice">
        <?php
          global $dataB;
          $statement= $dataB->prepare("SELECT permtypeid FROM UserPermissions WHERE sysid=? AND userid=?");
          $statement->execute(array($_GET['id'],$_SESSION['userid']));
          $userPerm= $statement->fetchColumn();
          if($userPerm!=3){
                header('Location: http://'.$RESOURCEPATH.'/partials/500.php');
          }
        $title = "Create Device";
        echo "<h2>" . $title . "</h2>";
        ?>
        <div class="box forms">
            <form action="actions/action_create_device.php" method="post">
                <p>Name: <input type="text" name="deviceName" placeholder="Device Name" required></p>
                <p>Manufacturer: <input type="text" name="manufacturer" placeholder="Manufacturer" required></p>
                <p>Description: <input type="text" name="description" placeholder="Description" required></p>
                <p>SW Version:<input type="text" name="swversion" placeholder="Software Version" required></p>
                <p>SW Artefact: <input type="text" name="swartefact" placeholder="Software Artefact" required></p>
                <p>IP Address: <input type="text" name="ip" placeholder="IP Address" required pattern="^([0-9]{1,3}\.){3}[0-9]{1,3}$"></p>
                <p>Status: <select name="status" required>
                    <option value="working">Working</option>
                    <option value="offline">Offline</option>
                </select></p>
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
                <input type="hidden" name="system" value=<?=$_GET['id']?> required>
                <input class="btn btn-full" type="submit" value="Create">
            </form>
        <div>
        
    </section> 
    <?php 
} 
include('../partials/footer.php');
?>