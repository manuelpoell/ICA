<?php
// die Konstanten auslagern in eigene Datei
// die dann per require_once ('dbconnect.php');
// geladen wird.

// Damit alle Fehler angezeigt werden
error_reporting(E_ALL);

// Zum Aufbau der Verbindung zur Datenbank
define ( 'MYSQL_HOST', 'localhost');
define ('MYSQL_USER', 'html');
define ('MYSQL_PW', 'html1234');
define ('MYSQL_DB', 'weewx');
?>