<?php include ('../partials/header.php') ?>    
<section id="createLocation">
    <?php
        global $dataB;
        $statement=$dataB->prepare("SELECT permtypeid FROM UserPermissions WHERE userid=?");
        $statement->execute(array($_SESSION['userid']));
        $userPerm=$statement->fetchAll();
        $check=0;
        foreach($userPerm as $tryPls) {
            if($tryPls[0]==3){
                $check=1;
            }
        }
        if($check!=1){
            header("Location: ../partials/500.php");
        }
        $title = "Create Local";
        echo "<h2>" . $title . "</h2>";
    ?>
    <div class="forms">
        <form action="actions/action_create_location.php" method="post">
            <p>Country: <input type="text" name="country" placeholder="Country" required></p>
            <p>City: <input type="text" name="city" placeholder="City" required></p>
            <p>ZIP: <input type="text" name="zip" placeholder="****-***" pattern="[0-9]*" required></p>
            <p>Street: <input type="text" name="street" placeholder="Street" required></p>
            <p>Building: <input type="text" name="building" placeholder="Building" required></p>
            <p>Floor: <input type="number" name="floor" placeholder="Floor" required></p>
            <p>Room: <input type="text" name="room" placeholder="Room" required></p>
            <input type="submit" value="Create">
        </form>
    <div>
</section> 
<?php include('../partials/footer.php'); ?> 