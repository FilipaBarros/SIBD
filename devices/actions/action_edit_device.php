<?php
    require_once('../../config/init.php');

    $id = $_GET["id"];
    $deviceName=$_POST['deviceName'];
    $manufacturer=$_POST['manufacturer'];
    $description=$_POST['description'];
    $swversion=$_POST['swversion'];
    $swartefact=$_POST['swartefact'];
    $ip=$_POST['ip'];
    $status=$_POST['status'];

   
    global $dataB;
    $statement = $dataB->prepare('UPDATE Devices SET devname =?, manufacturer=?, devdescription=?, swversion=?, swartefact=?, ip=?, stat=? WHERE devid=?');
    $statement->execute(array($deviceName,$manufacturer,$description,$swversion,$swartefact,$ip,$status,$id));
  
    header('Location: http://'.$RESOURCEPATH.'/devices/devices.php');
?>
