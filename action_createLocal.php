<?php
    require_once('config/init.php');

    $country=$_POST['country'];
    $city=$_POST['city'];
    $zip=$_POST['zip'];
    $street=$_POST['street'];
    $building=$_POST['building'];
    $floor=$_POST['floor'];
    $room=$_POST['room'];

    function newLocal($country, $city, $zip, $street, $building, $floor, $room){
        global $dataB;
        $statement = $dataB->prepare('INSERT INTO Locals(country,city,zip,street,building,floordesc,room) VALUES (?,?,?,?,?,?,?)');
        $statement->execute(array($country, $city,$zip,$street,$building,$floor,$room));
        print_r($statement);
    }

    newLocal($country, $city, $zip, $street, $building, $floor, $room);
    header('Location: createLocal_page.php');
    
   // catch(PDOException $e){
   //     header('Location: register_page.php');
    //}

?>
