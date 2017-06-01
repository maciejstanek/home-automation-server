<?php

include_once "common.php";
echo "test";

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
		$stmt->close();
		/*
		$result = $stmt->get_result();
		if($result->num_rows === 0){
			$msg = "Nieprawidłowe dane logowania";
		} else {
			$_SESSION["uzytkownik"] = $result->fetch_assoc()['imie'];
			header("Location: private.php");
		}
		*/
	}
}
