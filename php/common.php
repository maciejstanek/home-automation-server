<?php

define("SERVER_PATH", "/var/www/html/mstanek/home_automation_server");
define("SERVER_NAME", "Home Automation Server");

define("ARDUINO_IP", "192.168.1.171");
/* Arduino commands (POST 'Q'):
  - 'G': get all measurements
  - 'R[1-3][UDT]': high/low/toggle a specific relay
*/

define("NUMBER_OF_RELAYS", 3);

define("DB_HOST", "localhost");
define("DB_DATABASE", "home_automation_server");
define("DB_USERNAME", "yellow");
define("DB_PASSWORD", "pqqp");

$curlopts = [
	CURLOPT_URL => ARDUINO_IP, 
	CURLOPT_HTTPHEADER => ['Content-Type: application/x-www-form-urlencoded'],
	CURLOPT_RETURNTRANSFER => 1, 
	CURLOPT_CONNECTTIMEOUT => 1, 
	CURLOPT_TIMEOUT => 1, 
	CURLOPT_FAILONERROR => true, 
	CURLOPT_POST => 1,
];
