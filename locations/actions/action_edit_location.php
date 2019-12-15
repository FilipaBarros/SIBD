<?php
    require_once('../../config/init.php');

    $id = $_GET["id"];
    $country=$_POST['country'];
    $city=$_POST['city'];
    $zip=$_POST['zip'];
    $street=$_POST['street'];
    $building=$_POST['building'];
    $floordesc=$_POST['floordesc'];
    $room=$_POST['room'];
   
    global $dataB;
    $statement = $dataB->prepare('UPDATE Locals SET country =?, city=?, zip=?, street=?, building=?, floordesc=?, room=? WHERE locid=?');
    $statement->execute(array($country,$city,$zip,$street,$building,$floordesc,$room,$id));
  
    header('Location: http://'.$RESOURCEPATH.'/locations/locations.php');
?>