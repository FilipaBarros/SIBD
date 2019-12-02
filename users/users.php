<?php 
include('../partials/header.php');
function get_table($sysid)
{
    global $dataB;
    $statement = $dataB->prepare("SELECT userid, username, contact, sysid, sysdescription, permtypedescription from
    (SELECT * from Users 
    INNER JOIN UserPermissions on UserPermissions.userid = Users.userid AND UserPermissions.sysid = ?
    INNER JOIN Systems on UserPermissions.sysid = Systems.sysid 
    INNER JOIN PermissionTypes on PermissionTypes.permtypeid = UserPermissions.permtypeid)");
    $statement->execute(array($sysid));
    $devices = $statement->fetchAll();
    return $devices;
}
?>

<h2>Users</h2>

<?php
//print_r($_SESSION["systems"]);
foreach ($_SESSION["systems"] as $sysid => $permision) {
    echo "<br>";
    echo "<h3> SYSTEM " . $sysid . "</h3>";
    echo "<table>";
    $res = get_table($sysid);
    echo " <tr> ";
    echo "<th>  #           </th>";
    echo "<th>  UserName </th>";
    echo "<th>  Contact </th>";
    echo "<th>  SystemID     </th>";
    echo "<th>  SystemDescription     </th>";
    echo "<th>  Permission Level     </th>";
    echo "<th>  Actions     </th>";
    echo " </tr> ";
    echo " <br> ";
    foreach ($res as $row) {
        echo "<tr>";
        for ($j = 0; $j < 6; $j++) { // we're expecting 10 attributes
            echo "<td> " . $row[$j] . " </td>"; // gives the current item of the current attribute
        }
        echo "  <td><a href='edit_device.php?id=" . $row[0] . "'>Edit</a>";
        echo "  <a href='delete_device.php?id=" . $row[0] . "'>Delete</a>";
        echo "  <a href='details_device.php?id=" . $row[0] . "'>Info</a></td>";
        echo "</tr>";
    }
    echo "<br>";
    echo "</table>";
}
include('../partials/footer.php');
?>
