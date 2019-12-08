<?php
    require_once('../../config/init.php');

    $username= $_POST['username'];
    $password= $_POST['password'];

    $userid = 0;

    function correctLogin($user, $pass){
        $isValid = false;
        global $dataB;
        if($statement = $dataB->prepare("SELECT * FROM Users WHERE username = ? AND passphrase = ?")){
            //$statement->bindParam(":user", $user);
            $passhash = sha1($pass);
            //$statement->bindParam(":pass", $passhash);
            
            $statement->execute(array($user, $passhash));

            $res = $statement->fetchAll();
            global $userid;
            $userid = $res[0]["userid"];
            if(sizeof($res) > 0){
                $isValid = true;
            }
        } else {
            die("Error on query");
        }
        return $isValid;
    }
   
    if(correctLogin($username, $password) == true){

        $_SESSION['username'] = $username;
        $statement = $dataB->prepare("SELECT * from UserPermissions 
        INNER JOIN PermissionTypes on UserPermissions.permtypeid = PermissionTypes.permtypeid 
        INNER JOIN Users on Users.userid = UserPermissions.userid WHERE Users.userid  = ?");
        global $userid;
        $_SESSION['userid']=$userid;
        $statement->execute(array($userid));
        $res = $statement->fetchAll();
        $_SESSION['systems'] = array();
        foreach ($res as $row) {
            print_r($row);
            $_SESSION['systems'][$row["sysid"]] = $row["permtypedescription"];
        }
        header('Location: ../../welcome_page.php?user='.$username);
        //exit();
    }
    else{
        $error = "password";
        header('Location: ../../index.php?error='.$error);
        exit();
    }
    
?>
