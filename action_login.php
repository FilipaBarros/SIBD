<?php
    require_once('config/init.php');

    $username= $_POST['username'];
    $password= $_POST['password'];

    function correctLogin($user, $pass){
        global $dataB;
        try{
            $statement = $dataB->prepare("SELECT * FROM Users WHERE username = ? AND passphrase = ?");
            $statement->bind_param("ss", $user, $pass);
            $statement->execute();
            $statement->fetch()!==false;
        }  catch (Exception $err) {
            echo $err;
        }
    }

    if(correctLogin($username, $password)){
        $_SESSION['username'] = $username;
        header('Location: welcomePage.php');
    }
    else{
        header('Location: login_page.php');
    }
    
?>