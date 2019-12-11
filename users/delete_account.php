<?php include('../partials/header.php') ?> 
<?php if (isset($_SESSION['username'])) { ?> 
<h1>Delete Account</h1>
<form action="actions/action_delete_account.php" method="post">
    <p>Confirm your password: <input type="password" name="password" placeholder="Password" required></p>
    <input type="submit" value="Confirm">
</form>



<?php 
} 
include('../partials/footer.php')
?> 