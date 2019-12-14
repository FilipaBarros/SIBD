<?php include('../partials/header.php'); ?> 
<?php 
function get_table()
{
    global $dataB;
    $statement = $dataB->prepare("SELECT * from Systems");
    $statement->execute();
    $systems = $statement->fetchAll();
    return $systems;
}
?>
<h2>Systems</h2>
<br>
<br>
<table>
<?php
$res = get_table();
echo "<br>";
echo "<a class='btn btn-lg' href='create_system.php'>Add System</a>";
echo "<br>";
echo "<br>";
echo " <tr> ";
echo "<th> # </th>";
echo "<th> Category </th>";
echo "<th> Functions </th>";
echo "<th> System Description </th>";
echo "<th> Actions </th>";
echo " </tr> ";
foreach ($res as $row) {
    echo "<tr>";
    for ($j = 0; $j < 4; $j++) { // we're expecting four attributes
        echo "<td> " . $row[$j] . " </td>"; // gives the current item of the current attribute
    }
    $statement= $dataB->prepare("SELECT permtypeid FROM UserPermissions WHERE sysid=? AND userid=?");
    $statement->execute(array($row[0],$_SESSION['userid']));
    $userPerm= $statement->fetchColumn();
    if($userPerm==3){
        echo "<td><a class='btn' href='../devices/create_device.php?id=". $row[0] . "'>Add Device</a>";
        echo "<a class='btn' href='edit_system.php?id=" . $row[0] . "'>Edit</a>";
        echo "<a class='btn' href='delete_system.php?id=" . $row[0] . "'>Delete</a>";
        echo "<a class='btn' href='details_system.php?id=" . $row[0] . "'>Info</a></td>";
    }
    if($userPerm==1){
        echo "<td><a class='btn' href='../devices/create_device.php?id=". $row[0] . "'>Add Device</a>";
        echo "<a class='btn' href='details_system.php?id=" . $row[0] . "'>Info</a></td>";
    }
    if($userPerm==2){
        echo "<td><a class='btn' href='details_system.php?id=" . $row[0] . "'>Info</a></td>";
    }
    echo "</tr>";
}
    //foreach($res as $row){
    //    echo $row["country"] . "<br>";
    //}
?>
</table>
<?php include('../partials/footer.php'); ?>