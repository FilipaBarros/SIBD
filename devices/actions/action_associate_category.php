<?php
    
    require_once('../../config/init.php');

    $category=$_GET['category'];
    $devId=$_GET['devId'];

    global $dataB;
    $statement=$dataB->prepare('INSERT INTO DevicesCategories(devid,catid) VALUES (?,?)');
    $statement->execute(array($devId,$category));
    print_r($statement);

    header('Location: ../associate_category.php?devId='.$devId);





?>