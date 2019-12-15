<?php
    require_once('../../config/init.php');
    $id = $_GET["compid"];
    $devid= $_GET["devid"];
    $statement = $dataB->prepare("SELECT stat FROM Components WHERE compid = ?");
    $statement->execute(array($id));
    $res = $statement->fetchAll();
    print_r($res);
    if($res[0]['stat'] == "working"){
        $statement = $dataB->prepare("UPDATE Components SET stat = ? WHERE compid = ?");
        $statement->execute(array("offline", $id));
        $statement = $dataB->prepare("UPDATE Actuators SET stat = ? WHERE actid = ?");
        $statement->execute(array("offline", $id));
        $statement = $dataB->prepare("UPDATE Sensors SET stat = ? WHERE sensid = ?");
        $statement->execute(array("offline", $id));
    } else {
        $statement = $dataB->prepare("UPDATE Components SET stat = ? WHERE compid = ?");
        $statement->execute(array("working", $id));
        $statement = $dataB->prepare("UPDATE Actuators SET stat = ? WHERE actid = ?");
        $statement->execute(array("working", $id));
        $statement = $dataB->prepare("UPDATE Sensors SET stat = ? WHERE sensid = ?");
        $statement->execute(array("working", $id));
    }
    /*$status = $current = "offline":  
    $statement = $dataB->prepare("UPDATE Components SET stat = ? WHERE compid = ?");
    $statement->execute(array("offline", $id));*/

    header("Location: ../details_device.php?id=".$devid);
?>