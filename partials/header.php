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
        <ul class="navbar">
            <li class = "username"><span><?= $_SESSION['username'] ?></span></li>
            <li><a  href = "<?php echo '/SIBD' ?>/welcome_page.php">Dashboard</a></li>
            <li><a href = "<?php echo '/SIBD' ?>/welcome_page.php">Account</a></li>
            <li><a href = "<?php echo '/SIBD' ?>/locations/locations.php">Locations</a></li>
            <li><a href = "<?php echo '/SIBD' ?>/devices/devices.php">Devices</a></li>
            <li><a href = "<?php echo '/SIBD' ?>/systems/systems.php">Systems</a></li>
            <li><a href = "<?php echo '/SIBD' ?>/users/users.php">Users</a></li>
            <li><a href = "<?php echo '/SIBD' ?>/users/actions/action_logout.php">Logout</a></li>
        </ul>
        <div class="main">  
     
<?php } ?>