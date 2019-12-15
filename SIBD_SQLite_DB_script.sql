-- drop tables 
DROP TABLE IF EXISTS UserPermissions;
DROP TABLE IF EXISTS Users;
DROP TABLE IF EXISTS DevicesCategories;
DROP TABLE IF EXISTS DevicesComponents;
DROP TABLE IF EXISTS Devices;
DROP TABLE IF EXISTS Categories;
DROP TABLE IF EXISTS Sensors;
DROP TABLE IF EXISTS Actuators;
DROP TABLE IF EXISTS Components;
DROP TABLE IF EXISTS Systems;
DROP TABLE IF EXISTS Locals;
DROP TABLE IF EXISTS PermissionTypes;

PRAGMA foreign_keys=ON;

-- users table
CREATE TABLE Users
(
    userid INTEGER NOT NULL PRIMARY KEY,
    username TEXT NOT NULL, 
    passphrase TEXT NOT NULL,
    contact TEXT NOT NULL
);
-- systems table
CREATE TABLE Systems
(
    sysid INTEGER NOT NULL PRIMARY KEY,
    category TEXT NOT NULL,
    functions TEXT NOT NULL,
    sysdescription TEXT NOT NULL
);

--permissions types table
CREATE TABLE PermissionTypes(
    permtypeid INTEGER NOT NULL PRIMARY KEY,
    permtypedescription TEXT NOT NULL
);

-- user permissions table
CREATE TABLE UserPermissions(
    permid INTEGER NOT NULL PRIMARY KEY,
    userid INTEGER NOT NULL, 
    sysid INTEGER NOT NULL,
	permtypeid INTEGER NOT NULL,
	CONSTRAINT userpermissions_users FOREIGN KEY (userid) REFERENCES Users(userid) ON DELETE CASCADE,
    CONSTRAINT userpermissions_systems FOREIGN KEY (sysid) REFERENCES Systems(sysid) ON DELETE CASCADE,
    CONSTRAINT userpermissions_permissionstype FOREIGN KEY (permtypeid) REFERENCES PermissionTypes(permtypeid) ON DELETE CASCADE
);




-- locals tables
CREATE TABLE Locals(
    locid INTEGER NOT NULL PRIMARY KEY,
    country TEXT NOT NULL,
    city TEXT NOT NULL,
    zip TEXT NOT NULL,
    street TEXT NOT NULL,
    building TEXT NOT NULL,
    floordesc TEXT NOT NULL,
    room TEXT NOT NULL
);



-- Categories Tables 
CREATE TABLE Categories(
    catid INTEGER NOT NULL PRIMARY KEY,
    catname TEXT NOT NULL,
    catdescription TEXT NOT NULL
);

-- devices table
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
    sysid INTEGER NOT NULL,
    CONSTRAINT device_local FOREIGN KEY (locid) REFERENCES Locals(locid) ON DELETE CASCADE,
    CONSTRAINT device_system FOREIGN KEY (sysid) REFERENCES Systems(sysid) ON DELETE CASCADE
);

--devices categories
CREATE TABLE DevicesCategories(
    devcatid INTEGER NOT NULL PRIMARY KEY,
    devid INTEGER NOT NULL,
    catid INTEGER NOT NULL,
    CONSTRAINT devicescategories_devices FOREIGN KEY (devid) REFERENCES Devices(devid) ON DELETE CASCADE,
    CONSTRAINT devicescategories_categories FOREIGN KEY (catid) REFERENCES Categories(catid) ON DELETE CASCADE
);

CREATE TABLE DevicesComponents(
    devcompid INTEGER NOT NULL PRIMARY KEY,
    devid INTEGER NOT NULL,
    compid INTEGER NOT NULL,
    CONSTRAINT devicescomponents_devices FOREIGN KEY (devid) REFERENCES Devices(devid) ON DELETE CASCADE,
    CONSTRAINT devicescomponents_components FOREIGN KEY (compid) REFERENCES Components(compid) ON DELETE CASCADE
);




-- components table 
CREATE TABLE Components(
    compid INTEGER NOT NULL PRIMARY KEY,
    compname TEXT NOT NULL,
    compcode INTEGER NOT NULL,
    stat TEXT NOT NULL
);


-- sensors table 
CREATE TABLE Sensors(
    sensid INTEGER NOT NULL PRIMARY KEY,
    units TEXT NOT NULL,
    periodicity TEXT NOT NULL,
    compname TEXT NOT NULL,
    compcode INTEGER NOT NULL,
    stat TEXT  NOT NULL,
	CONSTRAINT sensors_components FOREIGN KEY (sensid) REFERENCES Components(compid) ON DELETE CASCADE
);

-- actuators Table
CREATE TABLE Actuators(
    actid INTEGER NOT NULL PRIMARY KEY,
    func TEXT NOT NULL,
    compname TEXT NOT NULL,
    compcode INTEGER NOT NULL,
    stat TEXT  NOT NULL,
	CONSTRAINT actuators_components FOREIGN KEY (actid) REFERENCES Components(compid) ON DELETE CASCADE
);

