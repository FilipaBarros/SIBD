<?php
    require_once('../../config/init.php');

    $username=$_POST['username'];
    $password=$_POST['password'];
    $email=$_POST['emailaddress'];

    function newUser($user,$pass,$mail){
        global $dataB;
        $statement = $dataB->prepare('INSERT INTO Users (username,passphrase,contact) VALUES (?,?,?)');
        $statement->execute(array($user,sha1($pass),$mail));
        
        $newUserID=$dataB->lastInsertID();
        
        $statement = $dataB->query("SELECT COUNT(*) FROM Systems");
        $numSystems = $statement->fetchColumn();

        for($i=1;$i<=$numSystems;$i++){
            $statement = $dataB->prepare("INSERT INTO UserPermissions(userid,sysid,permtypeid) VALUES (?,?,?)");
            $statement->execute(array($newUserID,$i,2));
            print_r($statement);
        }

    }

    newUser($username, $password, $email);
    header('Location: ../login_page.php');
    
   // catch(PDOException $e){
   //     header('Location: register_page.php');
    //}

?>
