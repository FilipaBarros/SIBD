<?php
    require_once('../../config/init.php');
    $id = $_GET["compid"];
    $devid= $_GET["devid"];
    $statement = $dataB->prepare("DELETE FROM Components WHERE compid = ?");
    $statement->execute(array($id));

    header("Location: ../details_device.php?id=".$devid);
?>