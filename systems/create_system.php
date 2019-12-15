<?php include ('../partials/header.php') ?>   
<?php if (isset($_SESSION['username'])) { ?>    
<section id="createSystem">
    <?php
        $title = "Create System";
        echo "<h2>" . $title . "</h2>";
    ?>
    <div class="box forms">
        <form action="actions/action_create_system.php" method="post">
            <p>Category: <input type="text" name="category" placeholder="category" required></p>
            <p>Functions: <input type="text" name="functions" placeholder="functions" required></p>
            <p>System Description: <input type="text" name="sysdescription" placeholder="****-***" required></p>
            <input class="btn btn-full" type="submit" value="Create">
        </form>
    </div>
</section> 
<?php 
}
include('../partials/footer.php'); ?> 