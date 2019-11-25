<header>
            <?php if (isset($_SESSION['username'])) { ?>
            <form class="logout" action="action_logout.php">
                <span><?=$_SESSION['username']?></span>
                <input type="submit" value="Logout">
            </form>
            <a href="userActions_page.php">User Management</a>
            <a href="deviceActions_page.php">Device Management</a>
            </header> 
            <?php } ?>