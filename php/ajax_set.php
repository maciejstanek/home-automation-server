<?php
include_once "common.php";
// 1. Prepare toggle command
// 2. Send request to Arduino
// 3. Return a value from Ardino

if(!isset($_POST['relay'])) {
	die("Error in POST request");
}
$id = substr($_POST['relay'], -1);

$curl = curl_init();
$curlopts[CURLOPT_POSTFIELDS] = 'Q=R' . $id . 'T';
curl_setopt_array($curl, $curlopts); 
$resp = curl_exec($curl);
if(!$resp) {
	die(curl_error($curl));
}
curl_close($curl);

$resp = (explode("\r\n", $resp));
echo $resp[4];
