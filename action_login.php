<?php
    require_once('config/init.php');

    $username= $_POST['username'];
    $password= $_POST['password'];

    function correctLogin($user, $pass){
        $isValid = false;
        global $dataB;
        if($statement = $dataB->prepare("SELECT * FROM Users WHERE username = ? AND passphrase = ?")){
            //$statement->bindParam(":user", $user);
            $passhash = sha1($pass);
            //$statement->bindParam(":pass", $passhash);
            
            $statement->execute(array($user, $passhash));
            if(sizeof($statement->fetchAll()) > 0){
                $isValid = true;
            }
        } else {
            die("Error on query");
        }
        return $isValid;
    }
   
    if(correctLogin($username, $password) == true){

        $_SESSION['username'] = $username;
        header('Location: welcome_page.php?user='.$username);
        exit();
    }
    else{
        header('Location: login_page.php');
        exit();
    }
    
?>
