<?php include('../partials/header.php'); ?> 

<h1>Delete Location</h1>

<?php
$id = $_GET["id"];
$statement = $dataB->prepare("SELECT * FROM Systems WHERE sysid = ?");
$statement->execute(array($id));
$dev_details = $statement->fetchAll()[0];
//print_r($dev_details);
?>

<h2>
You are going to delete the system with ID: <?php echo $dev_details["sysid"] ?> - System Description: <?php echo $dev_details["sysdescription"] ?> 
</h2>

<a href="actions/action_delete_system.php?id=<?php echo $dev_details["sysid"] ?>">Delete</a>
<a href="systems.php">Go Back</a>


<?php include('../partials/footer.php'); ?> 