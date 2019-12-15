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
<h2> Associate Category</h2>
<div class="box">

    <?php
        $id=$_GET['id'];
        global $dataB;
        $queryLocal="SELECT catid,catname FROM Categories";
        $result = $dataB->query($queryLocal);
        //while ($row = $result->fetch()){
            //echo '<a href="http://'.$RESOURCEPATH .'/devices/actions/action_associate_category.php?category='.$row['catid'].'&id='.$id.'"><p>'.$row['catname'].'</p></a>';
        //
    ?>
    <form action="actions/action_associate_category.php" method="post">
    <table>        
    <?php
        while ($row = $result->fetch()){
            //echo '<a href="http://'.$RESOURCEPATH .'/devices/actions/action_associate_category.php?category='.$row['catid'].'&id='.$id.'"><p>'.$row['catname'].'</p></a>';
            echo '<tr><td>'.$row['catname'].'</td><td><input type="checkbox" name="categories[]" value='.$row['catid'].'></td></tr>';
        }
    ?>
        <input type="hidden" name="devId" value="<?=$id?>" required>
    </table>
    <input class="btn btn-full" type="submit" value="Associate">
    </form>
    <br>
    <br>
    <a class='btn btn-lg' href="http://<?php echo $RESOURCEPATH ?>/devices/create_category.php?id=<?=$id?>">Create Category</a>
</div>

<?php 
} 
include('../partials/footer.php');
?>