-- file for creating dummy examples in order to fill the tables 



---- users table 

INSERT INTO Users (userid, username, passphrase, contact) VALUES (1, 'Filipa', 'd033e22ae348aeb5660fc2140aec35850c4da997','dummmy@fghj.com');
INSERT INTO Users (userid, username, passphrase, contact) VALUES (2, 'Pedro', 'd033e22ae348aeb5660fc2140aec35850c4da997','dummmy1@fghj.com');
INSERT INTO Users (userid, username, passphrase, contact) VALUES (3, 'Flavio', 'd033e22ae348aeb5660fc2140aec35850c4da997','dummmy2@fghj.com');
INSERT INTO Users (userid, username, passphrase, contact) VALUES (4, 'Amelia', 'd033e22ae348aeb5660fc2140aec35850c4da997','dummmy3@fghj.com');
INSERT INTO Users (userid, username, passphrase, contact) VALUES (5, 'Joao', 'd033e22ae348aeb5660fc2140aec35850c4da997','dummmy4@fghj.com');


----- systems table
INSERT INTO Systems (sysid, category, functions, sysdescription) VALUES (1, 'printers', 'print','print system');
INSERT INTO Systems (sysid, category, functions, sysdescription) VALUES (2, 'coffee', 'coffee','system of coffee machines');
INSERT INTO Systems (sysid, category, functions, sysdescription) VALUES (3, 'watering', 'water','watering system');

--permissions types table
INSERT INTO PermissionTypes (permtypeid,permtypedescription) VALUES (1, 'editor');
INSERT INTO PermissionTypes (permtypeid, permtypedescription) VALUES (2, 'viewer');
INSERT INTO PermissionTypes (permtypeid, permtypedescription) VALUES (3, 'admin');

-- user permissions table
--Filipa's permissions: admin to all systems 
INSERT INTO UserPermissions (permid, userid, sysid, permtypeid) VALUES (1,1,1,3);
INSERT INTO UserPermissions (permid, userid, sysid, permtypeid) VALUES (2,1,2,3);
INSERT INTO UserPermissions (permid, userid, sysid, permtypeid) VALUES (3,1,3,3);
-- Pedro's permissions: viewr to printer and coffee, editor to watering 
INSERT INTO UserPermissions (permid, userid, sysid, permtypeid) VALUES (4,2,1,2);
INSERT INTO UserPermissions (permid, userid, sysid, permtypeid) VALUES (5,2,2,2);
INSERT INTO UserPermissions (permid, userid, sysid, permtypeid) VALUES (6,2,3,1);
-- Flavio's Permissions: viewer to all
INSERT INTO UserPermissions (permid, userid, sysid, permtypeid) VALUES (7,3,1,2);
INSERT INTO UserPermissions (permid, userid, sysid, permtypeid) VALUES (8,3,2,2);
INSERT INTO UserPermissions (permid, userid, sysid, permtypeid) VALUES (9,3,3,2);
-- Amelia's permissions: viewer to all but admin to print
INSERT INTO UserPermissions (permid, userid, sysid, permtypeid) VALUES (10,4,1,3);
INSERT INTO UserPermissions (permid, userid, sysid, permtypeid) VALUES (11,4,2,2);
INSERT INTO UserPermissions (permid, userid, sysid, permtypeid) VALUES (12,4,3,2);
-- Joao's permissions: admin to coffee and editor to the rest
INSERT INTO UserPermissions (permid, userid, sysid, permtypeid) VALUES (13,5,1,1);
INSERT INTO UserPermissions (permid, userid, sysid, permtypeid) VALUES (14,5,2,3);
INSERT INTO UserPermissions (permid, userid, sysid, permtypeid) VALUES (15,5,3,1);




-- locals tables
INSERT INTO Locals (locid,country, city, zip, street, building, floordesc, room) VALUES (1,'Portugal', 'Porto','4200','Rua ertyu','A','1st','A203');
INSERT INTO Locals (locid,country, city, zip, street, building, floordesc, room) VALUES (2,'Portugal', 'Porto','4200','Rua ertyu','B','1st','B203');
INSERT INTO Locals (locid,country, city, zip, street, building, floordesc, room) VALUES (3,'Portugal', 'Porto','4200','Rua ertyu','Garden','NA','NA');



--devices table 
INSERT INTO Devices (devid, devname, manufacturer, devdescription, swversion, swartefact, ip, stat, locid, sysid) VALUES (1,'printer1', 'manufacturer1','description description description', 'v1.0.1', 'free rtos','0.0.0.1','working',1,1);
INSERT INTO Devices (devid, devname, manufacturer, devdescription, swversion, swartefact, ip, stat, locid, sysid) VALUES (2,'printer2', 'manufacturer1','description description description', 'v1.0.1', 'free rtos','0.0.0.2','working',2,1);
INSERT INTO Devices (devid, devname, manufacturer, devdescription, swversion, swartefact, ip, stat, locid, sysid) VALUES (3,'coffeemachine1', 'manufacturer2','description description description', 'v1.0.1', 'free rtos','0.0.0.3','working',2,2);
INSERT INTO Devices (devid, devname, manufacturer, devdescription, swversion, swartefact, ip, stat, locid, sysid) VALUES (4,'sprinkler1', 'manufacturer3','description description description', 'v1.0.1', 'free rtos','0.0.0.4','working',3,3);




-- categories table
INSERT INTO Categories (catid, catname, catdescription) VALUES (1,'printer','a device that prints');
INSERT INTO Categories (catid, catname, catdescription) VALUES (2,'coffee machine','a device that prints');
INSERT INTO Categories (catid, catname, catdescription) VALUES (3,'sprinkler','a device that spuff spuff water');



--devices categories table
INSERT INTO DevicesCategories (devcatid, devid, catid) VALUES (1,1,1);
INSERT INTO DevicesCategories (devcatid, devid, catid) VALUES (2,2,1);
INSERT INTO DevicesCategories (devcatid, devid, catid) VALUES (3,3,2);
INSERT INTO DevicesCategories (devcatid, devid, catid) VALUES (4,4,3);

-- -- components table 
INSERT INTO Components (compid, compname, compcode, stat) VALUES (1,'temperature sensor', 1234, 'working');
INSERT INTO Components (compid, compname, compcode, stat) VALUES (2,'humidity sensor', 1235, 'working');
INSERT INTO Components (compid, compname, compcode, stat) VALUES (3,'mechanical sprinkler', 1236, 'working');

-- sensors table 
INSERT INTO Sensors (sensid, units, periodicity, compname, compcode, stat) VALUES (1,'Celsius', '1minute', 'temperature sensor', 1234, 'working');
INSERT INTO Sensors (sensid, units, periodicity, compname, compcode, stat) VALUES (2,'RH', '1minute', 'humidity sensor', 1235, 'working');

-- actuators table 
INSERT INTO Actuators (actid, func, compname, compcode, stat) VALUES (3, 'activates the sprinkler' , 'mechanical sprinkler', 1236, 'working');

-- devices components tables 
INSERT INTO DevicesComponents(devcompid, devid, compid) VALUES (1,4,3);
INSERT INTO DevicesComponents(devcompid, devid, compid) VALUES (2,1,1);
INSERT INTO DevicesComponents(devcompid, devid, compid) VALUES (3,1,2);
INSERT INTO DevicesComponents(devcompid, devid, compid) VALUES (4,1,3);