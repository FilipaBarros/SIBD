<?php include('../partials/header.php') ?> 
<?php if (isset($_SESSION['username'])) { ?> 
    <h1>Change Permissions</h1>
    <?php 
        $userId=$_GET['id'];
        $sysId=$_GET['sys'];
    ?>
    <section id="changePermissions">
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
            <input type="submit" value="Change">
        </form>
    </section>


<?php 
    } 
    include('../partials/footer.php')
?>  