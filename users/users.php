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
    global $dataB;
    echo "<h3> SYSTEM " . $sysid . "</h3>";
    echo "<table>";
    $res = get_table($sysid);
    echo " <tr> ";
    echo "<td>  #           </td>";
    echo "<td>  UserName </td>";
    echo "<td>  Contact </td>";
    echo "<td>  SystemID     </td>";
    echo "<td>  SystemDescription     </td>";
    echo "<td>  Permission Level     </td>";
    $statement= $dataB->prepare("SELECT permtypeid FROM UserPermissions WHERE sysid=? AND userid=?");
    $statement->execute(array($sysid,$_SESSION['userid']));
    $userPerm= $statement->fetchColumn();
    
    echo "<td>  Actions</td>";
    
    echo " </tr> ";
    echo " <br> ";
    foreach ($res as $row) {
        echo "<tr>";
        for ($j = 0; $j < 6; $j++) { // we're expecting 10 attributes
            echo "<td> " . $row[$j] . " </td>"; // gives the current item of the current attribute
        }
        if($userPerm==3){
        echo "  <td><a href='edit_permissions.php?id=" . $row[0] . "&sys=".$sysid."'>Edit</a>";
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

    echo "</table>";
}
include('../partials/footer.php');
?>