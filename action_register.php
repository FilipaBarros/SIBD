<?php
    require_once('config/init.php');

    $username=$_POST['username'];
    $password=$_POST['password'];
    $email=$_POST['emailaddress'];

    function newUser($user,$pass,$mail){
        global $dataB;
        $statement = $dataB->prepare('INSERT INTO Users (username,passphrase,contact) VALUES (?,?,?)');
        $statement->execute(array($user,sha1($pass),$mail));
        print_r($statement);
    }

    newUser($username, $password, $email);
    header('Location: login_page.php');
    
   // catch(PDOException $e){
   //     header('Location: register_page.php');
    //}

?>
