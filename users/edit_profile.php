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
        <form action="actions/action_edit_profile.php" method="post">
            <p>Username: <input type="text" name="username" placeholder="Username" value="<?php echo $res['username']?>"></p>
            <p>Contact: <input type="email" name="contact" placeholder="Contact" value="<?php echo $res['contact']?>"></p>
            <p>Password: <input type="password" name="password" placeholder="Password" value="<?php echo $res['passphrase']?>"></p>
            <input type="hidden" name="id" value="<?=$id?>">
            <input type="submit" value="Update">
        </form>
    </section> 
    <section id="userInfo">
        <h2>Permissions Info</h2>
        <?php
            $statement = $dataB->prepare("SELECT permtypedescription, sysid FROM UserPermissions JOIN PermissionTypes ON PermissionTypes.permtypeid = UserPermissions.permtypeid WHERE userid=?");
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

    <?php 
} 
include('../partials/footer.php')
?>  