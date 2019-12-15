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
<section id = "createSensor">
    <?php
        $title = "Create Sensor";
        echo "<h2>" . $title . "</h2>";
        $id=$_GET['id']
    ?>
    <div class="box">
        <div class="forms">
        <form action="actions/action_create_sensor.php" method="post">
            <p>Name: <input type="text" name="sensorName" placeholder="Sensor Name" required></p>
            <p>Code: <input type="number" name="sensorCode" placeholder="Sensor Code" required></p>
            <p>Status: <select name="sensorStatus" required>
                    <option value="working">Working</option>
                    <option value="offline">Offline</option>
            </select></p>
            <p>Units Measured: <input type="text" name="sensorUnits" placeholder="Units" required></p>
            <p>Periodicity(s): <input type="number" name="sensorPeriodicity" placeholder="Seconds" required></p>
            <input type="hidden" name="id" value="<?=$id?>">
            <input class="btn btn-full" type="submit" value="Create"><br>     
            <a class="btn btn-full btn-full-form" href="http://<?php echo $RESOURCEPATH ?>/devices/create_actuator.php?id=<?=$id?>">Continue</a>
        </form>
        </div>
    </div>
</section>


<?php 
} 
include('../partials/footer.php');
?>