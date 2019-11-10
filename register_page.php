<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <title>DLS Register</title>
        </head>
        <body>    
        <section id="register">
                <?php
                    $title = "Register";
                    echo "<h2>".$title."</h2>";
                ?>
                <form action="action_register.php" method="post">
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <input type="email" name="emailaddress" placeholder="Email" required>
                    <input type="submit" value="Register">
                </form>
                
            </section> 
        </body>
    </html>