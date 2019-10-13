--drop tables
DROP TABLE IF EXISTS UserPermissions;
DROP TABLE IF EXISTS Users;
DROP TABLE IF EXISTS Systems;
DROP TABLE IF EXISTS PermissionTypes;
DROP TABLE IF EXISTS Devices;
DROP TABLE IF EXISTS Categories;
DROP TABLE IF EXISTS Sensors;
DROP TABLE IF EXISTS Actuators;
DROP TABLE IF EXISTS Locals;
DROP TABLE IF EXISTS OperationalStatus;


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
CREATE TABLE UserPermissions
(
    permid INTEGER NOT NULL PRIMARY KEY,
    userid INTEGER NOT NULL REFERENCES Users(userid),
    sysid INTEGER NOT NULL REFERENCES Systems(sysid),
    permtypeid INTEGER NOT NULL REFERENCES PermissionTypes(permtypeid)
);

-- Status table
CREATE TABLE OperationalStatus
(
    opstatid INTEGER NOT NULL PRIMARY KEY,
    statdescription TEXT NOT NULL
);


-- Devices table
CREATE TABLE Devices
(
    devid INTEGER NOT NULL PRIMARY KEY,
    devname TEXT NOT NULL, 
    manufacturer TEXT NOT NULL,
    devdescription TEXT NOT NULL,
    swversion TEXT NOT NULL,
    swartefact TEXT NOT NULL,
    ip TEXT NOT NULL,
    statid INTEGER  NOT NULL REFERENCES OperationalStatus(opstatid)

);

-- Categories Tables 
CREATE TABLE Categories(
    catid INTEGER NOT NULL PRIMARY KEY,
    catname TEXT NOT NULL,
    catdescription TEXT NOT NULL
);


-- Sensors table 
CREATE TABLE Sensors(
    sensid INTEGER NOT NULL PRIMARY KEY,
    sensname TEXT NOT NULL,
    units TEXT NOT NULL,
    periodicity TEXT NOT NULL,
    code TEXT NOT NULL,
    statid INTEGER  NOT NULL REFERENCES OperationalStatus(opstatid)
);

-- Actuators Table
CREATE TABLE Actuators(
    actid INTEGER NOT NULL PRIMARY KEY,
    actname TEXT NOT NULL,
    code TEXT NOT NULL,
    statid INTEGER  NOT NULL REFERENCES OperationalStatus(opstatid)
);

-- Locals tables
CREATE TABLE Locals(
    locid INTEGER NOT NULL PRIMARY KEY,
    country TEXT NOT NULL,
    city TEXT NOT NULL,
    zip TEXT NOT NULL,
    street TEXT NOT NULL,
    building TEXT NOT NULL,
    floor TEXT NOT NULL,
    room TEXT NOT NULL
);
