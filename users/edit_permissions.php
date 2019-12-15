<?php include('../partials/header.php') ?> 
<?php if (isset($_SESSION['username'])) { ?> 
    <?php if ($_GET['id']==''){
    header ("Location: ../partials/404.php");
    }
    global $dataB;
    $statement = $dataB->prepare("SELECT userid FROM Users WHERE userid=?");
    $statement->execute(array($_GET['id']));
    $putId= $statement->fetchColumn();
    if($putId==FALSE){
        header ("Location: ../partials/404.php");
    }      
    
?>

<?php if ($_GET['id']==''){
    header ("Location: ../partials/404.php");
    }
    global $dataB;
    $statement = $dataB->prepare("SELECT sysid FROM Systems WHERE sysid=?");
    $statement->execute(array($_GET['id']));
    $putId= $statement->fetchColumn();
    if($putId==FALSE){
        header ("Location: ../partials/404.php");
    }      
    
?>
    <h1>Change Permissions</h1>
    <?php 
        $userId=$_GET['id'];
        $sysId=$_GET['sys'];
    ?>
    <section id="changePermissions">
        <?php 
            global $dataB;
            $statement= $dataB->prepare("SELECT permtypeid FROM UserPermissions WHERE sysid=? AND userid=?");
            $statement->execute(array($sysId,$_SESSION['userid']));
            $userPerm= $statement->fetchColumn();

            if($userPerm!=3){
                header('Location: http://'.$RESOURCEPATH.'/partials/500.php');
            }

        ?>
        <div class="box forms">
            <form action="actions/action_change_permissions.php" method="post">
            <p>Change to: <select name="permission" required>
                <?php
                
                    global $dataB;
                    $queryLocal = "SELECT permtypeid, permtypedescription FROM PermissionTypes";
                    $result = $dataB->query($queryLocal);
                    while($row = $result->fetch()) {
                        echo "<option value='".$row['permtypeid']."'>".$row['permtypedescription']."</option>";

                    }


                ?>
                </select></p>
                <input type="hidden" name="userId" value="<?=$userId?>">
                <input type="hidden" name="sysId" value="<?=$sysId?>">
                <input class="btn btn-full" type="submit" value="Change">
            </form>
        </div>
    </section>


<?php 
    } 
    include('../partials/footer.php')
?>  