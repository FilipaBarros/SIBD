<?php include ('./partials/header.php') ?>  
<?php if (isset($_SESSION['username'])) {
    header("Location: welcome_page.php");
}
?>
<h1 class="maintitle">Device Lookup Service</h1>
<div class="wrapperindex">
    <div class="box login">
    <section id="login">
        <h2>Login</h2>
        <br>
         <?php if(isset($_GET["error"])){
            echo "<p> > Error in username or password.</p>";
        } ?>
       
        <form action="./users/actions/action_login.php" method="post">
            <p>Username: <input type="text" name="username" placeholder="Username" required></p>
            <p>Password: <input type="password" name="password" placeholder="Password" required></p>
            <input class="btn btn-full" type="submit" value="Login">
        </form>
    </section>
    </div>
    <div class="box register">
    <section id="register">
        <h2>Register</h2>
        <br>
        <form action="./users/actions/action_register.php" method="post">
            <p>Username: <input type="text" name="username" placeholder="Username" required></p>
            <p>Password: <input type="password" name="password" placeholder="Password" required></p>
            <p>Email: <input type="email" name="emailaddress" placeholder="Email" required></p>
            <input class="btn btn-full" type="submit" value="Register">
        </form>    

    </section> 
    </div>
<?php include ('./partials/footer.php') ?>   