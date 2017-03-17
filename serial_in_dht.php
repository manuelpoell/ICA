#!/usr/bin/php
<?php
// DHT22 data
// Kill Process: killall -9 serial_in_dht.php

mysql_connect ('localhost', 'root', 'root1234');
mysql_select_db('ica_sensors');

while(true)
{
$file = fopen("/dev/ttyUSB0","r"); //ttyUSB0 serial input
fgets($file);
$buffer = fgets($file); //read the file/UART
echo $buffer; //uncomment to output data on console
fclose($file);

list($V, $hum, $temp) = explode(":", $buffer);
$temp = $temp/10;
$hum = $hum/10;

$sql_command = "INSERT INTO DHT22 (temperature, humidity) VALUES ($temp, $hum)"; //Save data in database
mysql_query($sql_command);
sleep(2); //Wait for 2 seconds
}
?>
