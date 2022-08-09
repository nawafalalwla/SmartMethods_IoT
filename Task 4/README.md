This is the work of week 3 of the internship for internet of things track which include:
1- create a webpage that get the value of a sensor
 1.1- it will use GET method
 1.2- the value will be of an integer type
2- create a database of any type
 2.1- to create mySQL database table for the sensor:
  CREATE TABLE sensor (
   {id} int NOT NULL AUTO_INCREMENT,
   {value} int NOT NULL,
   {date} timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
   PRIMARY KEY (id));
3- create a webpage that save a sensor value in a database
 3.1- will get the value from the ESP32 with GET method
 3.2- the value will be in $_GET
