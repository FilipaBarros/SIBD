<?php
    require_once('../../config/init.php');
    $id = $_GET["id"];
    $statement = $dataB->prepare("DELETE FROM Locals WHERE locid = ?");
    $statement->execute(array($id));

    header("Location: ../locations.php");
?>