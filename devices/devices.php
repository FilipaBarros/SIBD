<?php 
include('../partials/header.php');
function get_table()
{
    global $dataB;
    $statement = $dataB->prepare("SELECT * from Devices");
    $statement->execute();
    $devices = $statement->fetchAll();
    return $devices;
}
?>
<h2>Devices</h2>
<br>
<br>
<table>
<?php
$res = get_table();
echo " <tr> ";
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
echo "<th>  Actions     </th>";
echo " </tr> ";
foreach ($res as $row) {
    echo "<tr>";
    echo "<td>".$row['devid'] . " </td>";
    echo "<td>".$row['devname'] . " </td>";
    echo "<td>".$row['manufacturer'] . " </td>";
    echo "<td>".$row['devdescription'] . " </td>";
    echo "<td>".$row['swversion'] . " </td>";
    echo "<td>".$row['swartefact'] . " </td>";
    echo "<td>".$row['ip'] . " </td>";
    echo "<td>".$row['stat'] . " </td>";
    echo "<td><a href='/SIBD/locations/locations.php'>".$row['locid'] . "</td>";
    echo "<td><a href='/SIBD/systems/details_system.php?id=".$row['sysid'] . "'>".$row['sysid'] . "</a></td>";
    //echo "<td>".$row['sysid'] . " </td>";
    //for ($j = 0; $j < 10; $j++) { // we're expecting 10 attributes
    //  echo "<td> " . $row[$j] . " </td>"; // gives the current item of the current attribute
    //}
    $statement=$dataB->prepare("SELECT permtypeid FROM UserPermissions WHERE sysid=? AND userid=?");
    $statement->execute(array($row[9],$_SESSION['userid']));
    $userPerm=$statement->fetchColumn();
    if($userPerm==3){
        echo "  <td><a class='btn' href='edit_device.php?id=" . $row[0] . "&sysid=".$row[9]. "'>Edit</a>";
        echo "  <a class='btn' href='delete_device.php?id=" . $row[0] . "&sysid=".$row[9].  "'>Delete</a>";
        echo "  <a class='btn' href='details_device.php?id=" . $row[0] . "'>Info</a></td>";
    }
    if($userPerm==2){
        echo "  <td><a class='btn' href='details_device.php?id=" . $row[0] . "'>Info</a></td>";
    }
    if($userPerm==1){
        echo "  <td><a class='btn' href='edit_device.php?id=" . $row[0] . "&sysid=".$row[9]. "'>Edit</a>";
        echo "  <a class='btn' href='details_device.php?id=" . $row[0] . "'>Info</a>";

    }
    echo "</tr>";
}
include('../partials/footer.php');
?>
</table>

