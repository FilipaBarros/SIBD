<?php
    require_once('../../config/init.php');

    $id = $_GET["id"];
    $category=$_POST['category'];
    $functions=$_POST['functions'];
    $sysdescription=$_POST['sysdescription'];

   
    global $dataB;
    $statement = $dataB->prepare('UPDATE Systems SET category =?, functions=?, sysdescription=? WHERE sysid=?');
    $statement->execute(array($category,$functions,$sysdescription,$id));
  
    header('Location: ../systems.php');
?>