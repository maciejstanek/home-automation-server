<?php
// This is a file at which Arduino posts its asynchronous PIR events
include_once "common.php";

if(isset($_POST['pir'])) {
	$pir_sane_input = null;
	if($_POST['pir'] === '1') {
		$pir_sane_input = 1;
	}
	if($_POST['pir'] === '0') {
		$pir_sane_input = 0;
	}

	if($pir_sane_input !== null) {
		$conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
		$stmt = $conn->prepare("insert into pir_log (status) values (?)");
		$stmt->bind_param("i", $pir_sane_input);
		$stmt->execute();
		if($conn->affected_rows) {
			echo '(Success!)';
		} else {
			echo '(Invalid SQL query)';
		}
		$stmt->close();
	} else {
		echo '(Invalid $_POST["pir"] format, allowed values are "0" and "1")';
	}
} else {
	echo '(Missing $_POST["pir"] variable)';
}
