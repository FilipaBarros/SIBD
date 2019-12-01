<?php 
    require_once('config/init.php');
    function get_table()
    {
        global $dataB;
        $statement = $dataB->prepare("SELECT * from Devices");
        $statement->execute();
        $locations = $statement->fetchAll();
        return $locations;
    }
?>




<!DOCTYPE html>
<html>
    <head>
        <title>Devices</title>
    </head>
    <body>
    <h2>Devices</h2>
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
            echo "<td>  Actions     </td>";
            echo " </tr> ";
            echo " <br> ";
            foreach($res as $row) {
                echo "<tr>";
                for ($j = 0; $j < 9; $j++) { // we're expecting nine attributes
                    echo "<td> ".$row[$j]." </td>"; // gives the current item of the current attribute
                }
                echo "  <td><a href='edit_device.php?id=".$row[0]."'>Edit</a></td>";
                echo "  <td><a href='delete_device.php?id=".$row[0]."'>Delete</a></td>";
                echo "  <td><a href='details.php?id=".$row[0]."'>Info</a></td>";
                echo "<br>";
                echo "</tr>";
            }
        ?>
    </body>
</html>
