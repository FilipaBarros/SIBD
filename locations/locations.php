<?php include('../partials/header.php'); ?> 
<?php  

    

    function get_table()
    {
        global $dataB;
        $statement = $dataB->prepare("SELECT * from Locals");
        $statement->execute();
        $locations = $statement->fetchAll();
        return $locations;
    }
?>
<h2>Locations</h2>
<table>
<?php
$res = get_table();
echo " <tr> ";
echo "<td> # </td>";
echo "<td> Country </td>";
echo "<td> City </td>";
echo "<td> Zip </td>";
echo "<td> Street </td>";
echo "<td> Building </td>";
echo "<td> Floor </td>";
echo "<td> Room </td>";
echo "<td> Actions </td>";
echo " </tr> ";
echo " <br> ";
foreach ($res as $row) {
    echo "<tr>";
    for ($j = 0; $j < 8; $j++) { // we're expecting eight attributes
        echo "<td> " . $row[$j] . " </td>"; // gives the current item of the current attribute
    }
    global $dataB;
    $statement=$dataB->prepare("SELECT permtypeid FROM UserPermissions WHERE userid=?");
    $statement->execute(array($_SESSION['userid']));
    $userPerm=$statement->fetchAll();

    $check=0;
    foreach($userPerm as $tryPls) {
        if($tryPls[0]==3){
            $check=1;
        }
    }
    

    if($check==1){
        echo " <td><a href='edit_location.php?id=" . $row[0] . "'>Edit</a>";
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