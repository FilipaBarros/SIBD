<?php include('../partials/header.php') ?> 
<?php if (isset($_SESSION['username'])) { ?> 
<h1>Edit Device</h1>
<section id="editLocation">
        <?php
        $id = htmlspecialchars($_GET["id"]);
        function get_table($id)
        {
            global $dataB;
            $statement = $dataB->prepare("SELECT * FROM Locals WHERE locid=?");
            $statement->execute(array($id));
            $locations = $statement->fetchAll();
            return $locations;
        }
        $res = get_table($id)[0];
        //print_r($res);
        ?>
        <form action="actions/action_edit_location.php?id=<?php echo $_GET["id"]?>" method="post">
            <p>Country: <input type="text" name="Country" placeholder="Country" value="<?php echo $res['country']?>" required></p>
            <p>City: <input type="text" name="city" placeholder="city" value="<?php echo $res['city']?>" required></p>
            <p>Zip: <input type="text" name="zip" placeholder="zip" value="<?php echo $res['zip']?>" required></p>
            <p>Street:<input type="text" name="street" placeholder="street" value="<?php echo $res['street']?>" required></p>
            <p>Building: <input type="text" name="building" placeholder="building" value="<?php echo $res['building']?>" required></p>
            <p>Floordesc: <input type="text" name="floordesc" placeholder="floordesc" value="<?php echo $res['floordesc']?>"required></p>
            <p>Room: <input type="text" name="room" placeholder="room" value="<?php echo $res['room']?>" required></p>
            
            <input type="submit" value="Update">
        </form>
    </section> 
    <?php 
} 
include('../partials/footer.php')
?>  
