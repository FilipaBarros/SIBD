<?php
    require_once('../../config/init.php');

    $deviceName=$_POST['deviceName'];
    $manufacturer=$_POST['manufacturer'];
    $description=$_POST['description'];
    $swversion=$_POST['swversion'];
    $swartefact=$_POST['swartefact'];
    $ip=$_POST['ip'];
    $status=$_POST['status'];
    $local=$_POST['local'];
    $sysId=$_POST['system'];

    global $dataB;
    $statement = $dataB->prepare('INSERT INTO Devices(devname,manufacturer,devdescription,swversion,swartefact,ip,stat,locid,sysid) VALUES (?,?,?,?,?,?,?,?,?)');
    $statement->execute(array($deviceName,$manufacturer,$description,$swversion,$swartefact,$ip,$status,$local,$sysId));
    print_r($statement);

    header('Location: ../create_sensor.php?id='.$dataB->lastInsertId());
    
   

?>