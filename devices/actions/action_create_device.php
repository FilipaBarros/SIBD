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

    function newDevice($deviceName,$manufacturer,$description,$swversion,$swartefact,$ip,$statu,$local){
        global $dataB;
        $statement = $dataB->prepare('INSERT INTO Devices(devname,manufacturer,devdescription,swversion,swartefact,ip,stat,locid) VALUES (?,?,?,?,?,?,?,?)');
        $statement->execute(array($deviceName,$manufacturer,$description,$swversion,$swartefact,$ip,$statu,$local));
        print_r($statement);
    }

    newDevice($deviceName,$manufacturer,$description,$swversion,$swartefact,$ip,$statu,$local);
    header('Location: ../../welcome_page.php');
    
   // catch(PDOException $e){
   //     header('Location: register_page.php');
    //}

?>