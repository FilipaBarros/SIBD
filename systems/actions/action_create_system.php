<?php
    require_once('../../config/init.php');
    $category=$_POST['category'];
    $functions=$_POST['functions'];
    $sysdescription=$_POST['sysdescription'];
    
    global $dataB;
    $statement = $dataB->prepare('INSERT INTO Systems(category,functions,sysdescription) VALUES (?,?,?)');
    $statement->execute(array($category, $functions,$sysdescription));
    print_r($statement);
    $newSystem= $dataB->lastInsertId();

    $statement=$dataB->prepare('SELECT userid FROM Users');
    $statement->execute();
    print_r($statement);
    $res=$statement->fetchAll();

    foreach($res as $row){
        $statement=$dataB->prepare('INSERT INTO UserPermissions(userid,sysid,permtypeid) VALUES (?,?,2)');
        $statement->execute(array($row[0], $newSystem));
    }


    $statement = $dataB->prepare('UPDATE UserPermissions SET permtypeid=? WHERE userid=?');
    $statement->execute(array(3,$_SESSION['userid']));
   
    header('Location: ../systems.php');
    
   // catch(PDOException $e){
   //     header('Location: register_page.php');
    //}
?>