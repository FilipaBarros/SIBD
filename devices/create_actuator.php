<?php include('../partials/header.php'); ?> 
<?php if (isset($_SESSION['username'])) { ?> 
<?php if ($_GET['id']==''){
    header ("Location: ../partials/404.php");
    }
    global $dataB;
    $statement = $dataB->prepare("SELECT devid FROM Devices WHERE devid=?");
    $statement->execute(array($_GET['id']));
    $putId= $statement->fetchColumn();
    if($putId==FALSE){
        header ("Location: ../partials/404.php");
    }      
    
?>


<section id = "createActuator">
    <?php
        $title = "Create Actuator";
        echo "<h2>" . $title . "</h2>";
        $id=$_GET['id']
    ?>
    <div class="box forms">
        <form action="actions/action_create_actuator.php" method="post">
            <p>Name: <input type="text" name="actuatorName" placeholder="Actuator Name" required></p>
            <p>Code: <input type="number" name="actuatorCode" placeholder="Actuator Code" required></p>
            <p>Status: <input type="text" name="actuatorStatus" placeholder="Actuator Status" required></p>
            <p>Function: <input type="text" name="function" placeholder="Function" required></p>
            <input type="hidden" name="id" value="<?=$id?>">
            <input class="btn btn-full"type="submit" value="Create">
            <a class="btn btn-full btn-full-form" href="associate_category.php?id=<?=$id?>">Continue</a>
        </form>
    </div>
</section>


<?php 
} 
include('../partials/footer.php');
?>