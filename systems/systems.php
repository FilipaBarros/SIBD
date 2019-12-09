
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
<table>
<?php
$res = get_table();
echo " <tr> ";
echo "<th> # </th>";
echo "<th> category </th>";
echo "<th> functions </th>";
echo "<th> sysdescription </th>";


echo "<th> Actions </th>";
echo " </tr> ";
echo " <br> ";
foreach ($res as $row) {
    echo "<tr>";
    for ($j = 0; $j < 4; $j++) { // we're expecting four attributes
        echo "<td> " . $row[$j] . " </td>"; // gives the current item of the current attribute
    }
    $statement= $dataB->prepare("SELECT permtypeid FROM UserPermissions WHERE sysid=? AND userid=?");
    $statement->execute(array($row[0],$_SESSION['userid']));
    $userPerm= $statement->fetchColumn();
    if($userPerm==3){
        echo " <td><a href='edit_system.php?id=" . $row[0] . "'>Edit</a>";
        echo " <a href='delete_system.php?id=" . $row[0] . "'>Delete</a></td>";
    }
    echo "<br>";
    echo "</tr>";
}
    //foreach($res as $row){
    //    echo $row["country"] . "<br>";
    //}
?>
</table>
<?php include('../partials/footer.php'); ?>