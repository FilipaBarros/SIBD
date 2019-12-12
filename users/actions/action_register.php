<?php
    require_once('../../config/init.php');

    $username=$_POST['username'];
    $password=$_POST['password'];
    $email=$_POST['emailaddress'];

    function newUser($user,$pass,$mail){
        global $dataB;
        $statement=$dataB->prepare('SELECT COUNT(*) AS num FROM Users WHERE username=?');
        $statement->execute(array($user));
        $row=$statement->fetch();
        print_r($statement);

        if($row['num']==0){
            $statement = $dataB->prepare('INSERT INTO Users (username,passphrase,contact) VALUES (?,?,?)');
            $statement->execute(array($user,sha1($pass),$mail));
        
            $newUserID=$dataB->lastInsertID();
        
            $statement = $dataB->prepare('SELECT sysid FROM Systems');
            $statement->execute();
            $res=$statement->fetchAll();

            foreach($res as $row){
                $statement=$dataB->prepare('INSERT INTO UserPermissions(userid,sysid,permtypeid) VALUES (?,?,2)');
                $statement->execute(array($newUserID,$row[0]));
            }

        }
        else{
            header('Location: ../../index.php');
            
        }

        
    }

    newUser($username, $password, $email);
    header('Location: ../../index.php');
    
   // catch(PDOException $e){
   //     header('Location: register_page.php');
    //}

?>
