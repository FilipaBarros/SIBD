<?php include ('partials/header.php') ?>


<div class="wrapper">
    

    <div class="box Users">
        <h2>Users</h2>
        <?php
            $queryLocal = "SELECT COUNT(*) FROM Users";
            $result = $dataB->query($queryLocal);
            $device_count = $result->fetchAll()[0];
            echo $device_count[0];
        ?>
    </div>

    <div class="box Locals">
        <h2>Locals</h2>
        <?php
            $queryLocal = "SELECT COUNT(*) FROM Locals";
            $result = $dataB->query($queryLocal);
            $local_count = $result->fetchAll()[0];
            echo $local_count[0];
        ?>
    </div>

    <div class="box Systems">
        <h2>Systems</h2>
        <?php
            $queryLocal = "SELECT COUNT(*) FROM Systems";
            $result = $dataB->query($queryLocal);
            $device_count = $result->fetchAll()[0];
            echo $device_count[0];
        ?>
    </div>

    <div class="box Devices">
        <h2>Devices</h2>
        <?php
            global $dataB;
            $queryLocal = "SELECT COUNT(*) FROM Devices";
            $result = $dataB->query($queryLocal);
            $device_count = $result->fetchAll()[0];
            echo $device_count[0];
        ?>
    </div>
    <div class = "box graph">Graph 1</div>
    <div class = "box graph">Graph 2</div>
    
</div>

<?php include ('partials/footer.php') ?>