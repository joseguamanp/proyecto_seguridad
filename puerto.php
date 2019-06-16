<?php
$result=array();
exec('netstat -n',$result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="public/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="public/css/estilo/tabla.css">
	<link rel="stylesheet" type="text/css" href="public/css/estilo/navbar.css">
	<title></title>
</head>
<body>
	<?php include 'nav.php'; ?>

	<div class="container">
		<div class="row">
			<div class="card">
				<div class="card-head">
					<div class="row">
						<div class="col-lg-12">
							<h5> Comando: netstat -n</h5>
						</div>
					</div>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-lg-12">
							<h5> Conexiones activas</h5>
						</div>
					</div>
					<table class="table table-responsive console">
						<?php
						foreach($result as $value => $line) {
							if($value == 3){
								$datos = explode(" ",$line);
								$max = sizeof($datos);
								echo	"<thead>";
								echo "<tr>";
								echo "<th scope='col'>Proto</th>";
								echo "<th scope='col'>Dirección local</th>";
								echo "<th scope='col'>Dirección remota</th>";
								echo "<th scope='col'>Estado</th>";
								echo	"</tr>";
								echo "</thead>";
							}
							if($value > 3){
								$datos = explode(" ",$line);
								$max = sizeof($datos);
								echo	"<tbody>";
								echo "<tr>";
								for($i = 0; $i < $max; $i++){
									if($datos[$i] != ""){
										echo "<td>".utf8_decode($datos[$i])."</td>";
									}
								}
								echo	"</tr>";
								echo "</tbody>";
							}
						}
						?>
					</table>
				</div>
			</div>
		</div>
	</div>


	<script type="text/javascript" src="public/js/jquery.min.js"></script>
	<script type="text/javascript" src="public/js/bootstrap.js"></script>
	<script type="text/javascript" src="public/js/bootstrap.min.js"></script>
</body>
</html>
