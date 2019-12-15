<?php
    $SERVERPATH = $_SERVER['CONTEXT_DOCUMENT_ROOT']."/SIBD";
    require_once($SERVERPATH . '/config/init.php');    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Device Management System</title>
        <link rel="stylesheet" type="text/css" href="http://<?php echo $RESOURCEPATH ?>/resources/style.css">
    </head>
    <body>

<?php
    if(!isset($_SESSION['username'])){
        if(!strpos($_SERVER['REQUEST_URI'],"/SIBD/index.php")){
            header("Location: http://". $RESOURCEPATH ."/index.php");
        }    
    }
    $url = $_SERVER['REQUEST_URI'];        
    if (isset($_SESSION['username'])) { ?>   
        <ul class="navbar">
            <li class = "username">Logged as:<br><h3><?= $_SESSION['username'] ?></h3></li>
            <br>
            <br>
            <li><a class="a-dashboard" href = "http://<?php echo $RESOURCEPATH ?>/users/welcome_page.php"><br>Dashboard</a></li>
            <li><a class="a-account" href = "http://<?php echo $RESOURCEPATH ?>/users/edit_profile.php"><br>Account</a></li>
            <li><a class="a-locations" href = "http://<?php echo $RESOURCEPATH ?>/locations/locations.php"><br>Locations</a></li>
            <li><a class="a-devices" href = "http://<?php echo $RESOURCEPATH ?>/devices/devices.php"><br>Devices</a></li>
            <li><a class="a-systems" href = "http://<?php echo $RESOURCEPATH ?>/systems/systems.php"><br>Systems</a></li>
            <li><a class="a-users" href = "http://<?php echo $RESOURCEPATH ?>/users/users.php"><br>Users</a></li>
            <br>
            <br>
            <li><a class="a-logout" href = "http://<?php echo $RESOURCEPATH ?>/users/actions/action_logout.php"><br>Logout</a></li>
        </ul>
        <div class="main">  
     
<?php } ?>