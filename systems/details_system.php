<?php include('../partials/header.php'); ?> 
<?php
    $system_id = $_GET['id']; 
    function get_users_admin_perm($system_id){
        global $dataB;
        $statement = $dataB->prepare("SELECT * FROM Users JOIN UserPermissions on Users.userid = UserPermissions.userid WHERE sysid=? and permtypeid=3");
        $statement->execute(array($system_id));
        $users_admin =$statement->fetchAll();
        return $users_admin; 
    }

    function get_devices($system_id){
        global $dataB;
        $statement = $dataB->prepare("SELECT * from DevicesCategories 
        join Categories on DevicesCategories.catid = Categories.catid 
        join Devices on DevicesCategories.devid = Devices.devid 
        WHERE Devices.sysid= ? ");
        $statement->execute(array($system_id));
        $devices = $statement->fetchAll();
        return $devices;
    }

    function get_devices_categories($device_id){
    }

?>


<h2>System Info</h2>
<br>
<h3>System Devices</h3>
<br>
<?php
    //Devices associated to the system 
    $res = get_devices($system_id);
    echo "<table>";
    echo "<tr> ";
    echo "<th>  #           </th>";
    echo "<th>  DevName     </th>";
    echo "<th>  Manufacturer</th>";
    echo "<th>  Description </th>";
    echo "<th>  SWVersion   </th>";
    echo "<th>  SWArtefact  </th>";
    echo "<th>  IP          </th>";
    echo "<th>  Status      </th>";
    echo "<th>  Local ID    </th>";
    echo "<th>  System ID   </th>";
    echo "</tr> ";
    foreach ($res as $row) {
        echo "<tr>";
        echo "<td><a href='/SIBD/devices/details_device.php'>".$row['devid'] . "</td>";
        //echo "<td>".$row['devid'] . " </td>";
        echo "<td>".$row['devname'] . " </td>";
        echo "<td>".$row['manufacturer'] . " </td>";
        echo "<td>".$row['devdescription'] . " </td>";
        echo "<td>".$row['swversion'] . " </td>";
        echo "<td>".$row['swartefact'] . " </td>";
        echo "<td>".$row['ip'] . " </td>";
        echo "<td>".$row['stat'] . " </td>";
        echo "<td><a href='/SIBD/locations/locations.php'>".$row['locid'] . "</td>";
        echo "<td><a href='/SIBD/systems/details_system.php?id=".$row['sysid'] . "'>".$row['sysid'] . "</a></td>";
        //devid, devname, manufacturer, devdescription, swversion, swartefact, ip, stat, locid, sysid
        echo "</tr>";
    }
    echo "</table>";
?>

<br>
<h3>Devices per Category</h3>
<br>
<?php
    global $dataB;
    $queryLocal ="SELECT catname, COUNT(*) from DevicesCategories 
    join Categories on DevicesCategories.catid = Categories.catid 
    join Devices on DevicesCategories.devid = Devices.devid 
    WHERE Devices.sysid = ?
    GROUP BY catname";
    $statement = $dataB->prepare($queryLocal);
    $statement->execute(array($system_id));
    $devices_category = $statement->fetchAll();
    //print_r($devices_category);
    echo "<table>";
    echo "<tr>";
    echo "<th>Category Name</th>";
    echo "<th>Number of Devices</th>";
    echo "</tr>";
    foreach ($devices_category as $row) {
        echo "<tr>";
        for ($j = 0; $j < 2; $j++) { // we're expecting 2 attributes
            echo "<td> " . $row[$j] . " </td>";
        }
    }
    echo "</table>";
?>


<br>
<h3>System Administrators</h3>
<br>
<?php
    //Users with admin permissisons to the system 
    $res2 = get_users_admin_perm($system_id);
    //print_r($res2);
    echo "<table>";
    echo " <tr> ";
    echo "<th> #           </th>";
    echo "<th> Username    </th>";
    echo "<th> Contact     </th>";
    echo " </tr> ";
    foreach($res2 as $row){
        echo "<tr>";
        //print_r($row);
        echo "<td> " . $row['userid'] . " </td>";
        echo "<td> " . $row['username'] . " </td>";
        echo "<td> " . $row['contact'] . " </td>";
        //echo "<tr>";
        //for ($j = 0; $j < 7; $j++) { // we're expecting 7 attributes
        //    echo "<td> " . $row[$j] . " </td>";
        //}
    }
    echo "</tr>";
    echo "</table>";
?>


<?php include('../partials/footer.php'); ?> 