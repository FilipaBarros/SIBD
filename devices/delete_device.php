<?php include('../partials/header.php'); ?> 

<h1>Delete Device</h1>

<?php
$id = $_GET["id"];
$statement = $dataB->prepare("SELECT * FROM Devices WHERE devid = ?");
$statement->execute(array($id));
$dev_details = $statement->fetchAll()[0];
//print_r($dev_details);
?>

<h2>
You are going to delete the device with ID: <?php echo $dev_details["devid"] ?> - Name: <?php echo $dev_details["devname"] ?>
</h2>

<a href="actions/action_delete_device.php?id=<?php echo $dev_details["devid"] ?>">Delete</a>
<a href="devices.php">Go Back</a>


<?php include('../partials/footer.php'); ?> 