<?php
$result=array();
exec('netstat -a',$result);
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
			<table class="table table-bordered">
				<?php
				foreach ($result as $val=> $line)
				{
					if ($val==0) {
					}elseif ($val==1) {
						echo "<tr class='tablas'>";
						echo "<td colspan='5'>".utf8_decode($line)."</td>";
						echo "</tr>";
					}elseif($val==2){
					}elseif($val==3){
						$resul=str_replace(" ","<td>",$line);
						echo "<tr>";
					    echo "<td>".$resul."</td>";
					    echo "</tr>";
					}else{
						echo "<tr>";
						$resultado2=str_replace("  ","<td>",$line);
					    echo $resultado2."</td>";
					    echo "</tr>";
					}
				}
				?>
			</table>
		</div>
	</div>
<script type="text/javascript" src="public/js/jquery.min.js"></script>
<script type="text/javascript" src="public/js/bootstrap.js"></script>
<script type="text/javascript" src="public/js/bootstrap.min.js"></script>
</body>
</html>
