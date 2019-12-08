<?php include('../partials/header.php'); ?> 

<?php
    $device_id = $_GET['id']; 
    $allcompcodes = array();
    function get_table_devices_categories($device_id)
    {
        global $dataB;
        $statement = $dataB->prepare("SELECT DevicesCategories.catid,catname,catdescription 
                                      FROM DevicesCategories JOIN Categories on DevicesCategories.catid = Categories.catid
                                      WHERE devid=? ");
        $statement->execute(array($device_id));
        $categories = $statement->fetchAll();
        return $categories;
    }
    function get_table_components($device_id){
        global $dataB;
        global $allcompcodes;
        $statement = $dataB->prepare("SELECT DevicesComponents.devid, DevicesComponents.compid, compname, compcode, stat 
                                      FROM DevicesComponents JOIN Components on DevicesComponents.compid = Components.compid 
                                      WHERE DevicesComponents.devid = ?");
        $statement->execute(array($device_id));
        $components = $statement->fetchAll();
        foreach($components as $row){
            array_push($allcompcodes, $row["compcode"]);
        }
        return $components;
    }
    function get_table_sensors($compid){
        global $dataB;
        $statement = $dataB->prepare("SELECT * FROM Sensors where compcode = ? ");
        $statement->execute(array($compid));
        $sensor = $statement->fetchAll();
        return $sensor;
    }
    function get_table_actuators($compid){
        global $dataB;
        $statement = $dataB->prepare("SELECT *  FROM Actuators where compcode = ? ");
        $statement->execute(array($compid));
        $actuators = $statement->fetchAll();
        return $actuators;

    }
    function get_table_systems($device_id){
    }

?>
<h2>Device Info</h2>
<?php
    //categories
    $res = get_table_devices_categories($device_id);
    echo "<h3>Associated Categories</h3>";
    echo "<table>";
    echo " <tr> ";
    echo "<th> #                  </th>";
    echo "<th>Category Name       </th>";
    echo "<th>Category Description</th>";
    echo " </tr> ";
    echo " <br> ";
    foreach($res as $row){
        echo "<tr>";
        //print_r($row);
        echo "<td> " . $row['catid'] . " </td>";
        echo "<td> " . $row['catname'] . " </td>";
        echo "<td> " . $row['catdescription'] . " </td>";
    }
    echo "<br>";
    echo "</tr>";
    echo "</table>";

    //components then sensors and actuators
    $res2 = get_table_components($device_id);
    echo "<h3>Associated Components</h3>";
    //foreach($res2 as $row){
    //    print_r($row);
    //}

    $allsensors = array();
    $allactuators = array();

    foreach($allcompcodes as $compcode){
        array_push($allactuators, get_table_actuators($compcode));
        array_push($allsensors, get_table_sensors($compcode));
    }

    //sensors
    //print_r($allsensors);
    echo "<h4>Sensors</h4>";
    echo "<table>";
    echo "<tr>";
    echo "<th> #                   </th>";
    echo "<th> Units               </th>";
    echo "<th> Periodivity         </th>";
    echo "<th> Component Name      </th>";
    echo "<th> Component Code      </th>";
    echo "<th> Status              </th>";
    echo " </tr> ";
    echo " <br> ";
    foreach($allsensors as $res){
        for ($j = 0; $j < count($res); $j++) { 
            echo "<tr>";
            echo "<td> " . $res[$j]['sensid'] . " </td>";
            echo "<td> " . $res[$j]['units'] . " </td>";
            echo "<td> " . $res[$j]['periodicity'] . " </td>";
            echo "<td> " . $res[$j]['compname'] . " </td>";
            echo "<td> " . $res[$j]['compcode'] . " </td>";
            echo "<td> " . $res[$j]['stat'] . " </td>";
            echo "</tr>";
        }
    }
    echo "</tr>";
    echo "</table>";
    
    //actuators
    print_r($allactuators);
    echo "<h4>Actuators</h4>";
    echo "<table>";
    echo "<tr>";
    echo "<th> #                   </th>";
    echo "<th> Units               </th>";
    echo "<th> Periodivity         </th>";
    echo "<th> Component Name      </th>";
    echo "<th> Component Code      </th>";
    echo "<th> Status              </th>";
    echo " </tr> ";
    echo " <br> ";
    foreach($allsensors as $res){
        for ($j = 0; $j < count($res); $j++) { 
            echo "<tr>";
            echo "<td> " . $res[$j]['sensid'] . " </td>";
            echo "<td> " . $res[$j]['units'] . " </td>";
            echo "<td> " . $res[$j]['periodicity'] . " </td>";
            echo "<td> " . $res[$j]['compname'] . " </td>";
            echo "<td> " . $res[$j]['compcode'] . " </td>";
            echo "<td> " . $res[$j]['stat'] . " </td>";
            echo "</tr>";
        }
    }
    echo "</tr>";
    echo "</table>";


?>
<?php include('../partials/footer.php'); ?> 





