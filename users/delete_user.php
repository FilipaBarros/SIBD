<?php include('../partials/header.php'); ?> 

<h1>Delete User</h1>

<?php
global $dataB;
$id = $_GET["id"];
$sysId=$_GET['sys'];
$statement= $dataB->prepare("SELECT permtypeid FROM UserPermissions WHERE sysid=? AND userid=?");
$statement->execute(array($sysId,$_SESSION['userid']));
$userPerm= $statement->fetchColumn();

if($userPerm!=3){
    header('Location: ../partials/500.php');
}

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