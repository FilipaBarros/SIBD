<?php include ('../partials/header.php') ?>       
<section id="login">
    <?php
        $title = "Login";
        echo "<h2>".$title."</h2>";
    ?>
    <div class="forms">
        <form action="actions/action_login.php" method="post">
            <p>Username: <input type="text" name="username" placeholder="Username" required></p>
            <p>Password: <input type="password" name="password" placeholder="Password" required></p>
            <input type="submit" value="Login">
        </form>
    </div>
    
</section>
<?php include ('../partials/footer.php') ?>   