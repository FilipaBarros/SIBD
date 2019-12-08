<?php include('../partials/header.php') ?> 
<?php if (isset($_SESSION['username'])) { ?>    
<h1>Edit Device</h1>
<section id="editSystem">
        <?php
        $id = htmlspecialchars($_GET["id"]);
        global $dataB;
        $statement= $dataB->prepare("SELECT permtypeid FROM UserPermissions WHERE sysid=? AND userid=?");
        $statement->execute(array($id,$_SESSION['userid']));
        $userPerm= $statement->fetchColumn();

        if($userPerm!=3){
            header('Location: ../partials/500.php');
        }
        function get_table($id)
        {
            global $dataB;
            $statement = $dataB->prepare("SELECT * FROM Systems WHERE sysid=?");
            $statement->execute(array($id));
            $locations = $statement->fetchAll();
            return $locations;
        }
        $res = get_table($id)[0];
        //print_r($res);
        ?>
        <form action="actions/action_edit_system.php?id=<?php echo $_GET["id"]?>" method="post">
            <p>Category: <input type="text" name="category" placeholder="category" value="<?php echo $res['category']?>" required></p>
            <p>Functions: <input type="text" name="functions" placeholder="functions" value="<?php echo $res['functions']?>" required></p>
            <p>System Description: <input type="text" name="sysdescription" placeholder="sysdescription" value="<?php echo $res['sysdescription']?>" required></p>

            <input type="submit" value="Update">
        </form>
    </section> 
    <?php 
} 
include('../partials/footer.php')
?>  