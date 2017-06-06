<?php
include_once "common.php";

// Get data from the database
$conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$stmt = $conn->prepare("select unix_timestamp(timestamp) as timestamp, temperature, pressure from bmp180_log where timestamp >= now() - interval 1 day order by timestamp desc");
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows === 0) {
	die("ERROR SQL");
}
$dat = fopen(SERVER_PATH . "/php/gnuplot/bmp180.dat", "w");
$min = INF;
$max = 0;
while($row = $result->fetch_assoc()) {
	fwrite($dat, $row["timestamp"] . " " . $row["temperature"] . " " . $row["pressure"] . PHP_EOL);
	$max = max($row["timestamp"], $max); 
	$min = min($row["timestamp"], $min); 
}
$stmt->close();
fclose($dat);

// Draw charts
$gpi = fopen(SERVER_PATH . "/php/gnuplot/bmp180.gpi", "w");
fwrite($gpi, "set timefmt '%s'\n");
fwrite($gpi, "set format x '%H:%M'\n");
fwrite($gpi, "set xdata time\n");
fwrite($gpi, "set xrange [" . $min . ":" . $max . "]\n");
fwrite($gpi, "set grid\n");
fwrite($gpi, "set terminal pngcairo transparent size 640,320 enhanced font 'Ubuntu,10'\n");
fwrite($gpi, "set object 1 rectangle from graph 0, graph 0 to graph 1, graph 1 behind fillcolor rgb 'white' fillstyle noborder\n");
fwrite($gpi, "set output '" . SERVER_PATH . "/php/gnuplot/temperature.png'\n");
fwrite($gpi, "plot '" . SERVER_PATH . "/php/gnuplot/bmp180.dat' using 1:2 smooth sbezier notitle linecolor rgb 'red' linewidth 3\n");
fwrite($gpi, "set output '" . SERVER_PATH . "/php/gnuplot/pressure.png'\n");
fwrite($gpi, "plot '" . SERVER_PATH . "/php/gnuplot/bmp180.dat' using 1:3 smooth sbezier notitle linecolor rgb 'blue' linewidth 3\n");
fclose($gpi);
exec("gnuplot -c " . SERVER_PATH . "/php/gnuplot/bmp180.gpi");

// TODO: send some info about PIR eg. hw many times it was acive during the last 24h
