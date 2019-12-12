<?php include('../partials/header.php'); ?> 
<?php if (isset($_SESSION['username'])) { ?> 

<section id = "createSensor">
    <?php
        $title = "Create Sensor";
        echo "<h2>" . $title . "</h2>";
        $devId=$_GET['devId']
    ?>
    <div class="forms">
        <form action="actions/action_create_sensor.php" method="post">
            <p>Name: <input type="text" name="sensorName" placeholder="Sensor Name" required></p>
            <p>Code: <input type="number" name="sensorCode" placeholder="Sensor Code" required></p>
            <p>Status: <input type="text" name="sensorStatus" placeholder="Sensor Status" required></p>
            <p>Units Measured: <input type="text" name="sensorUnits" placeholder="Units" required></p>
            <p>Periodicity(s): <input type="number" name="sensorPeriodicity" placeholder="Seconds" required></p>
            <input type="hidden" name="devId" value="<?=$devId?>">
            <input type="submit" value="Create">
        </form>
        <a class='btn' href="create_actuator.php?devId=<?=$devId?>"><button type="button">Continue</button></a>
    </div>
</section>


<?php 
} 
include('../partials/footer.php');
?>