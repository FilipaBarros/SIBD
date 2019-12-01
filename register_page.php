<?php
    require_once('config/init.php');
?>


<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <title>DLS Register</title>
        </head>
        <body>  
        <header>
        <?php include ('header.php') ?>     
        <?php if (isset($_SESSION['username'])) { ?> 
        <section id="register">
                <?php
                    $title = "Register";
                    echo "<h2>".$title."</h2>";
                ?>
                <form action="action_register.php" method="post">
                    <p>Username: <input type="text" name="username" placeholder="Username" required></p>
                    <p>Password: <input type="password" name="password" placeholder="Password" required></p>
                    <p>&nbsp &nbsp &nbsp  Email: <input type="email" name="emailaddress" placeholder="Email" required></p>
                    <input type="submit" value="Register">
                </form>
                
            </section> 
            <?php } ?>
        </body>
    </html>