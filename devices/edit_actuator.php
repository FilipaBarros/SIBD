<?php include('../partials/header.php') ?> 
<?php if (isset($_SESSION['username'])) { ?> 
<h1>Edit Actuator</h1>
<?php
        $id = htmlspecialchars($_GET["id"]);
        $sysid=$_GET["sysid"];
        $actid=$_GET["actid"];
        global $dataB;
        $statement= $dataB->prepare("SELECT permtypeid FROM UserPermissions WHERE sysid=? AND userid=?");
        $statement->execute(array($sysid,$_SESSION['userid']));
        $userPerm= $statement->fetchColumn();
        if($userPerm!=3 && $userPerm!=1){
            header('Location: http://'.$RESOURCEPATH.'/partials/500.php');
        }
        //verify actid
        $statement2 = $dataB->prepare("SELECT actid FROM Actuators WHERE actid=?");
        $statement2->execute(array($actid));
        $act_exists= $statement2->fetchColumn();
        if($actexists!=){
            header('Location: http://'.$RESOURCEPATH.'/partials/500.php');
        }
?>
