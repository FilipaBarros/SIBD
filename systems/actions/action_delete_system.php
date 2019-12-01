<?php
    require_once('../../config/init.php');
    $id = $_GET["id"];
    $statement = $dataB->prepare("DELETE FROM Systems WHERE sysid = ?");
    $statement->execute(array($id));

    header("Location: ../systems.php");
?>