<?php
    require_once('../../config/init.php');

    $name=$_POST['catname'];
    $description=$_POST['catdesc'];
    $devId=$_POST['devId'];
    
    global $dataB;
    $statement = $dataB->prepare('INSERT INTO Categories(catname,catdescription) VALUES (?,?)');
    $statement->execute(array($name,$description));
    print_r($statement);
   
    header('Location: http://'.$RESOURCEPATH.'/devices/associate_category.php?id='.$devId);
    
   // catch(PDOException $e){
   //     header('Location: register_page.php');
    //}

?>
