<?php include('../partials/header.php') ?> 
<?php if (isset($_SESSION['username'])) { ?> 
<h1>Edit Device</h1>
<?php
    global $dataB;
    $statement=$dataB->prepare('SELECT COUNT(devid) AS num FROM Devices WHERE devid=?');
    $statement->execute(array($_GET["id"]));
    $check=$statement->fetchColumn();

    if($check==0){
        header('Location: http://'.$RESOURCEPATH.'/partials/404.php');
    }
?>
<?php
    $id = htmlspecialchars($_GET["id"]);
    $sysid=$_GET["sysid"];
    global $dataB;
    $statement= $dataB->prepare("SELECT permtypeid FROM UserPermissions WHERE sysid=? AND userid=?");
    $statement->execute(array($sysid,$_SESSION['userid']));
    $userPerm= $statement->fetchColumn();
    if($userPerm!=3 && $userPerm!=1){
        header('Location: http://'.$RESOURCEPATH.'/partials/500.php');
    }
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
<div class="box forms">
    <form action="actions/action_edit_device.php?id=<?php echo $_GET["id"]?>" method="post">
        <p>Name: <input type="text" name="deviceName" placeholder="Device Name" value="<?php echo $res['devname']?>" required></p>
        <p>Manufacturer: <input type="text" name="manufacturer" placeholder="Manufacturer" value="<?php echo $res['manufacturer']?>" required></p>
        <p>Description: <input type="text" name="description" placeholder="Description" value="<?php echo $res['devdescription']?>" required></p>
        <p>SW Version:<input type="text" name="swversion" placeholder="Software Version" value="<?php echo $res['swversion']?>" required></p>
        <p>SW Artefact: <input type="text" name="swartefact" placeholder="Software Artefact" value="<?php echo $res['swartefact']?>" required></p>
        <p>IP Address: <input type="text" name="ip" placeholder="IP Address" value="<?php echo $res['ip']?>" required pattern="^([0-9]{1,3}\.){3}[0-9]{1,3}$"></p>
        <p>Status: <select name="status" required>
            <option value="working">Working</option>
            <option value="offline">Offline</option>
        </select></p>
        <input class="btn btn-full" type="submit" value="Update">
    </form>
</div> 

<?php 
} 
include('../partials/footer.php')
?>  
