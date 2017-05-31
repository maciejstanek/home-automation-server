<?php
include_once "php/common.php";
?>
<!doctype html>
<html lang="pl">
	<head>
		<meta charset="UTF-8"/> 
		<!-- <link rel="icon" href="img/ico.png"/> -->
		<title><?=SERVER_NAME?></title>
		<link rel="stylesheet" href="css/main.css"/>
		<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="js/index.js"></script>
	</head>
	<body>
		<div class="body">
			<div class="header">
				<div class="header-title"><?=SERVER_NAME?></div>
				<div class="header-refresh"><img src="img/icon_refresh.png"/></div>
			</div>
			<div class="section">
				<div class="section-title">TODO: PIR sensor status</div>
			</div>
			<div class="section">
				<div class="section-main">
					<div class="section-element-yellow section-title">Temperature</div>
					<div class="section-element-yellow section-value">23.48&#176;C</div>
					<div class="section-element-magenta section-button section-button-details">details</div>
				</div>
				<div class="section-more hidden"><img src="img/wegierska_gorka.png"/></div>
			</div>
			<?php for($i=0;$i<NUMBER_OF_RELAYS;$i++): ?>	
			<div class="section">
				TODO: Relay #<?=$i?>
			</div>
			<?php endfor ?>
			<div class="footer">
				&#169; Maciej Stanek 2017
			</div>
		</div>
	</body>
</html>
