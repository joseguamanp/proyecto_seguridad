<?php
$result=array();
exec('netstat -s',$result);
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
							<h5> Comando: netstat -s</h5>
						</div>
					</div>
				</div>
				<div class="card-body">

					<table class='table table-responsive console'>
						<tbody>
						<?php
						foreach($result as $value => $line) {
							if($value > 0){
								$array_aux=array();
								$datos = explode(" ",$line);
								$max = sizeof($datos);
								$cadena = "";
									for($i = 0; $i < $max; $i++){
										if($datos[$i] != ""){
											if(!is_numeric($datos[$i])){
												$cadena .= $datos[$i]." ";
												$array_aux[0] = $cadena;
											}elseif(is_numeric($datos[$i])){
												array_push($array_aux, $datos[$i]);
											}
										}
									}

									echo "<tr>";

										for($cont = 0 ; $cont < sizeof($array_aux) ; $cont++){
											$cabecera = explode(" ",utf8_decode($array_aux[$cont]));
											if ($cabecera[0] == "Estad?sticas"){
												echo "</tr>";
												echo "<tr><td></td></tr>";
												echo "<tr><td></td></tr>";
												echo "<tr>";
												echo "<td><h5>".utf8_decode($array_aux[$cont])."</h5></td>";
												echo "</tr>";
												echo "<tr><td></td></tr>";
											}elseif($array_aux[$cont] != "Recibidos Enviados "){
												echo "<td>".utf8_decode($array_aux[$cont])."</td>";
											}else{
												$title = explode(" ",$array_aux[$cont]);
												echo "<td></td>";
												echo "<td><span class='op-color'>".utf8_decode($title[0])."</span></td>";
												echo "<td><span class='op-color'>".utf8_decode($title[1])."</span></td>";
											}
										}

									echo "</tr>";
							}
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
