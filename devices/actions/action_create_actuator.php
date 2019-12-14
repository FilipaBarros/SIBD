<?php
    
    require_once('../../config/init.php');
    
    $name=$_POST['actuatorName'];
    $code=$_POST['actuatorCode'];
    $status=$_POST['actuatorStatus'];
    $func=$_POST['function'];

    $devId=$_POST['id'];    
    global $dataB;
    $statement=$dataB->prepare('INSERT INTO Components(compname,compcode,stat) VALUES (?,?,?)');
    $statement->execute(array($name,$code,$status));
    print_r($statement);

    $componentID=$dataB->lastInsertID();

    $statement=$dataB->prepare('INSERT INTO DevicesComponents(devid,compid) VALUES (?,?)');
    $statement->execute(array($devId,$componentID));
    print_r($statement);

    $statement=$dataB->prepare('INSERT INTO Actuators(func,compname,compcode,stat) VALUES (?,?,?,?)');
    $statement->execute(array($func,$name,$code,$status));
    print_r($statement);

    header('Location: ../create_actuator.php?id='.$devId);

?>