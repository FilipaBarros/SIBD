<?php

    require_once('../../config/init.php');

    $id=$_POST['id'];
    $username=$_POST['username'];
    $contact=$_POST['contact'];
    $pass=$_POST['password'];

    global $dataB;

    $statement=$dataB->prepare('SELECT COUNT(*) AS num FROM Users WHERE username=?');
    $statement->execute(array($username));
    $row=$statement->fetch();
    print_r($statement);

    if($row['num']==0){
        $statement = $dataB->prepare('UPDATE Users SET username=?, passphrase=?, contact=? WHERE userid=?');
        $statement->execute(array($username,sha1($pass),$contact,$id));
    }
    else{
        header('Location: ../edit_profile.php');
    }

    header('Location: ../edit_profile.php');


?>