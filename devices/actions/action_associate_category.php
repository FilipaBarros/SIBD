<?php
    
    require_once('../../config/init.php');

    $category=$_POST['categories'];
    $devId=$_POST['devId'];

    global $dataB;
    foreach($category as $res){
        $statement=$dataB->prepare('INSERT INTO DevicesCategories(devid,catid) VALUES (?,?)');
        $statement->execute(array($devId,$res));
        print_r($statement);
    }
    

    header('Location: http://'.$RESOURCEPATH.'/devices/details_device.php?id='.$devId);





?>