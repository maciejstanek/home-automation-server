<?php
include_once "php/common.php";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="img/favicon.png"/>
		<title><?=SERVER_NAME?></title>

		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.min.css" rel="stylesheet">
		<link href="css/main_bootstrap.css" rel="stylesheet">
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/index_bootstrap.js"></script>
	</head>

	<body>

		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand" href=""><?=SERVER_NAME?></a>
					<div class="navbar-btn navbar-right">
						<button type="button" class="btn btn-success">Refresh</button>
					</div>
				</div>
			</div>
		</nav>

		<div class="container">
			<div class="row">
				<!-- PIR sensor -->
				<div class="col-xs-12 col-sm-6 col-md-4">
					<div id="section-pir" class="panel panel-warning">
						<div class="panel-heading">
							<h3 class="panel-title">PIR Motion Sensor</h3>
						</div>
						<div class="panel-body">
							Panel content
						</div>
					</div>
				</div>
				<!-- Temperature -->
				<div class="col-xs-12 col-sm-6 col-md-4">
					<div id="section-temperature" class="panel panel-warning">
						<div class="panel-heading">
							<h3 class="panel-title">Air Temperature</h3>
						</div>
						<div class="panel-body">
							Panel content
						</div>
					</div>
				</div>
				<!-- Pressure -->
				<div class="col-xs-12 col-sm-6 col-md-4">
					<div class="panel panel-warning">
						<div id="section-pressure" class="panel-heading">
							<h3 class="panel-title">Atmospheric Pressure</h3>
						</div>
						<div class="panel-body">
							Panel content
						</div>
					</div>
				</div>
				<!-- Relays -->
				<?php for($i = 1; $i <= NUMBER_OF_RELAYS; $i++): ?>
				<div class="col-xs-12 col-sm-6 col-md-4">
					<div class="panel panel-warning">
						<div id="section-relay<?=$i?>" class="panel-heading">
							<h3 class="panel-title">Relay #<?=$i?></h3>
						</div>
						<div class="panel-body">
							Panel content
						</div>
					</div>
				</div>
				<?php endfor ?>
			</div>
		</div>

	</body>
</html>

