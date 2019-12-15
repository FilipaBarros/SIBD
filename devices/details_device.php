<?php include('../partials/header.php'); ?> 

<?php
    $device_id = $_GET['id']; 
    $allcompcodes = array();
    $localid = 0;
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
        global $dataB;
        $statement = $dataB->prepare("SELECT Systems.sysid, Systems.sysdescription, Systems.category, Systems.functions 
                                      from Systems JOIN Devices on Devices.sysid = Systems.sysid 
                                      WHERE Devices.devid = ?;");
        $statement->execute(array($device_id));
        $systems = $statement->fetchAll();
        return $systems;
    }
    //yep, again for info and stuff
    function get_table_device($device_id){ 
        global $dataB;
        $statement = $dataB->prepare("SELECT * From Devices WHERE devid = ?");
        $statement->execute(array($device_id));
        $device = $statement->fetchAll();
        global $localid;
        $localid = $device[0]["locid"];
        return $device;
    }
    function get_table_location(){
        global $dataB;
        global $localid;
        $statement = $dataB->prepare("SELECT * From Locals WHERE locid = ?");
        $statement->execute(array($localid));
        $local = $statement->fetchAll();
        return $local;
    }
?>
<h2>Device Info</h2>
<?php
    //device info again
    $res4 = get_table_device($device_id);
    echo "<br>";
    echo "<table>";
    echo " <tr> ";
    echo "<th>  #           </th>";
    echo "<th>  DevName     </th>";
    echo "<th>  Manufacturer</th>";
    echo "<th>  Description </th>";
    echo "<th>  SWVersion   </th>";
    echo "<th>  SWArtefact  </th>";
    echo "<th>  IP          </th>";
    echo "<th>  Status      </th>";
    echo "<th>  Local ID    </th>";
    echo "<th>  System ID   </th>";
    echo " </tr> ";
    
    foreach ($res4 as $row) {
        echo "<tr>";
        echo "<td>".$row['devid'] . " </td>";
        echo "<td>".$row['devname'] . " </td>";
        echo "<td>".$row['manufacturer'] . " </td>";
        echo "<td>".$row['devdescription'] . " </td>";
        echo "<td>".$row['swversion'] . " </td>";
        echo "<td>".$row['swartefact'] . " </td>";
        echo "<td>".$row['ip'] . " </td>";
        echo "<td>".$row['stat'] . " </td>";
        echo "<td><a class='prettylink' href='/SIBD/locations/locations.php'>".$row['locid'] . "</td>";
        echo "<td><a class='prettylink' href='/SIBD/systems/details_system.php?id=".$row['sysid'] . "'>".$row['sysid'] . "</a></td>";
        //echo "<tr>";
        //for ($j = 0; $j < 10; $j++) { // we're expecting 10 attributes
        //    echo "<td> " . $row[$j] . " </td>"; // gives the current item of the current attribute
        //}
        //echo "</tr>";
    }
    echo "</table>";
    //categories
    $res = get_table_devices_categories($device_id);
    echo "<br>";
    echo "<h3>Associated Categories</h3>";
    echo "<table>";
    echo " <tr> ";
    echo "<th> #                  </th>";
    echo "<th>Category Name       </th>";
    echo "<th>Category Description</th>";
    echo " </tr> ";
    foreach($res as $row){
        echo "<tr>";
        //print_r($row);
        echo "<td> " . $row['catid'] . " </td>";
        echo "<td> " . $row['catname'] . " </td>";
        echo "<td> " . $row['catdescription'] . " </td>";
    }
    echo "</tr>";
    echo "</table>";
    //components then sensors and actuators
    $res2 = get_table_components($device_id);
    echo "<br>";
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
?>
<br>
<h4>Sensors</h4>
<br>
<?php
    echo "<a class='btn btn-lg' href='create_sensor.php?id=".$device_id."'>Add Sensor</a>";
    echo "<br>";
    echo "<br>";
    if(count($allsensors) > 0){
    //sensors
    //print_r($allsensors);
    echo "<table>";
    echo "<tr>";
    echo "<th> #                   </th>";
    echo "<th> Units               </th>";
    echo "<th> Periodicity         </th>";
    echo "<th> Component Name      </th>";
    echo "<th> Component Code      </th>";
    echo "<th> Status              </th>";
    echo " </tr> ";
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
    }
?>
<br>
<h4>Actuators</h4>
<br>
<?php
    //actuators
    //print_r($allactuators);
    echo "<a class='btn btn-lg' href='create_actuator.php?id=".$device_id."'>Add Actuator</a>";
    echo "<br>";
    echo "<br>";
    if(count($allactuators) > 0){
    echo "<table>";
    echo "<tr>";
    echo "<th> #                   </th>";
    echo "<th> Function            </th>";
    echo "<th> Component Name      </th>";
    echo "<th> Component Code      </th>";
    echo "<th> Status              </th>";
    echo " </tr> ";
    foreach($allactuators as $res){
        for ($j = 0; $j < count($res); $j++) { 
            echo "<tr>";
            echo "<td> " . $res[$j]['actid'] . " </td>";
            echo "<td> " . $res[$j]['func'] . " </td>";
            echo "<td> " . $res[$j]['compname'] . " </td>";
            echo "<td> " . $res[$j]['compcode'] . " </td>";
            echo "<td> " . $res[$j]['stat'] . " </td>";
            echo "</tr>";
        }
    }
    echo "</tr>";
    echo "</table>";
    }
?>
<h3>Systems</h3>
<?php
//systems 
    $res3 = get_table_systems($device_id);
    //print_r($res3);
    echo "<table>";
    echo " <tr> ";
    echo "<th> #                  </th>";
    echo "<th>Description         </th>";
    echo "<th>Category            </th>";
    echo "<th>Function            </th>";
    echo " </tr> ";
    foreach($res3 as $row){
        echo "<tr>";
        //print_r($row3);
        echo "<td> " . $row['sysid'] . " </td>";
        echo "<td> " . $row['sysdescription'] . " </td>";
        echo "<td> " . $row['category'] . " </td>";
        echo "<td> " . $row['functions'] . " </td>";
    }
    echo "<br>";
    echo "</tr>";
    echo "</table>";
    //location info 
    $res5 = get_table_location();
    echo "<h3>Location Info</h3>";
    echo "<table>";
    echo " <tr> ";
    echo "<th> # </th>";
    echo "<th> Country </th>";
    echo "<th> City </th>";
    echo "<th> Zip </th>";
    echo "<th> Street </th>";
    echo "<th> Building </th>";
    echo "<th> Floor </th>";
    echo "<th> Room </th>";
    echo " </tr> ";
    foreach ($res5 as $row) {
        echo "<tr class='listelement'>";
        for ($j = 0; $j < 8; $j++) { // we're expecting eight attributes
            echo "<td> " . $row[$j] . " </td>"; // gives the current item of the current attribute
        }
        echo "</tr>";
    }
    echo "</table>";
?>
<?php include('../partials/footer.php'); ?> 