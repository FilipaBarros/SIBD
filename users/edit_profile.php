<?php include('../partials/header.php') ?> 
<?php if (isset($_SESSION['username'])) { ?> 
<h2>Profile Info</h2>
   
    <?php
    $id = $_SESSION['userid'];
    function get_table($id)
    {
        global $dataB;
        $statement = $dataB->prepare("SELECT * FROM Users WHERE userid=?");
        $statement->execute(array($id));
        $systems = $statement->fetchAll();
        return $systems;
    }
    $res = get_table($id)[0];
    //print_r($res);
    ?>
    <div class="wrapper-2">
        <div class="box table_permissions">
            <h3>Permissions Info</h3>
            <br>
            <?php
                $statement = $dataB->prepare("SELECT permtypedescription, sysid FROM UserPermissions
                JOIN PermissionTypes ON PermissionTypes.permtypeid = UserPermissions.permtypeid 
                WHERE userid=?");
                $statement->execute(array($id));
                $permissions = $statement->fetchAll();

                echo "<table>";
                echo "<tr>";
                echo "<th> System </th>";
                echo "<th> Permission </th>";
                echo "</tr>";
                foreach($permissions as $row){
                    echo "<tr><td><a class='prettylink' href='/SIBD/systems/details_system.php?id=".$row['sysid'] . "'>".$row['sysid'] . "</a></td>";
                    //echo "<tr><td>".$row['sysid']."</td>";
                    echo "<td>".$row['permtypedescription']."</td></tr>";
                }
                echo "</table>";
                ?>
        </div>
        <div class="box edit_profile">
            <h3>Edit Profile</h3>
            <div class="forms">
                <form action="actions/action_edit_profile.php" method="post">
                    <p>Username: <input type="text" name="username" placeholder="Username" value="<?php echo $res['username']?>"></p>
                    <p>Contact: <input type="email" name="contact" placeholder="Contact" value="<?php echo $res['contact']?>"></p>
                    <p>Password: <input type="password" name="password" placeholder="Password" value="<?php echo $res['passphrase']?>"></p>
                    <input type="hidden" name="id" value="<?=$id?>">
                    <input class="btn btn-full" type="submit" value="Update">
                    <br>
                    <br>
                </form>
            </div>
        </div>
    </div>        
    <h3>Advanced Options</h3>
    <br>
    <a class="btn input-btn btn-full" href="delete_account.php">Delete Account</a>
<?php 
} 
include('../partials/footer.php')
?>  