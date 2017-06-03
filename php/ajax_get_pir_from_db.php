<?php
// Because PIR events are asynchronous, JS has to call this AJAX every few seconds
include_once "common.php";

$conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$stmt = $conn->prepare("select * from pir_log order by timestamp desc limit 1");
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows === 0) {
	die("ERROR SQL");
}
$row = $result->fetch_assoc();
$stmt->close();

echo json_encode($row);

