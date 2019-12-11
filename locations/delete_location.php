<?php include('../partials/header.php'); ?> 

<h1>Delete Location</h1>

<?php
$id = $_GET["id"];
$statement = $dataB->prepare("SELECT * FROM Locals WHERE locid = ?");
$statement->execute(array($id));
$dev_details = $statement->fetchAll()[0];
//print_r($dev_details);
?>

<h2>
You are going to delete the location with ID: <?php echo $dev_details["locid"] ?> - Country: <?php echo $dev_details["country"] ?> - city: <?php echo $dev_details["city"] ?> - Zip: <?php echo $dev_details["zip"] ?> - Street: <?php echo $dev_details["street"] ?> - Building: <?php echo $dev_details["building"] ?> - Floordesc: <?php echo $dev_details["floordesc"] ?> - Room: <?php echo $dev_details["room"] ?> 
</h2>

<a class='btn' href="actions/action_delete_location.php?id=<?php echo $dev_details["locid"] ?>">Delete</a>
<a class='btn' href="locations.php">Go Back</a>


<?php include('../partials/footer.php'); ?> 