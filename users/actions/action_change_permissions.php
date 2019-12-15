<?php
    require_once('../../config/init.php');

    $userId=$_POST['userId'];
    $permission=$_POST['permission'];
    $sysId=$_POST['sysId'];

    global $dataB;
    $statement = $dataB->prepare('UPDATE UserPermissions SET permtypeid=? WHERE userid=? AND sysid=?');
    $statement->execute(array($permission,$userId,$sysId));
    print_r($statement);

    header('Location: http://'.$RESOURCEPATH.'/users/users.php');


?>