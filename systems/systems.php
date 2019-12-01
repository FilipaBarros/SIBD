<?php include('../partials/header.php'); ?> 
<?php 
function get_table()
{
    global $dataB;
    $statement = $dataB->prepare("SELECT * from Systems");
    $statement->execute();
    $locations = $statement->fetchAll();
    return $locations;
}
?>
<h2>Systems</h2>
<table>
<?php
$res = get_table();
echo " <tr> ";
echo "<td> # </td>";
echo "<td> category </td>";
echo "<td> functions </td>";
echo "<td> sysdescription </td>";
echo "<td> Actions </td>";
echo " </tr> ";
echo " <br> ";
foreach ($res as $row) {
    echo "<tr>";
    for ($j = 0; $j < 4; $j++) { // we're expecting four attributes
        echo "<td> " . $row[$j] . " </td>"; // gives the current item of the current attribute
    }
    echo " <td><a href='index.php?id=" . $row[0] . "'>Edit</a>";
    echo " <a href='index.php?id=" . $row[0] . "'>Delete</a></td>";
    echo "<br>";
    echo "</tr>";
}
    //foreach($res as $row){
    //    echo $row["country"] . "<br>";
    //}
?>
</table>
<?php include('../partials/footer.php'); ?>