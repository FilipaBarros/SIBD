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
    echo "  <td><a href='index.php?id=" . $row[0] . "'>Edit</a></td>";
    echo "  <td><a href='index.php?id=" . $row[0] . "'>Delete</a></td>";
    echo "<br>";
    echo "</tr>";
}
    //foreach($res as $row){
    //    echo $row["country"] . "<br>";
    //}
?>

<?php include('../partials/footer.php'); ?>