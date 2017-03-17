#!/usr/bin/php
<?php
// Potentiometer data
// Kill Process: killall -9 serial_in_pot.php

mysql_connect ('localhost', 'root', 'root1234');
mysql_select_db('ica_sensors');

while(true)
{
$file = fopen("/dev/ttyUSB0","r"); //ttyUSB0 serial input
fgets($file);
$buffer = fgets($file); //read the file/UART
//echo $buffer; //uncomment to output data on console
fclose($file);

$sql_command = "INSERT INTO Potentiometer (value) VALUES ($buffer)"; //Save data in database
mysql_query($sql_command);

sleep(300); //Wait for 300 seconds (5 minutes)
}
?>
