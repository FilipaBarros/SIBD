<?php
    $device_id = $_GET['id']; 
    require_once('config/init.php');
    function get_table_devices_categories()
    {
        global $dataB;
        $statement = $dataB->prepare("SELECT catid from DevicesCategories where 'devid='$device_id");
        $statement->execute();
        $categories = $statement->fetchAll();
        return $categories;
    }
?>

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

<!DOCTYPE html>
<html>
    <head>
        <title>Edit Device</title>
    </head>
    <body>
    <h2>Edit Device</h2>
        <?php
            $res = get_table_devices_categories();
            echo "Categories"."<br>";
            foreach($res as $row){
                echo $row."<br>";
            }
        ?>
    </body>
</html>
