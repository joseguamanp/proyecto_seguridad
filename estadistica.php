<?php
$result=array();
exec('netstat -e',$result_e);
exec('netstat -s',$result_s);
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="public/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="public/css/estilo/tabla.css">
	<link rel="stylesheet" type="text/css" href="public/css/estilo/navbar.css">
	<title></title>
</head>
<body>
	<?php include 'nav.php';?>

	<div class="container">
		<div class="row">
			<div class="card">
				<div class="card-head">
					<div class="row">
						<div class="col-lg-12">
							<h5> Comando: netstat -e -s</h5>
						</div>
					</div>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-lg-12">
							<h5><?php echo utf8_decode($result_e[0]);?></h5>
						</div>
					</div>
					<table class="table table-responsive console">
						<tbody>
						<?php
						echo "<tr>";
						echo "<th scope='col'></th>";
						echo "<th class='op-color' scope='col'>recibidos</th>";
						echo "<th class='op-color' scope='col'>enviados</th>";
						echo	"</tr>";
						foreach($result_e as $value => $line) {
							if($value > 3){
								$datos = explode(" ",$line);
								$max = sizeof($datos);
								$aux = "";
								echo "<tr>";
								for($i = 0; $i < $max; $i++){
									if($datos[$i] != ""){
										if(!is_numeric($datos[$i])){
											$aux .= $datos[$i]." ";
										}else{
											echo "<td>".utf8_decode($aux)."</td>";
											echo "<td>".$datos[$i]."</td>";
											echo "<td>".$datos[$i++]."</td>";
											break;
										}
									}
								}
								echo	"</tr>";
							}
						}
						?>
						</tbody>
					</table>
					<table class='table table-responsive console'>
						<tbody>
						<?php
						foreach($result_s as $value2 => $line2) {
							if($value2 > 0){
								$array_aux=array();
								$datos2 = explode(" ",$line2);
								$max2 = sizeof($datos2);
								$cadena = "";
									for($i = 0; $i < $max2; $i++){
										if($datos2[$i] != ""){
											if(!is_numeric($datos2[$i])){
												$cadena .= $datos2[$i]." ";
												$array_aux[0] = $cadena;
											}elseif(is_numeric($datos2[$i])){
												array_push($array_aux, $datos2[$i]);
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
