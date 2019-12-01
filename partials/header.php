<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/SIBD/config/init.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Create Device</title>
        <link rel="stylesheet" type="text/css" href="/SIBD/resources/style.css">
    </head>
    <body>  

<?php if (isset($_SESSION['username'])) { ?>
    <header>
        <form class="logout" action="/SIBD/users/actions/action_logout.php">
            <span><?= $_SESSION['username'] ?></span>
            <input type="submit" value="Logout">
        </form>

        <a href="<?php echo '/SIBD' ?>/welcome_page.php">Welcome Page</a>
        <a href="<?php echo '/SIBD' ?>/users/users.php">Users</a>
        <a href="<?php echo '/SIBD' ?>/locations/locations.php">Locations</a>
        <a href="<?php echo '/SIBD' ?>/devices/devices.php">Devices</a>
        <a href="<?php echo '/SIBD' ?>/systems/systems.php">Systems</a>
    </header> 
<?php } ?>