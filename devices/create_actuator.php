<?php include('../partials/header.php'); ?> 
<?php if (isset($_SESSION['username'])) { ?> 

<section id = "createActuator">
    <?php
        $title = "Create Actuator";
        echo "<h2>" . $title . "</h2>";
        $devId=$_GET['devId']
    ?>
    <form action="actions/action_create_actuator.php" method="post">
        <p>Name: <input type="text" name="actuatorName" placeholder="Actuator Name" required></p>
        <p>Code: <input type="number" name="actuatorCode" placeholder="Actuator Code" required></p>
        <p>Status: <input type="text" name="actuatorStatus" placeholder="Actuator Status" required></p>
        <p>Function: <input type="text" name="function" placeholder="Function" required></p>
        <input type="hidden" name="devId" value="<?=$devId?>">
        <input type="submit" value="Create">
    </form>
    <a href="associate_category.php?devId=<?=$devId?>"><button type="button">Continue</button></a>

</section>


<?php 
} 
include('../partials/footer.php');
?>