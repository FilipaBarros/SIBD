<?php
    require_once('config/init.php');

    $category=$_POST['category'];
    $functions=$_POST['functions'];
    $sysdescription=$_POST['sysdescription'];

    
    global $dataB;
    $statement = $dataB->prepare('INSERT INTO Systems(category,functions,sysdescription) VALUES (?,?,?)');
    $statement->execute(array($category, $functions,$sysdescription));
    print_r($statement);
   
    header('Location: ../systems.php');
    
   // catch(PDOException $e){
   //     header('Location: register_page.php');
    //}

?>
