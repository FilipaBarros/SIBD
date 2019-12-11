<?php include ('partials/header.php') ?>

    
<h2>Dashboard</h2>
<br>
<br>
<div class="wrapper">

    <div class="box Users">
        <h3>Users</h3>
        <h1><?php
            $queryLocal = "SELECT COUNT(*) FROM Users";
            $result = $dataB->query($queryLocal);
            $device_count = $result->fetchAll()[0];
            echo $device_count[0];
        ?></h1>
    </div>

    <div class="box Locals">
        <h3>Locals</h3>
        <h1><?php
            $queryLocal = "SELECT COUNT(*) FROM Locals";
            $result = $dataB->query($queryLocal);
            $local_count = $result->fetchAll()[0];
            echo $local_count[0];
        ?></h1>
    </div>

    <div class="box Systems">
        <h3>Systems</h3>
        <h1><?php
            $queryLocal = "SELECT COUNT(*) FROM Systems";
            $result = $dataB->query($queryLocal);
            $device_count = $result->fetchAll()[0];
            echo $device_count[0];
        ?></h1>
    </div>

    <div class="box Devices">
        <h3>Devices</h3>
        <h1><?php
            global $dataB;
            $queryLocal = "SELECT COUNT(*) FROM Devices";
            $result = $dataB->query($queryLocal);
            $device_count = $result->fetchAll()[0];
            echo $device_count[0];
        ?></h1>
    </div>



    <div class = "box graph">
        <h2>Devices per Category</h2>
        <?php
            global $dataB;
            $queryLocal ="SELECT catname, COUNT(*) from DevicesCategories 
            join Categories on DevicesCategories.catid = Categories.catid 
            join Devices on DevicesCategories.devid = Devices.devid 
            GROUP BY catname";
            $result = $dataB->query($queryLocal);
            $device_count = $result->fetchAll();
            print_r($device_count);
        ?>
    </div>

    <div class = "box graph">
        <h2>Components' Status</h2>
        <?php
            global $dataB;
            $queryLocal ="SELECT Components.stat, COUNT(*) from DevicesComponents 
            join Components on DevicesComponents.compid = Components.compid
            join Devices on DevicesComponents.devid = Devices.devid 
            GROUP BY Components.stat";
            $result = $dataB->query($queryLocal);
            $device_count = $result->fetchAll();
            print_r($device_count);
        ?>
    </div>
    
</div>

<?php include ('partials/footer.php') ?>


<!-- TODO: 1. tabela com categorias de todos os devices que existem      -->