<?php
include_once "php/common.php";
?>
<!doctype html>
<html lang="pl">
	<head>
		<meta charset="UTF-8"/> 
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="img/favicon.png"/>
		<title><?=SERVER_NAME?></title>
		<link rel="stylesheet" href="css/main.css"/>
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/index.js"></script>
	</head>
	<body>
		<div class="body">
			<div class="header">
				<div class="header-title"><?=SERVER_NAME?></div>
				<div class="header-refresh"><img src="img/icon_refresh.png"/></div>
			</div>
			<div class="section" id="section-pir">
				<div class="section-main">
					<div class="section-element-yellow section-title">Motion Sensor</div>
					<div class="section-element-yellow section-value">---</div>
				</div>
			</div>
			<div class="section" id="section-temperature">
				<div class="section-main">
					<div class="section-element-yellow section-title">Temperature</div>
					<div class="section-element-yellow section-value">---</div>
					<div class="section-element-magenta section-button section-button-details">Details</div>
				</div>
				<div class="section-more hidden"><img src="img/wegierska_gorka.png"/></div>
			</div>
			<div class="section" id="section-pressure">
				<div class="section-main">
					<div class="section-element-yellow section-title">Pressure</div>
					<div class="section-element-yellow section-value">---</div>
				</div>
			</div>
			<?php for($i=1;$i<=NUMBER_OF_RELAYS;$i++): ?>	
			<div class="section section-relay" id="section-relay<?=$i?>">
				<div class="section-main">
					<div class="section-element-yellow section-title">Relay #<?=$i?></div>
					<div class="section-element-yellow section-value">---</div>
					<div class="section-element-magenta section-button section-button-toggle">Toggle</div>
				</div>
			</div>
			<?php endfor ?>
			<div class="footer">
				&#169; Maciej Stanek 2017
			</div>
		</div>
	</body>
</html>
