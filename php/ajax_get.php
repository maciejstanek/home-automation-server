<?php
include_once "common.php";
// 1. Request data from Arduino via CURL
// 2. Save BMP180 data into database
// 3. Return a JSON with the requested data

$curl = curl_init();
$curlopts[CURLOPT_POSTFIELDS] = 'Q=G';
curl_setopt_array($curl, $curlopts); 
$resp = curl_exec($curl);
if(!$resp) {
	die(curl_error($curl));
}
curl_close($curl);

$resp = (explode("\r\n", $resp));
$json_decoded = json_decode($resp[4], true);

$pressure = ($json_decoded['p'] / 100.0);
$temperature = $json_decoded['t'];
$conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$stmt = $conn->prepare("insert into bmp180_log (temperature, pressure) values (?, ?)");
$stmt->bind_param("dd", $temperature, $pressure);
$stmt->execute();
if($conn->affected_rows === 0) {
	die('SQL query error');
}
$stmt->close();

$parsed = [
	"temperature" => $temperature . '&deg;C',
	"pressure" => $pressure . 'hPa',
	"pir" => intval($json_decoded['pir']),
];
foreach($json_decoded['r'] as $k => $v) {
	$parsed['relay' . ($k + 1)] = intval($v);
}
echo json_encode($parsed);
