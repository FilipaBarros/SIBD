<?php
    require_once('../../config/init.php');
    $id = $_GET["id"];
    $statement = $dataB->prepare("DELETE FROM Devices WHERE devid = ?");
    $statement->execute(array($id));

    $allcompids = array();
    global $dataB;
    $statement = $dataB->prepare("SELECT DevicesComponents.devid, DevicesComponents.compid, compname, compcode, stat 
                                    FROM DevicesComponents JOIN Components on DevicesComponents.compid = Components.compid 
                                    WHERE DevicesComponents.devid = ?");
    $statement->execute(array($device_id));
    $components = $statement->fetchAll();
    foreach($components as $row){
        $statement = $dataB->prepare("DELETE FROM Components WHERE compid = ?");
        $statement->execute(array($row["compid"]));
    }
    
    $statement = $dataB->prepare("DELETE FROM DevicesComponents WHERE devid = ?");
    $statement->execute(array($id));

    header("Location: ../devices.php");
?>