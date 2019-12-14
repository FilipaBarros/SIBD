<?php include ('../partials/header.php') ?>   
<?php if (isset($_SESSION['username'])) { ?>    
<section id="createSystem">
    <?php
        $title = "Create System";
        echo "<h2>" . $title . "</h2>";
    ?>
    <form action="actions/action_create_system.php" method="post">
        <p>Category: <input type="text" name="category" placeholder="category" required></p>
        <p>Functions: <input type="text" name="functions" placeholder="functions" required></p>
        <p>System Description: <input type="text" name="sysdescription" placeholder="****-***" required></p>
        <input type="submit" value="Create">
    </form>
</section> 
<?php 
}
include('../partials/footer.php'); ?> 