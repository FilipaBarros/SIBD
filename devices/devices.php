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
<a href='create_device.php'>Create Device</a>
<h2>Devices</h2>
<table>
<?php
$res = get_table();
echo " <tr> ";
echo "<td>  #           </td>";
echo "<td>  DevName     </td>";
echo "<td>  Manufacturer</td>";
echo "<td>  Description </td>";
echo "<td>  SWVersion   </td>";
echo "<td>  SWArtefact  </td>";
echo "<td>  IP          </td>";
echo "<td>  Status      </td>";
echo "<td>  Local ID    </td>";
echo "<td>  System ID   </td>";
echo "<td>  Actions     </td>";
echo " </tr> ";
echo " <br> ";
foreach ($res as $row) {
    echo "<tr>";
    for ($j = 0; $j < 10; $j++) { // we're expecting 10 attributes
        echo "<td> " . $row[$j] . " </td>"; // gives the current item of the current attribute
    }
    $statement=$dataB->prepare("SELECT permtypeid FROM UserPermissions WHERE sysid=? AND userid=?");
    $statement->execute(array($row[9],$_SESSION['userid']));
    $userPerm=$statement->fetchColumn();
    if($userPerm==3){
        echo "  <td><a href='edit_device.php?id=" . $row[0] . "'>Edit</a>";
        echo "  <a href='delete_device.php?id=" . $row[0] . "'>Delete</a>";
        echo "  <a href='details_device.php?id=" . $row[0] . "'>Info</a></td>";
    }
    if($userPerm==2){
        echo "  <td><a href='details_device.php?id=" . $row[0] . "'>Info</a></td>";
    }
    if($userPerm==1){
        echo "  <td><a href='edit_device.php?id=" . $row[0] . "'>Edit</a>";
        echo "  <a href='details_device.php?id=" . $row[0] . "'>Info</a></td>";
    }

        
    echo "<br>";
    echo "</tr>";
}
include('../partials/footer.php');
?>
</table>

