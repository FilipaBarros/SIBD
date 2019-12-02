<?php include('../partials/header.php'); ?> 
<?php if (isset($_SESSION['username'])) { ?> 

<section id="categories">

    <?php
        $devId=$_GET['devId'];
        global $dataB;
        $queryLocal="SELECT catid,catname FROM Categories";
        $result = $dataB->query($queryLocal);
        while ($row = $result->fetch()){
            echo '<a href="actions/action_associate_category.php?category='.$row['catid'].'&devId='.$devId.'"><p>'.$row['catname'].'</p></a>';
        }
    ?>

</section>
<a href="devices.php"><button type="button">Finish</button></a>

<?php 
} 
include('../partials/footer.php');
?>