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
    echo "<br><h3> SYSTEM " . $sysid . "</h3><br>";
    echo "<table>";
    $res = get_table($sysid);
    echo " <tr> ";
    echo "<th>  #           </th>";
    echo "<th>  UserName </th>";
    echo "<th>  Contact </th>";
    echo "<th>  System ID     </th>";
    echo "<th>  System Description     </th>";
    echo "<th>  Permission Level     </th>";
    $statement= $dataB->prepare("SELECT permtypeid FROM UserPermissions WHERE sysid=? AND userid=?");
    $statement->execute(array($sysid,$_SESSION['userid']));
    $userPerm= $statement->fetchColumn();
    
    if($userPerm==3){
        echo "<th>  Actions</th>";
    }
    echo " </tr> ";
    foreach ($res as $row) {
        echo "<tr>";
        //userid, username, passphrase, contact
        echo "<td>".$row['userid'] . " </td>";
        echo "<td>".$row['username'] . " </td>";
        echo "<td>".$row['contact'] . " </td>";
        echo "<td><a class='prettylink' href='". $SERVERPATH ."/systems/details_system.php?id=".$row['sysid'] . "'>".$row['sysid'] . "</a></td>";
        echo "<td>".$row['sysdescription'] . " </td>";
        echo "<td>".$row['permtypedescription'] . " </td>";
        // gives the current item of the current attribute
        if($userPerm==3){
        echo "  <td><a class='btn' href='edit_permissions.php?id=" . $row[0] . "&sys=".$sysid."'>Edit</a>";
        echo "  <a class='btn' href='delete_user.php?id=" . $row[0] . "&sys=".$sysid. "'>Delete</a></td>";
        }
        echo "</tr>";
    }

    echo "</table>";
}
include('../partials/footer.php');
?>