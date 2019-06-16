<?php
$result=array();
exec('netstat -b',$result);

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="public/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="public/css/estilo/tabla.css">
	<link rel="stylesheet" type="text/css" href="public/css/estilo/navbar.css">
	<title>Seguridad Informatica</title>
</head>
<body>
	<?php include 'nav.php'; ?>
	<div class="container">
		<div class="row">
			<div class="card">
				<div class="card-head">
					<div class="row">
						<div class="col-lg-12">
							<h5> Comando: netstat -b</h5>
						</div>
					</div>
				</div>
				<div class="card-body">

					<table class='table table-responsive console'>
						<tbody>
						<?php
						foreach($result as $value => $line) {

						}
						?>
						</tbody>
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
