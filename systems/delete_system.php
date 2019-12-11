<?php include('../partials/header.php'); ?> 

<h1>Delete System</h1>

<?php
$id = $_GET["id"];
$statement= $dataB->prepare("SELECT permtypeid FROM UserPermissions WHERE sysid=? AND userid=?");
$statement->execute(array($id,$_SESSION['userid']));
$userPerm= $statement->fetchColumn();

if($userPerm!=3){
    header('Location: ../partials/500.php');
}
$statement = $dataB->prepare("SELECT * FROM Systems WHERE sysid = ?");
$statement->execute(array($id));
$dev_details = $statement->fetchAll()[0];
//print_r($dev_details);
?>

<h2>
You are going to delete the system with ID: <?php echo $dev_details["sysid"] ?> - System Description: <?php echo $dev_details["sysdescription"] ?> 
</h2>

<a class='btn' href="actions/action_delete_system.php?id=<?php echo $dev_details["sysid"] ?>">Delete</a>
<a class='btn' href="systems.php">Go Back</a>


<?php include('../partials/footer.php'); ?> 