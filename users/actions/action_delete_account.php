<?php
     require_once('../../config/init.php');
     $password=$_POST['password'];

     global $dataB;
     $statement=$dataB->prepare("SELECT passphrase FROM Users WHERE userid=?");
     $statement->execute(array($_SESSION['userid']));

     $passhash=sha1($password);

     if($passhash==$statement->fetchColumn()){

        $statement2=$dataB->prepare("DELETE FROM Users WHERE userid=?");
        $statement2->execute(array($_SESSION['userid']));
        session_destroy();
        header('Location: ../../index.php');
     }
     else{
        header('Location: ../delete_account.php');
     }

?>