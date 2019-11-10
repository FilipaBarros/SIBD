<?php
    require_once('config/init');

    $username=$_POST['username'];
    $password=$_POST['password'];
    $email=$_POST['email'];

    function newUser($user,$pass,$mail){
        global $dataB;
        $statement = $dataB->prepare('INSERT INTO Users VALUES(?,?,?)');
        $statement->execute(array($user,sha1($pass),$mail));
    }

    try {
        newUser($username, $password, $email);
        header('Location: login_page.php');
    }
    catch(PDOException $e){
        header('Location: register_page.php');
    }

?>