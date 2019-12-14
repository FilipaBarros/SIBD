<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/SIBD/config/init.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Device Management System</title>
        <link rel="stylesheet" type="text/css" href="/SIBD/resources/style.css">
    </head>
    <body>

<?php
    if(!isset($_SESSION['username'])){
        if($_SERVER['REQUEST_URI']!="/SIBD/index.php"){
            header('Location: /SIBD/index.php');
        }    
    }
    $url = $_SERVER['REQUEST_URI'];        
    if (isset($_SESSION['username'])) { ?>   
        <ul class="navbar">
            <li class = "username">Logged as:<br><h3><?= $_SESSION['username'] ?></h3></li>
            <br>
            <br>
            <li><a class="a-dashboard" href = "<?php echo '/SIBD' ?>/welcome_page.php"><br>Dashboard</a></li>
            <li><a class="a-account" href = "<?php echo '/SIBD' ?>/users/edit_profile.php"><br>Account</a></li>
            <li><a class="a-locations" href = "<?php echo '/SIBD' ?>/locations/locations.php"><br>Locations</a></li>
            <li><a class="a-devices" href = "<?php echo '/SIBD' ?>/devices/devices.php"><br>Devices</a></li>
            <li><a class="a-systems" href = "<?php echo '/SIBD' ?>/systems/systems.php"><br>Systems</a></li>
            <li><a class="a-users" href = "<?php echo '/SIBD' ?>/users/users.php"><br>Users</a></li>
            <br>
            <br>
            <li><a class="a-logout" href = "<?php echo '/SIBD' ?>/users/actions/action_logout.php"><br>Logout</a></li>
        </ul>
        <div class="main">  
     
<?php } ?>