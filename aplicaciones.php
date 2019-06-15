<?php
$result=array(); 
exec('netstat -b',$result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="public/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="public/css/estilo/tabla.css">
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
						echo "<tr>";
					    echo "<td>".utf8_decode($line.$val)."</td>"; 
					    echo "</tr>";
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