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
<h2> Create Category</h2>
<div class="box forms">

    <form action="actions/action_create_category.php" method="post">
        <p>Category: <input type="text" name="catname" placeholder="Name" required></p>
        <p>Description: <input type="text" name="catdesc" placeholder="Description" required></p>
        <input type="hidden" name="devId" value=<?=$_GET['id']?> required>
        <input class="btn btn-full" type="submit" value="Create">
    </form>


</div>

<?php 
} 
include('../partials/footer.php');
?>