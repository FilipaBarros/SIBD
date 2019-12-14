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

<section id="categories">

    <?php
        $id=$_GET['id'];
        global $dataB;
        $queryLocal="SELECT catid,catname FROM Categories";
        $result = $dataB->query($queryLocal);
        while ($row = $result->fetch()){
            echo '<a href="actions/action_associate_category.php?category='.$row['catid'].'&id='.$id.'"><p>'.$row['catname'].'</p></a>';
        }
    ?>

</section>
<a class='btn' href="devices.php"><button type="button">Finish</button></a>

<?php 
} 
include('../partials/footer.php');
?>