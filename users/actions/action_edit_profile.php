<?php

    require_once('../../config/init.php');

    $id=$_POST['id'];
    $username=$_POST['username'];
    $contact=$_POST['contact'];
    $pass=$_POST['password'];

    global $dataB;
    $statement = $dataB->prepare('UPDATE Users SET username=?, passphrase=?, contact=? WHERE userid=?');
    $statement->execute(array($username,sha1($pass),$contact,$id));

    header('Location: ../edit_profile.php');


?>