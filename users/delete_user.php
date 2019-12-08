<?php include('../partials/header.php'); ?> 

<h1>Delete User</h1>

<?php
$id = $_GET["id"];
$statement = $dataB->prepare("SELECT * FROM Users WHERE userid = ?");
$statement->execute(array($id));
$user_details = $statement->fetchAll()[0];
//print_r($dev_details);
?>

<h2>
You are going to delete the user with ID: <?php echo $user_details["userid"] ?> - Name: <?php echo $user_details["username"] ?>
</h2>

<a href="actions/action_delete_user.php?id=<?php echo $user_details["userid"] ?>">Delete</a>
<a href="devices.php">Go Back</a>


<?php include('../partials/footer.php'); ?> 