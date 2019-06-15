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
	<title></title>
</head>
<body>
	<?php include 'nav.php'; ?>
	<div class="container">
		<div class="row">
			<table class="table table-bordered">
				<?php
				foreach ($result as $val => $line) 
				{ 
					if ($val==0) {
					}elseif ($val==1) {
						echo "<tr class='tablas'>";

						echo "<td colspan='11'>".utf8_decode($line)."</td>"; 
						echo "</tr>";
					}elseif($val==2){
					}elseif($val==3){
						echo "<tr>";
						echo "<td>Protocolo</td>";
						echo "<td></td>"; 
						echo "<td colspan='4'>Dirección Local</td>"; 
						echo "<td colspan='4'>Dirección Remota</td>"; 
						echo "<td>Estado</td>";    
						echo "</tr>";
					}elseif($val==4 || $val==5 || $val==6){
						$resul=str_replace("  ","<td>",$line);
						echo "<tr>";
					    echo utf8_decode($resul)."</td>"; 
					    echo "</tr>";
					}elseif($val==7 || $val==8 || $val==9){
						echo "<tr>";
					    echo "<td>".utf8_decode($resul)."</td>"; 
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


