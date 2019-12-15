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
<br>
<br>
<table>
<?php
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


$res = get_table();
?>
<br>
<a class='btn btn-lg' href='create_location.php'>Add Location</a>
<br>
<br>
<?php
echo "<tr> ";
echo "<th> # </th>";
echo "<th> Country </th>";
echo "<th> City </th>";
echo "<th> Zip </th>";
echo "<th> Street </th>";
echo "<th> Building </th>";
echo "<th> Floor </th>";
echo "<th> Room </th>";
if($check==1){
    echo "<th> Actions </th>";
}

echo " </tr> ";
foreach ($res as $row) {
    echo "<tr>";
    for ($j = 0; $j < 8; $j++) { // we're expecting eight attributes
        echo "<td> " . $row[$j] . " </td>"; // gives the current item of the current attribute
    }
    

    if($check==1){
        echo " <td><a class='btn' href='edit_location.php?id=" . $row[0] . "'>Edit</a>";
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