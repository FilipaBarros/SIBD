<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <title>DLS Login</title>
        </head>
        <body>    
            <section id="login">
                <?php
                    $title = "Login";
                    echo "<h2>".$title."</h2>";
                ?>
                <form action="action_login.php" method="post">
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <input type="submit" value="Login">
                </form>
                
            </section>    
        </body>
    </html>