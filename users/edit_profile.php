<?php include('../partials/header.php') ?> 
<?php if (isset($_SESSION['username'])) { ?> 
<h1>Edit Profile</h1>
    <section id="editProfile">
        <?php
        $id = $_SESSION['userid'];
        function get_table($id)
        {
            global $dataB;
            $statement = $dataB->prepare("SELECT * FROM Users WHERE userid=?");
            $statement->execute(array($id));
            $locations = $statement->fetchAll();
            return $locations;
        }
        $res = get_table($id)[0];
        //print_r($res);
        ?>
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

    </section> 
    <section id="userInfo">
        <h2>Permissions Info</h2>
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
                echo "<tr><td>".$row['sysid']."</td>";
                echo "<td>".$row['permtypedescription']."</td></tr>";
            }
            echo "</table>";

        ?>

    </section>
    <h2>Advanced Options</h2>
    <br>
    <a class="btn input-btn btn-full" href="delete_account.php">Delete Account</a>
<?php 
} 
include('../partials/footer.php')
?>  