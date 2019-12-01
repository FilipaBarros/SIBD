<?php
    require_once('../../config/init.php');
    $id = $_GET["id"];
    $statement = $dataB->prepare("DELETE FROM Users WHERE userid = ?");
    $statement->execute(array($id));

    header("Location: ../users.php");
?>