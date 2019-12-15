<?php
    require_once('../../config/init.php');
    $id = $_GET["id"];
    $statement = $dataB->prepare("DELETE FROM Devices WHERE devid = ?");
    $statement->execute(array($id));

    $statement = $dataB->prepare("DELETE FROM DevicesComponents WHERE devid = ?");
    $statement->execute(array($id));

    header("Location: ../devices.php");
?>