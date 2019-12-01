<?php include ('partials/header.php') ?>

<h2>Locals</h2>
<?php
    $queryLocal = "SELECT COUNT(*) FROM Locals";
    $result = $dataB->query($queryLocal);
    $local_count = $result->fetchAll()[0];
    echo $local_count[0];
?>
<br>
<h2>Users</h2>
<?php
    $queryLocal = "SELECT COUNT(*) FROM Users";
    $result = $dataB->query($queryLocal);
    $device_count = $result->fetchAll()[0];
    echo $device_count[0];
?>
<br>
<h2>Devices</h2>
<?php
    global $dataB;
    $queryLocal = "SELECT COUNT(*) FROM Devices";
    $result = $dataB->query($queryLocal);
    $device_count = $result->fetchAll()[0];
    echo $device_count[0];
?>



<?php include ('partials/footer.php') ?>