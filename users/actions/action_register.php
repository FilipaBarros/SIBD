<?php
    require_once('../../config/init.php');

    $username=$_POST['username'];
    $password=$_POST['password'];
    $email=$_POST['emailaddress'];

    
    global $dataB;
    $statement=$dataB->prepare('SELECT COUNT(*) AS num FROM Users WHERE username=?');
    $statement->execute(array($username));
    $check=$statement->fetchColumn();

    if($check==0){
        $statement = $dataB->prepare('INSERT INTO Users (username,passphrase,contact) VALUES (?,?,?)');
        $statement->execute(array($username,sha1($password),$email));
        
        $newUserID=$dataB->lastInsertID();
        
        $statement = $dataB->prepare('SELECT sysid FROM Systems');
        $statement->execute();
        $res=$statement->fetchAll();

        foreach($res as $row){
            $statement=$dataB->prepare('INSERT INTO UserPermissions(userid,sysid,permtypeid) VALUES (?,?,2)');
            $statement->execute(array($newUserID,$row[0]));
        }
        header('Location: http://'.$RESOURCEPATH.'/index.php');

    }
    if($check>0){
        $_SESSION['usernameError']="Username Taken!";
        header('Location: http://'.$RESOURCEPATH.'/index.php');
            
    }

        
    
    
   // catch(PDOException $e){
   //     header('Location: register_page.php');
    //}

?>
