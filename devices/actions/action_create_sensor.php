<?php
    
    require_once('../../config/init.php');
    
    $name=$_POST['sensorName'];
    $code=$_POST['sensorCode'];
    $status=$_POST['sensorStatus'];
    $units=$_POST['sensorUnits'];
    $periodicity=$_POST['sensorPeriodicity'];

    $devId=$_POST['id'];    
    global $dataB;
    $statement=$dataB->prepare('INSERT INTO Components(compname,compcode,stat) VALUES (?,?,?)');
    $statement->execute(array($name,$code,$status));
    print_r($statement);

    $componentID=$dataB->lastInsertID();

    $statement=$dataB->prepare('INSERT INTO DevicesComponents(devid,compid) VALUES (?,?)');
    $statement->execute(array($devId,$componentID));
    print_r($statement);

    $statement=$dataB->prepare('INSERT INTO Sensors(units,periodicity,compname,compcode,stat) VALUES (?,?,?,?,?)');
    $statement->execute(array($units,$periodicity,$name,$code,$status));
    print_r($statement);

    header('Location: ../create_sensor.php?id='.$devId);

?>