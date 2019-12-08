<!-- What we want to get show for each device: 
    The components which are: sensors and actuators 
    The Categories it bellongs to 
    Tables: 
--devices table
CREATE TABLE Devices(
    devid INTEGER NOT NULL PRIMARY KEY,
    devname TEXT NOT NULL, 
    manufacturer TEXT NOT NULL,
    devdescription TEXT NOT NULL,
    swversion TEXT NOT NULL,
    swartefact TEXT NOT NULL,
    ip TEXT NOT NULL,
    stat TEXT  NOT NULL,
    locid INTEGER NOT NULL,
    FOREIGN KEY (locid) REFERENCES Locals(locid) 
);

--devices categories
CREATE TABLE DevicesCategories(
    devcatid INTEGER NOT NULL PRIMARY KEY,
    devid INTEGER NOT NULL,
    catid INTEGER NOT NULL,
    FOREIGN KEY (devid) REFERENCES Devices(devid),
    FOREIGN KEY (catid) REFERENCES Categories(catid)
);

CREATE TABLE DevicesComponents(
    devcompid INTEGER NOT NULL,
    devid INTEGER NOT NULL,
    compid INTEGER NOT NULL,
    FOREIGN KEY (devid) REFERENCES Devices(devid),
    FOREIGN KEY (compid) REFERENCES Components(compid)
);


    -- components table 
CREATE TABLE Components(
    compid INTEGER NOT NULL PRIMARY KEY,
    compname TEXT NOT NULL,
    compcode INTEGER NOT NULL,
    stat TEXT  NOT NULL
);


-- sensors table 
CREATE TABLE Sensors(
    sensid INTEGER NOT NULL PRIMARY KEY,
    units TEXT NOT NULL,
    periodicity TEXT NOT NULL,
    compname TEXT NOT NULL,
    compcode INTEGER NOT NULL,
    stat TEXT  NOT NULL,
	FOREIGN KEY (sensid) REFERENCES Components(compid)
);

-- actuators Table
CREATE TABLE Actuators(
    actid INTEGER NOT NULL PRIMARY KEY,
    func TEXT NOT NULL,
    compname TEXT NOT NULL,
    compcode INTEGER NOT NULL,
    stat TEXT  NOT NULL,
	FOREIGN KEY (actid) REFERENCES Components(compid)
);
 -->
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
<h2>Device</h2>
<?php
    $res = get_table_devices_categories($device_id);
    echo "Categories"."<br>";
    foreach($res as $row){
        print_r($row);
    }
    $res2 = get_table_components($device_id);
    echo "Components"."<br>";
    foreach($res2 as $row){
        print_r($row);
    }

    $allsensors = array();
    $allactuators = array();

    foreach($allcompcodes as $compcode){
        array_push($allsensors, get_table_actuators($compcode));
        array_push($allactuators, get_table_sensors($compcode));
    }


?>
<?php include('../partials/footer.php'); ?> 





